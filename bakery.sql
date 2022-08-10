-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2022 at 04:42 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--abc
-- Database: `bakery`
--

-- --------------------------------------------------------

--
-- Table structure for table `banking`
--

CREATE TABLE `banking` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banking`
--

INSERT INTO `banking` (`ID`, `Name`) VALUES
(1, 'Wells Fargo & Co.'),
(2, 'Bank of America'),
(3, 'Citigroup');

-- --------------------------------------------------------

--
-- Table structure for table `catalogue`
--

CREATE TABLE `catalogue` (
  `CataID` int(11) NOT NULL,
  `CataName` varchar(50) NOT NULL,
  `FileName` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catalogue`
--

INSERT INTO `catalogue` (`CataID`, `CataName`, `FileName`) VALUES
(17, 'Sản Phẩm', 'Product'),
(18, 'Loại Sản Phẩm', 'Category'),
(19, 'Thành Viên', 'Customer'),
(20, 'Nhân Viên', 'Employee'),
(21, 'Nhà Sản Xuất', 'Producer'),
(22, 'Khuyến Mãi', 'Discount'),
(23, 'Đơn Hàng', 'Order'),
(24, 'Hóa Đơn', 'Invoice'),
(25, 'Phiếu Xuất', 'DeliveryNote'),
(26, 'Phiếu Nhập', 'ReceiveNote'),
(27, 'Hạn Sử Dụng', 'Expiration'),
(28, 'Đánh Giá', 'Review'),
(29, 'Chức Năng', 'Catalogue'),
(30, 'Quyền Hạn', 'Privilege'),
(31, 'Thống Kê', 'Statistic'),
(33, 'Kiểm Kho', 'CheckInventory');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CategoryID` int(10) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Description` varchar(50) DEFAULT NULL,
  `Image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryID`, `Name`, `Description`, `Image`) VALUES
