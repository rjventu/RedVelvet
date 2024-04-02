-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2024 at 06:35 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `redvelvet`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` longtext NOT NULL,
  `admin_fname` varchar(25) NOT NULL,
  `admin_lname` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_password`, `admin_fname`, `admin_lname`) VALUES
(1, 'admin@gmail.com', '$2y$10$rmoXzlrAOIgba4oq0Ql6VO.i.XY1NqBCq6k9Ap0Hd0AVEPaQvgYYO', 'Ruby', 'Ventura');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `cat_description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_description`) VALUES
(1, 'Signature Cakes', '8\" | good for 8-12 people'),
(2, 'Cake Delights', '6\" | good for 6-10 people'),
(3, 'Cheesecakes', '6\" | good for 6-10 people\r\n8\" | good for 8-12 people'),
(4, 'Pastries', NULL),
(5, 'Cupcakes', 'Minimum order of 12 pcs'),
(6, 'Cookies', '8 large pcs per order'),
(7, 'Bars', '12/16 pcs per order/pan');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(255) NOT NULL,
  `order_name` varchar(255) NOT NULL,
  `order_email` varchar(255) NOT NULL,
  `order_contact` varchar(24) NOT NULL,
  `order_add` varchar(255) NOT NULL,
  `order_date` date NOT NULL,
  `order_pay` int(6) NOT NULL,
  `order_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `order_status` varchar(255) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_name`, `order_email`, `order_contact`, `order_add`, `order_date`, `order_pay`, `order_time`, `order_status`) VALUES
(1, 'Mary Sue', 'marysue@gmail.com', '123456789', '1234 Street, District, City', '2024-04-03', 1, '2024-04-01 15:58:25', 'Delivered'),
(2, 'John Johnson', 'jjohnson@gmail.com', '09221234567', '34 A Johnsville, California', '2024-04-04', 2, '2024-04-02 04:42:06', 'Delivering'),
(3, 'Tester Testerson', 'test@gmail.com', '00001234567', 'Apt. Suite A, Test St., Test Blvd.', '2024-04-12', 1, '2024-04-02 05:53:46', 'Paid'),
(4, 'Luna Lovegood', 'luna.lovegood@gmail.com', '963852741', 'Hogwarts', '2024-04-22', 2, '2024-04-02 08:45:22', 'Paid'),
(5, 'Jane Doe', 'jdoe@gmail.com', '123456789', 'Manila', '2024-04-13', 1, '2024-04-02 14:2:38', 'Paid'),
(6, 'Kermit the Frog', 'kerms99@gmail.com', '852943761', 'Sesame Street', '2024-04-21', 2, '2024-04-02 14:45:24', 'Pending'),
(7, 'Jimin', 'jmpark1013@gmail.com', '123654789', 'Hybe Building', '2024-04-26', 2, '2024-04-02 14:46:38', 'Pending'),
(8, 'Joe Biden', 'jbiden@gmail.com', '842697513', 'The White House', '2024-04-27', 1, '2024-04-02 14:51:34', 'Pending'),
(9, 'Bruce Wayne', 'brucewayne@gmail.com', '1234567890', 'Gotham', '2024-04-05', 1, '2024-04-02 16:13:31', 'Pending');

SET GLOBAL time_zone = '+7:00';
-- --------------------------------------------------------

--
-- Table structure for table `orders_items`
--

