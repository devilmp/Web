-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2015 at 02:20 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project_lotteria`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `spDeleteCustomerUser`(IN `cus` VARCHAR(50), OUT `result` INT)
Begin
	Declare acc varchar(50);
	Do SLEEP(2);
    START TRANSACTION;
    SET SESSION TRANSACTION ISOLATION LEVEL SERIALIZABLE;
    select Acc_Name into acc from customer where cus_id = cus;
    delete from customer where cus_id = cus;
    set result = ROW_COUNT();
    if result > 0 then 
    begin
    	delete from account where acc_name = acc;
    	set result = ROW_COUNT();
        if result > 0 then commit;
        else rollback;
        end if;
    end;
    else rollback;
    end if;
End$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spDeleteOrder`(IN `order_id` BIGINT, OUT `result` INT)
Begin
	Do SLEEP(1);
    START TRANSACTION;
    SET SESSION TRANSACTION ISOLATION LEVEL SERIALIZABLE;
    delete from delivery_information where ord_id = order_id;
    set result = ROW_COUNT();
    if result > 0 then
    begin
    	delete from orders_details where ord_id = order_id;
        delete from orders where ord_id = order_id;
        set result = ROW_COUNT();
        if result > 0 then commit;
        else rollback;
        end if;
    end;
    else rollback;
    end if;
End$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spDeleteUser`(IN `emp` VARCHAR(50), OUT `result` INT)
Begin
	Declare acc varchar(50);
	Do SLEEP(2);
    START TRANSACTION;
    SET SESSION TRANSACTION ISOLATION LEVEL SERIALIZABLE;
    select Acc_Name into acc from employee where emp_id = emp;
    delete from employee where emp_id = emp;
    set result = ROW_COUNT();
    if result > 0 then 
    begin
    	delete from account where acc_name = acc;
    	set result = ROW_COUNT();
        if result > 0 then commit;
        else rollback;
        end if;
    end;
    else rollback;
    end if;
End$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spLogIn`(IN `username` VARCHAR(50), IN `pass` VARCHAR(1000), OUT `result` INT)
Begin
	Do SLEEP(5);
    START TRANSACTION;
    SET SESSION TRANSACTION ISOLATION LEVEL SERIALIZABLE;
    update account set acc_status = 1 where acc_name = username and acc_password = pass and acc_status = 0;
    set result = ROW_COUNT();
    if result > 0 then 
    begin
    	select ur_id into result from account where acc_name = username and acc_password = pass;
        commit;
    end;
    else
    begin
    	if not exists(select * from account where acc_name = username and 			acc_password = pass) then set result = -1;
        else set result = 0;
        end if;
    	rollback;
    end;
    end if;
End$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spLogOut`(IN `username` VARCHAR(50), OUT `result` INT)
Begin
	Do SLEEP(2);
    START TRANSACTION;
    SET SESSION TRANSACTION ISOLATION LEVEL SERIALIZABLE;
    update account set acc_status = 0 where acc_name = username and acc_status = 1;
    set result = ROW_COUNT();
    if result > 0 then COMMIT;
    else rollback;
    end if;
End$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spOrderDetails`(IN `number` INT, IN `order_id` BIGINT, IN `meal_id` BIGINT, OUT `result` BIT)
BEGIN 
	DECLARE vGia int;
	Do SLEEP(5);
    START TRANSACTION;
    SET SESSION TRANSACTION ISOLATION LEVEL SERIALIZABLE;
	update meal set m_stock = m_stock - number where m_id = meal_id and m_stock >= number;
	 set result = ROW_COUNT();
    if result > 0 then
    begin
    	insert into orders_details(m_id, od_quantities, ord_id) values (meal_id, number, order_id);
        select m_price into vGia from meal where m_id = meal_id;
        update orders set ord_cost = ord_cost + number*vGia 
        where ord_id = order_id;
        set result = 1;
        COMMIT;
    end;
    else
    begin
    	 set result = 0;
         rollback;
    end;
    end if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spSignIn`(IN `username` VARCHAR(50), IN `pass` VARCHAR(1000), OUT `result` INT)
BEGIN
	Do SLEEP(5);
    START TRANSACTION;
    SET SESSION TRANSACTION ISOLATION LEVEL SERIALIZABLE;
    if not exists(select * from account where acc_name = username) then
    begin
    	insert into account(acc_name, acc_password, ur_id, acc_status) values 
        (username, pass, 6, 0);
        set result = ROW_COUNT();
        COMMIT;
    end;
    else
    begin
    	set result = 0;
        ROLLBACK;
    end;
    end if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spUpdateMealStock`(IN `meal_id` BIGINT, IN `ammount` BIGINT, OUT `result` INT)
