-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 29, 2025 at 10:34 AM
-- Server version: 10.5.29-MariaDB
-- PHP Version: 8.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `a985587_propertyroogntadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `mob_image` varchar(500) NOT NULL,
  `about_head` text NOT NULL,
  `about` text NOT NULL,
  `property_type` varchar(255) NOT NULL,
  `creation_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `image`, `mob_image`, `about_head`, `about`, `property_type`, `creation_on`) VALUES
(1, 'uploads/about/1742539331_1538 x 910.png', 'uploads/about/1742557349_390 x 962.jpg', 'JOIN THE LALIT ROONGTA GROUP FAMILY', '<p>MEET MR. LALIT ROONGTA: A Visionary Entrepreneur Founder &amp; Managing Director, Lalit Roongta Group Mr. Lalit Roongta&#39;s entrepreneurial journey began with humble roots, but his passion for quality, craftsmanship, and community development has propelled him to the forefront of Nashik&#39;s real estate landscape. With a career spanning over two decades, Mr. Roongta has established himself as a respected leader in the industry. Under his leadership, Lalit Roongta Group has grown exponentially, with a portfolio of over 250 completed projects and a reputation for delivering exceptional quality, transparency, and customer satisfaction. Mr. Roongta&#39;s commitment to excellence has earned him numerous accolades and recognition within the industry. A Legacy of Community Development Mr. Roongta&#39;s vision extends beyond mere brick-and-mortar development. He has been instrumental in nurturing over 200 families and generating significant employment opportunities, enriching the fabric of Nashik. His mission, &quot;हमारासपना, हरनाशिककरकाघरऔरदुकानहोअपना&quot; (Our dream, for every Nashikite to own their home and shop), has become a guiding light for the company.</p>', 'residential', '2025-02-18 12:06:10'),
(2, 'uploads/about/1742539477_1538 x 910.png', 'uploads/about/1742557359_390 x 962.jpg', 'JOIN THE LALIT ROONGTA GROUP FAMILY', '<p>MEET MR. LALIT ROONGTA: A Visionary Entrepreneur Founder &amp; Managing Director, Lalit Roongta Group Mr. Lalit Roongta&#39;s entrepreneurial journey began with humble roots, but his passion for quality, craftsmanship, and community development has propelled him to the forefront of Nashik&#39;s real estate landscape. With a career spanning over two decades, Mr. Roongta has established himself as a respected leader in the industry. Under his leadership, Lalit Roongta Group has grown exponentially, with a portfolio of over 250 completed projects and a reputation for delivering exceptional quality, transparency, and customer satisfaction. Mr. Roongta&#39;s commitment to excellence has earned him numerous accolades and recognition within the industry. A Legacy of Community Development Mr. Roongta&#39;s vision extends beyond mere brick-and-mortar development. He has been instrumental in nurturing over 200 families and generating significant employment opportunities, enriching the fabric of Nashik. His mission, &quot;हमारासपना, हरनाशिककरकाघरऔरदुकानहोअपना&quot; (Our dream, for every Nashikite to own their home and shop), has become a guiding light for the company.</p>', 'commercial', '2025-03-05 15:53:34');

-- --------------------------------------------------------

--
-- Table structure for table `about_developer`
--

CREATE TABLE `about_developer` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `section_name` text NOT NULL,
  `section_head` text NOT NULL,
  `dev_head` varchar(255) NOT NULL,
  `dev_describ` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_developer`
--

INSERT INTO `about_developer` (`id`, `project_id`, `section_name`, `section_head`, `dev_head`, `dev_describ`, `created_at`) VALUES
(4, 13, 'Developer', 'About the Developer', 'Lalit Roongta Group Global Lifestyle Developer', 'Materializing these dreams in the most uncompromising, qualitative, and timely manner is what the Lalit Roongta Group has been doing since its inception in 1996', '2025-03-27 06:01:33'),
(5, 14, 'DEVELOPER', 'About the Developer', 'Lalit Roongta Group Global Lifestyle Developer', 'Materializing these dreams in the most uncompromising, qualitative, and timely manner is what the Lalit Roongta Group has been doing since its inception in 1996', '2025-03-27 09:48:26'),
(8, 18, 'DEVELOPER', 'About the Developer', 'Lalit Roongta Group Global Lifestyle Developer', 'Materializing these dreams in the most uncompromising, qualitative, and timely manner is what the Lalit Roongta Group has been doing since its inception in 1996', '2025-04-08 06:59:40');

-- --------------------------------------------------------

--
-- Table structure for table `about_developer_projects`
--

CREATE TABLE `about_developer_projects` (
  `id` int(11) NOT NULL,
  `about_developer_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `dev_title` varchar(255) NOT NULL,
  `dev_description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_developer_projects`
--

INSERT INTO `about_developer_projects` (`id`, `about_developer_id`, `project_id`, `dev_title`, `dev_description`, `created_at`) VALUES
(8, 4, 13, '100+', 'Awards Received', '2025-03-27 06:01:33'),
(9, 4, 13, '39,400', 'Homes Delivered', '2025-03-27 06:01:33'),
(10, 4, 13, '28,000+', 'Under Development', '2025-03-27 06:01:33'),
(11, 5, 14, '100+', 'Awards Received', '2025-03-27 09:48:26'),
(12, 5, 14, '39,400', 'Homes Delivered', '2025-03-27 09:48:26'),
(13, 5, 14, '28,000+', 'Under Development', '2025-03-27 09:48:26'),
(27, 8, 18, '100+', 'Awards Received', '2025-04-08 06:59:40'),
(28, 8, 18, '39,400', 'Homes Delivered', '2025-04-08 06:59:40'),
(29, 8, 18, '28,000+', 'Under Development', '2025-04-08 06:59:40');

-- --------------------------------------------------------

--
-- Table structure for table `about_property`
--

CREATE TABLE `about_property` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `prop_name` varchar(255) NOT NULL,
  `about_title` text NOT NULL,
  `about_description` text NOT NULL,
  `discount_line` varchar(255) DEFAULT NULL,
  `brochure` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `prop_launching` text NOT NULL,
  `about_sub_description` text NOT NULL,
  `maha_rera_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_property`
--

INSERT INTO `about_property` (`id`, `project_id`, `prop_name`, `about_title`, `about_description`, `discount_line`, `brochure`, `created_at`, `prop_launching`, `about_sub_description`, `maha_rera_no`) VALUES
(8, 13, 'Roongta Elegante', 'Experience the perfect blend of modern living, desirable amenities, and affordability at Roongta Elegante. Our 2/3BHK apartments are designed to seamlessly merge comfort and convenience, offering a well-appointed lifestyle that elevates your everyday experience.', 'Welcome home to a truly fulfilling living experience!', '', 'uploads/brochures/1744094014_qrcode1692777738 (1).png', '2025-03-27 05:25:56', 'READY POSSESSION ', '<p>Spread across 3 elegant wings, each rising 13 storeys high, our project boasts amenities on both podium and terrace levels, providing the perfect setting for relaxation, recreation, and community bonding. At Roongta Elegante, we believe that luxury living shouldn&#39;t break the bank. Thats why we have designed our homes to be affordable, without compromising on quality. Enjoy the perks of a stylish and comfortable home, complete with a range of amenities that make life easier and more enjoyable.&nbsp;</p>\r\n', 'P51600033975'),
(9, 14, 'Roongta Florenza', 'Roongta Florenza is a thoughtfully crafted residential and commercial project offering premium 2 & 3 BHK homes and shops. Located in a serene pocket of the city, it seamlessly blends elegance, comfort, and everyday practicality.', 'Where serenity meets sophistication', '', 'uploads/brochures/1744094094_florenza qr.png', '2025-03-27 09:38:07', 'READY POSSESSION ', 'Crafted with a vision to bring peace, warmth, and luxury into daily life, Roongta Florenza is more than just a home - it Is a tranquil retreat within the city. Every residence is designed to capture natural light and breeze through spacious layouts and large windows. Surrounded by lush gardens and upscale amenities, Florenza creates an experience that feels far removed from the city&#39;s chaos, yet keeps you well connected. Whether you are looking for a refined lifestyle or a smart commercial space, Roongta Florenza is where your search ends.', 'P51600033635'),
(13, 18, 'Roongta Preciso', 'Fulfilling the promise of always providing something innovative, Roongta Preciso a luxurious, premium, exclusively 3 BHK flats project is one to provide homes where living life would be a pure bliss. Spread across 2 elegant wings, each rising 7 storeys high, this stunning project boasts an array of luxurious amenities, including exclusive terrace amenities that truly touch the sky.', 'Not just a home, a lifestyle of elegance', '', 'uploads/brochures/1744094902_presico qr.png', '2025-04-08 06:48:22', 'READY POSSESSION ', '<p>With something for every age group, the terrace amenities feature an artificial party lawn, a stage, reading alcove, yoga deck, table games, and much more! Experiencing nature from height, in the most unfiltered and unhindered manner, is bound to give you a relaxing, and a calming, experience, to unwind at the end of the day. Located in Nashik&rsquo;s premium and preferred location &ndash; Serene Meadows, Gangapur Road, Preciso is in the proximity of all essential services a family looks for, when looking to settle. The extra spacious rooms offer a lavish and comfortable living space, making Roongta Preciso the perfect blend of comfort, elegance, and utility!</p>\r\n', 'P51600046804'),
(14, 19, 'Roongta Ashok Vihar', 'Roongta Ashok Vihar, an exclusive, 3BHK, stand-alone, residential project, located in one of Nashiks fastest developing and prime locations (near city centre mall) is a project that becomes one with luxury! Along a 9m wide road, this apartment comes with the most thoughtfully designed 3BHK units that flaunt an individual balcony, allotted parking, spacious rooms, and quality construction.', 'Live Grand, Live Spacious only at Roongta Ashok Vihar', '', 'uploads/brochures/1744181103_qrcode1692777781-ashokvihar.png', '2025-04-09 06:45:03', 'READY POSSESSION ', 'With only 2 units on each floor, this 7 storey project, is everything a growing family can want! It grants luxury, comfort, space, security, and privacy; and all this comes with the added benefit of being a project of the Lalit Roongta Group. Trusted for its tradition of providing luxury at affordable costs, without compromising on quality, and before the committed time, investing with Lalit Roongta Group, in Ashok Vihar, is a move that can never go wrong.\r\n', 'P516000 46725'),
(15, 21, 'Shree Tirumala Magnus', 'Experience the perfect fusion of luxury, craftsmanship, and trust at Magnus, our exclusively 3 BHK residential apartments, where your dream of a lavish lifestyle becomes a breathtaking reality. And step into the epitome of luxury living here, masterfully crafted to exceed your expectations. ', '', '', 'uploads/brochures/1744613147_magnus-qr.webp', '2025-04-14 06:45:47', 'READY POSSESSION ', 'This 7 storey, 9mtr road front, stand-alone project, which is in close vicinity of Indira Nagar jogging track is ideal in all aspects; be it easy access to essential services comprising of schools, colleges, hospitals, markets, places of worship and entertainment. With only 4 flats on one floor, this apartment has been designed to ensure privacy is maintained without compromising the feeling of community. Shree Tirumala Magnus, is truly a dream come true for people seeking luxury in Indira Nagar\r\n', 'P51600052650'),
(16, 22, 'Roongta Futurex', 'Easy to access, great visibility, and attractive rent!', 'The Rent Festival has begun at Roongta Futurex! ', '', 'uploads/brochures/1745042823_futurex-qrcode.png', '2025-04-19 06:07:03', 'Get Shops or Offices starting from just Rs.6000*/Month', 'Big Opportunity, Small Rent &ndash; The perfect space for your business!&nbsp;Contact us today and start your business at the perfect location!&nbsp; Roongta FUTUREX - The perfect business destination at RD Circle, Govind Nagar! This iconic 9-storey, 100 ft. road-facing commercial hub offers 500+ units ideal for everything from luxury retail to BPOs. With spacious lobbies, CCTV surveillance, 2-level basement parking, visitor parking, 4 lifts, and flexible workspaces, it is built for growth. Its prime location near major roads and Ozar Airport makes it highly accessible. Plus, a mix of diverse businesses under one roof opens doors for collaboration and expansion.\r\n', 'P51600029167'),
(17, 23, 'Shree Ramlalla Niwas', 'Shree Ramlalla Niwas is a project that offers exclusively 2BHK luxury homes, spanning 4 floors, of 6 beautifully designed structures; and 31 units of shops facing an 18m and a 9m wide road.', 'Bringing Luxury Within Reach', '', 'uploads/brochures/1745044340_ramlalla-qrcode.png', '2025-04-19 06:32:20', 'READY POSSESSION ', 'One among the series of pre-existing projects, all named in one way or another, in relation to the holy Hindu scripture - Ramayana, Ramlalla is a project that not only matches but also supersedes these infrastructures with respect to the provision of amenities through the inclusion of updated use of technology, material, and design.\r\n\r\nWith 14+ elegantly designed amenities, and close proximity to multiple educational institutions, Shree Ramlalla Niwas is ideal for a family looking to provide stability to their child in his/her educational journey; and lead a sustainably luxurious lifestyle, at Indira Nagar Annex.&nbsp;\r\n', 'P51600045450');

-- --------------------------------------------------------

--
-- Table structure for table `about_property_details`
--

