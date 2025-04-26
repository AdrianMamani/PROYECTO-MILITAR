-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-04-2025 a las 21:12:40
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
-- Base de datos: `sistema_promocion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `subtitulo` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `blog`
--

INSERT INTO `blog` (`id`, `titulo`, `subtitulo`, `descripcion`, `imagen`) VALUES
(1, 'Historia de la Promoción \"Cabo Alberto Reyes Gamarra\"', 'Defendiendo la soberanía con honor y compromiso', 'Desde sus inicios, la promoción \"Cabo Alberto Reyes Gamarra\" ha sido un símbolo de disciplina, entrega y hermandad. En 1986, un grupo de jóvenes valientes decidió emprender el camino del servicio militar, enfrentando con determinación cada desafío que se les presentó. Con un entrenamiento riguroso, forjaron su carácter y desarrollaron habilidades esenciales para la defensa de la nación.\r\n\r\nDurante su formación, estos soldados adquirieron no solo destrezas tácticas y estratégicas, sino también un profundo sentido de compromiso con los valores institucionales. La fortaleza mental y física que demostraron en cada prueba los convirtió en referentes dentro de la institución, preparados para servir con honor y lealtad.\r\n\r\nA lo largo de los años, los integrantes de esta promoción han sido protagonistas de importantes misiones, defendiendo la soberanía, la independencia y la integridad territorial del país. Su sacrificio y patriotismo han sido fundamentales para fortalecer la seguridad nacional, dejando una huella imborrable en la historia militar.\r\n\r\nHoy, su legado sigue vivo, inspirando a nuevas generaciones de soldados que ven en ellos un ejemplo de valentía y vocación de servicio. La promoción \"Cabo Alberto Reyes Gamarra\" continúa siendo un pilar de la institución, recordándonos que la defensa de la patria es un honor que exige entrega absoluta.\r\n\r\n¡Honor y gloria a quienes han dedicado su vida a proteger nuestra nación!', 'img/tendencias.jpg'),
(2, 'Forjando Guerreros: La Transformación de un Soldado', 'Del reclutamiento a la élite militar', 'Desde el primer día de entrenamiento, un joven recluta deja atrás la comodidad de su hogar y se enfrenta a una nueva realidad, donde la disciplina, la resistencia y el sacrificio se convierten en su día a día. La vida en los cuarteles es dura, diseñada para poner a prueba no solo el cuerpo, sino también la mente.\r\n\r\nCada jornada comienza antes del amanecer, con entrenamientos extenuantes que incluyen largas carreras, ejercicios de combate cuerpo a cuerpo y simulaciones de guerra. Las órdenes deben cumplirse al instante, sin cuestionamientos, porque en el campo de batalla una fracción de segundo puede marcar la diferencia entre la vida y la muerte.\r\n\r\nPero más allá de la fatiga y el esfuerzo, la transformación es evidente. Lo que comenzó como un grupo de jóvenes inexpertos se convierte en una hermandad de guerreros preparados para enfrentar cualquier desafío. La lealtad y el compañerismo surgen naturalmente, porque en el ejército nadie avanza solo.\r\n\r\nCuando finalmente llega el día de la graduación, el sacrificio cobra sentido. Los nuevos soldados han dejado de ser simples reclutas; ahora son defensores de la nación, listos para servir con honor y valentía.', 'WhatsApp Image 2025-02-26 at 1.05.53 PM.jpeg'),
(3, 'Más Allá del Deber: El Legado de los Héroes Militares', 'Historias de valentía que inspiran generaciones', 'El uniforme de un soldado no es solo un conjunto de telas y medallas; es el símbolo de una historia de sacrificio y coraje. A lo largo de la historia, han existido hombres y mujeres que, enfrentando peligros inimaginables, han demostrado que la verdadera grandeza radica en la entrega total a una causa mayor.\r\n\r\nDesde misiones de rescate en zonas de conflicto hasta operaciones de paz en comunidades vulnerables, los soldados han sido pieza clave en la construcción de la historia nacional. Sus acciones muchas veces no llegan a los titulares de los periódicos, pero quedan grabadas en la memoria de aquellos a quienes protegieron.\r\n\r\nHistorias como la de un escuadrón que resistió días sin descanso en una misión de defensa territorial, o la de un soldado que arriesgó su vida para salvar a sus compañeros en combate, son relatos que reflejan el espíritu de sacrificio de quienes sirven en las fuerzas armadas.\r\n\r\nEste legado no solo se transmite en libros y monumentos, sino en cada nueva generación que decide portar el uniforme. Porque ser soldado no es solo un trabajo; es un compromiso eterno con la patria, un voto de lealtad que trasciende el tiempo y las fronteras.', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrusel`
--

CREATE TABLE `carrusel` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `subtitulo` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carrusel`
--

INSERT INTO `carrusel` (`id`, `titulo`, `subtitulo`, `descripcion`, `imagen`) VALUES
(1, 'CABO ALBERTO REYES GAMARRA', 'Sirviendo con honor, integridad y excelencia. Comprometidos con la seguridad y el bienestar de nuestra nación.', 'CABO ALBERTO REYES GAMARRA', '67dd776e09da4.png'),
(2, 'ESPÍRITU DE HERMANDAD', 'La promoción CABO ALBERTO REYES GAMARRA representa el compromiso, la lealtad y la entrega al servicio militar.', 'Formados en valores, unidos por la patria. ', '67dd77800ef0a.png'),
(3, 'HONOR Y COMPROMISO', 'CABO ALBERTO REYES GAMARRA mantiene vivo el legado de disciplina y sacrificio al servicio de la nación.', 'Preparados para enfrentar cualquier desafío.', '67dd7784e82a9.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `subtitulo` varchar(255) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `titulo`, `subtitulo`, `descripcion`, `fecha`) VALUES
(47, 'Alonso', 'Alonso', 'Alonso', '2025-03-13 20:07:03'),
(48, 'Alonso', 'Alonso', 'Alonso', '2025-03-13 20:07:03'),
(50, 'Alonso', 'Alonso', 'Alonso', '2025-03-13 20:07:09'),
(58, 'Fernando', 'Fernando', 'Fernando', '2025-03-13 20:18:39'),
(61, 'Rolando', 'admin@gmail.com', 'Muy buena pagina', '2025-03-20 23:08:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `id` int(11) NOT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `lugar` varchar(255) DEFAULT NULL,
  `redes_sociales` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`id`, `correo`, `celular`, `lugar`, `redes_sociales`) VALUES
(1, 'info@s.com', '987654777', 'Lima, Perú', 'facebook.com/empresa, instagram.com/empresa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deuda_registros`
--