Begin
	Do SLEEP(5);
    START TRANSACTION;
    SET SESSION TRANSACTION ISOLATION LEVEL SERIALIZABLE;
    update meal set m_stock = ammount where m_id = meal_id;
    set result = ROW_COUNT();
    if result > 0 then commit;
    else rollback;
    end if;
End$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `Acc_Name` varchar(50) NOT NULL,
  `Acc_Password` varchar(1000) DEFAULT NULL,
  `UR_ID` bigint(20) DEFAULT NULL,
  `Acc_Manager_ID` varchar(50) DEFAULT NULL,
  `Acc_Status` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`Acc_Name`, `Acc_Password`, `UR_ID`, `Acc_Manager_ID`, `Acc_Status`) VALUES
('ArticleAdmin', 'password', 4, NULL, b'0'),
('duyphuong', '123', 6, NULL, b'0'),
('KhonNanCongKhai', 'password', 6, NULL, b'0'),
('MealAdmin', 'password', 2, NULL, b'0'),
('OrderInvoiceAdmin', 'password', 3, NULL, b'0'),
('TechnicalAdmin', 'password', 5, NULL, b'0'),
('System', 'password5126@@', 1, NULL, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE IF NOT EXISTS `areas` (
  `Area_ID` int(11) NOT NULL,
  `Area_Name` varchar(100) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`Area_ID`, `Area_Name`) VALUES
(1, 'Bình Dương'),
(2, 'Cần Thơ'),
(3, 'Đồng Nai'),
(4, 'Tp Hồ Chí Minh');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `Art_ID` bigint(20) NOT NULL,
  `AG_ID` bit(1) DEFAULT NULL,
  `Emp_ID` bigint(20) DEFAULT NULL,
  `Art_Date` date DEFAULT NULL,
  `Art_Title` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Art_Sub_Title` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `Art_Content` text,
  `Art_Image` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `articles_images`
--

CREATE TABLE IF NOT EXISTS `articles_images` (
  `Art_ID` bigint(20) NOT NULL DEFAULT '0',
  `AI_Image` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `article_groups`
--

CREATE TABLE IF NOT EXISTS `article_groups` (
  `AG_ID` bit(1) NOT NULL,
  `AG_Name` varchar(50) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `Cus_ID` bigint(20) NOT NULL,
  `Cus_Name` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Cus_Birthday` date DEFAULT NULL,
  `Cus_Gender` bit(1) DEFAULT NULL,
  `Cus_Address` text,
  `SA_ID` int(11) DEFAULT NULL,
  `Area_ID` int(11) DEFAULT NULL,
  `Cus_Phone` char(20) DEFAULT NULL,
  `Cus_Email` varchar(100) DEFAULT NULL,
  `Cus_JoinDate` date DEFAULT NULL,
  `Cus_ID_Card` char(30) DEFAULT NULL,
  `Cus_Message` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `Cus_ID_Card_ReceiveMethod` bit(1) DEFAULT NULL,
  `Acc_Name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Cus_ID`, `Cus_Name`, `Cus_Birthday`, `Cus_Gender`, `Cus_Address`, `SA_ID`, `Area_ID`, `Cus_Phone`, `Cus_Email`, `Cus_JoinDate`, `Cus_ID_Card`, `Cus_Message`, `Cus_ID_Card_ReceiveMethod`, `Acc_Name`) VALUES