CREATE TABLE `about_property_details` (
  `id` int(11) NOT NULL,
  `about_property_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_property_details`
--

INSERT INTO `about_property_details` (`id`, `about_property_id`, `project_id`, `title`, `description`, `created_at`) VALUES
(9, 8, 13, 'AED 2.25M', 'Starting From', '2025-03-27 05:25:56'),
(10, 8, 13, '20%', 'Down Payment', '2025-03-27 05:25:56'),
(11, 8, 13, 'Q4 2027', 'Completion', '2025-03-27 05:25:56'),
(12, 9, 14, 'AED 2.25M', 'Starting From', '2025-03-27 09:38:07'),
(13, 9, 14, '20%', 'Down Payment', '2025-03-27 09:38:07'),
(14, 9, 14, 'Q4 2027', 'Completion', '2025-03-27 09:38:07');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `phone_img` text NOT NULL,
  `title` text NOT NULL,
  `property_type` varchar(255) NOT NULL,
  `status` text NOT NULL,
  `creation_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `image`, `phone_img`, `title`, `property_type`, `status`, `creation_on`) VALUES
(1, 'uploads/banner/Landing Page.jpg', 'uploads/banner/Landing Page Mobile.jpg', 'INVEST IN THE WORLD\'S FASTEST GROWING REAL ESTATE', 'residential', 'Active', '2025-02-17 15:48:19'),
(2, 'uploads/banner/Landing Page.jpg', 'uploads/banner/Landing Page Mobile.jpg', 'INVEST IN THE WORLD\'S FASTEST GROWING REAL ESTATE', 'commercial', 'Active', '2025-03-05 15:24:45');

-- --------------------------------------------------------

--
-- Table structure for table `contact_details`
--

CREATE TABLE `contact_details` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `youtube` text NOT NULL,
  `facebook` text NOT NULL,
  `linkdin` text NOT NULL,
  `instagram` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_details`
--

INSERT INTO `contact_details` (`id`, `project_id`, `address`, `email`, `contact`, `youtube`, `facebook`, `linkdin`, `instagram`, `created_at`) VALUES
(5, 19, 'Roongta Supremus, Near Chandak Circle, Tidke Colony, Nashik', 'connect@roongtagroup.co.in', '7770002222', 'https://www.youtube.com/channel/UCLNoZcZaje38XEfxrP8V48A', 'https://www.facebook.com/Roongtagroup', '', 'https://www.instagram.com/lalitroongtagroup/', '2025-04-09 07:06:48');

-- --------------------------------------------------------

--
-- Table structure for table `gov_details`
--

CREATE TABLE `gov_details` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `heading` varchar(500) NOT NULL,
  `qr_img` varchar(500) NOT NULL,
  `gov_logo` varchar(500) NOT NULL,
  `gov_link` varchar(500) NOT NULL,
  `maha_rera_no` varchar(500) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gov_details`
--

INSERT INTO `gov_details` (`id`, `project_id`, `heading`, `qr_img`, `gov_logo`, `gov_link`, `maha_rera_no`, `created_at`) VALUES
(2, 13, 'Scan the QR code to view property details, and more!', 'uploads/gov_details/1743057040_qrcode1692777738.png', 'uploads/gov_details/1743057040_rera_logo.png', 'Maharera.mahaonline.gov.in', 'P51600033975', '2025-03-27 06:30:40'),
(3, 14, 'Scan the QR code to view property details, and more!', 'uploads/gov_details/1743069173_qrcode1692777849.png', 'uploads/gov_details/1743069173_rera_logo.png', 'Maharera.mahaonline.gov.in', 'P516000 33635', '2025-03-27 09:52:53');

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`id`, `full_name`, `email`, `phone`, `message`, `slug`, `created_at`) VALUES
(22, 'Dr. Janakkii Naik', 'Janakkiiparag@gmail.com', '9623892763', 'I want to buy a new 2bhk 3bhk flat in my budget.My budget is 35lakhs max to max 40lakhs', 'roongta-ashok-vihar', '2025-04-18 07:01:48'),
(23, 'sumit chavan', 'sumitchavan1192@yahoo.com', '8855913103', '', 'roongta-ashok-vihar', '2025-04-19 04:13:27'),
(24, 'Dhananjay mulay', 'dhananjay8315@rediffmail.com', '9922420453', '', 'roongta-ashok-vihar', '2025-04-19 09:44:26'),
(25, 'BHASKAR MUNNU YADAV', 'ybhaskar093@gmail.com', '+919762593507', 'Not much more money but my dream only 2 BHK flat below or equal to 20L then call me otherwise forgot to me', 'roongta-ashok-vihar', '2025-04-20 02:18:26'),
(26, 'Avinash Naik', 'avinaik150220@gmail.com', '7499568943', 'We want to book 3 BHK in Nasik. Requested to share your ongoing projects. We want to meet in person. Currently we are leaving in Jalgaon', 'roongta-ashok-vihar', '2025-04-20 13:53:16'),
(27, 'Kiran', 'hypnokiran@gmail.com', '9922785251', 'Want details of 2BHK AND 3BHK HOMES', 'roongta-elegante', '2025-04-21 16:34:05'),
(29, 'Anuradha Avinash Shete', 'anuradhaashete212@gmail.com', '9850912931', 'Please send me Shop\'s &amp; flats details for panchvati area', 'roongta-elegante', '2025-04-22 04:04:16'),
(30, 'samir shaikh', 'Shaikhsamir42001@gmail.com', '9226426264', 'I want to buy 2 Bhk flat', 'roongta-elegante', '2025-04-23 15:52:31'),
(31, 'Sandeep', 'khalkarsandeep@rediffmail.com', '+919096376256', '3bhk flat required', 'roongta-florenza', '2025-04-26 14:53:34'),
(32, 'Priyanka Shelke Patil', 'priyanka.sk99@gmail.com', '9226983660', 'Looking for ready to move in 2 bhk flat', 'roongta-elegante', '2025-04-27 07:13:04'),
(34, 'Sagar Wagh', 'sagarbwagh24@gmail.com', '74481713213', 'Looking for 2/3 BHK Flat near to Khutwadnagar, Nashik', 'roongta-elegante', '2025-04-30 09:30:23'),
(35, 'Somnath talkute Talkute', 'madhavitalkute092@gmail.com', '+9184119926852', 'Hi amhala parvdel as Ghar pahije', 'roongta-florenza', '2025-04-30 17:43:50'),
(37, 'Madhavi talkute', 'madhavitalkute092@gmail.com', '9067415165', '', 'roongta-florenza', '2025-04-30 17:44:33'),
(39, 'Rakesh Gaur', 'rakeshgaur3010@gamail.com', '9713003887', '', 'roongta-elegante', '2025-05-01 08:14:59'),
(40, 'Shobai badwad', 'badwadgirish@gmail.com', '+44919309141240', '', 'roongta-florenza', '2025-05-01 10:35:18'),
(43, 'Rajshree sonar', 'sonarr289@gmail.com', '8805608589', 'Security ke job chahiye', 'roongta-preciso', '2025-05-02 03:44:35'),
(44, 'Pruthviraj sharad kapadnis', 'pruthviraaj2005@gmil.com', '9146070161', '', 'roongta-florenza', '2025-05-02 09:38:13'),
(49, 'Aachal deshmukh', 'deshmukhaachal07@gmail.com', '8975610872', '', 'roongta-elegante', '2025-05-03 04:53:19'),
(50, 'Kaushal', 'kaushaldandgavhal2003@gmail.com', '08530839173', '', 'roongta-elegante', '2025-05-03 10:07:33'),
(51, 'Amol pawar', 'pawaramol339@gmail.com', '8552056294', 'Looking for 3 bhk', 'roongta-elegante', '2025-05-04 05:35:17'),
(52, 'Amol pawar', 'pawaramol339@gmail.com', '8552056294', 'Looking for 3 bhk', 'roongta-elegante', '2025-05-04 05:35:18'),
(53, 'Jitesh', 'jiteshbehera123@gmail.com', '9966012877', 'I am looking for a ready to move home', 'shree-tirumala-magnus', '2025-05-05 01:47:17'),
(54, 'Suraj Londhe', 'sl9705990@gmail.com', '96371 41817', 'Hello mene bi list m name lik diya hey', 'roongta-florenza', '2025-05-05 03:09:24'),
(55, 'Mona Raje', 'rajemona92@gmail.com', '8263060893', '3bhk specious with proper vastu build home', 'roongta-preciso', '2025-05-05 06:06:30'),
(56, 'Mona Raje', 'rajemona92@gmail.com', '8263060893', '3bhk specious with proper vastu build home', 'roongta-preciso', '2025-05-05 06:06:32'),
(57, 'Mona Raje', 'rajemona92@gmail.com', '8263060893', '3bhk', 'roongta-preciso', '2025-05-05 06:11:01'),
(58, 'Sunita Anil Sanap', 'sunitasanap1228@gmail.com', '+918424009109', 'Looking for residential property for self.\r\nBudget maximum - 20 lacs', 'roongta-elegante', '2025-05-05 07:23:18'),
(59, 'Sunita Anil Sanap', 'sunitasanap1228@gmail.com', '+918424009109', 'Looking for residential property for self.\r\nBudget maximum - 20 lacs \r\n1BHK with balcony', 'roongta-elegante', '2025-05-05 07:24:02'),
(60, 'Vishal Annasaheb shinde', 'mechforce109@gmail.com', '9890650610', 'Want to buy flat at this location', 'roongta-florenza', '2025-05-05 16:07:01'),
(61, 'SONAL GHUSALE', 'akshayghusale77@gmail.com', '+91 88058-41661', '', 'roongta-elegante', '2025-05-06 17:31:35'),
(62, 'Hemant amruta Gavali', 'gavalihemraj49@gmail.com', '9325468745', '', 'roongta-preciso', '2025-05-07 02:40:25'),
(63, 'Shyamlal Prajapati', 'shymlalprajapati9820@gmail.com', '9820747315', '', 'roongta-florenza', '2025-05-07 02:44:22'),
(64, 'Gajanan Ramdas thakare', 'thakaregajanan440@gmail.com', '7588078463', '', 'roongta-elegante', '2025-05-07 07:38:29'),
(65, 'Junal', 'junaljimanla@gmail.com', '9004725252', '', 'roongta-elegante', '2025-05-07 08:07:01'),
(66, 'Sachin', 'sachinkaklij88@gmail.com', '9322124730', '', 'roongta-florenza', '2025-05-07 16:48:12'),
(67, 'Rutuja Mithun Ahire', 'rutusonawane6151@gmail.com', '9503420160', '2 BhK flats chahiye...', 'roongta-florenza', '2025-05-08 07:44:05'),
(68, 'Rutuja Mithun Ahire', 'rutusonawane6151@gmail.com', '9503420160', '2 BhK flats chahiye...', 'roongta-florenza', '2025-05-08 07:44:06'),
(69, 'Rutuja Mithun Ahire', 'rutusonawane6151@gmail.com', '9503420160', '2 BhK flats chahiye...', 'roongta-florenza', '2025-05-08 07:44:48'),
(70, 'Sakshi Jire', 'jsakshi6688@gmail.com', '+918855951859', 'I am searching for a flat 1bhk or 2 bhk', 'roongta-elegante', '2025-05-09 03:58:32'),
(71, 'Sakshi Jire', 'jsakshi6688@gmail.com', '+918855951859', 'I am searching for a flat 1bhk or 2 bhk', 'roongta-elegante', '2025-05-09 03:58:33'),
(72, 'Digambar Kale', 'digambarkale7720@gmail.com', '876 707 4869', 'मला टूबीयेचके प्लांट हवा आहे कीती मंधे मीळेल आणी लोन होईल का मी नाशीक तपोवन पंचवटी मंधे राहतो आहे माझा मोबाइल नंबर 8767074869 मला याचे लोकेशन पाठवा', 'roongta-florenza', '2025-05-09 05:34:53'),
(73, 'Pankaj Sonawane', 'sonawanepankaj707@gmail.com', '9373588132', '', 'shree-tirumala-magnus', '2025-05-09 07:17:36'),
(74, 'Balasaheb Anandrao kawade', 'balasahebkawade@gmail.com', '9662394121', 'We need ready to move 2 bhk flat \r\nPlease share your cost', 'roongta-elegante', '2025-05-09 08:44:43'),
(75, 'Kokila Patil', 'kokilapatil90@gmail.com', '7588865213', '', 'roongta-florenza', '2025-05-09 10:58:47'),
(76, 'Yogesh Ashok Patil', 'yogesh4all@gmail.com', '+919673855155', 'Call me', 'roongta-florenza', '2025-05-10 07:14:14'),
(77, 'Rahul Khairnar', 'Rahulkhairnar82@gmail.com', '9922403699', 'Immediate Requirement', 'roongta-preciso', '2025-05-10 14:48:22'),
(78, 'Ramesh Pawar', 'rameshpawar202420@gmail.com', '+44918975715208', '', 'roongta-elegante', '2025-05-10 16:35:32'),
(79, 'Shabana shaikh', 'arifshikha48@gmail.com', '9226529826', '', 'roongta-preciso', '2025-05-11 02:13:08'),
(80, 'shelke r b', 'shelkerb14@gmail.com', '8180028249', '', 'shree-tirumala-magnus', '2025-05-11 02:18:36'),
(81, 'shelke r b', 'shelkerb14@gmail.com', '8180028249', '', 'shree-tirumala-magnus', '2025-05-11 02:18:38'),
(82, 'Reshma Pawar', 'nruchita99@gmail.com', '+19372391988', 'Kama sathi', 'roongta-ashok-vihar', '2025-05-11 03:03:56'),
(83, 'Anaykode Anay', 'anaykodeanay@gmail.com', '9579328513', '', 'roongta-preciso', '2025-05-11 03:53:01'),
(84, 'Anaykode Anay', 'anaykodeanay@gmail.com', '9579328513', '', 'roongta-preciso', '2025-05-11 03:53:02'),
(85, 'Anaykode Anay', 'anaykodeanay@gmail.com', '9579328513', '', 'roongta-preciso', '2025-05-11 03:53:03'),
(86, 'Shalini', 'shalini.bhatia25@gmail.com', '+917887911773', '', 'roongta-florenza', '2025-05-11 06:39:48'),
(87, 'Shaikh Faiz', 'shaikhfaizfaiz46928@gmail.com', '+91 89 2812 6013', '', 'roongta-preciso', '2025-05-11 09:12:08'),
(88, 'Kailas nathe', 'kailasnathe01@gmail.com', '9404895151', 'N', 'roongta-florenza', '2025-05-11 11:16:33'),
(89, 'Kailas nathe', 'kailasnathe01@gmail.com', '9404895151', 'N', 'roongta-florenza', '2025-05-11 11:16:34'),
(90, 'ganesh songire', 'ganeshsongire97@gmail.com', '9881612181', 'Yes I am interested', 'roongta-elegante', '2025-05-11 11:23:28'),
(91, 'Prashant', 'prashantbhat19@yahoo.co.in', '8788826554', '', 'roongta-florenza', '2025-05-12 03:44:15'),
(92, 'Trupti Barsagade', 'tbarsagade0@gmail.com', '+918799997865', '', 'roongta-preciso', '2025-05-12 03:45:23'),
(93, 'Trupti Barsagade', 'tbarsagade0@gmail.com', '+918799997865', '', 'roongta-preciso', '2025-05-12 03:45:25'),
(94, 'Dnyanesh thorat', 'abhit2326@gmail.com', '7666305344', '', 'roongta-florenza', '2025-05-12 07:40:59'),
(95, 'Shaila Somnath mengal', 'somanthmangal1@gmail.com', '9209129196', 'Sir Mala naukari karaychi aahe', 'roongta-ashok-vihar', '2025-05-13 02:15:38'),
(96, 'Datta Lavhare', 'dattalavhare414@gmail.com', '8530972940', '', 'roongta-preciso', '2025-05-13 02:16:16'),
(97, 'Datta Lavhare', 'dattalavhare414@gmail.com', '8530972940', '', 'roongta-preciso', '2025-05-13 02:16:17'),
(98, 'Datta Lavhare', 'dattalavhare414@gmail.com', '8530972940', '', 'roongta-preciso', '2025-05-13 02:16:18'),
(99, 'Datta Lavhare', 'dattalavhare414@gmail.com', '8530972940', '', 'roongta-preciso', '2025-05-13 02:16:55'),
(100, 'Datta Lavhare', 'dattalavhare414@gmail.com', '8530972940', '', 'roongta-preciso', '2025-05-13 02:16:56'),
(101, 'Datta Lavhare', 'dattalavhare414@gmail.com', '8530972940', '', 'roongta-preciso', '2025-05-13 02:16:57'),
(102, 'Datta Lavhare', 'dattalavhare414@gmail.com', '8530972940', '', 'roongta-preciso', '2025-05-13 02:16:59'),
(103, 'Golu kumar', 'kumargolu41616@gmail.com', '7061453976', '', 'roongta-preciso', '2025-05-13 04:06:21'),
(104, 'Golu kumar', 'kumargolu41616@gmail.com', '7061453976', 'Golu kumar', 'roongta-preciso', '2025-05-13 04:08:58'),
(105, 'Rupali Kharat', 'rupalikharat79135@gmail.com', '+919545122817', '', 'shree-tirumala-magnus', '2025-05-13 04:26:05'),
(106, 'Rupali Shankar kharat', 'rupalikharat79135@gmail.com', '+919545122817', '', 'shree-tirumala-magnus', '2025-05-13 04:26:54'),
(107, 'Rupali Shankar kharat', 'rupalikharat79135@gmail.com', '+919545122817', 'Duty Karachi yes yes', 'shree-tirumala-magnus', '2025-05-13 04:27:46'),
(108, 'Anjali Mahale', 'anjaliskhalkar@gmail.com', '9673993426', '', 'roongta-florenza', '2025-05-13 06:29:05'),
(109, 'Anjali Mahale', 'anjaliskhalkar@gmail.com', '9673993426', '', 'roongta-florenza', '2025-05-13 06:29:07'),
(110, 'jayshri pawar', 'jayshripawar789@gmail.com', '+919271466167', '3 bhk praises', 'roongta-ashok-vihar', '2025-05-13 12:53:21'),
(111, 'Saurabh gurale', 'adityagurale@gmail.com', '9518772543', '', 'roongta-ashok-vihar', '2025-05-14 01:44:58'),
(112, 'Aditya Gurale', 'adityagurale@gmail.com', '9518772543', '', 'roongta-ashok-vihar', '2025-05-14 01:45:22'),
(113, 'Aditya Gurale', 'adityagurale@gmail.com', '+44919518772543', 'Hii mi yenarav', 'roongta-ashok-vihar', '2025-05-14 01:46:46'),
(114, 'Janabai', 'k169809sagarmane0052@gmail.com9028980314', '902998314', '', 'roongta-preciso', '2025-05-14 02:55:34'),
(115, 'Janabai', 'k169809sagarmane0052@gmail.com9028980314', '902998314', '', 'roongta-preciso', '2025-05-14 02:55:36'),
(116, 'Janabai', 'k169809sagarmane0052@gmail.com9028980314', '902998314', '', 'roongta-preciso', '2025-05-14 02:55:37'),
(117, 'Janabai', 'k169809sagarmane0052@gmail.com9028980314', '902998314', '', 'roongta-preciso', '2025-05-14 02:55:38'),
(118, 'Janabai', 'k169809sagarmane0052@gmail.com9028980314', '902998314', '', 'roongta-preciso', '2025-05-14 02:55:39'),
(119, 'Janabai', 'k169809sagarmane0052@gmail.com9028980314', '902998314', 'K169890', 'roongta-preciso', '2025-05-14 02:57:08'),
(120, 'Janabai', 'k169809sagarmane0052@gmail.com9028980314', '902998314', 'K169890', 'roongta-preciso', '2025-05-14 02:57:10'),
(121, 'Janabai', 'k169809sagarmane0052@gmail.com9028980314', '902998314', 'K169890', 'roongta-preciso', '2025-05-14 02:57:11'),
(122, 'Janabai', 'k169809sagarmane0052@gmail.com9028980314', '902998314', 'K169890', 'roongta-preciso', '2025-05-14 02:58:15'),
(123, 'Janabai', 'k169809sagarmane0052@gmail.com9028980314', '902998314', 'K169890', 'roongta-preciso', '2025-05-14 02:58:16'),
(124, 'Janabai', 'k169809sagarmane0052@gmail.com9028980314', '902998314', 'K169890', 'roongta-preciso', '2025-05-14 02:58:18'),
(125, 'Janabai', 'k169809sagarmane0052@gmail.com9028980314', '902998314', 'K169890', 'roongta-preciso', '2025-05-14 02:58:19'),
(126, 'Janabai', 'k169809sagarmane0052@gmail.com9028980314', '902998314', 'K169890', 'roongta-preciso', '2025-05-14 02:58:20'),
(127, 'Janabai Mane', 'k169809sagarmane0052@gmail.com9028980314', '902998314', 'NikalNikal', 'roongta-preciso', '2025-05-14 02:59:58'),
(128, 'Rahul Thakur', 'rt09323@gmail.com', '9022626153', 'Thank you very much for providing homes for our poor. ( 2BHK I want you to do whatever you can, but do it for the benefit of us poor people.)', 'roongta-elegante', '2025-05-14 04:38:07'),
(129, 'vishal mane', 'vishal.mane2303@gmail.com', '82082 93705', '', 'roongta-florenza', '2025-05-14 07:13:50'),
(130, 'vishal mane', 'vishal.mane2303@gmail.com', '82082 93705', '', 'roongta-florenza', '2025-05-14 07:13:50'),
(131, 'Kanbarao aanndarao kawade', 'kanbaraokawade7@gmail.com', '9139121418', '', 'roongta-elegante', '2025-05-14 08:52:30'),
(132, 'Kanbarao aanndarao kawade', 'kanbaraokawade7@gmail.com', '9139121418', '', 'roongta-elegante', '2025-05-14 08:52:32'),
(133, 'Kanbarao aanndarao kawade', 'kanbaraokawade7@gmail.com', '9139121418', '2BHK', 'roongta-elegante', '2025-05-14 08:52:56'),
(134, 'Kanbarao aanndarao kawade', 'kanbaraokawade7@gmail.com', '9139121418', '2BHK', 'roongta-elegante', '2025-05-14 08:52:57'),
(135, 'Shrawan babasaheb borse', 'shrawanborse2@com', '7447400390', '', 'roongta-preciso', '2025-05-14 11:05:07'),
(136, 'Ambika biradar', 'ambikabiradar9850@gmail.com', '7775954875', '', 'roongta-ashok-vihar', '2025-05-15 02:05:41'),
(137, 'Ambika biradar', 'ambikabiradar9850@gmail.com', '7775954875', '', 'roongta-ashok-vihar', '2025-05-15 02:05:42'),
(138, 'Suraj Tiwari', 'st7057738@gmail.com', '9881777196', '', 'roongta-preciso', '2025-05-15 02:37:38'),
(139, 'Vijay sawant', 'sawantpriyanka810@gmail.com', '9322582286', '', 'roongta-ashok-vihar', '2025-05-15 02:51:38'),
(140, 'प्रतिमा सावत', 'pratimawaktye@gmail.com', '+44919322091025', 'यस', 'roongta-preciso', '2025-05-15 03:40:45'),
(141, 'Rohit Gawali', 'gawalimanoj252@gmail.com', '7875771906', '', 'roongta-ashok-vihar', '2025-05-15 04:35:40'),
(142, 'Rohit Gawali', 'gawalimanoj252@gmail.com', '7875771906', '', 'roongta-ashok-vihar', '2025-05-15 04:35:41'),
(143, 'Rohit Gawali', 'gawalimanoj252@gmail.com', '7875771906', 'च', 'roongta-ashok-vihar', '2025-05-15 04:35:42'),
(144, 'rajendra gangadhar borde', 'rg@borde', '9763396673', '', 'roongta-ashok-vihar', '2025-05-15 04:46:13'),
(145, 'Pruthvi Sanjay Sonawane', 'pruthvisonawane98@gmail.com', '+919158161716', '', 'roongta-elegante', '2025-05-15 05:54:01'),
(146, 'Pruthvi Sanjay Sonawane', 'pruthvisonawane98@gmail.com', '+919158161716', '', 'roongta-elegante', '2025-05-15 05:54:01'),
(147, 'Sandeep Kamble', 'sandeepkamble7754@gmail.com', '7841949096', 'Hii', 'roongta-florenza', '2025-05-15 09:24:35'),
(148, 'Sandeep Kamble', 'sandeepkamble7754@gmail.com', '7841949096', 'Hii', 'roongta-florenza', '2025-05-15 09:24:37'),
(149, 'Sandeep Kamble', 'sandeepkamble7754@gmail.com', '7841949096', 'Hii', 'roongta-florenza', '2025-05-15 09:24:38'),
(150, 'Sandeep Kamble', 'sandeepkamble7754@gmail.com', '7841949096', 'Hii', 'roongta-florenza', '2025-05-15 09:24:38'),
(151, 'Sandeep Kamble', 'sandeepkamble7754@gmail.com', '7841949096', 'Hii', 'roongta-florenza', '2025-05-15 09:24:39'),
(152, 'Sandeep Kamble', 'sandeepkamble7754@gmail.com', '7841949096', 'Hii', 'roongta-florenza', '2025-05-15 09:24:40'),
(153, 'Sandeep Kamble', 'sandeepkamble7754@gmail.com', '7841949096', 'Hii', 'roongta-florenza', '2025-05-15 09:24:41'),
(154, 'Narayan Khandare', 'khandarenarayan48@gmail.com', '+917021996408', '', 'roongta-ashok-vihar', '2025-05-16 02:42:06'),
(155, 'Sunny ashok Yadav', 'sunnyashokyadav15@gmail.com', '+918879921509', '', 'roongta-preciso', '2025-05-16 04:39:41'),
(156, 'Sunny ashok Yadav', 'sunnyashokyadav15@gmail.com', '+918879921509', '', 'roongta-preciso', '2025-05-16 04:39:42'),
(157, 'Sunny ashok Yadav', 'sunnyashokyadav15@gmail.com', '+918879921509', '', 'roongta-preciso', '2025-05-16 04:39:43'),
(158, 'Sunny ashok Yadav', 'sunnyashokyadav15@gmail.com', '+918879921509', '', 'roongta-preciso', '2025-05-16 04:39:44'),
(159, 'Jagganath Bendore', 'jagganathbendore@gmail.com', '9821881166', '', 'roongta-preciso', '2025-05-16 04:48:39'),
(160, 'Raju Morya', 'rajumorya676@gmail.com', '+918452927580', '', 'roongta-preciso', '2025-05-16 04:53:21'),
(161, 'Shobha Vikas', 'choukatevikas@gmail.com', '+919172125821', 'VIKAS', 'roongta-preciso', '2025-05-16 04:59:28'),
(162, 'Shobha Vikas', 'choukatevikas@gmail.com', '+919172125821', 'VIKAS', 'roongta-preciso', '2025-05-16 04:59:29'),
(163, 'Dipak Mali', 'malidipak9955@gmail.com', '9420086243', '', 'roongta-preciso', '2025-05-16 08:49:05'),
(164, 'Mahendra Kardak', 'mahendra.kardak@gmail.com', '9967590705', '', 'roongta-preciso', '2025-05-18 04:37:19'),
(165, 'Mahendra Kardak', 'mahendra.kardak@gmail.com', '9967590705', '', 'roongta-preciso', '2025-05-18 04:37:20'),
(166, 'Prem Upasani', 'upasaniprem3565@gmail.com', '8830367373', 'Ready to buy Flat or Row House', 'roongta-florenza', '2025-05-18 05:07:10'),
(167, 'Ahivam', 'shivamlachake1@gmail.com', '7887825639', '', 'roongta-florenza', '2025-05-18 05:13:17'),
(168, 'Ahivam', 'shivamlachake1@gmail.com', '7887825639', '', 'roongta-florenza', '2025-05-18 05:13:18'),
(169, 'Ahivam', 'shivamlachake1@gmail.com', '7887825639', '', 'roongta-florenza', '2025-05-18 05:13:19'),
(170, 'Prem', 'premkumargurav4141@gmail.com', '8208450877', 'Ok', 'roongta-elegante', '2025-05-18 06:13:35'),
(171, 'Priya bist Bist', 'priyabist823@gmil.com', '9226549913', '', 'shree-tirumala-magnus', '2025-05-18 07:54:38'),
(172, 'Prathmesh Kadhre', 'prathmeshkadhre@gmail.com', '+18390924593', 'Vinod kadhre', 'roongta-florenza', '2025-05-18 08:32:01'),
(173, 'Hitesh Gohil', 'hgohil888@gmail.com', '96659 44479', '', 'roongta-florenza', '2025-05-19 05:29:41'),
(174, 'Hitesh Gohil', 'hgohil888@gmail.com', '96659 44479', '', 'roongta-florenza', '2025-05-19 05:29:42'),
(175, 'Anup', 'birarianup07@gmail.com', '7774991887', 'Share me all on WhatsApp urgently would like to visit by tomorrow or day after tomorrow', 'roongta-florenza', '2025-05-19 09:50:46'),
(176, 'Krishna Dudhate', 'dudhateks@gmail.com', '9011071116', '3 BHK up to 7500000', 'roongta-elegante', '2025-05-20 08:30:41'),
(177, 'Krishna Dudhate', 'dudhateks@gmail.com', '9011071116', '3 BHK up to 7500000', 'roongta-elegante', '2025-05-20 08:30:42'),
(178, 'Nikita Manoj Gosavi', 'gosavinikita089@gmel.com', '7774910973', '', 'roongta-florenza', '2025-05-20 12:53:13'),
(179, 'Nikita Manoj Gosavi', 'gosavinikita089@gmel.com', '7774910973', '', 'roongta-florenza', '2025-05-20 12:53:51'),
(180, 'Vinod', 'vinodkangya@gmail.com', '9833550570', 'Vinod Kangya', 'roongta-elegante', '2025-05-21 05:31:59'),
(181, 'Ajay Vishkarma', 'ajayvishkarma2850@gmail.com', '+918605725147', '', 'shree-tirumala-magnus', '2025-05-21 11:23:28'),
(182, 'Snehal Sonawane', 'snehason76@gmil.com', '9028149578', '', 'roongta-florenza', '2025-05-21 12:21:21'),
(183, 'Shreekant Narayan Ranpise', 'shreekantranpise307@gmail.com', '7058077684', '', 'shree-tirumala-magnus', '2025-05-21 12:48:47'),
(184, 'Munna Maikal', 'munnamaikal6890@gmail.com', '+91197709994269', 'Safaty this flat', 'roongta-florenza', '2025-05-22 07:48:19'),
(185, 'priti fiske', 'fiskepriti75@gmail.com', '+917666799432', '', 'roongta-preciso', '2025-05-22 09:19:28'),
(186, 'priti fiske', 'fiskepriti75@gmail.com', '+917666799432', '', 'roongta-preciso', '2025-05-22 09:19:30'),
(187, 'Rahul gadakh', 'rahulgadakh5577@gimel.com', '8329082933', '1&amp;2 bhk Redy pahije', 'roongta-florenza', '2025-05-22 09:37:44'),
(188, 'Saira Shoukat Tejani', 'Sairastejani@gmail.com', '9821020217', 'I want a 2 bhk flat in nasik road below Rs 50 lacs', 'roongta-elegante', '2025-05-22 09:44:28'),
(189, 'Chanchal Lilke', 'lilkechanchal@gmail.com', '+919209219033', '', 'roongta-florenza', '2025-05-22 11:31:49'),
(190, 'Chanchal Lilke', 'lilkechanchal@gmail.com', '+919209219033', '', 'roongta-florenza', '2025-05-22 11:31:49'),
(191, 'Chanchal Lilke', 'lilkechanchal@gmail.com', '+919209219033', '', 'roongta-florenza', '2025-05-22 11:32:57'),
(192, 'Yogendra Gokul Baviskar', 'ybaviskar06@gmail.com', '9167482190', '', 'roongta-florenza', '2025-05-23 06:39:24'),
(193, 'Shreya Walzade', 'shreyawalzade3@gmail.com', '+91 84593 14497', 'Want to buy house', 'roongta-elegante', '2025-05-23 08:05:30'),
(194, 'Rashida shafek phatan', 'jotibanaik263@gmail.com', '8484048928', '', 'roongta-florenza', '2025-05-23 09:38:14'),
(195, 'Shabhana', 'jotibanaik263@gmail.com', '8484048928', '', 'roongta-florenza', '2025-05-23 09:39:18'),
(196, 'Shabhana jhaved s', 'jotibanaik263@gmail.com', '8484048928', '', 'roongta-elegante', '2025-05-23 10:16:06'),
(200, 'Geeta Gangurde', 'geetagangurde10@gmail.com', '7498080258', '', 'roongta-preciso', '2025-05-24 05:26:22'),
(201, 'Geeta Gangurde', 'geetagangurde10@gmail.com', '7498080258', '', 'roongta-preciso', '2025-05-24 05:26:30'),
(202, 'Anand', 'pingteanand99@gmail.com', '+917028346180', '', 'roongta-ashok-vihar', '2025-05-25 05:10:15'),
(203, 'Anand', 'pingteanand99@gmail.com', '+917028346180', '', 'roongta-ashok-vihar', '2025-05-25 05:10:16'),
(204, 'Reshma', 'prasad67092@gmail.com', '+918796880717', 'Florenza', 'roongta-florenza', '2025-05-25 07:03:09'),
(205, 'Azhar Shaikh', 'azharshaikh09871@gmail.com', '9272104801', '', 'roongta-florenza', '2025-05-25 07:18:29'),
(206, 'Madhavi Chikne', 'madhavi2826@gmail.com', '7972095968', 'Looking for 2bhk flat', 'roongta-florenza', '2025-05-25 08:29:43'),
(207, 'Ravi das Bhowmik', 'ravidasbhowmik@gmail.com', '+917738135844', '2BHK flat and Row house', 'roongta-florenza', '2025-05-25 10:31:13'),
(208, 'Ravi das Bhowmik', 'ravidasbhowmik@gmail.com', '+917738135844', '2BHK flat and Row house', 'roongta-florenza', '2025-05-25 10:31:14'),
(209, 'Ravi das Bhowmik', 'ravidasbhowmik@gmail.com', '+917738135844', '2BHK flat', 'roongta-florenza', '2025-05-25 10:33:02'),
(210, 'Sahebrao Salve', 'sahebraosalve811@gmail.com', '8766984615', '', 'roongta-florenza', '2025-05-26 05:28:41'),
(211, 'Amar Gupta', 'vapvmg@gmail.com', '9892003831', 'For villas', 'shree-tirumala-magnus', '2025-05-26 06:11:12'),
(212, 'Amar Gupta', 'vapvmg@gmail.com', '9892003831', 'For villas', 'shree-tirumala-magnus', '2025-05-26 06:11:13'),
(213, 'Amar Gupta', 'vapvmg@gmail.com', '9892003831', 'For villas', 'shree-tirumala-magnus', '2025-05-26 06:11:13'),
(214, 'Amar Gupta', 'vapvmg@gmail.com', '9892003831', 'For villas', 'shree-tirumala-magnus', '2025-05-26 06:11:26'),
(215, 'Amar Gupta', 'vapvmg@gmail.com', '9892003831', 'For villas', 'shree-tirumala-magnus', '2025-05-26 06:11:28'),
(216, 'Sagar Patil', 'sagarvikaspatil10@gmail.com', '93700116427', '', 'roongta-florenza', '2025-05-27 03:03:47'),
(217, 'Harshad vijay gudhekar', 'kishangudhekar2000@gmail.com', '918530652305', '', 'roongta-preciso', '2025-05-27 04:08:36'),
(220, 'Vidya Tamne', 'tamnevidya@gmail.com', '+919422252824', '', 'roongta-preciso', '2025-05-27 12:51:43'),
(221, 'Vidya Tamne', 'tamnevidya@gmail.com', '+919422252824', '', 'roongta-preciso', '2025-05-27 12:51:44'),
(222, 'Roshan patil', 'roshanpatil204411@gmail.com', '9834412316', '', 'roongta-florenza', '2025-05-28 07:12:08'),
(223, 'Roshan patil', 'roshanpatil204411@gmail.com', '9834412316', '', 'roongta-florenza', '2025-05-28 07:12:09'),
(224, 'Amruta Kashyap', 'kashyapamruta47@gmail.com', '+918080159820', '', 'roongta-florenza', '2025-05-28 08:04:25'),
(226, 'Pallavi shisode', 'pallavishisode7588@gmail.com', '+1917057928189', '', 'roongta-florenza', '2025-05-28 11:58:28'),
(227, 'Samir', 'samirkhatik7860@gmail.com', '+1918432523547', '', 'roongta-florenza', '2025-05-29 07:05:27'),
(228, 'Rakesh', 'rakeshjadhav64@rediffmail.com', '9271260662', 'We want 1 bhk with range of 20-25L', 'roongta-florenza', '2025-05-29 07:35:22'),
(229, 'Digambar Ramdas Nikam', 'dineshnikam270796@gmail.com', '9545308743', '', 'roongta-florenza', '2025-05-29 12:00:10'),
(230, 'Dhruvika', 'dhruvika2005@gmail.com', '9343330953', '', 'roongta-florenza', '2025-05-30 08:23:18'),
(231, 'Rajesh Aiyar', 'rajeshaiyar@yahoo.com', '9920169446', '', 'roongta-florenza', '2025-05-30 08:23:38'),
(232, 'Yatee Pandi', 'yateepandya@gmail.com', '7226999428', '', 'roongta-florenza', '2025-05-30 08:24:09'),
(233, 'Deepak Khandekar', 'deepakkhandekar0000@gmail.com', '+1919359806447', '', 'roongta-elegante', '2025-05-30 10:46:54'),
(234, 'Deepak Khandekar', 'deepakkhandekar0000@gmail.com', '+1919359806447', '', 'roongta-florenza', '2025-05-30 11:06:28'),
(235, 'Shubham Suryawanshi', 'shubhamsuryawanshi48@gmail.com', '7722071898', '', 'shree-tirumala-magnus', '2025-05-30 13:13:20'),
(236, 'Sudam Shankar Londhe', 'sudamlondhe28@gmail.com', '9922829055', '', 'roongta-florenza', '2025-05-30 17:20:45'),
(237, 'S N Wankhede', 'wsubhash1955@gmail.com', '7021806278', 'SEEKING ACCOMODATION 2 BHK AT REASONABLE PRICE.', 'roongta-florenza', '2025-05-31 04:05:29'),
(238, 'Priya Ashok Jain', 'priyajain9997@gmail.com', '+919272529273', '', 'roongta-florenza', '2025-05-31 07:15:17'),
(239, 'Sachin Bhavar', 'sachinbhavar5217@gmail.com', '+17887894724', '', 'roongta-florenza', '2025-05-31 08:04:05'),
(240, 'Chetan Jadhav', 'chetanjadhav45175@gmail.com', '8080381473', 'Me kam runga sab kuch leki mera man karega krneka tab sex milega kya', 'roongta-florenza', '2025-06-01 08:11:22'),
(241, 'Rohan Bagul', 'rohanbagul264@gmail.com', '9325272760', 'Home', 'roongta-florenza', '2025-06-01 13:18:04'),
(242, 'Renuka nikam', 'nikamrenuka147@com', '9370156591', '', 'roongta-florenza', '2025-06-03 07:35:35'),
(243, 'Vinil', 'wanivinil@gmail.com', '7709897977', 'I want callback', 'roongta-preciso', '2025-06-03 10:01:34'),
(244, 'Dipak salkar', 'salkardipak7@gmail.com', '8999453615', '', 'roongta-florenza', '2025-06-03 11:10:50'),
(245, 'Smita Chaudhari', 'chaudharismita149@gmail.com', '+919673330288', 'Can you send me 2 bhk flat selling price', 'roongta-florenza', '2025-06-03 15:42:14'),
(246, 'Sagar Sable', 'sablesagar612@gmail.com', '7350928012', '', 'roongta-florenza', '2025-06-04 03:25:03'),
(247, 'Nishad gosavi', 'nishadgosavi1@gmail.com', ',8055002110', '3 BHK flat', 'roongta-preciso', '2025-06-05 03:51:33'),
(248, 'Akshay Kumar pawar', 'akshaykumarpawar69@gmail.com', '7887907529', 'Hui', 'roongta-florenza', '2025-06-05 04:22:41'),
(249, 'Saira Shoukat Tejani', 'Sairastejani@gmail.com', '9821020217', 'Is this a ready to move in project?? And are muslims allowed........?', 'roongta-florenza', '2025-06-05 05:43:15'),
(250, 'Harsh yogesh pandit', 'harshpandit0409@gmail.com', '8668428074', 'I need home', 'roongta-elegante', '2025-06-05 06:43:59'),
(251, 'Vishal Ighe', 'yashighe491@gmail.com', '7028222037', '', 'shree-tirumala-magnus', '2025-06-05 13:05:26'),
(252, 'Rohit', 'rohittidke98@gmail.com', '9321826045', '2bhk prices', 'roongta-florenza', '2025-06-05 13:47:35'),
(253, 'Lakhan Shakil khatik', 'lackypawar0822@gmail.com', '7447827862', '', 'roongta-preciso', '2025-06-05 17:10:09'),
(254, 'Lacky Pawar', 'lackypawar0822@gmail.com', '8180092555', 'I have flat', 'roongta-elegante', '2025-06-05 17:12:45'),
(255, 'Preetisinhaa', 'preetighorpade411@gmail.com', '9075793408', 'मला पण pahiji काय करायचं त्या साठी  मला जागा पण नाहीं आणि घरं पण nahi', 'roongta-florenza', '2025-06-06 03:57:10'),
(256, 'Sameer Attar', 'sameerattar646@gmail.com', '+1918625838459', '', 'shree-tirumala-magnus', '2025-06-06 04:51:42'),
(257, 'Raju madan sathe', 'rajusathe464@gmail.com', '9028526448', '2bhk room', 'roongta-florenza', '2025-06-06 06:39:56'),
(258, 'हेमा रुपेश कानडे', 'hemakanade9110@gmail.com', '9209374311', 'मला पण घरा चे फार्म भरायचे आहे मिस्टर नाही आहे', 'roongta-elegante', '2025-06-06 06:42:30'),
(259, 'Ashutosh Nirala', 'anirala015@gmail.com', '6306538955', '', 'roongta-florenza', '2025-06-06 07:32:24'),
(260, 'Renuka nikam', 'nikamrenuka147@com', '9370156591', '', 'shree-tirumala-magnus', '2025-06-06 08:54:50'),
(261, 'Poonam  vinod Kumbhare', 'poonamkumbhare564@gmail.com', '+919096069439', '', 'roongta-florenza', '2025-06-06 11:30:43'),
(262, 'Roshan Kute', 'roshankute16@gmail.com', '7666812429', 'Nas-ik', 'roongta-elegante', '2025-06-06 12:01:49'),
(263, 'Sushma Jadhav', 'jsushma844@gmail.com', '+918007085481', '', 'roongta-elegante', '2025-06-06 12:37:28'),
(264, 'Rahul Mandole', 'rahulmandole1998@gmail.com', '+917972498158', '', 'roongta-florenza', '2025-06-06 13:42:39'),
(265, 'Sagar wadle', 'Wadlesagar4@gmail.com', '9623117125', 'Plz whatsapp project details and call anytime', 'roongta-preciso', '2025-06-06 17:10:54'),
(266, 'Machhindra pallika', 'machhindrapaikrao8@gmail.com', '9657832929', 'Ke Makan chahie', 'roongta-florenza', '2025-06-06 17:45:50'),
(267, 'YOGESH AHIRE', 'yogeshahire2312@gmail.com', '9284072845', 'Ho', 'shree-tirumala-magnus', '2025-06-07 01:35:07'),
(268, 'Deepali shinde', 'deepalishinde8269@gmail.com', '8766098756', '', 'roongta-florenza', '2025-06-07 07:17:22'),
(269, 'Deepali shinde', 'deepalishinde8269@gmail.com', '8766098756', '', 'roongta-elegante', '2025-06-07 07:18:22'),
(270, 'Sneha', 'malwatkarsneha@gmail.com', '9561175086', '', 'roongta-florenza', '2025-06-07 12:08:51'),
(271, 'Vishwanath  devkate', 'Vishwanathdevkate@48com', '7517321991', '', 'roongta-florenza', '2025-06-07 16:13:35'),
(272, 'Ashwini Deore', 'ashwinideoredeurbk1234@gmail.com', '+917448209722', '2 bhk govind nagar yethe', 'roongta-florenza', '2025-06-07 16:41:32'),
(273, 'Vishal Sutar', 'vishalsutar7720@gmail.com', '7720973301', '', 'roongta-florenza', '2025-06-07 17:32:11'),
(274, 'Madhuri rahul netare', 'Sharvinetare61@gmail.com', '9588470872', 'Property', 'roongta-florenza', '2025-06-08 03:25:34'),
(275, 'Chandrakant Bhikaji sonawane', 'sonawanedyaneshwar1@gmail.com', '9156784275', 'Ham abhi rent par he', 'roongta-florenza', '2025-06-08 07:44:35'),
(276, 'Chandrakant Ramdas Kulkarni', 'crkulkarni111@gaimal.com', '7558356156', '', 'roongta-florenza', '2025-06-08 10:20:30'),
(277, 'Sanjay jagtap', 'sanjay.jagtap3440@gmail.com', '+918605912792', '', 'roongta-florenza', '2025-06-08 16:34:23'),
(278, 'Madhukar Fupane', 'madhukar.fupane@gmail.com', '+919552793593', '', 'shree-tirumala-magnus', '2025-06-08 17:27:31'),
(279, 'Hena kausar Mohammad Farooque', 'henakauser238@gmail.com', '8237123310', 'I need to residents', 'shree-tirumala-magnus', '2025-06-09 03:11:53'),
(280, 'Gokul Fasale', 'fasalegokul72@gmail.com', '+917507886731', 'Gokul Fasale', 'roongta-florenza', '2025-06-09 04:31:42'),
(281, 'sanskar sopan rathod', 'sanskarrathod0420@gmail.com', '8982377717', '', 'roongta-florenza', '2025-06-09 05:49:14'),
(282, 'Prism Corp', 'prismcorp@gmail.com', '+919830757811', '', 'roongta-florenza', '2025-06-09 10:59:00'),
(283, 'Komal Ashok salve', 'komalsalve845@gmail.com', '+1919529405880', 'Kathe galli dwarka nashik', 'shree-tirumala-magnus', '2025-06-09 11:20:09'),
(284, 'Naziya Shakil mansuri', 'naziyashakilmansuri7@gmail.com', '9075231890', 'Hame bhi chahiye ek ghar aap kam karte karte meri beti ka ghar nahi hora sir aap meri beti ko ghar karte hai to aap kohamari bahut dua milegi hame Jo kam dege ham karege', 'roongta-florenza', '2025-06-09 14:33:15'),
(285, 'Omkar Gaykawad', 'omgaykawad9272@gmail.com', '9272012235', '', 'shree-tirumala-magnus', '2025-06-09 17:42:29'),
(286, 'Aarti Rohit bhadane', 'rohitbhadane936@gmail.com', '+917218072941', '', 'roongta-florenza', '2025-06-10 07:05:00'),
(287, 'Rustam Varde', 'rustamwarde@gmail.com', '+919359196465', '', 'roongta-preciso', '2025-06-10 07:34:17'),
(288, 'Sakshi shubham jagtap', 'jagtapsakshi682@gmail.com', '+917620536713', 'Available home for my future', 'roongta-elegante', '2025-06-10 09:27:35'),
(289, 'Ratna chavan', 'ratnamondal6140@gmail.com', '8890604968', '', 'roongta-florenza', '2025-06-10 12:25:37'),
(290, 'Wagh aakash nago', 'wagh37013@gmail.com', '90540 74365', '', 'roongta-florenza', '2025-06-10 12:28:21'),
(291, 'Sneha khanolkar', 'snehadeepakkhaolkar@yahoo.in', '9323092953', '', 'roongta-florenza', '2025-06-10 12:41:07'),
(292, 'Azim kador shaikh', 'azimshaikh2343@gmail.com', '9325236512', '', 'roongta-florenza', '2025-06-11 03:16:14'),
(293, 'Anil Nanda', 'anil.nic001@gmail.com', '8433970111', '', 'roongta-florenza', '2025-06-11 05:43:26'),
(294, 'VIJAY LAL', 'vijayl@bharatpetroleum.in', '9526246886', 'Interested in 2 &amp; 3 BHK , location Gangapur side', 'roongta-preciso', '2025-06-11 06:02:03'),
(295, 'Somnath Pawar', 'somap4581@gmail.com', '+1919881782314', '', 'roongta-elegante', '2025-06-11 08:02:01'),
(296, 'Eknath  Ananda Jadhav', 'eknathjadhav010@gmail.com', '+919527421002', 'आर्थिक परिस्थिती चांगली नसल्यामुळे गरिबीतून दिवस काढून राहिलो, थोडीफार मदत झाली तर बरं होईल', 'roongta-preciso', '2025-06-11 09:59:11'),
(297, 'Asgar Ali', 'alia9379996@gmail.com', '+1918369834744', 'Yyyyyyyyy un', 'roongta-florenza', '2025-06-11 11:29:09'),
(298, 'Chandrashekhar more', 'sachinmorecm@gmail.com', '+1917219253591', 'Dhruvnagar , gangapur road.', 'roongta-elegante', '2025-06-11 14:43:15'),
(299, 'Rohidas Sanap', 'rsanap7588@gmail.com', '95947 68777', '', 'roongta-florenza', '2025-06-11 16:26:14'),
(300, 'pranav dhananjay rajput', 'Pranavr2777@gmail.com', '9689893927', '', 'roongta-preciso', '2025-06-11 17:43:33'),
(301, 'Pratibha marathe', 'smarathe977@gmail.com', '7840937065', '', 'roongta-elegante', '2025-06-11 18:13:23'),
(302, 'Vaishali Sanjay Kadam', 'kadamvaishali381@gmail.com', '8605413661', '', 'roongta-florenza', '2025-06-12 02:29:41'),
(303, 'Vaishali Sanjay Kadam', 'kadamvaishali381@gmail.com', '8605413661', '', 'shree-tirumala-magnus', '2025-06-12 02:31:15'),
(304, 'Renuka Patil', 'renuka.pa4016@gmail.com', '9322426492', '', 'roongta-elegante', '2025-06-12 06:30:25'),
(305, '9021138423', 'Prathameshdeore2003@gmail.com', '7387279490', '', 'roongta-florenza', '2025-06-12 06:37:07'),
(306, 'प्रमिला.गोतम.शार्दूल', 'pramilashardul142@gmail.com', '7083852634', '', 'roongta-elegante', '2025-06-12 06:53:52'),
(307, 'Ikrar akhtar Khatik', 'ikrarkhatik420@gmail.com', '7058212410', 'Thank you', 'shree-tirumala-magnus', '2025-06-12 10:19:51'),
(308, 'Dipti Joshi', 'joshidipti794@gmail.com', '+917083055885', 'Interested', 'shree-tirumala-magnus', '2025-06-12 12:34:04'),
(309, 'Manisha Pagare', 'mpagare141211@gmail.com', '+919579325822', '', 'shree-tirumala-magnus', '2025-06-12 12:46:59'),
(310, 'Anjali nagare', 'anjalinagare1108@gmail.com', '9373066135', '', 'roongta-preciso', '2025-06-12 13:08:46'),
(311, 'Durga Jadhav', 'durgajadhav89@gmail.com', '+918080020536', 'More info about Florenza', 'roongta-florenza', '2025-06-12 17:06:25'),
(312, 'Mahesh Borse', 'mj.borse0122@gmail.com', '8208314049', '', 'roongta-elegante', '2025-06-12 17:10:46'),
(313, 'Kailash Raut', 'kailasraut997@gmail.com', '+1919403149533', '', 'roongta-elegante', '2025-06-13 08:22:15'),
(314, 'Srushti akash barve', 'srushtibarve5@gmail.com', '8766734606', '', 'roongta-elegante', '2025-06-13 17:26:09'),
(315, 'Atul Pagare', 'pagaratul143@gmail.com', '95790 95545', '', 'shree-tirumala-magnus', '2025-06-13 17:54:32'),
(316, 'Shankar Dongare', 'shankardongare888@gmail.com', '9975694730', 'Good furnished flat required', 'shree-tirumala-magnus', '2025-06-14 04:41:51'),
(317, 'Khushbu jadhav', 'jadhavr7786@gmail.com', '7499701378', 'C', 'roongta-florenza', '2025-06-14 05:40:36'),
(318, 'Jayraj', 'jsubodhnayak101@gmail.com', '7709254460', '', 'roongta-elegante', '2025-06-14 06:45:29'),
(319, 'Sushila kiran Nitnavare', 'nitnavaresushila38@gmail.com', '7507351742', 'मला घरकुलची अत्यंत गरज आहे मला घरकुल योजनेतील एक तरी घर मिळावा', 'shree-tirumala-magnus', '2025-06-14 07:40:15'),
(320, 'Sonali Zagade', 'zagadesonali83@gmail.com', '8329660543rent', '', 'roongta-elegante', '2025-06-14 08:19:54'),
(321, 'Vipin tiwari', 'vipint04@gmail.com', '+91 866 892 1738', '3 bhk', 'roongta-elegante', '2025-06-14 08:30:51'),
(322, 'Vipin Tiwari', 'vipint04@gmail.com', '8668921738', '3bhk price', 'roongta-elegante', '2025-06-14 08:33:04'),
(323, 'Shamrao Deshmukh', 'SPD01061964@gmail.com', '94227 70598', '', 'roongta-elegante', '2025-06-14 08:37:00'),
(324, 'Pratiksha g', 'pratikshagangurde08@gmail.com', '9682158686', '2bhk flat near Dindori mhasrul road', 'roongta-elegante', '2025-06-15 01:36:38'),
(325, 'Swapnil nayabrao bhatkar', 'swapnilbhatkar210@gmail.com', '9665251981', 'Yes', 'shree-tirumala-magnus', '2025-06-15 05:06:35'),
(326, 'Shubhangi sawale', 'shubhipandit490@gmail.com', '9421991395', '2 bhk', 'roongta-elegante', '2025-06-15 06:56:00'),
(327, 'Madhukar Gaikar', 'madhukargaikar627@gmail.com', '9822091438', '', 'roongta-elegante', '2025-06-15 13:15:18'),
(328, 'Balasaheb sangale', 'bsangale157@gmail.com', '9106233293', '', 'shree-tirumala-magnus', '2025-06-15 13:59:26'),
(329, 'Prasad Moghe', 'pmgh98@gmail.com', '8698979200', '', 'roongta-elegante', '2025-06-15 15:30:22'),
(330, 'Ramesh Avhad', 'rameshavhad15@gmail.com', '7972879365', '', 'shree-tirumala-magnus', '2025-06-15 16:06:07'),
(331, 'Ramesh Avhad', 'rameshavhad15@gmail.com', '7972879365', '', 'roongta-elegante', '2025-06-15 16:08:23'),
(332, 'Bhalchandra 9372480134', 'nbhalchandra@gmail.com', '93724 80134', '', 'roongta-elegante', '2025-06-15 16:45:31'),
(333, 'Dnynoba more', 'dnyaneshwarm549@gmail.com', '9373391770', '', 'roongta-elegante', '2025-06-16 02:44:40'),
(334, 'Ajay Suresh pawar Pawar', 'ajaypawar50911@gmail.com', '959506 6600_', '', 'roongta-elegante', '2025-06-16 07:08:21'),
(335, 'Naim Pathan', 'naimpathan17@gmail.com', '9271261768', '', 'shree-tirumala-magnus', '2025-06-16 14:06:19'),
(336, 'Yogesh Kansara', 'kansaray046@gmail.com', '+918408014636', 'Need Auction flat', 'roongta-elegante', '2025-06-17 05:38:39'),
(337, 'Sharad khalkar', 'sharadkhalkar77@gmail.com', '9881907035', 'Yes', 'roongta-elegante', '2025-06-17 07:48:10'),
(338, 'Kajal shirsath', 'kajalshirsath061@gmail.com', '+917028453320', '', 'roongta-elegante', '2025-06-17 08:33:12'),
(339, 'Khushbu anil ahire', 'khushbuahire077701@gmail.com', '7387916613', '', 'roongta-elegante', '2025-06-17 09:36:59'),
(340, 'Manjunath Bhavsar', 'manjunath.s@farmley.com', '96578 62006', '2bhk', 'roongta-elegante', '2025-06-17 10:14:57'),
(341, 'Aryen ranu alhat', 'alhataryan502@gmail.com', '+918830530823', '', 'roongta-florenza', '2025-06-17 12:55:58'),
(342, 'Devendra Nikam', 'devrock1nik@gmail.com', '8888979803', 'Interested in 2 bhk', 'roongta-florenza', '2025-06-17 15:30:33'),
(343, 'Shrikant Kale', 'shrikantkale8080@gmail.com', '9604455443', 'Looking for a 2 or 3 bhk flat.', 'shree-tirumala-magnus', '2025-06-17 17:06:33'),
(344, 'Ruchita Kadam', 'rkkittus2@gmail.com', '8485806683', '', 'shree-tirumala-magnus', '2025-06-18 03:59:07'),
(345, 'Geeta Shubham Kshirsagar', 'geetasuryawanshi3024@gamil.com', '9309501950', '2 bhk flat  hwa ahe panchwti madhe.... Rent ne....', 'roongta-elegante', '2025-06-18 07:05:23'),
(346, 'Sangita Walzade', 'walzadesangita35@gmail.com', '+918308524485', '', 'roongta-elegante', '2025-06-18 11:47:08'),
(347, 'Palande', 'tukarampalande01@gmail.com', '8805348565', 'I want flat two bhk', 'roongta-florenza', '2025-06-18 12:12:34'),
(348, 'prakash sanap', 'prakash.sanap070@gmail.com', '9322102777', '', 'shree-tirumala-magnus', '2025-06-18 12:26:03'),
(349, 'Ashwini shinde', 'ashwinikiran120791@gmail.com', '9209769005', '', 'roongta-florenza', '2025-06-19 17:28:01'),
(350, 'Nishad dabhade', 'nishaddabhade@gmail.com', '9823040851', '', 'roongta-elegante', '2025-06-19 17:49:16'),
(351, 'Bharat Phad', 'phadbharat123@gmail.com', '+919823538642', '982353862', 'roongta-elegante', '2025-06-20 05:24:16'),
(352, 'Ravindra Jadhav', 'ravindrajadhav6479@gmail.com', '7666262647', '', 'roongta-preciso', '2025-06-20 08:13:11'),
(353, 'Ganesh Chaudhary', 'gc419365@gmail.com', '+1919096133395', '2 bhk', 'roongta-elegante', '2025-06-21 10:10:47'),
(354, 'Palande tukaram bhikaji', 'tukarampalande@gmail.com', '8805348565', '', 'roongta-preciso', '2025-06-21 15:41:53'),
(355, 'Dr.D.G.Borse', 'dr.dullabhborse60@gmail.com', '7875523921', '', 'shree-tirumala-magnus', '2025-06-22 10:31:09'),
(356, 'Santosh sangle', 'Santoshsangle460@gmail.com', '83083 03087', '2bhk', 'roongta-florenza', '2025-06-22 15:15:20'),
(357, 'Gopal Shivaji Patil', 'gopalpatil9333@gmail.com', '+917083235567', '', 'roongta-elegante', '2025-06-23 01:53:39'),
(358, 'Kiran Shingan', 'kiranshingan1143@gmail.com', '8975229700', '', 'roongta-elegante', '2025-06-23 05:17:23'),
(359, 'Dullabh Borse', 'dr.dullabhborse60@gmail.com', '7875523921', 'I am interested in purchasing zRoongata Florenza  flat please inform me availability n valuation', 'roongta-florenza', '2025-06-23 07:18:38'),
(360, 'Vidya Raosheb', 'vidyashinde8888@gmail.com', '1918806213010', '', 'roongta-elegante', '2025-06-24 06:27:53'),
(361, 'Aarti Waghmare', 'arru1998paikrao@gmail.com', '9373788755', '', 'roongta-elegante', '2025-06-24 09:28:57'),
(362, 'Nilesh magan Dhivar', 'nileshdhivar8@gmail.com', '8308780781', '', 'roongta-elegante', '2025-06-24 11:03:04'),
(363, 'Arti Son', 'ruchitson5@gmail.com', '8669541979', '', 'roongta-elegante', '2025-06-25 16:01:31'),
(364, 'Jitendra narayan mahajan', 'jeetmahajan12@gmail.com', '9765019196', 'Pradhan mantri awas yojana', 'shree-tirumala-magnus', '2025-06-26 08:57:47'),
(365, 'Mohini Ahire Ahire', 'mohiniahire1122@gmail.com', '7350704547', '', 'shree-tirumala-magnus', '2025-06-27 02:37:41'),
(366, 'Ulema Khan', 'khanulema@gmail.com9730507828', '9730507828', '2 bhk 20 price resale pn chalel', 'roongta-elegante', '2025-06-27 07:08:03'),
(367, 'Dhananjay mulay', 'dhananjay8315@rediffmail.com', '9922420453', '2 bhk in govind nagar', 'roongta-florenza', '2025-06-28 12:35:30'),
(368, 'Kishor Suryawanshi', 'kishorsuryawanshi2324@gmail.com', '+1919420717217', '', 'roongta-elegante', '2025-06-29 05:01:48'),
(369, 'adhav nakul', 'nakuladhav26@gmail.com', '+1917756952657', '', 'shree-tirumala-magnus', '2025-06-29 06:11:44'),
(370, 'Revati pawar', 'prevati1697@gmail.com', '8888629203', '', 'roongta-elegante', '2025-06-30 08:55:53'),
(371, 'Mayur Jondhale', 'mayurjondhale97@gmail.com', '9156036506', 'flat asel call kara', 'roongta-preciso', '2025-07-02 08:09:50'),
(372, 'Lahu. Gotarne', 'gotarnelahu97@gmail.com', '+918390423651', '', 'roongta-elegante', '2025-07-02 10:11:49'),
(373, 'Pradeep Lokhande', 'divinejusticel7@gmail.com', '+919730110000', 'Interested. Please send complete brousher and Price including registration charges ,GST and everything inclusive.If ready to shift option available.Be informed.Thiss number is on WhatsApp. \r\nRegards!!\r\nAdv.Pradeep B .Lokhande.', 'shree-tirumala-magnus', '2025-07-12 16:16:58'),
(374, 'Hitesh Javeri', 'hiteshjaveri@hotmail.com', '+919821135913', 'With oc possession possible?', 'roongta-florenza', '2025-07-14 04:00:16'),
(375, 'aaa', 'aaa@gmail.com', '8975201182', 'dfdsfsd', 'roongta-elegante', '2025-07-29 10:09:35');

-- --------------------------------------------------------

--
-- Table structure for table `inquiries_property_list`
--

CREATE TABLE `inquiries_property_list` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `property` varchar(50) NOT NULL,
  `budget` varchar(50) NOT NULL,
  `slug` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inquiries_property_list`
--

INSERT INTO `inquiries_property_list` (`id`, `first_name`, `last_name`, `email`, `contact`, `property`, `budget`, `slug`, `created_at`) VALUES
(8, 'Pavan', 'Shinde', 'pavanshindemr05@gmail.com', '9766944246', '', '', '', '2025-04-30 17:08:09'),
(9, 'Dr.Janakkii', 'Naik', 'Janakkiiparag@gmail.com', '9623892763', '2 bhk row house,flats for sale.Budget 30 to 40lakh', '', '', '2025-05-01 06:19:26'),
(10, 'Prem', 'Chawla', 'premnchawla@gmail.com', '902856780', 'Looking 3BHK\r\nRoom size large minimum 12 x 12 \r\nEx', '', '', '2025-05-03 16:53:34'),
(11, 'Prem', 'Chawla', 'premnchawla@gmail.com', '902856780', 'Looking 3BHK\r\nRoom size large minimum 12 x 12 \r\nEx', '', '', '2025-05-03 16:53:35'),
(12, 'Prem', 'Chawla', 'premnchawla@gmail.com', '902856780', 'Looking 3BHK\r\nRoom size large minimum 12 x 12 \r\nEx', '', '', '2025-05-03 16:53:37'),
(13, 'Prem', 'Chawla', 'premnchawla@gmail.com', '902856780', 'Looking 3BHK\r\nRoom size large minimum 12 x 12 \r\nEx', '', '', '2025-05-03 16:53:38'),
(14, 'nachiket', 'zambre', 'zambrejayant@gmail.com', '7058620308', 'i am intrested 3 bhk in indira nagar near by', '', '', '2025-05-05 15:39:57'),
(15, 'G', 'C', 'paripop2141@gmail.com', '9923489122', '', '', '', '2025-05-12 06:31:49'),
(16, 'Anshu', 'Singh', 'anshusiem250@gmail.com', '8329042824', '', '', '', '2025-05-12 07:24:39'),
(17, 'सुरेश', 'शिंगणे', 'shinganesuresh357@gmail.com', '8767381309', '', '', '', '2025-05-15 17:04:26'),
(18, 'Anup', 'Birari', 'birarianup07@gmail.com', '7774991887', '3bhk', '', '', '2025-05-19 09:52:31'),
(20, 'Amruta', 'Kashyap', 'kashyapamruta47@gmail.com', '+918080159820', '', '', '', '2025-05-28 08:06:58'),
(24, 'Swami', 'Sonar', 'swamisonar@gmail.com', '9096376387', 'Need Gated Community', '', '', '2025-06-08 09:28:44'),
(25, 'Pranjail Shewale', 'Shewale', 'pranjalishewale501@gmail.com', '9763400762', '1 BHK flat', '', '', '2025-06-12 08:18:23'),
(26, 'Pushkar', 'Dixit', 'pushkardixit27@gmail.com', '9049418009', 'Bank', '', '', '2025-06-12 09:58:44'),
(27, 'Manisha', 'Jadhav', 'virat123456789jadhav@gmail.com', '+1919511247697', '', '', '', '2025-06-12 10:11:45'),
(28, 'Rohit', 'Ahire', 'ahirerohit573@gmail.com', 'ahirerohit573@g', '', '', '', '2025-06-12 10:41:55'),
(29, 'Mohit', 'Shirsat', 'mohitshirsat12@gmail.com', '7249584419', '', '', '', '2025-06-12 13:04:38'),
(30, 'Anjali', 'nagare', 'anjalinagare1108@gmail.com', '9373066135', '', '', '', '2025-06-12 13:09:16'),
(31, 'Khushbu', 'pathan', 'khushkhushboo166@gmail.com', '9356623700', '', '', '', '2025-06-12 13:37:06'),
(32, 'Balu', 'More', 'balumore4003@gmail.com', '7249661713', '', '', '', '2025-06-12 16:46:17'),
(33, 'Bhaiyya', 'Bhaleroa', 'soun123456489@gmail.com', 'soun123456489@g', '1', '', '', '2025-06-12 17:47:32'),
(34, 'Bhaiyya', 'Bhaleroa', 'soun123456489@gmail.com', 'soun123456489@g', '1', '', '', '2025-06-12 17:47:47'),
(35, 'Ravindra sukala pawrar', 'Pawara Ravindra sukala', 'pawararavindrasukalaravindrasu@gmail.com', 'pawararavindras', 'Hii', '', '', '2025-06-13 02:05:24'),
(36, 'Ravindra sukala pawrar', 'Pawara Ravindra sukala', 'pawararavindrasukalaravindrasu@gmail.com', 'pawararavindras', 'Hii', '', '', '2025-06-13 02:05:26'),
(37, 'Aejaj Shaikh', 'Shaikh', 'aejajshakh727@gmail.com', '8669039536', 'Yes', '', '', '2025-06-13 03:10:32'),
(38, 'Arun', 'SAWANT', 'arun.s1963@gmail.com', '+919869481995', 'Wanted Apartment 600 square feet carpet.', '', '', '2025-06-13 11:03:11'),
(39, 'Amol', 'Shewale', 'amolshewale1995@gmail.com', 'amolshewale1995', '', '', '', '2025-06-13 12:57:03'),
(40, 'Jay', 'Joshi', 'jayjoshi9139@gmail.com', '8855921060', 'Fully furnished 2 bhk flat near kk wagh college', '', '', '2025-06-13 15:22:22'),
(41, 'Srushti', 'Barve', 'srushtibarve5@gamil.com', '8766734606', '', '', '', '2025-06-13 17:24:09'),
(42, 'Ganesh', 'Jadhav', 'jadhavganesh14141@gmail.com', '9373463298', '', '', '', '2025-06-13 17:59:12'),
(43, 'Jagan', 'Suranje', 'jagansuranje937.com@gmail.com', '7350645847', '', '', '', '2025-06-14 02:30:39'),
(44, 'Yogesh', 'Vidhate', 'yogeshrvidhate@gmail.com', '9860813475', 'Hi', '', '', '2025-06-14 04:14:42'),
(45, 'Khushbu', 'jadhav', 'jadhavr7786@gmail.com', '7499701378', 'Contact', '', '', '2025-06-14 05:39:02'),
(46, 'Naresh', 'Pagare', 'Pagarenaresh74@gmail.com', '9637500311', '', '', '', '2025-06-14 07:01:12'),
(47, 'Asif', 'Shah', 'asifshah902841@gmail.com', '9028410276', 'Hi', '', '', '2025-06-14 07:11:24'),
(48, 'Asif', 'Shah', 'asifshah902841@gmail.com', 'asifshah902841@', '', '', '', '2025-06-14 07:13:23'),
(49, 'Asif', 'Shah', 'asifshah902841@gmail.com', 'asifshah902841@', '', '', '', '2025-06-14 07:13:24'),
(50, 'Asif', 'Shah', 'asifshah902841@gmail.com', 'asifshah902841@', '', '', '', '2025-06-14 07:13:25'),
(51, 'Rohan', 'Raj', 'arrohan76@gmail.com', '8668808681', '', '', '', '2025-06-14 07:35:56'),
(52, 'Navnath', 'avhad', 'navnathavhad89@gmail.com', '9763537299', 'बँक ने जप्त केलेले फ्लॅट', '', '', '2025-06-14 08:16:21'),
(53, 'Priyanka', 'Patil', 'priyankapatil7261@gmail.com', 'priyankapatil72', '', '', '', '2025-06-14 08:23:56'),
(54, 'Atharva', 'Bhandari', 'atharvabhandari13@gmail.com', '7304621732', '', '', '', '2025-06-14 08:48:35'),
(55, 'Nitin', 'Jadhav', 'nitinj250891@gmail.com', 'nitinj250891@gm', '', '', '', '2025-06-14 08:50:49'),
(56, 'Nitin', 'Jadhav', 'nitinj250891@gmail.com', '9766000601', '', '', '', '2025-06-14 08:51:28'),
(57, 'Deepika', 'Dilip Agarkar', 'deepika.agarkar31@gmail.com', '9730206114', 'I want upper Flat or penthouse', '', '', '2025-06-14 10:21:11'),
(58, 'Reshma', 'Khan', 'reshmakhan44994@gmail.com', '8591088851', '', '', '', '2025-06-14 13:36:01'),
(59, 'Navanth', 'Garud', 'navanthgarud@gmail.com', '8806481636', 'Navanth Garud', '', '', '2025-06-14 13:59:14'),
(60, 'Ganesh', 'Mutrak', 'ganeshmutrak20@gmail.com', '7769064714', 'Call me ...', '', '', '2025-06-14 14:12:38'),
(61, 'Vijay ashok', 'ashok', 'vijuvarade7@gmail.com', '9420814471', '1bhk', '', '', '2025-06-14 14:35:38'),
(62, 'Amod', 'Mahajani', 'aam_111@yahoo.com', '7798507913', 'Interested in 3bhk', '', '', '2025-06-14 16:31:32'),
(63, 'Manoj', 'Gangurde', 'manojgangurde988@gmail.com', '9130310850', '', '', '', '2025-06-14 16:51:58'),
(64, 'Kajal', 'Sonar', 'kajalsonar134@gmail.com', 'kajalsonar134@g', '', '', '', '2025-06-14 17:56:48'),
(65, 'Rohit', 'navlakh', 'rohit_navlakh@rediffmail.com', '9511714017', '', '', '', '2025-06-15 03:26:01'),
(66, 'Shailesh', 'Kuril', 'shaileshkuril366@gmail.com', '+917620651689', '', '', '', '2025-06-15 03:42:11'),
(67, 'Pranav Pravin', 'Barve', 'Pranavbarve99@gmail.com', '9552727426', '', '', '', '2025-06-15 04:38:20'),
(68, 'Anant', 'Medhekar', 'anantmedhekar@gmail.com', '7400010457', 'My Interest is 2 BHK. Please call me so I can get ', '', '', '2025-06-15 06:52:16'),
(69, 'Pravin', 'शिंपी', 'pravinshimpi632@gmail.com', '9423972569', '0ne room kitchen', '', '', '2025-06-15 09:24:41'),
(70, 'Madhukar', 'Gaikar', 'madhukargaikar627@gmail.com', '9822091438', '', '', '', '2025-06-15 10:48:11'),
(71, 'Neeta', 'Adke', 'neeta.adke1@gmail.com', '7030699928', 'In nashik 3bhkflat', '', '', '2025-06-15 11:01:24'),
(72, 'Pramod', 'Ghodke', 'pramodghodke90@gmail.com', '8793489898', '', '', '', '2025-06-15 11:59:48'),
(73, 'Vinayak', 'Salve', 'salvevinayak7@gmail.com', '8600656603', 'Nashik 2BHK HOUSE', '', '', '2025-06-15 12:09:42'),
(74, 'Hemant', 'Pathre', 'hemantpathre2467@gmail.com', '9834854943', 'Hi', '', '', '2025-06-15 13:16:34'),
(75, 'Hemant', 'Pathre', 'hemantpathre2467@gmail.com', 'hemantpathre246', 'Hello', '', '', '2025-06-15 13:17:06'),
(76, 'Malti Dilip', 'dhussrr', 'roshanbhusare915@gmail.com', '9359951086', '', '', '', '2025-06-15 13:27:19'),
(77, 'Sudarshan', 'Avhad', 'sudarshanavhad9943@gmail.com', 'sudarshanavhad9', '2bhk', '', '', '2025-06-15 13:29:46'),
(78, 'Kanbarao aanndarao', 'kawade', 'kanbaraokawade7@gmail.com', 'kanbaraokawade7', '2BHk', '', '', '2025-06-15 13:39:03'),
(79, 'Kanbarao aanndarao', 'kawade', 'kanbaraokawade7@gmail.com', 'kanbaraokawade7', '2BHk', '', '', '2025-06-15 13:39:05'),
(80, 'Ashish', 'Lokhande', 'ashishlokhande05@gmail.com', '8806627176', '1bhk flat bank', '', '', '2025-06-15 14:39:20'),
(81, 'Tohid', 'Shaikh', 'usertohid9@gmail.com', 'usertohid9@gmai', '1234567899\r\n1234567899\r\nT', '', '', '2025-06-15 15:01:37'),
(82, 'Tohid', 'Shaikh', 'usertohid9@gmail.com', 'usertohid9@gmai', '1234567899\r\n1234567899\r\nT', '', '', '2025-06-15 15:01:38'),
(83, 'Tohid', 'Shaikh', 'usertohid9@gmail.com', 'usertohid9@gmai', '1234567899\r\n1234567899\r\nT', '', '', '2025-06-15 15:01:40'),
(84, 'Tohid', 'Shaikh', 'usertohid9@gmail.com', 'usertohid9@gmai', '1234567899\r\n1234567899\r\nT', '', '', '2025-06-15 15:01:42'),
(85, 'Tohid', 'Shaikh', 'usertohid9@gmail.com', 'usertohid9@gmai', '1234567899\r\n1234567899\r\nT', '', '', '2025-06-15 15:01:44'),
(86, 'Tohid', 'Shaikh', 'usertohid9@gmail.com', 'usertohid9@gmai', '1234567899\r\n1234567899\r\nT', '', '', '2025-06-15 15:01:46'),
(87, 'vijay', 'shirsath', 'vkshirsath123@gmail.com', '8788166965', '', '', '', '2025-06-16 02:25:44'),
(88, 'satish', 'sonawane', 'sonawanesatish16@gmail.com', '9011437091', '', '', '', '2025-06-16 02:58:48'),
(89, 'Manoj', 'Walzade', 'manojwalzade034@gmail.com', '9322147862', 'In near my location 1 bhk flat free', '', '', '2025-06-16 05:58:59'),
(90, 'Narendra', 'Rajput', 'narendrashira22@gmail.com', '9075067530', '2bhk', '', '', '2025-06-16 07:28:41'),
(91, 'Sandesh', 'Deore', 'deoresandesh1998@gmail.com', 'deoresandesh199', 'S', '', '', '2025-06-16 07:44:51'),
(92, 'VIJAY', 'LAL', 'vijayl@bharatpetroleum.in', '7506946925', 'Pls..whatsup me the brochure , site address , pric', '', '', '2025-06-16 10:11:33'),
(93, 'Ram', 'Jagtap', 'jagtapram918@gmail.com', '9822548622', '', '', '', '2025-06-16 12:09:09'),
(94, 'Harshad', 'shelar', 'harshadshelar205@gmail.com', '7755963491', 'Hi', '', '', '2025-06-16 16:34:12'),
(95, 'Vishal bhoi', 'Bhoi', 'vb2528932@gmail.com', '9049661153', 'Ghar nhi hai 🥹', '', '', '2025-06-16 16:46:51'),
(96, 'गजानन', 'शेलार', 'gajanan1133@gmail.com', '9422251133', '', '', '', '2025-06-16 17:47:22'),
(97, 'Nanda', 'Gavali', 'nandagavali96@gmail.com', '9075052511', '', '', '', '2025-06-16 17:57:26'),
(98, 'Shrikant', 'Kale', 'shrikantkale8080@gmail.com', '9604455443', 'Looking for a 100 sqft flat', '', '', '2025-06-17 03:11:31'),
(99, 'Akash', 'Dhatrak', 'akashdhatrak7777@gmail.com', '7507777990', '', '', '', '2025-06-17 04:15:34'),
(100, 'Tushar', 'Deore', 'tushardeore2626@gmeil.com', '9762004003', 'I have 1bhk plat in bank ऑक्शन', '', '', '2025-06-17 06:01:00'),
(101, 'Chaitali Devidas', 'Pakhale', 'bagadchaitali@gmail.com', '9049438723', '1 BHK', '', '', '2025-06-17 07:51:43'),
(102, 'Kavita Chandrakant', 'Shinde', 'ShindeKavita1490@gmail.com', '7385994688', 'Msg only', '', '', '2025-06-17 08:50:51'),
(103, 'संदीप पवार', 'Pawar', 'chatrapatiweldingwshop1991@gmail.com', '423301', 'नाशिक', '', '', '2025-06-17 09:04:52'),
(104, 'Atul', 'kasliwal', 'atulk00999@gmail.com', '7620871008', '', '', '', '2025-06-17 09:37:33'),
(105, 'Alija', 'Shaikh', 'shaikhalija824@gmail', '7796102240', '', '', '', '2025-06-17 10:04:31'),
(106, 'Pooja', 'Dhavle', 'liladhavle18@gmai.com', '9130325881', '1 bhk flat', '', '', '2025-06-17 10:44:31'),
(107, 'Rajendra', 'Shelke', 'rajendrashelke169@gmail.com', '8459797289', 'Call me', '', '', '2025-06-17 11:48:15'),
(108, 'Jitendra', 'Kameshwar mandal', 'Jidevikadra12345@gmail.com', '8483060485', '', '', '', '2025-06-17 12:13:16'),
(109, 'Madhuri', 'Dhatrak', 'madhuridhatrak331@gmail.com', '9529673218', '2 bhk nashik', '', '', '2025-06-17 13:14:25'),
(110, 'Vishal', 'kadam', 'vishalkadam7154@gmail.com', '9370079136', 'i want flat gangapur road side', '', '', '2025-06-17 13:52:09'),
(111, 'Urvashi', 'Patil', 'kateurvashi3@gmail.com', '9309154338', '', '', '', '2025-06-17 15:29:09'),
(112, 'Indira narnnware', 'Indirakodape', 'indirakodape70@gimalcom', 'kodapeindira6@g', '2bihk', '', '', '2025-06-17 16:21:03'),
(113, 'Vinay', 'Singh', 'vinaysingh@gmail.com', '9325841258008', '', '', '', '2025-06-17 17:21:08'),
(114, 'V', 'S', 'sdf@gmail.com', '85666442338', '', '', '', '2025-06-17 17:21:51'),
(115, 'Prakash', 'Jadhav', 'prakashjadhav8131@gmail.com', 'prakashjadhav81', '', '', '', '2025-06-18 05:20:09'),
(116, 'Yogesh', 'Bhaurao Dhage', 'Yogeshdha007@gmail.com', '7588555609', 'I need to 2bhk flat makhamalabad and Peth Road', '', '', '2025-06-18 05:20:42'),
(117, 'Kunal', 'Dube', 'kunaldube777@gmail.com', '8308679311', '', '', '', '2025-06-18 06:14:00'),
(118, 'Shraddha', 'Gawande', 'shraddhaugale136@gmail.com', '9325589559', 'Price please', '', '', '2025-06-18 07:07:22'),
(119, 'Hemant', 'Sonar', 'hemantsonar@gmail.com', '9422281793', '3Bhk', '', '', '2025-06-18 07:44:46'),
(120, 'Rani', 'Ahire', 'ahirerani94@gmail.com', 'ahirerani94@gma', '3 bhk flat', '', '', '2025-06-18 08:14:56'),
(121, 'Rani', 'Ahire', 'ahirerani94@gmail.com', 'ahirerani94@gma', '3 bhk flat', '', '', '2025-06-18 08:14:57'),
(122, 'Rani', 'Ahire', 'ahirerani94@gmail.com', 'ahirerani94@gma', '3 bhk flat', '', '', '2025-06-18 08:14:59'),
(123, 'Rani', 'Ahire', 'ahirerani94@gmail.com', 'ahirerani94@gma', '3 bhk flat', '', '', '2025-06-18 08:15:01'),
(124, 'Rani', 'Ahire', 'ahirerani94@gmail.com', 'ahirerani94@gma', '3 bhk flat  c', '', '', '2025-06-18 08:15:02'),
(125, 'Rani', 'Ahire', 'ahirerani94@gmail.com', 'ahirerani94@gma', '3 bhk flat  cha', '', '', '2025-06-18 08:15:03'),
(126, 'Rani', 'Ahire', 'ahirerani94@gmail.com', 'ahirerani94@gma', '3 bhk flat  chah', '', '', '2025-06-18 08:15:04'),
(127, 'Saniya', 'Ansari', 'Saniyaansarii664@gmail.com', '7620679952', '', '', '', '2025-06-18 08:40:02'),
(128, 'Arun', 'Kumar', 'arungour2399@gmail.com', '8830221466', '', '', '', '2025-06-18 08:47:53'),
(129, 'Chetan', 'Ahire', 'ahirechetan706@gmail.com', '7028796203', '', '', '', '2025-06-18 09:33:06'),
(130, 'Govinda bodade', 'Bodade', 'bodadegovindabodade@gmail.com', 'bodadegovindabo', '123456', '', '', '2025-06-18 10:13:25'),
(131, 'Chetan', 'Rajput', 'chetanrajput855@gmail.com', '9209214385', 'Hi', '', '', '2025-06-18 10:30:36'),
(132, 'Mithila', 'Iyer', 'mithila1010@gmail.com', '9833636674', '', '', '', '2025-06-18 12:25:52'),
(133, 'Smitesh', 'Daulat Chakor', 'smiteshchakor@gmail.com', '7875909794', '', '', '', '2025-06-18 12:41:30'),
(134, 'Abbas', 'Mujawar', 'mujavarabbas48@gmail.com', '9067556542', '2bhk home available', '', '', '2025-06-18 13:46:16'),
(135, 'Yogesh', 'Chaudhari', 'yogeshchaudhari4319@gmail.com', '8805257396', '2 bhk', '', '', '2025-06-18 14:21:44'),
(136, 'Rajendar balkushn Gotise', 'Gotise', 'rajendargotise999@gmail.com', '9822800916', '2 bhk &amp; Shop \r\nDhurv nagar Shivaji Nagar ganga', '', '', '2025-06-18 15:05:00'),
(137, 'Bhaskar', 'Pawar', 'bhaskarpawar283@gmail.com', '8766966398', '', '', '', '2025-06-18 16:01:44'),
(138, 'Ronny', 'Ronny', 'ronnyjerom1@gmail.com', 'ronnyjerom1@gma', '', '', '', '2025-06-19 04:57:50'),
(139, 'Ronny', 'Ronny', 'ronnyjerom1@gmail.com', 'ronnyjerom1@gma', '', '', '', '2025-06-19 04:57:52'),
(140, 'Ronny', 'Ronny', 'ronnyjerom1@gmail.com', 'ronnyjerom1@gma', '', '', '', '2025-06-19 04:57:53'),
(141, 'Ronny', 'Jerom', 'ronnyjerom1@gmail.com', '9324298939', 'Job ki jarurat hai Bombay', '', '', '2025-06-19 04:58:23'),
(142, 'Nivrutti', 'Patil', 'nivrutipatilkanhere@gmail.com', 'nivrutipatilkan', '', '', '', '2025-06-19 05:05:02'),
(143, 'Geeta', 'Sisodiya', 'geetalatasisodiya56681@gmail.com', '+44918779026781', '', '', '', '2025-06-19 05:37:40'),
(144, 'Avinash', 'Chavan', 'kushalchavan7507@gmail.com', '7507685470', '', '', '', '2025-06-19 08:00:24'),
(145, 'Lavanya', 'Wagh', 'lauwagh015@gmail.com', 'lauwagh015@gmai', '', '', '', '2025-06-19 08:13:50'),
(146, 'विजय', 'गांगुडॅ', 'vijaygangurde5@gmail.com', '8888135542', 'नाशिक', '', '', '2025-06-19 08:15:49'),
(147, 'Anil', 'Jagtap', 'aniljagtap301967@gmail.com', '8788405931', '', '', '', '2025-06-19 08:24:57'),
(148, 'Gorakh', 'Zende', 'zendegorakh37@gmail.com', 'zendegorakh37@g', '', '', '', '2025-06-19 14:43:57'),
(149, 'Gorakh', 'Zende', 'zendegorakh37@gmail.com', 'zendegorakh37@g', '', '', '', '2025-06-19 14:44:48'),
(150, 'Gorakh', 'Zende', 'zendegorakh37@gmail.com', 'zendegorakh37@g', '', '', '', '2025-06-19 14:44:49'),
(151, 'Gorakh', 'Zende', 'zendegorakh37@gmail.com', 'zendegorakh37@g', '9529973638', '', '', '2025-06-19 14:45:24'),
(152, 'Gorakh', 'Zende', 'zendegorakh37@gmail.com', 'zendegorakh37@g', '9529973638', '', '', '2025-06-19 14:45:26'),
(153, 'Gorakh', 'Zende', 'zendegorakh37@gmail.com', 'zendegorakh37@g', '9529973638', '', '', '2025-06-19 14:45:28'),
(154, 'Jyoti', 'Thorat', 'jyotithorat251@gmail.com', '+918010658659', 'Price kai aahe', '', '', '2025-06-19 15:19:16'),
(155, 'Karan', 'Chavan', 'kc1776829@gmail.com', '9322246990', '3bhk flat free please🥹', '', '', '2025-06-19 15:30:10'),
(156, 'Jitendra', 'Gade', 'jitugade@gmail.com', '8806782678', 'Kalanagar, dindori rd, 2bhk', '', '', '2025-06-20 01:57:21'),
(157, 'Milind', 'Saindane', 'milindsaindane1984@gmail.com', 'milindsaindane1', '', '', '', '2025-06-20 05:13:30'),
(158, 'Sakshi', 'Ahire', 'asakshi960@gmail.com', '9503802435', 'I have Home', '', '', '2025-06-20 05:25:34'),
(159, 'Sakshi', 'Ahire', 'asakshi960@gmail.com', '+917299511919', '', '', '', '2025-06-20 05:25:58'),
(160, 'Adesh', 'Raut', 'rautadesh@gmail.com', '8668766211', '👋 namaste \r\nKas hoo', '', '', '2025-06-20 09:20:33'),
(161, 'Poonam', 'Kushwaha a', 'rajtoursntravels197@gmail.com', '8010768435', '', '', '', '2025-06-20 10:48:14'),
(162, 'Sameer', 'Shaikh', 'sameershaikh35368@gmail.com', 'sameershaikh353', '', '', '', '2025-06-21 04:45:37'),
(163, 'Sameer', 'Shaikh', 'sameershaikh35368@gmail.com', 'sameershaikh353', '', '', '', '2025-06-21 04:45:38'),
(164, 'Sameer', 'Shaikh', 'sameershaikh35368@gmail.com', 'sameershaikh353', '', '', '', '2025-06-21 04:45:39'),
(165, 'Sameer', 'Shaikh', 'sameershaikh35368@gmail.com', 'sameershaikh353', '', '', '', '2025-06-21 04:45:40'),
(166, 'Sameer', 'Shaikh', 'sameershaikh35368@gmail.com', 'sameershaikh353', '', '', '', '2025-06-21 04:45:41'),
(167, 'Sameer', 'Shaikh', 'sameershaikh35368@gmail.com', 'sameershaikh353', '', '', '', '2025-06-21 04:45:42'),
(168, 'Sameer', 'Shaikh', 'sameershaikh35368@gmail.com', 'sameershaikh353', '', '', '', '2025-06-21 04:45:43'),
(169, 'Sameer', 'Shaikh', 'sameershaikh35368@gmail.com', 'sameershaikh353', '', '', '', '2025-06-21 04:45:45'),
(170, 'Sameer', 'Shaikh', 'sameershaikh35368@gmail.com', 'sameershaikh353', '', '', '', '2025-06-21 04:45:46'),
(171, 'Prathmesh govind', 'nigle', 'prathmeshnigale@gmail.com', '9322242719', '', '', '', '2025-06-21 10:19:02'),
(172, 'Shiva', 'Vhadgal', 'vhadgalshiva8@gmail.com', 'vhadgalshiva8@g', '', '', '', '2025-06-21 12:22:09'),
(173, 'Tausif', 'Shaikh', 'tausifa845995@gmail.com', '7620151090', '', '', '', '2025-06-21 15:52:08'),
(174, 'Saklen', 'Pansare', 'saklenpansare@gmail.com', '8975218471', 'House', '', '', '2025-06-21 16:29:11'),
(175, 'Madne Deepak', '.Nagnathrao', 'aditya.madne27@gmail.com', '9970464342', '', '', '', '2025-06-21 16:43:26'),
(176, 'Nitin', 'Padavi', 'nitinpadavi96@gmail.com', '9403435416', 'We Want to buy flat', '', '', '2025-06-21 17:18:11'),
(177, 'Saurab', 'Prasad', 'saurabsinha0017@gmail.com', '9175120017', '', '', '', '2025-06-22 07:47:45'),
(178, 'Prasad', 'Pandhare', 'prasadpandhare20@gmail.com', '7083197276', '.', '', '', '2025-06-22 09:16:45'),
(179, 'Mohan', 'Devakar', 'mohandevkar282@gmail.com', 'mohandevkar282@', '2 bhk flat and RO house', '', '', '2025-06-22 09:49:54'),
(180, 'Mohan', 'Devakar', 'mohandevkar282@gmail.com', 'mohandevkar282@', '2 bhk flat and RO house', '', '', '2025-06-22 09:49:55'),
(181, 'Bhushan', 'Dagale', 'bhushandagale@gmail.com', '9226303008', '', '', '', '2025-06-22 17:45:18'),
(182, 'SHRIKANT', 'VADNAL', 'shri6db@gmail.com', '9850974467', 'Govind nagar', '', '', '2025-06-23 03:03:17'),
(183, 'Sachin', 'Garud', 'sachingarud124@gmail.com', '+919503165168', 'Hi IA am sachin garud', '', '', '2025-06-23 04:53:44'),
(184, 'Amol', 'Jadhav', 'amsjadhav@gmail.con', '9158138199', '', '', '', '2025-06-23 06:18:05'),
(185, 'Dharma', 'Shinde', 'dharmashinde1434@gmail.com', '8669081360', 'Narayan Bau Nagar, Jail Road, Nashik Road', '', '', '2025-06-23 09:23:39'),
(186, 'Komal Ashok', 'salve', 'komalsalve845@gmail.com', '9529405080', '3 bhk', '', '', '2025-06-23 09:48:26'),
(187, 'Komal Ashok', 'salve', 'komalsalve845@gmail.com', '9529405880', '3 bhk flat nashik madhe hava', '', '', '2025-06-23 09:50:02'),
(188, 'AliS', 'khan', 'mdaliskhan35@gmail.com', '9561840824', 'We are getting houses from the government, is this', '', '', '2025-06-23 09:52:04'),
(189, 'Anusaya', 'koli', 'anuskoli123@gmail.com', '9325519232', '', '', '', '2025-06-23 10:52:18'),
(190, 'Sagar', 'Shinde', 'sagas4957@gmail.com', '8779024019', '', '', '', '2025-06-23 14:30:15'),
(191, 'Hira', 'Shaikh', 'shaikhhira459@gmail.com', '9209672885', '', '', '', '2025-06-23 16:53:04'),
(192, 'vasim', 'shaikh', 'vasimshaikh202@gmail.com', '9822776607', '', '', '', '2025-06-24 04:36:13'),
(193, 'Kamlesh', 'Kumar', 'kamleshkumar01011999123@gmail.com', '+1919529975691', '', '', '', '2025-06-24 05:59:17'),
(194, 'Sunny', 'Wankhede', 'sunnywankhede35@gmail.com', '9970743552', '', '', '', '2025-06-24 06:28:54'),
(195, 'swati', 'Vadje', 'vadjeswati67@gmail.com', 'vadjeswati67@gm', '', '', '', '2025-06-24 07:27:58'),
(196, 'swati', 'Vadje', 'vadjeswati67@gmail.com', '9284402950', '', '', '', '2025-06-24 07:28:20'),
(197, 'Prashant', 'Salunke', 'salunkeprashant1993@gmail.com', 'salunkeprashant', '1bhk', '', '', '2025-06-24 12:24:32'),
(198, 'Prashant', 'Salunke', 'salunkeprashant1993@gmail.com', 'salunkeprashant', '1bhk', '', '', '2025-06-24 12:24:40'),
(199, 'Prashant', 'Salunke', 'salunkeprashant1993@gmail.com', 'salunkeprashant', '1bhk', '', '', '2025-06-24 12:24:43'),
(200, 'Prashant', 'Salunke', 'salunkeprashant1993@gmail.com', 'salunkeprashant', '1bhk', '', '', '2025-06-24 12:24:44'),
(201, 'Prashant', 'Salunke', 'salunkeprashant1993@gmail.com', 'salunkeprashant', '', '', '', '2025-06-24 12:24:47'),
(202, 'Ramesh', 'Pawara', 'rameshgpawar86@gmail.com', 'rameshgpawar86@', 'Hi', '', '', '2025-06-24 13:22:39'),
(203, 'Dilip', 'Rajput', 'deeliprajput28@gmail.com', '+18055155544', 'Only नाशिक सिटी', '', '', '2025-06-24 16:29:32'),
(204, 'Ajay yadav swami nagar', 'pot54', 'ayadav39140@gmail.com', '9762584633', 'Ya 2 BH  1 BH', '', '', '2025-06-25 02:47:03'),
(205, 'Nanda m', 'Marwat', 'nandamarvat452@gmail.com', 'nandamarvat452@', 'Valuable nashik', '', '', '2025-06-25 05:36:37'),
(206, 'Nanda m', 'Marwat', 'nandamarvat452@gmail.com', '9075352264', '', '', '', '2025-06-25 05:38:37'),
(207, 'Rutu', 'Rutu', 'ruturutu269@gmail.com', 'ruturutu269@gma', '7218240831', '', '', '2025-06-25 06:04:36'),
(208, 'Rupesh', 'Shirsath', 'shirsath.rupesh63@gmail.com', '8983506894', 'Looking for a ready possession 2BHK around 45L', '', '', '2025-06-25 07:02:46'),
(209, 'Anant', 'Bhosale', 'bhosaleanant897@gmail.com', 'bhosaleanant897', '8369775400', '', '', '2025-06-25 07:45:46'),
(210, 'Anant', 'Bhosale', 'bhosaleanant897@gmail.com', 'bhosaleanant897', '8369775400', '', '', '2025-06-25 07:45:47'),
(211, 'Anand', 'Bhosale', 'anantbhosale1978@gmail.com', 'anantbhosale197', '8369775400', '', '', '2025-06-25 07:47:50'),
(212, 'प्रकाश', 'सिरसाठ', 'prakashshirsath27@gmail.com', 'prakashshirsath', '2 bhk flat', '', '', '2025-06-25 10:05:00'),
(213, 'Vithal', 'Borse', 'borsevithal69@gmail.com', '9021067608', '1bhk pachavati', '', '', '2025-06-25 11:19:35'),
(214, 'Pravin', 'Paridhi', 'pravinparidhi35@gmail.com', 'pravinparidhi35', '', '', '', '2025-06-25 13:11:22'),
(215, 'Pravin', 'Paridhi', 'pravinparidhi35@gmail.com', 'pravinparidhi35', '', '', '', '2025-06-25 13:11:41'),
(216, 'Pravin', 'Paridhi', 'pravinparidhi35@gmail.com', 'pravinparidhi35', '9325515781', '', '', '2025-06-25 13:12:33'),
(217, 'Pravin', 'Paridhi', 'pravinparidhi35@gmail.com', 'pravinparidhi35', '9325515781', '', '', '2025-06-25 13:12:35'),
(218, 'Harshita', 'Chaturvedi', 'goodcurvess@gmail.com', '8368431585', 'Looking for 4,5bhk or plots if available,villas', '', '', '2025-06-25 13:51:49'),
(219, 'Samadhan', 'Pagare', 'pagaresamadhan007@gmail.com', '7507421027', 'I Need 1bhk flat', '', '', '2025-06-26 02:34:47'),
(220, 'Manisha', 'Bhamare', 'manishabhamare3268@gmail.com', '9657729326', 'Hi', '', '', '2025-06-26 03:18:14'),
(221, 'anand', 'patil', 'anandacpatil1984@gmail.com', '9834964600', '', '', '', '2025-06-26 03:40:38'),
(222, 'Dnyaneshwar', 'Thakare', 'dnyaneshwartha970@gmail.com', 'dnyaneshwartha9', '', '', '', '2025-06-26 04:27:12'),
(223, 'Dnyaneshwar', 'Thakare', 'dnyaneshwartha970@gmail.com', '-9699364272', '', '', '', '2025-06-26 04:28:09'),
(224, 'suvarna pawar', 'pawar', 'sp8562943@gmail.com', '8637737031', '', '', '', '2025-06-26 05:54:40'),
(225, 'Rahul', 'Thakur', 'thakurrahul77@gmail.com', '+91 98701 00420', 'Want to visit today', '', '', '2025-06-26 05:58:34'),
(226, 'Renuka', 'K', 'kathalerenuka137@gmail.com', '8975530110', 'Hello', '', '', '2025-06-26 08:58:53'),
(227, 'Sanjay', 'Ahire', 'ahiresanjay1977@gmail.com', '9922403841', 'Jatra hotel Ghar paije', '', '', '2025-06-26 10:16:24'),
(228, 'Naresh', 'Lokhande', 'nareshlokhande69@gmail.com', '9822683335', '', '', '', '2025-06-27 06:27:38'),
(229, 'Bharti', 'maind', 'bhartimaind25@gmail.com', '07722077498', '', '', '', '2025-06-27 09:45:41'),
(230, 'Suraj', 'Lakhan', 'surajlakhan2811@gmail.com', '9960823525', '1BHK rto', '', '', '2025-06-27 12:44:13'),
(231, 'Akshata', 'Dive', 'akshatadive2000@gmail.com', 'akshatadive2000', '3bhk', '', '', '2025-06-27 14:54:59'),
(232, 'manisha', 'trimbake', 'manishatrimbake699@gmail.com', '9921558660', '', '', '', '2025-06-28 05:15:40'),
(233, 'Kailas Suresh Salve', 'Salve', 'salve8638@gmail.com', '9850583188', '', '', '', '2025-06-28 14:30:29'),
(234, 'jairam', 'Pagare', 'jspagarearna@gmail.com', '9921211313', 'Interested to बुय', '', '', '2025-06-28 16:43:58'),
(235, 'Abhi', 'patil', 'abhipati333@gmail.com', '9359997516', '', '', '', '2025-06-28 17:32:14'),
(236, 'Rajesh', 'Dongre', 'dongrerajesh831@gmail.com', '7620915136', '1bhk price', '', '', '2025-06-29 04:02:12'),
(237, 'Aditya', 'Jadhav', 'jadhavsupa1@gmail.com', '7709587970', 'Aditya jadhav', '', '', '2025-06-29 06:01:57'),
(238, 'Aamonraj', 'Biswas', 'rahulbiswas0923@gmail.com', '09749283599', 'Bachelor room under 4000', '', '', '2025-06-29 09:22:19'),
(239, 'Mangesh', 'Jadhav', 'jadhavmangesh22@gmail.com', '08806062806', '', '', '', '2025-06-29 10:33:46'),
(240, 'Gauri', 'Handore', 'gauriah27@gmail.com', '9579470188', '', '', '', '2025-06-30 01:53:12'),
(241, 'Aishwarya', 'Janhave', 'asjanve@gmail.com', '9049714016', '', '', '', '2025-06-30 09:05:49'),
(242, 'Bhaskar', 'More', 'haskarmore.more9@gmail.com', '9421887729', 'Want home', '', '', '2025-06-30 10:08:05'),
(243, 'sagar', 'Patil', 'sagarpatil199784@gmail.com', '9527995262', 'New flats new look', '', '', '2025-06-30 17:08:29'),
(244, 'Raju', 'Gupta', 'rg889122@gmail.com', '09324027175', '', '', '', '2025-06-30 17:28:34'),
(245, 'Gulabsing', 'Raut', 'rgulabsing33@gmail.com', 'rgulabsing33@gm', 'Hi', '', '', '2025-07-02 05:32:16'),
(246, 'Tanaji', 'Chavan', 'tanajichavan01011990@gmail.com', '9309114311', 'Maharashtra', '', '', '2025-07-02 06:31:49'),
(247, 'Thisisrajat', 'Baldawa', 'rajatbaldawa001@gmail.com', '7774027741', '', '', '', '2025-07-02 13:02:44'),
(248, 'Sanchita', 'Lande', 'landesanchita17@gmail.com', '9920917975', 'Looking residantial propery in Nashik', '', '', '2025-07-02 13:32:51'),
(249, 'Durgesh', 'Koli', 'durgeshkoli109@gmail.com', 'durgeshkoli109@', 'Gun call bol', '', '', '2025-07-02 16:58:43'),
(250, 'Durgesh', 'Koli', 'durgeshkoli109@gmail.com', 'durgeshkoli109@', 'Hmm bol', '', '', '2025-07-02 16:59:04'),
(251, 'Durgesh', 'Koli', 'durgeshkoli109@gmail.com', 'durgeshkoli109@', '', '', '', '2025-07-02 16:59:32'),
(252, 'Durgesh', 'Koli', 'durgeshkoli109@gmail.com', 'durgeshkoli109@', '', '', '', '2025-07-02 16:59:34'),
(253, 'durgeshkoli109@gmail.com', 'Koli', 'durgeshkoli109@gmail.com', 'durgeshkoli109@', '', '', '', '2025-07-02 16:59:54'),
(254, 'durgeshkoli109@gmail.com', 'Koli', 'durgeshkoli109@gmail.com', 'durgeshkoli109@', '', '', '', '2025-07-02 16:59:56'),
(255, 'Durgesh', 'Koli', 'durgeshkoli109@gmail.com', 'durgeshkoli109@', '', '', '', '2025-07-02 17:00:23'),
(256, 'Durgesh', 'Koli', 'durgeshkoli109@gmail.com', 'durgeshkoli109@', '', '', '', '2025-07-02 17:00:25'),
(257, 'Durgesh', 'Koli', 'durgeshkoli109@gmail.com', 'durgeshkoli109@', '', '', '', '2025-07-02 17:00:45'),
(258, 'Durgesh', 'Koli', 'durgeshkoli109@gmail.com', 'durgeshkoli109@', '', '', '', '2025-07-02 17:00:47'),
(259, 'Durgesh', 'Koli', 'durgeshkoli109@gmail.com', 'durgeshkoli109@', '', '', '', '2025-07-02 17:00:48'),
(260, 'Durgesh', 'Koli', 'durgeshkoli109@gmail.com', 'durgeshkoli109@', '', '', '', '2025-07-02 17:00:54'),
(261, 'Durgesh', 'Koli', 'durgeshkoli109@gmail.com', 'durgeshkoli109@', '', '', '', '2025-07-02 17:00:55'),
(262, 'Durgesh', 'Koli', 'durgeshkoli109@gmail.com', 'durgeshkoli109@', '', '', '', '2025-07-02 17:00:56'),
(263, 'Durgesh', 'Koli', 'durgeshkoli109@gmail.com', 'durgeshkoli109@', '', '', '', '2025-07-02 17:00:58'),
(264, 'Durgesh', 'Koli', 'durgeshkoli109@gmail.com', 'durgeshkoli109@', '', '', '', '2025-07-02 17:00:59'),
(265, 'Durgesh', 'Koli', 'durgeshkoli109@gmail.com', 'durgeshkoli109@', '', '', '', '2025-07-02 17:01:00'),
(266, 'Durgesh', 'Koli', 'durgeshkoli109@gmail.com', 'durgeshkoli109@', '', '', '', '2025-07-02 17:01:01'),
(267, 'Durgesh', 'Koli', 'durgeshkoli109@gmail.com', 'durgeshkoli109@', '', '', '', '2025-07-02 17:01:02'),
(268, 'Durgesh', 'Koli', 'durgeshkoli109@gmail.com', 'durgeshkoli109@', '', '', '', '2025-07-02 17:01:03'),
(269, 'Durgesh', 'Koli', 'durgeshkoli109@gmail.com', 'durgeshkoli109@', '', '', '', '2025-07-02 17:01:05'),
(270, 'Durgesh', 'Koli', 'durgeshkoli109@gmail.com', 'durgeshkoli109@', '', '', '', '2025-07-02 17:01:06'),
(271, 'Jayshri Ashok jagtap', 'Jagtap', 'jayshreejagtap031@gmail.com', '918605356030', 'Mala ghar nahi kahi property nahi mala 2muli ahe m', '', '', '2025-07-03 02:42:38'),
(272, 'Durgesh', 'Patil', 'durgeshpatilr15@gmail.com', '9423488681', '', '', '', '2025-07-03 02:44:53'),
(273, 'samadhan', 'ahire', 'ahiresamadhan3440@gmailcom', '7058802005', 'I\'m interested to home', '', '', '2025-07-03 05:31:21'),
(274, 'Samadhan', 'ahire', 'ahiresamadhan3440@gmailcom', '07058802005', '', '', '', '2025-07-03 05:33:09'),
(275, 'Bhushan', 'Kachave', 'bhushankachave9900@gmail.com', '9823317991', 'Required 2 bhk flat.', '', '', '2025-07-03 07:19:27'),
(276, 'Istyak', 'Mansuri', 'istyakm892@gmail.com', 'istyakm892@gmai', '', '', '', '2025-07-04 10:17:42'),
(277, 'Srujan', 'Marathe', 'srujanmarathe70@gmail.com', '9822368161', '', '', '', '2025-07-04 12:34:25'),
(278, 'Rahul', 'Lahare', 'rahulrahullahare0@gmail.com', '9243830796', '', '', '', '2025-07-05 05:32:52'),
(279, 'Rakesh', 'Gupta', 'rakeshgupta47582@gmail.com', '9820802852', 'A\r\nHf\r\nDc', '', '', '2025-07-05 05:43:02'),
(280, 'नेहा', 'Jha', 'vjha0445@gmail.com', 'vjha0445@gmail.', 'खोकर', '', '', '2025-07-05 06:41:23'),
(281, 'Adarsh', 'Ray', 'mrityunjay.jjja@gmail.com', '9920279375', '', '', '', '2025-07-05 06:49:43'),
(282, 'Viral', 'L', 'Gyasinanda@1234', '8450944300', 'Please 9ef', '', '', '2025-07-05 12:37:20'),
(283, '9112386229', 'Shaikh', 'shaikhvasimyusuf@gmail.com', 'shaikhvasimyusu', '', '', '', '2025-07-05 13:54:45'),
(284, 'Kiran', 'Jadhav', 'kiranjadhav300394@gmail.com', '7755958513', '', '', '', '2025-07-06 04:23:14'),
(285, 'Prakash', 'Bhat', 'jyotiprakash234@gmail.com', '8605464555', '2 Bhk flat  near\r\nGovind nagar', '', '', '2025-07-06 04:24:29'),
(286, 'Sadan', 'Khan', 'sabank58135@gmail.com', '786', 'Hii', '', '', '2025-07-06 08:51:07'),
(287, 'Dhiraj', 'Khare', 'dhiraj23k@yahoo.com', '9284402428', '', '', '', '2025-07-06 09:37:21'),
(288, 'Ashok', 'Kumar', 'ashokkumarparjapati28@gmail.com', '6389381037', 'Please', '', '', '2025-07-06 17:30:45'),
(289, 'Tushar', 'Shende', 'ts291741@gmail.com', '7820872386', '', '', '', '2025-07-07 07:49:25'),
(290, 'Pradip', 'ray', 'rayp85395@gmail.com', '6306915371', 'Hi', '', '', '2025-07-07 11:44:03'),
(291, 'Sunil', 'Borse', 'borsesunil205@gmial.com', '9420562380', '', '', '', '2025-07-07 17:10:10'),
(292, 'Rajaram', 'Avhad', 'rajaramavhad@26gmail.com', '9821274686', '', '', '', '2025-07-08 08:02:12'),
(293, 'Om', 'Gadhave', 'omgadhave064@gmail.com', '9356980627', '', '', '', '2025-07-08 13:26:44'),
(294, 'Sahil', 'Mishra', 'sahil.mirshra14@gmail.com', '+91 90678 38988', 'I am like this property let me know so I\'ll try to', '', '', '2025-07-09 07:29:07'),
(295, 'Nilima', 'Kolte', 'nilima1890.dhake@gmail.com', '8408064169', '', '', '', '2025-07-09 09:16:01'),
(296, 'durgesh', 'suryawaanshi', 'suryawanshidurgesh936@gmail.com', '8459278318', 'looking for a best 2 BHK property  in nashik on be', '', '', '2025-07-09 09:54:20'),
(297, 'Dilip', 'Chaudhari', 'dilipchaidhary1450@gmail.com', '7588405913', '', '', '', '2025-07-11 11:48:35'),
(298, 'Tejas', 'Laddha', 'tlladdha97@gmail.com', '9028371879', '', '', '', '2025-07-13 08:57:09'),
(299, 'Ankit Kumar', 'Ankit Kumar', 'ankitkumarankitkumar5552@gmail.com', 'ankitkumarankit', '', '', '', '2025-07-13 11:25:31'),
(300, 'Naveen', 'D', 'naveenkumar2405@gmail.com', '8767047219', 'About project', '', '', '2025-07-18 07:20:37'),
(303, 'NINAD', 'VAIDYA', 'ninadvaidya99@gmail.com', '9403245953', 'I am looking for a 2 BHK or a 3BHK flat in good lo', '', 'residential', '2025-07-19 11:23:06'),
(304, 'Dinesh', 'Tarani', 'taranidinesh@yahoo.co.in', '9225114114', '', '', 'residential', '2025-07-19 15:51:57'),
(305, 'सूरज', 'रावण', 'teeyaagrawal369@gmail.com', 'teeyaagrawal369', 'Sexy girl', '', '', '2025-07-27 02:04:28'),
(306, 'Kartik', 'Godhade', 'godhade1998@gmail.com', '9373153167', 'Kartik\r\nGodhade\r\n28', '', '', '2025-07-27 08:30:54'),
(307, 'Kartik', 'godhade1998@gmail.com', 'godhade1998@gmail.com', '9373153167', '', '', '', '2025-07-27 08:32:26'),
(308, 'Kartik', 'godhade1998@gmail.com', 'godhade1998@gmail.com', '9373153167', '', '', '', '2025-07-27 08:32:28'),
(309, 'aaa', 'bbbb', 'aaa@gmail.com', '9856321452', 'czxczxcz', '', 'commercial', '2025-07-29 10:08:27');

-- --------------------------------------------------------

--
-- Table structure for table `key_features`
--

CREATE TABLE `key_features` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `icon_html` varchar(255) NOT NULL,
  `key_heading` varchar(255) NOT NULL,
  `key_describ` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `key_features`
--

INSERT INTO `key_features` (`id`, `project_id`, `icon_html`, `key_heading`, `key_describ`, `created_at`) VALUES
(6, 14, '<i class=\"fa-solid fa-hand-holding-heart\"></i>', 'Easy Ownership', 'Reserve your dream home with a simple booking process and a nominal booking fee.', '2025-03-27 09:59:29'),
(7, 14, '<i class=\"fa-solid fa-gem\"></i>', 'Luxury Redefined', 'Experience the epitome of luxury living in Nashik with our meticulously designed residences, boasting modern amenities and serene surroundings', '2025-03-27 09:59:29'),
(8, 14, '<i class=\"fa-solid fa-location-dot\"></i>', 'Prime Location', 'Strategically located in the heart of Nashik, our project offers unparalleled connectivity and convenience', '2025-03-27 09:59:29'),
(9, 13, '<i class=\"fa-solid fa-hand-holding-heart\"></i>', 'Easy Ownership', 'Reserve your dream home with a simple booking process and a nominal booking fee.', '2025-03-27 10:06:10'),
(10, 13, '<i class=\"fa-solid fa-gem\"></i>', 'Luxury Redefined', 'Experience the epitome of luxury living in Nashik with our meticulously designed residences, boasting modern amenities and serene surroundings', '2025-03-27 10:06:10'),
(11, 13, '<i class=\"fa-solid fa-location-dot\"></i>', 'Prime Location', 'Strategically located in the heart of Nashik, our project offers unparalleled connectivity and convenience', '2025-03-27 10:06:10'),
(14, 18, '<i class=\"fa-solid fa-hand-holding-heart\"></i>', 'Easy Ownership', 'Reserve your dream home with a simple booking process and a nominal booking fee.', '2025-04-08 07:02:20'),
(15, 18, '<i class=\"fa-solid fa-gem\"></i>', 'Luxury Redefined', 'Experience the epitome of luxury living in Nashik with our meticulously designed residences, boasting modern amenities and serene surroundings', '2025-04-08 07:02:20'),
(16, 18, '<i class=\"fa-solid fa-location-dot\"></i>', 'Prime Location', 'Strategically located in the heart of Nashik, our project offers unparalleled connectivity and convenience', '2025-04-08 07:02:20'),
(17, 19, '<i class=\"fa-solid fa-hand-holding-heart\"></i>', 'Easy Ownership', 'Reserve your dream home with a simple booking process and a nominal booking fee.', '2025-04-09 07:03:14'),
(18, 19, '<i class=\"fa-solid fa-gem\"></i>', 'Luxury Redefined', 'Experience the epitome of luxury living in Nashik with our meticulously designed residences, boasting modern amenities and serene surroundings', '2025-04-09 07:03:14'),
(19, 19, '<i class=\"fa-solid fa-location-dot\"></i>', 'Prime Location', 'Strategically located in the heart of Nashik, our project offers unparalleled connectivity and convenience', '2025-04-09 07:03:14'),
(20, 21, '<i class=\"fa-solid fa-hand-holding-heart\"></i>', 'Easy Ownership', 'Reserve your dream home with a simple booking process and a nominal booking fee.', '2025-04-14 07:17:46'),
(21, 21, '<i class=\"fa-solid fa-gem\"></i>', 'Luxury Redefined', 'Experience the epitome of luxury living in Nashik with our meticulously designed residences, boasting modern amenities and serene surroundings', '2025-04-14 07:17:46'),
(22, 21, '<i class=\"fa-solid fa-location-dot\"></i>', 'Prime Location', 'Strategically located in the heart of Nashik, our project offers unparalleled connectivity and convenience', '2025-04-14 07:17:46'),
(23, 23, '<i class=\"fa-solid fa-hand-holding-heart\"></i>', 'Easy Ownership', 'Reserve your dream home with a simple booking process and a nominal booking fee.', '2025-04-19 06:39:24'),
(24, 23, '<i class=\"fa-solid fa-gem\"></i>', 'Luxury Redefined', 'Experience the epitome of luxury living in Nashik with our meticulously designed residences, boasting modern amenities and serene surroundings', '2025-04-19 06:39:24'),
(25, 23, '<i class=\"fa-solid fa-location-dot\"></i>', 'Prime Location', 'Strategically located in the heart of Nashik, our project offers unparalleled connectivity and convenience', '2025-04-19 06:39:24');

-- --------------------------------------------------------

--
-- Table structure for table `logo_img`
--

CREATE TABLE `logo_img` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `property_type` varchar(255) NOT NULL,
  `status` varchar(25) NOT NULL,
  `creation_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logo_img`
--

INSERT INTO `logo_img` (`id`, `image`, `property_type`, `status`, `creation_on`) VALUES
(1, 'uploads/logo/166 x 60_logo.png', 'residential', 'Active', '2025-03-04 17:54:55'),
(2, 'uploads/logo/166 x 60_logo.png', 'commercial', 'Active', '2025-03-05 15:21:33');

-- --------------------------------------------------------

--
-- Table structure for table `plan_images`
--

CREATE TABLE `plan_images` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plan_images`
--

INSERT INTO `plan_images` (`id`, `project_id`, `image_path`, `created_at`) VALUES
(7, 13, 'uploads/plan_images/1743055074_2088203317383185541339804464.webp', '2025-03-27 05:57:54'),
(8, 13, 'uploads/plan_images/1743055074_83783262017383185542106035036.webp', '2025-03-27 05:57:54'),
(9, 13, 'uploads/plan_images/1743055074_45392720217383185541604752415.webp', '2025-03-27 05:57:54'),
(10, 14, 'uploads/plan_images/1743068829_101305365917383189132048952963.webp', '2025-03-27 09:47:09'),
(11, 14, 'uploads/plan_images/1743068829_124170283217383189131544534003.webp', '2025-03-27 09:47:09'),
(12, 14, 'uploads/plan_images/1743068829_8140048571738318913342105145.webp', '2025-03-27 09:47:09'),
(13, 14, 'uploads/plan_images/1743068829_114664215417383189132097071922.webp', '2025-03-27 09:47:09'),
(18, 18, 'uploads/plan_images/1744095464_181450891317409195821552845309.webp', '2025-04-08 06:57:44'),
(19, 18, 'uploads/plan_images/1744095464_2601676461740919582711790609.webp', '2025-04-08 06:57:44'),
(20, 18, 'uploads/plan_images/1744095464_172621126917409195821133106358.webp', '2025-04-08 06:57:44'),
(21, 18, 'uploads/plan_images/1744095464_5668246851740919582430490785.webp', '2025-04-08 06:57:44'),
(22, 18, 'uploads/plan_images/1744095464_12079733341740919582438596606.webp', '2025-04-08 06:57:44'),
(23, 22, 'uploads/plan_images/1745043417_futurex-A1.jpg', '2025-04-19 06:16:57'),
(24, 22, 'uploads/plan_images/1745043417_futurex-A2.jpg', '2025-04-19 06:16:57'),
(25, 22, 'uploads/plan_images/1745043417_futurex-A3.jpg', '2025-04-19 06:16:57'),
(26, 22, 'uploads/plan_images/1745043417_futurex-A4.jpg', '2025-04-19 06:16:57'),
(27, 22, 'uploads/plan_images/1745043417_futurex-A5.jpg', '2025-04-19 06:16:57');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `starting_from` text DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `status` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `title`, `description`, `starting_from`, `remark`, `status`, `created_at`) VALUES
(1, 'Title', 'Description', '[\"a\",\"b\",\"c\"]', 'asa', 'Active', '2025-02-17 12:11:58'),
(3, '320 RIVERSIDE CRESCENT', 'Located at Sobha Hartland II, 320 Riverside Crescent is a stone’s throw away from Burj Khalifa District, Downtown Dubai, Dubai Mall, Dubai Opera and Dubai Creek Harbor with specially designed residences.', '[\"AED 1.11M*\",\"USD 302K*\",\"GBP 226K*\",\"EURO 270K*\"]', 'Subject to inventory availability', 'Active', '2025-02-18 10:04:50');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `mobile_image` varchar(1000) NOT NULL,
  `logo_img` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `developer` text NOT NULL,
  `category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `slug`, `image`, `mobile_image`, `logo_img`, `created_at`, `developer`, `category`) VALUES
