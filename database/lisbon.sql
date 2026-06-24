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

-- Volcando datos para la tabla lisbon.categories: ~5 rows (aproximadamente)
INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `active`, `created_at`, `updated_at`) VALUES
	(1, 'Remeras', 'remeras', 'Remeras de todo tipo', 1, '2026-06-16 09:31:20', '2026-06-16 09:31:20'),
	(2, 'Pantalones', 'pantalones', 'Jeans y pantalones', 1, '2026-06-16 09:31:20', '2026-06-18 14:59:40'),
	(3, 'Buzos', 'buzos', 'Buzos y hoodies', 1, '2026-06-16 09:31:20', '2026-06-16 09:31:20'),
	(4, 'Accesorios', 'accesorios', 'Cinturones, gorras y más', 1, '2026-06-16 09:31:20', '2026-06-16 09:31:20'),
	(5, 'Camperas', 'camperas', 'Camperas y abrigos', 1, '2026-06-18 14:59:40', '2026-06-18 14:59:40');

-- Volcando datos para la tabla lisbon.consultas: ~1 rows (aproximadamente)
INSERT INTO `consultas` (`id`, `nombre`, `email`, `motivo`, `consulta`, `leida`, `created_at`, `updated_at`) VALUES
	(1, 'Joaquin Gottoli', 'joaquigot@hotmail.com', 'precios', 'Hola me gustaria saber porque los precios tan caros che', 1, '2026-06-16 11:15:59', '2026-06-16 11:56:49');

-- Volcando datos para la tabla lisbon.failed_jobs: ~0 rows (aproximadamente)

-- Volcando datos para la tabla lisbon.job_batches: ~0 rows (aproximadamente)

-- Volcando datos para la tabla lisbon.jobs: ~0 rows (aproximadamente)

-- Volcando datos para la tabla lisbon.migrations: ~19 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_crear_tabla_usuarios', 1),
	(2, '0001_01_01_000001_crear_tabla_cache', 1),
	(3, '0001_01_01_000002_crear_tabla_trabajos', 1),
	(4, '2026_06_16_044000_crear_tabla_categorias', 1),
	(5, '2026_06_16_044242_crear_tabla_productos', 1),
	(6, '2026_06_16_052245_agregar_rol_a_usuarios', 2),
	(7, '2026_06_16_070724_crear_tabla_items_carrito', 3),
	(8, '2026_06_16_081015_crear_tabla_consultas', 4),
	(9, '2026_06_16_102423_crear_tabla_ordenes', 5),
	(10, '2026_06_16_102424_crear_tabla_items_orden', 5),
	(11, '2026_06_16_110620_agregar_talle_a_productos', 6),
	(12, '2026_06_16_110621_agregar_talle_a_items_carrito', 6),
	(13, '2026_06_18_115708_agregar_imagenes_a_productos', 7),
	(14, '2026_06_21_221805_agregar_stock_talles_a_productos', 8),
	(15, '2026_06_21_221807_agregar_talle_a_items_orden', 8),
	(16, '2026_06_21_235633_agregar_campos_checkout_a_ordenes', 9),
	(17, '2026_06_23_014223_agregar_genero_a_productos', 10),
	(18, '2026_06_23_020946_agregar_campos_perfil_a_usuarios', 11),
	(19, '2026_06_23_035137_crear_tabla_suscriptores_newsletter', 12);

-- Volcando datos para la tabla lisbon.newsletter_subscribers: ~0 rows (aproximadamente)

