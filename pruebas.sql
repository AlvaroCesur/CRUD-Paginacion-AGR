-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-01-2023 a las 13:23:03
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pruebas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_usuarios`
--

CREATE TABLE `datos_usuarios` (
  `id` int(3) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Direccion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `datos_usuarios`
--

INSERT INTO `datos_usuarios` (`id`, `Nombre`, `Apellido`, `Direccion`) VALUES
(1, 'Eduardo Ram', 'Garcia', 'Cibeles 6'),
(2, 'Javier', 'Reina', 'Malasaña 3'),
(3, 'Ana Maria', 'Reina', 'Casapalma 71');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_crud`
--

CREATE TABLE `login_crud` (
  `id` int(11) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `login_crud`
--

INSERT INTO `login_crud` (`id`, `usuario`, `pass`) VALUES
(1, 'Pepe', '123'),
(3, 'root', 'root'),
(4, 'Hola', '123'),
(5, 'Usuario', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `CODIGOARTICULO` varchar(4) DEFAULT NULL,
  `SECCION` varchar(12) DEFAULT NULL,
  `NOMBREARTICULO` varchar(19) DEFAULT NULL,
  `PRECIO` int(2) DEFAULT NULL,
  `FECHA` varchar(10) DEFAULT NULL,
  `IMPORTADO` varchar(9) DEFAULT NULL,
  `PAISDEORIGEN` varchar(10) DEFAULT NULL,
  `FOTO` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`CODIGOARTICULO`, `SECCION`, `NOMBREARTICULO`, `PRECIO`, `FECHA`, `IMPORTADO`, `PAISDEORIGEN`, `FOTO`) VALUES
('AR01', 'FERRETERIA ', 'DESTORNILLADOR ', 10, '05/10/2022', 'VERDADERO', 'ESPAÑITA', NULL),
('AR02', 'DEPORTES', 'RAQUETA', 23, '05/10/2022', 'VERDADERO', 'USA', NULL),
('AR03', 'JUGUETES', 'BALON BALONCESTO', 24, '05/10/2022', 'FALSO', 'JAPON', NULL),
('AR04', 'ROPA', 'CAMISETA FUTBOL', 25, '05/10/2022', 'VERDADERO', 'FRANCIA', NULL),
('AR05', 'ALIMENTACION', 'NARANJAS', 10, '05/10/2022', 'VERDADERO', 'ALEMANIA', NULL),
('AR06', 'FERRETERIA', 'TORNILLO', 27, '05/10/2022', 'VERDADERO', 'ESPAÑA', NULL),
('AR07', 'DEPORTES', 'TENIS TIPO A', 28, '05/10/2022', 'VERDADERO', 'ESPAÑA', NULL),
('AR08', 'JUGUETES', 'BALON', 29, '05/10/2022', 'VERDADERO', 'ESPAÑA', NULL),
('AR09', 'ROPA', 'CAMISETA BALONCESTO', 30, '05/10/2022', 'FALSO', 'ESPAÑA', NULL),
('AR10', 'ALIMENTACION', 'FRESAS', 31, '05/10/2022', 'FALSO', 'ESPAÑA', NULL),
('AR11', 'FERRETERIA', 'CLAVOS', 32, '05/10/2022', 'VERDADERO', 'JAPON', NULL),
('AR12', 'DEPORTES', 'TENIS TIPO B', 33, '05/10/2022', 'VERDADERO', 'JAPON', NULL),
('AR13', 'JUGUETES', 'BALON FUTBOL', 34, '05/10/2022', 'VERDADERO', 'USA', NULL),
('AR14', 'ROPA', 'CAMISETA BALONCESTO', 35, '05/10/2022', 'VERDADERO', 'USA', NULL),
('AR16', 'FERRETERIA', 'SIERRA', 37, '05/10/2022', 'VERDADERO', 'FRANCIA', NULL),
('AR17', 'DEPORTES', 'TENIS', 38, '05/10/2022', 'VERDADERO', 'JAPON', NULL),
('AR18', 'JUGUETES', 'BALON FUTBOL', 39, '05/10/2022', 'FALSO', 'USA', NULL),
('AR19', 'ROPA', 'CAMISETA BALONCESTO', 40, '05/10/2022', 'VERDADERO', 'USA', NULL),
('AR20', 'ALIMENTACION', 'SANDIAS', 41, '05/10/2022', 'VERDADERO', 'FRANCIA', NULL),
('AR21', 'FERRETERIA', 'CUCHILLO', 42, '05/10/2022', 'VERDADERO', 'ESPAÑA', NULL),
('AR23', 'JUGUETES', 'BALON FUTBOL', 44, '05/10/2022', 'VERDADERO', 'FRANCIA', NULL),
('AR24', 'ROPA', 'CAMISETA BALONCESTO', 45, '05/10/2022', 'FALSO', 'JAPON', NULL),
('AR26', 'FERRETERIA', 'CAJAS CONEXIONES', 47, '05/10/2022', 'FALSO', 'JAPON', NULL),
('AR27', 'DEPORTES', 'TENIS GENERAL', 48, '05/10/2022', 'VERDADERO', 'ESPAÑA', NULL),
('AR28', 'JUGUETES', 'BALON FUTBOL', 49, '05/10/2022', 'FALSO', 'ESPAÑA', NULL),
('AR29', 'ROPA', 'CAMISETA BALONCESTO', 50, '05/10/2022', 'VERDADERO', 'ESPAÑA', NULL),
('AR50', 'CERAMICA', 'CENICERO', 44, '05/10/202', 'FALSO', 'ITALIA', NULL),
('AR30', 'DEPORTES', 'CAMISETA CORRER', 23, '05/10/2022', 'VERDADERO', 'ESPAÑA', NULL),
('AR31', 'CONFECCION', 'VESTIDO SEÑORA', 69, '05/08/2022', 'VERDADERO', 'MEXICO', NULL),
('AR33', 'DEPORTES', 'CAMISETA SUDADERA', 44, '10/10/2022', 'VERDADERO', 'PORTUGA', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `pass`) VALUES
(13, 'Alvaro', '123'),
(14, 'Victor', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_pass`
--

CREATE TABLE `usuarios_pass` (
  `usuarios` varchar(12) NOT NULL,
  `password` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios_pass`
--

INSERT INTO `usuarios_pass` (`usuarios`, `password`) VALUES
('Hola', '$2y$12$/ZZo3TBFyi7GbPU1PNdRx.Q1EtCIllCodri758WXPaPgBE.WjaF0K'),
('Hola2', '$2y$12$z4kvpybkFKzAiYylw3uTRuWqg7jW9DtDCMGAPHSAsgO5VltAuCM0e'),
('Hola3', '$2y$12$Zy5TSZesaJ8kn3DXj4M/.O3nEhiCHhp7TpTs6BlefzAMiThlLCvJq'),
('Hola4', '$2y$12$eTrYaTu26JMkyQ6Z7bwvheQ/y3CkbtKCh08ACO8MNZ5jhy5h6ci2K');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `datos_usuarios`
--
ALTER TABLE `datos_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `login_crud`
--
ALTER TABLE `login_crud`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `datos_usuarios`
--
ALTER TABLE `datos_usuarios`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `login_crud`
--
ALTER TABLE `login_crud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
