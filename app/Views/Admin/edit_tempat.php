<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tempat Ibadah</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/admin/style_edittempat.css') ?>">

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
        <h2>Edit Tempat Ibadah</h2>
        <!-- Form untuk mengedit tempat ibadah -->
        <form action="<?= base_url('admin/simpan_tempat_ibadah'); ?>" method="post" enctype="multipart/form-data">
            <label for="nama_tempat">Nama Tempat Ibadah:</label>
            <input type="text" id="nama_tempat" name="nama_tempat" value="<?= $tempat['nama_ti'] ?>" required>

            <label for="latitude">Latitude:</label>
            <input type="text" id="latitude" name="latitude" value="<?= $tempat['latitude_ti'] ?>" required>

            <label for="longitude">Longitude:</label>
            <input type="text" id="longitude" name="longitude" value="<?= $tempat['longitude_ti'] ?>" required>

            <label for="kelurahan">Kelurahan:</label>
            <input type="text" id="kelurahan" name="kelurahan" value="<?= $tempat['kelurahan_ti'] ?>" required>

            <label for="type">Type:</label>
            <select id="type" name="type" required>
                <option value="">-- Pilih Type --</option>
                <?php foreach ($types as $type): ?>
                    <option value="<?= $type['type']; ?>" <?= $type['type'] == $tempat['type'] ? 'selected' : ''; ?>>
                        <?= $type['type']; ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label for="gambar">Gambar Lama:</label>
            <img src="<?= base_url('../uploads/tempat_ibadah/' . $tempat['gambar_ti']) ?>" width="100">
            <input type="file" id="gambar" name="gambar" accept="image/*">

            <input type="hidden" name="tempat_id" value="<?= $tempat['id'] ?>">

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