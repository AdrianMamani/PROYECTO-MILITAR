-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-05-2025 a las 00:34:11
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `promocion`
--

-- --------------------------------------------------------

CREATE TABLE `carrusel_img` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,                -- ID único por imagen
  `img` VARCHAR(300) NOT NULL,                         -- Ruta o nombre de la imagen
  `fecha_subida` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,  -- Fecha de subida automática
  PRIMARY KEY (`id`)                                   -- Llave primaria
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `carrusel_img` (`id`, `img`, `fecha_subida`) VALUES
(1, '68299077c86e3_b5275b14-5c6d-481d-aedf-098e1de58db7.jpg', '2025-05-18 06:41:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrusel_name`
--

CREATE TABLE `carrusel_name` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carrusel_name`
--

INSERT INTO `carrusel_name` (`id`, `titulo`, `descripcion`) VALUES
(1, 'CABO ALBERTO REYES GAMARRA', 'La promoción CABO ALBERTO REYES GAMARRA representa el compromiso, la lealtad y la entrega al servicio militar.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emprendimiento`
--

CREATE TABLE `emprendimiento` (
  `id` int(11) NOT NULL,
  `nombre_emprendimiento` varchar(255) NOT NULL,
  `contacto` varchar(255) NOT NULL,
  `ubicacion` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `subdescripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `emprendimiento`
--

INSERT INTO `emprendimiento` (`id`, `nombre_emprendimiento`, `contacto`, `ubicacion`, `descripcion`, `subdescripcion`) VALUES
(2, 'Clave 7 Buses & Camiones', 'aa', 'aa', 'aaa', 'aaa'),
(3, 'Market Donna', 'servicioalcliente@corporaciondonna.com', 'Calle Los Tulipanes Ex fundo de carapongo lote 1, Lurigancho, Peru', 'Todo lo que necesitas para el menú de tu familia', 'Bienvenido a la página oficial de Market Donna, tu mercado de confianza donde encontrarás productos frescos y de calidad para preparar los mejores platillos para tu familia. Desde frutas y verduras hasta carnes, abarrotes y productos de limpieza, todo en un solo lugar para tu comodidad.');

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
(1, 'Auxiliar de Cartografía', 'Elabora y actualiza mapas militares para la planificación y ejecución de operaciones.'),
(2, 'Enfermero Militar', 'Brinda atención médica al personal militar en diferentes entornos.'),
(3, 'Enfermero Veterinario Militar', 'Atiende la salud de los animales de compañía y de trabajo de la institución militar.'),
(4, 'Auxiliar de Abastecimiento', 'Gestión de almacenamiento, control de suministros y equipos militares.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `descripcion` text NOT NULL,
  `direccion` text DEFAULT NULL,
  `latitud` varchar(20) DEFAULT NULL,
  `longitud` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `titulo`, `fecha`, `descripcion`, `direccion`, `latitud`, `longitud`) VALUES
(2, 'Feliz Dia de las Madres - Promocion CABO ALBERTO', '2025-05-11', 'Hoy rendimos homenaje a las mujeres que nos dieron la vida, nos criaron con esfuerzo, sacrificio y amor incondicional, a esas madres que, con cada paso que dimos en nuestro camino militar, estuvieron presentes con su apoyo silencioso, sus oraciones constantes y su orgullo firme, gracias, madres, por ser el pilar invisible que nos sostuvo en cada formación, en cada guardia, en cada reto superado. Pero hoy también queremos reconocer con profundo respeto y admiración a quienes, dentro de esta misma promoción, tienen el doble honor y desafío de ser madres y militares, mujeres valientes que no sólo portan con orgullo el uniforme, sino que también llevan en el corazón la fuerza y ternura de una madre, su ejemplo de entrega, equilibrio y fortaleza nos inspira a diario. En este Día de la Madre, elevamos nuestra gratitud a todas ustedes, madres de nuestros compañeros y compañeras, y compañeras que también son madres, que la vida les devuelva con creces todo lo que han dado.  ¡Feliz Día de la Madre!', 'Avenida 28 de Julio, 22 de Octubre, Carmen de la Legua Reynoso, Carmen de La Legua-Reynoso, Callao, Lima Metropolitana, Callao, 07006, Perú', '-12.045196', '-77.095198'),
(3, 'CABO ALBERTO REYES GAMARRA', '2025-06-15', 'Homenaje a todas las esposas de los integrantes de la promoción ARG por el Día Internacional de la Mujer', 'Jirón Pataz, Rímac, Lima, Lima Metropolitana, Lima, 15093, Perú', '-12.041419', '-77.025576');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_emprendimiento`
--

CREATE TABLE `imagenes_emprendimiento` (
  `id` int(11) NOT NULL,
  `emprendimiento_id` int(11) NOT NULL,
  `nombre_imagen` varchar(255) NOT NULL,
  `fecha_subida` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `imagenes_emprendimiento`
--

INSERT INTO `imagenes_emprendimiento` (`id`, `emprendimiento_id`, `nombre_imagen`, `fecha_subida`) VALUES
(3, 2, '1748367037_67dc3a1079019.jpg', '2025-05-27 17:30:37'),
(4, 3, '1748367205_67dc39addabe5.jpg', '2025-05-27 17:33:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_especialidad`
--

CREATE TABLE `imagenes_especialidad` (
  `id` int(11) NOT NULL,
  `especialidad_id` int(11) NOT NULL,
  `nombre_imagen` varchar(255) NOT NULL,
  `fecha_subida` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `imagenes_especialidad`
--

INSERT INTO `imagenes_especialidad` (`id`, `especialidad_id`, `nombre_imagen`, `fecha_subida`) VALUES
(1, 1, 'uploads/especialidades/1747553626_mecanicodearmamento.webp', '2025-05-18 07:30:50'),
(2, 2, 'uploads/especialidades/1748367968_enfermeromilitar.webp', '2025-05-27 17:46:08'),
(3, 3, 'uploads/especialidades/1748466319_enfermerocanino.webp', '2025-05-28 21:05:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_usuario`
--

CREATE TABLE `imagenes_usuario` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `nombre_imagen` varchar(255) NOT NULL,
  `fecha_subida` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nosotros`
--

CREATE TABLE `nosotros` (
  `id` int(11) NOT NULL,
  `titulo` varchar(500) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `mision` varchar(500) NOT NULL,
  `vision` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `nosotros`
--

INSERT INTO `nosotros` (`id`, `titulo`, `descripcion`, `mision`, `vision`) VALUES
(1, 'Prueba ', 'En 1986, un grupo de jóvenes inició su formación militar con el nombre de Cabo Alberto Reyes Gamarra, destacándose por su disciplina, entrega y espíritu de hermandad. Durante su entrenamiento, enfrentaron desafíos físicos y mentales, fortaleciendo sus habilidades y compromiso con la institución. Su preparación rigurosa los convirtió en soldados ejemplares, listos para cumplir con honor su deber.\r\n\r\nA lo largo de los años, los integrantes de esta promoción dejaron huella en la historia militar, participando en diversas misiones y contribuyendo al fortalecimiento de la seguridad nacional. Su legado de sacrificio y patriotismo sigue inspirando a las nuevas generaciones de soldados, manteniendo viva la esencia de su promoción.', 'Nuestra misión es proporcionar formación de excelencia, desarrollando profesionales íntegros y comprometidos con los valores de honor, disciplina y servicio a la nación.', 'Ser reconocidos como una institución líder en la formación de profesionales de alto nivel, contribuyendo al desarrollo y seguridad del país a través de la excelencia educativa y el compromiso con la sociedad.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nosotros_galeria`
--

CREATE TABLE `nosotros_galeria` (
  `id` int(11) NOT NULL,
  `nombre_imagen` varchar(255) NOT NULL,
  `fecha_subida` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nosotros_video`
--

CREATE TABLE `nosotros_video` (
  `id` int(11) NOT NULL,
  `url_video` varchar(255) NOT NULL,
  `fecha_subida` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `nosotros_video`
--

INSERT INTO `nosotros_video` (`id`, `url_video`, `fecha_subida`) VALUES
(1, 'qLuw_eNm2fQ', '2025-05-18 07:03:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `especialidad_id` int(11) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `estado_vivo` tinyint(1) NOT NULL DEFAULT 1,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_administrador`
--

CREATE TABLE `usuarios_administrador` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `contraseña` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios_administrador`
--

INSERT INTO `usuarios_administrador` (`id`, `nombre`, `correo`, `contraseña`) VALUES
(1, 'admin', 'sebas.18.quispe@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_fallecidos`
--

CREATE TABLE `usuarios_fallecidos` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `motivo_fallecimiento` text NOT NULL,
  `fecha_fallecimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videos_usuario`
--

CREATE TABLE `videos_usuario` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `codigo_video` varchar(11) NOT NULL,
  `fecha_subida` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrusel_img`
--
ALTER TABLE `carrusel_img`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `carrusel_name`
--
ALTER TABLE `carrusel_name`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `emprendimiento`
--
ALTER TABLE `emprendimiento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagenes_emprendimiento`
--
ALTER TABLE `imagenes_emprendimiento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emprendimiento_id` (`emprendimiento_id`);

--
-- Indices de la tabla `imagenes_especialidad`
--
ALTER TABLE `imagenes_especialidad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `especialidad_id` (`especialidad_id`);

--
-- Indices de la tabla `imagenes_usuario`
--
ALTER TABLE `imagenes_usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `nosotros_galeria`
--
ALTER TABLE `nosotros_galeria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `nosotros_video`
--
ALTER TABLE `nosotros_video`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `especialidad_id` (`especialidad_id`);

--
-- Indices de la tabla `usuarios_administrador`
--
ALTER TABLE `usuarios_administrador`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `usuarios_fallecidos`
--
ALTER TABLE `usuarios_fallecidos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `videos_usuario`
--
ALTER TABLE `videos_usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrusel_img`
--
ALTER TABLE `carrusel_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `carrusel_name`
--
ALTER TABLE `carrusel_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `emprendimiento`
--
ALTER TABLE `emprendimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `imagenes_emprendimiento`
--
ALTER TABLE `imagenes_emprendimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `imagenes_especialidad`
--
ALTER TABLE `imagenes_especialidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `imagenes_usuario`
--
ALTER TABLE `imagenes_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `nosotros_galeria`
--
ALTER TABLE `nosotros_galeria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `nosotros_video`
--
ALTER TABLE `nosotros_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios_administrador`
--
ALTER TABLE `usuarios_administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios_fallecidos`
--
ALTER TABLE `usuarios_fallecidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `videos_usuario`
--
ALTER TABLE `videos_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `imagenes_emprendimiento`
--
ALTER TABLE `imagenes_emprendimiento`
  ADD CONSTRAINT `imagenes_emprendimiento_ibfk_1` FOREIGN KEY (`emprendimiento_id`) REFERENCES `emprendimiento` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `imagenes_especialidad`
--
ALTER TABLE `imagenes_especialidad`
  ADD CONSTRAINT `imagenes_especialidad_ibfk_1` FOREIGN KEY (`especialidad_id`) REFERENCES `especialidades` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `imagenes_usuario`
--
ALTER TABLE `imagenes_usuario`
  ADD CONSTRAINT `imagenes_usuario_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`especialidad_id`) REFERENCES `especialidades` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `usuarios_fallecidos`
--
ALTER TABLE `usuarios_fallecidos`
  ADD CONSTRAINT `usuarios_fallecidos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `videos_usuario`
--
ALTER TABLE `videos_usuario`
  ADD CONSTRAINT `videos_usuario_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
