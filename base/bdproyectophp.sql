-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-06-2017 a las 06:29:08
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.24

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
(10, 'Ciencia ficci&oacute;n'),
(11, 'Investigaci&oacute;n'),
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

--
-- Volcado de datos para la tabla `tbldetpedido`
--

INSERT INTO `tbldetpedido` (`idPedido`, `idLibro`, `cantidad`, `total`, `eliminado`, `estado`) VALUES
(4, 26, 1, 10, 0, 'En proceso'),
(4, 27, 3, 105, 0, 'En proceso'),
(5, 4, 1, 30, 0, 'En proceso');

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
  `titulo` varchar(100) NOT NULL,
  `idEditorial` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `descripcion` varchar(1400) NOT NULL,
  `precioCosto` float NOT NULL,
  `palabrasClave` varchar(50) NOT NULL,
  `imagen` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbllibro`
--

INSERT INTO `tbllibro` (`idLibro`, `titulo`, `idEditorial`, `idCategoria`, `stock`, `descripcion`, `precioCosto`, `palabrasClave`, `imagen`) VALUES
(1, 'Harry Potter y las reliquias de la muerte', 1, 1, 5, 'Encuentro de Harry con el se&ntilde;or tenebroso', 15.5, 'Reliquias de la muerte', ' ../imagenes/portadas/3.jpg'),
(2, 'Luz Negra', 3, 3, 5, 'Transforma la b&uacute;squeda de Dios en la b&uacute;squeda del ser humano', 2, 'Luz', ' ../imagenes/portadas/1.jpg'),
(3, 'El principito', 2, 2, 6, 'Cuento po&eacute;tico que viene acompa&ntilde;ado de ilustraciones hechas con acuarelas', 1.5, 'Principito', ' ../imagenes/portadas/2.jpg'),
(4, 'Documentacion general. Sistemas, redes y centros', 1, 1, 5, 'Se estudia en las cinco unidades que componen esta obra el concepto de Documentaci&oacute;n general, las bases epistemol&oacute;gicas de los sistemas de informaci&oacute;n y documentaci&oacute;n y la teor&iacute;a y los modelos pr&aacute;cticos de los sistemas para culminar presentando una metodolog&iacute;a ejemplar y b&aacute;sica de planificaci&oacute;n general del centro.', 30, 'redes, sistemas, centros', '../imagenes/portadas/4.jpg'),
(5, 'Hablamos de tu prostata', 1, 4, 1, 'Son muchos y variados los interrogantes que suscitan la prevenci&oacute;n y los tratamientos de los trastornos de salud relacionados con la pr&oacute;stata. Preguntas como qu&eacute; es la pr&oacute;stata y cu&aacute;les son sus funciones en la fisiolog&iacute;a masculina de qu&eacute; manera se puede prevenir el c&aacute;ncer de pr&oacute;stata.', 5, 'Salud, hombre, prostata', '../imagenes/portadas/5.jpg'),
(6, 'Quimica inorganica. Volumen 1: Elementos representativos', 2, 5, 5, 'El qu&oacute;mico actual debe saber lo suficiente para poder abordar cualquier problema en su &aacute;mbito, determinar las informaciones y datos necesarios para resolverlo, y saber d&oacute;nde encontrarlos.', 20, 'Quimica, inorganica, elementos', '../imagenes/portadas/6.jpg'),
(7, 'Quimica inorganica. Volumen 2: Elementos de transicion', 2, 5, 5, 'El qu&iacute;mico actual debe saber lo suficiente para poder abordar cualquier problema en su &aacute;mbito, determinar las informaciones y datos necesarios para resolverlo, y saber d&oacute;nde encontrarlos.', 18.5, 'Ciencia, quimica, inorganica', '../imagenes/portadas/7.jpg'),
(8, 'Ense&ntilde;anza de la Fisica a traves de simulaciones', 3, 5, 2, 'Esta obra expone de forma amplia, pero tambi&eacute;n clara y concisa, los principios fundamentales de la F&iacute;sica b&aacute;sica a lo largo de catorce cap&iacute;tulos en los que se plantean demostraciones matem&aacute;ticas con todos los pasos seguidos.', 10, 'Fisica, matematicas, demostracion', '../imagenes/portadas/8.jpg'),
(9, 'Administracion de Oracle 11G', 3, 1, 2, 'Oracle Database 11g, la primera base de datos de la industria dice&ntilde;ada para grid computing, se encuentra disponible en una variedad de ediciones.', 25, 'Oracle, base de datos, computacion, sistemas', '../imagenes/portadas/9.jpg'),
(10, 'Tecnologia electrica (3 edicion)', 1, 1, 3, 'En esta tercera edici&oacute;n se mantienen los objetivos y la estructura de las dos anteriores, si bien se ha producido una notable actualizaci&oacute;n de los diferentes cap&iacute;tulos para adaptarlos al nuevo Reglamento Electrot&eacute;cnico de Baja Tensi&oacute;n de 2002.', 15, 'Electrica, ingenieria, tecnologia', '../imagenes/portadas/10.jpg'),
(11, 'Mecanica aplicada: Estatica y Cinematica', 1, 1, 2, 'El presente libro es una introducci&oacute;n a la programaci&oacute;n lineal en su aplicaci&oacute;n al modelado de situaciones asociadas a la planificaci&oacute;n, programaci&oacute;n y control de actividades. Se hace especial hincapi&eacute; en los aspectos metodol&oacute;gicos asociados, por lo que no s&oacute;lo se persigue obtener los valores num&eacute;ricos &oacute;ptimos.', 10, 'mecanica, numericos', '../imagenes/portadas/10.jpg'),
(12, 'Evolucion. Origen, Adaptacion y divergencia de las especies', 2, 5, 10, 'Desde la publicaci&oacute;n en 1859 del libro El Origen de las Especies, la teor&iacute;a de la evoluci&oacute;n se ha ido perfeccionando con nuevos an&aacute;lisis de los distintos niveles de organizaci&oacute;n que conforman la vida.', 15, 'evolucion, origen, adaptacion', '../imagenes/portadas/11.jpg'),
(13, 'Paleontologia', 3, 5, 1, 'Este es un libro que se orienta hacia la visi&oacute;n integradora de la Paleontolog&iacute;a. No est&aacute; concebido como compendio de datos de observaci&oacute;n, sino de hip&oacute;tesis e ideas con las que estos se interpretan.', 15.99, 'paleontologia, ideas, dinosaurio', '../imagenes/portadas/12.jpg'),
(14, 'Un largo camino a casa', 2, 2, 3, 'Por mucho que protejamos a los ni&ntilde;os, es inevitable que tengan alg&uacute;n tipo de miedo. Creo que no conozco a nadie que no tuviera miedo a algo o a alguien cuando era peque&ntilde;o.', 9.99, 'camino, casa, largo', '../imagenes/portadas/13.jpg'),
(15, 'La ni&ntilde;a del arrozal', 1, 2, 5, 'Wichi es una joven tailandesa de doce a&ntilde;os inteligente, alegre y extravertida. Feliz porque sus padres viven juntos y se aman, las cosas comienzan a empeorar el d&iacute;a que su madre, una hermosa mujer que con diecisiete a&ntilde;os ya hab&iacute;a ganado un concurso de belleza local, se deja arrastrar por el juego y empieza a gastar el poco dinero de que disponen. Cheonchai, el padre de Wichi, desesperado y alcoholizado.', 19.99, 'ni&ntilde;a, arrozal, vietnam', '../imagenes/portadas/14.jpg'),
(16, 'El amante biling&uuml;e', 2, 2, 3, 'Juan Mar&eacute;s, un so&ntilde;ador que se ha hecho a s&iacute; mismo, se ve enga&ntilde;ado y abandonado por su mujer, perteneciente a la alta burgues&iacute;a catalana. Este abandono lo hunde en la desesperaci&oacute;n. Acuciado por una enso&ntilde;aci&oacute;n enfermiza y obsesiva, concibe una delirante estratagema: hacerse pasar por un charnego pintoresco y fulero llamado Faneca, y reconquistar con esa personalidad usurpada a su ex mujer.', 14.99, 'amante, biling&uuml;e, latin lover', '../imagenes/portadas/15.jpg'),
(17, 'Casada a la fuerza', 2, 2, 2, 'En pleno siglo XXI y en ciudades tan cosmopolitas como Par&iacute;s, a&uacute;n se dan casos de pr&aacute;cticas tan ancestrales como el matrimonio de conveniencia. Leila s&oacute;lo ten&iacute;a veinte a&ntilde;os cuando le presentaron a su futuro esposo, un hombre que pr&aacute;cticamente le doblaba la edad y al que jam&aacute;s hab&iacute;a visto. Francesa de nacimiento pero de profundas ra&iacute;ces musulmanas, esta joven tuvo que someterse a su tradici&oacute;n y obedecer en silencio unas leyes no escritas que apenas entend&iacute;a.', 12.99, 'casada, fuerza, infeliz', '../imagenes/portadas/16.jpg'),
(18, 'Estudio en escarlata', 1, 6, 4, 'Un cad&aacute;ver hallado en extra&ntilde;as circunstancias en una casa deshabitada provoca que los agentes de polic&iacute;a de Scotland Yard se pierdan en divagaciones equivocadas. Y, por si fuera poco, un nuevo asesinato parece complicar a&uacute;n m&aacute;s la historia. Para resolver el misterio, habr&iacute;a que remontarse en el tiempo a otros asesinatos ocurridos hace 30 a&ntilde;os en la ciudad mormona de Salt Lake City.', 9.99, 'Estudio, escarlata', '../imagenes/portadas/18.jpg'),
(19, 'El misterioso caso de Styles', 2, 6, 5, 'Essex, Inglaterra. La millonaria Emily Inglethorp amanece muerta en su habitaci&oacute;n sin indicio alguno de violencia. Aunque la polic&iacute;a descarta que se trate de un asesinato, demasiadas rivalidades en la vieja mansi&oacute;n propiedad de la fallecida hacen pensar en un posible caso de envenenamiento que podr&iacute;a haber pasado desapercibido. Cuando el detective H&eacute;rcules Poirot llega para encargarse de la investigaci&oacute;n, se encuentra frente a frente con la avaricia, los celos, las tensiones y la ambici&oacute;n de una familia que aspira a heredar una fortuna en dinero y propiedades. Un marido infiel, su jovenc&iacute;sima amante, unos hijastros envidiosos, un extra&ntilde;o toxic&oacute;logo alem&aacute;n. Todos parecen sospechosos de haber acabado con la vida de Emily, aunque solo uno de ellos puede ser el asesino. Poirot deber&aacute; emplearse a fondo y usar todas sus armas para llegar al fondo de su primer caso literario.', 6, 'misterio, caso, Styles', '../imagenes/portadas/19.jpg'),
(20, 'El halcon maltes', 3, 6, 2, 'Sam Spade (Humphrey Bogart) recibe en su oficina de detective privado a una misteriosa dama, la se&ntilde;orita Ruth Wonderly (Mary Astor) que quiere investigar el paradero de su hermana, quien hab&iacute;a huido con un hombre. El socio de Sam (Jerome Cowan) se ofrece para buscar al hombre y seguir&aacute; discretamente a la mujer, pero es asesinado. Sam confronta a la clienta y resulta que el asunto de la desaparici&oacute;n de su hermana era mentira: el hombre que buscaba era su socio y puede tener en su poder una valiosa estatua de un halc&oacute;n.', 4.55, 'halcon, maltes, detective, homicidio', '../imagenes/portadas/20.jpg'),
(21, '50 Sombras De Grey', 1, 7, 25, 'Ella es una joven universitaria, inteligente, seria, estudiosa, amante de la literatura, y virgen. &Eacute;l es un empresario multimillonario, culto, gourmet, exquisito y exigente en todo... sobre todo en sus preferencias sexuales. Ana Steelno es m&aacute;s que una estudiante de veinti&uacute;n a&ntilde;os cuando se enamora de Christian Grey, un millonario guapo y elegante de mirada penetrante. Sin embargo, Grey no es el cl&aacute;sico pr&iacute;ncipe azul. Para que la relaci&oacute;n siga adelante, Ana debe someterse por contrato a la pr&aacute;ctica de una relaci&oacute;n sexual sadomasoquista en la cual &eacute;l ser&aacute; el dominante y ella la sometida. Porque Grey es un hombre cuyo pasado esconde muchas sombras, pero a quien Ana, dispuesta a todo por amor, tratar&aacute; de liberar de ellas.', 29.99, '50, sombras, Grey, pasion, romance, lujuria', '../imagenes/portadas/21.jpg'),
(22, 'Pideme Lo Que Quieras, Ahora y Siempre', 2, 7, 12, 'Despu&eacute;s de provocar su despido de la empresa M&uuml;ller, Judith est&aacute; dispuesta a alejarse para siempre de Eric Zimmerman. Para ello y para reconducir su vida decide refugiarse en casa de su padre, en Jerez. Atormentado por su marcha, Eric le sigue el rastro. El deseo contin&uacute;a latente entre ellos y las fantas&iacute;as sexuales est&aacute;n m&aacute;s vivas que nunca, pero esta vez ser&aacute; Judith quien le imponga sus condiciones, que &eacute;l acepta por el amor que le profesa. Todo parece volver a la normalidad, hasta que una llamada inesperada los obliga a interrumpir su reconciliaci&oacute;n y desplazarse hasta Munich. Lejos de su entorno, en una ciudad que le resulta hostil y con la aparici&oacute;n del sobrino de Eric, un contratiempo con el que no contaba, la joven deber&aacute; decidir si tiene que darle una nueva oportunidad o, por el contrario, comenzar un nuevo futuro sin &eacute;l.', 12, 'romance, fantasias, amor, pideme, siempre', '../imagenes/portadas/22.jpg'),
(23, 'Deseo Concedido', 3, 7, 6, 'Si algo tiene claro Lady Megan Philiphs es que ning&uacute;n hombre doblegar&aacute; su car&aacute;cter y su voluntad. Acostumbrada a cuidar y velar por la seguridad de sus hermanos, Megan es una joven intr&eacute;pida, de bello rostro moreno, a la que le divierten los retos y no le asusta el sonido del acero. Si algo tiene claro el guerrero Duncan McRae es que su vida es la guerra. Acostumbrado a liderar ej&eacute;rcitos y a que la gente agache atemorizada la cabeza a su paso, al llegar al castillo de Dunstaffnage para asistir a la boda de su amigo Axel McDougall, se encuentra con un tipo de enemigo muy distinto al que conoce: la joven e inquietante Megan. La palabra de un highlander en Escocia es su ley. Y la promesa de Duncan al abuelo de la muchacha une sus destinos y desemboca en una trepidante y accidentada boda de un a&ntilde;o y un d&iacute;a.', 3.99, 'Deseo, escocia, guerrero, romance, boda', '../imagenes/portadas/23.jpg'),
(24, '20.000 Leguas de viaje submarino', 1, 8, 10, 'Un monstruo marino ha puesto en marcha todas las alarmas, y finalmente se organiza una expedici&oacute;n para capturarlo, en la que figuran el c&eacute;lebre profesor de Historia Natural Pierre Aronnax, su ayudante Conseil y el experto arponero canadiense Ned Land, a bordo de la fragata estadounidense Abraham Lincoln. El monstruo resulta ser un sorprendente submarino a las &oacute;rdenes del capit&aacute;n Nemo, y el hecho de que deba mantener el secreto plantea un grave problema al capit&aacute;n en cuanto a la liberaci&oacute;n de los tres personajes principales. El capit&aacute;n Nemo, el sabio atormentado y desenga&ntilde;ado de la raza humana, en el que confluyen el individualismo libertario y un exacerbado sentido de la justicia, se ha convertido sin duda en uno de los paradigmas de la novela de aventuras y su presencia ya bastar&iacute;a para justificar el lugar de honor que ocupa Veinte mil leguas de viaje submarino en el g&eacute;nero. Y sin embargo contiene muchos otros alicientes: emoci&oacute;n, conocimiento, suspense, personajes inolvidables, lances inesperados... Uno de los hitos de la novela de aventuras y fuente inagotable para la posterior narrativa de anticipaci&oacute;n.', 5.35, '20.000, Leguas, viaje, submarino, monstruo', '../imagenes/portadas/24.jpg'),
(25, 'El Destino del Cazador', 2, 8, 9, 'En 1913, en v&iacute;speras de la Primera Guerra Mundial, Le&oacute;n Courtney, un joven gu&iacute;a de safaris se ve inmerso en una trama conspiratoria contra el Imperio Brit&aacute;nico a la que debe poner fin sin m&aacute;s medios que su propia sagacidad y valent&iacute;a. Le&oacute;n, en tierra de masais, tiene que decidir entre salvar a su pa&iacute;s o a la enigm&aacute;tica Eva, la mujer que ama y la que cambiar&aacute; para siempre su destino.', 13.69, 'Cazador, destino, guerra mundial, aventura', '../imagenes/portadas/25.jpg'),
(26, 'El Origen del Universo', 3, 8, 2, 'En El Origen del Universo los autores narran una maravillosa aventura por el c&oacute;smos donde mezclan una gran historia de aventuras con ciencia para ni&ntilde;os. El mayor experimento cient&iacute;fico de la Historia est&aacute; en marcha, y George y Annie lo ver&aacute;n desde primera fila. Acompa&ntilde;ar&aacute;n a Eric, el padre de Annie, que est&aacute; trabajando en el Centro Europeo de Investigaciones Nucleares, a Suiza. All&iacute; se encuentra el gran colisionador de part&iacute;culas, capaz de explorar los primeros instantes del universo: el Big Bang.', 10, 'Origen, universo, cosmos, cientifico, experimento', '../imagenes/portadas/26.jpg'),
(27, 'IT(Eso)', 1, 9, 35, 'Tras veintisiete a&ntilde;os de tranquilidad y lejan&iacute;a una antigua promesa infantil les hace volver al lugar en el que vivieron su infancia y juventud como una terrible pesadilla. Regresan a Derry para enfrentarse con su pasado y enterrar definitivamente la amenaza que los amarg&oacute; durante su ni&ntilde;ez. Saben que pueden morir, pero son conscientes de que no conocer&aacute;n la paz hasta que aquella cosa sea destruida para siempre.', 35, 'eso, it, terror, payaso, secuestro', '../imagenes/portadas/27.jpg'),
(28, 'El Gato Negro', 2, 9, 5, 'Todo comienza cuando el protagonista quien es un hombre que a pesar de estar casado con una esposa muy fiel y buena, se da a la vida del alcohol, &eacute;l es muy bueno a quien la bebida cambia paulatinamente, ama mucho a los animales hasta tal punto que su esposa lo ayuda a adquirir muchos de ellos, desde un perro hasta p&aacute;jaros, peces de colores y otros m&aacute;s, luego consiguen tener un gato negro quien es el animal preferido del personaje. Las cosas empiezan a cambiar debido a los excesos del alcohol del protagonista que a pesar de que nota que est&aacute; cambiando su personalidad se va tornando agresivo con los animales y hasta con su esposa llegando incluso a la violencia, comienza a maltratar a los animales y por &uacute;ltimo a su gato negro, al cual en un arranque de c&oacute;lera alcoh&oacute;lica le saca un ojo y posteriormente lo ahorca cruelmente, pero entonces suceden hechos misteriosos que arrastran al protagonista a tomar una severa decisi&oacute;n.', 17, 'gato, negro, alcohol, animales, misterio', '../imagenes/portadas/28.jpg'),
(29, 'Dracula', 3, 9, 25, 'Dr&aacute;cula parte de la existencia de Vlad Tepes, un personaje hist&oacute;rico situado en la Rumania del siglo XV, y conocido por su heroicidad contra la invasi&oacute;n otomana, pero tambi&eacute;n por su crueldad. A partir de esta historia y de no pocas leyendas acerca de &eacute;l, Bram Stoker escribe esta magistral novela en forma de diarios y cartas que los personajes principales van intercambi&aacute;ndose. Una obra trascendental de la literatura g&oacute;tica que abri&oacute; un nuevo camino en la novela de terror y que instaur&oacute; la figura del arist&oacute;crata transilvano como arquetipo del mal y modelo de seducci&oacute;n perversa, y sus p&aacute;ginas han sido fuente innagotable de innumerables adaptaciones cinematogr&aacute;ficas. Por fin una edici&oacute;n a la altura de la grandeza literaria de este cl&aacute;sico, profusamente ilustrada con grabados de la &eacute;poca. Dr&aacute;cula es uno de los personajes m&aacute;s conocidos del terror g&oacute;tico.', 45, 'Dracula, vampiro, sangre, inmortal, castillo', '../imagenes/portadas/29.jpg'),
(30, 'La nave de un millon de a&ntilde;os', 1, 10, 13, 'La nave de un mill&oacute;n de a&ntilde;os es la historia de un pu&ntilde;ado de inmortales en el decurso de las civilizaciones y culturas humanas. Un repaso completo a la Historia y a un posible futuro entre las estrellas. Un hito imprescindible en el desarrollo de la ciencia ficci&oacute;n contempor&aacute;nea: una novela sofisticada, precisa en el aspecto hist&oacute;rico, inteligente y emotiva, que ofrece una visi&oacute;n panor&aacute;mica de la Humanidad, del "homo sapiens" y del nuevo "homo inmortalis".', 7.99, 'nave, millon, ciencia ficcion, futuro', '../imagenes/portadas/30.jpg'),
(31, 'La radio de Darwin', 2, 10, 4, 'Un virus de transmisi&oacute;n sexual se expande sobre la tierra, provocando un alarmante n&uacute;mero de mutaciones en los fetos en gestaci&oacute;n que llevan a los ni&ntilde;os a nacer muertos. Sin embargo, los cambios que se aprecian en su organismo parecen indicar un fen&oacute;meno de especiaci&oacute;n, un dr&aacute;stico cambio evolutivo.', 5.99, 'radio, Darwin, virus, mutacion, evolucion', '../imagenes/portadas/31.jpg'),
(32, 'Las cronicas marcianas', 3, 10, 1, 'Esta colecci&oacute;n de relatos re&uacute;ne la cr&oacute;nica de la colonizaci&oacute;n de Marte por parte de una humanidad que abandona la Tierra en sucesivas oleadas de cohetes plateados y sue&ntilde;a con reproducir en el Planeta Rojo una civilizaci&oacute;n de perritos calientes, c&oacute;modos sof&aacute;s y limonada en el porche del atardecer. Pero los colonos tambi&eacute;n traen en su equipaje las enfermedades que diezmar&aacute;n a los marcianos y mostrar&aacute;n muy poco respeto por una cultura planetaria, misteriosa y fascinante, que &eacute;stos intentar&aacute;n proteger ante la rapacidad de los terr&iacute;colas.', 2.99, 'marcianas, marte, tierra, terricolas, cronicas', '../imagenes/portadas/32.jpg'),
(33, 'A sangre fria', 1, 11, 6, 'Seis a&ntilde;os le llev&oacute; al periodista y escritor estadounidense Truman Capote dar vida a esta novela que fuera finalmente publicada en el a&ntilde;o 1966. Aclamada por la cr&iacute;tica, la historia gira en torno a un m&uacute;ltiple asesinato. Un detallado trabajo de campo le permiti&oacute; a Capote dotar la captura, confesi&oacute;n, condena y posterior ahorcamiento de los autores del crimen de gran realismo.', 20, 'periodismo, historia, sangre, asesinato', '../imagenes/portadas/33.jpg'),
(34, 'Operacion masacre', 2, 11, 7, 'Una de las primeras novelas de no ficci&oacute;n escritas en espa&ntilde;ol. El libro, publicado en 1957, re&uacute;ne toda la investigaci&oacute;n del periodista argentino, Rodolfo Walsh, acerca de los hechos ocurridos el 9 de junio de 1956 en Buenos Aires. Tras dos generales sublevarse contra el gobierno de facto, que hab&iacute;a destituido a Per&oacute;n en septiembre de 1955, se produce lugar una brutal represi&oacute;n que tortura y acaba con la vida de varias personas.', 5.2, 'periodismo, historia, masacre, represion', '../imagenes/portadas/34.jpg'),
(35, 'Los suicidas del fin del mundo.', 3, 11, 15, 'Tambi&eacute;n de mano de una periodista argentina llega este libro de cr&oacute;nicas que logra narrar de manera inigualable la oleada de suicidios que entre los a&ntilde;os 1997 y 1999 tuvo lugar en la peque&ntilde;a localidad alejada de las grandes ciudades, Las Heras. Con un detallado trabajo de campo como trasfondo, Guerreiro logra conjugar la reconstrucci&oacute;n de estas tragedias con la rutina de una localidad pr&aacute;cticamente en el medio de la nada.', 35.98, 'periodismo, cronicas, suicidios, fin, mundo', '../imagenes/portadas/34.jpg'),
(36, 'El libro de la selva', 1, 12, 12, 'Mowgli es un humano... pero es solo un cachorro, un beb&eacute; indefenso que los lobos deciden criar como a uno de los suyos. Akela, el l&iacute;der de la manada, consigue que los dem&aacute;s lobos est&eacute;n de acuerdo con esa decisi&oacute;n, pero es una tregua temporal: Mowgli crece muy despacio para el ritmo de los lobos, y Akela no ser&aacute; l&iacute;der para siempre. El ni&ntilde;o tiene un gran aliado: Bagheera, la pantera, y un gran enemigo: Shere Khan, el tigre, que considera que Mowgli es su presa y le corresponde por derecho.', 25, 'selva, animales, pantera, oso, tigre, infantil', '../imagenes/portadas/36.jpg'),
(37, 'El peque&ntilde;o vampiro', 2, 12, 3, 'Anton ha conocido a R&uuml;diger, un vampiro de los de verdad. Las aventuras que siempre ha imaginado van a hacerse por fin realidad ante el asombro de sus padres: criptas secretas, vuelos nocturnos, cementerios abandonados...', 6, 'vampiro, peque&ntilde;o, infantil, cementerio', '../imagenes/portadas/37.jpg'),
(38, 'Momo', 3, 12, 8, 'Momo es una peque&ntilde;a ni&ntilde;a que vive en las ruinas de un anfiteatro de una gran ciudad italiana. Es fel&iacute;z, buena, cari&ntilde;osa, con muchos amigos, y tiene una gran virtud: la de saber escuchar. Por eso, es una persona a la que mucha gente acude para desahogarse y contar las penas, ya que ella es capaz de encontrar una soluci&ntilde;n para todos los problemas. Sin embargo, una amenaza se abalanza sobre la tranquilidad de la ciudad y pretende destru&iacute;r la paz de sus habitantes. Llegan los Hombres Grises, unos extra&ntilde;os seres que viven parasitando del tiempo de los hombres, y convencen a la ciudad para que les entregue su tiempo. Pero Momo, por su singular personalidad, constituir&aacute; el principal obst&aacute;culo para estos seres, de modo que se intentar&aacute;n deshacer de ella. Momo, con la ayuda de una tortuga y un extra&ntilde;o Due&ntilde;o del Tiempo se las arreglar&aacute; para salvar a sus amigos y devolver la normalidad a su ciudad, acabando para siempre con los hombres del tiempo.', 1.99, 'momo, italia, tiempo, infantil', '../imagenes/portadas/38.jpg'),
(39, 'Poder sin limites', 1, 13, 18, '"La vida pagar&aacute; cualquier precio que t&uacute; pidas." Esta sencilla m&aacute;xima muestra elocuentemente la teor&iacute;a b&aacute;sica de este libro: el problema esencial del desarrollo personal no est&aacute; en las circunstancias, sino en nuestra actitud vital. Solemos pedirle a la vida un precio bajo, limitando nuestras ambiciones, siendo presas de la frustraci&oacute;n o el miedo de ir m&aacute;s all&aacute;. Y esta actitud negativa es lo que Poder sin l&iacute;mites ayuda a combatir ense&ntilde; &aacute;ndonos el poder oculto del cerebro, los mecanismos correctos de relaci&oacute;n interpersonal e incluso h&aacute;bitos alimentarios adecuados para proporcionarnos el sistema de creencias y la s&oacute;lida confianza en nosotros mismos que nos permitir&aacute;n alcanzar el &eacute;xito.', 34.99, 'poder, limites, personal, habitos, vida', '../imagenes/portadas/39.jpg'),
(40, 'Inteligencia Emocional', 2, 13, 4, 'El libro demuestra c&oacute;mo la inteligencia emocional puede ser fomentada y fortalecida en todos nosotros, y c&oacute;mo la falta de la misma puede influir en el intelecto o arruinar una carrera. La inteligencia emocional nos permite tomar conciencia de nuestras emociones, comprender los sentimientos de los dem&aacute;s, tolerar las presiones y frustraciones que soportamos en el trabajo, acentuar nuestra capacidad de trabajar en equipo y adoptar una actitud emp&aacute;tica y social, que nos brindar&aacute; mayores posibilidades de desarrollo personal.', 24, 'inteligencia, emociones, personal, autoayuda', '../imagenes/portadas/40.jpg'),
(41, 'Tus zonas erroneas', 3, 13, 12, 'El estado de salud es un estado natural, y los medios para lograrlo est&aacute;n dentro de las posibilidades de cada uno. No proyectes tu insatisfacci&oacute;n en otros: la causa est&aacute; en ti, en las zonas err&oacute;neas de tu personalidad que te bloquean e impiden que te realices. En esta obra, el Dr. Wayne W. Dyer muestra d&oacute;nde se encuentran, qu&eacute; significan, ad&oacute;nde conducen y c&oacute;mo podemos superarlas. Esboza un camino para alcanzar la felicidad, un procedimiento que se basa en ser responsable y comprometerse con uno mismo. Y todo contado con la amenidad y sencillez de quien sabe que puede cooperar en la mejora de la vida de los dem&aacute;s.', 26, 'error, autoayuda, vida, fortaleza, superacion', '../imagenes/portadas/41.jpg'),
(42, '1080 recetas de cocina', 1, 14, 24, 'Con m&aacute;s de dos millones de ejemplares vendidos a lo largo de treinta a&ntilde;os, 1080 Recetas de Cocina ha sido el libro con el que tres generaciones de espa&ntilde;oles han aprendido a cocinar. Entre la numerosa y en algunos casos excelente bibliograf&iacute;a que ha ido apareciendo a lo largo del pasado siglo, el libro de Simone Ortega se ha convertido en el recetario m&aacute;s utilizado por todo tipo de personas: hombres y mujeres, aprendices y expertos. Tanto por su estructura como por la cuidadosa selecci&oacute;n de los ingredientes y la claridad de las explicaciones para la elaboraci&oacute;n de las recetas, y sobre todo, por la fiabilidad de los procedimientos culinarios empleados -todas las recetas salen-, el libro se ha convertido en el cl&aacute;sico por excelencia de nuestra cocina.', 39.99, 'cocina, recetas, comida, ingredientes', '../imagenes/portadas/42.jpg'),
(43, 'Mis smoothies favoritos de Isasaweis', 2, 14, 10, 'Lo que he disfrutado haciendo este libro, han sido meses mezclando ingredientes, probando smoothies, divirti&eacute;ndome much&iacute;simo, haci&eacute;ndome fan n&uacute;mero uno de estos batidos que de mano no me hab&iacute;an conquistado pero que a d&iacute;a de hoy forman ya parte de mi alimentaci&oacute;n. He recopilado en este libro m&aacute;s de cincuenta recetas de los que se han convertido en mis smoothies favoritos.', 25, 'smoothies, isasaweis, recetas, ingredientes', '../imagenes/portadas/43.jpg'),
(44, 'El arte de la cocina francesa', 3, 14, 12, 'Julia Child revolucion&oacute; la forma de cocinar en los hogares de todo el mundo. Tras estudiar en la reputada academia Le Cordon Bleu de Par&iacute;s, abri&oacute; su propia escuela de cocina con Simone Beck y Louisette Bertholle. Con ellas escribi&oacute; el primero de sus libros, El arte de la cocina francesa, que se convertir&iacute;a de inmediato en un best seller y a&ntilde;os despu&eacute;s en un cl&aacute;sico. Su programa de televisi&oacute;n The French Chef fue una revoluci&oacute;n para los amantes de la cocina del mundo entero, precursor del exitoso formato de los programas televisivos de cocina que conocemos hoy. Todo el mundo puede cocinar al estilo franc&eacute;s en cualquier parte del mundo con las instrucciones adecuadas escriben las se&ntilde;oras Beck, Bertholle, y Child. Y este es el libro que durante m&aacute;s de cincuenta a&ntilde;os ha ense&ntilde;ado c&oacute;mo hacerlo.', 30, 'cocina, francesa, arte, paris, chef', '../imagenes/portadas/44.jpg'),
(45, 'Futbol, dinamica de lo impensado', 1, 15, 6, 'Uno de los mejores libros de f&uacute;tbol nunca escritos. En oposici&oacute;n a la &eacute;poca en que los directores t&eacute;cnicos se adue&ntilde;an del juego y del negocio, Panzeri desgrana poco a poco la verdad total: el f&uacute;tbol es el jugador. &Eacute;l es su causa eficiente. Ni su imaginaci&oacute;n ni su ingenio deben limitarse. El autor propone adem&aacute;s un cambio en el sistema organizativo de torneos para darle al f&uacute;tbol una vivacidad e inter&eacute;s del que hoy carece...', 24.99, 'futbol, dinamica, tecnicos, juego, deporte', '../imagenes/portadas/45.jpg'),
(46, 'Canastas sagradas', 2, 15, 2, 'Canastas sagradas es una mirada al interior de la superior sabidur&iacute;a del trabajo en equipo del [que fue] primer entrenador de los Chicago Bulls, Phil Jackson (ahora entrenador de Los &Aacute;ngeles Lakers). En el coraz&oacute;n de este libro est&aacute; la filosof&iacute;a de Jackson sobre el baloncesto consciente y su cruzada de toda una vida para llevar la iluminaci&oacute;n al mundo competitivo del deporte profesional. Jackson, uno de los entrenadores con m&aacute;s &eacute;xitos en la historia de la NBA, ha desarrollado u nuevo paradigma de liderazgo basado en los principios orientales y en los Native American. En esta biograf&iacute;a inspiradora, repleta de historias de Michael Jordan, Scottie Pipen, Toni Kukoc, Dennis Rodman y otros miembros de los Bulls, Jackson revela c&oacute;mo respetar al enemigo y ser agresivo sin rabia o violencia; c&oacute;mo vivir en el momento y mantenerse calmadamente focalizado dentro de la niebla del caos, de manera que el yo se convierte en el servidor del nosotros.', 16, 'basketball, canasta, baloncesto, jordan, nba', '../imagenes/portadas/46.jpg'),
(47, 'Rafa, mi historia', 3, 15, 25, 'La haza&ntilde;a de Rafael Nadal de convertirse en el jugador m&aacute;s joven de la era de los abiertos de tenis en conquistar los cuatro torneos de Grand Slam es un hito de la escena deportiva contempor&aacute;nea. Nadal es individuo tan intenso como brillante, cuya naturaleza guerrera en la pista contrasta con su vulnerabilidad humana fuera de ella. Y se caracteriza por una extraordinaria disciplina y capacidad de sacrificio Estas memorias, escritas en colaboraci&oacute;n con el galardonado periodista John Carlin, nos revelan los entresijos de la infancia del mejor tenista espa&ntilde;ol de la historia, la centralidad de la familia en su vida, su evoluci&oacute;n como tenista y los altibajos profesionales y personales de su incre&iacute;ble trayectoria. Nadal nos relata golpe por golpe c&oacute;mo se forjaron triunfos memorables: la victoria en la final de Wimbledon de 2008 contra Roger Federer(El mejor partido de tenis jam&aacute;s visto, seg&uacute;n John McEnroe), y la del US Open de 2010 en la que venci&oacute; a Novak Djokovic. Y vemos c&oacute;mo ha afrontado lesiones que han llegado a amenazar su futuro profesional.', 37.89, 'nadal, deporte, tenis, grand slam', '../imagenes/portadas/47.jpg'),
(48, 'Edipo Rey', 2, 3, 9, 'Considerada por Arist&oacute;teles como la m&aacute;s perfecta de las tragedias griegas en muchos aspectos, Edipo Rey de S&oacute;focles (c. 496-406 a.C. ) es un drama de revelaci&oacute;n que propone la b&uacute;squeda de lo que se esconde tras las apariencias, la indagaci&oacute;n en la esencia de lo que uno es. La peste y una larga epidemia asolan Tebas. Tras la consulta al or&aacute;culo de Delfos, Edipo entender&aacute; que el remedio a ese mal exige vengar la muerte del anterior monarca, Layo. Con un manejo magistral de la iron&iacute;a tr&aacute;gica, el gran dramaturgo griego nos ofrece el paulatino desvelamiento de los detalles del ascenso del protagonista al trono, as&iacute; como el descubrimiento final de su condici&oacute;n de parricida y esposo de la viuda de su padre, su propia madre.', 10.99, 'rey, edipo, sofocles, tragedia', '../imagenes/portadas/48.jpg'),
(49, 'Prometeo Encadenado', 3, 3, 1, 'Tras robar el fuego para entregarlo a los hombres, Prometeo recibe una dura condena: Zeus lo manda encadenar a una roca del C&aacute;ucaso. All&iacute;, todas las ma&ntilde;anas, un &aacute;guila roe el h&iacute;gado del tit&aacute;n, que se regenera cada noche. Sin embargo, Prometeo resiste el castigo y se niega a revelar la profec&iacute;a que lo har&iacute;a libre: el anuncio de un matrimonio criminal que defenestrar&aacute; a Zeus. Gracias a Esquilo, la voz de Prometeo se alza como una voz enfrentada al poder desp&oacute;tico, una voz que favorece el bien com&uacute;n, una voz que ama el saber sobre todo lo dem&aacute;s.', 5.45, 'prometeo, dioses, zeus, lirica', '../imagenes/portadas/49.jpg'),
(50, 'Farreras Rozman. Medicina Interna', 2, 4, 15, 'Se trata del libro de Medicina Interna m&aacute;s representativo de la especialidad en castellano, publicado de forma ininterrumpida desde 1929. Es una obra dice&ntilde;ada desde sus or&iacute;genes para la docencia, y dirigida a estudiantes de medicina y a profesionales del &aacute;mbito de la Medicina Interna y sus respectivas especialidades.', 65, 'medicina, interna, salud', '../imagenes/portadas/50.jpg'),
(51, 'Atlas de anatomia humana', 3, 4, 8, 'Est&aacute; considerado como el bestseller indiscutible para el estudio de la anatom&iacute;a humana. La nueva edici&oacute;n, publicada en 2015, se adapta perfectamente a las nuevas necesidades de los estudiantes que afrontan la asignatura en los primeros a&ntilde;os del grado.', 70, 'anatomia, medicina, salud, estudio', '../imagenes/portadas/51.jpg');

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
(3, 2, '2017-05-20', '2017-05-23', '02:30:00', 65.3),
(4, 1, '2017-06-08', '2017-06-30', '10:05:26', 115),
(5, 1, '2017-06-08', '2017-06-30', '10:28:34', 30);

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
  MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
