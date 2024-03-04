-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-03-2024 a las 21:52:00
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `listado_maestro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE `documentos` (
  `id_documento` bigint(20) NOT NULL,
  `id_procedimiento` bigint(20) NOT NULL,
  `nombre_documento` varchar(300) NOT NULL,
  `nombre_documento_magnetico` varchar(300) NOT NULL,
  `tipo_documento` varchar(20) DEFAULT NULL,
  `codigo` varchar(500) NOT NULL,
  `version` int(11) NOT NULL,
  `fecha_elaboracion` datetime NOT NULL,
  `id_responsable` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `documentos`
--

INSERT INTO `documentos` (`id_documento`, `id_procedimiento`, `nombre_documento`, `nombre_documento_magnetico`, `tipo_documento`, `codigo`, `version`, `fecha_elaboracion`, `id_responsable`) VALUES
(279, 49, 'Produccion Formato Cosecha (BPA)', '04 FOr CBPA 01 cosecha bpa.xlsx', 'Formato', 'FOr-CBPA-04-01/09-15', 1, '2024-03-02 11:53:22', 1),
(280, 44, 'Formato Acta de Entrega', '01 FOr AE 01 acta entrega.docx', 'Formato', 'FOr-AE-01-01/11-12', 1, '2024-03-04 07:53:29', 25),
(281, 44, 'Formato Asistencia de Visitas al Centro', '01 FOr AVC 01 visit al centr.xlsx', 'Formato', 'FOr-AVC-01-01/10-17', 1, '2024-03-04 08:02:35', 40),
(282, 44, 'Formato Cronograma De Capacitaciones (BPA)', '01 FOr CCBPA 01 cronog capaci bpa.pdf', 'Formato', 'FOr-CCBPA-01-01/07-16', 1, '2024-03-04 08:16:52', 2),
(283, 44, 'Formato Cronograma de Actividades Aguas', '01 FOr CDA 01 cronogr actv aguas.xlsx', 'Formato', 'FOr CDA 01-01/10-14', 1, '2024-03-04 08:34:15', 3),
(284, 44, 'Formato Cronograma de Actividades Almacen', '01 FOr CDA 01 cronogr actv almacen.xlsx', 'Formato', '01 FOr CDA 02 cronogr actv', 2, '2024-03-04 08:44:04', 4),
(285, 44, 'Formato Cronograma de Actividades Aseguramiento y Mejora Continua', '01 FOr CDA 01 cronogr actv aseg y mej c.xlsx', 'Formato', '01 FOr CDA 01 cronogr actv aseg y mej c', 2, '2024-03-04 08:48:38', 5),
(286, 44, 'Cronograma de Actividades Carnicos', '01 FOr CDA 01 cronogr actv carnicos.xlsx', 'Formato', '01 FOr CDA 01 cronogr actv', 1, '2024-03-04 08:51:44', 6),
(287, 44, 'Cronograma de Actividades Fruhor', '01 FOr CDA 01 cronogr actv fruhor.xlsx', 'Formato', '01 FOr CDA 02 cronogr actv fruhor', 2, '2024-03-04 08:59:17', 7),
(288, 44, 'Cronograma de Actividades Laboratorio ACC', '01 FOr CDA 01 cronogr actv lab ACC.xlsx', 'Formato', '01 FOr CDA 02 cronogr actv lab ACC', 2, '2024-03-04 09:02:16', 8),
(289, 44, 'Formato Cronograma de Actividades Agroindustria', '01 FOr CDA 01 cronogr actv lid agroind.xlsx', 'Formato', 'FOr CDA 01-02/10-14', 2, '2024-03-04 11:08:17', 10),
(290, 44, 'Formato Cronograma actividades mercadeo', '01 FOr CDA 01 cronogr actv mercadeo.xlsx', 'Formato', 'FOr-CA-01-01/10-14', 1, '2024-03-04 11:10:49', 11),
(292, 44, 'Formato Cronograma de Actividades Panificacion', '01 FOr CDA 01 cronogr actv panific.xlsx', 'Formato', '01 FOr CDA 02 cronogr actv panific', 1, '2024-03-04 11:52:38', 13),
(293, 44, 'Formato Cronograma de Actividades Poscosecha', '01 FOr CDA 01 cronogr actv poscosecha.xlsx', 'Formato', '01 FOr CDA 01 cronogr actv poscosecha', 2, '2024-03-04 11:55:04', 14),
(294, 44, 'Cronograma Actividades Talento Humano', '01 FOr CDA 01 cronogr actv t humano.xlsx', 'Formato', '01 FOr CDA 01 cronogr actv t humano', 2, '2024-03-04 11:57:24', 15),
(295, 44, 'Formato Cronograma de Actividades Ambiental', '01 FOr CDA 02 cronogr act ambiental.xlsx', 'Formato', '01 FOr CDA 02 cronogr act ambiental', 2, '2024-03-04 12:02:08', 16),
(296, 44, 'Formato Cronograma de Actividades', '01 FOr CDA 02 cronogra.xlsx', 'Formato', '01 FOr CDA 02 cronogra', 2, '2024-03-04 12:04:39', 15),
(297, 44, 'Formato Cronograma de Visitas a Unidades', '01 FOr CVU 01 cronog VU.xlsx', 'Formato', 'FOr-CVU-01-01/05-15', 1, '2024-03-04 15:15:20', 40),
(298, 44, 'Formato Evaluacion Nivel de Satisfaccion', '01 FOr ENS 01 eva nivel satis.docx', 'Formato', 'FOr- ENS-01-01/ 08-15  ', 1, '2024-03-04 15:17:15', 40),
(299, 44, 'Formato Listado De Ingreso al Centro Fin de Semana', '01 FOr LICFS 01 list ingre.xlsx', 'Formato', 'FOr-LICFS-01-01/11-17', 1, '2024-03-04 15:22:53', 15),
(300, 44, 'Formato Plan Operativo', '01 FOr PO 01 plan operativo.xlsx', 'Formato', 'FOr-PO-01-01/04-13', 11, '2024-03-04 15:25:12', 25),
(301, 44, 'Formato Pedido de Oficina Sena Empresa', '01 For POSE 01 pedi ofi senaemp.xlsx', 'Formato', 'FOr-POSE-01-01/09-15', 1, '2024-03-04 15:44:26', 40),
(302, 44, 'Formato de Permiso Sena Empresa Domingo', '01 For PSED 01 permi dom.xlsx', 'Formato', 'FOr-PSED-06-01/10-17', 1, '2024-03-04 15:46:10', 40),
(303, 44, 'Formato Paz y Salvo Sena Empresa', '01 FOr PSSE 01 paz salvo se em.docx', 'Formato', 'FOr-PSSE-01-01/03-15 ', 1, '2024-03-04 15:47:49', 40),
(304, 44, 'Formato Registro Control de Visitas Tecnicas', '01 FOr RCVT 01 regi con vis te.xlsx', 'Formato', 'FOr-RCVT-01-01/11-14 ', 1, '2024-03-04 15:49:18', 40);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procedimiento`
--

