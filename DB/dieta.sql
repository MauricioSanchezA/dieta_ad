-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-04-2025 a las 20:45:25
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
-- Base de datos: `dieta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `paciente_id` int(11) NOT NULL,
  `cama` varchar(10) NOT NULL,
  `paciente_tipodoc` varchar(10) NOT NULL,
  `paciente_numdoc` varchar(50) NOT NULL,
  `paciente_nombre` varchar(100) NOT NULL,
  `paciente_apellido` varchar(100) NOT NULL,
  `paciente_grupo` varchar(100) NOT NULL,
  `paciente_subgrupo` varchar(100) NOT NULL,
  `paciente_comida` varchar(100) NOT NULL,
  `paciente_observacion` text NOT NULL,
  `paciente_idSolicitante` varchar(15) NOT NULL,
  `paciente_nombreSolicitante` varchar(50) NOT NULL,
  `dia_creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`paciente_id`, `cama`, `paciente_tipodoc`, `paciente_numdoc`, `paciente_nombre`, `paciente_apellido`, `paciente_grupo`, `paciente_subgrupo`, `paciente_comida`, `paciente_observacion`, `paciente_idSolicitante`, `paciente_nombreSolicitante`, `dia_creacion`) VALUES
(1, 'Cama14A', 'CC', '10478457', 'Daniel Alberto', 'Ospina Navarro', 'HOSP MEDICINA INTERNA', 'BRAQUITERAPIA', 'DESAYUNO', 'Este campo dee realcionar que se requiere para el pacxiente', '2345Yenny', 'Yenny acevedo', '2025-04-10'),
(3, 'cama23B', 'CC', '1020482009', 'Liney', 'Morales Silva', 'URGENCIAS ADULTOS', 'URGENCIAS MUJERES', 'DESAYUNO', 'tester tres, se verifica guin bajo no acerptado', '14875', 'Lepoldo Lopez', '2025-04-10'),
(5, 'Cama12A', 'TI', '1008368369', 'Luis Angel', 'Orozco', 'HOSP SERVICIO ESPECIAL', 'NEUROCIRUGIA', 'SUPLEMENTO', 'se verifica de nuevo el reload, para que el sistema recargue la fercha', '41471', 'Alberto Ortiz', '2025-04-10'),
(6, 'Cama21A', 'CC', '42784152', 'Luisa Andrea', 'Zuluaga', 'HOSP CIRUGIA PEDIATRICA', 'PEDIATRIA CIRUGIA', 'CENA', 'se verifica los mensajes de aceptacion, tester cazmbio es actualizar', '45745', 'Yenny Restrepo', '2025-04-10'),
(7, 'Cama12B', 'TI', '10478331', 'Juan Esteban', 'Murillo', 'HOSP UCI PEDIATRIA', 'NEONATOLOGIA BASICO', 'ALMUERZO', 'verificacion de errores en la base de datos', '47458', 'Yenny Restrepo', '2025-04-10'),
(8, 'Cama17A', 'CC', '4591042', 'Fabian', 'Diaz', 'HOSP URGENCIAS PEDIATRIA', 'PEDIATRIA CIRUGIA', 'MEDIA MAÑANA', 'Tester de verificacion de extension de campos, verificar caracteres como puntos y comas en onservaciones de los campos.', '1457', 'Santiago Perez', '2025-04-10'),
(9, 'CONS-GINE', 'CC', '313469745', 'CINTIA', 'MARIN SANTANA', 'HOSP GINECOOBSTETRICA', 'GINECOLOGIA ESTACION 1', 'CENA', 'VERIFICACION NRO 1', '111369769', 'CAROLINA', '2025-04-16'),
(11, 'CONS12', 'CC', '14647914', 'JOSUE ELIZANDRO', 'VASQUEZ', 'HOSP GINECOOBSTETRICA', 'INTERMEDIOS NEONATOLOGIA', 'MEDIA MAÑANA', 'VERIFICACION 2', '11187474', 'CAROLINA', '2025-04-16'),
(13, 'CONS-12', 'CC', '14578451', 'SEBASTIAN ALEJANDRO', 'CESPEDES', 'HOSP GINECOOBSTETRICA', 'GINECOLOGIA ESTACION 1', 'CENA', 'PACIENTE EN CONSULTORIO', '11136974', 'CAROLINA MELO', '2025-04-16'),
(15, 'CAM01', 'CC', '4754128', 'BEATRIZ ELENA', 'SIERRA', 'HOSP CIRUGIA PEDIATRICA', 'HOSPITALIZACION EXPANSION 2 PISO', 'MEDIA TARDE', 'VERIFICACION NRO 3', '11136975', 'CAROLINA MELO', '2025-04-16'),
(17, 'CAM02', 'CC', '145784215', 'ALVARO GERMAN', 'TRIANA', 'HOSP GINECOOBSTETRICA', 'INTERMEDIOS ADULTOS ESTACION 1', 'ALMUERZO', 'VERIFICACION 4', '45154845', 'CAROLINA', '2025-04-16'),
(19, 'CONS-GINE', 'CC', '41578421', 'CINTIA MARIA', 'MARIN SANTANA', 'HOSP NEUROCIRUGIA', 'NEUROCIRUGIA', 'DESAYUNO', 'VERIFICACION DE ENVIO A LA BASE DE DATOS', '111369670', 'CAROLINA RUIZ', '2025-04-18');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`paciente_id`),
  ADD UNIQUE KEY `paciente_numdoc` (`paciente_numdoc`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `paciente_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
