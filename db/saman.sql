-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2024 at 10:08 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saman`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(4) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `cart_product_id` int(4) NOT NULL,
  `cart_product_title` varchar(255) NOT NULL,
  `cart_product_image` text NOT NULL,
  `cart_product_description` text NOT NULL,
  `cart_product_rating` int(3) NOT NULL,
  `cart_product_price` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `cart_product_id`, `cart_product_title`, `cart_product_image`, `cart_product_description`, `cart_product_rating`, `cart_product_price`, `created_at`) VALUES
(375, 'girish111', 1, 'Titan Watch', './gallery/product1.png', 'Best of the Best!!', 4, '1999', '2023-08-11 14:03:20'),
(382, 'manish104', 2, 'Vegetables', './gallery/grocery.jpg', 'Best in the Market\r\nBuy Now!!!', 3, '16.99', '2023-12-26 05:26:41'),
(383, 'manish104', 1, 'Titan Watch', './gallery/product1.png', 'Best of the Best!!', 4, '1999', '2023-12-26 05:35:02'),
(386, 'wwwwwwwww', 3, 'Landing Page', './gallery/landing-page-img.jpg', 'Its the best Landing Page', 5, '199.98', '2024-02-17 13:09:07'),
(445, 'girish104', 21, '4K 34-Inch Gaming Monitor', 'https://i.imgur.com/ZANVnHE.jpeg', '165 Hz too..', 4, '289.00', '2024-03-30 20:19:15'),
(446, 'girish104', 45, 'OPPOF19', 'https://cdn.dummyjson.com/product-images/4/thumbnail.jpg', 'OPPO F19 is officially announced on April 2021.', 4, '280.00', '2024-03-30 20:19:16');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(3) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `order_product_id` int(3) NOT NULL,
  `order_product_title` varchar(255) NOT NULL,
  `order_product_price` varchar(255) NOT NULL,
  `order_product_image` text NOT NULL,
  `order_product_description` text NOT NULL,
  `order_created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL DEFAULT 'on process'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_product_id`, `order_product_title`, `order_product_price`, `order_product_image`, `order_product_description`, `order_created_date`, `order_status`) VALUES
(1, 'manish104', 3, 'Landing Page', '199.98', './gallery/landing-page-img.jpg', 'Its the best Landing Page', '2023-07-28 13:22:54', 'on process'),
(2, 'manish104', 2, 'Vegetables', '16.99', './gallery/grocery.jpg', 'Best in the Market\r\nBuy Now!!!', '2023-07-28 13:22:54', 'on process'),
(3, 'manish104', 1, 'Titan Watch', '1999', './gallery/product1.png', 'Best of the Best!!', '2023-07-28 13:22:54', 'on process'),
(4, 'girish111', 3, 'Landing Page', '199.98', './gallery/landing-page-img.jpg', 'Its the best Landing Page', '2023-08-11 13:42:48', 'on process'),
(5, 'girish111', 1, 'Titan Watch', '1999', './gallery/product1.png', 'Best of the Best!!', '2023-08-11 13:42:48', 'on process'),
(6, 'manish104', 1, 'Titan Watch', '1999', './gallery/product1.png', 'Best of the Best!!', '2023-12-26 04:05:23', 'on process'),
(7, 'manish104', 4, 'women', '0.99', './gallery/women.jpg', 'you can do anything with this', '2023-12-26 04:37:13', 'on process'),
(8, 'manish104', 2, 'Vegetables', '16.99', './gallery/grocery.jpg', 'Best in the Market\r\nBuy Now!!!', '2023-12-26 04:37:13', 'on process'),
(9, 'girish104', 1, 'Titan Watch', '1999', './gallery/product1.png', 'Best of the Best!!', '2024-03-08 20:11:43', 'on process'),
(10, 'girish104', 4, 'women', '0.99', './gallery/women.jpg', 'you can do anything with this', '2024-03-08 21:13:09', 'on process'),
(11, 'girish104', 3, 'Landing Page', '199.98', './gallery/landing-page-img.jpg', 'Its the best Landing Page', '2024-03-08 21:13:09', 'on process'),
(12, 'girish104', 1, 'Titan Watch', '1999', './gallery/product1.png', 'Best of the Best!!', '2024-03-08 21:13:09', 'on process'),
(13, 'girish104', 4, 'women', '0.99', './gallery/women.jpg', 'you can do anything with this', '2024-03-10 18:32:00', 'on process'),
(14, 'girish104', 1, 'Titan Watch', '1999', './gallery/product1.png', 'Best of the Best!!', '2024-03-10 18:32:00', 'on process'),
(15, 'girish104', 4, 'woman', '0.99', './gallery/women.jpg', 'you can do anything with this', '2024-03-13 19:19:08', 'on process'),
(16, 'girish104', 1, 'Titan Watch', '1999', './gallery/product1.png', 'Best of the Best!!', '2024-03-13 19:19:08', 'on process'),
(17, 'girish104', 4, 'Mens Casual Slim Fit', '15.99', 'https://fakestoreapi.com/img/71YXzeOuslL._AC_UY879_.jpg', 'The color could be slightly different between on the screen and in practice. / Please note that body builds vary by person, therefore, detailed size information should be reviewed below on the product description.', '2024-03-27 05:57:06', 'on process'),
(18, 'girish104', 14, 'Samsung 49-Inch CHG90 144Hz Curved Gaming Monitor (LC49HG90DMNXZA) – Super Ultrawide Screen QLED ', '999.99', 'https://fakestoreapi.com/img/81Zt42ioCgL._AC_SX679_.jpg', '49 INCH SUPER ULTRAWIDE 32:9 CURVED GAMING MONITOR with dual 27 inch screen side by side QUANTUM DOT (QLED) TECHNOLOGY, HDR support and factory calibration provides stunningly realistic and accurate color and contrast 144HZ HIGH REFRESH RATE and 1ms ultra fast response time work to eliminate motion blur, ghosting, and reduce input lag', '2024-03-27 05:57:06', 'on process'),
(19, 'girish104', 2, 'Mens Casual Premium Slim Fit T-Shirts ', '22.3', 'https://fakestoreapi.com/img/71-3HjGNDUL._AC_SY879._SX._UX._SY._UY_.jpg', 'Slim-fitting style, contrast raglan long sleeve, three-button henley placket, light weight & soft fabric for breathable and comfortable wearing. And Solid stitched shirts with round neck made for durability and a great fit for casual fashion wear and diehard baseball fans. The Henley style round neckline includes a three-button placket.', '2024-03-27 05:57:06', 'on process'),
(20, 'girish104', 26, 'Power Lift Recliner', '574.00', 'https://i.imgur.com/Qphac99.jpeg', 'akhdsaodjoialkclcmpeo', '2024-03-30 19:16:05', 'on process');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(3) NOT NULL,
  `product_image` text NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `product_price` decimal(10,2) DEFAULT NULL,
  `product_rating` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_category` varchar(255) NOT NULL DEFAULT 'category'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_image`, `product_title`, `product_description`, `product_price`, `product_rating`, `created_at`, `product_category`) VALUES
(1, 'https://fakestoreapi.com/img/81fPKd-2AYL._AC_SL1500_.jpg', 'Fjallraven - Foldsack No. 1 Backpack, Fits 15 Laptops', 'Your perfect pack for everyday use and walks in the forest. Stash your laptop (up to 15 inches) in the padded sleeve, your everyday', 110.00, 4, '2024-03-27 01:20:49', 'men\'s clothing'),
(2, 'https://fakestoreapi.com/img/71-3HjGNDUL._AC_SY879._SX._UX._SY._UY_.jpg', 'Mens Casual Premium Slim Fit T-Shirts ', 'Slim-fitting style, contrast raglan long sleeve, three-button henley placket, light weight & soft fabric for breathable and comfortable wearing. And Solid stitched shirts with round neck made for durability and a great fit for casual fashion wear and diehard baseball fans. The Henley style round neckline includes a three-button placket.', 22.00, 4, '2024-03-27 01:20:49', 'men\'s clothing'),
(3, 'https://fakestoreapi.com/img/71li-ujtlUL._AC_UX679_.jpg', 'Mens Cotton Jacket', 'great outerwear jackets for Spring/Autumn/Winter, suitable for many occasions, such as working, hiking, camping, mountain/rock climbing, cycling, traveling or other outdoors. Good gift choice for you or your family member. A warm hearted love to Father, husband or son in this thanksgiving or Christmas Day.', 56.00, 5, '2024-03-27 01:20:49', 'men\'s clothing'),
(4, 'https://fakestoreapi.com/img/71YXzeOuslL._AC_UY879_.jpg', 'Mens Casual Slim Fit', 'The color could be slightly different between on the screen and in practice. / Please note that body builds vary by person, therefore, detailed size information should be reviewed below on the product description.', 16.00, 2, '2024-03-27 01:20:49', 'men\'s clothing'),
(5, 'https://fakestoreapi.com/img/71pWzhdJNwL._AC_UL640_QL65_ML3_.jpg', 'John Hardy Women\'s Legends Naga Gold & Silver Dragon Station Chain Bracelet', 'From our Legends Collection, the Naga was inspired by the mythical water dragon that protects the ocean\'s pearl. Wear facing inward to be bestowed with love and abundance, or outward for protection.', 695.00, 5, '2024-03-27 01:20:49', 'jewelery'),
(6, 'https://fakestoreapi.com/img/61sbMiUnoGL._AC_UL640_QL65_ML3_.jpg', 'Solid Gold Petite Micropave ', 'Satisfaction Guaranteed. Return or exchange any order within 30 days.Designed and sold by Hafeez Center in the United States. Satisfaction Guaranteed. Return or exchange any order within 30 days.', 168.00, 4, '2024-03-27 01:20:49', 'jewelery'),
(7, 'https://fakestoreapi.com/img/71YAIFU48IL._AC_UL640_QL65_ML3_.jpg', 'White Gold Plated Princess', 'Classic Created Wedding Engagement Solitaire Diamond Promise Ring for Her. Gifts to spoil your love more for Engagement, Wedding, Anniversary, Valentine\'s Day...', 10.00, 3, '2024-03-27 01:20:49', 'jewelery'),
(8, 'https://fakestoreapi.com/img/51UDEzMJVpL._AC_UL640_QL65_ML3_.jpg', 'Pierced Owl Rose Gold Plated Stainless Steel Double', 'Rose Gold Plated Double Flared Tunnel Plug Earrings. Made of 316L Stainless Steel', 11.00, 2, '2024-03-27 01:20:49', 'jewelery'),
(9, 'https://fakestoreapi.com/img/61IBBVJvSDL._AC_SY879_.jpg', 'WD 2TB Elements Portable External Hard Drive - USB 3.0 ', 'USB 3.0 and USB 2.0 Compatibility Fast data transfers Improve PC Performance High Capacity; Compatibility Formatted NTFS for Windows 10, Windows 8.1, Windows 7; Reformatting may be required for other operating systems; Compatibility may vary depending on user’s hardware configuration and operating system', 64.00, 3, '2024-03-27 01:20:49', 'electronics'),
(10, 'https://fakestoreapi.com/img/61U7T1koQqL._AC_SX679_.jpg', 'SanDisk SSD PLUS 1TB Internal SSD - SATA III 6 Gb/s', 'Easy upgrade for faster boot up, shutdown, application load and response (As compared to 5400 RPM SATA 2.5” hard drive; Based on published specifications and internal benchmarking tests using PCMark vantage scores) Boosts burst write performance, making it ideal for typical PC workloads The perfect balance of performance and reliability Read/write speeds of up to 535MB/s/450MB/s (Based on internal testing; Performance may vary depending upon drive capacity, host device, OS and application.)', 109.00, 3, '2024-03-27 01:20:49', 'electronics'),
(11, 'https://fakestoreapi.com/img/71kWymZ+c+L._AC_SX679_.jpg', 'Silicon Power 256GB SSD 3D NAND A55 SLC Cache Performance Boost SATA III 2.5', '3D NAND flash are applied to deliver high transfer speeds Remarkable transfer speeds that enable faster bootup and improved overall system performance. The advanced SLC Cache Technology allows performance boost and longer lifespan 7mm slim design suitable for Ultrabooks and Ultra-slim notebooks. Supports TRIM command, Garbage Collection technology, RAID, and ECC (Error Checking & Correction) to provide the optimized performance and enhanced reliability.', 109.00, 5, '2024-03-27 01:20:49', 'electronics'),
(12, 'https://fakestoreapi.com/img/61mtL65D4cL._AC_SX679_.jpg', 'WD 4TB Gaming Drive Works with Playstation 4 Portable External Hard Drive', 'Expand your PS4 gaming experience, Play anywhere Fast and easy, setup Sleek design with high capacity, 3-year manufacturer\'s limited warranty', 114.00, 5, '2024-03-27 01:20:49', 'electronics'),
(13, 'https://fakestoreapi.com/img/81QpkIctqPL._AC_SX679_.jpg', 'Acer SB220Q bi 21.5 inches Full HD (1920 x 1080) IPS Ultra-Thin', '21. 5 inches Full HD (1920 x 1080) widescreen IPS display And Radeon free Sync technology. No compatibility for VESA Mount Refresh Rate: 75Hz - Using HDMI port Zero-frame design | ultra-thin | 4ms response time | IPS panel Aspect ratio - 16: 9. Color Supported - 16. 7 million colors. Brightness - 250 nit Tilt angle -5 degree to 15 degree. Horizontal viewing angle-178 degree. Vertical viewing angle-178 degree 75 hertz', 599.00, 3, '2024-03-27 01:20:49', 'electronics'),
(14, 'https://fakestoreapi.com/img/81Zt42ioCgL._AC_SX679_.jpg', 'Samsung 49-Inch CHG90 144Hz Curved Gaming Monitor (LC49HG90DMNXZA) – Super Ultrawide Screen QLED ', '49 INCH SUPER ULTRAWIDE 32:9 CURVED GAMING MONITOR with dual 27 inch screen side by side QUANTUM DOT (QLED) TECHNOLOGY, HDR support and factory calibration provides stunningly realistic and accurate color and contrast 144HZ HIGH REFRESH RATE and 1ms ultra fast response time work to eliminate motion blur, ghosting, and reduce input lag', 1000.00, 2, '2024-03-27 01:20:49', 'electronics'),
(15, 'https://fakestoreapi.com/img/51Y5NI-I5jL._AC_UX679_.jpg', 'BIYLACLESEN Women\'s 3-in-1 Snowboard Jacket Winter Coats', 'Note:The Jackets is US standard size, Please choose size as your usual wear Material: 100% Polyester; Detachable Liner Fabric: Warm Fleece. Detachable Functional Liner: Skin Friendly, Lightweigt and Warm.Stand Collar Liner jacket, keep you warm in cold weather. Zippered Pockets: 2 Zippered Hand Pockets, 2 Zippered Pockets on Chest (enough to keep cards or keys)and 1 Hidden Pocket Inside.Zippered Hand Pockets and Hidden Pocket keep your things secure. Humanized Design: Adjustable and Detachable Hood and Adjustable cuff to prevent the wind and water,for a comfortable fit. 3 in 1 Detachable Design provide more convenience, you can separate the coat and inner as needed, or wear it together. It is suitable for different season and help you adapt to different climates', 57.00, 3, '2024-03-27 01:20:49', 'women\'s clothing'),
(16, 'https://fakestoreapi.com/img/81XH0e8fefL._AC_UY879_.jpg', 'Lock and Love Women\'s Removable Hooded Faux Leather Moto Biker Jacket', '100% POLYURETHANE(shell) 100% POLYESTER(lining) 75% POLYESTER 25% COTTON (SWEATER), Faux leather material for style and comfort / 2 pockets of front, 2-For-One Hooded denim style faux leather jacket, Button detail on waist / Detail stitching at sides, HAND WASH ONLY / DO NOT BLEACH / LINE DRY / DO NOT IRON', 30.00, 3, '2024-03-27 01:20:49', 'women\'s clothing'),
(17, 'https://fakestoreapi.com/img/71HblAHs5xL._AC_UY879_-2.jpg', 'Rain Jacket Women Windbreaker Striped Climbing Raincoats', 'Lightweight perfet for trip or casual wear---Long sleeve with hooded, adjustable drawstring waist design. Button and zipper front closure raincoat, fully stripes Lined and The Raincoat has 2 side pockets are a good size to hold all kinds of things, it covers the hips, and the hood is generous but doesn\'t overdo it.Attached Cotton Lined Hood with Adjustable Drawstrings give it a real styled look.', 40.00, 4, '2024-03-27 01:20:49', 'women\'s clothing'),
(18, 'https://fakestoreapi.com/img/71z3kpMAYsL._AC_UY879_.jpg', 'MBJ Women\'s Solid Short Sleeve Boat Neck V ', '95% RAYON 5% SPANDEX, Made in USA or Imported, Do Not Bleach, Lightweight fabric with great stretch for comfort, Ribbed on sleeves and neckline / Double stitching on bottom hem', 10.00, 5, '2024-03-27 01:20:49', 'women\'s clothing'),
(19, 'https://fakestoreapi.com/img/51eg55uWmdL._AC_UX679_.jpg', 'Opna Women\'s Short Sleeve Moisture', '100% Polyester, Machine wash, 100% cationic polyester interlock, Machine Wash & Pre Shrunk for a Great Fit, Lightweight, roomy and highly breathable with moisture wicking fabric which helps to keep moisture away, Soft Lightweight Fabric with comfortable V-neck collar and a slimmer fit, delivers a sleek, more feminine silhouette and Added Comfort', 8.00, 5, '2024-03-27 01:20:49', 'women\'s clothing'),
(20, 'https://fakestoreapi.com/img/61pHAEJ4NML._AC_UX679_.jpg', 'DANVOUY Womens T Shirt Casual Cotton Short', '95%Cotton,5%Spandex, Features: Casual, Short Sleeve, Letter Print,V-Neck,Fashion Tees, The fabric is soft and has some stretch., Occasion: Casual/Office/Beach/School/Home/Street. Season: Spring,Summer,Autumn,Winter.', 13.00, 4, '2024-03-27 01:20:49', 'women\'s clothing'),
(21, 'https://i.imgur.com/ZANVnHE.jpeg', '4K 34-Inch Gaming Monitor', '165 Hz too..', 289.00, 4, '2024-03-27 04:16:59', 'category'),
(22, 'https://i.imgur.com/Qphac99.jpeg', 'Ford Chair', 'Foggy Cair', 400.00, 1, '2024-03-27 04:16:59', 'category'),
(23, 'https://i.imgur.com/Qphac99.jpeg', 'Round Outdoor Steel Picnic Table', 'Umbrella not included', 1660.00, 3, '2024-03-27 04:16:59', 'category'),
(24, 'https://i.imgur.com/ZANVnHE.jpeg', 'PlayStation 4 DualShock Controller', 'comes in more colors!', 59.00, 4, '2024-03-27 04:16:59', 'category'),
(25, 'https://i.imgur.com/qNOjJje.jpeg', 'Womens Button Shark Uggs', 'Uggs! who dont love em', 249.00, 2, '2024-03-27 04:16:59', 'category'),
(26, 'https://i.imgur.com/Qphac99.jpeg', 'Power Lift Recliner', 'akhdsaodjoialkclcmpeo', 574.00, 2, '2024-03-27 04:16:59', 'category'),
(27, 'https://i.imgur.com/ZANVnHE.jpeg', 'Cat Ear Headphones', 'Perfect for all your e-girl streaming needs!', 168.00, 4, '2024-03-27 04:16:59', 'category'),
(28, 'https://i.imgur.com/QkIa5tT.jpeg', 'Women Want Me Fish Fear Me Hat', 'it kinda goes hard tho ngl', 26.00, 5, '2024-03-27 04:16:59', 'category'),
(29, 'https://i.imgur.com/qNOjJje.jpeg', 'Yellow High Top Chuck Taylor Converse', 'they really pop tho', 54.00, 2, '2024-03-27 04:16:59', 'category'),
(30, 'https://i.imgur.com/QkIa5tT.jpeg', 'Men\'s Black Ripped Skinny Jeans', 'rips are so nice', 33.00, 2, '2024-03-27 04:16:59', 'category'),
(31, 'https://i.imgur.com/ZANVnHE.jpeg', 'Camera', 'Picture was not taken by this camera', 3500.00, 5, '2024-03-27 04:16:59', 'category'),
(32, 'https://i.imgur.com/BG8J0Fj.jpg', 'Pedestrian Crossing Road Sign', 'IDK I literally got this off the street', 80.00, 5, '2024-03-27 04:16:59', 'category'),
(33, 'https://i.imgur.com/BG8J0Fj.jpg', 'High Quality Golf Clubs', 'Golf Clubs woohoo', 1050.00, 5, '2024-03-27 04:16:59', 'category'),
(34, 'https://i.imgur.com/BG8J0Fj.jpg', 'Childrens Motor-Powered Ride-On Car Lamborghini', 'they really pop tho', 599.00, 2, '2024-03-27 04:16:59', 'category'),
(35, 'https://i.imgur.com/Qphac99.jpeg', 'Contemporary Wall Painting Art Large', 'they really pop tho', 199.00, 2, '2024-03-27 04:16:59', 'category'),
(36, 'https://i.imgur.com/Qphac99.jpeg', 'Electric Fireplace Mantel', 'they really pop tho', 440.00, 5, '2024-03-27 04:16:59', 'category'),
(37, 'https://i.imgur.com/Qphac99.jpeg', 'Double Decker Coffee Table Brown Ash/Black Frame', 'they really pop tho', 207.00, 1, '2024-03-27 04:16:59', 'category'),
(38, 'https://i.imgur.com/QkIa5tT.jpeg', 'Tanki septic  ', 'CV. ', 800.00, 4, '2024-03-27 04:16:59', 'category'),
(39, 'https://i.imgur.com/ZANVnHE.jpeg', 'qqq', 'www', 111.00, 3, '2024-03-27 04:16:59', 'category'),
(40, 'https://i.imgur.com/QkIa5tT.jpeg', 'New Product', '2', 10.00, 3, '2024-03-27 04:16:59', 'category'),
(41, 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6d/Good_Food_Display_-_NCI_Visuals_Online.jpg/1280px-Good_Food_Display_-_NCI_Visuals_Online.jpg', 'Tomato', 'tomato', 172.00, 2, '2024-03-27 04:16:59', 'category'),
(42, 'https://cdn.dummyjson.com/product-images/1/thumbnail.jpg', 'iPhone 9', 'An apple mobile which is nothing like apple', 549.00, 5, '2024-03-27 04:27:06', 'appliances'),
(43, 'https://cdn.dummyjson.com/product-images/2/thumbnail.jpg', 'iPhone X', 'SIM-Free, Model A19211 6.5-inch Super Retina HD display with OLED technology A12 Bionic chip with ...', 899.00, 4, '2024-03-27 04:27:06', 'furniture'),
(44, 'https://cdn.dummyjson.com/product-images/3/thumbnail.jpg', 'Samsung Universe 9', 'Samsung\'s new variant which goes beyond Galaxy to the Universe', 1249.00, 4, '2024-03-27 04:27:06', 'kids'),
(45, 'https://cdn.dummyjson.com/product-images/4/thumbnail.jpg', 'OPPOF19', 'OPPO F19 is officially announced on April 2021.', 280.00, 4, '2024-03-27 04:27:06', 'electronics'),
(46, 'https://cdn.dummyjson.com/product-images/5/thumbnail.jpg', 'Huawei P30', 'Huawei’s re-badged P30 Pro New Edition was officially unveiled yesterday in Germany and now the device has made its way to the UK.', 499.00, 4, '2024-03-27 04:27:06', 'kids'),
(47, 'https://cdn.dummyjson.com/product-images/6/thumbnail.png', 'MacBook Pro', 'MacBook Pro 2021 with mini-LED display may launch between September, November', 1749.00, 5, '2024-03-27 04:27:06', 'kids'),
(48, 'https://cdn.dummyjson.com/product-images/7/thumbnail.jpg', 'Samsung Galaxy Book', 'Samsung Galaxy Book S (2020) Laptop With Intel Lakefield Chip, 8GB of RAM Launched', 1499.00, 4, '2024-03-27 04:27:06', 'crafts'),
(49, 'https://cdn.dummyjson.com/product-images/8/thumbnail.jpg', 'Microsoft Surface Laptop 4', 'Style and speed. Stand out on HD video calls backed by Studio Mics. Capture ideas on the vibrant touchscreen.', 1499.00, 4, '2024-03-27 04:27:06', 'man'),
(50, 'https://cdn.dummyjson.com/product-images/9/thumbnail.jpg', 'Infinix INBOOK', 'Infinix Inbook X1 Ci3 10th 8GB 256GB 14 Win10 Grey – 1 Year Warranty', 1099.00, 5, '2024-03-27 04:27:06', 'crafts'),
(51, 'https://cdn.dummyjson.com/product-images/10/thumbnail.jpeg', 'HP Pavilion 15-DK1056WM', 'HP Pavilion 15-DK1056WM Gaming Laptop 10th Gen Core i5, 8GB, 256GB SSD, GTX 1650 4GB, Windows 10', 1099.00, 4, '2024-03-27 04:27:06', 'grocery'),
(52, 'https://cdn.dummyjson.com/product-images/11/thumbnail.jpg', 'perfume Oil', 'Mega Discount, Impression of Acqua Di Gio by GiorgioArmani concentrated attar perfume Oil', 13.00, 4, '2024-03-27 04:27:06', 'electronics'),
(53, 'https://cdn.dummyjson.com/product-images/12/thumbnail.jpg', 'Brown Perfume', 'Royal_Mirage Sport Brown Perfume for Men & Women - 120ml', 40.00, 4, '2024-03-27 04:27:06', 'crafts'),
(54, 'https://cdn.dummyjson.com/product-images/13/thumbnail.webp', 'Fog Scent Xpressio Perfume', 'Product details of Best Fog Scent Xpressio Perfume 100ml For Men cool long lasting perfumes for Men', 13.00, 5, '2024-03-27 04:27:06', 'electronics'),
(55, 'https://cdn.dummyjson.com/product-images/14/thumbnail.jpg', 'Non-Alcoholic Concentrated Perfume Oil', 'Original Al Munakh® by Mahal Al Musk | Our Impression of Climate | 6ml Non-Alcoholic Concentrated Perfume Oil', 120.00, 4, '2024-03-27 04:27:06', 'grocery'),
(56, 'https://cdn.dummyjson.com/product-images/15/thumbnail.jpg', 'Eau De Perfume Spray', 'Genuine  Al-Rehab spray perfume from UAE/Saudi Arabia/Yemen High Quality', 30.00, 5, '2024-03-27 04:27:06', 'furniture'),
(57, 'https://cdn.dummyjson.com/product-images/16/thumbnail.jpg', 'Hyaluronic Acid Serum', 'L\'OrÃ©al Paris introduces Hyaluron Expert Replumping Serum formulated with 1.5% Hyaluronic Acid', 19.00, 5, '2024-03-27 04:27:06', 'woman'),
(58, 'https://cdn.dummyjson.com/product-images/17/thumbnail.jpg', 'Tree Oil 30ml', 'Tea tree oil contains a number of compounds, including terpinen-4-ol, that have been shown to kill certain bacteria,', 12.00, 5, '2024-03-27 04:27:06', 'appliances'),
(59, 'https://cdn.dummyjson.com/product-images/18/thumbnail.jpg', 'Oil Free Moisturizer 100ml', 'Dermive Oil Free Moisturizer with SPF 20 is specifically formulated with ceramides, hyaluronic acid & sunscreen.', 40.00, 5, '2024-03-27 04:27:06', 'furniture'),
(60, 'https://cdn.dummyjson.com/product-images/19/thumbnail.jpg', 'Skin Beauty Serum.', 'Product name: rorec collagen hyaluronic acid white face serum riceNet weight: 15 m', 46.00, 4, '2024-03-27 04:27:06', 'electronics'),
(61, 'https://cdn.dummyjson.com/product-images/20/thumbnail.jpg', 'Freckle Treatment Cream- 15gm', 'Fair & Clear is Pakistan\'s only pure Freckle cream which helpsfade Freckles, Darkspots and pigments. Mercury level is 0%, so there are no side effects.', 70.00, 4, '2024-03-27 04:27:06', 'kids'),
(62, 'https://cdn.dummyjson.com/product-images/21/thumbnail.png', '- Daal Masoor 500 grams', 'Fine quality Branded Product Keep in a cool and dry place', 20.00, 4, '2024-03-27 04:27:06', 'woman'),
(63, 'https://cdn.dummyjson.com/product-images/22/thumbnail.jpg', 'Elbow Macaroni - 400 gm', 'Product details of Bake Parlor Big Elbow Macaroni - 400 gm', 14.00, 5, '2024-03-27 04:27:06', 'kids'),
(64, 'https://cdn.dummyjson.com/product-images/23/thumbnail.jpg', 'Orange Essence Food Flavou', 'Specifications of Orange Essence Food Flavour For Cakes and Baking Food Item', 14.00, 5, '2024-03-27 04:27:06', 'woman'),
(65, 'https://cdn.dummyjson.com/product-images/24/thumbnail.jpg', 'cereals muesli fruit nuts', 'original fauji cereal muesli 250gm box pack original fauji cereals muesli fruit nuts flakes breakfast cereal break fast faujicereals cerels cerel foji fouji', 46.00, 5, '2024-03-27 04:27:06', 'appliances'),
(66, 'https://cdn.dummyjson.com/product-images/25/thumbnail.jpg', 'Gulab Powder 50 Gram', 'Dry Rose Flower Powder Gulab Powder 50 Gram • Treats Wounds', 70.00, 5, '2024-03-27 04:27:06', 'electronics'),
(67, 'https://cdn.dummyjson.com/product-images/26/thumbnail.jpg', 'Plant Hanger For Home', 'Boho Decor Plant Hanger For Home Wall Decoration Macrame Wall Hanging Shelf', 41.00, 4, '2024-03-27 04:27:06', 'crafts'),
(68, 'https://cdn.dummyjson.com/product-images/27/thumbnail.webp', 'Flying Wooden Bird', 'Package Include 6 Birds with Adhesive Tape Shape: 3D Shaped Wooden Birds Material: Wooden MDF, Laminated 3.5mm', 51.00, 4, '2024-03-27 04:27:06', 'grocery'),
(69, 'https://cdn.dummyjson.com/product-images/28/thumbnail.jpg', '3D Embellishment Art Lamp', '3D led lamp sticker Wall sticker 3d wall art light on/off button  cell operated (included)', 20.00, 5, '2024-03-27 04:27:06', 'appliances'),
(70, 'https://cdn.dummyjson.com/product-images/29/thumbnail.webp', 'Handcraft Chinese style', 'Handcraft Chinese style art luxury palace hotel villa mansion home decor ceramic vase with brass fruit plate', 60.00, 4, '2024-03-27 04:27:06', 'electronics'),
(71, 'https://cdn.dummyjson.com/product-images/30/thumbnail.jpg', 'Key Holder', 'Attractive DesignMetallic materialFour key hooksReliable & DurablePremium Quality', 30.00, 5, '2024-03-27 04:27:06', 'crafts');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `user_email`, `user_password`, `created_at`) VALUES
(1, 'girish104', 'gmail@email.com', '$2y$10$bt6i1ji9hnk4JJg21SUtGOhyjEKdPjpm1NrdhHHkdSb5Gyl2uRL22', '2023-010-10 10:26:48');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(3) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `wish_product_id` int(3) NOT NULL,
  `wish_image` text NOT NULL,
  `wish_title` varchar(255) NOT NULL,
  `wish_price` varchar(255) NOT NULL,
  `wish_description` text NOT NULL,
  `wish_rating` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `wish_product_id`, `wish_image`, `wish_title`, `wish_price`, `wish_description`, `wish_rating`, `created_at`) VALUES
(2073, 'giriya104', 2, './gallery/grocery.jpg', 'Vegetables', '16.99', 'Best in the Market\r\nBuy Now!!!', '3', '2023-10-10 18:10:01'),
(2074, 'giriya104', 4, './gallery/women.jpg', 'women', '0.99', 'you can do anything with this', '5', '2023-11-10 18:10:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
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
  ADD PRIMARY KEY (`product_id`);

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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=447;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2095;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