-- Volcando datos para la tabla lisbon.order_items: ~21 rows (aproximadamente)
INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `talle`, `price`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 2, NULL, 50000.00, '2026-06-16 13:36:22', '2026-06-16 13:36:22'),
	(2, 1, 3, 1, NULL, 12000.00, '2026-06-16 13:36:22', '2026-06-16 13:36:22'),
	(3, 2, 1, 1, NULL, 50000.00, '2026-06-16 13:37:15', '2026-06-16 13:37:15'),
	(4, 2, 7, 1, NULL, 100000.00, '2026-06-16 13:37:15', '2026-06-16 13:37:15'),
	(5, 3, 7, 2, NULL, 100000.00, '2026-06-16 13:44:32', '2026-06-16 13:44:32'),
	(6, 4, 2, 1, NULL, 6500.00, '2026-06-16 13:48:47', '2026-06-16 13:48:47'),
	(7, 5, 2, 2, NULL, 6500.00, '2026-06-16 13:53:12', '2026-06-16 13:53:12'),
	(8, 6, 2, 1, NULL, 6500.00, '2026-06-16 13:58:25', '2026-06-16 13:58:25'),
	(9, 7, 2, 1, NULL, 6500.00, '2026-06-16 14:00:34', '2026-06-16 14:00:34'),
	(10, 8, 1, 1, NULL, 50000.00, '2026-06-16 14:05:30', '2026-06-16 14:05:30'),
	(11, 9, 1, 1, NULL, 50000.00, '2026-06-16 15:39:40', '2026-06-16 15:39:40'),
	(12, 9, 7, 1, NULL, 100000.00, '2026-06-16 15:39:40', '2026-06-16 15:39:40'),
	(13, 10, 2, 1, NULL, 6500.00, '2026-06-17 23:28:34', '2026-06-17 23:28:34'),
	(14, 11, 2, 1, NULL, 6500.00, '2026-06-18 04:06:04', '2026-06-18 04:06:04'),
	(15, 12, 1, 1, 'L', 50000.00, '2026-06-23 03:17:15', '2026-06-23 03:17:15'),
	(16, 13, 30, 1, 'M', 55000.00, '2026-06-23 03:42:02', '2026-06-23 03:42:02'),
	(17, 13, 4, 1, '34', 11000.00, '2026-06-23 03:42:02', '2026-06-23 03:42:02'),
	(18, 13, 4, 1, '30', 11000.00, '2026-06-23 03:42:02', '2026-06-23 03:42:02'),
	(19, 14, 2, 1, 'L', 6500.00, '2026-06-23 05:24:59', '2026-06-23 05:24:59'),
	(20, 14, 2, 1, 'S', 6500.00, '2026-06-23 05:24:59', '2026-06-23 05:24:59'),
	(21, 15, 1, 1, 'M', 50000.00, '2026-06-23 06:55:38', '2026-06-23 06:55:38');

