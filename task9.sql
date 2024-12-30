-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2024 at 10:52 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task9`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `name`, `email`, `password`, `image`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$rlu1hTemq76Ab3pVcb/E3OzCUJ0fntgxPS0tU36Ded6O2P.CZPk1y', '..\\user_images/1729161150_1729157174_default-avatar-icon-of-social-media-user-vector.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `b_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `u_image` varchar(255) NOT NULL,
  `title` varchar(30) NOT NULL,
  `image` varchar(255) NOT NULL,
  `bloge` text NOT NULL,
  `u_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`b_id`, `name`, `u_image`, `title`, `image`, `bloge`, `u_id`) VALUES
(18, 'tejas123', 'user_images/1728970282_default-avatar-icon-of-social-media-user-vector.jpg', 'The Future of Mobile Technolog', 'blog_image/1728970403_1728888834_background.jpg', '\nTitle: The Future of Mobile Technology: Trends to Watch in 2024\n\nIn 2024, mobile technology is advancing at an incredible pace, redefining how we communicate, work, and play. From foldable devices to the rise of 5G and artificial intelligence integration, here are some trends that are shaping the future of mobile technology.\n\n1. Foldable and Flexible Displays\nFoldable smartphones have transitioned from a niche concept to a mainstream product. These devices offer larger screen sizes without increasing the bulkiness of the phone. As more manufacturers enter the foldable market, we can expect improvements in durability, user experience, and affordability, making foldables a common sight in the coming years.\n\n2. 5G Revolution\nThe global rollout of 5G networks is now accelerating. 5G offers incredibly fast internet speeds, lower latency, and enhanced connectivity, enabling smoother streaming, faster downloads, and more responsive gaming. For businesses, 5G opens doors to new possibilities such as remote work innovations, IoT devices, and smart cities.\n\n3. Artificial Intelligence (AI) Integration\nAI is becoming a crucial part of mobile experiences. From predictive text and voice assistants to AI-powered photography, the technology is enhancing smartphone capabilities. Machine learning algorithms are also improving mobile security through facial recognition and biometric features, making our devices smarter and safer.\n\n4. Mobile Payments and Digital Wallets\nAs mobile payment systems like Apple Pay, Google Wallet, and various banking apps gain more users, cashless transactions are quickly becoming the norm. Digital wallets offer security, convenience, and efficiency, with more businesses integrating these solutions for seamless payment experiences.\n\n5. Augmented Reality (AR) and Virtual Reality (VR)\nAR and VR are poised to revolutionize how we interact with mobile devices. From gaming to shopping and virtual meetings, these technologies are becoming more accessible thanks to improved hardware and software support. Expect more mobile apps to integrate AR and VR features, enhancing user engagement and creating immersive experiences.\n\n6. Sustainability in Mobile Manufacturing\nWith growing awareness of environmental issues, smartphone manufacturers are focusing on sustainability. Expect to see more eco-friendly devices made from recycled materials and initiatives to reduce e-waste through longer-lasting phones and easier repairability.\n\n7. Health and Fitness Tracking\nMobile devices are becoming central to health monitoring, with more features designed to track sleep patterns, heart rates, oxygen levels, and even detect irregularities in physical activity. In 2024, this trend will continue with further advancements in health-tech integration, turning smartphones into essential tools for personal wellness.\n\nConclusion\nThe future of mobile technology is bright, with innovations enhancing the way we live, work, and connect. As we move further into 2024, we can expect mobile devices to become even more integral to our daily lives, offering smarter, faster, and more sustainable solutions. Whether it\'s the convenience of foldable screens, the power of 5G, or the personalization of AI, the possibilities are endless.', 12),
(24, 'tejas123', 'user_images/1728970282_default-avatar-icon-of-social-media-user-vector.jpg', 'The Future of Mobile Technolog', 'blog_image/1728970403_1728888834_background.jpg', '1. Foldable and Flexible Displays\nFoldable smartphones have transitioned from a niche concept to a mainstream product. These devices offer larger screen sizes without increasing the bulkiness of the phone. As more manufacturers enter the foldable market, we can expect improvements in durability, user experience, and affordability, making foldables a common sight in the coming years.\n\n2. 5G Revolution\nThe global rollout of 5G networks is now accelerating. 5G offers incredibly fast internet speeds, lower latency, and enhanced connectivity, enabling smoother streaming, faster downloads, and more responsive gaming. For businesses, 5G opens doors to new possibilities such as remote work innovations, IoT devices, and smart cities.\n\n3. Artificial Intelligence (AI) Integration\nAI is becoming a crucial part of mobile experiences. From predictive text and voice assistants to AI-powered photography, the technology is enhancing smartphone capabilities. Machine learning algorithms are also improving mobile security through facial recognition and biometric features, making our devices smarter and safer.\n\n4. Mobile Payments and Digital Wallets\nAs mobile payment systems like Apple Pay, Google Wallet, and various banking apps gain more users, cashless transactions are quickly becoming the norm. Digital wallets offer security, convenience, and efficiency, with more businesses integrating these solutions for seamless payment experiences.\n\n5. Augmented Reality (AR) and Virtual Reality (VR)\nAR and VR are poised to revolutionize how we interact with mobile devices. From gaming to shopping and virtual meetings, these technologies are becoming more accessible thanks to improved hardware and software support. Expect more mobile apps to integrate AR and VR features, enhancing user engagement and creating immersive experiences.\n\n6. Sustainability in Mobile Manufacturing\nWith growing awareness of environmental issues, smartphone manufacturers are focusing on sustainability. Expect to see more eco-friendly devices made from recycled materials and initiatives to reduce e-waste through longer-lasting phones and easier repairability.\n\n7. Health and Fitness Tracking\nMobile devices are becoming central to health monitoring, with more features designed to track sleep patterns, heart rates, oxygen levels, and even detect irregularities in physical activity. In 2024, this trend will continue with further advancements in health-tech integration, turning smartphones into essential tools for personal wellness.', 12),
(25, 'tejas123', 'user_images/1728970282_default-avatar-icon-of-social-media-user-vector.jpg', 'The Future of Mobile Technolog', 'blog_image/1728970403_1728888834_background.jpg', '1. Foldable and Flexible Displays\r\nFoldable smartphones have transitioned from a niche concept to a mainstream product. These devices offer larger screen sizes without increasing the bulkiness of the phone. As more manufacturers enter the foldable market, we can expect improvements in durability, user experience, and affordability, making foldables a common sight in the coming years.\r\n\r\n2. 5G Revolution\r\nThe global rollout of 5G networks is now accelerating. 5G offers incredibly fast internet speeds, lower latency, and enhanced connectivity, enabling smoother streaming, faster downloads, and more responsive gaming. For businesses, 5G opens doors to new possibilities such as remote work innovations, IoT devices, and smart cities.\r\n\r\n3. Artificial Intelligence (AI) Integration\r\nAI is becoming a crucial part of mobile experiences. From predictive text and voice assistants to AI-powered photography, the technology is enhancing smartphone capabilities. Machine learning algorithms are also improving mobile security through facial recognition and biometric features, making our devices smarter and safer.\r\n\r\n4. Mobile Payments and Digital Wallets\r\nAs mobile payment systems like Apple Pay, Google Wallet, and various banking apps gain more users, cashless transactions are quickly becoming the norm. Digital wallets offer security, convenience, and efficiency, with more businesses integrating these solutions for seamless payment experiences.\r\n\r\n5. Augmented Reality (AR) and Virtual Reality (VR)\r\nAR and VR are poised to revolutionize how we interact with mobile devices. From gaming to shopping and virtual meetings, these technologies are becoming more accessible thanks to improved hardware and software support. Expect more mobile apps to integrate AR and VR features, enhancing user engagement and creating immersive experiences.\r\n\r\n6. Sustainability in Mobile Manufacturing\r\nWith growing awareness of environmental issues, smartphone manufacturers are focusing on sustainability. Expect to see more eco-friendly devices made from recycled materials and initiatives to reduce e-waste through longer-lasting phones and easier repairability.\r\n\r\n7. Health and Fitness Tracking\r\nMobile devices are becoming central to health monitoring, with more features designed to track sleep patterns, heart rates, oxygen levels, and even detect irregularities in physical activity. In 2024, this trend will continue with further advancements in health-tech integration, turning smartphones into essential tools for personal wellness.', 12),
(26, 'tejas123', 'user_images/1728970282_default-avatar-icon-of-social-media-user-vector.jpg', 'The Future of Mobile Technolog', 'blog_image/1728970403_1728888834_background.jpg', '1. Foldable and Flexible Displays\r\nFoldable smartphones have transitioned from a niche concept to a mainstream product. These devices offer larger screen sizes without increasing the bulkiness of the phone. As more manufacturers enter the foldable market, we can expect improvements in durability, user experience, and affordability, making foldables a common sight in the coming years.\r\n\r\n2. 5G Revolution\r\nThe global rollout of 5G networks is now accelerating. 5G offers incredibly fast internet speeds, lower latency, and enhanced connectivity, enabling smoother streaming, faster downloads, and more responsive gaming. For businesses, 5G opens doors to new possibilities such as remote work innovations, IoT devices, and smart cities.\r\n\r\n3. Artificial Intelligence (AI) Integration\r\nAI is becoming a crucial part of mobile experiences. From predictive text and voice assistants to AI-powered photography, the technology is enhancing smartphone capabilities. Machine learning algorithms are also improving mobile security through facial recognition and biometric features, making our devices smarter and safer.\r\n\r\n4. Mobile Payments and Digital Wallets\r\nAs mobile payment systems like Apple Pay, Google Wallet, and various banking apps gain more users, cashless transactions are quickly becoming the norm. Digital wallets offer security, convenience, and efficiency, with more businesses integrating these solutions for seamless payment experiences.\r\n\r\n5. Augmented Reality (AR) and Virtual Reality (VR)\r\nAR and VR are poised to revolutionize how we interact with mobile devices. From gaming to shopping and virtual meetings, these technologies are becoming more accessible thanks to improved hardware and software support. Expect more mobile apps to integrate AR and VR features, enhancing user engagement and creating immersive experiences.\r\n\r\n6. Sustainability in Mobile Manufacturing\r\nWith growing awareness of environmental issues, smartphone manufacturers are focusing on sustainability. Expect to see more eco-friendly devices made from recycled materials and initiatives to reduce e-waste through longer-lasting phones and easier repairability.\r\n\r\n7. Health and Fitness Tracking\r\nMobile devices are becoming central to health monitoring, with more features designed to track sleep patterns, heart rates, oxygen levels, and even detect irregularities in physical activity. In 2024, this trend will continue with further advancements in health-tech integration, turning smartphones into essential tools for personal wellness.', 12),
(27, 'tejas123', 'user_images/1728970282_default-avatar-icon-of-social-media-user-vector.jpg', 'safaf', 'blog_image/1728970403_1728888834_background.jpg', 'sdfs efsf werwe', 12),
(28, 'tejas123', 'user_images/1728970282_default-avatar-icon-of-social-media-user-vector.jpg', 'dfdfg', 'blog_image/1728970403_1728888834_background.jpg', 'dfv erter ertr ', 12),
(29, 'tejas123', 'user_images/1728970282_default-avatar-icon-of-social-media-user-vector.jpg', 'dfdfg', 'blog_image/1728970403_1728888834_background.jpg', 'dfv erter ertr ', 12),
(32, 'tejas123', 'user_images/1728970282_default-avatar-icon-of-social-media-user-vector.jpg', 'dsffsdf', 'blog_image/1728888368_background.jpg', 'dsfsdffsdf awfafaf wafddf', 12),
(33, 'tejas123', 'user_images/1728970282_default-avatar-icon-of-social-media-user-vector.jpg', 'sdfsf', 'blog_image/1728888834_background.jpg', 'df sgsd sef sfg sdf ', 12),
(35, 'xyz', 'user_images/1728970282_default-avatar-icon-of-social-media-user-vector.jpg', 'salf la', 'blog_image/1728970403_1728888834_background.jpg', 'asdmas camas askk as as  fas   as as as f a f asf kevht werg934n934t 34t34 83t 34th348th93h hti9erh erhg uererh hgoghoiwrgh iorh erigerihgiehg  er hgioerhigh rh gerh giperg eriogegh g  eiog igighieorghirgheirog of.\r\nwdfj0 ejg9jt9 jgergjeirgjoefpw fpwaofpoa jfjwfiwefwejf we weiuf wfw fgheh siuofuhhfio bui be ie ggiewhiwh wfhiowe hweigh wioghwirgwefhweufh iwefhoiwfhoifhiowehfiowfioewfhif ih ifhiwhfoifhweoifhoifwifhiofhsofhiosfhoif oiaefhiofhiofafi f  ssfsfisfsfs fsfh f hsdhiosfhsdhsfsfhsidsfs sf sf s f sf  sfh iofsdhfsd  shfs s hfsdohsd.\r\n', 13),
(38, 'op', 'user_images/1728970282_default-avatar-icon-of-social-media-user-vector.jpg', 'Embracing the Digital Age: The', 'blog_image/1729232530_download.jpeg', 'Introduction\r\nIn today’s fast-paced world, having a strong online presence is no longer optional—it’s essential. From personal branding to business growth, the digital landscape offers countless opportunities for individuals and organizations to connect with their audiences. In this blog post, we’ll explore the significance of establishing an online presence and share tips on how to make the most of it.\r\n\r\nThe Need for Online Presence\r\nWith over 4.9 billion active internet users globally, the online space serves as a massive marketplace where ideas, products, and services can be exchanged. Here are a few reasons why having an online presence is vital:\r\n\r\nIncreased Visibility: Being online allows you to reach a broader audience. Whether you’re a freelancer, a small business, or a large corporation, your potential customers are browsing the web.\r\n\r\nCredibility and Trust: An engaging website and active social media profiles enhance your credibility. Customers are more likely to trust a business with a professional online presence.\r\n\r\nNetworking Opportunities: The internet facilitates connections. You can collaborate with other professionals, join industry groups, and network with potential clients from around the world.\r\n\r\nCost-Effective Marketing: Online marketing strategies like social media, SEO, and content marketing are often more affordable than traditional advertising methods, making them accessible for businesses of all sizes.\r\n\r\nTips for Building Your Online Presence\r\n1. Create a Professional Website\r\nYour website is often the first impression potential customers have of your brand. Ensure it is visually appealing, easy to navigate, and contains valuable content that reflects your expertise.\r\n\r\n2. Utilize Social Media\r\nSocial media platforms are powerful tools for engagement. Choose platforms that resonate with your target audience and share relevant content regularly. Engage with your followers and participate in discussions to build relationships.\r\n\r\n3. Optimize for Search Engines\r\nImplement SEO strategies to improve your website\'s visibility on search engines. Use relevant keywords, create quality content, and optimize images and metadata to enhance your rankings.\r\n\r\n4. Produce Valuable Content\r\nContent marketing is a great way to showcase your knowledge and expertise. Consider starting a blog where you share insights, tips, and industry news. This will help establish you as a thought leader in your field.\r\n\r\n5. Engage with Your Audience\r\nDon’t just broadcast your messages; listen to your audience as well. Respond to comments, answer questions, and create polls or surveys to understand their needs and preferences better.\r\n\r\nConclusion\r\nEmbracing the digital age is crucial for anyone looking to succeed in today’s interconnected world. By establishing a robust online presence, you can increase your visibility, build credibility, and create meaningful connections with your audience. Start today by implementing the tips shared above, and watch your digital footprint expand.\r\n\r\n', 11);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `title` varchar(500) NOT NULL,
  `name` varchar(40) NOT NULL,
  `comment` mediumtext NOT NULL,
  `comment_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `b_id`, `email`, `title`, `name`, `comment`, `comment_time`) VALUES
