-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2024 at 05:36 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `password`) VALUES
(1, 'admin', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2'),
(3, 'mark', '7b5950a50ff66388a63cb14d1cfaeaeb6708230d'),
(4, 'brylle', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2'),
(5, 'keihle', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `pid`, `name`, `price`, `quantity`, `image`) VALUES
(127, 0, 53, 'Gigabyte B760M', 9000, 1, 'MB - LGA1700 - Gigabyte - B760M H DDR4.png'),
(128, 0, 50, 'AMD Ryzen 5 3600', 6500, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'CPU'),
(2, 'GPU'),
(3, 'Powersupply'),
(4, 'Motherboard'),
(5, 'Case'),
(6, 'Cooler'),
(7, 'Memory'),
(8, 'Storage');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `name`, `email`, `number`, `message`) VALUES
(2, 1, 'keihle', 'keihle@gmail.com', '1231231231', 'Hello!'),
(4, 3, 'keihle', 'keihle29@gmail.com', '1234', 'When will the order be complete?');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `number` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` date NOT NULL DEFAULT current_timestamp(),
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(9, 3, 'af', '7645321', 'brylle@gmail.com', 'cash on delivery', 'flat no. , , , ,  - ', ' MSI B550M PRO-VDH WIFI (6300 x 1) - Intel Core i9-12900K (30000 x 1) - Seasonic Focus GX-750  (9000 x 1) - Corsair Crystal 570X RGB (8999 x 1) - G.Skill Ripjaws V (9000 x 1) - Western Digital (WD) Black  (12000 x 1) - ', 75299, '2024-06-06', 'pending'),
(10, 3, 'brylle', '1234556', 'brylle@gmail.com', 'paytm', 'flat no. , , , ,  - ', 'AMD Ryzen 5 3600 (6500 x 1) - ASUS Dual Radeon RX 6600 V2 (12995 x 1) - Gigabyte A520I AC (6270 x 1) - G.Skill Ripjaws V (9000 x 1) - Seagate IronWolf  (7000 x 1) - Thermaltake  Toughpower GF1 750W  (8000 x 1) - Corsair Crystal 570X RGB (8999 x 1) - DEEPCOOL Gammaxx GT Air Cooler (2800 x 1) - Gigabyte B650 Aorus Elite AX (13000 x 1) - ', 74564, '2024-06-06', 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `details` varchar(500) NOT NULL,
  `price` int(10) NOT NULL,
  `image_01` varchar(100) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `socket_type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `details`, `price`, `image_01`, `category_id`, `socket_type`) VALUES