(1, 'Croissants', 'Yummy, delicious and so sweet', 'croissant.jpg'),
(7, 'Donuts', 'Yummy', 'donut.jpg'),
(8, 'Pastries', 'Love them so much', 'pastries.jpg'),
(10, 'Muffin', 'so yummmy', 'muffin.jpg'),
(11, 'Cupcake', 'so cuteeeee', 'cupcake.jpg'),
(13, 'Pound Cake', 'Soft, sweet and gorgeous', 'poundcake.jpg'),
(14, 'Cookies', 'Crunchy and Tasty', 'cookies.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `checkinventory`
--

CREATE TABLE `checkinventory` (
  `CheckID` int(11) NOT NULL,
  `EmployeeID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `TotalQty` int(11) NOT NULL,
  `TotalWrongQty` int(11) NOT NULL,
  `TotalValue` double NOT NULL,
  `Status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checkinventory`
--

INSERT INTO `checkinventory` (`CheckID`, `EmployeeID`, `Date`, `TotalQty`, `TotalWrongQty`, `TotalValue`, `Status`) VALUES
(11, 3, '2022-05-25', 45, 11, 447000, 1),
(12, 3, '2022-05-25', 42, 12, 396000, 0),
(13, 3, '2022-05-25', 45, 15, 631000, 0),
(14, 3, '2022-05-25', 57, 10, 378000, 1),
(15, 3, '2022-05-25', 65, 11, 445000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `CustomerID` int(10) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Fullname` varchar(40) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `City` varchar(20) DEFAULT NULL,
  `Image` text NOT NULL DEFAULT 'none.jpg',
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`CustomerID`, `UserName`, `Password`, `Fullname`, `Email`, `Phone`, `Address`, `City`, `Image`, `Status`) VALUES
(1, 'john', '325a2cc052914ceeb8c19016c091d2ac', 'John Smith', 'JoS@gmail.com', '0908777555', '222 Thái Hà', 'Hồ Chí Minh', 'evans_m.jpg', 1),
(2, 'johnny', '325a2cc052914ceeb8c19016c091d2ac', 'Jonny English', 'JE@gmail.com', '0987776556', '99 River View', 'Reading', 'none.jpg', 1),
(3, 'eliz', '325a2cc052914ceeb8c19016c091d2ac', 'Elizabeth', 'Eliz@gmail.com', '0943319899', '23 Buckinghamshire', 'Califonia', 'elizabelth.jpg', 1),
(4, 'beat', '325a2cc052914ceeb8c19016c091d2ac', 'Beatrix', 'Bea@gmail.com', '0954443813', '66 Royal Crescent', 'Bath', 'none.jpg', 1),
(8, 'alice', '202cb962ac59075b964b07152d234b70', 'Alice Watson', 'alice@gmail.com', '0909555333', 'California', 'Califonia', 'emma.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `deliverynote`
--

CREATE TABLE `deliverynote` (
  `DeliveryID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `TotalAmount` int(11) NOT NULL,
  `OrderID` int(11) NOT NULL,
  `EmployeeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deliverynote`
--

INSERT INTO `deliverynote` (`DeliveryID`, `Date`, `TotalAmount`, `OrderID`, `EmployeeID`) VALUES
(14, '2022-02-01', 1, 26, 3),
(15, '2022-02-04', 3, 27, 3),
(16, '2022-02-08', 2, 29, 3),
(17, '2022-02-16', 2, 30, 3),
(18, '2022-02-23', 3, 32, 3),
(19, '2022-02-25', 3, 33, 3),
(20, '2022-02-28', 2, 34, 3),
(21, '2022-03-02', 2, 35, 3),
(22, '2022-03-08', 2, 36, 3),
(23, '2022-03-12', 3, 37, 3),
(24, '2022-03-22', 3, 38, 3),
(25, '2022-03-25', 3, 39, 3),
(26, '2022-04-01', 3, 40, 3),
(27, '2022-04-08', 2, 41, 3),
(28, '2022-04-12', 2, 42, 3),
(29, '2022-05-13', 3, 43, 3),
(30, '2022-04-14', 2, 44, 3),
(31, '2022-05-07', 2, 45, 3),
(32, '2022-06-01', 5, 47, 3);

-- --------------------------------------------------------

--
-- Table structure for table `deliverynotedetail`
--

CREATE TABLE `deliverynotedetail` (
  `DeliveryID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deliverynotedetail`
--

INSERT INTO `deliverynotedetail` (`DeliveryID`, `ProductID`, `Amount`) VALUES
(14, 41, 1),
(15, 39, 2),
(15, 42, 1),
(16, 32, 1),
(16, 36, 1),
(17, 35, 1),
(17, 42, 1),
(18, 36, 1),
(18, 40, 2),
(19, 25, 2),
(19, 30, 1),
(20, 32, 1),
(20, 34, 1),
(21, 25, 1),
(21, 39, 1),
(22, 35, 1),
(22, 40, 1),
(23, 27, 2),
(23, 33, 1),
(24, 40, 2),
(24, 41, 1),
(25, 37, 2),
(25, 38, 1),
(26, 24, 1),
(26, 32, 2),
(27, 39, 1),
(27, 42, 1),
(28, 32, 1),
(28, 36, 1),
(29, 41, 2),
(29, 42, 1),
(30, 41, 1),
(30, 43, 1),
(31, 36, 1),
(31, 37, 1),
(32, 25, 5);

-- --------------------------------------------------------

--
-- Table structure for table `detailcheckinventory`
--

CREATE TABLE `detailcheckinventory` (
  `CheckID` int(11) NOT NULL,
  `ProductID` int(10) NOT NULL,
  `Price` double NOT NULL,
  `Qty` int(11) NOT NULL,
  `WrongQty` int(11) NOT NULL,
  `StatusQty` varchar(50) NOT NULL,
  `SubValue` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detailcheckinventory`
--

INSERT INTO `detailcheckinventory` (`CheckID`, `ProductID`, `Price`, `Qty`, `WrongQty`, `StatusQty`, `SubValue`) VALUES
(11, 33, 48000, 30, 2, 'Thừa', 96000),
(11, 36, 39000, 5, 4, 'Thừa', 156000),
(11, 41, 39000, 10, 5, 'Thừa', 195000),
(12, 30, 30000, 20, -4, 'Thiếu', -120000),
(12, 41, 39000, 3, -2, 'Thiếu', -78000),
(12, 44, 33000, 19, -6, 'Thiếu', -198000),
(13, 36, 39000, 10, 9, 'Thừa', 351000),
(13, 38, 44000, 30, -2, 'Thiếu', -88000),
(13, 42, 48000, 5, -4, 'Thiếu', -192000),
(14, 24, 39000, 25, -8, 'Thiếu', -312000),
(14, 41, 39000, 5, 0, 'Khớp', 0),
(14, 44, 33000, 27, 2, 'Thừa', 66000),
(15, 27, 48000, 30, 2, 'Thừa', 96000),
(15, 37, 46000, 5, 4, 'Thừa', 184000),
(15, 41, 39000, 10, 0, 'Khớp', 0),
(15, 44, 33000, 20, -5, 'Thiếu', -165000);

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `DiscountID` int(11) NOT NULL,
  `DiscountName` varchar(50) NOT NULL,
  `DateFrom` date NOT NULL,
  `DateTo` date NOT NULL,
  `Image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`DiscountID`, `DiscountName`, `DateFrom`, `DateTo`, `Image`) VALUES
(1, 'Chương trình bữa sáng cùng MUN BAKERY', '2022-04-01', '2022-05-02', 'easter_bakery.jpg'),
(2, 'Chúc Mừng Ngày Của Mẹ', '2022-05-01', '2022-07-01', 'happy_bakery.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `discountdetail`
--

CREATE TABLE `discountdetail` (
  `DiscountID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Percent` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `discountdetail`
--

INSERT INTO `discountdetail` (`DiscountID`, `ProductID`, `Percent`) VALUES
(1, 23, 2),
(1, 25, 5),
(1, 27, 5),
(1, 30, 5),
(1, 33, 5),
(1, 34, 8),
(1, 35, 5),
(2, 32, 10),
(2, 33, 5),
(2, 35, 15),
(2, 37, 5),
(2, 39, 10),
(2, 41, 10),
(2, 42, 10);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EmpID` int(11) NOT NULL,
  `EmpName` varchar(50) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `Address` text NOT NULL,
  `Image` text NOT NULL,
  `PrivID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EmpID`, `EmpName`, `UserName`, `Password`, `Email`, `Phone`, `Address`, `Image`, `PrivID`) VALUES
(3, 'John', 'john', '202cb962ac59075b964b07152d234b70', 'John@gmal.com', '0899789666', 'Texas', 'tom.jpg', 2),
(5, 'Jonny Ryan', 'jonny', '123', 'tom@gmail.com', '0917888333', 'California', 'ryan.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `hangvanchuyen`
--

CREATE TABLE `hangvanchuyen` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hangvanchuyen`
--

INSERT INTO `hangvanchuyen` (`ID`, `Name`) VALUES
(1, 'DoorDash'),
(2, 'FedEx'),
(3, 'Amazon Logistics'),
(4, 'Postmates');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `InvoiceID` int(11) NOT NULL,
  `Recipient` varchar(100) NOT NULL,
  `Date` date NOT NULL,
  `Total` float NOT NULL,
  `DeliveryID` int(11) NOT NULL,
  `EmployeeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`InvoiceID`, `Recipient`, `Date`, `Total`, `DeliveryID`, `EmployeeID`) VALUES
(11, 'John Smith', '2022-02-01', 39000, 14, 3),
(12, 'John Smith', '2022-02-01', 39000, 14, 3),
(13, 'John Smith', '2022-02-01', 39000, 14, 3),
(14, 'John Smith', '2022-02-01', 39000, 14, 3),
(15, 'John Smith', '2022-02-01', 39000, 14, 3),
(16, 'John Smith', '2022-02-01', 39000, 14, 3),
(17, 'John Smith', '2022-02-01', 39000, 14, 3),
(18, 'John Smith', '2022-02-01', 39000, 14, 3),
(19, 'John Smith', '2022-02-01', 39000, 14, 3),
(20, 'John Smith', '2022-02-01', 39000, 14, 3),
(21, 'John Smith', '2022-02-01', 39000, 14, 3),
(22, 'John Smith', '2022-02-01', 39000, 14, 3),
(23, 'John Smith', '2022-02-01', 39000, 14, 3),
(24, 'John Smith', '2022-02-01', 39000, 14, 3),
(25, 'John Smith', '2022-02-04', 91200, 15, 3),
(26, 'John Smith', '2022-02-08', 97500, 16, 3),
(27, 'John Smith', '2022-02-16', 103200, 17, 3),
(28, 'Elizabeth', '2022-02-23', 116000, 18, 3),
(29, 'Elizabeth', '2022-02-25', 78000, 19, 3),
(30, 'Elizabeth', '2022-02-28', 106650, 20, 3),
(31, 'Elizabeth', '2022-03-02', 45600, 21, 3),
(32, 'John Smith', '2022-03-08', 89500, 22, 3),
(33, 'John Smith', '2022-03-12', 130200, 23, 3),
(34, 'John Smith', '2022-03-22', 112100, 24, 3),
(35, 'Elizabeth', '2022-03-25', 131400, 25, 3),
(36, 'Elizabeth', '2022-04-01', 150800, 26, 3),
(37, 'Elizabeth', '2022-04-08', 64800, 27, 3),
(38, 'Elizabeth', '2022-04-12', 91650, 28, 3),
(39, 'Elizabeth', '2022-04-12', 91650, 28, 3),
(45, 'Elizabeth', '2022-05-13', 113400, 29, 3),
(46, 'Elizabeth', '2022-05-13', 113400, 29, 3),
(47, 'Elizabeth', '2022-05-13', 113400, 29, 3),
(48, 'Elizabeth', '2022-05-13', 113400, 29, 3),
(49, 'Elizabeth', '2022-04-14', 101100, 30, 3),
(50, 'Elizabeth', '2022-05-07', 82700, 31, 3),
(51, 'Jonny English', '2022-06-01', 150000, 32, 3);

-- --------------------------------------------------------

--
-- Table structure for table `invoicedetail`
--

CREATE TABLE `invoicedetail` (
  `InvoiceID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Price` float NOT NULL,
  `Quanity` int(11) NOT NULL,
  `Subtotal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoicedetail`
--

INSERT INTO `invoicedetail` (`InvoiceID`, `ProductID`, `Price`, `Quanity`, `Subtotal`) VALUES
(11, 41, 39000, 1, 39000),
(12, 41, 39000, 1, 39000),
(13, 41, 39000, 1, 39000),
(14, 41, 39000, 1, 39000),
(15, 41, 39000, 1, 39000),
(16, 41, 39000, 1, 39000),
(17, 41, 39000, 1, 39000),
(18, 41, 39000, 1, 39000),
(19, 41, 39000, 1, 39000),
(20, 41, 39000, 1, 39000),
(21, 41, 39000, 1, 39000),
(22, 41, 39000, 1, 39000),
(23, 41, 39000, 1, 39000),
(24, 41, 39000, 1, 39000),
(25, 39, 24000, 2, 48000),
(25, 42, 48000, 1, 48000),
(26, 32, 58500, 1, 58500),
(26, 36, 39000, 1, 39000),
(27, 35, 60000, 1, 60000),
(27, 42, 48000, 1, 48000),
(28, 36, 39000, 1, 39000),
(28, 40, 38500, 2, 77000),
(29, 25, 24000, 2, 48000),
(29, 30, 30000, 1, 30000),
(30, 32, 58500, 1, 58500),
(30, 34, 54000, 1, 54000),
(31, 25, 24000, 1, 24000),
(31, 39, 24000, 1, 24000),
(32, 35, 60000, 1, 60000),
(32, 40, 38500, 1, 38500),
(33, 27, 48000, 2, 96000),
(33, 33, 36000, 1, 36000),
(34, 40, 38500, 2, 77000),
(34, 41, 39000, 1, 39000),
(35, 37, 46000, 2, 92000),
(35, 38, 44000, 1, 44000),
(36, 24, 45500, 1, 45500),
(36, 32, 58500, 2, 117000),
(37, 39, 24000, 1, 24000),
(37, 42, 48000, 1, 48000),
(38, 32, 58500, 1, 58500),
(38, 36, 39000, 1, 39000),
(39, 32, 58500, 1, 58500),
(39, 36, 39000, 1, 39000),
(45, 41, 39000, 2, 78000),
(45, 42, 48000, 1, 48000),
(46, 41, 39000, 2, 78000),
(46, 42, 48000, 1, 48000),
(47, 41, 39000, 2, 78000),
(47, 42, 48000, 1, 48000),
(48, 41, 39000, 2, 78000),
(48, 42, 48000, 1, 48000),
(49, 41, 39000, 1, 39000),
(49, 43, 66000, 1, 66000),
(50, 36, 39000, 1, 39000),
(50, 37, 46000, 1, 46000),
(51, 25, 30000, 5, 150000);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `OrderID` int(11) NOT NULL,
  `ProductID` int(10) NOT NULL,
  `Price` float NOT NULL,
  `Quantity` tinyint(4) NOT NULL,
  `SubPrice` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`OrderID`, `ProductID`, `Price`, `Quantity`, `SubPrice`) VALUES
(26, 41, 39000, 1, 39000),
(27, 42, 43200, 1, 43200),
(27, 39, 24000, 2, 48000),
(28, 38, 44000, 2, 88000),
(28, 37, 46000, 1, 46000),
(29, 32, 58500, 1, 58500),
(29, 36, 39000, 1, 39000),
(30, 35, 60000, 1, 60000),
(30, 42, 43200, 1, 43200),
(31, 34, 54000, 1, 54000),
(31, 33, 36000, 1, 36000),
(32, 40, 38500, 2, 77000),
(32, 36, 39000, 1, 39000),
(33, 30, 30000, 1, 30000),
(33, 25, 24000, 2, 48000),
(34, 32, 52650, 1, 52650),
(34, 34, 54000, 1, 54000),
(35, 25, 24000, 1, 24000),
(35, 39, 21600, 1, 21600),
(36, 40, 38500, 1, 38500),
(36, 35, 51000, 1, 51000),
(37, 33, 34200, 1, 34200),
(37, 27, 48000, 2, 96000),
(38, 41, 35100, 1, 35100),
(38, 40, 38500, 2, 77000),
(39, 38, 44000, 1, 44000),
(39, 37, 43700, 2, 87400),
(40, 32, 52650, 2, 105300),
(40, 24, 45500, 1, 45500),
(41, 39, 21600, 1, 21600),
(41, 42, 43200, 1, 43200),
(42, 36, 39000, 1, 39000),
(42, 32, 52650, 1, 52650),
(43, 42, 43200, 1, 43200),
(43, 41, 35100, 2, 70200),
(44, 43, 66000, 1, 66000),
(44, 41, 35100, 1, 35100),
(45, 36, 39000, 1, 39000),
(45, 37, 43700, 1, 43700),
(47, 25, 30000, 5, 150000),
(48, 41, 35100, 1, 35100),
(48, 40, 38500, 2, 77000),
(49, 37, 43700, 1, 43700),
(49, 38, 44000, 1, 44000),
(50, 37, 43700, 1, 43700),
(50, 38, 44000, 1, 44000);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL,
  `CustomerID` int(10) NOT NULL,
  `Recipient` varchar(50) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `Address` text NOT NULL,
  `PayMethod` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `Total` float NOT NULL,
  `Note` text NOT NULL,
  `Status` varchar(11) NOT NULL DEFAULT 'STA1',
  `HangVanChuyen` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `CustomerID`, `Recipient`, `Phone`, `Address`, `PayMethod`, `Date`, `Total`, `Note`, `Status`, `HangVanChuyen`) VALUES
(26, 1, 'John Smith', '0908777555', '30 Broadway', 'Tiền mặt', '2022-02-01', 39000, 'abc', 'STA6', 1),
(27, 1, 'John Smith', '0908777555', '30 Broadway', 'Thẻ ghi nợ', '2022-02-04', 91200, 'abcd', 'STA6', 3),
(28, 1, 'John Smith', '0908777555', '30 Broadway', 'Tín dụng', '2022-02-06', 134000, 'abc', 'STB10', 1),
(29, 1, 'John Smith', '0908777555', '30 Broadway', 'Thẻ ghi nợ', '2022-02-08', 97500, 'abc', 'STA6', 4),
(30, 1, 'John Smith', '0908777555', '30 Broadway', 'Tín dụng', '2022-02-16', 103200, 'abc', 'STA6', 4),
(31, 1, 'John Smith', '0908777555', '30 Broadway', 'Tiền mặt', '2022-02-18', 90000, 'abc', 'STA9', 3),
(32, 3, 'Elizabeth', '0943319899', '23 Buckinghamshire', 'Tiền mặt', '2022-02-23', 116000, 'abc', 'STA6', 2),
(33, 3, 'Elizabeth', '0943319899', '23 Buckinghamshire', 'Thẻ ghi nợ', '2022-02-25', 78000, 'bcd', 'STA6', 1),
(34, 3, 'Elizabeth', '0943319899', '23 Buckinghamshire', 'Tín dụng', '2022-02-28', 106650, 'abc', 'STA6', 2),
(35, 3, 'Elizabeth', '0943319899', '23 Buckinghamshire', 'Tiền mặt', '2022-03-02', 45600, 'abc', 'STA6', 4),
(36, 1, 'John Smith', '0908777555', '30 Broadway', 'Tiền mặt', '2022-03-08', 89500, 'abc', 'STA6', 2),
(37, 1, 'John Smith', '0908777555', '30 Broadway', 'Tín dụng', '2022-03-12', 130200, 'abcd', 'STA6', 3),
(38, 1, 'John Smith', '0908777555', '30 Broadway', 'Thẻ ghi nợ', '2022-03-22', 112100, 'abdc', 'STA6', 1),
(39, 3, 'Elizabeth', '0943319899', '23 Buckinghamshire', 'Tiền mặt', '2022-03-25', 131400, 'abc', 'STA6', 3),
(40, 3, 'Elizabeth', '0943319899', '23 Buckinghamshire', 'Thẻ ghi nợ', '2022-04-01', 150800, 'kkkkk', 'STA6', 1),
(41, 3, 'Elizabeth', '0943319899', '23 Buckinghamshire', 'Tín dụng', '2022-04-08', 64800, 'avg', 'STA6', 4),
(42, 3, 'Elizabeth', '0943319899', '23 Buckinghamshire', 'Tiền mặt', '2022-04-12', 91650, 'mmmmm', 'STA6', 3),
(43, 3, 'Elizabeth', '0943319899', '23 Buckinghamshire', 'Tiền mặt', '2022-05-13', 113400, 'abcd', 'STA6', 3),
(44, 3, 'Elizabeth', '0943319899', '23 Buckinghamshire', 'Tiền mặt', '2022-04-14', 101100, 'abc', 'STA6', 4),
(45, 3, 'Elizabeth', '0943319899', '23 Buckinghamshire', 'Tiền mặt', '2022-05-07', 82700, 'abcd', 'STA6', 1),
(47, 2, 'Jonny English', '0987776556', '99 River View', 'Tiền mặt', '2022-06-01', 150000, '', 'STA5', 1),
(48, 1, 'John Smith', '0908777555', '30 Broadway', 'Tiền mặt', '2022-05-26', 112100, 'Sử dụng túi an toàn tự nhiên', 'STB10', 3),
(49, 1, 'John Smith', '0908777555', '30 Broadway', 'Tiền mặt', '2022-05-24', 87700, 'Nếu tui không có ở nhà. Vui lòng gửi chú bảo vệ phía dưới', 'STA1', 3),
(50, 1, 'John Smith', '0908777555', '30 Broadway', 'Tiền mặt', '2022-05-24', 87700, 'không dùng túi nhựa', 'STA1', 4);

-- --------------------------------------------------------

--
-- Table structure for table `privilege`
--

CREATE TABLE `privilege` (
  `PrivID` int(11) NOT NULL,
  `PrivName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `privilege`
--

INSERT INTO `privilege` (`PrivID`, `PrivName`) VALUES
(2, 'Admin'),
(3, 'Nhân viên bán hàng'),
(4, 'Thủ kho');

-- --------------------------------------------------------

--
-- Table structure for table `priv_cata`
--

CREATE TABLE `priv_cata` (
  `PrivID` int(11) NOT NULL,
  `CataID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `priv_cata`
--

INSERT INTO `priv_cata` (`PrivID`, `CataID`) VALUES
(2, 17),
(2, 18),
(2, 19),
(2, 20),
(2, 21),
(2, 22),
(2, 23),
(2, 24),
(2, 25),
(2, 26),
(2, 27),
(2, 28),
(2, 29),
(2, 30),
(2, 31),
(2, 33),
(3, 17),
(3, 18),
(3, 19),
(3, 23),
(3, 24),
(3, 27),
(4, 21),
(4, 25),
(4, 26),
(4, 27),
(4, 31);

-- --------------------------------------------------------

--
-- Table structure for table `producer`
--

CREATE TABLE `producer` (
  `ProducerID` int(11) NOT NULL,
  `ProducerName` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `Address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `producer`
--

INSERT INTO `producer` (`ProducerID`, `ProducerName`, `Email`, `Phone`, `Address`) VALUES
(1, 'Freshness Guaranteed', 'fresshness@gmail.com', '0908999313', 'California'),
(2, 'Flowers Foods', 'flowersFD@gmail.com', '0908999313', 'California USA'),
(3, 'Grupo Bimbo', 'grupo@gmail.com', '0909555333', 'Taiwan'),
(4, 'Britannia Industries ', 'britannia@gmail.com', '0899789666', 'Texas USA'),
(5, 'Yamazaki Baking', 'yamazaki@gmail.com', '0978999555', 'Japan'),
(6, 'Marketside', 'marketside@gmail.com', '0977666252', 'Taiwan');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` int(10) NOT NULL,
  `CategoryID` int(10) NOT NULL,
  `ProducerID` int(11) NOT NULL,
  `ProductName` varchar(30) NOT NULL,
  `Weight` int(11) NOT NULL,
  `Serving` int(11) NOT NULL,
  `Calory` int(11) NOT NULL,
  `Ingredient` text NOT NULL,
  `Description` text NOT NULL,
  `Amount` int(10) DEFAULT 0,
  `Image` varchar(50) NOT NULL,
  `Cost` float NOT NULL DEFAULT 0,
  `Profit` float NOT NULL DEFAULT 0,
  `Price` float NOT NULL DEFAULT 0,
  `Status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `CategoryID`, `ProducerID`, `ProductName`, `Weight`, `Serving`, `Calory`, `Ingredient`, `Description`, `Amount`, `Image`, `Cost`, `Profit`, `Price`, `Status`) VALUES
(23, 8, 2, 'Orange Cranberry', 45, 6, 180, 'Scone (Enriched Wheat Flour [Wheat Flour, Niacin, Reduced Iron, Ascorbic Acid As A Dough Conditioner, Thiamine Mononitrate, Riboflavin, Enzyme, Folic Acid], Sugar, Vegetable Oil Shortening [Palm Oil, Soybean Oil], Egg, Cranberries, Orange Purée, Butter [Cream, Salt), Leavening Blend [Sodium Acid Pyrophosphate, Sodium Bicarbonate, Corn Starch, Monocalcium Phosphate, Calcium Sulfate], Water, Salt, Artificial Flavor), Glaze (Icing Sugar [Sugar, Corn Starch], Water, Corn Syrup, Guar Gum, Modified Potato Starch, Xanthan Gum).', 'You will love to kickstart your day with deliciously sweet note Orange Cranberry Mini Scones from Favorite Day. These citrus berry scones may be small in stature, but they are packed full of bright orange flavor and pops of tart cranberry for scrumptious taste in every bite. With roughly six servings per container, these cranberry scones make a lovely addition to a full brunch spread with other scone varieties, or as an anytime treat whenever your sweet tooth is buzzin.\r\nA little bliss in every bite. Guaranteed to be a favorite or your money back.', 24, 'images/orange_cranberry-removebg-preview.png', 15000, 20, 18000, 1),
(24, 1, 2, 'Cheese Croissant', 60, 4, 200, 'Croissant: Enriched Wheat Flour (Wheat Flour, Niacin, Reduced Iron, Thiamine Mononitrate, Riboflavin, Folic Acid), Water, Margarine (Palm Oil, Fractionated Palm Oil, Canola Oil, Water, Sugar, Mono- And Diglycerides, Soybean Lecithin, Citric Acid, Artificial Flavor, Vitamin A Palmitate, Vitamin D3, Beta Carotene [Color]), Yeast, Sugar, High Fructose Corn Syrup, Soybean And/Or Canola Oil, Salt, Mono- And Diglycerides, Calcium Propionate (Preservative), Natural And Artificial Flavor, Sorbic Acid (Preservative), Enzymes, Fd&C Yellow #5, Fd&C Yellow #6, Datem, Sodium Stearoyl Lactylate, Ascorbic Acid, Sunflower Oil. Cream Cheese Flavored Filling: Water, Sugar, Light Cream Cheese (Cream, Skim Milk, Bacterial Culture, Salt, Guar Gum, Locust Bean Gum, Lactic Acid), Corn Syrup, Modified Corn Starch, Canola Oil, Salt, Lactic Acid, Gellan Gum, Mono- And Diglycerides, Potassium Sorbate (Preservative), Titanium Dioxide (Color), Fd&C Yellow #5, Fd&C Yellow #6, Artificial Flavor. Drizzle: Sugar, Vegetable Fat (Palm Kernel And/Or Palm), Whole Milk Powder, Dry Nonfat Yogurt (Cultured Skim Milk), Soy Lecithin (Emulsifier), Salt. Glaze: Corn Syrup, Water, Sugar, Honey, Sodium Alginate, Citric Acid, Mono- And Diglycerides, Sodium Benzoate (Preservative), Potassium Sorbate (Preservative), Artificial Flavor, Agar-Agar, Pectin.', 'Bite into creamy goodness with these Cheese Croissant Tiny Treats from Favorite Day™. These delectable croissants wrap over rich cream cheese with a white frosting drizzle on top for a sweet bite that is perfect as a dessert or as a breakfast. Each croissant is baked perfectly for a flaky, crispy exterior with a soft, airy interior that will have you smiling with delight. Whether you are enjoying it with a hot cup of coffee in the morning or a with glass of milk after dinner, these cream cheese croissants are sure to satisfy.\r\n\r\nA little bliss in every bite. Guaranteed to be a favorite or your money back.', 25, 'images/cream_cheese-removebg-preview.png', 30000, 30, 39000, 1),
(25, 1, 2, 'Petite Butter Croissants', 47, 6, 170, 'Enriched Wheat Flour (Wheat Flour, Niacin, Reduced Iron, Thiamine Mononitrate, Riboflavin, Folic Acid), Water, Butter (Cream), Sugar, Yeast, Eggs, Nonfat Dry Milk, Salt, Natural Flavor, Wheat Gluten, Whey Protein Concentrate, Datem, Inactivated Yeast, Mono- And Diglycerides, Xanthan Gum, L-Cysteine Hydrochloride, Enzyme, Canola Oil, Ascorbic Acid, Sodium Caseinate.', 'Bring home a little bite of Parisian paradise with Butter Croissants from Favorite Day™. These mini croissants are made in a smaller sizer so you can indulge in a bite-sized snack, but they are still everything you know and love from a classic breakfast delicacy packed with butter. Best served warm, try toasting these buttery croissants in the oven and either eat as is or slather on some jam or chocolate spread for extra sweetness. A 12-count pack is perfect for adding to a breakfast or brunch spread, or simply enjoying over multiple sessions throughout the week.\r\n\r\nA little bliss in every bite. Guaranteed to be a favorite or your money back.', 10, 'images/petite_croissants-removebg-preview.png', 25000, 20, 30000, 1),
(27, 1, 4, 'Cherry Danish', 260, 6, 330, 'Danish (Enriched Flour [Wheat Flour, Niacin, Iron, Thiamine Mononitrate, Riboflavin, Folic Acid, Enzyme, And Ascorbic Acid], Butter, Water, Sugar, Yeast, Dough Conditioner [Wheat Flour, Malted Barley Flour, Ascorbic Acid, Enzymes], Salt, Cinnamon, Wheat Gluten), Cherry Filling (Cherries [May Contain Pits], Corn Syrup, Water, Sugar, Modified Corn Starch, Contains Less Than 2% Of The Following: Citric Acid, To Preserve Freshness [Sodium Benzoate, Potassium Sorbate], Gellan Gum, Monocalcium Phosphate, Sodium Citrate, Artificial Color [Red 40]), Icing (Sugar, Water, Corn Syrup, Contains Less Than 2% Of The Following: Acetylated Monoglycerides, Artificial Flavor, Salt, To Preserve Fr Eshness [Potassium Sorbate], Colored With [Titanium Dioxide], Agar, Citric Acid, Locust Bean Gum), Canola Oil, Soybean Oil, Soy Lecithin, Mineral Oil, Propellant', 'Ready to eat and deliciously satisfying, these Cherry Danish from Favorite Day™ make for a breakfast delight or a sweet treat any time of day. The flaky, braided bread is baked to perfection, and the cherry filling is not too sweet and not too tart. Plus, the drizzled-on icing adds just the right amount of sweetness to the mix. Cherry Danish pastries are the perfect accompaniment to a cup of hot coffee or a cold glass of milk, and they taste great at room temperature or warmed with a touch of butter. The four-pack container allows for sharing these delicious cherry pastries with family or friends for a special occasion or just an impromptu get-together.\r\n\r\nA little bliss in every bite. Guaranteed to be a favorite or your money back.', 28, 'images/cherry_danish-removebg-preview.png', 36000, 20, 48000, 1),
(30, 10, 5, 'Carrot Cream Cheese', 113, 4, 370, 'Enriched Wheat Flour (Wheat Flour, Niacin, Iron, Thiamine Mononitrate, Riboflavin, Folic Acid), Brown Sugar, Carrots, Cream Cheese Filling (Water, Cream Cheese [Cream, Nonfat Milk, Salt, Guar Gum, Propylene Glycol Alginate, Carrageenan, Locust Bean Gum, Bacterial Culture], Sugar, Corn Syrup, Food Starch-Modified, Lactic Acid, Salt, Potassium Sorbate [Preservative], Sodium Citrate, Titanium Dioxide [Color Added], Locust Bean Gum, Xanthan Gum, Carrageenan), Soybean Oil, Eggs, Water, Sugar, Pineapple (Pineapple, Pineapple Juice, Ascorbic Acid For Color Retention), Buttermilk (Nonfat Milk, Dry Buttermilk, Bacterial Culture), Rolled Oats, Blackstrap Molasses, Spice, Whey, Margarine (Soybean Oil, Palm And Modified Palm Oil, Water, Canola Oil, Salt, Whey, Monoglycerides Of Fatty Acids, Soy Lecithin, Citric Acid, Natural Flavor, Annatto Extract [Color] And Turmeric [Color], Vitamin A Palmitate, Vitamin D3), Leavening (Baking Soda, Sodium Aluminum Phosphate, Monocalcium Phosphate), Dextrose, Mono- And Diglycerides, Salt, Sodium Stearoyl Lactylate, Xanthan Gum, Citric Acid.', 'Delicious, Yummy and tasty. I am wrong? Why do not you try yourself? ', 24, 'images/carrot_muffin-removebg-preview.png', 30000, 20, 30000, 1),
(31, 10, 3, 'Blueberry Muffins', 396, 4, 260, 'Enriched Wheat Flour (Wheat Flour, Niacin, Reduced Iron, Thiamine Mononitrate, Riboflavin, Folic Acid), Sugar, Soybean And/Or Canola Oil, Water, Eggs, Blueberries, Buttermilk (Skim Milk, Dry Buttermilk, Salt, Bacterial Culture), Brown Sugar, Cinnamon Chips (Sugar, Palm Oil, Cinnamon, Nonfat Dry Milk, Soy Lecithin), Margarine (Soybean Oil, Palm And Modified Palm Oil, Water, Canola Oil, Salt, Whey [Milk], Monoglycerides Of Fatty Acids, Soy Lecithin, Citric Acid, Natural Flavor, Annatto Extract [Color] And Turmeric [Color], Vitamin A Palmitate, Vitamin D3), Cinnamon, Whey, Salt, Baking Powder (Baking Soda, Sodium Acid Pyrophosphate, Corn Starch, Monocalcium Phosphate), Dextrose, Mono- And Diglycerides, Egg Whites, Artificial Flavor, Sodium Stearoyl Lactylate, Cellulose Gum, Xanthan Gum, Citric Acid, Soy Lecithin.', 'A breakfast classic, Variety Pack Muffins from Favorite Day™ are sure to start your day on the right note. This muffin variety pack comes with four muffins in two delectable flavor options — go for something spicy-sweet with a cinnamon coffee cake muffin, or opt for the fruity sweetness of a blueberry streusel muffin. Either option makes a great grab-and-go breakfast option whether you are commuting to the office or just to the living room, pairing perfectly with a hot cup of coffee or a cold glass of milk. Enjoy one as-is, or warm one up and add some butter for extra yumminess.\r\n\r\nA little bliss in every bite. Guaranteed to be a favorite or your money back.', 29, 'images/blueberry_muffin-removebg-preview.png', 25000, 30, 32500, 1),
(32, 10, 3, 'Chocola Muffin', 336, 12, 660, 'Sugar, Enriched Wheat Flour (Wheat Flour, Niacin, Reduced Iron, Thiamine Mononitrate, Riboflavin, Folic Acid), Soybean And/Or Canola Oil, Semisweet Chocolate Chips (Sugar, Chocolate Liquor, Cocoa Butter, Dextrose, Soy Lecithin, Salt, Natural Flavor), Water, Eggs, Buttermilk (Skim Milk, Dry Buttermilk, Salt, Bacterial Culture), Food Starch-Modified, Whey (Milk), Leavening (Sodium Acid Pyrophosphate, Sodium Bicarbonate, Monocalcium Phosphate), Artificial Flavor, Salt, Sodium Stearoyl Lactylate, Polyglycerol Esters Of Fatty Acids, Xanthan Gum, Enzyme, Cellulose Gum, Beta-Carotene (Color).', 'A mini treat with mega goodness? Yes, please! The Chocolate Chip Mini Muffins from Favorite Day™ are a perfect anytime treat. These mini muffins are everything you know and love from the classic breakfast delicacy, just made in a smaller size so you can enjoy a bite-size snack whether you are relaxing at home, rushing out the door or treating yourself to an afternoon sweet. Made with semi-sweet chocolate chips, these muffins are oh-so delightful with their yummy morsels baked into bready goodness. Plus, a 12-count pack leaves you with plenty of fare for snacks to come.\r\n\r\nA little bliss in every bite. Guaranteed to be a favorite or your money back.', 30, 'images/chocola_muffin-removebg-preview.png', 45000, 30, 58500, 1),
(33, 7, 1, 'Entenmann Donuts', 524, 12, 210, 'Ingredients Common To All Donuts: Plain; Enriched Flour [Wheat Flour, Malted Barley Flour, Reduced Iron, Niacin, Thiamin Mononitrate (B1), Riboflavin (B2), Folic Acid], Water, Vegetable Shortening [Palm Oil], Sugar, Soybean Oil, Nonfat Milk, Leavening (Baking Soda, Sodium Acid Pyrophosphate, Sodium Aluminum Phosphate, Sodium Aluminum Sulfate), Soy Flour, Glycerin, Corn Syrup Solids, Salt, Wheat Starch, Dextrose, Whey, Egg Yolk, Tapioca Starch, Soy Lecithin, Mono- And Diglycerides, Polysorbate 60, Xanthan Gum, Milk Protein Concentrate, Whey Protein Concentrate, Potassium Sorbate (Preservative), Cellulose Gum, Wheat Germ, Wheat Protein Isolate, Guar Gum, Locust Bean Gum, Nutmeg Oil, Natural & Artificial Flavor, Beta Carotene (Color). If Topped, Also Includes: Cinnamon: Cornstarch, Interesterified Soybean Oil, Cinnamon, Cocoa (Processed With Alkali), Palm Oil, Calcium Propionate (Preservative), Artificial Color. Powdered: Cornstarch, Interesterified Soybean Oil, Artificial Color, Calcium Propionate (Preservative).', 'Love Entenmann is donuts? Cannot decide which one is your favorite? Try our assorted Soft Family Pack for a dozen delights! It is the perfect mix of varieties for every taste. Soft, moist and oh so yummy, these donuts are perfect any time of day!\r\n\r\nSince 1898, the Entenmann is name has stood for delicious baked goods. Generations of families have made it part of their special occasions and everyday lives. It is a tradition of quality that is baked into every Entenmann’s product. Everyone is got a favorite. What is yours?', 30, 'images/Entenmann_donut-removebg-preview.png', 40000, 20, 48000, 1),
(34, 7, 1, 'Powdered Mini Donuts ', 284, 5, 230, 'Enriched Flour (Wheat Flour, Malted Barley Flour, Niacin, Ferrous Sulfate Or Reduced Iron, Thiamine Mononitrate, Riboflavin, Folic Acid), Water, Palm Oil, Dextrose, Sugar, Cornstarch, Soybean Oil, Glycerin, Contains 2% Or Less: Nonfat Dry Milk, Defatted Soy Flour, Color (Titanium Dioxide, Annatto And Turmeric), Sodium Acid Pyrophosphate, Baking Soda, Egg Yolk, Preservative (Calcium Propionate, Sorbic Acid, Sodium Propionate, Potassium Sorbate, Natamycin), Sodium Aluminum Phosphate, Salt, Natural And Artificial Flavor, Mono And Diglycerides, Dextrin, Soy Lecithin, Citric Acid, Enzymes, Guar Gum, Cellulose Gum, Karaya Gum.', 'Get a sweet start with HOSTESS Powdered Sugar DONETTES. These mini breakfast donuts are made to golden perfection and covered with a dusting of yummy powdered sugar. Get the day off to a great start with the best mini donuts around. Pop open a bag, dive right in, and LIVE YOUR MOSTESS. Pair with a hot drink of your choice or a chilled glass of juice. Whether it is your breakfast cake snack of choice or your go-to treat out and about, HOSTESS Powdered Sugar DONETTES will not let you down. ', 44, 'images/hostess_mini_donuts-removebg-preview.png', 45000, 20, 54000, 1),
(35, 7, 1, 'Crunch Donettes', 269, 5, 210, 'Sugar, Enriched Flour (Wheat Flour, Malted Barley Flour, Niacin, Ferrous Sulfate Or Reduced Iron, Thiamine Mononitrate, Riboflavin, Folic Acid), Water, Palm Oil, Coconut, Toasted Coconut Flake, Contains 2% Or Less: Soybean Oil, Glycerin, Degermed Corn Flake, Nonfat Dry Milk, Defatted Soy Flour, Honey, Preservative (Sodium Propionate, Sorbic Acid, Potassium Sorbate, Natamycin), Modified Wheat Starch, Sodium Acid Pyrophosphate, Baking Soda, Egg Yolk, Sodium Aluminum Phosphate, Salt, Dextrose, Natural And Artificial Flavor, Mono And Diglycerides, Dextrin, Soy Lecithin, Citric Acid, Enzymes, Guar Gum, Cellulose Gum, Color (Annatto, Turmeric), Agar, Karaya Gum.', 'When your breakfast needs some crunch, Hostess Donettes have you covered. These mini breakfast treats are made to golden perfection and covered with a warm, coconut crunch. Simply pop open a bag, and Live Your Mostess. Ready to take it up a notch? Grab a glass of orange juice or hot cup of joe. Donettes make the perfect treat any time of day.', 33, 'images/hostess_crunch_donuts-removebg-preview.png', 50000, 20, 60000, 1),
(36, 14, 3, 'Frosted Sugar Cookies', 689, 18, 160, 'Bleached Enriched Wheat Flour (Wheat Flour, Niacin, Reduced Iron, Thiamine Mononitrate, Riboflavin, Folic Acid), Icing Sugar (Sugar, Cornstarch), Margarine (Soybean Oil, Palm Oil, Water, Salt, Whey [Milk], Soybean Lecithin, Monoglycerides, Natural Flavor, Vitamin A Palmitate, Vitamin D3), Sugar, Water, Eggs, Sprinkles (Icing Sugar [Sugar, Cornstarch], Sugar, Cornstarch, Vegetable Oil [Palm And Palm Kernel Oil], Modified Cornstarch, Dextrin, Soybean Lecithin, Shellac, Sunflower Lecithin, Natural And Artificial Flavor, Carnauba Wax, Polysorbate 60, Blue 1, Red 40, Red 40 Lake, Yellow 6 Lake, Blue 1 Lake), Artificial Flavor, Leavening Blend (Sodium Acid Pyrophosphate, Sodium Bicarbonate, Cornstarch, Monocalcium Phosphate, Calcium Sulfate), Modified Cornstarch, Nonfat Dry Milk, Blue 2 Lake, Blue 1, Red 3, Polysorbate 60, Salt.', 'Are you hungry? Want some snack right now or for you night? Pick this! We sure you not wrong. It is tasty, crunchy and delicious. Try for yourself.', 5, 'images/Frosted_Sugar_Cookies-removebg-preview.png', 30000, 30, 39000, 2),
(37, 1, 5, 'Cinnamon Croissants', 127, 6, 230, 'Croissant (Enriched Wheat Flour [Wheat Flour, Niacin, Reduced Iron, Thiamine Mononitrate, Riboflavin, Folic Acid], Water, Margarine [Palm Oil, Canola Oil, Water, Sugar, Mono- And Diglycerides, Soy Lecithin, Citric Acid, Artificial Flavor, Vitamin A Palmitate, Vitamin D3, Beta-Carotene {Color}], Brown Sugar, Cinnamon, Yeast, Sugar, Modified Cornstarch, Invert Sugar, Canola Oil, Egg White, Salt, Egg, Malted Barley, Natural Flavor, Calcium Propionate [Preservative], Mono- And Diglycerides, Leavening Blend [Sodium Acid Pyrophosphate, Sodium Bicarbonate, Cornstarch, Monocalcium Phosphate, Calcium Sulfate], Sorbic Acid (Preservative), Ascorbic Acid, Enzyme), Yogurt Flavored Drizzle (Sugar, Palm Kernel Oil, Palm Oil, Milk, Cultured Skim Milk, Soy Lecithin, Salt), Glaze (Corn Syrup, Water, Sugar, Honey, Sodium Alginate, Citric Acid, Mono- And Diglycerides, Potassium Sorbate (Preservative), Sodium Benzoate (Preservative), Artificial Flavor, Agar, Pectin), Topping (Sugar, Carnauba Wax).', 'They may be mini, but Cinnamon Petite Croissants from Favorite Day™ let you enjoy the rich, spicy aroma of cinnamon to the fullest. These croissants are made with real Saigon cinnamon for scrumptious, spicy flavor you will love indulging in first thing in the morning or anytime a sweet treat is in order! Best served warm, try toasting these cinnamon croissants in the oven and either eat as is, add a touch of butter for a classic delicacy, or slather on your favorite chocolate spread for extra sweetness. A six-count pack is perfect for adding to a breakfast or brunch spread, or simply enjoying over multiple sessions throughout the week.', 1, 'images/croissants_cinnamon-removebg-preview.png', 40000, 15, 46000, 2),
(38, 1, 5, 'Vanilla  Croissants', 300, 6, 210, 'Enriched Wheat Flour (Wheat Flour, Niacin, Reduced Iron, Thiamine Mononitrate, Riboflavin, Folic Acid), Water, Butter (Cream), Sugar, Yeast, Eggs, Nonfat Dry Milk, Salt, Natural Flavor, Wheat Gluten, Whey Protein Concentrate, Datem, Inactivated Yeast, Mono- And Diglycerides, Xanthan Gum, L-Cysteine Hydrochloride, Enzyme, Canola Oil, Ascorbic Acid, Sodium Caseinate.', 'Have a bite of Parisian paradise with Butter Croissants from Favorite Day™. These croissants are everything you know and love from a classic breakfast delicacy packed with butter. Best served warm, try toasting these buttery croissants in the oven and either eat as is or slather on some jam or chocolate spread for extra sweetness. A four-count pack is perfect for adding to a breakfast or brunch spread, or simply enjoying over multiple sessions throughout the week.\r\n\r\nA little bliss in every bite. Guaranteed to be a favorite or your money back.\r\n', 32, 'images/vanilla_croissant-removebg-preview.png', 38000, 10, 44000, 1),
(39, 1, 5, 'Chocolate Croissant', 198, 8, 240, 'Croissant (Enriched Wheat Flour [Wheat Flour, Niacin, Reduced Iron, Thiamine Mononitrate, Riboflavin, Folic Acid], Water, Margarine [Palm Oil, Canola Oil, Water, Sugar, Mono- And Diglycerides, Soy Lecithin, Citric Acid, Artificial Flavor, Vitamin A Palmitate, Vitamin D3, Beta-Carotene {Color}], Brown Sugar, Cinnamon, Yeast, Sugar, Modified Cornstarch, Invert Sugar, Canola Oil, Egg White, Salt, Egg, Malted Barley, Natural Flavor, Calcium Propionate [Preservative], Mono- And Diglycerides, Leavening Blend [Sodium Acid Pyrophosphate, Sodium Bicarbonate, Cornstarch, Monocalcium Phosphate, Calcium Sulfate], Sorbic Acid (Preservative), Ascorbic Acid, Enzyme), Yogurt Flavored Drizzle (Sugar, Palm Kernel Oil, Palm Oil, Milk, Cultured Skim Milk, Soy Lecithin, Salt), Glaze (Corn Syrup, Water, Sugar, Honey, Sodium Alginate, Citric Acid, Mono- And Diglycerides, Potassium Sorbate (Preservative), Sodium Benzoate (Preservative), Artificial Flavor, Agar, Pectin), Topping (Sugar, Carnauba Wax).', 'They may be mini, but Cinnamon Petite Croissants from Favorite Day™ let you enjoy the rich, spicy aroma of cinnamon to the fullest. These croissants are made with real Saigon cinnamon for scrumptious, spicy flavor you will love indulging in first thing in the morning or anytime a sweet treat is in order! Best served warm, try toasting these cinnamon croissants in the oven and either eat as is, add a touch of butter for a classic delicacy, or slather on your favorite chocolate spread for extra sweetness. A six-count pack is perfect for adding to a breakfast or brunch spread, or simply enjoying over multiple sessions throughout the week.\r\n\r\nA little bliss in every bite. Guaranteed to be a favorite or your money back.', 31, 'images/chocolate_croissant-removebg-preview.png', 23000, 20, 24000, 1),
(40, 11, 5, 'Patriotic Cupcakes', 284, 12, 300, 'Cake (Sugar, Bleached Enriched Wheat Flour [Wheat Flour, Niacin, Reduced Iron, Thiamine Mononitrate, Riboflavin, Folic Acid], Water, Egg, Soybean Oil And/Or Canola Oil, Modified Corn Starch, Whey, Leavening Blend [Sodium Acid Pyrophosphate, Sodium Bicarbonate, Corn Starch, Monocalcium Phosphate, Calcium Sulfate], Mono- And Diglycerides, Salt, Emulsifier [Propylene Glycol Mono- And Diesters Of Fats And Fatty Acids, Mono- And Diglycerides, Soy Lecithin, Citric Acid {Preservative}], Soy Lecithin, Natural Flavor), Icing (Icing Sugar [Sugar, Corn Starch], Vegetable Oil Shortening [Canola Oil, Palm Oil, Palm Kernel Oil, Monoglycerides, Polysorbate 60], Corn Syrup, Margarine [Soybean Oil, Palm Oil, Water, Salt, Whey, Soy Lecithin, Monoglycerides, Natural Flavor, Vitamin A Palmitate, Vitamin D3], Water, Nonfat Dry Milk, Blue 2 Lake, Blue 1, Red 3, Butter [Cream, Salt], Modified Corn Starch, Mono- And Diglycerides, Natural Flavor, Salt), Sprinkles (Icing Sugar [Sugar, Corn Starch], Palm Kernel Oil, Modified Corn Starch, Corn Starch, Shellac, Sunflower Lecithin, Blue 1, Red 40, Polysorbate 60).', 'Favorite Day Vanilla Mini Cupcakes.\r\n\r\nA little bliss in every bite. Guaranteed to be a favorite or your money back.', 38, 'images/Patriotic_Cupcakes-removebg-preview.png', 37000, 10, 38500, 1),
(41, 11, 2, 'Cotton Cupcakes', 284, 12, 220, 'Cake (Sugar, Bleached Enriched Wheat Flour [Wheat Flour, Niacin, Reduced Iron, Thiamine Mononitrate, Riboflavin, Folic Acid], Water, Egg, Soybean Oil And/Or Canola Oil, Modified Corn Starch, Whey, Leavening Blend [Sodium Acid Pyrophosphate, Sodium Bicarbonate, Corn Starch, Monocalcium Phosphate, Calcium Sulfate], Mono- And Diglycerides, Salt, Emulsifier [Propylene Glycol Mono- And Diesters Of Fats And Fatty Acids, Mono- And Diglycerides, Soy Lecithin, Citric Acid {Preservative}], Soy Lecithin, Natural Flavor), Icing (Icing Sugar [Sugar, Corn Starch], Vegetable Oil Shortening [Canola Oil, Palm Oil, Palm Kernel Oil, Monoglycerides, Polysorbate 60], Water, Corn Syrup, Nonfat Dry Milk, Butter [Cream, Salt], Artificial And Natural Flavor, Mono- And Diglycerides, Salt, Blue 1 Lake, Red 40 Lake, Beet Powder [Color], Red 3).', 'Được xuất xứ từ Mỹ. Bánh đem đến hương vị thơm ngon, dẻo và mêm mại, màu sắc lấp lánh sặc sỡ.', 5, 'images/Cotton_Cupcakes-removebg-preview.png', 30000, 30, 39000, 2),
(42, 14, 2, 'Patriotic Cookies', 318, 18, 310, 'Enriched Bleached Flour (Wheat Flour, Niacin, Reduced Iron, Thiamin Mononitrate, Riboflavin, Folic Acid), Sugar, Palm Oil, White Chocolate Flavored Coating (Sugar, Vegetable Fat [Palm And/Or Palm Kernel], Nonfat Dry Milk, Dry Whole Milk, Soy Lecithin [Emulsifier], Titanium Dioxide [Color], Vanillin [Artificial Flavor]), Contains 2% Or Less Of: Salt, Leavening (Baking Soda, Ammonium Bicarbonate), Water, Soy Lecithin (Emulsifier), Natural And Artificial Flavors, Whey, Blue 1, Carnauba Wax, Confectioner Glaze, Red 3, Eggs, Corn Syrup Solids, Annatto (Color).', 'Favorite Day Patriotic Star Sugar Cookies.\r\n\r\nA little bliss in every bite. Guaranteed to be a favorite or your money back', 9, 'images/Patriotic_Cookies-removebg-preview.png', 45000, 20, 48000, 1),
(43, 14, 2, 'Buttercreme Cookies', 250, 8, 160, 'Sữa, trứng, kem, đường, muối', 'Hãy thỏa mãn sở thích ăn ngọt của bạn với hương vị hảo hạng của Bánh quy bơ vị đường Marketside Vanilla Buttercreme. Những chiếc bánh quy thơm ngon, ẩm ướt này được nướng đến hoàn hảo và được phủ một lớp kem bơ vani đã nguội. Chúng thật tuyệt vời nếu chỉ riêng chúng hoặc có thể kết hợp với kem và cà phê yêu thích của bạn để có một bữa ăn nhẹ thực sự thư thái. Được làm từ bơ kem và các nguyên liệu chất lượng cao khác, những chiếc bánh quy này là món ăn ngon vào bất kỳ thời điểm nào trong ngày. Với tám cookie trên mỗi hộp đựng, chúng hoàn hảo để chia sẻ với người thân yêu hoặc lưu và thưởng thức cho bản thân. Marketside Vanilla Buttercreme Sugar Cookies là một món ăn ngon mà mọi người sẽ thích.\r\n\r\nÝ tưởng mới mẻ và nguyên liệu chất lượng, đó là cách Marketside mang đến những món ăn ngon nhất trên bàn ăn của bạn. Chúng tôi cam kết mang đến sự tươi ngon mà bạn có thể nếm thử và nhìn thấy. Marketside cung cấp thực phẩm tươi sống tốt nhất, được đảm bảo bởi Walmart, hợp tác với nông dân, thợ làm bánh và đầu bếp để có chất lượng cao nhất, nguyên liệu chính thống và công thức nấu ăn yêu thích.', 4, 'images/vanilla_buttercreme-removebg-preview.png', 60000, 10, 66000, 2),
(44, 7, 2, 'Red velvet', 250, 6, 300, 'Tinh bột (50%), đường (10%), dâu tây (10%), siro, sữa, trứng,...', 'Bánh được sản xuất từ hãng bánh nổi tiếng của Anh. Bánh luôn đảm bảo giữ được độ mịn màng, mềm mại, màu sắc bắt mắt', 27, 'images/red_velvet_mini-removebg-preview.png', 30000, 10, 33000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `productimage`
--

CREATE TABLE `productimage` (
  `ID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productimage`
--

INSERT INTO `productimage` (`ID`, `ProductID`, `Image`) VALUES
(5, 23, 'orange_cranberry_1.jpg'),
(6, 23, 'orange_cranberry_2.jpg'),
(21, 41, 'Cotton_Cupcakes.jpg'),
(22, 41, 'Cotton_Cupcakes_1.jpg'),
(23, 41, 'Cotton_Cupcakes_2.jpg'),
(24, 42, 'Patriotic_Cookies.jpg'),
(25, 42, 'Patriotic_Cookies_1.jpg'),
(26, 42, 'Patriotic_Cookies_2.jpg'),
(27, 40, 'Patriotic_Cupcakes.jpg'),
(28, 40, 'Patriotic_Cupcakes_1.jpg'),
(29, 40, 'Patriotic_Cupcakes_2.jpg'),
(30, 39, 'chocolate_croissant.jpg'),
(31, 39, 'chocolate_croissant_1.jpg'),
(32, 39, 'chocolate_croissant_2.jpg'),
(33, 38, 'vanilla_croissant.jpg'),
(34, 38, 'vanilla_croissant_1.jpg'),
(35, 38, 'vanilla_croissant_2.jpg'),
(36, 37, 'petite_croissants_cinnamon.jpg'),
(37, 37, 'petite_croissants_cinnamon_1.jpg'),
(38, 37, 'petite_croissants_cinnamon_2.jpg'),
(39, 36, 'Frosted_Sugar_Cookies.jpg'),
(40, 36, 'Frosted_Sugar_Cookies_1.jpg'),
(41, 36, 'Frosted_Sugar_Cookies_2.jpg'),
(42, 35, 'hostess_crunch_donuts.jpg'),
(43, 35, 'hostess_crunch_donuts_1.jpg'),
(44, 35, 'hostess_crunch_donuts_2.jpg'),
(45, 34, 'hostess_mini_donuts.jpg'),
(46, 34, 'hostess_mini_donuts_1.jpg'),
(47, 34, 'hostess_mini_donuts_2.jpg'),
(48, 33, 'Entenmann_donut.jpg'),
(49, 33, 'Entenmann_donut_1.jpg'),
(50, 33, 'Entenmann_donut_2.jpg'),
(51, 32, 'chocola_muffin.jpg'),
(52, 32, 'chocola_muffin_1.jpg'),
(53, 32, 'chocola_muffin_2.jpg'),
(54, 31, 'blueberry_muffin.jpg'),
(55, 31, 'blueberry_muffin_1.jpg'),
(56, 31, 'blueberry_muffin_2.jpg'),
(57, 30, 'carrot_muffin.jpg'),
(58, 30, 'carrot_muffin_1.jpg'),
(59, 30, 'carrot_muffin_2.jpg'),
(60, 27, 'cherry_danish.jpg'),
(61, 27, 'cherry_danish_1.jpg'),
(62, 27, 'cherry_danish_2.jpg'),
(63, 25, 'petite_croissants.jpg'),
(64, 25, 'petite_croissants_1.jpg'),
(65, 25, 'petite_croissants_2.jpg'),
(66, 24, 'cream_cheese.jpg'),
(67, 24, 'cream_cheese_1.jpg'),
(68, 24, 'cream_cheese_2.jpg'),
(70, 43, 'vanilla_buttercreme.jpg'),
(72, 43, 'vanilla_buttercreme_1.jpg'),
(73, 44, 'red_velvet_mini_1.jpg'),
(74, 44, 'red_velvet_mini_2.jpg'),
(75, 44, 'red_velvet_mini.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `receivenote`
--

CREATE TABLE `receivenote` (
  `ReceiveID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `TotalAmount` int(11) NOT NULL,
  `TotalCost` float NOT NULL DEFAULT 0,
  `EmployeeID` int(11) NOT NULL,
  `ProducerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receivenote`
--

INSERT INTO `receivenote` (`ReceiveID`, `Date`, `TotalAmount`, `TotalCost`, `EmployeeID`, `ProducerID`) VALUES
(37, '2022-05-18', 15, 700000, 3, 2),
(38, '2022-05-18', 20, 575000, 3, 2),
(39, '2022-05-18', 30, 1600000, 3, 1),
(40, '2022-05-18', 35, 825000, 3, 3),
(41, '2022-05-18', 60, 2200000, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `receivenotedetail`
--

CREATE TABLE `receivenotedetail` (
  `ReceiveID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Cost` float NOT NULL DEFAULT 0,
  `ExpirationDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receivenotedetail`
--

INSERT INTO `receivenotedetail` (`ReceiveID`, `ProductID`, `Amount`, `Cost`, `ExpirationDate`) VALUES
(37, 41, 5, 30000, '2022-07-21'),
(37, 42, 5, 50000, '2022-06-15'),
(37, 43, 5, 60000, '2022-05-31'),
(38, 23, 5, 25000, '2022-06-04'),
(38, 24, 10, 20000, '2022-06-10'),
(38, 25, 5, 50000, '2022-06-09'),
(39, 33, 10, 55000, '2022-06-10'),
(39, 34, 15, 50000, '2022-06-07'),
(39, 35, 5, 60000, '2022-07-28'),
(40, 31, 10, 30000, '2022-08-03'),
(40, 32, 15, 15000, '2022-07-15'),
(40, 36, 10, 30000, '2022-07-15'),
(41, 27, 10, 30000, '2022-09-01'),
(41, 30, 5, 50000, '2022-11-18'),
(41, 37, 10, 40000, '2022-07-21'),
(41, 38, 10, 35000, '2022-07-29'),
(41, 39, 10, 30000, '2022-06-11'),
(41, 40, 15, 40000, '2022-08-06');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `ID` int(11) NOT NULL,
  `CustomerID` int(10) NOT NULL,
  `ProductID` int(10) NOT NULL,
  `Rating` int(11) NOT NULL,
  `Comment` text NOT NULL,
  `Time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`ID`, `CustomerID`, `ProductID`, `Rating`, `Comment`, `Time`) VALUES
(11, 1, 38, 3, 'Very good', '2022-05-12 09:38:20'),
(12, 1, 41, 4, 'Rất ngon và giá cũng hợp lý =))', '2022-05-18 15:01:00'),
(13, 1, 39, 4, 'Rất thơm và béo!!! những đứa trẻ rất thích', '2022-05-18 15:03:11'),
(14, 1, 36, 4, 'Giòn và ngon', '2022-05-18 15:04:47'),
(15, 3, 41, 5, 'Rất mềm và ngọt lại đẹp nữa ', '2022-05-18 15:05:40'),
(16, 8, 41, 3, 'Bánh không được giòn lắm, khá lá bủn', '2022-05-22 15:17:33');

-- --------------------------------------------------------

--
-- Table structure for table `status_order`
--

CREATE TABLE `status_order` (
  `ID` varchar(11) CHARACTER SET utf8 NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_order`
--

INSERT INTO `status_order` (`ID`, `Name`) VALUES
('STA9', 'Bị hủy'),
('STA7', 'Bị trả hàng'),
('STB10', 'Hết hàng'),
('STA1', 'Mới'),
('STA6', 'Thành công'),
('STB11', 'Thất bại'),
('STA4', 'Đã chuẩn bị'),
('STA8', 'Đã trả hàng'),
('STA2', 'Đã xác nhận'),
('STA3', 'Đang chuẩn bị'),
('STA5', 'Đang giao hàng');

-- --------------------------------------------------------

--
-- Table structure for table `status_product`
--

CREATE TABLE `status_product` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_product`
--

INSERT INTO `status_product` (`ID`, `Name`) VALUES
(1, 'Sẵn sàng'),
(2, 'Sắp hết hàng'),
(3, 'Hết hàng'),
(4, 'Ngừng kinh doanh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banking`
--
ALTER TABLE `banking`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `catalogue`
--
ALTER TABLE `catalogue`
  ADD PRIMARY KEY (`CataID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryID`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `checkinventory`
--
ALTER TABLE `checkinventory`
  ADD PRIMARY KEY (`CheckID`),
  ADD KEY `EmployeeID` (`EmployeeID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `deliverynote`
--
ALTER TABLE `deliverynote`
  ADD PRIMARY KEY (`DeliveryID`),
  ADD KEY `OrderID` (`OrderID`),
  ADD KEY `EmployeeID` (`EmployeeID`);

--
-- Indexes for table `deliverynotedetail`
--
ALTER TABLE `deliverynotedetail`
  ADD PRIMARY KEY (`DeliveryID`,`ProductID`) USING BTREE,
  ADD KEY `DeliveryID` (`DeliveryID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `detailcheckinventory`
--
ALTER TABLE `detailcheckinventory`
  ADD PRIMARY KEY (`CheckID`,`ProductID`) USING BTREE,
  ADD KEY `CheckID` (`CheckID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`DiscountID`);

--
-- Indexes for table `discountdetail`
--
ALTER TABLE `discountdetail`
  ADD PRIMARY KEY (`DiscountID`,`ProductID`) USING BTREE,
  ADD KEY `DiscountID` (`DiscountID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EmpID`),
  ADD KEY `PrivID` (`PrivID`);

--
-- Indexes for table `hangvanchuyen`
--
ALTER TABLE `hangvanchuyen`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`InvoiceID`),
  ADD KEY `EmployeeID` (`EmployeeID`),
  ADD KEY `DeliveryID` (`DeliveryID`);

--
-- Indexes for table `invoicedetail`
--
ALTER TABLE `invoicedetail`
  ADD PRIMARY KEY (`InvoiceID`,`ProductID`) USING BTREE,
  ADD KEY `InvoiceID` (`InvoiceID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD KEY `OrderID` (`OrderID`,`ProductID`) USING BTREE,
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `CustomerID` (`CustomerID`),
  ADD KEY `HangVanChuyen` (`HangVanChuyen`),
  ADD KEY `Status` (`Status`);

--
-- Indexes for table `privilege`
--
ALTER TABLE `privilege`
  ADD PRIMARY KEY (`PrivID`);

--
-- Indexes for table `priv_cata`
--
ALTER TABLE `priv_cata`
  ADD PRIMARY KEY (`PrivID`,`CataID`) USING BTREE,
  ADD KEY `PrivID` (`PrivID`),
  ADD KEY `CataID` (`CataID`);

--
-- Indexes for table `producer`
--
ALTER TABLE `producer`
  ADD PRIMARY KEY (`ProducerID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`),
  ADD UNIQUE KEY `ProductName` (`ProductName`),
  ADD KEY `CatagoryID` (`CategoryID`),
  ADD KEY `ProducerID` (`ProducerID`),
  ADD KEY `Status` (`Status`);

--
-- Indexes for table `productimage`
--
ALTER TABLE `productimage`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `receivenote`
--
ALTER TABLE `receivenote`
  ADD PRIMARY KEY (`ReceiveID`),
  ADD KEY `EmployeeID` (`EmployeeID`),
  ADD KEY `ProducerID` (`ProducerID`);

--
-- Indexes for table `receivenotedetail`
--
ALTER TABLE `receivenotedetail`
  ADD PRIMARY KEY (`ReceiveID`,`ProductID`) USING BTREE,
  ADD KEY `ReceiveID` (`ReceiveID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CustomerID` (`CustomerID`,`ProductID`) USING BTREE,
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `status_order`
--
ALTER TABLE `status_order`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Name` (`Name`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `status_product`
--
ALTER TABLE `status_product`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banking`
--
ALTER TABLE `banking`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `catalogue`
--
ALTER TABLE `catalogue`
  MODIFY `CataID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CategoryID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `checkinventory`
--
ALTER TABLE `checkinventory`
  MODIFY `CheckID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `CustomerID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `deliverynote`
--
ALTER TABLE `deliverynote`
  MODIFY `DeliveryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `DiscountID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `EmpID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `InvoiceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `privilege`
--
ALTER TABLE `privilege`
  MODIFY `PrivID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `producer`
--
ALTER TABLE `producer`
  MODIFY `ProducerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `productimage`
--
ALTER TABLE `productimage`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `receivenote`
--
ALTER TABLE `receivenote`
  MODIFY `ReceiveID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `status_product`
--
ALTER TABLE `status_product`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `checkinventory`
--
ALTER TABLE `checkinventory`
  ADD CONSTRAINT `checkinventory_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `employee` (`EmpID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `deliverynote`
--
ALTER TABLE `deliverynote`
  ADD CONSTRAINT `deliverynote_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `deliverynote_ibfk_2` FOREIGN KEY (`EmployeeID`) REFERENCES `employee` (`EmpID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `deliverynotedetail`
--
ALTER TABLE `deliverynotedetail`
  ADD CONSTRAINT `deliverynotedetail_ibfk_1` FOREIGN KEY (`DeliveryID`) REFERENCES `deliverynote` (`DeliveryID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `deliverynotedetail_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detailcheckinventory`
--
ALTER TABLE `detailcheckinventory`
  ADD CONSTRAINT `detailcheckinventory_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detailcheckinventory_ibfk_2` FOREIGN KEY (`CheckID`) REFERENCES `checkinventory` (`CheckID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `discountdetail`
--
ALTER TABLE `discountdetail`
  ADD CONSTRAINT `discountdetail_ibfk_1` FOREIGN KEY (`DiscountID`) REFERENCES `discount` (`DiscountID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `discountdetail_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`PrivID`) REFERENCES `privilege` (`PrivID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`DeliveryID`) REFERENCES `deliverynote` (`DeliveryID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_ibfk_2` FOREIGN KEY (`EmployeeID`) REFERENCES `employee` (`EmpID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoicedetail`
--
ALTER TABLE `invoicedetail`
  ADD CONSTRAINT `invoicedetail_ibfk_1` FOREIGN KEY (`InvoiceID`) REFERENCES `invoice` (`InvoiceID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoicedetail_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customers` (`CustomerID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_4` FOREIGN KEY (`HangVanChuyen`) REFERENCES `hangvanchuyen` (`ID`),
  ADD CONSTRAINT `orders_ibfk_5` FOREIGN KEY (`Status`) REFERENCES `status_order` (`ID`);

--
-- Constraints for table `priv_cata`
--
ALTER TABLE `priv_cata`
  ADD CONSTRAINT `priv_cata_ibfk_1` FOREIGN KEY (`PrivID`) REFERENCES `privilege` (`PrivID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `priv_cata_ibfk_2` FOREIGN KEY (`CataID`) REFERENCES `catalogue` (`CataID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_5` FOREIGN KEY (`ProducerID`) REFERENCES `producer` (`ProducerID`),
  ADD CONSTRAINT `product_ibfk_6` FOREIGN KEY (`Status`) REFERENCES `status_product` (`ID`),
  ADD CONSTRAINT `product_ibfk_7` FOREIGN KEY (`CategoryID`) REFERENCES `category` (`CategoryID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `productimage`
--
ALTER TABLE `productimage`
  ADD CONSTRAINT `productimage_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `receivenote`
--
ALTER TABLE `receivenote`
  ADD CONSTRAINT `receivenote_ibfk_1` FOREIGN KEY (`ProducerID`) REFERENCES `producer` (`ProducerID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `receivenote_ibfk_2` FOREIGN KEY (`EmployeeID`) REFERENCES `employee` (`EmpID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `receivenotedetail`
--
ALTER TABLE `receivenotedetail`
  ADD CONSTRAINT `receivenotedetail_ibfk_1` FOREIGN KEY (`ReceiveID`) REFERENCES `receivenote` (`ReceiveID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `receivenotedetail_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customers` (`CustomerID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
