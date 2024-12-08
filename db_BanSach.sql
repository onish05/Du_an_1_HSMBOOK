-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 07, 2024 at 12:50 PM
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
-- Database: `db_duan1`
--

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
  `luot_xem` int DEFAULT '0',
  `iddm` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id`, `name`, `tacgia`, `price`, `img`, `mota`, `luot_xem`, `iddm`) VALUES
(1, 'Người tình Sputnik', 'Haruki Murakami', 150, 'nguoi_tinh_sputnik.jpg', 'Một câu chuyện tình kỳ lạ với phong cách viết huyền ảo, đầy cảm xúc.', 0, 1),
(2, 'Đồi gió hú', 'Emily Brontë', 200, 'doi_gio_hu.jpg', 'Tác phẩm kinh điển xoay quanh tình yêu và sự thù hận.', 0, 1),
(3, '1984', 'George Orwell', 180, '1984.jpg', 'Một xã hội bị giám sát toàn diện trong bối cảnh tương lai.', 0, 1),
(4, 'Cánh đồng bất tận', 'Nguyễn Ngọc Tư', 100, 'canh_dong_bat_tan.jpg', 'Cuộc sống miền Tây Nam Bộ với nhiều góc nhìn nhân văn.', 0, 1),
(5, 'Bến không chồng', 'Dương Hướng', 120, 'ben_khong_chong.jpg', 'Cuộc sống ở nông thôn Việt Nam thời hậu chiến.', 0, 1),
(6, 'Lược sử thời gian', 'Stephen Hawking', 250, 'luoc_su_thoi_gian.jpg', 'Tìm hiểu vũ trụ từ vụ nổ lớn đến hố đen.', 0, 2),
(7, 'Công nghệ tương lai', 'Michio Kaku', 230, 'cong_nghe_tuong_lai.jpg', 'Những đột phá về công nghệ trong thế kỷ 21.', 0, 2),
(8, 'Trí tuệ nhân tạo: Kỷ nguyên mới', 'Max Tegmark', 220, 'tri_tue_nhan_tao.jpg', 'AI và tác động của nó đến xã hội và công việc.', 0, 2),
(9, 'Blockchain và Bitcoin', 'Andreas M. Antonopoulos', 300, 'blockchain_bitcoin.jpg', 'Công nghệ blockchain và ứng dụng của nó trong kinh tế.', 0, 2),
(10, 'Vật lý lượng tử cho mọi người', 'Christophe Galfard', 180, 'vat_ly_luong_tu.jpg', 'Khám phá vật lý lượng tử một cách đơn giản.', 0, 2),
(11, 'Nghệ thuật quản trị', 'Peter Drucker', 300, 'nghe_thuat_quan_tri.jpg', 'Các nguyên tắc quản trị hiệu quả trong tổ chức.', 0, 3),
(12, 'Tư duy nhanh và chậm', 'Daniel Kahneman', 280, 'tu_duy_nhanh_va_cham.jpg', 'Cách con người đưa ra quyết định trong kinh doanh và cuộc sống.', 0, 3),
(13, 'Dẫn đầu sự thay đổi', 'John P. Kotter', 240, 'dan_dau_thay_doi.jpg', 'Làm thế nào để thành công khi tổ chức phải thay đổi.', 0, 3),
(14, 'Startup tinh gọn', 'Eric Ries', 200, 'startup_tinh_gon.jpg', 'Phát triển doanh nghiệp khởi nghiệp với quy trình hiệu quả.', 0, 3),
(15, 'Đừng bao giờ đi ăn một mình', 'Keith Ferrazzi', 260, 'dung_di_an_mot_minh.jpg', 'Xây dựng mối quan hệ để thành công trong công việc và cuộc sống.', 0, 3),
(16, 'Đắc nhân tâm', 'Dale Carnegie', 150, 'dac_nhan_tam.jpg', 'Cách giao tiếp và ứng xử hiệu quả.', 0, 4),
(17, '7 thói quen của người thành đạt', 'Stephen R. Covey', 250, '7_thoi_quen_thanh_dat.jpg', 'Bí quyết để đạt được thành công lâu dài.', 0, 4),
(18, 'Quẳng gánh lo đi và vui sống', 'Dale Carnegie', 200, 'quang_ganh_lo_di.jpg', 'Bí quyết sống lạc quan, vui vẻ.', 0, 4),
(19, 'Nghệ thuật sống tự tin', 'Mark Manson', 180, 'nghe_thuat_song_tu_tin.jpg', 'Làm thế nào để vượt qua sợ hãi và tự tin hơn.', 0, 4),
(20, 'Hạnh phúc là một lựa chọn', 'Tal Ben-Shahar', 220, 'hanh_phuc_lua_chon.jpg', 'Bí quyết để sống hạnh phúc.', 0, 4),
(21, 'Dế mèn phiêu lưu ký', 'Tô Hoài', 90, 'de_men_phieu_luu.jpg', 'Câu chuyện về chuyến phiêu lưu của chú dế mèn.', 0, 5),
(22, 'Harry Potter và hòn đá phù thủy', 'J.K. Rowling', 350, 'harry_potter.jpg', 'Hành trình trở thành pháp sư của cậu bé Harry Potter.', 0, 5),
(23, 'Cuộc phiêu lưu của Pinocchio', 'Carlo Collodi', 150, 'pinocchio.jpg', 'Hành trình tìm lại bản thân của chú bé gỗ Pinocchio.', 0, 5),
(24, 'Nhóc Nicolas', 'René Goscinny', 120, 'nhoc_nicolas.jpg', 'Những câu chuyện vui nhộn của cậu bé Nicolas.', 0, 5),
(25, 'Alice ở xứ sở thần tiên', 'Lewis Carroll', 250, 'alice_xu_so_than_tien.jpg', 'Câu chuyện kỳ ảo về cuộc phiêu lưu của cô bé Alice.', 0, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_theloai` (`iddm`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
