-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2018 at 05:32 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sneakeregion`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adm_id` int(11) NOT NULL,
  `adm_username` varchar(55) COLLATE utf8_bin NOT NULL,
  `adm_password` varchar(55) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adm_id`, `adm_username`, `adm_password`) VALUES
(1, 'naqib', '123456'),
(2, 'nabil', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `cart_image` varchar(200) COLLATE utf8_bin NOT NULL,
  `cart_brand` varchar(55) COLLATE utf8_bin NOT NULL,
  `cart_price` varchar(55) COLLATE utf8_bin NOT NULL,
  `cart_name` varchar(200) COLLATE utf8_bin NOT NULL,
  `cart_category` varchar(11) COLLATE utf8_bin NOT NULL,
  `product_id` varchar(11) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `cust_name` varchar(85) COLLATE utf8_bin NOT NULL,
  `cust_username` varchar(55) COLLATE utf8_bin NOT NULL,
  `cust_password` varchar(55) COLLATE utf8_bin NOT NULL,
  `cust_phone` varchar(15) COLLATE utf8_bin NOT NULL,
  `cust_email` varchar(55) COLLATE utf8_bin NOT NULL,
  `cust_address` varchar(150) COLLATE utf8_bin NOT NULL,
  `cust_gender` varchar(8) COLLATE utf8_bin NOT NULL,
  `registration_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_name`, `cust_username`, `cust_password`, `cust_phone`, `cust_email`, `cust_address`, `cust_gender`, `registration_date`) VALUES
(1, 'Muhammad Naqib', 'Naqib Yatim', '84d4d82ef916ff59e35e1b0fb66a504c58e6a7c0', '0123456789', '149, Persiaran Menteri Satu, Taman Menteri', 'naqibpeace@gmail.com', 'male', '2018-10-17'),
(2, 'Muhammad Nabil', 'Nabil', '84d4d82ef916ff59e35e1b0fb66a504c58e6a7c0', '0129876543', '32, Lot 5, Taman Cendiakawan, Kedah', 'nabil12razman@gmail.com', 'male', '2018-10-17'),
(3, 'John Cena', 'jc', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '0123091264', 'District 9, California', 'johncena@gmail.com', 'male', '2018-10-18'),
(4, 'Mary June Ana', 'mj', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '0144204204', 'mj@gmail.com', '21 Street, Jamaica', 'female', '2018-10-28'),
(5, 'Bud Junior', 'bj', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '0123456789', 'bj@gmail.com', 'Block 404, Wangsa Maju, Kuala Lumpur', 'female', '2018-10-28');

-- --------------------------------------------------------

--
-- Table structure for table `order_sneaker`
--

CREATE TABLE `order_sneaker` (
  `order_id` int(11) NOT NULL,
  `cust_name` varchar(100) COLLATE utf8_bin NOT NULL,
  `cust_username` varchar(55) COLLATE utf8_bin NOT NULL,
  `cust_phone` varchar(15) COLLATE utf8_bin NOT NULL,
  `cust_email` varchar(100) COLLATE utf8_bin NOT NULL,
  `cust_address` varchar(200) COLLATE utf8_bin NOT NULL,
  `cart_image` varchar(200) COLLATE utf8_bin NOT NULL,
  `cart_brand` varchar(55) COLLATE utf8_bin NOT NULL,
  `cart_price` varchar(11) COLLATE utf8_bin NOT NULL,
  `cart_name` varchar(200) COLLATE utf8_bin NOT NULL,
  `cart_size` varchar(11) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `order_sneaker`
--

INSERT INTO `order_sneaker` (`order_id`, `cust_name`, `cust_username`, `cust_phone`, `cust_email`, `cust_address`, `cart_image`, `cart_brand`, `cart_price`, `cart_name`, `cart_size`) VALUES
(60, 'John Cena', 'jc', '0123091264', 'johncena@gmail.com', 'District 9, California', 'vansM1.jpg', 'VANS', '265', 'Sk8', 'UK 7'),
(61, 'John Cena', 'jc', '0123091264', 'johncena@gmail.com', 'District 9, California', 'vanswm1.jpg', 'VANS', '260', 'Flame Old Skool', 'UK 6'),
(66, 'Bud Junior', 'bj', '0123456789', 'Block 404, Wangsa Maju, Kuala Lumpur', 'bj@gmail.com', 'converseM1.jpg', 'CONVERSE', '255', 'Chuck Taylor All Star Classic', 'UK 5'),
(67, 'Bud Junior', 'bj', '0123456789', 'Block 404, Wangsa Maju, Kuala Lumpur', 'bj@gmail.com', 'asicsWM1.jpg', 'ASICS', '260', 'GEL-Kayano 25', 'UK 5'),
(68, 'Bud Junior', 'bj', '0123456789', 'Block 404, Wangsa Maju, Kuala Lumpur', 'bj@gmail.com', '8HDUJF-HERO.jpg', 'VANS', '47', 'Disney x Vans Kids Old Skool V', 'UK 2'),
(69, 'Mary June Ana', 'mj', '0144204204', '21 Street, Jamaica', 'mj@gmail.com', 'adidasWM2.jpg', 'ADIDAS', '595', 'Ultraboost Uncaged Shoes', 'UK 5'),
(70, 'Mary June Ana', 'mj', '0144204204', '21 Street, Jamaica', 'mj@gmail.com', 'vansM6.jpg', 'VANS', '255', 'Golden Coast Authentic', 'UK 5');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pd_id` int(11) NOT NULL,
  `pd_image` varchar(200) COLLATE utf8_bin NOT NULL,
  `pd_brand` varchar(55) COLLATE utf8_bin NOT NULL,
  `pd_price` varchar(11) COLLATE utf8_bin NOT NULL,
  `pd_name` varchar(100) COLLATE utf8_bin NOT NULL,
  `pd_quantity` int(11) NOT NULL,
  `pd_category` varchar(55) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pd_id`, `pd_image`, `pd_brand`, `pd_price`, `pd_name`, `pd_quantity`, `pd_category`) VALUES
(7, 'adidasM1.jpg', 'ADIDAS', '755', 'Prophere Shoes', 47, 'men'),
(8, 'AdidasM2.jpg', 'ADIDAS', '350', 'Deerupt Runner Shoes', 49, 'men'),
(9, 'adidasM3.jpg', 'ADIDAS', '650', ' Boston Super x R1 Shoes', 49, 'men'),
(10, 'AdidasM4.jpg', 'ADIDAS', '849', 'Ultraboost Shoes', 50, 'men'),
(11, 'adidasM5.jpg', 'ADIDAS', '943', 'NMTS1 Primeknit GTX Shoes', 49, 'men'),
(13, 'adidasM6.jpg', 'ADIDAS', '849', 'Ultraboost Shoes', 50, 'men'),
(14, 'adidasM7.jpg', 'ADIDAS', '520', 'POD-S3.1 Shoes', 50, 'men'),
(15, 'AdidasM9.jpg', 'ADIDAS', '490', 'Pureboost Shoes', 50, 'men'),
(16, 'adidasM10.jpg', 'ADIDAS', '849', 'Ultra Boost Ltd Shoes', 50, 'men'),
(17, 'adidasWM1.jpg', 'ADIDAS', '613', 'NMD_R1 Shoes', 48, 'women'),
(18, 'adidasWM2.jpg', 'ADIDAS', '595', 'Ultraboost Uncaged Shoes', 49, 'women'),
(19, 'adidasWm3.jpg', 'ADIDAS', '849', 'Ultra Boost Ltd Shoes', 50, 'women'),
(21, 'adidasWM4.jpg', 'ADIDAS', '613', 'POD-S3.1 Shoes', 50, 'women'),
(22, 'AdidasWM5.jpg', 'ADIDAS', '613', 'NMD_R1 Shoes', 50, 'women'),
(24, 'adidasWM6.jpg', 'ADIDAS', '315', ' Alphabounce Beyond Shoes', 50, 'women'),
(25, 'adidasWM7.jpg', 'ADIDAS', '519', 'I-5923 Shoes', 50, 'women'),
(26, 'adidasWM9.jpg', 'ADIDAS', '850', 'Ultraboost Shoes', 49, 'women'),
(27, 'adidasWm10.jpg', 'ADIDAS', '750', ' NMD_CS2 Primeknit Shoes', 50, 'women'),
(28, 'adidasWm11.jpg', 'ADIDAS', '660', 'Arkyn Primeknit Shoes', 50, 'women'),
(29, 'adidasK1.jpg', 'ADIDAS', '300', 'RapidaRun Knit Shoes', 49, 'kids'),
(30, 'adidasK2.jpg', 'ADIDAS', '294', 'Deerupt Runner Shoes', 50, 'kids'),
(31, 'adidasK3.jpg', 'ADIDAS', '259', ' X_PLR Shoes', 50, 'kids'),
(32, 'adidasK4.jpg', 'ADIDAS', '259', 'Alphabounce Beyond Shoes', 50, 'kids'),
(33, 'adidasK5.jpg', 'ADIDAS', '294', 'Alphabounce 1 Parley Shoes', 50, 'kids'),
(34, 'adidasK6.jpg', 'ADIDAS', '300', 'Swift Run Shoes', 50, 'kids'),
(35, 'adidasK7.jpg', 'ADIDAS', '120', 'AltaSwim', 50, 'kids'),
(36, 'adidasK8.jpg', 'ADIDAS', '294', 'Deerupt Runner Shoes', 50, 'kids'),
(37, 'adidasK9.jpg', 'ADIDAS', '283', 'RapidaRun Knit Shoes', 49, 'kids'),
(38, 'adidasK10.jpg', 'ADIDAS', '450', 'EQT Support ADV Mid Shoes', 50, 'kids'),
(45, 'nikeM1.jpg', 'NIKE', '879', 'Air Jordan 11 Retro', 49, 'men'),
(46, 'nikeM2.jpg', 'NIKE', '495', 'Kyrie 4', 49, 'men'),
(47, 'nikeM3.jpg', 'NIKE', '939', 'Nike Air Foamposite One', 50, 'men'),
(48, 'nikeM4.jpg', 'NIKE', '649', 'Nike React Element 87', 50, 'men'),
(50, 'nikeM5.jpg', 'NIKE', '649', 'Nike Air Max 97', 50, 'men'),
(51, 'nikeM6.jpg', 'NIKE', '735', 'Nike Air Max 97 Premium', 50, 'men'),
(52, 'nikeM7.jpg', 'NIKE', '775', 'Nike Air VaporMax Run Utility', 50, 'men'),
(53, 'nikeM8.jpg', 'NIKE', '775', 'Nike Air VaporMax Flyknit 2', 50, 'men'),
(54, 'nikeM9.jpg', 'NIKE', '649', 'Nike Zoom Fly Flyknit', 50, 'men'),
(55, 'nikeM10.jpg', 'NIKE', '452', 'Nike Air Zoom Pegasus 35', 50, 'men'),
(56, 'nikeWM1.jpg', 'NIKE', '535', 'Nike React Element 55', 49, 'women'),
(57, 'nikeWM2.jpg', 'NIKE', '649', 'Nike Zoom Fly Flyknit', 50, 'women'),
(58, 'nikeWM3.jpg', 'NIKE', '535', 'Nike Air Max 1 LX Glow in the Dark', 50, 'women'),
(59, 'nikeWM4.jpg', 'NIKE', '455', 'Nike Air Max 90', 50, 'women'),
(60, 'nikeWM6.jpeg', 'NIKE', '289', 'Nike Classic Cortez Leather', 50, 'women'),
(61, 'nikeWm7.jpg', 'NIKE', '735', 'Nike Air Max 95 LX', 50, 'women'),
(62, 'nikeWM8.jpg', 'NIKE', '555', 'Nike Air Zoom Pegasus 35 Premium', 50, 'women'),
(63, 'nikeWM9.jpg', 'NIKE', '263', 'Nike Classic Cortez', 50, 'women'),
(64, 'nikeWM10.jpg', 'NIKE', '579', 'Air Jordan 1 Rebel XX', 50, 'women'),
(65, 'nikeK1.jpg', 'NIKE', '535', 'Nike Air Max 97', 49, 'kids'),
(66, 'nikeK2.jpg', 'NIKE', '359', 'Nike Air Max 95', 50, 'kids'),
(67, 'nikeK3.jpg', 'NIKE', '299', 'Nike Free RN 2018', 50, 'kids'),
(68, 'nikeK4.jpg', 'NIKE', '319', 'Nike Huarache Extreme', 50, 'kids'),
(69, 'nikeK5.jpg', 'NIKE', '215', 'Kyrie 4 Little Big Cats', 50, 'kids'),
(70, 'nikeK6.jpg', 'NIKE', '235', 'KD11 Little Big Cats', 50, 'kids'),
(71, 'nikeK8.jpg', 'NIKE', '195', 'Nike Cortez Basic SL', 50, 'kids'),
(72, 'nikeK9.jpg', 'NIKE', '235', 'Air Jordan 1 Mid Alt', 50, 'kids'),
(73, 'nikeK10.jpg', 'NIKE', '405', 'Air Jordan XXXII Low', 50, 'kids'),
(74, 'pumaM1.jpg', 'PUMA', '120', 'Clyde Court Disrupt Menâ€™s Basketball Shoes', 49, 'men'),
(75, 'pumaM2.jpg', 'PUMA', '100', 'PUMA x PEPSI Suede Classic Sneakers', 50, 'men'),
(76, 'pumaM3.jpg', 'PUMA', '100', 'PUMA x PEPSI Suede Classic Sneakers', 50, 'men'),
(77, 'pumaM4.jpg', 'PUMA', '120', 'Thunder Spectra Sneakers', 50, 'men'),
(78, 'pumaM5.jpg', 'PUMA', '120', 'Thunder Spectra Sneakers', 50, 'men'),
(79, 'pumaM6.jpg', 'PUMA', '110', 'PUMA Clyde x Volcom', 50, 'men'),
(80, 'pumaM7.jpg', 'PUMA', '120', 'PUMA Clyde RT x Volcom', 50, 'men'),
(81, 'pumaM8.jpg', 'PUMA', '130', 'PUMA x KARL LAGERFELD Suede Classic Sneakers', 50, 'men'),
(82, 'pumaM9.jpg', 'PUMA', '130', 'PUMA x KARL LAGERFELD Suede Classic Sneakers', 50, 'men'),
(83, 'pumaM10.jpg', 'PUMA', '85', 'GV Special NYC Sneakers', 50, 'men'),
(84, 'pumaWm1.jpg', 'PUMA', '100', 'PUMA x PEPSI Suede Classic Sneakers', 49, 'women'),
(85, 'pumaWM2.jpg', 'PUMA', '100', 'PUMA x PEPSI Suede Classic Sneakers', 50, 'women'),
(86, 'pumaWm3.jpg', 'PUMA', '130', 'PUMA x KARL LAGERFELD Suede Classic Sneakers', 50, 'women'),
(87, 'pumaWm4.jpg', 'PUMA', '130', 'PUMA x KARL LAGERFELD Suede Classic Sneakers', 50, 'women'),
(88, 'pumaWm5.jpg', 'PUMA', '120', 'Clyde Court Disrupt Menâ€™s Basketball Shoes', 50, 'women'),
(89, 'pumaWm6.jpg', 'PUMA', '90', 'Defy Luxe Womenâ€™s Sneakers', 50, 'women'),
(90, 'pumaWM7.jpg', 'PUMA', '90', 'Defy Luxe Womenâ€™s Sneakers', 50, 'women'),
(91, 'pumaWm8.jpg', 'PUMA', '90', 'Defy Luxe Womenâ€™s Sneakers', 50, 'women'),
(92, 'pumaK1.jpg', 'PUMA', '55', 'Suede Jr', 48, 'kids'),
(93, 'pumaK2.jpg', 'PUMA', '55', 'Suede Classic JR Sneakers', 50, 'kids'),
(94, 'pumaK3.jpg', 'PUMA', '52', 'Suede 2 Straps Preschool Sneakers', 50, 'kids'),
(95, 'pumaK4.jpg', 'PUMA', '80', 'RS-0 Play JR Sneakers', 50, 'kids'),
(96, 'pumaK5.jpg', 'PUMA', '80', 'RS-0 Play JR Sneakers', 50, 'kids'),
(97, 'pumaK6.jpg', 'PUMA', '75', 'RS-0 Play Preschool Sneakers', 50, 'kids'),
(98, 'pumaK7.jpg', 'PUMA', '55', 'Basket Classic JR Sneakers', 50, 'kids'),
(99, 'pumaK8.jpg', 'PUMA', '24.99', 'Tune Cat 3 Kids Shoes', 50, 'kids'),
(100, 'pumaK10.jpg', 'PUMA', '34.99', 'Tune Cat 3 JR Shoes', 50, 'kids'),
(101, 'converseM1.jpg', 'CONVERSE', '255', 'Chuck Taylor All Star Classic', 48, 'men'),
(102, 'converseM2.jpg', 'CONVERSE', '250', 'Chuck Taylor All Star Classic', 50, 'men'),
(103, 'converseM3.jpg', 'CONVERSE', '295', 'Converse Chuck Taylor All Star WP Leather High Top', 50, 'men'),
(104, 'converseM4.jpg', 'CONVERSE', '280', 'Converse Chuck Taylor PC Leather High Top', 50, 'men'),
(105, 'converseM5.jpg', 'CONVERSE', '270', 'Chuck 70 Classic High Top', 50, 'men'),
(106, 'converseM6.jpg', 'CONVERSE', '265', 'Chuck 70 Classic Low Top', 50, 'men'),
(107, 'converseM7.jpg', 'CONVERSE', '295', 'Converse Chuck 70 GORE-TEXÂ® High Top', 50, 'men'),
(108, 'converseM8.jpg', 'CONVERSE', '300', 'Converse Chuck Taylor All Star OG Explorer Boot Leather', 50, 'men'),
(109, 'converseM9.jpg', 'CONVERSE', '280', 'Converse Chuck 70 Suede High Top', 50, 'men'),
(110, 'converseM10.jpg', 'CONVERSE', '275', 'Converse Chuck 70 Suede Low Top', 50, 'men'),
(111, 'converseWm1.jpg', 'CONVERSE', '255', 'Chuck Taylor All Star Classic', 49, 'women'),
(112, 'converseWm2.jpg', 'CONVERSE', '250', 'Chuck Taylor All Star Classic', 50, 'women'),
(113, 'converseWm3.jpg', 'CONVERSE', '275', 'Chuck Taylor All Star Hiker Leather High Top', 50, 'women'),
(114, 'conversewm4.jpg', 'CONVERSE', '295', 'Converse Chuck 70 Street Warmer Leather High Top', 50, 'women'),
(115, 'converseWm5.jpg', 'CONVERSE', '270', 'Converse Chuck Taylor All Star Clean Lift Low Top', 50, 'women'),
(116, 'conversewm6.jpg', 'CONVERSE', '275', 'Converse One Star Platform Patented â€˜90s Leather Low Top', 50, 'women'),
(117, 'conversewm7.jpg', 'CONVERSE', '275', 'Chuck Taylor All Star Lift Leather High Top', 50, 'women'),
(118, 'conversewm8.jpg', 'CONVERSE', '260', 'Chuck Taylor All Star Lift', 50, 'women'),
(119, 'conversewm9.jpg', 'CONVERSE', '275', 'Converse x Brain Dead Chuck 70', 50, 'women'),
(120, 'conversewm10.jpg', 'CONVERSE', '275', 'Run Star Translucent Low Top', 50, 'women'),
(121, 'converseK1.jpg', 'CONVERSE', '134', 'Chuck Taylor All Star Classic Toddler/Youth', 49, 'kids'),
(122, 'converseK2.jpg', 'CONVERSE', '132', 'Chuck Taylor All Star Classic Colours Tdlr/Yth', 50, 'kids'),
(123, 'converseK3.jpg', 'CONVERSE', '150', 'Chuck Taylor All Star PC Boot', 50, 'kids'),
(124, 'converseK4.jpg', 'CONVERSE', '145', 'Chuck Taylor All Star 2V PC Boot', 50, 'kids'),
(125, 'converseK6.jpg', 'CONVERSE', '137', 'Chuck Taylor All Star Leather Low Top', 50, 'kids'),
(126, 'converseK7.jpg', 'CONVERSE', '140', 'Converse Chuck Taylor All Star Graphite Glitter Leather High Top', 50, 'kids'),
(127, 'converseK8.jpg', 'CONVERSE', '137', 'Converse Chuck Taylor All Star Puffer Stitch Leather Low Top', 50, 'kids'),
(128, 'converseK10.jpg', 'CONVERSE', '351', 'Converse Chuck Taylor All Star 2V Graphite & Glitter Leather Low Top', 50, 'kids'),
(129, 'converseK10.jpg', 'CONVERSE', '351', 'Converse Chuck Taylor All Star 2V Graphite & Glitter Leather Low Top', 50, 'kids'),
(131, 'asicsM1.jpg', 'ASICS', '260', 'GEL-Kayano 25 SP', 49, 'men'),
(132, 'asicsM2.jpg', 'ASICS', '220', 'GEL-Cumulus 20 SP', 50, 'men'),
(133, 'asicsm3.jpg', 'ASICS', '190', 'GT-1000 7 SP', 50, 'men'),
(134, 'acisM4.jpg', 'ASICS', '250', 'Metarun', 50, 'men'),
(135, 'acisM5.jpg', 'ASICS', '260', 'GEL-Kayano 25', 50, 'men'),
(136, 'asicsM6.jpg', 'ASICS', '230', 'DynaFlyte 3', 50, 'men'),
(137, 'asicsM7.jpg', 'ASICS', '270', 'GEL-Kayano 25 Lite-Show', 50, 'men'),
(138, 'asicsM8.jpg', 'ASICS', '170', 'GEL-Nimbus 20 Lite-Show', 50, 'men'),
(139, 'asicsM9.jpg', 'ASICS', '240', 'DynaFlyte 3 Lite-Show', 50, 'men'),
(140, 'asicsM10.jpg', 'ASICS', '260', 'GEL-Quantum 360 4', 50, 'men'),
(141, 'asicsWM1.jpg', 'ASICS', '260', 'GEL-Kayano 25', 48, 'women'),
(142, 'asicsWm2.jpg', 'ASICS', '260', 'GEL-Nimbus 20', 50, 'women'),
(143, 'asicsWM3.jpg', 'ASICS', '120', 'GEL-Cumulus 20', 50, 'women'),
(144, 'asicsWM4.jpg', 'ASICS', '260', 'GEL-Quantum 360 4', 50, 'women'),
(145, 'asicsWM5.jpg', 'ASICS', '200', 'GEL-Fit Sana 4 SE', 50, 'women'),
(146, 'asicsWM6.jpg', 'ASICS', '200', 'Roadhawk FF 2', 50, 'women'),
(147, 'asicsWM7.jpg', 'ASICS', '270', 'GEL-Kayano 25 Lite-Show', 50, 'women'),
(148, 'asicsWM8.jpg', 'ASICS', '270', 'GEL-Nimbus 20 Lite-Show', 50, 'women'),
(149, 'asicsWM9.jpg', 'ASICS', '240', 'DynaFlyte 3 Lite-Show', 50, 'women'),
(150, 'asicsWm10.jpg', 'ASICS', '250', 'HyperGEL-KAN', 50, 'women'),
(151, 'asicsK1.jpg', 'ASICS', '140', 'GEL-Kayano 25 GS', 49, 'kids'),
(152, 'asicsK2.jpg', 'ASICS', '90', 'GEL-Kenun MX GS', 50, 'kids'),
(153, 'asicsK3.jpg', 'ASICS', '155', 'AMPLICA GS', 50, 'kids'),
(154, 'asicsK4.jpg', 'ASICS', '170', 'GT-1000 7 GS', 50, 'kids'),
(155, 'asicsK5.jpg', 'ASICS', '170', 'GT-1000 7 GS', 50, 'kids'),
(156, 'asicsK6.jpg', 'ASICS', '190', 'GEL-Kenun MX GS', 50, 'kids'),
(157, 'asicsK7.jpg', 'ASICS', '200', 'HyperGEL-SAI GS', 50, 'kids'),
(158, 'asicsK8.jpg', 'ASICS', '170', 'GT-1000 7 GS', 50, 'kids'),
(159, 'asicsK9.jpg', 'ASICS', '170', 'GT-1000 7 GS', 50, 'kids'),
(160, 'asicsK10.jpg', 'ASICS', '155', 'PRE-Contend 4 PS', 50, 'kids'),
(161, 'vansM1.jpg', 'VANS', '265', 'Sk8', 49, 'men'),
(162, 'vansM2.jpg', 'VANS', '280', 'Slip-On UC', 50, 'men'),
(163, 'vansM3.jpg', 'VANS', '260', 'Old Skool', 50, 'men'),
(164, 'vansM4.jpg', 'VANS', '250', 'Checkerboard Slip-On', 50, 'men'),
(165, 'vansM5.jpg', 'VANS', '250', 'Authentic', 50, 'men'),
(166, 'vansM6.jpg', 'VANS', '255', 'Golden Coast Authentic', 49, 'men'),
(167, 'vansM7.jpg', 'VANS', '290', 'Sk8 Reissue UC', 50, 'men'),
(168, 'vansM8.jpg', 'VANS', '280', 'Slip-On UC', 50, 'men'),
(169, 'vansM9.jpg', 'VANS', '250', 'Checkerboard Slip-On', 50, 'men'),
(170, 'vansM10.jpg', 'VANS', '250', 'Authentic', 50, 'men'),
(171, 'vanswm1.jpg', 'VANS', '260', 'Flame Old Skool', 49, 'women'),
(172, 'vanswm2.jpg', 'VANS', '260', 'Old Skool', 50, 'women'),
(173, 'vansWM3.jpg', 'VANS', '250', 'Slip-On', 50, 'women'),
(174, 'vansWM4.jpg', 'VANS', '265', 'Disney x Vans Authentic', 50, 'women'),
(175, 'vansWM5.jpg', 'VANS', '265', 'Sk8-Hi', 50, 'women'),
(176, 'vansWm6.jpg', 'VANS', '270', 'Disney x Vans Old Skool', 50, 'women'),
(177, 'vansWm7.jpg', 'VANS', '250', 'Authentic', 50, 'women'),
(178, 'vansWm8.jpg', 'VANS', '270', 'Disney x Vans Slip-On', 50, 'women'),
(179, 'vansWm9.jpg', 'VANS', '299', 'Canvas Old Skool', 50, 'women'),
(180, 'vansWm10.jpg', 'VANS', '280', 'Disney x Vans Sk8-Hi', 50, 'women'),
(181, '8H4URP-HERO.jpg', 'VANS', '137', 'Kids Brain Wall Authentic Elastic Lace', 49, 'kids'),
(182, '8H4URQ-HERO.jpg', 'VANS', '137', 'Kids Brain Wall Authentic Elastic Lace', 50, 'kids'),
(183, '2QIURT-HERO.jpg', 'VANS', '137', 'Kids Glow Galaxy Slip-On', 50, 'kids'),
(184, '8HDURT-HERO.jpg', 'VANS', '142', 'Kids Glow Galaxy Old Skool V', 50, 'kids'),
(185, '8HDUJF-HERO.jpg', 'VANS', '47', 'Disney x Vans Kids Old Skool V', 49, 'kids'),
(186, '276UT2-HERO.jpg', 'VANS', '250', 'Disney x Vans Kids Sk8-Hi Zip', 50, 'kids'),
(187, '2QIUJ4-HERO.jpg', 'VANS', '145', 'Disney x Vans Kids Slip-On', 50, 'kids'),
(188, 'W9T6BT-HERO.jpg', 'VANS', '140', 'Kids Old Skool', 50, 'kids'),
(189, 'D5F6BT-HERO.jpg', 'VANS', '140', 'Kids Sk8-Hi', 50, 'kids'),
(190, '18THRK-HERO.jpg', 'VANS', '140', 'Kids Sk8-Mid Reissue V', 50, 'kids');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `order_sneaker`
--
ALTER TABLE `order_sneaker`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pd_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_sneaker`
--
ALTER TABLE `order_sneaker`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
