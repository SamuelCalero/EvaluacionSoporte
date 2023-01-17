-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:33065
-- Tiempo de generación: 17-01-2023 a las 19:35:59
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
-- Base de datos: `evaluacionsoporte`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `ID` int(11) NOT NULL,
  `ClienteID` int(11) NOT NULL,
  `FechaModificacion` date NOT NULL,
  `Descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`ID`, `ClienteID`, `FechaModificacion`, `Descripcion`) VALUES
(1, 0, '2023-01-17', 'Se han ingresado los datos de un nuevo Cliente'),
(2, 5, '2023-01-17', 'Los datos del Cliente han sido modificados'),
(3, 0, '2023-01-17', 'Se han ingresado los datos de un nuevo Cliente'),
(4, 6, '2023-01-17', 'El Cliente ha sido eliminado'),
(5, 5, '2023-01-17', 'El Cliente ha sido eliminado'),
(6, 0, '2023-01-17', 'Se han ingresado los datos de un nuevo Cliente'),
(7, 2, '2023-01-17', 'Los datos del Cliente han sido modificados'),
(8, 10, '2023-01-17', 'Se han ingresado los datos de un nuevo Cliente'),
(9, 2, '2023-01-17', 'Los datos del Cliente han sido modificados'),
(10, 2, '2023-01-17', 'El Cliente ha sido eliminado'),
(11, 11, '2023-01-17', 'Se han ingresado los datos de un nuevo Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `ClienteID` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Apellido` varchar(50) DEFAULT NULL,
  `DUI` varchar(15) DEFAULT NULL,
  `Telefono` varchar(8) DEFAULT NULL,
  `Direccion` text DEFAULT NULL,
  `Departamento` varchar(25) DEFAULT NULL,
  `FechaNacimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`ClienteID`, `Nombre`, `Apellido`, `DUI`, `Telefono`, `Direccion`, `Departamento`, `FechaNacimiento`) VALUES
(4, 'sadas', 'asdasd', '123123', '123123', 'asdas', 'asdasd', '2023-01-26'),
(7, 'asd', 'asdas', '213', '12312', 'asdas', 'asdasd', '2023-02-01'),
(10, 'asd', 'asdas', '123', '1231', 'sdasd', 'asd', '2023-01-28'),
(11, 'asdas', 'asdas', '12312', '12312', 'asdasd', 'asdasd', '2023-01-25');

--
-- Disparadores `clientes`
--
DELIMITER $$
CREATE TRIGGER `DatosEliminados` AFTER DELETE ON `clientes` FOR EACH ROW BEGIN
    DECLARE last_id INT;
    SET last_id = OLD.ClienteID;
    INSERT INTO bitacora (ClienteID, Descripcion,FechaModificacion)
    VALUES (last_id, 'El Cliente ha sido eliminado',NOW());
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `DatosIngresados` AFTER INSERT ON `clientes` FOR EACH ROW BEGIN
	declare last_id int;
	SELECT MAX(ClienteID) INTO last_id FROM clientes;
    INSERT INTO bitacora (ClienteID, Descripcion,FechaModificacion)
    VALUES (last_id, 'Se han ingresado los datos de un nuevo Cliente',NOW());
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `DatosModificados` AFTER UPDATE ON `clientes` FOR EACH ROW BEGIN
    DECLARE last_id INT;
    SET last_id = NEW.ClienteID;
    INSERT INTO bitacora (ClienteID, Descripcion,FechaModificacion)
    VALUES (last_id, 'Los datos del Cliente han sido modificados',NOW());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Apellido` varchar(50) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`ID`, `Nombre`, `Apellido`, `email`, `password`) VALUES
(1, 'Samuel', 'Calero', 'samuel.calero', 'password'),
(2, NULL, NULL, 'samuelcalero.7@gmail.com', '$2y$10$s1cgPo9Ry69YXcLvRl');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ClienteID` (`ClienteID`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`ClienteID`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `ClienteID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
