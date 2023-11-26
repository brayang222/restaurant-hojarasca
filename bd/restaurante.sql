-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-11-2023 a las 16:42:58
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `restaurante`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `CedulaCliente` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Telefono` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido`
--

CREATE TABLE `detalle_pedido` (
  `id` varchar(45) NOT NULL,
  `Pedido_idPedido` int(11) NOT NULL,
  `Producto_idPlatillo` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `CedulaEmpleado` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Rol` varchar(45) NOT NULL,
  `Chef` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `idPedido` int(11) NOT NULL,
  `Mesa` int(11) NOT NULL,
  `FechaPedido` date DEFAULT NULL,
  `TiempoEstimado` time DEFAULT NULL,
  `Total` decimal(20,0) NOT NULL,
  `Estado` varchar(45) NOT NULL,
  `Mesero` int(11) NOT NULL,
  `Cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idPlatillo` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `fechaCreacion` date NOT NULL,
  `Ingredientes` varchar(200) NOT NULL,
  `Imagen` varchar(200) NOT NULL,
  `Descripcion` varchar(200) NOT NULL,
  `Precio` decimal(15,0) NOT NULL,
  `Descuento` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idPlatillo`, `Nombre`, `fechaCreacion`, `Ingredientes`, `Imagen`, `Descripcion`, `Precio`, `Descuento`) VALUES
(2, 'Pasta pomodoro', '2023-10-11', '200 gramos de pasta, 1 cucharada sopera de aceite de oliva, ½ pieza de cebolla picada. 1 diente de ajo picado, 3 piezas de jitomate picado', '../Fotos/pastaPomodoro.jpg', 'a', 20000, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `IdUsuario` int(11) NOT NULL,
  `Correo` varchar(45) NOT NULL,
  `Clave` varchar(45) NOT NULL,
  `Direccion` varchar(45) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Telefono` int(11) NOT NULL,
  `Rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IdUsuario`, `Correo`, `Clave`, `Direccion`, `Nombre`, `Telefono`, `Rol`) VALUES
(1, 'brayangomez521@gmail.com', '123456', '', 'Brayan', 312617780, 1),
(2, 'usuario@gmail.com', '123456', '', 'Prueba user', 0, 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`CedulaCliente`);

--
-- Indices de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Pedido_has_Producto_Pedido1` (`Pedido_idPedido`),
  ADD KEY `fk_Pedido_has_Producto_Producto1` (`Producto_idPlatillo`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`CedulaEmpleado`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `Clientepedido` (`Cliente`),
  ADD KEY `MeseroPedido` (`Mesero`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idPlatillo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IdUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idPlatillo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD CONSTRAINT `fk_Pedido_has_Producto_Pedido1` FOREIGN KEY (`Pedido_idPedido`) REFERENCES `pedido` (`idPedido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Pedido_has_Producto_Producto1` FOREIGN KEY (`Producto_idPlatillo`) REFERENCES `producto` (`idPlatillo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `Clientepedido` FOREIGN KEY (`Cliente`) REFERENCES `cliente` (`CedulaCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `MeseroPedido` FOREIGN KEY (`Mesero`) REFERENCES `empleado` (`CedulaEmpleado`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
