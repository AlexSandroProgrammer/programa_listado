-- phpMyAdmin SQL Dump
-- version 5.2.0listado_maestro
-- https://www.phpmyadmin.net/
--listado_maestro
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-02-2024 a las 13:31:13
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
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `Id_Area` bigint(20) NOT NULL,
  `Nombre_Area` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`Id_Area`, `Nombre_Area`) VALUES
(1, 'AGRICOLA'),
(2, 'AGROINDUSTRIA'),
(3, 'AMBIENTAL'),
(4, 'GESTION'),
(5, 'MECANIZACION'),
(6, 'PECUARIA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_area_documento`
--

CREATE TABLE `detalle_area_documento` (
  `id_detalle` int(11) NOT NULL,
  `id_area` int(11) NOT NULL,
  `id_documento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE `documentos` (
  `Id_Documento` bigint(20) NOT NULL,
  `Id_Area` bigint(20) NOT NULL,
  `Id_Proceso` bigint(20) NOT NULL,
  `Id_Procedimiento` bigint(20) NOT NULL,
  `Nombre_Documento` varchar(500) NOT NULL,
  `Nombre_Documento_Magnetico` varchar(500) NOT NULL,
  `Tipo_Documento` varchar(20) DEFAULT NULL,
  `Codigo` varchar(500) NOT NULL,
  `Version` int(11) NOT NULL,
  `Fecha_Elaboracion` date NOT NULL,
  `Id_Responsable` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `documentos`
--

INSERT INTO `documentos` (`Id_Documento`, `Id_Area`, `Id_Proceso`, `Id_Procedimiento`, `Nombre_Documento`, `Nombre_Documento_Magnetico`, `Tipo_Documento`, `Codigo`, `Version`, `Fecha_Elaboracion`, `Id_Responsable`) VALUES
(2, 1, 1, 1, 'PRODUCCION	FORMATO COSECHA (BPA)', '04 FOr CBPA 01 cosecha bpa.xlsx', 'Formato', 'FOr-CBPA-04-01/09-15', 1, '2015-09-01', 1),
(3, 1, 1, 1, 'FORMATO APLICACIÃ“N DE ABONO ORGANICO (BPA)', '04 FOr AAOBPA 01 apli abon org.xlsx', 'Formato', 'FOr-AAOBPA-04-01/09-15', 1, '2015-09-01', 1),
(4, 1, 1, 1, 'FORMATO APLICACIÃ“N DE FUNGICIDA (BPA)', '04 FOr AFBPA 01 apli fungicida.xlsx', 'Formato', 'FOr-AFBPA-04-01/09-15', 1, '2015-08-01', 1),
(5, 1, 1, 1, 'FORMATO APLICACIÃ“N DE FERTILIZANTE QUIMICO (BPA)', '04 FOr AFQBPA 01 apli fert qui.xlsx', 'Formato', 'FOr-AFQBPA-04-01/09-15', 1, '2015-09-01', 1),
(6, 1, 1, 1, 'FORMATO CONTROL DE ARVENSES (BPA)', '04 FOr CABPA 01 control arven.xlsx', 'Formato', 'FOr-CABPA-04-01/09-15', 1, '2015-09-01', 1),
(7, 1, 1, 1, 'FORMATO APLICACIÃ“N DE INSECTICIDA (BPA)', '04 FOr AIBPA 01 apli insec.xlsx', 'Formato', 'FOr-AIBPA-04-01/09-15', 1, '2015-09-01', 1),
(8, 1, 1, 1, 'FORMATO MATRIZ MONITOREO DEL CULTIVO (BPA)', '04 FOr MMCBPA 01 monito cul.xlsx', 'Formato', 'FOr-MMCBPA-04-01/09-15', 1, '2015-09-01', 1),
(9, 1, 2, 2, 'FORMATO INVENTARIO', '04 FOr IBPA 01 inventario bpa.xlsx', 'Formato', 'FOr-IBPA-04-01/07-2016 	', 1, '2016-07-16', 2),
(10, 1, 1, 1, 'FORMATO DE REGISTRO DE APLICACIONES', '04 FOr RA 02 reg aplicaciÃ³n.xlsx', 'Formato', 'FOr-RA-04-02/11-12', 2, '2012-11-01', 1),
(11, 1, 1, 1, 'FORMATO DE REGISTRO DE FERTILIZACION', '04 FOr RF 01 reg fertiliz.docx', 'Formato', 'FOr-RF-04-01/11-12 	', 1, '2012-11-01', 1),
(12, 1, 1, 1, 'FORMATO DE REGISTRO DE SIEMBRA', '04 FOr RS 01 reg siembra.xlsx', 'Formato', 'FOr-RS-04-01/11-12', 1, '2012-11-01', 1),
(13, 1, 1, 1, 'FORMATO DE CONTROL DE PLAGAS', '04 FOr CP 01 contr plag.docx', 'Formato', 'FOr-CP-04-01/05-12', 1, '2012-05-01', 1),
(14, 1, 3, 3, 'FORMATO REGISTRO CONTROL DE VISITAS TECNICAS', '01 FOr RCVT 01 regi con vis te.xlsx', 'Formato', 'FOr-RCVT-01-01/11-14', 1, '2014-11-01', 1),
(15, 2, 3, 3, 'FORMATO CRONOGRAMA DE ACTIVIDADES', '01 FOr CDA 01 cronogr actv aguas.xlsx', 'Formato', '01 FOr CDA 01 cronogr actv', 1, '2014-10-01', 3),
(16, 1, 1, 4, 'FORMATO DE CONTROL Y USO DE LOS REACTIVOS DE LABORATORIO DE SUELOS', '04 FOr CURLS 01 cont uso rls.xls', 'Formato', 'FOr-CURLS-04-01/07-15', 1, '2015-07-01', 12),
(17, 2, 3, 3, 'FORMATO CRONOGRAMA DE ACTIVIDADES', '01 FOr CDA 01 cronogr actv almacen.xlsx', 'Formato', '01 FOr CDA 02 cronogr actv ', 2, '2014-10-02', 4),
(18, 1, 1, 4, 'FORMATO DE RECEPCION DE MUESTRAS PARA ANALISIS EN EL LABORATORIO DE', '04 FOr RMALS 01 recp mues als.docx', 'Formato', 'FOr-RMALS-04-01/07-15', 1, '2015-07-01', 12),
(19, 1, 1, 4, 'FORMATO DE REGISTRO DE CONSUMO DE SUSTANCIAS QUIMICAS LABORATORIO BIOTECNOLOGIA VEGETAL', '04 FOr RCSQLBV 01 reg sust qui.docx', 'Formato', 'FOr-RCSQLBV-04-01/07-15', 1, '2015-07-01', 12),
(20, 2, 3, 3, 'FORMATO CRONOGRAMA DE ACTIVIDADES', '01 FOr CDA 01 cronogr actv aseg y mej c.xlsx', 'Formato', '01 FOr CDA 01 cronogr actv aseg y mej c', 2, '2014-12-02', 5),
(21, 1, 1, 4, 'FORMATO CONTROL DE PRESTAMO DE EQUIPOS EN LABORATORIO', '04 FOr CPEL 01 cont pres equ.xls', 'Formato', 'FOr-CPEL-04-01/07-15', 1, '2015-07-01', 12),
(22, 2, 3, 3, 'FORMATO CRONOGRAMA DE ACTIVIDADES', '01 FOr CDA 01 cronogr actv carnicos.xlsx', 'Formato', '01 FOr CDA 01 cronogr actv', 1, '2014-10-01', 6),
(23, 2, 3, 3, 'FORMATO CRONOGRAMA DE ACTIVIDADES', '01 FOr CDA 01 cronogr actv fruhor.xlsx', 'Formato', '01 FOr CDA 02 cronogr actv', 2, '2014-10-02', 7),
(24, 2, 3, 3, 'FORMATO CRONOGRAMA DE ACTIVIDADES', '01 FOr CDA 01 cronogr actv lab ACC.xlsx', 'Formato', '01 FOr CDA 02 cronogr actv', 2, '2014-10-02', 8),
(25, 1, 1, 4, 'FORMATO DE INVENTARIO DE PLANTAS IN VITRO DEL LABORATORIO DE BIOTECNOLOGIA VEGETAL', '04 FOr IPILBV 01 in pla in lbv.docx', 'Formato', 'FOr-IPIVLBV-04-01/07-15', 1, '2015-07-01', 12),
(26, 2, 3, 3, 'FORMATO CRONOGRAMA DE ACTIVIDADES', '01 FOr CDA 01 cronogr actv lid agroind.xlsx', 'Formato', '01 FOr CDA 02 cronogr actv', 2, '2014-10-02', 10),
(27, 1, 1, 4, 'FORMATO DE SALIDA DE PLANTAS', '04 FOr SP 01 salida plantas.docx', 'Formato', 'FOr-SP-04-01/11-12 	', 1, '2012-11-01', 1),
(28, 2, 3, 3, 'FORMATO CRONOGRAMA DE ACTIVIDADES', '01 FOr CDA 01 cronogr actv mercadeo.xlsx', 'Formato', '01 FOr CDA 01 cronogr actv mercadeo', 1, '2014-10-01', 11),
(29, 1, 3, 3, 'FORMATO CRONOGRAMAS DE CAPACITACIONES (BPA)', '01 FOr CCBPA 01 cronog capaci bpa.pdf', 'Formato', 'FOr-CCBPA-01-01/07-16', 1, '2016-07-01', 2),
(30, 2, 3, 3, 'FORMATO CRONOGRAMA DE ACTIVIDADES', '01 FOr CDA 01 cronogr actv panific.xlsx', 'Formato', '01 FOr CDA 02 cronogr actv', 2, '2014-10-02', 13),
(31, 1, 1, 4, 'FORMATO CONTROL DE CONTAMINACION POR HONGOS Y BACTERIAS DE PLANTULAS DE LABORATORIO DE BIOTECNOLOGIA ', '04 FOr CCHBPLB  01 conta hong.docx', 'Formato', 'FOr-CCHBPLB-04-02/06-16', 1, '2016-06-02', 18),
(32, 2, 3, 3, 'FORMATO CRONOGRAMA DE ACTIVIDADES', '01 FOr CDA 01 cronogr actv poscosecha.xlsx', 'Formato', '01 FOr CDA 02 cronogr actv', 2, '2014-10-02', 14),
(33, 1, 1, 1, 'FORMATO DE APLICACIONES DE FITOSANITARIOS (BPA) ', '04 FOr AF 01 aplic fito.xlsx', 'Formato', 'FOr-CCBPA-01-01/07-16', 1, '2016-07-01', 2),
(34, 2, 3, 3, 'FORMATO CRONOGRAMA DE ACTIVIDADES', '01 FOr CDA 01 cronogr actv t humano.xlsx', 'Formato', '01 FOr CDA 02 cronogr actv', 2, '2014-10-02', 15),
(35, 2, 3, 3, 'FORMATO CRONOGRAMA DE ACTIVIDADES', '01 FOr CDA 02 cronogr act ambiental.xlsx', 'Formato', '01 FOr CDA 02 cronogr act ambiental', 2, '2014-10-02', 16),
(36, 2, 1, 1, 'FORMATO DE TRAZABILIDAD Y CONTROL DE PARAMETROS DE PRODUCCION', '04 FOr TCPP 01 trazab y param.docx', 'Formato', '04 FOr TCPP 01 trazab y param', 1, '2013-04-01', 17),
(37, 2, 1, 1, 'FORMATO INFORME DE PRODUCCION DE BIENES DE AGROINDUSTRIA', '04 FOr  IPBA 01 informe produccion.xls', 'Formato', '04 FOr IPBA 01 informe produccion', 1, '2015-02-01', 19),
(38, 2, 1, 1, 'FORMATO DE EVALUACION DE CRITERIOS DE ACEPTACION Ã“ RECHAZO DE MP_IN_PT', '04 FOr ECARMPIPT 03 eval crit mp i pt f-236.pdf', 'Formato', '04 FOr ECARMPIPT 03 eval crit mp i pt', 3, '2015-02-03', 17),
(39, 2, 1, 1, 'FORMATO FICHA PRODUCTO TERMINADO', '04 FOr FPT 01 ft product.docx', 'Formato', '04 FOr FPT 01 ft product', 1, '2013-08-01', 17),
(40, 1, 1, 1, 'FORMATO CONTROL DE HERRAMIENTAS (BPA)', '04 FOr CHBPA 01 control herram bpa.pdf', 'Formato', 'FOr-CHBPA-04-01/07-16', 1, '2016-07-01', 2),
(41, 2, 1, 1, 'FORMATO FICHA TECNICA DE DETERGENTES Y DESINFECTANTES', '04 FOr FTDYD 01 ft det y desif.docx', 'Formato', '04 FOr FTDYD 01 ft det y desif', 1, '2013-08-01', 17),
(42, 2, 1, 1, 'FORMATO FICHA TECNICA DE EQUIPOS', '04 FOr FTE 01 ft equipos.docx', 'Formato', '04 FOr FTE 01 ft equipos', 1, '2013-08-01', 17),
(43, 1, 3, 13, 'FORMATO CRONOGRAMA SEMESTRAL DE FERTILIZACION (BPA)', '04 FOr CSFBPA 01 cron semes ferti bpa.pdf', 'Formato', 'FOr-CSFBPA-04-01/07-16', 1, '2016-07-01', 2),
(44, 2, 1, 1, 'FORMATO FICHA TECNICA DE MATERIA PRIMA E INSUMOS', '04 FOr FTMPEI 01 ft mp.docx', 'Formato', '04 FOr FTMPEI 01 ft mp', 1, '2013-02-01', 17),
(45, 1, 1, 1, 'HISTORIAL DEL CULTIVO (BPA)', '04 FOr HCBPA 01 histor culti bpa.pdf', 'Formato', 'FOr-HCBPA-04-01/07-16', 1, '2016-07-01', 2),
(46, 2, 1, 1, 'FORMATO GUIA DE ELABORACION DE PRODUCTO', '04 FOr GDEDP 01 guia elab.doc', 'Formato', '04 FOr GDEDP 01 guia elab', 1, '2013-04-01', 17),
(47, 1, 1, 1, 'FORMATOS LABORES DEL CULTIVO', '04 FOr LCBPA labor culti bpa.pdf', 'Formato', 'FOr-LCBPA-04-01/07-16', 1, '2016-07-01', 2),
(48, 2, 1, 1, 'FORMATO DE PRESTAMO DE MATERIALES Y EQUIPOS', '04 FOr PME 02 prestamo mat.pdf', 'Formato', '04 FOr PME 02 prestamo mat', 2, '2014-04-02', 20),
(49, 1, 1, 1, 'FORMATO LIMPIEZA Y DESINFECCION DE EQUIPOS Y HERRAMIENTAS (BPA)', '04 FOr LDEBPA 01 lim desin equi herra bpa.pdf', 'Formato', 'FOr-LDEHBPA-04-01/07-16', 1, '2016-07-01', 2),
(50, 1, 1, 1, 'FORMATO MANTENIMIENTO DE EQUIPOS', '04 FOr MEBPA 01 mante equip bpa.pdf', 'Formato', 'FOr-MEBPA-04-01/07-16', 1, '2016-07-01', 2),
(51, 1, 1, 1, 'FORMATO RIEGO DEL CULTIVO', '04 FOr RCBPA 01 riego cult bpa.pdf', 'Formato', 'FOr-RCBPA-04-01/07-2016', 1, '2016-07-01', 2),
(52, 1, 1, 1, 'FORMATO RECOLECCION DE RESIDUOS POSCONSUMO', '04 FOr RRPBPA 01 recol residu posco bpa.pdf', 'Formato', 'FOr-RRDBPA-04-01/07-16', 1, '2016-07-01', 2),
(53, 2, 1, 1, 'FORMATO DE SOLICITUD AMBIENTES,EQUIPOS Y OTROS ELEMENTOS PARA ORIENTAR LOS PROCESOS FORMATIVOS', '04 FOr SAEEOPF 02 solici pract.pdf', 'Formato', '04 FOr SAEEOPF 02 solici pract', 2, '2014-08-02', 20),
(54, 1, 5, 14, 'FORMATO DE ASISTENCIA A SENA EMPRESA AREA AGRICOLA', '06 FOr ASEAA 06 asist area agri.pdf', 'Formato', 'FOr-ASEAA-06-02/05-16', 1, '2016-05-02', 18),
(55, 1, 1, 4, 'FORMATO DE SALIDA DE PLANTULAS PARA RUSTICACION Y ACLIMATACION EN EL LABORATORIO DE BIOTECNOLOGIA VEGETAL', 'FOr-BIOTECNOLOGIA.pdf', 'Formato', 'FOr-SPRALB-04-01/06-16', 1, '2016-06-01', 12),
(56, 2, 1, 4, 'FORMATO INFORME DE PRESTACION SERVICIOS', '04 FOr  IPS 01 informe servicio agroind.xls', 'Formato', '04 FOr IPS 01 informe servicio agroind', 1, '2015-03-01', 23),
(57, 3, 1, 1, 'FORMATO DE REGISTRO Y DISPOSICION DE RESIDUOS PELIGROSOS', '04 FOr RDRP 01 reg dis resi pe.docx', 'Formato', 'FOr-RDIDRP-04-01/08-13', 1, '2013-08-01', 16),
(58, 3, 1, 1, 'FORMATO DE REGISTRO Y DISPOSICION DE RESIDUOS PELIGROSOS', '04 FOr RDRP 01 reg dis resi pe(1).docx', 'Formato', 'FOr-RDIDRP-04-01/08-13', 1, '2013-08-01', 16),
(59, 3, 1, 1, 'FORMATO DE REGISTRO MANEJO DE RESIDUOS', '04 FOr RMR 01 mane resid.xlsx', 'Formato', 'FOr-RMR-04-01/11-12', 1, '2012-11-01', 16),
(60, 2, 1, 4, 'FORMATO NOTA DE SERVICIO', '04 FOr NSA 01 nota serv agro.pdf', 'Formato', '04 FOr NSA 01 nota serv agro', 1, '2015-03-01', 23),
(61, 2, 2, 2, 'FORMATO REGISTRO CONTROL DE INVENTARIOS DE ELEMENTOS GENERALES', '07 FOr RCIDEG 01 invent elem g.xlsx', 'Formato', '07 FOr RCIDEG 01 invent elem g', 1, '2014-12-01', 21),
(62, 2, 2, 2, 'FORMATO REGISTRO CONTROL INVENTARIO DE MAQUINARIA Y EQUIPOS', '07 FOr RCIME 01 maq y equip.xlsx', 'Formato', '07 FOr RCIME 01 maq y equip', 1, '2014-12-01', 23),
(63, 2, 2, 2, 'INSTRUCTIVO PARA LA PREPARACIÃ“N DE SOLUCIONES DE LIMPIEZA Y DESINFECCION DEL AREA DE AGROINDUSTRIA', '04 INs 01 preparacion soluciones Lyd f-30.pdf', 'Instructivo', '04 INS 01 preparacion soluciones LYD 	', 1, '2014-11-01', 22),
(64, 2, 2, 2, 'INSTRUCTIVO PARA EL MANEJO DE LA PLANTA DE TRATAMIENTO DE AGUA Y CALDERA AREA ', '04 INs 01 manejo pl aguas caldera f-229.pdf', 'Instructivo', '04 INS 01 manejo pl aguas caldera 	', 1, '2014-06-01', 3),
(65, 2, 6, 14, 'FORMATO DE CONTROL DE ASISTENCIA', '06 FOr CAA control asis agro.pdf', 'Formato', '06 FOr CAA control asis agro', 1, '2013-05-01', 25),
(66, 2, 5, 14, 'FORMATO LISTA DE CHEQUEO TURNO RUTINARIO', '06 FOr LCTR 01 cheq turnos.pdf', 'Formato', '06 FOr LCTR 01 cheq turnos', 1, '2013-11-01', 25),
(67, 2, 1, 15, 'FORMATO DE MONITOREO DE AMBIENTES', '04 FOr MA 01 ambientes.pdf', 'Formato', '04 FOr MA 01 ambientes', 1, '2014-02-01', 12),
(68, 2, 1, 15, 'FORMATO DE MONITOREO DE MANIPULADORES', '04 FOr MM 01 manipuladores.pdf', 'Formato', '04 FOr MM 01 manipuladores', 1, '2014-02-01', 12),
(69, 2, 1, 15, 'FORMATO DE PROTOCOLOS PARA ANALISIS DE LABORATORIO', '04 FOr PAL 01 protocolos.docx', 'Formato', '04 FOr PAL 01 protocolos', 1, '2014-08-01', 27),
(70, 2, 1, 15, 'FORMATO DE REPORTE DE ANALISIS DE LABORATORIO CONSOLIDADO', '04 FOr RAL 01 reporte anal lab.pdf', 'Formato', '04 FOr RAL 01 reporte anal lab 	', 1, '2014-02-01', 28),
(71, 2, 1, 15, 'FORMATO INSTRUCTIVO DE LIMPIEZA Y DESINFECCIÃ“N', '04 FOr ILD 01 Instr Lav manos.pdf', 'Formato', '04 FOr ILD 01 Instr Lav manos 	', 1, '2014-02-01', 29),
(72, 2, 1, 15, 'FORMATO DE PROTOCOLOS PARA ANALISIS DE LABORATORIO', '04 FOr PAL 01 protocolos(1).docx', 'Formato', '04 FOr PAL 01 protocolos', 1, '2014-08-01', 27),
(73, 2, 1, 15, 'FORMATO DE REPORTE DE ANALISIS DE LABORATORIO CONSOLIDADO', '04 FOr RAL 01 reporte anal lab(1).pdf', 'Formato', '04 FOr RAL 01 reporte anal lab 	', 1, '2014-02-01', 28),
(74, 2, 1, 16, 'FORMATO INSTRUCTIVO DE LIMPIEZA Y DESINFECCIÃ“N', '04 FOr ILD 01 Instr Lav manos(1).pdf', 'Formato', '04 FOr ILD 01 Instr Lav manos', 1, '2014-02-01', 22),
(75, 2, 1, 16, 'FORMATO INSTRUCTIVO DE LIMPIEZA Y DESINFECCIÃ“N', '04 FOr ILD 01 Instr LyD equi.pdf', 'Formato', '04 FOr ILD 01 Instr LyD equi', 1, '2014-02-01', 29),
(76, 2, 1, 16, 'FORMATO INSTRUCTIVO DE LIMPIEZA Y DESINFECCIÃ“N', '04 FOr ILD 01 Instr LyD equip.pdf', 'Formato', '04 FOr ILD 01 Instr LyD equip', 1, '2014-02-01', 22),
(77, 2, 1, 16, 'FORMATO INSTRUCTIVO DE LIMPIEZA Y DESINFECCIÃ“N', '04 FOr ILD 01 Instr LyD instal.pdf', 'Formato', '04 FOr ILD 01 Instr LyD instal', 1, '2014-02-01', 22),
(78, 2, 1, 16, 'FORMATO INSTRUCTIVO DE LIMPIEZA Y DESINFECCIÃ“N', '04 FOr ILD 01 Instr LyD utensi.pdf', 'Formato', '04 FOr ILD 01 Instr LyD utensi', 1, '2014-02-01', 22),
(79, 2, 1, 16, 'FORMATO INSTRUCTIVO DE LIMPIEZA Y DESINFECCIÃ“N', '04 FOr ILD 01 In LyD equipos 3.pdf', 'Formato', '04 FOr ILD 01 In LyD equipos 3', 1, '2014-02-01', 22),
(80, 2, 1, 16, 'FORMATO DE RESUMEN DE OPERACIONES DE LIMPIEZA Y DESINFECCION', '04 FOr ROLD 01 resu LyD agua.xlsx', 'Formato', '04 FOr ROLD 01 resu LyD agua', 1, '2014-03-01', 32),
(81, 2, 1, 16, 'FORMATO DE RESUMEN DE OPERACIONES DE LIMPIEZA Y DESINFECCION', '04 FOr ROLD 01 resum LyD bodeg.xlsx', 'Formato', '04 FOr ROLD 01 resum LyD bodeg 	', 1, '2014-03-01', 4),
(82, 2, 1, 16, 'FORMATO DE RESUMEN DE OPERACIONES DE LIMPIEZA Y DESINFECCION', '04 FOr ROLD 01 resu LyD carnic.xlsx', 'Formato', '04 FOr ROLD 01 resu LyD carnic', 1, '2014-03-01', 30),
(83, 2, 1, 16, 'FORMATO DE RESUMEN DE OPERACIONES DE LIMPIEZA Y DESINFECCION', '04 FOr ROLD 01 resum LyD fruho.xlsx', 'Formato', '04 FOr ROLD 01 resum LyD fruho', 1, '2014-03-01', 31),
(84, 2, 1, 16, 'FORMATO DE RESUMEN DE OPERACIONES DE LIMPIEZA Y DESINFECCION', '04 FOr ROLD 01 resum LyD lab.xlsx', 'Formato', '04 FOr ROLD 01 resum LyD lab', 1, '2014-03-01', 22),
(85, 2, 1, 16, 'FORMATO DE RESUMEN DE OPERACIONES DE LIMPIEZA Y DESINFECCION', '04 FOr ROLD 01 resum LyD panif.xlsx', 'Formato', '04 FOr ROLD 01 resum LyD panif', 1, '2014-03-01', 33),
(86, 2, 1, 1, 'FORMATO NOTA DE PRODUCCION DE AGROINDUSTRIA', '04 NPA 07 not produc.xlsx', 'Formato', '04 FOr NPA 05 not produc agr', 4, '2015-07-04', 34),
(87, 2, 1, 16, 'FORMATO DE RESUMEN DE OPERACIONES DE LIMPIEZA Y DESINFECCION', '04 FOr ROLD 01 resum LyD pos.xlsx', 'Formato', '04 FOr ROLD 01 resum LyD pos', 1, '2014-03-01', 14),
(88, 2, 6, 14, 'FORMATO DE CONTROL DE ASISTENCIA AGROINDUSTRIAL', '06 FOr CAA control asis agroindus.pdf', 'Formato', '06 FOr CAA control asis agroindus', 2, '2013-08-02', 34),
(89, 2, 6, 13, ' 	INSTRUCTIVO PARA EL MANEJO DEL ALMACEN AGROINDUSTRIA', '07 INs MAA mane almac agroindus.docx', 'Instructivo', '07 INs MAA mane almac agroindus', 1, '2015-08-01', 34),
(90, 2, 1, 15, 'FORMATO DE REGISTRO DE RECEPCION Y TOMA DE MUESTRAS PARA ANALISIS DE LABORATORIO', '04 FOr RRTMAL 02 tom mues.docx', 'Formato', '01 FOr RRTMAL 01 reg r t m a l', 2, '2014-10-02', 12),
(91, 2, 1, 15, 'FORMATO DE REGISTRO DE ANALISIS DE MUESTRA Y REPORTE DE RESULTADOS DE LABORATORIO', '04 FOr RAMRL 02 analisis mues.docx', 'Formato', '01 FOr RAMRRL 02 reg a m r lab', 2, '2014-10-02', 12),
(92, 2, 1, 15, 'FORMATO DE MONITOREO DE EQUIPOS Y SUPERFICIES', '04 FOr MES 01 equipos f-179.pdf', 'Formato', '04 FOr MES 01 equipos f-179', 1, '2014-02-01', 28),
(93, 2, 1, 15, 'FORMATO DE REPORTE DE ANALISIS DE LABORATORIO', '04 FOr RALC 01 reporte anal la.pdf', 'Formato', '04 FOr RALC 01 reporte anal la', 1, '2014-02-01', 12),
(94, 2, 1, 13, ' 	REGLAMENTO INTERNO DE TRABAJO AREA DE AGROINDUSTRIA', '06 REg ITAA 02 reglamento int ag f.pdf', 'Instructivo', '06 REg ITAA 02 reglamento int ag 	', 2, '2013-03-02', 25),
(95, 2, 1, 16, 'FORMATO DE RESUMEN DE OPERACIONES DE LIMPIEZA Y DESINFECCION', '04 FOr FROLD 02 resumen operac .pdf', 'Formato', '04 FOr ROLD 02 resumen operac', 2, '2014-03-02', 34),
(96, 2, 1, 16, 'FORMATO DE VERIFICACION DIARIA DE LABORES DE LIMPIEZA Y DESINFECCION', '04 FOr VDLLD 02 l y d.docx', 'Formato', 'FOr- VDLLD 04-02/11-17 ', 2, '2017-11-02', 34),
(97, 2, 1, 17, 'FORMATO DE REGISTRO USO DE EQUIPOS, UTENSILIOS Y OTROS ELEMENTOS', '02 FOr REUE 02 reg uso equipos .pdf', 'Formato', '02 FOr REUE 02 reg uso equipos', 2, '2012-11-01', 34),
(98, 2, 1, 16, 'FORMATO INSTRUCTIVO DE LIMPIEZA Y DESINFECCIÃ“N', '04 FOr FILD 01 Instructivo LyD f-14.pdf', 'Formato', '04 FOr ILD 01 Ins LyD f-14', 2, '2014-02-01', 34),
(99, 2, 1, 16, 'FORMATO DE INSPECCION DE CONDICIONES DE LIMPIEZA Y DESINFECCION DE OPERARIOS', '04 FOr ICLDO 01 inspec opera .pdf', 'Formato', '04 FOr ICLDO 01 inspec opera ', 1, '2014-01-01', 34),
(100, 2, 1, 16, 'FORMATO DE INSPECCION Y AUDITORIA PROGRAMA DE LIMPIEZA Y DESINFECCION', '04 FOr IAPLD 01 insp y aud.docx', 'Formato', '04 FOr IAPLD 01 insp y aud lyd .pdf 	', 1, '2013-04-01', 22),
(101, 2, 1, 15, 'FORMATO DE PROTOCOLOS PARA ANALISIS DE LABORATORIO', '04 FOr PAL 01 proto tm pos.pdf', 'Formato', '04 FOr PAL 01 proto tm pos', 1, '2014-01-01', 35),
(102, 2, 1, 16, 'FORMATO CRONOGRAMA DE LIMPIEZA Y DESINFECCION PERIODICA', '04 FOr CLDP 01 crono limp perio.pdf', 'Formato', '04 FOr CLDP 01 crono limp perio', 0, '2015-11-01', 34),
(103, 2, 1, 13, 'INSTRUCTIVO PARA INDUCCION Y EMPALME SENA EMPRESA', '06 INs IE 01 ins indu empal se .pdf', 'Instructivo', 'INDUCCION Y EMPALME SENA EMPRESA 	06 INs IE 01 ins indu empal se', 1, '2015-03-01', 34),
(104, 2, 1, 1, 'FORMATO PARA CONTROL DE INVENTARIOS DE PRODUCTO TERMINADO (REMANENTES EN PLANTA) ', '04 CIPT 01 prod term.xlsx', 'Formato', 'FOr-CIPT-04-01/11-17 	', 1, '2017-11-01', 34),
(105, 3, 1, 1, 'FORMATO DE REGISTRO DISPOSICIÃ“N DE RESIDUOS PELIGROSOS', '04-FOr-RDRP-04-01 re dis re pel.docx', 'Formato', '04 FOr RDRP 01 re dis re pel', 1, '2014-11-10', 16),
(106, 3, 1, 1, 'FORMATO DE REGISTRO DE LECTURA DE MICROMEDIDORES', '04 FOr RLM 01 reg lec micr.xlsx', 'Formato', '04 FOr RLM 01 reg lec micr', 1, '2013-08-01', 16),
(107, 3, 1, 1, 'FORMATO DE ENTRADA DE INSUMOS AMBIENTALES', '04-FOr-EIA-04-01 ent ins ambie.xlsx', 'Formato', '04 FOr EIA 01 ent ins ambie', 1, '2013-03-01', 16),
(108, 3, 1, 1, 'FORMATO DE REGISTRO DE PROPAGACION POR ESQUEJES', '04-FOr-RPS-04-01 reg siemb esqu.xlsx', 'Formato', '04-FOr-RPE-04-02 reg siemb esqu', 1, '2016-02-01', 16),
(109, 3, 1, 1, 'FORMATO DE REGISTRO PROPAGACION POR SEMILLAS', '04 FOr RS 04 01 reg siemb semi.xlsx', 'Formato', '04 FOr RPS 04 02 reg siemb semi 	', 1, '2015-08-01', 16),
(110, 3, 2, 2, 'FORMATO DE INVENTARIOS DE INSUMOS AMBIENTALES', '07 FOr IIA 01 invent d insumos.xlsx', 'Formato', '07 FOr IIA 01 invent d insumos 	', 1, '2015-08-01', 36),
(111, 3, 1, 1, 'FORMATO DE REGISTRO, CONTROL Y PRESTAMOS DE HERRAMIENTAS', '04 FOr RCPH 01 reg con pre her.pdf', 'Formato', '04 FOr RCPH 01 reg con pre her', 1, '2018-08-01', 36),
(112, 3, 1, 1, 'FORMATO COMPARENDO AMBIENTA', '04 FOr CA 01 comparen ambient.pdf', 'Formato', '04 FOr CA 01 comparen ambient', 1, '2015-08-01', 37),
(113, 3, 1, 1, 'FORMATO DE REGISTRO, CONTROL Y PRESTAMOS DE HERRAMIENTAS ', '04 FOr RPH 01 regis prest.docx', 'Formato', 'FOr-RCPH-04-01/09-16 	', 1, '2015-08-01', 37),
(114, 3, 1, 1, 'FORMATO DE REGISTRO INSPECCION PUNTOS ECOLOGICOS ', '04 FOr RIPE 01 inspe punt.xlsx', 'Formato', 'INSPECCION PUNTOS ECOLOGICOS ', 1, '2017-11-01', 37),
(115, 3, 1, 1, 'FORMATO DE CONTROL DE INVENTARIO DE BOLSAS ', '04 FOr CIB 02 inve bols.xlsx', 'Formato', 'FORMATO ', 1, '2017-11-01', 37),
(116, 4, 1, 4, 'FORMATO INFORME EJECUTIVO', '04 FOr IE 01 forma inf ejecu.xlsx', 'Formato', '04 FOr IE 01 forma inf ejecu', 1, '2015-03-01', 38),
(117, 4, 1, 1, 'FORMATO INFORME DE PRODUCCION DE BIENES DE SENA EMPRESA', '04 FOr IPBSE 01 pro bie sen em.xls', 'Formato', '04 FOr IPBSE 01 pro bie sen em', 1, '2015-03-01', 18),
(118, 4, 5, 14, 'ACTA DE REUNIONES', '06 FOr AR 01 acta reunio.docx', 'Formato', '06 FOr AR 01 acta reunio', 1, '2013-02-01', 39),
(119, 4, 3, 3, 'FORMATO CRONOGRAMA DE VISITAS A UNIDADES', '01 FOr CVU 01 cronog VU.xlsx', 'Formato', '01 FOr CVU 01 cronog VU', 1, '2015-05-01', 40),
(120, 4, 1, 1, 'FORMATO REGISTRO DE ENTRADAS', '04 FOr RE 02 registr entra.xls', 'Formato', '04 FOr RE 02 registr entra', 1, '2014-01-04', 18),
(121, 4, 5, 18, 'FORMATO REGISTRO HORAS LABORALES', '06 FOr RHL 03 regis  hor lab.xlsx', 'Formato', '06 FOr RHL 03 regis hor lab', 2, '2012-05-02', 41),
(122, 4, 6, 18, 'INSTRUCTIVO PARA EL DILIGENCIAMIENTO REGISTRO DE HORAS LABORALES', '06 INs DRHL 01 dilig horas lab.docx', 'Formato', '06 INs DRHL 01 dilig horas lab', 1, '2015-09-01', 41),
(123, 4, 1, 1, 'FORMATO REGISTRO DE TRASLADO', '04 FOr RT 01 regis traslados.docx', 'Formato', '04 FOr RT 01 regis traslados', 1, '2014-11-01', 18),
(124, 4, 2, 19, 'FORMATO DE REGISTRO CONSOLIDADO DE COSTOS INDIRECTOS', '07 FOr RCC 01 regis cost ind.xlsx', 'Formato', '07 FOr RCC 01 regis cost ind', 1, '2014-11-01', 18),
(125, 4, 2, 19, 'FORMATO DE CONTROL INTERNO DE ACTIVIDADES BASICAS PARA EL LIDER CONTABLE Y FINANCIERO', '07 FOr CIABLCF 01 Cont int act.xlsx', 'Formato', '07 FOr CIABLCF 01 Cont int act', 1, '2014-12-01', 41),
(126, 4, 3, 3, 'FORMATO ACTA DE ENTREGA', '01 FOr AE 01 acta entrega.docx', 'Formato', '01 FOr AE 01 acta entrega', 1, '2012-11-01', 25),
(127, 4, 3, 3, 'FORMATO PLAN OPERATIVO', '01 FOr PO 01 plan operativo.xlsx', 'Formato', '01 FOr PO 01 plan operativo', 1, '2013-04-01', 25),
(128, 4, 3, 3, 'FORMATO DE CRONOGRAMA DE ACTIVIDADES', '01 FOr CDA 02 cronogra.xlsx', 'Formato', '01 FOr CA 02 crono activ', 1, '2014-10-02', 25),
(129, 4, 8, 20, 'FORMATO PLAN DE AUDITORIAS', '02 FOr PA 02 plan auditori.docx', 'Formato', '02 FOr PA 02 plan auditori', 2, '2013-04-02', 42),
(130, 4, 8, 3, 'FORMATO PAZ Y SALVO SENA EMPRESA', '01 FOr PSSE 01 paz salvo se em.docx', 'Formato', '01 FOr PSSE 01 paz salvo se em', 1, '2015-03-01', 43),
(131, 4, 2, 2, 'FORMATO DE INVENTARIO DIARIO', '07-FOr-ID-07-01 invent diario.pdf', 'Formato', '07 FOr ID 01 invent diario', 1, '2015-02-01', 39),
(132, 4, 6, 21, 'FORMATO DE REGISTRO DE VENTAS', '04-FOr-DRDV-04-01 reg ventas.xlsx', 'Formato', '05 FOr DRDV 01 reg ventas', 1, '2013-11-01', 38),
(133, 4, 5, 22, 'FORMATO  DE ASISTENCIA A CAPACITACIÃ“N', '06-FOr-06-01 asist capacit.docx', 'Formato', '06 FOr AC 01 asiste capacit', 1, '2012-11-01', 42),
(134, 4, 5, 14, 'FORMATO PROGRAMACIÃ“N DE TURNOS', '06-F0r-PT-06-01 progra turn.docx', 'Formato', '06 FOr PT 01 progra turn', 1, '2010-06-01', 44),
(135, 4, 9, 14, 'FORMATO SOLICITUD DE TURNOS ESPECIALES', '06-FOr-SDTE-06-01 sol tur esp.docx', 'Formato', '06 FOr SDTE 01 sol tur esp', 1, '2010-05-01', 44),
(136, 4, 9, 22, 'FORMATO PROCESO DE SELECCION DE SENA EMPRESA', '06-FOr-PDSDSE-06-01 PSSE.xlsx', 'Formato', '06 FOr PDSDSE 01 Proces SelecciÃ³n', 1, '2012-11-01', 44),
(137, 4, 5, 23, 'FORMATO PARA LA APROBACION DE DOCUMENTOS', '08-FOr-AYEDO-08-01 el est doc.xlsx', 'Formato', '08 FOr AYEDO 01 estand documen', 1, '2013-08-01', 43),
(138, 4, 1, 4, 'FORMATO DE REGISTRO DE ACCIDENTES LABORALES', '04-FOR-DRDAL-04-01 acc lab.pdf', 'Formato', '04 FOr DRDAL 01 acc lab', 1, '2012-05-01', 38),
(139, 4, 2, 19, 'FORMATO DESPRENDIBLE DE NOMINA.', '07-FOr-DNOM-07-01 despre nomina.pdf', 'Formato', '07-FOr-DNOM-07-01 despre nomina', 1, '2014-11-01', 41),
(140, 4, 2, 2, 'INSTRUCTIVO PARA EL DILIGENCIAMIENTO DEL FORMATO DE INVENTARIO DIARIO', '07 INs DFID 01 dilig inv diario.docx', 'Formato', '07 INs DFID 01 dilig inv diario', 1, '2015-09-01', 41),
(141, 4, 1, 1, 'FORMATO REGISTRO DE BAJAS', '04-FOr-RDBA-04-02 reg  baj.pdf', 'Formato', '04 FOr RDB 02 reg  baj', 2, '2014-11-07', 18),
(142, 4, 2, 19, 'FORMATO DE IMPUTACIÃ“N CONTABLE DE COSTOS INDIRECTOS', '07-FOr-DICDCI-07-01 ICCI.xlsx', 'Formato', '07 FOr DICDCI 01 Im contable', 1, '2014-01-04', 41),
(143, 4, 9, 19, 'INSTRUCTIVO DE PRODUCCION DE BIENES DE SENA EMPRESA', '04-INs PSE 04-01 instructivo PBSE.pdf', 'Instructivo', 'INS PSE 01 instructivo prest', 1, '2015-10-04', 38),
(144, 4, 5, 23, 'FORMATO SOLICITUD DE ELABORACIÃ“N, MODIFICACIÃ“N O DE CAMBIO DE DOCUMENTO', '08-FOr-SEMCD-08-01 SEMCD.xlsx', 'Formato', '08 FOr SEMCD 01 modif docum', 1, '2013-04-01', 43),
(145, 4, 9, 22, 'FORMATO DE ENTREVISTAS', '06 FOr FE 01 entrevista f-220.xlsx', 'Formato', '06 FOr FE 01 entrevista', 1, '2012-11-01', 44),
(146, 4, 1, 1, 'FORMATO DE REGISTRO DE MANEJO DE RESIDUOS', '06-FOr-04-01 manejo resid.xlsx', 'Formato', '06 FOr RMDR 01 manejo resid', 1, '2012-11-11', 16),
(147, 4, 1, 1, 'FORMATO REGISTRO DE BAJAS', '04 FOr RDB 02 registro bajas f-94.pdf', 'Formato', '04 FOr RDB 02 registro bajas', 1, '2012-11-01', 18),
(148, 4, 9, 22, 'FORMATO DE PLAN DE INDUCCION SENA EMPRESA', '06 FOr PI 01 plan inducc f-187 (1).pdf', 'Formato', '06 FOr PI 01 plan inducc SE', 1, '2010-04-01', 25),
(149, 4, 6, 21, 'FORMATO DE RELACION DE ENTREGA DE DINERO BASE EN  ADMINISTRACION DE LA FINCA', '05 FOr REDBAF 01 entre din admon.docx', 'Formato', '05 FOr REDBAF 01 entre din admon', 1, '2015-08-01', 45),
(150, 4, 6, 21, 'FORMATO DE PEDIDOS', '05 FOr P 01 pedidos.xlsx', 'Formato', '05 FOr P 01 pedidos', 1, '2015-08-01', 45),
(151, 4, 5, 23, 'FORMATO PARA LA APROBACION  Y ESTANDARIZACION  DE DOCUMENTOS', '08 FOr AYEDD 01 aprob y est doc f-13.pdf', 'Formato', '08 FOr AYEDD 01 aprob y est', 1, '2013-02-08', 25),
(152, 4, 3, 3, 'FORMATO EVALUACION NIVEL DE SATISFACCION', '01 FOr ENS 01 eva nivel satis.docx', 'Formato', '01 FOr ENS 01 eva nivel satis', 1, '2015-08-01', 40),
(153, 4, 3, 3, 'INSTRUCTIVO PARA LA ATENCION A VISITANTES ', '01 INs AV 01 ins atenc visitas.docx', 'Formato', '01 INs AV 01 ins atenc visita', 1, '2015-08-01', 40),
(154, 4, 8, 24, 'FORMATO ACCIONES PREVENTIVAS Y CORRECTIVAS', '02 FOr APC 01 accio preven y correc.xls', 'Formato', '02 FOr APC 01 accio preven y correc', 1, '2015-01-02', 46),
(155, 4, 5, 23, 'FORMATO SOLICITUD  DE ELABORACION, MODIFICACION Ã“ CAMBIO DE DOCUMENTOS', '08 FOr SEMCD 01 solicitud elab f-186.pdf', 'Formato', '08 FOr SEMCD 01 solicitud elab', 1, '2013-04-01', 25),
(156, 4, 2, 2, 'FORMATO DE INVENTARIO DE ELEMENTOS DE PROTECCION PERSONAL', '07 FOr EPP 01 elem prot. Pers..xlsx', 'Formato', '07 FOr IEPP 01 elem prot Pers', 1, '2015-09-01', 40),
(157, 4, 3, 3, 'FORMATO PEDIDO DE OFICINA SENA EMPRESA', '01 For POSE 01 pedi ofi senaemp.xlsx', 'Formato', '01 For POSE 01 pedi ofi senaemp', 1, '2015-09-01', 40),
(158, 4, 8, 20, 'FORMATO PROGRAMA DE AUDITORIAS INTERNAS', '02 FOr PAI 01 programa aud.pdf', 'Formato', '02 FOr PAI 01 programa aud', 1, '2015-09-01', 42),
(159, 4, 8, 20, 'FORMATO INFORME DE AUDITORIAS', '02-FOr- IDA 02-01 auditorias inter.pdf', 'Formato', '02 FOr IA 01 auditorias inter', 1, '2013-04-01', 42),
(160, 4, 8, 20, 'FORMATO EVALUACION DE AUDITORES INTERNOS POR AUDITADOS', '02-FOr- EAIPA 02-01 eval audi inter PA.pdf', 'Formato', '02 FOr EAIA 01 eva audi inter', 1, '2013-04-01', 42),
(161, 4, 8, 20, 'FORMATO DE EVALUACION DE AUDITOR INTERNO POR PARTE DEL AUDITOR LIDER', '02-FOr- EDAIPDAL 02-01 eva audi inter PPAL.pdf', 'Formato', '02 FOr EAIPAL 01 eva audi inte', 1, '2013-04-01', 42),
(162, 4, 8, 25, 'FORMATO CONTROL DEL PRODUCTO O SERVICIO NO CONFORME', '02 FOr CDPOSNC 02 cont prod SC.pdf', 'Formato', '02 FOr CPSNC 02 cont prod SC', 1, '2015-11-01', 42),
(163, 4, 1, 1, 'FORMATO DE CONTROL DE BOTELLONES', '04 FOr CB 01 control botellones.pdf', 'Formato', '04 FOr CB 01 control botellon', 1, '2015-10-01', 38),
(164, 4, 9, 14, 'FORMATO DE ASISTENCIA A TURNO ESPECIAL', '06 For ATE 01 asist turno espec.pdf', 'Formato', '06 FOr ATE 01 asist turno espe', 1, '2015-11-01', 38),
(165, 4, 5, 14, 'INSTRUCTIVO PARA LA ACTULIZACION DEL LISTADO MAESTRO EN EL BLOG SENA EMPRESA', '08 INs 01 actuali listad maestro .pdf', 'Instructivo', '08 INs 01 actuali listad maestr', 1, '2016-05-01', 42),
(166, 4, 9, 22, 'FORMATO CHECK LIST EMPALME', '06 FOr CLE 01 check list emp.pdf', 'Formato', '06 FOr CLE 01 check list emp', 0, '2017-04-01', 40),
(167, 4, 5, 23, 'INSTRUCTIVO PARA ACTULIZACION DE LISTADO MAESTRO EN EL BLOG SENA EMPRESA', '08 INs 01 actuali listad maestro (1).pdf', 'Formato', '08 INs 01 actuali listad maestro', 1, '2016-09-01', 42),
(168, 4, 5, 23, 'MANUAL DE FUNCIONES Y COMPETENCIAS SENA EMPRESA', 'Manual de Funciones y Competencias Version 03 del 2016 (1) (1).pdf', 'Manual', 'Manual de Funciones y Compe', 1, '2014-04-03', 42),
(169, 4, 5, 23, 'MANUAL DE LA CALIDAD', 'MCa - MANUAL DE LA CALIDAD. 3 de mayo 2016  (5).pdf', 'Manual', 'MCa-MANUAL DE LA CALIDAD', 1, '2013-04-03', 42),
(170, 4, 5, 23, 'MANUAL DE PROCESOS Y PRODEDIMIENTOS', 'MANUAL DE PROCESOS Y PROCEDIMIENTOS pdf.pdf', 'Manual', 'MANUAL DE PROCESOS Y PROCE', 1, '2016-09-03', 42),
(171, 4, 5, 23, 'INSTRUCTIVO PARA LA ELABORACION Y CODIFICACION DE DOCUMENTOS', '08 INs 03 elaboracion document (3) (1).pdf', 'Instructivo', '08 INs 03 elaboracion document', 1, '2016-09-03', 42),
(172, 4, 9, 14, 'FORMATO DE LISTA DE CHEQUEO TURNO RUTINARIO', '06 FOr LCTR lista cheq turn rutin.pdf', 'Formato', '06 FOr LCTR 03 lista cheq turn rutin', 1, '2016-08-03', 43),
(173, 4, 6, 21, 'FORMATO DE VENTAS DIARIAS', 'FORMATO DE VENTAS DIARIAS.xlsx', 'Formato', 'FORMATO DE VENTAS DIARIAS.xlsx', 2, '2017-03-02', 45),
(174, 4, 3, 13, 'FORMATO DE ACTIVIDADES FIN DE SEMANA', 'FORMATO FIN DE SEMANA (1).xlsx', 'Formato', 'FORMATO FIN DE SEMANA (1).xlsx', 1, '2017-03-01', 47),
(175, 4, 3, 26, 'INTRUCTIVO ', '08 INs 01 Nomb De Archiv.pdf', 'Instructivo', 'INs-08-01/10-17', 1, '2017-02-01', 47),
(176, 4, 3, 27, 'FORMATO ', '04 FOr ISA 01 informe sem.docx', 'Formato', 'FOr-ISA- 04-02/10- 17', 1, '2017-10-02', 18),
(177, 4, 3, 28, 'FORMATO DE VISITAS ', '01 FOr AVC 01 visit al centr.xlsx', 'Formato', '01 FOr AVC 01 visit al centr', 1, '2017-10-01', 18),
(178, 4, 3, 29, 'FORMATO ', '01 For TAFS 01 Apoyo Fin.xlsx', 'Formato', 'APOYO FIN DE SEMANA ', 1, '2017-10-01', 40),
(179, 4, 3, 30, 'FORMATO', '01 For PSED 01 permi dom.xlsx', 'Formato', 'PERMISOS SENA EMPRESA ', 1, '2017-10-01', 40),
(180, 4, 3, 31, 'FORMATO', '06 FOr RNN 01 repor nom.xlsx', 'Formato', 'REPORTE NOVEDADES ', 1, '2017-01-01', 15),
(181, 4, 5, 32, 'FORMATO', '08 FOr RVDLM 01 regis y veri.xlsx', 'Formato', ' 	VERIFICACIÃ“N DE DOCUMENTOS 	', 1, '2017-10-01', 15),
(182, 4, 3, 33, 'FORMATO', '01 FOr LICFS 01 list ingre.xlsx', 'Formato', 'DE INGRESO AL CENTRO ', 1, '2017-10-01', 15),
(183, 4, 3, 34, 'FORMATO', '06 For MT 02 mem turn.docx', 'Formato', 'MEMORANDO TURNOS ', 1, '2017-10-01', 15),
(184, 4, 3, 35, 'FORMATO', '06 For MG 02 mem sen.docx', 'Formato', 'MEMORANDO SENA EMPRESA ', 1, '2017-10-01', 15),
(185, 5, 1, 4, 'FORMATO INFORME DE PRESTACION DE SERVICIOS MECANIZACION', '04-FOr-IDPDSM-04-02  prestacion SSE.xls', 'Formato', '04 FOr IDPDSM 02 prestacion SSE', 2, '2015-03-02', 48),
(186, 5, 1, 4, 'PROGRAMA DE MANTENIMIENTO PREVENTIVO DE TRACTORES E IMPLEMETOS AGRICOLAS', '04-FOr-PMPTIA-04-01 MPTIA.xlsx', 'Formato', '04 FOr PMPTIA 01 mant prev eq', 1, '2015-05-01', 49),
(187, 5, 1, 36, 'FORMATO DE CONTROL DE MAQUINARIA MECANIZACION', '04-FOr-CMM-04-01 contrl maqu.docx', 'Formato', '04 FOr CMM 01 cntrl maqu', 1, '2012-11-01', 50),
(188, 5, 1, 4, 'FORMATO DE CONTROL DE MANTENIMIENTO DE MAQUINARIA Y EQUIPO', '04-FOr-CMME-04-01 contrl ma eq.xlsx', 'Formato', '04 FOr CMME 01 Contr mant eq', 1, '2012-11-01', 50),
(189, 5, 1, 4, 'FORMATO DE SOLICITUD DE SERVICIOS UNIDAD DE MECANIZACION AGRICOLA', '04-FOr-SDSUDMA-04-02 soli SUMA.xlsx', 'Formato', '04 FOr SDSUMA 02 Solic serv', 1, '2010-06-02', 50),
(190, 5, 2, 2, 'FORMATO REGISTRO CONTROL INVENTARIOS DE MAQUINARIA Y EQUIPOS', '07-FOr-RCIME-07-01 CIME.xlsx', 'Formato', '07 FOr RCIME 01 RCIME', 1, '2014-12-01', 41),
(191, 5, 1, 4, 'FORMATO DE REGISTRO DE DETERMINACIÃ“N DE ACPM', '04-FOr-RDDDAC-04-01 dete acpm.xlsx', 'Formato', '04 FOr RDA 01 dete acpm', 1, '2014-11-01', 18),
(192, 5, 1, 1, 'FORMATO DE HERRAMIENTAS', '04-FOr-DHER-04-01 herramienta.xlsx', 'Formato', '04 FOr HER 01 For herram', 1, '2012-05-01', 51),
(193, 5, 2, 2, 'FORMATO DE INVENTARIO MECANIZACIÃ“N AGRICOLA', '07-FOr-DIMA-07-01 inv mec agr.xlsx', 'Formato', '07 FOr IMA 01 inv mec agr', 1, '2015-03-01', 51),
(194, 5, 1, 4, 'FORMATO DE REGISTRO CONSUMO DE COMBUSTIBLES', '04-FOr-DRCDC-04-01 reg con com.docx', 'Formato', '04 FOr RCC 01 reg combus', 1, '2013-08-01', 51),
(195, 5, 9, 14, 'ASISTENCIA A SENA EMPRESA', '06-FOr-ASE-06-02  asi sen emp.xlsx', 'Formato', '06 FOr ASE 02  asi sen emp', 1, '2012-11-01', 15),
(196, 5, 9, 14, 'ASISTENCIA A SENA EMPRESA', '06-FOr-ASE-06-02  asi sen emp-1.xlsx', 'Formato', '06 FOr ASE 02  asi sen emp', 1, '2012-11-02', 15),
(197, 5, 1, 4, 'FORMATO DE INFORME DE LABORES DIARIAS', '04 For ILD 01 infor labo diarias.pdf', 'Formato', 'FORMATO DE INFORME DE LABORES DIARIAS', 1, '2015-12-01', 51),
(198, 5, 1, 4, 'FORMATO DE SOLICITUD DE SERVICIOS PARA GESTION A CULTIVOS UNIDAD DE MECANIZACION AGRICOLA', '04 FOr SSGCUMA 04 solicit gestion a cult.pdf', 'Formato', '04 FOr SSGCUMA 04 solict gesti', 1, '2016-02-02', 51),
(199, 5, 1, 4, 'FORMATO INFORME EJECUTIVO AREA MECANIZACION AGRICOLA', '04 FOr IEAMA 04 inform ejec mec..pdf', 'Formato', '04 FOr IEAMA 04 inform ejec me', 1, '2016-05-02', 51),
(200, 5, 1, 1, 'FORMATO SOLICITUD DE SERVICIOS UNIDAD DE MECANIZACION AGRICOLA', '04 FOr SDSUMA 04 solic serv mec.pdf', 'Formato', '04 FOr SSUMA 04 solic serv me', 1, '2016-05-01', 51),
(201, 5, 1, 4, 'FORMATO DE INFORME SEMANAL TRANSPORTE UNIDAD DE MECANIZACION AGRICOLA', '04 FOr ISTUMA 01 info sema transp.pdf', 'Formato', '04 FOr ISTUMA 01 info sema tr', 1, '2015-12-01', 51),
(202, 5, 1, 4, 'FORMATO CONTROL DE MANTENIMIENTO PREVENTIVO DE TRACTORES E IMPLEMENTOS AGRICOLAS', '04 FOr CMPTIA 01 mant prev tract.pdf', 'Formato', '04 FOr CMPTIA 01 mant prev tr', 1, '2015-12-01', 51),
(203, 5, 1, 4, 'FORMATO CONTROL DE MANTENIMIENTO CORRECTIVO DE TRACTORES E IMPLEMENTOS AGRICOLAS', '04 FOr CMCTIA 01 mant corre tract.pdf', 'Formato', '04 FOr CMCTIA 01 mant corre tr', 1, '2015-12-01', 51),
(204, 6, 1, 1, 'FORMATO MANEJO DE ENSILAJE', '04-FOr-MDE-04-01 mane ensilaj.docx', 'Formato', '04 FOr ME 01 mane ensilaj', 1, '2012-11-01', 18),
(205, 6, 1, 4, 'FORMATO REGISTRO USO DE MEDICAMENTOS VETERINARIOS UNIDAD DE GANADERIA', '04-FOr-RUMVUG-04-01  RUMV.xlsx', 'Formato', '04 FOr RUMVUG 01 Usomedicvet', 1, '2015-05-01', 18),
(206, 6, 2, 2, 'FORMATO INVENTARIO DE ANIMALES PORCINOS', '07-FOr-IAP-07-01 invent anim.xlsx', 'Formato', '07 FOr IAP 01 invent anim', 1, '2012-11-01', 18),
(207, 6, 1, 1, 'FORMATO DE REGISTRO DIARIO DE CONSUMO Y SALDO DE ALIMENTO', '04-FOr-RDCSA-04-02 cons sal alim.xlsx', 'Formato', '04 FOr RDCSA 02 cons sald alim', 1, '2016-11-02', 18),
(208, 6, 1, 1, 'FORMATO DE PROGRAMACION DE PARTOS', '04-FOr-DPDP-04-01 progra part.docx', 'Formato', '04 FOr PP 01 progra part', 1, '2012-03-01', 18),
(209, 6, 1, 1, 'FORMATO DE CONTROL SANITARIO', '04-FOr-DCSA-04-01 contr sanit.pdf', 'Formato', '04 FOr DCSA 01 contr sanit', 1, '2012-03-01', 18),
(210, 6, 1, 4, 'FORMATO DE CONTROL DE PESO', '04-FOr-DCDP-04-01 contl peso.docx', 'Formato', '04 FOr CP 01 contl peso', 1, '2012-03-01', 18),
(211, 6, 1, 4, 'FORMATO DE CONTROL DE ENTRADAS Y SALIDAS DE SEMOVIENTES', '04-FOR-DCDEYSDS-04-01 CESS.xlsx', 'Formato', '04 FOr CESS 01 EntrSaliSemov', 1, '2016-03-01', 18),
(212, 6, 1, 1, 'FORMATO DE  REGISTROS PARA PRECEBOS', '04-FOr-DRPP-04-01 reg precebo.xlsx', 'Formato', '04 FOr RP 01 reg precebo', 1, '2013-11-01', 18),
(213, 6, 9, 14, 'FORMATO  VISITAS A  LA UNIDAD DE GANADERIA', '06-FOr-VUG-06-01 visitas uni gan.docx', 'Formato', '06 FOrVUG 01 visitas uni gan', 1, '2012-05-01', 18),
(214, 6, 1, 1, 'FORMATO DE REGISTRO DE NACIMIENTO', '04-FOr-RN-04-01 reg nacimien.xlsx', 'Formato', '04 FOr RN 01 reg nacimien', 1, '2014-10-01', 18),
(215, 6, 1, 1, 'FORMATO REGISTRO PRODUCCION DIARIA', '04-FOr-RDDPP-04-02 reg pro dia.xlsx', 'Formato', '04 FOr RDPP 02 reg pro dia', 1, '2013-02-04', 18),
(216, 6, 1, 1, 'FORMATO DE REGISTRO DE CAMADA', '04-FOr-RDC-04-01 reg camadas.xlsx', 'Formato', '04 FOr RC 01 reg camadas', 1, '2013-11-01', 18),
(217, 6, 1, 1, 'FORMATO DE PALPACIONES', '04-FOr-DP-04-01 palpaciones.docx', 'Formato', '04 FOr P 01 palpaciones', 1, '2012-12-01', 18),
(218, 6, 1, 1, 'FORMATO DE MORTALIDAD UNIDAD DE OVINOS', '04 FOr RMUO 01 mortalidad ovi.xlsx', 'Formato', '04 FOr RMUO 01 mortalidad ovi', 1, '2015-09-01', 18),
(219, 6, 1, 1, 'FORMATO DE MORTALIDAD', '04-FOr-RM-04-01 mortalidad.xlsx', 'Formato', '04-FOr RM 01 mortalidad', 1, '2012-08-01', 18),
(220, 6, 1, 1, 'FORMATO DE CONTROL  SANITARIO INDIVIDUAL', '04-FOr-CSI-04-01 con san indi.xlsx', 'Formato', '04 FOr CSI 01 cont san indi', 1, '2013-11-01', 18),
(221, 6, 1, 1, 'FORMATO DE HOJA DE VIDA DE LA UNIDAD DE PISCICULTURA', '04-FOr-HVUP-04-01 hoja vida pis.docx', 'Formato', '04 FOr HVUP 01 hoja vida pis', 1, '2012-08-01', 18),
(222, 6, 1, 1, 'FORMATO DE HOJA DE VIDA DE LA UNIDAD DE PISCICULTURA', '04-FOr-HVUP-04-01 hoja vida pis(1).docx', 'Formato', '04 FOr HVUP 01 hoja vida pis', 1, '2012-08-01', 18),
(223, 6, 2, 2, 'FORMATO DE INVENTARIO DE SEMOVIENTES', '07-FOr-IS-07-01 inv semovie.xlsx', 'Formato', '07 FOr IS 01 inv semovie', 1, '2015-05-07', 18),
(224, 6, 1, 1, 'FORMATO DE REGISTRO PRODUCCIÃ“N ESTANQUES', '04-For-RPE-04-01 reg pro est.xlsx', 'Formato', '04 For RPE 01 reg pro est', 1, '2013-08-01', 18),
(225, 6, 1, 1, 'REGISTRO DE SANIDAD ACUICOLA', '04-FOr-SA 04-01 reg san acuicu.xlsx', 'Formato', '04 FOr SA 01 reg san acuicu', 1, '2014-06-01', 18),
(226, 6, 1, 1, 'FORMATO DE REGISTRO  INVENTARIO DE ENJAMBRAMIENTOS', '04-FOr-RIE-04-01  RI  enjambram.xlsx', 'Formato', '04 FOr RIE 01  RI  enjambram', 1, '2014-11-01', 18),
(227, 6, 1, 1, 'FORMATO TABLA DE GESTACIÃ“N DE LA CERDA', '04-FOr-RTG-04-01 tab ges cerda.xlsx', 'Formato', '04 FOr TGC 01 tab ges cerda', 1, '2012-11-01', 18),
(228, 6, 1, 1, 'FORMATO DE INGRESO A LA UNIDAD ', '04 FOr IU 01 ingreso unidad.xlsx', 'Formato', '04 FOr IU 01 ingreso unidad', 1, '2015-09-01', 18),
(229, 6, 1, 1, 'FORMATO DE REGISTRO CONTROL TRIMESTRAL  DE MACHOS', '04-FOr-DCTDM_04-01 con tri mac.xlsx', 'Formato', '04 FOr RCTM 01 con tri mac', 1, '2015-03-01', 18),
(230, 6, 1, 1, 'FORMATO DE REGISTRO DE COSECHAS PISCICULTURA', '04-FOr-DRDCDP-04-01 cosech pis.xlsx', 'Formato', '04 FOr RCP 01 cosech pis', 1, '2015-03-01', 18),
(231, 6, 1, 1, 'FORMATO DE CHEQUEO TURNO DE QUINCE DIAS', '06-FOr-DCTDQD-06-02 lista ch TQ.xlsx', 'Formato', '06 For CTQD 02 cheq Tur Quince', 1, '2015-03-02', 18),
(232, 6, 1, 1, 'FORMATO DE MUESTREO PISCICULTURA', '04-FOr-DMP-04-01 muestr pisci.xlsx', 'Formato', '04 FOr MP 01 muestr pisci', 1, '2015-03-01', 18),
(233, 6, 1, 1, 'FORMATO DE REGISTRO DE PESAJE Y FAMACHA', '04-FOr-PF-04-01 reg pes fama.xlsx', 'Formato', '04 FOr RPF 01 reg pesa fama', 1, '2015-02-01', 18),
(234, 6, 1, 1, 'FORMATO DE REGISTROS SERVICIOS', '04-FOr-RS-04-01 reg servic.xlsx', 'Formato', '04 FOr RS 01 reg servic', 1, '2013-11-01', 18),
(235, 6, 1, 1, 'FORMATO REGISTRO INDIVIDUAL DE HEMBRA DE CRÃA', '04-FOr-RIHC-04-01  reg ind hem cria.xlsx', 'Formato', '04 FOr RIHC 01  reg ind hem cria', 1, '2015-02-01', 18),
(236, 6, 4, 1, 'FORMATO DE  REGISTRO INDIVIDUAL DE TRATAMIENTOS', '04-FOr-RIT-04-01 reg ind trata.xlsx', 'Formato', '04 FOr RIT 01 reg ind trata', 1, '2015-03-01', 18),
(237, 6, 1, 1, 'FORMATO DE REGISTRO PRODUCTIVO DE LOTES', '06-FOr-LCTRLA-06-02  lis che TLA.xlsx', 'Formato', '04 FOr RPL 01 reg prod lote', 1, '2013-02-01', 18),
(238, 6, 1, 1, 'FORMATO DEL USO DE MEDICAMENTOS VETERINARIOS', '04 FOr UMV 01 uso med vet.docx', 'Formato', '04 FOr UMV 01 uso med vet', 1, '2015-01-04', 18),
(239, 6, 1, 1, 'FORMATO DE LIMPIEZA Y DESINFECCIÃ“N DE LA UNIDAD DE AVICULTURA', '04 FOr LDUA 01 lim des uni avi.docx', 'Formato', '04 FOr LDUA 01 lim des uni avi', 1, '2015-07-01', 18),
(240, 6, 1, 1, 'FORMATO DE TRATAMIENTO TERMICO DE LA GALLINAZA O CODORNAZA', '04 FOr TTGC 01 tra ter gall cod.docx', 'Formato', '04 FOr TTGC 01 tra ter gall cod', 1, '2015-07-01', 18),
(241, 6, 1, 1, 'FORMATO DE VACUNACION', '04 FOr V 01 vacunaciÃ³n.docx', 'Formato', '04 FOr V 01 vacunaciÃ³n', 1, '2015-07-01', 18),
(242, 6, 1, 1, 'FORMATO DE MORTALIDAD DE AVES', '04 FOr MA 01 mor aves.docx', 'Formato', '04 FOr MA 01 mor aves', 1, '2015-07-01', 18),
(243, 6, 1, 1, 'FORMATO DE MANEJO Y DISPOSICION DE LA MORTALIDAD EN LA GAB DE AVES DE POSTURA ', '04 FOr MDMGAP 01 man mor aves.docx', 'Formato', '04 FOr MDMGAP 01 man mor aves', 1, '2015-07-01', 18),
(244, 6, 1, 1, 'FORMATO DE MANTENIMIENTO', '04 FOr M 01 mantenimiento.docx', 'Formato', '04 FOr M 01 mantenimiento', 1, '2015-07-01', 18),
(245, 6, 1, 1, 'FORMATO DE TRATAMIENTO DE AGUA', '04 FOr TA 01 tra agua.docx', 'Formato', '04 FOr TA 01 tra agua', 1, '2015-07-01', 18),
(246, 1, 1, 1, 'FORMATO DE INGRESO DE PERSONAS Y VEHICULOS A LA GRANJA AVICOLA BIOSEGURA', '04 FOr IPVGAB 01 ing per veh gab.docx', 'Formato', '04 FOr IPVGAB 01 ing per veh gab', 1, '2015-01-01', 18),
(247, 6, 1, 1, 'FORMATO DE TRAZABILIDAD DEL HUEVO PARA CONSUMO HUMANO', '04 FOr THCH 01 tra hue con hum.docx', 'Formato', '04 FOr THCH 01 tra hue con hum', 1, '2015-07-01', 18),
(248, 6, 1, 1, 'FORMATO DE CONTROL DE PLAGAS EN LA UNIDAD DE AVICULTURA', '04 FOr CPUA 01 con pla avi.docx', 'Formato', '04 FOr CPUA 01 con pla avi', 1, '2015-07-01', 18),
(249, 6, 1, 1, 'IN STRUCTIVO PARA EL DILIGENCIAMIENTO REGISTRO DE BAJAS', '04 INs DRB 01 dil reg bajas.docx', 'Instructivo', '04 INs DRB 01 dil reg bajas', 1, '2015-05-01', 18),
(250, 6, 1, 1, 'INSTRUCTIVO PARA EL DILIGENCIAMIENTO REGISTRO DE ENTRADAS', '04 INs DRE 01 dil reg entradras.docx', 'Instructivo', '04 INs DRE 01 dil reg entradras', 1, '2015-05-01', 18),
(251, 6, 1, 1, 'INSTRUCTIVO PARA EL DILIGENCIAMIENTO REGISTRO DE TRASLADOS', '04 INs DRT 01 dil reg traslados.docx', 'Formato', '04 INs DRT 01 dil reg traslados', 1, '2015-05-01', 18),
(252, 6, 1, 1, 'FORMATO REGISTRO DE ADMINISTRACION DE MEDICAMENTOS VETERINARIOS UNIDAD DE OVINOS', '04 FOr RAMVUO 01 adm med ovi.xlsx', 'Formato', '04 FOr RAMVUO 01 adm med ovi', 1, '2015-09-01', 18),
(253, 6, 1, 1, 'FORMATO CONTROL DE MONTAS UNIDAD DE OVINOS', '04 FOr CMUO 01 montas uni ovi.docx', 'Formato', '04 FOr CMUO 01 montas uni ovi', 1, '2015-09-01', 18),
(254, 6, 1, 1, 'INSTRUCTIVO PARA EL DILIGENCIAMIENTO REGISTRO DIARIO DE PRODUCCIÃ“N PECUARIA', '04 INs DRDPP 01 dil reg dia pecua.docx', 'Instructivo', '04 INs DRDPP 01 dil reg dia pecua', 1, '2015-05-01', 18),
(255, 6, 1, 1, 'FORMATO DE REGISTRO CONSOLIDADO SEMANAL DE PRODUCCION AVICOLA', '04 FOr RCSPA 01 cons sem produc avi.xlsx', 'Formato', '04 FOr RCSPA 01 cons sem produc avi', 1, '2015-12-01', 18),
(256, 6, 1, 1, 'FORMATO DE REGISTRO DIARIO DE PRODUCCION AVICOLA', '04 FOr RDPA 01 reg diar produ avi.xlsx', 'Formato', '04 FOr RDPA 01 reg diar produ avi 	', 1, '2015-10-01', 18),
(257, 6, 1, 1, 'FORMATO DE SUMINISTRO DE ALIMENTO APIARIO', '04 FOr SAA 01 sumi alimen api.pdf', 'Formato', '04 FOr SAA 01 sumi alimen api', 1, '2015-11-11', 18),
(258, 6, 1, 1, 'FORMATO DE PERDIDAS EN PROCESO', '04 For PP 01 perdidas procesos.pdf', 'Formato', '04 For PP 01 perdidas procesos', 1, '2015-11-01', 18),
(259, 6, 1, 1, 'FORMATO CONTROL DE LOTE DE PRODUCCION PECUARIA', 'O4 FOr CLPP O1 contr lot prod pec.pdf', 'Formato', 'O4 FOr CLPP 01 cont lot pro pe', 1, '2015-11-01', 18),
(260, 6, 1, 1, 'FORMATO DE REGISTRO DIARIO DE PRODUCCION PECUARIA PLANTA DE CONCENTRADOS', '04 FOr RDPPPDC 04 regist prod plant con.pdf', 'Formato', '04 FOr RDPPPC 04 reg plant con', 1, '2016-05-02', 18),
(261, 6, 1, 1, 'FORMATO FICHAS TECNICAS UNIDADES PECUARIAS', 'FORMATO FICHAS TÃ‰CNICAS.pdf', 'Formato', '04 FOr FTUP 02 fic tec uni pec', 1, '2016-05-02', 18),
(262, 6, 1, 1, 'FORMATO SOLICITUD DE MATERIALES', '04 FOr MN 02 medicion nitrog.pdf', 'Formato', '04 FOr MNL 02 medicion nitrog', 1, '2016-06-02', 18),
(263, 6, 1, 1, 'FORMATO CONTROL PRESTAMO DE EQUIPOS', '04 FOr 01 solicitud materiales.pdf', 'Formato', '04 FOr CPE 02 contr pres equip', 1, '2016-06-02', 18),
(264, 6, 1, 1, 'FORMATO REPORTE DE MORTALIDAD UNIDAD DE PORCINOS', '04 FOr 01 report mortali porci.pdf', 'Formato', '04 FOr RMUP 01 repor mort porc', 1, '2016-06-02', 18),
(265, 6, 1, 1, 'FORMATO DE REGISTRO DE TRASLADO SEMOVIENTES Y/0 ELEMENTOS', '04 FOr RTSE 02  regis trans semov elemen .pdf', 'Formato', '04 FOr RTS 02 reg tra sem ele', 1, '2016-06-02', 18),
(266, 6, 3, 3, 'FORMATO CRONOGRAMA DE VISITAS UNIDAD DE OVINOS', '07 FOr CVUO 02 CRONOG.pdf', 'Formato', '07 FOr CVUO 02 cron acti ovin', 1, '2016-06-02', 18),
(267, 6, 2, 2, 'FORMATO DE REGISTRO DE INVENTARIO MENSUAL DE MEDICAMENTOS', '04 FOr RIMM 01 regist inv mens medica .pdf', 'Formato', '04 FOr RIMM 01 reg inv men med ', 1, '2016-06-02', 18),
(268, 6, 1, 1, 'FORMATO CONTROL DE ALIMENTOS PARA SEMOVIENTES (KARDEX)', '04 FOr 01 contro alimen semovien.pdf', 'Formato', '04 FOr CASK 01 contr alim semo', 1, '2016-06-01', 18),
(269, 6, 1, 4, 'FORMATO DE COLECTA DE SEMEN EX)', 'RECOLECCION DE SEMEN.xlsx', 'Formato', 'RECOLECCION DE SEMEN.xlsx', 1, '2017-03-02', 52),
(270, 6, 1, 1, 'SOLICITUD DE MATERIALES', 'SOLICITUD DE MATERIALES.xlsx', 'Formato', 'SOLICITUD DE MATERIALES.xlsx 	', 1, '2017-03-02', 52),
(271, 6, 1, 1, 'FORMATO MEDICION DE NITROGENO', 'FORMATO MEDICION DE NITROGENO.xlsx', 'Formato', 'FORMATO MEDICION DE NITROGENO.xlsx', 1, '2017-03-04', 52),
(272, 6, 1, 1, 'FORMATOS DE ECOGRAFIAS', 'FORMATO DE ECOGRAFIAS.xlsx', 'Formato', 'FORMATO DE ECOGRAFIAS.xlsx', 1, '2017-03-03', 18),
(273, 6, 1, 1, 'FORMATO DE ALIMENTACIÃ“N DIARIA UNIDAD DE PORCINOS ', '04 FOr ADUP 01 aliment dia.xlsx', 'Formato', 'ALIMENTACIÃ“N DIARIA ', 1, '2017-03-03', 18),
(274, 6, 1, 1, 'FORMATO DE CELOS Y MONTAS UNIDAD DE GANADERIA ', '04 FOr CMUG 01 for cel y mon.xlsx', 'Formato', 'FORMATO DE CELOS Y MONTAS ', 1, '2017-03-03', 18),
(275, 6, 1, 1, 'FORMATO REGISTRO DE INVENTARIO DIARIO DE SEMOVIENTES', '04 FOr RIDS 01 inven diari.xlsx', 'Formato', 'INVENTARIO DIARIO DE SEMOVIENTES ', 1, '2017-03-03', 18),
(276, 6, 1, 1, 'FORMATO REGISTRO DE SALIDA PRODUCTO TERMINADO AREA PECUARIA ', '04 FOr RSPTAP 02 produc termi.xlsx', 'Formato', 'REGISTRO DE SALIDA PRODUCTO ', 1, '2017-03-03', 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procedimiento`
--

CREATE TABLE `procedimiento` (
  `Id_Procedimiento` bigint(20) NOT NULL,
  `Nombre_Procedimiento` varchar(500) NOT NULL,
  `id_proceso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `procedimiento`
--

INSERT INTO `procedimiento` (`Id_Procedimiento`, `Nombre_Procedimiento`, `id_proceso`) VALUES
(1, 'PLANEACION Y CONTROL DE LA PRODUCCION', 1),
(2, 'CONTROL DE INVENTARIOS', 2),
(3, 'PLANEACION OPERATIVA', 3),
(4, 'PRESTACION Y CONTROL DEL SERVICIO', 1),
(13, 'PLANEACION ADMINISTRATIVA Y OPERATIVA ', 3),
(14, 'PROGRAMACION Y CONTROL DE TURNOS', 9),
(16, 'LIMPIEZA Y DESINFECCION', 1),
(17, 'MANTENIMIENTO', 1),
(18, 'ELABORACIÃ“N DE NOMINA', 1),
(19, 'GESTIÃ“N FINANCIERA Y CONTABLE', 1),
(20, 'AUDITORIAS INTERNAS', 1),
(21, 'MERCADEO Y VENTAS', 1),
(22, 'SELECCIÃ“N, DESARROLLO Y EVALUACIÃ“N DE DESEMPEÃ‘O DE PERSONAL ', 1),
(23, 'CONTROL Y REGISTROS DE DOCUMENTOS ', 1),
(24, 'ACCIONES PREVENTIVAS Y CORRECTIVAS', 1),
(25, 'CONTROL DEL PRODUCTO O SERVICIO NO CONFORME', 1),
(26, 'INTRUCTIVO DE NOMBRES DE ARCHIVOS', 1),
(27, 'FORMATO DE INFORME SEMANAL DE ACTIVIDADES ', 1),
(28, 'FORMATO ASISTENCIA DE VISITAS AL CENTRO', 1),
(29, 'FORMATO DE TURNOS DE APOYO FIN DE SEMANA ', 1),
(30, 'FORMATO DE PERMISOS SENA EMPRESA DOMINGO ', 1),
(31, 'FORMATO DE REPORTE NOVEDADES DE NOMINA ', 1),
(32, 'FORMATO DE REGISTRO Y VERIFICACIÃ“N DE DOCUMENTOS EN EL LISTADO MAESTRO', 1),
(33, 'FORMATO LISTADO DE INGRESO AL CENTRO FIN DE SEMANA ', 1),
(34, 'MEMORANDO TURNOS ', 1),
(35, ' MEMORANDO SENA EMPRESA ', 1),
(36, 'PLANEACION Y CONTROL DE CALIDAD', 1),
(39, 'prueba de nuevo procedimieno', 1),
(41, 'actualizacion de procedimiento 121', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proceso`
--

CREATE TABLE `proceso` (
  `Id_Proceso` bigint(20) NOT NULL,
  `Nombre_Proceso` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `proceso`
--

INSERT INTO `proceso` (`Id_Proceso`, `Nombre_Proceso`) VALUES
(1, 'PRODUCCION DE BIENES Y PRESTACION DE SERVICIOS'),
(2, 'GESTION CONTABLE Y FINANCIERA'),
(3, 'GESTION ADMINISTRATIVA'),
(4, 'PLANEACION Y CONTROL DE LA PRODUCCION'),
(5, 'GESTION DOCUMENTAL'),
(6, 'MERCADEO Y VENTAS'),
(7, 'LIMPIEZA Y DESINFECCION'),
(8, 'MEJORA CONTINUA'),
(9, 'GESTION DEL TALENTO HUMANO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsable`
--

CREATE TABLE `responsable` (
  `Id_Responsable` bigint(20) NOT NULL,
  `Nombre_Responsable` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `responsable`
--

INSERT INTO `responsable` (`Id_Responsable`, `Nombre_Responsable`) VALUES
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
(52, 'GESTOR DE LABORATORIO DE REPRODUCCION');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_Usuario` bigint(20) NOT NULL,
  `rol` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nombre_Usuario` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `usuario` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `contrasena` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_Usuario`, `rol`, `nombre_Usuario`, `usuario`, `contrasena`) VALUES
(4, 'administrador', 'Luis Alejandro Munoz', 'munoz2005', '$2y$15$lRTleBE/J8qasgyF0/c24.K9v0Eb14X33q0xrjP3C5VU4Kwnf1s4m'),
(6, 'administrador', 'Daniel Cardenas', 'dacarloz', '$2y$15$mpz55PeLY1y4pBYdFyWhHe5d9/DCRdsHkUVkLQLzMw1JmYQzjo4ou');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`Id_Area`);

--
-- Indices de la tabla `detalle_area_documento`
--
ALTER TABLE `detalle_area_documento`
  ADD PRIMARY KEY (`id_detalle`);

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`Id_Documento`);

--
-- Indices de la tabla `procedimiento`
--
ALTER TABLE `procedimiento`
  ADD PRIMARY KEY (`Id_Procedimiento`);

--
-- Indices de la tabla `proceso`
--
ALTER TABLE `proceso`
  ADD PRIMARY KEY (`Id_Proceso`);

--
-- Indices de la tabla `responsable`
--
ALTER TABLE `responsable`
  ADD PRIMARY KEY (`Id_Responsable`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_Usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `Id_Area` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `detalle_area_documento`
--
ALTER TABLE `detalle_area_documento`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `Id_Documento` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=277;

--
-- AUTO_INCREMENT de la tabla `procedimiento`
--
ALTER TABLE `procedimiento`
  MODIFY `Id_Procedimiento` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `proceso`
--
ALTER TABLE `proceso`
  MODIFY `Id_Proceso` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `responsable`
--
ALTER TABLE `responsable`
  MODIFY `Id_Responsable` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_Usuario` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
