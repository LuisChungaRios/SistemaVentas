-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-07-2018 a las 08:33:26
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbsistema`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `idarticulo` int(11) NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `codigo` varchar(50) DEFAULT NULL,
  `nombre` varchar(100) NOT NULL,
  `stock` int(11) NOT NULL,
  `descripcion` varchar(256) DEFAULT NULL,
  `imagen` varchar(50) DEFAULT NULL,
  `condicion` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`idarticulo`, `idcategoria`, `codigo`, `nombre`, `stock`, `descripcion`, `imagen`, `condicion`) VALUES
(1, 1, '123231231', 'toshiba', 21, 'toshiba dell', '1529387948.jpg', 1),
(6, 1, '01', 'Notebook Dell inspiron15 5000 Gaming', 18, '15.6&quot; FHD, Intel Core i5-7300HQ 2.50GHz, 4GB DDR4. Disco duro 1TB SATA, video Nvidia GeForce GTX 1050 4GB GDDR5, Intel Dual Band 3165 Wireless 802.11ac, Bluetooth, cámara web. Sistema Operativo Windows 10 Home 64', '1530764153.jpg', 1),
(7, 1, '02', 'Notebook Lenovo Legion Y520,', 19, '15.6&quot; FHD, Intel Core i5-7300HQ 2.5GHz, 8GB DDR4, 1TB SATA. Video Nvidia CeForce GTX 1050 2GB GDDR5, Wireless 802.11 AC, Bluetooth, cámara web. Sistema Operativo Windows 10 Home 64-bits.', '1530764247.jpg', 1),
(8, 1, '03', 'Notebook Dell Inspiron 15 7000 Gaming', 18, 'Notebook Dell Inspiron 15 7000 Gaming, 15.6&quot; FHD, Intel Core i5-7300HQ 2.50GHz, 8GB DDR4 Unidad de estado solido 256GB SSD, video Nvidia GeForce GTX 1050 4GB GDDR5, Intel Dual Band 3165 Wireless 802.11ac, Bluetooth, cámara web. Sistema Operativo Wind', '1530764346.jpg', 1),
(9, 2, '04', 'HP Pavilion 24-r006la - Todo en uno', 18, 'HP Pavilion 24-r006la - Todo en uno - 1 x A9 9430 / 3.2 GHz RAM 6 GB-HDD 1 TB-grabadora de DVD-Radeon R5-GigE-WLAN: 802.11a/b/g/n/ac, Bluetooth 4.2-Win 10 Home 64 bit-monitor: LED 23.8&quot; 1920 x 1080 (Full HD)', '1530764463.jpg', 1),
(10, 2, '05', 'Lenovo 720-24IKB F0CM - Todo en uno', 20, 'Lenovo 720-24IKB F0CM - Todo en uno - 1 x Core i7 7700 / 3.6 GHz RAM 8 GB-HDD 2 TB-grabadora de DVD-GF GTX 960A-GigE-WLAN: Bluetooth 4.0, 802.11a/b/g/n/ac-Win 10 Home 64 bit-monitor: LED 23.8&quot; 1920 x 1080 (Full HD) pantalla táctil', '1530764528.jpg', 1),
(11, 2, '06', 'All-in-One Lenovo M910z', 20, 'All-in-One Lenovo M910z, 23.8&quot; Touch FHD, Intel Core i7-7700 3.6GHz, 8GB DDR4, 1TB SATA. DVD SuperMulti, video Intel HD Graphics 630, V-Pro, Intel Dual Band 8265 Wireless 802.11 ac, Bluetooth, cámara web, teclado y mouse USB. Sistema operativo Window', '1530764625.jpg', 1),
(12, 3, '07', 'Memoria Kingston', 20, 'KVR13N9S8/4, capacidad 4 GB, tipo DDR3, bus 1333 MHz, Cas Latency 9', '1530764761.jpg', 1),
(13, 3, '08', 'Memoria Kingston HyperX Fury', 20, 'Memoria Kingston HyperX Fury Blue, 4GB, DDR3, 1333 MHz, CL9', '1530764829.jpg', 1),
(14, 4, '09', 'Disco Duro Seagate St3320311cs 320Gb', 20, '5900 Rpm 8Mb Cache Sata 3.0Gb/S 3.5&quot; [ 3 ]', '1530764965.jpg', 1),
(15, 4, '10', 'Disco duro Toshiba', 18, 'HDWD105UZSVA, 500GB SATA, 7200 RPM, 3.5&quot;', '1530765027.jpg', 1),
(16, 5, '11', 'Procesador AMD A6-9500', 10, '3.50GHz, 1MB L2, 8 Cores, AM4, 28nm, 65W, caja. 2 cores CPU + 6 cores GPU, video integrado', '1530765152.jpg', 1),
(17, 5, '12', 'Procesador AMD A8-9600,', 10, '3.10GHz, 2MB L2, 10 Cores, AM4, 28nm, 65W, caja. 4 cores CPU + 6 cores GPU, video integrado', '1530765212.jpg', 1),
(18, 6, '13', 'Case  Corsair Carbide', 10, 'Series SPEC-04, Mid Tower, ATX, Negro/Rojo, USB 3.0, Audio. Panel lateral transparente', '1530765308.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(256) DEFAULT NULL,
  `condicion` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `nombre`, `descripcion`, `condicion`) VALUES
(1, 'Laptop', 'Laptops', 1),
(2, 'Computadoras', 'pc', 1),
(3, 'Memorias RAM', 'memorias ram', 1),
(4, 'Discos Duros', 'Hdd 1 tb', 1),
(5, 'Procesadores', 'Procesadores', 1),
(6, 'Cases', 'Cases pc', 1),
(7, 'Mainboards', 'Mainboards pc', 1),
(8, 'Memorias USB', 'Memorias usb', 1),
(9, 'Tarjetas de Video', 'Tarjetas', 1),
(10, 'Discos Duros Externos', 'HDD externos', 1),
(11, 'Monitores', 'Monitores todas las marcas', 1),
(12, 'Impresoras', 'Impresoras todas las marcas', 1),
(13, 'Cable de Red', 'Cables utp', 1),
(14, 'Mouse', 'Mouse', 1),
(15, 'Teclado', 'Teclado', 1),
(16, 'Multimedia', 'Mandos , etc', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correo`
--

