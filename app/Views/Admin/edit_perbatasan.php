<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/admin/style_editperbatasan.css') ?>">

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
        <h2>Edit Perbatasan</h2>
        <form action="<?= base_url('admin/simpan_perbatasan'); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="perbatasan_id" value="<?= $batas['id'] ?>">

            <label for="nama_perbatasan">Nama Perbatasan:</label>
            <input type="text" id="nama_perbatasan" name="nama_perbatasan" value="<?= $batas['nama_tp'] ?>" required>

            <label for="latitude">Latitude:</label>
            <input type="text" id="latitude" name="latitude" value="<?= $batas['latitude_tp'] ?>" required>

            <label for="longitude">Longitude:</label>
            <input type="text" id="longitude" name="longitude" value="<?= $batas['longitude_tp'] ?>" required>

            <div id="pesan" style="margin-top: 10px; color: green;"></div>

            <button type="submit">Simpan Perubahan</button>
        </form>
    </div>

</body>

</html>

<script>
    <?php if (session()->has('success')): ?>
        alert("<?= session('success') ?>");
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        alert("<?= session()->getFlashdata('error') ?>");
    <?php endif; ?>
</script>