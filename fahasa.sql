-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2022 at 04:07 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fahasa`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `BookID` int(10) NOT NULL,
  `BookName` varchar(100) NOT NULL,
  `Image` varchar(200) NOT NULL,
  `CategoryID` int(10) NOT NULL,
  `PublisherID` int(10) NOT NULL,
  `Price` float NOT NULL,
  `Amount` int(10) NOT NULL,
  `Sold` int(10) NOT NULL,
  `Discount` double NOT NULL,
  `Old` tinyint(4) NOT NULL DEFAULT 0,
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`BookID`, `BookName`, `Image`, `CategoryID`, `PublisherID`, `Price`, `Amount`, `Sold`, `Discount`, `Old`, `Status`) VALUES
(1, 'Thuật Đọc Tâm', './images/Thuatdoctam.jpg', 7, 2, 100000, 21, 0, 0.3, 0, 1),
(2, 'Đại Văn Hào H. C. Andersen', './images/H.C.Anderesen.jpg', 2, 1, 170000, 8, 8, 0, 1, 1),
(3, 'Những Giấc Mơ Ở Hiệu Sách Mori', './images/Morisaki.jpg', 6, 1, 30000, 6, 4, 0, 0, 1),
(5, 'Cuốn Sách Về Các Biểu Tượng Tâ', './images/bieutuongtamlin.jpg', 8, 1, 69000, 10, 0, 0, 0, 1),
(7, 'Chiến Binh Cầu Vồng (Tái Bản 2', './images/7mau.jpg', 2, 1, 100000, 10, 0, 0, 0, 1),
(9, 'Đời Thừa - Danh Tác Văn Học Việt Nam', './images/doithua.jpg', 2, 1, 10000, 15, 24, 0.2, 1, 1),
(11, 'Việt Nam Sử Lược', './images/viet-nam-su-luoc.jpg', 4, 1, 10000, 8, 21, 0.3, 1, 1),
(12, 'Hiểu Hết Về Tâm Lý Học', './images/hieuhetvetamlyhoc.jpg', 7, 1, 11300, 25, 31, 0.4, 1, 1),
(13, 'Giáo Trình Triết Học Mác – Lên', './images/giaotrinhmaclenin.jpg', 5, 1, 10000, 20, 1, 0.2, 0, 1),
(14, 'Bài Tập Lập Trình Python', './images/python.jpg', 1, 1, 10000, 5, 22, 0.4, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CategoryID` int(10) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryID`, `Name`, `Status`) VALUES
(1, 'Khoa học công nghệ 2', 1),
(2, 'Văn học nghệ thuật', 1),
(4, 'Văn hóa xã hội – Lịch sử', 1),
(5, 'Giáo trình', 1),
(6, 'Truyện, tiểu thuyết', 1),
(7, 'Tâm lý', 1),
(8, 'Tâm linh', 1),
(10, 'Sách thiếu nhi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `CustomerID` varchar(16) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `FullName` varchar(40) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `PhoneNumber` varchar(10) NOT NULL,
  `PermissionID` int(11) NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`CustomerID`, `Password`, `FullName`, `Address`, `Email`, `PhoneNumber`, `PermissionID`, `Status`) VALUES
('admin', 'admin', 'admin 1 nè', 'LA', '123123asd@gmail.com', '0123123123', 1, 1),
('admin1', 'admin', 'canh', 'ád', 'ád', '123', 1, 0),
('admin2', 'canh123', 'Cảnhhh', 'Long An', '123@gmail.com', '0123123123', 3, 1),
('canh123', 'admin', 'Cảnh', 'LA', '123@gmail.com', '0808080808', 2, 1),
('canh1234', 'admiin', 'ad', 'ad', 'admin@gmail.com', '1231231231', 2, 1),
('xuancanh', '123', 'Nguyen Xuan Canh', 'LA', 'x.canh123@gmail.com', '0817979112', 2, 1),
('xuancanh2', '123', 'Nguyễn Xuân Cảnh', 'LA', 'x.canh040701@gmail.c', '+848179791', 2, 1),
('xuancanh3', '123', '1x0007 Nguyễn', 'asd', 'x.canh040701@gmail.c', '+108179791', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `function`
--

CREATE TABLE `function` (
  `FunctionID` int(11) NOT NULL,
  `FunctionName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `function`
--

INSERT INTO `function` (`FunctionID`, `FunctionName`) VALUES
(1, 'Sách'),
(2, 'Quản lý TK thành viên'),
(3, 'Bảng dữ liệu'),
(4, 'Phân quyền'),
(5, 'Thống kê'),
(6, 'Quản lý thể loại sách'),
(7, 'Quản lý nhà xuất bản'),
(8, 'Quản lý TK nhân viên'),
(9, 'Trả lời hỗ trợ');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `MsgID` int(11) NOT NULL,
  `OutgoingID` varchar(16) NOT NULL,
  `IncomingID` varchar(16) NOT NULL,
  `Time` datetime NOT NULL,
  `Msg` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`MsgID`, `OutgoingID`, `IncomingID`, `Time`, `Msg`) VALUES
