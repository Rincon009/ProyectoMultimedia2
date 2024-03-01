-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-03-2024 a las 19:57:02
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `multimedia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canciones`
--

CREATE TABLE `canciones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `artista` varchar(255) NOT NULL,
  `album` varchar(255) DEFAULT NULL,
  `anio` year(4) NOT NULL,
  `caratula` varchar(255) NOT NULL,
  `song_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `canciones`
--

INSERT INTO `canciones` (`id`, `titulo`, `artista`, `album`, `anio`, `caratula`, `song_path`, `created_at`, `updated_at`) VALUES
(2, 'BEEF BOY-OFFICIAL STREET VIDEO', 'YUNG BEEF', NULL, '2016', 'public/caratulas/vP7sBIMvfdqPhGsOlEebTycHpokAeCMsUVQalknx.jpg', 'public/canciones/SLXpdCJw0loeVJc6dniGaAOMWnSrFtI0b80Qx98r.mp3', '2024-02-27 19:57:35', '2024-02-27 19:57:35'),
(3, 'Suchito Mission | GALLERY SESSION', 'Gloosito', NULL, '2021', 'public/caratulas/xAlepGxAjbgBdf5pbB8u84naStqp40SWnIOMZp2e.jpg', 'public/canciones/9POfHcOdJ1G2t2nUKHDONtjmlZWQmlLuJKb3j7eW.mp3', '2024-02-27 21:21:51', '2024-02-27 21:21:51'),
(5, 'In Da Club', '50 Cent', NULL, '2010', 'caratulasupload/1709318888_50centcancion.jpg', 'cancionesupload/1709318888_50 Cent - In Da Club (Official Music Video)_5qm8PH4xAss.mp3', '2024-03-01 17:48:08', '2024-03-01 17:48:08'),
(6, 'Soy Gitano', 'Camaron', NULL, '2015', 'caratulasupload/1709319040_camaron.jpg', 'cancionesupload/1709319040_Soy Gitano_1LO0ac6ynGs.mp3', '2024-03-01 17:50:40', '2024-03-01 17:50:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Romance', '2024-02-18 18:57:45', '2024-02-27 20:13:54'),
(2, 'Accion', '2024-02-20 17:21:46', '2024-02-20 17:21:46'),
(3, 'Crimen', '2024-02-26 22:34:06', '2024-02-26 22:34:06'),
(4, 'Ciencia Ficción', '2024-02-27 19:53:33', '2024-02-27 19:53:33'),
(6, 'Fantasia', '2024-02-27 21:00:10', '2024-02-27 21:00:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_15_230731_create_categorias_table', 1),
(6, '2024_02_15_230811_create_peliculas_table', 1),
(7, '2024_02_15_230832_create_canciones_table', 1),
(8, '2024_02_15_232056_add_movie_path_to_peliculas_table', 1),
(9, '2024_02_18_183850_add_song_path_to_canciones_table', 1),
(10, '2024_02_27_173523_no', 2),
(11, '2024_02_27_175700_create_canciones_table', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `director` varchar(255) NOT NULL,
  `fecha_lanzamiento` date NOT NULL,
  `categoria_id` bigint(20) UNSIGNED NOT NULL,
  `caratula` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `movie_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id`, `titulo`, `descripcion`, `director`, `fecha_lanzamiento`, `categoria_id`, `caratula`, `created_at`, `updated_at`, `movie_path`) VALUES
(2, 'Django Unchained', 'Un antiguo esclavo une sus fuerzas con un cazador de recompensas alemán que lo libera y ayuda a cazar a los criminales más buscados del Sur, todo ello con la esperanza de encontrar a su esposa perdida hace mucho tiempo.', 'Quentin Tarantino', '2013-01-18', 2, 'public/caratulas/BpNe4biGP88G8b9xlJBH0bZ1tPZptjIIiwPS8bmm.jpg', '2024-02-20 17:24:26', '2024-02-29 15:36:16', 'public/peliculas/uTxwZUFPEl2e6pAhd3W04dMfu1ghNfYcgDkVuRNj.mp4'),
(3, 'Get Rich or Die Tryin', 'Un huérfano, un chico de la calle, se convierte en un poderoso traficante de drogas, pero lo intenta dejar todo para perseguir una carrera musical.', 'Jim Sheridan', '2005-11-09', 3, 'public/caratulas/soAcSXkDsklru4k13vfGYRHAtBazs1Su55RbHHoA.jpg', '2024-02-26 22:42:06', '2024-02-26 22:42:06', 'public/peliculas/huVst5VpwttB7olAiReQ73Xntqo1jZw8tN4vxjgt.mp4'),
(4, 'El Señor de los Anillos: las dos torres', 'Los hobbits Frodo y Sam descubren que Gollum les está siguiendo. La criatura les promete guiarlos hasta las puertas de Mordor si después lo dejan libre. Aragorn, el elfo Legolas y Gimli el enano llegan al reino de Rohan y descubren que el rey Theoden está bajo el conjuro de Sarumán.', 'Peter Jackson', '2002-12-18', 6, 'public/caratulas/xYHVN2MfFWV1P8PMF5KLA20xWp8fziHaSdKAHCdr.jpg', '2024-02-27 21:02:33', '2024-02-27 21:02:33', 'public/peliculas/n7mZqVJVMwudICfdsgjVct5YdM6yLidfq50KqSnX.mp4'),
(5, 'Harry Potter and the Prisoner of Azkaban', 'El tercer año de estudios de Harry en Hogwarts se ve amenazado por la fuga de Sirius Black de la prisión para magos de Azkaban. Se trata de un peligroso mago que fue cómplice de Lord Voldemort y que intentará vengarse de Harry Potter.', 'Alfonso Cuarón', '2004-06-18', 6, 'public/caratulas/F5nnsWDy7n6uW42I1bAyJlVvmX5ri2cyDhwC7GAK.jpg', '2024-02-27 21:14:28', '2024-02-27 21:14:28', 'public/peliculas/OC5QesD1sv6svpHniAr2T54g04lOOv3nMP4CyN9c.mp4'),
(12, 'Titanic', 'Jack es un joven artista que gana un pasaje para viajar a América en el Titanic, el transatlántico más grande y seguro jamás construido.', 'James Cameron', '1998-01-08', 1, 'caratulasupload/titanic.png', '2024-03-01 17:36:43', '2024-03-01 17:36:43', 'peliculasupload/(y2save.net) Titanic Re estreno Tr iler Oficial Subtitulado.mp4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Admin', 'johndoe@example.com', NULL, '$2y$12$3ppUqDoDwYQID9VJVfJwIOKELYBVE.pRDrvQ01OGwZ7w43WV.5MC6', '3AkgmtbsXlDgQ8maoaoRNv0fjzineNP1Gp44iz4baOEmhFFotzGi0dzG5Iua', '2024-02-20 15:42:58', '2024-02-20 15:42:58'),
(4, 'Admin', 'admin@admin.com', NULL, '$2y$12$a1WKVqU6Ew.qDBatqYcyWueXBVDV59o0bvU/lQsaziZpn45j1oSVa', NULL, '2024-02-20 17:45:34', '2024-02-20 17:45:34'),
(5, 'Admin2', 'admin2@admin.com', NULL, '$2y$12$uStXr67wZ1XS/5IpcjWGi.LBZwE/SHmcRldTWL06BGg01ORJmM64i', NULL, '2024-02-27 22:00:41', '2024-02-27 22:00:41');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `canciones`
--
ALTER TABLE `canciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peliculas_categoria_id_foreign` (`categoria_id`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `canciones`
--
ALTER TABLE `canciones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD CONSTRAINT `peliculas_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
