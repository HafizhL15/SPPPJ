-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2024 at 04:42 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce1`
--

-- --------------------------------------------------------

--
-- Table structure for table `diskons`
--

CREATE TABLE `diskons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pesanan_id` int(11) DEFAULT NULL,
  `kode_diskon` varchar(255) NOT NULL,
  `diskon` int(11) NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `ditukarkan_pengguna` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `kritik_saran` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `helpdesks`
--

CREATE TABLE `helpdesks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `permasalahan` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `status` int(11) NOT NULL,
  `komentar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kuesioners`
--

CREATE TABLE `kuesioners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `pertanyaan_1` varchar(255) NOT NULL,
  `pertanyaan_2` varchar(255) NOT NULL,
  `pertanyaan_3` varchar(255) NOT NULL,
  `pertanyaan_4` varchar(255) NOT NULL,
  `pertanyaan_5` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2023_09_22_002059_create_produks_table', 1),
(5, '2023_09_24_111450_create_service_barangs_table', 1),
(6, '2023_10_01_071801_create_roleusers_table', 1),
(7, '2023_10_30_154836_create_kategoris_table', 1),
(8, '2023_11_05_144525_create_pesanans_table', 1),
(9, '2023_11_05_144636_create_pesanan_details_table', 1),
(10, '2023_11_14_142735_create_rekrutmens_table', 1),
(11, '2023_11_15_101941_create_feedback_table', 1),
(12, '2023_11_17_170813_create_helpdesks_table', 1),
(13, '2023_11_18_122452_create_kuesioners_table', 1),
(14, '2023_11_23_125739_create_diskons_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesanans`
--

CREATE TABLE `pesanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `nama_pesanan` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kabupaten` varchar(255) NOT NULL,
  `jenis_pesanan` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `kode` int(11) NOT NULL,
  `jumlah_harga` int(11) NOT NULL,
  `bukti_pembayaran` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan_details`
--

CREATE TABLE `pesanan_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` int(11) NOT NULL,
  `pesanan_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `jumlah_harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `stok_produk` int(11) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama_produk`, `stok_produk`, `harga_produk`, `kategori`, `deskripsi_produk`, `gambar`, `created_at`, `updated_at`) VALUES
