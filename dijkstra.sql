-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2024 at 12:14 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dijkstra`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `email_admin` varchar(50) NOT NULL,
  `password_admin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama_admin`, `email_admin`, `password_admin`) VALUES
(1, 'Admin', 'admindijkstra@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tempat_fasilitasumum`
--

CREATE TABLE `tempat_fasilitasumum` (
  `id` int(11) NOT NULL,
  `nama_fu` varchar(255) NOT NULL,
  `latitude_fu` double NOT NULL,
  `longitude_fu` double NOT NULL,
  `kelurahan_fu` varchar(255) NOT NULL,
  `gambar_fu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tempat_fasilitasumum`
--

INSERT INTO `tempat_fasilitasumum` (`id`, `nama_fu`, `latitude_fu`, `longitude_fu`, `kelurahan_fu`, `gambar_fu`) VALUES
(15, 'Pasar Karangjati', -7.16834010520621, 110.43292575272545, 'Karangjati', 'pasar.jpg'),
(16, 'Penjahit bu Diyah', -7.17004896854446, 110.43428029146054, 'Karangjati', 'penjahit bu diyah.jpg'),
(17, 'goori', -7.16838713610623, 110.43640152917271, 'Karangjati', 'toserba goori.jpg'),
(18, 'Tea Co', -7.17246040184232, 110.43749394123648, 'Karangjati', 'tea co caffee.jpg'),
(19, 'udinus', -6.99206004496344, 110.40308226260231, 'pendrikan kidul', 'udinus.jpg'),
(26, 'Kantor Kecamatan Bergas', -7.1889095170456745, 110.42572375393625, 'Sidorejo', 'foto kantor kecamatan Bergas.jpg'),
(28, 'Sub Terminal Karangjati', -7.183995904841758, 110.42610233234096, 'Karangjati', '1720186058_204b0e164ee254bc9a1f.jpg'),
(29, 'SPBU Pertamina 44.505.03 Lemah Abang', -7.176467864522116, 110.41828062820264, 'Gembongan', '1722468072_9cede9315327455f195e.png'),
(30, 'SPBU Pertamina 44.505.01 Karangjati', -7.183172053214133, 110.42546190010724, 'Karangjati', '1722468198_b0cacb9f3731d9bb73d2.png'),
(31, 'SPBU Pertamina 44.505.07 Ngempon', -7.186161883847501, 110.43403957066093, 'Ngempon', '1722468304_d892ce115ab02735ffe0.png'),
(32, 'SPBU 44.505.04 Bergas', -7.2026999853320515, 110.4235003448631, 'Jatijajar', '1722468389_75eef840a287dc978792.jpg'),
(33, 'Puskesmas Bergas', -7.189124976045122, 110.42560301330789, 'Sidorejo', '1722468500_cccbbf2a9afc205706d3.png'),
(34, 'Rumah Sakit Ken Saras', -7.202688204261323, 110.42324221970263, 'Randugunting', '1722468957_e810516078d004680453.jpg'),
(35, 'Kantor Kelurahan Bergas Kidul', -7.191958646444774, 110.41430757841628, 'Bergas Kidul', '1722469266_6e9de04f33b6abb449ec.jpg'),
(36, 'Kantor Kelurahan Bergas Lor', -7.184954649649838, 110.4158009371415, 'Bergas Lor', '1722469357_01c0151e2caa0db49587.png'),
(37, 'Kantor Desa Diwak', -7.197490040842171, 110.43031969907487, 'Diwak', '1722469439_efcee4c49c992a680e0d.jpeg'),
(38, 'Kantor Kepala Desa Gebugan', -7.176186776583454, 110.3984961533067, 'Gebugan', '1722469518_5129792a9fbb793b37d4.jpg'),
(39, 'Kantor Balai Desa Jatijajar', -7.20322037350477, 110.43507584423624, 'Jatijajar', '1722470119_657e2381dc9f77c93055.jpeg'),
(40, 'Kantor Kelurahan Karangjati', -7.1827076854508345, 110.42797154151965, 'Karangjati', '1722470291_4cdf368c3f6c05476d1c.jpg'),
(41, 'Kantor Desa Munding', -7.195000793469203, 110.39254894339031, 'Munding', '1722470450_c54d5e4ad0eca313492f.png'),
(42, 'Kantor Kelurahan Ngempon', -7.184225651764225, 110.44020538872695, 'Ngempon', '1722470530_5d66c860280e3be645f1.jpg'),
(43, 'Kantor Kepala Desa Pagersari', -7.180990907458274, 110.40427025773067, 'Pagersari', '1722470634_dc4cbb4ebb99705fb3f3.png'),
(44, 'Kantor Kelurahan Randugunting', -7.216910450879996, 110.43211791536856, 'Randugunting', '1722470860_e842916fcf24f7e7c291.png'),
(45, 'Kantor Desa Wringin Putih', -7.170401615324502, 110.434701103287, 'Wringin Putih', '1722471052_a08dd19da14e9d659f0d.png'),
(46, 'Balai Kelurahan Wujil', -7.175791278058951, 110.41361339199125, 'Wujil', '1722471214_8a808e1c67f4e8b19b82.png'),
(47, 'Kantor Kepala Desa Gondoriyo', -7.157545, 110.468566, 'Gondoriyo', '1722519323_cd286aef163525922b57.jpg'),
(48, 'Pondok Makan \"Sate Pak Har\"', -7.186050551201671, 110.43544556847785, 'Ngempon', '1722565796_b6929da33dbf04e6a348.jpg'),
(49, 'Lodji Londo', -7.185370651026531, 110.42139482976758, 'Sidorejo', '1722566552_c1c40008038b2388700c.png'),
(50, 'Watu Gajah Park', -7.163301649573322, 110.44622906516987, 'Wringin Putih', '1722566966_5faa1e43904124970460.png'),
(51, 'B’nTwoman cafe', -7.179715548760156, 110.43421177210348, 'Karangjati', '1722567314_3fc89714d9f6edf4db6e.jpg'),
(52, 'Lelungan Coffee and Eatery', -7.186172818592957, 110.43579402956618, 'Ngempon', '1722568760_d7c9cbfa314d5e73a45c.png'),
(53, 'PT. Morich Indo Fashion', -7.178156327259103, 110.42211587047846, 'Karangjati', '1722568877_92fc2694f5527fe293e9.jpg'),
(54, 'PT Semarang Garment', -7.175406010104157, 110.41600467072043, 'Wujil', '1722569083_6857260caf602c01bff6.jpg'),
(55, 'PT. Kamaltex Indonesia', -7.186267549132422, 110.43192792342651, 'Karangjati', '1722569197_2e24530d3e2ae2867291.png'),
(56, 'PT. Gratia Husada Farma (HUFA)', -7.1905671186569435, 110.43937030070684, 'Ngempon', '1722569339_2cba4039f9cc54442676.png'),
(57, 'PT. Industri Jamu dan Farmasi Sido Muncul Tbk.', -7.194561447073575, 110.43055004117622, 'Diwak', '1722569508_75f9f3befe64dd0163a9.png'),
(58, 'PT Barlow Tyrie Indonesia', -7.1899268839160495, 110.43996184121403, 'Ngempon', '1722569636_1087a6903a1fddaf49f8.jpg'),
(59, 'PT Taruna Kusuma Purinusa', -7.185719298224671, 110.44080709334982, 'Ngempon', '1722569734_58925a66c0fd4f01c699.png'),
(60, 'PT.INDO MAKMUR FOODS', -7.17893151841479, 110.43440944674454, 'Karangjati', '1722569796_2ed4b9f674660d8114a2.jpeg'),
(61, 'PT JICO AGUNG (MAMASUKA)', -7.176782295984792, 110.42800084121087, 'Karangjati', '1722569959_1a9358ce4c8a1c1c019e.jpg'),
(62, 'Pt. Inko Java', -7.177019560376341, 110.43222670463797, 'Karangjati', '1722570096_46db8dc41fba639618c2.png'),
(63, 'PT. Perindustrian Bapak Djenggot', -7.192538657586506, 110.42544878844697, 'Bergas Kidul', '1722570354_0ed0eb61e5e3a43b3ca0.jpg'),
(64, 'PT. Ara Shoes Indonesia', -7.1796016266640486, 110.42603240010511, 'Karangjati', '1722570463_20a07356cbec151ec6f1.jpg'),
(65, 'PT. Sinar Sosro Ungaran', -7.193817479811084, 110.42018475900359, 'Bergas Kidul', '1722580741_8cc7e4be4644f85aa829.png'),
(66, 'PT. Kepuh Kencana Arum Ungaran', -7.176086213984708, 110.4176019313739, 'Karangjati', '1722580806_ee6b59ee4ee5f8bb9ec1.jpg'),
(67, 'PT. Beverindo Indah Abadi', -7.1926543143894985, 110.42386794714518, 'Bergas Kidul', '1722580932_7ee40ead77faaa0aeb6e.png'),
(68, 'PT LIFE UTAMA INDUSTRIES AND TRADING', -7.1795616266647375, 110.43154341789342, 'Karangjati', '1722581132_e59c76a36f95eba10af0.png'),
(69, 'PT Mikiwa Plastic', -7.17653411459926, 110.42927860562145, 'Karangjati', '1722581299_7b73e9b99c615b497bec.png'),
(70, 'PT. Kurios Utama', -7.200702632544232, 110.42440918232606, 'Jatijajar', '1722581430_cacd757977abef2c7e9c.png'),
(71, 'PT Ungaran Sari Garments', -7.181760806894653, 110.4339446062054, 'Karangjati', '1722581508_27d75bfe05989c22f178.jpg'),
(72, 'PT.SEIDEN STICKER', -7.179444813739562, 110.42638247324709, 'Karangjati', '1722582053_b610b25744fdea5376da.png'),
(73, 'PT Semarang Herbal Indoplant', -7.190843839539679, 110.43083013117472, 'Diwak', '1722582143_582ca791144230c20693.jpg'),
(74, 'PT. Basilliea Indonesia', -7.18648882582067, 110.43703229459483, 'Ngempon', '1722582194_ae752b9b16ac6f25e51c.jpg'),
(75, 'CV. Lestari Albasia Mandiri', -7.178804779602673, 110.43280645900305, 'Karangjati', '1722582287_2ea18af4151556645182.png'),
(76, 'Laksana (PT Laksana Bus Manufaktur)', -7.1729730550262, 110.41648763073232, 'Karangjati', '1722582382_80a5aa1f5a4cbaa034a6.png'),
(77, 'PT. Sam Kyung Jaya Garments', -7.173753810138341, 110.43705480010998, 'Wringin Putih', '1722582449_a1a6c9dc953b59ca65f1.jpg'),
(78, 'PT. Mangkok Mas', -7.185124740826041, 110.44131346393884, 'Ngempon', '1722582756_33ff6ecb137fce1c55cd.png'),
(79, 'PT CHOCOMORY COKELAT PERSADA', -7.185189875550467, 110.44197760011035, 'Ngempon', '1722582976_841282c9d1f29673cf46.png'),
(80, 'PT. Inti Sukses Garmindo', -7.216211814884563, 110.42560673568481, 'Harjosari', '1722583033_439098c2c975157aaa28.jpg'),
(81, 'PT Oro Argento Indonesia.', -7.178738565453555, 110.41995311176262, 'Sikunir', '1722583141_cd7e497dadd6351a76cf.png'),
(82, 'CV. Vina Arya Furniture', -7.178405549004549, 110.42113601789674, 'Karangjati', '1722583301_d553c53ff8c2c5e76b55.png'),
(83, 'PT. FORISA NUSAPERSADA', -7.187959175578412, 110.43131381789861, 'Karangjati', '1722583369_9ff17aeaa7960a615275.jpg'),
(84, 'CV. Jati Kencana (JKB)', -7.1743819269242985, 110.43587537060952, 'Wringin Putih', '1722583536_925ea9f06efec40454d2.png'),
(85, 'PT. Bintang Sidoraya (Ungaran)', -7.200937216117992, 110.42307853374405, 'Randugunting', '1722583688_bc8e150c4fef44132b4d.png'),
(86, 'PT. TKPN', -7.213713425316317, 110.42502427871474, 'Randugunting', '1722583801_7f6103ccb3db450babb8.png'),
(87, 'Morich Indo Fashion', -7.175100050661044, 110.42519399777498, 'Karangjati', '1722583989_27ec02b6551337deab37.png'),
(88, 'PT. Kemilau Ungaran Sukses', -7.180159753149813, 110.4257099706602, 'Karangjati', '1722584055_09b6045a8ee03a160689.png'),
(89, 'Kantor Peralatan BBPJN7 Karangjati Kab. Semarang', -7.182545682074771, 110.42543669830907, 'Karangjati', '1722584123_c9e4c2b16755f4b07954.jpeg'),
(90, 'Kandiarto PT', -7.179093273539343, 110.42659799342681, 'Karangjati', '1722584242_a80db519669ca778726e.png'),
(91, 'PT. Golden Rich Toys Indonesia', -7.211262819061894, 110.42516787678986, 'Randugunting', '1722584452_3a076fc55fa1446b10ce.jpg'),
(92, 'PT Java Egg Specialities (JESS)', -7.187688118594721, 110.44028561789553, 'Ngempon', '1722584531_659fa6a3c209fb77407b.jpg'),
(93, 'PT. Jintuo Garment Indonesia', -7.2088565622482905, 110.42454882955208, 'Jatijajar', '1722584609_ec7b7a4bcd6935b1d58f.png'),
(94, 'PT. Hesed Indonesia', -7.178842236637633, 110.42322973215278, 'Gembongan', '1722584801_a5ecf3a35662d1af2dd1.png'),
(95, 'PT JAYA ABADI SEMARANG PERKASA', -7.185857577875616, 110.44070941998221, 'Ngempon', '1722584959_a1b61e39d6177a1af085.jpg'),
(96, 'Indomaret Bergas (F41C)', -7.1859227432056585, 110.42931522071366, 'Karangjati', '1722603168_0a3cdeca1aa8012f01f6.jpg'),
(97, 'Indomaret Soekarno Hatta 29', -7.184784457379136, 110.42707809950838, 'Karangjati', '1722603630_c577fe453bc9b6d988b4.jpeg'),
(98, 'Indomaret Ngempon', -7.185612583837182, 110.43730534121423, 'Ngempon', '1722603718_607bdc5af3b0f7bf7f42.png'),
(99, 'Indomaret soekarno-hatta 09', -7.178856249011902, 110.4214764884492, 'Gembongan', '1722605131_72b48e5769373784bd14.jpg'),
(100, 'Indomaret Bergas Lor', -7.18731598620337, 110.41506619166223, 'Bergas Lor', '1722605213_fbd73a05ff74a944aafa.jpg'),
(101, 'Indomaret Lemahabang', -7.176599382391967, 110.41853975490409, 'Bergas Lor', '1722605340_4843c484d4ec15444129.jpg'),
(102, 'Indomaret Bergas Kidul', -7.193842973884141, 110.40934860034261, 'Bergas Kidul', '1722605431_83cf871a0936688eff57.jpg'),
(103, 'Indomaret Randugunting', -7.212043241059938, 110.42483387126234, 'Randugunting', '1722605534_b3d2878e4ff5286492ff.png'),
(104, 'Alfamart Karangjati 2', -7.181512526717685, 110.42454594121148, 'Karangjati', '1722605622_cf1db3c712f6aed611ad.png'),
(105, 'Alfamart Karangjati 1', -7.185889598871111, 110.42884997966576, 'Karangjati', '1722633957_210aac112d0be6e3ccb9.png'),
(106, 'Toko Sedjati Karangjati', -7.184656105199645, 110.42686892279046, 'Karangjati', '1722634019_68824a68999be8a1d9a0.jpg'),
(107, 'Alfamart Bergas Lor', -7.180732902246329, 110.41599253410129, 'Bergas Lor', '1722634157_3b9bdf6d780d04d02dd6.jpg'),
(108, 'Kurnia II Grosir & Retail', -7.185193403918877, 110.43043343652354, 'Karangjati', '1722634356_9037936f107ecf2c00c3.jpg'),
(109, 'SDIT Cahaya Ummat Karangjati Kec Bergas', -7.1834166360123985, 110.43133576878286, 'Karangjati', '1722634434_fdec3844863e84cc9aad.jpg'),
(110, 'SMA Negeri 1 Bergas', -7.19084623250752, 110.42528085544072, 'Bergas Kidul', '1722636354_055b394abc6ffc62e101.png'),
(111, 'MTS Al-Uswah Bergas', -7.18444134910259, 110.42546768232114, 'Bergas Kidul', '1722636428_1d16511f5709f4ad863a.jpg'),
(112, 'SMP Kanisius Girisonta', -7.191279449226163, 110.42596707126059, 'Bergas Lor', '1722636474_0ef99717fd329df15098.png'),
(113, 'SD Kanisius Girisonta', -7.189029808314413, 110.42672989330072, 'Bergas Lor', '1722636904_c279b18e5a00d137801d.png'),
(114, 'SMP Negeri 1 Bergas', -7.178240671376649, 110.4258043178992, 'Karangjati', '1722637010_dd786e448f01d6b69ee5.png'),
(115, 'SMP NEGERI 2 BERGAS', -7.180288979622687, 110.41545542955616, 'Bergas Lor', '1722637485_14242fc9f08fd81b330e.jpg'),
(116, 'SD Negeri Bergas Lor 1', -7.186780726867984, 110.42710884121122, 'Bergas Lor', '1722637526_cc34268d81e50472bf7d.jpg'),
(117, 'MI Arrosyad', -7.188768275742881, 110.41310224141401, 'Bergas Lor', '1722637626_c2333c00a57fbbe248a4.png'),
(118, 'SD Negeri Ngempon 2', -7.185388019891155, 110.43995001844793, 'Ngempon', '1722637666_9d09b131285ff7e153d4.jpg'),
(119, 'SMP PGRI Bergas', -7.178566063158247, 110.42663643569009, 'Karangjati', '1722637758_8d4afe7679b1b89158bd.png'),
(120, 'SD Negeri Bergas Lor 2', -7.182187140811874, 110.4150824117705, 'Bergas Lor', '1722644693_a95b2a36c76b695edfa4.png'),
(121, 'Sekolah Dasar Negeri Karangjati 01', -7.178453673659649, 110.42639688784453, 'Karangjati', '1722644801_a46e804ebc41d1ede72e.png'),
(122, 'KB/TK SANTA ANNA', -7.188773613005117, 110.42659692521771, 'Bergas Lor', '1722644986_4e9355afd2f8d7bf872d.png'),
(123, 'SD Negeri Karangjati 03', -7.178057819272469, 110.43436135362437, 'Karangjati', '1722645058_d5e1c2708f0ffe75b1a7.png'),
(124, 'SD Negeri Pagersari 02', -7.184866549110375, 110.40182821176823, 'Pagersari', '1722645174_04e794ace7e70b4bb163.png'),
(125, 'SD NEGERI MUNDING', -7.19475468817027, 110.39267618112596, 'Munding', '1722645237_cc002caacca310aed92e.jpg'),
(126, 'SMP Darussalam', -7.173373784386882, 110.3994462926785, 'Gebugan', '1722645408_4f5341f44bb36a98b9c3.png'),
(127, 'SDN Bergas Kidul 04', -7.201107135703653, 110.41341668291403, 'Bergas Kidul', '1722645475_c114f9a47910d3c83db4.png'),
(128, 'SMK Kesehatan Darussalam Bergas', -7.173491126486829, 110.39956009397703, 'Gebugan', '1722645574_27c1d72b2137db4909cc.png'),
(129, 'SDN RANDUGUNTING', -7.217666572851542, 110.43040499827235, 'Randugunting', '1722645679_60bd09cffeef07b566b9.png'),
(130, 'SDN Diwak', -7.197180061226877, 110.43005937553406, 'Diwak', '1722645781_c54261bd714068a7dbb8.png'),
(131, 'Sekolah Dasar Negeri Wringin Putih 1', -7.170550536530195, 110.43867767584858, 'Wringin Putih', '1722645904_2ea7886a32344c7d1a7a.png'),
(132, 'SDN Wringinputih 03', -7.166959594553112, 110.44678160688728, 'Wringin Putih', '1722646030_2e0cb0bfaccf25de64ff.png'),
(133, 'SD WRINGIN PUTIH 02', -7.165137432566912, 110.44363211730334, 'Wringin Putih', '1722646143_1488d79796d7fcaee863.png'),
(134, 'SDN GEBUGAN 01', -7.173576816552249, 110.40253228689068, 'Gebugan', '1722646260_33ca25f011d94d40fea7.png'),
(135, 'SDN Gebugan 02', -7.182097991296491, 110.39585428233924, 'Gebugan', '1722647047_c249c94c744c19523024.png'),
(136, 'SD Negeri Gebugan 03', -7.17826228373554, 110.39724673344517, 'Gebugan', '1722647102_b3026c9b8d4fe22ea8b6.jpeg'),
(137, 'SD Negeri Gondoriyo 02', -7.150525529699615, 110.47045935599166, 'Gondoriyo', '1722647245_e70f23f864d047f59f54.png'),
(138, 'SD Negeri Gondoriyo 03', -7.157271652665052, 110.46946994121355, 'Gondoriyo', '1722647326_53a2459591db7fc9a117.png'),
(139, 'SD Negeri Ngempon 01', -7.186072202513809, 110.43761790362373, 'Ngempon', '1722647752_104033f709d9360f147d.jpeg'),
(140, 'SDN Bergaskidul 01', -7.191608675612729, 110.41584008845192, 'Bergas Kidul', '1722647916_b2c60f24edecf9915ca3.png'),
(141, 'SDN Pagersari 01', -7.181360980472403, 110.40403310996982, 'Pagersari', '1722648032_b2fd4f25052b92d7fda9.png');

-- --------------------------------------------------------

--
-- Table structure for table `tempat_ibadah`
--

CREATE TABLE `tempat_ibadah` (
  `id` int(11) NOT NULL,
  `nama_ti` varchar(255) NOT NULL,
  `latitude_ti` double NOT NULL,
  `longitude_ti` double NOT NULL,
  `kelurahan_ti` varchar(255) NOT NULL,
  `gambar_ti` varchar(255) NOT NULL,
  `type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tempat_ibadah`
--

INSERT INTO `tempat_ibadah` (`id`, `nama_ti`, `latitude_ti`, `longitude_ti`, `kelurahan_ti`, `gambar_ti`, `type`) VALUES
(29, 'Gereja Kristen Jawa ngempon', -7.186097050147365, 110.43169496451524, 'Karangjati', 'gereja ngempon 1.jpg', 'Gereja Kristen'),
(30, 'Gereja Pantekosta Ngempon', -7.185646292357036, 110.4381655633093, 'Ngempon', 'gereja ngempon 2.jpg', 'Gereja Kristen'),
(38, 'Masjid Al Ikhlas', -7.18477554630037, 110.43353968750185, 'Klego, Karangjati', '1720846192_deddad048f5ed8e34f9c.jpg', 'Mushola/Masjid'),
(39, 'Mushola Al-Alim Ngempon', -7.185276312647485, 110.43879132993207, 'Ngempon', '1720846840_ff6e406e81629feb8f47.jpg', 'Mushola/Masjid'),
(40, 'Masjid Baiturrokhim', -7.179614683511949, 110.42939542772866, 'Ngimunanjaran', '1722027886_20ab5512cc178b5668a2.jpg', 'Mushola/Masjid'),
(41, 'masjid At-Taqwa', -7.184387377243823, 110.42535832874209, 'Karangjati', '1722378771_b84a1fa242202abc2368.png', 'Mushola/Masjid'),
(42, 'Masjid Al Hidayat', -7.188830100285961, 110.426245428631, 'Sidorejo', '1722379334_84582af38df4e1aed1f3.png', 'Mushola/Masjid'),
(43, 'Masjid LDII Al Maruf', -7.1846710714098965, 110.42462224734675, 'Sidorejo', '1722379445_b8b7ec6c1ffe858b3760.png', 'Mushola/Masjid'),
(44, 'Musholla Al Ishlah', -7.1865664303485035, 110.43105855076904, 'Karangjati', '1722379566_03a07cf44a0127a3e62d.png', 'Mushola/Masjid'),
(45, 'Masjid Baitul Maghfiroh', -7.184377926796818, 110.43979396452974, 'Ngempon', '1722379752_291b96b04b3b2f15634d.png', 'Mushola/Masjid'),
(47, 'Mushola Baitul Mutawakkilin', -7.183014782116339, 110.42666282894807, 'Karangjati', '1722380060_5fed483c8c8c109a2a9c.png', 'Mushola/Masjid'),
(49, 'Masjid Jami\'atul Abidin', -7.188717473201654, 110.41218166697324, 'Ngempon', '1722380404_c8afaa97e4c9eac44d2e.png', 'Mushola/Masjid'),
(50, 'Masjid Baitusy Syukur', -7.194205323904482, 110.42251179581477, 'Kenangkan', '1722380493_5c0f7c7385b83f4a9b05.png', 'Mushola/Masjid'),
(51, 'Masjid PT Citra Jepara', -7.177601554947393, 110.43587461790423, 'Congol', '1722380717_5427e48303c240e98ed8.png', 'Mushola/Masjid'),
(52, 'Mushola Al-Hidayah 1', -7.187448348469373, 110.42574999395032, 'Sidorejo', '1722380878_23af18fb09cdb001db62.png', 'Mushola/Masjid'),
(53, 'Masjid Darussalam', -7.177667087798909, 110.42454954121305, 'Gembongan', '1722381043_24c7439c14c4f19a06f8.png', 'Mushola/Masjid'),
(54, 'Masjid Baitul Muttaqin', -7.175111357138924, 110.42774950010657, 'Ngrowo Karangjati', '1722381259_50c38898589a728d8d4d.png', 'Mushola/Masjid'),
(55, 'Masjid Miftahul Faroh Dusun Beji Bergas Lor', -7.18284972675513, 110.4143968823179, 'Krajan', '1722381754_a1c44cb0a37790eece6e.png', 'Mushola/Masjid'),
(56, 'Masjid Darul Muttaqin', -7.1794436266621755, 110.43837947678698, 'Congol', '1722381854_6c2d0acd874a6c5344c2.png', 'Mushola/Masjid'),
(57, 'Mushola Ar Rohman,Klego', -7.185553626835936, 110.43551334733988, 'Ngempon', '1722382806_c8d4eefa15f495a6326a.png', 'Mushola/Masjid'),
(58, 'Masjid Baituttaqwa Lemahbang', -7.1703594103436386, 110.42432660135037, 'Karangjati', '1722382984_44faf176a8a018c46ab6.png', 'Mushola/Masjid'),
(59, 'Masjid Jami\'atul Muttaqin', -7.188939426928302, 110.41474675287093, 'Krajan', '1722383077_b259d054fb5077dd1020.png', 'Mushola/Masjid'),
(60, 'Mushola Nurul Iman', -7.1843706045472695, 110.4235839479202, 'Sidorejo', '1722383158_f696e07304139f4b8310.png', 'Mushola/Masjid'),
(61, 'Masjid Al Muttaqin', -7.1759663366348745, 110.41834398606952, 'Gembongan', '1722383403_edbeee0dc50b7370bd8b.png', 'Mushola/Masjid'),
(62, 'Masjid Baitul Aziz(LDII)', -7.198152222998108, 110.42479768844768, 'Kemloko', '1722383547_e0bb538318ecea2496cf.png', 'Mushola/Masjid'),
(63, 'Masjid AQSHO', -7.169500589711138, 110.43196943330756, 'Wringin Putih', '1722383652_34237b7d6defdaf645b0.png', 'Mushola/Masjid'),
(64, 'Masjid Baitul Qudus', -7.192139104811239, 110.41192698844331, 'Krajan', '1722383967_36e9cb3419faf498f6b3.png', 'Mushola/Masjid'),
(65, 'Musholla Al Hidayah', -7.182196118484064, 110.42972997066049, 'Karangjati', '1722384102_900599525daa41c57cd7.png', 'Mushola/Masjid'),
(66, 'Masjid Darul Fitrah', -7.189578692269023, 110.41424597673515, 'Pagersari', '1722384380_6dcde83c6f30d31e7d03.png', 'Mushola/Masjid'),
(67, 'MASJID AL BAROKAH', -7.198336018800777, 110.42992412342576, 'Jatijajar', '1722384551_26386fa33f54ec86f6cc.png', 'Mushola/Masjid'),
(68, 'Masjid Nurul Iman', -7.195025191609433, 110.42429452198499, 'Kemloko', '1722384737_f5815ced772b62ff379f.png', 'Mushola/Masjid'),
(69, 'Masjid Al - Huda', -7.209028495924886, 110.42719562570325, 'Jatijajar', '1722384819_3b61396cde1db3798029.png', 'Mushola/Masjid'),
(70, 'Masjid mambaul huda saren jatijajar', -7.201842735410564, 110.43291180677117, 'Jatijajar', '1722385589_e47dab2b060f27557210.png', 'Mushola/Masjid'),
(71, 'Masjid al hidayah begajah', -7.2036964589283965, 110.4298602933899, 'Jatijajar', '1722385964_7a86929948bbb7b3e310.png', 'Mushola/Masjid'),
(73, 'Masjid Jami,atul Muttaqin', -7.191595644327511, 110.4078402713652, 'Pondansari', '1722386281_5f92f246ddd914ae80be.png', 'Mushola/Masjid'),
(74, 'Masjid Al Madinah', -7.2038055851645035, 110.42421803551544, 'Jatijajar', '1722386452_7e1970cc88852ccb851c.png', 'Mushola/Masjid'),
(75, 'Masjid Al Barokah', -7.1962648228847375, 110.40237977134437, 'Sruwen', '1722386600_d5b49efe8f711210f92a.png', 'Mushola/Masjid'),
(76, 'Masjid Ar Rahman', -7.211777627449426, 110.4244627289899, 'Randugunting', '1722386738_325021f6b8debabac0cd.png', 'Mushola/Masjid'),
(77, 'Masjid Baitus Salaam', -7.187170432183296, 110.4158230357131, 'Krajan', '1722386922_5964ff10f8ce343264cc.png', 'Mushola/Masjid'),
(78, 'Masjid Roudhotul Muttaqin', -7.190586056363328, 110.41002345004854, 'Pondansari', '1722387216_f6f02b13e2185c8a56a1.png', 'Mushola/Masjid'),
(79, 'Masjid Sabilurrosad Jatijajar', -7.202646878792919, 110.43699001364716, 'Jatijajar', '1722387391_c2a186fddc25f7592d10.png', 'Mushola/Masjid'),
(80, 'Mushola Al-Buqatul Mubarokah', -7.1906094331469435, 110.41476487146782, 'Krajan', '1722387549_00f234c86bab2c7fe169.png', 'Mushola/Masjid'),
(81, 'Masjid Baitul Hidayah', -7.201074357421848, 110.4117037778594, 'Srubung', '1722388017_24aa886bac65e6839fba.png', 'Mushola/Masjid'),
(82, 'Masjid Al Barkah', -7.182684331966188, 110.40260233069466, 'Pagersari', '1722388425_a6c9cf7173e77ccec2c8.png', 'Mushola/Masjid'),
(83, 'Masjid An-Nur Srumbung', -7.205181997408753, 110.4138286868283, 'Srumbung', '1722389604_1db1f6c911676a06cafc.png', 'Mushola/Masjid'),
(84, 'Masjid Sruwen', -7.198985707701597, 110.40473270613012, 'Kebon Kliwon', '1722389772_38274e003655e7013eda.png', 'Mushola/Masjid'),
(85, 'Masjid Al Baroka', -7.196805151765716, 110.40002697059967, 'Munding', '1722390001_92a9ee52bdf6a7f11c48.png', 'Mushola/Masjid'),
(86, 'Mushola Wetan RT 01', -7.198526992958797, 110.4058091216201, 'Sruwen', '1722390220_353c5e4fa7ae8484fd86.png', 'Mushola/Masjid'),
(87, 'Mushola Al Huda', -7.193030920527025, 110.41407221822499, 'Krajan', '1722390366_30bd4d4f04ef3f2cad27.png', 'Mushola/Masjid'),
(88, 'Masjid Wahyu Kalibelang', -7.1754971378292325, 110.40669466921895, 'Wujil', '1722390896_af3bccf73d7f7de94170.png', 'Mushola/Masjid'),
(89, 'Mushola Baitus Sujud', -7.1907779269423795, 110.41365981768922, 'Krajan', '1722391029_c348df8ef68806f57577.jpeg', 'Mushola/Masjid'),
(90, 'Masjid Baitussalam', -7.182381790083219, 110.39502024219595, 'Gebugan', '1722391129_1fb1052e74870bd6dfab.png', 'Mushola/Masjid'),
(91, 'MASJID Baitussholah', -7.192835735194996, 110.40266821857188, 'Pagersari', '1722391298_a606a53c2fb16262c851.png', 'Mushola/Masjid'),
(92, 'Masjid Wahyu Al Ikhlas', -7.172637323424906, 110.40806264458115, 'Setinggen', '1722405851_4c2d6522e4bb08c2204c.png', 'Mushola/Masjid'),
(93, 'Mushola Al-furqon', -7.178031667268376, 110.43640560624166, 'Congol', '1722406038_a8fd1189b8a598740797.png', 'Mushola/Masjid'),
(94, 'Masjid Jami\' Baitul Muslimin Wujil', -7.172073383520478, 110.41093998926661, 'Wujil', '1722406158_0ccf85bcd1ba352b7a97.png', 'Mushola/Masjid'),
(95, 'Masjid Ittihadul Muttaqin', -7.142421192824764, 110.46482851219768, 'Kambangan', '1722406291_9e51421aa0298935ce59.png', 'Mushola/Masjid'),
(96, 'Masjid \'Baitul Muttaqin\' Lingkungan Kolang-kaling', -7.173506410120468, 110.41335056946917, 'Wujil', '1722406386_6db7bb2f74bc8cb59c14.png', 'Mushola/Masjid'),
(97, 'Masjid Mujahidin', -7.217903289177142, 110.43179334496764, 'Randugunting', '1722408691_d20dbdc3fcb43831dd08.png', 'Mushola/Masjid'),
(98, 'Masjid Baitulmuqorrobin', -7.174012171354619, 110.39986628845213, 'Gebugan', '1722408936_e4e15eaa9f2013ca112e.png', 'Mushola/Masjid'),
(99, 'Masjid Darul Ulya', -7.178572953587189, 110.44244197004417, 'Wringin Putih', '1722409138_fc239292ca6281434ad8.png', 'Mushola/Masjid'),
(100, 'Masjid Roudhotul Muttaqien', -7.194001883982827, 110.39103841117034, 'Munding', '1722409299_53db15f1a78c0616fdd8.jpg', 'Mushola/Masjid'),
(102, 'Masjid Darussalam', -7.184190624254585, 110.39979549160739, 'Pagersari', '1722409632_419945653818f7b7bd97.jpg', 'Mushola/Masjid'),
(103, 'Musholla Baitussalam', -7.176557579569606, 110.42458424121568, 'Gembongan', '1722409951_f55e1e4e49e923fffe30.png', 'Mushola/Masjid'),
(104, 'Masjid Roudhotul Muttaqin', -7.179057834360719, 110.41008899399459, 'Wujil', '1722410144_41b8a544c5b9afae026a.jpg', 'Mushola/Masjid'),
(105, 'Musholla Nurul Jannah', -7.175298195951783, 110.41041418351543, 'Wujil', '1722410199_77a94e22591b39e4f2b6.jpg', 'Mushola/Masjid'),
(106, 'Mushola Albarkah ', -7.174660667495178, 110.42547192641713, 'Gembongan', '1722410284_e1b5d2c657b86bb081cc.jpeg', 'Mushola/Masjid'),
(107, 'Masjid AN-NUR', -7.178860169568638, 110.40436362342093, 'Wujil', '1722410505_1f839409e1e2c9684131.png', 'Mushola/Masjid'),
(108, 'Mushola An-Nur Lempuyang', -7.186737989756542, 110.38639987439154, 'Lempuyang', '1722410636_54c4b5d74c5716106370.jpeg', 'Mushola/Masjid'),
(109, 'masjid sabillul hudha Lempuyangan', -7.185503221872027, 110.38579899176186, 'Gebugan', '1722410685_e4039f212c693ec229ce.png', 'Mushola/Masjid'),
(110, 'Masjid besar NU Ngempon', -7.190135, 110.435807, 'Ngempon', '1722459584_346148b80e7313aa9567.jpg', 'Mushola/Masjid'),
(111, 'Mushola Bismillahirrohmaanirrohiim', -7.189102, 110.434567, 'Ngempon', '1722459716_53d45f02662de36cc7a2.jpg', 'Mushola/Masjid'),
(112, 'Mushola Darul Iman', -7.191293, 110.434749, 'Ngempon', '1722459831_b6b653efad1cd7e56bc3.jpg', 'Mushola/Masjid'),
(113, 'Mushola Al Hasan', -7.179056, 110.427588, 'Ngimunanjaran', '1722459947_5b1acb5c92ed07c2bf65.jpg', 'Mushola/Masjid'),
(114, 'Mushola Istiqomah', -7.177645, 110.409957, 'Wujil', '1722460051_78e05339c9895412dde6.jpg', 'Mushola/Masjid'),
(115, 'Mushola Pemandian Makam Mbah Bubak', -7.18044, 110.410975, 'Wujil', '1722460158_72a7c340376e34003152.jpg', 'Mushola/Masjid'),
(116, 'Mushola Pagersari 1', -7.187903, 110.403096, 'Pagersari', '1722460244_00f67329143d0d320545.jpg', 'Mushola/Masjid'),
(117, 'Mushola At Taubah ', -7.189774, 110.403156, 'Pagersari', '1722460504_568f666f6d783ef713a6.jpg', 'Mushola/Masjid'),
(118, 'Mushola Anur Hikmah', -7.185228, 110.402118, 'Pagersari', '1722460612_0456641240b7cdfe4c1f.jpg', 'Mushola/Masjid'),
(119, 'Mushola Hijau', -7.172474, 110.414246, 'Wujil', '1722460762_270b99e3ef4122af5ac0.jpg', 'Mushola/Masjid'),
(120, 'Mushola Nurul Yaqin', -7.175932, 110.413915, 'Wujil', '1722460857_d750029d8c700365e86c.jpg', 'Mushola/Masjid'),
(121, 'Masjid MDT Nurul Janah', -7.175325, 110.41037, 'Wujil', '1722460983_bc6c1a264b0fcf4f72da.jpg', 'Mushola/Masjid'),
(122, 'Mushola Wujil 1', -7.177209, 110.409256, 'Wujil', '1722461106_cdcd5f0cef8f0218d85b.jpg', 'Mushola/Masjid'),
(123, 'Mushola Baitus Syukur', -7.176902, 110.406551, 'Wujil', '1722461238_120ab17cef5038a157a7.jpg', 'Mushola/Masjid'),
(124, 'Mushola Al-Ikhlas', -7.173784, 110.401669, 'Gebugan', '1722461327_fbe7b84e84f78a007731.jpg', 'Mushola/Masjid'),
(125, 'Mushola Nurul Huda', -7.176162, 110.398897, 'Gebugan', '1722461611_1e97068a8284d6bc001c.jpg', 'Mushola/Masjid'),
(126, 'Mushola Pojok', -7.183618, 110.389896, 'Gebugan', '1722461810_204979c85703cd20c648.jpg', 'Mushola/Masjid'),
(127, 'Masjid Gebugan 2', -7.184018, 110.393363, 'Gebugan', '1722461894_331729159c3d0dfe887a.jpg', 'Mushola/Masjid'),
(128, 'Mushola SDN Gebugan 2', -7.182241, 110.395742, 'Gebugan', '1722461978_7946620e50017b5ae15f.jpg', 'Mushola/Masjid'),
(129, 'Masjid Nurul Huda Tegalmelik', -7.179625, 110.396834, 'Tegalmelik', '1722462081_42c9a13e2232d316b69a.jpg', 'Mushola/Masjid'),
(130, 'Mushola Nurul Hidayah Gebugan', -7.176203, 110.398606, 'Gebugan', '1722462177_198b5b1b73e5c56f1f17.jpg', 'Mushola/Masjid'),
(131, 'Mushola Gebugan 1', -7.173279, 110.400948, 'Gebugan', '1722462253_f25085f4444fbc4af77b.jpg', 'Mushola/Masjid'),
(132, 'Gereja Pantekosta di Indonesia karangJati', -7.177655004219662, 110.42693110499935, 'Karangjati', '1722462659_1de20098c86055a08256.png', 'Gereja Kristen'),
(133, 'Gereja Katolik Paroki St. Stanislaus Girisonta', -7.188037651931768, 110.42718542511558, 'Karangjati', '1722465029_dfda2284d990df63c105.png', 'Gereja Katholik'),
(134, 'Mushola Bergas 1', -7.188135, 110.414704, 'Bergas Lor', '1722505684_ec08a210f260c2cae6b9.jpg', 'Mushola/Masjid'),
(135, 'Gereja Kristen Protestan Maranetha 1', -7.195585, 110.402924, 'Bergas Kidul', '1722505814_18f7bf915e2957ca9c09.jpg', 'Gereja Kristen'),
(136, 'Masjid Miftakhul Jannah', -7.199069, 110.404837, 'Bergas Kidul', '1722505924_d27a7c42074c50697800.jpg', 'Mushola/Masjid'),
(137, 'Masjid Al Barokah', -7.199198, 110.403863, 'Bergas Kidul', '1722506016_43de7dd3dd235ba3055a.jpg', 'Mushola/Masjid'),
(138, 'Masjid Sruwen 2', -7.20066, 110.403825, 'Bergas Kidul', '1722506107_38a5cf738c3c0256f74e.jpg', 'Mushola/Masjid'),
(139, 'Masjid Baitul Hidayah', -7.201052, 110.411537, 'Bergas Kidul', '1722506183_843c6e597fcfb1685834.jpg', 'Mushola/Masjid'),
(140, 'Mushola Nurul Falah', -7.182919, 110.42104, 'Bergas Lor', '1722506279_e89eabb75de908ea60dd.jpg', 'Mushola/Masjid'),
(141, 'Mushola Nurulfalah', -7.181992, 110.417914, 'Bergas Lor', '1722506382_588bbe2d20a6f4844a0b.jpg', 'Mushola/Masjid'),
(142, 'Mushola Miftachul Jannah', -7.181605, 110.416557, 'Bergas Lor', '1722506725_51eb56761909f1e456fb.jpg', 'Mushola/Masjid'),
(143, 'Mushola Tegalsari Kuning', -7.184435, 110.42375, 'Bergas Lor', '1722506818_5348545cba66e4ff0a5c.jpg', 'Mushola/Masjid'),
(144, 'Masjid Nurul Bakrih', -7.185739, 110.423053, 'Bergas Lor', '1722506901_49050309d1daa27c9416.jpg', 'Mushola/Masjid'),
(145, 'Mushola Al Falah', -7.174022, 110.436672, 'Wringin Putih', '1722507003_bba9f6608b5ac2feb5e1.jpg', 'Mushola/Masjid'),
(146, 'Masjid Aqsho 2', -7.172524, 110.437388, 'Wringin Putih', '1722507121_e03ed7a0bf28d1e6ae2f.jpg', 'Mushola/Masjid'),
(147, 'Mushola Darun Najah', -7.169614, 110.433755, 'Wringin Putih', '1722507211_cdf182354235d81c2aa5.jpg', 'Mushola/Masjid'),
(148, 'Mushola Makanul Karomah', -7.17028, 110.435657, 'Wringin Putih', '1722507308_95e360e57c8ee51bb704.jpg', 'Mushola/Masjid'),
(149, 'Mushola Nur Hidayatulloh', -7.17014, 110.439101, 'Wringin Putih', '1722507379_61a57eee81651082de20.jpg', 'Mushola/Masjid'),
(150, 'Masjid Choirul Huda', -7.165339, 110.441594, 'Wringin Putih', '1722507453_4ddbd4b741503891adb3.jpg', 'Mushola/Masjid'),
(151, 'Mushola Al Ikhlash', -7.153609, 110.469251, 'Gondoriyo', '1722507532_75e42a30f2d12242863a.jpg', 'Mushola/Masjid'),
(152, 'Masjid Nurul Huda Jimbaran Gondoriyo', -7.156226, 110.468952, 'Gondoriyo', '1722519413_6ed3989d0732216372ed.jpg', 'Mushola/Masjid'),
(153, 'Masjid Baitul Muttaqiin', -7.179874, 110.432696, 'Karangjati', '1722519690_ff90e8ca8eb9967ab2f1.jpg', 'Mushola/Masjid'),
(154, 'Masjid Imamul Muttaqin', -7.194771, 110.426828, 'Bergas Kidul', '1722519789_2e45a9db28a774c87d3f.jpg', 'Mushola/Masjid'),
(155, 'Masjid Al-Madinah', -7.203472, 110.424075, 'Jatijajar', '1722519879_6a59ff79e71e0bbecac2.jpg', 'Mushola/Masjid'),
(156, 'Mushola Sepalu', -7.204969, 110.426099, 'Jatijajar', '1722519975_7cd9853c1cc9d7ee038e.jpg', 'Mushola/Masjid'),
(157, 'Masjid Begajah', -7.204149, 110.42997, 'Jatijajar', '1722520058_cf0d09b228f8f8fb19ff.jpg', 'Mushola/Masjid'),
(158, 'Kapel Santo Yusuf Pekerja Begajah', -7.204144, 110.43002, 'Jatijajar', '1722520135_493500d51e8f153ed27a.jpg', 'Gereja Katholik'),
(159, 'Masjid Al Badriyah', -7.204144, 110.43002, 'Jatijajar', '1722520231_50304d0cd5e8fa0d779f.jpg', 'Mushola/Masjid'),
(160, 'Mushola Perempatan Jatijajar', -7.202638, 110.436132, 'Jatijajar', '1722520343_f472f62cd89aec9bd595.jpg', 'Mushola/Masjid'),
(161, 'Masjid Sabilurrosad', -7.202828, 110.437143, 'Jatijajar', '1722520689_0697c2daccb15c39196e.jpg', 'Mushola/Masjid'),
(162, 'Mushola Saren', -7.206455, 110.432662, 'Jatijajar', '1722520823_6f97857d7a73525fe8b2.jpg', 'Mushola/Masjid'),
(163, 'Mushola Begojuh', -7.209526, 110.42566, 'Jatijajar', '1722521110_24f0647b5bcf2a941742.jpg', 'Mushola/Masjid'),
(164, 'Masjid Istiqomah', -7.215655, 110.427817, 'Randugunting', '1722521238_84e65b102ebd41788c58.jpg', 'Mushola/Masjid'),
(165, 'Mushola As Sujud', -7.208878, 110.437584, 'Jatijajar', '1722521322_6670e0410e8dd570e11c.jpg', 'Mushola/Masjid'),
(166, 'Masjid Baitul Muttaqin Senden', -7.206645, 110.428615, 'Jatijajar', '1722521500_ab70a5ab9b96d740ce9f.jpg', 'Mushola/Masjid'),
(167, 'Mushola Al Muslim', -7.208501, 110.426016, 'Jatijajar', '1722521579_81b09599311a9212506d.jpg', 'Mushola/Masjid'),
(168, 'Masjid Irsyadul I\'baad', -7.194962, 110.434198, 'Diwak', '1722521690_f32e188fbad211b32854.jpg', 'Mushola/Masjid'),
(169, 'Mushola Nurul Huda', -7.194057, 110.432992, 'Diwak', '1722521762_f3f2e059a4033ecd6382.jpg', 'Mushola/Masjid'),
(170, 'Mushola Miftakhul Huda', -7.190685, 110.43787, 'Ngempon', '1722521886_366bd0641529bbc78c91.jpg', 'Mushola/Masjid'),
(171, 'Mushola RT03 Kambangan', -7.156032618010331, 110.47056236942379, 'Gondoriyo', '1722560985_529889ee0a9a1c704f60.png', 'Mushola/Masjid'),
(172, 'Musholla Al Muwahidin', -7.157116309960694, 110.47001809457983, 'Gondoriyo', '1722561092_bde6af5828bbff07e2f0.jpeg', 'Mushola/Masjid'),
(173, 'Mushola Al Mubarok', -7.149799348523491, 110.4686440295557, 'Gondoriyo', '1722561160_decfdf1ba9663aa9481f.jpeg', 'Mushola/Masjid'),
(174, 'Musholla Sabilul Najah', -7.160809985768276, 110.4705769799497, 'Gondoriyo', '1722561247_27e40467e2adba5adb56.jpeg', 'Mushola/Masjid'),
(175, 'Mushola Al Muachidin', -7.179262063561494, 110.44003819773897, 'Wringin Putih', '1722561517_c31a636fc064e8eb2395.png', 'Mushola/Masjid'),
(176, 'Mushola Nurul Huda Pluwang', -7.1688362634030325, 110.4598602245668, 'Wringin Putih', '1722561619_a678f17365db7a765f65.jpeg', 'Mushola/Masjid'),
(177, 'Mushola Nurul Hikmah', -7.17350777763032, 110.39837664551496, 'Gebugan', '1722561892_0632019df853f9570000.jpeg', 'Mushola/Masjid'),
(178, 'Mushola Al-Hikmah', -7.181282931806387, 110.39869250424684, 'Gebugan', '1722562116_8a95343f2076895d8696.png', 'Mushola/Masjid'),
(179, 'Mushola Al-Wagiman', -7.148332350934265, 110.4652912740489, 'Gondoriyo', '1722562349_1c15b462fefd0429c7f2.jpeg', 'Mushola/Masjid'),
(180, 'Mushola Al Hikmah', -7.173427614903201, 110.40571263500247, 'Wujil', '1722562457_b08bdc1e378e8b60d4e0.png', 'Mushola/Masjid'),
(181, 'Musholla Al Hadi', -7.186771638465886, 110.43798498072465, 'Ngempon', '1722562564_c5c3d13d9c8975f079bf.png', 'Mushola/Masjid'),
(183, 'Masjid Ad-Da\'wah', -7.185508433833559, 110.42904926500405, 'Karangjati', '1723100720_a1127aa5fabfc97d5b44.jpg', 'Mushola/Masjid'),
(185, 'nyobak', -7.16830116531324, 110.44987383237475, 'mbuhh', '1723120866_8fa31af25af58597e17f.jpg', 'Gereja Kristen');

-- --------------------------------------------------------

--
-- Table structure for table `titik_perbatasan`
--

CREATE TABLE `titik_perbatasan` (
  `id` int(11) NOT NULL,
  `nama_tp` varchar(255) NOT NULL,
  `latitude_tp` double NOT NULL,
  `longitude_tp` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `titik_perbatasan`
--

INSERT INTO `titik_perbatasan` (`id`, `nama_tp`, `latitude_tp`, `longitude_tp`) VALUES
(16, 'Batas 1', -7.127029382716616, 110.46236886539914),
(17, 'Batas 2', -7.137125623221016, 110.45854646030988),
(18, 'Batas 3', -7.148027399656837, 110.4535686571431),
(19, 'Batas 4', -7.160120256438027, 110.46043690116258),
(20, 'Batas 5', -7.158929018733668, 110.44601584111082),
(21, 'Batas 6', -7.165572219023319, 110.43743269913212),
(22, 'Batas 7', -7.169319792915882, 110.42095262594337),
(23, 'Batas 8', -7.1659130150973995, 110.40309988343566),
(24, 'Batas 9', -7.169319649565291, 110.38885171756993),
(25, 'Batas 10', -7.167275009955998, 110.39022565525532),
(26, 'Batas 11', -7.17425884212147, 110.37323083258826),
(27, 'Batas 12', -7.179027944300052, 110.35726578595497),
(28, 'Batas 13', -7.191998111305779, 110.37077741234405),
(29, 'Batas 14', -7.196032522123112, 110.3830377553627),
(30, 'Batas 15', -7.197958921466971, 110.39547941570177),
(31, 'Batas 16', -7.197778194574061, 110.39808935131393),
(32, 'Batas 17', -7.2055929405061265, 110.40680016229524),
(33, 'Batas 18', -7.208815474931651, 110.40485147170492),
(34, 'Batas 19', -7.205019943264717, 110.41012066233243),
(35, 'Batas 20', -7.2060943552261785, 110.41401575429366),
(36, 'Batas 21', -7.199506452497107, 110.42202712609198),
(37, 'Batas 22', -7.215689259299442, 110.4267187623173),
(38, 'Batas 23', -7.219269430283814, 110.43249323792487),
(39, 'Batas 24', -7.210246845233671, 110.43841150630067),
(40, 'Batas 25', -7.205664287727914, 110.4409377540736),
(41, 'Batas 26', -7.198790218212703, 110.43639009618863),
(42, 'Batas 27', -7.192274418464242, 110.44252478360829),
(43, 'Batas 28', -7.1791873272912445, 110.45015872898591),
(44, 'Batas 29', -7.1703766998477905, 110.4592940623556),
(45, 'Batas 30', -7.163946069137378, 110.46909270218937),
(46, 'Batas 31', -7.169060151553538, 110.48001484165127),
(47, 'Batas 32', -7.156603473936193, 110.48317860496817),
(48, 'Batas 33', -7.137360813932929, 110.48118811310039),
(49, 'Batas 34', -7.130119340460161, 110.47261415490667);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tempat_fasilitasumum`
--
ALTER TABLE `tempat_fasilitasumum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tempat_ibadah`
--
ALTER TABLE `tempat_ibadah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `titik_perbatasan`
--
ALTER TABLE `titik_perbatasan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tempat_fasilitasumum`
--
ALTER TABLE `tempat_fasilitasumum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `tempat_ibadah`
--
ALTER TABLE `tempat_ibadah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT for table `titik_perbatasan`
--
ALTER TABLE `titik_perbatasan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
