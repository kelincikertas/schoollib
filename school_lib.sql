-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2024 at 11:23 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `school_lib`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`id`, `name`, `updated_at`, `created_at`) VALUES
(1, 'jane doe', '2024-01-11 07:26:33', '2024-01-11 07:26:33'),
(2, 'john smith', '2024-01-11 07:26:33', '2024-01-11 07:26:33'),
(3, 'basuki', '2024-01-11 07:27:06', '2024-01-11 07:27:06'),
(4, 'rowling', '2024-01-11 07:27:06', '2024-01-11 07:27:06');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `tag` varchar(255) NOT NULL,
  `image` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `author_id`, `title`, `tag`, `image`, `content`, `updated_at`, `created_at`) VALUES
(1, 2, 'title', 'tag1,tag2', '1704957829.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus felis velit, tempus quis luctus non, bibendum nec arcu. Maecenas ac est gravida, lobortis ante id, accumsan elit. Ut eu ullamcorper purus, sit amet ultricies felis. Vivamus dignissim volutpat feugiat. Mauris augue lorem, ultrices id molestie eget, dignissim in est. Sed rutrum tortor sed faucibus bibendum. Ut porttitor, lorem sit amet fringilla fermentum, ligula lacus euismod arcu, eu condimentum nisi odio vitae tortor. Nullam blandit sagittis orci, vitae molestie felis dignissim in. Maecenas vitae turpis tempus, dictum metus id, egestas ex. Donec bibendum volutpat lacus, non accumsan sem pretium nec.', '2024-01-11 07:31:06', '2024-01-11 00:23:49'),
(2, 1, 'buku 1', 'tag1,tag2,tag3', 'book1.jpg', 'Praesent dapibus auctor tincidunt. Aliquam finibus, dui sed faucibus imperdiet, ipsum massa ultricies dui, id porttitor leo magna a tortor. Pellentesque consectetur, est et cursus elementum, ligula lacus accumsan libero, vitae molestie magna est id nibh. Vestibulum eu nulla ut eros faucibus malesuada. Praesent hendrerit consectetur diam id maximus. Nullam et tellus accumsan, luctus ante non, tincidunt risus. Aenean venenatis mattis pulvinar.', '2024-01-11 07:32:35', '2024-01-11 07:32:35'),
(3, 4, 'buku 2', 'tag4,tag5', 'book2.jpg', 'Duis quam quam, placerat in nulla accumsan, consequat sagittis sem. Praesent at scelerisque quam, sit amet dapibus orci. Nam et felis interdum, scelerisque libero vitae, varius sem. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam gravida sapien nec leo interdum feugiat. Donec vestibulum tempor dolor, a dictum orci. Nullam fermentum convallis urna, eu consequat nibh luctus sit amet. In elit libero, tincidunt aliquam rhoncus a, condimentum sed est. Vestibulum commodo lorem vel maximus eleifend.', '2024-01-11 07:32:35', '2024-01-11 07:32:35'),
(4, 3, 'buku 3', 'tag2,tag3', 'book3.jpg', 'Aliquam gravida diam et suscipit mattis. Morbi sit amet dignissim tortor. Sed faucibus mi orci, eu placerat velit viverra cursus. Praesent cursus eleifend nibh et lobortis. Aliquam ullamcorper eget nulla sed scelerisque. Integer pellentesque auctor justo, sed bibendum ipsum accumsan ut. In scelerisque commodo est vitae vestibulum. Integer lacus tortor, pellentesque quis dolor accumsan, egestas pellentesque est. Sed ut sapien leo.\r\n\r\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Fusce eleifend, lacus at tincidunt maximus, lorem sapien sollicitudin libero, in porttitor nisl tellus eu augue. Duis ultrices diam orci, a semper massa convallis vel. Nam eu interdum lacus, consequat ullamcorper augue. Maecenas sit amet nunc in tortor vestibulum auctor a vel erat. Interdum et malesuada fames ac ante ipsum primis in faucibus. Phasellus pulvinar volutpat ante nec sollicitudin. Integer volutpat vel diam quis tincidunt. Duis est erat, luctus eget condimentum vel, cursus vel felis. In sit amet pretium nisl, a luctus nunc. Integer aliquam fringilla placerat. Phasellus eleifend ex sed aliquet faucibus.', '2024-01-11 07:33:39', '2024-01-11 07:33:39'),
(5, 1, 'buku 4', 'tag4,tag5', 'book4.jpg', 'Proin in suscipit urna. Donec vitae mi at felis accumsan pharetra et ac ex. In egestas leo neque, ac fringilla erat interdum quis. Sed bibendum vel justo eu viverra. Nam sit amet dui sit amet justo ullamcorper sagittis in nec felis. Integer viverra in sem vitae mattis. Aliquam pellentesque accumsan nulla id ultrices. Phasellus auctor, quam a facilisis pulvinar, erat magna maximus nulla, vitae rhoncus magna purus at dui. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aliquam vulputate nibh sit amet tempus molestie. Nullam varius non sapien vehicula pulvinar. Vestibulum ullamcorper sit amet neque ut posuere. Proin congue volutpat felis sed aliquam. Morbi ultricies fermentum mollis.', '2024-01-11 07:33:39', '2024-01-11 07:33:39'),
(6, 3, 'buku 5', 'tag4,tag6', 'book5.jpg', 'Curabitur sit amet dolor commodo, lacinia nulla feugiat, semper mauris. Proin nisl elit, ullamcorper non bibendum non, facilisis sed felis. Sed tincidunt purus neque, eget consequat metus aliquam sed. Vestibulum quis commodo magna. Nunc orci arcu, congue et eros condimentum, volutpat accumsan nisi. Ut in ex vitae lectus laoreet sagittis non ut libero. Phasellus porttitor fringilla vestibulum. Nulla bibendum diam non sapien pretium, ac maximus leo semper. Donec vel quam a metus posuere faucibus sit amet id nisi. Duis tempor egestas arcu sed porttitor. Cras in gravida tellus, quis suscipit felis. Integer id gravida quam, sit amet pulvinar urna.\r\n\r\nProin id neque at nibh ullamcorper condimentum. Pellentesque nec tortor eros. Cras ac euismod massa. Etiam in viverra metus, sit amet mollis lacus. Ut viverra dignissim lectus, id venenatis sem. Nunc quam nunc, condimentum et dictum vitae, sodales et nisi. Integer imperdiet odio non mi pharetra, auctor tristique odio egestas. Vivamus finibus sapien a tempor pulvinar. Cras vel lacinia felis. Phasellus lacus magna, efficitur tempor felis nec, condimentum convallis nisl. Mauris elementum turpis orci, at fringilla nisl laoreet non. Ut nec nulla nec risus posuere mollis ac a nisi. Aliquam a vehicula ipsum.', '2024-01-11 07:34:36', '2024-01-11 07:34:36'),
(7, 4, 'buku 6', 'tag2,tag6', 'book6.jpg', 'Mauris vel suscipit urna. Etiam non feugiat nulla. Sed egestas id lacus cursus dapibus. Donec tristique, elit placerat ornare convallis, ex mi finibus ex, eget ultrices nibh elit ac nulla. Praesent congue risus urna, nec pretium arcu scelerisque a. Ut lacinia erat sem, nec lacinia magna euismod sit amet. Ut semper pellentesque odio, sit amet molestie risus commodo eu. In id eros vel lectus placerat iaculis id eget augue. Sed id porta nulla. Etiam luctus tempor lacus, in vestibulum ligula pretium vitae. Maecenas feugiat neque sit amet ipsum tincidunt, eget lobortis leo varius.\r\n\r\nNunc elementum ultrices bibendum. Suspendisse hendrerit pretium mi nec porta. Duis hendrerit risus commodo eros suscipit, non pharetra diam sagittis. Donec eu tincidunt nulla. Nulla facilisi. Fusce semper placerat lobortis. Etiam turpis quam, tincidunt eget gravida at, porttitor eu urna. Nulla sollicitudin pretium nisl in venenatis. Donec hendrerit ante commodo nulla commodo vestibulum. Praesent mattis tristique dolor convallis posuere. Duis nunc dui, ultricies sit amet mollis non, tincidunt eget dui. Mauris lorem lacus, efficitur non felis a, auctor laoreet tellus.', '2024-01-11 02:47:32', '2024-01-11 07:34:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `remember_token`, `updated_at`, `created_at`) VALUES
(1, 'admin', 'admin@mail.com', '$2y$12$UjAn34Ts5Jm0HQrp44vLIeYs0GG9/6XbQp/mCceSl5KOeNWrQGSO.', 'admin', '9n40v37qR8xkSny8LVqjhngdp94Y1JZiV07oPq9j7fRYukwKW9UBYviE00yL', '2024-01-11 06:48:40', '2024-01-10 21:13:33'),
(2, 'satu1', 'satu@mail.com', '$2y$12$Dcp0lV9cTvvlb974zl9b9.UUAX53GekDPyhpkMwxIhwEpqAw/Kgqe', 'user', NULL, '2024-01-11 02:22:41', '2024-01-10 23:48:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;
