-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2023 at 09:32 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tatcshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `buy`
--

CREATE TABLE `buy` (
  `Buy_id` varchar(5) NOT NULL,
  `Emp_id` varchar(5) NOT NULL,
  `Buy_date` datetime NOT NULL,
  `Receive_date` datetime DEFAULT NULL,
  `Paid_date` datetime DEFAULT NULL,
  `Net_price` decimal(8,2) NOT NULL,
  `Paid_by` varchar(50) DEFAULT NULL,
  `Receive_by` varchar(50) DEFAULT NULL,
  `Buy_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `buy`
--

INSERT INTO `buy` (`Buy_id`, `Emp_id`, `Buy_date`, `Receive_date`, `Paid_date`, `Net_price`, `Paid_by`, `Receive_by`, `Buy_status`) VALUES
('B0001', 'EMP01', '2017-11-28 00:00:00', '2017-11-29 00:00:00', '2017-11-29 00:00:00', 19850.00, 'โจ', 'โจ', 3),
('B0002', 'EMP03', '2017-11-30 00:00:00', '2017-12-07 00:00:00', '2017-12-07 00:00:00', 3100.00, 'ก้อย', 'ก้อย', 3),
('B0003', 'EMP01', '2017-12-01 00:00:00', '2017-12-09 00:00:00', '2017-12-09 00:00:00', 17400.00, 'โอ๋', 'อ้อย', 3),
('B0004', 'EMP05', '2017-12-23 00:00:00', '2017-12-25 00:00:00', '2017-12-25 00:00:00', 29050.00, 'โม', 'โม', 3),
('B0005', 'EMP11', '2017-12-30 00:00:00', '2017-12-31 00:00:00', '2017-12-31 00:00:00', 17700.00, 'บีม', 'บีม', 3),
('B0006', 'EMP01', '2023-08-21 00:00:00', '2023-08-21 00:00:00', '2023-08-21 00:00:00', 8900.00, 'นาย องค์อาจ ชาตินักรบ', 'นาย องค์อาจ ชาตินักรบ', 1),
('B0007', 'EMP01', '2023-08-21 00:00:00', '2023-08-21 00:00:00', '2023-08-21 00:00:00', 5800.00, 'นาย องค์อาจ ชาตินักรบ', 'นาย องค์อาจ ชาตินักรบ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `buy_detail`
--

CREATE TABLE `buy_detail` (
  `Pro_id` varchar(5) NOT NULL,
  `Buy_id` varchar(5) NOT NULL,
  `Amount` varchar(5) NOT NULL,
  `Price` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `buy_detail`
--

INSERT INTO `buy_detail` (`Pro_id`, `Buy_id`, `Amount`, `Price`) VALUES
('PRO01', 'B0001', '3', 8100.00),
('PRO01', 'B0005', '1', 2700.00),
('PRO01', 'B0006', '1', 2700.00),
('PRO01', 'B0007', '1', 2700.00),
('PRO02', 'B0002', '1', 3100.00),
('PRO02', 'B0005', '1', 3100.00),
('PRO02', 'B0006', '2', 6200.00),
('PRO02', 'B0007', '1', 3100.00),
('PRO03', 'B0004', '2', 7000.00),
('PRO03', 'B0005', '2', 7000.00),
('PRO04', 'B0003', '2', 3400.00),
('PRO06', 'B0001', '10', 7000.00),
('PRO06', 'B0005', '10', 7000.00),
('PRO08', 'B0003', '10', 6500.00),
('PRO09', 'B0003', '10', 2500.00),
('PRO11', 'B0003', '1', 250.00),
('PRO11', 'B0005', '10', 2500.00),
('PRO12', 'B0004', '3', 1800.00),
('PRO12', 'B0005', '2', 1200.00),
('PRO14', 'B0004', '2', 4000.00),
('PRO15', 'B0001', '1', 4750.00),
('PRO15', 'B0003', '1', 4750.00),
('PRO15', 'B0004', '1', 4750.00),
('PRO17', 'B0004', '1', 8000.00),
('PRO18', 'B0004', '1', 3500.00),
('PRO20', 'B0004', '1', 2000.00);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Cust_id` varchar(5) NOT NULL,
  `Cust_name` varchar(50) NOT NULL,
  `Cust_lastName` varchar(50) DEFAULT NULL,
  `Cust_address` varchar(100) DEFAULT NULL,
  `Province_id` int(11) DEFAULT NULL,
  `Cust_tel` varchar(20) NOT NULL,
  `Admit_date` datetime NOT NULL,
  `Cust_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Cust_id`, `Cust_name`, `Cust_lastName`, `Cust_address`, `Province_id`, `Cust_tel`, `Admit_date`, `Cust_status`) VALUES