(4, 'Lenovo IdeaPad Slim 3', 2, 8100000, 'Laptop', 'Prosesor yang digunakan pada laptop ini adalah AMD Ryzen 5 7520U dengan 4 core dan 8 thread, memiliki kecepatan dasar 2.8GHz dan dapat mencapai 4.3GHz dengan 2MB L2 cache dan 4MB L3 cache. Laptop ini terintegrasi AMD Radeon™ 610M dan menggunakan chipset AMD SoC Platform. Kapasitas memori yang tersedia adalah 8GB LPDDR5-5500 yang terpasang secara permanen pada motherboard, tanpa slot tambahan, dan mendukung mode dual-channel. Laptop ini memiliki penyimpanan yang cukup besar, yaitu 512GB SSD M.2 2242 dengan PCIe® 4.0x4 dan dukungan NVMe®', 'WhatsApp Image 2023-11-21 at 20.47.24.jpeg', '2023-11-21 05:58:15', '2023-12-02 13:38:51'),
(5, 'Acer Aspire 3', 1, 7200000, 'Laptop', 'Laptop ini ditenagai oleh prosesor AMD Ryzen™ 5 7520U , memiliki kecepatan dasar 2.8GHz yang dapat ditingkatkan hingga 4.3GHz.Dilengkapi dengan layar LCD 14\" beresolusi HD 1366 x 768 dengan teknologi Acer ComfyView™. Memori sistem sebesar 8 GB LPDDR5 beroperasi dalam mode dual channel, sementara penyimpanan internalnya menggunakan SSD NVMe 512 GB. Grafis pada laptop ini ditangani oleh AMD Radeon™ 610M. Bonus tambahan mencakup paket Free Office Home and Students 2021. Selain itu, Acer Indonesia memberikan garansi resmi selama 3 tahun, dengan perlindungan 1 tahun untuk suku cadang dan 2 tahun untuk layanan.', 'acer aspire 3 ryzen 5.jpg', '2023-11-21 06:02:53', '2023-11-24 06:52:43'),
(6, 'MSI Modern 14', 1, 7500000, 'Laptop', 'Laptop ini ditenagai oleh prosesor AMD Ryzen™ 5 7530U. Layar 14.0\" FHD (1920x1080) dengan teknologi IPS-Level memberikan pengalaman visual yang tajam. Grafis ditangani oleh AMD Radeon™ Graphics, sementara memori sebesar 16GB (DDR4-3200 onboard) menjamin kinerja yang responsif. Untuk penyimpanan, laptop ini dilengkapi dengan satu slot M.2 SSD (NVMe PCIe Gen3). MSI Indonesia memberikan garansi selama 2 tahun untuk produk ini.', 'msi modern 14.jpg', '2023-11-21 06:04:15', '2023-11-21 06:04:15'),
(7, 'Asus Vivobook 14X M1403QA', 3, 8700000, 'Laptop', 'Laptop ini ditenagai oleh prosesor AMD Ryzen™ 5 5600H Mobile dengan konfigurasi 6 inti CPU dan 12 utas, memiliki cache sebesar 19MB, dan dapat mencapai kecepatan maksimum hingga 4.2 GHz dengan fitur max boost. Grafis terintegrasi menggunakan AMD Radeon™ Vega 7 Graphics. Sistem ini dilengkapi dengan total memori 8GB DDR4 yang terpasang pada motherboard, dan penyimpanan internal sebesar 512GB M.2 NVMe™ PCIe® 3.0 SSD. Serta dilengkapi Windows 11 home original.', 'asus vivobook 14x.jpg', '2023-11-21 06:13:52', '2023-12-02 12:40:01'),
(8, 'Stylush Pen 2.0 SA203H', 2, 850000, 'Accessories', 'ASUS Pen 2.0 SA203H hadir dalam warna hitam dengan dimensi 176mm±0.3mm dan Ø10.0±0.1mm. Material pen barrel terbuat dari plastik, sementara tombol dan pen cap menggunakan bahan metal. Teknologi MPP 2 digunakan pada pen ini. Garansi resmi yang disediakan oleh ASUS untuk produk ini adalah selama 1 tahun.', 'stylus pen.jpg', '2023-11-21 06:19:49', '2023-11-21 06:19:49'),
(9, 'Card Reader Kingstone', 3, 200000, 'Accessories', 'Card Reader Kingston ini hadir dengan antarmuka USB 3.2 Gen 1 dan konektor USB-A. Dengan standar/kelas UHS-II, berat hanya 11 gram, card reader ini menawarkan portabilitas yang tinggi. Kingston memberikan dukungan dan garansi selama 2 tahun. Selain itu, card reader ini kompatibel dengan sistem operasi Windows® 10, Windows 8.1, Windows 8, Mac OS X v. 10.10.x+, Linux v.2.6.x+, dan Chrome OS™.', 'Kingsone Card reader.jpg', '2023-11-21 06:20:51', '2023-12-15 04:16:31'),
(10, 'Canon IP2270', 3, 750000, 'Printer', 'Printer ini memiliki berat sebesar 3.4kg dan dimensi 445 x 250 x 130 mm. Menggunakan koneksi USB 2.0, printer ini memiliki resolusi cetak sebesar 4800dpi x 1200dpi. Dengan jumlah injektor sebanyak 1472, printer ini menggunakan jenis tinta PG-810 dan CL-811, dengan ukuran tetesan tinta minimum sebesar 2pl. Ukuran kertas cetak yang dapat digunakan meliputi A4, 4×6″, A5, dan B5. Printer ini disertai dengan aksesori berupa kartrid tinta, kabel USB 2.0, dan disk driver.', 'Canon-IP2770.jpg', '2023-11-21 06:21:49', '2023-11-21 06:21:49'),
(11, 'DELL 27 Inch Monitor E2722HS', 2, 3900000, 'Monitor', 'DELL 27 Inch Monitor E2722HS memiliki ukuran layar 27 inci dengan resolusi 1920 x 1080 dan rasio kontras 1000:1. Dengan kecerahan mencapai 300 cd/m2, monitor ini menggunakan teknologi IPS. Antarmuka yang tersedia meliputi HDMI, VGA, dan DisplayPort (mode DisplayPort 1.2).', 'DELL 27 Inch Monitor E2722HS.jpg', '2023-11-21 06:34:08', '2023-11-21 06:34:08'),
(12, 'ROBOT Gaming Speaker RS200', 2, 180000, 'Audio', 'Speaker aktif stereo gaming 3.5 mm dengan output power 6W. Speaker ini memiliki rentang respons frekuensi 100Hz hingga 18KHz dan rasio sinyal-ke-noise ≥70dB. Daya masuk speaker ini menggunakan USB 5V 1A.', 'ROBOT Gaming Speaker RS200.jpg', '2023-11-21 06:35:11', '2023-11-21 06:35:11'),
(13, 'NuPhy Air75 Wireless Mechanical Keyboard', 1, 2200000, 'Input-Devices', 'Terdapat banyak mode konektivitas, termasuk 2.4G wireless, Bluetooth 5.0, atau koneksi kabel melalui USB Type-C. Ditenagai oleh baterai berkapasitas 2500mAh, keyboard ini dapat bekerja hingga 48 jam berdasarkan hasil uji laboratorium. Kompatibel dengan berbagai sistem operasi seperti MacOS, Windows, Android, dan iOS, serta mendukung N-key rollover. Keyboard ini juga dilengkapi dengan 21 mode backlight dan 4 mode sidelight, serta dapat diatur pada sudut 3.5º atau 6.5º dengan kaki magnetik.', 'NuPhy Air75 Wireless Mechanical Keyboard.jpg', '2023-11-21 06:36:38', '2023-11-21 06:36:38'),
(14, 'ASUS Motherboard Prime H410M-D', 2, 1500000, 'Spareparts', 'ASUS Motherboard Prime H410M-D memiliki soket CPU LGA 1200 dan chipset Intel H410. Dengan dukungan untuk dua slot DIMM dan kapasitas maksimal hingga 64GB, motherboard ini dilengkapi dengan satu slot M.2 dan empat port SATA 6Gb/s untuk penyimpanan. Untuk koneksi jaringan, menggunakan Realtek RTL8111H, sedangkan untuk audio dilengkapi dengan Realtek ALC887 7.1-Channel High Definition Audio CODEC. Terdapat juga konektivitas M.2, Ethernet 1 Gb, dan USB 3.2 Gen 1 Type-A. Dengan bentuk faktor mATX, motherboard ini menyajikan solusi kompak dan efisien.', 'ASUS Motherboard Prime H410M-D.jpg', '2023-11-21 06:37:48', '2023-11-21 06:37:48'),
(15, 'SIMBADDA PSU Battleground 550W', 3, 650000, 'Spareparts', 'SIMBADDA PSU Battleground 550W adalah power supply dengan berbagai konektor, termasuk 24 PIN (20+4) Main Power Connector, 6 + 2 PIN PCI Express Connector (x2), 4 PIN IDE Connector (x3), 4 + 4 pin CPU, dan 6 x SATA Connector. Dilengkapi dengan kipas pendingin 12 cm, mendukung prosesor Intel/AMD, dan bekerja pada input voltage 230V dengan input current maksimal 10A dan frekuensi 50Hz.', 'SIMBADDA PSU Battleground 550W.jpg', '2023-11-21 06:40:11', '2023-12-04 04:17:44'),
(16, 'EPSON EcoTank L3210', 1, 2200000, 'Printer', 'Printer ini memiliki tipe Print/Scan/Copy dengan kecepatan cetak hingga 33.0 ppm (hitam) dan 15.0 ppm (warna). Mampu mencetak hingga ukuran kertas maksimal 215.9 x 1200 mm dengan resolusi cetak maksimal 5760 x 1440 dpi. Dalam hal antarmuka, printer ini menggunakan USB 2.0. Unit utama printer ini dirancang untuk memberikan kemampuan cetak, pemindaian, dan salinan dalam satu perangkat yang efisien.', 'EPSON EcoTank L3210.jpg', '2023-11-21 06:41:13', '2023-11-21 06:41:13'),
(17, 'XIAOMI Mi Desktop Monitor 27 Inch', 1, 2700000, 'Monitor', 'Monitor Desktop XIAOMI Mi berukuran 27 inch dengan resolusi 1920×1080, rasio aspek 16:9, dan waktu respons 6 ms (GTG). Monitor ini memiliki kecerahan sebesar 300 cd/m² dan dilengkapi dengan konektivitas HDMI 1.4, VGA, Audio, dan DC IN. Monitor ini disertakan dengan buku panduan dan kartu garansi.', 'XIAOMI Mi Desktop Monitor 27 Inch.jpg', '2023-11-21 06:41:54', '2023-11-21 06:41:54'),
(18, 'PHILIPS Wireless Headphone TAUH202BK', 2, 700000, 'Audio', 'Headphone nirkabel dengan Bluetooth version 4.2. Headphone ini memiliki rentang respons frekuensi 20 - 20,000 Hz, impedansi 32 Ohm, sensitivitas 102dB, dan sistem akustik tertutup dengan jenis dynamic.', 'PHILIPS Wireless Headphone TAUH202BK.jpg', '2023-11-21 06:42:48', '2023-12-11 08:07:13'),
(19, 'LOGITECH MK295 Silent Wireless Combo Mouse and Keyboard', 2, 429000, 'Input-Devices', 'Kombinasi keyboard dan mouse nirkabel dengan jangkauan WiFi hingga 10 meter. Keyboard menggunakan teknologi SilentTouch, beroperasi pada frekuensi 2.4GHz dengan receiver nano USB, dan dilengkapi dengan switch daya On/Off. Sementara itu, mouse juga menggunakan teknologi SilentTouch dan dilengkapi dengan tombol daya On/Off.', 'LOGITECH MK295 Silent Wireless Combo Mouse and Keyboard.jpg', '2023-11-21 06:43:52', '2023-12-11 07:43:59');

