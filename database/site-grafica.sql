-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Ago-2022 às 23:35
-- Versão do servidor: 10.4.19-MariaDB
-- versão do PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `site-grafica`
--

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_08_09_193843_create_services_table', 1),
(7, '2022_08_09_195431_create_sessions_table', 1),
(8, '2022_08_12_182156_create_pages_table', 1),
(9, '2022_08_24_182238_add_galery_to_pages_table', 1),
(10, '2022_08_26_181628_add_quemsomos_to_pages_table', 2);

--
-- Extraindo dados da tabela `pages`
--

INSERT INTO `pages` (`id`, `history`, `section_contato`, `logo`, `titulo`, `created_at`, `updated_at`, `galery`, `quemsomos`) VALUES
(1, 'leo dolor sit amet consectetur adipisicing elit. Sit incidunt blanditiis praesentium dolore doloremque aperiam, atque expedita officia rem natus perspiciatis commodi eaque non. Commodi, neque rem. Quia, iste molestias?', 'empresateste@gmail.com', '220b60235d264f8b63c665ff483f86ad.jpg', 'Gráfica fonsêca', NULL, '2022-08-26 21:33:17', '[{},{}]', 'rrdo ipsum dolor sit amet consectetur adipisicing elit. Sit incidunt blanditiis praesentium dolore doloremque aperiam, atque expedita officia rem natus perspiciatis commodi eaque non. Commodi, neque rem. Quia, iste molestias?');

--
-- Extraindo dados da tabela `services`
--

INSERT INTO `services` (`id`, `description`, `img`, `tipo`, `nome`, `categoria`, `created_at`, `updated_at`) VALUES
(1, 'caderno espiral com 18 matérias', 'eb43fbbd4ba0ff01c743b3373046568d.png', 'produto', 'Caderno Espiral(rosa)', 'material escolar', '2022-08-25 20:19:59', '2022-08-25 23:28:51'),
(2, 'Caneta Metal Personalizada + capa veludo Palecom Presentes (17156F5)', '5efdbe8c968171b5b274215697d0c425.jpg', 'produto', 'Caneta Metal Personalizada', 'material escolar', '2022-08-25 23:28:26', '2022-08-25 23:28:26'),
(3, 'Colortec Colortec : Mochila Hd Hawaiian Deams Azul com Folhas - Mcqueen', '88561e37cb6784c372e67651a81b2fe6.jpg', 'produto', 'Colortec Colortec : Mochila Hd Hawaiian', 'material escolar', '2022-08-25 23:31:03', '2022-08-26 21:31:46'),
(4, 'caderno espiral com 20 matérias', 'b1741a8a67a48df55e1e750a3c7ecf4d.jpg', 'produto', 'Livraria Adonai Livraria Adonai', 'material escolar', '2022-08-25 23:32:28', '2022-08-25 23:32:28'),
(5, 'caderno espiral com 22 matérias', 'a5105897743ec4c4cc893d2acfdb857a.jpg', 'produto', 'Cadernos escolares', 'material escolar', '2022-08-25 23:33:10', '2022-08-26 21:32:21');

--
-- Extraindo dados da tabela `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('tpyakK440V10cAq8B0qn5RsI6uedI74YRDFofVGO', 1, '127.0.0.1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Mobile Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoicGZManJ1TE5rdmt4UW1CSWlSejJrd3E3aExCa25ZRUhJQVNrZHdCQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1661539031),
('yHCdYwc5Yu23uhBQdonvDtjdfSjmHfcooTdv52vy', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTHZkaGJHT0pkYTE5YkhVMTRuc2JRWGJVb1ZwSGlJeUVaUjdMaVlVRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1661549660);

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'TeamLag', 'teamlag434@gmail.com', NULL, '$2y$10$sV.DlP1pOt7F2oVABieDs.9g7tjtOTKY9t8r1gOptYRBFwFu4aC9a', NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-25 19:41:08', '2022-08-25 19:41:08');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
