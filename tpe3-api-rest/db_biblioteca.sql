-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-10-2024 a las 00:18:19
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
-- Base de datos: `db_biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `ID_genero` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Descripcion` text NOT NULL,
  `Relacionado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`ID_genero`, `Nombre`, `Descripcion`, `Relacionado`) VALUES
(1, 'Ciencia ficcion', 'Es un género especulativo que relata acontecimientos posibles desarrollados en un marco imaginario, cuya verosimilitud se fundamenta narrativamente en los campos de las ciencias físicas, naturales y sociales. La acción puede girar en torno a un abanico grande de posibilidades (viajes interestelares, conquista del espacio, consecuencias de una hecatombe terrestre o cósmica, evolución humana a causa de mutaciones, evolución de los robots, realidad virtual, civilizaciones alienígenas, etc.). Esta acción puede tener lugar en un tiempo pasado, presente o futuro, o, incluso, en tiempos alternativos ajenos a la realidad conocida, y tener por escenario espacios físicos (reales o imaginarios, terrestres o extraterrestres) o el espacio interno de la mente. Los personajes son igualmente diversos: a partir del patrón natural humano, recorre y explota modelos antropomórficos hasta desembocar en la creación de entidades artificiales de forma humana (robot, androide, cíborg) o en criaturas no antropomórficas., ', 'Fantasia y Terror'),
(2, 'Fantasia', 'Lo fantástico se diferencia de otras dos formas parecidas que son lo maravilloso y lo insólito, definiendo más bien las propiedades del primero por oposición al fantástico que las del segundo. La diferencia radicaría en que el cuento de hadas(prototipo de lo maravilloso para el escritor) permite racionalizar los elementos sobrenaturales mientras que el verdadero fantástico permanece en una zona de ambivalencia entre respuestas netamente racionales y respuestas sobrenaturales explicadas al lector.', 'Terror y Ciencia ficcion'),
(3, 'Terror', 'La literatura de terror es un género de ficción literario que pretende o tiene la capacidad de asustar, causar miedo o aterrorizar sus lectores o espectadores e inducir sentimientos de horror y terror. El terror puede ser sobrenatural o no sobrenatural. A menudo, la amenaza central de una obra de ficción de terror puede interpretarse como una metáfora de los grandes temores de una sociedad. ', 'Fantasia y Ciencia ficcion'),
(4, 'Policial', 'El protagonista suele ser un investigador privado o detective, periodista, o abogado que investigan un hecho o una serie de acontecimientos que se han producido entrevistándose con los personajes implicados o examinando las pruebas e indicios que han quedado del crimen.Es un género tan moderno como la misma narrativa de ciencia ficción y se desarrolló, como ella, para responder a una demanda sociocultural concreta durante los siglos XIX y XX.', 'Realista'),
(5, 'Romance', 'La historia se centra en la relación y el amor romántico que surge entre dos seres humanos. El conflicto en el libro se centra en la historia de amor. El clímax en el libro resuelve la historia de amor. El final de la historia debe ser positivo, dejando al lector que crea que el amor entre los protagonistas y su relación perdurará por el resto de sus vidas.\r\nLas históricas y contemporáneas, además se han ramificado y mezclado con otros géneros literarios variados como la ciencia ficción y la fantasía.', 'Fantasia y Ciencia ficcion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `ID_libro` int(11) NOT NULL,
  `Titulo` varchar(50) NOT NULL,
  `Autor` varchar(30) NOT NULL,
  `Reseña` text NOT NULL,
  `Año` int(11) NOT NULL,
  `ID_genero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`ID_libro`, `Titulo`, `Autor`, `Reseña`, `Año`, `ID_genero`) VALUES
