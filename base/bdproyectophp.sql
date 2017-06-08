-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-06-2017 a las 06:33:39
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdproyectophp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblautor`
--

CREATE TABLE `tblautor` (
  `idAutor` int(11) NOT NULL,
  `idNacionalidad` int(11) NOT NULL,
  `nombreAutor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblautor`
--

INSERT INTO `tblautor` (`idAutor`, `idNacionalidad`, `nombreAutor`) VALUES
(1, 1, 'J.K Rowling'),
(2, 2, 'Claudia Lars'),
(3, 3, 'Alberto Masferer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcategoria`
--

CREATE TABLE `tblcategoria` (
  `idCategoria` int(11) NOT NULL,
  `nombreCategoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblcategoria`
--

INSERT INTO `tblcategoria` (`idCategoria`, `nombreCategoria`) VALUES
(1, 'Tecnologia'),
(2, 'Drama'),
(3, 'Lirica'),
(4, 'Salud'),
(5, 'Ciencia'),
(6, 'Thriller'),
(7, 'Romance'),
(8, 'Aventura'),
(9, 'Terror'),
(10, 'Ciencia ficción'),
(11, 'Investigación'),
(12, 'Infantil'),
(13, 'Autoayuda'),
(14, 'Cocina'),
(15, 'Deportes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbldetlibroautor`
--

CREATE TABLE `tbldetlibroautor` (
  `idLibro` int(11) NOT NULL,
  `idAutor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbldetlibroautor`
--

INSERT INTO `tbldetlibroautor` (`idLibro`, `idAutor`) VALUES
(1, 1),
(3, 3),
(2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbldetpedido`
--

CREATE TABLE `tbldetpedido` (
  `idPedido` int(11) NOT NULL,
  `idLibro` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total` float NOT NULL,
  `eliminado` tinyint(1) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbleditorial`
--

CREATE TABLE `tbleditorial` (
  `idEditorial` int(11) NOT NULL,
  `nombreEditorial` varchar(50) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbleditorial`
--

INSERT INTO `tbleditorial` (`idEditorial`, `nombreEditorial`, `direccion`, `telefono`, `email`) VALUES
(1, 'Santillana', '87 Avenida Norte #311, Colonia Escalon, San Salvador', '2505-8920', 'santillana@gmail.com'),
(2, 'Oceano', 'San Salvador', '2525-6000', 'oceano@hotmail.com'),
(3, 'Edisal S.A de C.V', 'Colonia Flor Blanca Prol Cl Arce y 37 Av Nte No 206 San Salvador', '2502-4000', 'edisal@yahoo.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbllibro`
--

CREATE TABLE `tbllibro` (
  `idLibro` int(11) NOT NULL,
  `idEditorial` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `stock` int(11) NOT NULL,
  `descripcion` varchar(1200) NOT NULL,
  `precioCosto` float NOT NULL,
  `palabrasClave` varchar(50) NOT NULL,
  `imagen` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbllibro`
--

INSERT INTO `tbllibro` (`idLibro`, `idEditorial`, `idCategoria`, `titulo`, `stock`, `descripcion`, `precioCosto`, `palabrasClave`, `imagen`) VALUES
(1, 1, 1, 'Harry Potter y las reliquias de la muerte', 5, 'Encuentro de Harry con el señor tenebroso', 15.5, 'RELIQUIAS DE LA MUERTE', ' ../imagenes/portadas/3.jpg'),
(2, 3, 3, 'Luz Negra', 5, 'transforma la búsqueda de Dios en la búsqueda del ser humano', 2, 'LUZ', ' ../imagenes/portadas/1.jpg'),
(3, 2, 2, 'El principito', 6, 'Cuento poético que viene acompañado de ilustraciones hechas con acuarelas', 1.5, 'PRINCIPITO', ' ../imagenes/portadas/2.jpg'),
(4, 1, 1, 'Documentación general. Sistemas, redes y centros', 5, 'Se estudia en las cinco unidades que componen esta obra el concepto de Documentación general, las bases epistemológicas de los sistemas de información y documentación y la teoría y los modelos prácticos de los sistemas para culminar presentando una metodología ejemplar y básica de planificación general del centro', 30, 'redes, sistemas, centros', '../imagenes/portadas/4.jpg'),
(5, 1, 4, '¿HABLAMOS DE TU PRÓSTATA?', 1, 'Son muchos y variados los interrogantes que suscitan la prevención y los tratamientos de los trastornos de salud relacionados con la próstata. Preguntas como qué es la próstata y cuáles son sus funciones en la fisiología masculina de qué manera se puede prevenir el cáncer de próstata ', 5, 'Salud, hombre, próstata', '../imagenes/portadas/5.jpg'),
(6, 2, 5, 'Química inorgánica. Volumen 1: Elementos representativos', 5, 'El químico actual debe saber lo suficiente para poder abordar cualquier problema en su ámbito, determinar las informaciones y datos necesarios para resolverlo, y saber dónde encontrarlos.', 20, 'Química, inorgánica, elementos', '../imagenes/portadas/6.jpg'),
(7, 2, 5, 'Química inorgánica. Volumen 2: Elementos de transición', 5, 'El químico actual debe saber lo suficiente para poder abordar cualquier problema en su ámbito, determinar las informaciones y datos necesarios para resolverlo, y saber dónde encontrarlos.', 18.5, 'Ciencia, química, inorgánica', '../imagenes/portadas/7.jpg'),
(8, 3, 5, 'Enseñanza de la Física a través de simulaciones', 2, 'Esta obra expone de forma amplia, pero también clara y concisa, los principios fundamentales de la Física básica a lo largo de catorce capítulos en los que se plantean demostraciones matemáticas con todos los pasos seguidos.', 10, 'Física, matemáticas, demostración', '../imagenes/portadas/8.jpg'),
(9, 3, 1, 'Administración de Oracle 11G', 2, 'Oracle Database 11g, la primera base de datos de la industria diseñada para grid computing, se encuentra disponible en una variedad de ediciones.', 25, 'Oracle, base de datos, computación, sistemas', '../imagenes/portadas/9.jpg'),
(10, 1, 1, 'Tecnología eléctrica (3.ª edición)', 3, 'En esta tercera edición se mantienen los objetivos y la estructura de las dos anteriores, si bien se ha producido una notable actualización de los diferentes capítulos para adaptarlos al nuevo Reglamento Electrotécnico de Baja Tensión de 2002', 15, 'Eléctrica, ingeniería, tecnología', '../imagenes/portadas/10.jpg'),
(11, 1, 1, 'MECÁNICA APLICADA: ESTÁTICA Y CINEMÁTICA', 2, 'El presente libro es una introducción a la programación lineal en su aplicación al modelado de situaciones asociadas a la planificación, programación y control de actividades. Se hace especial hincapié en los aspectos metodológicos asociados, por lo que no sólo se persigue obtener los valores numéricos óptimos', 10, 'mecánica, numéricos', '../imagenes/portadas/10.jpg'),
(12, 2, 5, 'EVOLUCIÓN. ORIGEN, ADAPTACIÓN Y DIVERGENCIA DE LAS ESPECIES', 10, 'Desde la publicación en 1859 del libro El Origen de las Especies, la teoría de la evolución se ha ido perfeccionando con nuevos análisis de los distintos niveles de organización que conforman la vida.', 15, 'evolución, origen, adaptación', '../imagenes/portadas/11.jpg'),
(13, 3, 5, 'PALEONTOLOGÍA', 1, 'Este es un libro que se orienta hacia la visión integradora de la Paleontología. No está concebido como compendio de datos de observación, sino de hipótesis e ideas con las que estos se interpretan.', 15.99, 'paleontología, ideas, dinosaurio', '../imagenes/portadas/12.jpg'),
(14, 2, 2, 'UN LARGO CAMINO A CASA, DE SAROO BRIERLEY', 3, 'Por mucho que protejamos a los niños, es inevitable que tengan algún tipo de miedo. Creo que no conozco a nadie que no tuviera miedo a algo o a alguien cuando era pequeño.', 9.99, 'camino, casa, largo', '../imagenes/portadas/13.jpg'),
(15, 1, 2, 'La niña del arrozal', 5, 'Wichi es una joven tailandesa de doce años inteligente, alegre y extravertida. Feliz porque sus padres viven juntos y se aman, las cosas comienzan a empeorar el día que su madre, una hermosa mujer que con diecisiete años ya había ganado un concurso de belleza local, se deja arrastrar por el juego y empieza a gastar el poco dinero de que disponen. Cheonchai, el padre de Wichi, desesperado y alcoholizado, ', 19.99, 'niña, arrozal, vietnam', '../imagenes/portadas/14.jpg'),
(16, 2, 2, 'El amante bilingüe', 3, 'Juan Marés, un soñador que se ha hecho a sí mismo, se ve engañado y abandonado por su mujer, perteneciente a la alta burguesía catalana. Este abandono lo hunde en la desesperación. Acuciado por una ensoñación enfermiza y obsesiva, concibe una delirante estratagema: hacerse pasar por un charnego pintoresco y fulero llamado Faneca, y reconquistar con esa personalidad usurpada a su ex mujer.', 14.99, 'amante, bilingüe, latin lover', '../imagenes/portadas/15.jpg'),
(17, 2, 2, 'Casada a la fuerza', 2, 'En pleno siglo XXI y en ciudades tan cosmopolitas como París, aún se dan casos de prácticas tan ancestrales como el matrimonio de conveniencia. Leila sólo tenía veinte años cuando le presentaron a su futuro esposo, un hombre que prácticamente le doblaba la edad y al que jamás había visto. Francesa de nacimiento pero de profundas raíces musulmanas, esta joven tuvo que someterse a su tradición y obedecer en silencio unas leyes no escritas que apenas entendía.', 12.99, 'casada, fuerza, infeliz', '../imagenes/portadas/16.jpg'),
(18, 1, 6, 'Estudio en escarlata', 4, 'Un cadáver hallado en extrañas circunstancias en una casa deshabitada provoca que los agentes de policía de Scotland Yard se pierdan en divagaciones equivocadas. Y, por si fuera poco, un nuevo asesinato parece complicar aún más la historia. Para resolver el misterio, habría que remontarse en el tiempo a otros asesinatos ocurridos hace 30 años en la ciudad mormona de Salt Lake City.', 9.99, 'Estudio, escarlata', '../imagenes/portadas/18.jpg'),
(19, 2, 6, 'El misterioso caso de Styles', 5, 'Essex, Inglaterra. La millonaria Emily Inglethorp amanece muerta en su habitación sin indicio alguno de violencia. Aunque la policía descarta que se trate de un asesinato, demasiadas rivalidades en la vieja mansión propiedad de la fallecida hacen pensar en un posible caso de envenenamiento que podría haber pasado desapercibido. Cuando el detective Hércules Poirot llega para encargarse de la investigación, se encuentra frente a frente con la avaricia, los celos, las tensiones y la ambición de una familia que aspira a heredar una fortuna en dinero y propiedades. Un marido infiel, su jovencísima amante, unos hijastros envidiosos, un extraño toxicólogo alemán. Todos parecen sospechosos de haber acabado con la vida de Emily, aunque solo uno de ellos puede ser el asesino. Poirot deberá emplearse a fondo y usar todas sus armas para llegar al fondo de su primer caso literario.', 6, 'misterio, caso, Styles', '../imagenes/portadas/19.jpg'),
(20, 3, 6, 'El halcón maltés', 2, 'Sam Spade (Humphrey Bogart) recibe en su oficina de detective privado a una misteriosa dama, la señorita Ruth Wonderly (Mary Astor) que quiere investigar el paradero de su hermana, quien había huido con un hombre. El socio de Sam (Jerome Cowan) se ofrece para buscar al hombre y seguirá discretamente a la mujer, pero es asesinado. Sam confronta a la clienta y resulta que el asunto de la desaparición de su hermana era mentira: el hombre que buscaba era su socio y puede tener en su poder una valiosa estatua de un halcón.', 4.55, 'halcón, maltés, detective, homicidio', '../imagenes/portadas/20.jpg'),
(21, 1, 7, '50 Sombras De Grey', 25, 'Ella es una joven universitaria, inteligente, seria, estudiosa, amante de la literatura, y virgen. Él es un empresario multimillonario, culto, gourmet, exquisito y exigente en todo... sobre todo en sus preferencias sexuales.\r\nAna Steelno es más que una estudiante de veintiún años cuando se enamora de Christian Grey, un millonario guapo y elegante de mirada penetrante. Sin embargo, Grey no es el clásico príncipe azul. Para que la relación siga adelante, Ana debe someterse por contrato a la práctica de una relación sexual sadomasoquista en la cual él será el dominante y ella la sometida. Porque Grey es un hombre cuyo pasado esconde muchas sombras pero a quien Ana, dispuesta a todo por amor, tratará de liberar de ellas.', 29.99, '50, sombras, Grey, pasión, romance, lujuria', '../imagenes/portadas/21.jpg'),
(22, 2, 7, 'Pideme Lo Que Quieras, Ahora y Siempre', 12, 'Después de provocar su despido de la empresa Müller, Judith está dispuesta a alejarse para siempre de Eric Zimmerman. Para ello y para reconducir su vida decide refugiarse en casa de su padre, en Jerez. Atormentado por su marcha, Eric le sigue el rastro. El deseo continúa latente entre ellos y las fantasías sexuales están más vivas que nunca, pero esta vez será Judith quien le imponga sus condiciones, que él acepta por el amor que le profesa.\r\nTodo parece volver a la normalidad, hasta que una llamada inesperada los obliga a interrumpir su reconciliación y desplazarse hasta Munich. Lejos de su entorno, en una ciudad que le resulta hostil y con la aparición del sobrino de Eric, un contratiempo con el que no contaba, la joven deberá decidir si tiene que darle una nueva oportunidad o, por el contrario, comenzar un nuevo futuro sin él.', 12, 'romance, fantasias, amor, pideme, siempre', '../imagenes/portadas/22.jpg'),
(23, 3, 7, 'Deseo Concedido', 6, 'Si algo tiene claro Lady Megan Philiphs es que ningún hombre doblegará su carácter y su voluntad. Acostumbrada a cuidar y velar por la seguridad de sus hermanos, Megan es una joven intrépida, de bello rostro moreno, a la que le divierten los retos y no le asusta el sonido del acero.\r\nSi algo tiene claro el guerrero Duncan McRae es que su vida es la guerra. Acostumbrado a liderar ejércitos y a que la gente agache atemorizada la cabeza a su paso, al llegar al castillo de Dunstaffnage para asistir a la boda de su amigo Axel McDougall, se encuentra con un tipo de enemigo muy distinto al que conoce: la joven e inquietante Megan.\r\nLa palabra de un highlander en Escocia es su ley. Y la promesa de Duncan al abuelo de la muchacha une sus destinos y desemboca en una trepidante y accidentada boda de un año y un día.', 3.99, 'Deseo, escocia, guerrero, romance, boda', '../imagenes/portadas/23.jpg'),
(24, 1, 8, '20.000 Leguas de viaje submarino', 10, 'Un monstruo marino ha puesto en marcha todas las alarmas, y finalmente se organiza una expedición para capturarlo, en la que figuran el célebre profesor de Historia Natural Pierre Aronnax, su ayudante Conseil y el experto arponero canadiense Ned Land, a bordo de la fragata estadounidense Abraham Lincoln. El monstruo resulta ser un sorprendente submarino a las órdenes del capitán Nemo, y el hecho de que deba mantener el secreto plantea un grave problema al capitán en cuanto a la liberación de los tres personajes principales. El capitán Nemo, el sabio atormentado y desengañado de la raza humana, en el que confluyen el individualismo libertario y un exacerbado sentido de la justicia, se ha convertido sin duda en uno de los paradigmas de la novela de aventuras y su presencia ya bastaría para justificar el lugar de honor que ocupa Veinte mil leguas de viaje submarino en el género. Y sin embargo contiene muchos otros alicientes: emoción, conocimiento, suspense, personajes inolvidables, lances inesperados... Uno de los hitos de la novela de aventuras y fuente inagotable para la posterior narrativa de anticipación.', 5.35, '20.000, Leguas, viaje, submarino, monstruo', '../imagenes/portadas/24.jpg'),
(25, 2, 8, 'El Destino del Cazador', 9, 'En 1913, en vísperas de la Primera Guerra Mundial, León Courtney, un joven guía de safaris se ve inmerso en una trama conspiratoria contra el Imperio Británico a la que debe poner fin sin más medios que su propia sagacidad y valentía. León, en tierra de masais, tiene que decidir entre salvar a su país o a la enigmática Eva, la mujer que ama y la que cambiará para siempre su destino.', 13.69, 'Cazador, destino, guerra mundial, aventura', '../imagenes/portadas/25.jpg'),
(26, 3, 8, 'El Origen del Universo', 2, 'En El Origen del Universo los autores narran una maravillosa aventura por el cósmos donde mezclan una gran historia de aventuras con ciencia para niños.\r\nEl mayor experimento científico de la Historia está en marcha, ¡y George y Annie lo verán desde primera fila!\r\nAcompañarán a Eric, el padre de Annie, que está trabajando en el Centro Europeo de Investigaciones Nucleares, a Suiza. Allí se encuentra el gran colisionador de partículas, capaz de explorar los primeros instantes del universo: el Big Bang.\r\nCientíficos de todo el mundo llevan años trabajando en el experimento y nada puede salir mal, ¡hasta que George y Annie descubren un plan para sabotearlo! ¿Llegarán a tiempo para impedirlo?', 10, 'Origen, universo, cosmos, cientifico, experimento', '../imagenes/portadas/26.jpg'),
(27, 1, 9, 'IT(Eso)', 35, '¿Quién o qué mutila y mata a los niños de un pequeño pueblo norteamericano? ¿Por qué llega cíclicamente el horror a Derry en forma de un payaso siniestro que va sembrando la destrucción a su paso? Esto es lo que se proponen averiguar los protagonistas de esta novela. Tras veintisiete años de tranquilidad y lejanía una antigua promesa infantil les hace volver al lugar en el que vivieron su infancia y juventud como una terrible pesadilla. Regresan a Derry para enfrentarse con su pasado y enterrar definitivamente la amenaza que los amargó durante su niñez.\r\nSaben que pueden morir, pero son conscientes de que no conocerán la paz hasta que aquella cosa sea destruida para siempre.', 35, 'eso, it, terror, payaso, secuestro', '../imagenes/portadas/27.jpg'),
(28, 2, 9, 'El Gato Negro', 5, 'Todo comienza cuando el protagonista quien es un hombre que a pesar de estar casado con una esposa muy fiel y buena, se da a la vida del alcohol, él es muy bueno a quien la bebida cambia paulatinamente, ama mucho a los animales hasta tal punto que su esposa lo ayuda a adquirir muchos de ellos, desde un perro hasta pájaros, peces de colores y otros más, luego consiguen tener un gato negro quien es el animal preferido del personaje.\r\nLas cosas empiezan a cambiar debido a los excesos del alcohol del protagonista que a pesar de que nota que está cambiando su personalidad se va tornando agresivo con los animales y hasta con su esposa llegando incluso a la violencia, comienza a maltratar a los animales y por último a su gato negro, al cual en un arranque de cólera alcohólica le saca un ojo y posteriormente lo ahorca cruelmente, pero entonces suceden hechos misteriosos que arrastran al protagonista a tomar una severa decisión.', 17, 'gato, negro, alcohol, animales, misterio', '../imagenes/portadas/28.jpg'),
(29, 3, 9, 'Dracula', 25, 'Drácula parte de la existencia de Vlad Tepes, un personaje histórico situado en la Rumania del siglo XV, y conocido por su heroicidad contra la invasión otomana, pero también por su crueldad. A partir de esta historia y de no pocas leyendas acerca de él, Bram Stoker escribe esta magistral novela en forma de diarios y cartas que los personajes principales van intercambiándose. Una obra trascendental de la literatura gótica que abrió un nuevo camino en la novela de terror y que instauró la figura del aristócrata transilvano como arquetipo del mal y modelo de seducción perversa, y sus páginas han sido fuente innagotable de innumerables adaptaciones cinematográficas. Por fin una edición a la altura de la grandeza literaria de este clásico, profusamente ilustrada con grabados de la época. Drácula es uno de los personajes más conocidos del terror gótico.', 45, 'Dracula, vampiro, sangre, inmortal, castillo', '../imagenes/portadas/29.jpg'),
(30, 1, 10, 'La nave de un millón de años', 13, 'La nave de un millón de años es la historia de un puñado de inmortales en el decurso de las civilizaciones y culturas humanas. Un repaso completo a la Historia y a un posible futuro entre las estrellas. Un hito imprescindible en el desarrollo de la ciencia ficción contemporánea: una novela sofisticada, precisa en el aspecto histórico, inteligente y emotiva, que ofrece una visión panorámica de la Humanidad, del "homo sapiens" y del nuevo "homo inmortalis".', 7.99, 'nave, millon, ciencia ficcion, futuro', '../imagenes/portadas/30.jpg'),
(31, 2, 10, 'La radio de Darwin', 4, 'Un virus de transmisión sexual se expande sobre la tierra, provocando un alarmante número de mutaciones en los fetos en gestación que llevan a los niños a nacer muertos. Sin embargo, los cambios que se aprecian en su organismo parecen indicar un fenómeno de especiación, un drástico cambio evolutivo.', 5.99, 'radio, Darwin, virus, mutacion, evolucion', '../imagenes/portadas/31.jpg'),
(32, 3, 10, 'Las crónicas marcianas', 1, 'Esta colección de relatos reúne la crónica de la colonización de Marte por parte de una humanidad que abandona la Tierra en sucesivas oleadas de cohetes plateados y sueña con reproducir en el Planeta Rojo una civilización de perritos calientes, cómodos sofás y limonada en el porche del atardecer. Pero los colonos también traen en su equipaje las enfermedades que diezmarán a los marcianos y mostrarán muy poco respeto por una cultura planetaria, misteriosa y fascinante, que éstos intentarán proteger ante la rapacidad de los terrícolas.', 2.99, 'marcianas, marte, tierra, terricolas, crónicas', '../imagenes/portadas/32.jpg'),
(33, 1, 11, 'A sangre fría', 6, 'Seis años le llevó al periodista y escritor estadounidense Truman Capote dar vida a esta novela que fuera finalmente publicada en el año 1966. Aclamada por la crítica, la historia gira en torno a un múltiple asesinato. Un detallado trabajo de campo le permitió a Capote dotar la captura, confesión, condena y posterior ahorcamiento de los autores del crimen de gran realismo.', 20, 'periodismo, historia, sangre, asesinato', '../imagenes/portadas/33.jpg'),
(34, 2, 11, 'Operación masacre', 7, 'Una de las primeras novelas de no ficción escritas en español. El libro, publicado en 1957, reúne toda la investigación del periodista argentino, Rodolfo Walsh, acerca de los hechos ocurridos el 9 de junio de 1956 en Buenos Aires. Tras dos generales sublevarse contra el gobierno de facto, que había destituido a Perón en septiembre de 1955, se produce lugar una brutal represión que tortura y acaba con la vida de varias personas.', 5.2, 'periodismo, historia, masacre, represión', '../imagenes/portadas/34.jpg'),
(35, 3, 11, 'Los suicidas del fin del mundo.', 15, 'También de mano de una periodista argentina llega este libro de crónicas que logra narrar de manera inigualable la oleada de suicidios que entre los años 1997 y 1999 tuvo lugar en la pequeña localidad alejada de las grandes ciudades, Las Heras. Con un detallado trabajo de campo como trasfondo, Guerreiro logra conjugar la reconstrucción de estas tragedias con la rutina de una localidad prácticamente en el medio de la nada.', 35.98, 'periodismo, crónicas, suicidios, fin, mundo', '../imagenes/portadas/34.jpg'),
(36, 1, 12, 'El libro de la selva', 12, 'Mowgli es un humano… pero es solo un cachorro, un bebé indefenso que los lobos deciden criar como a uno de los suyos. Akela, el líder de la manada, consigue que los demás lobos estén de acuerdo con esa decisión, pero es una tregua temporal: Mowgli crece muy despacio para el ritmo de los lobos, y Akela no será líder para siempre. El niño tiene un gran aliado: Bagheera, la pantera, y un gran enemigo: Shere Khan, el tigre, que considera que Mowgli es su presa y le corresponde por derecho.', 25, 'selva, animales, pantera, oso, tigre, infantil', '../imagenes/portadas/36.jpg'),
(37, 2, 12, 'El pequeño vampiro', 3, 'Anton ha conocido a Rüdiger, un vampiro de los de verdad. Las aventuras que siempre ha imaginado van a hacerse por fin realidad ante el asombro de sus padres: criptas secretas, vuelos nocturnos, cementerios abandonados...', 6, 'vampiro, pequeño, infantil, cementerio', '../imagenes/portadas/37.jpg'),
(38, 3, 12, 'Momo', 8, 'Momo es una pequeña niña que vive en las ruinas de un anfiteatro de una gran ciudad italiana. Es feliz, buena, cariñosa, con muchos amigos, y tiene una gran virtud: la de saber escuchar. Por eso, es una persona a la que mucha gente acude para desahogarse y contar las penas, ya que ella es capaz de encontrar una solución para todos los problemas.\r\nSin embargo, una amenaza se abalanza sobre la tranquilidad de la ciudad y pretende destruír la paz de sus habitantes. Llegan los Hombres Grises, unos extraños seres que viven parasitando del tiempo de los hombres, y convencen a la ciudad para que les entregue su tiempo.\r\nPero Momo, por su singular personalidad, constituirá el principal obstáculo para estos seres, de modo que se intentarán deshacer de ella. Momo, con la ayuda de una tortuga y un extraño Dueño del Tiempo se las arreglará para salvar a sus amigos y devolver la normalidad a su ciudad, acabando para siempre con los hombres del tiempo.', 1.99, 'momo, italia, tiempo, infantil', '../imagenes/portadas/38.jpg'),
(39, 1, 13, 'Poder sin límites', 18, '"La vida pagará cualquier precio que tú pidas." Esta sencilla máxima muestra elocuentemente la teoría básica de este libro: el problema esencial del desarrollo personal no está en las circunstancias, sino en nuestra actitud vital. Solemos pedirle a la vida un precio bajo, limitando nuestras ambiciones, siendo presas de la frustración o el miedo de ir más allá. Y esta actitud negativa es lo que Poder sin límites ayuda a combatir enseñándonos el poder oculto del cerebro, los mecanismos correctos de relación interpersonal e incluso hábitos alimentarios adecuados para proporcionarnos el sistema de creencias y la sólida confianza en nosotros mismos que nos permitirán alcanzar el éxito.', 34.99, 'poder, limites, personal, habitos, vida', '../imagenes/portadas/39.jpg'),
(40, 2, 13, 'Inteligencia Emocional', 4, '¿Por qué algunas personas parecen dotadas de un don especial que les permite vivir bien, aunque no sean las que más se destacan por su inteligencia? ¿Por qué no siempre el alumno más inteligente termina siendo el más exitoso? ¿Por qué unos son más capaces que otros para enfrentar contratiempos, superar obstáculos y ver las dificultades bajo una óptica distinta?\r\nEl libro demuestra cómo la inteligencia emocional puede ser fomentada y fortalecida en todos nosotros, y cómo la falta de la misma puede influir en el intelecto o arruinar una carrera.\r\nLa inteligencia emocional nos permite tomar conciencia de nuestras emociones, comprender los sentimientos de los demás, tolerar las presiones y frustraciones que soportamos en el trabajo, acentuar nuestra capacidad de trabajar en equipo y adoptar una actitud empática y social, que nos brindará mayores posibilidades de desarrollo personal.', 24, 'inteligencia, emociones, personal, autoayuda', '../imagenes/portadas/40.jpg'),
(41, 3, 13, 'Tus zonas erróneas', 12, 'El estado de salud es un estado natural, y los medios para lograrlo están dentro de las posibilidades de cada uno. ¿Tienes la sensación de estar desbordado por la existencia? ¿Paralizado por compromisos -afectivos, laborales...- que ya no te satisfacen? ¿Dominado por complejos de culpa o inseguridad? No proyectes tu insatisfacción en otros: la causa está en ti, en las «zonas erróneas» de tu personalidad que te bloquean e impiden que te realices. En esta obra, el Dr. Wayne W. Dyer muestra dónde se encuentran, qué significan, adónde conducen y cómo podemos superarlas. Esboza un camino para alcanzar la felicidad, un procedimiento que se basa en ser responsable y comprometerse con uno mismo. Y todo contado con la amenidad y sencillez de quien sabe que puede cooperar en la mejora de la vida de los demás.', 26, 'error, autoayuda, vida, fortaleza, superación', '../imagenes/portadas/41.jpg'),
(42, 1, 14, '1080 recetas de cocina', 24, 'Con más de dos millones de ejemplares vendidos a lo largo de treinta años, 1080 Recetas de Cocina ha sido el libro con el que tres generaciones de españoles han aprendido a cocinar. Entre la numerosa y en algunos casos excelente bibliografía que ha ido apareciendo a lo largo del pasado siglo, el libro de Simone Ortega se ha convertido en el recetario más utilizado por todo tipo de personas: hombres y mujeres, aprendices y expertos. Tanto por su estructura como por la cuidadosa selección de los ingredientes y la claridad de las explicaciones para la elaboración de las recetas, y sobre todo, por la fiabilidad de los procedimientos culinarios empleados –todas las recetas «salen»–, el libro se ha convertido en el clásico por excelencia de nuestra cocina.', 39.99, 'cocina, recetas, comida, ingredientes', '../imagenes/portadas/42.jpg'),
(43, 2, 14, 'Mis smoothies favoritos de Isasaweis', 10, '¡Lo que he disfrutado haciendo este libro! Han sido meses mezclando ingredientes, probando smoothies, divirtiéndome muchísimo, haciéndome fan número uno de estos batidos que de mano no me habían conquistado pero que a día de hoy forman ya parte de mi alimentación. He recopilado en este libro más de cincuenta recetas de los que se han convertido en ¡mis smoothies favoritos!', 25, 'smoothies, isasaweis, recetas, ingredientes', '../imagenes/portadas/43.jpg'),
(44, 3, 14, 'El arte de la cocina francesa', 12, 'Julia Child revolucionó la forma de cocinar en los hogares de todo el mundo. Tras estudiar en la reputada academia Le Cordon Bleu de París, abrió su propia escuela de cocina con Simone Beck y Louisette Bertholle. Con ellas escribió el primero de sus libros, El arte de la cocina francesa, que se convertiría de inmediato en un best seller y años después en un clásico. Su programa de televisión The French Chef fue una revolución para los amantes de la cocina del mundo entero, precursor del exitoso formato de los programas televisivos de cocina que conocemos hoy.\r\n«Todo el mundo puede cocinar al estilo francés en cualquier parte del mundo con las instrucciones adecuadas» escriben las señoras Beck, Bertholle, y Child. Y este es el libro que durante más de cincuenta años ha enseñado cómo hacerlo.', 30, 'cocina, francesa, arte, paris, chef', '../imagenes/portadas/44.jpg'),
(45, 1, 15, 'Futbol, dinamica de lo impensado', 6, 'Uno de los mejores libros de fútbol nunca escritos. En oposición a la época en que los directores técnicos se adueñan del juego y del negocio, Panzeri desgrana poco a poco la verdad total: el fútbol es el jugador. Él es su causa eficiente. Ni su imaginación ni su ingenio deben limitarse: ¿qué es el fútbol sino lo impensado, lo imprevisto, lo repentino?. ¿Qué influencia puede tener un director técnico cuando el jugador se encuentra frente a dos adversario y tiene un instante para concretar su acción creadora?. El autor propone además un cambio en el sistema organizativo de torneos para darle al fútbol una vivacidad e interés del que hoy carece…', 24.99, 'futbol, dinamica, técnicos, juego, deporte', '../imagenes/portadas/45.jpg'),
(46, 2, 15, 'Canastas sagradas', 2, 'Canastas sagradas es una mirada al interior de la superior sabiduría del trabajo en equipo del [que fue] primer entrenador de los Chicago Bulls, Phil Jackson (ahora entrenador de Los Ángeles Lakers). En el corazón de este libro está la filosofía de Jackson sobre el baloncesto consciente y su cruzada de toda una vida para llevar la iluminación al mundo competitivo del deporte profesional. Jackson, uno de los entrenadores con más éxitos en la historia de la NBA, ha desarrollado u nuevo paradigma de liderazgo basado en los principios orientales y en los Native American. En esta biografía inspiradora, repleta de historias de Michael Jordan, Scottie Pipen, Toni Kukoc, Dennis Rodman y otros miembros de los Bulls, Jackson revela cómo respetar al enemigo y ser agresivo sin rabia o violencia; cómo vivir en el momento y mantenerse calmadamente focalizado dentro de la niebla del caos, de manera que el “yo” se convierte en el servidor del “nosotros”.', 16, 'basketball, canasta, baloncesto, jordan, nba', '../imagenes/portadas/46.jpg'),
(47, 3, 15, 'Rafa, mi historia', 25, 'La hazaña de Rafael Nadal de convertirse en el jugador más joven de la era de los abiertos de tenis en conquistar los cuatro torneos de Grand Slam es un hito de la escena deportiva contemporánea. Nadal es individuo tan intenso como brillante, cuya naturaleza guerrera en la pista contrasta con su vulnerabilidad humana fuera de ella. Y se caracteriza por una extraordinaria disciplina y capacidad de sacrificio\r\nEstas memorias, escritas en colaboración con el galardonado periodista John Carlin, nos revelan los entresijos de la infancia del mejor tenista español de la historia, la centralidad de la familia en su vida, su evolución como tenista y los altibajos profesionales y personales de su increíble trayectoria. Nadal nos relata golpe por golpe cómo se forjaron triunfos memorables: la victoria en la final de Wimbledon de 2008 contra Roger Federer(«El mejor partido de tenis jamás visto», según John McEnroe), y la del US Open de 2010 en la que venció a Novak Djokovic. Y vemos cómo ha afrontado lesiones que han llegado a amenazar su futuro profesional.', 37.89, 'nadal, deporte, tenis, grand slam', '../imagenes/portadas/47.jpg'),
(48, 2, 3, 'Edipo Rey', 9, 'Considerada por Aristóteles como la más perfecta de las tragedias griegas en muchos aspectos, Edipo Rey de Sófocles (c. 496-406 a.C. ) es un drama de revelación que propone la búsqueda de lo que se esconde tras las apariencias, la indagación en la esencia de lo que uno es. La peste y una larga epidemia asolan Tebas. Tras la consulta al oráculo de Delfos, Edipo entenderá que el remedio a ese mal exige vengar la muerte del anterior monarca, Layo. Con un manejo magistral de la ironía trágica, el gran dramaturgo griego nos ofrece el paulatino desvelamiento de los detalles del ascenso del protagonista al trono, así como el descubrimiento final de su condición de parricida y esposo de la viuda de su padre, su propia madre.', 10.99, 'rey, edipo, sofocles, tragedia', '../imagenes/portadas/48.jpg'),
(49, 3, 3, 'Prometeo Encadenado', 1, 'Tras robar el fuego para entregarlo a los hombres, Prometeo recibe una dura condena: Zeus lo manda encadenar a una roca del Cáucaso. Allí, todas las mañanas, un águila roe el hígado del titán, que se regenera cada noche. Sin embargo, Prometeo resiste el castigo y se niega a revelar la profecía que lo haría libre: el anuncio de un matrimonio criminal que defenestrará a Zeus. Gracias a Esquilo, la voz de Prometeo se alza como una voz enfrentada al poder despótico, una voz que favorece el bien común, una voz que ama el saber sobre todo lo demás.', 5.45, 'prometeo, dioses, zeus, lirica', '../imagenes/portadas/49.jpg'),
(50, 2, 4, 'Farreras Rozman. Medicina Interna', 15, 'Se trata del libro de Medicina Interna más representativo de la especialidad en castellano, publicado de forma ininterrumpida desde 1929. Es una obra diseñada desde sus orígenes para la docencia, y dirigida a estudiantes de medicina y a profesionales del ámbito de la Medicina Interna y sus respectivas especialidades.', 65, 'medicina, interna, salud', '../imagenes/portadas/50.jpg'),
(51, 3, 4, 'Atlas de anatomía humana', 8, 'Está considerado como el “bestseller” indiscutible para el estudio de la anatomía humana. La nueva edición, publicada en 2015, se adapta perfectamente a las nuevas necesidades de los estudiantes que afrontan la asignatura en los primeros años del grado.', 70, 'anatomia, medicina, salud, estudio', '../imagenes/portadas/51.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblnacionalidad`
--

CREATE TABLE `tblnacionalidad` (
  `idNacionalidad` int(11) NOT NULL,
  `nombreNacionalidad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblnacionalidad`
--

INSERT INTO `tblnacionalidad` (`idNacionalidad`, `nombreNacionalidad`) VALUES
(1, 'Europa'),
(2, 'E.E U.U'),
(3, 'Inglaterra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblpedido`
--

CREATE TABLE `tblpedido` (
  `idPedido` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `fechaPedido` date NOT NULL,
  `fechaEntrega` date NOT NULL,
  `horaPedido` time NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblpedido`
--

INSERT INTO `tblpedido` (`idPedido`, `idUsuario`, `fechaPedido`, `fechaEntrega`, `horaPedido`, `total`) VALUES
(1, 1, '2017-05-18', '2017-05-20', '05:30:00', 40.5),
(2, 3, '2017-05-19', '2017-05-21', '04:17:00', 35),
(3, 2, '2017-05-20', '2017-05-23', '02:30:00', 65.3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblpersona`
--

CREATE TABLE `tblpersona` (
  `idPersona` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `direccion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblpersona`
--

INSERT INTO `tblpersona` (`idPersona`, `nombre`, `telefono`, `direccion`) VALUES
(1, 'Luis Guillermo Abrego', '7777-7777', 'San Salvador'),
(2, 'Maria Jose Betancourt', '7171-7171', 'San Miguel'),
(3, 'Alexis Alvarado Rojas', '7272-7272', 'Apopa City');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltipousuario`
--

CREATE TABLE `tbltipousuario` (
  `idTipoUsuario` int(11) NOT NULL,
  `nombreUsuario` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbltipousuario`
--

INSERT INTO `tbltipousuario` (`idTipoUsuario`, `nombreUsuario`) VALUES
(1, 'Administrador'),
(2, 'Empleado'),
(3, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblusuario`
--

CREATE TABLE `tblusuario` (
  `idUsuario` int(11) NOT NULL,
  `idTipoUsuario` int(11) NOT NULL,
  `idPersona` int(11) NOT NULL,
  `contrasena` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblusuario`
--

INSERT INTO `tblusuario` (`idUsuario`, `idTipoUsuario`, `idPersona`, `contrasena`, `email`) VALUES
(1, 1, 1, 'Itca123', 'luis@hotmail.com'),
(2, 2, 2, 'gato12', 'mjbetancourt@gmail.es'),
(3, 3, 3, 'perro123', 'alexisar@hotmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tblautor`
--
ALTER TABLE `tblautor`
  ADD PRIMARY KEY (`idAutor`),
  ADD KEY `idNacionalidad` (`idNacionalidad`);

--
-- Indices de la tabla `tblcategoria`
--
ALTER TABLE `tblcategoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `tbldetlibroautor`
--
ALTER TABLE `tbldetlibroautor`
  ADD KEY `idLibro` (`idLibro`),
  ADD KEY `idAutor` (`idAutor`);

--
-- Indices de la tabla `tbldetpedido`
--
ALTER TABLE `tbldetpedido`
  ADD KEY `idPedido` (`idPedido`),
  ADD KEY `idLibro` (`idLibro`);

--
-- Indices de la tabla `tbleditorial`
--
ALTER TABLE `tbleditorial`
  ADD PRIMARY KEY (`idEditorial`);

--
-- Indices de la tabla `tbllibro`
--
ALTER TABLE `tbllibro`
  ADD PRIMARY KEY (`idLibro`),
  ADD KEY `idEditorial` (`idEditorial`),
  ADD KEY `idCategoria` (`idCategoria`);

--
-- Indices de la tabla `tblnacionalidad`
--
ALTER TABLE `tblnacionalidad`
  ADD PRIMARY KEY (`idNacionalidad`);

--
-- Indices de la tabla `tblpedido`
--
ALTER TABLE `tblpedido`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `tblpersona`
--
ALTER TABLE `tblpersona`
  ADD PRIMARY KEY (`idPersona`);

--
-- Indices de la tabla `tbltipousuario`
--
ALTER TABLE `tbltipousuario`
  ADD PRIMARY KEY (`idTipoUsuario`);

--
-- Indices de la tabla `tblusuario`
--
ALTER TABLE `tblusuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `idTipoUsuario` (`idTipoUsuario`),
  ADD KEY `idPersona` (`idPersona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tblautor`
--
ALTER TABLE `tblautor`
  MODIFY `idAutor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tblcategoria`
--
ALTER TABLE `tblcategoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `tbleditorial`
--
ALTER TABLE `tbleditorial`
  MODIFY `idEditorial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tbllibro`
--
ALTER TABLE `tbllibro`
  MODIFY `idLibro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT de la tabla `tblnacionalidad`
--
ALTER TABLE `tblnacionalidad`
  MODIFY `idNacionalidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tblpedido`
--
ALTER TABLE `tblpedido`
  MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tblpersona`
--
ALTER TABLE `tblpersona`
  MODIFY `idPersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tbltipousuario`
--
ALTER TABLE `tbltipousuario`
  MODIFY `idTipoUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tblusuario`
--
ALTER TABLE `tblusuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tblautor`
--
ALTER TABLE `tblautor`
  ADD CONSTRAINT `tblautor_ibfk_1` FOREIGN KEY (`idNacionalidad`) REFERENCES `tblnacionalidad` (`idNacionalidad`);

--
-- Filtros para la tabla `tbldetlibroautor`
--
ALTER TABLE `tbldetlibroautor`
  ADD CONSTRAINT `tbldetlibroautor_ibfk_1` FOREIGN KEY (`idAutor`) REFERENCES `tblautor` (`idAutor`),
  ADD CONSTRAINT `tbldetlibroautor_ibfk_2` FOREIGN KEY (`idLibro`) REFERENCES `tbllibro` (`idLibro`);

--
-- Filtros para la tabla `tbldetpedido`
--
ALTER TABLE `tbldetpedido`
  ADD CONSTRAINT `tbldetpedido_ibfk_1` FOREIGN KEY (`idLibro`) REFERENCES `tbllibro` (`idLibro`),
  ADD CONSTRAINT `tbldetpedido_ibfk_2` FOREIGN KEY (`idPedido`) REFERENCES `tblpedido` (`idPedido`);

--
-- Filtros para la tabla `tbllibro`
--
ALTER TABLE `tbllibro`
  ADD CONSTRAINT `tbllibro_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `tblcategoria` (`idCategoria`),
  ADD CONSTRAINT `tbllibro_ibfk_2` FOREIGN KEY (`idEditorial`) REFERENCES `tbleditorial` (`idEditorial`);

--
-- Filtros para la tabla `tblpedido`
--
ALTER TABLE `tblpedido`
  ADD CONSTRAINT `tblpedido_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `tblusuario` (`idUsuario`);

--
-- Filtros para la tabla `tblusuario`
--
ALTER TABLE `tblusuario`
  ADD CONSTRAINT `tblusuario_ibfk_1` FOREIGN KEY (`idPersona`) REFERENCES `tblpersona` (`idPersona`),
  ADD CONSTRAINT `tblusuario_ibfk_2` FOREIGN KEY (`idTipoUsuario`) REFERENCES `tbltipousuario` (`idTipoUsuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
