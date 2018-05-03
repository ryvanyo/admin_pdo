-- MySQL dump 10.13  Distrib 5.6.25, for Win32 (x86)
--
-- Host: localhost    Database: tienda
-- ------------------------------------------------------
-- Server version	5.6.25

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` char(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Electrodomésticos'),(2,'Computadoras'),(3,'Laptops'),(4,'Limpieza'),(5,'Muebles'),(6,'Celulares'),(7,'Ropa'),(8,'Libros'),(9,'Juguetes'),(10,'Música'),(11,'Vehículos');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria_producto`
--

DROP TABLE IF EXISTS `categoria_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria_producto` (
  `id_categoria` bigint(20) unsigned NOT NULL,
  `id_producto` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id_categoria`,`id_producto`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria_producto`
--

LOCK TABLES `categoria_producto` WRITE;
/*!40000 ALTER TABLE `categoria_producto` DISABLE KEYS */;
INSERT INTO `categoria_producto` VALUES (1,1),(1,11),(1,21),(1,31),(1,40),(1,49),(1,51),(1,52),(1,71),(1,76),(1,91),(1,94),(1,99),(2,34),(2,57),(2,62),(2,86),(2,91),(3,6),(3,8),(3,9),(3,12),(3,18),(3,21),(3,30),(3,55),(3,58),(3,61),(3,65),(3,91),(4,37),(4,41),(4,55),(4,71),(4,79),(5,36),(5,37),(5,45),(5,46),(5,51),(5,56),(5,63),(5,81),(5,86),(6,9),(6,20),(6,24),(6,45),(6,46),(6,53),(6,61),(6,86),(6,90),(6,93),(6,100),(7,9),(7,27),(7,28),(7,29),(7,30),(7,44),(7,62),(7,67),(7,71),(7,75),(7,79),(7,90),(7,93),(8,7),(8,13),(8,34),(8,46),(8,48),(8,80),(8,88),(8,96),(9,21),(9,27),(9,36),(9,40),(9,54),(9,64),(9,66),(9,90),(9,96),(10,30),(10,40),(10,59),(10,60),(10,64),(10,84),(10,98),(11,1),(11,27),(11,30),(11,48),(11,68),(11,78),(11,93),(11,98);
/*!40000 ALTER TABLE `categoria_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` char(100) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `imagen` varchar(500) NOT NULL,
  `propietario` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (1,'Velit','Ut tincidunt orci quis lectus. Nullam suscipit, est ac facilisis',190.00,'',97),(2,'Fermentum','dui lectus rutrum urna, nec luctus felis',99.00,'',11),(3,'Feugiat','tempus, lorem fringilla ornare placerat, orci lacus vestibulum lorem,',102.00,'',48),(4,'Vitae','rutrum. Fusce dolor quam, elementum at,',123.00,'',81),(5,'Placerat','Duis a mi fringilla mi lacinia mattis. Integer eu lacus.',121.00,'',28),(6,'Sapien','non, lobortis quis, pede. Suspendisse dui. Fusce',143.00,'',96),(7,'Orci','feugiat metus sit amet ante.',30.00,'',53),(8,'Nunc','mi felis, adipiscing fringilla, porttitor vulputate, posuere vulputate,',72.00,'',82),(9,'Ante','Phasellus at augue id ante dictum cursus. Nunc mauris elit,',91.00,'',13),(10,'Ornare','Morbi metus. Vivamus euismod urna. Nullam lobortis quam',186.00,'',9),(11,'Nullam','eu lacus. Quisque imperdiet, erat nonummy',181.00,'',93),(12,'Pellentesque','natoque penatibus et magnis dis',177.00,'',91),(13,'Feugiat','congue. In scelerisque scelerisque dui. Suspendisse ac metus vitae velit',68.00,'',97),(14,'Augue','nulla. Cras eu tellus eu augue',122.00,'',10),(15,'Libero','Duis a mi fringilla mi lacinia mattis. Integer eu lacus.',188.00,'',3),(16,'Neque','Mauris blandit enim consequat purus. Maecenas libero est, congue a,',25.00,'',69),(17,'Ullamcorper','eu, eleifend nec, malesuada ut, sem.',133.00,'',42),(18,'Viverra','semper cursus. Integer mollis. Integer',137.00,'',26),(19,'Ultrices','a, arcu. Sed et libero. Proin',179.00,'',95),(20,'Elit','non leo. Vivamus nibh dolor,',93.00,'',5),(21,'Mauris','dictum augue malesuada malesuada. Integer id magna et ipsum',121.00,'',60),(22,'Vestibulum','elit, a feugiat tellus lorem',52.00,'',73),(23,'Hendrerit','et magnis dis parturient montes, nascetur ridiculus',197.00,'',85),(24,'Nulla','sagittis augue, eu tempor erat neque non',71.00,'',42),(25,'Amet','lectus pede et risus. Quisque libero lacus, varius',104.00,'',30),(26,'Condimentum','libero est, congue a, aliquet vel, vulputate',164.00,'',79),(27,'Fusce','cursus luctus, ipsum leo elementum sem,',41.00,'',31),(28,'Mauris','luctus aliquet odio. Etiam ligula tortor,',144.00,'',24),(29,'Mauris','sollicitudin commodo ipsum. Suspendisse non leo. Vivamus nibh dolor,',147.00,'',97),(30,'Quis','ipsum primis in faucibus orci luctus et ultrices posuere',45.00,'',16),(31,'Nibh','venenatis a, magna. Lorem ipsum dolor sit amet,',109.00,'',76),(32,'Accumsan','tellus non magna. Nam ligula elit,',153.00,'',9),(33,'Accumsan','et nunc. Quisque ornare tortor',138.00,'',91),(34,'Mattis','vitae purus gravida sagittis. Duis gravida.',158.00,'',79),(35,'Quis','lorem semper auctor. Mauris vel turpis. Aliquam',144.00,'',14),(36,'Fringilla','Cras eget nisi dictum augue malesuada malesuada. Integer',184.00,'',98),(37,'Justo','diam. Duis mi enim, condimentum eget, volutpat ornare, facilisis',122.00,'',17),(38,'Quis','fermentum arcu. Vestibulum ante ipsum primis in faucibus orci luctus',79.00,'',96),(39,'Turpis','Proin eget odio. Aliquam vulputate ullamcorper magna. Sed eu eros.',177.00,'',34),(40,'Vehicula','et pede. Nunc sed orci lobortis augue',197.00,'',78),(41,'Nulla','quam vel sapien imperdiet ornare. In faucibus. Morbi vehicula.',162.00,'',30),(42,'Facilisi','montes, nascetur ridiculus mus. Proin vel arcu eu odio tristique',76.00,'',48),(43,'Nulla','ornare tortor at risus. Nunc ac sem ut dolor',42.00,'',68),(44,'Lorem','cursus. Integer mollis. Integer tincidunt',66.00,'',34),(45,'Condimentum','adipiscing elit. Etiam laoreet, libero',174.00,'',90),(46,'Mollis','ac turpis egestas. Fusce aliquet magna',69.00,'',98),(47,'Scelerisque','ornare lectus justo eu arcu. Morbi sit amet massa.',152.00,'',21),(48,'Neque','hendrerit a, arcu. Sed et libero. Proin',124.00,'',9),(49,'Orci','Ut sagittis lobortis mauris. Suspendisse aliquet molestie',168.00,'',45),(50,'Morbi','Donec feugiat metus sit amet ante. Vivamus non lorem',57.00,'',78),(51,'Egestas','Proin vel arcu eu odio tristique pharetra. Quisque ac libero',172.00,'',81),(52,'Rhoncus','Morbi sit amet massa. Quisque porttitor eros nec',25.00,'',41),(53,'Amet','amet, risus. Donec nibh enim, gravida sit amet,',120.00,'',91),(54,'Neque','Nulla semper tellus id nunc interdum feugiat.',109.00,'',49),(55,'Mollis','vel est tempor bibendum. Donec felis orci, adipiscing non,',186.00,'',19),(56,'Maecenas','scelerisque neque. Nullam nisl. Maecenas',193.00,'',98),(57,'Commodo','convallis dolor. Quisque tincidunt pede ac',119.00,'',19),(58,'Eros','ultrices. Duis volutpat nunc sit amet metus. Aliquam erat volutpat.',144.00,'',18),(59,'Semper','eget mollis lectus pede et risus. Quisque',98.00,'',57),(60,'Velit','sociis natoque penatibus et magnis dis parturient montes, nascetur',65.00,'',45),(61,'Justo','mauris erat eget ipsum. Suspendisse sagittis. Nullam vitae diam.',151.00,'',81),(62,'Interdum','et ultrices posuere cubilia Curae; Phasellus ornare.',66.00,'',16),(63,'Sodales','congue turpis. In condimentum. Donec at arcu. Vestibulum ante',172.00,'',24),(64,'Vehicula','faucibus. Morbi vehicula. Pellentesque tincidunt',181.00,'',9),(65,'Tempus','Nunc mauris. Morbi non sapien molestie',68.00,'',25),(66,'Nulla','convallis ligula. Donec luctus aliquet odio. Etiam',189.00,'',35),(67,'Vulputate','id, mollis nec, cursus a, enim. Suspendisse aliquet,',168.00,'',27),(68,'Felis','leo. Morbi neque tellus, imperdiet non, vestibulum nec, euismod in,',129.00,'',70),(69,'Tristique','nibh. Aliquam ornare, libero at',142.00,'',83),(70,'Tincidunt','id, libero. Donec consectetuer mauris id sapien.',167.00,'',66),(71,'Donec','nostra, per inceptos hymenaeos. Mauris',137.00,'',18),(72,'Molestie','ac metus vitae velit egestas lacinia. Sed',150.00,'',58),(73,'Eget','Cum sociis natoque penatibus et magnis dis parturient',55.00,'',14),(74,'Maximus','amet metus. Aliquam erat volutpat. Nulla facilisis.',197.00,'',54),(75,'Aliquam','nunc interdum feugiat. Sed nec metus',179.00,'',82),(76,'Nisi','tincidunt, neque vitae semper egestas, urna justo faucibus',124.00,'',27),(77,'Arcu','turpis. In condimentum. Donec at arcu. Vestibulum ante',105.00,'',5),(78,'Finibus','blandit mattis. Cras eget nisi',94.00,'',60),(79,'Magna','cubilia Curae; Phasellus ornare. Fusce mollis.',113.00,'',21),(80,'Ipsum','sed dui. Fusce aliquam, enim nec tempus scelerisque, lorem',52.00,'',92),(81,'Risus','magna. Phasellus dolor elit, pellentesque a, facilisis non, bibendum sed,',147.00,'',69),(82,'Ultricies','placerat, augue. Sed molestie. Sed',130.00,'',45),(83,'Commodo','lacus pede sagittis augue, eu tempor erat neque non quam.',108.00,'',73),(84,'Metus','enim nec tempus scelerisque, lorem ipsum sodales purus, in molestie',32.00,'',90),(85,'Porta','arcu. Morbi sit amet massa. Quisque porttitor eros nec tellus.',156.00,'',100),(86,'Proin','et libero. Proin mi. Aliquam gravida mauris ut mi.',146.00,'',65),(87,'Mollis','quam a felis ullamcorper viverra. Maecenas iaculis',42.00,'',35),(88,'Auctor','turpis. Nulla aliquet. Proin velit.',96.00,'',25),(89,'Nunc','Quisque ac libero nec ligula consectetuer rhoncus.',181.00,'',75),(90,'Imperdiet','in, tempus eu, ligula. Aenean euismod mauris eu elit.',107.00,'',16),(91,'Fermentum','Aliquam auctor, velit eget laoreet posuere, enim',153.00,'',18),(92,'Vestibulum','semper. Nam tempor diam dictum',107.00,'',99),(93,'Mollis','adipiscing, enim mi tempor lorem, eget',100.00,'',88),(94,'Sagittis','a ultricies adipiscing, enim mi tempor lorem, eget mollis lectus',68.00,'',34),(95,'Sapien','tempor bibendum. Donec felis orci,',180.00,'',91),(96,'Dictum','Sed eu nibh vulputate mauris sagittis placerat.',47.00,'',23),(97,'Diam','Proin non massa non ante',73.00,'',48),(98,'Sagittis','placerat, augue. Sed molestie. Sed id risus quis',192.00,'',45),(99,'Nunc','dolor. Nulla semper tellus id nunc interdum feugiat. Sed',157.00,'',28),(100,'Tempus','Cras sed leo. Cras vehicula aliquet libero. Integer',142.00,'',1);
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` char(100) NOT NULL,
  `apellido` char(100) NOT NULL,
  `email` char(255) NOT NULL,
  `login` char(50) NOT NULL,
  `password` char(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=MyISAM AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Oprah','Randolph','dictum@arcuSed.co.uk','euismod','XKE27TUE8KK'),(2,'Byron','Fernandez','sed.turpis.nec@urnajusto.ca','curae;','LXM20CHU4LK'),(3,'August','Matthews','bibendum.fermentum@vulputate.ca','cubilia','NTA93YRA5OI'),(4,'Josiah','Byers','dolor.sit@diamSeddiam.net','netus','SOD52MVR0TX'),(5,'Teagan','Noel','hymenaeos@nonummyacfeugiat.ca','senectus','HGE56PNU6DY'),(6,'Jamal','Sloan','vel@Crasdolor.org','habitant','HKE53UAF2DK'),(7,'Chancellor','Levy','lobortis.ultrices.Vivamus@eratinconsectetuer.edu','eleifend','GDH02JTM3ZJ'),(8,'Kennedy','Mcfarland','adipiscing.lobortis.risus@Donectempor.co.uk','aenean','NII51UXK0BE'),(9,'Gil','Mcfarland','vel.venenatis@lacinia.com','nullam','MZS15DMH7AX'),(10,'Macon','Melton','interdum.feugiat.Sed@fermentumrisus.ca','congue','UVU11SEB7XX'),(11,'Gil','Bass','justo.Praesent.luctus@quamelementumat.com','condimentum','ESD48UBL0HG'),(12,'Amity','Holden','Nullam.enim.Sed@sit.ca','vivamus','LBJ00VVB5UE'),(13,'Keiko','Robertson','odio.Phasellus.at@imperdietullamcorperDuis.ca','tempus','VNE43BDE4EX'),(14,'Stuart','Webb','eget.laoreet@maurissapien.net','tortor','IBI90END3NF'),(15,'Amelia','Strong','libero@iaculislacuspede.edu','maximus','RXA81BMB9SW'),(16,'Cecilia','Espinoza','vel@atnisiCum.net','quam','XDP07VZZ4TB'),(17,'Macey','Buck','egestas.Duis.ac@nibh.ca','fermentum','ZSR93UEE0SD'),(18,'Jescie','Reeves','neque@eleifendnecmalesuada.org','morbi','OHU64XBS2VH'),(19,'Tad','Walton','pede.Suspendisse.dui@egetdictumplacerat.com','dictum','NOK44NZF8KF'),(20,'Melissa','Huff','a.tortor.Nunc@ligulaconsectetuer.ca','ornare','GHQ40LSV1DS'),(21,'Quinn','Reeves','facilisis.eget.ipsum@aliquameros.com','neque','OSM15VFJ5FD'),(22,'Jennifer','Rose','Aliquam@egestas.edu','augue','FBK03ROP0PJ'),(23,'Kelly','Diaz','egestas.Fusce@purusDuiselementum.net','accumsan','UEP29DMA8SH'),(24,'Noelani','Burke','cubilia.Curae.Phasellus@placeratvelitQuisque.org','suscipit','YUJ51VAA5AU'),(25,'Drake','Myers','dis@ultricesposuere.net','cras','RMX36MBN3FM'),(26,'Prescott','Curry','semper.rutrum@Donecluctusaliquet.co.uk','semper','ZLO38URJ5QO'),(27,'Kyle','Carey','augue@tristique.ca','ultrices','IBP78EXG3VX'),(28,'Ryan','Calderon','arcu@lectusante.com','placerat','OSX63UEZ4HT'),(29,'Lewis','Hubbard','Suspendisse.dui.Fusce@pede.co.uk','felis','YDF45WUX5IE'),(30,'Shaeleigh','Mcbride','mi@elit.co.uk','proin','AJQ58RYN3HI'),(31,'Malcolm','Craig','ullamcorper.viverra@tempus.co.uk','porta','YKZ79KLU8SS'),(32,'Kellie','Flynn','nec.mollis@Aliquamerat.edu','maecenas','NQQ54INP7TK'),(33,'Dacey','Spence','hendrerit.a@sempertellus.co.uk','integer','UAX98YVF3TA'),(34,'Kessie','Gibson','tincidunt@eros.com','viverra','MBJ04HBI5WF'),(35,'McKenzie','Wilcox','pede@Loremipsum.ca','finibus','ACV08TTN2ES'),(36,'Bell','Noel','a.scelerisque@Phasellus.ca','rutrum','DET47KQO1MI'),(37,'Jane','Joseph','lorem@velitdui.co.uk','lectus','ZWS54RZJ2NA'),(38,'Ori','Dillon','Nulla@antedictumcursus.co.uk','auctor','WXF82VAD0AK'),(39,'Buckminster','Norton','torquent@iaculisquis.com','libero','OXX64QDV9XY'),(40,'Doris','Moore','nec.eleifend.non@euaccumsan.com','facilisis','VWK61PSO6YT'),(41,'Noelle','Hopkins','in.faucibus@Donec.ca','pulvinar','LMU46JGK0WQ'),(42,'Xanthus','Murray','hendrerit@vel.edu','donec','MLM03EPR6VD'),(43,'Scarlett','Simon','massa.rutrum@Integer.org','magna','ORN84TVB2HG'),(44,'Melanie','Mcknight','non@dui.net','urna','FGL08GUP7EE'),(45,'Daniel','Edwards','ipsum.dolor.sit@est.edu','imperdiet','VWH53BSP1VQ'),(46,'Althea','Dunlap','neque.vitae@natoquepenatibuset.net','posuere','LKE14PBU3HP'),(47,'Chanda','Merritt','tellus.Nunc@nisi.com','nisi','BQV18NOJ9QY'),(48,'Laith','Salinas','tellus@Etiam.net','sollicitudin','EPX10DTL4PS'),(49,'Nola','Santana','diam@malesuadafames.org','mauris','PAD83TRO4ZW'),(50,'Allen','Briggs','enim.Curabitur@Suspendissenonleo.org','dapibus','CUC84QMC3AC'),(51,'Plato','Wilkerson','vestibulum@in.edu','erat','FOL49PWJ4TF'),(52,'Cairo','Gomez','lacus@telluslorem.net','arcu','QIV68DGY9MS'),(53,'Allen','Valentine','cubilia.Curae.Donec@luctusfelis.co.uk','elementum','IBV60XMX1FD'),(54,'Sierra','Bauer','molestie@augue.edu','egestas','LSB22NWR7QK'),(55,'Xerxes','Paul','Sed@vehiculaetrutrum.edu','iaculis','FUQ98VQV7FG'),(56,'Louis','Burch','fringilla.euismod.enim@acipsum.net','nam','ZUT62FUW9MY'),(57,'Tucker','Rivas','nibh.vulputate@turpisAliquamadipiscing.net','mattis','BHE95ETB6CT'),(58,'Blaine','Gillespie','magnis.dis.parturient@posuerevulputate.net','molestie','CDL35ZYW1DE'),(59,'Ingrid','Hancock','commodo.at@enimNuncut.org','ultricies','DRX47ZDT1WX'),(60,'Jana','Alston','ut@convallisin.co.uk','curabitur','QVI71BWT5DD'),(61,'Sonia','Osborn','felis.Nulla.tempor@blandit.ca','turpis','LFY94ZTA5IY'),(62,'Clayton','Holder','eleifend.Cras.sed@sitamet.co.uk','nisl','IYC96XDU6SF'),(63,'Meghan','Heath','mi.ac@ametfaucibus.co.uk','sodales','GRN02UNU5DT'),(64,'Jakeem','West','a@facilisisSuspendissecommodo.edu','tincidunt','VHB95LCF0QA'),(65,'Bevis','Lowe','aliquam.arcu.Aliquam@eu.edu','tempor','PMQ88KRJ6SH'),(66,'Leonard','Rivers','Integer.eu@bibendumullamcorperDuis.edu','lacinia','NLR91WKR7LW'),(67,'Hiram','Mosley','euismod@at.ca','pharetra','QNO44OGV7AE'),(68,'Jessica','Page','nisl.Nulla.eu@FuscemollisDuis.edu','at','PEL44BIF5CI'),(69,'Porter','Mcintosh','sit.amet.lorem@Proinvelarcu.org','aliquet','ZGJ68XYD3XC'),(70,'Kaye','Murray','dignissim@ametrisus.org','ex','TQS03YYY2FE'),(71,'Zahir','Garcia','In@dictumeueleifend.org','himenaeos','KAY25JNW6XU'),(72,'Trevor','Dickson','sagittis@odioauctorvitae.org','inceptos','SIU25STN8WZ'),(73,'Maris','Griffin','est@sitametconsectetuer.org','nostra','MLB90MQY8WS'),(74,'Lester','Pittman','neque@parturient.co.uk','conubia','YDL59FVU6FW'),(75,'Edward','Hodges','eu.elit.Nulla@magnaNam.net','per','QYP27LNO0DG'),(76,'Felicia','Anthony','amet@adipiscingenim.org','torquent','NFE44GTM1ZH'),(77,'Kuame','Chase','interdum.Nunc.sollicitudin@consectetueradipiscing.edu','litora','FTX85KMO1LA'),(78,'Ezekiel','Knox','tincidunt.congue.turpis@magnaLorem.org','ad','WMS00RIZ3RF'),(79,'Talon','Acosta','nec.imperdiet@montes.co.uk','sociosqu','HWL95YAB3TM'),(80,'Lacy','Blackburn','est@eutellusPhasellus.com','taciti','YLO92NAK9LU'),(81,'Colby','Dorsey','Nulla@ametlorem.ca','aptent','HMI08UHK0YH'),(82,'Luke','Wright','sagittis.augue.eu@miAliquam.co.uk','class','DJC29YNZ0UA'),(83,'Galena','Gamble','erat.eget@semmagnanec.ca','mollis','WRV71WLA4WH'),(84,'Gareth','Bowman','Duis@ornare.org','phasellus','TLG76RJR2AS'),(85,'Amery','Cote','ultrices.posuere.cubilia@aliquetdiam.com','cursus','SHQ06GAX3BU'),(86,'Brittany','Taylor','vitae.purus@dui.co.uk','lacus','EBX90GTK3IB'),(87,'Kalia','Morrow','malesuada.ut.sem@dui.co.uk','blandit','BDE74KSY7FE'),(88,'Brynne','Bright','nibh@nisiAeneaneget.net','eu','BFN72PCP7ZR'),(89,'Jordan','Gilmore','dictum.eleifend@pretiumaliquetmetus.org','est','OPI39EQN9MB'),(90,'Kibo','Schroeder','morbi.tristique@enimnec.com','sem','GRL63ENJ1SU'),(91,'Cyrus','Petty','purus.ac.tellus@liberonec.net','varius','YXB81LIP3WC'),(92,'Berk','Woodard','enim.condimentum.eget@aauctornon.org','justo','HKL51SKX0WA'),(93,'Chloe','Workman','mauris.Suspendisse.aliquet@per.ca','eros','EMZ12DBS4JZ'),(94,'Nash','Love','Duis.cursus@quama.org','vulputate','UIK66NJV2WO'),(95,'Adena','Vincent','pretium.aliquet@erateget.ca','quisque','DIM91ENK5XN'),(96,'Kaseem','Gould','Duis@dictum.co.uk','lobortis','NJT50QPM3OW'),(97,'Quinn','York','sapien.Nunc.pulvinar@suscipitnonummyFusce.org','ligula','PHB43NLX8PL'),(98,'Boris','Woodard','quam@neque.co.uk','consectetur','NRM27SEM4UN'),(99,'Jared','Lane','porttitor.tellus@Nunc.org','fusce','ZHY66OBU3HR'),(100,'Ivor','Bowers','sed.libero@dictumplacerataugue.net','quis','RBZ73TTT4WH');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-03  3:52:57
