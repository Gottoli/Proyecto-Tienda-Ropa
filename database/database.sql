-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         12.3.2-MariaDB - MariaDB Server
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.18.0.7304
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando datos para la tabla lisbon.cache: ~0 rows (aproximadamente)

-- Volcando datos para la tabla lisbon.cache_locks: ~0 rows (aproximadamente)

-- Volcando datos para la tabla lisbon.cart_items: ~0 rows (aproximadamente)
INSERT INTO `cart_items` (`id`, `user_id`, `product_id`, `quantity`, `talle`, `created_at`, `updated_at`) VALUES
	(12, 3, 1, 1, NULL, '2026-06-16 14:21:29', '2026-06-16 14:21:29');

-- Volcando datos para la tabla lisbon.categories: ~4 rows (aproximadamente)
INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `active`, `created_at`, `updated_at`) VALUES
	(1, 'Remeras', 'remeras', 'Remeras de todo tipo', 1, '2026-06-16 09:31:20', '2026-06-16 09:31:20'),
	(2, 'Jeans', 'jeans', 'Jeans y pantalones', 1, '2026-06-16 09:31:20', '2026-06-16 09:31:20'),
	(3, 'Buzos', 'buzos', 'Buzos y hoodies', 1, '2026-06-16 09:31:20', '2026-06-16 09:31:20'),
	(4, 'Accesorios', 'accesorios', 'Cinturones, gorras y más', 1, '2026-06-16 09:31:20', '2026-06-16 09:31:20');

-- Volcando datos para la tabla lisbon.consultas: ~1 rows (aproximadamente)
INSERT INTO `consultas` (`id`, `nombre`, `email`, `motivo`, `consulta`, `leida`, `created_at`, `updated_at`) VALUES
	(1, 'Joaquin Gottoli', 'joaquigot@hotmail.com', 'precios', 'Hola me gustaria saber porque los precios tan caros che', 1, '2026-06-16 11:15:59', '2026-06-16 11:56:49');

-- Volcando datos para la tabla lisbon.failed_jobs: ~0 rows (aproximadamente)

-- Volcando datos para la tabla lisbon.job_batches: ~0 rows (aproximadamente)

-- Volcando datos para la tabla lisbon.jobs: ~0 rows (aproximadamente)

-- Volcando datos para la tabla lisbon.migrations: ~10 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2026_06_16_044000_create_categories_table', 1),
	(5, '2026_06_16_044242_create_products_table', 1),
	(6, '2026_06_16_052245_add_rol_to_users_table', 2),
	(7, '2026_06_16_070724_create_cart_items_table', 3),
	(8, '2026_06_16_081015_create_consultas_table', 4),
	(9, '2026_06_16_102423_create_orders_table', 5),
	(10, '2026_06_16_102424_create_order_items_table', 5),
	(11, '2026_06_16_110620_add_talle_to_products_table', 6),
	(12, '2026_06_16_110621_add_talle_to_cart_items_table', 6);

-- Volcando datos para la tabla lisbon.order_items: ~7 rows (aproximadamente)
INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 2, 50000.00, '2026-06-16 13:36:22', '2026-06-16 13:36:22'),
	(2, 1, 3, 1, 12000.00, '2026-06-16 13:36:22', '2026-06-16 13:36:22'),
	(3, 2, 1, 1, 50000.00, '2026-06-16 13:37:15', '2026-06-16 13:37:15'),
	(4, 2, 7, 1, 100000.00, '2026-06-16 13:37:15', '2026-06-16 13:37:15'),
	(5, 3, 7, 2, 100000.00, '2026-06-16 13:44:32', '2026-06-16 13:44:32'),
	(6, 4, 2, 1, 6500.00, '2026-06-16 13:48:47', '2026-06-16 13:48:47'),
	(7, 5, 2, 2, 6500.00, '2026-06-16 13:53:12', '2026-06-16 13:53:12'),
	(8, 6, 2, 1, 6500.00, '2026-06-16 13:58:25', '2026-06-16 13:58:25'),
	(9, 7, 2, 1, 6500.00, '2026-06-16 14:00:34', '2026-06-16 14:00:34'),
	(10, 8, 1, 1, 50000.00, '2026-06-16 14:05:30', '2026-06-16 14:05:30');

