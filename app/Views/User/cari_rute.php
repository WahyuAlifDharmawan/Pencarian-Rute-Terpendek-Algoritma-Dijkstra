<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari rute</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/user/style_usercarirute.css') ?>">
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.7.0/mapbox-gl.js'></script>
    <script src="https://unpkg.com/@turf/turf/turf.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/turf/7.0.0/turf.min.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.7.0/mapbox-gl.css' rel='stylesheet' />
</head>

<body>
    <header>
        <div class="container">
            <h1 class="logo">
                <img src="/assets/images/logo-projek.png" alt="Dijkstra Logo" class="gambar-logo img" width="40"
                    height="40"> Dijkstra
            </h1>
            <nav>
                <ul>
                    <li><a href="<?= base_url('user/landing_user') ?>">Dashboard</a></li>
                    <li><a href="<?= base_url('user/cari_rute') ?>">Cari Tempat Ibadah</a></li>
                    <li><a href="<?= base_url('user/tentang_user') ?>">Tentang Web</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="content">
        <h1>Pencarian Rute</h1>
        <!-- Map container -->
        <div id="map" style="position: relative;"></div>

        <!-- Dropdown untuk memilih Type -->
        <select id="type-select">
            <option value="">-- Pilih Kategori Tempat --</option>
            <?php foreach ($types as $type): ?>
                <option value="<?= $type['type']; ?>"><?= $type['type']; ?></option>
            <?php endforeach; ?>
        </select>

        <!-- Tombol untuk menghapus jalur -->
        <button id="clearRoute">Clear Route</button>
        <!-- Container untuk menampilkan informasi jarak dan waktu tempuh -->
        <div id="routeInfo">
            <p>Jarak terpendek: <span id="shortestDistance"></span> </p>
            <p>Waktu tempuh terpendek: <span id="shortestDuration"></span> </p>
        </div>
        <!-- Tabel untuk menampilkan informasi rute -->
        <table id="routeTable">
            <thead>
                <tr>
                    <th>Nama Rute</th>
                    <th>Jarak (meter)</th>
                    <th>Waktu Tempuh (menit)</th>
                    <th>Warna Jalur</th>
                </tr>
            </thead>
            <tbody id="routeData">
            </tbody>
        </table>
    </div>

    <!-- Modal untuk gambar -->
    <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="img01">
    </div>

    <script>
        // Script untuk peta
        mapboxgl.accessToken = 'pk.eyJ1Ijoid2h5ZGhyIiwiYSI6ImNsemM2YnFsMTA3MXoybHF3anIxZjJtN2YifQ.b7osE52Q8DWe9U81j8xxaQ';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            zoom: 11,
            center: [110.42117446954916, -7.18104102173958]
        });

        // Tambahkan kontrol navigasi
        var nav = new mapboxgl.NavigationControl();
        map.addControl(nav, 'top-right');

        // Deklarasi variabel markerUserLocation dan markerDestination
        var markerUserLocation;
        var markerDestination;
        var selectedVehicle = 'driving';
        var stepMarkers = [];
        var validMarkers = [];

        // Fungsi untuk menetapkan titik awal dan tujuan
        function setStartOrEnd(marker, lng, lat) {
            if (!markerDestination) {
                markerDestination = marker;
                console.log('Titik tujuan:', lng, lat);

                var url = 'https://api.mapbox.com/directions/v5/mapbox/' + selectedVehicle + '/' + markerUserLocation.getLngLat().lng + ',' + markerUserLocation.getLngLat().lat + ';' + lng + ',' + lat + '?steps=true&geometries=geojson&overview=full&alternatives=true&access_token=' + mapboxgl.accessToken;
                console.log('URL:', url);

                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        var routes = data.routes;

                        // Hapus jalur lama dari peta
                        for (var i = 0; i < 10; i++) {
                            if (map.getLayer('route' + i)) {
                                map.removeLayer('route' + i);
                            }
                            if (map.getSource('route' + i)) {
                                map.removeSource('route' + i);
                            }
                        }
                        // Hapus marker lama dari langkah rute
                        stepMarkers.forEach(marker => marker.remove());
                        stepMarkers = [];

                        // Mengurutkan rute berdasarkan jarak terkecil
                        routes = routes.map(route => {
                            const distance = calculateTotalDistance(route.legs[0].steps);
                            return { ...route, distance };
                        }).sort((a, b) => a.distance - b.distance);

                        // Tampilkan rute di tabel dan peta
                        routes.forEach((route, routeIndex) => {
                            var distance = route.distance;
                            var duration = route.duration; // Durasi dalam detik
                            var formattedDuration = `${Math.floor(duration / 60)} menit ${Math.floor(duration % 60)} detik`;
                            var lineColor = ['#33FF57', '#3373FF', '#FF33A8', '#FFE333'][routeIndex % 4]; // Warna jalur

                            map.addLayer({
                                'id': 'route' + routeIndex,
                                'type': 'line',
                                'source': {
                                    'type': 'geojson',
                                    'data': {
                                        'type': 'Feature',
                                        'geometry': route.geometry
                                    }
                                },
                                'layout': {
                                    'line-join': 'round',
                                    'line-cap': 'round'
                                },
                                'paint': {
                                    'line-color': lineColor,
                                    'line-width': 6
                                }
                            });

                            // Tambahkan informasi rute ke tabel
                            var table = document.getElementById('routeData');
                            var row = table.insertRow(-1);
                            row.insertCell(0).innerText = 'Rute ' + (routeIndex + 1);
                            row.insertCell(1).innerText = (distance / 1000).toFixed(2) + " km";
                            row.insertCell(2).innerText = formattedDuration;
                            var colorCell = row.insertCell(3);
                            colorCell.innerHTML = '<div style="width: 20px; height: 20px; background-color:' + lineColor + ';"></div>';

                            // Tambahkan marker untuk setiap langkah rute
                            var previousStepLocation = null;
                            route.legs[0].steps.forEach((step, stepIndex) => {
                                var stepLocation = step.maneuver.location;
                                var stepMarker = new mapboxgl.Marker({ color: lineColor })
                                    .setLngLat(stepLocation)
                                    .setPopup(new mapboxgl.Popup({ className: 'my-custom-popup' })
                                        .setHTML('<h3>Langkah ' + (stepIndex + 1) + '</h3><p>' + step.maneuver.instruction + '</p>' +
                                            '<p>Koordinat: ' + stepLocation[1].toFixed(6) + ', ' + stepLocation[0].toFixed(6) + '</p>' +
                                            (previousStepLocation ? '<p>Jarak dari langkah sebelumnya: ' +
                                                (turf.distance(turf.point(previousStepLocation), turf.point(stepLocation), { units: 'meters' })).toFixed(2) + ' meter</p>' : '')))
                                    .addTo(map);

                                stepMarkers.push(stepMarker);
                                previousStepLocation = stepLocation;
                            });

                            // Tambahkan informasi jarak terpendek di div "routeInfo"
                            if (routeIndex === 0) {
                                document.getElementById('shortestDistance').innerText = (distance / 1000).toFixed(2) + " km";
                                document.getElementById('shortestDuration').innerText = formattedDuration;
                            }
                        });
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }
        }

        // Fungsi untuk menghitung jarak total menggunakan langkah-langkah
        function calculateTotalDistance(steps) {
            var totalDistance = 0;
            for (var i = 0; i < steps.length - 1; i++) {
                var start = steps[i].maneuver.location;
                var end = steps[i + 1].maneuver.location;
                totalDistance += turf.distance(turf.point(start), turf.point(end), { units: 'meters' });
            }
            return totalDistance;
        }

        // Fungsi untuk menambahkan marker dari data PHP
        function addMarkers(data, defaultColor, type) {
            data.forEach(function (item) {
                var markerColor = defaultColor;

                // Tentukan warna marker berdasarkan tipe tempat ibadah
                if (type === 'tempat_ibadah') {
                    if (item.type === "Mushola/Masjid") {
                        markerColor = "#FF0000";
                    } else if (item.type === "Gereja Kristen") {
                        markerColor = "#2DAFBD";
                    } else if (item.type === "Gereja Katholik") {
                        markerColor = "#6D7DBF";
                    }
                }

                // Tentukan jalur gambar berdasarkan tipe
                var imageUrl;
                if (type === 'tempat_ibadah') {
                    imageUrl = '<?= base_url("uploads/tempat_ibadah/") ?>' + item.gambar;
                } else if (type === 'fasilitas_umum') {
                    imageUrl = '<?= base_url("uploads/tempat_fasilitasumum/") ?>' + item.gambar;
                } else if (type === 'titik_perbatasan') {
                    imageUrl = ''; // Jika perbatasan tidak memiliki gambar
                }

                var marker = new mapboxgl.Marker({ color: markerColor })
                    .setLngLat([item.longitude, item.latitude])
                    .addTo(map)
                    .setPopup(new mapboxgl.Popup({ className: 'my-custom-popup' }).setHTML(
                        '<h3>' + item.name + '</h3>' +
                        (item.kelurahan ? '<p>Kelurahan: ' + item.kelurahan + '</p>' : '') +
                        (item.gambar ? '<img src="' + imageUrl + '" alt="' + item.name + '" width="100" onclick="showModal(\'' + imageUrl + '\')">' : '')
                    ));

                // Jika type adalah tempat ibadah, tambahkan ke tempatIbadahMarkers, jika tidak tambahkan ke validMarkers
                if (type === 'tempat_ibadah') {
                    tempatIbadahMarkers.push(marker);
                } else {
                    validMarkers.push(marker);
                }

                // Event listener untuk menetapkan titik tujuan
                marker.getElement().addEventListener('click', function () {
                    setStartOrEnd(marker, item.longitude, item.latitude);
                });
            });
        }


        // Data dari PHP
        var tempatIbadah = [
            <?php foreach ($tempatIbadah as $tempat): ?>
                                                                            {
                    longitude: <?= json_encode($tempat['longitude_ti']) ?>,
                    latitude: <?= json_encode($tempat['latitude_ti']) ?>,
                    name: <?= json_encode($tempat['nama_ti']) ?>,
                    kelurahan: <?= json_encode($tempat['kelurahan_ti']) ?>,
                    gambar: <?= json_encode($tempat['gambar_ti']) ?>,
                    type: <?= json_encode($tempat['type']) ?>
                },
            <?php endforeach; ?>
        ];

        var fasilitasUmum = [
            <?php foreach ($umum as $u): ?>
                                                                            {
                    longitude: <?= json_encode($u['longitude_fu']) ?>,
                    latitude: <?= json_encode($u['latitude_fu']) ?>,
                    name: <?= json_encode($u['nama_fu']) ?>,
                    kelurahan: <?= json_encode($u['kelurahan_fu']) ?>,
                    gambar: <?= json_encode($u['gambar_fu']) ?>
                },
            <?php endforeach; ?>
        ];

        var titikPerbatasan = [
            <?php foreach ($perbatasan as $batas): ?>
                                                                            {
                    longitude: <?= json_encode($batas['longitude_tp']) ?>,
                    latitude: <?= json_encode($batas['latitude_tp']) ?>,
                    name: <?= json_encode($batas['nama_tp']) ?>
                },
            <?php endforeach; ?>
        ];

        // Menentukan warna marker berdasarkan jenis tempat ibadah
        function getMarkerColor(type) {
            switch (type) {
                case "Mushola/Masjid":
                    return '#FF0000'; 
                case "Gereja Katholik":
                    return '#B1BD2D'; 
                case "Gereja Kristen":
                    return '#2DAFBD'; 
                default:
                    return '#FFFFFF'; // Putih untuk jenis yang tidak dikenal
            }
        }

        // Tambahkan marker untuk tempat ibadah, fasilitas umum, dan titik perbatasan
        // addMarkers(tempatIbadah, '#FF0000', 'tempat_ibadah'); // Warna berdasarkan tipe
        addMarkers(fasilitasUmum, '#00FF00', 'fasilitas_umum'); // Warna hijau untuk fasilitas umum
        addMarkers(titikPerbatasan, '#000000', 'titik_perbatasan'); // Warna hitam untuk titik perbatasan

        // Inisialisasi lokasi pengguna saat halaman dimuat
        navigator.geolocation.getCurrentPosition(function (position) {
            var userMarker = new mapboxgl.Marker({ color: '#0000FF' }) // Warna biru untuk lokasi pengguna
                .setLngLat([position.coords.longitude, position.coords.latitude])
                .setPopup(new mapboxgl.Popup({ className: 'my-custom-popup' }).setHTML('<h3>Lokasi Terkini Anda</h3>'))
                .addTo(map);

            // Tetapkan lokasi pengguna sebagai titik awal
            markerUserLocation = userMarker;
            validMarkers.push(userMarker);

            // Event listener untuk menetapkan titik tujuan
            userMarker.getElement().addEventListener('click', function () {
                setStartOrEnd(userMarker, position.coords.longitude, position.coords.latitude);
            });
        });

        // Event listener untuk tombol clear route
        document.getElementById('clearRoute').addEventListener('click', function () {
            for (var i = 0; i < 10; i++) {
                if (map.getLayer('route' + i)) {
                    map.removeLayer('route' + i);
                }
                if (map.getSource('route' + i)) {
                    map.removeSource('route' + i);
                }
            }
            document.getElementById('shortestDistance').innerText = "";
            document.getElementById('shortestDuration').innerText = "";
            document.getElementById('routeData').innerHTML = "";
            stepMarkers.forEach(marker => marker.remove());
            stepMarkers = [];
            markerDestination = null; // Hanya hapus titik tujuan, biarkan titik awal tetap sebagai lokasi pengguna

            // Setel ulang lokasi pengguna sebagai titik awal
            navigator.geolocation.getCurrentPosition(function (position) {
                var userMarker = new mapboxgl.Marker({ color: '#0000FF' })
                    .setLngLat([position.coords.longitude, position.coords.latitude])
                    .setPopup(new mapboxgl.Popup({ className: 'my-custom-popup' }).setHTML('<h3>Lokasi Terkini Anda</h3>'))
                    .addTo(map);

                markerUserLocation = userMarker;
                validMarkers.push(userMarker);

                userMarker.getElement().addEventListener('click', function () {
                    setStartOrEnd(userMarker, position.coords.longitude, position.coords.latitude);
                });
            });
        });

        // Fungsi untuk menampilkan modal
        function showModal(src) {
            var modal = document.getElementById("myModal");
            var modalImg = document.getElementById("img01");
            modal.style.display = "block";
            modalImg.src = src;
        }

        // Tutup modal ketika tombol close diklik
        var modal = document.getElementById("myModal");
        var span = document.getElementsByClassName("close")[0];
        span.onclick = function () {
            modal.style.display = "none";
        }

        // Fungsi untuk menambahkan marker berdasarkan tipe yang dipilih
        function addMarkersByType(type) {
            // Hapus hanya marker tempat ibadah yang ada
            tempatIbadahMarkers.forEach(marker => marker.remove());
            tempatIbadahMarkers = [];

            // Tambahkan marker baru berdasarkan tipe yang dipilih
            var filteredTempatIbadah = tempatIbadah.filter(tempat => tempat.type === type);
            addMarkers(filteredTempatIbadah, getMarkerColor(type), 'tempat_ibadah');
        }

        var tempatIbadahMarkers = []; // Variabel baru untuk menyimpan marker tempat ibadah

        // Event listener untuk dropdown
        document.getElementById('type-select').addEventListener('change', function () {
            var selectedType = this.value;
            if (selectedType) {
                addMarkersByType(selectedType);
            } else {
                // Jika tidak ada tipe yang dipilih, hapus semua marker tempat ibadah
                validMarkers.forEach(marker => marker.remove());
                validMarkers = [];
            }
        });


    </script>
</body>

</html>