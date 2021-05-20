-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 20-Maio-2021 às 14:32
-- Versão do servidor: 5.7.34-0ubuntu0.18.04.1
-- PHP Version: 7.2.34-21+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chatapp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES
(1, 140550952, 280064724, 'teste'),
(2, 644030943, 280064724, 'TES'),
(3, 280064724, 280064724, 'VAMOS LA'),
(4, 280064724, 140550952, 'VAMOS'),
(5, 140550952, 280064724, 'E AGORA'),
(6, 140550952, 280064724, 'S'),
(7, 140550952, 280064724, 'vamos la'),
(8, 280064724, 140550952, 'ola men'),
(9, 280064724, 140550952, 'C'),
(10, 140550952, 280064724, 'Q'),
(11, 140550952, 280064724, 'Q'),
(12, 140550952, 280064724, 'Q'),
(13, 280064724, 140550952, 'SS'),
(14, 140550952, 280064724, 'a'),
(15, 280064724, 140550952, 'vai'),
(16, 140550952, 280064724, 'ok'),
(17, 280064724, 140550952, 'v'),
(18, 280064724, 280064724, 'a'),
(19, 280064724, 140550952, 'va5'),
(20, 140550952, 280064724, '3e'),
(21, 77907168, 1198908928, 'ok'),
(22, 1198908928, 77907168, 'oi'),
(23, 1198908928, 77907168, 'vai com Deus'),
(24, 77907168, 1198908928, 'sim com Deus tmb'),
(25, 77907168, 1322437039, 'ola');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `unique_id` int(200) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(400) DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`user_id`, `unique_id`, `fname`, `lname`, `email`, `password`, `img`, `status`) VALUES
(1, 280064724, 'teste', 'teste1', 'suport.personal18@gmail.com', 'qwe', '16165421434.jpg', 'Active now'),
(2, 249436020, 'teste1', 'teste11', 'suport.personal181@gmail.com', '111', '16165421434.jpg', 'Offline now'),
(3, 392742292, 'teste12', 'teste112', 'suport.personal1281@gmail.com', '1112', '16165423526.jpg', 'Offline now'),
(4, 1323042714, 'teste123', 'teste1123', 'suport.personal12831@gmail.com', '11123', '16165424389.jpg', 'Offline now'),
(5, 1487857544, 'teste1235', 'teste11235', 'suport.personal512831@gmail.com', '555', '16165424923.jpg', 'Offline now'),
(6, 644030943, 'teste12357', 'teste112357', 'suport.persona7l512831@gmail.com', '777', '16165425794.jpg', 'Offline now'),
(7, 1421486609, 'teste1qweqw', 'qweqw', 'matheushmg@hotmail.com', 'asdasd', '16165430605.jpg', 'Offline now'),
(8, 140550952, 'MATHEUS', 'qweqwz', 'matheuzshmg@hotmail.com', 'zzzzz', '16165432727.jpg', 'Active now'),
(9, 28373253, 'faz', 'faz', 'faz@hotmail.com', 'faz', '16165469495.jpg', 'Offline now'),
(10, 77907168, 'teste', 'teste', 'teste@teste.com', 'teste', '1617122346any.jpeg', 'Active now'),
(11, 1198908928, 'vai', 'vay', 'var@cvar.com', '123456', '16171223854.jpg', 'Active now'),
(12, 1322437039, 'zxzxv', 'zxcv', 'zxcv@asd.zxc', '123456789', '16212637499.jpg', 'Active now');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;