(46, 18, 'tejas@gmail.com', 'The Future of Mobile Technolog', 'tejas123', 'lknfijwenbf efji fwbj fwe fwe f efew fwe f wef eww ef wf vsad sad f s d fsd f f as f sd f sd f  sdf  sd f s af  asd f s f s f s fsad  s f sd f sd fsd f s f s f as f s f sd f   d g dsds gsd fds  \n', '2024-10-18 04:43:04'),
(53, 25, 'tejas@gmail.com', 'The Future of Mobile Technolog', 'tejas123', 'df.lwe fefwl  ff asfsa jka v asdj asd sdjdj v svhsad vhv s vsd v vsv sd sd a n v ksdv ', '2024-10-18 05:19:11'),
(56, 26, 'xyz@gmail.com', 'The Future of Mobile Technolog', 'tejas123', 'welefnwe f fwef f w fwef wefknwf w fk wkflw felw fl we fl w', '2024-10-18 05:30:03'),
(57, 18, 'op@gmail.com', 'The Future of Mobile Technolog', 'tejas123', 'eplgep ve kegpgleprg regker gkgg rekgker gker gkoer gk gker g', '2024-10-18 06:18:26'),
(62, 27, 'tejas@gmail.com', 'safaf', 'tejas123', 'sda, asjf jf adjf kf kj;asf d', '2024-10-18 08:34:55'),
(63, 27, 'tejas@gmail.com', 'safaf', 'tejas123', 'awkem gwegjk gj werjkg ejkg erjg \n', '2024-10-18 08:35:02'),
(64, 27, 'tejas@gmail.com', 'safaf', 'tejas123', 'sdsfsdfdsf', '2024-10-18 08:35:31'),
(65, 24, 'tejas@gmail.com', 'The Future of Mobile Technolog', 'tejas123', 'adc as a as', '2024-10-18 08:39:22'),
(66, 38, 'tejas@gmail.com', 'Embracing the Digital Age: The', 'op', ',wbejfnownfk wef we fw f wfjkw ej fjwekflj jwef wef\n', '2024-10-18 08:44:49'),
(67, 38, 'tejas@gmail.com', 'Embracing the Digital Age: The', 'op', 'wklefnwefw ffje fjwe fj fkw fkf wek fkf kew f\n', '2024-10-18 08:44:56'),
(68, 33, 'tejas@gmail.com', 'sdfsf', 'tejas123', 'fnqe f fe fjkw f ewf wae v adv djv sjdk vskd vjsd v sldv ksd vksdv kjsd vkj vk sdk \n', '2024-10-18 08:47:55'),
(69, 33, 'tejas@gmail.com', 'sdfsf', 'tejas123', ',smd vasvk sdvsadv ksv asd v', '2024-10-18 08:48:00');

