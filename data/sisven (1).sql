-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-08-2023 a las 00:37:37
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sisven`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_detalle_temp` (IN `codigo` INT, IN `cantidad` INT, IN `token_user` INT)   begin
    declare precio_actual decimal(10,2);
    declare precio_compra decimal(10,2);
    declare unidad_med varchar(5);
    select preuni into precio_compra from productos where id_Producto = codigo;
    select cosuni into precio_actual from productos where id_Producto = codigo;
    select unimed into unidad_med from productos where id_Producto = codigo;
    insert into tmp2(id, idproducto, unimed, cant, preuni, cosuni) values (token_user, codigo, unidad_med, cantidad, precio_compra, precio_actual);

    select tmpd.id, tmpd.idproducto, p.nomproducto, tmpd.cant, tmpd.preuni from tmp2 tmpd
    inner join producto p on tmpd.idproducto = p.idProducto
    where tmpd.id = token_user;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boleta_venta`
--

CREATE TABLE `boleta_venta` (
  `Id_boleta` int(11) NOT NULL,
  `indice` varchar(10) NOT NULL DEFAULT 'B-901'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idCliente` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `ruc` varchar(11) NOT NULL,
  `dircliente` varchar(64) NOT NULL,
  `telcliente` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idCliente`, `nombre`, `ruc`, `dircliente`, `telcliente`) VALUES
(5, 'DAVID', 'LA JOYA', '10730239373', '928854362'),
(8, 'MERLY', 'Jose luis B', '10730985612', '928854362');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `idCompra` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `idProveedor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprobante_venta`
--

CREATE TABLE `comprobante_venta` (
  `Id_comprobante` int(11) NOT NULL,
  `indice` varchar(10) NOT NULL DEFAULT 'C-901'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallecompras`
--