-- Volcando datos para la tabla lisbon.orders: ~15 rows (aproximadamente)
INSERT INTO `orders` (`id`, `user_id`, `total`, `estado`, `nombre_completo`, `dni`, `direccion`, `ciudad`, `localidad`, `metodo_pago`, `created_at`, `updated_at`) VALUES
	(1, 3, 112000.00, 'confirmado', NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-16 13:36:22', '2026-06-16 13:36:22'),
	(2, 3, 150000.00, 'confirmado', NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-16 13:37:15', '2026-06-16 13:37:15'),
	(3, 3, 200000.00, 'confirmado', NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-16 13:44:32', '2026-06-16 13:44:32'),
	(4, 3, 6500.00, 'confirmado', NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-16 13:48:47', '2026-06-16 13:48:47'),
	(5, 3, 13000.00, 'confirmado', NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-16 13:53:12', '2026-06-16 13:53:12'),
	(6, 3, 6500.00, 'confirmado', NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-16 13:58:25', '2026-06-16 13:58:25'),
	(7, 3, 6500.00, 'confirmado', NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-16 14:00:34', '2026-06-16 14:00:34'),
	(8, 3, 50000.00, 'confirmado', NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-16 14:05:30', '2026-06-16 14:05:30'),
	(9, 3, 150000.00, 'confirmado', NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-16 15:39:40', '2026-06-16 15:39:40'),
	(10, 3, 6500.00, 'confirmado', NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-17 23:28:34', '2026-06-17 23:28:34'),
	(11, 3, 6500.00, 'confirmado', NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-18 04:06:04', '2026-06-18 04:06:04'),
	(12, 3, 50000.00, 'confirmado', 'joaquin Figueroa', '46076fhjf', 'las mantas 3151', 'corrientes', 'corrientes', 'tarjeta', '2026-06-23 03:17:15', '2026-06-23 03:17:15'),
	(13, 3, 77000.00, 'confirmado', 'joaquin Figueroa', '46076756', 'las mantas 3151', 'corrientes', 'corrientes', 'tarjeta', '2026-06-23 03:42:02', '2026-06-23 03:42:02'),
	(14, 3, 13000.00, 'confirmado', 'joaquin Figueroa', '460767998', 'los calchaquies 22', 'Corrientes', 'Corrientes', 'tarjeta', '2026-06-23 05:24:59', '2026-06-23 05:24:59'),
	(15, 3, 50000.00, 'confirmado', 'joaquin Figueroa', '460767998', 'las mantas 3151', 'corrientes', 'corrientes', 'tarjeta', '2026-06-23 06:55:38', '2026-06-23 06:55:38');

-- Volcando datos para la tabla lisbon.password_reset_tokens: ~0 rows (aproximadamente)

-- Volcando datos para la tabla lisbon.products: ~32 rows (aproximadamente)
INSERT INTO `products` (`id`, `name`, `description`, `price`, `stock`, `stock_talles`, `talles`, `image`, `images`, `category_id`, `genero`, `active`, `created_at`, `updated_at`) VALUES
	(1, 'Remera Negra Básica', 'Remera de algodón 100%, corte regular, oversize', 50000.00, 3, '{"XS":1,"S":1,"M":0,"L":0,"XL":1}', 'XS,S,M,L,XL', 'remera1.jpg', NULL, 1, 'hombre', 1, '2026-06-16 09:32:11', '2026-06-23 06:55:38'),
	(2, 'Remera Blanca Oversize', 'Remera oversize, tela premium', 6500.00, 3, '{"XS":1,"S":0,"M":1,"L":0,"XL":1}', 'XS,S,M,L,XL', 'remera2.jpg', NULL, 1, 'hombre', 1, '2026-06-16 09:32:11', '2026-06-23 05:24:59'),
	(3, 'Jean Azul Slim', 'Jean slim fit, tiro medio', 12000.00, 10, '{"28":2,"30":2,"32":2,"34":2,"36":2}', '28,30,32,34,36', 'pantalon1.jpeg', NULL, 2, 'hombre', 1, '2026-06-16 09:32:11', '2026-06-23 04:47:17'),
	(4, 'Jean Negro Recto', 'Jean recto, corte clásico', 11000.00, 3, '{"28":1,"30":0,"32":1,"34":0,"36":1}', '28,30,32,34,36', 'pantalon2.jpeg', NULL, 2, 'hombre', 1, '2026-06-16 09:32:11', '2026-06-23 04:47:17'),
	(5, 'Buzo Hoodie Gris', 'Hoodie con capucha, tela frizada', 9000.00, 12, '{"S":2,"M":2,"L":2,"XL":2,"XXL":2}', 'S,M,L,XL,XXL', 'buzo1.jpg', NULL, 3, 'hombre', 1, '2026-06-16 09:32:11', '2026-06-23 04:47:17'),
	(6, 'Gorra Negra', 'Gorra snapback, talla única', 3500.00, 25, NULL, NULL, NULL, NULL, 4, 'hombre', 1, '2026-06-16 09:32:11', '2026-06-23 04:47:17'),
	(7, 'Remera Off white', 'Remera off white , de algodon egipcion con costrura y manufactura italiana', 100000.00, 1, '{"XS":1,"S":1,"M":1,"L":1,"XL":1}', 'XS,S,M,L,XL', 'remera3.jpeg', NULL, 1, 'hombre', 1, '2026-06-16 11:50:31', '2026-06-23 04:47:17'),
	(8, 'Remera Essential', 'Remera de algodón peinado, corte regular. Tela suave y duradera.', 7200.00, 18, '{"XS":3,"S":3,"M":3,"L":3,"XL":3}', 'XS,S,M,L,XL', 'remera4.jpg', NULL, 1, 'hombre', 1, '2026-06-18 14:59:40', '2026-06-23 04:47:17'),
	(9, 'Remera Básica', 'Remera lisa de uso diario, 100% algodón orgánico.', 5800.00, 22, '{"XS":3,"S":3,"M":3,"L":3,"XL":3,"XXL":3}', 'XS,S,M,L,XL,XXL', 'remera5.jpg', NULL, 1, 'hombre', 1, '2026-06-18 14:59:40', '2026-06-23 04:47:17'),
	(10, 'Remera Técnica', 'Remera técnica con tela stretch. Ideal para deporte y lifestyle.', 9500.00, 14, '{"S":3,"M":3,"L":3,"XL":3}', 'S,M,L,XL', 'remera7.webp', NULL, 1, 'hombre', 1, '2026-06-18 14:59:40', '2026-06-23 04:47:17'),
	(11, 'Remera Premium Lavada', 'Remera con lavado especial. Efecto vintage, corte oversize.', 11000.00, 10, '{"S":2,"M":2,"L":2,"XL":2}', 'S,M,L,XL', 'remera8.jpg', '["remera8.jpg","remera8,2.jpg"]', 1, 'hombre', 1, '2026-06-18 14:59:40', '2026-06-23 04:47:17'),
	(12, 'Remera Minimalista', 'Remera con gráfico minimalista bordado. Tela pesada 220g.', 10500.00, 12, '{"XS":2,"S":2,"M":2,"L":2,"XL":2}', 'XS,S,M,L,XL', 'remera9.jpg', '["remera9.jpg","remera9,2.webp"]', 1, 'hombre', 1, '2026-06-18 14:59:40', '2026-06-23 04:47:17'),
	(13, 'Remera Signature', 'Remera signature de la colección. Detalle en contraste en cuello.', 12500.00, 8, '{"XS":1,"S":1,"M":1,"L":1,"XL":1}', 'XS,S,M,L,XL', 'remera10.webp', '["remera10.webp","remera10,2.webp"]', 1, 'hombre', 1, '2026-06-18 14:59:40', '2026-06-23 04:47:17'),
	(14, 'Remera Mujer Básica', 'Remera femenina de corte recto, tela suave 180g.', 6000.00, 20, '{"XS":5,"S":5,"M":5,"L":5}', 'XS,S,M,L', 'mremera1.jpg', NULL, 1, 'mujer', 1, '2026-06-18 14:59:40', '2026-06-23 04:47:17'),
	(15, 'Remera Mujer Oversize', 'Remera oversize femenina, hombros caídos. Estilo editorial.', 8000.00, 16, '{"XS":4,"S":4,"M":4,"L":4}', 'XS,S,M,L', 'mremera2.jpg', NULL, 1, 'mujer', 1, '2026-06-18 14:59:40', '2026-06-23 04:47:17'),
	(16, 'Remera Mujer Clásica', 'Remera femenina con escote redondo. Algodón peinado premium.', 7000.00, 18, '{"XS":3,"S":3,"M":3,"L":3,"XL":3}', 'XS,S,M,L,XL', 'mremera3.jpg', NULL, 1, 'mujer', 1, '2026-06-18 14:59:40', '2026-06-23 04:47:17'),
	(17, 'Remera Mujer Essential', 'Remera femenina esencial de temporada. Corte entallado.', 7500.00, 15, '{"XS":3,"S":3,"M":3,"L":3}', 'XS,S,M,L', 'mremera4.jpg', NULL, 1, 'mujer', 1, '2026-06-18 14:59:40', '2026-06-23 04:47:17'),
	(18, 'Remera Mujer Sport', 'Remera deportiva femenina, tela dry-fit. Corte ajustado.', 9000.00, 12, '{"XS":3,"S":3,"M":3,"L":3}', 'XS,S,M,L', 'meremera5.jpg', NULL, 1, 'mujer', 1, '2026-06-18 14:59:40', '2026-06-23 04:47:17'),
	(19, 'Jean Wide Leg', 'Jean de tiro alto y pierna ancha. Corte moderno y cómodo.', 14500.00, 10, '{"XS":2,"S":2,"M":2,"L":2,"XL":2}', 'XS,S,M,L,XL', 'pantalon3.jpg', NULL, 2, 'hombre', 1, '2026-06-18 14:59:40', '2026-06-23 04:47:17'),
	(20, 'Pantalón Cargo', 'Pantalón cargo con bolsillos laterales. Tela resistente.', 16000.00, 9, '{"S":2,"M":2,"L":2,"XL":2}', 'S,M,L,XL', 'pantalon4.jpg', '["pantalon4.jpg","pantalon4,2.jpg"]', 2, 'hombre', 1, '2026-06-18 14:59:40', '2026-06-23 04:47:17'),
	(21, 'Pantalón Chino', 'Pantalón chino de corte slim. Versátil para toda ocasión.', 13500.00, 11, '{"S":2,"M":2,"L":2,"XL":2,"XXL":2}', 'S,M,L,XL,XXL', 'pantalon5.jpg', '["pantalon5.jpg","pantalon5,2.jpg"]', 2, 'hombre', 1, '2026-06-18 14:59:40', '2026-06-23 04:47:17'),
	(22, 'Buzo Zip', 'Buzo con cierre central. Capucha y bolsillos canguro.', 11500.00, 14, '{"S":2,"M":2,"L":2,"XL":2,"XXL":2}', 'S,M,L,XL,XXL', 'buzo2.jpg', NULL, 3, 'hombre', 1, '2026-06-18 14:59:40', '2026-06-23 04:47:17'),
	(23, 'Buzo Oversize Blanco', 'Buzo oversize sin capucha. Corte boxy, tela frizada pesada.', 10500.00, 16, '{"S":4,"M":4,"L":4,"XL":4}', 'S,M,L,XL', 'buzo3.jpeg', NULL, 3, 'hombre', 1, '2026-06-18 14:59:40', '2026-06-23 04:47:17'),
	(24, 'Campera Oversize Negro', 'Campera de corte oversize, tela densa. Cierre YKK.', 38000.00, 9, '{"S":3,"M":2,"L":2,"XL":2}', 'S,M,L,XL', 'campera1.jpg', NULL, 5, 'hombre', 1, '2026-06-18 14:59:40', '2026-06-23 05:16:35'),
	(25, 'Campera Cuero', 'Campera de cuero sintético premium. Forro interior.', 45000.00, 5, '{"S":1,"M":1,"L":1,"XL":1}', 'S,M,L,XL', 'campera2.jpg', NULL, 5, 'hombre', 1, '2026-06-18 14:59:40', '2026-06-23 04:47:17'),
	(26, 'Campera Denim', 'Campera de denim lavado. Corte clásico, botones metálicos.', 22000.00, 10, '{"XS":2,"S":2,"M":2,"L":2,"XL":2}', 'XS,S,M,L,XL', 'campera3.jpg', NULL, 5, 'hombre', 1, '2026-06-18 14:59:40', '2026-06-23 04:47:17'),
	(27, 'Campera Bomber', 'Campera bomber con elásticos en puños y cintura.', 32000.00, 7, '{"S":1,"M":1,"L":1,"XL":1}', 'S,M,L,XL', 'campera4.jpg', NULL, 5, 'hombre', 1, '2026-06-18 14:59:40', '2026-06-23 04:47:17'),
	(28, 'Campera Técnica', 'Campera técnica impermeable. Capucha ajustable, costuras selladas.', 38000.00, 6, '{"S":1,"M":1,"L":1,"XL":1}', 'S,M,L,XL', 'campera5.webp', '["campera5.webp","campera5,2.webp"]', 5, 'hombre', 1, '2026-06-18 14:59:40', '2026-06-23 04:47:17'),
	(29, 'Campera Impermeable', 'Campera de lluvia ultraliviana. Plegable, bolsillo frontal.', 34000.00, 8, '{"XS":1,"S":1,"M":1,"L":1,"XL":1}', 'XS,S,M,L,XL', 'campera6.webp', '["campera6.webp","campera6,2.webp"]', 5, 'hombre', 1, '2026-06-18 14:59:40', '2026-06-23 04:47:17'),
	(30, 'Campera Premium', 'Campera de temporada, exterior técnico y forro polar. Diseño exclusivo.', 55000.00, 3, '{"S":1,"M":0,"L":1,"XL":1}', 'S,M,L,XL', 'campera7.jpg', '["campera7.jpg","campera7,2.webp","campera7,3.jpg"]', 5, 'hombre', 1, '2026-06-18 14:59:40', '2026-06-23 04:47:17'),
	(31, 'Campera Básica', 'Campera esencial de la colección. Sin capucha, corte recto.', 19000.00, 12, '{"S":2,"M":2,"L":2,"XL":2,"XXL":2}', 'S,M,L,XL,XXL', 'campera8.webp', NULL, 5, 'hombre', 1, '2026-06-18 14:59:40', '2026-06-23 04:47:17'),
	(32, 'Bernie Tee', 'Camiseta Estampada con Logo Bernie en grande', 140000.00, 10, '{"S":5,"M":2,"L":1,"XL":2}', 'S,M,L,XL', '1782082477_image0.jpeg', NULL, 1, 'hombre', 1, '2026-06-22 01:48:59', '2026-06-23 04:47:17');

-- Volcando datos para la tabla lisbon.sessions: ~12 rows (aproximadamente)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('2BWUvIrJSe8GH9s3YhAog7ihjdTRl8U4W1bYKTGs', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJaS09nb2U2ck50MDhGRFFlOXJHMmhWWHRFZ0dWWlI1WkNYUjk4WFN5IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL3Byb3llY3RvLXRpZW5kYS1yb3BhLnRlc3RcL2xvZ2luIiwicm91dGUiOiJsb2dpbiJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX0sInVybCI6eyJpbnRlbmRlZCI6Imh0dHA6XC9cL3Byb3llY3RvLXRpZW5kYS1yb3BhLnRlc3RcL2FkbWluXC9wcm9kdWN0b3MifX0=', 1781785780),
	('7c3I5CSwA2VQxNAqFYHqtOznEfKuhsc90N5vFXmG', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJNRkFsbnh0aFJKdnpLbjlsTmY5Q2U4RjFNbXozSWo2eDRMMzB0SXZDIiwidXJsIjp7ImludGVuZGVkIjoiaHR0cDpcL1wvcHJveWVjdG8tdGllbmRhLXJvcGEudGVzdFwvYWRtaW5cL3Byb2R1Y3RvcyJ9LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvcHJveWVjdG8tdGllbmRhLXJvcGEudGVzdFwvbG9naW4iLCJyb3V0ZSI6ImxvZ2luIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1782104559),
	('c297Ct7R0mEuGS6IehXaky84JJ6RV83fDoeKcGHi', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiI4dnNQck5CbndMNHNMWmpiMVUzMUV5WHJJYktQbDB0VU5sTjRZcHZOIiwidXJsIjp7ImludGVuZGVkIjoiaHR0cDpcL1wvcHJveWVjdG8tdGllbmRhLXJvcGEudGVzdFwvYWRtaW4ifSwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL3Byb3llY3RvLXRpZW5kYS1yb3BhLnRlc3RcL2FkbWluIiwicm91dGUiOm51bGx9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoxfQ==', 1782214461),
	('FtUeqBFgBEkiH25OSJhvzrArNb9YCx3Rc5rCngI5', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJOVWFlUXptQkZGTU5KS1VrM2lpem5uNHRVME5qZ0JTdm8zUnJNN2RBIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL3Byb3llY3RvLXRpZW5kYS1yb3BhLnRlc3RcL2FkbWluIiwicm91dGUiOm51bGx9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoxfQ==', 1781761346),
	('hdoPF8GZUJ0ROpwrO9Rat94rJ5kobtMIamoka9vr', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJFaFFrWml0ekpwRjBTbllsY1lKT0RLcjNhM1pIcE1UcWFrNHVWTjVkIiwidXJsIjp7ImludGVuZGVkIjoiaHR0cDpcL1wvcHJveWVjdG8tdGllbmRhLXJvcGEudGVzdFwvYWRtaW4ifSwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL3Byb3llY3RvLXRpZW5kYS1yb3BhLnRlc3RcL2FkbWluXC9wcm9kdWN0b3M/YnVzY2FyPXJlbWVyYSZjYXRlZ29yaWE9JmVzdGFkbz0mZ2VuZXJvPSIsInJvdXRlIjpudWxsfSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6MX0=', 1782282363),
	('lCggrcN6iUBNCPL7M58xJ7GsfzboGTVWxvWlMSX4', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiI0OWFwMWIyMnkwOXBvdzZXcTl5OFpuUE5SYnVDZ2FadmZua2JEOUx5IiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvcHJveWVjdG8tdGllbmRhLXJvcGEudGVzdFwvY29uc3VsdGFzIiwicm91dGUiOm51bGx9LCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6MX0=', 1781744898),
	('PA7f4DEYeH6IUol4oBEbl6PqIlzPZaleagCYOiVc', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJJbGlTcFJnZ0hSY2QwbWNtOXM2Q2R1MW5SWGJZS0NoQkVqcVlMSnVoIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL3Byb3llY3RvLXRpZW5kYS1yb3BhLnRlc3RcL2FkbWluIiwicm91dGUiOm51bGx9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1781784638),
	('r2rcav3vtCqUF28TQcBlNT3RlJHcen46uejZMUnh', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJhODVUR2xNVENvaGNzMm1kTEZBU281SWdxSVFhN0RWbk93Wk8yaTBFIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL3Byb3llY3RvLXRpZW5kYS1yb3BhLnRlc3RcL2xvZ2luIiwicm91dGUiOiJsb2dpbiJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1781940966),
	('tv4BicdDBFGoLxWkOFe38lzb5iwL2xUKh6yFAj7p', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJ6dGNqQmVBazdyQU5FZE96dDJmZHdxNk9KY0RpbUJrRGIxc3dTWVg1IiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvcHJveWVjdG8tdGllbmRhLXJvcGEudGVzdFwvYWRtaW4iLCJyb3V0ZSI6bnVsbH0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoxfQ==', 1782188564),
	('U3FnaGup6nQG9QEJSdyEOVa8bQS7t5I9KgTjDPPG', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJpWHFzZ3pxZWV3Y3ozTXB4a011SkVVNkRMYXhKRHhDMTRhcDlyN3NVIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL3Byb3llY3RvLXRpZW5kYS1yb3BhLnRlc3RcL2FkbWluXC9wcm9kdWN0b3NcL2NyZWFyIiwicm91dGUiOm51bGx9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoxfQ==', 1782082514),
	('XK1ZCiD1PXKImQ1nXqDrZ2ZpM4i9vLWFaQgBPvfR', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJJVVFaQmt5VlI4WXEzaUpFd2tIYXh1ZkJDZ2R2eE9DOHgydVkzVE1GIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL3Byb3llY3RvLXRpZW5kYS1yb3BhLnRlc3RcL3JlZ2lzdHJvIiwicm91dGUiOm51bGx9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1781988144),
	('yOJAozMEJWB6K8V54y3fywavxIvQLVigrfQrE583', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.28.0 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'eyJfdG9rZW4iOiJoNENuUjhkMGxXVXBrU0FzTEprT1Z1QWdyZm9yUEtHV2F2VTVhaTJkIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL3Byb3llY3RvLXRpZW5kYS1yb3BhLnRlc3RcLz9oZXJkPXByZXZpZXciLCJyb3V0ZSI6bnVsbH0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1782173689);

-- Volcando datos para la tabla lisbon.users: ~3 rows (aproximadamente)
INSERT INTO `users` (`id`, `name`, `email`, `telefono`, `dni`, `direccion`, `ciudad`, `localidad`, `email_verified_at`, `password`, `rol`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Joaquin Gottoli', 'joaquingottoli06@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$12$FvvBP/JHQlmtv69/flQDzOKTQKtfd2Gbv2cLsvNv.JPStGH/zHjge', 'admin', NULL, '2026-06-16 08:56:48', '2026-06-16 09:11:40'),
	(2, 'Test User', 'test@example.com', NULL, NULL, NULL, NULL, NULL, '2026-06-16 09:29:22', '$2y$12$HGf4KrPUklR3Uys3Z0RVvOkRc5lSUgh29lLwe3RXgnoGMI8pyMdMC', 'cliente', '7CqQL7SZTk', '2026-06-16 09:29:23', '2026-06-16 09:29:23'),
	(3, 'joaquin Figueroa', 'joaquigot@hotmail.com', '37957875484', '460767998', 'los calchaquies 22', 'Corrientes', 'Corrientes', NULL, '$2y$12$dZ3Pml6ZgZLcfA4q84w9POmFIFl2HVaMDxAJn9WCeaMzMy0yrFMSK', 'cliente', NULL, '2026-06-16 11:01:29', '2026-06-23 05:18:52');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
