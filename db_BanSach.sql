-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 08, 2024 at 08:51 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bansach`
--

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int NOT NULL,
  `idpro` int NOT NULL,
  `iduser` int NOT NULL,
  `noidung` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ngaybinhluan` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `id` int NOT NULL,
  `id_donhang` int NOT NULL,
  `id_sach` int NOT NULL,
  `so_luong` int NOT NULL DEFAULT '1',
  `gia_ban` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `name`) VALUES
(22, 'Tiểu thuyết'),
(31, 'Truyện thiếu nhi'),
(32, 'Sách kỹ năng sống'),
(33, 'Khoa học - Công nghệ'),
(34, 'Kinh doanh - Quản trị');

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `id` int NOT NULL,
  `id_taikhoan` int NOT NULL,
  `ngay_dat` datetime DEFAULT CURRENT_TIMESTAMP,
  `tong_tien` int NOT NULL,
  `trang_thai` enum('Chờ xác nhận','Đang giao','Đã giao','Hủy') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'Chờ xác nhận'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

CREATE TABLE `giohang` (
  `id` int NOT NULL,
  `id_taikhoan` int NOT NULL,
  `id_sach` int NOT NULL,
  `so_luong` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tacgia` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` int DEFAULT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mota` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `luotxem` int DEFAULT '0',
  `iddm` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id`, `name`, `tacgia`, `price`, `img`, `mota`, `luotxem`, `iddm`) VALUES
