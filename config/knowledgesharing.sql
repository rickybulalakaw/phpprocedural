-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2020 at 12:00 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `knowledgesharing`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `userid` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `userid`, `postid`, `timestamp`) VALUES
(3, '<p>Lorem ipsum now and forever&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ol>\r\n	<li>&nbsp;sdf</li>\r\n	<li>fdgsadf</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>kjas;lfkjdsf</li>\r\n	<li>ldkjf;alsdf</li>\r\n</ul>\r\n', 5, 4, '2020-06-20 00:59:20'),
(4, '<p>another post for comment of test&nbsp;</p>\r\n\r\n<p>sdfasdfsd fd&nbsp;</p>\r\n\r\n<ol>\r\n	<li>fajs;lfkj&nbsp;</li>\r\n	<li>ldksfj;al</li>\r\n	<li>dlkfj;alsdkfj</li>\r\n</ol>\r\n', 5, 4, '2020-06-20 01:07:00'),
(5, '<p>this is a new comment. please accept.</p>\r\n', 5, 7, '2020-06-20 16:45:15'),
(6, '<p>this is a comment from a new user.</p>\r\n', 12, 9, '2020-06-20 17:54:48');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `content` text NOT NULL,
  `userid` int(11) NOT NULL,
  `tag` int(11) DEFAULT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `content`, `userid`, `tag`, `timestamp`) VALUES
(1, 'post 1', '<p>this is a trial post</p>\\r\\n', 5, 0, '2020-06-19 17:11:07'),
(2, 'post 2', '<p>this is a trial post</p>\\r\\n\\r\\n<p>This is a new post with bullets</p>\\r\\n\\r\\n<ul>\\r\\n	<li>Bullet 1</li>\\r\\n	<li>BUllet t2</li>\\r\\n</ul>\\r\\n', 5, 0, '2020-06-19 17:12:12'),
(3, 'post 3', '<ul>\r\n	<li>this is post 3 with bullet again</li>\r\n	<li>BUllet 2</li>\r\n</ul>\r\n\r\n<p>This is a bullet page</p>\r\n', 5, 0, '2020-06-19 17:14:11'),
(4, 'post 5', '<p>This is a test with tag</p>\r\n\r\n<ol>\r\n	<li>tag for 1&nbsp;</li>\r\n	<li>2 and 3</li>\r\n	<li>tag end</li>\r\n	<li>new entry</li>\r\n</ol>\r\n', 5, 1, '2020-06-19 18:31:14'),
(5, 'post 5', '<p>This is a test with tag</p>\r\n\r\n<ol>\r\n	<li>tag for 1&nbsp;</li>\r\n	<li>2 and 3</li>\r\n	<li>tag end</li>\r\n	<li>new entry</li>\r\n</ol>\r\n', 5, 2, '2020-06-20 13:21:19'),
(6, 'new long post', '<h2>Where can I get some?</h2>\r\n\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n\r\n<h2>Where can I get some?</h2>\r\n\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n\r\n<h2>Where can I get some?</h2>\r\n\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n\r\n<h2>Where can I get some?</h2>\r\n\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n', 5, 3, '2020-06-20 13:25:43'),
(7, 'seomthing new', '<p>later&nbsp;</p>\r\n\r\n<p>Cannot modify header information - headers already sent by</p>\r\n\r\n<p>Cannot modify header information - headers already sent by</p>\r\n\r\n<p>Cannot modify header information - headers already sent by</p>\r\n\r\n<p>Cannot modify header information - headers already sent by</p>\r\n\r\n<p>Cannot modify header information - headers already sent by</p>\r\n\r\n<p>Cannot modify header information - headers already sent by</p>\r\n\r\n<p>Cannot modify header information - headers already sent by</p>\r\n\r\n<h2>What is Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n', 5, 1, '2020-06-20 13:31:25'),
(8, 'Lalalalalala 3kdk fasd;lfkj sd fal;skj ', '<h2>What is Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n', 5, 2, '2020-06-20 13:35:14'),
(9, 'Long title page', '<h2>What is Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n', 5, 1, '2020-06-20 13:36:09'),
(10, 'post again looks like law', '<h3>The standard Lorem Ipsum passage, used since the 1500s</h3>\r\n\r\n<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>\r\n\r\n<h3>Section 1.10.32 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</h3>\r\n\r\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>\r\n', 5, 1, '2020-06-20 15:12:38');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `tag` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `tag`) VALUES
(1, 'Engineering'),
(2, 'Human Resource'),
(3, 'ICT'),
(4, 'General Services'),
(5, 'Social Welfare');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) NOT NULL,
  `extension` varchar(255) DEFAULT NULL,
  `dateofbirth` date NOT NULL,
  `imageid` varchar(255) DEFAULT NULL,
  `privacyagreement` varchar(5) NOT NULL,
  `validationlink` varchar(255) NOT NULL,
  `usertype` varchar(15) NOT NULL DEFAULT 'User',
  `status` varchar(15) NOT NULL DEFAULT 'Inactive',
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `firstname`, `middlename`, `lastname`, `extension`, `dateofbirth`, `imageid`, `privacyagreement`, `validationlink`, `usertype`, `status`, `timestamp`) VALUES
(1, 'email@test.net', 'kdk', 'kdkdk', 'kdkdk', 'kdkdk', 'dkdk', '2020-06-24', NULL, 'Y', 'esddas', 'User', 'Inactive', '2020-06-19 12:39:52'),
(5, 'rbulalakaw@gmail.com', '$2y$10$pvHZAO62YB4/rRmP61Rj/uZ0bUMpeL76hBuHrI3SE0o5oEoRFlbI.', 'fkdk', 'kdkdk', 'rick', 'kdkdk', '0000-00-00', '5eec8ebd8c0474.16308382.jpg', 'Yes', '732544aca66757d3f8e3c4fcacfb3918950932dc', 'Admin', 'Active', '2020-06-19 16:01:58'),
(12, 'rbulalakaw.pms@gmail.com', '$2y$10$COgWipztrw00bXvHGulhAu/zTREmdH7R4MwUbQj9oeVgjYTpSUbrq', 'John ', 'Again', 'John', 'Jr', '0000-00-00', NULL, 'Yes', '39920061c4ce760450942d5ded8c08f84fedcf6f', 'User', 'Active', '2020-06-19 21:42:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