(25, '¿Jugamos?', 'Writer Rain', 'No es conveniente provocar al mal, aunque éste se presente como un simple juego. Víctor Stelling tuvo que aprender ésto de la peor forma posible cuando accedió a jugar a las escondidas con quien no debía por culpa de una apuesta con su mejor amigo. Se dará cuenta demasiado tarde que nada es lo que parece y tendrá que enfrentarse cara a cara contra un ente demoníaco que lo buscará para matarlo y a sus demás compañeros.', 2019, 3),
(26, 'Orgullo y prejuicio', 'Jane Austen', 'Orgullo y prejuicio narra cómo Elizabeth Bennet y Fitzwilliam Darcy se enfrentan a sus prejuicios movidos por el amor que, contra pronóstico, surge entre ellos. Es una verdad reconocida universalmente que a todo hombre soltero que posee una gran fortuna le hace falta una esposa.', 1813, 5),
(27, 'La casa Neville: la formidable señorita Manon', 'Florencia Bonelli', 'Primera entrega de la saga histórico-romántica «La Casa Neville»: un thriller en el que incluso amar puede costarte la vida.\r\nCorre el año 1833 y la Casa Neville, ubicada en el corazón de la City de Londres, se erige como el banco más importante del Reino Unido, incluso de Europa, con una influencia indiscutible sobre países y monarcas, empresarios y banqueros.\r\nY, sin embargo, lo que asombra al mundo es que esa potencia financiera esté a cargo de Manon, la hija menor de la familia Neville. De gran inteligencia y carácter decidido, la joven se verá envuelta en una peligrosa red de intrigas y ambiciones desmedidas, traiciones y alianzas, en la que, a veces, le resultará difícil distinguir amigos de enemigos. En la titánica tarea de proteger a sus seres queridos y preservar el patrimonio familiar, que se extenderá por escenarios tan distantes como China y el Río de la Plata, será su amor secreto por Alexander Blackraven, conde de Stoneville, lo que la sostendrá en la lucha, aun cuando amarlo ponga en riesgo sus vidas.\r\nLa Casa Neville. La formidable señorita Manon es la primera parte de una nueva saga histórico-romántica de Florencia Bonelli.\r\nEste thriller electrizante fascinará por igual a los lectores y a las lectoras que la siguen desde siempre y a quienes se acerquen por primera vez a la magia de su imaginación y su escritura.\r\n', 2023, 5),
(34, 'It (eso)', 'Stephen King', 'Tras veintisiete años de tranquilidad y lejanía, una antigua promesa infantil les hace volver al lugar en el que vivieron su infancia y juventud como una terrible pesadilla. Regresan a Derry para enfrentarse con su pasado y enterrar definitivamente la amenaza que los amargó durante su niñez.', 1986, 3),
(35, 'A sangre fría', 'Truman Capote', 'A sangre fría narra el brutal asesinato de los cuatro miembros de una familia de Kansas. En 1959, un violento crimen sacudió la tranquila vida de Holcomb, Kansas. La sociedad estadounidense de aquellos años quedó conmocionada por un crimen que sugería que cualquiera podía morir asesinado en cualquier momento.', 1966, 4),
(36, 'Los crímenes de la calle Morgue', 'Edgar Allan Poe', 'El asesinato de una madre y su hija ha sacudido a la sociedad parisina decimonónica debido a la crueldad con que fue cometido el crimen, pero sobre todo porque la policía ha sido incapaz de encontrar al asesino a pesar de haber entrevistado a numerosos testigos.', 1841, 4),
(37, 'Harry Potter y la piedra filosofal', 'J.K. Rowling', 'Harry Potter se ha quedado huérfano y vive en casa de sus abominables tíos y del insoportable primo Dudley. Se siente muy triste y solo, hasta que un buen día recibe una carta que cambiará su vida para siempre. En ella le comunican que ha sido aceptado como alumno en el colegio interno Hogwarts de magia y hechicería.', 1997, 2),
(38, 'La invención de Morel', 'Adolfo Bioy Casares', 'La invención de Morel narra la historia de un fugitivo que llega a una isla aparentemente desierta tras una plaga de enfermedades en la cual acaba encontrando a un grupo de personas que lleva una vida de constante reiteración.', 1940, 1),
(39, 'Los juegos del hambre', 'Suzanne Collins', 'Un pasado de guerras ha dejado los 12 distritos que dividen Panem bajo el poder tiránico del “Capitolio”. Sin libertad y en la pobreza, nadie puede salir de los límites de su distrito. Sólo una chica de 16 años, Katniss Everdeen, osa desafiar las normas para conseguir comida.', 2008, 1),
(40, 'El señor de los anillos ', 'J.R.R. Tolkien', 'La novela narra el viaje del protagonista principal, Frodo Bolsón, hobbit de la Comarca, para destruir el Anillo Único y la consiguiente guerra que provocará el enemigo para recuperarlo, ya que es la principal fuente de poder de su creador, el señor oscuro Sauron.', 1954, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID_usuario` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `contraseña` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_usuario`, `usuario`, `contraseña`) VALUES
(4, 'webadmin', '$2y$10$pgZ0tXFYMVQld72wT1UuUuudXuHKXbZgu5AEDCBwhGFgb/BnKFuvC');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`ID_genero`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`ID_libro`),
  ADD KEY `ID_genero` (`ID_genero`) USING BTREE;

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_usuario`),
  ADD UNIQUE KEY `email` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `ID_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`ID_genero`) REFERENCES `genero` (`ID_genero`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