CREATE TABLE `procedimiento` (
  `id_procedimiento` bigint(20) NOT NULL,
  `nombre_procedimiento` varchar(300) NOT NULL,
  `id_proceso` int(11) NOT NULL,
  `nombre_directorio_procedimiento` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `procedimiento`
--

INSERT INTO `procedimiento` (`id_procedimiento`, `nombre_procedimiento`, `id_proceso`, `nombre_directorio_procedimiento`) VALUES
(44, 'Planeacion Administrativa y Operativa', 24, 'planeacionadministrativayoperativa'),
(45, 'Gestion de Innovacion', 24, 'gestiondeinnovacion'),
(46, 'Control y Mejora de Proceos', 27, 'controlymejoradeproceos'),
(47, 'Auditoria Interna', 27, 'auditoriainterna'),
(48, 'Planeacion Seguimiento y Evaluacion de Proyectos', 31, 'planeacionseguimientoyevaluaciondeproyectos'),
(49, 'Planeacion y Control de la produccion', 23, 'planeacionycontroldelaproduccion'),
(50, 'Prestacion y Control del Servicio', 23, 'prestacionycontroldelservicio'),
(51, 'Acciones Preventivas y Correctivas', 27, 'accionespreventivasycorrectivas'),
(52, 'Mercadeo y Ventas', 29, 'mercadeoyventas'),
(53, 'Seleccion Desarrollo y Evaluacion del Desempeño de Personal', 26, 'selecciondesarrolloyevaluaciondeldesempeñodepersonal'),
(54, 'Elaboracion de Nomina', 26, 'elaboraciondenomina'),
(55, 'Programacion y Control de Turnos', 26, 'programacionycontroldeturnos'),
(56, 'Gestion Financiera y Contable', 25, 'gestionfinancieraycontable'),
(57, 'Control de Inventarios', 25, 'controldeinventarios'),
(58, 'Control y Registro de Documentos', 22, 'controlyregistrodedocumentos'),
(59, 'Administrar Base de Datos', 22, 'administrarbasededatos'),
(60, 'Gestion de la Informacion', 22, 'gestiondelainformacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proceso`
--

CREATE TABLE `proceso` (
  `id_proceso` bigint(20) NOT NULL,
  `nombre_proceso` varchar(300) NOT NULL,
  `nombre_directorio_proceso` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `proceso`
--

INSERT INTO `proceso` (`id_proceso`, `nombre_proceso`, `nombre_directorio_proceso`) VALUES
(22, 'Gestion Documental', 'gestiondocumental'),
(23, 'Produccion de Bienes y Prestacion de Servicios', 'producciondebienesyprestaciondeservicios'),
(24, 'Gestion Administrativa', 'gestionadministrativa'),
(25, 'Gestion Contable Y Financiera', 'gestioncontableyfinanciera'),
(26, 'Gestion Del Talento Humano', 'gestiondeltalentohumano'),
(27, 'Mejora Continua', 'mejoracontinua'),
(28, 'Limpieza y Desinfeccion', 'limpiezaydesinfeccion'),
(29, 'Mercado y Ventas', 'mercadoyventas'),
(30, 'Planeacion y Control de la Produccion', 'planeacionycontroldelaproduccion'),
(31, 'Gestion de Proyectos', 'gestiondeproyectos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsable`
--

CREATE TABLE `responsable` (
  `id_responsable` bigint(20) NOT NULL,
  `nombre_responsable` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `responsable`
--

INSERT INTO `responsable` (`id_responsable`, `nombre_responsable`) VALUES
(1, 'GESTOR DE LA UNIDAD Y LIDER AGRICOLA'),
(2, 'INSTRUCTOR TECNICO'),
(3, 'GESTOR DE AGUAS'),
(4, 'GESTOR DE ALMACEN'),
(5, 'GESTOR MEJORA CONTINUA'),
(6, 'GESTOR CARNICOS'),
(7, 'GESTOR FRUHOR'),
(8, 'GESTOR LABORATORIO ACC'),
(9, 'GESTOR LACTEOS'),
(10, 'LIDER AGROINDUSTRIA'),
(11, 'GESTOR MERCADEO Y LOGISTICA'),
(12, 'GESTOR DEL LABORATORIO'),
(13, 'GESTOR PANIFICACION'),
(14, 'GESTOR POSCOSECHA'),
(15, 'GESTOR TALENTO HUMANO'),
(16, 'GESTOR AMBIENTAL'),
(17, 'GESTORES DE LAS PLANTAS'),
(18, 'GESTOR DE LA UNIDAD'),
(19, 'GESTORES Y LIDERES DE PRODUCCION'),
(20, 'GESTORES PLANTA Y GESTORES LABORATORIO'),
(21, 'GESTORES PLANTAS Y LIDER AGROINDUSTRIA'),
(22, 'GESTOR DE ASEGURAMIENTO Y CONTROL DE LA CALIDAD'),
(23, 'GESTORES  PLANTAS DE PRODUCCION Y GESTORES LABORATORIO'),
(24, 'GESTOR  PLANTA DE TRATAMIENTO DE AGUA'),
(25, 'GESTORES - LIDERES Y GERENTES'),
(26, 'GESTOR  DE LABORATORIO'),
(27, 'GESTORES DE LABORATORIO Y ASEGURAMIENTO DE LA CALIDAD Y MEJORA CONTINUA'),
(28, 'GESTORES DE LABORATORIO Y DE PLANTAS DE PRODUCCION'),
(29, 'GESTOR LIDER DE ASEGURAMIENTO Y CONTROL DE LA CALIDAD'),
(30, 'GESTOR DE PLANTA DE CARNICOS'),
(31, 'GESTOR DE PLANTA DE FRUHOR'),
(32, 'GESTOR DE PLANTA TRATAMIENTO DE AGUA'),
(33, 'GESTOR DE PANIFICACION'),
(34, 'LIDER AGROINDUSTRIA Y GESTOR AGROINDUSTRIA'),
(35, ' 	GESTORES DE LABORATORIO Y GESTOR DE POSCOSECHA '),
(36, ' 	GESTOR VIVERO'),
(37, 'LIDER AMBIENTAL'),
(38, 'LIDERES DE PRODUCCION'),
(39, 'LIDERES DE MERCASENA'),
(40, 'GERENTE ADMINISTRATIVO'),
(41, 'LIDER CONTABLE Y FINANCIERO'),
(42, 'LIDER DE MEJORA CONTINUA'),
(43, 'LIDER DE LOS PROCESOS'),
(44, 'LIDER TALENTO HUMANO'),
(45, 'LIDER DE MERCADEO Y VENTAS - GESTOR DE MERCADEO Y VENTAS'),
(46, 'LIDER SGC'),
(47, 'ENCARGADOS DE LA OFCINA SENA EMPRESA'),
(48, 'LIDER DE MECANIZACION'),
(49, 'LIDER DE  MECANIZACION Y MANTENIMIENTO  '),
(50, 'GESTOR DE MECANIZACION'),
(51, 'GESTOR DE LA UNIDAD Y LIDER DE MECANIZACION'),
(52, 'GESTOR DE LABORATORIO DE REPRODUCCION'),
(53, 'nuevo responsable actualizada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` bigint(20) NOT NULL,
  `rol` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nombre_usuario` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `usuario` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `contrasena` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `rol`, `nombre_usuario`, `usuario`, `contrasena`) VALUES
(4, 'administrador', 'Luis Alejandro Munoz', 'munoz2005', '$2y$15$99.8CHDDMKkjpeIC6yo28uauvNOtzeG8yVN.0vdm5M5FeSODGG7Fq'),
(6, 'administrador', 'Daniel Cardenas', 'dacarloz', '$2y$15$mpz55PeLY1y4pBYdFyWhHe5d9/DCRdsHkUVkLQLzMw1JmYQzjo4ou'),
(10, 'administrador', 'Miguel Angel Villalba ', 'miguelVillalba', '$2y$15$89YiLoS4YqgDRRIPfJC6UeG/jKIZY/SijLzHn1wHy3rLNGeZvlhnK');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id_documento`);

--
-- Indices de la tabla `procedimiento`
--
ALTER TABLE `procedimiento`
  ADD PRIMARY KEY (`id_procedimiento`);

--
-- Indices de la tabla `proceso`
--
ALTER TABLE `proceso`
  ADD PRIMARY KEY (`id_proceso`);

--
-- Indices de la tabla `responsable`
--
ALTER TABLE `responsable`
  ADD PRIMARY KEY (`id_responsable`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id_documento` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=305;

--
-- AUTO_INCREMENT de la tabla `procedimiento`
--
ALTER TABLE `procedimiento`
  MODIFY `id_procedimiento` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `proceso`
--
ALTER TABLE `proceso`
  MODIFY `id_proceso` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `responsable`
--
ALTER TABLE `responsable`
  MODIFY `id_responsable` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
