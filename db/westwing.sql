-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 07-Maio-2019 às 13:27
-- Versão do servidor: 10.1.38-MariaDB-0+deb9u1
-- PHP Version: 7.2.18-1+0~20190503103213.21+stretch~1.gbp101320

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `westwing`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `customerName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customerEmail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customerPass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customerToken` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customerDate` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_05_01_211426_create_customer', 1),
(2, '2019_05_01_211427_create_ticket_status', 1),
(3, '2019_05_01_211500_create_order', 1),
(4, '2019_05_01_211647_create_ticket', 1),
(5, '2019_05_01_225257_create_user', 1),
(6, '2019_05_01_225352_create_ticket_answer', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `order_ticket`
--

CREATE TABLE `order_ticket` (
  `id` int(10) UNSIGNED NOT NULL,
  `customerId` int(10) UNSIGNED NOT NULL,
  `orderToken` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orderId` int(11) NOT NULL,
  `orderDate` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ticket`
--

CREATE TABLE `ticket` (
  `id` int(10) UNSIGNED NOT NULL,
  `customerName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customerEmail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customerId` int(10) UNSIGNED NOT NULL,
  `ticketTitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticketStatusId` int(10) UNSIGNED NOT NULL,
  `ticketContent` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticketDate` date NOT NULL,
  `ticketToken` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orderId` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ticket_answer`
--

CREATE TABLE `ticket_answer` (
  `id` int(10) UNSIGNED NOT NULL,
  `ticketId` int(10) UNSIGNED NOT NULL,
  `ticketAnswerTitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticketStatusId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticketAnswerContent` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticketAnswerDate` date NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `userName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ticket_status`
--

CREATE TABLE `ticket_status` (
  `id` int(10) UNSIGNED NOT NULL,
  `ticketSituacao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `ticket_status`
--

INSERT INTO `ticket_status` (`id`, `ticketSituacao`) VALUES
(1, 'Aberto'),
(2, 'Respondido'),
(3, 'Respondido pelo Cliente'),
(4, 'Fechado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `userName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userEmail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userPass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userToken` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userStatus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `userName`, `userEmail`, `userPass`, `userToken`, `userStatus`, `created_at`, `updated_at`) VALUES
(1, 'Mario Veiga', 'mariovpirani@gmail.com', '698dc19d489c4e4db73e28a713eab07b', 'b2bbc50fe898e7ec47fe3565f54ae040', '1', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_ticket`
--
ALTER TABLE `order_ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_ticket_customerid_foreign` (`customerId`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_customerid_foreign` (`customerId`),
  ADD KEY `ticket_ticketstatusid_foreign` (`ticketStatusId`);

--
-- Indexes for table `ticket_answer`
--
ALTER TABLE `ticket_answer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_answer_ticketid_foreign` (`ticketId`);

--
-- Indexes for table `ticket_status`
--
ALTER TABLE `ticket_status`
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
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `order_ticket`
--
ALTER TABLE `order_ticket`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ticket_answer`
--
ALTER TABLE `ticket_answer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ticket_status`
--
ALTER TABLE `ticket_status`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `order_ticket`
--
ALTER TABLE `order_ticket`
  ADD CONSTRAINT `order_ticket_customerid_foreign` FOREIGN KEY (`customerId`) REFERENCES `customer` (`id`);

--
-- Limitadores para a tabela `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_customerid_foreign` FOREIGN KEY (`customerId`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `ticket_ticketstatusid_foreign` FOREIGN KEY (`ticketStatusId`) REFERENCES `ticket_status` (`id`);

--
-- Limitadores para a tabela `ticket_answer`
--
ALTER TABLE `ticket_answer`
  ADD CONSTRAINT `ticket_answer_ticketid_foreign` FOREIGN KEY (`ticketId`) REFERENCES `ticket` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