-- Volcando datos para la tabla lisbon.orders: ~5 rows (aproximadamente)
INSERT INTO `orders` (`id`, `user_id`, `total`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 3, 112000.00, 'confirmado', '2026-06-16 13:36:22', '2026-06-16 13:36:22'),
	(2, 3, 150000.00, 'confirmado', '2026-06-16 13:37:15', '2026-06-16 13:37:15'),
	(3, 3, 200000.00, 'confirmado', '2026-06-16 13:44:32', '2026-06-16 13:44:32'),
	(4, 3, 6500.00, 'confirmado', '2026-06-16 13:48:47', '2026-06-16 13:48:47'),
	(5, 3, 13000.00, 'confirmado', '2026-06-16 13:53:12', '2026-06-16 13:53:12'),
	(6, 3, 6500.00, 'confirmado', '2026-06-16 13:58:25', '2026-06-16 13:58:25'),
	(7, 3, 6500.00, 'confirmado', '2026-06-16 14:00:34', '2026-06-16 14:00:34'),
	(8, 3, 50000.00, 'confirmado', '2026-06-16 14:05:30', '2026-06-16 14:05:30');

-- Volcando datos para la tabla lisbon.password_reset_tokens: ~0 rows (aproximadamente)

-- Volcando datos para la tabla lisbon.products: ~7 rows (aproximadamente)
INSERT INTO `products` (`id`, `name`, `description`, `price`, `stock`, `talles`, `image`, `category_id`, `active`, `created_at`, `updated_at`) VALUES
	(1, 'Remera Negra Básica', 'Remera de algodón 100%, corte regular, oversize', 50000.00, 8, NULL, NULL, 1, 1, '2026-06-16 09:32:11', '2026-06-16 14:05:30'),
	(2, 'Remera Blanca Oversize', 'Remera oversize, tela premium', 6500.00, 11, NULL, NULL, 1, 1, '2026-06-16 09:32:11', '2026-06-16 14:00:34'),
	(3, 'Jean Azul Slim', 'Jean slim fit, tiro medio', 12000.00, 10, NULL, NULL, 2, 0, '2026-06-16 09:32:11', '2026-06-16 11:49:14'),
	(4, 'Jean Negro Recto', 'Jean recto, corte clásico', 11000.00, 8, NULL, NULL, 2, 1, '2026-06-16 09:32:11', '2026-06-16 09:32:11'),
	(5, 'Buzo Hoodie Gris', 'Hoodie con capucha, tela frizada', 9000.00, 12, NULL, NULL, 3, 1, '2026-06-16 09:32:11', '2026-06-16 09:32:11'),
	(6, 'Gorra Negra', 'Gorra snapback, talla única', 3500.00, 25, NULL, NULL, 4, 1, '2026-06-16 09:32:11', '2026-06-16 09:32:11'),
	(7, 'Remera Off white', 'Remera off white , de algodon egipcion con costrura y manufactura italiana', 100000.00, 2, NULL, NULL, 1, 1, '2026-06-16 11:50:31', '2026-06-16 11:50:31');

-- Volcando datos para la tabla lisbon.sessions: ~1 rows (aproximadamente)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('fHKoPexyFBk8xK9diWaPAWMQhBhTSpXAiWGo0FfY', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJFMFlKczFiQnZldVJDOHBoSEZ4WDlNaHJnN2RIMzZoWkVPdHBnN0dUIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvcHJveWVjdG8tdGllbmRhLXJvcGEudGVzdFwvYWRtaW4iLCJyb3V0ZSI6bnVsbH0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoxfQ==', 1781610676);

-- Volcando datos para la tabla lisbon.users: ~3 rows (aproximadamente)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `rol`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Joaquin Gottoli', 'joaquingottoli06@gmail.com', NULL, '$2y$12$FvvBP/JHQlmtv69/flQDzOKTQKtfd2Gbv2cLsvNv.JPStGH/zHjge', 'admin', NULL, '2026-06-16 08:56:48', '2026-06-16 09:11:40'),
	(2, 'Test User', 'test@example.com', '2026-06-16 09:29:22', '$2y$12$HGf4KrPUklR3Uys3Z0RVvOkRc5lSUgh29lLwe3RXgnoGMI8pyMdMC', 'cliente', '7CqQL7SZTk', '2026-06-16 09:29:23', '2026-06-16 09:29:23'),
	(3, 'joaquin Figueroa', 'joaquigot@hotmail.com', NULL, '$2y$12$dZ3Pml6ZgZLcfA4q84w9POmFIFl2HVaMDxAJn9WCeaMzMy0yrFMSK', 'cliente', NULL, '2026-06-16 11:01:29', '2026-06-16 11:01:29');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