(0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1, 'Duy Phương', '1994-09-20', b'1', 'p Tân Biên', NULL, NULL, '01286200963', 'phuong@gmail.com', NULL, NULL, 'abc', b'1', 'KhonNanCongKhai'),
(2, 'Duy Phương', '2015-06-24', b'1', 'p Tân Biên', NULL, NULL, '01286200963', 'phuong@gmail.com', NULL, NULL, 'abc', b'1', 'SB.KhonNanCongKhai'),
(3, 'A Phương', '2015-06-25', b'1', 'p Tân Biên', NULL, NULL, '123456', 'phuong@gmail.com', NULL, NULL, 'abc', b'1', 'SB.KhonNanCongKhai');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_information`
--

CREATE TABLE IF NOT EXISTS `delivery_information` (
  `Ord_ID` bigint(20) NOT NULL DEFAULT '0',
  `Del_Name` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `Del_Phone` char(20) DEFAULT NULL,
  `Del_Email` varchar(100) DEFAULT NULL,
  `Del_Address` text,
  `SA_ID` int(11) DEFAULT NULL,
  `Area_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery_information`
--

INSERT INTO `delivery_information` (`Ord_ID`, `Del_Name`, `Del_Phone`, `Del_Email`, `Del_Address`, `SA_ID`, `Area_ID`) VALUES
(1, 'A Tâm', '123456', '', 'UIT', 42, 4),
(2, 'Duy Phương', '01286200963', '', 'p Tân Biên', 19, 3),
(3, 'phương', '01286200963', '', 'p Tân Biên', 19, 3),
(4, 'Quốc gay', '123456', '', 'UIT', 3, 1),
(5, 'abc', '123', '', 'xyz', 19, 3),
(6, 'Duy Phương', '01286200963', '', 'UIT', 19, 3),
(7, 'Duy Phương', '01286200963', '', 'p Tân Biên', 19, 3),
(8, 'A Phương', '01286200963', '', 'p Tân Biên', 19, 3),
(9, 'A Trí', '123456', '', 'UIT', 30, 4),
(10, 'Duy Phương', '01286200963', '', 'p Tân Biên', 19, 3);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `Emp_ID` bigint(20) NOT NULL,
  `Emp_Name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `Emp_Gender` bit(1) DEFAULT NULL,
  `Emp_Birthday` date DEFAULT NULL,
  `SA_ID` int(11) DEFAULT NULL,
  `Area_ID` int(11) DEFAULT NULL,
  `Emp_Address` text,
  `Emp_Phone` char(20) DEFAULT NULL,
  `Emp_JoinDate` date DEFAULT NULL,
  `J_ID` char(8) DEFAULT NULL,
  `Acc_Name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Emp_ID`, `Emp_Name`, `Emp_Gender`, `Emp_Birthday`, `SA_ID`, `Area_ID`, `Emp_Address`, `Emp_Phone`, `Emp_JoinDate`, `J_ID`, `Acc_Name`) VALUES