('C0001', 'นาย อภิวิชญ์ว', 'ธิปภาดา', '223/39', 9, '0970981519', '0000-00-00 00:00:00', 1),
('C0002', 'นาย ชัยยศ', 'พรหมจารีย์', '49/13', 11, '0846517465', '2017-11-09 00:00:00', 1),
('C0003', 'นาย วรต', 'กระโทก', '52/223', 65, '0684941621', '2017-11-09 00:00:00', 1),
('C0004', 'นาย นักรบ', 'ชนะราวี', '447/74', 12, '0914465541', '2017-11-09 00:00:00', 1),
('C0005', 'นาย สงคราม', 'ชนะราวี', '24/3', 3, '0855162465', '2017-11-09 00:00:00', 1),
('C0006', 'นาย นิธินัย', 'เหินเวหา', '24/20', 5, '0511657625', '2017-11-10 00:00:00', 1),
('C0007', 'นาย ติ๊บ', 'บุญนำ', '525/35', 1, '0884516545', '2017-11-10 00:00:00', 1),
('C0008', 'นาย บรรพต', 'ร่วมใจ ', '26/47', 1, '0629845215', '2017-11-10 00:00:00', 1),
('C0009', 'นาย ชาติชาญ', 'ขำสนิท', '98/16', 9, '0877546546', '2017-11-10 00:00:00', 1),
('C0010', 'นาย บุญศรัทธา', 'มหามงคล ', '44/2', 9, '0989846546', '2017-11-11 00:00:00', 1),
('C0011', 'นาย หินชนวน', 'อโศก', '99/99', 9, '0568795465', '2017-11-11 00:00:00', 1),
('C0012', 'นาย บุญพอ', 'มีเท', '22/22', 2, '0351498462', '2017-11-11 00:00:00', 1),
('C0013', 'นาย จันมี', 'มีมูล', '29/34', 11, '0847162164', '2017-11-11 00:00:00', 1),
('C0014', 'นาย นนนที', 'กะโทก', '71/28', 11, '0847951651', '2017-11-12 00:00:00', 1),
('C0015', 'นาย การหาญ', 'โดนอม', '63/36', 9, '0949516546', '2017-11-12 00:00:00', 1),
('C0016', 'นาย สมศักดิ์', 'พัดลม', '89/89', 9, '0251494868', '2017-11-12 00:00:00', 1),
('C0017', 'นาย หวังนที', 'ขอพันธุ์ ', '15/98', 2, '0354968465', '2017-11-13 00:00:00', 1),
('C0018', 'นาย กันภัยพาล', 'ใจแข่งกล้า ', '16/23', 9, '0879546521', '2017-11-13 00:00:00', 1),
('C0019', 'นาย อิทธิ ', 'แจงใส', '44/12', 9, '0548465184', '2017-11-13 00:00:00', 1),
('C0020', 'นาย อธิป ', 'สูญสิ้นภัย ', '12/5', 9, '0231565489', '2017-11-13 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Emp_id` varchar(5) NOT NULL,
  `User_name` varchar(10) NOT NULL,
  `Pass_word` varchar(10) NOT NULL,
  `Emp_name` varchar(50) NOT NULL,
  `Emp_status` int(11) NOT NULL,
  `Emp_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Emp_id`, `User_name`, `Pass_word`, `Emp_name`, `Emp_status`, `Emp_type`) VALUES
