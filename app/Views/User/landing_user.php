<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Landing</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/user/style_userdashboard.css') ?>">

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

    <!-- <section class="hero">
        <h2>Selamat Datang di Pencarian Rute Terpendek Menuju Tempat Ibadah di Kecamatan Bergas</h2>
    </section> -->

    <!-- <div class="slideshow-container">
        <?php foreach ($gambar_tempat_ibadah as $key => $gambar): ?>
            <div class="card">
                <img src="<?= base_url('uploads/tempat_ibadah/' . $gambar['gambar_ti']) ?>"
                    style="width: 100%; height: 100%;">
            </div>
        <?php endforeach; ?>
        <button class="prev" onclick="plusSlides(-1)">&#10094;</button>
        <button class="next" onclick="plusSlides(1)">&#10095;</button>
    </div> -->


    <div class="Tentang-Bergas">
        <!-- Bagian kiri -->
        <div class="left-section">
            <h3>Selamat Datang</h3>
            <p>Selamat datang di Kecamatan Bergas. Temukan rute terbaik ke tujuan Anda.</p>
            <div class="jumlah-wrapper">
                <div class="nama-box">
                    <div class="jumlah-box">
                        <h2><?= $jumlah_tempat_ibadah ?></h2>
                    </div>
                    <p>Tempat Ibadah</p>
                </div>
                <div class="nama-box">
                    <div class="jumlah-box">
                        <h2><?= $jumlah_tempat_fasilitasumum ?></h2>
                    </div>
                    <p>Fasilitas Umum</p>
                </div>
            </div>

            <a href="cari_rute" class="tombol-carirute">Cari Rute</a>
        </div>
        <!-- Bagian kanan -->
        <div class="right-section">
            <h2>Tentang Kecamatan Bergas</h2>

            <div class="Informasi-Bergas">
                <div class="gambar-container">
                    <img src="/assets/images/GambarBergas.jpg" alt="Gambar Kecamatan Bergas">
                </div>
                <div class="informasi-text">
                    <p>Nama : Bergas</p>
                    <p>Luas : 47,33km²</p>
                    <p>Kabupaten/Kota : Kabupaten Semarang</p>
                    <p>Provinsi : Jawa Tengah</p>
                    <p>Batas Wilayah :</p>
                    <ul>
                        <li>Utara : Kecamatan Ungaran Barat dan Kecamatan Ungaran Timur</li>
                        <li>Timur : Kecamatan Pringapus</li>
                        <li>Selatan : Kecamatan Bandungan dan Kecamatan Bawen</li>
                        <li>Barat : Kecamatan Bandungan dan Kecamatan Ungaran Barat</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <footer>
        <p>&copy; Projek Tugas Akhir Wahyu Alif Dharmawan.</p>
    </footer>

    <script>
        var slideIndex = 0;
        var slides = document.getElementsByClassName("card");
        showSlides();

        function showSlides() {
            for (var i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            if (slideIndex < 1) { slideIndex = slides.length }
            slides[slideIndex - 1].style.display = "block";
        }

        function plusSlides(n) {
            slideIndex += n;
            if (slideIndex > slides.length) { slideIndex = 1 }
            if (slideIndex < 1) { slideIndex = slides.length }
            showSlides();
        }
    </script>

</body>

</html>