(1, 'admin', 'xuancanh2', '0000-00-00 00:00:00', 'asd'),
(2, 'admin2', 'xuancanh2', '0000-00-00 00:00:00', 'asd'),
(3, 'xuancanh2', 'admin2', '2022-02-17 10:27:26', 'asdasd'),
(4, 'xuancanh2', 'admin2', '2022-05-05 14:56:26', 'asd'),
(5, 'xuancanh2', 'admin2', '2022-05-05 15:31:57', 'asd'),
(6, 'xuancanh2', 'admin2', '2022-05-05 15:51:24', 'asd'),
(7, 'xuancanh', 'admin2', '2022-05-05 15:51:56', '12sd'),
(8, 'xuancanh2', 'admin', '2022-05-05 15:58:42', 'alo các bạn nhân viên ơi'),
(9, 'xuancanh2', 'admin', '2022-05-05 16:03:47', 'tôi cần hỗ trợ'),
(10, 'xuancanh2', 'admin', '2022-05-05 16:04:11', 'alo alo'),
(11, 'xuancanh', 'admin1', '2022-05-06 04:37:46', 'éc ô éc'),
(12, 'admin', 'xuancanh2', '2022-05-06 05:48:23', 'asd'),
(13, 'admin', 'xuancanh2', '2022-05-06 05:48:34', 'éc o éc'),
(14, 'admin', 'xuancanh2', '2022-05-06 05:51:08', 'ehehehe'),
(15, 'admin', 'xuancanh2', '2022-05-06 13:47:04', 'chafo banj'),
(16, 'xuancanh2', 'admin', '2022-05-06 13:47:08', 'helo'),
(17, 'xuancanh2', 'admin', '2022-05-06 13:47:20', 'asd'),
(18, 'admin', 'xuancanh2', '2022-05-06 13:47:23', 'asd'),
(19, 'xuancanh2', 'admin', '2022-05-06 13:48:50', 'sss'),
(20, 'xuancanh2', 'admin', '2022-05-06 13:48:58', 'ss'),
(21, 'xuancanh2', 'admin', '2022-05-06 13:54:59', 'sd'),
(22, 'xuancanh3', 'admin', '2022-05-06 14:00:35', 'hello'),
(23, 'xuancanh3', 'admin', '2022-05-06 14:00:42', 'tooi caafn hoox trojw'),
(24, 'admin', 'xuancanh3', '2022-05-06 14:00:57', 'banj can giup gi a');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `OrderID` int(10) UNSIGNED NOT NULL,
  `BookID` int(10) NOT NULL,
  `Quantity` tinyint(4) NOT NULL,
  `Price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`OrderID`, `BookID`, `Quantity`, `Price`) VALUES
(9, 1, 2, 10000),
(9, 2, 1, 22500),
(11, 12, 1, 11300),
(12, 11, 4, 7000),
(12, 12, 3, 4520),
(13, 11, 5, 7000),
(14, 11, 1, 7000),
(15, 11, 1, 7000),
(16, 9, 10, 7000),
(16, 14, 5, 4000),
(17, 11, 3, 7000),
(17, 14, 12, 4000),
(18, 13, 10, 2000),
(21, 14, 1, 4000),
(22, 12, 3, 6780),
(23, 12, 3, 6780),
(24, 9, 1, 3000),
(25, 12, 4, 6780),
(26, 9, 3, 8000),
(26, 11, 3, 7000),
(27, 9, 2, 8000),
(27, 14, 1, 6000),
(28, 12, 1, 6780);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(10) UNSIGNED NOT NULL,
  `CustomerID` varchar(16) NOT NULL,
  `Date` date NOT NULL,
  `Total` float NOT NULL,
  `Shipped` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `CustomerID`, `Date`, `Total`, `Shipped`) VALUES
(9, 'admin', '2021-08-28', 4, 0),
(11, 'admin2', '2021-11-04', 4520, 0),
(12, 'admin', '2021-11-04', 25520, 0),
(13, 'admin1', '2021-11-04', 35000, 0),
(14, 'admin2', '2021-11-04', 7000, 0),
(15, 'admin', '2021-11-04', 7000, 0),
(16, 'admin1', '2021-11-04', 47000, 0),
(17, 'admin2', '2021-11-04', 69000, 0),
(18, 'admin', '2021-11-04', 20000, 100),
(21, 'admin', '2021-11-18', 4000, 1),
(22, 'xuancanh', '2021-12-14', 20340, 100),
(23, 'xuancanh', '2021-12-15', 20340, 1),
(24, 'xuancanh', '2021-12-15', 3000, 100),
(25, 'xuancanh', '2021-12-15', 27120, 100),
(26, 'xuancanh', '2022-04-27', 45000, 1),
(27, 'xuancanh', '2022-04-27', 22000, 1),
(28, 'xuancanh', '2022-05-07', 6780, 0);

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `PermissionID` int(11) NOT NULL,
  `PermissionName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`PermissionID`, `PermissionName`) VALUES
