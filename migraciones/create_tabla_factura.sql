CREATE TABLE `factura` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `codigo` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT '',
  `fecha_emision` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;