(13, 'Roongta Elegante', 'roongta-elegante', 'uploads/property/1753782367_nature2.jpg', 'uploads/property/1744822015_mobile-elegante.jpg', 'uploads/1742974781_166 x 60_logo.png', '2025-03-26 07:39:41', 'LALIT ROONGTA GROUP', 'Residential'),
(14, 'Roongta Florenza', 'roongta-florenza', 'uploads/property/1744821968_desktop-florenza.jpg', 'uploads/property/1744821968_mobile-florenza.jpg', 'uploads/1743067858_166 x 60_logo.png', '2025-03-27 09:30:58', 'LALIT ROONGTA GROUP', 'Residential'),
(18, 'Roongta Preciso', 'roongta-preciso', 'uploads/property/1744611076_desktop-preciso.jpg', 'uploads/property/1744612046_mobile-presico-new.jpg', 'uploads/1744094640_166 x 60_logo.png', '2025-04-08 06:44:00', 'LALIT ROONGTA GROUP', 'Residential'),
(19, 'Roongta Ashok Vihar', 'roongta-ashok-vihar', 'uploads/property/1744610861_desktop-av.jpg', 'uploads/property/1744610861_mobile-av.jpg', 'uploads/1744180285_logo 163 x 59.png', '2025-04-09 06:31:25', 'Lalit Roongta Group', 'Residential'),
(21, 'Shree Tirumala Magnus', 'shree-tirumala-magnus', 'uploads/property/1744612583_desktop-magnus.jpg', 'uploads/property/1744612583_mobile-magnus.jpg', 'uploads/property/1744612583_lrg-logo.png', '2025-04-14 06:36:23', 'Lalit Roongta Group', 'Residential'),
(22, 'Roongta FutureX', 'roongta-futurex', 'uploads/property/1752905878_1538x700.jpg', 'uploads/property/1752905878_500x600.jpg', 'uploads/property/1745041907_lrg-logo.png', '2025-04-19 05:51:47', 'Lalit Roongta Group', 'Commercial'),
(23, 'Shree Ramlalla Niwas', 'shree-ramlalla-niwas', 'uploads/property/1745043964_desktop-ramlalla.jpg', 'uploads/property/1745043964_mobile-ramlalla.jpg', 'uploads/property/1745043964_lrg-logo.png', '2025-04-19 06:26:04', 'Lalit Roongta Group', 'Residential');

