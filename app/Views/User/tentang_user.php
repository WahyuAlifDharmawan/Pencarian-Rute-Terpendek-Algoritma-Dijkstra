<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Landing</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/user/style_usertentang.css') ?>">
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

    <div class="Tentang-Web">
        <div class="tentang-website">
            <h2>Tentang Web</h2>
            <p>Projek ini merupakan bagian dari skripsi yang dilakukan oleh Wahyu Alif Dharmawan, seorang mahasiswa
                Universitas Dian Nuswantoro. Web ini merupakan sebuah platform pencarian jarak terpendek menuju tempat
                ibadah di Kecamatan Bergas, yang menggunakan algoritma Dijkstra. Dibangun menggunakan framework
                CodeIgniter 4 dengan menggunakan bahasa pemrograman PHP, HTML, CSS, serta MySQL sebagai basis data utamanya.

                Konsep utama dari web ini adalah untuk menyediakan layanan yang memungkinkan pengguna untuk mencari
                jarak terpendek menuju tempat ibadah, khususnya gereja dan masjid. Dengan demikian, pengguna dapat dengan
                mudah menemukan rute terbaik untuk mencapai tujuan ibadah mereka.

                Proyek ini merupakan hasil kerja keras dari Wahyu Alif Dharmawan sebagai bagian dari studi skripsinya.
                Melalui penggunaan algoritma Dijkstra, web ini mampu memberikan solusi yang efisien dan akurat dalam
                mencari jarak terpendek antara lokasi pengguna dengan tempat ibadah yang diinginkan.

                Dengan demikian, web ini tidak hanya menjadi sebuah implementasi teknologi informasi yang inovatif,
                tetapi juga sebuah kontribusi bagi kemudahan akses menuju tempat ibadah bagi masyarakat luas.</p>
        </div>
    </div>

    <footer>
        <p>&copy; Projek Tugas Akhir Wahyu Alif Dharmawan.</p>
    </footer>
</body>

</html>
