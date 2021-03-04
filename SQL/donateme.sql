-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2018 at 02:38 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `donateme`
--

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE `campaigns` (
  `camp_id` int(11) NOT NULL,
  `camp_user_id` int(200) NOT NULL,
  `camp_title` varchar(500) NOT NULL,
  `camp_slug` varchar(200) NOT NULL,
  `camp_category` int(100) NOT NULL,
  `camp_goal` int(255) NOT NULL,
  `camp_location` varchar(200) NOT NULL,
  `camp_image` varchar(200) NOT NULL,
  `camp_desc` text NOT NULL,
  `camp_date` date NOT NULL,
  `delete_status` varchar(200) NOT NULL,
  `camp_finish` int(50) NOT NULL,
  `camp_status` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `campaigns`
--

INSERT INTO `campaigns` (`camp_id`, `camp_user_id`, `camp_title`, `camp_slug`, `camp_category`, `camp_goal`, `camp_location`, `camp_image`, `camp_desc`, `camp_date`, `delete_status`, `camp_finish`, `camp_status`) VALUES
(10, 26, 'one', 'one', 16, 234, '87', '1526189188.jpg', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum nnnn', '2018-05-13', '', 1, 2),
(11, 26, 'Charity Water', 'charity-water', 3, 34000, 'London', '1526428692.jpg', '&lt;span style=&quot;font-family: &quot; open=&quot;&quot; sans&quot;,=&quot;&quot; arial,=&quot;&quot; sans-serif;=&quot;&quot; font-size:=&quot;&quot; 14px;=&quot;&quot; text-align:=&quot;&quot; justify;=&quot;&quot; background-color:=&quot;&quot; rgb(255,=&quot;&quot; 255,=&quot;&quot; 255);&quot;=&quot;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum&lt;/span&gt;&lt;div&gt;&lt;/div&gt;&lt;div&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum&lt;br&gt;&lt;/div&gt;', '2018-06-08', '', 3, 2),
(12, 26, 'Give Us A Helping Hand For Children', 'give-us-a-helping-hand-for-children', 3, 35000, 'nigeria', '1526261983.jpg', '&lt;span style=&quot;font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum&lt;/span&gt;&lt;div&gt;&lt;span style=&quot;font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum&lt;/span&gt;&lt;span style=&quot;font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/div&gt;', '2018-06-08', '', 2, 2),
(13, 26, 'wwew', 'wwew', 11, 3232, 'dfsafasfa', '1526431642.png', 'fdsafsaf', '2018-05-16', 'deleted', 0, 1),
(14, 27, 'Child school from nigeria', 'child-school-from-nigeria', 7, 16500, 'Nigeria', '1526435339.jpg', '&lt;span style=&quot;font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum&lt;/span&gt;', '2018-05-16', '', 0, 1),
(15, 27, 'Test', 'test', 8, 100, 'United kingdom', '', 'test', '2018-06-09', 'deleted', 0, 1),
(17, 27, 'jjo', 'jjo', 15, 200, 'dfsa', '1528550970.jpg', 'dfsafdsafdsa', '2018-06-09', '', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `post_slug` varchar(500) NOT NULL,
  `image` varchar(255) NOT NULL,
  `delete_status` varchar(50) NOT NULL,
  `status` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`, `post_slug`, `image`, `delete_status`, `status`) VALUES
(1, 'Animals', 'animals', '1528589798.jpeg', '', 1),
(2, 'Business', 'business', '1528589927.jpeg', '', 1),
(3, 'Charity', 'charity', '1528590072.jpg', '', 1),
(4, 'Community', 'community', '1528590145.jpeg', '', 1),
(5, 'Competitions', 'competitions', '1528590257.jpeg', '', 1),
(6, 'Creative', 'creative', '1528591478.jpeg', '', 1),
(7, 'Education', 'education', '1528591379.jpeg', '', 1),
(8, 'Emergencies', 'emergencies', '1528591619.jpeg', '', 1),
(9, 'Events', 'events', '1528591697.jpeg', '', 1),
(10, 'Faith', 'faith', '1528591844.jpeg', '', 1),
(11, 'Family', 'family', '1528591914.jpeg', '', 1),
(12, 'Medical', 'medical', '1528591974.jpeg', '', 1),
(13, 'Memorials', 'memorials', '1528592036.jpeg', '', 1),
(14, 'Other', 'other', '1528592187.jpeg', '', 1),
(15, 'Sports', 'sports', '1528592245.jpeg', '', 1),
(16, 'Travel', 'travel', '1528592294.jpeg', '', 1),
(17, 'Wishes', 'wishes', '1528592398.jpeg', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `cid` int(11) NOT NULL,
  `camp_user_id` int(200) NOT NULL,
  `donator_user_id` int(200) NOT NULL,
  `purchase_token` varchar(500) NOT NULL,
  `token` varchar(500) NOT NULL,
  `stripe_token` varchar(500) NOT NULL,
  `camp_id` varchar(200) NOT NULL,
  `amount` float(10,2) NOT NULL,
  `user_amount` float(10,2) NOT NULL,
  `payment_type` varchar(200) NOT NULL,
  `commission_amt` float(10,2) NOT NULL,
  `commission_mode` varchar(50) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `country` varchar(200) NOT NULL,
  `postcode` varchar(200) NOT NULL,
  `write_comment` text NOT NULL,
  `withdraw` varchar(50) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`cid`, `camp_user_id`, `donator_user_id`, `purchase_token`, `token`, `stripe_token`, `camp_id`, `amount`, `user_amount`, `payment_type`, `commission_amt`, `commission_mode`, `fullname`, `phone`, `email`, `country`, `postcode`, `write_comment`, `withdraw`, `payment_date`, `payment_status`) VALUES
(20, 26, 0, '2219054', 'YtPnxSoFux38VPAGGphUASZXC9CdmzZb4nnPk5oJ', '', '12', 16000.00, 15990.00, 'paypal', 10.00, 'fixed', 'rohert', '945656565', 'rohert@gmail.com', 'Australia', '64445', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum', 'pending', '2018-05-16', 'pending'),
(21, 27, 26, '6884247', 'URAzDuWHmryaRZ2muMSHeI992bkKx1axADCN4i4U', '', '14', 2500.00, 2490.00, 'paypal', 10.00, 'fixed', 'sample', '5656565', 'sample@gmail.com', 'Australia', '565542', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum', '', '2018-05-17', 'completed'),
(22, 26, 0, '7808128', 'eALdtyuckHeIz8OmWtcOocLRjF8sN2WyHDcpP62R', '', '12', 9000.00, 8990.00, 'paypal', 10.00, 'fixed', 'john', '56416454', 'john@gmail.com', 'Afghanistan', '999656', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum', 'pending', '2018-05-17', 'completed'),
(23, 26, 0, '1698108', 'eALdtyuckHeIz8OmWtcOocLRjF8sN2WyHDcpP62R', '', '12', 520.00, 510.00, 'paypal', 10.00, 'fixed', 'keti', '73773734', 'keti@gmail.com', 'Bahrain', '5544343', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum', 'pending', '2018-05-17', 'completed'),
(24, 26, 27, '7439061', 'eALdtyuckHeIz8OmWtcOocLRjF8sN2WyHDcpP62R', '', '11', 1200.00, 1190.00, 'paypal', 10.00, 'fixed', 'Nellie', '454545555', 'test@gmail.com', 'India', '545455', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum', 'completed', '2018-05-17', 'completed'),
(25, 26, 0, '1968717', 'eALdtyuckHeIz8OmWtcOocLRjF8sN2WyHDcpP62R', '', '11', 4650.00, 4640.00, 'paypal', 10.00, 'fixed', 'Olivia', '32323232', 'Olivia@gmail.com', 'United States', '765655', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum', 'completed', '2018-05-17', 'completed'),
(26, 26, 0, '1122014', 'r1BwIxP9a4XjZVGwIO6N84gSNBlSD21WXf8GKDhJ', '', '12', 150.00, 140.00, 'stripe', 10.00, 'fixed', 'lara', '985545557', 'lara@gmail.com', 'India', '656444', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum', 'pending', '2018-05-19', 'completed'),
(27, 26, 0, '6303105', 'r1BwIxP9a4XjZVGwIO6N84gSNBlSD21WXf8GKDhJ', '', '11', 650.00, 640.00, 'stripe', 10.00, 'fixed', 'mories', '987654240', 'lorie@gmail.com', 'India', '620010', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum', 'completed', '2018-05-19', 'completed'),
(28, 26, 0, '9711417', 'r1BwIxP9a4XjZVGwIO6N84gSNBlSD21WXf8GKDhJ', '', '11', 2550.00, 2540.00, 'stripe', 10.00, 'fixed', 'james', '98555662', 'james@gmail.com', 'India', '565642', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum', 'completed', '2018-05-19', 'completed'),
(29, 27, 0, '6002540', 'r1BwIxP9a4XjZVGwIO6N84gSNBlSD21WXf8GKDhJ', '', '14', 8900.00, 8890.00, 'stripe', 10.00, 'fixed', 'john', '9955545565', 'john@gmail.com', 'Austria', '545444', 'lorem ipsum lorem ipsum', '', '2018-05-19', 'completed'),
(30, 27, 0, '5461574', 'r1BwIxP9a4XjZVGwIO6N84gSNBlSD21WXf8GKDhJ', 'tok_1CTJxQA4i5sXvQrkGpBFp4Zf', '14', 1524.00, 1514.00, 'stripe', 10.00, 'fixed', 'keli', '466565', 'keli@gmail.com', 'Argentina', '5444', 'lorem ipsum', '', '2018-05-19', 'completed'),
(31, 27, 0, '7570258', 'yqdD91ugqvNvSHQyT6w20k5MojUgwkPWljGaJSjC', 'tok_1Cb7BBA4i5sXvQrk1l76zcaY', '17', 5.00, 5.00, 'stripe', 10.00, 'fixed', 'sss', '8838393993', 'vds@dfsa.com', 'Argentina', '088844', 'dsfdas', 'completed', '2018-06-09', 'completed'),
(32, 27, 26, '4390190', 'qAaj5dh7gHKyfCjgRQWluoLARKW58iYqmk7EvRcr', '', '14', 10.00, 0.00, 'paypal', 10.00, 'fixed', 'sample', '4083939271', 'sample@gmail.com', 'Australia', '625002', 'dsfafdsa', '', '2018-06-10', 'completed'),
(33, 27, 26, '7435167', 'qAaj5dh7gHKyfCjgRQWluoLARKW58iYqmk7EvRcr', 'tok_1CbNv0A4i5sXvQrkKXJs0yvp', '14', 10.00, 0.00, 'stripe', 10.00, 'fixed', 'sample', '4083939271', 'sample@gmail.com', 'Australia', '62500', 'dsafd', '', '2018-06-10', 'completed'),
(34, 27, 0, '3643120', 'qAaj5dh7gHKyfCjgRQWluoLARKW58iYqmk7EvRcr', 'tok_1CbO2zA4i5sXvQrkueYih5ma', '14', 230.00, 220.00, 'stripe', 10.00, 'fixed', 'hendry', '938388333', 'hendry@gmail.com', 'United Kingdom', '654664', 'lorem ipsume', '', '2018-06-10', 'completed'),
(35, 27, 0, '4630533', 'qAaj5dh7gHKyfCjgRQWluoLARKW58iYqmk7EvRcr', '', '14', 135.00, 125.00, 'paypal', 10.00, 'fixed', 'Mark', '8998844431', 'mark@gmail.com', 'Uzbekistan', '43343', 'lorem ipsum', '', '2018-06-10', 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `color_settings`
--

CREATE TABLE `color_settings` (
  `id` int(11) NOT NULL,
  `body_font` varchar(200) NOT NULL,
  `font_size` int(50) NOT NULL,
  `heading1` varchar(200) NOT NULL,
  `head_font1` int(50) NOT NULL,
  `heading2` varchar(200) NOT NULL,
  `head_font2` int(50) NOT NULL,
  `heading3` varchar(200) NOT NULL,
  `head_font3` int(50) NOT NULL,
  `heading4` varchar(200) NOT NULL,
  `head_font4` int(50) NOT NULL,
  `heading5` varchar(200) NOT NULL,
  `head_font5` int(50) NOT NULL,
  `heading6` varchar(200) NOT NULL,
  `head_font6` int(50) NOT NULL,
  `paragraph` varchar(200) NOT NULL,
  `para_font_size` int(50) NOT NULL,
  `list_font` varchar(200) NOT NULL,
  `list_font_size` int(50) NOT NULL,
  `theme_color` varchar(50) NOT NULL,
  `button_color` varchar(50) NOT NULL,
  `link_color` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `color_settings`
--

INSERT INTO `color_settings` (`id`, `body_font`, `font_size`, `heading1`, `head_font1`, `heading2`, `head_font2`, `heading3`, `head_font3`, `heading4`, `head_font4`, `heading5`, `head_font5`, `heading6`, `head_font6`, `paragraph`, `para_font_size`, `list_font`, `list_font_size`, `theme_color`, `button_color`, `link_color`) VALUES
(1, 'Montserrat', 16, 'Montserrat', 42, 'Montserrat', 28, 'Montserrat', 24, 'Montserrat', 18, 'Montserrat', 14, 'Montserrat', 12, 'Montserrat', 14, 'Montserrat', 14, '#2DB3BB', '#FF533D', '#FFFFFF');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_images`
--

CREATE TABLE `gallery_images` (
  `imgid` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `subtitle` varchar(200) NOT NULL,
  `galleryimage` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery_images`
--

INSERT INTO `gallery_images` (`imgid`, `title`, `subtitle`, `galleryimage`) VALUES
(13, 'Emergencies', 'Lorem ipsum lorem ipsum', '1528161467.jpeg'),
(14, 'Education', 'Lorem ipsum lorem ipsum', '1528161286.jpeg'),
(15, 'Competitions', 'Lorem ipsum lorem ipsum', '1528161188.jpeg'),
(16, 'Community', 'Lorem ipsum lorem ipsum', '1528161085.jpeg'),
(17, 'Charity', 'Lorem ipsum lorem ipsum', '1528160798.jpg'),
(18, 'Business', 'Lorem ipsum lorem ipsum', '1528160575.jpeg'),
(19, 'Animals', 'Lorem ipsum lorem ipsum', '1528160468.jpeg'),
(20, 'Events', 'Lorem ipsum lorem ipsum', '1528161615.jpeg'),
(21, 'Faith', 'Lorem ipsum lorem ipsum', '1528161736.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `page_id` int(11) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `post_slug` varchar(500) NOT NULL,
  `page_desc` text NOT NULL,
  `home_page_box` int(50) NOT NULL,
  `home_box_icon` varchar(200) NOT NULL,
  `photo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `page_title`, `post_slug`, `page_desc`, `home_page_box`, `home_box_icon`, `photo`) VALUES
(1, 'About Us', 'about-us', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. <br/><br/>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.<br/><br/>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 0, '', '1525758618.jpg'),
(4, 'Contact Us', 'contact-us', 'If you already know about the activities and our reputation, please contact us', 0, '', ''),
(8, 'Give Donation', 'give-donation', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. <br/><br/>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.<br/><br/>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 1, 'fa-paypal', ''),
(9, 'Become Volunteer', 'become-volunteer', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. <br/><br/>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.<br/><br/>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 1, 'fa-heart', ''),
(10, 'Give Scholarship', 'give-scholarship', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. <br/><br/>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.<br/><br/>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 1, 'fa-graduation-cap', '');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(200) NOT NULL,
  `post_slug` varchar(500) NOT NULL,
  `post_desc` longtext NOT NULL,
  `post_tags` text NOT NULL,
  `post_type` varchar(50) NOT NULL,
  `post_seat_space` int(200) NOT NULL,
  `post_parent` int(100) NOT NULL,
  `post_comment_type` varchar(100) NOT NULL,
  `post_media_type` varchar(50) NOT NULL,
  `post_image` varchar(200) NOT NULL,
  `post_start_date` datetime NOT NULL,
  `post_end_date` datetime NOT NULL,
  `post_location` text NOT NULL,
  `post_phone` varchar(200) NOT NULL,
  `post_website` varchar(200) NOT NULL,
  `post_email` varchar(200) NOT NULL,
  `post_user_id` int(200) NOT NULL,
  `post_audio` varchar(200) NOT NULL,
  `post_video` varchar(200) NOT NULL,
  `post_date` datetime NOT NULL,
  `post_staff_type` varchar(50) NOT NULL,
  `post_facebook` varchar(200) NOT NULL,
  `post_twitter` varchar(200) NOT NULL,
  `post_gplus` varchar(200) NOT NULL,
  `post_youtube` varchar(200) NOT NULL,
  `post_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_title`, `post_slug`, `post_desc`, `post_tags`, `post_type`, `post_seat_space`, `post_parent`, `post_comment_type`, `post_media_type`, `post_image`, `post_start_date`, `post_end_date`, `post_location`, `post_phone`, `post_website`, `post_email`, `post_user_id`, `post_audio`, `post_video`, `post_date`, `post_staff_type`, `post_facebook`, `post_twitter`, `post_gplus`, `post_youtube`, `post_status`) VALUES
(41, 'e', 'e', 'fdsa', '', 'comment', 0, 40, 'event', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', 'admin@admin.com', 0, '', '', '2017-10-27 02:48:29', '', '', '', '', '', '0'),
(42, 'Cleaning Service For Your Home', 'cleaning-service-for-your-home', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse', 'cleaning service,home cleaning,home service,service', 'blog', 0, 0, '', 'image', '1515198101.jpeg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', 0, '', '', '2018-05-08 11:30:07', '', '', '', '', '', '1'),
(43, 'Car Repair & Services', 'car-repair-services', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'car service,car repair,service', 'blog', 0, 0, '', 'image', '1515199121.jpeg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', 0, '', '', '2018-01-11 00:12:18', '', '', '', '', '', '1'),
(44, 'Yoga Classes at Home', 'yoga-classes-at-home', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'yoga classes,yoga,classes', 'blog', 0, 0, '', 'image', '1515199716.jpeg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', 0, '', '', '2018-01-06 00:48:37', '', '', '', '', '', '1'),
(46, 'Test', 'test', 'test message', '', 'comment', 0, 44, 'blog', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', 'admin@admin.com', 1, '', '', '2018-01-10 17:10:45', '', '', '', '', '', '0'),
(47, 'nice post', 'nice-post', 'test message', '', 'comment', 0, 44, 'blog', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', 'admin@admin.com', 1, '', '', '2018-01-10 23:50:29', '', '', '', '', '', '1'),
(48, 'Electric service', 'electric-service', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse', 'electric,service', 'blog', 0, 0, '', 'video', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', 0, '', 'https://www.youtube.com/watch?v=2MpUj-Aua48', '2018-05-08 11:30:24', '', '', '', '', '', '1'),
(49, 'Laundry Service', 'laundry-service', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse', 'laundry,service', 'blog', 0, 0, '', 'video', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', 0, '', 'https://vimeo.com/136612872', '2018-05-08 11:30:16', '', '', '', '', '', '1'),
(50, 'test mp3 file', 'test-mp-file', 'test', 'test,test1,test2', 'blog', 0, 0, '', 'mp3', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', 0, '1525779758.SampleAudio_0.4mb.mp3', '', '2018-05-08 11:42:38', '', '', '', '', '', '1'),
(51, 'Mories', 'mories', 'very good post really enjoy that.', '', 'comment', 0, 48, 'blog', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', 'admin@admin.com', 1, '', '', '2018-05-08 12:50:53', '', '', '', '', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `site_desc` text NOT NULL,
  `site_keyword` text NOT NULL,
  `site_blog_ads` text NOT NULL,
  `site_address` text NOT NULL,
  `site_phone` varchar(200) NOT NULL,
  `site_email` varchar(200) NOT NULL,
  `site_facebook` varchar(255) NOT NULL,
  `site_twitter` varchar(255) NOT NULL,
  `site_gplus` varchar(255) NOT NULL,
  `site_pinterest` varchar(255) NOT NULL,
  `site_instagram` varchar(255) NOT NULL,
  `site_currency` varchar(255) NOT NULL,
  `site_logo` varchar(255) NOT NULL,
  `site_favicon` varchar(255) NOT NULL,
  `site_banner` varchar(255) NOT NULL,
  `site_banner_heading` varchar(1000) NOT NULL,
  `site_banner_subheading` varchar(1000) NOT NULL,
  `site_button_text` varchar(200) NOT NULL,
  `site_button_url` varchar(1000) NOT NULL,
  `header_type` varchar(50) NOT NULL,
  `site_copyright` varchar(255) NOT NULL,
  `site_post_per` int(50) NOT NULL,
  `site_gallery_per` int(50) NOT NULL,
  `site_category_per` int(100) NOT NULL,
  `site_campaigns_per` int(50) NOT NULL,
  `bank_payment` text NOT NULL,
  `paypal_id` varchar(255) NOT NULL,
  `paypal_url` varchar(255) NOT NULL,
  `stripe_mode` varchar(50) NOT NULL,
  `test_publish_key` varchar(200) NOT NULL,
  `test_secret_key` varchar(200) NOT NULL,
  `live_publish_key` varchar(200) NOT NULL,
  `live_secret_key` varchar(200) NOT NULL,
  `commission_mode` varchar(100) NOT NULL,
  `commission_amt` int(255) NOT NULL,
  `payment_option` varchar(255) NOT NULL,
  `withdraw_option` varchar(255) NOT NULL,
  `withdraw_amt` int(200) NOT NULL,
  `day_before_withdraw` int(100) NOT NULL,
  `processing_fee` int(255) NOT NULL,
  `site_map_api` varchar(800) NOT NULL,
  `site_url` varchar(100) NOT NULL,
  `site_vimeo` varchar(1000) NOT NULL,
  `image_size` int(255) NOT NULL,
  `video_size` int(255) NOT NULL,
  `image_type` varchar(200) NOT NULL,
  `mp3_size` int(200) NOT NULL,
  `site_loading` int(50) NOT NULL,
  `site_loading_url` varchar(200) NOT NULL,
  `site_primary_color` varchar(200) NOT NULL,
  `site_home_boxes` int(50) NOT NULL,
  `site_approve_campaigns` int(50) NOT NULL,
  `min_amt_campaign` int(200) NOT NULL,
  `max_amt_campaign` int(200) NOT NULL,
  `min_amt_donation` int(200) NOT NULL,
  `max_amt_donation` int(200) NOT NULL,
  `withdraw_payment_type` varchar(50) NOT NULL,
  `withdraw_paypal_id` varchar(200) NOT NULL,
  `withdraw_stripe_id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `site_desc`, `site_keyword`, `site_blog_ads`, `site_address`, `site_phone`, `site_email`, `site_facebook`, `site_twitter`, `site_gplus`, `site_pinterest`, `site_instagram`, `site_currency`, `site_logo`, `site_favicon`, `site_banner`, `site_banner_heading`, `site_banner_subheading`, `site_button_text`, `site_button_url`, `header_type`, `site_copyright`, `site_post_per`, `site_gallery_per`, `site_category_per`, `site_campaigns_per`, `bank_payment`, `paypal_id`, `paypal_url`, `stripe_mode`, `test_publish_key`, `test_secret_key`, `live_publish_key`, `live_secret_key`, `commission_mode`, `commission_amt`, `payment_option`, `withdraw_option`, `withdraw_amt`, `day_before_withdraw`, `processing_fee`, `site_map_api`, `site_url`, `site_vimeo`, `image_size`, `video_size`, `image_type`, `mp3_size`, `site_loading`, `site_loading_url`, `site_primary_color`, `site_home_boxes`, `site_approve_campaigns`, `min_amt_campaign`, `max_amt_campaign`, `min_amt_donation`, `max_amt_donation`, `withdraw_payment_type`, `withdraw_paypal_id`, `withdraw_stripe_id`) VALUES
(1, 'DonateMe', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat', 'lorem,ipsum,lorem,ipsum', '&lt;img src=&quot;http://localhost/donateme/local/images/advertisement.jpg&quot; class=&quot;img-responsive&quot; alt=&quot;&quot;&gt;', '1657 Riverside Drive Redding, Headquarters 1120 N Street Sacramento. London', '9876543210', 'test@test.com', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.google.com', 'http://www.pinterest.com', 'http://www.instagram.com', 'USD', '1528620572.png', '1528620679.png', '1525659242.jpg', 'DONATE', 'Together we can make a difference', 'Donate Now', 'all-campaigns', 'static', '© 2018. All Rights Reserved. Designed by Avigher', 20, 20, 20, 21, 'Bank Name: My Sample Bank<br/>\r\nAccount Number: 123456789<br/>\r\nTTD : 00001', 'test@test123.com', 'https://www.sandbox.paypal.com/cgi-bin/webscr', 'test', 'pk_test_bWx1fEQgVZozaQyPZpAjwDMQ', 'sk_test_JKf2bTvOtK7fPFrHoMphlvAV', 'pk_live_fdsafsa', 'sk_live_dafdsfdsadfsa', 'fixed', 10, 'paypal,stripe', 'paypal,stripe', 10, 5, 3, 'AIzaSyDDsvwtCM8LTvi1Zm-XydV-iutWZzAJVDI', 'http://localhost/donateme', 'https://vimeo.com/182764140', 2048, 1024, 'jpg,jpeg,png,gif', 3000, 1, '1525622636.gif', '#F45302', 1, 1, 100, 100000, 5, 100000, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `description`, `image`) VALUES
(3, 'Era', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '1525740842.jpg'),
(6, 'Leyoo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '1525740596.jpg'),
(7, 'Mosie', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '1525740725.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `withdraw_payment_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `withdraw_paypal_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `withdraw_stripe_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `post_slug`, `email`, `password`, `provider`, `provider_id`, `gender`, `country`, `address`, `phone`, `photo`, `admin`, `remember_token`, `created_at`, `updated_at`, `withdraw_payment_type`, `withdraw_paypal_id`, `withdraw_stripe_id`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', '$2y$10$N0gRNGGDLxwqUJqZLhYpiO70S5i1xKbmDhTE4LnhgjJb/DOrStSU6', '', '', '', '', '', '9876543210', '', 1, 'Jc5GG2km8mk0lB6TrbEb6fwBbqUllmVJuG1xoUuP98mIpkK1HOhgJMMlsPtp', '2017-05-25 01:30:45', '2017-05-25 01:30:45', '', '', ''),
(26, 'sample', 'sample', 'sample@gmail.com', '$2y$10$pn9zaI6EL1tP7GbAQgnZmeR6oka.Jn50auhCsWYKQXmCAnPzxABfu', '', '', 'male', 'Australia', '', '5656565', '1525914313.jpg', 0, 'DrixbB1Eqhy91xBvWvs187mBVbttFfpGluHgHP6IbeWZyd82bpjdBkjesChP', '2018-05-09 18:51:05', '2018-05-09 18:51:05', 'paypal', 'sample@well.com', ''),
(27, 'Nellie', 'nellie', 'nellie@gmail.com', '$2y$10$BvQ32EklVmF..DQYaAFNP.x3qoimmEYf1XXJ6LbZXxILhn8Da1ytq', '', '', 'female', 'India', '', '454545555', '1526525033.jpeg', 0, 'vD9WC351BLaaL8atkHuwTDHQCIQWzCT8oMzxGIscPCEDYvYgSGmPG4QbBsSd', NULL, NULL, 'stripe', '', 'new@stripe.com'),
(28, 'new', 'new', 'new@gmail.com', '$2y$10$XCk984Qh0y6YvUW8N4X5wOvKFb99uHJxHBqkB/sMk3.lhrFu1LHOS', '', '', 'male', 'Azerbaijan', '', '5454545', '', 0, 'KXj0xX98bunuNSVZKObKMvroYHObbZpDlx3aD4yd1dK9bwpp23JXQXMvnMmH', '2018-06-04 19:25:08', '2018-06-04 19:25:08', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawal`
--

CREATE TABLE `withdrawal` (
  `wid` int(11) NOT NULL,
  `user_id` int(200) NOT NULL,
  `camp_id` int(200) NOT NULL,
  `amount` varchar(200) NOT NULL,
  `withdraw_date` date NOT NULL,
  `withdraw_payment_type` varchar(50) NOT NULL,
  `withdraw_payment_id` varchar(200) NOT NULL,
  `withdraw_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `withdrawal`
--

INSERT INTO `withdrawal` (`wid`, `user_id`, `camp_id`, `amount`, `withdraw_date`, `withdraw_payment_type`, `withdraw_payment_id`, `withdraw_status`) VALUES
(1, 26, 11, '9010', '2018-06-08', 'paypal', 'sample@well.com', 'completed'),
(2, 26, 12, '9640', '2018-06-08', 'paypal', 'sample@well.com', 'pending'),
(3, 27, 17, '5', '2018-06-09', 'stripe', 'new@stripe.com', 'completed');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`camp_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `color_settings`
--
ALTER TABLE `color_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_images`
--
ALTER TABLE `gallery_images`
  ADD PRIMARY KEY (`imgid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawal`
--
ALTER TABLE `withdrawal`
  ADD PRIMARY KEY (`wid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `camp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `color_settings`
--
ALTER TABLE `color_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `gallery_images`
--
ALTER TABLE `gallery_images`
  MODIFY `imgid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `withdrawal`
--
ALTER TABLE `withdrawal`
  MODIFY `wid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
