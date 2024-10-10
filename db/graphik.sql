-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Tempo de geração: 10/10/2024 às 15:03
-- Versão do servidor: 9.0.1
-- Versão do PHP: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `graphik`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `admin`
--

CREATE TABLE `admin` (
  `id` int UNSIGNED NOT NULL,
  `usuario` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `senha` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Despejando dados para a tabela `admin`
--

INSERT INTO `admin` (`id`, `usuario`, `senha`) VALUES
(2, 'admin', '$2y$10$N1jeWcLuOE/U0Nk9mN.Afed5tBrebZzsY3pWmRda1hGkdpPG41oUm');

-- --------------------------------------------------------

--
-- Estrutura para tabela `enderecos`
--

CREATE TABLE `enderecos` (
  `id` int UNSIGNED NOT NULL,
  `usuario_id` int UNSIGNED NOT NULL,
  `tipo` enum('residencial','comercial','outro') NOT NULL DEFAULT 'residencial',
  `padrao` tinyint(1) NOT NULL DEFAULT '0',
  `nome` varchar(100) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `complemento` varchar(255) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `pais` varchar(50) NOT NULL DEFAULT 'Brasil'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `itens_pedido`
--

CREATE TABLE `itens_pedido` (
  `id` int UNSIGNED NOT NULL,
  `pedido_id` int UNSIGNED NOT NULL,
  `produto_id` int UNSIGNED NOT NULL,
  `quantidade` int NOT NULL,
  `preco_unitario` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int UNSIGNED NOT NULL,
  `usuario_id` int UNSIGNED NOT NULL,
  `endereco_id` int UNSIGNED NOT NULL,
  `data_pedido` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `id` int UNSIGNED NOT NULL,
  `modelo` varchar(30) NOT NULL,
  `categoria` int NOT NULL,
  `preco_base` float NOT NULL,
  `desconto` int NOT NULL,
  `fabricante` int NOT NULL,
  `imagens` varchar(1000) NOT NULL DEFAULT '[]',
  `descricao` varchar(200) DEFAULT NULL,
  `notas` varchar(30) NOT NULL DEFAULT '[3,10,4,150,41]',
  `estoque` int NOT NULL,
  `novo` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`id`, `modelo`, `categoria`, `preco_base`, `desconto`, `fabricante`, `imagens`, `descricao`, `notas`, `estoque`, `novo`) VALUES
(1, 'Lana Rhoades', 1, 520, 1, 1, '[\"Placa de vídeo MSI Geforce RTX 2070 Super.jpg\",\"Placa de vídeo MSI Geforce RTX 2070 Super 4.jpg\",\"Placa de vídeo MSI Geforce RTX 2070 Super 3.jpg\",\"Placa de vídeo MSI Geforce RTX 2070 Super 2.jpg\",\"Placa de vídeo MSI Geforce RTX 2070 Super 1.jpg\"]', 'Uma morena branquinha com os olhos lindos.', '[3,10,4,150,41]', 1, 1),
(2, 'Abella Danger', 1, 1444, 2, 1, '[\"Placa de vídeo MSI Geforce RTX 2060 Super.jpg\",\"Placa de vídeo MSI Geforce RTX 2060 Super 4.jpg\",\"Placa de vídeo MSI Geforce RTX 2060 Super 3.jpg\",\"Placa de vídeo MSI Geforce RTX 2060 Super 2.jpg\",\"Placa de vídeo MSI Geforce RTX 2060 Super 1.jpg\"]', 'Uma novinha judia muito sexy.', '[3,10,4,150,41]', 1, 1),
(3, 'Violet Myers', 1, 109, 3, 1, '[\"Placa de Vídeo Zotac NVIDIA Geforce RTX 2070.jpg\",\"Placa de Vídeo Zotac NVIDIA Geforce RTX 2070 5.jpg\",\"Placa de Vídeo Zotac NVIDIA Geforce RTX 2070 4.jpg\",\"Placa de Vídeo Zotac NVIDIA Geforce RTX 2070 3.jpg\",\"Placa de Vídeo Zotac NVIDIA Geforce RTX 2070 2.jpg\",\"Placa de Vídeo Zotac NVIDIA Geforce RTX 2070 1.jpg\"]', 'Uma novinha negra muito bunduda.', '[3,10,4,150,41]', 1, 1),
(4, 'Lena Paul', 1, 560, 4, 1, '[\"Placa de Vídeo Zotac NVIDIA GeForce RTX 2060 SUPER.jpg\",\"Placa de Vídeo Zotac NVIDIA GeForce RTX 2060 SUPER 5.jpg\",\"Placa de Vídeo Zotac NVIDIA GeForce RTX 2060 SUPER 4.jpg\",\"Placa de Vídeo Zotac NVIDIA GeForce RTX 2060 SUPER 3.jpg\",\"Placa de Vídeo Zotac NVIDIA GeForce RTX 2060 SUPER 2.jpg\",\"Placa de Vídeo Zotac NVIDIA GeForce RTX 2060 SUPER 1.jpg\"]', 'Uma novinha loira com olhar de mil rolas.', '[3,10,4,150,41]', 1, 1),
(5, 'Mia Khalifa', 1, 56, 5, 1, '[\"Placa de Vídeo Zotac NVIDIA GeForce GTX 1660 Ti.jpg\",\"Placa de Vídeo Zotac NVIDIA GeForce GTX 1660 Ti 5.jpg\",\"Placa de Vídeo Zotac NVIDIA GeForce GTX 1660 Ti 4.jpg\",\"Placa de Vídeo Zotac NVIDIA GeForce GTX 1660 Ti 3.jpg\",\"Placa de Vídeo Zotac NVIDIA GeForce GTX 1660 Ti 2.jpg\",\"Placa de Vídeo Zotac NVIDIA GeForce GTX 1660 Ti 1.jpg\"]', 'Uma libanesa siliconada muito gostosa.', '[3,10,4,150,41]', 1, 1),
(6, 'Riley Reid', 2, 1681, 6, 2, '[\"Placa de Vídeo Zotac NVIDIA GeForce GTX 1650.jpg\",\"Placa de Vídeo Zotac NVIDIA GeForce GTX 1650 5.jpg\",\"Placa de Vídeo Zotac NVIDIA GeForce GTX 1650 4.jpg\",\"Placa de Vídeo Zotac NVIDIA GeForce GTX 1650 3.jpg\",\"Placa de Vídeo Zotac NVIDIA GeForce GTX 1650 2.jpg\",\"Placa de Vídeo Zotac NVIDIA GeForce GTX 1650 1.jpg\"]', 'Uma novinha branquinha e tatuada.', '[3,10,4,150,41]', 1, 1),
(7, 'Sara Jay', 2, 718, 7, 2, '[\"Placa de Vídeo XFX AMD Radeon RX 590.jpg\",\"Placa de Vídeo XFX AMD Radeon RX 590 5.jpg\",\"Placa de Vídeo XFX AMD Radeon RX 590 4.jpg\",\"Placa de Vídeo XFX AMD Radeon RX 590 3.jpg\",\"Placa de Vídeo XFX AMD Radeon RX 590 2.jpg\",\"Placa de Vídeo XFX AMD Radeon RX 590 1.jpg\"]', 'Uma MILF loira muito gostosa.', '[3,10,4,150,41]', 1, 1),
(8, 'Angela White', 3, 884, 12, 2, '[\"Placa de Vídeo XFX AMD Radeon RX 580.jpg\",\"Placa de Vídeo XFX AMD Radeon RX 580 4.jpg\",\"Placa de Vídeo XFX AMD Radeon RX 580 3.jpg\",\"Placa de Vídeo XFX AMD Radeon RX 580 2.jpg\",\"Placa de Vídeo XFX AMD Radeon RX 580 1.jpg\"]', 'Uma MILF australiana branquinha peituda.', '[3,10,4,150,41]', 1, 1),
(9, 'Ava Addams', 3, 1317, 13, 2, '[\"Placa de Vídeo VGA Zotac NVIDIA GeForce RTX 2080 Ti.jpg\",\"Placa de Vídeo VGA Zotac NVIDIA GeForce RTX 2080 Ti 5.jpg\",\"Placa de Vídeo VGA Zotac NVIDIA GeForce RTX 2080 Ti 4.jpg\",\"Placa de Vídeo VGA Zotac NVIDIA GeForce RTX 2080 Ti 3.jpg\",\"Placa de Vídeo VGA Zotac NVIDIA GeForce RTX 2080 Ti 2.jpg\",\"Placa de Vídeo VGA Zotac NVIDIA GeForce RTX 2080 Ti 1.jpg\"]', 'Uma MILF com seios enormes naturais.', '[3,10,4,150,41]', 1, 1),
(10, 'Alexis Texas', 3, 960, 15, 2, '[\"Placa de Vídeo Sapphire Radeon RX 5700XT.jpg\",\"Placa de Vídeo Sapphire Radeon RX 5700XT 5.jpg\",\"Placa de Vídeo Sapphire Radeon RX 5700XT 4.jpg\",\"Placa de Vídeo Sapphire Radeon RX 5700XT 3.jpg\",\"Placa de Vídeo Sapphire Radeon RX 5700XT 2.jpg\",\"Placa de Vídeo Sapphire Radeon RX 5700XT 1.jpg\"]', 'Uma MILF loira com uma bunda enorme.', '[3,10,4,150,41]', 1, 1),
(11, 'Cory Chase', 1, 723, 16, 3, '[\"Placa de Vídeo Sapphire AMD Radeon RX 590.jpg\",\"Placa de Vídeo Sapphire AMD Radeon RX 590 4.jpg\",\"Placa de Vídeo Sapphire AMD Radeon RX 590 3.jpg\",\"Placa de Vídeo Sapphire AMD Radeon RX 590 2.jpg\",\"Placa de Vídeo Sapphire AMD Radeon RX 590 1.jpg\"]', 'Uma MILF loira magrinha que usa óculos.', '[3,10,4,150,41]', 1, 1),
(12, 'Brandi Love', 1, 1075, 17, 3, '[\"Placa de Vídeo Sapphire AMD PULSE RX 5700.jpg\",\"Placa de Vídeo Sapphire AMD PULSE RX 5700 4.jpg\",\"Placa de Vídeo Sapphire AMD PULSE RX 5700 3.jpg\",\"Placa de Vídeo Sapphire AMD PULSE RX 5700 2.jpg\",\"Placa de Vídeo Sapphire AMD PULSE RX 5700 1.jpg\"]', 'Uma MILF loira peituda e muito gostosa.', '[3,10,4,150,41]', 1, 1),
(13, 'Lisa Ann', 1, 1965, 18, 3, '[\"Placa de Vídeo PowerColor Red Dragon AMD Radeon RX 590.jpg\",\"Placa de Vídeo PowerColor Red Dragon AMD Radeon RX 590 4.jpg\",\"Placa de Vídeo PowerColor Red Dragon AMD Radeon RX 590 3.jpg\",\"Placa de Vídeo PowerColor Red Dragon AMD Radeon RX 590 2.jpg\",\"Placa de Vídeo PowerColor Red Dragon AMD Radeon RX 590 1.jpg\"]', 'Uma MILF morena cor de oliva siliconada.', '[3,10,4,150,41]', 1, 1),
(14, 'Piper Perri', 2, 609, 19, 3, '[\"Placa de Vídeo PowerColor Red Dragon AMD Radeon RX 550.jpg\",\"Placa de Vídeo PowerColor Red Dragon AMD Radeon RX 550 4.jpg\",\"Placa de Vídeo PowerColor Red Dragon AMD Radeon RX 550 3.jpg\",\"Placa de Vídeo PowerColor Red Dragon AMD Radeon RX 550 2.jpg\",\"Placa de Vídeo PowerColor Red Dragon AMD Radeon RX 550 1.jpg\"]', 'Uma loira branquinha bem pequena que faz muito anal.', '[3,10,4,150,41]', 1, 1),
(15, 'Diamond Jackson', 2, 387, 20, 3, '[\"Placa de Vídeo MSI NVIDIA GeForce GTX 1660.jpg\",\"Placa de Vídeo MSI NVIDIA GeForce GTX 1660 4.jpg\",\"Placa de Vídeo MSI NVIDIA GeForce GTX 1660 3.jpg\",\"Placa de Vídeo MSI NVIDIA GeForce GTX 1660 2.jpg\",\"Placa de Vídeo MSI NVIDIA GeForce GTX 1660 1.jpg\"]', 'Uma MILF negra muito gostosa.', '[3,10,4,150,41]', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int UNSIGNED NOT NULL,
  `nome_completo` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `data_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ultimo_login` timestamp NULL DEFAULT NULL,
  `status` enum('ativo','inativo') NOT NULL DEFAULT 'ativo',
  `nivel_acesso` enum('usuario','admin') NOT NULL DEFAULT 'usuario',
  `token_recuperacao_senha` varchar(255) DEFAULT NULL,
  `data_expiracao_token` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome_completo`, `email`, `senha`, `telefone`, `data_nascimento`, `data_registro`, `ultimo_login`, `status`, `nivel_acesso`, `token_recuperacao_senha`, `data_expiracao_token`) VALUES
(1, 'James Sunderland', 'james.sun@shill.com', '$2y$10$KbTTfeSxpeIfk6865cit6e8drO0Z.LCUG0K70r1BELNohWV3YgmHq', NULL, NULL, '2024-10-10 13:56:02', NULL, 'ativo', 'usuario', NULL, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `enderecos`
--
ALTER TABLE `enderecos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices de tabela `itens_pedido`
--
ALTER TABLE `itens_pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedido_id` (`pedido_id`),
  ADD KEY `produto_id` (`produto_id`);

--
-- Índices de tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `endereco_id` (`endereco_id`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `enderecos`
--
ALTER TABLE `enderecos`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `itens_pedido`
--
ALTER TABLE `itens_pedido`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `enderecos`
--
ALTER TABLE `enderecos`
  ADD CONSTRAINT `enderecos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `itens_pedido`
--
ALTER TABLE `itens_pedido`
  ADD CONSTRAINT `itens_pedido_ibfk_2` FOREIGN KEY (`produto_id`) REFERENCES `produto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `itens_pedido_pedido_id` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedido_endercos` FOREIGN KEY (`endereco_id`) REFERENCES `enderecos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
