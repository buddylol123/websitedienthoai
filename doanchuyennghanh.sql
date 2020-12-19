-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Dec 11, 2020 at 01:24 PM
-- Server version: 5.7.28
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doanchuyennghanh`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `manv` int(10) NOT NULL AUTO_INCREMENT,
  `admin` varchar(100) DEFAULT NULL,
  `matkhau` varchar(15) DEFAULT NULL,
  `tennv` varchar(50) NOT NULL,
  `diachi` varchar(100) NOT NULL,
  `sodienthoai` varchar(11) NOT NULL,
  `maquyen` int(10) NOT NULL,
  PRIMARY KEY (`manv`),
  KEY `admin_ibfk_1` (`maquyen`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`manv`, `admin`, `matkhau`, `tennv`, `diachi`, `sodienthoai`, `maquyen`) VALUES
(1, 'admin@gmail.com', '123456', 'Admin', '155 PNT q8', '098564715', 1),
(3, 'nhhy@gmail.com', '123456', 'Yen Nhan', '15/2 HHH q1', '098547136', 2),
(4, 'mhth@gmail.com', '123456', 'Mong Ha Trung Huyen', '11 TTT q11', '099999', 2),
(5, NULL, NULL, 'Tran Van Ka', '196 TVH q9', '098564123', 3),
(6, NULL, NULL, 'Ho Van Cuong', '152 HQL q6', '0965753304', 3),
(7, NULL, NULL, 'Tran Van Dau', '22 TTT q9', '096575222', 3);

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

DROP TABLE IF EXISTS `donhang`;
CREATE TABLE IF NOT EXISTS `donhang` (
  `madonhang` int(10) NOT NULL AUTO_INCREMENT,
  `masp` int(10) NOT NULL,
  `makh` int(10) NOT NULL,
  `soluong` int(11) NOT NULL,
  `gia` int(10) NOT NULL,
  `ma` varchar(50) NOT NULL,
  `ngaydat` timestamp NOT NULL,
  `ngaygiao` datetime DEFAULT NULL,
  `trangthai` int(11) NOT NULL DEFAULT '0',
  `manv` int(11) DEFAULT NULL,
  `manvgh` int(10) DEFAULT NULL,
  PRIMARY KEY (`madonhang`),
  KEY `makh` (`makh`),
  KEY `masp` (`masp`),
  KEY `maquyen` (`manv`),
  KEY `manvgh` (`manvgh`),
  KEY `trangthai` (`trangthai`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`madonhang`, `masp`, `makh`, `soluong`, `gia`, `ma`, `ngaydat`, `ngaygiao`, `trangthai`, `manv`, `manvgh`) VALUES
(24, 8, 2, 1, 6990000, '2360', '2020-12-11 02:56:10', NULL, 0, NULL, NULL),
(29, 31, 1, 1, 18990000, '9947', '2020-12-11 02:56:14', NULL, 0, NULL, NULL),
(30, 20, 2, 1, 15000000, '2773', '2020-12-11 03:10:48', NULL, 0, NULL, NULL),
(35, 10, 3, 1, 24490000, '9649', '2020-12-11 04:22:29', NULL, 0, NULL, NULL),
(36, 6, 1, 1, 300000, '9257', '2020-12-11 04:22:47', NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

DROP TABLE IF EXISTS `giohang`;
CREATE TABLE IF NOT EXISTS `giohang` (
  `magiohang` int(10) NOT NULL AUTO_INCREMENT,
  `masp` int(10) NOT NULL,
  `tensp` varchar(250) NOT NULL,
  `hinh` varchar(50) NOT NULL,
  `gia` int(10) NOT NULL,
  `soluong` int(11) NOT NULL,
  PRIMARY KEY (`magiohang`),
  KEY `masp` (`masp`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

DROP TABLE IF EXISTS `khachhang`;
CREATE TABLE IF NOT EXISTS `khachhang` (
  `makh` int(10) NOT NULL AUTO_INCREMENT,
  `tenkh` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `matkhau` varchar(20) NOT NULL,
  `sodienthoai` varchar(20) NOT NULL,
  `diachi` varchar(100) NOT NULL,
  PRIMARY KEY (`makh`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`makh`, `tenkh`, `email`, `matkhau`, `sodienthoai`, `diachi`) VALUES
(1, 'Nguyễn Văn Nhất', 'nvn@gmail.com', '123456', '069741120', '15 HTK p5 q8'),
(2, 'Đông Văn Hưng', 'dvh@gmail.com', '123456', '069743365', '15 afg q6 q8'),
(3, 'Phan Thiện Nghĩa', 'ptn@gmail.com', '123456', '09575333', '156 acf p5 q8');

-- --------------------------------------------------------

--
-- Table structure for table `loaisp`
--

DROP TABLE IF EXISTS `loaisp`;
CREATE TABLE IF NOT EXISTS `loaisp` (
  `maloai` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tenloai` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`maloai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loaisp`
--

INSERT INTO `loaisp` (`maloai`, `tenloai`) VALUES
('dt', 'Điện thoại'),
('lt', 'Laptop'),
('tn', 'Tai nghe'),
('usb', 'USB');

-- --------------------------------------------------------

--
-- Table structure for table `nhasx`
--