-- --------------------------------------------------------

--
-- Table structure for table `rekrutmens`
--

CREATE TABLE `rekrutmens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_telepon` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `resume` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roleusers`
--

CREATE TABLE `roleusers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) NOT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roleusers`
--

INSERT INTO `roleusers` (`id`, `role`, `published_at`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL, '2024-01-03 20:14:32', '2024-01-03 20:14:32'),
(2, 'Customer Service', NULL, NULL, '2024-01-03 20:14:32', '2024-01-03 20:14:32'),
(3, 'Pelanggan', NULL, NULL, '2024-01-03 20:14:32', '2024-01-03 20:14:32');

-- --------------------------------------------------------

--
-- Table structure for table `service_barang`
--

CREATE TABLE `service_barang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `kode_booking` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `gambar_barang` varchar(255) NOT NULL,
  `estimasi` int(11) NOT NULL,
  `biaya` int(11) NOT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL DEFAULT 3,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `no_telepon` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `last_name`, `no_telepon`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 3, 'Hafizh', 'L', '083456789876', 'hafizh@gmail.com', NULL, '$2y$10$Xof/aY9yGH5nO5kHixJQfOVVIG.4k5SD4v6.RpX84HC.wJwGvL.q.', NULL, '2024-01-03 20:16:01', '2024-01-03 20:16:01'),
