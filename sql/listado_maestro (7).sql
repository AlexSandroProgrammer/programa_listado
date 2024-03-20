-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-03-2024 a las 21:52:11
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
(279, 49, 'Produccion Formato Cosecha (BPA)  ', '04 FOr CBPA 01 cosecha bpa.xlsx', 'Formato', 'FOr-CBPA-04-01/09-15  ', 1, '2024-03-02 11:53:22', 1),
(280, 44, 'Formato Acta de Entrega ', '01 FOr AE 01 acta entrega.docx', 'Formato', 'FOr-AE-01-01/11-12 ', 1, '2024-03-04 07:53:29', 25),
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
(304, 44, 'Formato Registro Control de Visitas Tecnicas', '01 FOr RCVT 01 regi con vis te.xlsx', 'Formato', 'FOr-RCVT-01-01/11-14 ', 1, '2024-03-04 15:49:18', 40),
(305, 44, 'Formato Turnos de Apoyo Fin de Semana', '01 For TAFS 01 Apoyo Fin.xlsx', 'Formato', 'FOr-TAFS-01-01/10-17', 1, '2024-03-05 08:23:19', 40),
(306, 44, 'Instructivo Para la Atencion a Visitantes', '01 INs AV 01 ins atenc visitas.docx', 'Instructivo', '01 INs AV 01 ins atenc visitas', 1, '2024-03-05 09:30:34', 40),
(308, 47, 'Formato Plan de Auditorias', '02 FOr PA 02 plan auditori.docx', 'Formato', 'FOr-PA-02-02/04-13  ', 1, '2024-03-05 10:19:20', 5),
(309, 47, 'Formato Programa de Auditorias Internas', '02 FOr PAI 01 programa aud.pdf', 'Formato', 'FOr-PAI-02-01/09-15', 1, '2024-03-05 11:30:24', 5),
(310, 63, 'Formato de Registro Uso de Equipos, Utensilios y Otros Elementos', '02 FOr REUE 02 reg uso equipos .pdf', 'Formato', 'FOr-REUE-02-02/11-12', 1, '2024-03-05 11:32:56', 5),
(311, 47, 'Formato Evaluacion de Auditores Internos Por Auditados', '02-FOr- EAIPA 02-01 eval audi inter PA.pdf', 'Formato', 'Or-EAIA-02-01/04-13 ', 1, '2024-03-05 11:35:05', 5),
(312, 47, 'Formato de Evaluacion de Auditor Interno Por Parte del Auditor Lider', '02-FOr- EDAIPDAL 02-01 eva audi inter PPAL.pdf', 'Formato', 'FOr-EAIPAL-02-01/04-13 ', 1, '2024-03-05 11:37:14', 5),
(313, 47, 'Formato Informe Auditorias', '02-FOr- IDA 02-01 auditorias inter.pdf', 'Formato', 'Or-IA-02-01/04-13', 1, '2024-03-05 11:43:12', 5),
(314, 49, 'Formato Para Control de Inventarios De Producto Terminado (Remanentes en plata)', '04 CIPT 01 prod term.xlsx', 'Formato', 'FOr-CIPT-04-01/11-17', 1, '2024-03-05 11:50:06', 34),
(315, 49, 'Formato Control de Alimentos Para Semovientes (KARDEX)', '04 FOr 01 contro alimen semovien.pdf', 'Formato', 'FOr-CASK-04-01/06-16', 1, '2024-03-05 11:53:21', 18),
(316, 49, 'Formato Reporte De Mortalidad Unidad de Porcinos', '04 FOr 01 report mortali porci.pdf', 'Formato', 'FOr-RMUP-04-02/06-16', 1, '2024-03-05 11:56:44', 18),
(317, 49, 'Formato Solicitud de Materiales', '04 FOr 01 solicitud materiales.pdf', 'Formato', 'FOr-SM-04-01/06-16', 1, '2024-03-05 11:58:49', 18),
(318, 51, 'Formato Acciones Preventivas y Correctivas', '02 FOr APC 01 accio preven y correc.xls', 'Formato', 'FOr-APC-02-01/08-15', 1, '2024-03-05 14:48:46', 16),
(319, 49, 'Formato Informe de Produccion De Bienes de Agroindustria', '04 FOr  IPBA 01 informe produccion.xls', 'Formato', 'FOr-IPBA-04-01/02-15   ', 1, '2024-03-05 14:56:46', 10),
(320, 50, 'Formato Informe de Prestacion de Servicios', '04 FOr  IPS 01 informe servicio agroind.xls', 'Formato', 'FOr-IPS-04-01/03-15  ', 1, '2024-03-05 14:59:53', 23),
(321, 49, 'Formato Aplicacion de Abono Organico (BPA)', '04 FOr AAOBPA 01 apli abon org.xlsx', 'Formato', 'FOr-AAOBPA-04-01/09-15', 1, '2024-03-05 15:02:54', 1),
(322, 49, 'Formato De Alimentacion Diaria Unidad de Porcinos', '04 FOr ADUP 01 aliment dia.xlsx', 'Formato', 'For-ADUP-04-01/11-17', 1, '2024-03-05 15:17:46', 18),
(323, 49, 'Formato De Aplicaciones de Fitosanitarios (BPA)', '04 FOr AF 01 aplic fito.xlsx', 'Formato', 'FOr-AF-04-01/11-17', 1, '2024-03-05 15:21:47', 18),
(324, 49, 'Formato Aplicacion de Fungicida (BPA)', '04 FOr AFBPA 01 apli fungicida.xlsx', 'Formato', 'FOr-AFBPA-04-01/09-15', 1, '2024-03-06 08:18:08', 1),
(325, 49, 'Formato Aplicacion de Fertilizantes Quimico (BPA)', '04 FOr AFQBPA 01 apli fert qui.xlsx', 'Formato', 'FOr-AFQBPA-04-01/09-15', 1, '2024-03-06 08:20:05', 1),
(326, 49, 'Formato Aplicacion de Insecticida (BPA)', '04 FOr AIBPA 01 apli insec.xlsx', 'Formato', 'FOr-AIBPA-04-01/09-15', 1, '2024-03-06 08:22:12', 1),
(327, 49, 'Formato Comparendo Ambiental', '04 FOr CA 01 comparen ambient.pdf', 'Formato', '04 FOr CA 01 comparen ambient', 1, '2024-03-06 08:25:04', 37),
(328, 49, 'Formato Control de Arvenses (BPA)', '04 FOr CABPA 01 control arven.xlsx', 'Formato', 'FOr-CABPA-04-01/09-15', 1, '2024-03-06 08:26:54', 1),
(329, 50, '04 FOR CB 01 control botellones ', '04 FOr CB 01 control botellones.pdf', 'Formato', '04 FOr CB 01 control botellon', 1, '2024-03-06 08:29:13', 38),
(330, 50, 'Formato Control de Contaminacion por Hongos y Bacterias de Plantulas de Laboratorio de Biotecnologia', '04 FOr CCHBPLB  01 conta hong.docx', 'Formato', 'FOr-CCHBPLB-04-02/06-16', 1, '2024-03-06 08:36:09', 18),
(332, 49, 'Formato Control de Herramientas (BPA)', '04 FOr CHBPA 01 control herram bpa.pdf', 'Formato', 'FOr-CHBPA-04-01/07-16', 1, '2024-03-07 08:36:53', 18),
(333, 57, 'Formato de Control de Inventario de Bolsas', '04 FOr CIB 02 inve bols.xlsx', 'Formato', 'FOr-CIB-07-02/11-17', 1, '2024-03-07 08:42:46', 37),
(334, 50, 'Programa Mantenimiento Correctivo de Tractores e Implementos Agricolas', '04 FOr CMCTIA 01 mant corre tract.pdf', 'Formato', 'FOr-MCTIA-04-01/12-15 ', 1, '2024-03-07 08:51:14', 49),
(335, 50, 'Formato Control de Mantenimiento Preventivo de Tractores E Implementos Agricolas', '04 FOr CMPTIA 01 mant prev tract.pdf', 'Formato', 'FOr-MPTIA-04-01/12-15 ', 1, '2024-03-07 09:04:02', 51),
(336, 49, 'Formato de Celos y Montas Unidad de Ganaderia', '04 FOr CMUG 01 for cel y mon.xlsx', 'Formato', 'FOr-CMUG-04-01/11-17', 1, '2024-03-07 09:12:55', 18),
(337, 49, 'Formato Control de Montas Unidades de Ovinos', '04 FOr CMUO 01 montas uni ovi.docx', 'Formato', 'FOr-CMUO-04-01/ 09-15 ', 1, '2024-03-07 09:18:57', 18),
(338, 49, 'Formato de Control de Plagas', '04 FOr CP 01 contr plag.docx', 'Formato', 'FOr-CP-04-01/05-12 ', 1, '2024-03-07 09:21:40', 1),
(339, 50, 'Formato Control de Prestamo de Equipo de Laboratorio', '04 FOr CPEL 01 cont pres equ.xls', 'Formato', 'FOr-CPEL-04-01/07-15', 1, '2024-03-11 08:39:49', 12),
(340, 49, 'Formato Control de Plagas en la Unidad de Avicultura', '04 FOr CPUA 01 con pla avi.docx', 'Formato', 'FOr – CPUA – 04-01/07-15', 1, '2024-03-11 08:44:49', 18),
(341, 44, 'Formato Cronograma Semestral de Fertilizacion (BPA)', '04 FOr CSFBPA 01 cron semes ferti bpa.pdf', 'Formato', 'FOr-CSFBPA-01-01/07-16', 1, '2024-03-11 08:49:36', 2),
(342, 50, 'Formato Control y Uso de los Reactivos de Laboratorio de Suelos', '04 FOr CURLS 01 cont uso rls.xls', 'Formato', 'For-CURLS-04-01/07-15', 1, '2024-03-11 08:53:53', 12),
(343, 49, 'Formato de Evaluacion de Criterios de Aceptacion o Rechazo de Materias Primas, Insumos y Producto Terminado', '04 FOr ECARMPIPT 03 eval crit mp i pt f-236.pdf', 'Formato', 'FOr ECARMPIPT 04-03/02-15', 1, '2024-03-11 08:57:39', 17),
(345, 49, 'Formato Ficha Producto Terminado ', '04 FOr FPT 01 ft product.docx', 'Formato', 'FOr-FPT-04-01/08-13', 1, '2024-03-11 09:10:59', 17),
(346, 49, 'Formato de Fichas Tecnicas de los Cultivos', '04 FOr FTC 01 fich tec cult.xls', 'Formato', 'FOr-FTC-04-01/11-13', 1, '2024-03-11 09:32:26', 1),
(347, 49, 'Formato Ficha Tecnica de Detergentes y Desinfectantes', '04 FOr FTDYD 01 ft det y desif.docx', 'Formato', 'FOr-FTDD-04-01/08-13  ', 1, '2024-03-11 09:39:22', 17),
(348, 49, 'Formato Ficha Tecnica de Equipos', '04 FOr FTE 01 ft equipos.docx', 'Formato', 'FOr-FTE-04-01/08-13', 1, '2024-03-11 09:54:21', 17),
(349, 49, 'Formato Ficha Tecnica de Materias Primas e Insumos', '04 FOr FTMPEI 01 ft mp.docx', 'Formato', 'FOr-FTMPI-04-01/02-13', 1, '2024-03-11 13:55:56', 18),
(350, 49, 'Formato Historial de Cultivo (BPA)', '04 FOr HCBPA 01 histor culti bpa.pdf', 'Formato', 'FOr-HCBPA-04-01/07-16', 1, '2024-03-11 14:05:49', 17),
(351, 50, 'Formato de Inspeccion y Auditoria Programa de Limpieza y Desinfeccion', '04 FOr IAPLD 01 insp y aud.docx', 'Formato', 'FOr-IAPLD 04-02/11-17', 1, '2024-03-11 14:08:22', 22),
(352, 49, 'Formato Informe Ejecutivo', '04 FOr IE 01 forma inf ejecu.xlsx', 'Formato', 'FOr-IE-04-01/02-15      ', 1, '2024-03-11 14:15:55', 2),
(353, 49, 'Formato Informe Ejecutivo Area de Mecanizacion Agricola', '04 FOr IEAMA 04 inform ejec mec..pdf', 'Formato', 'FOr-IEAMA- 04-02/05-16 ', 1, '2024-03-11 14:18:24', 2),
(354, 50, 'Formato de Informe de Labores Diarias', '04 For ILD 01 infor labo diarias.pdf', 'Formato', 'FOr-ILD-04-01/12-15', 1, '2024-03-12 07:54:13', 1),
(355, 49, 'Formato Informe de Produccion de Bienes de Sena Empresa', '04 FOr IPBSE 01 pro bie sen em.xls', 'Formato', 'FOr-IPBSE-04-01/03-15', 1, '2024-03-12 08:07:38', 18),
(356, 50, 'Formato de Inventario de Plantas Invitro del Laboratorio de Biotecnologia', '04 FOr IPILBV 01 in pla in lbv.docx', 'Formato', 'FOr-IPILBV-04-01/07-15', 1, '2024-03-12 08:16:04', 18),
(357, 49, 'Formato de Ingreso de Personas y Vehiculos A la Granja Avicola Biosegura', '04 FOr IPVGAB 01 ing per veh gab.docx', 'Formato', 'FOr – IPVGAB – 04-01/07-15', 1, '2024-03-12 08:22:31', 18),
(358, 49, 'Formato de Informe Semanal de Actividades', '04 FOr ISA 01 informe sem.docx', 'Formato', 'For-ISA-04-02/10-17', 1, '2024-03-12 08:25:26', 18),
(359, 49, 'Formato de Informe Semanal Transporte Unidad de Mecanizacion Agricola', '04 FOr ISTUMA 01 info sema transp.pdf', 'Formato', 'FOr-ISTUMA-04-01/12-15', 1, '2024-03-12 08:27:49', 49),
(360, 49, 'Formato Ingreso a la Unidad', '04 FOr IU 01 ingreso unidad.xlsx', 'Formato', 'FOr- IU-04-01/09-15', 1, '2024-03-12 08:31:36', 18),
(361, 49, 'Formato Labores de Cultivo (BPA)', '04 FOr LCBPA labor culti bpa.pdf', 'Formato', 'FOr-LCBPA-04-01/07-16', 1, '2024-03-13 08:34:27', 18),
(362, 49, 'Formato de Limpieza y Desinfeccion de Equipos y Herramientas (BPA)', '04 FOr LDEBPA 01 lim desin equi herra bpa.pdf', 'Formato', 'FOr-LDEHBPA-04-01/07-16', 1, '2024-03-13 08:36:37', 2),
(363, 49, 'Formato de Limpieza y Desinfeccion de la Unidad de Avicultura', '04 FOr LDUA 01 lim des uni avi.docx', 'Formato', 'FOr – LDUA – 04-01/07-15', 1, '2024-03-13 08:39:13', 18),
(364, 49, 'Formato de Mantenimiento ', '04 FOr M 01 mantenimiento.docx', 'Formato', 'FOr – M – 04-01/07-15', 1, '2024-03-13 08:40:49', 49),
(365, 49, 'Formato Mortalidad de Aves', '04 FOr MA 01 mor aves.docx', 'Formato', 'FOr – MA – 04-01/07-15', 1, '2024-03-13 08:49:48', 18),
(366, 49, 'Formato de Monitoreo de Cultivos Piscicolas', '04 FOr MDCP 01 monitoreo pisci.xlsx', 'Formato', 'FOr-MDCP-04-01/10-20', 1, '2024-03-13 08:52:14', 18),
(367, 49, 'Formato de Manejo y Disposicion de la Mortalidad en la Gab', '04 FOr MDMGAP 01 man mor aves.docx', 'Formato', 'FOr – MDMGAP – 04-01 - /07-15 ', 1, '2024-03-13 08:56:39', 18),
(368, 49, 'Formato Mantenimiento de Equipos (BPA)', '04 FOr MEBPA 01 mante equip bpa.pdf', 'Formato', 'FOr-MEBPA-04-01/07-16', 1, '2024-03-13 09:00:01', 2),
(369, 49, 'Formato Matriz Monitoreo del Cultivo (BPA)', '04 FOr MMCBPA 01 monito cul.xlsx', 'Formato', 'FOr-MMCBPA-04-01/09-15', 1, '2024-03-13 09:03:13', 1),
(370, 49, 'Formato Medicion de Nitrogeno Laboratorio', '04 FOr MN 02 medicion nitrog.pdf', 'Formato', 'FOr-MNL-04-02/06-16', 1, '2024-03-13 09:05:10', 52),
(371, 50, 'Formato Nota de Servicio Agroindustria', '04 FOr NSA 01 nota serv agro.pdf', 'Formato', 'FOr-NSA-04-01/03-15', 1, '2024-03-13 09:07:37', 10),
(372, 49, 'Formato de Prestamo de Materiales y Equipos', '04 FOr PME 02 prestamo mat.pdf', 'Formato', 'FOr-PME-04-02/04-14', 1, '2024-03-13 10:55:00', 20),
(373, 50, 'Formato Control de Prestamo de Equipos', '04 For PP 01 perdidas procesos.pdf', 'Formato', 'FOr-CPE-04-02/06-16', 1, '2024-03-13 10:56:31', 40),
(374, 49, 'Formato de Registro de Aplicaciones', '04 FOr RA 02 reg aplicacion.xlsx', 'Formato', 'FOr-RA-04-02/11-12', 1, '2024-03-13 10:58:35', 1),
(375, 50, 'Formato de Registro de Analisis de Muestra y Reporte de Resultados de Laboratorio ', '04 FOr RAMRL 02 analisis mues.docx', 'Formato', 'FOr- RAMRRL- 04-03/11-17', 1, '2024-03-13 11:02:06', 23),
(376, 49, 'Formato de Registro de Administracion de Medicamentos Vetenarios Unidad de Ovinos', '04 FOr RAMVUO 01 adm med ovi.xlsx', 'Formato', 'FOr-RAMVUO-04-01/09-15', 1, '2024-03-13 11:05:25', 38),
(377, 49, 'Formato Riego del Cultivo(BPA)', '04 FOr RCBPA 01 riego cult bpa.pdf', 'Formato', 'FOr-RCBPA-04-01/07-16', 1, '2024-03-13 11:07:04', 2),
(378, 50, 'Formato de Registro, Control y Prestamo de Herramientas', '04 FOr RCPH 01 reg con pre her.pdf', 'Formato', 'FOr-RCPH-04-01/09-16', 1, '2024-03-13 11:36:35', 37),
(379, 49, 'Formato de Registro Consolidado Semanal de Produccion Avicola', '04 FOr RCSPA 01 cons sem produc avi.xlsx', 'Formato', 'FOr-RCSPA-04-01/10-15', 1, '2024-03-13 11:38:24', 18),
(380, 50, 'Formato de Registro de Sustancias Quimicas Laboratorio Biotecnologia Vegetal', '04 FOr RCSQLBV 01 reg sust qui.docx', 'Formato', 'FOR-RCSQLBV--04-01/07-15', 1, '2024-03-13 11:44:06', 12),
(381, 49, 'Formato Registro de Bajas', '04 FOr RDB 02 registro bajas f-94.pdf', 'Formato', 'FOr-RDB-04-02/08-12', 1, '2024-03-13 11:47:59', 18),
(382, 49, 'Formato de Registro de Cosechas Piscicultura ', '04 FOr RDCP 02 cosechas pisci.xlsx', 'Formato', 'FOr-RDCP-04-02/10-20 ', 1, '2024-03-13 11:51:01', 18),
(383, 49, 'Formato de Registro Diario de Produccion Avicola', '04 FOr RDPA 01 reg diar produ avi.xlsx', 'Formato', 'FOr-RDPA-04-01/10-15', 1, '2024-03-13 14:06:46', 18),
(384, 49, 'Formato de Registro Diario de Produccion Pecuaria Planta de Concentrados', '04 FOr RDPPPDC 04 regist prod plant con.pdf', 'Formato', 'FOr-RDPPPC-04-02/05-16', 1, '2024-03-13 14:10:42', 18),
(385, 49, 'Formato de Registro Disposicion de Residuos Peligrosos', '04 FOr RDRP 01 reg dis resi pe.docx', 'Formato', 'FOr-RDRP-04-01/08-13', 1, '2024-03-13 14:12:37', 16),
(386, 49, 'Formato Registro de Entradas ', '04 FOr RE 02 registr entra.xls', 'Formato', 'FOr-RE-04-01/11-14', 1, '2024-03-13 14:13:49', 18),
(387, 49, 'Formato Registro de Fertilizacion', '04 FOr RF 01 reg fertiliz.docx', 'Formato', 'FOr-RF-04-01/11-12', 1, '2024-03-13 14:15:50', 1),
(388, 49, 'Formato Registro de Inventario Diario de Semovientes', '04 FOr RIDS 01 inven diari.xlsx', 'Formato', 'For-RIDS-04-01/11-17', 1, '2024-03-13 14:20:39', 23),
(389, 57, 'Formato de Registro de Inventario Mensual de Medicamentos', '04 FOr RIMM 01 regist inv mens medica .pdf', 'Formato', 'FOr-RIMM-04-01/06-16', 1, '2024-03-13 14:22:24', 18),
(390, 49, 'Formato de Registro Inspeccion Puntos Ecologicos', '04 FOr RIPE 01 inspe punt.xlsx', 'Formato', 'FOr-RIPE-04-01/11-17', 1, '2024-03-13 15:09:29', 1),
(391, 49, 'Formato de Registro de Lectura de Micromedidores', '04 FOr RLM 01 reg lec micr.xlsx', 'Formato', 'FOr-RLM-04-01/08-13', 1, '2024-03-13 15:13:52', 16),
(392, 50, 'Formato de Recepcion de Muestras Para Analisis En el laboratorio De Suelos', '04 FOr RMALS 01 recp mues als.docx', 'Formato', 'FOr-RMALS-04-01/07-15', 1, '2024-03-18 11:21:04', 12),
(393, 49, 'Formato de Registro Manejo de Residuos', '04 FOr RMR 01 mane resid.xlsx', 'Formato', 'FOr-RMR-04-01/11-12', 1, '2024-03-18 11:22:38', 16),
(394, 49, 'Formato Registro de Mortalidad de Ovinos', '04 FOr RMUO 01 mortalidad ovi.xlsx', 'Formato', 'FOr-RMUO-04-01/09-15 ', 1, '2024-03-18 11:24:55', 18),
(395, 50, 'Formato Registro Prestacion de Herramientas', '04 FOr RPH 01 regis prest.docx', 'Formato', ' FOr-RPH-04-01/11-17', 1, '2024-03-18 11:29:56', 37),
(396, 49, 'Formato Recoleccion de Residuos Posconsumo (BPA)', '04 FOr RRPBPA 01 recol residu posco bpa.pdf', 'Formato', 'FOr-RRPBPA-04-01/07-16', 1, '2024-03-18 11:31:34', 2),
(397, 50, 'Formato De Registro De Recepcion y Toma de Muestras Para Analisis Del Laboratorio', '04 FOr RRTMAL 02 tom mues.docx', 'Formato', 'FOr- RRTMAL 01-03/11-17', 1, '2024-03-18 11:34:15', 12),
(398, 49, 'Formato de Registro de Siembra', '04 FOr RS 01 reg siembra.xlsx', 'Formato', 'FOr-RS-04-01/11-12', 1, '2024-03-18 11:45:09', 18),
(399, 49, 'Formato de Registro de Propagacion Por Semillas', '04 FOr RS 04 01 reg siemb semi.xlsx', 'Formato', 'FOr-RPS-04-02/06-16', 1, '2024-03-18 11:46:37', 16),
(400, 49, 'Formato Registro de Salida Producto Terminado Area de Pecuaria', '04 FOr RSPTAP 02 produc termi.xlsx', 'Formato', 'For-RSPTAP-04-02/11-17', 1, '2024-03-18 11:48:40', 18),
(401, 49, 'Formato Registro de Traslado ', '04 FOr RT 01 regis traslados.docx', 'Formato', 'FOr-RT-04-01/11-14', 1, '2024-03-18 11:51:21', 18),
(402, 49, 'Formato Registro de Traslados de Semovientes y/o elementos', '04 FOr RTSE 02  regis trans semov elemen .pdf', 'Formato', 'FOr-RTSE-04-02/06-16', 1, '2024-03-18 11:52:57', 18),
(403, 49, 'Formato de Suministro de Alimento Piario', '04 FOr SAA 01 sumi alimen api.pdf', 'Formato', 'FOr-SAA-04-01/11-15', 1, '2024-03-18 11:55:08', 18),
(404, 49, 'Formato Solicitud de Ambientes, Equipos y otros elementos Para orientar ', '04 FOr SAEEOPF 02 solici pract.pdf', 'Formato', 'FOr-SAEEOPF-04-02/08-14', 1, '2024-03-18 11:58:51', 20),
(405, 50, 'Formato de Solicitud de Servicios Unidad Agricola', '04 FOr SDSUMA 04 solic serv mec.pdf', 'Formato', 'FOr-SSUMA-04-01/05-16', 1, '2024-03-18 12:01:06', 48),
(406, 49, 'Formato Salida de Plantas', '04 FOr SP 01 salida plantas.docx', 'Formato', 'FOr-SP-04-01/11-12 ', 1, '2024-03-18 12:03:11', 20),
(407, 50, 'Formato de Solicitud de Servicios Para Gestion a Cultivos Unidad de Mecanizacion Agricola', '04 FOr SSGCUMA 04 solicit gestion a cult.pdf', 'Formato', 'FOr-SSGCUMA-04-02/04-16', 1, '2024-03-18 12:12:05', 51),
(408, 49, 'Formato Tratamiento de Agua', '04 FOr TA 01 tra agua.docx', 'Formato', 'FOr – TA  – 04-01/07-15', 1, '2024-03-18 13:52:04', 18),
(409, 49, 'Formato de Trazabilidad y Control de Parametros de Produccion', '04 FOr TCPP 01 trazab y param.docx', 'Formato', 'FOr-TCPP-04-01/04-13   ', 1, '2024-03-18 13:54:09', 17),
(410, 49, 'Formato de Trazabilidad del Huevo Para consumo Humano', '04 FOr THCH 01 tra hue con hum.docx', 'Formato', 'FOr – THCH – 04-01/07-15', 1, '2024-03-18 14:17:12', 18),
(411, 49, 'Formato de Tratamiento Termico de la Gallinaza o Codornaza', '04 FOr TTGC 01 tra ter gall cod.docx', 'Formato', 'FOr – TTGC- 04-01/07-15', 1, '2024-03-18 14:18:31', 18),
(412, 49, 'Formato del Uso de Medicamentos Veterinarios', '04 FOr UMV 01 uso med vet.docx', 'Formato', 'FOr – UMV – 04-01/07-15', 1, '2024-03-18 14:19:53', 18),
(413, 49, 'Formato de Vacunacion ', '04 FOr V 01 vacunacion.docx', 'Formato', 'FOr – V – 04-01/07-15', 1, '2024-03-20 08:06:53', 18),
(414, 50, 'Formato De Verificacion Diaria de Labores de Limpieza y Desinfeccion', '04 FOr VDLLD 02 l y d.docx', 'Formato', 'FOr- VDLLD 04-02/11-17', 1, '2024-03-20 08:08:30', 34),
(415, 50, 'Instructivo para el Manejo de la Planta de tratamiento de Agua y Caldera Area Agroindustria  ', '04 INs 01 manejo pl aguas caldera f-229.pdf', 'Instructivo', 'Ns-MPTAYCAA 04-01/06-14 ', 1, '2024-03-20 08:11:15', 21),
(416, 50, 'Instructivo Para la preparacion de Soluciones de Limpieza y Desinfeccion Area de Agroindustria', '04 INs 01 preparacion soluciones Lyd f-30.pdf', 'Instructivo', 'INs-PSLDAA 01/08-14', 1, '2024-03-20 08:14:31', 21),
(417, 49, 'Instructivo Para el diligenciamiento registro de bajas ', '04 INs DRB 01 dil reg bajas.docx', 'Instructivo', 'INs – DRB – 04-01/05-15 ', 1, '2024-03-20 08:27:29', 18),
(418, 49, 'Instructivo Para el diligenciamiento Registro Diario de Produccion Pecuaria', '04 INs DRDPP 01 dil reg dia pecua.docx', 'Formato', 'INs – DRDPP – 04-01/05-15', 1, '2024-03-20 08:30:45', 18),
(419, 49, 'Instructivo Para el Diligenciamiento Registro de Entradas', '04 INs DRE 01 dil reg entradras.docx', 'Instructivo', 'INs – DRE – 04-01/05-15', 1, '2024-03-20 08:33:13', 18),
(420, 49, 'Instructivo Para el Diligenciamiento Registro de Traslado ', '04 INs DRT 01 dil reg traslados.docx', 'Instructivo', 'INs – DRT – 05-01/05-15', 1, '2024-03-20 08:36:08', 18),
(421, 49, 'Formato Nota de Produccion de Agroindustria', '04 NPA 07 not produc.xlsx', 'Formato', 'FOr - NPA -  04-07/11-17', 1, '2024-03-20 08:37:56', 10),
(422, 50, 'Formato Control de Maquinaria Mecanizacion', '04-FOr-CMM-04-01 contrl maqu.docx', 'Formato', 'FOr-CMM-04-01/11-12', 1, '2024-03-20 08:39:30', 50),
(423, 50, 'Formato de Control de Mantenimiento de Maquinaria y Equipo', '04-FOr-CMME-04-01 contrl ma eq.xlsx', 'Formato', 'FOr-CMME-04-01/11-12', 1, '2024-03-20 08:41:13', 50),
(424, 49, 'Formato de Control Sanitario Individual ', '04-FOr-CSI-04-01 con san indi.xlsx', 'Formato', 'FOr-CSI-04-01/11-13', 1, '2024-03-20 08:44:03', 18),
(425, 49, 'Formato Control de Entradas y Semovientes', '04-FOR-DCDEYSDS-04-01 CESS.xlsx', 'Formato', 'FOr-CESS-04-01/03-12', 1, '2024-03-20 08:45:34', 18),
(426, 49, 'Formato Control de Peso', '04-FOr-DCDP-04-01 contl peso.docx', 'Formato', 'FOr-CP-04-01/03-12 ', 1, '2024-03-20 08:47:09', 18),
(427, 49, 'Formato Control de Sanitario ', '04-FOr-DCSA-04-01 contr sanit.pdf', 'Formato', 'FOr-DCSA-04-01/03-12 ', 1, '2024-03-20 08:50:28', 18),
(428, 49, 'Formato de Registro de Control Trimestral de Machos', '04-FOr-DCTDM_04-01 con tri mac.xlsx', 'Formato', 'FOr-RCTM-04-01/03-15', 1, '2024-03-20 08:51:35', 18),
(429, 49, 'Formato de Herramientas', '04-FOr-DHER-04-01 herramienta.xlsx', 'Formato', 'FOr-HER-04-01/05-12', 1, '2024-03-20 08:54:04', 51),
(430, 49, 'Formato de Muestreo Piscicultura', '04-FOr-DMP-04-01 muestr pisci.xlsx', 'Formato', 'FOr-MP-04-01/03-15', 1, '2024-03-20 08:55:24', 18),
(431, 49, 'Formato de Palpaciones', '04-FOr-DP-04-01 palpaciones.docx', 'Formato', 'FOr-P-04-01/11-12', 1, '2024-03-20 09:00:50', 18),
(432, 49, 'FOr-PP-04-01 / 03-12', '04-FOr-DPDP-04-01 progra part.docx', 'Formato', 'FOr-PP-04-01 / 03-12 ', 1, '2024-03-20 09:07:07', 18),
(433, 50, 'Formato Registro de Consumo de Combustibles', '04-FOr-DRCDC-04-01 reg con com.docx', 'Formato', 'FOr-RCC-O4-01/08-13 ', 1, '2024-03-20 09:08:35', 51),
(434, 50, 'Formato de Registro de Accidentes Laborales', '04-FOR-DRDAL-04-01 acc lab.pdf', 'Formato', 'FOR-DRDAL-04-01/05-12', 1, '2024-03-20 09:10:36', 38),
(435, 49, 'Formato de Registro de Cosechas de Piscicultura', '04-FOr-DRDCDP-04-01 cosech pis.xlsx', 'Formato', 'FOr-RCP-04-01/03-15', 1, '2024-03-20 09:12:09', 18),
(436, 52, 'Formato de Registro de Ventas', '04-FOr-DRDV-04-01 reg ventas.xlsx', 'Formato', 'FOr-DRDV-05-01/11-13', 1, '2024-03-20 09:15:56', 38),
(437, 49, 'Formato de Registro para Precebos', '04-FOr-DRPP-04-01 reg precebo.xlsx', 'Formato', 'FOr-RP-04-01/11-13', 1, '2024-03-20 09:17:15', 18),
(438, 49, 'Formato de Entrada de Insumos Ambientales', '04-FOr-EIA-04-01 ent ins ambie.xlsx', 'Formato', 'FOr-EIA-04-01/03-15', 1, '2024-03-20 09:19:10', 36),
(439, 49, 'Formato de Hoja de Vida de la Unidad de Piscicultura', '04-FOr-HVUP-04-01 hoja vida pis.docx', 'Formato', 'FOr-HVUP-04-01/08-12 ', 1, '2024-03-20 09:26:15', 18),
(440, 50, 'Formato Informe de Prestacion de Servicios Mecanizacion ', '04-FOr-IDPDSM-04-02  prestacion SSE.xls', 'Formato', 'FOr-IDPDSM-04-02/03-15 ', 1, '2024-03-20 09:28:15', 48),
(441, 49, 'Formato Manejo de Ensilaje', '04-FOr-MDE-04-01 mane ensilaj.docx', 'Formato', 'FOr-ME-04-01/11-12', 1, '2024-03-20 09:29:24', 18),
(442, 49, 'Formato de Registro de Pesaje y Famacha', '04-FOr-PF-04-01 reg pes fama.xlsx', 'Formato', 'FOr- RPF-04-01 /02-15', 1, '2024-03-20 09:31:00', 18),
(443, 50, 'Programa de Mantenimiento Preventivo de Tractores e Implementos Agricola', '04-FOr-PMPTIA-04-01 MPTIA.xlsx', 'Formato', 'FOr-PMPTIA-04-01/05-15', 1, '2024-03-20 09:36:29', 49),
(444, 49, 'Formato Registro de Camada', '04-FOr-RDC-04-01 reg camadas.pdf', 'Formato', 'FOr-RC-04-01/11-13', 1, '2024-03-20 09:39:17', 18),
(445, 49, 'Formato de Registro Diario de Consumo y Saldo de Alimento ', '04-FOr-RDCSA-04-02 cons sal alim.xlsx', 'Formato', 'FOr-RDCSA-04-02/06-12 ', 1, '2024-03-20 09:43:42', 18),
(446, 50, 'Formato de Registro de Determinacion de ACPM', '04-FOr-RDDDAC-04-01 dete acpm.xlsx', 'Formato', 'FOr-RDA-04-01/11-14', 1, '2024-03-20 09:46:07', 18),
(447, 49, 'Formato de Registro Diario de Produccion Pecuaria', '04-FOr-RDDPP-04-02 reg pro dia.xlsx', 'Formato', 'FOr-RDPP-04-02/04-13 ', 1, '2024-03-20 09:49:15', 18),
(448, 49, 'Formato Registro de Inventario de Enjambramientos', '04-FOr-RIE-04-01  RI  enjambram.xlsx', 'Formato', 'FOr-RIE-04-01/11-14', 1, '2024-03-20 09:53:41', 18),
(449, 49, 'Formato registro individual de hembra cria', '04-FOr-RIHC-04-01  reg ind hem cria.xlsx', 'Formato', 'FOr- RIHC- 04-01/02-15', 1, '2024-03-20 09:55:24', 18),
(450, 49, 'Formato de registro invidual de tratamientos', '04-FOr-RIT-04-01 reg ind trata.xlsx', 'Formato', 'FOr-RIT-04-01/03-15', 1, '2024-03-20 09:56:53', 18),
(451, 49, 'Formato registro de mortalidad ', '04-FOr-RM-04-01 mortalidad.xlsx', 'Formato', 'FOr-RM-04-01/08-12 ', 1, '2024-03-20 09:58:45', 18),
(452, 49, 'Formato registro de nacimiento ', '04-FOr-RN-04-01 reg nacimien.xlsx', 'Formato', 'FOr-RN-04-01/10-14', 1, '2024-03-20 10:00:04', 18),
(453, 49, 'Formato registro de produccion estanques', '04-For-RPE-04-01 reg pro est.xlsx', 'Formato', 'FOr-RPE-04-01/08-13', 1, '2024-03-20 10:01:54', 18),
(454, 49, 'Formato registro de propagacion por esquejes', '04-FOr-RPS-04-01 reg siemb esqu.xlsx', 'Formato', 'FOr-RPE-04-02/06-16', 1, '2024-03-20 10:04:08', 16),
(455, 49, 'Formato de Registro de Servicios', '04-FOr-RS-04-01 reg servic.xlsx', 'Formato', 'FOr-RS-04-01/11-13', 1, '2024-03-20 10:09:13', 16),
(456, 49, 'Formato Tabla de Gestacion de la Cerda', '04-FOr-RTG-04-01 tab ges cerda.xlsx', 'Formato', 'FOr-TGC-04-01/11-12', 1, '2024-03-20 10:14:53', 18),
(457, 50, 'Formato registro de uso de medicamentos veterinarios unidad de ganaderia', '04-FOr-RUMVUG-04-01  RUMV.xlsx', 'Formato', 'FOr-RUMVUG-04-01/05-15', 1, '2024-03-20 10:19:52', 18),
(458, 49, 'Formato Sanidad Acuicola', '04-FOr-SA 04-01 reg san acuicu.xlsx', 'Formato', 'FOr-SA 04-01/06-14', 1, '2024-03-20 10:21:21', 18),
(459, 50, 'Formato de Solicitud de Servicios Unidad de Mecanizacion Agricola', '04-FOr-SDSUDMA-04-02 soli SUMA.xlsx', 'Formato', 'FOr-SDSUMA-04-02/06-10', 1, '2024-03-20 10:26:41', 18),
(460, 50, 'Instructivo de Produccion de Bienes Sena Empresa', '04-INs PSE 04-01 instructivo PBSE.pdf', 'Instructivo', 'INs PSE 04-01/03-15', 1, '2024-03-20 10:58:03', 38),
(461, 52, 'Formato de Pedidos', '05 FOr P 01 pedidos.xlsx', 'Formato', 'FOr-P-05-01/08-15', 1, '2024-03-20 11:00:19', 45),
(462, 52, 'Formato de relacion de entrega de dinero de base en administracion de la finca', '05 FOr REDBAF 01 entre din admon.docx', 'Formato', 'FOR-REDBAF-05-01/08-15 ', 1, '2024-03-20 11:01:43', 45),
(463, 66, 'Acta de Reuniones', '06 FOr AR 01 acta reunio.docx', 'Formato', 'FOr-AR-06-01/02-13  ', 1, '2024-03-20 11:04:25', 39),
(464, 66, 'Formato de Asistencia a Sena Empresa Area Agricola', '06 FOr ASEAA 06 asist area agri.pdf', 'Formato', 'FOr-ASEAA-06-02/05-16', 1, '2024-03-20 11:06:47', 18),
(465, 66, 'Formato Asistencia a Turno Especial ', '06 For ATE 01 asist turno espec.pdf', 'Formato', 'FOr-ATE-06-01/11-15', 1, '2024-03-20 11:08:20', 38),
(466, 66, 'Formato de Control de Asistencia Agroindustria', '06 FOr CAA control asis agro.pdf', 'Formato', 'FOr-CAA-06-02/09-15', 1, '2024-03-20 11:10:20', 25),
(467, 53, 'Formato Check List Empalme ', '06 FOr CLE 01 check list emp.pdf', 'Formato', 'FOr-CLE-06-01/09-16', 1, '2024-03-20 11:14:21', 40),
(468, 53, 'Formato de entrevistas ', '06 FOr FE 01 entrevista f-220.xlsx', 'Formato', 'FOr FE 06-01/11-12', 1, '2024-03-20 11:15:54', 44),
(469, 66, 'Formato lista de Chequeo Turno Rutinario ', '06 FOr LCTR 01 cheq turnos.pdf', 'Formato', 'FOr-LCTR-06-01/11-13', 1, '2024-03-20 11:18:31', 25),
(470, 53, 'Formato memorando sena empresa', '06 For MG 02 mem sen.docx', 'Formato', 'For-MSE-06-02/11-17', 1, '2024-03-20 11:22:00', 15),
(471, 66, 'Formato memorando turnos ', '06 For MT 02 mem turn.docx', 'Formato', 'For-MT-06-02 / 11-17 ', 1, '2024-03-20 11:23:21', 15),
(472, 53, 'Formato de Plan de Induccion ', '06 FOr PI 01 plan inducc f-187.pdf', 'Formato', 'FOr PI 06-01 / 04-10 ', 1, '2024-03-20 11:24:38', 15),
(473, 54, 'Formato de Registro Horas Laborales', '06 FOr RHL 03 regis  hor lab.xlsx', 'Formato', 'FOr-RHL-06-03/05-12  ', 1, '2024-03-20 11:26:01', 44),
(474, 54, 'Formato de Reporte Novedades de Nomina ', '06 FOr RNN 01 repor nom.xlsx', 'Formato', 'FOr-RNN-06-01/11-17', 1, '2024-03-20 11:28:59', 44),
(475, 54, 'Instructivo Para el diligenciamiento registro de horas laborales', '06 INs DRHL 01 dilig horas lab.docx', 'Instructivo', 'INs – DRHL – 06-01/09-15', 1, '2024-03-20 11:30:26', 44),
(476, 53, 'Instructivo para Induccion y Empalme Sena Empresa', '06 INs IE 01 ins indu empal se .pdf', 'Instructivo', 'INS-IE-01/03-15', 1, '2024-03-20 11:32:53', 44),
(477, 53, 'Reglamento interno de trabajo area de agroindustria', '06 REg ITAA 02 reglamento int ag f.pdf', 'Formato', 'REg-ITAA-06-02/03-15', 1, '2024-03-20 11:34:19', 44),
(478, 66, 'Formato Programacion de Turnos ', '06-F0r-PT-06-01 progra turn.docx', 'Formato', 'FOr-PT-06-01/06-10', 1, '2024-03-20 11:37:26', 44),
(479, 53, 'Formato de Asistencia a Capacitacion ', '06-FOr-06-01 asist capacit.docx', 'Formato', 'FOr-AC-06-01/11-12 ', 1, '2024-03-20 11:40:46', 15),
(480, 55, 'Formato de Asistencia a Sena Empresa', '06-FOr-ASE-06-02  asi sen emp.xlsx', 'Formato', 'FOr-ASE-06-02/11-12', 1, '2024-03-20 11:42:12', 44),
(481, 66, 'Formato de Chequeo Turno de Quince dias', '06-FOr-DCTDQD-06-02 lista ch TQ.xlsx', 'Formato', 'FOr-CTQD-06-02/03-15', 1, '2024-03-20 11:46:46', 44),
(482, 66, 'Formato de lista de chequeo turno rutinario laboratorio animal', '06-FOr-LCTRLA-06-02  lis che TLA.xlsx', 'Formato', 'FOr-LCTRLA-06-01/11/12', 2, '2024-03-20 14:05:59', 18),
(483, 53, 'Formato proceso de seleccion de sena empresa', '06-FOr-PDSDSE-06-01 PSSE.xlsx', 'Formato', 'FOr-PDSDSE-06-01/11-12', 1, '2024-03-20 14:08:14', 15),
(484, 66, 'Formato Solicitud de Turnos Especiales', '06-FOr-SDTE-06-01 sol tur esp.docx', 'Formato', 'FOr-SDTE-06-01/05-10 ', 1, '2024-03-20 14:11:55', 44),
(485, 66, 'Formato visitas a la unidad de ganaderia', '06-FOr-VUG-06-01 visitas uni gan.docx', 'Formato', 'FOr-VUG-01-01/05-12 ', 1, '2024-03-20 14:14:45', 15),
(486, 56, 'Formato de Control interno de actividades basicas para el lider contable y financiero', '07 FOr CIABLCF 01 Cont int act.xlsx', 'Formato', 'FOr-CIABLCF-07-01/12-14', 1, '2024-03-20 14:16:53', 18),
(487, 44, 'Formato cronograma de visitas unidad de ovinos', '07 FOr CVUO 02 CRONOG.pdf', 'Formato', 'FOr-CVUO-07-02/06-16', 1, '2024-03-20 14:19:37', 18),
(488, 57, 'Formato inventario de elementos de proteccion personal', '07 FOr EPP 01 elem prot. Pers..xlsx', 'Formato', 'FOr-IEPP-07-01/09-15', 1, '2024-03-20 14:32:07', 40),
(489, 57, 'Formato inventario de insumos ambientales', '07 FOr IIA 01 invent d insumos.xlsx', 'Formato', 'FOr-IIA-07-01/06-16', 1, '2024-03-20 14:33:41', 36),
(490, 56, 'Formato de registro consolidado de costos indirectos', '07 FOr RCC 01 regis cost ind.xlsx', 'Formato', 'FOr-RCCI-07-01/11-14', 1, '2024-03-20 14:35:17', 18),
(491, 57, 'Formato de registro de control de inventarios de elementos generales', '07 FOr RCIDEG 01 invent elem g.xlsx', 'Formato', 'FOr-RCIEG-07-01/12-14', 1, '2024-03-20 14:41:50', 21),
(492, 57, 'Formato control de inventarios de maquinaria y equipos', '07 FOr RCIME 01 maq y equip.xlsx', 'Formato', 'FOr-RCIME-07-01/12-14  ', 1, '2024-03-20 14:48:58', 18),
(493, 57, 'Instructivo para el diligenciamiento del formato de inventario diario ', '07 INs DFID 01 dilig inv diario.docx', 'Instructivo', 'INs – DFID – 07-01/09-15', 1, '2024-03-20 14:53:35', 18),
(494, 49, 'Instructivo para el manejo del almacen de agroindustria', '07 INs MAA mane almac agroindus.docx', 'Instructivo', 'INs-MAA 07-01/09-15', 1, '2024-03-20 14:55:39', 10),
(495, 56, 'Formato de imputacion contable de costos indirectos ', '07-FOr-DICDCI-07-01 ICCI.xlsx', 'Formato', 'FOr-DICDCI-07-01/11-14', 1, '2024-03-20 14:59:45', 25),
(496, 57, 'Formato de inventario mecanizacion agricola', '07-FOr-DIMA-07-01 inv mec agr.xlsx', 'Formato', 'FOr-IMA-07-01/03-15', 1, '2024-03-20 15:01:11', 1),
(497, 56, 'Formato desprendible de nomina ', '07-FOr-DNOM-07-01 despre nomina.pdf', 'Formato', 'For-DNOM 07-01/10-13', 1, '2024-03-20 15:03:45', 41),
(498, 57, 'Formato inventario de animales porcinos', '07-FOr-IAP-07-01 invent anim.xlsx', 'Formato', 'FOr-IAP-07-01/11-12', 1, '2024-03-20 15:07:08', 25),
(499, 57, 'Formato inventario diario ', '07-FOr-ID-07-01 invent diario.pdf', 'Formato', 'FOr-ID 07-01/02-15', 1, '2024-03-20 15:10:41', 2),
(500, 57, 'Formato de inventario de semovientes', '07-FOr-IS-07-01 inv semovie.xlsx', 'Formato', 'FOr-IS-07-01/05-12', 1, '2024-03-20 15:14:06', 18),
(501, 58, 'Formato para la aprobacion y estandarizacion de documentos', '08 FOr AYEDD 01 aprob y est doc f-13.pdf', 'Formato', 'FOr-AYEDD 08-01/08-13', 1, '2024-03-20 15:19:08', 46),
(502, 58, 'Formato de registro y verificacion de documentos en el listado maestro', '08 FOr RVDLM 01 regis y veri.xlsx', 'Formato', 'For-RVDLM-08-01/10-17', 1, '2024-03-20 15:21:00', 46),
(503, 58, 'Formato solicitud de elaboracion, modificacion o cambio de documentos', '08 FOr SEMCD 01 solicitud elab f-186.pdf', 'Instructivo', 'FOr-SEMCD 08-01/04-13', 1, '2024-03-20 15:23:56', 25),
(504, 58, 'Instructivo para actualizacion de listado maestro en el blog sena empresa', '08 INs 01 actuali listad maestro .pdf', 'Formato', 'INs-ALMBSE-02-01/04-16', 1, '2024-03-20 15:26:26', 42),
(505, 45, 'Instructivo para nombrar archivos ', '08 INs 01 Nomb De Archiv.pdf', 'Formato', 'INs-NA-08-01/10-17', 1, '2024-03-20 15:29:19', 42),
(506, 58, 'Instructivo para la elaboracion y codificacion de los documentos', '08 INs 03 elaboracion document.pdf', 'Formato', 'INs-ECD-08-05/09-16', 1, '2024-03-20 15:42:31', 42),
(507, 58, 'Formato solicitud de elaboracion, modificacion o de cambio de documentos', '08-FOr-SEMCD-08-01 SEMCD.xlsx', 'Formato', 'FOr-SEMCD-08-01/04-13', 1, '2024-03-20 15:46:44', 46),
(508, 50, 'Formato de entrada y salida  de plantulas de laboratorio de biotecnologia', 'FOr-BIOTECNOLOGIA.pdf', 'Formato', 'FOr-ESPLB-04-01/06-16', 1, '2024-03-20 15:49:35', 20);

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
(46, 'Control y Mejora de Procesos', 27, 'controlymejoradeproceos'),
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
(60, 'Gestion de la Informacion', 22, 'gestiondelainformacion'),
(65, 'Limpieza y Desinfeccion', 23, 'limpiezaydesinfeccion'),
(66, 'Programacion y Control del Turno', 26, 'programacionycontroldelturno');

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
(52, 'GESTOR DE LABORATORIO DE REPRODUCCION');

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
  MODIFY `id_documento` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=509;

--
-- AUTO_INCREMENT de la tabla `procedimiento`
--
ALTER TABLE `procedimiento`
  MODIFY `id_procedimiento` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

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