-- --------------------------------------------------------

--
-- Table structure for table `project_materials`
--

CREATE TABLE `project_materials` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `video_file` text NOT NULL,
  `btn_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project_materials`
--

INSERT INTO `project_materials` (`id`, `project_id`, `video_file`, `btn_name`, `created_at`) VALUES
(5, 13, 'https://www.youtube.com/embed/oJiwzDYmrZU?si=BT_QbZcBQEhYn15F', '', '2025-03-27 06:08:22');

-- --------------------------------------------------------

--
-- Table structure for table `property_details`
--

CREATE TABLE `property_details` (
  `id` int(11) NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property_details`
--

INSERT INTO `property_details` (`id`, `project_id`, `title`, `description`) VALUES
(16, 13, 'Lalit Roongta Group', 'Builder & Developer'),
(17, 13, '2 BHK', 'Affordable Flats'),
(18, 13, '3 BHK', 'Homes'),
(19, 13, 'Amenities', 'Luxury Features'),
(20, 14, 'Lalit Roongta Group', 'Builder & Developer'),
(21, 14, '2 BHK', 'Luxury Flats'),
(22, 14, '3 BHK', 'Spacious Flats'),
(39, 18, 'Lalit Roongta Group', 'Builder & Developer'),
(40, 18, '3 BHK Homes', 'Super Luxurious Flats'),
(41, 18, 'Serene Meadows', 'Gangapur Road Nashik'),
(42, 18, 'Amenities', 'Roof-Top Amenities'),
(43, 19, 'Lalit Roongta Group', 'Builder & Developer'),
(44, 19, '3 BHK Homes', 'Premium Flats'),
(45, 19, 'Near City Center Mall', 'Prime Location'),
(46, 14, 'Govind Nagar', 'Off 100Ft Ring Road'),
(47, 19, 'Save Rs.11 Lakh', 'Limited Period Offer'),
(48, 21, 'Lalit Roongta Group', 'Builder & Developer'),
(49, 21, '3 BHK', 'Premium Homes'),
(50, 21, 'Indira Nagar', 'Near Jogging Track'),
(51, 21, 'Save Rs.5 Lakhs', 'Limited Period Offer'),
(52, 22, 'Lalit Roongta Group', 'Builder & Developer'),
(53, 22, 'Shops/Offices', 'Commercial Property'),
(54, 22, 'Rent Utsav', 'Starting Rs.6000 Rent/Month'),
(55, 22, 'Govind Nagar', 'RD Circle, 100ft Road Front'),
(56, 23, 'Lalit Roongta Group', 'Builder & Developer'),
(57, 23, '2 BHK', 'Affordable Flats'),
(58, 23, 'Indira Nagar', 'Prime Location'),
(59, 23, 'Save Rs.5 Lakh*', 'Limited Period Offer');

-- --------------------------------------------------------

--
-- Table structure for table `property_images`
--

CREATE TABLE `property_images` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`images`)),
  `display_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property_images`
--

INSERT INTO `property_images` (`id`, `project_id`, `images`, `display_image`, `created_at`) VALUES
(4, 13, '[\"uploads\\/property\\/1743053274_89846905316977051491297710626.webp\",\"uploads\\/property\\/1743053274_20173694701697705149226491349.webp\",\"uploads\\/property\\/1743053274_10908744181697705149719372532.webp\",\"uploads\\/property\\/1743053274_78740773116977051491293033745.webp\",\"uploads\\/property\\/1743053274_21195133181697705149774340092.webp\",\"uploads\\/property\\/1743053274_12681744531697705149172947107.webp\"]', 'uploads/property/1743053274_149779093116977051491713591085.webp', '2025-03-27 05:27:54'),
(5, 14, '[\"uploads\\/property\\/1743068371_2200767281697707574706585752.webp\",\"uploads\\/property\\/1743068371_10131958981697707574986856664.webp\",\"uploads\\/property\\/1743068371_127780800516977075742060142194.webp\",\"uploads\\/property\\/1743068371_185485839316977075741728828482.webp\",\"uploads\\/property\\/1743068371_7981399341697707574753910075.webp\",\"uploads\\/property\\/1743068371_1548456300169770757429141376.webp\",\"uploads\\/property\\/1743068371_60208760416977075741853096888.webp\",\"uploads\\/property\\/1743068371_1358454316169770757465865577.webp\",\"uploads\\/property\\/1743068371_3524608351697707574449960803.webp\",\"uploads\\/property\\/1743068371_177067754516977075741746168061.webp\"]', 'uploads/property/1743068371_213828013716977075741752196303.webp', '2025-03-27 09:39:31'),
(10, 18, '[\"uploads\\/property\\/1744094995_2058154810168163359341555430.webp\",\"uploads\\/property\\/1744094995_80596592116816335931790375265.webp\",\"uploads\\/property\\/1744094995_21052281541681633593840272952.webp\",\"uploads\\/property\\/1744094995_3170822191681633593973651123.webp\",\"uploads\\/property\\/1744094995_593597606168163359310112907.webp\",\"uploads\\/property\\/1744094995_14414088951681633593962707165.webp\",\"uploads\\/property\\/1744094995_149651804116801588751967139465 (1).webp\"]', 'uploads/property/1744094995_64845789916816335931849274581.webp', '2025-04-08 06:49:55'),
(11, 19, '[\"uploads\\/property\\/1744181305_av-4.jpg\",\"uploads\\/property\\/1744181305_av-3.jpg\",\"uploads\\/property\\/1744181305_av-2.jpg\",\"uploads\\/property\\/1744181305_av-1.jpg\"]', '', '2025-04-09 06:48:25'),
(12, 21, '[\"uploads\\/property\\/1744614649_magnus_01.jpg\",\"uploads\\/property\\/1744614649_magnus_02.jpg\",\"uploads\\/property\\/1744614649_magnus_03.jpg\",\"uploads\\/property\\/1744614649_magnus_04.jpg\"]', 'uploads/property/1744614649_magnus_big.jpg', '2025-04-14 07:10:49'),
(13, 22, '[\"uploads\\/property\\/1745043134_futurex-1.jpg\",\"uploads\\/property\\/1745043134_futurex-2.jpg\",\"uploads\\/property\\/1745043134_futurex-3.jpg\",\"uploads\\/property\\/1745043134_futurex-4.jpg\"]', 'uploads/property/1745043134_furturex-display-image.jpg', '2025-04-19 06:12:14'),
(14, 23, '[\"uploads\\/property\\/1745044438_Shree RamLalla_1.jpg\",\"uploads\\/property\\/1745044438_Shree RamLalla_2.jpg\",\"uploads\\/property\\/1745474150_Cam_12.jpg\",\"uploads\\/property\\/1745474150_Cam_14.jpg\",\"uploads\\/property\\/1745474150_Cam_16.jpg\",\"uploads\\/property\\/1745474150_Cam_17.jpg\",\"uploads\\/property\\/1745474150_Cam_18.jpg\"]', 'uploads/property/1745044438_Shree RamLalla.jpg', '2025-04-19 06:33:58');

-- --------------------------------------------------------

--
-- Table structure for table `property_list`
--

CREATE TABLE `property_list` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `starting_from` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`starting_from`)),
  `remark` varchar(255) DEFAULT NULL,
  `property_type` varchar(100) DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_list`
--

INSERT INTO `property_list` (`id`, `title`, `description`, `starting_from`, `remark`, `property_type`, `status`, `created_at`) VALUES
(1, 'Roongta Elegante', '<p>Experience the perfect blend of modern living, desirable amenities, and affordability at Roongta Elegante. Our 2/3BHK apartments are designed to seamlessly merge comfort and convenience, offering a well-appointed lifestyle that elevates your everyday experience.</p>\r\n', '[\"2 & 3 BHK\",\"Ready Possession\",\"Panchavati Annex Nashik\"]', 'RERA No. P51600033975', 'residential', 'Active', '2025-03-20 12:35:50'),
(2, 'Roongta Florenza', '<p>Roongta Florenza is a thoughtfully crafted residential and commercial project offering premium 2 &amp; 3 BHK homes and shops. Located in a serene pocket of the city, it seamlessly blends elegance, comfort, and everyday practicality.</p>\r\n', '[\"2 & 3 BHK Flats\",\"Ready Possession\",\"Govind Nagar Nashik\"]', 'RERA No. P51600033635', 'residential', 'Active', '2025-03-20 12:36:45'),
(3, 'Roongta Preciso', '<p>Roongta Preciso a luxurious, premium, exclusively 3 BHK flats project is one to provide homes where living life would be a pure bliss. Spread across 2 elegant wings, each rising 7 storeys high, this stunning project boasts an array of luxurious amenities, including exclusive terrace amenities that truly touch the sky.</p>\r\n', '[\"3 BHK Homes\",\"Ready Possession\",\"Gangapur Road Nashik\"]', 'RERA No. P51600046804', 'residential', 'Active', '2025-03-20 12:37:26'),
(4, 'Shree Ramlalla Niwas', '<p>Shree Ramlalla Niwas is a project that offers exclusively 2BHK luxury homes, spanning 4 floors, of 6 beautifully designed structures; and 31 units of shops facing an 18m and a 9m wide road.</p>\r\n', '[\"2 BHK Homes\",\"Ready Possession\",\"Indira Nagar Nashik\",\"\"]', 'RERA No. P51600045450', 'residential', 'Inactive', '2025-03-20 12:38:13'),
(5, 'Roongta Shopping Centre', 'Roongta Shopping Centre is Makhmalabadâ€™s largest shopping mall, located on a 30m wide road in a fast-growing residential and commercial hub. This 5-storey complex features 454 shop units, 4 grand entrances, 4 spacious lifts, dual road access, excellent road-facing visibility, and ample parking with CCTV security. Whether for business expansion or investment, Roongta Shopping Centre is your perfect opportunity in a booming market.', '[\"Shops & Offices\",\"Showrooms\",\"Makhmalabad Nashik\"]', 'RERA No. P51600022497', 'commercial', 'Active', '2025-03-21 05:27:02'),
(6, 'Roongta Shopping Hub', '<p>Roongta Shopping Hub, located near Mumbai Naka in the heart of the city, is the perfect commercial destination. Surrounded by roads on all sides for maximum shop visibility, it features 9 lifts, escalators, an artificial lawn, gazebo, sky seating, and a stylish atrium. Designed with top-quality materials and modern aesthetics, it offers flexible spaces that inspire creativity and drive business growth.</p>\r\n', '[\"Shops & Offices\",\"Showrooms\",\"Mumbai-Agra Highway Front, Kamod Nagar, Nashik\"]', 'RERA No. P51600024436', 'commercial', 'Active', '2025-03-21 05:29:30'),
(7, 'Shree Satyanarayan Roongta Forum', 'SSRF is a grand shopping mall designed as an architectural marvel, inspired by Roman neo-classical style. Featuring a striking central dome, 100 ft road frontage, and access from three sides with three grand entrances, it offers 8 floors of spacious, iconic units built with perfect symmetry, geometry, and functionality to elevate the shopping experience.', '[\"Shops & Offices\",\"Showrooms\",\"Near City Center Mall Nashik\"]', 'RERA No. P51600027351', 'commercial', 'Active', '2025-03-21 05:30:30'),
(8, 'Magnizent', '<p>Roongta Magnizent is Nashik&rsquo;s premier commercial destination near RD Circle and City Centre Mall. With high visibility, heavy footfall, and a G+5 structure featuring 2 high-speed elevators, CCTV surveillance, and basement parking, it offers flexible spaces ideal for retail and offices. Invest today and shape the future of your business!</p>\r\n', '[\"Shops & Offices\",\"Showrooms\",\"Near RD Circle & CCM Nashik\"]', 'RERA No. P51600048872', 'commercial', 'Inactive', '2025-03-25 09:42:14'),
(9, 'Roongta Exquisite', 'Roongta Exquisite - Nestled in a chic and vibrant urban location, our exquisite 18-storey 3 BHK residential project offers the epitome of contemporary elegance and sophisticated living. ', '[\"3 BHK Homes\",\"Under Construction\",\"Gangapur Road Nashik\"]', 'RERA No. P51600046803', 'residential', 'Active', '2025-03-25 10:58:17'),
(10, 'Maa Bhagwati Residency', 'Maa Bhagwati Residency is spread across 4 majestic wings, each rising 14 storeys high, our premium 2/3BHK and Shops project boasts an array of luxurious amenities on both ground and terrace levels, offering an unparalleled living experience.', '[\"2 & 3 BHK Flats\",\"Under Construction\",\"Rajiv Nagar Nashik\"]', 'RERA No. P51600033773', 'residential', 'Active', '2025-03-25 11:00:18'),
(11, 'Roongta Ashok Vihar', 'Roongta Ashok Vihar, an exclusive, 3BHK, stand-alone, residential project, located in one of Nashiks fastest developing and prime locations (near city centre mall) is a project that becomes one with luxury! Along a 9m wide road, this apartment comes with the most thoughtfully designed 3BHK units that flaunt an individual balcony, allotted parking, spacious rooms, and quality construction.', '[\"3 BHK\",\"Ready Possession\",\"Near City Center Mall Nashik\"]', 'RERA No. P51600046725', 'residential', 'Active', '2025-03-25 11:01:43'),
(12, 'Roongta Grandezza ', '<p>Roongta Grandezza, a grand, 7 winged project, with 7 floors of luxurious 2 &amp; 3 BHK homes, and 13 road-front shops facing a 12m wide road, is where you will feel at home. With plush and varied amenities spanning multiple floors, the project truly leaves one wanting for nothing!</p>\r\n', '[\"2 & 3 BHK\",\"Ready Possession\",\"Govind Nagar Nashik\"]', 'RERA No. P51600029147', 'residential', 'Active', '2025-03-25 11:02:55'),
(13, 'Roongta Rosewood', 'Roongta Rosewood is spread across 2 majestic wings, each rising 18 storeys high, our project boasts an impressive array of amenities on multiple levels, including the podium, 1st floor, 18th floor (dedicated entirely to amenities), and terrace levels.', '[\"2 BHK Homes\",\"Under Construction\",\"Gangapur Road Nashik\"]', 'RERA No. P51600077907', 'residential', 'Active', '2025-03-25 11:03:56'),
(14, 'Roongta Eminence', '<p>Roongta Eminence, Our majestic 3 and 4 BHK residences, nestled in a soaring high-rise masterpiece, are spread across 2 elegant wings, each rising 21 storeys high. With amenities strategically located on the ground, podium, 11th floor (dedicated entirely to amenities), and terrace levels, every detail is crafted to surpass your every expectation, providing a life of unbridled elegance, sophistication, and tranquility.</p>\r\n', '[\"3 & 4 BHK\",\"Under Construction\",\"Gangapur Road Nashik\"]', 'RERA No. P51600079131', 'residential', 'Inactive', '2025-03-25 11:05:01'),
(15, 'Roongta Futurex', 'Roongta FUTUREX - The perfect business destination at RD Circle, Govind Nagar! This iconic 9-storey, 100 ft. road-facing commercial hub offers 500+ units ideal for everything from luxury retail to BPOs. With spacious lobbies, CCTV surveillance, 2-level basement parking, visitor parking, 4 lifts, and flexible workspaces, it is built for growth. Its prime location near major roads and Ozar Airport makes it highly accessible. Plus, a mix of diverse businesses under one roof opens doors for collaboration and expansion.', '[\"Shops & Offices\",\"Showrooms\",\"Govind Nagar Nashik\"]', 'RERA No. P51600029167', 'commercial', 'Active', '2025-07-19 06:20:38');

-- --------------------------------------------------------

--
-- Table structure for table `property_list_images`
--

CREATE TABLE `property_list_images` (
  `id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `image_path` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_list_images`
--

INSERT INTO `property_list_images` (`id`, `property_id`, `image_path`) VALUES
(1, 1, 'uploads/projects/Elegante.jpg'),
(2, 1, 'uploads/projects/Elegante_1.jpg'),
(3, 1, 'uploads/projects/Elegante_2.jpg'),
(4, 2, 'uploads/projects/Florenza _1.jpg'),
(5, 2, 'uploads/projects/Florenza _2.jpg'),
(6, 2, 'uploads/projects/Florenza.jpg'),
(7, 3, 'uploads/projects/Preciso _1.jpg'),
(8, 3, 'uploads/projects/Preciso _2.jpg'),
(9, 3, 'uploads/projects/Preciso.jpg'),
(10, 4, 'uploads/projects/Shree RamLalla.jpg'),
(11, 4, 'uploads/projects/Shree RamLalla_1.jpg'),
(12, 4, 'uploads/projects/Shree RamLalla_2.jpg'),
(13, 5, 'uploads/projects/Shopping Center.jpg'),
(14, 5, 'uploads/projects/Shopping Center_1.jpg'),
(15, 5, 'uploads/projects/Shopping Center_2.jpg'),
(16, 6, 'uploads/projects/Shopping HUb.jpg'),
(17, 6, 'uploads/projects/Shopping Hub_1_.jpg'),
(18, 6, 'uploads/projects/Shopping Hub_2_.jpg'),
(19, 7, 'uploads/projects/SSRF.jpg'),
(20, 7, 'uploads/projects/SSRF_1.jpg'),
(21, 7, 'uploads/projects/SSRF_2.jpg'),
(29, 12, 'uploads/projects/rg.webp'),
(30, 12, 'uploads/projects/rg1.webp'),
(31, 11, 'uploads/projects/ra.webp'),
(32, 11, 'uploads/projects/ra1.webp'),
(33, 10, 'uploads/projects/rbm.webp'),
(34, 10, 'uploads/projects/rmb1.webp'),
(35, 9, 'uploads/projects/req.webp'),
(36, 9, 'uploads/projects/req1.webp'),
(37, 14, 'uploads/projects/req1.webp'),
(38, 13, 'uploads/projects/ra1.webp'),
(39, 8, 'uploads/projects/req.webp'),
(40, 15, 'uploads/projects/1200x800.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `property_location`
--

CREATE TABLE `property_location` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `section_name` text NOT NULL,
  `location_head` varchar(255) NOT NULL,
  `location_descri` text NOT NULL,
  `location_map` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property_location`
--

INSERT INTO `property_location` (`id`, `project_id`, `section_name`, `location_head`, `location_descri`, `location_map`, `created_at`) VALUES
(6, 13, 'Location', 'Where Is Roongta Elegante Located?', 'At Prime Location in Panchavati Annex, Nashik', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d59981.51773751523!2d73.839027!3d20.015025!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bddebc0db95f497%3A0xf63558f59fc59152!2sRoongta%20Elegante!5e0!3m2!1sen!2sus!4v1743054899233!5m2!1sen!2sus', '2025-03-27 05:55:16'),
(7, 14, 'LOCATION', 'Where Is Roongta Florenza Located?', 'Roongta Florenza is located in Govind Nagar, Nashik, off the 100 Ft. Ring Road. This prime location offers excellent connectivity to major transportation routes and essential amenities, making it a sought after area for both residential and commercial purposes.', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14998.832156775836!2d73.767373!3d19.978777000000004!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bddebdce1991579%3A0xa27d4a5584b3c3af!2sRoongta%20Florenzza!5e0!3m2!1sen!2sus!4v1743068768618!5m2!1sen!2sus', '2025-03-27 09:46:21'),
(11, 18, 'LOCATION', 'Where Is Roongta Preciso Located?', 'Roongta Preciso is situated in the highly sought-after Serene Meadows locality on Gangapur Road, one of Nashiks most prime and prestigious addresses.', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d59983.61789349538!2d73.732438!3d20.009517000000002!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bddede80238a249%3A0xeac8fba402199e74!2sRoongta%20Preciso!5e0!3m2!1sen!2sus!4v1744095379280!5m2!1sen!2sus', '2025-04-08 06:57:09'),
(12, 19, 'Google Location', 'Where is Roongta Ashok Vihar in Nashik?', 'At Very Prime location near City Center Mall Nashik', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3749.429091313565!2d73.7590833!3d19.9904979!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bddebde89656fcd%3A0x2bc8778f5153b26d!2sRoongta%20Ashok%20Vihar!5e0!3m2!1sen!2sin!4v1744181625788!5m2!1sen!2sin', '2025-04-09 06:54:18'),
(13, 21, 'LOCATION', 'Where Is Shree Tirumala Magnus Located?', 'At Prime Location Near Indira Nagar Jogging Track Nashik', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3393.251159155847!2d73.78000067522854!3d19.98060308141926!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bddeba7c8bdf6dd%3A0x4d31d70389aa07af!2sShree%20Tirumala%20Magnus!5e1!3m2!1sen!2sin!4v1744614871408!5m2!1sen!2sin', '2025-04-14 07:16:15'),
(14, 22, 'LOCATION', 'Where Is Roongta Futurex Located?', 'At Prime Location in Govind Nagar, RD Circle, 100ft Road Front, Nashik', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4035.0874238901456!2d73.76575454723177!3d19.988060542946744!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bddeb3cde669261%3A0x80c1409b4e120554!2sRoongta%20Futurex!5e1!3m2!1sen!2sin!4v1745043327798!5m2!1sen!2sin', '2025-04-19 06:16:04'),
(15, 23, 'LOCATION', 'Where Is Shree Ramlalla Niwas Located?', 'At Prime Location in Indira Nagar, Nashik', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3393.826089936755!2d73.77620507522776!3d19.953885781439872!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bdd95fd3de66895%3A0x80ef528241d1c95a!2sShree%20Ram%20Lalla%20Niwas%20Apartment!5e1!3m2!1sen!2sin!4v1745044486500!5m2!1sen!2sin', '2025-04-19 06:35:55');

-- --------------------------------------------------------

--
-- Table structure for table `proweb_heading`
--

CREATE TABLE `proweb_heading` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `urban_section_name` text DEFAULT NULL,
  `urban_head` text DEFAULT NULL,
  `urban_sub_head` text DEFAULT NULL,
  `plan_section_name` text DEFAULT NULL,
  `plan_head` text DEFAULT NULL,
  `finance_section_name` text DEFAULT NULL,
  `finance_head` text DEFAULT NULL,
  `finance_subhead` text DEFAULT NULL,
  `pro_section_name` text DEFAULT NULL,
  `pro_head` text DEFAULT NULL,
  `video_section_name` text DEFAULT NULL,
  `video_head` text DEFAULT NULL,
  `key_section_name` text DEFAULT NULL,
  `key_head` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `proweb_heading`
--

INSERT INTO `proweb_heading` (`id`, `project_id`, `urban_section_name`, `urban_head`, `urban_sub_head`, `plan_section_name`, `plan_head`, `finance_section_name`, `finance_head`, `finance_subhead`, `pro_section_name`, `pro_head`, `video_section_name`, `video_head`, `key_section_name`, `key_head`, `created_at`) VALUES
(3, 13, 'Project Views', 'Glimpses of Roongta Elegante', '', 'Construction Updates', 'The Journey to Completion', 'Ready to Take the Next Step?', 'Inquire About This Property', 'ATTRACTIVE\r\n80/20\r\nPAYMENT PLAN', '', '', 'Explore Inside & Out', 'Virtual Tours', 'KEY FEATURES', 'Discover the Hallmarks of Distinction', '2025-03-27 06:34:39'),
(4, 14, '', 'Glimpses of Roongta Florenza', 'Project Views', 'Construction Updates', 'The Journey to Completion', 'Ready to Take the Next Step?', 'Inquire About This Property', 'ATTRACTIVE 80/20 PAYMENT PLAN', '', '', '', '', 'KEY FEATURES', 'Discover the Hallmarks of Distinction', '2025-03-27 10:12:53'),
(7, 18, '', 'Roof-Top Amenities', '', 'STAGES', 'Stages of Construction', '', '', 'Reach to Lalit Roongta Group', '', '', '', '', 'KEY FEATURES', 'Discover the Hallmarks of Distinction', '2025-04-08 07:07:57'),
(10, 19, '', '', '', '', '', '', '', '', '', '', '', '', 'Key Features', 'Discover the Hallmarks of Distinction', '2025-04-09 07:19:55'),
(11, 21, '', '', '', '', '', '', '', NULL, '', '', '', '', 'KEY FEATURES', 'Discover the Hallmarks of Distinction', '2025-04-14 07:34:29'),
(12, 23, '', '', '', '', '', 'Ready to Take the Next Step?', 'Inquire About This Property', NULL, '', '', '', '', 'KEY FEATURES', 'Discover the Hallmarks of Distinction', '2025-04-19 06:41:06');

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` int(11) NOT NULL,
  `instagram` text NOT NULL,
  `facebook` text NOT NULL,
  `linkedin` text NOT NULL,
  `youtube` text NOT NULL,
  `twitter` text NOT NULL,
  `threat` text NOT NULL,
  `property_type` varchar(255) NOT NULL,
  `creation_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `instagram`, `facebook`, `linkedin`, `youtube`, `twitter`, `threat`, `property_type`, `creation_on`) VALUES
(1, 'asd', 'bds', 'cds', 'dds', 'fds', 'gds', 'residential', '2025-02-28 06:55:34'),
(2, 'asdas', 'adad', 'asdsd', 'ddad', 'dasd', 'ASAS', 'commercial', '2025-03-05 16:49:28');

-- --------------------------------------------------------

--
-- Table structure for table `urban_infrastructure`
--

CREATE TABLE `urban_infrastructure` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `image_path` varchar(1000) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `urban_infrastructure`
--

INSERT INTO `urban_infrastructure` (`id`, `project_id`, `image_path`, `description`, `created_at`) VALUES
(6, 13, 'uploads/urban_infra/1743053663_1131914561697705149711074798.webp', 'Garden', '2025-03-27 05:34:23'),
(7, 13, 'uploads/urban_infra/1743053663_20173694701697705149226491349 (1).webp', 'Gym', '2025-03-27 05:34:23'),
(8, 13, 'uploads/urban_infra/1743053663_21195133181697705149774340092 (1).webp', 'Jogging Track', '2025-03-27 05:34:23'),
(9, 13, 'uploads/urban_infra/1743053663_214607012416977051491460967190.webp', 'Play Station', '2025-03-27 05:34:23'),
(10, 13, 'uploads/urban_infra/1743053663_8426727616977051491305810252.webp', 'Kids Play Area', '2025-03-27 05:34:23'),
(11, 13, 'uploads/urban_infra/1743053663_10908744181697705149719372532 (1).webp', 'Mini Theater', '2025-03-27 05:34:23'),
(12, 13, 'uploads/urban_infra/1743053663_149779093116977051491713591085.webp', 'Society Office', '2025-03-27 05:34:23'),
(16, 14, 'uploads/urban_infra/1743068683_127780800516977075742060142194.webp', 'Gymnasium', '2025-03-27 09:44:43'),
(17, 14, 'uploads/urban_infra/1743068683_3524608351697707574449960803.webp', 'Rock Climbing Wall', '2025-03-27 09:44:43'),
(18, 14, 'uploads/urban_infra/1743068683_10131958981697707574986856664.webp', 'Multipurpose Hall', '2025-03-27 09:44:43'),
(23, 18, 'uploads/urban_infra/1744095315_2058154810168163359341555430.webp', 'Stage', '2025-04-08 06:55:15'),
(24, 18, 'uploads/urban_infra/1744095315_14414088951681633593962707165.webp', 'Senior Citizen Zone', '2025-04-08 06:55:15'),
(25, 18, 'uploads/urban_infra/1744095315_80596592116816335931790375265.webp', 'Open Air Deck', '2025-04-08 06:55:15');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin@gmail.com', '$2y$10$pOVa4S087yyJuHxB6npSne.b5./4h3aQVEZn4NU84YQunx5SLnHii');

-- --------------------------------------------------------

--
-- Table structure for table `website_settings`
--

CREATE TABLE `website_settings` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `section1_show` tinyint(1) NOT NULL DEFAULT 1,
  `section1_image` varchar(255) DEFAULT NULL,
  `section1_text` text DEFAULT NULL,
  `section2_show` tinyint(1) NOT NULL DEFAULT 1,
  `section2_image` varchar(255) DEFAULT NULL,
  `section2_text` text DEFAULT NULL,
  `section3_show` tinyint(1) NOT NULL DEFAULT 1,
  `section3_image` varchar(255) DEFAULT NULL,
  `section3_text` text DEFAULT NULL,
  `section1_contact` varchar(50) DEFAULT '+971 4568 6651',
  `section2_contact` varchar(50) DEFAULT '+971 4568 6652',
  `section3_contact` varchar(50) DEFAULT '+971 4568 6653'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `website_settings`
--

INSERT INTO `website_settings` (`id`, `project_id`, `section1_show`, `section1_image`, `section1_text`, `section2_show`, `section2_image`, `section2_text`, `section3_show`, `section3_image`, `section3_text`, `section1_contact`, `section2_contact`, `section3_contact`) VALUES
(2, 13, 1, 'uploads/sections/1753780538_3 (1).jpg', 'Get a free overview of the project including materials and brochures from one of our specialists.', 1, 'uploads/sections/1753780470_2 (2).jpg', 'Get free investment advice from our specialists ï¿½ minimize your risks and maximize your investment value', 0, 'uploads/sections/1744822080_1.jpg', 'Leave your details to get a free overview of similar investment opportunities in Dubai. We have information on all upcoming investment opportunities.', '+91 123654789', '+91 456978231', '+91 6589321458'),
(3, 14, 1, 'uploads/sections/1744561241_3.jpg', 'Get a free overview of the project including materials and brochures from one of our specialists.', 1, 'uploads/sections/1744561241_2.jpg', 'Get free investment advice from our specialists – minimize your risks and maximize your investment value', 0, 'uploads/sections/1743069095_40-qofhyhrpgvk4htw54nkk6tivqwlhh2xpxztfc7oizo.webp', 'Leave your details to get a free overview of similar investment opportunities in Dubai. We have information on all upcoming investment opportunities.', '+971 4568 6653', '+971 4568 6653', '+971 4568 6653'),
(5, 18, 1, 'uploads/sections/1744560492_3.jpg', 'Get a free overview of the project including materials and brochures from one of our specialists.', 1, 'uploads/sections/1744560492_2.jpg', 'Leave your details to get a free overview of similar investment opportunities in Dubai. We have information on all upcoming investment opportunities.', 0, 'uploads/sections/1744560512_1.jpg', '', ' +91 123654789', '+971 4568 6653', ''),
(6, 19, 1, 'uploads/sections/1744351839_1.jpg', '', 0, '', '', 1, 'uploads/sections/1744351839_2.jpg', '', '7770002222', '+971 4568 6653', '7770002222'),
(7, 21, 1, 'uploads/sections/1744614699_3.jpg', NULL, 1, 'uploads/sections/1744614699_2.jpg', NULL, 0, '', NULL, '+971 4568 6651', '+971 4568 6652', '+971 4568 6653'),
(8, 22, 1, 'uploads/sections/1745043610_1.jpg', NULL, 1, 'uploads/sections/1745043572_2.jpg', NULL, 0, '', NULL, '+971 4568 6651', '+971 4568 6652', '+971 4568 6653'),
(9, 23, 1, 'uploads/sections/1745044830_3.jpg', NULL, 1, 'uploads/sections/1745044830_2.jpg', NULL, 0, 'uploads/sections/1745044830_1.jpg', NULL, '+971 4568 6651', '+971 4568 6652', '+971 4568 6653');

-- --------------------------------------------------------

--
-- Table structure for table `web_heading`
--

CREATE TABLE `web_heading` (
  `id` int(11) NOT NULL,
  `project_list_name` text NOT NULL,
  `whyus_name` text NOT NULL,
  `whyinvest_name` text NOT NULL,
  `contact_form_name` text NOT NULL,
  `property_type` text NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Active',
  `creation_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `web_heading`
--

INSERT INTO `web_heading` (`id`, `project_list_name`, `whyus_name`, `whyinvest_name`, `contact_form_name`, `property_type`, `status`, `creation_on`) VALUES
(1, '<p>EXPERIENCE NASHIK\'S BEST: A LEGACY OF <span style=\"color: rgb(201, 164, 133);\">LUXURY REAL ESTATE</span></p>', '<p>WHY NASHIK REAL ESTATE <span style=\"color: rgb(201, 164, 133);\">IS BOOMING?</span></p>', '<p>WHY CHOOSE <span style=\"color: rgb(201, 164, 133);\">LALIT ROONGTA GROUP</span> IN NASHIK?</p>', '<p>REGISTER YOUR INTEREST&nbsp;</p>', 'residential', 'Active', '2025-03-05 13:10:42'),
(2, '<p>EXPERIENCE NASHIK&#39;S BEST: A LEGACY OF <span style=\"color: rgb(201, 164, 133);\">LUXURY REAL ESTATE</span></p>', '<p>WHY NASHIK REAL ESTATE <span style=\"color: rgb(201, 164, 133);\">IS BOOMING?</span></p>', '<p>WHY CHOOSE <span style=\"color: rgb(201, 164, 133);\">LALIT ROONGTA GROUP</span> IN NASHIK?</p>', '<p>REGISTER YOUR INTEREST&nbsp;</p>', 'commercial', 'Active', '2025-03-05 15:56:59');

-- --------------------------------------------------------

--
-- Table structure for table `whyinvest`
--

CREATE TABLE `whyinvest` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `title` text NOT NULL,
  `status` text NOT NULL,
  `property_type` varchar(255) NOT NULL,
  `creation_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `whyinvest`
--

INSERT INTO `whyinvest` (`id`, `image`, `title`, `status`, `property_type`, `creation_on`) VALUES
(4, 'uploads/why_us/why_lalit_roongta__1_-removebg-preview.png', 'EXCEPTIONAL QUALITY', 'Active', 'residential', '2025-03-21 06:36:49'),
(5, 'uploads/why_us/why_lalit_roongta__1_-removebg-preview.png', 'UNPARALLELED CRAFTSMANSHIP', 'Active', 'residential', '2025-03-21 06:36:49'),
(6, 'uploads/why_us/why_lalit_roongta__1_-removebg-preview.png', 'SUSTAINABLE DEVELOPMENT', 'Active', 'residential', '2025-03-21 06:36:49'),
(7, 'uploads/why_us/why_lalit_roongta__1_-removebg-preview.png', 'PRIME LOCATIONS', 'Active', 'residential', '2025-03-21 06:36:49'),
(8, 'uploads/why_us/why_lalit_roongta__1_-removebg-preview.png', 'INNOVATIVE APPROACH', 'Active', 'residential', '2025-03-21 06:36:49'),
(9, 'uploads/why_us/why_lalit_roongta__1_-removebg-preview.png', 'EXCEPTIONAL QUALITY', 'Active', 'commercial', '2025-03-21 06:36:59'),
(10, 'uploads/why_us/why_lalit_roongta__1_-removebg-preview.png', 'UNPARALLELED CRAFTSMANSHIP', 'Active', 'commercial', '2025-03-21 06:36:59'),
(11, 'uploads/why_us/why_lalit_roongta__1_-removebg-preview.png', 'SUSTAINABLE DEVELOPMENT', 'Active', 'commercial', '2025-03-21 06:36:59'),
(12, 'uploads/why_us/why_lalit_roongta__1_-removebg-preview.png', 'PRIME LOCATIONS', 'Active', 'commercial', '2025-03-21 06:36:59'),
(13, 'uploads/why_us/why_lalit_roongta__1_-removebg-preview.png', 'INNOVATIVE APPROACH', 'Active', 'commercial', '2025-03-21 06:36:59');

-- --------------------------------------------------------

--
-- Table structure for table `whyinvest_desc`
--

CREATE TABLE `whyinvest_desc` (
  `id` int(11) NOT NULL,
  `about` text NOT NULL,
  `property_type` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Active',
  `creation_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `whyinvest_desc`
--

INSERT INTO `whyinvest_desc` (`id`, `about`, `property_type`, `status`, `creation_on`) VALUES
(1, 'We are a renowned real estate developer in Nashik, committed to redefining the art of living by building sustainable communities. Founded in 1996 by the visionary Mr. Lalit Roongta, our legacy spans over two decades.With a strong team of 200+ employees, we\'ve successfully completed 250+ projects, consistently managing 20 active projects every year. Our dedication to quality and long-term relationships has earned us countless recognitions and accolades.', 'residential', 'Active', '2025-02-27 16:17:12'),
(2, 'We are a renowned real estate developer in Nashik, committed to redefining the art of living by building sustainable communities. Founded in 1996 by the visionary Mr. Lalit Roongta, our legacy spans over two decades.With a strong team of 200+ employees, we\'ve successfully completed 250+ projects, consistently managing 20 active projects every year. Our dedication to quality and long-term relationships has earned us countless recognitions and accolades.', 'commercial', 'Active', '2025-03-05 15:45:59');

-- --------------------------------------------------------

--
-- Table structure for table `whyus`
--

CREATE TABLE `whyus` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `title` text NOT NULL,
  `status` text NOT NULL,
  `property_type` varchar(255) NOT NULL,
  `creation_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `whyus`
--

INSERT INTO `whyus` (`id`, `image`, `title`, `status`, `property_type`, `creation_on`) VALUES
(1, 'uploads/why_us/Stratergic_Loaction-removebg-preview.png', 'Strategic Location', 'Active', 'residential', '2025-02-18 11:39:02'),
(3, 'uploads/why_us/Stratergic_Loaction-removebg-preview.png', 'Strategic Location', 'Active', 'commercial', '2025-03-04 15:29:14'),
(4, 'uploads/why_us/Offerdable_price-removebg-preview.png', 'Affordable Prices', 'Active', 'commercial', '2025-03-05 15:37:42'),
(5, 'uploads/why_us/Offerdable_price-removebg-preview.png', 'Affordable Prices', 'Active', 'residential', '2025-03-20 12:48:37'),
(6, 'uploads/why_us/Growing_Infra-removebg-preview.png', 'Growing Infrastructure', 'Active', 'residential', '2025-03-20 12:48:54'),
(7, 'uploads/why_us/Economy-removebg-preview.png', 'Thriving Economy', 'Active', 'residential', '2025-03-21 06:17:46'),
(8, 'uploads/why_us/Education-removebg-preview.png', 'Cultural Heritage', 'Active', 'residential', '2025-03-21 06:18:20'),
(9, 'uploads/why_us/Education-removebg-preview.png', 'Educational Hub', 'Active', 'residential', '2025-03-21 06:24:39'),
(10, 'uploads/why_us/Healthcare-removebg-preview.png', 'Healthcare Facilities', 'Active', 'residential', '2025-03-21 06:28:16'),
(11, 'uploads/why_us/Tourism-removebg-preview.png', 'Tourism Potential', 'Active', 'residential', '2025-03-21 06:28:16'),
(12, 'uploads/why_us/opportunity-removebg-preview.png', 'Government Initiatives', 'Active', 'residential', '2025-03-21 06:28:16'),
(13, 'uploads/why_us/Connectivity-removebg-preview.png', 'Proposed Expansion of Vadhavan Port', 'Active', 'residential', '2025-03-21 06:28:16'),
(14, 'uploads/why_us/Kumbhmela-removebg-preview.png', 'Kumbh Mela 2025', 'Active', 'residential', '2025-03-21 06:28:16'),
(15, 'uploads/why_us/Samrudhi_Expresse_way-removebg-preview.png', 'Samruddhi Expressway', 'Active', 'residential', '2025-03-21 06:28:16'),
(16, 'uploads/why_us/Highway-removebg-preview.png', 'Surat-Nashik Highway', 'Active', 'residential', '2025-03-21 06:28:16'),
(17, 'uploads/why_us/air_connectivity-removebg-preview.png', 'Improved Air Connectivity', 'Active', 'residential', '2025-03-21 06:28:16'),
(18, 'uploads/why_us/IT_Park-removebg-preview.png', 'Approval for 450-Acre IT Park', 'Active', 'residential', '2025-03-21 06:28:16'),
(19, 'uploads/why_us/Lifestyle_balance-removebg-preview.png', 'Quality of Life', 'Active', 'residential', '2025-03-21 06:28:16'),
(20, 'uploads/why_us/Growing_Infra-removebg-preview.png', 'Growing Infrastructure', 'Active', 'commercial', '2025-03-21 06:31:39'),
(21, 'uploads/why_us/Economy-removebg-preview.png', 'Thriving Economy', 'Active', 'commercial', '2025-03-21 06:31:39'),
(22, 'uploads/why_us/Heritage-removebg-preview.png', 'Cultural Heritage', 'Active', 'commercial', '2025-03-21 06:31:39'),
(23, 'uploads/why_us/Education-removebg-preview.png', 'Educational Hub', 'Active', 'commercial', '2025-03-21 06:31:39'),
(24, 'uploads/why_us/Healthcare-removebg-preview.png', 'Healthcare Facilities', 'Active', 'commercial', '2025-03-21 06:31:39'),
(25, 'uploads/why_us/Tourism-removebg-preview.png', 'Tourism Potential', 'Active', 'commercial', '2025-03-21 06:31:39'),
(26, 'uploads/why_us/opportunity-removebg-preview.png', 'Government Initiatives', 'Active', 'commercial', '2025-03-21 06:31:39'),
(27, 'uploads/why_us/Connectivity-removebg-preview.png', 'Proposed Expansion of Vadhavan Port', 'Active', 'commercial', '2025-03-21 06:31:39'),
(28, 'uploads/why_us/Kumbhmela-removebg-preview.png', 'Kumbh Mela 2025', 'Active', 'commercial', '2025-03-21 06:31:39'),
(29, 'uploads/why_us/Samrudhi_Expresse_way-removebg-preview.png', 'Samruddhi Expressway', 'Active', 'commercial', '2025-03-21 06:31:39'),
(30, 'uploads/why_us/Highway-removebg-preview.png', 'Surat-Nashik Highway', 'Active', 'commercial', '2025-03-21 06:31:39'),
(31, 'uploads/why_us/air_connectivity-removebg-preview.png', 'Improved Air Connectivity', 'Active', 'commercial', '2025-03-21 06:31:39'),
(32, 'uploads/why_us/IT_Park-removebg-preview.png', 'Approval for 450-Acre IT Park', 'Active', 'commercial', '2025-03-21 06:31:39'),
(33, 'uploads/why_us/Lifestyle_balance-removebg-preview.png', 'Quality of Life', 'Active', 'commercial', '2025-03-21 06:31:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_developer`
--
ALTER TABLE `about_developer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `about_developer_ibfk_1` (`project_id`);

--
-- Indexes for table `about_developer_projects`
--
ALTER TABLE `about_developer_projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `about_developer_id` (`about_developer_id`),
  ADD KEY `about_developer_projects_ibfk_2` (`project_id`);

--
-- Indexes for table `about_property`
--
ALTER TABLE `about_property`
  ADD PRIMARY KEY (`id`),
  ADD KEY `about_property_ibfk_1` (`project_id`);

--
-- Indexes for table `about_property_details`
--
ALTER TABLE `about_property_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `about_property_id` (`about_property_id`),
  ADD KEY `about_property_details_ibfk_2` (`project_id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_details`
--
ALTER TABLE `contact_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_details_ibfk_1` (`project_id`);

--
-- Indexes for table `gov_details`
--
ALTER TABLE `gov_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiries_property_list`
--
ALTER TABLE `inquiries_property_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `key_features`
--
ALTER TABLE `key_features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `key_features_ibfk_1` (`project_id`);

--
-- Indexes for table `logo_img`
--
ALTER TABLE `logo_img`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan_images`
--
ALTER TABLE `plan_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plan_images_ibfk_1` (`project_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `project_materials`
--
ALTER TABLE `project_materials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_materials_ibfk_1` (`project_id`);

--
-- Indexes for table `property_details`
--
ALTER TABLE `property_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_details_ibfk_1` (`project_id`);

--
-- Indexes for table `property_images`
--
ALTER TABLE `property_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_images_ibfk_1` (`project_id`);

--
-- Indexes for table `property_list`
--
ALTER TABLE `property_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_list_images`
--
ALTER TABLE `property_list_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_id` (`property_id`);

--
-- Indexes for table `property_location`
--
ALTER TABLE `property_location`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_location_ibfk_1` (`project_id`);

--
-- Indexes for table `proweb_heading`
--
ALTER TABLE `proweb_heading`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `urban_infrastructure`
--
ALTER TABLE `urban_infrastructure`
  ADD PRIMARY KEY (`id`),
  ADD KEY `urban_infrastructure_ibfk_1` (`project_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website_settings`
--
ALTER TABLE `website_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `web_heading`
--
ALTER TABLE `web_heading`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `whyinvest`
--
ALTER TABLE `whyinvest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `whyinvest_desc`
--
ALTER TABLE `whyinvest_desc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `whyus`
--
ALTER TABLE `whyus`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `about_developer`
--
ALTER TABLE `about_developer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `about_developer_projects`
--
ALTER TABLE `about_developer_projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `about_property`
--
ALTER TABLE `about_property`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `about_property_details`
--
ALTER TABLE `about_property_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_details`
--
ALTER TABLE `contact_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gov_details`
--
ALTER TABLE `gov_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=376;

--
-- AUTO_INCREMENT for table `inquiries_property_list`
--
ALTER TABLE `inquiries_property_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=310;

--
-- AUTO_INCREMENT for table `key_features`
--
ALTER TABLE `key_features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `logo_img`
--
ALTER TABLE `logo_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `plan_images`
--
ALTER TABLE `plan_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `project_materials`
--
ALTER TABLE `project_materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `property_details`
--
ALTER TABLE `property_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `property_images`
--
ALTER TABLE `property_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `property_list`
--
ALTER TABLE `property_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `property_list_images`
--
ALTER TABLE `property_list_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `property_location`
--
ALTER TABLE `property_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `proweb_heading`
--
ALTER TABLE `proweb_heading`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `urban_infrastructure`
--
ALTER TABLE `urban_infrastructure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `website_settings`
--
ALTER TABLE `website_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `web_heading`
--
ALTER TABLE `web_heading`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `whyinvest`
--
ALTER TABLE `whyinvest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `whyinvest_desc`
--
ALTER TABLE `whyinvest_desc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `whyus`
--
ALTER TABLE `whyus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `about_developer`
--
ALTER TABLE `about_developer`
  ADD CONSTRAINT `about_developer_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `about_developer_projects`
--
ALTER TABLE `about_developer_projects`
  ADD CONSTRAINT `about_developer_projects_ibfk_1` FOREIGN KEY (`about_developer_id`) REFERENCES `about_developer` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `about_developer_projects_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `about_property`
--
ALTER TABLE `about_property`
  ADD CONSTRAINT `about_property_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `about_property_details`
--
ALTER TABLE `about_property_details`
  ADD CONSTRAINT `about_property_details_ibfk_1` FOREIGN KEY (`about_property_id`) REFERENCES `about_property` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `about_property_details_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contact_details`
--
ALTER TABLE `contact_details`
  ADD CONSTRAINT `contact_details_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `gov_details`
--
ALTER TABLE `gov_details`
  ADD CONSTRAINT `gov_details_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `key_features`
--
ALTER TABLE `key_features`
  ADD CONSTRAINT `key_features_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `plan_images`
--
ALTER TABLE `plan_images`
  ADD CONSTRAINT `plan_images_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_materials`
--
ALTER TABLE `project_materials`
  ADD CONSTRAINT `project_materials_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `property_details`
--
ALTER TABLE `property_details`
  ADD CONSTRAINT `property_details_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `property_images`
--
ALTER TABLE `property_images`
  ADD CONSTRAINT `property_images_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `property_list_images`
--
ALTER TABLE `property_list_images`
  ADD CONSTRAINT `property_list_images_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `property_list` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `property_location`
--
ALTER TABLE `property_location`
  ADD CONSTRAINT `property_location_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `proweb_heading`
--
ALTER TABLE `proweb_heading`
  ADD CONSTRAINT `proweb_heading_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `urban_infrastructure`
--
ALTER TABLE `urban_infrastructure`
  ADD CONSTRAINT `urban_infrastructure_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `website_settings`
--
ALTER TABLE `website_settings`
  ADD CONSTRAINT `website_settings_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