(1, 'Người tình Sputnik', 'Haruki Murakami', 150, 'nguoi_tinh_sputnik.jpg', 'Một câu chuyện tình kỳ lạ với phong cách viết huyền ảo, đầy cảm xúc.', 12312, 22),
(2, 'Đồi gió hú', 'Emily Brontë', 200, 'doi_gio_hu.jpg', 'Tác phẩm kinh điển xoay quanh tình yêu và sự thù hận.', 323, 22),
(3, '1984', 'George Orwell', 180, '1984.jpg', 'Một xã hội bị giám sát toàn diện trong bối cảnh tương lai.', 23, 22),
(4, 'Cánh đồng bất tận', 'Nguyễn Ngọc Tư', 100, 'canh_dong_bat_tan.jpg', 'Cuộc sống miền Tây Nam Bộ với nhiều góc nhìn nhân văn.', 55, 22),
(5, 'Bến không chồng', 'Dương Hướng', 120, 'ben_khong_chong.jpg', 'Cuộc sống ở nông thôn Việt Nam thời hậu chiến.', 43, 22),
(6, 'Lược sử thời gian', 'Stephen Hawking', 250, 'luoc_su_thoi_gian.jpg', 'Tìm hiểu vũ trụ từ vụ nổ lớn đến hố đen.', 45, 20),
(7, 'Công nghệ tương lai', 'Michio Kaku', 230, 'cong_nghe_tuong_lai.jpg', 'Những đột phá về công nghệ trong thế kỷ 21.', 0, 33),
(8, 'Trí tuệ nhân tạo: Kỷ nguyên mới', 'Max Tegmark', 220, 'tri_tue_nhan_tao.jpg', 'AI và tác động của nó đến xã hội và công việc.', 0, 33),
(9, 'Blockchain và Bitcoin', 'Andreas M. Antonopoulos', 300, 'blockchain_bitcoin.jpg', 'Công nghệ blockchain và ứng dụng của nó trong kinh tế.', 0, 33),
(10, 'Vật lý lượng tử cho mọi người', 'Christophe Galfard', 180, 'vat_ly_luong_tu.jpg', 'Khám phá vật lý lượng tử một cách đơn giản.', 1, 33),
(11, 'Nghệ thuật quản trị', 'Peter Drucker', 300, 'nghe_thuat_quan_tri.jpg', 'Các nguyên tắc quản trị hiệu quả trong tổ chức.', 0, 34),
(12, 'Tư duy nhanh và chậm', 'Daniel Kahneman', 280, 'tu_duy_nhanh_va_cham.jpg', 'Cách con người đưa ra quyết định trong kinh doanh và cuộc sống.', 0, 34),
(13, 'Dẫn đầu sự thay đổi', 'John P. Kotter', 240, 'dan_dau_thay_doi.jpg', 'Làm thế nào để thành công khi tổ chức phải thay đổi.', 2, 34),
(14, 'Startup tinh gọn', 'Eric Ries', 200, 'startup_tinh_gon.jpg', 'Phát triển doanh nghiệp khởi nghiệp với quy trình hiệu quả.', 0, 34),
(15, 'Đừng bao giờ đi ăn một mình', 'Keith Ferrazzi', 260, 'dung_di_an_mot_minh.jpg', 'Xây dựng mối quan hệ để thành công trong công việc và cuộc sống.', 0, 34),
(16, 'Đắc nhân tâm', 'Dale Carnegie', 150, 'dac_nhan_tam.jpg', 'Cách giao tiếp và ứng xử hiệu quả.', 0, 32),
(17, '7 thói quen của người thành đạt', 'Stephen R. Covey', 250, '7_thoi_quen_thanh_dat.jpg', 'Bí quyết để đạt được thành công lâu dài.', 456, 32),
(18, 'Quẳng gánh lo đi và vui sống', 'Dale Carnegie', 200, 'quang_ganh_lo_di.jpg', 'Bí quyết sống lạc quan, vui vẻ.', 0, 32),
(19, 'Nghệ thuật sống tự tin', 'Mark Manson', 180, 'nghe_thuat_song_tu_tin.jpg', 'Làm thế nào để vượt qua sợ hãi và tự tin hơn.', 0, 32),
(20, 'Hạnh phúc là một lựa chọn', 'Tal Ben-Shahar', 220, 'hanh_phuc_lua_chon.jpg', 'Bí quyết để sống hạnh phúc.', 0, 32),
(21, 'Dế mèn phiêu lưu ký', 'Tô Hoài', 90, 'de_men_phieu_luu.jpg', 'Câu chuyện về chuyến phiêu lưu của chú dế mèn.', 0, 31),
(22, 'Harry Potter và hòn đá phù thủy', 'J.K. Rowling', 350, 'harry_potter.jpg', 'Hành trình trở thành pháp sư của cậu bé Harry Potter.', 0, 31),
(23, 'Cuộc phiêu lưu của Pinocchio', 'Carlo Collodi', 150, 'pinocchio.jpg', 'Hành trình tìm lại bản thân của chú bé gỗ Pinocchio.', 0, 31),
(24, 'Nhóc Nicolas', 'René Goscinny', 120, 'nhoc_nicolas.jpg', 'Những câu chuyện vui nhộn của cậu bé Nicolas.', 0, 31),
(25, 'Alice ở xứ sở thần tiên', 'Lewis Carroll', 250, 'alice_xu_so_than_tien.jpg', 'Câu chuyện kỳ ảo về cuộc phiêu lưu của cô bé Alice.', 216, 31),
(26, 'Lược sử thời gian', 'Stephen Hawking', 250, 'luoc_su_thoi_gian.jpg', 'Tìm hiểu vũ trụ từ vụ nổ lớn đến hố đen.', 13, 33);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int NOT NULL,
  `user` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pass` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tel` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `role` tinyint DEFAULT '0' COMMENT '0: Khách hàng, 1: Admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `user`, `pass`, `email`, `address`, `tel`, `role`) VALUES
(2, 'admin', '123', '', NULL, NULL, 0),
(3, 'onish', '123456', '', NULL, NULL, 1),
(4, 'minh', '123', 'beebooksn4@gmail.com', NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sach` (`idpro`),
  ADD KEY `id_taikhoan` (`iduser`);

--
-- Indexes for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_donhang` (`id_donhang`),
  ADD KEY `id_sach` (`id_sach`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_taikhoan` (`id_taikhoan`);

--
-- Indexes for table `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_taikhoan` (`id_taikhoan`),
  ADD KEY `id_sach` (`id_sach`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_theloai` (`iddm`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `giohang`
--
ALTER TABLE `giohang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`idpro`) REFERENCES `sanpham` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `binhluan_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `taikhoan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_ibfk_1` FOREIGN KEY (`id_donhang`) REFERENCES `donhang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chitietdonhang_ibfk_2` FOREIGN KEY (`id_sach`) REFERENCES `sanpham` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`id_taikhoan`) REFERENCES `taikhoan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_ibfk_1` FOREIGN KEY (`id_taikhoan`) REFERENCES `taikhoan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `giohang_ibfk_2` FOREIGN KEY (`id_sach`) REFERENCES `sanpham` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
