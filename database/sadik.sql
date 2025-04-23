-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2025 at 05:52 AM
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
-- Database: `sadik`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `SN` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`SN`, `email`, `password`) VALUES
(1, 'admin@gmail.com', '1122');

-- --------------------------------------------------------

--
-- Table structure for table `arrival_entries`
--

CREATE TABLE `arrival_entries` (
  `entry_id` int(11) NOT NULL,
  `quantity_received` int(11) NOT NULL,
  `quantitylifted` int(11) NOT NULL,
  `station_id` varchar(11) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `dateofentry` datetime NOT NULL,
  `product` varchar(100) NOT NULL,
  `tanker` varchar(100) NOT NULL,
  `shortage` int(11) NOT NULL,
  `driver_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `arrival_entries`
--

INSERT INTO `arrival_entries` (`entry_id`, `quantity_received`, `quantitylifted`, `station_id`, `status`, `dateofentry`, `product`, `tanker`, `shortage`, `driver_name`) VALUES
(2, -56, 887, 'S002', 'Active', '2015-04-11 00:00:00', 'Keroseine', 'ABJ78YH9', 502, 'ABJ78YH9'),
(3, -56, 906, 'S002', 'Active', '1985-09-17 00:00:00', 'Keroseine', 'ABJ09999', 75, 'ABJ09999'),
(4, 967, 328, 'S002', '', '1970-06-26 00:00:00', 'Gas', 'ABJ09999', -639, 'ABJ09999');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `SN` int(11) NOT NULL,
  `employee_id` varchar(50) NOT NULL,
  `surname` varchar(60) NOT NULL,
  `othername` varchar(50) NOT NULL,
  `role` varchar(45) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `salary` varchar(100) NOT NULL,
  `phonenumber` varchar(20) NOT NULL,
  `address` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `religion` varchar(50) NOT NULL,
  `state_origin` varchar(50) NOT NULL,
  `local` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`SN`, `employee_id`, `surname`, `othername`, `role`, `sex`, `salary`, `phonenumber`, `address`, `email`, `dob`, `religion`, `state_origin`, `local`) VALUES
(1, 'E001', 'John', 'Michael', 'Driver', 'male', '50000', '048904009', 'No:356', 'john@gmail.com', '2022-05-11', 'christianity', 'crossriver', 'cala'),
(2, 'E002', 'Jerry', 'Michael', 'Driver', 'male', '50000', '048904009', 'No:6 nabi', 'jerry@gmail.com', '2022-05-25', 'christianity', 'delta', 'cala'),
(3, 'E003', 'Zainab', 'idii', 'Security', 'female', '30000', '048904009', 'No:6 nabi', 'zayny@gmail.com', '2022-05-25', 'islam', 'kaduna', 'kd north'),
(4, 'E004', 'Abdul', 'Sani', 'Driver', 'male', '30000', '0903900920', 'No12: Gam', 'abdul@gmail.com', '2022-05-12', 'christianity', 'ebonyi', 'Gawu'),
(6, 'E005', 'Aisha', 'saad', 'Driver', 'female', '200000', '09038399299', '7hdhdj', 'aisha@gmail.com', '2022-06-08', 'islam', 'bauchi', 'Ash'),
(7, 'www', 'kk', 'm', 'Security', 'female', '88', '099', 'yy', 'bbb@bb.bb', '2024-06-01', 'islam', 'ekiti', ',,'),
(10, '756', 'qyqegute', 'zivefuv', 'Others', 'male', 'Incidunt cupidatat ', '080582553284', 'Voluptas hic tempora', 'tekewev@mailinator.com', '2015-08-01', 'christianity', 'Ondo', 'Akure South');

-- --------------------------------------------------------

--
-- Table structure for table `gas_sales`
--

CREATE TABLE `gas_sales` (
  `SN` int(11) NOT NULL,
  `station_id` varchar(100) NOT NULL,
  `litre_sold` int(100) NOT NULL,
  `litre_price` int(100) NOT NULL,
  `total_sales` int(100) NOT NULL,
  `available_litre` int(100) NOT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gas_sales`
--

INSERT INTO `gas_sales` (`SN`, `station_id`, `litre_sold`, `litre_price`, `total_sales`, `available_litre`, `date`) VALUES
(1, 'S002', 222, 230, 51060, 1111, '1111-11-22 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE `maintenance` (
  `SN` int(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `maintenancemanager_id` varchar(50) NOT NULL,
  `employee_name` varchar(60) NOT NULL,
  `date` varchar(15) NOT NULL,
  `car_number` varchar(45) NOT NULL,
  `problem` varchar(45) NOT NULL,
  `others` varchar(45) NOT NULL,
  `quantity` int(20) NOT NULL,
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`SN`, `email`, `maintenancemanager_id`, `employee_name`, `date`, `car_number`, `problem`, `others`, `quantity`, `status`) VALUES
(1, 'acid@gmail.com', 'MM001', 'Jerry', '2022-05-27', 'Ty09kn', 'tires', 'nill', 0, 'Bad'),
(2, '', 'MM001', 'John', '2022-05-18', 'TY77g', 'Tires', 'Oil', 0, 'Bad'),
(3, '', 'MM001', 'John', '2022-06-05', 'Tyr55lk', '---Select---', 'Nil', 1, 'In-Maintenance'),
(4, '', 'MM001', 'John', '2022-06-10', 'nil', '', 'Nil', 2, 'Good'),
(5, '', 'MM001', 'John', '2022-06-03', 'e', 'Engine', 'gg', 2, 'Good'),
(6, '', '139', 'Zainab', '1993-03-27', 'Non omnis possimus ', 'Engine', 'Aliquid odit nobis v', 650, 'In-Maintenance'),
(7, '', '806', 'John', '2023-12-05', 'Asperiores adipisici', 'Tires', 'Voluptatem quam cons', 194, 'Bad'),
(8, '', '806', 'Aisha', '1974-09-25', 'Pariatur Voluptatem', 'Pump', 'Nesciunt suscipit q', 823, 'Good'),
(9, '', '806', 'Abdul', '1984-06-24', 'Sit molestiae esse ', 'Engine Oil', 'A sit deserunt enim', 836, 'Good'),
(10, '', '806', 'Zainab', '1990-03-13', 'Iusto et voluptate q', 'Driving Shaft', 'Non aute sapiente ut', 895, 'Bad'),
(11, '', '806', 'Zainab', '1990-03-13', 'Iusto et voluptate q', 'Driving Shaft', 'Non aute sapiente ut', 895, 'Bad');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_manager`
--

CREATE TABLE `maintenance_manager` (
  `ID` int(50) NOT NULL,
  `maintenancemanager_id` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `othername` varchar(50) NOT NULL,
  `sex` varchar(7) NOT NULL,
  `dob` varchar(15) NOT NULL,
  `state_origin` varchar(30) NOT NULL,
  `local` varchar(50) NOT NULL,
  `religion` varchar(15) NOT NULL,
  `phonenumber` varchar(16) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `maintenance_manager`
--

INSERT INTO `maintenance_manager` (`ID`, `maintenancemanager_id`, `surname`, `othername`, `sex`, `dob`, `state_origin`, `local`, `religion`, `phonenumber`, `email`, `password`) VALUES
(1, 'MM001', 'Muhammed', 'Isa', 'male', '2022-05-11', 'bauchi', 'Local', 'islam', '09490050', 'isa@gmail.com', 'b59c67bf196a4758191e42f76670ceba'),
(2, 'mm', 'kk', 'yy', 'male', '2024-05-15', 'delta', ',,', 'islam', '00', 'yusufsaiduabdullahi2020@gmail.com', 'kk'),
(3, '139', 'tukara', 'gigikig', 'male', '2008-09-14', 'Ekiti', 'Gbonyin', 'others', '080985918615', 'sadik@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(4, '806', 'hyfumal', 'luqoz', 'female', '1978-10-07', 'Ogun', 'Imeko Afon', 'islam', '080682631266', 'acid@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `petrol_sales`
--

CREATE TABLE `petrol_sales` (
  `SN` int(11) NOT NULL,
  `station_id` varchar(100) NOT NULL,
  `litre_sold` int(100) NOT NULL,
  `litre_price` int(100) NOT NULL,
  `total_sales` int(100) NOT NULL,
  `available_litre` int(100) NOT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `petrol_sales`
--

INSERT INTO `petrol_sales` (`SN`, `station_id`, `litre_sold`, `litre_price`, `total_sales`, `available_litre`, `date`) VALUES
(1, 'S002', 243, 148, 35964, 31, '1979-11-23 00:00:00'),
(2, 'S002', 87, 148, 12876, -56, '2012-08-06 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `stations`
--

CREATE TABLE `stations` (
  `SN` int(50) NOT NULL,
  `station_id` varchar(17) NOT NULL,
  `address` varchar(100) NOT NULL,
  `petrol_price` double NOT NULL,
  `gas_price` double NOT NULL,
  `station_category` varchar(45) NOT NULL,
  `trn_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stations`
--

INSERT INTO `stations` (`SN`, `station_id`, `address`, `petrol_price`, `gas_price`, `station_category`, `trn_date`) VALUES
(5, '11', 'gb', 0, 0, 'NNPC', '2024-05-17 05:53:03'),
(8, 'ACID', 'Numan', 200, 400, 'BUNGEL NIG LTD', '2025-04-23 03:54:39'),
(2, 'S002', 'Yola', 148, 230, 'MRS', '2022-05-28 03:47:44'),
(1, 'sadik@gmail.com', 'Abuja', 145, 230, 'NNPC', '2022-05-28 03:47:19');

-- --------------------------------------------------------

--
-- Table structure for table `station_expenses`
--

CREATE TABLE `station_expenses` (
  `expense_id` int(100) NOT NULL,
  `station_id` varchar(100) NOT NULL,
  `expense_description` varchar(50) NOT NULL,
  `liter_amount` varchar(100) NOT NULL,
  `liter_price` varchar(20) NOT NULL,
  `total_expense` varchar(400) NOT NULL,
  `expensedate` date NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `station_expenses`
--

INSERT INTO `station_expenses` (`expense_id`, `station_id`, `expense_description`, `liter_amount`, `liter_price`, `total_expense`, `expensedate`, `category`) VALUES
(1, 'S001', 'Samaila', '20', '', '2900', '2022-05-29', 'Petrol'),
(2, 'S001', 'Dady', '40', '', '5800', '2022-05-31', 'Petrol'),
(3, 'S001', 'Dady', '40', '', '5800', '2022-05-31', 'Petrol'),
(4, 'S001', 'idris', '45', '145', '6525', '2022-05-26', 'Petrol'),
(5, 'S001', 'idris', '30', '230', '6900', '2022-05-24', 'Gas'),
(6, 'S001', '222', '23', '230', '5290', '2022-05-10', 'Gas'),
(7, 'Admin', 'Ge', '23', '145', '45667', '2022-06-15', 'Gas'),
(8, 'S002', 'ohh', '30', '230', '6900', '2022-06-08', 'Gas'),
(9, 'S002', '988', '8990', '230', 'NaN', '2022-06-08', 'Gas'),
(10, 'S002', 'Officia accusamus fu', '28', '230', '6440', '1971-07-01', 'Gas');

-- --------------------------------------------------------

--
-- Table structure for table `station_manager`
--

CREATE TABLE `station_manager` (
  `ID` int(50) NOT NULL,
  `employee_id` varchar(45) NOT NULL,
  `station_id` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `othername` varchar(50) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `state_origin` varchar(20) NOT NULL,
  `local_government` varchar(60) NOT NULL,
  `religion` varchar(15) NOT NULL,
  `phonenumber` varchar(16) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `station_manager`
--

INSERT INTO `station_manager` (`ID`, `employee_id`, `station_id`, `surname`, `othername`, `sex`, `dob`, `state_origin`, `local_government`, `religion`, `phonenumber`, `email`, `password`) VALUES
(2, 'SM002', 'S002', 'Zara', 'Usman', 'female', '2022-05-19', 'taraba', 'Jenge', 'islam', '0805950059', 'zara@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(5, 'SM003', 'S003', 'Sakina', 'Umar', 'female', '2022-06-14', 'Adamawa', 'Mubi', 'islam', '090938399392', 'sakina@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(9, '487', 'ACID', 'Kabri', 'Acid', 'male', '2012-09-07', 'Gombe', 'Akko', 'islam', '080594674743', 'kabriacid@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `tankers`
--

CREATE TABLE `tankers` (
  `SN` int(11) NOT NULL,
  `driver_name` varchar(60) NOT NULL,
  `tanker_number` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL,
  `employee_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tankers`
--

INSERT INTO `tankers` (`SN`, `driver_name`, `tanker_number`, `status`, `employee_id`) VALUES
(1, 'Isa', 'ABJ78YH9', 'Available', 'E002'),
(3, 'Idris', 'YOL78W5', 'Available', 'E001'),
(5, 'E004', 'Ty98086', 'Available', 'E004'),
(16, 'E005', 'ABJ09999', 'Available', 'E005'),
(17, 'E001', '22', 'Available', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`SN`);

--
-- Indexes for table `arrival_entries`
--
ALTER TABLE `arrival_entries`
  ADD PRIMARY KEY (`entry_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`SN`),
  ADD UNIQUE KEY `employee_id` (`employee_id`);

--
-- Indexes for table `gas_sales`
--
ALTER TABLE `gas_sales`
  ADD PRIMARY KEY (`SN`);

--
-- Indexes for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD UNIQUE KEY `SN` (`SN`);

--
-- Indexes for table `maintenance_manager`
--
ALTER TABLE `maintenance_manager`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `employee_id` (`maintenancemanager_id`) USING BTREE,
  ADD UNIQUE KEY `maintenancemanager_id` (`maintenancemanager_id`);

--
-- Indexes for table `petrol_sales`
--
ALTER TABLE `petrol_sales`
  ADD PRIMARY KEY (`SN`);

--
-- Indexes for table `stations`
--
ALTER TABLE `stations`
  ADD PRIMARY KEY (`station_id`),
  ADD UNIQUE KEY `SN` (`SN`);

--
-- Indexes for table `station_expenses`
--
ALTER TABLE `station_expenses`
  ADD PRIMARY KEY (`expense_id`) USING BTREE;

--
-- Indexes for table `station_manager`
--
ALTER TABLE `station_manager`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `station_id` (`station_id`),
  ADD UNIQUE KEY `employee_id` (`employee_id`);

--
-- Indexes for table `tankers`
--
ALTER TABLE `tankers`
  ADD PRIMARY KEY (`SN`),
  ADD UNIQUE KEY `tanker_number` (`tanker_number`),
  ADD UNIQUE KEY `employee_id` (`employee_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `SN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `arrival_entries`
--
ALTER TABLE `arrival_entries`
  MODIFY `entry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `SN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `gas_sales`
--
ALTER TABLE `gas_sales`
  MODIFY `SN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `SN` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `maintenance_manager`
--
ALTER TABLE `maintenance_manager`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `petrol_sales`
--
ALTER TABLE `petrol_sales`
  MODIFY `SN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stations`
--
ALTER TABLE `stations`
  MODIFY `SN` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `station_expenses`
--
ALTER TABLE `station_expenses`
  MODIFY `expense_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `station_manager`
--
ALTER TABLE `station_manager`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tankers`
--
ALTER TABLE `tankers`
  MODIFY `SN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