CREATE TABLE `correo` (
  `idcorreo` int(11) NOT NULL,
  `idpersona` int(11) NOT NULL,
  `asunto` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `mensaje` varchar(300) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `correo`
--

INSERT INTO `correo` (`idcorreo`, `idpersona`, `asunto`, `mensaje`, `fecha`) VALUES
(1, 4, 'bienvenida', 'NUEVAS OFERTAS ESPERAN POR TI', '2018-07-05'),
(2, 4, 'bienvenida', 'Seguimos esperando tu respuesta', '2018-07-05'),
(3, 4, 'bienvenida3', 'adasd', '2018-07-05'),
(4, 4, 'bienvenida4', 'asdasd', '2018-07-05'),
(5, 4, 'bienvenida5', 'asdas', '2018-07-05'),
(6, 4, 'bienvenidar4', 'as', '2018-07-05'),
(7, 2, 'bienvenida', 'Hola', '2018-07-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ingreso`
--

CREATE TABLE `detalle_ingreso` (
  `iddetalle_ingreso` int(11) NOT NULL,
  `idingreso` int(11) NOT NULL,
  `idarticulo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_compra` decimal(11,2) NOT NULL,
  `precio_venta` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_ingreso`
--

INSERT INTO `detalle_ingreso` (`iddetalle_ingreso`, `idingreso`, `idarticulo`, `cantidad`, `precio_compra`, `precio_venta`) VALUES
(1, 1, 1, 5, '1500.00', '1600.00'),
(2, 2, 1, 10, '1500.00', '1700.00'),
(3, 3, 1, 15, '1500.00', '1600.00'),
(4, 4, 6, 10, '3300.00', '3600.00'),
(5, 4, 7, 10, '3600.00', '3900.00'),
(6, 4, 8, 10, '3900.00', '4200.00'),
(7, 4, 9, 10, '2700.00', '3100.00'),
(8, 5, 10, 10, '5000.00', '5500.00'),
(9, 5, 11, 10, '6000.00', '6500.00'),
(10, 6, 12, 10, '150.00', '170.00'),
(11, 6, 13, 10, '170.00', '190.00'),
(12, 7, 14, 10, '140.00', '170.00'),
(13, 7, 15, 10, '170.00', '200.00');

--
-- Disparadores `detalle_ingreso`
--
DELIMITER $$
CREATE TRIGGER `tr_updStockIngreso` AFTER INSERT ON `detalle_ingreso` FOR EACH ROW BEGIN
 UPDATE articulo SET stock = stock + NEW.cantidad 
 WHERE articulo.idarticulo = NEW.idarticulo;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `iddetalle_venta` int(11) NOT NULL,
  `idventa` int(11) NOT NULL,
  `idarticulo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_venta` decimal(11,2) NOT NULL,
  `descuento` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`iddetalle_venta`, `idventa`, `idarticulo`, `cantidad`, `precio_venta`, `descuento`) VALUES
(1, 1, 1, 2, '1600.00', '100.00'),
(2, 2, 1, 2, '1600.00', '100.00'),
(3, 3, 1, 15, '1700.00', '200.00'),
(4, 4, 6, 2, '3600.00', '0.00'),
(5, 4, 7, 1, '3900.00', '0.00'),
(6, 5, 8, 2, '4200.00', '0.00'),
(7, 6, 15, 2, '200.00', '0.00'),
(8, 7, 9, 2, '3100.00', '0.00');

--
-- Disparadores `detalle_venta`
--
DELIMITER $$
CREATE TRIGGER `tr_updStockVenta` AFTER INSERT ON `detalle_venta` FOR EACH ROW BEGIN
 UPDATE articulo SET stock = stock - NEW.cantidad 
 WHERE articulo.idarticulo = NEW.idarticulo;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso`
--

CREATE TABLE `ingreso` (
  `idingreso` int(11) NOT NULL,
  `idproveedor` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `tipo_comprobante` varchar(20) NOT NULL,
  `serie_comprobante` varchar(7) DEFAULT NULL,
  `num_comprobante` varchar(10) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `impuesto` decimal(4,2) NOT NULL,
  `total_compra` decimal(11,2) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ingreso`
--

INSERT INTO `ingreso` (`idingreso`, `idproveedor`, `idusuario`, `tipo_comprobante`, `serie_comprobante`, `num_comprobante`, `fecha_hora`, `impuesto`, `total_compra`, `estado`) VALUES
(1, 1, 2, 'Factura', '001', '0001', '2018-06-19 00:00:00', '18.00', '7500.00', 'Anulado'),
(2, 2, 2, 'Factura', '005', '0006', '2018-06-12 00:00:00', '18.00', '15000.00', 'Anulado'),
(3, 2, 2, 'Factura', '000010', '00010', '2018-06-19 00:00:00', '18.00', '22500.00', 'Anulado'),
(4, 12, 2, 'Boleta', '002', '1', '2018-07-04 00:00:00', '0.00', '135000.00', 'Aceptado'),
(5, 11, 2, 'Boleta', '002', '2', '2018-07-04 00:00:00', '0.00', '110000.00', 'Aceptado'),
(6, 10, 2, 'Boleta', '002', '3', '2018-07-04 00:00:00', '0.00', '3200.00', 'Aceptado'),
(7, 10, 2, 'Boleta', '002', '4', '2018-07-04 00:00:00', '0.00', '3100.00', 'Aceptado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `idpermiso` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`idpermiso`, `nombre`) VALUES
(1, 'Escritorio'),
(2, 'Almacen'),
(3, 'Compras'),
(4, 'Ventas'),
(5, 'Acceso'),
(6, 'Consultas Compras'),
(7, 'Consultas Ventas'),
(8, 'Mensajeria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idpersona` int(11) NOT NULL,
  `tipo_persona` varchar(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `tipo_documento` varchar(20) DEFAULT NULL,
  `num_documento` varchar(20) DEFAULT NULL,
  `direccion` varchar(70) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idpersona`, `tipo_persona`, `nombre`, `tipo_documento`, `num_documento`, `direccion`, `telefono`, `email`) VALUES
(1, 'Proveedor', 'desarrollo id SAC', 'DNI', '789456123', 'av wilson', '789456123', 'desait@gmail.com'),
(2, 'Proveedor', 'Santa Rosa SAC', 'RUC', '78945612345678', 'av. el muro 256 san juan de lurigancho', '987654321', 'santarosa@gmail.com'),
(3, 'Proveedor', 'El leon', 'RUC', '456897321', 'av. inca garcilazo de la vega 251', '98764321', 'elleon@gmail.com'),
(4, 'Cliente', 'Luis Alberto Chunga Rios', 'DNI', '75110092', 'mz c lote 11 AAHH sector y progreso los portales', '985325360', 'luischungacr7@gmail.com'),
(5, 'Cliente', 'gianella vargas', 'DNI', '75110093', '', '', 'giane@gmail.com'),
(6, 'Proveedor', 'Computec', 'DNI', '71215498', 'Av. Inca el sol 10', '987654322', 'computec@gmail.com'),
(7, 'Proveedor', 'solucionesomputec', 'RUC', '01751100651', 'av.Amancaes 12 stand 15', '321459786', 'solucionesomputec@gmail.com'),
(8, 'Proveedor', 'ventaspedrito', 'RUC', '023569852|', 'av.Piramide del sol 15 stand 10', '968532147', 'ventaspedro@gmail.com'),
(9, 'Proveedor', 'ventasonia', 'RUC', '02563565984', 'av.Garcilazo de la vega N1251', '998279303', 'ventasonia@gmail.com'),
(10, 'Proveedor', 'amg', 'RUC', '01426253584', 'Av.Garcilazo de la Vega N151', '981083694', 'amg53@hotmail.ces'),
(11, 'Proveedor', 'jashtech', 'RUC', '01245265587', 'jr . camana 1152 tda225', '981484238', 'jashtechimport@hotmail.com'),
(12, 'Proveedor', 'tecnologyadvance', 'RUC', '01023565698', 'compuplaza 1251 tda231', '946246935', 'marita_bin1@hotmail.com'),
(13, 'Cliente', 'Maria ochoa quispe', 'DNI', '96325841', '', '985741263', 'mariaochoa@gmail.com'),
(14, 'Cliente', 'javier soledad mamani', 'DNI', '98574612', '', '985746123', 'javiersoledad@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `tipo_documento` varchar(20) NOT NULL,
  `num_documento` varchar(20) NOT NULL,
  `direccion` varchar(70) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `cargo` varchar(20) DEFAULT NULL,
  `login` varchar(20) NOT NULL,
  `clave` varchar(64) NOT NULL,
  `condicion` tinyint(1) NOT NULL DEFAULT '1',
  `imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `tipo_documento`, `num_documento`, `direccion`, `telefono`, `email`, `cargo`, `login`, `clave`, `condicion`, `imagen`) VALUES
(1, 'maria', 'DNI', '789456123', '', '', '', '', 'maria', '94aec9fbed989ece189a7e172c9cf41669050495152bc4c1dbf2a38d7fd85627', 1, '1529388104.jpg'),
(2, 'luis', 'DNI', '75110092', '', '', '', '', 'luis', 'c5ff177a86e82441f93e3772da700d5f6838157fa1bfdc0bb689d7f7e55e7aba', 1, '1530767176.jpg'),
(3, 'estefany', 'DNI', '123456789', '', '', '', '', 'estefany', '080efe2b53db5884a05bf7b89c6eafe64b5b7b8198e05e2fa4b4293b21ce3e71', 1, '1530767164.png'),
(4, 'dina', 'DNI', '456789123', '', '', '', '', 'dina', '80a4109778cf5389682009f04031d6624b8298f150397196e4ffd4c1cab4c58d', 1, '1530767154.png'),
(5, 'dina2', 'DNI', '321654987', '', '', '', '', 'dina2', '0857581017b6445e2405898eb4db9ea41c1b285fbaaa099141a9059a04a8fdb6', 1, '1530767142.png'),
(6, 'pedro', 'DNI', '987321654', '', '', '', '', 'pedro', 'ee5cd7d5d96c8874117891b2c92a036f96918e66c102bc698ae77542c186f981', 1, '1530767129.png'),
(7, 'Mario', 'DNI', '98574125', 'av. los pinos mz c lote 11', '987456321', 'mario@gmail.com', '', 'mario', '59195c6c541c8307f1da2d1e768d6f2280c984df217ad5f4c64c3542b04111a4', 1, '1530767546.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_permiso`
--

CREATE TABLE `usuario_permiso` (
  `idusuario_permiso` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idpermiso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario_permiso`
--

INSERT INTO `usuario_permiso` (`idusuario_permiso`, `idusuario`, `idpermiso`) VALUES
(54, 1, 1),
(55, 1, 2),
(56, 1, 3),
(57, 1, 4),
(58, 1, 5),
(59, 1, 6),
(60, 1, 7),
(73, 6, 3),
(74, 6, 5),
(75, 6, 7),
(76, 5, 2),
(77, 4, 5),
(78, 3, 1),
(79, 3, 2),
(80, 3, 3),
(81, 3, 4),
(82, 3, 5),
(83, 3, 6),
(84, 3, 7),
(92, 7, 4),
(93, 2, 1),
(94, 2, 2),
(95, 2, 3),
(96, 2, 4),
(97, 2, 5),
(98, 2, 6),
(99, 2, 7),
(100, 2, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `idventa` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `tipo_comprobante` varchar(20) NOT NULL,
  `serie_comprobante` varchar(7) DEFAULT NULL,
  `num_comprobante` varchar(10) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `impuesto` decimal(4,2) NOT NULL,
  `total_venta` decimal(11,2) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`idventa`, `idcliente`, `idusuario`, `tipo_comprobante`, `serie_comprobante`, `num_comprobante`, `fecha_hora`, `impuesto`, `total_venta`, `estado`) VALUES
(1, 4, 2, 'Factura', '001', '00001', '2018-06-19 00:00:00', '18.00', '3100.00', 'Anulado'),
(2, 4, 2, 'Boleta', '002', '000002', '2018-06-19 00:00:00', '0.00', '3100.00', 'Aceptado'),
(3, 4, 2, 'Ticket', '005', '0005', '2018-06-19 00:00:00', '0.00', '25300.00', 'Aceptado'),
(4, 14, 2, 'Boleta', '001', '2', '2018-07-04 00:00:00', '0.00', '11100.00', 'Aceptado'),
(5, 13, 2, 'Factura', '002', '3', '2018-07-04 00:00:00', '18.00', '8400.00', 'Aceptado'),
(6, 4, 2, 'Ticket', '003', '06', '2018-06-28 00:00:00', '0.00', '400.00', 'Aceptado'),
(7, 5, 2, 'Ticket', '002', '6', '2018-06-29 00:00:00', '0.00', '6200.00', 'Aceptado');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`idarticulo`),
  ADD UNIQUE KEY `nombre_UNIQUE` (`nombre`),
  ADD KEY `fk_articulo_categoria_idx` (`idcategoria`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcategoria`),
  ADD UNIQUE KEY `nombre_UNIQUE` (`nombre`);

--
-- Indices de la tabla `correo`
--
ALTER TABLE `correo`
  ADD PRIMARY KEY (`idcorreo`),
  ADD KEY `fk_persona` (`idpersona`);

--
-- Indices de la tabla `detalle_ingreso`
--
ALTER TABLE `detalle_ingreso`
  ADD PRIMARY KEY (`iddetalle_ingreso`),
  ADD KEY `fk_detalle_ingreso_ingreso_idx` (`idingreso`),
  ADD KEY `fk_detalle_ingreso_articulo_idx` (`idarticulo`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`iddetalle_venta`),
  ADD KEY `fk_detalle_venta_venta_idx` (`idventa`),
  ADD KEY `fk_detalle_venta_articulo_idx` (`idarticulo`);

--
-- Indices de la tabla `ingreso`
--
ALTER TABLE `ingreso`
  ADD PRIMARY KEY (`idingreso`),
  ADD KEY `fk_ingreso_persona_idx` (`idproveedor`),
  ADD KEY `fk_ingreso_usuario_idx` (`idusuario`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`idpermiso`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idpersona`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `login_UNIQUE` (`login`);

--
-- Indices de la tabla `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  ADD PRIMARY KEY (`idusuario_permiso`),
  ADD KEY `fk_usuario_permiso_permiso_idx` (`idpermiso`),
  ADD KEY `fk_usuario_permiso_usuario_idx` (`idusuario`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`idventa`),
  ADD KEY `fk_venta_persona_idx` (`idcliente`),
  ADD KEY `fk_venta_usuario_idx` (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `idarticulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `correo`
--
ALTER TABLE `correo`
  MODIFY `idcorreo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `detalle_ingreso`
--
ALTER TABLE `detalle_ingreso`
  MODIFY `iddetalle_ingreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `iddetalle_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `ingreso`
--
ALTER TABLE `ingreso`
  MODIFY `idingreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `idpermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idpersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  MODIFY `idusuario_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `idventa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD CONSTRAINT `fk_articulo_categoria` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`idcategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `correo`
--
ALTER TABLE `correo`
  ADD CONSTRAINT `fk_persona` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`idpersona`);

--
-- Filtros para la tabla `detalle_ingreso`
--
ALTER TABLE `detalle_ingreso`
  ADD CONSTRAINT `fk_detalle_ingreso_articulo` FOREIGN KEY (`idarticulo`) REFERENCES `articulo` (`idarticulo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detalle_ingreso_ingreso` FOREIGN KEY (`idingreso`) REFERENCES `ingreso` (`idingreso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `fk_detalle_venta_articulo` FOREIGN KEY (`idarticulo`) REFERENCES `articulo` (`idarticulo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detalle_venta_venta` FOREIGN KEY (`idventa`) REFERENCES `venta` (`idventa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ingreso`
--
ALTER TABLE `ingreso`
  ADD CONSTRAINT `fk_ingreso_persona` FOREIGN KEY (`idproveedor`) REFERENCES `persona` (`idpersona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ingreso_usuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  ADD CONSTRAINT `fk_usuario_permiso_permiso` FOREIGN KEY (`idpermiso`) REFERENCES `permiso` (`idpermiso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_permiso_usuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `fk_venta_persona` FOREIGN KEY (`idcliente`) REFERENCES `persona` (`idpersona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_venta_usuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
