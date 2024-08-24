<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Perbatasan</title>
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
    <h2>Data Perbatasan</h2>
    <!-- Map container -->
    <div id="map"></div>
    <!-- Form untuk menambahkan perbatasan -->
    <form action="<?= base_url('admin/simpan_perbatasan'); ?>" method="post">
        <input type="hidden" name="perbatasan_id" value="<?= isset($batas) ? $batas['id'] : '' ?>">
        
        <label for="nama_perbatasan">Nama Perbatasan:</label>
        <input type="text" id="nama_perbatasan" name="nama_perbatasan" value="<?= isset($batas) ? $batas['nama_tp'] : '' ?>" required>
        
        <label for="latitude">Latitude:</label>
        <input type="text" id="latitude" name="latitude" value="<?= isset($batas) ? $batas['latitude_tp'] : '' ?>" required>
        
        <label for="longitude">Longitude:</label>
        <input type="text" id="longitude" name="longitude" value="<?= isset($batas) ? $batas['longitude_tp'] : '' ?>" required>
        
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

        <!-- Tabel untuk menampilkan data perbatasan -->
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Perbatasan</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($perbatasan)): ?>
                    <?php
                    $nomor = 1;
                    foreach ($perbatasan as $batas): ?>
                        <tr>
                            <td><?= $nomor++ ?></td>
                            <td><?= $batas['nama_tp'] ?></td>
                            <td><?= $batas['latitude_tp'] ?></td>
                            <td><?= $batas['longitude_tp'] ?></td>
                            <td>
                                <a href="<?= base_url('admin/edit_perbatasan/' . $batas['id']) ?>" class="edit-btn"><i
                                        class="fas fa-edit"></i> Edit</a>
                                <a href="<?= base_url('admin/hapus_perbatasan/' . $batas['id']) ?>" class="delete-btn"
                                    onclick="return confirm('Apakah Anda yakin untuk menghapus data ini?')"><i
                                        class="fas fa-trash-alt"></i> Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">Tidak ada data perbatasan.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Script JavaScript -->
    <script>
        // Inisialisasi peta
        mapboxgl.accessToken = 'pk.eyJ1Ijoid2h5ZGhyIiwiYSI6ImNsemM2YnFsMTA3MXoybHF3anIxZjJtN2YifQ.b7osE52Q8DWe9U81j8xxaQ';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11', // Style URL
            center: [110.42117446954916, -7.18104102173958], // Koordinat default
            zoom: 12 // Zoom default
        });

        // Tambahkan kontrol zoom
        map.addControl(new mapboxgl.NavigationControl());

        // Tambahkan event click pada peta
        map.on('click', function (e) {
            document.getElementById('latitude').value = e.lngLat.lat.toFixed(14);
            document.getElementById('longitude').value = e.lngLat.lng.toFixed(14);
        });

        // Tampilkan marker pada peta untuk setiap perbatasan yang sudah terdaftar
        <?php if (!empty($perbatasan)): ?>
            <?php foreach ($perbatasan as $batas): ?>
                new mapboxgl.Marker({ color: '#000000' })
                    .setLngLat([<?= $batas['longitude_tp'] ?>, <?= $batas['latitude_tp'] ?>])
                    .addTo(map);
            <?php endforeach; ?>
        <?php endif; ?>
    </script>

</body>

</html>