    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data Tempat</title>
        <script src='https://api.mapbox.com/mapbox-gl-js/v2.7.0/mapbox-gl.js'></script>
        <link href='https://api.mapbox.com/mapbox-gl-js/v2.7.0/mapbox-gl.css' rel='stylesheet' />
        <link rel="stylesheet" type="text/css" href="<?= base_url('css/admin/style_datatempat.css') ?>">
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
            <h2>Data Tempat Ibadah</h2>
            <!-- Map container -->
            <div id="map"></div>
            <!-- Form untuk menambahkan tempat ibadah -->
            <form action="<?= base_url('admin/simpan_tempat_ibadah'); ?>" method="post" enctype="multipart/form-data">
                <label for="nama_tempat">Nama Tempat Ibadah:</label>
                <input type="text" id="nama_tempat" name="nama_tempat" required>

                <label for="latitude">Latitude:</label>
                <input type="text" id="latitude" name="latitude" required>

                <label for="longitude">Longitude:</label>
                <input type="text" id="longitude" name="longitude" required>

                <label for="longitude">Kelurahan:</label>
                <input type="text" id="kelurahan" name="kelurahan" required>

                <label for="gambar">Gambar:</label>
                <input type="file" id="gambar" name="gambar" accept="image/*" required>

                <label for="type">Type:</label>
                <select id="type" name="type" required>
                    <option value="">-- Pilih Type --</option>
                    <?php foreach ($types as $type): ?>
                        <option value="<?= $type['type']; ?>"><?= $type['type']; ?></option>
                    <?php endforeach; ?>
                </select>

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

            <!-- Tabel untuk menampilkan data tempat ibadah -->
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Tempat Ibadah</th>
                        <th>Type</th> <!-- Kolom baru untuk Type -->
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Kelurahan</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($tempatIbadah)): ?>
                        <?php
                        $nomor = 1;
                        foreach ($tempatIbadah as $tempat): ?>
                            <tr>
                                <td><?= $nomor++ ?></td>
                                <td><?= $tempat['nama_ti'] ?></td>
                                <td><?= $tempat['latitude_ti'] ?></td>
                                <td><?= $tempat['longitude_ti'] ?></td>
                                <td><?= $tempat['kelurahan_ti'] ?></td>
                                <td><?= $tempat['type'] ?></td> <!-- Menampilkan Type -->
                                <td><img src="<?= base_url('../uploads/tempat_ibadah/' . $tempat['gambar_ti']) ?>" width="100"
                                        alt="<?= $tempat['nama_ti'] ?>"></td>
                                <td>
                                    <a href="<?= base_url('admin/edit_tempat/' . $tempat['id']) ?>" class="edit-btn"><i
                                            class="fas fa-edit"></i> Edit</a>
                                    <a href="<?= base_url('admin/hapus_tempat/' . $tempat['id']) ?>" class="delete-btn"
                                        onclick="return confirm('Apakah Anda yakin untuk menghapus data ini?')"><i
                                            class="fas fa-trash-alt"></i> Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6">Tidak ada data tempat ibadah.</td>
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
            <?php if (!empty($tempatIbadah)): ?>
                <?php foreach ($tempatIbadah as $tempat): ?>
                    new mapboxgl.Marker({ color: '#FF0000' })
                        .setLngLat([
                            <?= $tempat['longitude_ti'] ?>,
                            <?= $tempat['latitude_ti'] ?>])
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