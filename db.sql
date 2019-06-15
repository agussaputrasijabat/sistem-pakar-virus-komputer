-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jun 2019 pada 12.01
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jabatsof_sp_kom`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_analisa_hasil`
--

CREATE TABLE `tbl_analisa_hasil` (
  `kd_analisa` int(11) NOT NULL,
  `kd_virus` varchar(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kd_sesi` int(11) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_analisa_hasil`
--

INSERT INTO `tbl_analisa_hasil` (`kd_analisa`, `kd_virus`, `nama`, `kd_sesi`, `tanggal`) VALUES
(1, 'V1', 'Agus Saputra', 10, '2019-06-13 16:54:23'),
(2, 'V2', 'Agus Saputra', 10, '2019-06-13 17:01:16'),
(3, 'V5', 'Agus Saputra', 11, '2019-06-13 17:02:28'),
(4, 'V2', 'Agus Saputra', 11, '2019-06-13 17:04:28'),
(5, 'V1', 'Agus Saputra', 11, '2019-06-13 17:15:17'),
(6, 'V5', 'Agus Saputra', 11, '2019-06-14 07:17:40'),
(7, 'V1', 'Agus Saputra', 11, '2019-06-14 07:24:55'),
(8, 'V1', 'Agus Saputra', 11, '2019-06-14 07:25:34'),
(9, 'V1', 'Agus Saputra', 11, '2019-06-14 07:26:34'),
(10, 'V1', 'Agus Saputra', 12, '2019-06-14 07:26:59'),
(11, 'V1', 'Agus Saputra', 13, '2019-06-14 07:29:22'),
(12, 'V1', 'Agus Saputra', 14, '2019-06-14 07:29:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_gejala`
--

CREATE TABLE `tbl_gejala` (
  `kd_gejala` varchar(11) NOT NULL,
  `nama_gejala` longtext,
  `pertanyaan` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_gejala`
--

INSERT INTO `tbl_gejala` (`kd_gejala`, `nama_gejala`, `pertanyaan`) VALUES
('G1', 'Task manager tidak dapat di akses/dibuka', 'Apakah Task manager tidak dapat di\r\nakses / dibuka?'),
('G10', 'Wallpaper tidak bisa dirubah', 'Apakah Wallpaper tidak bisa dirubah'),
('G11', 'Tampil Blue Screen ketika mengakses Fungsi Safe -Mode Windows', 'Apakah Tampil Blue Screen ketika mengakses Fungsi Safe-Mode Windows?'),
('G12', 'Banyak aplikasi tidak berfungsi dengan baik', 'Apakah banyak aplikasi tidak berfungsi\r\ndengan baik?'),
('G13', 'Tidak dapat mengupdate antivirus komputer', 'Apakah Tidak dapat mengupdate\r\nantivirus komputer?'),
('G14', 'Muncul pesan \"Windows Security Center Alert\" saat start Windows', 'Apakah Muncul pesan \"Windows\r\nSecurity Center Alert\" saat start\r\nWindows ?'),
('G15', 'Ketika PC terkoneksi dengan internet maka akan membuka web tertentu secara tiba - tiba', 'Apakah Ketika PC terkoneksi dengan\r\ninternet maka akan membuka\r\nweb tertentu secara tiba\r\n-tiba?'),
('G16', 'Pada desktop akan membuat file bernama Donâ€™t click.ini', 'Apakah Pada desktop akan membuat file bernama Donâ€™t click.ini?'),
('G17', 'Type file â€œShortcutâ€ [.lnk] mejadi â€œMovie Clip', 'Apakah Type file â€œShortcutâ€ [.lnk]\r\nmejadi â€œMovie Clip?'),
('G18', 'Registry editor (regedit) tidak bisa dibuka', 'Apakah Registry editor (regedit) tidak\r\nbisa dibuka?'),
('G19', 'Muncul Pop -up atau pesan pemberitahuan di monitor kepada user', 'Apakah Muncul Pop-up atau pesan pemberitahuan di monitor kepada user?'),
('G2', 'Antivirus atau removal tools di blok/tidak bisa dibuka', 'Apakah Antivirus atau removal tools di\r\nblok/tidak bisa dibuka?'),
('G20', 'Menu \"Start\" windows bergerak ke -kanan dan ke -kiri', 'Apakah Menu \"Start\" windows bergerak ke-kanan dan ke-kiri?'),
('G21', 'Terjadi perubahan pada nama pemilik Windows', 'Apakah Terjadi perubahan pada nama\r\npemilik Windows?'),
('G22', 'Muncul File Autorun.inf, Thumb.db, Microsoft.lnk di setiap driver, folder', 'Apakah Muncul File Autorun.inf, Thumb.db, Microsoft.lnk di setiap driver, folder?'),
('G23', 'Fitur yang terdapat pada Folder Option tidak lengkap', 'Apakah Fitur yang terdapat pada Folder\r\nOption tidak lengkap?'),
('G24', 'Username Login di active Directory (AD) windows terkunci berulang-ulang', 'Apakah Username Login di active Directory (AD) windows terkunci berulang-ulang?'),
('G25', 'Terdapat shortcut yang banyak ', 'Apakah Terdapat shortcut yang banyak ?'),
('G26', 'Muncul message error pada saat LogOn komputer', 'Apakah Muncul message error pada saat\r\nLogOn komputer?'),
('G27', 'Di folder My Documents terdapat sebuah file yang bernama database.mdb', 'Apakah Di folder My Documents terdapat sebuah file yang bernama database.mdb?'),
('G28', 'Munculnya pesan \"SHEMALE By CRY\" pada saat screen saver Windows aktif', 'Apakah Munculnya pesan \"SHEMALE By CRY\" pada saat screen saver Windows aktif?'),
('G29', 'Notifikasi jam/waktu tidak tampak pada taskbar', 'Apakah Notifikasi jam/waktu tidak\r\ntampak pada taskbar?'),
('G3', 'Menu run hilang dan tidak dapat dijalankan/di akses', 'Apakah Menu run hilang dan tidak dapat\r\ndijalankan/di akses?'),
('G30', 'Program winamp serta pengolah kata seperti MS Word di blok/tidak bisa dibuka', 'Apakah Program winamp serta pengolah kata seperti MS Word di blok/tidak bisa dibuka?'),
('G31', 'Pesan error saat menjalankan tools security tertentu', 'Apakah Pesan error saat menjalankan\r\ntools security tertentu ?'),
('G32', 'Icon MS Word berubah ektensi nya menjadi \"exe\"', 'Apakah Icon MS Word berubah ektensi\r\nnya menjadi \"exe\"?'),
('G33', 'Menampilkan pesan â€œMy World Welcome Shemale In To The World King Of The Worldâ€ pada saat membuka jendela Internet Explorer', 'Apakah tampil pesan â€œMy World Welcome Shemale In To The World King Of The Worldâ€ pada saat membuka jendela Internet Explorer?'),
('G34', 'Safe mode tidak dapat di akses/digunakan', 'Apakah Safe mode tidak dapat di akses/digunakan?'),
('G35', 'Tidak dapat mengakses situssitus tertentu ( antivirus/ windows)', 'Apakah Tidak dapat mengakses situs-situs tertentu ( antivirus/ windows)?'),
('G36', 'Ukuran file di komputer bertambah 68-80 kb dari ukuran semula', 'Apakah Ukuran file di komputer bertambah 68-80 kb dari ukuran semula?'),
('G37', 'Muncul pesan pada saat komputer pertama di hidupkan', 'Apakah Muncul pesan pada saat komputer pertama di hidupkan?'),
('G38', 'Drive CD/DVD-ROM selalu terbuka', 'Apakah Drive CD/DVD-ROM selalu\r\nterbuka?'),
('G39', 'Harddisk komputer-komputer mendadakpenuh dan mendapatkan peringatan â€œLow Disk Spaceâ€', 'Apakah Harddisk komputer-komputer mendadakpenuh dan mendapatkan peringatan â€œLow Disk Spaceâ€?'),
('G4', 'Muncul file dgn nama Kohoin.txt di setiap drive', 'Apakah muncul file dengan nama\r\nKohoin.txt di setiap drive?'),
('G40', 'File winsta.exe (C:windowsSystem32) yang bertambah besar menyesuaikan sisa ruang harddisk yang anda miliki (drive C atau system OS).', 'Apakah File winsta.exe (C:windowsSystem32) yang bertambah besar menyesuaikan sisa ruang harddisk yang anda miliki (drive C atau system OS)?'),
('G41', 'Software security di blok', 'Apakah software security di blok?'),
('G42', 'Menimbulkan notifikasi dari system windows yang menginformasikan bahwa sisa ruang harddisk anda sudah kosong', 'Apakah menimbulkan notifikasi dari system windows yang menginformasikan bahwa sisa ruang harddisk anda sudah kosong?'),
('G43', 'Muncul file dengan ekstensi EXE atau SCR serta menggunakan icon Microsoft Visual Basic Projek', 'Apakah muncul file dengan ekstensi EXE atau SCR serta menggunakan icon Microsoft Visual Basic Projek?'),
('G44', 'Semua folder pada USB di hidden (disembunyikan)', 'Apakah semua folder pada USB di hidden (disembunyikan)?'),
('G45', 'Tidak bisa mencetak data lewat printer, hal ini dilakukan dengan menginfeksi fileSpoolsv', 'Apakah Tidak bisa mencetak data lewat printer, hal ini dilakukan dengan menginfeksi fileSpoolsv?'),
('G46', 'Folder â€œC:Documents and Settingsâ€ di hidden (tidak tampak)', 'Apakah Folder â€œC:Documents and Settingsâ€ di hidden (tidak tampak)?'),
('G5', 'Command From (CMD) tidak bisa dibuka', 'Apakah command From (CMD) tidak\r\nbisa dibuka?'),
('G6', 'Tidak dapat mengakses Folder \"C:Windows\"', 'Apakah folder \"C:Windows\" tidak dapat dibuka?'),
('G7', 'Komputer menjadi lambat atau hang secara mendadak', 'Apakah komputer menjadi lambat atau hang secara mendadak?'),
('G8', 'Fungsi klik pada mouse berubah yaitu fungsi kiri menjadi klik kanan dan sebaliknya', 'Apakah fungsi klik pada mouse berubah\r\nyaitu fungsi kiri menjadi klik\r\nkanan dan sebaliknya ?'),
('G9', 'Folder option hilang/ disable', 'Apakah folder option hilang?');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kaidah`
--

CREATE TABLE `tbl_kaidah` (
  `kd_virus` varchar(11) DEFAULT NULL,
  `kd_gejala` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kaidah`
--

INSERT INTO `tbl_kaidah` (`kd_virus`, `kd_gejala`) VALUES
('V4', 'G6'),
('V4', 'G5'),
('V3', 'G5'),
('V4', 'G2'),
('V1', 'G1'),
('V1', 'G2'),
('V1', 'G18'),
('V1', 'G34'),
('V1', 'G35'),
('V1', 'G36'),
('V2', 'G1'),
('V2', 'G3'),
('V2', 'G7'),
('V2', 'G8'),
('V2', 'G19'),
('V2', 'G20'),
('V2', 'G29'),
('V2', 'G32'),
('V3', 'G4'),
('V3', 'G30'),
('V3', 'G37'),
('V4', 'G1'),
('V4', 'G17'),
('V4', 'G18'),
('V4', 'G28'),
('V4', 'G21'),
('V4', 'G31'),
('V4', 'G33'),
('V5', 'G1'),
('V5', 'G10'),
('V5', 'G9'),
('V5', 'G18'),
('V6', 'G18'),
('V6', 'G22'),
('V6', 'G25'),
('V6', 'G27'),
('V6', 'G26'),
('V7', 'G6'),
('V7', 'G14'),
('V7', 'G16'),
('V8', 'G7'),
('V8', 'G15'),
('V8', 'G11'),
('V8', 'G23'),
('V9', 'G12'),
('V9', 'G13'),
('V9', 'G24'),
('V9', 'G35'),
('V11', 'G26'),
('V11', 'G41'),
('V11', 'G43'),
('V11', 'G44'),
('V11', 'G46'),
('V10', 'G7'),
('V10', 'G39'),
('V10', 'G40'),
('V10', 'G42'),
('V10', 'G45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pakar`
--

CREATE TABLE `tbl_pakar` (
  `kd_user` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pakar`
--

INSERT INTO `tbl_pakar` (`kd_user`, `nama`, `password`) VALUES
('agus', 'Agus Saputra Sijabat', '01c3c766ce47082b1b130daedd347ffd'),
('ferdy', 'Ferdyawan', 'f9af294304691d958534a8e06db9f19e');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sesi`
--

CREATE TABLE `tbl_sesi` (
  `kd_sesi` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL DEFAULT '0',
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_sesi`
--

INSERT INTO `tbl_sesi` (`kd_sesi`, `nama`, `tanggal`) VALUES
(11, 'Agus Saputra', '2019-06-13 17:01:33'),
(12, 'Agus Saputra', '2019-06-14 07:26:43'),
(13, 'Agus Saputra', '2019-06-14 07:28:59'),
(14, 'Agus Saputra', '2019-06-14 07:29:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tmp_analisa`
--

CREATE TABLE `tbl_tmp_analisa` (
  `kd_sesi` int(11) DEFAULT NULL,
  `kd_virus` varchar(11) DEFAULT NULL,
  `kd_gejala` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tmp_gejala`
--

CREATE TABLE `tbl_tmp_gejala` (
  `kd_sesi` int(11) DEFAULT NULL,
  `kd_gejala` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tmp_user`
--

CREATE TABLE `tbl_tmp_user` (
  `id` int(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `kd_sesi` int(11) DEFAULT NULL,
  `tanggal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tmp_virus`
--

CREATE TABLE `tbl_tmp_virus` (
  `kd_sesi` int(11) DEFAULT NULL,
  `kd_virus` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_virus`
--

CREATE TABLE `tbl_virus` (
  `kd_virus` varchar(11) NOT NULL,
  `nama_virus` varchar(100) NOT NULL,
  `keterangan` longtext NOT NULL,
  `solusi` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_virus`
--

INSERT INTO `tbl_virus` (`kd_virus`, `nama_virus`, `keterangan`, `solusi`) VALUES
('V1', 'W32/Sality.AE', 'Virus yang menyebar dengan menginfeksi file executable dan upaya untuk men-download file berpotensi berbahaya dari internet. ', 'Hapus ketiga file berikut: oledsp32.dll, sysdll.dll, syslib32.dll (yang\r\nterdapat di C:WindowsSystem, C:WindowsSystem32,\r\nC:WinntSystem32 atau di salah satu folder berikut\r\nC:WindowsTemp, C:WinntTemp), dengan menggunakan\r\nrmsality (virus removal untuk virus sality dari Grisoft), download\r\nrmsality (virus removal untuk virus sality dari Grisoft) berisi tiga\r\nfile yang harus anda download ke dlm satu folder\r\nhttp://free.grisoft.com/ww.virus-removalkemudian download\r\nfileASSASSIN disini http://www.malwarebytes.org/fa-setup.exe,\r\nJika sudah tidak memungkinkan backup file yang tidak berektensi\r\n.EXE kemudian install ulang sistem operasi lalu intall antivirus\r\nseperti AVG, Norton, Avira.'),
('V10', 'StuxnetI', '-', '-'),
('V11', 'Shortcut UFD (Usb Flash Disk)', '-', '-'),
('V2', 'Virus Luna Maya', 'Menurut Adi Saputra, analis antivirus Vaksincom, virus \"Luna Maya\" merupakan virus lokal yang dibuat menggunakan bahasa pemrograman Visual Basic. ', 'Masuk pada mode \"safe mode\", tekan tombol F8 pada keyboard saat komputer dinyalakan kemudian masuk safe mode, Gunakan tools pengganti Task Manager dalam hal ini gunakan CurProcess (http://www.nirsoft.net/utils/cprocess.zip ) kemudian cari file virus\r\nâ€œAmoumain.exeâ€. Klik kiri file virus, kemudian pilih â€œKill Selected\r\nProcesses. apus file virus â€œLuna Mayaâ€ dengan ciri-ciri sebagai\r\nberikut (Memiliki type file â€œApplicationâ€ + Memiliki ukuran file â€œ37 kbâ€ + Memiliki icon file MS Word ) gunakan fungsi Search\r\nWindows dengan menggunakan filter file *.exe dan *.inf dan\r\nberukuran 37 kb hapus file virus utama seperti : Amoumain.exe,\r\nLuna Maya.exe, Love.exe, dan nt.bat Log-off komputer, kemudian\r\nlog-in kembali. Untuk anti virus bisa gunakan ansav, norman\r\nsecurity suit.'),
('V3', 'W32/Smallworm.GQK', 'Worms secara otomatis menyebar ke PC lain. Mereka dapat melakukan ini dalam beberapa cara, termasuk dengan menyalin sendiri ke removable drive, folder jaringan, atau menyebar melalui email.', 'Nonaktifkan â€œSystem Restoreâ€ selama proses pembersihan, matikan\r\nproses virus yang sedang aktif di memori dengan melalui Task\r\nManager dengan kombinasi tombol keyboard (Ctrl + Alt + Del)\r\nkemudian matikan proses virus pilih icon â€œWinampâ€ klik End\r\nProcess. Atau gunakan antivirus yang bisa membasmi virus tersebut\r\nseperti Avira, Avast atau antivirus lain yang update.'),
('V4', 'VBS/Autorun.BO', 'Worm: VBS / Autorun.BO adalah worm file skrip Windows (.WSF) yang menyebar ke semua drive logis sebagai file bernama \"usb $ 505 $ .wsf\".', 'Nonaktifkan â€œSystem Restoreâ€ selama proses pembersihan, Repair\r\nregistry Windows dengan menggunakan tools FIXREG.exe, Install\r\ntools Unlocker download ( http://unlocker.en.softonic.com ), hal ini\r\ndimaksudkan untuk menghapus beberapa folder/file yang tidak\r\ndapat dihapus secara manual . Hapus file virus berikut (C:Del.dll,\r\nC:LocalDiskC.dll, C:Autorun.inf (semua drive), C:Membership of\r\nShemale Lover.lnk, C:13. Michael Jackson - one day in your\r\nlife.mp4.lnk, C:Fotoq Imoets - http-facebook.com-profiles-123442-\r\nphotos-15595.jpeg.lnk, C:Michael Jackson ternyata belum mati -\r\nDetik.com.lnk, C:BOKEP ( New Release ) ) dengan menggunakan\r\nExploreXP ( http://www.explorerxp.com ) dan di dalam drive\r\nC:Windows hapus file berikut ini ( *appopen.dll , *appsys.exe,\r\n*desktop.ini, *dvcdrv.msc, *kernel32.dll, * regedit.exe.lnk,\r\n*regedit.exe (ukuran 68 KB), *speech.dll, *temporary files.dll,\r\n*welcomescreen.mht, *Windows.html, winsock01.exe (notepad),\r\n*Winupdt.tpx ) untuk di drive C:Windowssystem32 hapus file ini\r\n(appsys.dll, cmd.exe.lnk, encryptor.dll, taskmgr.exe.lnk,\r\nvga812.sys, Corelsetup.dll, Dvcrnme.dll, Regedit.exe (ukuran 68\r\nKB), Taskmgr.exe (ukuran 68 KB), CMD.exe (ukuran 68 KB) dan\r\nC:Recycled, C:Windowssystemsvchost.exe,\r\nC:ProgramFilesFarStoneqbtask.exe,C:Windowspchealthhelpctr\r\nbinariesmsconfig.exe,C:Windowssystem32dllchace (regedit.exe,\r\ntaskmgr.exe, cmd.exe,\r\nmsconfig.exe),C:DocumentandSetting\\%user%Desktop\r\nLocalDisk(c).lnk%Flash Disk%:Data-data Tugasku NITIP Jangan\r\nDihapus.lnk%Flash Disk%:Naughty America Album. Kemudian\r\nKosongkan/Empty pada Recycled bin (Klik kanan â€œRecycled\r\nbinâ€+Klik â€œEmpty Recycle binâ€), Copy file Regedit.exe, CMD.exe,\r\nTaskMgr.exe dan MSConfig.exe dari komuputer lain yang tidak\r\nbermasalah.'),
('V5', 'W32/Obfuscated.A!genr/virus cuakep', '-', '-'),
('V6', 'Worm:PIF/Starter.A/Virus Shortcut', '-', '-'),
('V7', 'Virus Sensei', '-', '-'),
('V8', 'W32/Xorer.AM/virus Safemode', '-', '-'),
('V9', 'Confliker', '-', '-');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_analisa_hasil`
--
ALTER TABLE `tbl_analisa_hasil`
  ADD PRIMARY KEY (`kd_analisa`);

--
-- Indeks untuk tabel `tbl_gejala`
--
ALTER TABLE `tbl_gejala`
  ADD PRIMARY KEY (`kd_gejala`);

--
-- Indeks untuk tabel `tbl_sesi`
--
ALTER TABLE `tbl_sesi`
  ADD PRIMARY KEY (`kd_sesi`);

--
-- Indeks untuk tabel `tbl_virus`
--
ALTER TABLE `tbl_virus`
  ADD PRIMARY KEY (`kd_virus`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_analisa_hasil`
--
ALTER TABLE `tbl_analisa_hasil`
  MODIFY `kd_analisa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tbl_sesi`
--
ALTER TABLE `tbl_sesi`
  MODIFY `kd_sesi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