-- --------------------------------------------------------

--
-- Table structure for table `like`
--

CREATE TABLE `like` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `user` varchar(60) NOT NULL,
  `like_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `like`
--

INSERT INTO `like` (`id`, `u_id`, `b_id`, `title`, `user`, `like_date`) VALUES
(254, 13, 18, 'The Future of Mobile Technolog', 'admin', '2024-10-18 06:08:03'),
(255, 13, 24, 'The Future of Mobile Technolog', 'admin', '2024-10-18 06:08:06'),
(256, 13, 25, 'The Future of Mobile Technolog', 'admin', '2024-10-18 06:08:09'),
(257, 13, 27, 'safaf', 'xyz', '2024-10-18 06:08:23'),
(258, 13, 29, 'dfdfg', 'xyz', '2024-10-18 06:08:26'),
(260, 13, 32, 'dsffsdf', 'xyz', '2024-10-18 06:08:33'),
(261, 13, 34, 'The Future of Mobile Technolog', 'xyz', '2024-10-18 06:08:35'),
(262, 13, 36, 'vjosdoksn wihferoi ghioergheri', 'xyz', '2024-10-18 06:08:38'),
(265, 1, 18, 'The Future of Mobile Technolog', 'tejas', '2024-10-18 06:09:01'),
(266, 1, 25, 'The Future of Mobile Technolog', 'tejas', '2024-10-18 06:09:03'),
(269, 1, 28, 'dfdfg', 'tejas', '2024-10-18 06:09:14'),
(270, 1, 29, 'dfdfg', 'tejas', '2024-10-18 06:09:17'),
(273, 11, 18, 'The Future of Mobile Technolog', 'op', '2024-10-18 06:18:18'),
(274, 1, 27, 'safaf', 'tejas', '2024-10-18 08:33:24'),
(275, 1, 38, 'Embracing the Digital Age: The', 'tejas', '2024-10-18 08:44:41'),
(276, 1, 35, 'salf la', 'tejas', '2024-10-18 08:47:42'),
(277, 1, 33, 'sdfsf', 'tejas', '2024-10-18 08:47:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `name`, `email`, `password`, `image`) VALUES
(1, 'tejas', 'tejas@gmail.com', '$2y$10$czbV0wuEQR/JIz/6UmHYCuWmiLNFGH8zYGqhm06l5c9VEqRtSuwjW', 'user_images/1728970282_default-avatar-icon-of-social-media-user-vector.jpg'),
(2, 'tejas1', 'tejas1@gmail.com', '$2y$10$CVB3m.zVFhenY8LeZ2npZeAV0YPj8kpGPpMtGx5nWh/ne61YdgZ1y', 'user_images/1728970282_default-avatar-icon-of-social-media-user-vector.jpg'),
(3, 'tejas2', 'tejas2@gmail.com', '$2y$10$1tMdiW7hxqYyPw27K3e9tecNk4HqZJNis6XTxuqVu742ftWLQf7X2', 'user_images/1728970282_default-avatar-icon-of-social-media-user-vector.jpg'),
(4, 'tejas4', 'tejas4@gmail.com', '$2y$10$JKxwNeo8IUkELBAr7LFu/eNzrcMLkNqTsjnKN7CGe2gn13mAA8KRG', 'user_images/1728970282_default-avatar-icon-of-social-media-user-vector.jpg'),
(5, 'tejas6', 'tejas6@gmail.com', '$2y$10$HhPfU.lMuWbVOjffUGwVDOj.B7CrUmJWUrVXd.aqL6OY0UU7lc7au', 'user_images/1728970282_default-avatar-icon-of-social-media-user-vector.jpg'),
(6, 'tejas8', 'tejas8@gmail.com', '$2y$10$7GKn8VggaNaZyw1Qq4grXekV3vXpNuMU.96nl5JXX/kPT3a.z.rJa', 'user_images/1728970282_default-avatar-icon-of-social-media-user-vector.jpg'),
(7, 'tejas', 'tejas10@gmail.com', '$2y$10$TPub611qHSkOxVTJNmAxoeTGwb5AzDGYae1pHHguWOyztaN/CGwEu', 'user_images/1728970282_default-avatar-icon-of-social-media-user-vector.jpg'),
(8, 'tejas11', 'tejas11@gmail.com', '$2y$10$7BEml.Q.BtLXLNjN65mxg.HYqY66yH3wtXqCPDsQlTQrBA0G8eYzW', 'user_images/1728970282_default-avatar-icon-of-social-media-user-vector.jpg'),
(9, 'tejas100', 'tejas100@gmaio.com', '$2y$10$4aH0f55cUywtEsDcgwJLaOJkIB7KThXU6g1TmaejizkEphTwPoMrS', 'user_images/1728970282_default-avatar-icon-of-social-media-user-vector.jpg'),
(10, 'b', 'b@gmail.com', '$2y$10$vZKVwQLFxdDkVxzU226kZOQaypL7Ja2Mt.Voa4UP.gYdcVjsfeyn2', 'user_images/1728970282_default-avatar-icon-of-social-media-user-vector.jpg'),
(11, 'op', 'op@gmail.com', '$2y$10$ONU08aOiM4u24x8.3Diuo.4d8hoYlM5YBxQ2GKs9zhbaXIJ5Rmdha', 'user_images/1728970282_default-avatar-icon-of-social-media-user-vector.jpg'),
(12, 'tejas123', 'tejas123@gmail.com', '$2y$10$qkfFYqTyeJLSTqOoXKbCB.PuGa2/SPcAkCUllMICKT.6CD21hOVQ.', 'user_images/1728970282_default-avatar-icon-of-social-media-user-vector.jpg'),
(13, 'xyz', 'xyz@gmail.com', '$2y$10$VvPw6hau68BVA3wOuoclqevTEjp0hde85BDkGZ8AyAQ64.o06B4Qa', 'user_images/1728970282_default-avatar-icon-of-social-media-user-vector.jpg'),
(14, 'efwefasc', 'ascascac@gmail.com', '$2y$10$VvVEg6pdj.yuD8YH2KvQQek9U.PErjGz7irIzQj4DU3c1rEwrAABi', 'user_images/1729157174_default-avatar-icon-of-social-media-user-vector.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `like`
--
ALTER TABLE `like`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `like`
--
ALTER TABLE `like`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=279;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