CREATE TABLE `deuda_registros` (
  `id` int(11) NOT NULL,
  `numero_orden` int(11) DEFAULT NULL,
  `apellido_nombre` varchar(255) DEFAULT NULL,
  `ene` decimal(15,2) DEFAULT NULL,
  `feb` decimal(15,2) DEFAULT NULL,
  `mar` decimal(15,2) DEFAULT NULL,
  `abr` decimal(15,2) DEFAULT NULL,
  `may` decimal(15,2) DEFAULT NULL,
  `jun` decimal(15,2) DEFAULT NULL,
  `jul` decimal(15,2) DEFAULT NULL,
  `ago` decimal(15,2) DEFAULT NULL,
  `sep` decimal(15,2) DEFAULT NULL,
  `oct` decimal(15,2) DEFAULT NULL,
  `nov` decimal(15,2) DEFAULT NULL,
  `dic` decimal(15,2) DEFAULT NULL,
  `total_deuda` decimal(15,2) DEFAULT NULL,
  `deuda_2025` decimal(15,2) DEFAULT NULL,
  `deuda_2024` decimal(15,2) DEFAULT NULL,
  `deuda_2023` decimal(15,2) DEFAULT NULL,
  `deuda_2022` decimal(15,2) DEFAULT NULL,
  `deuda_2021` decimal(15,2) DEFAULT NULL,
  `otros_deudas` decimal(15,2) DEFAULT NULL,
  `total` decimal(15,2) DEFAULT NULL,
  `lugar` varchar(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `deuda_registros`
--

INSERT INTO `deuda_registros` (`id`, `numero_orden`, `apellido_nombre`, `ene`, `feb`, `mar`, `abr`, `may`, `jun`, `jul`, `ago`, `sep`, `oct`, `nov`, `dic`, `total_deuda`, `deuda_2025`, `deuda_2024`, `deuda_2023`, `deuda_2022`, `deuda_2021`, `otros_deudas`, `total`, `lugar`, `fecha`) VALUES
(1, 1, 'Juan Pérez', 1000.00, 1100.00, 1050.00, 950.00, 1200.00, 1250.00, 1150.00, 1300.00, 1350.00, 1400.00, 1450.00, 1500.00, 18000.00, 5000.00, 4500.00, 4000.00, 3500.00, 3000.00, 2000.00, 18000.00, 'Lima', '2023-12-15'),
(2, 2, 'María García', 1500.00, 1400.00, 1350.00, 1250.00, 1300.00, 1100.00, 1200.00, 1150.00, 1100.00, 1050.00, 1000.00, 950.00, 16000.00, 4000.00, 3800.00, 3600.00, 3400.00, 3000.00, 1500.00, 16000.00, 'Arequipa', '2023-11-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emprendimientos`
--

CREATE TABLE `emprendimientos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `contactos` varchar(255) NOT NULL,
  `ubicacion` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `segunda_descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `emprendimientos`
--

INSERT INTO `emprendimientos` (`id`, `nombre`, `imagen`, `contactos`, `ubicacion`, `descripcion`, `segunda_descripcion`) VALUES
(2, 'Market Donna', 'emprendimiento_a.jpg', 'servicioalcliente@corporaciondonna.com', 'Chorrillos - Surco - La Molina - Breña', '🛒 \"Todo lo que necesitas para el menú de tu familia\"\r\n', 'Bienvenido a la página oficial de Market Donna, tu mercado de confianza donde encontrarás productos frescos y de calidad para preparar los mejores platillos para tu familia. Desde frutas y verduras hasta carnes, abarrotes y productos de limpieza, todo en un solo lugar para tu comodidad.\r\n\r\nhttps://www.facebook.com/marketdonna'),
(4, 'Clave 7 Buses & Camiones', NULL, '990 521 788', 'Calle Los Tulipanes Ex fundo de carapongo lote 1, Lurigancho, Peru', '🚛 \"Moviendo el futuro, un kilómetro a la vez\"', 'Clave 7 es una empresa especializada en la venta, mantenimiento y repuestos para buses y camiones, brindando soluciones eficientes para el sector transporte. Con un equipo altamente capacitado y productos de calidad, garantizamos el mejor rendimiento para tus vehículos.\r\n\r\nclave7.buses.carrocerias@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `en_memoria`
--

CREATE TABLE `en_memoria` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `subtitulo` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `en_memoria`
--

INSERT INTO `en_memoria` (`id`, `titulo`, `subtitulo`, `descripcion`, `imagen`) VALUES
(3, 'RAMOS RODRIGUEZ CESAR', 'ENFERMEDAD', 'AEM (05) - Un ejemplo de fortaleza, siempre con una sonrisa y actitud positiva en los momentos más difíciles.', NULL),
(4, 'URURE CUPE GUIDO', 'ENFERMEDAD', 'AEM (05) - Siempre dispuesto a apoyar a los demás, demostrando su increíble resiliencia ante cualquier desafío.', NULL),
(5, 'CASTILLO CAMPOS FEDERICO', 'ACCIDENTE', 'AEM (05) - A pesar del accidente, nunca dejó de inspirar a todos con su esfuerzo y perseverancia.', NULL),
(6, 'MENDOZA CANTO MAGNO', 'ACCIDENTE', 'AEM (05) - Un sobreviviente que continúa luchando y nunca perdió su fe en los buenos tiempos.', NULL),
(7, 'MIO ZUÑIGA AUGUSTO ALBERTO', 'COVID-19', 'AEM (05) - Enfrentó el COVID-19 con valentía, recordándonos la importancia de la salud y la esperanza.', NULL),
(8, 'TUÑOQUE SANTAMARIA SIXTO', 'ENFERMEDAD', 'MEA (05) - Un luchador que, a pesar de la enfermedad, siempre mantuvo el espíritu alto y lleno de vida.', NULL),
(9, 'PERALTA GOMERO WILMER', 'ACCIDENTE', 'MEA (05) - Después del accidente, se mantuvo firme, demostrando que nada lo detendría en su camino hacia la recuperación.', NULL),
(10, 'PIÑAN RODRIGUEZ GERSON', 'ACCIDENTE', 'MEA (05) - La resiliencia ante el accidente lo convirtió en un referente de superación y fortaleza.', NULL),
(11, 'PINEDA SARMIENTO JOSE ALBERTO', 'ACCIÓN DE ARMAS', 'MEA (05) - Siempre dispuesto a servir, su valentía y entrega nos inspiran a seguir adelante en cualquier circunstancia.', NULL),
(12, 'QUEVEDO IZAGA VICTOR MANUEL', 'COVID-19', 'MEA (05) - Enfrentó el COVID-19 con una actitud valiente, demostrando lo que significa luchar por la vida.', NULL),
(13, 'SANDOVAL ALVARADO CESAR', 'ACCIDENTE', 'MVR (03) - Después de un accidente, su coraje y determinación se convirtieron en un ejemplo para todos.', NULL),
(14, 'VERA ROSAS MARIO', 'ENFERMEDAD', 'MVR (03) - Un hombre que ha demostrado una gran fortaleza ante la enfermedad, siempre mirando hacia adelante.', NULL),
(15, 'DÍAZ FERIA WALTER', 'ENFERMEDAD', 'MVR (03) - Con cada paso que da, muestra que no hay adversidad que no se pueda superar con esfuerzo.', NULL),
(16, 'HERNANI MAQUERA ANTONIO', 'ACCIDENTE', 'MA (05) - Tras el accidente, nunca dejó de luchar por su recuperación, siempre motivando a los demás a hacer lo mismo.', NULL),
(17, 'ALEJO MAMANI MARCIAL', 'ENFERMEDAD', 'MA (05) - A pesar de su enfermedad, siempre estuvo dispuesto a brindar apoyo y amor a los demás.', NULL),
(18, 'MAX TUESTA WILLY', 'ACCIÓN DE ARMAS', 'MA (05) - Un valiente, siempre al servicio de los demás, mostrando un compromiso inquebrantable con su misión.', NULL),
(19, 'LIZA SORIA MARCO ANTONIO', 'ENFERMEDAD', 'MA (05) - Cada día enfrentó la enfermedad con dignidad, recordándonos la importancia de mantener la esperanza.', NULL),
(20, 'SANCHEZ SUAREZ GUILLERMO', 'COVID-19', 'MA (05) - Un sobreviviente que se levantó después del COVID-19, demostrando la fortaleza del espíritu humano.', NULL),
(21, 'LOPEZ VALERIO WALTER', 'ENFERMEDAD', 'MCE (02) - A pesar de los desafíos, siempre mantuvo su actitud positiva, inspirando a todos a su alrededor.', NULL),
(22, 'RODRIGUEZ MENDOZA ROBERTO', 'ACCIDENTE', 'MCE (02) - Un luchador que, incluso después del accidente, nunca dejó de mostrar su increíble fortaleza.', NULL),
(23, 'DEFINA ALAMO ATILIO JOSÉ', 'ENFERMEDAD', 'IM (02) - Enfrentó la enfermedad con una actitud optimista, demostrando que nada es imposible si se tiene la voluntad.', NULL),
(24, 'QUINTO URRETA PEPE', 'COVID-19', 'IM (02) - Luchó con valentía contra el COVID-19, recordándonos el poder de la unidad y el amor por la vida.', NULL),
(25, 'VALLE HUAYANI JESUS ANTERO', 'ACCIDENTE', 'OEI (05) - Un ejemplo de superación, siempre con la frente en alto después del accidente, sin dejar que lo detuviera.', NULL),
(26, 'BULLON QUINTANA AUGUSTO', 'ACCIDENTE', 'OEI (05) - A pesar del accidente, nunca perdió la esperanza, siempre viendo el futuro con una sonrisa.', NULL),
(27, 'ORE JUSCAMAYTA FAUSTO', 'ENFERMEDAD', 'OEI (05) - Un guerrero que, aun en medio de la enfermedad, mantuvo su dedicación y fuerza de voluntad.', NULL),
(28, 'VERGASTEL CASTAÑEDA JOSE', 'ENFERMEDAD', 'OEI (05) - Siempre luchando contra la adversidad, demostrando la verdadera fuerza del ser humano.', NULL),
(29, 'ÑANA ORDAYA LICEFERO', 'ENFERMEDAD', 'OEI (05) - Con una actitud positiva ante la enfermedad, nunca dejó de ser una fuente de inspiración para los demás.', NULL),
(30, 'RAMIREZ QUISPE ROMAN ANDRES', 'ENFERMEDAD', 'ENF MIL (03) - A pesar de la enfermedad, siempre tuvo un corazón lleno de valentía y dedicación.', NULL),
(31, 'SOLANO MORALES SOCRATES ALFREDO', 'COVID-19', 'ENF MIL (03) - Luchó contra el COVID-19 con una fuerza admirable, nunca perdiendo la esperanza.', NULL),
(32, 'TELLO DELGADO ISIDORO', 'COVID-19', 'ENF MIL (03) - A pesar del COVID-19, mantuvo su compromiso con la vida y la comunidad.', NULL),
(33, 'AREVALO GUTIERREZ BENICIO', 'ENFERMEDAD', 'ENF VET (04) - Enfrentó la enfermedad con coraje, mostrando siempre una actitud positiva y de lucha.', NULL),
(34, 'PEREZ BERRU JOSE', 'ENFERMEDAD', 'ENF VET (04) - Un ejemplo de resistencia, nunca se dio por vencido ante la enfermedad.', NULL),
(35, 'TERAN MIRANDA CESAR PACIFICO', 'ENFERMEDAD', 'ENF VET (04) - Siempre luchando, nunca dejó de ser una fuente de inspiración para los demás.', NULL),
(36, 'RIVERA SANCHEZ FRANCISCO', 'ENFERMEDAD', 'ENF VET (04) - A pesar de la enfermedad, siempre mostró una actitud positiva y de compromiso con los demás.', NULL),
(37, 'FLORES AYALA ROBERTO', 'ACCIDENTE', 'ABASTO (01) - Después del accidente, continuó siendo un ejemplo de esfuerzo y valentía.', NULL),
(38, 'PINEDA SALVADOR MARCO', 'ACCIÓN DE ARMAS', 'MVO (03) - Siempre dispuesto a defender a los demás, demostrando valentía y compromiso con su misión.', NULL),
(39, 'RACHUMI MILLONES JOSE', 'ACCIDENTE', 'MVO (03) - Tras el accidente, nunca perdió la esperanza ni el deseo de seguir adelante.', NULL),
(40, 'YANQUI HUAMAN ARTURO', 'ACCIDENTE', 'MVO (03) - A pesar de las adversidades, su fuerza y coraje lo llevaron a superar cada obstáculo.', NULL),
(41, 'SOLIS VILLAFANI MARCOS JOHNNY', 'COVID-19', 'M/M (01) - Enfrentó el COVID-19 con valentía y resiliencia, demostrando que la unidad nos hace más fuertes.', NULL),
(42, 'SANCHEZ RODRIGUEZ JESÚS LUIS GUILLERMO', 'ENFERMEDAD', 'CARTOGRAFO (01) - Con una actitud admirable ante la enfermedad, nunca dejó de ser una inspiración para los demás.', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

CREATE TABLE `especialidades` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `especialidades`
--

INSERT INTO `especialidades` (`id`, `nombre`, `descripcion`) VALUES
(19, 'Auxiliar de Cartografía', 'Elabora y actualiza mapas militares para la planificación y ejecución de operaciones.'),
(20, 'Enfermero Militar', 'Brinda atención médica al personal militar en diferentes entornos.'),
(21, 'Enfermero Veterinario Militar', 'Atiende la salud de los animales de compañía y de trabajo de la institución militar.'),
(22, 'Auxiliar de Abastecimiento', 'Gestión de almacenamiento, control de suministros y equipos militares.'),
(23, 'Auxiliar de Estado Mayor', 'Apoya en la planificación, coordinación y ejecución de órdenes e unidades militares.'),
(24, 'Instructor Militar', 'Capacita y entrena a personal militar en diversas áreas.'),
(25, 'Mecánico de Armamento', 'Realiza mantenimiento y reparación de armamento ligero y pesado utilizado en operaciones.'),
(26, 'Mecánico de Vehículos a Rueda', 'Mantiene y repara vehículos con tracción a rueda y equipo off-road para su operatividad en el campo.'),
(27, 'Mecánico Electricista Automotriz', 'Realiza mantenimiento, inventario y reparación del sistema eléctrico de vehículos militares.'),
(28, 'Mecánico de Vehículos a Oruga', 'Encargado del mantenimiento y reparación de vehículos blindados y otros sistemas de tracción oruga.'),
(29, 'Mecánico de Comunicaciones Electrónico', 'Encargado de la instalación y mantenimiento de sistemas de comunicación y hardware militar.'),
(30, 'Operador de Comunicaciones', 'Manejo y operación de los instrumentos de transmisión para coordinar las diferentes unidades.'),
(31, 'Operador de Equipo de Ingeniería', 'Opera maquinaria pesada y equipo ingenieril para la construcción y mantenimiento de infraestructuras militares.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_blog`
--

CREATE TABLE `imagenes_blog` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `nombre_imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `imagenes_blog`
--

INSERT INTO `imagenes_blog` (`id`, `blog_id`, `nombre_imagen`) VALUES
(7, 1, '67d8fd62ec41e.jpeg'),
(9, 3, '67d8fd7836799.jpeg'),
(10, 2, '67d9f308910a3.jpeg'),
(11, 1, '67dda2e02b364.jpeg'),
(12, 1, '67dda2e02c5dd.jpeg'),
(13, 1, '67ddd8bc82d2f.jpeg'),
(15, 1, '67ddd9749d9b1.jpeg'),
(16, 1, '67ddd9749e955.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_emprendimientos`
--

CREATE TABLE `imagenes_emprendimientos` (
  `id` int(11) NOT NULL,
  `emprendimiento_id` int(11) NOT NULL,
  `nombre_imagen` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `imagenes_emprendimientos`
--

INSERT INTO `imagenes_emprendimientos` (`id`, `emprendimiento_id`, `nombre_imagen`, `created_at`) VALUES
(5, 2, '67dc39addabe5.jpg', '2025-03-20 15:52:13'),
(6, 4, '67dc3a1079019.jpg', '2025-03-20 15:53:52'),
(8, 2, '67ddeae767e05.jpg', '2025-03-21 22:40:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_en_memoria`
--

CREATE TABLE `imagenes_en_memoria` (
  `id` int(11) NOT NULL,
  `en_memoria_id` int(11) NOT NULL,
  `nombre_imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `imagenes_en_memoria`
--

INSERT INTO `imagenes_en_memoria` (`id`, `en_memoria_id`, `nombre_imagen`) VALUES
(8, 42, '67dda27401b45.jpeg'),
(9, 42, '67dda2740341f.jpeg'),
(10, 42, '67dda274044c8.jpeg'),
(11, 42, '67dda27405a17.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_especialidad`
--

CREATE TABLE `imagenes_especialidad` (
  `id` int(11) NOT NULL,
  `especialidad_id` int(11) NOT NULL,
  `nombre_imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `imagenes_especialidad`
--

INSERT INTO `imagenes_especialidad` (`id`, `especialidad_id`, `nombre_imagen`) VALUES
(13, 19, '67d8cba4dcb87.jpg'),
(14, 23, '67d9f2e87030c.jpeg'),
(26, 23, '67db3ea5a3202.jpeg'),
(27, 23, '67db3ea5a3b40.jpeg'),
(28, 23, '67db3ea5a4187.jpeg'),
(29, 23, '67db3ea5a4c46.jpeg'),
(30, 23, '67db3ea5a573a.jpeg'),
(31, 23, '67db3ea5a5ec6.jpeg'),
(32, 23, '67db3ea5a67ca.jpeg'),
(33, 23, '67db3ea5a70de.jpeg'),
(34, 23, '67db3ea5a7bce.jpeg'),
(35, 23, '67db3ea5a864f.jpeg'),
(36, 23, '67db3ea5a909b.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_logros`
--

CREATE TABLE `imagenes_logros` (
  `id` int(11) NOT NULL,
  `logro_id` int(11) NOT NULL,
  `nombre_imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `imagenes_logros`
--

INSERT INTO `imagenes_logros` (`id`, `logro_id`, `nombre_imagen`) VALUES
(5, 1, 'WhatsApp Image 2025-03-19 at 4.58.57 PM (1).jpeg'),
(6, 2, 'WhatsApp Image 2025-03-19 at 4.58.56 PM.jpeg'),
(7, 1, 'WhatsApp Image 2025-03-19 at 4.59.06 PM.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_miembros`
--

CREATE TABLE `imagenes_miembros` (
  `id` int(11) NOT NULL,
  `miembro_id` int(11) NOT NULL,
  `nombre_imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `imagenes_miembros`
--

INSERT INTO `imagenes_miembros` (`id`, `miembro_id`, `nombre_imagen`) VALUES
(32, 18, '67d8cb36c40cc.png'),
(33, 19, '67d90287464e9.avif'),
(34, 20, '67d9035258ed4.avif'),
(35, 21, '67d9035cb2eed.avif'),
(36, 22, '67d903654d55e.avif'),
(37, 23, '67d90381b4d39.avif'),
(38, 18, '67db4e5f84b3b.jpg'),
(39, 18, '67db4e5f858f9.jpeg'),
(40, 18, '67db4e5f86f8f.jpeg'),
(41, 18, '67db4e5f87d7b.jpeg'),
(42, 18, '67db4e5f88b86.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_noticias`
--

CREATE TABLE `imagenes_noticias` (
  `id` int(11) NOT NULL,
  `noticia_id` int(11) NOT NULL,
  `nombre_imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `imagenes_noticias`
--

INSERT INTO `imagenes_noticias` (`id`, `noticia_id`, `nombre_imagen`) VALUES
(2, 6, '67dc3fbfe165b.jpeg'),
(3, 6, '67dc3fc9d9fd3.jpeg'),
(4, 5, '67dc3fe8cb592.jpeg'),
(5, 4, '67dc40017a94b.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logros`
--

CREATE TABLE `logros` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `subtitulo` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `logros`
--

INSERT INTO `logros` (`id`, `titulo`, `subtitulo`, `descripcion`, `imagen`) VALUES
(1, 'Asesor del Comando General del Ejército (CGE) - Año 2023', 'Pezúa Chávez Jua', 'Con una destacada trayectoria en el ámbito militar, Pezúa Chávez Juan fue designado Asesor del Comando General del Ejército (CGE) en el año 2023. Su conocimiento estratégico y liderazgo han sido fundamentales en la planificación y toma de decisiones clave para fortalecer la operatividad y eficacia de las fuerzas armadas. Su contribución ha dejado una huella importante en la estructura militar, garantizando un desarrollo eficiente en las operaciones y tácticas del Ejército.', 'img/premio.jpg'),
(2, 'Combatiente en el Conflicto del Cenepa - 1995', 'Servicio en la Escuela de Perfeccionamiento del Ejército (EPE)', 'Espericueta Paredes E. es un ejemplo de valentía y sacrificio, habiendo participado activamente en el Conflicto del Cenepa en 1995, defendiendo con honor la soberanía nacional. Su compromiso con la seguridad y la integridad del país lo llevó a prestar servicio en la Escuela de Perfeccionamiento del Ejército (EPE), donde compartió su experiencia y conocimientos con nuevas generaciones de soldados, formando líderes con valores y disciplina.', 'img/logro_diseno.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `miembros`
--

CREATE TABLE `miembros` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `especialidad_id` int(11) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `miembros`
--

INSERT INTO `miembros` (`id`, `nombre`, `descripcion`, `especialidad_id`, `imagen`) VALUES
(18, 'SERNAQUE SILVA JUAN', 'Auxiliar de Cartografia', 19, NULL),
(19, 'SAMANIEGO ASTETE WENSESLAO', 'SAMANIEGO ASTETE WENSESLAO', 19, NULL),
(20, 'COAILA MARCA ANTONIO', 'COAILA MARCA ANTONIO\r\n', 19, NULL),
(21, 'CORAL CASTILLO WADDELL', 'CORAL CASTILLO WADDELL\r\n', 19, NULL),
(22, 'CORAL CASTILLO WADDELL', 'CORAL CASTILLO WADDELL\r\n', 19, NULL),
(23, 'BARREZUEETA MORAN JOSE', 'BARREZUEETA MORAN JOSE\r\n', 19, NULL),
(24, 'LEVANO MARTINEZ HECTOR ULISES', 'Auxiliar de Estado Mayor', 23, NULL),
(25, 'PAIRAZAMAN MONCADA ITALO AGUSTIN', 'Auxiliar de Estado Mayor', 23, NULL),
(26, 'MATIAS SALVADOR AUGUSTO ENRIQUE', 'Auxiliar de Estado Mayor', 23, NULL),
(27, 'SANCHEZ ALBORNOZ JORGE TOBIAS', 'Auxiliar de Estado Mayor', 23, NULL),
(28, 'RAMOS RODRIGUEZ CESAR', 'Auxiliar de Estado Mayor', 23, NULL),
(29, 'ARGUELLES BOCANGEL AMILCAR', 'Auxiliar de Estado Mayor', 23, NULL),
(30, 'MASCARO GONZALES ANGEL', 'Auxiliar de Estado Mayor', 23, NULL),
(31, 'MENDOZA CANTO MAGNO', 'Auxiliar de Estado Mayor', 23, NULL),
(32, 'AREVALO TERRONES JORGE', 'Auxiliar de Estado Mayor', 23, NULL),
(33, 'PALACIOS CHUQICHANCA GERARDO', 'Auxiliar de Estado Mayor', 23, NULL),
(34, 'BAEZ FUENTES JOSE LUIS', 'Auxiliar de Estado Mayor', 23, NULL),
(35, 'HOYOS BOBADILLA NAPOLEON', 'Auxiliar de Estado Mayor', 23, NULL),
(36, 'SANTILLANA JUAREZ VICTOR', 'Auxiliar de Estado Mayor', 23, NULL),
(37, 'CHECA CHAMACHE JORGE ALBERTO', 'Auxiliar de Estado Mayor', 23, NULL),
(38, 'SOSA CIPRIANO PABLO', 'Auxiliar de Estado Mayor', 23, NULL),
(39, 'TRUJILLO APAZA AURELIO', 'Auxiliar de Estado Mayor', 23, NULL),
(40, 'YANGALI DIAZ JOSE', 'Auxiliar de Estado Mayor', 23, NULL),
(41, 'CEBALLOS CASTAÑEDA MARTIN BELTRAN', 'Auxiliar de Estado Mayor', 23, NULL),
(42, 'GONZA MAMANI ALFREDO', 'Auxiliar de Estado Mayor', 23, NULL),
(43, 'COLLANTES ODAR JORGE', 'Auxiliar de Estado Mayor', 23, NULL),
(44, 'MIO ZUNIGA AUGUSTO ALBERTO', 'Auxiliar de Estado Mayor', 23, NULL),
(45, 'CHAVEZ JAUREGUI AMADOR', 'Auxiliar de Estado Mayor', 23, NULL),
(46, 'QUEVEDO MORANTE SANTIAGO', 'Auxiliar de Estado Mayor', 23, NULL),
(47, 'DELGADO PUELLES JORGE', 'Auxiliar de Estado Mayor', 23, NULL),
(48, 'CASTILLO ABRAMONTE CARLOS MIGUEL', 'Auxiliar de Estado Mayor', 23, NULL),
(49, 'VELIZ RIVERA PEDRO ARTURO', 'Auxiliar de Estado Mayor', 23, NULL),
(50, 'RODRIGUEZ HUERTA LUIS', 'Auxiliar de Estado Mayor', 23, NULL),
(51, 'PUELLES CASTRO JOSE', 'Auxiliar de Estado Mayor', 23, NULL),
(52, 'MONTOYA PELAEZ CARLOS JAVIER', 'Auxiliar de Estado Mayor', 23, NULL),
(53, 'VALDIVIA GARCIA VICTOR', 'Auxiliar de Estado Mayor', 23, NULL),
(54, 'SANTILLAN BARDALES ADAN', 'Auxiliar de Estado Mayor', 23, NULL),
(55, 'HUERTA FARFAN JOSE', 'Auxiliar de Estado Mayor', 23, NULL),
(56, 'OLAZABAL SANCHEZ JOSE', 'Auxiliar de Estado Mayor', 23, NULL),
(57, 'PACO FLORES HERMENEGILDO', 'Auxiliar de Estado Mayor', 23, NULL),
(58, 'CALDERON PULIDO HERLEIN', 'Auxiliar de Estado Mayor', 23, NULL),
(59, 'CASTILLO CAMPOS FEDERICO', 'Auxiliar de Estado Mayor', 23, NULL),
(60, 'GANGGINI GARCIA GARIBALDI', 'Auxiliar de Estado Mayor', 23, NULL),
(61, 'ESPINOZA CRUZ JOSE ALFREDO', 'ENFERMERO MILITAR', 20, NULL),
(62, 'NAVIO CHUMPISUCA GILBERTO', 'ENFERMERO MILITAR', 20, NULL),
(63, 'PAXI CASTRO ABDON', 'ENFERMERO MILITAR', 20, NULL),
(64, 'PAREDES HERAS CARLOS HUMBERTO', 'ENFERMERO MILITAR', 20, NULL),
(65, 'PAZ GALLO CARLOS EDUARDO', 'ENFERMERO MILITAR', 20, NULL),
(66, 'BOZA CACHAY PEDRO FABIO', 'ENFERMERO MILITAR', 20, NULL),
(67, 'SALAZAR RIOS JOSE DE LA CRUZ', 'ENFERMERO MILITAR', 20, NULL),
(68, 'YOVERA MARTINEZ WILFREDO', 'ENFERMERO MILITAR', 20, NULL),
(69, 'SALAZAR PALOMINO JORGE ADOLFO', 'ENFERMERO MILITAR', 20, NULL),
(70, 'RAMIREZ SULCA IDELFONSO CECILIO', 'ENFERMERO MILITAR', 20, NULL),
(71, 'MEDRANO CERON SANTIAGO', 'ENFERMERO MILITAR', 20, NULL),
(72, 'BALDEON BUENDIA GUMERCINDO JESUS', 'ENFERMERO MILITAR', 20, NULL),
(73, 'SALDAÑA ABARCA ROMAM SEMINARIO', 'ENFERMERO MILITAR', 20, NULL),
(74, 'SILVA FLORES SALOMON', 'ENFERMERO MILITAR', 20, NULL),
(75, 'ARRISUEÑO HONDERMAN LUIS GUILLERMO', 'ENFERMERO MILITAR', 20, NULL),
(76, 'RAMIREZ QUISPE ROMAN ANDRES', 'ENFERMERO MILITAR', 20, NULL),
(77, 'RIQUEZ ESPIRITU LIBANO CAMILO', 'ENFERMERO MILITAR', 20, NULL),
(78, 'HUERTA JESUS GUILLERMO ESTEBAN', 'ENFERMERO MILITAR', 20, NULL),
(79, 'AVALOS CHUMPITAZ YONY JAVIER', 'ENFERMERO MILITAR', 20, NULL),
(80, 'SANCHEZ ESPINOZA ERIBERTO', 'Enfermero Veterinario Militar', 21, NULL),
(81, 'MORALES DE LA CRUZ FRANCISCO EUSEBIO', 'Enfermero Veterinario Militar', 21, NULL),
(82, 'DAMACEN DIAZ SEGUNDO MAURICIO', 'Enfermero Veterinario Militar', 21, NULL),
(83, 'MEDINA RAYA DANIEL', 'Enfermero Veterinario Militar', 21, NULL),
(84, 'HUAMANI HUAMANI FERNANDO SANTOS', 'Enfermero Veterinario Militar', 21, NULL),
(85, 'RIVERA SANCHEZ FRANCISCO', 'Enfermero Veterinario Militar', 21, NULL),
(86, 'APARICIO ROQUE HELI ANTONIO', 'Enfermero Veterinario Militar', 21, NULL),
(87, 'PEREZ BERRU JOSE', 'Enfermero Veterinario Militar', 21, NULL),
(88, 'TERAN MIRANDA CESAR', 'Enfermero Veterinario Militar', 21, NULL),
(89, 'MORALES FERNANDEZ JUAN', 'Enfermero Veterinario Militar', 21, NULL),
(90, 'TERAN MUÑOZ RAFAEL', 'Enfermero Veterinario Militar', 21, NULL),
(91, 'TORRES MELGAREJO CARLOS JORGE', 'Enfermero Veterinario Militar', 21, NULL),
(92, 'CASTRO LOPEZ WILBER', 'Enfermero Veterinario Militar', 21, NULL),
(93, 'LOPEZ RODRIGUEZ LUIS CARLOS', 'Enfermero Veterinario Militar', 21, NULL),
(94, 'PEREA CACERES OSWALDO', 'Enfermero Veterinario Militar', 21, NULL),
(95, 'CHANCAHUAÑA ALVARADO JOSE FELIX', 'Enfermero Veterinario Militar', 21, NULL),
(96, 'CARRASCO ALVAN JUAN', 'Enfermero Veterinario Militar', 21, NULL),
(97, 'CENTENO QUISPE TOBIAS', 'Enfermero Veterinario Militar', 21, NULL),
(98, 'AREVALO GUTIERREZ BENICIO', 'Enfermero Veterinario Militar', 21, NULL),
(99, 'USURIN LEON JOHN ROBERT', 'AUXILIAR DE ABASTECIMIENTO', 22, NULL),
(100, 'CHAVEZ RUIZ JUSTO', 'AUXILIAR DE ABASTECIMIENTO', 22, NULL),
(101, 'TORRES UCHUYA MANUEL', 'AUXILIAR DE ABASTECIMIENTO', 22, NULL),
(102, 'GALVEZ LOPEZ RUBEN', 'AUXILIAR DE ABASTECIMIENTO', 22, NULL),
(103, 'RUBIÑOS SOLANO HECTOR', 'AUXILIAR DE ABASTECIMIENTO', 22, NULL),
(104, 'AYALA QUISPE PRISCILO', 'AUXILIAR DE ABASTECIMIENTO', 22, NULL),
(105, 'SIU ALVARADO JOSE', 'AUXILIAR DE ABASTECIMIENTO', 22, NULL),
(106, 'SALAZAR ANTON JESUS', 'AUXILIAR DE ABASTECIMIENTO', 22, NULL),
(107, 'SALAS ASCENCIO RIGOBERTO', 'AUXILIAR DE ABASTECIMIENTO', 22, NULL),
(108, 'MUÑOZ SOLANO RICHARD BENNY', 'AUXILIAR DE ABASTECIMIENTO', 22, NULL),
(109, 'CASAVERDE AYQUIPA CLAUDIO', 'AUXILIAR DE ABASTECIMIENTO', 22, NULL),
(110, 'HIPOLITO SANTOS MANUEL', 'AUXILIAR DE ABASTECIMIENTO', 22, NULL),
(111, 'CANDIOTTI BALTAZAR MAURO ERNESTO', 'AUXILIAR DE ABASTECIMIENTO', 22, NULL),
(112, 'GARCES GOMEZ DIONISIO JAVIER', 'AUXILIAR DE ABASTECIMIENTO', 22, NULL),
(113, 'MONJE AGUILAR LUIS ARTURO', 'AUXILIAR DE ABASTECIMIENTO', 22, NULL),
(114, 'MEDINA ESCOBAR LUIS GREGORIO', 'AUXILIAR DE ABASTECIMIENTO', 22, NULL),
(115, 'SANCHEZ ALVARADO MANUEL', 'AUXILIAR DE ABASTECIMIENTO', 22, NULL),
(116, 'OCHOA MURILLO LUIS ENRIQUE', 'AUXILIAR DE ABASTECIMIENTO', 22, NULL),
(117, 'MALDONADO BERRÚ LUIS ALBERTO', 'AUXILIAR DE ABASTECIMIENTO', 22, NULL),
(118, 'CRUZ MONZON FERNANDO ALBERTO', 'AUXILIAR DE ABASTECIMIENTO', 22, NULL),
(119, 'FUENTES PACHAS ROBERTO BENITO', 'AUXILIAR DE ABASTECIMIENTO', 22, NULL),
(120, 'PALOMINO DOMINGUEZ MAXIMO ALEJANDRO', 'AUXILIAR DE ABASTECIMIENTO', 22, NULL),
(121, 'HUAMANI SOTOMAYOR EDGARD', 'AUXILIAR DE ABASTECIMIENTO', 22, NULL),
(122, 'PALOMINO GALAN MOISES', 'AUXILIAR DE ABASTECIMIENTO', 22, NULL),
(123, 'LLAMOCA GUILLEN MAXIMO', 'AUXILIAR DE ABASTECIMIENTO', 22, NULL),
(124, 'LOPEZ ESCALANTE LUIS', 'AUXILIAR DE ABASTECIMIENTO', 22, NULL),
(125, 'RODRIGUEZ MALDONADO FABIO TEODULO', 'AUXILIAR DE ABASTECIMIENTO', 22, NULL),
(126, 'FLORES AYALA ROBERTO', 'AUXILIAR DE ABASTECIMIENTO', 22, NULL),
(127, 'VILLALOBOS GUTIERREZ JORGE NAPOLEON', 'AUXILIAR DE ABASTECIMIENTO', 22, NULL),
(128, 'ZAMBRANO MARTINEZ VICTOR', 'AUXILIAR DE ABASTECIMIENTO', 22, NULL),
(129, 'HERNANDEZ SANGAY JOSE LUIS', 'AUXILIAR DE ABASTECIMIENTO', 22, NULL),
(130, 'SIPION CAMPOS ANTONIO', 'AUXILIAR DE ABASTECIMIENTO', 22, NULL),
(131, 'VIGIL CHUQUIBALQUI EDGARD', 'AUXILIAR DE ABASTECIMIENTO', 22, NULL),
(132, 'CASTILLO YUNQUE JESUS SALOMON', 'AUXILIAR DE ABASTECIMIENTO', 22, NULL),
(133, 'GALARZA FIERRO RICHARD WILLIAM', 'AUXILIAR DE ABASTECIMIENTO', 22, NULL),
(134, 'ARROYO BRAVO JHONY', 'AUXILIAR DE ABASTECIMIENTO', 22, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `miembros_emprendimientos`
--

CREATE TABLE `miembros_emprendimientos` (
  `miembro_id` int(11) NOT NULL,
  `emprendimiento_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nosotros`
--

CREATE TABLE `nosotros` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `subtitulo` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `descripcion2` text DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `nosotros`
--

INSERT INTO `nosotros` (`id`, `titulo`, `subtitulo`, `descripcion`, `descripcion2`, `imagen`) VALUES
(1, 'Historia de la Promoción', 'Defender la soberanía, la independencia, la integridad territorial y el orden constitucional...', 'En 1986, un grupo de jóvenes inició su formación militar con el nombre de Cabo Alberto Reyes Gamarra, destacándose por su disciplina, entrega y espíritu de hermandad. Durante su entrenamiento, enfrentaron desafíos físicos y mentales, fortaleciendo sus habilidades y compromiso con la institución. Su preparación rigurosa los convirtió en soldados ejemplares, listos para cumplir con honor su deber.', 'A lo largo de los años, los integrantes de esta promoción dejaron huella en la historia militar, participando en diversas misiones y contribuyendo al fortalecimiento de la seguridad nacional. Su legado de sacrificio y patriotismo sigue inspirando a las nuevas generaciones de soldados, manteniendo viva la esencia de su promoción.', 'nosotros123.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `subtitulo` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `subtitulo`, `descripcion`, `imagen`) VALUES
(4, 'Innovación y Sostenibilidad: Negocios que Cuidan el Planeta', 'Emprendimientos ecológicos que marcan la diferencia', 'La sostenibilidad se ha convertido en el eje central de un nuevo emprendimiento que busca transformar el consumo responsable. Con un enfoque ecológico, esta iniciativa ofrece productos reutilizables, biodegradables y hechos con materiales reciclados, con el objetivo de reducir el impacto ambiental y fomentar hábitos más conscientes. Desde empaques libres de plástico hasta moda sostenible, este negocio demuestra que es posible generar un cambio positivo sin comprometer la calidad ni la innovación. Su compromiso con el planeta y la comunidad los posiciona como un referente en el mercado de productos ecológicos.\r\n\r\n', 'img/noticia_web.jpg'),
(5, 'Emprendimiento y Deporte: Un Nuevo Espacio para el Bienestar', 'Fomentando la actividad física y el emprendimiento local', 'El deporte y el emprendimiento se unen en una nueva iniciativa que busca fomentar la actividad física y el bienestar en la comunidad. Este proyecto nace de la pasión de un grupo de jóvenes emprendedores que han diseñado un centro deportivo con espacios modernos, entrenamientos personalizados y programas de nutrición enfocados en mejorar la calidad de vida. Con clases grupales, asesoramiento profesional y tecnología de última generación, este centro promete ser el punto de encuentro para quienes buscan un estilo de vida más saludable y activo.\r\n\r\n', 'img/noticia_fotografia.jpg'),
(6, 'Celebramos Nuestro Aniversario con Nuevas Oportunidades', 'Un año de logros, crecimiento y nuevos retos', 'Este mes marca un hito importante para nuestro emprendimiento: ¡celebramos nuestro aniversario! Ha sido un año de crecimiento, aprendizaje y grandes logros, en el que hemos consolidado nuestra presencia en el mercado gracias al apoyo de nuestra comunidad. Para conmemorar esta ocasión especial, hemos preparado una serie de sorpresas, descuentos exclusivos y nuevos lanzamientos que reflejan nuestro compromiso con la innovación y la excelencia. Estamos emocionados por lo que vendrá y agradecidos por cada persona que ha formado parte de este viaje.', 'img/noticia_emprendimiento.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_2025`
--

CREATE TABLE `registro_2025` (
  `id` int(11) NOT NULL,
  `numero_orden` int(11) DEFAULT NULL,
  `apellido_nombre` varchar(255) DEFAULT NULL,
  `ene` decimal(15,2) DEFAULT NULL,
  `feb` decimal(15,2) DEFAULT NULL,
  `mar` decimal(15,2) DEFAULT NULL,
  `abr` decimal(15,2) DEFAULT NULL,
  `may` decimal(15,2) DEFAULT NULL,
  `jun` decimal(15,2) DEFAULT NULL,
  `jul` decimal(15,2) DEFAULT NULL,
  `ago` decimal(15,2) DEFAULT NULL,
  `sep` decimal(15,2) DEFAULT NULL,
  `oct` decimal(15,2) DEFAULT NULL,
  `nov` decimal(15,2) DEFAULT NULL,
  `dic` decimal(15,2) DEFAULT NULL,
  `deuda_2025` decimal(15,2) DEFAULT NULL,
  `deuda_2024` decimal(15,2) DEFAULT NULL,
  `deuda_2023` decimal(15,2) DEFAULT NULL,
  `deuda_2022` decimal(15,2) DEFAULT NULL,
  `deuda_2021` decimal(15,2) DEFAULT NULL,
  `otros_deudas` decimal(15,2) DEFAULT NULL,
  `lugar` varchar(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registro_2025`
--

INSERT INTO `registro_2025` (`id`, `numero_orden`, `apellido_nombre`, `ene`, `feb`, `mar`, `abr`, `may`, `jun`, `jul`, `ago`, `sep`, `oct`, `nov`, `dic`, `deuda_2025`, `deuda_2024`, `deuda_2023`, `deuda_2022`, `deuda_2021`, `otros_deudas`, `lugar`, `fecha`) VALUES
(1, 1, 'Juan Pérez', 1000.00, 1100.00, 1050.00, 950.00, 1200.00, 1250.00, 1150.00, 1300.00, 1350.00, 1400.00, 1450.00, 1500.00, 5000.00, 4500.00, 4000.00, 3500.00, 3000.00, 2000.00, 'Lima', '2023-12-15'),
(2, 2, 'María García', 1500.00, 1400.00, 1350.00, 1250.00, 1300.00, 1100.00, 1200.00, 1150.00, 1100.00, 1050.00, 1000.00, 950.00, 4000.00, 3800.00, 3600.00, 3400.00, 3000.00, 1500.00, 'Arequipa', '2023-11-10');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `carrusel`
--
ALTER TABLE `carrusel`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `deuda_registros`
--
ALTER TABLE `deuda_registros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `emprendimientos`
--
ALTER TABLE `emprendimientos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `en_memoria`
--
ALTER TABLE `en_memoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagenes_blog`
--
ALTER TABLE `imagenes_blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_id` (`blog_id`);

--
-- Indices de la tabla `imagenes_emprendimientos`
--
ALTER TABLE `imagenes_emprendimientos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emprendimiento_id` (`emprendimiento_id`);

--
-- Indices de la tabla `imagenes_en_memoria`
--
ALTER TABLE `imagenes_en_memoria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `en_memoria_id` (`en_memoria_id`);

--
-- Indices de la tabla `imagenes_especialidad`
--
ALTER TABLE `imagenes_especialidad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `especialidad_id` (`especialidad_id`);

--
-- Indices de la tabla `imagenes_logros`
--
ALTER TABLE `imagenes_logros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `logro_id` (`logro_id`);

--
-- Indices de la tabla `imagenes_miembros`
--
ALTER TABLE `imagenes_miembros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `miembro_id` (`miembro_id`);

--
-- Indices de la tabla `imagenes_noticias`
--
ALTER TABLE `imagenes_noticias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `noticia_id` (`noticia_id`);

--
-- Indices de la tabla `logros`
--
ALTER TABLE `logros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `miembros`
--
ALTER TABLE `miembros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `especialidad_id` (`especialidad_id`);

--
-- Indices de la tabla `miembros_emprendimientos`
--
ALTER TABLE `miembros_emprendimientos`
  ADD PRIMARY KEY (`miembro_id`,`emprendimiento_id`),
  ADD KEY `emprendimiento_id` (`emprendimiento_id`);

--
-- Indices de la tabla `nosotros`
--
ALTER TABLE `nosotros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registro_2025`
--
ALTER TABLE `registro_2025`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `carrusel`
--
ALTER TABLE `carrusel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `deuda_registros`
--
ALTER TABLE `deuda_registros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `emprendimientos`
--
ALTER TABLE `emprendimientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `en_memoria`
--
ALTER TABLE `en_memoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `imagenes_blog`
--
ALTER TABLE `imagenes_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `imagenes_emprendimientos`
--
ALTER TABLE `imagenes_emprendimientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `imagenes_en_memoria`
--
ALTER TABLE `imagenes_en_memoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `imagenes_especialidad`
--
ALTER TABLE `imagenes_especialidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `imagenes_logros`
--
ALTER TABLE `imagenes_logros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `imagenes_miembros`
--
ALTER TABLE `imagenes_miembros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `imagenes_noticias`
--
ALTER TABLE `imagenes_noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `logros`
--
ALTER TABLE `logros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `miembros`
--
ALTER TABLE `miembros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT de la tabla `nosotros`
--
ALTER TABLE `nosotros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `registro_2025`
--
ALTER TABLE `registro_2025`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `imagenes_blog`
--
ALTER TABLE `imagenes_blog`
  ADD CONSTRAINT `imagenes_blog_ibfk_1` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `imagenes_emprendimientos`
--
ALTER TABLE `imagenes_emprendimientos`
  ADD CONSTRAINT `imagenes_emprendimientos_ibfk_1` FOREIGN KEY (`emprendimiento_id`) REFERENCES `emprendimientos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `imagenes_en_memoria`
--
ALTER TABLE `imagenes_en_memoria`
  ADD CONSTRAINT `imagenes_en_memoria_ibfk_1` FOREIGN KEY (`en_memoria_id`) REFERENCES `en_memoria` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `imagenes_especialidad`
--
ALTER TABLE `imagenes_especialidad`
  ADD CONSTRAINT `imagenes_especialidad_ibfk_1` FOREIGN KEY (`especialidad_id`) REFERENCES `especialidades` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `imagenes_logros`
--
ALTER TABLE `imagenes_logros`
  ADD CONSTRAINT `imagenes_logros_ibfk_1` FOREIGN KEY (`logro_id`) REFERENCES `logros` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `imagenes_miembros`
--
ALTER TABLE `imagenes_miembros`
  ADD CONSTRAINT `imagenes_miembros_ibfk_1` FOREIGN KEY (`miembro_id`) REFERENCES `miembros` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `imagenes_noticias`
--
ALTER TABLE `imagenes_noticias`
  ADD CONSTRAINT `imagenes_noticias_ibfk_1` FOREIGN KEY (`noticia_id`) REFERENCES `noticias` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `miembros`
--
ALTER TABLE `miembros`
  ADD CONSTRAINT `miembros_ibfk_1` FOREIGN KEY (`especialidad_id`) REFERENCES `especialidades` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `miembros_emprendimientos`
--
ALTER TABLE `miembros_emprendimientos`
  ADD CONSTRAINT `miembros_emprendimientos_ibfk_1` FOREIGN KEY (`miembro_id`) REFERENCES `miembros` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `miembros_emprendimientos_ibfk_2` FOREIGN KEY (`emprendimiento_id`) REFERENCES `emprendimientos` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
