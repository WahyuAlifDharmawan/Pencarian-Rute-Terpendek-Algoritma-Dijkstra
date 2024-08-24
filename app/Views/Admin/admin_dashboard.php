<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/admin/style_dashboardadmin.css') ?>">

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

        <a class="logout" href="<?= base_url('admin/logout'); ?>">Logout</a> 
    </div>

    <div class="content">
        <!-- Your content goes here -->
        <h2>Selamat datang Admin</h2>
        <div class="jumlah-tempat-ibadah">
            <h2>Jumlah Tempat Ibadah: <?= $jumlah_tempat_ibadah ?></h2>
        </div>
        <div class="jumlah-tempat-fasilitasumum">
            <h2>Jumlah Tempat Fasilitas Umum: <?= $jumlah_tempat_fasilitasumum ?></h2>
        </div>
        <div class="jumlah-tempat-fasilitasumum">
            <h2>Jumlah Titik Perbatasan: <?= $jumlah_titik_perbatasan ?></h2>
        </div>
    </div>

</body>

</html>
