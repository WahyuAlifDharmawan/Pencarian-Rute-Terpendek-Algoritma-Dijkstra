<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Fasilitas Umum</title>
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.7.0/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.7.0/mapbox-gl.css' rel='stylesheet' />
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/admin/style_datafasilitasumum.css') ?>">
</head>

<body>
    <div class="sidebar">
        <div class="header" onclick="window.location.href='<?= base_url('admin/dashboard'); ?>'">
            <h2>Dashboard</h2>
        </div>
        <a href="<?= base_url('admin/data_tempat'); ?>">
            <span class="menu-icon">&#9873;</span>Data Tempat Ibadah
        </a>
        <a href="<?= base_url('admin/data_fasilitasumum'); ?>">
            <span class="menu-icon">&#9734;</span>Data Fasilitas Umum
        </a>
        <a href="<?= base_url('admin/data_perbatasan'); ?>">
            <span class="menu-icon">&#128205;</span>Data Perbatasan
        </a>

        <a class="logout" href="<?= base_url('admin/login'); ?>">Logout</a>
    </div>

    <div class="content">
        <h2>Data Tempat Fasilitas Umum</h2>
        <!-- Map container -->
        <div id="map"></div>
        <!-- Form untuk menambahkan dan mengedit fasilitas umum -->
        <form action="<?= base_url('admin/simpan_tempat_fasilitasumum'); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="fasilitasumum_id" value="<?= isset($umum) ? $umum['id'] : '' ?>">
            <label for="nama_fasilitasumum">Nama Tempat Fasilitas Umum:</label>
            <input type="text" id="nama_fasilitasumum" name="nama_fasilitasumum"
                value="<?= isset($umum) ? $umum['nama_fu'] : '' ?>" required>

            <label for="latitude">Latitude:</label>
            <input type="text" id="latitude" name="latitude" value="<?= isset($umum) ? $umum['latitude_fu'] : '' ?>"
                required>

            <label for="longitude">Longitude:</label>
            <input type="text" id="longitude" name="longitude" value="<?= isset($umum) ? $umum['longitude_fu'] : '' ?>"
                required>

            <label for="kelurahan">Kelurahan:</label>
            <input type="text" id="kelurahan" name="kelurahan" value="<?= isset($umum) ? $umum['kelurahan_fu'] : '' ?>"
                required>

            <label for="gambar">Gambar:</label>
            <input type="file" id="gambar" name="gambar" accept="image/*">

            <div id="pesan" style="margin-top: 10px; color: green;"></div>

            <button type="submit">Simpan</button>
        </form>
    </div>

    <div class="content">
        <!-- Menampilkan pesan flash -->
        <script>
            <?php if (session()->has('success')): ?>
                alert("<?= session('success') ?>");
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')): ?>
                alert("<?= session()->getFlashdata('error') ?>");
            <?php endif; ?>
        </script>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Fasilitas Umum</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Kelurahan</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($tempatFasilitasumum)): ?>
                    <?php
                    $nomor = 1;
                    foreach ($tempatFasilitasumum as $umum): ?>
                        <tr>
                            <td>
                                <?= $nomor++ ?>
                            </td>
                            <td>
                                <?= $umum['nama_fu'] ?>
                            </td>
                            <td>
                                <?= $umum['latitude_fu'] ?>
                            </td>
                            <td>
                                <?= $umum['longitude_fu'] ?>
                            </td>
                            <td>
                                <?= $umum['kelurahan_fu'] ?>
                            </td>
                            <td><img src="<?= base_url('../uploads/tempat_fasilitasumum/' . $umum['gambar_fu']) ?>" width="100"
                                    alt="<?= $umum['nama_fu'] ?>"></td>
                            <td>
                                <a href="<?= base_url('admin/edit_fasilitasumum/' . $umum['id']) ?>" class="edit-btn"><i
                                        class="fas fa-edit"></i> Edit</a>
                                <a href="<?= base_url('admin/hapus_fasilitasumum/' . $umum['id']) ?>" class="delete-btn"
                                    onclick="return confirm('Apakah Anda yakin untuk menghapus data ini?')"><i
                                        class="fas fa-trash-alt"></i> Hapus</a>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">Tidak ada data tempat fasilitas umum.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal">
        <span class="close" onclick="closeModal()">&times;</span> <!-- Close button -->
        <div class="modal-fullscreen-content">
            <img class="modal-content modalImg" id="img01">
            <div id="caption"></div>
        </div>
    </div>

    <!-- Overlay div and fullscreen image container -->
    <div id="overlay">
        <div id="img-container">
            <img id="fullscreen-img" src="" alt="Fullscreen Image">
        </div>
    </div>

    <script>
        // Script untuk peta
        mapboxgl.accessToken = 'pk.eyJ1Ijoid2h5ZGhyIiwiYSI6ImNsemM2YnFsMTA3MXoybHF3anIxZjJtN2YifQ.b7osE52Q8DWe9U81j8xxaQ';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11', // Style URL
            center: [110.42117446954916, -7.18104102173958], // Koordinat Kecamatan Bergas Kabupaten Semarang
            zoom: 12 // Default zoom
        });

        // Tambahkan kontrol zoom
        map.addControl(new mapboxgl.NavigationControl());

        // Tambahkan event click pada peta
        map.on('click', function (e) {
            document.getElementById('latitude').value = e.lngLat.lat.toFixed(14);
            document.getElementById('longitude').value = e.lngLat.lng.toFixed(14);
        });

        // Script untuk menampilkan marker pada peta untuk setiap tempat ibadah yang sudah terdaftar
        <?php if (!empty($tempatFasilitasumum)): ?>
            <?php foreach ($tempatFasilitasumum as $umum): ?>
                new mapboxgl.Marker({ color: '#00FF00' })
                    .setLngLat([
                        <?= $umum['longitude_fu'] ?>,
                        <?= $umum['latitude_fu'] ?>])
                    .addTo(map);
            <?php endforeach; ?>
        <?php endif; ?>

        <?php if (!empty($titikPerbatasan)): ?>
            <?php foreach ($titikPerbatasan as $perbatasan): ?>
                new mapboxgl.Marker({ color: '#000000' })
                    .setLngLat([
                        <?= $perbatasan['longitude_tp'] ?>,
                        <?= $perbatasan['latitude_tp'] ?>])
                    .addTo(map);
            <?php endforeach; ?>
        <?php endif; ?>

        // JavaScript untuk mengaktifkan mode fullscreen saat gambar diklik
        document.querySelectorAll('.modalImg').forEach(img => {
            img.addEventListener('click', function () {
                this.classList.toggle('fullscreen');
            });
        });

        // Temukan semua gambar dalam tabel
        document.querySelectorAll('.modalImg').forEach(img => {
            // Tambahkan event listener untuk setiap gambar
            img.addEventListener('click', function () {
                // Panggil fungsi toggleFullScreen untuk mengalihkan mode fullscreen
                toggleFullScreen(this.src);
            });
        });

        // Temukan overlay div
        const overlay = document.getElementById('overlay');

        // Fungsi untuk mengalihkan mode fullscreen
        function toggleFullScreen(src) {
            const fullscreenImg = document.getElementById('fullscreen-img');
            fullscreenImg.src = src; // Set source of fullscreen image

            // Periksa apakah overlay sedang ditampilkan
            if (overlay.style.display === 'none') {
                // Jika tidak, tampilkan overlay dan masukkan mode fullscreen
                overlay.style.display = 'block';
                document.body.style.overflow = 'hidden'; // Prevent scrolling
            } else {
                // Jika sudah, sembunyikan overlay dan keluarkan dari mode fullscreen
                overlay.style.display = 'none';
                document.body.style.overflow = ''; // Enable scrolling
            }
        }
    </script>

</body>
</html>
