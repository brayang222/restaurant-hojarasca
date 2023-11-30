-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2023 a las 00:12:56
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
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `idPedido` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `horaPedido` datetime NOT NULL,
  `productos` text NOT NULL,
  `mesa` int(11) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `telefono` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`idPedido`, `total`, `horaPedido`, `productos`, `mesa`, `direccion`, `nombre`, `telefono`) VALUES
(31, 33000, '2023-11-26 17:21:35', '\n              Ensalada verde             x 1, \n              Ensalada mediterranea             x 2, \n              Postre frutos rojos             x 2', 0, '', '', 0),
(33, 96000, '2023-11-26 17:21:43', '\n              Ensalada verde             x 1, \n              Ensalada mediterranea             x 2, \n              Pizza tradicional             x 2', 0, '', '', 0),
(34, 25000, '2023-11-26 20:54:12', '\n              Tradicional             x 1, \n              Ensalada verde             x 1', 0, '', '', 0),
(35, 41000, '2023-11-26 21:23:56', '\n              Carbonara             x 1, \n              Ensalada verde             x 1, \n              Postre frutos rojos             x 1', 0, '', '', 0),
(36, 51000, '2023-11-26 21:24:50', '\n              Carbonara             x 1, \n              Pasta pomodoro             x 1, \n              Postre frutos rojos             x 1', 0, '', '', 0),
(37, 17000, '2023-11-26 22:32:13', '\n              Postre frutos rojos             x 1, \n              Postre chocolate             x 1', 5, '', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idPlatillo` int(11) NOT NULL,
  `Tipo` varchar(100) DEFAULT NULL,
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

INSERT INTO `producto` (`idPlatillo`, `Tipo`, `Nombre`, `fechaCreacion`, `Ingredientes`, `Imagen`, `Descripcion`, `Precio`, `Descuento`) VALUES
(2, 'pasta', 'Pasta pomodoro', '2023-10-11', '200 gramos de pasta, 1 cucharada sopera de aceite de oliva, ½ pieza de cebolla picada. 1 diente de ajo picado, 3 piezas de jitomate picado', '../Fotos/pastaPomodoro.jpg', 'a', 20000, 0),
(4, 'pasta', 'Carbonara', '2023-11-25', '1 cucharada de sal kosher 12 onzas de espaguetis, bucatini o fettuccine 5 yemas de huevo grandes, a temperatura ambiente 1 taza de queso Pecorino Romano o parmesano recién rallado, además de más queso', '../Fotos/carbonara.webp', '', 23000, 0),
(5, 'pasta', 'Tradicional', '2023-11-25', '200g Pasta larga seca 55g Mantequilla 40g Queso parmesano Sal Pimienta negra molida', '../Fotos/tradicional.jpg', '', 15000, 0),
(6, 'ensalada', 'Ensalada verde', '0000-00-00', '1 cogollo de lechuga trocadero 1 pepino 1 aguacate 1/4 de cebolla 2 rabanitos', '../Fotos/ensaladaverde.jpg', '', 10000, 0),
(7, 'ensalada', 'Ensalada mediterranea', '2023-11-25', '200 g de tomates cherry 1 cebolla roja pequeña 1 zanahoria mediana 100 g de brotes de lechuga 10 aceitunas verdes', '../Fotos/ensalada-mediterranea.jpg', '', 13000, 0),
(8, 'ensalada', 'Ensalada waldorf', '0000-00-00', 'Lechuga Manzana Granny Smith Uvas Pasas Apio Nueces (ya peladas)', '../Fotos/waldorf.jpg', '', 15000, 0),
(9, 'pizza', 'Pizza napolitana', '2023-11-25', '340 g de agua 2 g levadura seca o media cucharadita 1 cucharadita de azúcar 450 g de harina de fuerza 50 g de sémola', '../Fotos/napolitana.jpg', '', 27000, 0),
(12, 'pizza', 'Pizza tradicional', '0000-00-00', '1 kg de farinha de trigo 300 ml de leite 3 1/2 de fermento de pão 1 colher de sopa de margarina 2 pitadas de sal', '../Fotos/pizza2.webp', '', 30000, 0),
(13, 'pizza', 'Pizza pepperoni', '0000-00-00', 'Ingredientes Para la masa de pizza (para 2 pizzas de 33 cm) 2 y 1/4 cucharaditas de levadura seca 2 cucharaditas de azúcar 375 ml de agua caliente (sin quemar)', '../Fotos/pizza-pepperoni.jpg', '', 32000, 0),
(14, 'postre', 'Postre frutos rojos', '2023-11-25', 'Postre frutos rojos', '../Fotos/postres3.webp', '500 gramos de yogur griego 1 sobre de gelatina sin sabor Galletas de dulce (al gusto) 75 gramos de mantequilla sin sal 500 gramos de frutos rojos', 8000, 0),
(15, 'postre', 'Postre chocolate', '2023-11-25', '500 gramos de yogur griego 1 sobre de gelatina sin sabor Galletas de dulce (al gusto) 75 gramos de mantequilla sin sal 500 gramos de frutos rojos', '../Fotos/postres2.webp', '', 9000, 0);

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
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idPedido`);

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
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idPlatillo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

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
