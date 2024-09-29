-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Tempo de geração: 29/09/2024 às 15:00
-- Versão do servidor: 11.5.2-MariaDB-ubu2404
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
  `id` int(10) UNSIGNED NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `senha` varchar(100) NOT NULL
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
  `id` int(11) NOT NULL,
  `usuario_id` uuid NOT NULL,
  `tipo` enum('residencial','comercial','outro') NOT NULL DEFAULT 'residencial',
  `padrao` tinyint(1) NOT NULL DEFAULT 0,
  `nome` varchar(100) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `complemento` varchar(255) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `pais` varchar(50) NOT NULL DEFAULT 'Brasil'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `itens_pedido`
--

CREATE TABLE `itens_pedido` (
  `id` int(11) NOT NULL,
  `pedido_id` int(11) NOT NULL,
  `produto_id` uuid NOT NULL,
  `quantidade` int(11) NOT NULL,
  `preco_unitario` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `usuario_id` uuid NOT NULL,
  `endereco_id` int(11) NOT NULL,
  `data_pedido` timestamp NOT NULL DEFAULT current_timestamp(),
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `id` uuid NOT NULL DEFAULT uuid(),
  `modelo` varchar(30) NOT NULL,
  `categoria` int(11) NOT NULL,
  `preco_base` float NOT NULL,
  `desconto` int(11) NOT NULL,
  `fabricante` int(11) NOT NULL,
  `imagens` varchar(1000) NOT NULL DEFAULT '[]',
  `descricao` varchar(200) DEFAULT NULL,
  `notas` varchar(30) NOT NULL DEFAULT '[3,10,4,150,41]',
  `estoque` int(11) NOT NULL,
  `novo` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`id`, `modelo`, `categoria`, `preco_base`, `desconto`, `fabricante`, `imagens`, `descricao`, `notas`, `estoque`, `novo`) VALUES
('3110c473-7daa-11ef-85ad-0242ac120002', 'A MAIS MAIS', 3, 850.35, 15, 1, '[\"CAMAPET.jpg\",\"CAMAPET.jpg\",\"CAMAPET.jpg\",\"CAMAPET.jpg\",\"CAMAPET.jpg\",\"CAMAPET.jpg\",\"CAMAPET.jpg\"]', 'RAÇÃO DO AMOR PARA DOGS', '[1,16,5,175,197]', 34, 0),
('21221f1a-7100-11ef-8c90-0242ac120002', 'RTX 2070 super', 1, 1128, 0, 1, '[]', 'Uma boa placa antiga', '[3,10,4,150,41]', 1, 0),
('b5703113-71e2-11ef-969a-0242ac120002', 'RTX 1650 Super', 1, 1299.99, 12, 5, '[]', 'Placa de Vídeo GTX 1660 Super PCYes NVIDIA GeForce, 6GB GDDR6, 192 Bits, Full Size - PA1660S6GR6DF', '[3,10,4,150,41]', 97, 0),
('25dc4838-71e3-11ef-969a-0242ac120002', 'RTX 4060 Ti', 3, 2699.99, 12, 4, '[]', 'Placa de Vídeo RTX 4060 Ti VENTUS 3X 8G OC MSI NVIDIA GeForce, 8 GB GDDR6, DLSS, Ray Tracing', '[3,10,4,150,41]', 38, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` uuid NOT NULL DEFAULT uuid(),
  `nome_completo` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `data_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `ultimo_login` timestamp NULL DEFAULT NULL,
  `status` enum('ativo','inativo') NOT NULL DEFAULT 'ativo',
  `nivel_acesso` enum('usuario','admin') NOT NULL DEFAULT 'usuario',
  `token_recuperacao_senha` varchar(255) DEFAULT NULL,
  `data_expiracao_token` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome_completo`, `email`, `senha`, `telefone`, `data_nascimento`, `data_registro`, `ultimo_login`, `status`, `nivel_acesso`, `token_recuperacao_senha`, `data_expiracao_token`) VALUES
('78a0fad8-7b4e-11ef-b88e-0242ac120002', 'João Henrique Romero', 'romerocontato1@gmail.com', '$2y$10$Ia0Auhyy4dKcxZlY0KtEMedIpDFKowc0ZBitId0tlZrhbiD5sAybu', NULL, NULL, '2024-09-25 14:57:23', NULL, 'ativo', 'usuario', NULL, NULL);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `enderecos`
--
ALTER TABLE `enderecos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `itens_pedido`
--
ALTER TABLE `itens_pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  ADD CONSTRAINT `itens_pedido_ibfk_1` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `itens_pedido_ibfk_2` FOREIGN KEY (`produto_id`) REFERENCES `produto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`endereco_id`) REFERENCES `enderecos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