(2, 'ASUS RX 7800 XT OC Graphics Card', 'AMD Asus Graphics Card', 64000, 'GPU - AMD Asus - Radeon RX 7800 XT OC.png', 2, NULL),
(6, 'Corsair Crystal 570X RGB', 'ATX Mid Tower', 8999, 'CASE - CORSAIR - Crystal 570X RGB.png', 5, NULL),
(7, 'NZXT H510', ' ATX Mid Tower', 3499, 'CASE - NZXT - H510.png', 5, NULL),
(8, 'Intel Core i9-11900K', 'Processor', 25000, 'CPU - INTEL - Core i9-11900K.png', 1, 'LGA1700'),
(9, 'Intel Core i9-12900K', 'Processor', 30000, 'CPU - INTEL - Core i9-12900K.png', 1, 'LGA1700'),
(10, 'Intel Core i7-11700K', 'Processor', 18500, 'CPU - INTEL - Core i7-11700K.png', 1, 'LGA1700'),
(11, 'Intel Core i5-11600K', 'Processor', 13000, 'CPU - INTEL - Core i5-11600K.png', 1, 'LGA1700'),
(12, 'Intel Core i3-10100', 'Processor', 7500, 'CPU - INTEL - Core i3-10100.png', 1, 'LGA1200'),
(13, 'Corsair RM750x', 'Wattage: 750W \r\nEfficiency Rating: 80 Plus Gold \r\nModular: Yes\r\n', 8500, 'PS-Corsair-RM750x.png', 3, NULL),
(14, 'EVGA SuperNOVA 650 G5 ', 'Wattage: 650W \r\nEfficiency Rating: 80 Plus Gold \r\nModular: Yes\r\n', 7200, 'PS-EGVA-SuperNOVA650G5.png', 3, NULL),
(15, 'Seasonic Focus GX-750 ', 'Wattage: 750W \r\nEfficiency Rating: 80 Plus Gold \r\nModular: Yes\r\n', 9000, 'PS-Seasonic-FocusGX-750.png', 3, NULL),
(16, 'Cooler Master MWE Gold 650 V2 ', 'Wattage: 650W \r\nEfficiency Rating: 80 Plus Gold \r\nModular: No \r\n', 5500, 'PS-CoolerMaster-MWEGold650V2.png', 3, NULL),
(17, 'Thermaltake  Toughpower GF1 750W ', 'Wattage: 750W \r\nEfficiency Rating: 80 Plus Gold \r\nModular: Yes \r\n', 8000, 'PS-Thermaltake-ToughpowerG1750W.png', 3, NULL),
(18, 'Seagate BarraCuda', 'Capacity: 1TB \r\nType: 3.5-inch \r\nSpeed: 7200 RPM P\r\n', 2000, 'HDD-Seagate-BarraCuda.png', 8, NULL),
(19, 'Western Digital (WD) Blue ', 'Capacity: 2TB \r\nType: 3.5-inch \r\nSpeed: 5400 RPM \r\n', 3000, 'HDD-WesternDigital-Blue.png', 8, NULL),
(20, 'Toshiba P300 ', 'Capacity: 1TB Type: 3.5-inch \r\nSpeed: 7200 RPM\r\n', 2200, 'HDD-Tohiba-P300.png', 8, NULL),
(21, 'Seagate IronWolf ', 'Capacity: 4TB \r\nType: 3.5-inch \r\nSpeed: 5900 RPM \r\n', 7000, 'HDD-Seagate-IronWolf.png', 8, NULL),
(22, 'Western Digital (WD) Black ', 'Capacity: 6TB \r\nType: 3.5-inch \r\nSpeed: 7200 RPM\r\n', 12000, 'HDD-WesternDigital-Black.png', 8, NULL),
(23, ' Samsung 970 EVO Plus', 'Capacity: 1TB \r\nType: NVMe \r\nInterface: PCIe Gen 3.0 x4 \r\n', 10500, 'SSD-Samsung-970EVOPlus.png', 8, NULL),
(24, ' Crucial MX500', 'Capacity: 500GB \r\nType: SATA \r\nInterface: SATA III (6 Gb/s) \r\n', 5200, 'SSD-Crucial-MX500.png', 8, NULL),
(25, 'Western Digital (WD)  Blue SN550', 'Capacity: 1TB \r\nType: NVMe \r\nInterface: PCIe Gen 3.0 x4 \r\n', 7800, 'SSD-WesternDigital-BlueSN550.png', 8, NULL),
(26, ' Kingston A2000 ', 'Capacity: 250GB \r\nType: NVMe \r\nInterface: PCIe Gen 3.0 x4\r\n', 3500, 'SSD-Kingston-A2000.png', 8, NULL),
(27, 'SanDisk Ultra 3D ', 'Capacity: 1TB \r\nType: SATA \r\nInterface: SATA III (6 Gb/s) \r\n', 8000, 'SSD-SanDisk-Ultra3D.png', 8, NULL),
(28, 'Corsair Vengeance LPX ', 'Capacity: 16GB (2 x 8GB) \r\nType: DDR4 \r\nSpeed: 3200MHz \r\n', 4500, 'RAM-Corsair-VengeanceLPX.png', 7, NULL),
(29, 'G.Skill Ripjaws V', 'Capacity: 32GB (2 x 16GB) \r\nType: DDR4 \r\nSpeed: 3600MHz\r\n', 9000, 'RAM-G.Skill-RipjawsV.png', 7, NULL),
(30, 'Kingston HyperX Fury  ', 'Capacity: 16GB (1 x 16GB) \r\nType: DDR4 Speed: 2666MHz\r\n', 3900, 'RAM-Kingstone_HyperXFury.png', 7, NULL),
(31, 'Crucial Ballistix', 'Capacity: 8GB (1 x 8GB) \r\nType: DDR4 \r\nSpeed: 2400MHz \r\n', 1950, 'RAM-Crucial-Ballistix.png', 7, NULL),
(32, ' TeamGroup T-Force Delta RGB', 'Capacity: 16GB (2 x 8GB) \r\nType: DDR4 \r\nSpeed: 3000MHz\r\n', 5000, 'RAM-TeamGroup-Ballistix.png', 7, NULL),
(33, 'Gigabyte A520I AC', 'Socket - AM4\r\nForm Factor - ITX', 6270, 'MB - AM4 - Gigabyte - A520I AC.png', 4, 'AM4'),
(34, 'Gigabyte B450M DS3H V2', 'Socket - AM4\r\nForm Factor - MATX', 4250, 'MB - AM4 - Gigabyte - B450M DS3H V2.png', 4, 'AM4'),
(35, 'Asus TUF B450M Pro II Gaming', 'Socket - AM4\r\nForm Factor - MATX\r\n', 5250, 'MB - AM4 - Asus - TUF B450M Pro II Gaming.png', 4, 'AM4'),
(36, 'Gigabyte B550M DS3H-AC', 'Socket - AM4\r\nForm Factor - MATX\r\n', 6085, 'MB - AM4 - Gigabyte - B550M DS3H AC.png', 4, 'AM4'),
(37, ' MSI B550M PRO-VDH WIFI', 'Socket - AM4\r\nForm Factor - MATX', 6300, 'MB - AM4 - MSI - B550M Pro VDH Wifi.png', 4, 'AM4'),
(38, 'Fractal Design Meshify C', 'Form factor - ATX Mid Tower\r\n', 4999, 'CASE - FRACTAL - Meshify C.png', 5, NULL),
(39, 'Cooler Master MasterBox Q300L', 'Form factor -  Micro ATX Mini Tower', 2499, 'CASE - COOLERMASTER - MasterBox Q300L.png', 5, NULL),
(40, 'Phanteks Eclipse P400A', 'ATX Mid Tower', 4499, 'CASE - PHANTEKS - Eclipse P400A.png', 5, NULL),
(41, 'ASUS Dual Radeon RX 6600 V2', '8GB VRAM Memory', 12995, 'GPU - AMD Asus - Radeon RX 6600.png', 2, NULL),
(42, 'GIGABYTE Radeon RX 6900 XT Gaming OC', '16GB VRAM Memory', 58950, 'GPU - AMD Gigabyte - Radeon RX 6900 XT Gaming OC.png', 2, NULL),
(43, 'MSI Radeon RX 6950 XT Gaming X Trio', '16GB VRAM Memory', 48850, 'GPU - AMD MSI - Radeon RX 6950 XT Gaming X Trio.png', 2, NULL),
(44, 'SAPPHIRE PULSE Radeon RX 6600', '8GB VRAM Memory', 12995, 'GPU - AMD Sapphire - Radeon RX 6600.png', 2, NULL),
(46, 'CoolerMaster Hyper 212 RGB Black Edition', 'Air Cooler', 3500, 'COOLER - COOLERMASTER- Hyper 212 RGB Black Edition.png', 6, NULL),
(47, 'NOCTUA NH-D15 Brown Air Cooler', 'Air Cooler', 5500, 'COOLER  - NOCTUA - NH-D15.png', 6, NULL),
(48, 'DEEPCOOL Gammaxx GT Air Cooler', 'Air Cooler', 2800, 'COOLER - DEEPCOOL - GAMMAXX GT.png', 6, NULL),
(49, 'NZXT Kraken X63 AIO Liquid Cooler', 'Air Cooler', 8000, 'COOLER - NZXT - Kraken X63.png', 6, NULL),
(50, 'AMD Ryzen 5 3600', 'Processor', 6500, 'CPU - AMD - AM4 - Ryzen 5 3600.png', 1, 'AM4'),
(51, 'AMD Ryzen 5 5600', 'Processor', 8500, 'CPU - AMD - AM4 - Ryzen 5 5600.png', 1, 'AM4'),
(52, 'AMD Ryzen 5 7600', 'Processor', 10500, 'CPU - AMD - AM5 - Ryzen 5 7600X.png', 1, 'AM5'),
(53, 'Gigabyte B760M', 'DDR5 LGA1700', 9000, 'MB - LGA1700 - Gigabyte - B760M H DDR4.png', 4, 'LGA1700'),
(54, 'Asus B650M', 'AM5 B650M', 11000, 'MB - AM5 - Asus - B650M Plus Wifi6.png', 4, 'AM5'),
(55, 'Gigabyte B650 Aorus Elite AX', 'Gigabyte B650 Aorus Elite AX AM5', 13000, 'MB - AM5 - Gigabyte - B650 Aorus Elite AX.png', 4, 'AM5'),
(56, 'test', 'details', 12345, 'brylle.png', 5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'test', 'test@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3'),
(2, 'brylle', 'test1@gmail.com', 'e9a2e3c9aebfa99f241b75c94b96c3a216e3cd48'),
(3, 'brylle', 'brylle@gmail.com', '056eafe7cf52220de2df36845b8ed170c67e23e3'),
(4, 'keihle', 'keihle@gmsil.com', 'd033e22ae348aeb5660fc2140aec35850c4da997');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_category` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