CREATE TABLE `detallecompras` (
  `idDetalleCompra` int(11) NOT NULL,
  `idCompra` int(11) DEFAULT NULL,
  `idProducto` int(11) DEFAULT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventas`
--

CREATE TABLE `detalleventas` (
  `idDetalleVenta` int(11) NOT NULL,
  `idVenta` int(11) DEFAULT NULL,
  `idProducto` int(11) DEFAULT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE `documentos` (
  `idDocumento` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `num_actual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `documentos`
--

INSERT INTO `documentos` (`idDocumento`, `nombre`, `num_actual`) VALUES
(1, 'FACTURA DE VENTA', 0),
(2, 'BOLETA DE VENTA', 0),
(3, 'COMPROBANTE DE VENTA', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `idEmpleado` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `telefono` varchar(9) DEFAULT NULL,
  `direccion` varchar(128) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`idEmpleado`, `nombre`, `telefono`, `direccion`, `usuario`, `password`) VALUES
(1, 'ANA MIRANDA MORALES', '789451612', 'CALLE LOS CRISTALES 459', 'amiranda', '$2y$10$Nbcfcq421KGVhT5NeX7KVu8ys6xDN.U0BkFTPd/20NXgMMS8IIe56'),
(2, 'PEDRO GONZALES QUISPE', '987456123', 'AV. PIZARRO 450 JLBYR', 'pedro', '$2y$10$hhY/R7nndBhoOItUvnscB.eDCVmTYpVOWwRNWUgwsgjmkbgmbb2S.'),
(4, 'YANY VARGAS ABARCA', '977943112', 'URB.VILLA JABIRU D-3', 'pattyva', '$2y$10$3/YOfTQoOC16TBDIIfW5vOlxPXlOS/vVnqe.Ve2dMtPqYG9GtkBL.'),
(18, 'MERLY', '936040492', 'URB.VILLA JABIRU D-3', 'merva', '$2y$10$klTWE/i7Me7QFjZf37fGE.t/xx1T/9259QSK5xEUFunp7DqXnyFpO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_venta`
--

CREATE TABLE `factura_venta` (
  `Id_factura` int(11) NOT NULL,
  `indice` varchar(11) NOT NULL DEFAULT 'F-901'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineas`
--

CREATE TABLE `lineas` (
  `idLinea` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `lineas`
--

INSERT INTO `lineas` (`idLinea`, `nombre`) VALUES
(2, 'LIMPIEZA'),
(3, 'CONFITERIA'),
(4, 'ABARROTES');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProducto` int(11) NOT NULL,
  `nomproducto` varchar(50) NOT NULL,
  `unimed` varchar(15) NOT NULL,
  `stock` int(11) NOT NULL,
  `preuni` decimal(10,4) NOT NULL,
  `cosuni` decimal(10,4) NOT NULL,
  `idLinea` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProducto`, `nomproducto`, `unimed`, `stock`, `preuni`, `cosuni`, `idLinea`) VALUES
(5, 'ACEITE VEGETAL PRIMOR PREMIUN', 'LT', 100, '12.5000', '10.5000', NULL),
(7, 'HARINA PREPARADA BLANCA FLOR', 'KG', 120, '4.8000', '3.5000', NULL),
(8, 'ACEITE DE OLIVA IMPORTADO', 'LT', 120, '15.4000', '12.3000', NULL),
(12, 'LEJIA CLOROX 5L', 'UNID', 150, '14.3000', '16.9000', NULL),
(29, 'AZUCAR', 'KG', 50, '1.9000', '2.5000', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `idProveedor` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `idLinea` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`idProveedor`, `nombre`, `idLinea`) VALUES
(2, 'MAS VENTAS', 4),
(4, 'ECOBESA', 1),
(5, 'GLORIA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmp2`
--

CREATE TABLE `tmp2` (
  `id` int(11) DEFAULT NULL,
  `idproducto` int(11) DEFAULT NULL,
  `unimed` varchar(10) DEFAULT NULL,
  `cant` decimal(5,2) DEFAULT NULL,
  `preuni` decimal(5,0) DEFAULT NULL,
  `cosuni` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `idVenta` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `idCliente` int(11) DEFAULT NULL,
  `idEmpleado` varchar(25) DEFAULT NULL,
  `idDocumento` int(11) DEFAULT NULL,
  `Importe` decimal(10,0) NOT NULL,
  `igv` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`idVenta`, `fecha`, `idCliente`, `idEmpleado`, `idDocumento`, `Importe`, `igv`) VALUES
(1, '2023-07-27', 0, '0', 0, '0', '4'),
(52, '2023-08-06', 8, '0', 0, '52', '8'),
(56, '0000-00-00', 8, '0', 0, '44', '7'),
(60, '0000-00-00', 8, '', 0, '44', '7');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `boleta_venta`
--
ALTER TABLE `boleta_venta`
  ADD PRIMARY KEY (`Id_boleta`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`idCompra`),
  ADD KEY `idProveedor` (`idProveedor`);

--
-- Indices de la tabla `comprobante_venta`
--
ALTER TABLE `comprobante_venta`
  ADD PRIMARY KEY (`Id_comprobante`);

--
-- Indices de la tabla `detallecompras`
--
ALTER TABLE `detallecompras`
  ADD PRIMARY KEY (`idDetalleCompra`);

--
-- Indices de la tabla `detalleventas`
--
ALTER TABLE `detalleventas`
  ADD PRIMARY KEY (`idDetalleVenta`);

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`idDocumento`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`idEmpleado`);

--
-- Indices de la tabla `factura_venta`
--
ALTER TABLE `factura_venta`
  ADD PRIMARY KEY (`Id_factura`);

--
-- Indices de la tabla `lineas`
--
ALTER TABLE `lineas`
  ADD PRIMARY KEY (`idLinea`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProducto`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`idProveedor`),
  ADD KEY `proveedores_ibfk_1` (`idLinea`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`idVenta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `boleta_venta`
--
ALTER TABLE `boleta_venta`
  MODIFY `Id_boleta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `idCompra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comprobante_venta`
--
ALTER TABLE `comprobante_venta`
  MODIFY `Id_comprobante` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `idEmpleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `factura_venta`
--
ALTER TABLE `factura_venta`
  MODIFY `Id_factura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lineas`
--
ALTER TABLE `lineas`
  MODIFY `idLinea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `idProveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `idVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