(1, 'Quản lý'),
(2, 'Khách hàng'),
(3, 'Nhân viên\n');

-- --------------------------------------------------------

--
-- Table structure for table `permissiondetail`
--

CREATE TABLE `permissiondetail` (
  `PermissionID` int(11) NOT NULL,
  `FunctionID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permissiondetail`
--

INSERT INTO `permissiondetail` (`PermissionID`, `FunctionID`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(3, 1),
(3, 3),
(3, 5),
(3, 6),
(3, 7),
(3, 9);

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `PublisherID` int(10) NOT NULL,
  `PublisherName` varchar(100) NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`PublisherID`, `PublisherName`, `Status`) VALUES
(1, 'NXB Kim Đồng', 1),
(2, 'NXB Trẻ', 1),
(6, 'ád', 1);

-- --------------------------------------------------------

--
-- Table structure for table `storagehistory`
--

CREATE TABLE `storagehistory` (
  `CustomerID` varchar(16) NOT NULL,
  `BookID` int(10) NOT NULL,
  `Amount` int(10) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `storagehistory`
--

INSERT INTO `storagehistory` (`CustomerID`, `BookID`, `Amount`, `Description`, `Date`) VALUES
('admin', 1, 12, 'add more', '2022-04-27'),
('admin', 9, 10, 'Nhập hàng ngày 19/11', '2021-11-19'),
('admin', 11, 10, 'admin nhập hàng', '2021-12-15'),
('admin', 12, 20, 'Nhập hàng ngày 19/11', '2021-11-19'),
('admin', 13, 10, 'admin nhập hàng', '2021-12-15');

-- --------------------------------------------------------

--
-- Table structure for table `wistlist`
--

CREATE TABLE `wistlist` (
  `CustomerID` varchar(16) NOT NULL,
  `BookID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wistlist`
--

INSERT INTO `wistlist` (`CustomerID`, `BookID`) VALUES
('xuancanh', 11),
('xuancanh', 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`BookID`),
  ADD KEY `CategoryID` (`CategoryID`),
  ADD KEY `PublisherID` (`PublisherID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CustomerID`),
  ADD KEY `PermissionID` (`PermissionID`);

--
-- Indexes for table `function`
--
ALTER TABLE `function`
  ADD PRIMARY KEY (`FunctionID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`MsgID`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`OrderID`,`BookID`),
  ADD KEY `VegetableID` (`BookID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`PermissionID`);

--
-- Indexes for table `permissiondetail`
--
ALTER TABLE `permissiondetail`
  ADD PRIMARY KEY (`PermissionID`,`FunctionID`),
  ADD KEY `FunctionID` (`FunctionID`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`PublisherID`);

--
-- Indexes for table `storagehistory`
--
ALTER TABLE `storagehistory`
  ADD PRIMARY KEY (`CustomerID`,`BookID`),
  ADD KEY `BookID` (`BookID`);

--
-- Indexes for table `wistlist`
--
ALTER TABLE `wistlist`
  ADD PRIMARY KEY (`CustomerID`,`BookID`),
  ADD KEY `BookID` (`BookID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `BookID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CategoryID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `function`
--
ALTER TABLE `function`
  MODIFY `FunctionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `MsgID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `PermissionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `PublisherID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `category` (`CategoryID`),
  ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`PublisherID`) REFERENCES `publisher` (`PublisherID`);

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`PermissionID`) REFERENCES `permission` (`PermissionID`);

--
-- Constraints for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`BookID`) REFERENCES `book` (`BookID`),
  ADD CONSTRAINT `orderdetail_ibfk_3` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customers` (`CustomerID`);

--
-- Constraints for table `permissiondetail`
--
ALTER TABLE `permissiondetail`
  ADD CONSTRAINT `permissiondetail_ibfk_1` FOREIGN KEY (`FunctionID`) REFERENCES `function` (`FunctionID`),
  ADD CONSTRAINT `permissiondetail_ibfk_2` FOREIGN KEY (`PermissionID`) REFERENCES `permission` (`PermissionID`);

--
-- Constraints for table `storagehistory`
--
ALTER TABLE `storagehistory`
  ADD CONSTRAINT `storagehistory_ibfk_1` FOREIGN KEY (`BookID`) REFERENCES `book` (`BookID`),
  ADD CONSTRAINT `storagehistory_ibfk_2` FOREIGN KEY (`CustomerID`) REFERENCES `customers` (`CustomerID`);

--
-- Constraints for table `wistlist`
--
ALTER TABLE `wistlist`
  ADD CONSTRAINT `wistlist_ibfk_1` FOREIGN KEY (`BookID`) REFERENCES `book` (`BookID`),
  ADD CONSTRAINT `wistlist_ibfk_2` FOREIGN KEY (`CustomerID`) REFERENCES `customers` (`CustomerID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