CREATE TABLE `orders_items` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_price` decimal(5,2) NOT NULL,
  `item_variety` varchar(255) NOT NULL,
  `item_qty` int(255) NOT NULL,
  `order_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders_items`
--

INSERT INTO `orders_items` (`item_id`, `item_name`, `item_price`, `item_variety`, `item_qty`, `order_id`) VALUES
(1, 'Red Velvet Cream', 20.00, 'none', 1, 1),
(36, 'Cupcakes w/ Yema Custard Frosting', 21.00, 'Yema Base', 2, 1),
(7, 'Purple Velvet Cream', 20.00, 'none', 3, 2),
(18, 'Oreo Cheescake (6\")', 15.00, 'none', 1, 2),
(5, 'Black Forest', 20.00, 'none', 1, 3),
(35, 'Cupcakes w/ Cream Cheese Frosting', 21.00, 'Vanilla Base', 1, 3),
(27, 'Red Velvet Choco Chip', 6.00, 'none', 2, 3),
(12, 'Red Velvet Cream', 14.00, 'none', 1, 4),
(9, 'Choco Decadence', 25.00, 'none', 1, 4),
(35, 'Cupcakes w/ Cream Cheese Frosting', 21.00, 'Vanilla Base', 2, 4),
(24, 'Double Choco', 6.00, 'none', 2, 4),
(1, 'Red Velvet Cream', 20.00, 'none', 1, 5),
(29, 'Red Velvet Cheesecake Swirl', 12.00, 'none', 1, 5),
(28, 'Double Choco Brownies', 8.00, 'none', 1, 5),
(34, 'Cupcakes w/ Vanilla Cream Frosting', 18.00, 'Vanilla Base', 1, 6),
(35, 'Cupcakes w/ Cream Cheese Frosting', 21.00, 'Chocolate Base', 1, 6),
(18, 'Oreo Cheescake (6\")', 15.00, 'none', 1, 7),
(36, 'Cupcakes w/ Yema Custard Frosting', 21.00, 'Yema Base', 1, 7),
(36, 'Cupcakes w/ Yema Custard Frosting', 21.00, 'Yema Base', 1, 8),
(30, 'Butterscotch with Nuts', 8.00, 'none', 1, 8),
(31, 'Revel Choco-Oat Bars', 12.00, 'none', 1, 8),
(35, 'Cupcakes w/ Cream Cheese Frosting', 21.00, 'Vanilla Base', 2, 9),
(36, 'Cupcakes w/ Yema Custard Frosting', 21.00, 'Yema Base', 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(50) NOT NULL,
  `prod_price` decimal(5,2) NOT NULL,
  `prod_description` varchar(500) NOT NULL,
  `prod_image` varchar(80) NOT NULL,
  `prod_image_file` varchar(255) NOT NULL,
  `bestseller` varchar(5) DEFAULT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `prod_name`, `prod_price`, `prod_description`, `prod_image`, `prod_image_file`, `bestseller`, `cat_id`) VALUES
(1, 'Red Velvet Cream', 20.00, 'Layers of moist red velvet cake paired with velvety cream cheese frosting, creating a symphony of rich flavors and textures.', 'redvelcreamcake.jpg', '65be13c4de1971.13328071.jpg', 'Y', 1),
(2, 'Yema Cake with Cheese', 14.00, 'Moist sponge cake filled with creamy yema and topped with grated cheese for a perfect balance of flavors.', 'del-yemacake.jpg', '65be13e63d7837.58199304.jpg', 'Y', 2),
(3, 'Blueberry Cheesecake (6\")', 15.00, 'Creamy cheesecake atop a buttery graham cracker crust, adorned with a luscious blueberry compote. A perfect balance of tangy sweetness in every bite.', 'cheese-blueberry.jpg', '65be141dd74f53.44733419.jpg', 'Y', 3),
(4, 'Classic Cinnamon Rolls with Glaze', 6.00, 'Soft, fluffy rolls swirled with cinnamon sugar, topped with a luscious glaze. A perfect balance of sweetness and spice in every bite.', 'car3.jpg', '65be1466c80e16.61250316.jpg', 'Y', 4),
(5, 'Black Forest', 20.00, 'Layers of decadent chocolate sponge cake, whipped cream, and cherries, perfectly balanced for a timeless treat.', 'blackforestcake.jpg', '65eb144512b4d3.41354951.jpg', 'Y', 1),
(6, 'Choco Oreo', 20.00, 'Rich chocolate layers intertwined with crushed Oreo cookies, topped with velvety frosting and Oreo crumbles for an irresistible fusion of flavors.', 'chocooreocake.jpg', '65eb1be362e4f5.78091604.jpg', 'N', 1),
(7, 'Purple Velvet Cream', 20.00, 'Layers of velvety purple cake, infused with hints of vanilla, and complemented by our signature cream frosting. Pure elegance in every bite.', 'purpvelcream.jpg', '65eb1c04796fc2.91768493.jpg', 'N', 1),
(8, 'Tres Leches with Cashew Nuts', 20.00, 'Each slice of our Tres Leches Cake with Cashew Nuts offers a luxurious blend of moist cake soaked in three milks, topped with crunchy cashew nuts for a perfect balance of richness and texture.', 'treslechescake.jpg', '65eb1c28b67a01.38353186.jpg', 'Y', 1),
(9, 'Choco Decadence', 25.00, 'Indulge in decadence with our Choco Decadence Cake. Each slice offers a rich symphony of velvety chocolate layers, adorned with smooth chocolate ganache, promising pure bliss in every bite.', 'chocodec.jpg', '65eb1c43817411.00044233.jpg', 'Y', 1),
(10, 'Choco Vanilla with Fruits', 20.00, 'Moist chocolate and vanilla layers adorned with a medley of fresh, vibrant fruits. A perfect harmony of indulgence and freshness in every slice.', 'chocovanwfruits.jpg', '65eb1c63803cf1.45283374.jpg', 'N', 1),
(11, 'Yema Cake with Cheese', 20.00, 'Moist sponge cake filled with creamy yema and topped with grated cheese for a perfect balance of flavors.', 'yemacakewcheese.jpg', '65eb1c793a50d2.81249744.jpg', 'Y', 1),
(12, 'Red Velvet Cream', 14.00, 'Layers of moist red velvet cake paired with velvety cream cheese frosting, creating a symphony of rich flavors and textures.', 'del-redvelcream.jpg', '65eb1de4386df8.15067679.jpg', 'Y', 2),
(13, 'Choco Mocha', 14.00, 'Rich chocolate layers infused with aromatic coffee, topped with decadent mocha frosting. A delightful treat for coffee and chocolate lovers alike.', 'del-chocomocha.jpg', '65eb1dfd97fbc9.16460987.jpg', 'Y', 2),
(14, 'Choco Oreo', 14.00, 'Rich chocolate layers intertwined with crushed Oreo cookies, topped with velvety frosting and Oreo crumbles for an irresistible fusion of flavors.', 'del-chocooreo.jpg', '65eb1e1a9ab239.03129752.jpg', 'N', 2),
(15, 'Tres Leches with Cashew Nuts', 14.00, 'Each slice of our Tres Leches Cake with Cashew Nuts offers a luxurious blend of moist cake soaked in three milks, topped with crunchy cashew nuts for a perfect balance of richness and texture.', 'treslechescake.jpg', '65eb1e36239b48.06139149.jpg', 'N', 2),
(16, 'Purple Velvet Cream', 14.00, 'Layers of velvety purple cake, infused with hints of vanilla, and complemented by our signature cream frosting. Pure elegance in every bite.', 'del-purpvelcream.jpg', '65eb1e4f9dc3d0.01338372.jpg', 'N', 2),
(17, 'Choco Vanilla with Fruits', 14.00, 'Moist chocolate and vanilla layers adorned with a medley of fresh, vibrant fruits. A perfect harmony of indulgence and freshness in every slice.', 'del-chocvanwfruits.jpg', '65eb1e6ab4fb74.26793853.jpg', 'N', 2),
(18, 'Oreo Cheescake (6\")', 15.00, 'Velvety cream cheese filling loaded with chunks of Oreo cookies, nestled on a chocolate cookie crust. Pure indulgence in every mouthful.', 'cheese-oreo.jpg', '65ec1dc4872b05.98811795.jpg', 'Y', 3),
(19, 'Strawberry Cheesecake (6\")', 15.00, 'Creamy cheesecake on a buttery graham cracker crust, crowned with a luscious layer of fresh strawberries. A perfect blend of creamy and fruity flavors.', 'cheese-straw.jpg', '65ec1dd962cdb9.73840755.jpg', 'N', 3),
(20, 'Classic New York (6\")', 14.00, 'A velvety smooth cream cheese filling atop a buttery graham cracker crust. Pure indulgence in every decadent bite.', 'cheese-nyc.jpg', '65ec1e0466e931.47041162.jpg', 'N', 3),
(21, 'Soft Ensaymada with Cheese', 14.00, 'Pillowy dough infused with butter, topped with creamy butter and grated cheese. A delightful Filipino treat, perfect for any time of day.', 'pastry-ensaymada.jpg', '65ec1f5d3d84e2.90027411.jpg', 'N', 4),
(22, 'Yema-Filled Donuts', 14.00, 'Fluffy dough filled with creamy yema custard, dusted with powdered sugar. A delightful blend of sweetness and richness in every bite.', 'pastry-yemadonut.jpg', '65ec1f7beb9729.34328690.jpg', 'N', 4),
(23, 'Old-Fashioned Cheese Donuts', 6.00, 'Classic fluffy dough filled with creamy cheese, perfectly sweetened and fried to golden perfection. A timeless treat for any occasion.', 'pastry-olddonut.jpg', '65ec1fb374f479.84021097.jpg', 'Y', 4),
(24, 'Double Choco', 6.00, 'Rich cocoa-infused dough packed with chunks of decadent chocolate, delivering a double dose of chocolatey goodness in every bite.', 'cookies-doublechoco.jpg', '65ec24948da192.60072633.jpg', 'Y', 6),
(25, 'Classic Choco Chip', 6.00, 'Buttery cookies generously studded with rich chocolate chips, offering a perfect balance of sweetness and crunch in every bite.', 'cookies-classicchocochip.jpg', '65ec24e7ef8971.91057380.jpg', 'Y', 6),
(26, 'Cream Cheese-Filled', 6.00, 'Buttery cookies with a delightful surprise of creamy cream cheese filling in the center. A perfect blend of sweetness and richness in every bite.', 'cookies-filled.jpg', '65ec2507401290.26718033.jpg', 'N', 6),
(27, 'Red Velvet Choco Chip', 6.00, 'Soft and chewy red velvet cookies studded with rich chocolate chips, offering a decadent twist on a classic favorite.', 'cookies-redvel.jpg', '65ec251ce8a742.77751199.jpg', 'N', 6),
(28, 'Double Choco Brownies', 8.00, 'Rich, fudgy brownies loaded with double the chocolate goodness, perfect for satisfying your sweet cravings.', 'bars-doublechoco.jpg', '65ec2565299a42.81496009.jpg', 'Y', 7),
(29, 'Red Velvet Cheesecake Swirl', 12.00, 'Decadent red velvet bars swirled with creamy cheesecake, offering a delightful fusion of flavors in every bite.', 'redvelcheese.jpg', '65ec25e236f124.46631821.jpg', 'Y', 7),
(30, 'Butterscotch with Nuts', 8.00, 'Irresistible bars packed with rich butterscotch flavor and crunchy nuts, offering a perfect balance of sweetness and nuttiness in every bite.', 'bars-butterscotch.jpg', '65ec259ddb3d93.57705837.jpg', 'Y', 7),
(31, 'Revel Choco-Oat Bars', 12.00, 'Rich chocolate combined with wholesome oats, creating a delightful treat packed with flavor and texture in every bite.', 'bars-revel.jpg', '65ec25cc592806.95697938.jpg', 'N', 7),
(32, 'Nutella Brownie Swirl', 12.00, 'Rich, fudgy brownie bars swirled with creamy Nutella, offering a heavenly combination of chocolatey indulgence and hazelnut goodness.', 'bars-nutella.jpg', '65ec263e90a8d4.69583779.jpg', 'N', 7),
(33, 'Apple Crumble Pie', 12.00, 'Layers of juicy apple filling sandwiched between a buttery crumble crust, offering a delectable twist on the classic pie in convenient bar form.', 'bars-apple.jpg', '65ec26567f3647.21590981.jpg', 'N', 7),
(34, 'Cupcakes w/ Vanilla Cream Frosting', 18.00, 'Moist cake topped with a generous swirl of creamy vanilla frosting. A perfect balance of sweetness and fluffy texture in every bite.', 'cupcakes2.jpg', '65ec3af10ad956.87193045.jpg', 'N', 5),
(35, 'Cupcakes w/ Cream Cheese Frosting', 21.00, 'Moist cake topped with a decadent swirl of creamy cream cheese frosting. A delightful blend of richness and tanginess in every bite.\r\n', 'car2.jpg', '65ec3b103a2186.70219066.jpg', 'N', 5),
(36, 'Cupcakes w/ Yema Custard Frosting', 21.00, 'Moist cake crowned with a heavenly swirl of creamy yema custard frosting. A delightful fusion of sweetness and indulgence in every bite.', 'cupcakes3.jpg', '65ec3b44c0ebc3.06507840.jpg', 'N', 5),
(38, 'Blueberry Cheesecake (8\")', 25.00, 'Creamy cheesecake atop a buttery graham cracker crust, adorned with a luscious blueberry compote. A perfect balance of tangy sweetness in every bite.', 'cheese-blueberry.jpg', '6606c605f092c6.91153735.jpg', 'Y', 3),
(39, 'Oreo Cheescake (8\")', 25.00, 'Velvety cream cheese filling loaded with chunks of Oreo cookies, nestled on a chocolate cookie crust. Pure indulgence in every mouthful.', 'cheese-oreo.jpg', '6606c6584d5fe5.70965587.jpg', 'Y', 3),
(40, 'Strawberry Cheesecake (8\")', 25.00, 'Creamy cheesecake on a buttery graham cracker crust, crowned with a luscious layer of fresh strawberries. A perfect blend of creamy and fruity flavors.', 'cheese-straw.jpg', '6606c678d60608.86548823.jpg', 'N', 3),
(41, 'Classic New York (8\")', 25.00, 'A velvety smooth cream cheese filling atop a buttery graham cracker crust. Pure indulgence in every decadent bite.', 'cheese-nyc.jpg', '6606c69d9bb533.95358814.jpg', 'N', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `orders_items`
--
ALTER TABLE `orders_items`
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prod_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders_items`
--
ALTER TABLE `orders_items`
  ADD CONSTRAINT `orders_items_fk` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_category_fk` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