(1, 'Sys', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'System'),
(2, 'Meal Admin', b'0', '0000-00-00', 19, 3, 'p Tân Biên', '123456', NULL, NULL, 'MealAdmin'),
(3, 'Order Invoice Admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'OrderInvoiceAdmin'),
(4, 'Article Admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ArticleAdmin');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE IF NOT EXISTS `invoices` (
  `Inv_ID` bigint(20) NOT NULL,
  `Ord_ID` bigint(20) DEFAULT NULL,
  `Emp_ID` bigint(20) DEFAULT NULL,
  `Inv_Cost` mediumtext,
  `Inv_Date` date DEFAULT NULL,
  `Inv_Status` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`Inv_ID`, `Ord_ID`, `Emp_ID`, `Inv_Cost`, `Inv_Date`, `Inv_Status`) VALUES
(1, 1, 1, '169000', '2015-05-23', b'1'),
(2, 2, 1, '507000', '2015-05-23', b'1'),
(3, 3, 1, '338000', '2015-05-23', b'1'),
(4, 4, 1, '260000', '2015-05-24', b'0'),
(5, 7, 1, '70000', '2015-05-26', b'0'),
(6, 8, 1, '48000', '2015-06-01', b'0'),
(7, 9, 1, '96000', '2015-06-02', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE IF NOT EXISTS `job` (
  `J_ID` char(8) NOT NULL,
  `J_Name` varchar(60) DEFAULT NULL,
  `J_Description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `meal`
--

CREATE TABLE IF NOT EXISTS `meal` (
  `M_ID` bigint(20) NOT NULL,
  `M_Name` varchar(50) CHARACTER SET utf32 COLLATE utf32_unicode_ci DEFAULT NULL,
  `MG_ID` char(4) DEFAULT NULL,
  `M_Price` mediumtext,
  `M_Image` varchar(1000) DEFAULT NULL,
  `M_Description` text,
  `M_Stock` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meal`
--

INSERT INTO `meal` (`M_ID`, `M_Name`, `MG_ID`, `M_Price`, `M_Image`, `M_Description`, `M_Stock`) VALUES
(1, 'Cheese Pizza (8 miếng 12 cm)', '1', '169000', 'image/Menu/Hamburger/cheese-pizza(8-mieng-12-30-cm).png', '', 100),
(2, 'Bulgogi Pizza (8 miếng 12"30 cm)', '1', '169000', 'image/Menu/Hamburger/bulgogi-pizza(8-mieng-12-30-cm).png', NULL, 100),
(3, 'Big star', '1', '48000', 'image/Menu/Hamburger/big-star.png', '', 100),
(4, 'Double Bulgogi', '1', '46000', 'image/Menu/Hamburger/double-bulgogi.png', NULL, 100),
(5, 'Double Cheese', '1', '45000', 'image/Menu/Hamburger/double-cheese.png', NULL, 100),
(6, 'Gà rán (1 miếng)', '2', '32000', 'image/Menu/Chicken/ga-ran-1-mieng.png', NULL, 100),
(7, 'Gà H&S Soybean (1 miếng)', '2', '32000', 'image/Menu/Chicken/ga-h-s-soy-bean-1-mieng.png', NULL, 100),
(8, 'Gà rán phần', '2', '76000', 'image/Menu/Chicken/ga-ran-phan.png', NULL, 100),
(9, 'Gà H&S Soybean phần', '2', '78000', 'image/Menu/Chicken/ga-h-s-soy-bean-phan.png', NULL, 100),
(10, 'Finger Chicken (200 g)', '2', '35000', 'image/Menu/Chicken/finger-chicken-200-g.png', NULL, 100),
(11, 'Big-star combo', '3', '76000', 'image/Menu/Combo/big-star.png', NULL, 100),
(12, 'Bulgogi combo', '3', '64000', 'image/Menu/Combo/bulgogi-combo.png', NULL, 100),
(13, 'Shrimp combo', '3', '66000', 'image/Menu/Combo/shrimp-combo.png', NULL, 100),
(14, 'Grill chicken combo', '3', '66000', 'image/Menu/Combo/grilled-chicken-combo.png', NULL, 100),
(15, 'Cheese combo', '2', '58000', 'image/Menu/Combo/cheese-combo.png', '', 100),
(16, 'Khoai tây lắc', '4', '35000', 'image/Menu/Dessert/khoai-tay-lac.png', NULL, 100),
(17, 'Gà lắc', '4', '36000', 'image/Menu/Dessert/ga-lac.png', NULL, 100),
(18, 'Phô mai que', '4', '28000', 'image/Menu/Dessert/pho-mai-que.png', NULL, 100),
(19, 'Mực rán (3 miếng)', '4', '25000', 'image/Menu/Dessert/muc-ran-3-mieng.png', NULL, 100),
(20, 'Mực rán (5 miếng)', '4', '35000', 'image/Menu/Dessert/muc-ran-5-mieng.png', NULL, 100),
(21, 'Nước cam', '5', '22000', 'image/Menu/Drink/nuoc-cam.png', NULL, 100),
(22, 'Nước chanh', '5', '17000', 'image/Menu/Drink/nuoc-chanh.png', NULL, 100),
(23, 'Cà phê đá', '5', '15000', 'image/Menu/Drink/ca-phe-da.png', NULL, 100),
(24, 'Milk cacao', '5', '18000', 'image/Menu/Drink/milk-cacao.png', NULL, 100),
(25, 'Nestea', '5', '15000', 'image/Menu/Drink/nestea.png', NULL, 100),
(26, 'Bulgogi value', '6', '70000', 'image/Menu/Value/bulgogi-value.png', NULL, 100),
(27, 'Cheese value', '6', '64000', 'image/Menu/Value/cheese-value.png', NULL, 100),
(28, 'Grilled chicken value', '6', '72000', 'image/Menu/Value/grilled-chicken-value.png', NULL, 100),
(33, 'Teriyaki burger', '7', '15000', 'image/Menu/Happy/teriyaki-burger.png', NULL, 100),
(34, 'Cheese egg burger', '7', '20000', 'image/Menu/Happy/cheese-egg-burger.png', NULL, 100),
(35, 'Fish burger', '7', '20000', 'image/Menu/Happy/fish-burger.png', NULL, 100),
(36, 'Cơm thịt heo chiên', '8', '45000', 'image/Menu/Rice/com-thit-heo-chien.png', NULL, 100),
(37, 'Cơm gà viên', '8', '40000', 'image/Menu/Rice/com-ga-vien.png', NULL, 100),
(38, 'Cơm gà sốt đậu', '8', '40000', 'image/Menu/Rice/com-ga-sot-dau.png', NULL, 100),
(39, 'Cơm thịt bò', '8', '38000', 'image/Menu/Rice/com-thit-bo.png', NULL, 100),
(40, 'Súp', '8', '12000', 'image/Menu/Rice/sup.png', NULL, 100);

-- --------------------------------------------------------

--
-- Table structure for table `mealgroup`
--

CREATE TABLE IF NOT EXISTS `mealgroup` (
  `MG_ID` char(4) NOT NULL,
  `MG_Name` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `MG_Name_ENG` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `MG_FolderImage` varchar(1000) DEFAULT NULL,
  `MG_Image` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mealgroup`
--

INSERT INTO `mealgroup` (`MG_ID`, `MG_Name`, `MG_Name_ENG`, `MG_FolderImage`, `MG_Image`) VALUES
('1', 'HAMBURGER', 'HAMBURGER', 'image/Menu/Hamburger', 'images/Menu/hamburger.png'),
('2', 'GÀ', 'CHICKEN', 'image/Menu/Chicken', 'images/Menu/chicken.png'),
('3', 'COMBO', 'COMBO', 'image/Menu/Combo', 'images/Menu/combo.png'),
('4', 'TRÁNG MIỆNG', 'DESSERT', 'image/Menu/Dessert', 'images/Menu/dessert.png'),
('5', 'NƯỚC UỐNG', 'DRINK', 'image/Menu/Drink', 'images/Menu/drink.png'),
('6', 'VALUE', 'VALUE', 'image/Menu/Value', 'images/Menu/value.png'),
('7', 'HAPPY', 'HAPPY', 'image/Menu/Happy', 'images/Menu/happymenu.png'),
('8', 'CƠM', 'RICE', 'image/Menu/Rice', 'images/Menu/rice.png');

-- --------------------------------------------------------

--
-- Table structure for table `mealgroupimageui`
--

CREATE TABLE IF NOT EXISTS `mealgroupimageui` (
  `MGUI_ID` char(4) NOT NULL,
  `MGUI_Image` varchar(1000) DEFAULT NULL,
  `MG_ID` char(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mealgroupimageui`
--

INSERT INTO `mealgroupimageui` (`MGUI_ID`, `MGUI_Image`, `MG_ID`) VALUES
('1', 'image/Menu/Hamburger/hamburger_01.png', '1'),
('10', 'image/Menu/Combo/combo_02.png', '3'),
('11', 'image/Menu/Combo/combo_03.png', '3'),
('12', 'image/Menu/Combo/combo_04.png', '3'),
('13', 'image/Menu/Dessert/dessert_01.png', '4'),
('14', 'image/Menu/Dessert/dessert_02.png', '4'),
('15', 'image/Menu/Dessert/dessert_03.png', '4'),
('16', 'image/Menu/Dessert/dessert_04.png', '4'),
('17', 'image/Menu/Drink/drink_01.png', '5'),
('18', 'image/Menu/Drink/drink_02.png', '5'),
('19', 'image/Menu/Drink/drink_03.png', '5'),
('2', 'image/Menu/Hamburger/hamburger_02.png', '1'),
('20', 'image/Menu/Value/value_01.png', '6'),
('21', 'image/Menu/Value/value_02.png', '6'),
('22', 'image/Menu/Value/value_03.png', '6'),
('23', 'image/Menu/Happy/happy_01.png', '7'),
('24', 'image/Menu/Happy/happy_02.png', '7'),
('25', 'image/Menu/Happy/happy_03.png', '7'),
('26', 'image/Menu/Happy/happy_04.png', '7'),
('27', 'image/Menu/Happy/happy_05.png', '7'),
('28', 'image/Menu/Rice/rice_01.png', '8'),
('29', 'image/Menu/Rice/rice_02.png', '8'),
('3', 'image/Menu/Hamburger/hamburger_03.png', '1'),
('30', 'image/Menu/Rice/rice_03.png', '8'),
('31', 'image/Menu/Rice/rice_04.png', '8'),
('4', 'image/Menu/Hamburger/hamburger_04.png', '1'),
('5', 'image/Menu/Chicken/chicken_01.png', '2'),
('6', 'image/Menu/Chicken/chicken_02.png', '2'),
('7', 'image/Menu/Chicken/chicken_03.png', '2'),
('8', 'image/Menu/Chicken/chicken_04.png', '2'),
('9', 'image/Menu/Combo/combo_01.png', '3');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `Ord_ID` bigint(20) NOT NULL,
  `Cus_ID` bigint(20) DEFAULT NULL,
  `Ord_Date` date DEFAULT NULL,
  `Ord_Cost` bigint(20) DEFAULT NULL,
  `Ord_Status` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Ord_ID`, `Cus_ID`, `Ord_Date`, `Ord_Cost`, `Ord_Status`) VALUES
(1, 0, '2015-05-23', 169000, b'1'),
(2, 0, '2015-05-23', 507000, b'1'),
(3, 0, '2015-05-23', 338000, b'1'),
(4, 0, '2015-05-24', 260000, b'1'),
(5, 0, '2015-05-26', 70000, b'0'),
(6, 0, '2015-05-26', 0, b'0'),
(7, 0, '2015-05-26', 70000, b'1'),
(8, 0, '2015-06-01', 48000, b'1'),
(9, 0, '2015-06-02', 96000, b'1'),
(10, 0, '2015-06-02', 169000, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `orders_details`
--

CREATE TABLE IF NOT EXISTS `orders_details` (
  `Ord_ID` bigint(20) NOT NULL DEFAULT '0',
  `M_ID` bigint(20) NOT NULL DEFAULT '0',
  `OD_Quantities` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders_details`
--

INSERT INTO `orders_details` (`Ord_ID`, `M_ID`, `OD_Quantities`) VALUES
(9, 3, 2),
(10, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE IF NOT EXISTS `promotions` (
  `Promo_ID` bigint(20) NOT NULL,
  `Emp_ID` bigint(20) DEFAULT NULL,
  `Promo_Title` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `Promo_Content` text,
  `Promo_Image` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sub_areas`
--

CREATE TABLE IF NOT EXISTS `sub_areas` (
  `SA_ID` int(11) NOT NULL,
  `Area_ID` int(11) DEFAULT NULL,
  `SA_Name` varchar(100) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_areas`
--

INSERT INTO `sub_areas` (`SA_ID`, `Area_ID`, `SA_Name`) VALUES
(1, 1, 'Thủ Dầu Một'),
(2, 1, 'Thuận An'),
(3, 1, 'Dĩ An'),
(4, 1, 'Tân Uyên'),
(5, 1, 'Bến Cát'),
(6, 1, 'Dầu Tiếng'),
(7, 1, 'Phú Giáo'),
(8, 1, 'Bắc Tân Uyên'),
(9, 1, 'Bàu Bàng'),
(10, 2, 'Ninh Kiều'),
(11, 2, 'Bình Thủy'),
(12, 2, 'Cái Răng'),
(13, 2, 'Ô Môn'),
(14, 2, 'Thốt Nốt'),
(15, 2, 'Phong Điền'),
(16, 2, 'Cờ Đỏ'),
(17, 2, 'Vĩnh Thanh'),
(18, 2, 'Thới Lai'),
(19, 3, 'Biên Hòa'),
(20, 3, 'Long Khánh'),
(21, 3, 'Long Thành'),
(22, 3, 'Nhơn Trạch'),
(23, 3, 'Trảng Bom'),
(24, 3, 'Thống Nhất'),
(25, 3, 'Vĩnh Cửu'),
(26, 3, 'Cẩm Mỹ'),
(27, 3, 'Xuân Lộc'),
(28, 3, 'Tân Phú'),
(29, 3, 'Định Quán'),
(30, 4, 'Quận 1'),
(31, 4, 'Quận 2'),
(32, 4, 'Quận 3'),
(33, 4, 'Quận 4'),
(34, 4, 'Quận 5'),
(35, 4, 'Quận 6'),
(36, 4, 'Quận 7'),
(37, 4, 'Quận 8'),
(38, 4, 'Quận 9'),
(39, 4, 'Quận 10'),
(40, 4, 'Quận 11'),
(41, 4, 'Quận 12'),
(42, 4, 'Thủ Đức'),
(43, 4, 'Tân Phú'),
(44, 4, 'Tân Bình'),
(45, 4, 'Phú Nhuận'),
(46, 4, 'Gò Vấp'),
(47, 4, 'Bình Thạnh'),
(48, 4, 'Bình Tân'),
(49, 4, 'Bình Chánh'),
(50, 4, 'Cần Giờ'),
(51, 4, 'Củ Chi'),
(52, 4, 'Hóc Môn'),
(53, 4, 'Nhà Bè');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
  `UR_ID` bigint(20) NOT NULL,
  `UR_Name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `UR_Description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`UR_ID`, `UR_Name`, `UR_Description`) VALUES
(1, 'Boss', 'Can access to any page in system'),
(2, 'Meal_Admin', 'Only access to meals-management pages'),
(3, 'Order_Invoice_Admin', 'Only access to orders and invoices-management pages'),
(4, 'Article_Admin', 'Only access to articles or promotions-management pages'),
(5, 'Technical_Admin', 'Access to all pages only to oversee technical problem, fix bugs and update UI'),
(6, 'Member customer', 'Only access to client pages and can be updated the sales after bought products.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
 ADD PRIMARY KEY (`Acc_Name`), ADD KEY `fk_id` (`UR_ID`), ADD KEY `fk_am` (`Acc_Manager_ID`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
 ADD PRIMARY KEY (`Area_ID`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
 ADD PRIMARY KEY (`Art_ID`), ADD KEY `fk_ag` (`AG_ID`), ADD KEY `fk_emp` (`Emp_ID`);

--
-- Indexes for table `articles_images`
--
ALTER TABLE `articles_images`
 ADD PRIMARY KEY (`Art_ID`);

--
-- Indexes for table `article_groups`
--
ALTER TABLE `article_groups`
 ADD PRIMARY KEY (`AG_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
 ADD PRIMARY KEY (`Cus_ID`), ADD KEY `fk_sa` (`SA_ID`), ADD KEY `fk_ar` (`Area_ID`);

--
-- Indexes for table `delivery_information`
--
ALTER TABLE `delivery_information`
 ADD PRIMARY KEY (`Ord_ID`), ADD KEY `fk_sa` (`SA_ID`), ADD KEY `fk_ar` (`Area_ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
 ADD PRIMARY KEY (`Emp_ID`), ADD KEY `fk_id` (`SA_ID`), ADD KEY `fk_ar` (`Area_ID`), ADD KEY `fk_job` (`J_ID`), ADD KEY `fk_acc` (`Acc_Name`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
 ADD PRIMARY KEY (`Inv_ID`), ADD KEY `fk_ord` (`Ord_ID`), ADD KEY `fk_emp` (`Emp_ID`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
 ADD PRIMARY KEY (`J_ID`);

--
-- Indexes for table `meal`
--
ALTER TABLE `meal`
 ADD PRIMARY KEY (`M_ID`), ADD KEY `fk_meal` (`MG_ID`);

--
-- Indexes for table `mealgroup`
--
ALTER TABLE `mealgroup`
 ADD PRIMARY KEY (`MG_ID`);

--
-- Indexes for table `mealgroupimageui`
--
ALTER TABLE `mealgroupimageui`
 ADD PRIMARY KEY (`MGUI_ID`), ADD KEY `fk_mgui` (`MG_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`Ord_ID`), ADD KEY `fk_cus` (`Cus_ID`);

--
-- Indexes for table `orders_details`
--
ALTER TABLE `orders_details`
 ADD PRIMARY KEY (`Ord_ID`,`M_ID`), ADD KEY `fk_meal` (`M_ID`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
 ADD PRIMARY KEY (`Promo_ID`), ADD KEY `fk_emp` (`Emp_ID`);

--
-- Indexes for table `sub_areas`
--
ALTER TABLE `sub_areas`
 ADD PRIMARY KEY (`SA_ID`), ADD KEY `fk_ar` (`Area_ID`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
 ADD PRIMARY KEY (`UR_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`UR_ID`) REFERENCES `user_role` (`UR_ID`) ON UPDATE CASCADE,
ADD CONSTRAINT `account_ibfk_2` FOREIGN KEY (`Acc_Manager_ID`) REFERENCES `account` (`Acc_Name`) ON UPDATE CASCADE;

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`AG_ID`) REFERENCES `article_groups` (`AG_ID`) ON UPDATE CASCADE,
ADD CONSTRAINT `articles_ibfk_2` FOREIGN KEY (`Emp_ID`) REFERENCES `employee` (`Emp_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `articles_images`
--
ALTER TABLE `articles_images`
ADD CONSTRAINT `articles_images_ibfk_1` FOREIGN KEY (`Art_ID`) REFERENCES `articles` (`Art_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`SA_ID`) REFERENCES `sub_areas` (`SA_ID`) ON UPDATE CASCADE,
ADD CONSTRAINT `customer_ibfk_2` FOREIGN KEY (`Area_ID`) REFERENCES `areas` (`Area_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `delivery_information`
--
ALTER TABLE `delivery_information`
ADD CONSTRAINT `delivery_information_ibfk_1` FOREIGN KEY (`Ord_ID`) REFERENCES `orders` (`Ord_ID`) ON UPDATE CASCADE,
ADD CONSTRAINT `delivery_information_ibfk_2` FOREIGN KEY (`SA_ID`) REFERENCES `sub_areas` (`SA_ID`) ON UPDATE CASCADE,
ADD CONSTRAINT `delivery_information_ibfk_3` FOREIGN KEY (`Area_ID`) REFERENCES `areas` (`Area_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`SA_ID`) REFERENCES `sub_areas` (`SA_ID`) ON UPDATE CASCADE,
ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`Area_ID`) REFERENCES `areas` (`Area_ID`) ON UPDATE CASCADE,
ADD CONSTRAINT `employee_ibfk_3` FOREIGN KEY (`J_ID`) REFERENCES `job` (`J_ID`) ON UPDATE CASCADE,
ADD CONSTRAINT `employee_ibfk_4` FOREIGN KEY (`Acc_Name`) REFERENCES `account` (`Acc_Name`) ON UPDATE CASCADE;

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
ADD CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`Ord_ID`) REFERENCES `orders` (`Ord_ID`) ON UPDATE CASCADE,
ADD CONSTRAINT `invoices_ibfk_2` FOREIGN KEY (`Emp_ID`) REFERENCES `employee` (`Emp_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `meal`
--
ALTER TABLE `meal`
ADD CONSTRAINT `meal_ibfk_1` FOREIGN KEY (`MG_ID`) REFERENCES `mealgroup` (`MG_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `mealgroupimageui`
--
ALTER TABLE `mealgroupimageui`
ADD CONSTRAINT `mealgroupimageui_ibfk_1` FOREIGN KEY (`MG_ID`) REFERENCES `mealgroup` (`MG_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`Cus_ID`) REFERENCES `customer` (`Cus_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `orders_details`
--
ALTER TABLE `orders_details`
ADD CONSTRAINT `orders_details_ibfk_1` FOREIGN KEY (`Ord_ID`) REFERENCES `orders` (`Ord_ID`) ON UPDATE CASCADE,
ADD CONSTRAINT `orders_details_ibfk_2` FOREIGN KEY (`M_ID`) REFERENCES `meal` (`M_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `promotions`
--
ALTER TABLE `promotions`
ADD CONSTRAINT `promotions_ibfk_1` FOREIGN KEY (`Emp_ID`) REFERENCES `employee` (`Emp_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `sub_areas`
--
ALTER TABLE `sub_areas`
ADD CONSTRAINT `sub_areas_ibfk_1` FOREIGN KEY (`Area_ID`) REFERENCES `areas` (`Area_ID`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