('EMP01', 'admin', '1122', 'นาย องค์อาจ ชาตินักรบ', 1, 2),
('EMP02', 'owner01', '4466', 'นางสาว สายใจ เกาะมหาสนุก ', 1, 2),
('EMP03', 'joe_44', '1254', 'นาย สมศักดิ์ หวังดีเสมอ ', 1, 2),
('EMP04', 'srit', '2529', 'นาย หวังนที ชาติยืนยง ', 1, 1),
('EMP05', 'makin', '8747', 'นาย ณรงค์ นัดใช้ปืน ', 1, 1),
('EMP06', 'coco28', '1216', 'นาง กันภัย สูญสิ้นภัย ', 1, 1),
('EMP07', 'cokeza1', '1516', 'นางสาว อูโน่ หลาวทอง ', 1, 1),
('EMP08', 'desert_ez', '4856', 'นาย อธิป จันทร์กระจ่าง ', 2, 1),
('EMP09', 'weed', '191', 'นาย อาทิตย์ ชอบมามาตร', 2, 1),
('EMP10', 'god2517', '5474', 'นาย ศักดิพันธ์ ชอบมามาตร ', 2, 1),
('EMP11', 'ggwp09', '1150', 'นางสาว บรรจง หนึ่งในยุทธจักร ', 1, 1),
('EMP12', 'qwertp', '1684', 'นางสาว กนกกร เวหา ', 1, 1),
('EMP13', 'Worapot2', '9874', 'นายสาว นารัตน์ พัดลม  ', 1, 1),
('EMP14', 'fujisu', '4475', 'นาง ลำเทียน คล้องพันธุ์ ', 2, 1),
('EMP15', 'mewtara', '8975', 'นาย มนศักดิ์ คล้องพันธ์ ', 1, 1),
('EMP16', 'maigg', '0875', 'นาย ดิน แจงใส ', 1, 1),
('EMP17', 'fifa17', '0987', 'นาง สร้อยฟ้า ฟางน้อย ', 2, 1),
('EMP18', 'giggs44', '0369', 'นางสาง ไพรัตน์ สุขแจ่มใส ', 1, 1),
('EMP19', 'mawto', '1150', 'นาย ภาคภูมิ สุดใจ ', 1, 1),
('EMP20', 'dew02', '0202', 'นาย หรูหรา อมตะ ', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `or_der`
--

CREATE TABLE `or_der` (
  `Order_id` varchar(5) NOT NULL,
  `Cust_id` varchar(5) NOT NULL,
  `Order_date` datetime NOT NULL,
  `Net_price` decimal(8,2) NOT NULL,
  `FirstPaid` decimal(8,2) DEFAULT NULL,
  `isPaidAll` int(11) DEFAULT NULL,
  `isRecieveAll` int(11) DEFAULT NULL,
  `Receive_date` datetime NOT NULL,
  `Order_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `or_der`
--

INSERT INTO `or_der` (`Order_id`, `Cust_id`, `Order_date`, `Net_price`, `FirstPaid`, `isPaidAll`, `isRecieveAll`, `Receive_date`, `Order_status`) VALUES
('OR001', 'C0001', '2017-11-07 00:00:00', 18900.00, 1800.00, 2, 2, '2017-11-08 00:00:00', 2),
('OR002', 'C0003', '2017-11-09 00:00:00', 6250.00, 620.00, 2, 2, '2017-11-10 00:00:00', 2),
('OR003', 'C0005', '2017-11-25 00:00:00', 2670.00, 260.00, 2, 2, '2017-11-28 00:00:00', 2),
('OR004', 'C0007', '2017-12-02 00:00:00', 25100.00, 2500.00, 2, 2, '2017-12-05 00:00:00', 2),
('OR005', 'C0009', '2017-12-03 00:00:00', 14400.00, 1400.00, 2, 2, '2017-12-08 00:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `or_der_detail`
--

CREATE TABLE `or_der_detail` (
  `Order_id` varchar(5) NOT NULL,
  `Pro_id` varchar(5) NOT NULL,
  `Amount` varchar(5) NOT NULL,
  `Sale_price` decimal(8,2) NOT NULL,
  `Discount` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `or_der_detail`
--

INSERT INTO `or_der_detail` (`Order_id`, `Pro_id`, `Amount`, `Sale_price`, `Discount`) VALUES
('OR001', 'PRO01', '3', 7800.00, 300.00),
('OR001', 'PRO02', '1', 3000.00, 100.00),
('OR001', 'PRO03', '1', 3300.00, 200.00),
('OR001', 'PRO05', '3', 4800.00, 300.00),
('OR002', 'PRO06', '5', 3250.00, 250.00),
('OR003', 'PRO06', '1', 650.00, 50.00),
('OR002', 'PRO07', '10', 3000.00, 500.00),
('OR003', 'PRO08', '1', 520.00, 30.00),
('OR003', 'PRO09', '1', 200.00, 50.00),
('OR005', 'PRO09', '2', 400.00, 100.00),
('OR003', 'PRO10', '1', 550.00, 50.00),
('OR003', 'PRO11', '1', 200.00, 50.00),
('OR003', 'PRO12', '1', 550.00, 50.00),
('OR005', 'PRO12', '2', 1100.00, 100.00),
('OR004', 'PRO13', '2', 3800.00, 200.00),
('OR004', 'PRO15', '1', 4500.00, 250.00),
('OR004', 'PRO16', '2', 10400.00, 600.00),
('OR005', 'PRO17', '1', 8300.00, 200.00),
('OR004', 'PRO18', '2', 6400.00, 600.00),
('OR005', 'PRO20', '2', 4600.00, 400.00);

-- --------------------------------------------------------

--
-- Table structure for table `previous_cost`
--

CREATE TABLE `previous_cost` (
  `Pro_id` varchar(5) NOT NULL,
  `Pro_cost` decimal(8,2) NOT NULL,
  `Pro_salePrice` decimal(8,2) NOT NULL,
  `Pro_memberPrice` decimal(8,2) NOT NULL,
  `Record_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `previous_cost`
--

INSERT INTO `previous_cost` (`Pro_id`, `Pro_cost`, `Pro_salePrice`, `Pro_memberPrice`, `Record_date`) VALUES
('PRO01', 2500.00, 2700.00, 2600.00, '2017-10-13 00:00:00'),
('PRO02', 2800.00, 3100.00, 3000.00, '2017-10-14 00:00:00'),
('PRO03', 3000.00, 3500.00, 3300.00, '2017-10-15 00:00:00'),
('PRO04', 1400.00, 1700.00, 1500.00, '2017-10-16 00:00:00'),
('PRO05', 1500.00, 1700.00, 1600.00, '2017-10-17 00:00:00'),
('PRO06', 600.00, 700.00, 650.00, '2017-10-18 00:00:00'),
('PRO07', 200.00, 350.00, 300.00, '2017-10-19 00:00:00'),
('PRO08', 500.00, 550.00, 520.00, '2017-10-20 00:00:00'),
('PRO09', 100.00, 250.00, 200.00, '2017-10-21 00:00:00'),
('PRO10', 500.00, 600.00, 550.00, '2017-10-22 00:00:00'),
('PRO11', 100.00, 250.00, 200.00, '2017-10-23 00:00:00'),
('PRO12', 500.00, 600.00, 550.00, '2017-10-24 00:00:00'),
('PRO13', 5000.00, 5350.00, 5100.00, '2017-10-25 00:00:00'),
('PRO14', 1500.00, 2000.00, 1900.00, '2017-11-01 00:00:00'),
('PRO15', 4000.00, 4750.00, 4500.00, '2017-11-07 00:00:00'),
('PRO16', 5000.00, 5500.00, 5200.00, '2017-11-11 00:00:00'),
('PRO17', 8000.00, 8500.00, 8300.00, '2017-11-13 00:00:00'),
('PRO18', 3000.00, 3500.00, 3200.00, '2017-11-15 00:00:00'),
('PRO19', 2700.00, 3200.00, 3000.00, '2017-11-20 00:00:00'),
('PRO20', 2000.00, 2500.00, 2300.00, '2017-11-16 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Pro_id` varchar(5) NOT NULL,
  `Pro_name` varchar(100) NOT NULL,
  `Pro_cost` decimal(8,2) NOT NULL,
  `Pro_salePrice` decimal(8,2) NOT NULL,
  `Pro_memberPrice` decimal(8,2) NOT NULL,
  `Pro_amount` varchar(5) NOT NULL,
  `Cate_id` varchar(5) NOT NULL,
  `Shelf_no` varchar(5) NOT NULL,
  `Sup_id` varchar(5) NOT NULL,
  `Point_ofSale` varchar(5) NOT NULL,
  `Pro_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Pro_id`, `Pro_name`, `Pro_cost`, `Pro_salePrice`, `Pro_memberPrice`, `Pro_amount`, `Cate_id`, `Shelf_no`, `Sup_id`, `Point_ofSale`, `Pro_status`) VALUES
('PRO01', 'AK-47', 2500.00, 2700.00, 2600.00, '22', '01', 'SH02', 'SUP05', '5', 1),
('PRO02', 'M16-A1', 2800.00, 3100.00, 3000.00, '16', '01', 'SH02', 'SUP04', '3', 1),
('PRO03', 'M4A1-S', 3000.00, 3500.00, 3300.00, '5', '05', 'SH02', 'SUP03', '3', 1),
('PRO04', 'M1887', 1400.00, 1700.00, 1500.00, '3', '03', 'SH02', 'SUP02', '3', 1),
('PRO05', 'Double-Barrel', 1500.00, 1700.00, 1600.00, '5', '03', 'SH01', 'SUP05', '2', 1),
('PRO06', 'Desert-Eagle', 600.00, 700.00, 650.00, '20', '03', 'SH05', 'SUP05', '6', 1),
('PRO07', 'P250', 200.00, 350.00, 300.00, '35', '03', 'SH01', 'SUP07', '5', 1),
('PRO08', 'P1911', 500.00, 550.00, 520.00, '30', '03', 'SH01', 'SUP08', '5', 1),
('PRO09', 'G-18', 100.00, 250.00, 200.00, '25', '03', 'SH03', 'SUP09', '2', 1),
('PRO10', 'FIVE7', 500.00, 600.00, 550.00, '15', '03', 'SH03', 'SUP10', '2', 1),
('PRO11', 'P2000', 100.00, 250.00, 200.00, '15', '03', 'SH03', 'SUP 1', '3', 1),
('PRO12', 'TEC-9', 500.00, 600.00, 550.00, '15', '03', 'SH05', 'SUP12', '10', 1),
('PRO13', 'M249', 5000.00, 5350.00, 5100.00, '5', '04', 'SH04', 'SUP13', '2', 1),
('PRO14', 'Negav', 1500.00, 2000.00, 1900.00, '5', '04', 'SH05', 'SUP14', '2', 1),
('PRO15', 'AWP', 4000.00, 4750.00, 4500.00, '10', '01', 'SH05', 'SUP15', '2', 1),
('PRO16', 'M107', 5000.00, 5500.00, 5200.00, '10', '01', 'SH05', 'SUP16', '2', 1),
('PRO17', 'M14', 8000.00, 8500.00, 8300.00, '8', '01', 'SH04', 'SUP17', '2', 1),
('PRO18', 'R93', 3000.00, 3500.00, 3200.00, '5', '01', 'SH04', 'SUP18', '2', 1),
('PRO19', 'SP66', 2700.00, 3200.00, 3000.00, '25', '01', 'SH04', 'SUP19', '5', 1),
('PRO20', 'VSS', 2000.00, 2500.00, 2300.00, '40', '01', 'SH01', 'SUP20', '10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `Cate_id` varchar(5) NOT NULL,
  `Cate_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`Cate_id`, `Cate_name`) VALUES
('01', 'ปืน'),
('02', 'ปืนไรเฟิล'),
('03', 'ปืนลูกซอง'),
('04', 'ปืนกลหนัก'),
('05', 'ปืนกลเบา');

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `Province_id` int(11) NOT NULL,
  `Country_id` int(11) DEFAULT NULL,
  `Province_group_id` int(11) DEFAULT NULL,
  `Province_name` varchar(50) NOT NULL,
  `Province_sorting` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`Province_id`, `Country_id`, `Province_group_id`, `Province_name`, `Province_sorting`) VALUES
(1, 1, 6, 'กระบี่', 1),
(2, 1, 1, 'กรุงเทพ', 2),
(3, 1, 2, 'กาญจนบุรี', 3),
(4, 1, 4, 'กาฬสินธุ์', 4),
(5, 1, 3, 'กำแพงเพชร', 5),
(6, 1, 4, 'ขอนแก่น', 6),
(7, 1, 7, 'จันทบุรี', 7),
(8, 1, 2, 'ฉะเชิงเทรา', 8),
(9, 1, 7, 'ชลบุรี', 9),
(10, 1, 2, 'ชัยนาท', 10),
(11, 1, 4, 'ชัยภูมิ', 11),
(12, 1, 6, 'ชุมพร', 12),
(13, 1, 3, 'เชียงราย', 13),
(14, 1, 3, 'เชียงใหม่', 14),
(15, 1, 6, 'ตรัง', 15),
(16, 1, 7, 'ตราด', 16),
(17, 1, 3, 'ตาก', 17),
(18, 1, 2, 'นครนายก', 18),
(19, 1, 1, 'นครปฐม', 19),
(20, 1, 4, 'นครพนม', 20),
(21, 1, 4, 'นครราชสีมา', 21),
(22, 1, 6, 'นครศรีธรรมราช', 22),
(23, 1, 3, 'นครสวรรค์', 23),
(24, 1, 1, 'นนทบุรี', 24),
(25, 1, 6, 'นราธิวาส', 25),
(26, 1, 3, 'น่าน', 26),
(27, 1, 4, 'บุรีรัมย์', 27),
(28, 1, 1, 'ปทุมธานี', 28),
(29, 1, 2, 'ประจวบคีรีขันธ์', 29),
(30, 1, 2, 'ปราจีนบุรี', 30),
(31, 1, 6, 'ปัตตานี', 31),
(32, 1, 2, 'พระนครศรีอยุธยา', 32),
(33, 1, 3, 'พะเยา', 33),
(34, 1, 6, 'พังงา', 34),
(35, 1, 6, 'พัทลุง', 35),
(36, 1, 3, 'พิจิตร', 36),
(37, 1, 0, 'พิษณุโลก', 37),
(38, 1, 2, 'เพชรบุรี', 38),
(39, 1, 3, 'เพชรบูรณ์', 39),
(40, 1, 3, 'แพร่', 40),
(41, 1, 6, 'ภูเก็ต', 41),
(42, 1, 4, 'มหาสารคาม', 42),
(43, 1, 4, 'มุกดาหาร', 43),
(44, 1, 3, 'แม่ฮ่องสอน', 44),
(45, 1, 4, 'ยโสธร', 45),
(46, 1, 6, 'ยะลา', 46),
(47, 1, 4, 'ร้อยเอ็ด', 47),
(48, 1, 6, 'ระนอง', 48),
(49, 1, 7, 'ระยอง', 49),
(50, 1, 2, 'ราชบุรี', 50),
(51, 1, 2, 'ลพบุรี', 51),
(52, 1, 3, 'ลำปาง', 52),
(53, 1, 3, 'ลำพูน', 53),
(54, 1, 4, 'เลย', 54),
(55, 1, 0, 'ศรีสะเกษ', 55),
(56, 1, 4, 'สกลนคร', 56),
(57, 1, 6, 'สงขลา', 57),
(58, 1, 6, 'สตูล', 58),
(59, 1, 1, 'สมุทรปราการ', 59),
(60, 1, 2, 'สมุทรสงคราม', 60),
(61, 1, 1, 'สมุทรสาคร', 61),
(62, 1, 2, 'สระแก้ว', 62),
(63, 1, 2, 'สระบุรี', 63),
(64, 1, 2, 'สิงห์บุรี', 64),
(65, 1, 3, 'สุโขทัย', 65),
(66, 1, 2, 'สุพรรณบุรี', 66),
(67, 1, 6, 'สุราษฎร์ธานี', 67),
(68, 1, 4, 'สุรินทร์', 68),
(69, 1, 4, 'หนองคาย', 69),
(70, 1, 4, 'หนองบัวลำภู', 70),
(71, 1, 2, 'อ่างทอง', 71),
(72, 1, 4, 'อำนาจเจริญ', 72),
(73, 1, 4, 'อุดรธานี', 73),
(74, 1, 3, 'อุตรดิตถ์', 74),
(75, 1, 3, 'อุทัยธานี', 75),
(76, 1, 4, 'อุบลราชธานี', 76),
(77, 1, 4, 'บึงกาฬ', 27);

-- --------------------------------------------------------

--
-- Table structure for table `re_turn`
--

CREATE TABLE `re_turn` (
  `Sale_id` varchar(5) NOT NULL,
  `Pro_id` varchar(5) NOT NULL,
  `Amount` varchar(5) NOT NULL,
  `Return_date` datetime NOT NULL,
  `Comment` varchar(100) DEFAULT NULL,
  `Return_type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `re_turn`
--

INSERT INTO `re_turn` (`Sale_id`, `Pro_id`, `Amount`, `Return_date`, `Comment`, `Return_type`) VALUES
('SA002', 'PRO02', '1', '2023-08-21 00:00:00', '', 2),
('SA002', 'PRO04', '1', '2023-08-21 00:00:00', '', 2),
('SA004', 'PRO07', '3', '2017-12-13 00:00:00', 'สินค้าหมดอายุ', 2),
('SA001', 'PRO08', '2', '2017-11-04 00:00:00', 'สินค้าห่วยเเตก', 1),
('SA004', 'PRO08', '1', '2017-12-13 00:00:00', 'สินค้าเสียหาย', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `Sale_id` varchar(5) NOT NULL,
  `Cust_id` varchar(5) DEFAULT NULL,
  `Sale_date` datetime DEFAULT NULL,
  `Net_price` decimal(8,2) NOT NULL,
  `Net_discount` decimal(8,2) DEFAULT NULL,
  `Sale_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`Sale_id`, `Cust_id`, `Sale_date`, `Net_price`, `Net_discount`, `Sale_status`) VALUES
('SA001', 'C0002', '2017-11-02 00:00:00', 5300.00, 200.00, 1),
('SA002', 'C0004', '2017-11-05 00:00:00', 5300.00, 200.00, 1),
('SA003', 'C0006', '2017-11-15 00:00:00', 5300.00, 200.00, 1),
('SA004', 'C0008', '2017-12-08 00:00:00', 5300.00, 200.00, 1),
('SA005', 'C0010', '2017-12-20 00:00:00', 54780.00, 320.00, 1),
('SA006', 'C0001', '2023-08-21 00:00:00', 8900.00, 0.00, 1),
('SA007', 'C0001', '2023-08-21 00:00:00', 0.00, 0.00, 0),
('SA008', 'C0001', '2023-08-21 00:00:00', 0.00, 0.00, 0),
('SA009', 'C0001', '2023-08-21 00:00:00', 6200.00, 0.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sale_detail`
--

CREATE TABLE `sale_detail` (
  `Sale_id` varchar(5) NOT NULL,
  `Pro_id` varchar(5) NOT NULL,
  `Amount` varchar(5) NOT NULL,
  `Sale_price` decimal(8,2) NOT NULL,
  `Discount` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `sale_detail`
--

INSERT INTO `sale_detail` (`Sale_id`, `Pro_id`, `Amount`, `Sale_price`, `Discount`) VALUES
('SA005', 'PRO01', '1', 2700.00, 0.00),
('SA006', 'PRO01', '1', 2700.00, 0.00),
('SA009', 'PRO01', '1', 2700.00, 0.00),
('SA002', 'PRO02', '1', 3100.00, 0.00),
('SA006', 'PRO02', '2', 6200.00, 0.00),
('SA003', 'PRO03', '1', 3500.00, 0.00),
('SA009', 'PRO03', '1', 3500.00, 0.00),
('SA002', 'PRO04', '1', 1700.00, 0.00),
('SA003', 'PRO05', '1', 1700.00, 0.00),
('SA002', 'PRO06', '1', 700.00, 0.00),
('SA004', 'PRO06', '5', 3500.00, 0.00),
('SA003', 'PRO07', '10', 3500.00, 0.00),
('SA004', 'PRO07', '5', 1750.00, 0.00),
('SA001', 'PRO08', '2', 550.00, 0.00),
('SA004', 'PRO08', '5', 2750.00, 0.00),
('SA004', 'PRO09', '5', 1250.00, 0.00),
('SA004', 'PRO10', '5', 3000.00, 300.00),
('SA004', 'PRO11', '5', 1250.00, 125.00),
('SA004', 'PRO12', '5', 3000.00, 0.00),
('SA005', 'PRO15', '2', 9500.00, 0.00),
('SA005', 'PRO16', '2', 11000.00, 0.00),
('SA005', 'PRO17', '1', 8500.00, 0.00),
('SA005', 'PRO18', '5', 17500.00, 0.00),
('SA005', 'PRO19', '1', 3200.00, 320.00);

-- --------------------------------------------------------

--
-- Table structure for table `shelf`
--

CREATE TABLE `shelf` (
  `Shelf_no` varchar(5) NOT NULL,
  `Shelf_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `shelf`
--

INSERT INTO `shelf` (`Shelf_no`, `Shelf_name`) VALUES
('SH01', 'ตู้โชว์หน้าร้าน'),
('SH02', 'ชั้นวางกำเเพง'),
('SH03', 'ตู้หน้าร้าน'),
('SH04', 'ตู้หลังร้าน');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `Sup_id` varchar(5) NOT NULL,
  `Sup_name` varchar(50) NOT NULL,
  `Sup_address` varchar(100) DEFAULT NULL,
  `Sup_tel` varchar(20) NOT NULL,
  `Contract_name` varchar(50) DEFAULT NULL,
  `Province_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`Sup_id`, `Sup_name`, `Sup_address`, `Sup_tel`, `Contract_name`, `Province_id`) VALUES
('SUP01', 'ร้าน GUN Ammy', '44/89', '021654984', 'คุณ เก๋า', 23),
('SUP02', 'ร้าน มาแรง', '889/23', '039721651', 'คุณ พรต', 9),
('SUP03', 'ร้าน ซอมบี้', '226/58', '022151325', 'คุณ โก๋', 1),
('SUP04', 'ร้าน บ้านอารักขา', '12/41', '095181621', 'คุณ นนท์', 12),
('SUP05', 'ร้าน สถานีตำรวจชลบุรี', '33/8', '191', 'คุณ กิ๊ก', 9),
('SUP06', 'ร้าน Weapon for you', '55/55', '0323164588', 'คุณ มิ้ว', 50),
('SUP07', 'ร้าน กันกัน', '66/66', '0982181654', 'คุณ ฟ่า', 30),
('SUP08', 'ร้าน ปลอดภัยกว่ามีด', '77/77', '0970981519', 'คุณ ตาล', 1),
('SUP09', 'ร้าน นาวีนาวี', '88/88', '0231865484', 'คุณ นิ้ง', 9),
('SUP10', 'ร้าน สมปอง', '99/99', '0318154621', 'คุณ เดย์', 9),
('SUP11', 'ร้าน สามัญประจำบ้าน', '10/10', '0981816516', 'คุณ เนส', 9),
('SUP12', 'ร้าน Shotgun', '012/215', '0979051654', 'คุณ ตอง', 9),
('SUP13', 'ร้าน Handgun', '336/48', '0315184213', 'คุณ เเฮ่ม', 9),
('SUP14', 'ร้าน Run and gun', '954/51', '0856422442', 'คุณ บีม', 12),
('SUP15', 'ร้าน cover me', '29/56', '0318159985', 'คุณ เเชมม์', 9),
('SUP16', 'ร้าน top gun', '25/29', '0233484548', 'คุณ ช้าง', 12),
('SUP17', 'ร้าน manman', '87/47', '0368484621', 'คุณ ใหม่', 12),
('SUP18', 'ร้าน Gunta GTA', '68/45', '0564916519', 'คุณ เก้า', 9),
('SUP19', 'ร้าน PUBG', '24/46', '0381646516', 'คุณ สาย', 10),
('SUP20', 'ร้าน รักสงบ', '11/11', '0897455416', 'คุณ ชล', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buy`
--
ALTER TABLE `buy`
  ADD PRIMARY KEY (`Buy_id`);

--
-- Indexes for table `buy_detail`
--
ALTER TABLE `buy_detail`
  ADD PRIMARY KEY (`Pro_id`,`Buy_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Cust_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Emp_id`);

--
-- Indexes for table `or_der`
--
ALTER TABLE `or_der`
  ADD PRIMARY KEY (`Order_id`);

--
-- Indexes for table `or_der_detail`
--
ALTER TABLE `or_der_detail`
  ADD PRIMARY KEY (`Pro_id`,`Order_id`);

--
-- Indexes for table `previous_cost`
--
ALTER TABLE `previous_cost`
  ADD PRIMARY KEY (`Pro_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Pro_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`Cate_id`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`Province_id`);

--
-- Indexes for table `re_turn`
--
ALTER TABLE `re_turn`
  ADD PRIMARY KEY (`Pro_id`,`Sale_id`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`Sale_id`);

--
-- Indexes for table `sale_detail`
--
ALTER TABLE `sale_detail`
  ADD PRIMARY KEY (`Pro_id`,`Sale_id`);

--
-- Indexes for table `shelf`
--
ALTER TABLE `shelf`
  ADD PRIMARY KEY (`Shelf_no`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`Sup_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
