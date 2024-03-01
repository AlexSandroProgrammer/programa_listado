-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-03-2024 a las 21:47:21
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
(2, 1, 'PRODUCCION	FORMATO COSECHA (BPA)', '04 FOr CBPA 01 cosecha bpa.xlsx', 'Formato', 'FOr-CBPA-04-01/09-15', 1, '2015-09-01 00:00:00', 1),
(3, 1, 'FORMATO APLICACIÃ“N DE ABONO ORGANICO (BPA)', '04 FOr AAOBPA 01 apli abon org.xlsx', 'Formato', 'FOr-AAOBPA-04-01/09-15', 1, '2015-09-01 00:00:00', 1),
(4, 1, 'FORMATO APLICACIÃ“N DE FUNGICIDA (BPA)', '04 FOr AFBPA 01 apli fungicida.xlsx', 'Formato', 'FOr-AFBPA-04-01/09-15', 1, '2015-08-01 00:00:00', 1),
(5, 1, 'FORMATO APLICACIÃ“N DE FERTILIZANTE QUIMICO (BPA)', '04 FOr AFQBPA 01 apli fert qui.xlsx', 'Formato', 'FOr-AFQBPA-04-01/09-15', 1, '2015-09-01 00:00:00', 1),
(6, 1, 'FORMATO CONTROL DE ARVENSES (BPA)', '04 FOr CABPA 01 control arven.xlsx', 'Formato', 'FOr-CABPA-04-01/09-15', 1, '2015-09-01 00:00:00', 1),
(7, 1, 'FORMATO APLICACIÃ“N DE INSECTICIDA (BPA)', '04 FOr AIBPA 01 apli insec.xlsx', 'Formato', 'FOr-AIBPA-04-01/09-15', 1, '2015-09-01 00:00:00', 1),
(8, 1, 'FORMATO MATRIZ MONITOREO DEL CULTIVO (BPA)', '04 FOr MMCBPA 01 monito cul.xlsx', 'Formato', 'FOr-MMCBPA-04-01/09-15', 1, '2015-09-01 00:00:00', 1),
(9, 2, 'FORMATO INVENTARIO', '04 FOr IBPA 01 inventario bpa.xlsx', 'Formato', 'FOr-IBPA-04-01/07-2016 	', 1, '2016-07-16 00:00:00', 2),
(10, 1, 'FORMATO DE REGISTRO DE APLICACIONES', '04 FOr RA 02 reg aplicaciÃ³n.xlsx', 'Formato', 'FOr-RA-04-02/11-12', 2, '2012-11-01 00:00:00', 1),
(11, 1, 'FORMATO DE REGISTRO DE FERTILIZACION', '04 FOr RF 01 reg fertiliz.docx', 'Formato', 'FOr-RF-04-01/11-12 	', 1, '2012-11-01 00:00:00', 1),
(12, 1, 'FORMATO DE REGISTRO DE SIEMBRA', '04 FOr RS 01 reg siembra.xlsx', 'Formato', 'FOr-RS-04-01/11-12', 1, '2012-11-01 00:00:00', 1),
(13, 1, 'FORMATO DE CONTROL DE PLAGAS', '04 FOr CP 01 contr plag.docx', 'Formato', 'FOr-CP-04-01/05-12', 1, '2012-05-01 00:00:00', 1),
(14, 3, 'FORMATO REGISTRO CONTROL DE VISITAS TECNICAS', '01 FOr RCVT 01 regi con vis te.xlsx', 'Formato', 'FOr-RCVT-01-01/11-14', 1, '2014-11-01 00:00:00', 1),
(15, 3, 'FORMATO CRONOGRAMA DE ACTIVIDADES', '01 FOr CDA 01 cronogr actv aguas.xlsx', 'Formato', '01 FOr CDA 01 cronogr actv', 1, '2014-10-01 00:00:00', 3),
(16, 4, 'FORMATO DE CONTROL Y USO DE LOS REACTIVOS DE LABORATORIO DE SUELOS', '04 FOr CURLS 01 cont uso rls.xls', 'Formato', 'FOr-CURLS-04-01/07-15', 1, '2015-07-01 00:00:00', 12),
(17, 3, 'FORMATO CRONOGRAMA DE ACTIVIDADES', '01 FOr CDA 01 cronogr actv almacen.xlsx', 'Formato', '01 FOr CDA 02 cronogr actv ', 2, '2014-10-02 00:00:00', 4),
(18, 4, 'FORMATO DE RECEPCION DE MUESTRAS PARA ANALISIS EN EL LABORATORIO DE', '04 FOr RMALS 01 recp mues als.docx', 'Formato', 'FOr-RMALS-04-01/07-15', 1, '2015-07-01 00:00:00', 12),
(19, 4, 'FORMATO DE REGISTRO DE CONSUMO DE SUSTANCIAS QUIMICAS LABORATORIO BIOTECNOLOGIA VEGETAL', '04 FOr RCSQLBV 01 reg sust qui.docx', 'Formato', 'FOr-RCSQLBV-04-01/07-15', 1, '2015-07-01 00:00:00', 12),
(20, 3, 'FORMATO CRONOGRAMA DE ACTIVIDADES', '01 FOr CDA 01 cronogr actv aseg y mej c.xlsx', 'Formato', '01 FOr CDA 01 cronogr actv aseg y mej c', 2, '2014-12-02 00:00:00', 5),
(21, 4, 'FORMATO CONTROL DE PRESTAMO DE EQUIPOS EN LABORATORIO', '04 FOr CPEL 01 cont pres equ.xls', 'Formato', 'FOr-CPEL-04-01/07-15', 1, '2015-07-01 00:00:00', 12),
(22, 3, 'FORMATO CRONOGRAMA DE ACTIVIDADES', '01 FOr CDA 01 cronogr actv carnicos.xlsx', 'Formato', '01 FOr CDA 01 cronogr actv', 1, '2014-10-01 00:00:00', 6),
(23, 3, 'FORMATO CRONOGRAMA DE ACTIVIDADES', '01 FOr CDA 01 cronogr actv fruhor.xlsx', 'Formato', '01 FOr CDA 02 cronogr actv', 2, '2014-10-02 00:00:00', 7),
(24, 3, 'FORMATO CRONOGRAMA DE ACTIVIDADES', '01 FOr CDA 01 cronogr actv lab ACC.xlsx', 'Formato', '01 FOr CDA 02 cronogr actv', 2, '2014-10-02 00:00:00', 8),
(25, 4, 'FORMATO DE INVENTARIO DE PLANTAS IN VITRO DEL LABORATORIO DE BIOTECNOLOGIA VEGETAL', '04 FOr IPILBV 01 in pla in lbv.docx', 'Formato', 'FOr-IPIVLBV-04-01/07-15', 1, '2015-07-01 00:00:00', 12),
(26, 3, 'FORMATO CRONOGRAMA DE ACTIVIDADES', '01 FOr CDA 01 cronogr actv lid agroind.xlsx', 'Formato', '01 FOr CDA 02 cronogr actv', 2, '2014-10-02 00:00:00', 10),
(27, 4, 'FORMATO DE SALIDA DE PLANTAS', '04 FOr SP 01 salida plantas.docx', 'Formato', 'FOr-SP-04-01/11-12 	', 1, '2012-11-01 00:00:00', 1),
(28, 3, 'FORMATO CRONOGRAMA DE ACTIVIDADES', '01 FOr CDA 01 cronogr actv mercadeo.xlsx', 'Formato', '01 FOr CDA 01 cronogr actv mercadeo', 1, '2014-10-01 00:00:00', 11),
(29, 3, 'FORMATO CRONOGRAMAS DE CAPACITACIONES (BPA)', '01 FOr CCBPA 01 cronog capaci bpa.pdf', 'Formato', 'FOr-CCBPA-01-01/07-16', 1, '2016-07-01 00:00:00', 2),
(30, 3, 'FORMATO CRONOGRAMA DE ACTIVIDADES', '01 FOr CDA 01 cronogr actv panific.xlsx', 'Formato', '01 FOr CDA 02 cronogr actv', 2, '2014-10-02 00:00:00', 13),
(31, 4, 'FORMATO CONTROL DE CONTAMINACION POR HONGOS Y BACTERIAS DE PLANTULAS DE LABORATORIO DE BIOTECNOLOGIA ', '04 FOr CCHBPLB  01 conta hong.docx', 'Formato', 'FOr-CCHBPLB-04-02/06-16', 1, '2016-06-02 00:00:00', 18),
(32, 3, 'FORMATO CRONOGRAMA DE ACTIVIDADES', '01 FOr CDA 01 cronogr actv poscosecha.xlsx', 'Formato', '01 FOr CDA 02 cronogr actv', 2, '2014-10-02 00:00:00', 14),
(33, 1, 'FORMATO DE APLICACIONES DE FITOSANITARIOS (BPA) ', '04 FOr AF 01 aplic fito.xlsx', 'Formato', 'FOr-CCBPA-01-01/07-16', 1, '2016-07-01 00:00:00', 2),
(34, 3, 'FORMATO CRONOGRAMA DE ACTIVIDADES', '01 FOr CDA 01 cronogr actv t humano.xlsx', 'Formato', '01 FOr CDA 02 cronogr actv', 2, '2014-10-02 00:00:00', 15),
(35, 3, 'FORMATO CRONOGRAMA DE ACTIVIDADES', '01 FOr CDA 02 cronogr act ambiental.xlsx', 'Formato', '01 FOr CDA 02 cronogr act ambiental', 2, '2014-10-02 00:00:00', 16),
(36, 1, 'FORMATO DE TRAZABILIDAD Y CONTROL DE PARAMETROS DE PRODUCCION', '04 FOr TCPP 01 trazab y param.docx', 'Formato', '04 FOr TCPP 01 trazab y param', 1, '2013-04-01 00:00:00', 17),
(37, 1, 'FORMATO INFORME DE PRODUCCION DE BIENES DE AGROINDUSTRIA', '04 FOr  IPBA 01 informe produccion.xls', 'Formato', '04 FOr IPBA 01 informe produccion', 1, '2015-02-01 00:00:00', 19),
(38, 1, 'FORMATO DE EVALUACION DE CRITERIOS DE ACEPTACION Ã“ RECHAZO DE MP_IN_PT', '04 FOr ECARMPIPT 03 eval crit mp i pt f-236.pdf', 'Formato', '04 FOr ECARMPIPT 03 eval crit mp i pt', 3, '2015-02-03 00:00:00', 17),
(39, 1, 'FORMATO FICHA PRODUCTO TERMINADO', '04 FOr FPT 01 ft product.docx', 'Formato', '04 FOr FPT 01 ft product', 1, '2013-08-01 00:00:00', 17),
(40, 1, 'FORMATO CONTROL DE HERRAMIENTAS (BPA)', '04 FOr CHBPA 01 control herram bpa.pdf', 'Formato', 'FOr-CHBPA-04-01/07-16', 1, '2016-07-01 00:00:00', 2),
(41, 1, 'FORMATO FICHA TECNICA DE DETERGENTES Y DESINFECTANTES', '04 FOr FTDYD 01 ft det y desif.docx', 'Formato', '04 FOr FTDYD 01 ft det y desif', 1, '2013-08-01 00:00:00', 17),
(42, 1, 'FORMATO FICHA TECNICA DE EQUIPOS', '04 FOr FTE 01 ft equipos.docx', 'Formato', '04 FOr FTE 01 ft equipos', 1, '2013-08-01 00:00:00', 17),
(43, 13, 'FORMATO CRONOGRAMA SEMESTRAL DE FERTILIZACION (BPA)', '04 FOr CSFBPA 01 cron semes ferti bpa.pdf', 'Formato', 'FOr-CSFBPA-04-01/07-16', 1, '2016-07-01 00:00:00', 2),
(44, 1, 'FORMATO FICHA TECNICA DE MATERIA PRIMA E INSUMOS', '04 FOr FTMPEI 01 ft mp.docx', 'Formato', '04 FOr FTMPEI 01 ft mp', 1, '2013-02-01 00:00:00', 17),
(45, 1, 'HISTORIAL DEL CULTIVO (BPA)', '04 FOr HCBPA 01 histor culti bpa.pdf', 'Formato', 'FOr-HCBPA-04-01/07-16', 1, '2016-07-01 00:00:00', 2),
(46, 1, 'FORMATO GUIA DE ELABORACION DE PRODUCTO', '04 FOr GDEDP 01 guia elab.doc', 'Formato', '04 FOr GDEDP 01 guia elab', 1, '2013-04-01 00:00:00', 17),
(47, 1, 'FORMATOS LABORES DEL CULTIVO', '04 FOr LCBPA labor culti bpa.pdf', 'Formato', 'FOr-LCBPA-04-01/07-16', 1, '2016-07-01 00:00:00', 2),
(48, 1, 'FORMATO DE PRESTAMO DE MATERIALES Y EQUIPOS', '04 FOr PME 02 prestamo mat.pdf', 'Formato', '04 FOr PME 02 prestamo mat', 2, '2014-04-02 00:00:00', 20),
(49, 1, 'FORMATO LIMPIEZA Y DESINFECCION DE EQUIPOS Y HERRAMIENTAS (BPA)', '04 FOr LDEBPA 01 lim desin equi herra bpa.pdf', 'Formato', 'FOr-LDEHBPA-04-01/07-16', 1, '2016-07-01 00:00:00', 2),
(50, 1, 'FORMATO MANTENIMIENTO DE EQUIPOS', '04 FOr MEBPA 01 mante equip bpa.pdf', 'Formato', 'FOr-MEBPA-04-01/07-16', 1, '2016-07-01 00:00:00', 2),
(51, 1, 'FORMATO RIEGO DEL CULTIVO', '04 FOr RCBPA 01 riego cult bpa.pdf', 'Formato', 'FOr-RCBPA-04-01/07-2016', 1, '2016-07-01 00:00:00', 2),
(52, 1, 'FORMATO RECOLECCION DE RESIDUOS POSCONSUMO', '04 FOr RRPBPA 01 recol residu posco bpa.pdf', 'Formato', 'FOr-RRDBPA-04-01/07-16', 1, '2016-07-01 00:00:00', 2),
(53, 1, 'FORMATO DE SOLICITUD AMBIENTES,EQUIPOS Y OTROS ELEMENTOS PARA ORIENTAR LOS PROCESOS FORMATIVOS', '04 FOr SAEEOPF 02 solici pract.pdf', 'Formato', '04 FOr SAEEOPF 02 solici pract', 2, '2014-08-02 00:00:00', 20),
(54, 14, 'FORMATO DE ASISTENCIA A SENA EMPRESA AREA AGRICOLA', '06 FOr ASEAA 06 asist area agri.pdf', 'Formato', 'FOr-ASEAA-06-02/05-16', 1, '2016-05-02 00:00:00', 18),
(55, 4, 'FORMATO DE SALIDA DE PLANTULAS PARA RUSTICACION Y ACLIMATACION EN EL LABORATORIO DE BIOTECNOLOGIA VEGETAL', 'FOr-BIOTECNOLOGIA.pdf', 'Formato', 'FOr-SPRALB-04-01/06-16', 1, '2016-06-01 00:00:00', 12),
(56, 4, 'FORMATO INFORME DE PRESTACION SERVICIOS', '04 FOr  IPS 01 informe servicio agroind.xls', 'Formato', '04 FOr IPS 01 informe servicio agroind', 1, '2015-03-01 00:00:00', 23),
(57, 1, 'FORMATO DE REGISTRO Y DISPOSICION DE RESIDUOS PELIGROSOS', '04 FOr RDRP 01 reg dis resi pe.docx', 'Formato', 'FOr-RDIDRP-04-01/08-13', 1, '2013-08-01 00:00:00', 16),
(58, 1, 'FORMATO DE REGISTRO Y DISPOSICION DE RESIDUOS PELIGROSOS', '04 FOr RDRP 01 reg dis resi pe(1).docx', 'Formato', 'FOr-RDIDRP-04-01/08-13', 1, '2013-08-01 00:00:00', 16),
(59, 1, 'FORMATO DE REGISTRO MANEJO DE RESIDUOS', '04 FOr RMR 01 mane resid.xlsx', 'Formato', 'FOr-RMR-04-01/11-12', 1, '2012-11-01 00:00:00', 16),
(60, 4, 'FORMATO NOTA DE SERVICIO', '04 FOr NSA 01 nota serv agro.pdf', 'Formato', '04 FOr NSA 01 nota serv agro', 1, '2015-03-01 00:00:00', 23),
(61, 2, 'FORMATO REGISTRO CONTROL DE INVENTARIOS DE ELEMENTOS GENERALES', '07 FOr RCIDEG 01 invent elem g.xlsx', 'Formato', '07 FOr RCIDEG 01 invent elem g', 1, '2014-12-01 00:00:00', 21),
(62, 2, 'FORMATO REGISTRO CONTROL INVENTARIO DE MAQUINARIA Y EQUIPOS', '07 FOr RCIME 01 maq y equip.xlsx', 'Formato', '07 FOr RCIME 01 maq y equip', 1, '2014-12-01 00:00:00', 23),
(63, 2, 'INSTRUCTIVO PARA LA PREPARACIÃ“N DE SOLUCIONES DE LIMPIEZA Y DESINFECCION DEL AREA DE AGROINDUSTRIA', '04 INs 01 preparacion soluciones Lyd f-30.pdf', 'Instructivo', '04 INS 01 preparacion soluciones LYD 	', 1, '2014-11-01 00:00:00', 22),
(64, 2, 'INSTRUCTIVO PARA EL MANEJO DE LA PLANTA DE TRATAMIENTO DE AGUA Y CALDERA AREA ', '04 INs 01 manejo pl aguas caldera f-229.pdf', 'Instructivo', '04 INS 01 manejo pl aguas caldera 	', 1, '2014-06-01 00:00:00', 3),
(65, 14, 'FORMATO DE CONTROL DE ASISTENCIA', '06 FOr CAA control asis agro.pdf', 'Formato', '06 FOr CAA control asis agro', 1, '2013-05-01 00:00:00', 25),
(66, 14, 'FORMATO LISTA DE CHEQUEO TURNO RUTINARIO', '06 FOr LCTR 01 cheq turnos.pdf', 'Formato', '06 FOr LCTR 01 cheq turnos', 1, '2013-11-01 00:00:00', 25),
(67, 15, 'FORMATO DE MONITOREO DE AMBIENTES', '04 FOr MA 01 ambientes.pdf', 'Formato', '04 FOr MA 01 ambientes', 1, '2014-02-01 00:00:00', 12),
(68, 15, 'FORMATO DE MONITOREO DE MANIPULADORES', '04 FOr MM 01 manipuladores.pdf', 'Formato', '04 FOr MM 01 manipuladores', 1, '2014-02-01 00:00:00', 12),
(69, 15, 'FORMATO DE PROTOCOLOS PARA ANALISIS DE LABORATORIO', '04 FOr PAL 01 protocolos.docx', 'Formato', '04 FOr PAL 01 protocolos', 1, '2014-08-01 00:00:00', 27),
(70, 15, 'FORMATO DE REPORTE DE ANALISIS DE LABORATORIO CONSOLIDADO', '04 FOr RAL 01 reporte anal lab.pdf', 'Formato', '04 FOr RAL 01 reporte anal lab 	', 1, '2014-02-01 00:00:00', 28),
(71, 15, 'FORMATO INSTRUCTIVO DE LIMPIEZA Y DESINFECCIÃ“N', '04 FOr ILD 01 Instr Lav manos.pdf', 'Formato', '04 FOr ILD 01 Instr Lav manos 	', 1, '2014-02-01 00:00:00', 29),
(72, 15, 'FORMATO DE PROTOCOLOS PARA ANALISIS DE LABORATORIO', '04 FOr PAL 01 protocolos(1).docx', 'Formato', '04 FOr PAL 01 protocolos', 1, '2014-08-01 00:00:00', 27),
(73, 15, 'FORMATO DE REPORTE DE ANALISIS DE LABORATORIO CONSOLIDADO', '04 FOr RAL 01 reporte anal lab(1).pdf', 'Formato', '04 FOr RAL 01 reporte anal lab 	', 1, '2014-02-01 00:00:00', 28),
(74, 16, 'FORMATO INSTRUCTIVO DE LIMPIEZA Y DESINFECCIÃ“N', '04 FOr ILD 01 Instr Lav manos(1).pdf', 'Formato', '04 FOr ILD 01 Instr Lav manos', 1, '2014-02-01 00:00:00', 22),
(75, 16, 'FORMATO INSTRUCTIVO DE LIMPIEZA Y DESINFECCIÃ“N', '04 FOr ILD 01 Instr LyD equi.pdf', 'Formato', '04 FOr ILD 01 Instr LyD equi', 1, '2014-02-01 00:00:00', 29),
(76, 16, 'FORMATO INSTRUCTIVO DE LIMPIEZA Y DESINFECCIÃ“N', '04 FOr ILD 01 Instr LyD equip.pdf', 'Formato', '04 FOr ILD 01 Instr LyD equip', 1, '2014-02-01 00:00:00', 22),
(77, 16, 'FORMATO INSTRUCTIVO DE LIMPIEZA Y DESINFECCIÃ“N', '04 FOr ILD 01 Instr LyD instal.pdf', 'Formato', '04 FOr ILD 01 Instr LyD instal', 1, '2014-02-01 00:00:00', 22),
(78, 16, 'FORMATO INSTRUCTIVO DE LIMPIEZA Y DESINFECCIÃ“N', '04 FOr ILD 01 Instr LyD utensi.pdf', 'Formato', '04 FOr ILD 01 Instr LyD utensi', 1, '2014-02-01 00:00:00', 22),
(79, 16, 'FORMATO INSTRUCTIVO DE LIMPIEZA Y DESINFECCIÃ“N', '04 FOr ILD 01 In LyD equipos 3.pdf', 'Formato', '04 FOr ILD 01 In LyD equipos 3', 1, '2014-02-01 00:00:00', 22),
(80, 16, 'FORMATO DE RESUMEN DE OPERACIONES DE LIMPIEZA Y DESINFECCION', '04 FOr ROLD 01 resu LyD agua.xlsx', 'Formato', '04 FOr ROLD 01 resu LyD agua', 1, '2014-03-01 00:00:00', 32),
(81, 16, 'FORMATO DE RESUMEN DE OPERACIONES DE LIMPIEZA Y DESINFECCION', '04 FOr ROLD 01 resum LyD bodeg.xlsx', 'Formato', '04 FOr ROLD 01 resum LyD bodeg 	', 1, '2014-03-01 00:00:00', 4),
(82, 16, 'FORMATO DE RESUMEN DE OPERACIONES DE LIMPIEZA Y DESINFECCION', '04 FOr ROLD 01 resu LyD carnic.xlsx', 'Formato', '04 FOr ROLD 01 resu LyD carnic', 1, '2014-03-01 00:00:00', 30),
(83, 16, 'FORMATO DE RESUMEN DE OPERACIONES DE LIMPIEZA Y DESINFECCION', '04 FOr ROLD 01 resum LyD fruho.xlsx', 'Formato', '04 FOr ROLD 01 resum LyD fruho', 1, '2014-03-01 00:00:00', 31),
(84, 16, 'FORMATO DE RESUMEN DE OPERACIONES DE LIMPIEZA Y DESINFECCION', '04 FOr ROLD 01 resum LyD lab.xlsx', 'Formato', '04 FOr ROLD 01 resum LyD lab', 1, '2014-03-01 00:00:00', 22),
(85, 16, 'FORMATO DE RESUMEN DE OPERACIONES DE LIMPIEZA Y DESINFECCION', '04 FOr ROLD 01 resum LyD panif.xlsx', 'Formato', '04 FOr ROLD 01 resum LyD panif', 1, '2014-03-01 00:00:00', 33),
(86, 1, 'FORMATO NOTA DE PRODUCCION DE AGROINDUSTRIA', '04 NPA 07 not produc.xlsx', 'Formato', '04 FOr NPA 05 not produc agr', 4, '2015-07-04 00:00:00', 34),
(87, 16, 'FORMATO DE RESUMEN DE OPERACIONES DE LIMPIEZA Y DESINFECCION', '04 FOr ROLD 01 resum LyD pos.xlsx', 'Formato', '04 FOr ROLD 01 resum LyD pos', 1, '2014-03-01 00:00:00', 14),
(88, 14, 'FORMATO DE CONTROL DE ASISTENCIA AGROINDUSTRIAL', '06 FOr CAA control asis agroindus.pdf', 'Formato', '06 FOr CAA control asis agroindus', 2, '2013-08-02 00:00:00', 34),
(89, 13, ' 	INSTRUCTIVO PARA EL MANEJO DEL ALMACEN AGROINDUSTRIA', '07 INs MAA mane almac agroindus.docx', 'Instructivo', '07 INs MAA mane almac agroindus', 1, '2015-08-01 00:00:00', 34),
(90, 15, 'FORMATO DE REGISTRO DE RECEPCION Y TOMA DE MUESTRAS PARA ANALISIS DE LABORATORIO', '04 FOr RRTMAL 02 tom mues.docx', 'Formato', '01 FOr RRTMAL 01 reg r t m a l', 2, '2014-10-02 00:00:00', 12),
(91, 15, 'FORMATO DE REGISTRO DE ANALISIS DE MUESTRA Y REPORTE DE RESULTADOS DE LABORATORIO', '04 FOr RAMRL 02 analisis mues.docx', 'Formato', '01 FOr RAMRRL 02 reg a m r lab', 2, '2014-10-02 00:00:00', 12),
(92, 15, 'FORMATO DE MONITOREO DE EQUIPOS Y SUPERFICIES', '04 FOr MES 01 equipos f-179.pdf', 'Formato', '04 FOr MES 01 equipos f-179', 1, '2014-02-01 00:00:00', 28),
(93, 15, 'FORMATO DE REPORTE DE ANALISIS DE LABORATORIO', '04 FOr RALC 01 reporte anal la.pdf', 'Formato', '04 FOr RALC 01 reporte anal la', 1, '2014-02-01 00:00:00', 12),
(94, 13, ' 	REGLAMENTO INTERNO DE TRABAJO AREA DE AGROINDUSTRIA', '06 REg ITAA 02 reglamento int ag f.pdf', 'Instructivo', '06 REg ITAA 02 reglamento int ag 	', 2, '2013-03-02 00:00:00', 25),
(95, 16, 'FORMATO DE RESUMEN DE OPERACIONES DE LIMPIEZA Y DESINFECCION', '04 FOr FROLD 02 resumen operac .pdf', 'Formato', '04 FOr ROLD 02 resumen operac', 2, '2014-03-02 00:00:00', 34),
(96, 16, 'FORMATO DE VERIFICACION DIARIA DE LABORES DE LIMPIEZA Y DESINFECCION', '04 FOr VDLLD 02 l y d.docx', 'Formato', 'FOr- VDLLD 04-02/11-17 ', 2, '2017-11-02 00:00:00', 34),
(97, 17, 'FORMATO DE REGISTRO USO DE EQUIPOS, UTENSILIOS Y OTROS ELEMENTOS', '02 FOr REUE 02 reg uso equipos .pdf', 'Formato', '02 FOr REUE 02 reg uso equipos', 2, '2012-11-01 00:00:00', 34),
(98, 16, 'FORMATO INSTRUCTIVO DE LIMPIEZA Y DESINFECCIÃ“N', '04 FOr FILD 01 Instructivo LyD f-14.pdf', 'Formato', '04 FOr ILD 01 Ins LyD f-14', 2, '2014-02-01 00:00:00', 34),
(99, 16, 'FORMATO DE INSPECCION DE CONDICIONES DE LIMPIEZA Y DESINFECCION DE OPERARIOS', '04 FOr ICLDO 01 inspec opera .pdf', 'Formato', '04 FOr ICLDO 01 inspec opera ', 1, '2014-01-01 00:00:00', 34),
(100, 16, 'FORMATO DE INSPECCION Y AUDITORIA PROGRAMA DE LIMPIEZA Y DESINFECCION', '04 FOr IAPLD 01 insp y aud.docx', 'Formato', '04 FOr IAPLD 01 insp y aud lyd .pdf 	', 1, '2013-04-01 00:00:00', 22),
(101, 15, 'FORMATO DE PROTOCOLOS PARA ANALISIS DE LABORATORIO', '04 FOr PAL 01 proto tm pos.pdf', 'Formato', '04 FOr PAL 01 proto tm pos', 1, '2014-01-01 00:00:00', 35),
(102, 16, 'FORMATO CRONOGRAMA DE LIMPIEZA Y DESINFECCION PERIODICA', '04 FOr CLDP 01 crono limp perio.pdf', 'Formato', '04 FOr CLDP 01 crono limp perio', 0, '2015-11-01 00:00:00', 34),
(103, 13, 'INSTRUCTIVO PARA INDUCCION Y EMPALME SENA EMPRESA', '06 INs IE 01 ins indu empal se .pdf', 'Instructivo', 'INDUCCION Y EMPALME SENA EMPRESA 	06 INs IE 01 ins indu empal se', 1, '2015-03-01 00:00:00', 34),
(104, 1, 'FORMATO PARA CONTROL DE INVENTARIOS DE PRODUCTO TERMINADO (REMANENTES EN PLANTA) ', '04 CIPT 01 prod term.xlsx', 'Formato', 'FOr-CIPT-04-01/11-17 	', 1, '2017-11-01 00:00:00', 34),
(105, 1, 'FORMATO DE REGISTRO DISPOSICIÃ“N DE RESIDUOS PELIGROSOS', '04-FOr-RDRP-04-01 re dis re pel.docx', 'Formato', '04 FOr RDRP 01 re dis re pel', 1, '2014-11-10 00:00:00', 16),
(106, 1, 'FORMATO DE REGISTRO DE LECTURA DE MICROMEDIDORES', '04 FOr RLM 01 reg lec micr.xlsx', 'Formato', '04 FOr RLM 01 reg lec micr', 1, '2013-08-01 00:00:00', 16),
(107, 1, 'FORMATO DE ENTRADA DE INSUMOS AMBIENTALES', '04-FOr-EIA-04-01 ent ins ambie.xlsx', 'Formato', '04 FOr EIA 01 ent ins ambie', 1, '2013-03-01 00:00:00', 16),
(108, 1, 'FORMATO DE REGISTRO DE PROPAGACION POR ESQUEJES', '04-FOr-RPS-04-01 reg siemb esqu.xlsx', 'Formato', '04-FOr-RPE-04-02 reg siemb esqu', 1, '2016-02-01 00:00:00', 16),
(109, 1, 'FORMATO DE REGISTRO PROPAGACION POR SEMILLAS', '04 FOr RS 04 01 reg siemb semi.xlsx', 'Formato', '04 FOr RPS 04 02 reg siemb semi 	', 1, '2015-08-01 00:00:00', 16),
(110, 2, 'FORMATO DE INVENTARIOS DE INSUMOS AMBIENTALES', '07 FOr IIA 01 invent d insumos.xlsx', 'Formato', '07 FOr IIA 01 invent d insumos 	', 1, '2015-08-01 00:00:00', 36),
(111, 1, 'FORMATO DE REGISTRO, CONTROL Y PRESTAMOS DE HERRAMIENTAS', '04 FOr RCPH 01 reg con pre her.pdf', 'Formato', '04 FOr RCPH 01 reg con pre her', 1, '2018-08-01 00:00:00', 36),
(112, 1, 'FORMATO COMPARENDO AMBIENTA', '04 FOr CA 01 comparen ambient.pdf', 'Formato', '04 FOr CA 01 comparen ambient', 1, '2015-08-01 00:00:00', 37),
(113, 1, 'FORMATO DE REGISTRO, CONTROL Y PRESTAMOS DE HERRAMIENTAS ', '04 FOr RPH 01 regis prest.docx', 'Formato', 'FOr-RCPH-04-01/09-16 	', 1, '2015-08-01 00:00:00', 37),
(114, 1, 'FORMATO DE REGISTRO INSPECCION PUNTOS ECOLOGICOS ', '04 FOr RIPE 01 inspe punt.xlsx', 'Formato', 'INSPECCION PUNTOS ECOLOGICOS ', 1, '2017-11-01 00:00:00', 37),
(115, 1, 'FORMATO DE CONTROL DE INVENTARIO DE BOLSAS ', '04 FOr CIB 02 inve bols.xlsx', 'Formato', 'FORMATO ', 1, '2017-11-01 00:00:00', 37),
(116, 4, 'FORMATO INFORME EJECUTIVO', '04 FOr IE 01 forma inf ejecu.xlsx', 'Formato', '04 FOr IE 01 forma inf ejecu', 1, '2015-03-01 00:00:00', 38),
(117, 1, 'FORMATO INFORME DE PRODUCCION DE BIENES DE SENA EMPRESA', '04 FOr IPBSE 01 pro bie sen em.xls', 'Formato', '04 FOr IPBSE 01 pro bie sen em', 1, '2015-03-01 00:00:00', 18),
(118, 14, 'ACTA DE REUNIONES', '06 FOr AR 01 acta reunio.docx', 'Formato', '06 FOr AR 01 acta reunio', 1, '2013-02-01 00:00:00', 39),
(119, 3, 'FORMATO CRONOGRAMA DE VISITAS A UNIDADES', '01 FOr CVU 01 cronog VU.xlsx', 'Formato', '01 FOr CVU 01 cronog VU', 1, '2015-05-01 00:00:00', 40),
(120, 1, 'FORMATO REGISTRO DE ENTRADAS', '04 FOr RE 02 registr entra.xls', 'Formato', '04 FOr RE 02 registr entra', 1, '2014-01-04 00:00:00', 18),
(121, 18, 'FORMATO REGISTRO HORAS LABORALES', '06 FOr RHL 03 regis  hor lab.xlsx', 'Formato', '06 FOr RHL 03 regis hor lab', 2, '2012-05-02 00:00:00', 41),
(122, 18, 'INSTRUCTIVO PARA EL DILIGENCIAMIENTO REGISTRO DE HORAS LABORALES', '06 INs DRHL 01 dilig horas lab.docx', 'Formato', '06 INs DRHL 01 dilig horas lab', 1, '2015-09-01 00:00:00', 41),
(123, 1, 'FORMATO REGISTRO DE TRASLADO', '04 FOr RT 01 regis traslados.docx', 'Formato', '04 FOr RT 01 regis traslados', 1, '2014-11-01 00:00:00', 18),
(124, 19, 'FORMATO DE REGISTRO CONSOLIDADO DE COSTOS INDIRECTOS', '07 FOr RCC 01 regis cost ind.xlsx', 'Formato', '07 FOr RCC 01 regis cost ind', 1, '2014-11-01 00:00:00', 18),
(125, 19, 'FORMATO DE CONTROL INTERNO DE ACTIVIDADES BASICAS PARA EL LIDER CONTABLE Y FINANCIERO', '07 FOr CIABLCF 01 Cont int act.xlsx', 'Formato', '07 FOr CIABLCF 01 Cont int act', 1, '2014-12-01 00:00:00', 41),
(126, 3, 'FORMATO ACTA DE ENTREGA', '01 FOr AE 01 acta entrega.docx', 'Formato', '01 FOr AE 01 acta entrega', 1, '2012-11-01 00:00:00', 25),
(127, 3, 'FORMATO PLAN OPERATIVO', '01 FOr PO 01 plan operativo.xlsx', 'Formato', '01 FOr PO 01 plan operativo', 1, '2013-04-01 00:00:00', 25),
(128, 3, 'FORMATO DE CRONOGRAMA DE ACTIVIDADES', '01 FOr CDA 02 cronogra.xlsx', 'Formato', '01 FOr CA 02 crono activ', 1, '2014-10-02 00:00:00', 25),
(129, 20, 'FORMATO PLAN DE AUDITORIAS', '02 FOr PA 02 plan auditori.docx', 'Formato', '02 FOr PA 02 plan auditori', 2, '2013-04-02 00:00:00', 42),
(130, 3, 'FORMATO PAZ Y SALVO SENA EMPRESA', '01 FOr PSSE 01 paz salvo se em.docx', 'Formato', '01 FOr PSSE 01 paz salvo se em', 1, '2015-03-01 00:00:00', 43),
(131, 2, 'FORMATO DE INVENTARIO DIARIO', '07-FOr-ID-07-01 invent diario.pdf', 'Formato', '07 FOr ID 01 invent diario', 1, '2015-02-01 00:00:00', 39),
(132, 21, 'FORMATO DE REGISTRO DE VENTAS', '04-FOr-DRDV-04-01 reg ventas.xlsx', 'Formato', '05 FOr DRDV 01 reg ventas', 1, '2013-11-01 00:00:00', 38),
(133, 22, 'FORMATO  DE ASISTENCIA A CAPACITACIÃ“N', '06-FOr-06-01 asist capacit.docx', 'Formato', '06 FOr AC 01 asiste capacit', 1, '2012-11-01 00:00:00', 42),
(134, 14, 'FORMATO PROGRAMACIÃ“N DE TURNOS', '06-F0r-PT-06-01 progra turn.docx', 'Formato', '06 FOr PT 01 progra turn', 1, '2010-06-01 00:00:00', 44),
(135, 14, 'FORMATO SOLICITUD DE TURNOS ESPECIALES', '06-FOr-SDTE-06-01 sol tur esp.docx', 'Formato', '06 FOr SDTE 01 sol tur esp', 1, '2010-05-01 00:00:00', 44),
(136, 22, 'FORMATO PROCESO DE SELECCION DE SENA EMPRESA', '06-FOr-PDSDSE-06-01 PSSE.xlsx', 'Formato', '06 FOr PDSDSE 01 Proces SelecciÃ³n', 1, '2012-11-01 00:00:00', 44),
(137, 23, 'FORMATO PARA LA APROBACION DE DOCUMENTOS', '08-FOr-AYEDO-08-01 el est doc.xlsx', 'Formato', '08 FOr AYEDO 01 estand documen', 1, '2013-08-01 00:00:00', 43),
(138, 4, 'FORMATO DE REGISTRO DE ACCIDENTES LABORALES', '04-FOR-DRDAL-04-01 acc lab.pdf', 'Formato', '04 FOr DRDAL 01 acc lab', 1, '2012-05-01 00:00:00', 38),
(139, 19, 'FORMATO DESPRENDIBLE DE NOMINA.', '07-FOr-DNOM-07-01 despre nomina.pdf', 'Formato', '07-FOr-DNOM-07-01 despre nomina', 1, '2014-11-01 00:00:00', 41),
(140, 2, 'INSTRUCTIVO PARA EL DILIGENCIAMIENTO DEL FORMATO DE INVENTARIO DIARIO', '07 INs DFID 01 dilig inv diario.docx', 'Formato', '07 INs DFID 01 dilig inv diario', 1, '2015-09-01 00:00:00', 41),
(141, 1, 'FORMATO REGISTRO DE BAJAS', '04-FOr-RDBA-04-02 reg  baj.pdf', 'Formato', '04 FOr RDB 02 reg  baj', 2, '2014-11-07 00:00:00', 18),
(142, 19, 'FORMATO DE IMPUTACIÃ“N CONTABLE DE COSTOS INDIRECTOS', '07-FOr-DICDCI-07-01 ICCI.xlsx', 'Formato', '07 FOr DICDCI 01 Im contable', 1, '2014-01-04 00:00:00', 41),
(143, 19, 'INSTRUCTIVO DE PRODUCCION DE BIENES DE SENA EMPRESA', '04-INs PSE 04-01 instructivo PBSE.pdf', 'Instructivo', 'INS PSE 01 instructivo prest', 1, '2015-10-04 00:00:00', 38),
(144, 23, 'FORMATO SOLICITUD DE ELABORACIÃ“N, MODIFICACIÃ“N O DE CAMBIO DE DOCUMENTO', '08-FOr-SEMCD-08-01 SEMCD.xlsx', 'Formato', '08 FOr SEMCD 01 modif docum', 1, '2013-04-01 00:00:00', 43),
(145, 22, 'FORMATO DE ENTREVISTAS', '06 FOr FE 01 entrevista f-220.xlsx', 'Formato', '06 FOr FE 01 entrevista', 1, '2012-11-01 00:00:00', 44),
(146, 1, 'FORMATO DE REGISTRO DE MANEJO DE RESIDUOS', '06-FOr-04-01 manejo resid.xlsx', 'Formato', '06 FOr RMDR 01 manejo resid', 1, '2012-11-11 00:00:00', 16),
(147, 1, 'FORMATO REGISTRO DE BAJAS', '04 FOr RDB 02 registro bajas f-94.pdf', 'Formato', '04 FOr RDB 02 registro bajas', 1, '2012-11-01 00:00:00', 18),
(148, 22, 'FORMATO DE PLAN DE INDUCCION SENA EMPRESA', '06 FOr PI 01 plan inducc f-187 (1).pdf', 'Formato', '06 FOr PI 01 plan inducc SE', 1, '2010-04-01 00:00:00', 25),
(149, 21, 'FORMATO DE RELACION DE ENTREGA DE DINERO BASE EN  ADMINISTRACION DE LA FINCA', '05 FOr REDBAF 01 entre din admon.docx', 'Formato', '05 FOr REDBAF 01 entre din admon', 1, '2015-08-01 00:00:00', 45),
(150, 21, 'FORMATO DE PEDIDOS', '05 FOr P 01 pedidos.xlsx', 'Formato', '05 FOr P 01 pedidos', 1, '2015-08-01 00:00:00', 45),
(151, 23, 'FORMATO PARA LA APROBACION  Y ESTANDARIZACION  DE DOCUMENTOS', '08 FOr AYEDD 01 aprob y est doc f-13.pdf', 'Formato', '08 FOr AYEDD 01 aprob y est', 1, '2013-02-08 00:00:00', 25),
(152, 3, 'FORMATO EVALUACION NIVEL DE SATISFACCION', '01 FOr ENS 01 eva nivel satis.docx', 'Formato', '01 FOr ENS 01 eva nivel satis', 1, '2015-08-01 00:00:00', 40),
(153, 3, 'INSTRUCTIVO PARA LA ATENCION A VISITANTES ', '01 INs AV 01 ins atenc visitas.docx', 'Formato', '01 INs AV 01 ins atenc visita', 1, '2015-08-01 00:00:00', 40),
(154, 24, 'FORMATO ACCIONES PREVENTIVAS Y CORRECTIVAS', '02 FOr APC 01 accio preven y correc.xls', 'Formato', '02 FOr APC 01 accio preven y correc', 1, '2015-01-02 00:00:00', 46),
(155, 23, 'FORMATO SOLICITUD  DE ELABORACION, MODIFICACION Ã“ CAMBIO DE DOCUMENTOS', '08 FOr SEMCD 01 solicitud elab f-186.pdf', 'Formato', '08 FOr SEMCD 01 solicitud elab', 1, '2013-04-01 00:00:00', 25),
(156, 2, 'FORMATO DE INVENTARIO DE ELEMENTOS DE PROTECCION PERSONAL', '07 FOr EPP 01 elem prot. Pers..xlsx', 'Formato', '07 FOr IEPP 01 elem prot Pers', 1, '2015-09-01 00:00:00', 40),
(157, 3, 'FORMATO PEDIDO DE OFICINA SENA EMPRESA', '01 For POSE 01 pedi ofi senaemp.xlsx', 'Formato', '01 For POSE 01 pedi ofi senaemp', 1, '2015-09-01 00:00:00', 40),
(158, 20, 'FORMATO PROGRAMA DE AUDITORIAS INTERNAS', '02 FOr PAI 01 programa aud.pdf', 'Formato', '02 FOr PAI 01 programa aud', 1, '2015-09-01 00:00:00', 42),
(159, 20, 'FORMATO INFORME DE AUDITORIAS', '02-FOr- IDA 02-01 auditorias inter.pdf', 'Formato', '02 FOr IA 01 auditorias inter', 1, '2013-04-01 00:00:00', 42),
(160, 20, 'FORMATO EVALUACION DE AUDITORES INTERNOS POR AUDITADOS', '02-FOr- EAIPA 02-01 eval audi inter PA.pdf', 'Formato', '02 FOr EAIA 01 eva audi inter', 1, '2013-04-01 00:00:00', 42),
(161, 20, 'FORMATO DE EVALUACION DE AUDITOR INTERNO POR PARTE DEL AUDITOR LIDER', '02-FOr- EDAIPDAL 02-01 eva audi inter PPAL.pdf', 'Formato', '02 FOr EAIPAL 01 eva audi inte', 1, '2013-04-01 00:00:00', 42),
(162, 25, 'FORMATO CONTROL DEL PRODUCTO O SERVICIO NO CONFORME', '02 FOr CDPOSNC 02 cont prod SC.pdf', 'Formato', '02 FOr CPSNC 02 cont prod SC', 1, '2015-11-01 00:00:00', 42),
(163, 1, 'FORMATO DE CONTROL DE BOTELLONES', '04 FOr CB 01 control botellones.pdf', 'Formato', '04 FOr CB 01 control botellon', 1, '2015-10-01 00:00:00', 38),
(164, 14, 'FORMATO DE ASISTENCIA A TURNO ESPECIAL', '06 For ATE 01 asist turno espec.pdf', 'Formato', '06 FOr ATE 01 asist turno espe', 1, '2015-11-01 00:00:00', 38),
(165, 14, 'INSTRUCTIVO PARA LA ACTULIZACION DEL LISTADO MAESTRO EN EL BLOG SENA EMPRESA', '08 INs 01 actuali listad maestro .pdf', 'Instructivo', '08 INs 01 actuali listad maestr', 1, '2016-05-01 00:00:00', 42),
(166, 22, 'FORMATO CHECK LIST EMPALME', '06 FOr CLE 01 check list emp.pdf', 'Formato', '06 FOr CLE 01 check list emp', 0, '2017-04-01 00:00:00', 40),
(167, 23, 'INSTRUCTIVO PARA ACTULIZACION DE LISTADO MAESTRO EN EL BLOG SENA EMPRESA', '08 INs 01 actuali listad maestro (1).pdf', 'Formato', '08 INs 01 actuali listad maestro', 1, '2016-09-01 00:00:00', 42),
(168, 23, 'MANUAL DE FUNCIONES Y COMPETENCIAS SENA EMPRESA', 'Manual de Funciones y Competencias Version 03 del 2016 (1) (1).pdf', 'Manual', 'Manual de Funciones y Compe', 1, '2014-04-03 00:00:00', 42),
(169, 23, 'MANUAL DE LA CALIDAD', 'MCa - MANUAL DE LA CALIDAD. 3 de mayo 2016  (5).pdf', 'Manual', 'MCa-MANUAL DE LA CALIDAD', 1, '2013-04-03 00:00:00', 42),
(170, 23, 'MANUAL DE PROCESOS Y PRODEDIMIENTOS', 'MANUAL DE PROCESOS Y PROCEDIMIENTOS pdf.pdf', 'Manual', 'MANUAL DE PROCESOS Y PROCE', 1, '2016-09-03 00:00:00', 42),
(171, 23, 'INSTRUCTIVO PARA LA ELABORACION Y CODIFICACION DE DOCUMENTOS', '08 INs 03 elaboracion document (3) (1).pdf', 'Instructivo', '08 INs 03 elaboracion document', 1, '2016-09-03 00:00:00', 42),
(172, 14, 'FORMATO DE LISTA DE CHEQUEO TURNO RUTINARIO', '06 FOr LCTR lista cheq turn rutin.pdf', 'Formato', '06 FOr LCTR 03 lista cheq turn rutin', 1, '2016-08-03 00:00:00', 43),
(173, 21, 'FORMATO DE VENTAS DIARIAS', 'FORMATO DE VENTAS DIARIAS.xlsx', 'Formato', 'FORMATO DE VENTAS DIARIAS.xlsx', 2, '2017-03-02 00:00:00', 45),
(174, 13, 'FORMATO DE ACTIVIDADES FIN DE SEMANA', 'FORMATO FIN DE SEMANA (1).xlsx', 'Formato', 'FORMATO FIN DE SEMANA (1).xlsx', 1, '2017-03-01 00:00:00', 47),
(175, 26, 'INTRUCTIVO ', '08 INs 01 Nomb De Archiv.pdf', 'Instructivo', 'INs-08-01/10-17', 1, '2017-02-01 00:00:00', 47),
(176, 27, 'FORMATO ', '04 FOr ISA 01 informe sem.docx', 'Formato', 'FOr-ISA- 04-02/10- 17', 1, '2017-10-02 00:00:00', 18),
(177, 28, 'FORMATO DE VISITAS ', '01 FOr AVC 01 visit al centr.xlsx', 'Formato', '01 FOr AVC 01 visit al centr', 1, '2017-10-01 00:00:00', 18),
(178, 29, 'FORMATO ', '01 For TAFS 01 Apoyo Fin.xlsx', 'Formato', 'APOYO FIN DE SEMANA ', 1, '2017-10-01 00:00:00', 40),
(179, 30, 'FORMATO', '01 For PSED 01 permi dom.xlsx', 'Formato', 'PERMISOS SENA EMPRESA ', 1, '2017-10-01 00:00:00', 40),
(180, 31, 'FORMATO', '06 FOr RNN 01 repor nom.xlsx', 'Formato', 'REPORTE NOVEDADES ', 1, '2017-01-01 00:00:00', 15),
(181, 32, 'FORMATO', '08 FOr RVDLM 01 regis y veri.xlsx', 'Formato', ' 	VERIFICACIÃ“N DE DOCUMENTOS 	', 1, '2017-10-01 00:00:00', 15),
(182, 33, 'FORMATO', '01 FOr LICFS 01 list ingre.xlsx', 'Formato', 'DE INGRESO AL CENTRO ', 1, '2017-10-01 00:00:00', 15),
(183, 34, 'FORMATO', '06 For MT 02 mem turn.docx', 'Formato', 'MEMORANDO TURNOS ', 1, '2017-10-01 00:00:00', 15),
(184, 35, 'FORMATO', '06 For MG 02 mem sen.docx', 'Formato', 'MEMORANDO SENA EMPRESA ', 1, '2017-10-01 00:00:00', 15),
(185, 4, 'FORMATO INFORME DE PRESTACION DE SERVICIOS MECANIZACION', '04-FOr-IDPDSM-04-02  prestacion SSE.xls', 'Formato', '04 FOr IDPDSM 02 prestacion SSE', 2, '2015-03-02 00:00:00', 48),
(186, 4, 'PROGRAMA DE MANTENIMIENTO PREVENTIVO DE TRACTORES E IMPLEMETOS AGRICOLAS', '04-FOr-PMPTIA-04-01 MPTIA.xlsx', 'Formato', '04 FOr PMPTIA 01 mant prev eq', 1, '2015-05-01 00:00:00', 49),
(187, 36, 'FORMATO DE CONTROL DE MAQUINARIA MECANIZACION', '04-FOr-CMM-04-01 contrl maqu.docx', 'Formato', '04 FOr CMM 01 cntrl maqu', 1, '2012-11-01 00:00:00', 50),
(188, 4, 'FORMATO DE CONTROL DE MANTENIMIENTO DE MAQUINARIA Y EQUIPO', '04-FOr-CMME-04-01 contrl ma eq.xlsx', 'Formato', '04 FOr CMME 01 Contr mant eq', 1, '2012-11-01 00:00:00', 50),
(189, 4, 'FORMATO DE SOLICITUD DE SERVICIOS UNIDAD DE MECANIZACION AGRICOLA', '04-FOr-SDSUDMA-04-02 soli SUMA.xlsx', 'Formato', '04 FOr SDSUMA 02 Solic serv', 1, '2010-06-02 00:00:00', 50),
(190, 2, 'FORMATO REGISTRO CONTROL INVENTARIOS DE MAQUINARIA Y EQUIPOS', '07-FOr-RCIME-07-01 CIME.xlsx', 'Formato', '07 FOr RCIME 01 RCIME', 1, '2014-12-01 00:00:00', 41),
(191, 4, 'FORMATO DE REGISTRO DE DETERMINACIÃ“N DE ACPM', '04-FOr-RDDDAC-04-01 dete acpm.xlsx', 'Formato', '04 FOr RDA 01 dete acpm', 1, '2014-11-01 00:00:00', 18),
(192, 1, 'FORMATO DE HERRAMIENTAS', '04-FOr-DHER-04-01 herramienta.xlsx', 'Formato', '04 FOr HER 01 For herram', 1, '2012-05-01 00:00:00', 51),
(193, 2, 'FORMATO DE INVENTARIO MECANIZACIÃ“N AGRICOLA', '07-FOr-DIMA-07-01 inv mec agr.xlsx', 'Formato', '07 FOr IMA 01 inv mec agr', 1, '2015-03-01 00:00:00', 51),
(194, 4, 'FORMATO DE REGISTRO CONSUMO DE COMBUSTIBLES', '04-FOr-DRCDC-04-01 reg con com.docx', 'Formato', '04 FOr RCC 01 reg combus', 1, '2013-08-01 00:00:00', 51),
(195, 14, 'ASISTENCIA A SENA EMPRESA', '06-FOr-ASE-06-02  asi sen emp.xlsx', 'Formato', '06 FOr ASE 02  asi sen emp', 1, '2012-11-01 00:00:00', 15),
(196, 14, 'ASISTENCIA A SENA EMPRESA', '06-FOr-ASE-06-02  asi sen emp-1.xlsx', 'Formato', '06 FOr ASE 02  asi sen emp', 1, '2012-11-02 00:00:00', 15),
(197, 4, 'FORMATO DE INFORME DE LABORES DIARIAS', '04 For ILD 01 infor labo diarias.pdf', 'Formato', 'FORMATO DE INFORME DE LABORES DIARIAS', 1, '2015-12-01 00:00:00', 51),
(198, 4, 'FORMATO DE SOLICITUD DE SERVICIOS PARA GESTION A CULTIVOS UNIDAD DE MECANIZACION AGRICOLA', '04 FOr SSGCUMA 04 solicit gestion a cult.pdf', 'Formato', '04 FOr SSGCUMA 04 solict gesti', 1, '2016-02-02 00:00:00', 51),
(199, 4, 'FORMATO INFORME EJECUTIVO AREA MECANIZACION AGRICOLA', '04 FOr IEAMA 04 inform ejec mec..pdf', 'Formato', '04 FOr IEAMA 04 inform ejec me', 1, '2016-05-02 00:00:00', 51),
(200, 1, 'FORMATO SOLICITUD DE SERVICIOS UNIDAD DE MECANIZACION AGRICOLA', '04 FOr SDSUMA 04 solic serv mec.pdf', 'Formato', '04 FOr SSUMA 04 solic serv me', 1, '2016-05-01 00:00:00', 51),
(201, 4, 'FORMATO DE INFORME SEMANAL TRANSPORTE UNIDAD DE MECANIZACION AGRICOLA', '04 FOr ISTUMA 01 info sema transp.pdf', 'Formato', '04 FOr ISTUMA 01 info sema tr', 1, '2015-12-01 00:00:00', 51),
(202, 4, 'FORMATO CONTROL DE MANTENIMIENTO PREVENTIVO DE TRACTORES E IMPLEMENTOS AGRICOLAS', '04 FOr CMPTIA 01 mant prev tract.pdf', 'Formato', '04 FOr CMPTIA 01 mant prev tr', 1, '2015-12-01 00:00:00', 51),
(203, 4, 'FORMATO CONTROL DE MANTENIMIENTO CORRECTIVO DE TRACTORES E IMPLEMENTOS AGRICOLAS', '04 FOr CMCTIA 01 mant corre tract.pdf', 'Formato', '04 FOr CMCTIA 01 mant corre tr', 1, '2015-12-01 00:00:00', 51),
(204, 1, 'FORMATO MANEJO DE ENSILAJE', '04-FOr-MDE-04-01 mane ensilaj.docx', 'Formato', '04 FOr ME 01 mane ensilaj', 1, '2012-11-01 00:00:00', 18),
(205, 4, 'FORMATO REGISTRO USO DE MEDICAMENTOS VETERINARIOS UNIDAD DE GANADERIA', '04-FOr-RUMVUG-04-01  RUMV.xlsx', 'Formato', '04 FOr RUMVUG 01 Usomedicvet', 1, '2015-05-01 00:00:00', 18),
(206, 2, 'FORMATO INVENTARIO DE ANIMALES PORCINOS', '07-FOr-IAP-07-01 invent anim.xlsx', 'Formato', '07 FOr IAP 01 invent anim', 1, '2012-11-01 00:00:00', 18),
(207, 1, 'FORMATO DE REGISTRO DIARIO DE CONSUMO Y SALDO DE ALIMENTO', '04-FOr-RDCSA-04-02 cons sal alim.xlsx', 'Formato', '04 FOr RDCSA 02 cons sald alim', 1, '2016-11-02 00:00:00', 18),
(208, 1, 'FORMATO DE PROGRAMACION DE PARTOS', '04-FOr-DPDP-04-01 progra part.docx', 'Formato', '04 FOr PP 01 progra part', 1, '2012-03-01 00:00:00', 18),
(209, 1, 'FORMATO DE CONTROL SANITARIO', '04-FOr-DCSA-04-01 contr sanit.pdf', 'Formato', '04 FOr DCSA 01 contr sanit', 1, '2012-03-01 00:00:00', 18),
(210, 4, 'FORMATO DE CONTROL DE PESO', '04-FOr-DCDP-04-01 contl peso.docx', 'Formato', '04 FOr CP 01 contl peso', 1, '2012-03-01 00:00:00', 18),
(211, 4, 'FORMATO DE CONTROL DE ENTRADAS Y SALIDAS DE SEMOVIENTES', '04-FOR-DCDEYSDS-04-01 CESS.xlsx', 'Formato', '04 FOr CESS 01 EntrSaliSemov', 1, '2016-03-01 00:00:00', 18),
(212, 1, 'FORMATO DE  REGISTROS PARA PRECEBOS', '04-FOr-DRPP-04-01 reg precebo.xlsx', 'Formato', '04 FOr RP 01 reg precebo', 1, '2013-11-01 00:00:00', 18),
(213, 14, 'FORMATO  VISITAS A  LA UNIDAD DE GANADERIA', '06-FOr-VUG-06-01 visitas uni gan.docx', 'Formato', '06 FOrVUG 01 visitas uni gan', 1, '2012-05-01 00:00:00', 18),
(214, 1, 'FORMATO DE REGISTRO DE NACIMIENTO', '04-FOr-RN-04-01 reg nacimien.xlsx', 'Formato', '04 FOr RN 01 reg nacimien', 1, '2014-10-01 00:00:00', 18),
(215, 1, 'FORMATO REGISTRO PRODUCCION DIARIA', '04-FOr-RDDPP-04-02 reg pro dia.xlsx', 'Formato', '04 FOr RDPP 02 reg pro dia', 1, '2013-02-04 00:00:00', 18),
(216, 1, 'FORMATO DE REGISTRO DE CAMADA', '04-FOr-RDC-04-01 reg camadas.xlsx', 'Formato', '04 FOr RC 01 reg camadas', 1, '2013-11-01 00:00:00', 18),
(217, 1, 'FORMATO DE PALPACIONES', '04-FOr-DP-04-01 palpaciones.docx', 'Formato', '04 FOr P 01 palpaciones', 1, '2012-12-01 00:00:00', 18),
(218, 1, 'FORMATO DE MORTALIDAD UNIDAD DE OVINOS', '04 FOr RMUO 01 mortalidad ovi.xlsx', 'Formato', '04 FOr RMUO 01 mortalidad ovi', 1, '2015-09-01 00:00:00', 18),
(219, 1, 'FORMATO DE MORTALIDAD', '04-FOr-RM-04-01 mortalidad.xlsx', 'Formato', '04-FOr RM 01 mortalidad', 1, '2012-08-01 00:00:00', 18),
(220, 1, 'FORMATO DE CONTROL  SANITARIO INDIVIDUAL', '04-FOr-CSI-04-01 con san indi.xlsx', 'Formato', '04 FOr CSI 01 cont san indi', 1, '2013-11-01 00:00:00', 18),
(221, 1, 'FORMATO DE HOJA DE VIDA DE LA UNIDAD DE PISCICULTURA', '04-FOr-HVUP-04-01 hoja vida pis.docx', 'Formato', '04 FOr HVUP 01 hoja vida pis', 1, '2012-08-01 00:00:00', 18),
(222, 1, 'FORMATO DE HOJA DE VIDA DE LA UNIDAD DE PISCICULTURA', '04-FOr-HVUP-04-01 hoja vida pis(1).docx', 'Formato', '04 FOr HVUP 01 hoja vida pis', 1, '2012-08-01 00:00:00', 18),
(223, 2, 'FORMATO DE INVENTARIO DE SEMOVIENTES', '07-FOr-IS-07-01 inv semovie.xlsx', 'Formato', '07 FOr IS 01 inv semovie', 1, '2015-05-07 00:00:00', 18),
(224, 1, 'FORMATO DE REGISTRO PRODUCCIÃ“N ESTANQUES', '04-For-RPE-04-01 reg pro est.xlsx', 'Formato', '04 For RPE 01 reg pro est', 1, '2013-08-01 00:00:00', 18),
(225, 1, 'REGISTRO DE SANIDAD ACUICOLA', '04-FOr-SA 04-01 reg san acuicu.xlsx', 'Formato', '04 FOr SA 01 reg san acuicu', 1, '2014-06-01 00:00:00', 18),
(226, 1, 'FORMATO DE REGISTRO  INVENTARIO DE ENJAMBRAMIENTOS', '04-FOr-RIE-04-01  RI  enjambram.xlsx', 'Formato', '04 FOr RIE 01  RI  enjambram', 1, '2014-11-01 00:00:00', 18),
(227, 1, 'FORMATO TABLA DE GESTACIÃ“N DE LA CERDA', '04-FOr-RTG-04-01 tab ges cerda.xlsx', 'Formato', '04 FOr TGC 01 tab ges cerda', 1, '2012-11-01 00:00:00', 18),
(228, 1, 'FORMATO DE INGRESO A LA UNIDAD ', '04 FOr IU 01 ingreso unidad.xlsx', 'Formato', '04 FOr IU 01 ingreso unidad', 1, '2015-09-01 00:00:00', 18),
(229, 1, 'FORMATO DE REGISTRO CONTROL TRIMESTRAL  DE MACHOS', '04-FOr-DCTDM_04-01 con tri mac.xlsx', 'Formato', '04 FOr RCTM 01 con tri mac', 1, '2015-03-01 00:00:00', 18),
(230, 1, 'FORMATO DE REGISTRO DE COSECHAS PISCICULTURA', '04-FOr-DRDCDP-04-01 cosech pis.xlsx', 'Formato', '04 FOr RCP 01 cosech pis', 1, '2015-03-01 00:00:00', 18),
(231, 1, 'FORMATO DE CHEQUEO TURNO DE QUINCE DIAS', '06-FOr-DCTDQD-06-02 lista ch TQ.xlsx', 'Formato', '06 For CTQD 02 cheq Tur Quince', 1, '2015-03-02 00:00:00', 18),
(232, 1, 'FORMATO DE MUESTREO PISCICULTURA', '04-FOr-DMP-04-01 muestr pisci.xlsx', 'Formato', '04 FOr MP 01 muestr pisci', 1, '2015-03-01 00:00:00', 18),
(233, 1, 'FORMATO DE REGISTRO DE PESAJE Y FAMACHA', '04-FOr-PF-04-01 reg pes fama.xlsx', 'Formato', '04 FOr RPF 01 reg pesa fama', 1, '2015-02-01 00:00:00', 18),
(234, 1, 'FORMATO DE REGISTROS SERVICIOS', '04-FOr-RS-04-01 reg servic.xlsx', 'Formato', '04 FOr RS 01 reg servic', 1, '2013-11-01 00:00:00', 18),
(235, 1, 'FORMATO REGISTRO INDIVIDUAL DE HEMBRA DE CRÃA', '04-FOr-RIHC-04-01  reg ind hem cria.xlsx', 'Formato', '04 FOr RIHC 01  reg ind hem cria', 1, '2015-02-01 00:00:00', 18),
(236, 1, 'FORMATO DE  REGISTRO INDIVIDUAL DE TRATAMIENTOS', '04-FOr-RIT-04-01 reg ind trata.xlsx', 'Formato', '04 FOr RIT 01 reg ind trata', 1, '2015-03-01 00:00:00', 18),
(237, 1, 'FORMATO DE REGISTRO PRODUCTIVO DE LOTES', '06-FOr-LCTRLA-06-02  lis che TLA.xlsx', 'Formato', '04 FOr RPL 01 reg prod lote', 1, '2013-02-01 00:00:00', 18),
(238, 1, 'FORMATO DEL USO DE MEDICAMENTOS VETERINARIOS', '04 FOr UMV 01 uso med vet.docx', 'Formato', '04 FOr UMV 01 uso med vet', 1, '2015-01-04 00:00:00', 18),
(239, 1, 'FORMATO DE LIMPIEZA Y DESINFECCIÃ“N DE LA UNIDAD DE AVICULTURA', '04 FOr LDUA 01 lim des uni avi.docx', 'Formato', '04 FOr LDUA 01 lim des uni avi', 1, '2015-07-01 00:00:00', 18),
(240, 1, 'FORMATO DE TRATAMIENTO TERMICO DE LA GALLINAZA O CODORNAZA', '04 FOr TTGC 01 tra ter gall cod.docx', 'Formato', '04 FOr TTGC 01 tra ter gall cod', 1, '2015-07-01 00:00:00', 18),
(241, 1, 'FORMATO DE VACUNACION', '04 FOr V 01 vacunaciÃ³n.docx', 'Formato', '04 FOr V 01 vacunaciÃ³n', 1, '2015-07-01 00:00:00', 18),
(242, 1, 'FORMATO DE MORTALIDAD DE AVES', '04 FOr MA 01 mor aves.docx', 'Formato', '04 FOr MA 01 mor aves', 1, '2015-07-01 00:00:00', 18),
(243, 1, 'FORMATO DE MANEJO Y DISPOSICION DE LA MORTALIDAD EN LA GAB DE AVES DE POSTURA ', '04 FOr MDMGAP 01 man mor aves.docx', 'Formato', '04 FOr MDMGAP 01 man mor aves', 1, '2015-07-01 00:00:00', 18),
(244, 1, 'FORMATO DE MANTENIMIENTO', '04 FOr M 01 mantenimiento.docx', 'Formato', '04 FOr M 01 mantenimiento', 1, '2015-07-01 00:00:00', 18),
(245, 1, 'FORMATO DE TRATAMIENTO DE AGUA', '04 FOr TA 01 tra agua.docx', 'Formato', '04 FOr TA 01 tra agua', 1, '2015-07-01 00:00:00', 18),
(246, 1, 'FORMATO DE INGRESO DE PERSONAS Y VEHICULOS A LA GRANJA AVICOLA BIOSEGURA', '04 FOr IPVGAB 01 ing per veh gab.docx', 'Formato', '04 FOr IPVGAB 01 ing per veh gab', 1, '2015-01-01 00:00:00', 18),
(247, 1, 'FORMATO DE TRAZABILIDAD DEL HUEVO PARA CONSUMO HUMANO', '04 FOr THCH 01 tra hue con hum.docx', 'Formato', '04 FOr THCH 01 tra hue con hum', 1, '2015-07-01 00:00:00', 18),
(248, 1, 'FORMATO DE CONTROL DE PLAGAS EN LA UNIDAD DE AVICULTURA', '04 FOr CPUA 01 con pla avi.docx', 'Formato', '04 FOr CPUA 01 con pla avi', 1, '2015-07-01 00:00:00', 18),
(249, 1, 'IN STRUCTIVO PARA EL DILIGENCIAMIENTO REGISTRO DE BAJAS', '04 INs DRB 01 dil reg bajas.docx', 'Instructivo', '04 INs DRB 01 dil reg bajas', 1, '2015-05-01 00:00:00', 18),
(250, 1, 'INSTRUCTIVO PARA EL DILIGENCIAMIENTO REGISTRO DE ENTRADAS', '04 INs DRE 01 dil reg entradras.docx', 'Instructivo', '04 INs DRE 01 dil reg entradras', 1, '2015-05-01 00:00:00', 18),
(251, 1, 'INSTRUCTIVO PARA EL DILIGENCIAMIENTO REGISTRO DE TRASLADOS', '04 INs DRT 01 dil reg traslados.docx', 'Formato', '04 INs DRT 01 dil reg traslados', 1, '2015-05-01 00:00:00', 18),
(252, 1, 'FORMATO REGISTRO DE ADMINISTRACION DE MEDICAMENTOS VETERINARIOS UNIDAD DE OVINOS', '04 FOr RAMVUO 01 adm med ovi.xlsx', 'Formato', '04 FOr RAMVUO 01 adm med ovi', 1, '2015-09-01 00:00:00', 18),
(253, 1, 'FORMATO CONTROL DE MONTAS UNIDAD DE OVINOS', '04 FOr CMUO 01 montas uni ovi.docx', 'Formato', '04 FOr CMUO 01 montas uni ovi', 1, '2015-09-01 00:00:00', 18),
(254, 1, 'INSTRUCTIVO PARA EL DILIGENCIAMIENTO REGISTRO DIARIO DE PRODUCCIÃ“N PECUARIA', '04 INs DRDPP 01 dil reg dia pecua.docx', 'Instructivo', '04 INs DRDPP 01 dil reg dia pecua', 1, '2015-05-01 00:00:00', 18),
(255, 1, 'FORMATO DE REGISTRO CONSOLIDADO SEMANAL DE PRODUCCION AVICOLA', '04 FOr RCSPA 01 cons sem produc avi.xlsx', 'Formato', '04 FOr RCSPA 01 cons sem produc avi', 1, '2015-12-01 00:00:00', 18),
(256, 1, 'FORMATO DE REGISTRO DIARIO DE PRODUCCION AVICOLA', '04 FOr RDPA 01 reg diar produ avi.xlsx', 'Formato', '04 FOr RDPA 01 reg diar produ avi 	', 1, '2015-10-01 00:00:00', 18),
(257, 1, 'FORMATO DE SUMINISTRO DE ALIMENTO APIARIO', '04 FOr SAA 01 sumi alimen api.pdf', 'Formato', '04 FOr SAA 01 sumi alimen api', 1, '2015-11-11 00:00:00', 18),
(258, 1, 'FORMATO DE PERDIDAS EN PROCESO', '04 For PP 01 perdidas procesos.pdf', 'Formato', '04 For PP 01 perdidas procesos', 1, '2015-11-01 00:00:00', 18),
(259, 1, 'FORMATO CONTROL DE LOTE DE PRODUCCION PECUARIA', 'O4 FOr CLPP O1 contr lot prod pec.pdf', 'Formato', 'O4 FOr CLPP 01 cont lot pro pe', 1, '2015-11-01 00:00:00', 18),
(260, 1, 'FORMATO DE REGISTRO DIARIO DE PRODUCCION PECUARIA PLANTA DE CONCENTRADOS', '04 FOr RDPPPDC 04 regist prod plant con.pdf', 'Formato', '04 FOr RDPPPC 04 reg plant con', 1, '2016-05-02 00:00:00', 18),
(261, 1, 'FORMATO FICHAS TECNICAS UNIDADES PECUARIAS', 'FORMATO FICHAS TÃ‰CNICAS.pdf', 'Formato', '04 FOr FTUP 02 fic tec uni pec', 1, '2016-05-02 00:00:00', 18),
(262, 1, 'FORMATO SOLICITUD DE MATERIALES', '04 FOr MN 02 medicion nitrog.pdf', 'Formato', '04 FOr MNL 02 medicion nitrog', 1, '2016-06-02 00:00:00', 18),
(263, 1, 'FORMATO CONTROL PRESTAMO DE EQUIPOS', '04 FOr 01 solicitud materiales.pdf', 'Formato', '04 FOr CPE 02 contr pres equip', 1, '2016-06-02 00:00:00', 18),
(264, 1, 'FORMATO REPORTE DE MORTALIDAD UNIDAD DE PORCINOS', '04 FOr 01 report mortali porci.pdf', 'Formato', '04 FOr RMUP 01 repor mort porc', 1, '2016-06-02 00:00:00', 18),
(265, 1, 'FORMATO DE REGISTRO DE TRASLADO SEMOVIENTES Y/0 ELEMENTOS', '04 FOr RTSE 02  regis trans semov elemen .pdf', 'Formato', '04 FOr RTS 02 reg tra sem ele', 1, '2016-06-02 00:00:00', 18),
(266, 3, 'FORMATO CRONOGRAMA DE VISITAS UNIDAD DE OVINOS', '07 FOr CVUO 02 CRONOG.pdf', 'Formato', '07 FOr CVUO 02 cron acti ovin', 1, '2016-06-02 00:00:00', 18),
(267, 2, 'FORMATO DE REGISTRO DE INVENTARIO MENSUAL DE MEDICAMENTOS', '04 FOr RIMM 01 regist inv mens medica .pdf', 'Formato', '04 FOr RIMM 01 reg inv men med ', 1, '2016-06-02 00:00:00', 18),
(268, 1, 'FORMATO CONTROL DE ALIMENTOS PARA SEMOVIENTES (KARDEX)', '04 FOr 01 contro alimen semovien.pdf', 'Formato', '04 FOr CASK 01 contr alim semo', 1, '2016-06-01 00:00:00', 18),
(269, 4, 'FORMATO DE COLECTA DE SEMEN EX)', 'RECOLECCION DE SEMEN.xlsx', 'Formato', 'RECOLECCION DE SEMEN.xlsx', 1, '2017-03-02 00:00:00', 52),
(270, 1, 'SOLICITUD DE MATERIALES', 'SOLICITUD DE MATERIALES.xlsx', 'Formato', 'SOLICITUD DE MATERIALES.xlsx 	', 1, '2017-03-02 00:00:00', 52),
(271, 1, 'FORMATO MEDICION DE NITROGENO', 'FORMATO MEDICION DE NITROGENO.xlsx', 'Formato', 'FORMATO MEDICION DE NITROGENO.xlsx', 1, '2017-03-04 00:00:00', 52),
(272, 1, 'FORMATOS DE ECOGRAFIAS', 'FORMATO DE ECOGRAFIAS.xlsx', 'Formato', 'FORMATO DE ECOGRAFIAS.xlsx', 1, '2017-03-03 00:00:00', 18),
(273, 1, 'FORMATO DE ALIMENTACIÃ“N DIARIA UNIDAD DE PORCINOS ', '04 FOr ADUP 01 aliment dia.xlsx', 'Formato', 'ALIMENTACIÃ“N DIARIA ', 1, '2017-03-03 00:00:00', 18),
(274, 1, 'FORMATO DE CELOS Y MONTAS UNIDAD DE GANADERIA ', '04 FOr CMUG 01 for cel y mon.xlsx', 'Formato', 'FORMATO DE CELOS Y MONTAS ', 1, '2017-03-03 00:00:00', 18),
(276, 1, 'FORMATO REGISTRO DE SALIDA PRODUCTO TERMINADO AREA PECUARIA ', '04 FOr RSPTAP 02 produc termi.xlsx', 'Formato', 'REGISTRO DE SALIDA PRODUCTO ', 1, '2017-03-03 00:00:00', 18);

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
  MODIFY `id_documento` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=277;

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
