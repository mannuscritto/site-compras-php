SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `graphik` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci;
USE `graphik`;

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `senha` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO `admin` (`id`, `usuario`, `senha`) VALUES(1, 'jhromero', 'graphik');
INSERT INTO `admin` (`id`, `usuario`, `senha`) VALUES(2, 'admin', 'admin');

CREATE TABLE `produto` (
  `id` uuid NOT NULL DEFAULT uuid(),
  `modelo` varchar(30) NOT NULL,
  `categoria` int(11) NOT NULL,
  `preco_base` float NOT NULL,
  `desconto` int(11) NOT NULL,
  `fabricante` int(11) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `estoque` int(11) NOT NULL,
  `novo` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO `produto` (`id`, `modelo`, `categoria`, `preco_base`, `desconto`, `fabricante`, `descricao`, `estoque`, `novo`) VALUES('21221f1a-7100-11ef-8c90-0242ac120002', 'RTX 2070 super', 1, 1128, 0, 1, 'Uma boa placa antiga', 1, 0);
INSERT INTO `produto` (`id`, `modelo`, `categoria`, `preco_base`, `desconto`, `fabricante`, `descricao`, `estoque`, `novo`) VALUES('b5703113-71e2-11ef-969a-0242ac120002', 'RTX 1650 Super', 1, 1299.99, 12, 5, 'Placa de Vídeo GTX 1660 Super PCYes NVIDIA GeForce, 6GB GDDR6, 192 Bits, Full Size - PA1660S6GR6DF', 97, 0);
INSERT INTO `produto` (`id`, `modelo`, `categoria`, `preco_base`, `desconto`, `fabricante`, `descricao`, `estoque`, `novo`) VALUES('25dc4838-71e3-11ef-969a-0242ac120002', 'RTX 4060 Ti', 3, 2699.99, 12, 4, 'Placa de Vídeo RTX 4060 Ti VENTUS 3X 8G OC MSI NVIDIA GeForce, 8 GB GDDR6, DLSS, Ray Tracing', 38, 1);
INSERT INTO `produto` (`id`, `modelo`, `categoria`, `preco_base`, `desconto`, `fabricante`, `descricao`, `estoque`, `novo`) VALUES('c3ccf47a-70fa-11ef-b5d7-0242ac120002', 'RTX 3050', 1, 1219.98, 0, 1, 'Uma placa antiga, verdade!', 1, 0);
INSERT INTO `produto` (`id`, `modelo`, `categoria`, `preco_base`, `desconto`, `fabricante`, `descricao`, `estoque`, `novo`) VALUES('d20f0835-70ab-11ef-bcad-0242ac120002', 'RTX 4060', 1, 1988, 0, 1, 'Uma placa de entrada', 1, 1);


ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