DROP TABLE IF EXISTS `nhasx`;
CREATE TABLE IF NOT EXISTS `nhasx` (
  `mansx` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tennsx` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xuatxu` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`mansx`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nhasx`
--

INSERT INTO `nhasx` (`mansx`, `tennsx`, `xuatxu`) VALUES
('ac', 'Acer', 'Đài Loan'),
('ap', 'Apple', 'Hoa Kỳ'),
('as', 'Asus', 'Đài Loan'),
('bs', 'Beats', 'Hoa Kỳ'),
('dell', 'Dell', 'Hoa Kỳ'),
('jbl', 'JBL', 'Hoa Kỳ'),
('lg', 'LG', 'Nhật Bản'),
('nk', 'Nokia', 'Phần Lan'),
('op', 'Oppo', 'Trung Quốc'),
('sd', 'Sandisk', 'Hoa Kỳ'),
('ss', 'Samsung', 'Hàn Quốc'),
('vs', 'Vsmarts', 'Việt Nam');

-- --------------------------------------------------------

--
-- Table structure for table `quyen`
--

DROP TABLE IF EXISTS `quyen`;
CREATE TABLE IF NOT EXISTS `quyen` (
  `maquyen` int(10) NOT NULL,
  `Ten` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`maquyen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `quyen`
--

INSERT INTO `quyen` (`maquyen`, `Ten`) VALUES
(1, 'Giám đốc'),
(2, 'Nhân viên bán hàng'),
(3, 'Nhân viên giao hàng');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

DROP TABLE IF EXISTS `sanpham`;
CREATE TABLE IF NOT EXISTS `sanpham` (
  `masp` int(10) NOT NULL AUTO_INCREMENT,
  `tensp` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gia` int(10) NOT NULL,
  `hinh` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `mansx` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `maloai` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`masp`),
  KEY `maloai` (`maloai`),
  KEY `mansx` (`mansx`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`masp`, `tensp`, `gia`, `hinh`, `mansx`, `maloai`) VALUES
(1, 'Điện Thoại iPhone 11', 19990000, 'iphone-11.png', 'ap', 'dt'),
(2, 'Điện Thoại Nokia 8.3', 1000000, 'nokia-83.png', 'nk', 'dt'),
(3, 'Điện Thoại Oppo A12', 3690000, 'oppo-a12.png', 'op', 'dt'),
(4, 'Điện Thoại Vsmart Live 4', 4790000, 'vsmart-live-4.png', 'vs', 'dt'),
(6, 'USB 3.0 32GB Sandisk CZ73', 300000, 'usb-30-32gb-sandisk-cz73.jpg', 'sd', 'usb'),
(7, 'USB 2.0 8GB Sandisk SDCZ3', 150000, 'usb-20-8gb-sandisk-sdcz33.jpg', 'sd', 'usb'),
(8, 'Tai nghe Bluetooth sạc không dây AirPods Pro Apple MWP22 Trắng', 6990000, 'tai-nghe-bluetooth-airpods-pro.jpg', 'ap', 'tn'),
(10, 'Laptop Asus Gaming Rog Strix G512', 24490000, 'asus-gaming-rog-strix-g512-i5-ial031t.png', 'as', 'lt'),
(11, 'Tai nghe nhét trong EarPods Lightning Apple MMTN2', 790000, 'tai-nghe-earpods-cong-lightning.jpg', 'ap', 'tn'),
(12, 'Điện Thoại Nokia 105', 1000000, 'nokia-105.png', 'nk', 'dt'),
(15, 'Tai Nghe Bluetooth TWS Beats-Powerbeats Pro', 790000, 'tai-nghe-bluetooth-tws-beats-powerbeats-pro.jpg', 'bs', 'tn'),
(20, 'Laptop Dell Inspiron 7591', 15000000, 'dell-inspiron-7591.png', 'dell', 'lt'),
(30, 'Tai Nghe Bluetooth LG HBS FN4', 199933, 'tai-nghe-bluetooth-lg-hbs-fn4-ava.jpg', 'lg', 'tn'),
(31, 'Laptop Acer Aspire 7 A715-41G-R150', 18990000, 'aspire_7ggg.png', 'ac', 'lt'),
(33, 'Điện Thoại Samsung Galaxy Note 10 Plus', 27000000, 'samsung-galaxy-note-10-plus.png', 'ss', 'dt'),
(34, 'Tai Nghe Nhét Trong JBl T110BLK', 790000, 'tai-nghe-nhet-trong-ep-jbl-t110blk.jpg', 'jbl', 'tn');

-- --------------------------------------------------------

--
-- Table structure for table `trangthai`
--

DROP TABLE IF EXISTS `trangthai`;
CREATE TABLE IF NOT EXISTS `trangthai` (
  `tentt` varchar(20) CHARACTER SET utf8 NOT NULL,
  `trangthai` int(11) NOT NULL,
  PRIMARY KEY (`trangthai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trangthai`
--

INSERT INTO `trangthai` (`tentt`, `trangthai`) VALUES
('Đang chờ xử lý', 0),
('Đã duyệt', 1),
('Đang giao hàng', 2),
('Hoàn thành', 3),
('Đã hủy', 4);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`maquyen`) REFERENCES `quyen` (`maquyen`) ON UPDATE CASCADE;

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`makh`) REFERENCES `khachhang` (`makh`) ON UPDATE CASCADE,
  ADD CONSTRAINT `donhang_ibfk_2` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`) ON UPDATE CASCADE,
  ADD CONSTRAINT `donhang_ibfk_3` FOREIGN KEY (`manv`) REFERENCES `admin` (`manv`) ON UPDATE CASCADE,
  ADD CONSTRAINT `donhang_ibfk_4` FOREIGN KEY (`manvgh`) REFERENCES `admin` (`manv`) ON UPDATE CASCADE,
  ADD CONSTRAINT `donhang_ibfk_5` FOREIGN KEY (`trangthai`) REFERENCES `trangthai` (`trangthai`) ON UPDATE CASCADE;

--
-- Constraints for table `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_ibfk_1` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`) ON UPDATE CASCADE;

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`maloai`) REFERENCES `loaisp` (`maloai`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`mansx`) REFERENCES `nhasx` (`mansx`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