(2, 1, 'Admin', '1', '085269755652', 'admin1@gmail.com', NULL, '$2y$10$Ovp1GtXD0h9Uv7NA4nL1P.pwNkHIUDvOW6AB6/S4Azz1sLSfDOzO.', NULL, '2024-01-03 20:16:29', '2024-01-03 20:16:29'),
(3, 2, 'Customer', 'Service1', '082367894567', 'cs1@gmail.com', NULL, '$2y$10$GySYzAxArQo4oCzn0qErQebx/w59uxE0qQ03IUmtI1IBdZjE6LA0C', NULL, '2024-01-03 20:17:15', '2024-01-03 20:17:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diskons`
--
ALTER TABLE `diskons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `helpdesks`
--
ALTER TABLE `helpdesks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kuesioners`
--
ALTER TABLE `kuesioners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pesanans`
--
ALTER TABLE `pesanans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan_details`
--
ALTER TABLE `pesanan_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekrutmens`
--
ALTER TABLE `rekrutmens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roleusers`
--
ALTER TABLE `roleusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_barang`
--
ALTER TABLE `service_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diskons`
--
ALTER TABLE `diskons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `helpdesks`
--
ALTER TABLE `helpdesks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kuesioners`
--
ALTER TABLE `kuesioners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pesanans`
--
ALTER TABLE `pesanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesanan_details`
--
ALTER TABLE `pesanan_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `rekrutmens`
--
ALTER TABLE `rekrutmens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roleusers`
--
ALTER TABLE `roleusers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `service_barang`
--
ALTER TABLE `service_barang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
