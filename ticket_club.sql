-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 11/04/2020 às 12:01
-- Versão do servidor: 10.1.44-MariaDB-0ubuntu0.18.04.1
-- Versão do PHP: 7.2.24-0ubuntu0.18.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ticket_club`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `anuncios`
--

CREATE TABLE `anuncios` (
  `id_anuncio` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descricao` varchar(250) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `valor` varchar(15) DEFAULT NULL,
  `data_publicacao` datetime DEFAULT CURRENT_TIMESTAMP,
  `foto` varchar(200) NOT NULL,
  `data_evento` date NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `anuncios`
--

INSERT INTO `anuncios` (`id_anuncio`, `id_usuario`, `titulo`, `descricao`, `categoria`, `cidade`, `estado`, `valor`, `data_publicacao`, `foto`, `data_evento`, `status`) VALUES
(9, 73, 'Sunflower', 'Vendo ingressos físicos (a partir do primeiro lote) e online do show Sunflower - O Carnaval do Amor', 'Show, Musica e Festa', 'Belo Horizonte', 'Minas Gerais', '120,00', '2019-01-08 00:32:30', 'uploads/foto5c33ef9e74f0a3.88268883.jpeg', '0000-00-00', ''),
(10, 75, 'Sunflower', 'Ingressos físicos já disponíveis, todos os setores e entregamos à domicílio', 'Show, Musica e Festa', 'Belo Horizonte', 'Minas Gerais', '140,00', '2019-01-14 01:25:33', 'uploads/foto5c3be50dc49316.74306306.jpeg', '0000-00-00', ''),
(12, 79, 'Baile do Dennis', 'O maior baile do mundo no melhor carnaval de BH é o sonho virando realidade mais uma vez!\nYEAH, vem aí a super edição do BAILE DO DENNIS no Carnaval do Mirante.', 'Show, Musica e Festa', 'Belo Horizonte', 'MG', '130,00', '2019-01-14 02:32:49', 'uploads/foto5c3bf4d1a83d09.25196752.jpeg', '0000-00-00', ''),
(13, 82, 'BAILE DO DENNIS', 'Ingressos do Baile do Dennis, fisicos e link, entrego em casa', 'Show, Musica e Festa', 'Contagem', 'Minas gerais', '130,00', '2019-01-15 01:41:52', 'uploads/foto5c3d3a60b4b329.55522552.jpeg', '0000-00-00', ''),
(14, 89, 'SUNFLOWER', '2 INGRESSOS FEMININOS 140,00 CADA, FORAM COMPRADOS ONLINE PELA SYMPLA E FAZENDO A COMPRA SERA FEITA A TROCA DE TITULARIDADE', 'Show, Musica e Festa', 'Belo Horizonte', 'Minas Gerais', '140,00', '2019-01-21 18:26:12', 'uploads/foto5c460ec4cfdae9.44632206.jpeg', '0000-00-00', ''),
(19, 76, 'Sunflower', '???? 03 de março - 16h às 02h\r\n???? Mirante Beagá\r\n\r\n???? Atrações:\r\nVintage, Alan Walker, Fisher, DubDogz, Groove Delight, Bruno Be, Lothief\r\n\r\n???? INGRESSO FÍSICO e LINK\r\n• 180$\r\n• bit.ly/SunflowerGVL\r\n(evento não é open bar)', 'Show, Musica e Festa', 'Belo Horizonte', 'Minas Gerais', '180,00', '2019-02-08 14:26:05', 'uploads/foto5c5d917d74fbf2.59970374.jpeg', '0000-00-00', ''),
(20, 100, 'Camarotes Carnaval Salvador 2019', 'Vendo Camarotes em Salvador 2019.\r\nSábado (02/03) - Camarote Nana R$750,00\r\nDomingo (03/03) - Camarote Club R$650,00\r\nTerça (05/03) - Camarote Club R$650,00', 'Show, Musica e Festa', 'Salvador', 'Bahia', '2.050,00', '2019-02-11 14:28:18', 'uploads/foto5c6186826e4d64.04757660.jpeg', '0000-00-00', ''),
(23, 102, 'Bloco da Espuma - Ouro Preto - Open Bar', 'Ingresso bloco de espuma - Ouro Preto MG \r\nSábado de Carnaval - 02/03/2019 (15h as 22h) \r\nEvento Open Bar', 'Show, Musica e Festa', 'Ouro Preto', 'Minas Gerais', '80,00', '2019-02-20 02:08:26', 'uploads/foto5c6cb69a7aeaa5.58298906.jpeg', '0000-00-00', ''),
(25, 103, 'Na Farra - Ferrugem', 'A Na Farra tá com taaaanta saudade que chamou reforços para explodir a segunda-feira de carnaval no Carnaval do Mirante!\r\n\r\nChega aí Ferrugem, Felipe Araújo e Banda Eva!!!!', 'Show, Musica e Festa', 'BELO HORIZONTE', 'MG', '120,00', '2019-02-26 22:59:37', 'uploads/foto5c75c4d98d1c92.50156544.png', '0000-00-00', ''),
(26, 105, 'FESTA MINEIRINHA', 'festa mineirinha dia 06/04 na Maro #vemprobaile', 'Show, Musica e Festa', 'belo horizonte', 'minas gerais', '50,00', '2019-02-27 00:58:11', 'uploads/foto5c75e0a39e5a55.83078979.jpeg', '0000-00-00', ''),
(27, 106, 'Sunflower', 'Um ingresso masculino (meia entrada).', 'Show, Musica e Festa', 'Belo Horizonte', 'MG', '220,00', '2019-02-27 18:05:53', 'uploads/foto5c76d1818d8ce7.43373579.jpeg', '0000-00-00', ''),
(28, 107, 'Carnaval do mirante 2019', 'Passaporte feminino para os dias:\r\n02/03(Sábado)- Zé neto e Cristiano\r\n05/03(Terça) -Anitta', 'Show, Musica e Festa', 'Belo Horizonte', 'MG', '200,00', '2019-02-28 03:36:29', 'uploads/foto5c77573d2fdf30.59018835.jpeg', '0000-00-00', ''),
(29, 108, 'Welove carnaval', 'Gusttavo lima/ thiaguinho', 'Show, Musica e Festa', 'Belo horizonte', 'Minas Gerais', '300,00', '2019-02-28 14:56:37', 'uploads/foto5c77f6a51206d4.46972361.png', '0000-00-00', ''),
(30, 108, 'Welove carnaval', 'Terça feira', 'Show, Musica e Festa', 'Belo horizonte', 'Minas Gerais', '130,00', '2019-02-28 15:03:21', 'uploads/foto5c77f839b696a8.52960279.png', '0000-00-00', ''),
(31, 109, 'Gustavo lima e thiaguinho', 'Vendo rápido e mais barato', 'Show, Musica e Festa', 'Bh', 'Mg', '330,00', '2019-03-02 11:07:43', 'uploads/foto5c7a63ffd43fa2.50878401.jpeg', '0000-00-00', ''),
(32, 110, 'CAMAROTE PLATINUM VILLA MIX', 'Camarote exclusivo com open bar e open food premium\r\nOpen bar:\r\nCerveja Brahma, Vodka importada, Gin, Espumante, Energético, Whisky, Água de Coco, Refrigerante, Suco\r\n\r\n\r\nAcesso ao golden', 'Show, Musica e Festa', 'Belo Horizonte', 'Minas Gerais', '470,00', '2019-03-20 19:46:23', 'uploads/foto5c92988f58f224.69140300.jpeg', '0000-00-00', ''),
(33, 112, 'Unique X', 'Ingressos Unique X\nCódigo para compra Online: Gustavoparrolas', 'Show, Musica e Festa', 'Recife', 'Pernambuco', '160,00', '2019-03-25 04:15:14', 'uploads/foto5c9855fb708f95.98788790.jpeg', '0000-00-00', ''),
(35, 114, 'Feijoada com Samba 31/03 - Thiaguinho', 'Pista', 'Show, Musica e Festa', 'PORTO ALEGRE', 'Rio Grande do Sul', '200,00', '2019-03-26 18:31:52', 'uploads/foto5c9a70185be318.28804830.jpeg', '0000-00-00', ''),
(36, 115, 'Show do Los Hermanos em Fortaleza-CE', 'Show do Los Hermanos em Fortaleza-CE\r\nINGRESSO ARENA MEIA PRA O SHOW DO DIA 06 DE ABRIL', 'Show, Musica e Festa', 'Fortaleza', 'Ceará', '100,00', '2019-03-28 23:01:04', 'uploads/foto5c9d5230df4629.58796040.jpeg', '0000-00-00', ''),
(37, 116, 'Seu Vidal - Open Bar & Food', 'Vendo 02 ingresso para evento “Seu Vidal - O Poder do Bigode”, Open bar & Open food para sábado, 30/03.', 'Show, Musica e Festa', 'Rio de Janeiro', 'RJ', '350,00', '2019-03-29 11:36:41', 'uploads/foto5c9e03490d7f81.71168186.jpeg', '2019-03-30', ''),
(38, 117, 'Villamix Brasília', 'Vendo ingresso área prime, feminino', 'Show, Musica e Festa', 'Brasilia', 'Df', '220,00', '2019-03-30 12:21:23', 'uploads/foto5c9f5f437eb297.47695578.jpeg', '2019-05-04', ''),
(39, 118, 'Vendo ingressos malemolência. Entrego grátis e aceito cartão', 'Ingressos comigo. Entrego grátis e aceito cartão. A diferença vai ser enorme! Chega pra cá @pedrinhopegacao, vem fazer a Malemolência junto com @dynhoalves e @priscilasennaoficial dia 10 de maio no Catamaran\n#FestaMalemolência', 'Show, Musica e Festa', 'RECIFE', 'PERNAMBUCO', '50', '2019-03-31 02:40:28', 'uploads/foto5ca0289ce9a108.28129362.jpeg', '2019-05-10', ''),
(40, 57, 'XXXPERIENCE VIRADA DE LOTE EM BREVE', 'VALORES EXCLUSIVOS DO PRÉ LOTE\r\nAtrações já confirmadas:\r\n???? Cat Dealers, Illusionize, KVSH, Watergate, Neelix, Vegas vs Hi Profile, Ghost Rider\r\nMais atrações em breve', 'Show, Musica e Festa', 'Nova Lima', 'Minas Gerais', '90,00', '2019-04-02 14:16:15', 'uploads/foto5ca36ee0330593.39522863.jpeg', '2019-06-15', ''),
(43, 122, 'Festa MINEIRINHA - 06/04', 'Link com 11 reais de desconto para a festa Mineirinha!', 'Show, Musica e Festa', 'Belo Horizonte', 'Minas Gerais', '99,00', '2019-04-03 14:20:05', 'uploads/foto5ca4c115174cb2.16630262.jpeg', '0000-00-00', ''),
(45, 124, 'Party Hard Feminino', 'Ingresso Party Hard feminino', 'Show, Musica e Festa', 'Belo Horizonte', 'Minas Gerais', '67', '2019-04-04 16:38:10', 'uploads/foto5ca632f2090d82.24809644.jpeg', '0000-00-00', ''),
(46, 125, 'Aniversário Dome 2 Anos', 'Vendo 2 ingressos, preço de lançamento de Lote, R$ 60,00 cada, dia 13 de abril 2019, Mirante da Raja. Aniversário da Dome 2 anos.', 'Show, Musica e Festa', 'Belo Horizonte', 'Minas Gerais', '60,00', '2019-04-04 22:07:03', 'uploads/foto5ca680076afc67.09647054.jpeg', '0000-00-00', ''),
(47, 128, 'Tardezinha em Escarpas - Semana Santa', 'Vendo 02 ingressos pre lote femininos pro Tardezinha em\r\nEscarpas na semana santa. Ingresso sympla com troca de titularidade disponível.', 'Show, Musica e Festa', 'Escarpas - Capitólio', 'Minas Gerais', '165,00', '2019-04-06 11:43:14', 'uploads/foto5ca890d20ddca3.57098879.jpeg', '0000-00-00', ''),
(48, 130, 'Vendo House Paradise', 'Vendo Festa House Paradise em Divinópolis. Camarote R$ 100,00', 'Show, Musica e Festa', 'Divinópolis', 'Minas Gerais', '100,00', '2019-04-08 01:08:41', 'uploads/foto5caa9f19216033.22930622.jpeg', '2019-04-30', ''),
(49, 132, 'INGRESSO PARTY HARD FEM', 'Ingresso Party Hard (13/04) feminino', 'Show, Musica e Festa', 'Belo Horizonte', 'Minas Gerais', '60', '2019-04-08 16:08:46', 'uploads/foto5cab720e537968.34033471.png', '0000-00-00', ''),
(50, 137, '#ACÚSTICO BH', 'Costa Gold + Nova Ordem Bh + Única raiz e muito mais', 'Show, Musica e Festa', 'Bh', 'Mg', '35,00', '2019-04-11 19:36:54', 'uploads/foto5caf97568e4847.97055870.jpeg', '0000-00-00', ''),
(51, 82, 'Party Hard', 'Festa Party Hard\r\nVictoria 99349-3142', 'Congresso, Seminario', 'Contagem', 'MG', '80,00', '2019-04-12 13:23:16', 'uploads/foto5cb0914403ecc4.78052215.png', '0000-00-00', ''),
(52, 140, 'Samba Prime 2019', 'Samba Prime 2019: Vendo ingresso espaço samba por 60$ pagamento online e entrega online e 70$ no dinheiro com ponto de entrega\r\nMais info\r\n31.989344217', 'Show, Musica e Festa', 'Belo Horizonte', 'MG', '60', '2019-04-14 16:11:38', 'uploads/foto5cb35bfad59ed4.31135181.jpeg', '0000-00-00', ''),
(53, 142, 'Villa Mix brasilia', 'villa mix setor prime brasilia 2019', 'Show, Musica e Festa', 'brasilia', 'DF', '280,00', '2019-04-15 00:35:51', 'uploads/foto5cb3d1e787c225.22018244.jpeg', '2019-05-04', ''),
(54, 144, 'FESTIVAL BRASIL SERTANEJO', 'Somos uma empresa de bh e região,  entregamos ingresso em casa \r\nTemos setor : vip : 80$\r\nCamarote oficial : 170$\r\nFrontstage: 230$\r\n\r\nWpp: 31 991560774', 'Show, Musica e Festa', 'Belo horizonte', 'Minas gerais', '170,00', '2019-04-16 14:26:20', 'uploads/foto5cb5e60cf2a265.29799214.jpeg', '2019-05-06', ''),
(56, 146, 'Flowers Festival 2019', 'Meia entrada - 110,00', 'Show, Musica e Festa', 'Nova Lima', 'MG', '110,00', '2019-04-24 18:10:07', 'uploads/foto5cc0a67f31c364.56648604.jpeg', '2019-04-27', ''),
(57, 150, 'Ingresso FRONTSTAGE Flowers', '- Espaço reservado na frente do mainstage\r\n- Bares e banheiros exclusivos\r\n- Acesso ao setor pista\r\n- Lembrando que os ingressos frontstage estão ESGOTADOS, não perca a chance de adquirir o seu', 'Show, Musica e Festa', 'Nova Lima', 'MG', '160,00', '2019-04-27 16:39:12', 'uploads/foto5cc485b0739009.61775860.jpeg', '2019-04-27', 'f'),
(58, 150, 'Ingresso FRONTSTAGE Flowers (meia entrada)', 'Ingresso meia entrada por R$160,00', 'Show, Musica e Festa', 'Nova Lima', 'MG', '160,00', '2019-04-27 16:39:14', 'uploads/foto5cc48651ecc948.98557980.jpeg', '2019-04-27', ''),
(59, 151, 'House Paradise', 'Dois camarotes R$ 120,00 cada.', 'Show, Musica e Festa', 'Divinopolis', 'MG', '230,00', '2019-04-30 12:55:49', 'uploads/foto5cc845d5d4b801.65231366.jpeg', '2019-04-30', ''),
(60, 140, 'Samba Prime 2019', 'Samba Prime 2019: Vendo ingressos do espaço samba, pagamento online e entrega online pelo preço de 60$\r\npagamento no dinheiro com ponto de entrega pelo preço de 70$,  alteração de preço não será informado com antecedencia\r\nEntrar em contato com Gabri', 'Show, Musica e Festa', 'Belo Horizonte', 'MG', '60', '2019-05-06 16:13:20', 'uploads/foto5cd05d20e29789.90365047.jpeg', '2019-05-25', ''),
(61, 152, 'XXXPERIENCE Festival', 'vendo 2 ingressos - pista/masculino (100$ cada)', 'Show, Musica e Festa', 'Nova Lima', 'MG', '100,00', '2019-05-06 23:01:30', 'uploads/foto5cd0bcca5eb251.97195812.jpeg', '2019-06-15', ''),
(62, 57, 'Vendo ingresso festival brasil sertanejo mais barato', '• Vip 70,00\r\n• Oficial (open bar) 150,00', 'Show, Musica e Festa', 'bh', 'MG', '70,00', '2019-05-07 18:24:33', 'uploads/foto5cd1cd613ff984.14477898.jpeg', '2019-05-13', 'v'),
(63, 57, 'Ingresso festival brasil sertanejo FrontStage', 'FrontStage (open bar premium) 220,00', 'Show, Musica e Festa', 'BH', 'MG', '215,00', '2019-05-07 18:25:56', 'uploads/foto5cd1cdb4d70cd2.51898890.jpeg', '2019-05-13', 'v'),
(64, 154, 'los hermanos - Pepsi OnStage', '2 ingressos para show los hermanos - porto alegre.\r\nMezanino meia entrada LT2 - 11 de Maio 2019.', 'Show, Musica e Festa', 'porto alegre', 'RS', '480,00', '2019-05-09 02:43:38', 'uploads/foto5cd393dac5b232.55771764.jpeg', '2019-05-11', ''),
(65, 155, 'Festival sertanejo camarote oficial masculino', 'Festival sertanejo camarote oficial open bar', 'Show, Musica e Festa', 'Belo Horizonte', 'MG', '150,00', '2019-05-11 13:39:41', 'uploads/foto5cd6d09d6c72d5.61038382.jpeg', '2019-05-11', ''),
(66, 161, 'FESTA KRIOK', 'Festa KRIOK no Marô Sexta dia 17/05', 'Show, Musica e Festa', 'Belo Horizonte', 'MG', '80,00', '2019-05-15 17:43:44', 'uploads/foto5cdc4fd0b2d153.07562687.jpeg', '2019-05-17', ''),
(67, 120, 'Gravação DVD Banda Eva', 'Vendo QUATRO ingressos para a gravação do DVD da Banda Eva, que acontece hoje, às 16h, no Mirante BH.', 'Show, Musica e Festa', 'Belo Horizonte', 'MG', '90,00', '2019-05-18 13:49:02', 'uploads/foto5ce00d4e6e3533.79448983.png', '2019-05-18', ''),
(68, 164, 'Recepção Arapuca', 'Chamar wpp pra combinar entrega!', 'Show, Musica e Festa', 'Lavras', 'MG', '100,00', '2019-05-21 00:01:41', 'uploads/foto5ce33fe523d806.44237718.png', '2019-10-19', ''),
(69, 59, 'Paula Toller - palácio das artes', 'Paula Toller | palácio das artes\r\n\r\nPlateia 2\r\n\r\nEntrar em contato com Pedro Mercini 31995557798', 'Show, Musica e Festa', 'Belo Horizonte', 'MG', '150,00', '2019-05-24 16:25:44', 'uploads/foto5ce81b087ef417.52918088.png', '2019-05-25', ''),
(70, 59, 'Samba prime', 'Vendo 2 ingressos espaço samba do samba.\r\nOs dois por 100 reais.\r\nContato Pedro Mercini 31 995557798', 'Show, Musica e Festa', 'Belo Horizonte', 'MG', '100,00', '2019-05-24 22:17:16', 'uploads/foto5ce86d6c45cca9.48254125.png', '2019-05-25', ''),
(71, 166, 'Mandarim', '1 ingresso fem 500$\r\n1 ingresso masc 750$', 'Show, Musica e Festa', 'Belo Horizonte', 'MG', '750,00', '2019-06-01 16:48:44', 'uploads/foto5cf2ac6ca4b8f0.74081856.jpeg', '2019-06-01', ''),
(72, 101, 'Funeral da Porca', 'Ingresso físico masculino para o funeral da porca dia 10/08/2019 em Itaúna-MG', 'Show, Musica e Festa', 'Itaúna', 'MG', '270,00', '2019-06-08 18:08:16', 'uploads/foto5cfbf9900cb2a4.85262715.jpeg', '2019-08-10', ''),
(73, 169, 'show sandy e junior', 'vendo um ingresso do show de lançamento em sp 24/08 pista vamo pular', 'Show, Musica e Festa', 'São Paulo', 'SP', '400,00', '2019-06-16 15:31:56', 'uploads/foto5d06611d890db7.64236467.jpeg', '0000-00-00', ''),
(74, 169, 'show sandy e junior', 'vendo um ingresso do show do sandy e junior.\n24/08\npista vamos pular', 'Show, Musica e Festa', 'São Paulo', 'SP', '400,00', '2019-06-17 23:25:24', 'uploads/foto5d082164b57717.24135722.jpeg', '2019-08-24', 'v'),
(75, 57, 'PANDORA FESTIVAL', '20 de julho | Mineirão | 14h,\r\nFront Stage: R$ 100,00', 'Show, Musica e Festa', 'BH', 'MG', '100,00', '2019-06-20 13:56:18', 'uploads/foto5d0b90823be205.85098004.png', '2019-07-10', ''),
(76, 170, 'Kart betim', 'Ingressos para ir ao kart em betim qualquer dia da semana', 'Espotivo', 'Betim', 'MG', '80,00', '2019-06-21 22:09:04', 'uploads/foto5d0d55803df912.26889100.jpeg', '2019-07-31', ''),
(77, 171, 'SANDY E JUNIOR - TURNÊ \"NOSSA HISTÓRIA\" - CURITIBA', 'Setor: Pista\r\nMeia estudante', 'Show, Musica e Festa', 'Curitiba', 'PR', '135,00', '2019-06-22 21:19:53', 'uploads/foto5d0e9b7995ee01.31997293.jpeg', '2019-08-31', ''),
(78, 173, 'Ingresso MEIA-ENTRADA - Rock In Rio (Bon Jovi + Jessie J)', '29 | 09\r\n\r\nBON JOVI 29|09 • PALCO MUNDO\r\nDAVE MATTHEWS BAND 29|09 • PALCO MUNDO\r\nGOO GOO DOLLS 29|09 • PALCO MUNDO\r\nIVETE SANGALO 29|09 • PALCO MUNDO\r\nJESSIE J + IZA & ALCIONE + ELZA SOARES + KELL SMITH', 'Show, Musica e Festa', 'Rio de Janeiro', 'RJ', '500,00', '2019-06-26 22:07:41', 'uploads/foto5d13ecad6d00f6.31452102.jpeg', '2019-09-29', ''),
(79, 175, 'Rock in Rio 06/10 - Inteira', 'Ingresso inteira para os shows do dia 06/10\r\n-Muse\r\n-Imagine Dragons\r\n- Nickelback\r\n-Os Paralamas do Sucesso', 'Show, Musica e Festa', 'Rio de Janeiro', 'RJ', '800,00', '2019-06-27 18:28:47', 'uploads/foto5d150adfb12e22.31293552.png', '2019-10-06', ''),
(80, 176, 'Ingresso Pandora', 'Ingresso feminino Frontstage + óculos', 'Show, Musica e Festa', 'Belo Horizonte', 'MG', '90,00', '2019-06-27 23:49:29', 'uploads/foto5d155609ce07b0.26363693.jpeg', '2019-07-20', ''),
(81, 177, 'BRASIL vs ARGENTINA', 'Vendo ingresso para jogo entre BRASIL e ARGENTINA dia 02/07/2019 estádio Mineirão em BH', 'Espotivo', 'Belo Horizonte', 'MG', '370,00', '2019-07-02 00:52:02', 'uploads/foto5d1aaab2039b36.10325037.jpeg', '2019-07-02', ''),
(82, 178, 'Festa Vitrine - Thiaguinho', 'Ingresso área VIP', 'Show, Musica e Festa', 'Conselheiro Lafaiete', 'MG', '45,00', '2019-07-05 15:48:58', 'uploads/foto5d1f716a01fd28.64773375.jpeg', '2019-07-06', ''),
(83, 179, 'Igresso Rock in Rio 2019', '- 2 (dois) ingressos MEIA para o Rock in Rio\r\n- Dia 6 de outubro de 2019\r\n- Muse / Imagine Dragons / Nickelback / Os Paralamas do Sucesso\r\n- R$300,00 (cada)', 'Show, Musica e Festa', 'Rio de Janeiro', 'RJ', '600,00', '2019-07-08 17:37:00', 'uploads/foto5d237f3bf41b91.10727279.jpeg', '2019-10-06', ''),
(84, 180, 'Ingresso Sandy e Jr Fortaleza', 'Vendo ingresso do show Sandy e Jr pista', 'Show, Musica e Festa', 'Teresina', 'PI', '250,00', '2019-07-09 00:12:13', 'uploads/foto5d23dbdd7e7ed1.62841139.jpeg', '2019-07-19', ''),
(85, 182, 'Show SANDY E JÚNIOR-BH', 'Vendo 2 ingressos pista-inteira  pro show de Sandy e Júnior em BH dia 17/08. Preço do site.', 'Show, Musica e Festa', 'Belo Horizonte', 'MG', '322,00', '2019-07-11 11:38:32', 'uploads/foto5d271fb839e848.52701216.jpeg', '2019-08-17', ''),
(86, 124, 'Pandora', 'Ingresso feminino + óculos', 'Show, Musica e Festa', 'Belo Horizonte', 'MG', '70', '2019-07-17 19:30:06', 'uploads/foto5d2f773e1937f3.11874622.jpeg', '2019-07-20', ''),
(87, 183, 'Sandy e junior POA', 'Cadeira superior meia entrada', 'Show, Musica e Festa', 'Porto Alegre', 'RS', '109,00', '2019-07-19 03:19:24', 'uploads/foto5d3136bc3ff509.93566138.jpeg', '2019-09-21', ''),
(88, 185, 'Sandy e Junior - Turnê \"Nossa História\" - Belo Horizonte', 'Setor: Pista Meia Estudante | Vamô Pulá', 'Show, Musica e Festa', 'BELO HORIZONTE', 'MG', '300,00', '2019-08-05 19:35:38', 'uploads/foto5d48850a8539e4.71792180.jpeg', '2019-08-17', ''),
(89, 186, 'Ingresso SHOW Sandy & Junior SP', 'Cadeira inferior \r\nSetor A Turu turo (inteira)', 'Show, Musica e Festa', 'São Paulo', 'SP', '380,00', '2019-08-06 10:29:28', 'uploads/foto5d495688a59b68.70979162.jpeg', '2019-08-25', ''),
(90, 187, 'Nicoloco', 'Vendo dois ingressos (passaporte, unissex)', 'Show, Musica e Festa', 'Viçosa', 'MG', '110,00', '2019-08-08 21:08:49', 'uploads/foto5d4c8f614945a4.22742343.jpeg', '2019-09-13', ''),
(91, 188, 'Puta farra', 'Festa land', 'Show, Musica e Festa', 'Belo Horizonte', 'MG', '77', '2019-08-10 23:57:03', 'uploads/foto5d4f59cf7970b0.89871952.jpeg', '2019-08-10', ''),
(92, 189, 'Sandy e Júnior Turnê Nossa História BH', 'Vendo ingresso pro show do Sandy e Junior', 'Show, Musica e Festa', 'Belo Horizonte', 'MG', '460,00', '2019-08-12 16:56:08', 'uploads/foto5d519a28574246.94502865.jpeg', '2019-08-17', ''),
(93, 190, 'Ingresso Pista Show Sandy e Júnior - BH', 'Vendo 1 ingresso, pista, inteira, para show de Sandy E Júnior em Belo Horizonte', 'Show, Musica e Festa', 'Belo Horizonte', 'MG', '280,00', '2019-08-15 19:07:15', 'uploads/foto5d55ad63538187.36563176.jpeg', '2019-08-17', 'v'),
(94, 192, 'Alliance 2019', 'Ingresso primeiro lote da Alliance 2019,', 'Show, Musica e Festa', 'Belo Horizonte', 'MG', '85,00', '2019-09-19 16:13:00', 'uploads/foto5d83a90cf31e71.73179028.jpeg', '2019-10-19', ''),
(95, 61, 'Ingresso Masc Party Hard', 'Ingresso masculino da party hard', 'Show, Musica e Festa', 'Belo Horizonte', 'MG', '80', '2019-09-20 22:36:51', 'uploads/foto5d8554838bdf15.21808434.jpeg', '2019-09-21', ''),
(96, 57, 'teste', 'teste', 'Congresso, Seminario', 'bh', 'MG', '200,00', '2019-10-11 12:55:32', 'uploads/foto5da07bc4cbe4f0.09757066.png', '2019-10-11', 'f'),
(97, 57, 'Procuro Planeta Brasil', 'lotes anteriores masculino', 'Show, Musica e Festa', 'bh', 'MG', '300,00', '2020-01-14 00:49:42', 'uploads/foto5e1d10265809e7.26959607.jpeg', '2020-01-25', ''),
(98, 196, 'Carnaval do Mirante - Baile do Dennis DJ', '1 ingresso meia entrada social.', 'Show, Musica e Festa', 'Belo Horizonte', 'MG', '200,00', '2020-02-18 15:25:01', 'uploads/foto5e4c01cd76bcd6.15412712.jpeg', '2020-02-21', ''),
(99, 59, 'Vendo we love carnaval: 23/03', 'Vendo we love carnaval: domingo, Cláudia leite e turma do pagode por 100 reais', 'Show, Musica e Festa', 'Belo Horizonte', 'MG', '100,00', '2020-02-22 04:14:40', 'uploads/foto5e50aab09be257.84012403.png', '2020-02-23', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastro`
--

CREATE TABLE `cadastro` (
  `id_cadastro` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `apelido` varchar(20) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `sexo` char(1) NOT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `wpp` char(1) DEFAULT NULL,
  `cidade` varchar(30) DEFAULT NULL,
  `estado` varchar(30) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `complemento` varchar(30) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT CURRENT_TIMESTAMP,
  `numero` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `cadastro`
--

INSERT INTO `cadastro` (`id_cadastro`, `id_usuario`, `nome`, `apelido`, `cpf`, `sexo`, `celular`, `wpp`, `cidade`, `estado`, `cep`, `complemento`, `data_cadastro`, `numero`) VALUES
(22, 60, 'Gabriel', 'Gama', '111.111.111-11', 'M', '(31) 11111-1111', 'S', '', '', '', '', '2018-12-05 01:43:06', 0),
(29, 57, 'BRENNER SILVA CUNHA', 'bre', '118.590.056-08', 'M', '(31) 98377-6219', 'S', 'Ibirité', 'MG', '32400-000', '', '2018-12-06 01:29:53', 0),
(30, 64, 'Leandro de Oliveira Felisberto', 'Léo', '138.475.396-63', 'M', '(31) 99745-0041', 'S', 'Sabara ', 'Minas Gerais ', '34710-170', 'Apto 301', '2018-12-06 01:36:53', 60),
(31, 65, 'Caio Dutra', 'Caio.espindula', '086.773.836-70', 'M', '(31) 99183-6493', 'S', 'belo horizonte', 'Minas gerais', '30620-070', 'apto. 902', '2018-12-06 13:09:28', 123),
(32, 67, 'Lucas de Souza Neri Rodrigues ', 'Lucas', '018.674.836-10', 'M', '(31) 99230-3146', 'S', 'Belo Horizonte', 'Minas Gerais', '30520-230', '', '2018-12-19 01:41:41', 263),
(33, 68, 'TATILA NATHALIA DE SOUZA SANTANA', 'Tátila', '132.550.716-40', 'F', '(31) 99123-7570', 'S', 'Belo Horizonte', 'MG', '31535500', '', '2018-12-21 19:40:37', 74),
(34, 71, 'Rhelen Cristina Soares Silva ', 'Rhelen ', '118.150.566-65', 'F', '(31) 97557-4361', 'S', '', '', '', '', '2019-01-06 03:39:26', 0),
(35, 73, 'Julia Nicole', 'Ju', '019.241.486-09', 'F', '(31) 98588-5877', 'S', '', '', '', '', '2019-01-08 00:30:29', 0),
(36, 72, 'LUIS Eduardo Gonçalves de Paula', 'Luisdepaula', '152.309.066-93', 'M', '(31) 99775-1308', 'S', 'Nova Lima', 'Minas Gerais', '34003-090', 'Apto 403 BL B', '2019-01-09 22:05:18', 184),
(37, 75, 'Fernando César Alves ', 'Chaves ', '174.295.456-10', 'M', '(31) 99874-5240', 'S', 'Belo Horizonte', 'Minas Gerais', '31540-10', 'Ao lado da igreja', '2019-01-14 01:20:44', 7),
(38, 76, 'Laura Costa', 'Lau', '127.713.746-33', 'F', '(31) 98385-5966', 'S', '', '', '', '', '2019-01-14 01:20:55', 0),
(39, 78, 'Bruna Andrade Costa Guerra', 'Bruna', '115.749.976-70', 'F', '(31) 97533-6737', 'S', 'Belo Horizonte', 'Minas Gerais', '97533-673', '', '2019-01-14 01:31:40', 244),
(40, 79, 'Bethania Fonseca Duarte', 'Beth ', '013.872.936-05', 'F', '(31) 99641-0132', 'S', 'Belo Horizonte ', 'MG', '30535-610', 'B', '2019-01-14 02:25:20', 303),
(41, 82, 'Victória Barcelos', 'Vic Barcelos', '124.969.506-74', 'F', '(31) 99349-3142', 'S', 'Contagem', 'Minas Gerais', '32310-520', 'ap 404', '2019-01-15 01:30:45', 1179),
(42, 88, 'Mateus Guilherme Souza Rodrigues', 'Theus Rodrigues', '023.004.906-09', 'M', '(31) 98344-1577', 'S', 'Belo Horizonte', 'Minas Gerais', '31535-250', 'Casa', '2019-01-20 22:26:55', 190),
(43, 89, 'Carolina', 'Carol', '150.378.966-73', 'F', '(31) 98969-6624', 'S', 'Contagem', 'Minas Gerais', '', '', '2019-01-21 18:14:58', 0),
(44, 92, 'Matheus Felipe ', 'Matheus ', '121.095.636-56', 'M', '(31) 99476-6687', 'S', '', '', '', '', '2019-01-23 19:52:01', 0),
(45, 94, 'Guilherme dias', 'Gui', '126.425.676-50', 'M', '(31) 99567-0071', 'S', 'Contagem', 'Mg', '32180-710', 'Casa', '2019-01-24 12:14:58', 91),
(46, 98, 'Washington Neri', 'Xitão', '121.410.746-06', 'M', '(31) 99400-9873', 'S', 'Belo Horizonte ', 'MG', '30520-230', '', '2019-02-07 16:13:37', 263),
(47, 99, 'Jacqueline Bravos Bitencourt ', 'Jacque', '06.273.546-85', 'F', '(31) 98814-5315', 'S', 'Conselheiro Lafaiete ', 'Minas Gerais ', '36401-183', '', '2019-02-08 17:48:23', 0),
(48, 100, 'Tamara Faleiro Fernandes de Souza ', 'Tamara', '082.147.736-60', 'F', '(31) 98769-3269', 'S', '', '', '', '', '2019-02-11 14:24:35', 0),
(49, 101, 'Brenda', 'Brenda', '130.603.426-44', 'F', '(37) 99994-8288', 'S', '', '', '', '', '2019-02-12 21:22:11', 0),
(50, 102, 'Sávio Dinis ', 'Sávio ', '143.636.806-52', 'M', '(31) 97140-0207', '', 'Contagem ', 'Minas Gerais ', '', '', '2019-02-20 02:05:10', 0),
(51, 103, 'Bruna Ubaldo de Castro e Silva', 'Bruna ', '113.497.636-40', 'F', '(31) 99396-9779', 'S', '', '', '', '', '2019-02-26 22:55:48', 0),
(52, 105, 'Isabela Marins de Carvalho ', 'Bela', '072.209.836-70', 'F', '(31) 99585-1767', 'S', 'belo horizonte', 'minas gerais', '30310-770', '1502', '2019-02-27 00:52:02', 127),
(53, 106, 'ALVARO HONORATO AMARAL', 'alvin', '023.276.486-70', 'M', '(31) 99680-6535', 'S', 'CONTAGEM', 'MG', '32241-080', '', '2019-02-27 17:47:41', 207),
(54, 107, 'Joana Melgaço de Souza Campos', 'Joana Campos', '018.312.686-63', 'F', '(31) 99590-8535', 'S', '', '', '', '', '2019-02-28 03:32:43', 0),
(55, 108, 'Vinicius de oliveira rodrigues', 'Vinicius', '116.684.866-36', 'M', '(31) 99917-4720', 'S', 'Aimores', 'Minas Gerais', '30140-072', 'Restaurante', '2019-02-28 14:35:22', 1912),
(56, 109, 'Bruna', 'Bruna', '113.077.026-80', 'F', '(31) 99402-5556', 'S', '', '', '', '', '2019-03-02 11:02:17', 0),
(57, 110, 'Larissa Lima ', 'Lari ', '128.246.286-50', 'F', '(31) 98553-2409', 'S', '', '', '', '', '2019-03-20 19:43:05', 0),
(58, 112, 'Luis gustavo parrolas', 'Gustavo Parrolas', '089.565.344-38', 'M', '(81) 99935-0787', 'S', 'Rua jornalista alfredo porto s', 'PE', '51130-310', 'Apto 401', '2019-03-25 04:12:55', 689),
(59, 113, 'Daniel Brito de Oliveira Silva', 'Dan', '070.989.245-47', 'M', '(77) 98165-5700', 'S', 'Vitória da Conquista ', 'Bahia', '45077-014', 'Sobrado', '2019-03-26 01:45:35', 27),
(60, 114, 'Lucas Viliano Gue', 'Gue', '032.106.380-55', 'M', '(51) 98626-1474', '', 'Canoas', 'RS', '92310-530', '', '2019-03-26 18:28:55', 1664),
(61, 115, 'Ana flávia soares rêgo ', 'Ana flavia', '019.493.533-24', 'F', '(86) 98821-3698', 'S', 'Rua rio grande do sul', 'Piaui', '64001-550', 'Apto 603', '2019-03-28 22:57:57', 130),
(62, 116, 'Vinicius Feher', 'Vini', '015.602.141-20', 'M', '(21) 99977-0615', '', 'Rio de Janeiro', 'RJ', '22030-001', '301', '2019-03-29 11:08:02', 211),
(63, 117, 'Jessica Julielle da Silva ', 'Julielle ', '113.343.676-55', 'F', '(38) 99939-4593', 'S', 'Unaí', 'Minas Gerais', '38613-121', '', '2019-03-30 12:15:06', 286),
(64, 118, 'José Vinicius Lima Leal', 'Vinícius Leal', '107.637.304-67', 'M', '(81) 99808-0754', 'S', 'Rua do Sossego ', 'PERNAMBUCO', '50050-080', '', '2019-03-31 02:36:24', 253),
(65, 120, 'Pedro Antônio Gontijo Malard', 'Pedrinho', '130.388.746-04', 'M', '(31) 99402-1831', 'S', 'Rua Viçosa', 'Minas Gerais', '30330-160', '103', '2019-04-02 16:03:10', 215),
(66, 121, 'Rogerio Dante Macedo', 'Junior', '067.684.446-46', 'M', '(31) 99232-7161', 'S', 'BH', 'MG', '30830-130', 'A', '2019-04-03 03:10:11', 270),
(67, 122, 'Barbara Santos Nonaka', 'Babi', '062.861.166-80', 'F', '(31) 98491-9500', 'S', 'Belo Horizonte', 'Minas Gerais', '', '', '2019-04-03 14:15:43', 0),
(68, 123, 'Cleverson Luiz S Oliveira', 'Junior', '102.362.597-09', 'M', '(21) 97986-8555', 'S', 'Rua Nestor', 'Rio de Janeiro', '23515-170', 'Casa 04', '2019-04-04 15:08:43', 700),
(69, 124, 'Cinthya Rodrigues ', 'Tintia', '115.396.556-95', 'F', '(31) 99692-9067', 'S', 'Rua doutor Edmundo Bittencourt', 'Minas Gerais ', '32235-400', 'Casa', '2019-04-04 16:36:13', 93),
(70, 125, 'Daniel Matheus Soares Santos Viana', 'Danielmatheuss ', '119.566.866-06', 'M', '(31) 99200-2875', 'S', 'Belo Horizonte ', 'Minas Geraus ', '30662-460', '', '2019-04-04 22:05:13', 480),
(71, 127, 'Raphaela Cristina Dias Nascimento ', 'Rapha ', '021.919.506-47', 'F', '(31) 99747-5958', 'S', 'Nova Lima ', 'Minas Gerais ', '34004-865', '', '2019-04-06 11:26:47', 322),
(72, 128, 'Cinthia Corrêa ', 'Cinthia', '098.140.486-31', 'F', '(31) 99923-4758', 'S', 'Belo Horizonte ', 'Minas Gerais ', '30411-164', '', '2019-04-06 11:40:22', 135),
(73, 130, 'Izabelle Christine Vieira', 'Belle', '092.658.766-89', 'F', '(31) 99988-2669', 'S', 'Rua João Gualberto Filho ', 'Minas Gerais', '31035-570', '202', '2019-04-08 01:06:37', 1202),
(74, 132, 'Maria Eduarda Maciel', 'Duda ', '141.279.406-40', 'F', '(31) 99664-1255', 'S', 'Belo Horizonte', 'Minas Gerais', '30660-050', '', '2019-04-08 16:05:43', 200),
(75, 134, 'Rafaela Santos de Oliveira', 'Rafaela', '854.512.585-20', 'F', '(71) 98508-5560', 'S', 'Salvador ', 'Bahia', '41295-685', '', '2019-04-08 21:54:45', 35),
(76, 137, 'Gustavo Pinheiro lisner ', 'Niko', '084.570.996-80', 'M', '(31) 99330-2156', '', 'Belo Horizonte ', 'Mg', '31010-220', '', '2019-04-11 19:34:03', 630),
(77, 138, 'Guilherme Ferreira souza', 'Gui souza', '122.887.126-43', 'M', '(31) 98741-2113', 'S', 'Belo Horizonte', 'Minas gerais', '31842-320', '', '2019-04-12 19:32:13', 200),
(78, 140, 'Gabriel Dutra Gomes', 'Dutra', '703.522.806-38', 'M', '(31) 99834-4217', 'S', 'Belo Horizonte', 'MG', '31060-480', 'Casa', '2019-04-14 16:08:46', 129),
(79, 142, 'Lorena Medeiros', 'lo.medeiros', '077.174.091-35', 'F', '(61) 99808-1337', 'S', 'Brasilia', 'DF', '72006-070', '', '2019-04-15 00:13:04', 13),
(80, 143, 'Beatriz Siqueira Campos', 'Beatriz', '133.506.706-01', 'F', '(31) 99984-1417', '', 'Belo horizonte', 'Minas Gerais', '30315-540', '', '2019-04-16 12:20:30', 0),
(81, 144, 'Daniel viana da cruz ', 'Dani', '144.623.416-94', 'M', '(31) 99156-0774', 'S', 'Nova lima', 'Minas gerais', '34012-544', 'Casa', '2019-04-16 14:22:14', 37),
(82, 146, 'Frederico Henriques Neves', 'Fred', '098.747.016-76', 'M', '(37) 98801-0075', 'S', 'Divinópolis', 'MG', '35500-555', '102', '2019-04-24 18:06:54', 161),
(83, 150, 'Rafaela Andrade Aleixo', 'Rafa', '098.194.236-94', 'F', '(31) 98877-4005', 'S', 'Belo Horizonte', 'MG', '', '', '2019-04-27 16:33:42', 0),
(84, 151, 'Bruna Ribeiro', 'Bruninha', '129.240.686-88', 'F', '(38) 99804-5008', 'S', 'Belo Horizonte', 'MG', '', '', '2019-04-30 12:50:58', 0),
(85, 152, 'Lorrayne Anacleto Silva', 'Lorrayne', '136.241.426-31', 'F', '(31) 99164-3037', 'S', 'Belo Horizonte', 'MG', '', '', '2019-05-06 22:57:58', 0),
(86, 154, 'alexandre lee', 'lee', '630.427.380-00', 'M', '(11) 95134-9000', 'S', 'barueri', 'SP', '06414-000', 'torre 16 ap 03', '2019-05-09 02:32:32', 429),
(87, 155, 'Deyse Tatiane dos Santos', 'Tati', '102.737.226-03', 'F', '(31) 99173-5571', 'S', 'Belo Horizonte', 'MG', '30750-552', '302', '2019-05-11 13:32:24', 2110),
(88, 160, 'João Pedro Alcântara Gonçalves', 'João Pedro', '018.513.926-45', 'M', '(31) 33330-177', 'S', 'Belo Horizonte', 'MG', '30520-250', 'casa', '2019-05-15 02:21:05', 303),
(89, 161, 'Vitor Tadeu', 'Vitor', '118.607.936-30', 'M', '(31) 98374-8787', 'S', 'Belo Horizonte', 'MG', '30330-390', 'Casa', '2019-05-15 17:40:12', 40),
(90, 163, 'Jose Daniel Reis de Almeida', 'jose', '099.992.856-27', 'M', '(31) 99398-2971', 'S', 'rua caracol', 'MG', '30310-780', '302', '2019-05-18 04:46:51', 100),
(91, 164, 'Letícia Oliveira', 'Restart', '125.924.076-26', 'F', '(37) 99830-7524', 'S', 'Arcos/Divinópolis', 'MG', '35500-001', '', '2019-05-20 23:56:24', 0),
(92, 59, 'Pedro Mercini', 'Pedro', '108.080.386-64', 'M', '(31) 99555-7798', '', 'Belo Horizonte', 'MG', '31140-040', '141', '2019-05-24 16:13:43', 141),
(93, 166, 'Júnior', 'Dutra', '124.204.126-56', 'M', '(38) 98811-1456', 'S', 'Belo Horizonte', 'MG', '30310-160', 'Ap 401', '2019-06-01 16:45:38', 435),
(94, 167, 'Paula mansur', 'Paula', '116.857.306-80', 'F', '(31) 97501-3291', 'S', 'Rua Francisco da Veiga, Belo H', 'MG', '30720-490', '301', '2019-06-06 00:55:57', 499),
(95, 168, 'Marco Antônio dos Santos', 'Marco Antônio', '740.820.788-00', 'M', '(31) 99744-5169', '', 'Lagoa Santa', 'MG', '33400-000', 'CASA', '2019-06-16 06:49:45', 195),
(96, 169, 'Thais Nakamura', 'thais', '318.622.778-00', 'F', '(11) 99108-6043', '', 'São Paulo', 'SP', '05711-001', '', '2019-06-16 15:30:02', 926),
(97, 170, 'Sarah Ferraz Aguiar', 'SAH', '149.780.026-99', 'F', '(31) 99691-4612', 'S', 'Contagem', 'MG', '32140-300', 'Casa', '2019-06-21 22:06:35', 150),
(98, 171, 'Bárbara Magalhães Milhomem Santos', 'barbie', '559.061.841-04', 'F', '(67) 99295-5362', '', 'campo Grande', 'MS', '79116-480', '', '2019-06-22 21:17:42', 578),
(99, 173, 'Amanda Bárbara Lopes Santana', 'Amanda', '056.406.074-75', 'F', '(81) 99887-4243', 'S', 'Caruaru', 'PE', '55022-310', '', '2019-06-26 22:01:59', 205),
(100, 174, 'Márcio Martins Castro de Araújo', 'Márcio', '561.506.601-68', 'M', '(61) 99906-0013', 'S', 'Qd. 203 lt 09 Bloco A aptº1004', 'DF', '', 'Solar das Araucárias', '2019-06-27 00:14:56', 0),
(101, 175, 'LUCIANO JESUS DE LIMA', 'Lu', '336.857.008-04', 'M', '(11) 95530-3567', 'S', 'Embu-Guaçu', 'SP', '06900-000', '', '2019-06-27 17:31:18', 0),
(102, 176, 'Stephanie Lorraine Souza', 'Steh', '114.912.636-10', 'F', '(31) 99155-0167', 'S', 'Belo Horizonte', 'MG', '30642-420', 'Casa', '2019-06-27 23:46:59', 30),
(103, 177, 'Alan campos', 'Alan', '093.936.706-84', 'M', '(31) 99642-8030', '', '', '', '', '', '2019-07-02 00:42:41', 0),
(104, 178, 'Matheus Emanuel Silva e Souza', 'Matheus Emanuel', '129.077.956-27', 'M', '(31) 99406-7390', 'S', 'Congonhas', 'MG', '36415-000', 'casw', '2019-07-05 15:43:32', 122),
(105, 179, 'Daniel Isaac Tiradentes', 'Dani', '095.993.836-21', 'M', '(37) 99832-6749', 'S', 'Itaúna', 'MG', '35680-268', '181 / Apto 301', '2019-07-08 17:29:18', 181),
(106, 180, 'Marcos', 'Marquim', '055.689.173-29', 'M', '(86) 99421-5166', 'S', 'Teresina', 'PI', '64010-210', '', '2019-07-09 00:07:12', 29),
(107, 182, 'Narasmym Torres de Assunção', 'Nara', '031.131.011-74', 'F', '(63) 98423-3711', 'S', 'Palmas', 'TO', '77023-380', '', '2019-07-11 11:34:06', 38),
(108, 183, 'Eduarda Gasparetto', 'Duda', '012.583.230-36', 'F', '(54) 99187-3567', 'S', 'Getúlio Vargas', 'RS', '99900-000', '', '2019-07-19 03:15:45', 437),
(109, 185, 'Luiza Esteves Mendes Tavares', 'Luiza', '116.548.296-76', 'F', '(31) 99919-3875', 'S', 'Belo Horizonte', 'MG', '30421-382', '', '2019-08-05 18:01:07', 1183),
(110, 186, 'Lillian lira', 'Lira', '426.470.118-00', 'F', '(11) 94190-6997', 'S', 'São Paulo', 'SP', '03275-000', 'Alt 141 bloco A', '2019-08-06 10:25:23', 2449),
(111, 187, 'Marina Andrade', 'Marina', '322.412-20', 'F', '(31) 99205-4621', 'S', 'Contagem', 'MG', '32241-22', '125', '2019-08-08 21:03:55', 125),
(112, 188, 'Julia Cirino', 'Julia', '031.483.672-19', 'F', '(31) 99428-7345', 'S', 'Belo Horizonte', 'MG', '30350-160', '', '2019-08-10 23:54:12', 415),
(113, 189, 'Sarah Martins', 'Sarinha', '124.116.606-42', 'F', '(31) 99388-9948', 'S', 'Contagem', 'MG', '32371-440', '', '2019-08-12 16:52:38', 35),
(114, 190, 'Isadora Duque', 'Isa', '135.394.167-14', 'F', '(22) 99268-3344', 'S', 'Araruama', 'RJ', '28970-000', '', '2019-08-15 19:00:27', 0),
(115, 192, 'Camila Mota Figueiredo', 'Camilinha', '135.939.836-81', 'F', '(31) 99535-4304', 'S', 'Belo Horizonte', 'MG', '30240-350', '', '2019-09-19 16:09:18', 664),
(116, 61, 'Marcelo Martins', 'Robozao', '134.071.706-96', 'M', '(31) 97594-4678', 'S', 'Contagem', 'MG', '32340-040', '', '2019-09-20 22:34:56', 300),
(117, 193, 'lucas', 'lucas', '125.450.446-01', 'M', '(99) 99999-9999', '', 'bh', 'MG', '30000-000', 'casa', '2019-10-11 15:14:21', 1),
(118, 195, 'HELIEZER SOUSA SANTOS', 'HELIEZER', '105.025.556-32', 'M', '(33) 98804-1253', 'S', 'TEOFILO OTONI', 'MG', '39800-021', 'escritorio', '2019-11-28 10:52:54', 319),
(119, 196, 'Jhonatan de Freitas Galdino', 'Jhonatan', '124.217.766-35', 'M', '(31) 99276-7575', 'S', 'rua marques rebelo, 41', 'MG', '30520-160', 'casa', '2020-02-18 15:23:11', 41);

-- --------------------------------------------------------

--
-- Estrutura para tabela `codigos`
--

CREATE TABLE `codigos` (
  `id_codigo` int(11) NOT NULL,
  `codigo` varchar(200) NOT NULL,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `codigos`
--

INSERT INTO `codigos` (`id_codigo`, `codigo`, `data`) VALUES
(38, 'bHVjYXNfc291emFuZXJpQG91dGxvb2suY29t', '2018-12-18 21:04:35'),
(39, 'Z2FicmlkdXRyYTFAZ21haWwuY29t', '2019-04-15 16:06:59'),
(42, 'bHVpemFlc3RldmVzMDVAaG90bWFpbC5jb20=', '2019-08-09 17:31:03'),
(43, 'bHVpemFlc3RldmVzMDVAaG90bWFpbC5jb20=', '2019-08-09 17:31:08');

-- --------------------------------------------------------

--
-- Estrutura para tabela `perguntas`
--

CREATE TABLE `perguntas` (
  `id_perguntas` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_anuncio` int(11) NOT NULL,
  `pergunta` varchar(200) NOT NULL,
  `resposta` varchar(200) NOT NULL,
  `data_pergunta` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Fazendo dump de dados para tabela `perguntas`
--

INSERT INTO `perguntas` (`id_perguntas`, `id_usuario`, `id_anuncio`, `pergunta`, `resposta`, `data_pergunta`, `status`) VALUES
(1, 57, 54, 'Ainda está vendendo?', '', '0000-00-00 00:00:00', ''),
(2, 57, 52, 'quantos ingressos ainda tem?', 'No momento tenho 5 ingressos no estoque entre em contato 31.989344217', '2019-05-06 16:06:15', ''),
(3, 57, 39, 'Qual lote está?', '1º ainda', '2019-05-07 11:53:53', ''),
(4, 57, 61, 'entrega em casa?', 'ngresso n eh físico! Após transferência, seria enviado por PDF. Me chama no wpp 31 99164-3037', '2019-05-07 19:27:34', ''),
(5, 57, 64, 'entrega em casa?', 'Sum', '2019-05-10 13:44:30', ''),
(6, 57, 68, 'entrega em casa?', 'Sim,em divinópolis e arcos-mg', '2019-06-05 00:57:59', ''),
(9, 57, 68, 'Ainda está vendendo?', 'Sim,em divinópolis e arcos-mg', '2019-06-05 00:57:41', ''),
(10, 57, 61, 'Ainda está vendendo?', '', '0000-00-00 00:00:00', ''),
(11, 104, 40, 'Ainda está vendendo?', 'Sim! me chama no wpp, pf !!!!', '2019-06-04 23:43:10', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `data_login` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `termos_de_uso` char(6) NOT NULL,
  `data_validade` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `codigo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `senha`, `data_login`, `termos_de_uso`, `data_validade`, `codigo`) VALUES
(57, 'brennersc@gmail.com', '202cb962ac59075b964b07152d234b70', '2018-12-05 00:13:36', 'aceito', '0000-00-00 00:00:00', 'valido'),
(59, 'pedromercini@gmail.com', '14d5523f2191bbe48fd0cab749ab3378', '2018-12-05 01:14:04', 'aceito', '0000-00-00 00:00:00', 'valido'),
(60, 'gaschreiber@hotmail.com', 'd54d1702ad0f8326224b817c796763c9', '2018-12-05 01:41:14', 'aceito', '0000-00-00 00:00:00', 'valido'),
(61, 'marcelom.mrx@gmail.com', 'd5842dbd31592ac59c914c89f78d0ef1', '2018-12-05 02:14:38', 'aceito', '0000-00-00 00:00:00', 'valido'),
(63, 'fulvius11@gmail.com', 'f873adbd427908eb86948dc8b70d123e', '2018-12-05 23:02:02', 'aceito', '0000-00-00 00:00:00', 'valido'),
(64, 'leoliveira2000@hotmail.com', 'c0518c92bc6e56af3a48b37538a0301f', '2018-12-06 00:13:42', 'aceito', '0000-00-00 00:00:00', 'valido'),
(65, 'caio.espindula@gmail.com', 'dc76c818da7cfde78d606f9017c07748', '2018-12-06 13:06:48', 'aceito', '0000-00-00 00:00:00', 'valido'),
(66, 'scoimbra32@gmail.com', '6df22b62966725f540e5c9b202595639', '2018-12-09 02:02:12', 'aceito', '0000-00-00 00:00:00', 'valido'),
(67, 'lucas_souzaneri@outlook.com', '60c47e02b91fd6a561294c669b936684', '2018-12-19 01:39:10', 'aceito', '0000-00-00 00:00:00', 'valido'),
(68, 'tatilanathalia23d@gmail.com', '0343040d8fa01ad3d28da820395cd872', '2018-12-21 19:38:27', 'aceito', '0000-00-00 00:00:00', 'valido'),
(69, 'walterviniciusga@hotmail.com.br', '1fe801aec7f522f9fc7c7ba3e1b75fa5', '2018-12-22 15:32:10', 'aceito', '0000-00-00 00:00:00', 'valido'),
(70, 'bmmenezeslima@gmail.com', '7ad0af1a51b34a900a12813448b54181', '2018-12-28 16:44:13', 'aceito', '0000-00-00 00:00:00', 'valido'),
(71, 'rhelen-cristina@hotmail.com', '5280964737a0bb845ddfac29278efd8c', '2019-01-06 03:36:06', 'aceito', '0000-00-00 00:00:00', 'valido'),
(72, 'luisdepaula@hotmail.com.br', '9f15a34d74b14c526fb98f3213650fe6', '2019-01-06 09:23:06', 'aceito', '0000-00-00 00:00:00', 'valido'),
(73, 'ju.nicole123@gmail.com', '236bb84d70bd891916abf9762c0cf539', '2019-01-08 00:29:28', 'aceito', '0000-00-00 00:00:00', 'valido'),
(74, 'melinajeniffer975@gmail.com', 'a80d38019a1026a710b20578aa2fd6a9', '2019-01-13 18:53:08', 'aceito', '0000-00-00 00:00:00', 'valido'),
(75, 'fernandinhoreis8@gmail.com', '4ffc30756ae66f06411b2550ad38053b', '2019-01-14 01:18:34', 'aceito', '0000-00-00 00:00:00', 'valido'),
(76, 'laura.costa9@icloud.com', '7f4e0c0289b44feeb405b5769f4b92a1', '2019-01-14 01:19:47', 'aceito', '0000-00-00 00:00:00', 'valido'),
(77, 'natiitinha@live.com', '2f7a5cd9270b71a08066a228118a224a', '2019-01-14 01:20:50', 'aceito', '0000-00-00 00:00:00', 'valido'),
(78, 'bruniinha_andrade@hotmail.com', 'cc722d77db45f9ef80026c2176086333', '2019-01-14 01:29:36', 'aceito', '0000-00-00 00:00:00', 'valido'),
(79, 'bethsduarte028@hotmail.com', 'd12bbd918334a4dbd2646de4f3de5ca1', '2019-01-14 02:23:33', 'aceito', '0000-00-00 00:00:00', 'valido'),
(80, 'paixaocristiana@gmail.com', '459ae8ecd3c2988ec70468a723d4e26f', '2019-01-14 08:46:47', 'aceito', '0000-00-00 00:00:00', 'valido'),
(81, 'junior.hyller@gmail.com', '37d3307b8b5d4ac91ca742969f051209', '2019-01-14 14:49:35', 'aceito', '0000-00-00 00:00:00', 'valido'),
(82, 'victoria@tecnifox.com.br', '0d3e349c4a1ec0c7e4bb8175aa210300', '2019-01-15 01:26:22', 'aceito', '0000-00-00 00:00:00', 'valido'),
(83, 'jojo_camposss@hotmail.com', 'c7c38f9d7eea36c017b67055da0067dd', '2019-01-16 02:20:54', 'aceito', '0000-00-00 00:00:00', 'valido'),
(84, 'yararezende10@hotmail.com', 'f68eedc23bdb067cad68e0cae006b965', '2019-01-16 11:37:00', 'aceito', '0000-00-00 00:00:00', 'valido'),
(85, 'fefe.valle@hotmail.com', 'bb82390aeddfa9948aa6a712c819d635', '2019-01-16 18:05:03', 'aceito', '0000-00-00 00:00:00', 'valido'),
(86, 'marcelinhaduarte1@hotmail.com', 'b088f49350f52248a94e6e1424ee7990', '2019-01-16 19:35:27', 'aceito', '0000-00-00 00:00:00', 'valido'),
(87, 'carolccampos@yahoo.com.br', '8ecc1166ba1af390d96e284ccf61b02a', '2019-01-20 13:11:47', 'aceito', '0000-00-00 00:00:00', 'valido'),
(88, 'mateusguilhermegpg@gmail.com', '5321f15724fa406ed7c63eee2c0b826f', '2019-01-20 22:22:16', 'aceito', '0000-00-00 00:00:00', 'valido'),
(89, 'carollinas@yahoo.com.br', '998ddc7f207d5b39240913e80ec1f86a', '2019-01-21 18:10:19', 'aceito', '0000-00-00 00:00:00', 'valido'),
(90, 'lfelipec19@hotmail.com', 'b673e728a64298c0805e3462bc346115', '2019-01-23 01:50:18', 'aceito', '0000-00-00 00:00:00', 'valido'),
(91, 'matheusfeipemg.01@gmail.com', 'ff826af202b8019cea1175fa73393541', '2019-01-23 19:45:18', 'aceito', '0000-00-00 00:00:00', 'valido'),
(92, 'matheusfelipeng.01@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2019-01-23 19:48:15', 'aceito', '0000-00-00 00:00:00', 'valido'),
(93, 'matheusfelipemg.01@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2019-01-23 19:50:28', 'aceito', '0000-00-00 00:00:00', 'valido'),
(94, 'guilhermedesignerbh@gmail.com', 'aaa1a7fd06e1e1c6505ed95f735d2205', '2019-01-24 12:10:30', 'aceito', '0000-00-00 00:00:00', 'valido'),
(95, 'carolsalmeida_@hotmail.com', '1a8b9afbcc20a7a5d6260ac7b7446e22', '2019-01-26 00:03:21', 'aceito', '0000-00-00 00:00:00', 'valido'),
(96, 'arianestheban@hotmail.com', '82701ced881abf97608e0fe5de59ba69', '2019-02-02 00:40:17', 'aceito', '0000-00-00 00:00:00', 'valido'),
(97, 'aria.nasc94@gmail.com', '82701ced881abf97608e0fe5de59ba69', '2019-02-02 00:41:49', 'aceito', '0000-00-00 00:00:00', 'valido'),
(98, 'washingtonjunior42@gmail.com', '46d07bbf9de3be3996472d69d5531729', '2019-02-07 16:11:30', 'aceito', '0000-00-00 00:00:00', 'valido'),
(99, 'bittencourtjacqueline@gmail.com', '25d55ad283aa400af464c76d713c07ad', '2019-02-08 17:46:54', 'aceito', '0000-00-00 00:00:00', 'valido'),
(100, 'tamara.faleiro@gmail.com', '9b534252b91b46d0d77b4eac16727807', '2019-02-11 14:23:31', 'aceito', '0000-00-00 00:00:00', 'valido'),
(101, 'brendasacramentom@hotmail.com', 'fc97f2fb026e7b739575e996f4cfa27e', '2019-02-12 21:20:31', 'aceito', '0000-00-00 00:00:00', 'valido'),
(102, 'saviovieira95@hotmail.com', '8d359795d89d43e013234bd4fadf7eb2', '2019-02-20 01:53:37', 'aceito', '0000-00-00 00:00:00', 'valido'),
(103, 'bruna.ubaldocs@gmail.com', '8d0639f93d9f52abd68de2ce49396833', '2019-02-25 21:06:31', 'aceito', '0000-00-00 00:00:00', 'valido'),
(104, 'brenner.cunha@fumec.br', 'e10adc3949ba59abbe56e057f20f883e', '2019-02-25 21:17:05', 'aceito', '0000-00-00 00:00:00', 'valido'),
(105, 'marinsbela@outlook.com', '95058c7eef18d660b246ce86f5e73108', '2019-02-27 00:46:24', 'aceito', '0000-00-00 00:00:00', 'valido'),
(106, 'aonorato2014@gmail.com', '6db5e2fba40dea717a826e88dcc4c861', '2019-02-27 17:43:13', 'aceito', '0000-00-00 00:00:00', 'valido'),
(107, 'joanamscampos@hotmail.com', '36c1260d3ccdd200028a57f5529cb8bd', '2019-02-27 23:32:03', 'aceito', '0000-00-00 00:00:00', 'valido'),
(108, 'vinicius.o.rodrigues@gmail.com', '7621bbea3522d5be52e57e0d60d1ccf2', '2019-02-28 14:33:06', 'aceito', '0000-00-00 00:00:00', 'valido'),
(109, 'br.luizas@gmail.com', '36660256457819997e621b667823ba9d', '2019-03-02 11:01:13', 'aceito', '0000-00-00 00:00:00', 'valido'),
(110, 'lara-rtlima@live.com', '929ac166340f15e1b69b9e911a9f565d', '2019-03-20 19:41:27', 'aceito', '0000-00-00 00:00:00', 'valido'),
(111, 'lucasaira@icloud.com', 'b8e9ba4997fc6cc4e549670219e3e390', '2019-03-24 01:14:49', 'aceito', '0000-00-00 00:00:00', 'valido'),
(112, 'gugaparrolas10@hotmail.com', 'e22de04f43a939c80c2eb28715b84b40', '2019-03-25 04:11:47', 'aceito', '0000-00-00 00:00:00', 'valido'),
(113, 'dansilva978@gmail.com', 'e8af5a3b85f1c8db701b8e64f3ffef45', '2019-03-26 01:43:33', 'aceito', '0000-00-00 00:00:00', 'valido'),
(114, 'lucasgue@yahoo.com.br', '38da514311bab340bb579dcfb0b5d17f', '2019-03-26 18:27:45', 'aceito', '0000-00-00 00:00:00', 'valido'),
(115, 'anaflaviarego@hotmail.com.br', 'cdda2436907f2fd5289841cb1a3e5a5b', '2019-03-28 22:56:30', 'aceito', '0000-00-00 00:00:00', 'valido'),
(116, 'vffeher@gmail.com', 'da7882abe54330dbfc4b1a8dafa1cbee', '2019-03-29 11:04:59', 'aceito', '0000-00-00 00:00:00', 'valido'),
(117, 'julielle.jjl@gmail.com', '211f6df9a7992b5f22de29c24008e57d', '2019-03-30 12:13:33', 'aceito', '0000-00-00 00:00:00', 'valido'),
(118, 'vi_tjs@hotmail.com', '758a9b39d8514b6bb4c215553bc58fde', '2019-03-31 02:32:13', 'aceito', '0000-00-00 00:00:00', 'valido'),
(119, 'leticiahr.hr@gmail.com', '7bbeb82f3733123b3758d0f25078e3fc', '2019-04-02 15:43:22', 'aceito', '0000-00-00 00:00:00', 'valido'),
(120, 'pedrinhogontijo@hotmail.com', '7665c338f1d6950166d3e027ab4d675c', '2019-04-02 16:01:02', 'aceito', '0000-00-00 00:00:00', 'valido'),
(121, 'rogerio_dante@yahoo.com.br', '3b6190540b0f13e4f2ee33912cfcb5fb', '2019-04-03 03:05:46', 'aceito', '0000-00-00 00:00:00', 'valido'),
(122, 'barbaranonaka@gmail.com', '57f2d7bf02e1c8e3430fd43103b27794', '2019-04-03 14:14:18', 'aceito', '0000-00-00 00:00:00', 'valido'),
(123, 'cleversonlso3@gmail.com', '3ad7cfdf84f14eea15770011b490b89c', '2019-04-04 15:05:59', 'aceito', '0000-00-00 00:00:00', 'valido'),
(124, 'cinthya.28.rodrigues@hotmail.com', '18eb18fa54a61fb3c50c18c7ee2b42f8', '2019-04-04 16:28:17', 'aceito', '0000-00-00 00:00:00', 'valido'),
(125, 'danielmatheusv@gmail.com', '50413433ea8303fd97c84078cb585004', '2019-04-04 22:03:08', 'aceito', '0000-00-00 00:00:00', 'valido'),
(126, 'riicksm@hotmail.com', 'a9bfb87fd27c3444ca68f3e8286d5aee', '2019-04-06 00:01:45', 'aceito', '0000-00-00 00:00:00', 'valido'),
(127, 'raphadiasnascimento@yahoo.com.br', '070d05f0575e4524a1cc8eb58cfb2bed', '2019-04-06 11:22:54', 'aceito', '0000-00-00 00:00:00', 'valido'),
(128, 'cintythibau@hotmail.com', 'a7964d38edc964242c2e868250f96114', '2019-04-06 11:31:48', 'aceito', '0000-00-00 00:00:00', 'valido'),
(129, 'mmllfilho@hotmail.com', 'ca0380a7831e34a62ef68366e3d355bc', '2019-04-06 22:56:02', 'aceito', '0000-00-00 00:00:00', 'valido'),
(130, 'izabelleadm@hotmail.com', 'e79728d280f9e4025f9171c91e85c5c7', '2019-04-08 01:04:55', 'aceito', '0000-00-00 00:00:00', 'valido'),
(131, 'greice.brandell@hotmail.com', 'ad741868d20a07e328a0b138db05fcfb', '2019-04-08 04:25:32', 'aceito', '0000-00-00 00:00:00', 'valido'),
(132, 'mariaemp30@gmail.com', '94d0b368379ecfe763119ddb80ff328d', '2019-04-08 16:03:12', 'aceito', '0000-00-00 00:00:00', 'valido'),
(133, 'mayrasdominato@hotmail.com', '0f2d3da619bea49c56ba81b56fe0efdf', '2019-04-08 18:16:29', 'aceito', '0000-00-00 00:00:00', 'valido'),
(134, 'rafaela.sdoliveira@gmail.com', '4f96084369bc08d695af537c95fa53a8', '2019-04-08 21:52:00', 'aceito', '0000-00-00 00:00:00', 'valido'),
(135, 'gabivpompeo@outlook.com', 'f52e60c041dcd887b320e6b2489f219d', '2019-04-09 17:47:26', 'aceito', '0000-00-00 00:00:00', 'valido'),
(136, 'juniamsantos@hotmail.com', '8abf4ac0fbcb0d470b42acb46cf51272', '2019-04-11 12:20:55', 'aceito', '0000-00-00 00:00:00', 'valido'),
(137, 'gustavolisner@gmail.com', 'f0264c1fa8c8cf6d53289c24bb265b24', '2019-04-11 19:25:11', 'aceito', '0000-00-00 00:00:00', 'valido'),
(138, 'guifsouza5@gmail.com', '80eaacc47aa606d83242c73b0333f8ad', '2019-04-12 19:29:32', 'aceito', '0000-00-00 00:00:00', 'valido'),
(139, 'karolinnya.teixeira@gmail.com', 'b3abe1de3227ddd7a33f2bbe4788b727', '2019-04-13 02:23:55', 'aceito', '0000-00-00 00:00:00', 'valido'),
(140, 'gabridutra1@gmail.com', '8833f1325fb6341757b30f6de91487a5', '2019-04-14 16:06:03', 'aceito', '0000-00-00 00:00:00', 'valido'),
(141, 'andresbreu2009@gmail.com', '9bd10275696c74c971ad76a0f56d4d22', '2019-04-14 23:44:27', 'aceito', '0000-00-00 00:00:00', 'valido'),
(142, 'lorenapcmedeiros@gmail.com', 'add15452d3c3d434e954a3544c2751e4', '2019-04-15 00:09:24', 'aceito', '0000-00-00 00:00:00', 'valido'),
(143, 'beatrizsiqueira9@gmail.com', 'e733343172891d263cda1585e68a9dab', '2019-04-16 12:18:22', 'aceito', '0000-00-00 00:00:00', 'valido'),
(144, 'danielviana838@gmail.com', '9c3b2cbe579a78323fc10cd8406a9f2e', '2019-04-16 14:19:36', 'aceito', '0000-00-00 00:00:00', 'valido'),
(145, 'myticketclub@gmail.com', 'e5fed556cd3b72de8ea59136c5bf4948', '2019-04-23 08:15:37', 'aceito', '2019-04-28 05:15:37', 'bXl0aWNrZXRjbHViQGdtYWlsLmNvbQ=='),
(146, 'fred.hn@gmail.com', '81482de4494c58fa4547b5eaad22cbb6', '2019-04-24 18:05:00', 'aceito', '2019-04-29 21:40:55', 'ZnJlZC5obkBnbWFpbC5jb20='),
(147, 'brenner@brenner.com', '202cb962ac59075b964b07152d234b70', '2019-04-24 19:44:34', 'aceito', '2019-04-29 16:44:34', 'YnJlbm5lckBicmVubmVyLmNvbQ=='),
(148, 'teste@teste.com', '202cb962ac59075b964b07152d234b70', '2019-04-24 19:45:57', 'aceito', '2019-04-29 16:45:57', 'dGVzdGVAdGVzdGUuY29t'),
(149, 'emanuelcarvalho007@gmail.com', '7d0c5067d4eb587e62ec6613fa7f236a', '2019-04-24 21:23:36', 'aceito', '2019-04-29 19:40:45', 'ZW1hbnVlbGNhcnZhbGhvMDA3QGdtYWlsLmNvbQ=='),
(150, 'rafaelaaleeixo@gmail.com', 'c049bacf3440f14f2efc9146bfd7f564', '2019-04-27 16:32:25', 'aceito', '2019-05-02 13:32:25', 'cmFmYWVsYWFsZWVpeG9AZ21haWwuY29t'),
(151, 'brunar.94@gmail.com', 'f6fb761458a44481d3dd7a4ad8b0e6f9', '2019-04-30 12:47:44', 'aceito', '0000-00-00 00:00:00', 'valido'),
(152, 'lorrayne.20@hotmail.com', '002bff426dd9a9e1b5f2c7abee52b636', '2019-05-06 22:56:31', 'aceito', '0000-00-00 00:00:00', 'valido'),
(153, 'marcelo@barbeito.com.br', '8e5e8ba37b3858b4f2c249e81f980558', '2019-05-09 00:19:12', 'aceito', '2019-05-13 21:19:12', 'bWFyY2Vsb0BiYXJiZWl0by5jb20uYnI='),
(154, 'alexandrelee545@gmail.com', 'c8cedc90b47b77c345a12bff3de9cd50', '2019-05-09 02:30:04', 'aceito', '2019-05-13 23:30:04', 'YWxleGFuZHJlbGVlNTQ1QGdtYWlsLmNvbQ=='),
(155, 'tatidosantos.amb@gmail.com', 'eac5969afb527e28d2ee431d474fc7c8', '2019-05-11 13:31:02', 'aceito', '2019-05-16 10:31:02', 'dGF0aWRvc2FudG9zLmFtYkBnbWFpbC5jb20='),
(156, 'rosangela.pazin@hotmail.com', '601fb201c8a6e8e473f86e5dfe042a0e', '2019-05-11 18:05:07', 'aceito', '2019-05-16 15:05:07', 'cm9zYW5nZWxhLnBhemluQGhvdG1haWwuY29t'),
(157, 'r.dos.ribeiro2010@bol.com.br', 'e84af656d247704c49dc82eb3afffdf2', '2019-05-12 11:16:28', 'aceito', '2019-05-17 08:16:28', 'ci5kb3MucmliZWlybzIwMTBAYm9sLmNvbS5icg=='),
(158, 'deise.juliane@terra.com.br', '744353bdd69710dde9459f4b5e9f048c', '2019-05-12 14:40:36', 'aceito', '2019-05-17 11:40:36', 'ZGVpc2UuanVsaWFuZUB0ZXJyYS5jb20uYnI='),
(159, 'rozauracosta30@gmail.com', '98bbae4645ccd14efaae41f70aa5c682', '2019-05-12 16:30:13', 'aceito', '2019-05-17 13:30:13', 'cm96YXVyYWNvc3RhMzBAZ21haWwuY29t'),
(160, 'jotapag2@gmail.com', '27efab0fabf9fe985e6e4d4c2726fc2b', '2019-05-15 02:19:13', 'aceito', '0000-00-00 00:00:00', 'valido'),
(161, 'vitortaadeu@hotmail.com', '919d4d12a977a620bbbc591d03155c84', '2019-05-15 17:39:10', 'aceito', '2019-05-20 14:39:10', 'dml0b3J0YWFkZXVAaG90bWFpbC5jb20='),
(162, 'pedro_hferreira1@hotmail.com', '27e1de39fc9142b33b10a9f5d6167b36', '2019-05-15 17:39:11', 'aceito', '2019-05-20 14:39:11', 'cGVkcm9faGZlcnJlaXJhMUBob3RtYWlsLmNvbQ=='),
(163, 'danielreisalmeida@gmail.com', '62aa980d5a78adaa441ca3932c2d46b4', '2019-05-18 04:45:08', 'aceito', '0000-00-00 00:00:00', 'valido'),
(164, 'leticia10.silva10@gmail.com', '6ed7ce65f77a23faf2bb717a19457205', '2019-05-20 23:53:59', 'aceito', '0000-00-00 00:00:00', 'valido'),
(165, 'thais.pitt@hotmail.com', 'c8d3148800bdd820dd3de8663c708a6b', '2019-05-24 11:10:29', 'aceito', '2019-05-29 08:10:29', 'dGhhaXMucGl0dEBob3RtYWlsLmNvbQ=='),
(166, 'adairjuniorau@live.com', 'b21587540a75b86443b1cc57924c0bbf', '2019-06-01 16:17:07', 'aceito', '2019-06-06 13:17:07', 'YWRhaXJqdW5pb3JhdUBsaXZlLmNvbQ=='),
(167, 'paula.leoc@gmail.com', 'c9204baf9008cc21c7eca3b7f45385d7', '2019-06-06 00:54:03', 'aceito', '2019-06-10 21:54:03', 'cGF1bGEubGVvY0BnbWFpbC5jb20='),
(168, 'madslsmgbr@hotmail.com', '153acdc767ea39dd309daa52b4bb0fa6', '2019-06-16 06:46:33', 'aceito', '2019-06-21 03:46:33', 'bWFkc2xzbWdickBob3RtYWlsLmNvbQ=='),
(169, 'thaspa100i@gmail.com', 'cfefee78ae44af2100cbe9bdc99d47d0', '2019-06-16 15:28:13', 'aceito', '0000-00-00 00:00:00', 'valido'),
(170, 'sarahaguiar123@hotmail.com', 'ea5dee44cabddfd0e4f0fdf35f6a4e30', '2019-06-21 22:04:17', 'aceito', '0000-00-00 00:00:00', 'valido'),
(171, 'barbarasantos97@hotmail.com', 'ec63c30de5ffb8adf42f23b67c549699', '2019-06-22 21:16:36', 'aceito', '0000-00-00 00:00:00', 'valido'),
(172, 'fumec@fumec.br', '202cb962ac59075b964b07152d234b70', '2019-06-24 12:23:32', 'aceito', '2019-06-29 09:23:32', 'ZnVtZWNAZnVtZWMuYnI='),
(173, 'amanndalopes_@hotmail.com', 'eee967113f8cf38fd60d8a1f89a64273', '2019-06-26 22:00:30', 'aceito', '2019-07-01 19:00:30', 'YW1hbm5kYWxvcGVzX0Bob3RtYWlsLmNvbQ=='),
(174, 'marciogeominerios@hotmail.com', '4042caad6fa83ce53087a206386d035c', '2019-06-27 00:11:28', 'aceito', '2019-07-01 21:11:28', 'bWFyY2lvZ2VvbWluZXJpb3NAaG90bWFpbC5jb20='),
(175, 'uplu.lima@gmail.com', 'd87d87a1581e83d058b2bcf80c6ff3a9', '2019-06-27 17:30:29', 'aceito', '2019-07-02 14:30:29', 'dXBsdS5saW1hQGdtYWlsLmNvbQ=='),
(176, 'stephaniie95@live.com', '4a6ec06ae21b405579f4b4a7e9aa5653', '2019-06-27 23:46:01', 'aceito', '2019-07-02 20:46:01', 'c3RlcGhhbmlpZTk1QGxpdmUuY29t'),
(177, 'alan_tadeeeu@hotmail.com', '8c52b2a2bea46c2f74579bff96175474', '2019-07-02 00:41:35', 'aceito', '2019-07-06 21:41:35', 'YWxhbl90YWRlZWV1QGhvdG1haWwuY29t'),
(178, 'matheusemanuels@outlook.com', 'be114ba213f3429af7f40b06679947d9', '2019-07-05 15:41:20', 'aceito', '2019-07-10 12:41:20', 'bWF0aGV1c2VtYW51ZWxzQG91dGxvb2suY29t'),
(179, 'daniel_tiradentes@hotmail.com', 'a1f825491bd76619540c3012b524ec4f', '2019-07-08 17:28:01', 'aceito', '0000-00-00 00:00:00', 'valido'),
(180, 'marcos.victor1002@gmail.com', 'e2512773a7b8add390ec502511c42c94', '2019-07-09 00:05:28', 'aceito', '2019-07-13 21:05:28', 'bWFyY29zLnZpY3RvcjEwMDJAZ21haWwuY29t'),
(181, 'jlouisiene1@gmail.com', '84f3ea20769026be4b6512d3e0399832', '2019-07-10 18:21:49', 'aceito', '2019-07-15 15:21:49', 'amxvdWlzaWVuZTFAZ21haWwuY29t'),
(182, 'narasmymt@gmail.com', '7ab3585d40073670febd895ad01863e1', '2019-07-11 11:31:42', 'aceito', '0000-00-00 00:00:00', 'valido'),
(183, 'duda.gasparetto@hotmail.com', 'a29612fa2e01985c58a0fd0388cd6865', '2019-07-19 03:14:13', 'aceito', '2019-07-24 00:14:13', 'ZHVkYS5nYXNwYXJldHRvQGhvdG1haWwuY29t'),
(184, 'accavalcanter@icloud.com', 'c279bba67b9abce106c3b3ff7092364e', '2019-08-03 00:53:38', 'aceito', '2019-08-07 21:53:38', 'YWNjYXZhbGNhbnRlckBpY2xvdWQuY29t'),
(185, 'luizaesteves05@hotmail.com', '3327f9a1256fa72a38c26a693e292ae7', '2019-08-05 17:58:55', 'aceito', '2019-08-10 14:58:55', 'bHVpemFlc3RldmVzMDVAaG90bWFpbC5jb20='),
(186, 'lillianlira@hotmail.com', '755e285b0f41bc536e3ae77612c8426c', '2019-08-06 10:23:42', 'aceito', '2019-08-11 07:23:42', 'bGlsbGlhbmxpcmFAaG90bWFpbC5jb20='),
(187, 'marinagca@icloud.com', '6f1a2c59070604af502182b6da470683', '2019-08-08 21:02:34', 'aceito', '2019-08-13 18:02:34', 'bWFyaW5hZ2NhQGljbG91ZC5jb20='),
(188, 'juliacirinop@gmail.com', '0d3d9b36206f56a97400a17ebedea96b', '2019-08-10 23:51:29', 'aceito', '0000-00-00 00:00:00', 'valido'),
(189, 'sarinhahmx@gmail.com', 'fbd8bf9707d5914aa6a958ea2e4f56ad', '2019-08-12 16:50:21', 'aceito', '0000-00-00 00:00:00', 'valido'),
(190, 'isagd-m@hotmail.con', '0e3444badcd49cc445313996232d6c28', '2019-08-15 18:59:29', 'aceito', '2019-08-20 15:59:29', 'aXNhZ2QtbUBob3RtYWlsLmNvbg=='),
(191, 'paulo.schizaki.santos@gmail.com', 'b111ed1429b0a4a64f9ff133e3195bb2', '2019-08-28 00:04:33', 'aceito', '2019-09-01 21:04:33', 'cGF1bG8uc2NoaXpha2kuc2FudG9zQGdtYWlsLmNvbQ=='),
(192, 'camilamafig@gmail.com', '3fea165ce8468b5b4c43db579a6ed817', '2019-09-19 16:07:09', 'aceito', '2019-09-24 13:07:09', 'Y2FtaWxhbWFmaWdAZ21haWwuY29t'),
(193, 'lmoxavier@gmail.com', '202cb962ac59075b964b07152d234b70', '2019-10-11 15:12:26', 'aceito', '0000-00-00 00:00:00', 'valido'),
(194, 'cintia.andrade0@gmail.com', 'f240a4a08ef4d49a9b643168779d8491', '2019-11-09 16:16:58', 'aceito', '2019-11-14 13:16:58', 'Y2ludGlhLmFuZHJhZGUwQGdtYWlsLmNvbQ=='),
(195, 'helysantos.01@gmail.com', '7e12c7aba27c7fe2af1f8cf634258b42', '2019-11-28 10:51:09', 'aceito', '2019-12-03 07:51:09', 'aGVseXNhbnRvcy4wMUBnbWFpbC5jb20='),
(196, 'jhonatan_freitas_galdino@hotmail.com', '1d2eab970bc9d78bf1a702b99c30814d', '2020-02-18 15:22:19', 'aceito', '2020-02-23 12:22:19', 'amhvbmF0YW5fZnJlaXRhc19nYWxkaW5vQGhvdG1haWwuY29t');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `anuncios`
--
ALTER TABLE `anuncios`
  ADD PRIMARY KEY (`id_anuncio`);

--
-- Índices de tabela `cadastro`
--
ALTER TABLE `cadastro`
  ADD PRIMARY KEY (`id_cadastro`);

--
-- Índices de tabela `codigos`
--
ALTER TABLE `codigos`
  ADD PRIMARY KEY (`id_codigo`);

--
-- Índices de tabela `perguntas`
--
ALTER TABLE `perguntas`
  ADD PRIMARY KEY (`id_perguntas`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `anuncios`
--
ALTER TABLE `anuncios`
  MODIFY `id_anuncio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT de tabela `cadastro`
--
ALTER TABLE `cadastro`
  MODIFY `id_cadastro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
--
-- AUTO_INCREMENT de tabela `codigos`
--
ALTER TABLE `codigos`
  MODIFY `id_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT de tabela `perguntas`
--
ALTER TABLE `perguntas`
  MODIFY `id_perguntas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
