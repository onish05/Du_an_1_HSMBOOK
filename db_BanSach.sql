-- Xóa bảng cũ nếu tồn tại
DROP TABLE IF EXISTS `binhluan`, `danhmuc`, `sanpham`, `taikhoan`, `giohang`, `donhang`, `chitietdonhang`, `sach`, `theloai`;

-- Bảng thể loại (danh mục sách)
CREATE TABLE `theloai` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `ten_theloai` VARCHAR(255) NOT NULL
);

-- Bảng sách
CREATE TABLE `sach` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `ten_sach` VARCHAR(255) NOT NULL,
  `tac_gia` VARCHAR(255) NOT NULL,
  `gia` INT DEFAULT 0,
  `img` VARCHAR(255) DEFAULT NULL,
  `mota` TEXT DEFAULT NULL,
  `luot_xem` INT DEFAULT 0,
  `id_theloai` INT NOT NULL,
  FOREIGN KEY (`id_theloai`) REFERENCES `theloai`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Bảng tài khoản
CREATE TABLE `taikhoan` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `ten_dang_nhap` VARCHAR(50) NOT NULL,
  `mat_khau` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `dia_chi` VARCHAR(255) DEFAULT NULL,
  `so_dien_thoai` VARCHAR(15) DEFAULT NULL,
  `vai_tro` TINYINT DEFAULT 0 COMMENT '0: Khách hàng, 1: Admin'
);

-- Bảng giỏ hàng
CREATE TABLE `giohang` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `id_taikhoan` INT NOT NULL,
  `id_sach` INT NOT NULL,
  `so_luong` INT NOT NULL DEFAULT 1,
  FOREIGN KEY (`id_taikhoan`) REFERENCES `taikhoan`(`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`id_sach`) REFERENCES `sach`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Bảng đơn hàng
CREATE TABLE `donhang` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `id_taikhoan` INT NOT NULL,
  `ngay_dat` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `tong_tien` INT NOT NULL,
  `trang_thai` ENUM('Chờ xác nhận', 'Đang giao', 'Đã giao', 'Hủy') DEFAULT 'Chờ xác nhận',
  FOREIGN KEY (`id_taikhoan`) REFERENCES `taikhoan`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Bảng chi tiết đơn hàng
CREATE TABLE `chitietdonhang` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `id_donhang` INT NOT NULL,
  `id_sach` INT NOT NULL,
  `so_luong` INT NOT NULL DEFAULT 1,
  `gia_ban` INT NOT NULL,
  FOREIGN KEY (`id_donhang`) REFERENCES `donhang`(`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`id_sach`) REFERENCES `sach`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Bảng bình luận
CREATE TABLE `binhluan` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `id_sach` INT NOT NULL,
  `id_taikhoan` INT NOT NULL,
  `noi_dung` TEXT NOT NULL,
  `ngay_binh_luan` DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`id_sach`) REFERENCES `sach`(`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`id_taikhoan`) REFERENCES `taikhoan`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Thêm dữ liệu mẫu cho bảng thể loại
INSERT INTO `theloai` (`ten_theloai`) VALUES 
('Khoa học'), 
('Văn học'), 
('Kinh tế'), 
('Công nghệ'), 
('Truyện tranh'), 
('Tiểu thuyết'), 
('Tâm lý học');

-- Thêm dữ liệu mẫu cho bảng sách
INSERT INTO `sach` (`ten_sach`, `tac_gia`, `gia`, `img`, `mota`, `id_theloai`) VALUES
('Lập trình PHP', 'Nguyễn Văn A', 200000, 'php.jpg', 'Sách hướng dẫn lập trình PHP từ cơ bản đến nâng cao', 4),
('Harry Potter', 'J.K. Rowling', 300000, 'harry.jpg', 'Bộ truyện nổi tiếng về cậu bé phù thủy Harry Potter', 6),
('Tư duy nhanh và chậm', 'Daniel Kahneman', 350000, 'tuduy.jpg', 'Sách tâm lý học nổi tiếng giúp thay đổi tư duy', 7);
