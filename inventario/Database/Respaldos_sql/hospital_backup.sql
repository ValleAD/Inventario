DROP TABLE detalle_almacen;

CREATE TABLE `detalle_almacen` (
  `codigoalmacen` int(3) NOT NULL AUTO_INCREMENT,
  `codigo` int(15) NOT NULL,
  `nombre` mediumtext NOT NULL,
  `unidad_medida` mediumtext NOT NULL,
  `cantidad_solicitada` decimal(6,2) NOT NULL DEFAULT 0.00,
  `cantidad_despachada` decimal(6,2) NOT NULL DEFAULT 0.00,
  `tb_almacen` int(20) NOT NULL,
  `precio` decimal(6,2) NOT NULL DEFAULT 0.00,
  PRIMARY KEY (`codigoalmacen`),
  KEY `fk_tb_almacen_detalle_almacen` (`tb_almacen`),
  CONSTRAINT `fk_tb_almacen_detalle_almacen` FOREIGN KEY (`tb_almacen`) REFERENCES `tb_almacen` (`codAlmacen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




DROP TABLE detalle_bodega;

CREATE TABLE `detalle_bodega` (
  `codigodetallebodega` int(3) NOT NULL AUTO_INCREMENT,
  `codigo` int(15) NOT NULL,
  `descripcion` mediumtext NOT NULL,
  `unidad_medida` mediumtext NOT NULL DEFAULT 'C/U',
  `stock` decimal(6,2) unsigned NOT NULL DEFAULT 0.00,
  `cantidad_despachada` decimal(6,2) NOT NULL DEFAULT 0.00,
  `precio` decimal(6,2) NOT NULL DEFAULT 0.00,
  `odt_bodega` int(15) DEFAULT NULL,
  PRIMARY KEY (`codigodetallebodega`),
  KEY `fk_tb_bodega_detalle_bodega` (`odt_bodega`),
  CONSTRAINT `fk_tb_bodega_detalle_bodega` FOREIGN KEY (`odt_bodega`) REFERENCES `tb_bodega` (`codBodega`)
) ENGINE=InnoDB AUTO_INCREMENT=495 DEFAULT CHARSET=utf8mb4;

INSERT INTO detalle_bodega VALUES("342","70121708","MEDIDOR DE FLUJO DE COMBUSTIBLE, DIGITAL","C/U","1.00","1.00","99.99","5");
INSERT INTO detalle_bodega VALUES("343","70140024","ABRAZADERA DE ACERO INOXIDABLE SIN FIN PARA MANGUE","C/U","2.00","2.00","0.80","32");
INSERT INTO detalle_bodega VALUES("344","70212414","ANCLA PLASTICA DE 5/16\"","C/U","4.00","4.00","0.00","33");
INSERT INTO detalle_bodega VALUES("345","70212483","TORNILLO GOLOSO DE 1\" X 10 mm","C/U","4.00","4.00","0.03","40");
INSERT INTO detalle_bodega VALUES("346","70213315","BROCHA DE 2\"","C/U","1.00","1.00","0.50","42");
INSERT INTO detalle_bodega VALUES("347","70205886","TUBO LED DE 18 WATTS, T8, 120 VOLTIOS","C/U","18.00","18.00","3.80","45");
INSERT INTO detalle_bodega VALUES("348","70205288","SOPORTE PARA LAMPARA FLOURESCENTE TIPO RIEL","C/U","18.00","18.00","0.50","46");
INSERT INTO detalle_bodega VALUES("349","70205090","CABLE ELECTRICO TSJ 14/2 (VULCAN)","mts","18.00","18.00","0.70","102");
INSERT INTO detalle_bodega VALUES("350","70205572","CINTA AISLANTE # 23, ROLLO","C/U","1.00","1.00","14.50","113");
INSERT INTO detalle_bodega VALUES("351","70212423","TORNILLO PARA TABLAROCA DE 1/2\"","cto","30.00","30.00","2.00","123");
INSERT INTO detalle_bodega VALUES("352","70208527","CHAPA CILÍNDRICA DE PALANCA CON LLAVE","C/U","2.00","2.00","22.30","148");
INSERT INTO detalle_bodega VALUES("353","70211071","TUBO DE ABASTO DE ACERO INOXIDABLE PARA SANITARIO","C/U","1.00","1.00","2.60","151");
INSERT INTO detalle_bodega VALUES("354","70211049","VÁLVULA PARA DUCHA DE 1 /2\"","C/U","1.00","1.00","11.40","170");
INSERT INTO detalle_bodega VALUES("355","70208492","BRAZO HIDRAULICO TIPO LIVIANO PARA CIERRE DE PUERT","C/U","1.00","1.00","24.50","179");
INSERT INTO detalle_bodega VALUES("356","70208300","TABLA ROCA DE YESO PARA INTERIORES DE 1.22 METROS","C/U","10.00","10.00","8.56","188");
INSERT INTO detalle_bodega VALUES("357","70208307","POSTE METÁLICO GALVANIZADO DE 3.05 METROS PARA TAB","C/U","20.00","20.00","1.90","209");
INSERT INTO detalle_bodega VALUES("358","70212426","TORNILLO PARA TABLAROCA DE 1 1/2\"","C/U","200.00","200.00","0.02","215");
INSERT INTO detalle_bodega VALUES("359","70212020","CLAVO CORRIENTE DE 1\" CON CABEZA","lb","30.00","30.00","2.00","218");
INSERT INTO detalle_bodega VALUES("360","70212413","ANCLA PLASTICA DE 3/8\"","C/U","50.00","50.00","0.00","224");
INSERT INTO detalle_bodega VALUES("361","70212829","PEGAMENTO ACERO PLASTICO, TUBO","C/U","1.00","1.00","9.70","228");
INSERT INTO detalle_bodega VALUES("362","70212483","TORNILLO GOLOSO DE 1\" X 10 mm","C/U","50.00","50.00","0.03","229");
INSERT INTO detalle_bodega VALUES("363","70210289","PLYWOOD BANACK CLASE B DE 4 PIES X 8 PIES X 1/4\",","C/U","1.00","1.00","25.05","230");
INSERT INTO detalle_bodega VALUES("364","70212454","RODO DE 8\" CON BASE FIJA","C/U","2.00","2.00","15.00","231");
INSERT INTO detalle_bodega VALUES("365","70211145","CAMISA DE 2\" P.V.C","C/U","2.00","2.00","1.20","236");
INSERT INTO detalle_bodega VALUES("366","70212716","HOJA DE SIERRA PARA HIERRO DIENTE FINO","C/U","1.00","1.00","2.20","245");
INSERT INTO detalle_bodega VALUES("367","70211309","PEGAMENTO PARA P.V.C, 1 /8 DE GALÓN","C/U","1.00","1.00","9.00","255");
INSERT INTO detalle_bodega VALUES("368","70212763","LIJA PARA AGUA No. 100, PLIEGO","C/U","1.00","1.00","0.50","257");
INSERT INTO detalle_bodega VALUES("369","70211104","CODO LISO DE 2\" X 90 DE P.V.C.","C/U","2.00","2.00","0.90","260");
INSERT INTO detalle_bodega VALUES("370","70211155","TUBERÍA DE 2\" DE 160 P.S.I. DE P.V.C","mts","1.00","1.00","1.50","263");
INSERT INTO detalle_bodega VALUES("371","70225269","GRASA","lb","1.00","1.00","10.00","264");
INSERT INTO detalle_bodega VALUES("372","70120211","CAPACITOR DE MARCHA DE 5O MFD, 440 VAC","C/U","1.00","1.00","4.50","268");
INSERT INTO detalle_bodega VALUES("373","70120212","CAPACITOR DE MARCHA DE 5MFD 370V","C/U","1.00","1.00","1.50","269");
INSERT INTO detalle_bodega VALUES("374","70208110","CELOSÍA DE VIDRIO NEVADO DE 1 METRO","C/U","30.00","30.00","1.30","273");
INSERT INTO detalle_bodega VALUES("375","70212748","LIJA PARA HIERRO No. 80,PLIEGO","C/U","1.00","1.00","0.80","278");
INSERT INTO detalle_bodega VALUES("376","70208115","OPERADOR DE VENTANA","C/U","11.00","11.00","2.50","280");
INSERT INTO detalle_bodega VALUES("377","70211071","TUBO DE ABASTO DE ACERO INOXIDABLE PARA SANITARIO","C/U","1.00","1.00","2.60","281");
INSERT INTO detalle_bodega VALUES("378","70211051","VÁLVULA DE CONTROL CROMADA DE 1 / 2\"A LA PARED","C/U","1.00","1.00","2.50","282");
INSERT INTO detalle_bodega VALUES("379","70211900","KIT DE ACCESORIOS PARA SERVICIO SANITARIO STANDARD","C/U","1.00","1.00","5.70","284");
INSERT INTO detalle_bodega VALUES("380","70211005","SANITARIO COLOR BLANCO COMPLETO STANDARD","C/U","2.00","2.00","52.40","287");
INSERT INTO detalle_bodega VALUES("381","70211049","VÁLVULA PARA DUCHA DE 1 /2\"","C/U","3.00","3.00","11.40","294");
INSERT INTO detalle_bodega VALUES("382","43703018","TUBO DE ABASTO PARA LAVAMANOS FLEXIBLE DE 3/8\" X1/","C/U","3.00","3.00","12.50","297");
INSERT INTO detalle_bodega VALUES("383","70211076","LLAVE DE 1/2\" CROMADO PARA LAVAMANOS 1a CALIDAD","C/U","3.00","3.00","6.00","301");
INSERT INTO detalle_bodega VALUES("384","70211071","TUBO DE ABASTO DE ACERO INOXIDABLE PARA SANITARIO","C/U","1.00","1.00","2.60","302");
INSERT INTO detalle_bodega VALUES("385","43703010","TAPON MACHO DE 2\" PVC CON ROSCA","C/U","2.00","0.00","1.50","303");
INSERT INTO detalle_bodega VALUES("386","70211300","CINTA TEFLÓN","C/U","1.00","0.00","0.30","304");
INSERT INTO detalle_bodega VALUES("387","70208527","CHAPA CILÍNDRICA DE PALANCA CON LLAVE","C/U","6.00","6.00","22.30","308");
INSERT INTO detalle_bodega VALUES("388","70212075","HIERRO ANGULO DE 1 1/2\" X 1 1/2\" X 3 /16\", BAJO N","mts","2.00","2.00","4.60","309");
INSERT INTO detalle_bodega VALUES("389","70211300","CINTA TEFLÓN","C/U","2.00","2.00","0.30","310");
INSERT INTO detalle_bodega VALUES("390","70211051","VÁLVULA DE CONTROL CROMADA DE 1 / 2\"A LA PARED","C/U","3.00","3.00","2.50","312");
INSERT INTO detalle_bodega VALUES("391","70211071","TUBO DE ABASTO DE ACERO INOXIDABLE PARA SANITARIO","C/U","2.00","2.00","2.60","313");
INSERT INTO detalle_bodega VALUES("392","70208527","CHAPA CILÍNDRICA DE PALANCA CON LLAVE","C/U","6.00","6.00","22.30","314");
INSERT INTO detalle_bodega VALUES("393","70205570","CINTA AISLANTE PVC 19 mm x 20 ydas x 0.177 mm, APR","C/U","1.00","1.00","5.00","315");
INSERT INTO detalle_bodega VALUES("394","70205099","CABLE DUPLEX No. 12","mts","5.00","5.00","0.80","316");
INSERT INTO detalle_bodega VALUES("395","70205190","CAJA RECTANGULAR DE PVC 4\" X 2\"","C/U","1.00","1.00","0.40","317");
INSERT INTO detalle_bodega VALUES("396","70205453","CONECTOR RECTO DE 1/2\" METALICO","C/U","3.00","3.00","0.20","319");
INSERT INTO detalle_bodega VALUES("397","70205296","TOMACORRIENTE HEMBRA, DOBLE, POLARIZADO","C/U","1.00","1.00","1.00","322");
INSERT INTO detalle_bodega VALUES("398","31161502","ANCLA PLASTICA PARA TABLA ROCA","C/U","4.00","4.00","0.23","323");
INSERT INTO detalle_bodega VALUES("399","70212415","ANCLA PLASTICA DE 1/4\"","C/U","4.00","4.00","0.00","326");
INSERT INTO detalle_bodega VALUES("400","70212483","TORNILLO GOLOSO DE 1\" X 10 mm","C/U","8.00","8.00","0.03","333");
INSERT INTO detalle_bodega VALUES("401","70212838","LUBRICANTE WD-40, SPRAY DE 11 ONZAS","C/U","1.00","1.00","2.60","339");
INSERT INTO detalle_bodega VALUES("402","70225269","GRASA","lb","1.00","1.00","10.00","342");
INSERT INTO detalle_bodega VALUES("403","70207162","CINTA ARNOLD PRIMERA CALIDAD, ROLLO","C/U","1.00","1.00","2.30","354");
INSERT INTO detalle_bodega VALUES("404","70205310","TOMA CORRIENTE HEMBRA, DOBLE, POLARIZADO, GRADO HO","C/U","10.00","10.00","7.50","356");
INSERT INTO detalle_bodega VALUES("405","70205499","TECNODUCTO DE 3/4\" Mt","mts","50.00","50.00","0.50","357");
INSERT INTO detalle_bodega VALUES("406","70205603","CUERPO TERMINAL DE 1\"","C/U","5.00","5.00","2.20","358");
INSERT INTO detalle_bodega VALUES("407","70205570","CINTA AISLANTE PVC 19 mm x 20 ydas x 0.177 mm, APR","C/U","10.00","10.00","5.00","359");
INSERT INTO detalle_bodega VALUES("408","70205170","CAJA TERMICA DE 4 CIRCUITOS, 2 POLOS, 240 VOLTIOS,","C/U","4.00","4.00","27.20","365");
INSERT INTO detalle_bodega VALUES("409","70205190","CAJA RECTANGULAR DE PVC 4\" X 2\"","C/U","10.00","10.00","0.40","387");
INSERT INTO detalle_bodega VALUES("410","70205192","CAJA OCTAGONAL PVC","C/U","10.00","10.00","0.70","388");
INSERT INTO detalle_bodega VALUES("411","70205066","CABLE THHN No. 14 AWG, COLOR ROJO","mts","40.00","40.00","0.50","390");
INSERT INTO detalle_bodega VALUES("412","70205063","CABLE THHN NO 12 AWG, COLOR VERDE","mts","50.00","50.00","0.59","396");
INSERT INTO detalle_bodega VALUES("413","70205060","CABLE THHN No. 12 AWG, COLOR ROJO","mts","50.00","50.00","0.70","397");
INSERT INTO detalle_bodega VALUES("414","70205062","CABLE THHN NO 12 AWG, COLOR BLANCO","mts","50.00","50.00","0.70","401");
INSERT INTO detalle_bodega VALUES("415","70205056","CABLE THHN No. 10 AWG, COLOR BLANCO","mts","25.00","25.00","1.00","402");
INSERT INTO detalle_bodega VALUES("416","70205058","CABLE THHN NO 10 AWG, COLOR VERDE","mts","25.00","25.00","1.00","405");
INSERT INTO detalle_bodega VALUES("417","70205054","CABLE THHN No.10 AWG, COLOR ROJO","mts","25.00","25.00","1.00","409");
INSERT INTO detalle_bodega VALUES("418","70205130","DADO TERMICO DE 20 AMPERIOS,1 DE POLO DE PRIMERA C","C/U","4.00","4.00","5.42","411");
INSERT INTO detalle_bodega VALUES("419","70205870","LUMINARIA EMPOTRAR, PANEL LED 2 X 4, 60WATTS,100-2","C/U","10.00","10.00","50.95","412");
INSERT INTO detalle_bodega VALUES("420","70120211","CAPACITOR DE MARCHA DE 5O MFD, 440 VAC","C/U","1.00","1.00","4.50","418");
INSERT INTO detalle_bodega VALUES("421","70205284","RECEPTACULO DE BAQUELITA FIJO","C/U","2.00","2.00","0.90","419");
INSERT INTO detalle_bodega VALUES("422","70205227","FOCO AHORRADOR DE ENERGIA DE 25 WATTS, 110 VOLTIOS","C/U","2.00","2.00","3.30","420");
INSERT INTO detalle_bodega VALUES("423","70213041","PINTURA DE AGUA COLOR GRIS METEORO","Galon","1.00","0.00","28.40","422");
INSERT INTO detalle_bodega VALUES("424","70212838","LUBRICANTE WD-40, SPRAY DE 11 ONZAS","C/U","1.00","0.00","2.60","425");
INSERT INTO detalle_bodega VALUES("425","70205190","CAJA RECTANGULAR DE PVC 4\" X 2\"","C/U","1.00","1.00","0.40","426");
INSERT INTO detalle_bodega VALUES("426","70205331","PLACA DOBLE DE BAQUELITA (PARA TOMA POLARIZADO)","C/U","1.00","1.00","0.30","427");
INSERT INTO detalle_bodega VALUES("427","70205453","CONECTOR RECTO DE 1/2\" METALICO","C/U","1.00","1.00","0.20","430");
INSERT INTO detalle_bodega VALUES("428","70205572","CINTA AISLANTE # 23, ROLLO","C/U","1.00","1.00","14.50","432");
INSERT INTO detalle_bodega VALUES("429","70212829","PEGAMENTO ACERO PLASTICO, TUBO","C/U","1.00","1.00","9.70","433");
INSERT INTO detalle_bodega VALUES("430","70205296","TOMACORRIENTE HEMBRA, DOBLE, POLARIZADO","C/U","1.00","1.00","1.00","445");
INSERT INTO detalle_bodega VALUES("431","70205331","PLACA DOBLE DE BAQUELITA (PARA TOMA POLARIZADO)","C/U","1.00","1.00","0.30","449");
INSERT INTO detalle_bodega VALUES("432","70205453","CONECTOR RECTO DE 1/2\" METALICO","C/U","2.00","2.00","0.20","450");
INSERT INTO detalle_bodega VALUES("433","70205097","CABLE ELECTRICO TSJ 12/3 (VULCAN)","mts","6.00","6.00","1.40","451");
INSERT INTO detalle_bodega VALUES("434","70212414","ANCLA PLASTICA DE 5/16\"","C/U","3.00","3.00","0.00","452");
INSERT INTO detalle_bodega VALUES("435","70212463","TORNILLO GOLOSO DE 2\"","C/U","3.00","3.00","0.20","453");
INSERT INTO detalle_bodega VALUES("436","70205192","CAJA OCTAGONAL PVC","C/U","1.00","1.00","0.70","478");
INSERT INTO detalle_bodega VALUES("437","70205296","TOMACORRIENTE HEMBRA, DOBLE, POLARIZADO","C/U","1.00","1.00","1.00","482");
INSERT INTO detalle_bodega VALUES("438","70205331","PLACA DOBLE DE BAQUELITA (PARA TOMA POLARIZADO)","C/U","1.00","1.00","0.30","483");
INSERT INTO detalle_bodega VALUES("439","70205097","CABLE ELECTRICO TSJ 12/3 (VULCAN)","mts","6.00","6.00","1.40","486");
INSERT INTO detalle_bodega VALUES("440","70212414","ANCLA PLASTICA DE 5/16\"","C/U","3.00","3.00","0.00","496");
INSERT INTO detalle_bodega VALUES("441","70212463","TORNILLO GOLOSO DE 2\"","C/U","3.00","3.00","0.20","497");
INSERT INTO detalle_bodega VALUES("442","70205456","CONECTOR RECTO DE 3/4\", METALICO","C/U","2.00","2.00","0.90","500");
INSERT INTO detalle_bodega VALUES("443","70205190","CAJA RECTANGULAR DE PVC 4\" X 2\"","C/U","1.00","1.00","0.40","501");
INSERT INTO detalle_bodega VALUES("444","70205572","CINTA AISLANTE # 23, ROLLO","C/U","1.00","1.00","14.50","502");
INSERT INTO detalle_bodega VALUES("445","70208080","MASILLA PARA TABLA ROCA","Galon","10.00","10.00","3.90","504");
INSERT INTO detalle_bodega VALUES("446","70205357","SWITCH SUPERFICIAL PARA TIMBRE","C/U","1.00","1.00","1.40","512");
INSERT INTO detalle_bodega VALUES("447","70211287","NIPLE DE HIERRO GALVANIZADO TODO ROSCA DE 1/2\" X 1","C/U","2.00","2.00","0.40","514");
INSERT INTO detalle_bodega VALUES("448","70211076","LLAVE DE 1/2\" CROMADO PARA LAVAMANOS 1a CALIDAD","C/U","2.00","2.00","6.00","515");
INSERT INTO detalle_bodega VALUES("449","43703018","TUBO DE ABASTO PARA LAVAMANOS FLEXIBLE DE 3/8\" X1/","C/U","2.00","2.00","12.50","516");
INSERT INTO detalle_bodega VALUES("450","70211051","VÁLVULA DE CONTROL CROMADA DE 1 / 2\"A LA PARED","C/U","2.00","2.00","2.50","517");
INSERT INTO detalle_bodega VALUES("451","70211900","KIT DE ACCESORIOS PARA SERVICIO SANITARIO STANDARD","C/U","1.00","1.00","5.70","518");
INSERT INTO detalle_bodega VALUES("452","70212033","CLAVO DE ACERO DE 1 1/2\"","C/U","4.00","4.00","0.00","519");
INSERT INTO detalle_bodega VALUES("453","70212709","REMACHE POP, DE 1/8\" X 1/2\"","C/U","50.00","50.00","1.70","529");
INSERT INTO detalle_bodega VALUES("454","70205233","TUBO FLUORESCENTES DE 20 WATTS, 120 VOLTIOS","C/U","4.00","4.00","1.00","554");
INSERT INTO detalle_bodega VALUES("455","70205886","TUBO LED DE 18 WATTS, T8, 120 VOLTIOS","C/U","6.00","6.00","3.80","1520");
INSERT INTO detalle_bodega VALUES("456","70208750","LOSETA PARA CIELO FALSO, DE YESO, DE (4 X 2) PIES","C/U","2.00","2.00","3.40","1701");
INSERT INTO detalle_bodega VALUES("457","70205227","FOCO AHORRADOR DE ENERGIA DE 25 WATTS, 110 VOLTIOS","C/U","2.00","2.00","3.30","2301");
INSERT INTO detalle_bodega VALUES("458","70208300","TABLA ROCA DE YESO PARA INTERIORES DE 1.22 METROS","C/U","2.00","2.00","8.56","2451");
INSERT INTO detalle_bodega VALUES("459","70212426","TORNILLO PARA TABLAROCA DE 1 1/2\"","C/U","200.00","200.00","0.02","2641");
INSERT INTO detalle_bodega VALUES("460","70208527","CHAPA CILÍNDRICA DE PALANCA CON LLAVE","C/U","2.00","2.00","22.30","2971");
INSERT INTO detalle_bodega VALUES("461","70212727","PASADOR METALICO DE 2 1/2\"","C/U","2.00","2.00","3.50","2972");
INSERT INTO detalle_bodega VALUES("462","70210211","COSTANERA DE CEDRO DE 3 VARAS","C/U","1.00","1.00","16.35","3041");
INSERT INTO detalle_bodega VALUES("463","70120080","INTERRUPTOR TERMOMAGNETICO TRIFASICO, 400 AMPERIOS","C/U","1.00","1.00","1.00","3042");
INSERT INTO detalle_bodega VALUES("464","70170069","RODO FIJO DE 125 MILIMETROS (5 PULGADAS)","C/U","1.00","1.00","2.75","3043");
INSERT INTO detalle_bodega VALUES("465","70101779","BISAGRA DE 2\"","C/U","2.00","2.00","0.40","3081");
INSERT INTO detalle_bodega VALUES("466","70212800","ELECTRODO 3/32\" PARA HIERRO DULCE","lb","0.50","0.50","1.00","3082");
INSERT INTO detalle_bodega VALUES("467","70211005","SANITARIO COLOR BLANCO COMPLETO STANDARD","C/U","1.00","1.00","52.40","3091");
INSERT INTO detalle_bodega VALUES("468","70211071","TUBO DE ABASTO DE ACERO INOXIDABLE PARA SANITARIO","C/U","2.00","2.00","2.60","3101");
INSERT INTO detalle_bodega VALUES("469","70211051","VÁLVULA DE CONTROL CROMADA DE 1 / 2\"A LA PARED","C/U","2.00","2.00","2.50","3131");
INSERT INTO detalle_bodega VALUES("470","70211900","KIT DE ACCESORIOS PARA SERVICIO SANITARIO STANDARD","C/U","2.00","2.00","5.70","3141");
INSERT INTO detalle_bodega VALUES("471","70211300","CINTA TEFLÓN","C/U","2.00","2.00","0.30","3151");
INSERT INTO detalle_bodega VALUES("472","70212825","TUBO SILICON DE ALTA TEMPERATURA COLOR ROJO","C/U","1.00","1.00","1.90","3152");
INSERT INTO detalle_bodega VALUES("473","70208527","CHAPA CILÍNDRICA DE PALANCA CON LLAVE","C/U","1.00","1.00","22.30","3871");
INSERT INTO detalle_bodega VALUES("474","70205242","FOCO CORRIENTE DE 60 WATTS","cto","1.00","1.00","0.40","4051");
INSERT INTO detalle_bodega VALUES("475","70208630","PISO DE (33 X 33) CMS, PARA TRAFICO PESADO, VARIO","C/U","720.00","720.00","1.25","4191");
INSERT INTO detalle_bodega VALUES("476","70210500","PEGAMENTO PARA MADERA","Galon","0.50","0.50","14.00","4261");
INSERT INTO detalle_bodega VALUES("477","70212425","TORNILLO PARA TABLAROCA DE 2\"","C/U","24.00","24.00","0.03","4301");
INSERT INTO detalle_bodega VALUES("478","70205089","CABLE ELECTRICO TSJ 12/2 (VULCAN)","mts","5.00","5.00","1.00","4321");
INSERT INTO detalle_bodega VALUES("479","70205190","CAJA RECTANGULAR DE PVC 4\" X 2\"","C/U","1.00","1.00","0.40","4331");
INSERT INTO detalle_bodega VALUES("480","70205319","TOMA CORRIENTE MACHO, TIPO CHINO DE 15 AMPERIOS","C/U","1.00","1.00","1.30","4491");
INSERT INTO detalle_bodega VALUES("481","70205331","PLACA DOBLE DE BAQUELITA (PARA TOMA POLARIZADO)","C/U","1.00","1.00","0.30","4511");
INSERT INTO detalle_bodega VALUES("482","70205456","CONECTOR RECTO DE 3/4\", METALICO","C/U","1.00","1.00","0.90","4512");
INSERT INTO detalle_bodega VALUES("483","70212992","ALAMBRE ESPIGADO GALVANIZADO No. 16 ROLLO","C/U","1.00","1.00","36.00","4521");
INSERT INTO detalle_bodega VALUES("484","70205094","CABLE ELECTRICO TSJ 10/3 (VULCAN)","mts","18.00","18.00","4.00","4821");
INSERT INTO detalle_bodega VALUES("485","70205296","TOMACORRIENTE HEMBRA, DOBLE, POLARIZADO","C/U","1.00","1.00","1.00","4822");
INSERT INTO detalle_bodega VALUES("486","70211460","TAPON HEMBRA LISO PVC 3\"","C/U","1.00","1.00","6.40","5151");
INSERT INTO detalle_bodega VALUES("487","70211130","TEE DE 1/2\" DE PVC","C/U","4.00","4.00","0.20","5161");
INSERT INTO detalle_bodega VALUES("488","70211808","ADAPTADOR MACHO CPVC DE 1/2\"","C/U","2.00","2.00","0.20","5181");
INSERT INTO detalle_bodega VALUES("489","70211105","CODO LISO DE 1 /2\" X 90 DE P.V.C","C/U","2.00","2.00","0.10","31601");
INSERT INTO detalle_bodega VALUES("490","70211051","VÁLVULA DE CONTROL CROMADA DE 1 / 2\"A LA PARED","C/U","2.00","2.00","2.50","45111");
INSERT INTO detalle_bodega VALUES("491","70211071","TUBO DE ABASTO DE ACERO INOXIDABLE PARA SANITARIO","C/U","3.00","3.00","2.60","70222");
INSERT INTO detalle_bodega VALUES("492","70211073","TUBO DE ABASTO DE ACERO INOXIDABLE PARA LAVAMANOS","C/U","2.00","2.00","2.60","90222");
INSERT INTO detalle_bodega VALUES("493","70211076","LLAVE DE 1/2\" CROMADO PARA LAVAMANOS 1a CALIDAD","C/U","2.00","2.00","6.00","150322");
INSERT INTO detalle_bodega VALUES("494","70120208","CAPACITOR DE MARCHA DE 40MFD, 440VAC 60HZ","C/U","1.00","1.00","3.80","203220");



DROP TABLE detalle_circulante;

CREATE TABLE `detalle_circulante` (
  `codigodetallecirculante` int(3) NOT NULL AUTO_INCREMENT,
  `codigo` int(15) NOT NULL,
  `descripcion` mediumtext NOT NULL,
  `unidad_medida` mediumtext NOT NULL DEFAULT 'C/U',
  `stock` decimal(6,2) NOT NULL,
  `cantidad_despachada` decimal(6,2) NOT NULL,
  `precio` decimal(6,2) NOT NULL DEFAULT 0.00,
  `tb_circulante` int(15) DEFAULT NULL,
  PRIMARY KEY (`codigodetallecirculante`),
  KEY `fk_tb_circulante_detalle_circulante` (`tb_circulante`),
  CONSTRAINT `fk_tb_circulante_detalle_circulante` FOREIGN KEY (`tb_circulante`) REFERENCES `tb_circulante` (`codCirculante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




DROP TABLE detalle_compra;

CREATE TABLE `detalle_compra` (
  `codigodetallecompra` int(3) NOT NULL AUTO_INCREMENT,
  `categoria` mediumtext NOT NULL,
  `codigo` int(15) NOT NULL,
  `catalogo` int(20) NOT NULL,
  `descripcion` mediumtext NOT NULL,
  `unidad_medida` mediumtext NOT NULL DEFAULT 'C/U',
  `stock` decimal(6,2) unsigned NOT NULL DEFAULT 0.00,
  `cantidad_despachada` decimal(6,2) NOT NULL DEFAULT 0.00,
  `precio` decimal(6,2) NOT NULL DEFAULT 0.00,
  `solicitud_compra` int(8) DEFAULT NULL,
  PRIMARY KEY (`codigodetallecompra`),
  KEY `fk_tb_compra_detalle_compra` (`solicitud_compra`),
  CONSTRAINT `fk_tb_compra_detalle_compra` FOREIGN KEY (`solicitud_compra`) REFERENCES `tb_compra` (`nSolicitud`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




DROP TABLE detalle_vale;

CREATE TABLE `detalle_vale` (
  `codigodetallevale` int(3) NOT NULL AUTO_INCREMENT,
  `codigo` int(15) NOT NULL,
  `descripcion` mediumtext NOT NULL,
  `unidad_medida` mediumtext NOT NULL DEFAULT 'C/U',
  `stock` decimal(6,2) NOT NULL DEFAULT 0.00,
  `cantidad_despachada` decimal(6,2) NOT NULL DEFAULT 0.00,
  `precio` decimal(6,2) NOT NULL DEFAULT 0.00,
  `numero_vale` int(15) DEFAULT NULL,
  PRIMARY KEY (`codigodetallevale`),
  KEY `fk_tb_vale_detalle_vale` (`numero_vale`),
  CONSTRAINT `fk_tb_vale_detalle_vale` FOREIGN KEY (`numero_vale`) REFERENCES `tb_vale` (`codVale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




DROP TABLE selects_categoria;

CREATE TABLE `selects_categoria` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `Habilitado` mediumtext NOT NULL,
  `categoria` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

INSERT INTO selects_categoria VALUES("1","Si","Agropecuarios y Forestales");
INSERT INTO selects_categoria VALUES("2","Si","Cuero y Caucho");
INSERT INTO selects_categoria VALUES("3","Si","Combustibles y Lubricantes");
INSERT INTO selects_categoria VALUES("4","Si","Minerales no Metálicos");
INSERT INTO selects_categoria VALUES("5","Si","Minerales Metálicos");
INSERT INTO selects_categoria VALUES("6","Si","Herramientas y Repuestos");
INSERT INTO selects_categoria VALUES("7","Si","Materiales Eléctricos");
INSERT INTO selects_categoria VALUES("8","Si","Mobiliario");
INSERT INTO selects_categoria VALUES("9","Si","Químicos");



DROP TABLE selects_departamento;

CREATE TABLE `selects_departamento` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `Habilitado` mediumtext NOT NULL,
  `departamento` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4;

INSERT INTO selects_departamento VALUES("1","Si","Área Saneamiento Ambiental");
INSERT INTO selects_departamento VALUES("2","Si","Área Servicios Auxiliares");
INSERT INTO selects_departamento VALUES("3","Si","Área Clínica De Úlceras Y Heridas");
INSERT INTO selects_departamento VALUES("4","Si","Área Residencial Médica");
INSERT INTO selects_departamento VALUES("5","Si","Área Epidemiología");
INSERT INTO selects_departamento VALUES("6","Si","Área COVID 19");
INSERT INTO selects_departamento VALUES("7","Si","Bienestar magisterial");
INSERT INTO selects_departamento VALUES("8","Si","Cirugia Hombre");
INSERT INTO selects_departamento VALUES("9","Si","Dirección Hospital");
INSERT INTO selects_departamento VALUES("10","Si","Departamento Lavandería y Ropería");
INSERT INTO selects_departamento VALUES("11","Si","Departamento Mantenimiento Local");
INSERT INTO selects_departamento VALUES("12","Si","Departamento Estadística y Documento Médicos");
INSERT INTO selects_departamento VALUES("13","Si","Departamento Activo Fijo");
INSERT INTO selects_departamento VALUES("14","Si","División Administrativa");
INSERT INTO selects_departamento VALUES("15","Si","Departamento Recursos Humanos");
INSERT INTO selects_departamento VALUES("16","Si","Departamento Terapia Dialítica");
INSERT INTO selects_departamento VALUES("17","Si","Fisioterapia");
INSERT INTO selects_departamento VALUES("18","Si","Farmacia");
INSERT INTO selects_departamento VALUES("19","Si","Ginecologia");
INSERT INTO selects_departamento VALUES("20","Si","Laboratorio Clinico");
INSERT INTO selects_departamento VALUES("21","Si","Pediatría");
INSERT INTO selects_departamento VALUES("22","Si","Radiologia e imagenes");
INSERT INTO selects_departamento VALUES("23","Si","Subdirección Hospital");
INSERT INTO selects_departamento VALUES("24","Si","Sección Equipo Médico");
INSERT INTO selects_departamento VALUES("25","Si","Sección Equipo Básico");
INSERT INTO selects_departamento VALUES("26","Si","Sección Planta Física y Monitoreo");
INSERT INTO selects_departamento VALUES("27","Si","Servicio Centro Quirúrgico");
INSERT INTO selects_departamento VALUES("28","Si","Servicio Medicina Hombres");
INSERT INTO selects_departamento VALUES("29","Si","Servicio Medicina Mujeres");
INSERT INTO selects_departamento VALUES("30","Si","Servicio Almacén");
INSERT INTO selects_departamento VALUES("31","Si","Servicio Consulta Externa");
INSERT INTO selects_departamento VALUES("32","Si","Servicio Trabajo Social");
INSERT INTO selects_departamento VALUES("33","Si","Servicio Obstetricia");
INSERT INTO selects_departamento VALUES("34","Si","Unidad Sala de Operación");
INSERT INTO selects_departamento VALUES("35","Si","Unidad Sala de Partos");
INSERT INTO selects_departamento VALUES("36","Si","Unidad Neonatos");
INSERT INTO selects_departamento VALUES("37","Si","Unidad Máxima Urgencia");
INSERT INTO selects_departamento VALUES("38","Si","Unidad Financiara Institucional");
INSERT INTO selects_departamento VALUES("39","Si","Unidad Auditoria Interna");
INSERT INTO selects_departamento VALUES("40","Si","Unidad Asesora de Suministro Médicos");
INSERT INTO selects_departamento VALUES("41","Si","Unidad Atención Integral e Integrada ala Salud Sexual Reproductiva");
INSERT INTO selects_departamento VALUES("42","Si","Unidad Cuidados Especiales");



DROP TABLE selects_dependencia;

CREATE TABLE `selects_dependencia` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `Habilitado` mediumtext NOT NULL,
  `dependencia` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

INSERT INTO selects_dependencia VALUES("1","Si","Dirección Hospital");
INSERT INTO selects_dependencia VALUES("2","Si","Departamento Mantenimiento Local");
INSERT INTO selects_dependencia VALUES("3","Si","División Administrativa");
INSERT INTO selects_dependencia VALUES("4","Si","Departamento Servicios Generales");
INSERT INTO selects_dependencia VALUES("5","Si","Departamento Enfermeria");
INSERT INTO selects_dependencia VALUES("6","Si","Sevicio Medicina Interna");
INSERT INTO selects_dependencia VALUES("7","Si","Sevicio Centro Quirúrgico");
INSERT INTO selects_dependencia VALUES("8","Si","Sevicio Centro Obstétrico");
INSERT INTO selects_dependencia VALUES("9","Si","Subdirección Hospital");
INSERT INTO selects_dependencia VALUES("10","Si","Servicio Consulta Externa");
INSERT INTO selects_dependencia VALUES("11","Si","Unidad Enfermeria");



DROP TABLE selects_unidad_medida;

CREATE TABLE `selects_unidad_medida` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `Habilitado` mediumtext NOT NULL,
  `unidad_medida` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

INSERT INTO selects_unidad_medida VALUES("1","Si","C/M");
INSERT INTO selects_unidad_medida VALUES("2","Si","Cto");
INSERT INTO selects_unidad_medida VALUES("3","Si","CUARTO GAL");
INSERT INTO selects_unidad_medida VALUES("4","Si","C/U");
INSERT INTO selects_unidad_medida VALUES("5","Si","Galón");
INSERT INTO selects_unidad_medida VALUES("6","Si","Lb");
INSERT INTO selects_unidad_medida VALUES("7","Si","Mts");
INSERT INTO selects_unidad_medida VALUES("8","Si","Pgo");
INSERT INTO selects_unidad_medida VALUES("9","Si","Qq");
INSERT INTO selects_unidad_medida VALUES("10","Si","PAR");



DROP TABLE tb_almacen;

CREATE TABLE `tb_almacen` (
  `codAlmacen` int(12) NOT NULL,
  `departamento` mediumtext NOT NULL,
  `encargado` mediumtext NOT NULL,
  `estado` mediumtext NOT NULL,
  `idusuario` int(11) NOT NULL DEFAULT 1,
  `fecha_solicitud` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`codAlmacen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




DROP TABLE tb_bodega;

CREATE TABLE `tb_bodega` (
  `codBodega` int(11) NOT NULL,
  `departamento` mediumtext NOT NULL,
  `usuario` mediumtext NOT NULL,
  `campo` mediumtext NOT NULL DEFAULT ' Solicitud Bodega',
  `fecha_registro` date NOT NULL DEFAULT current_timestamp(),
  `estado` mediumtext NOT NULL,
  `idusuario` int(11) NOT NULL DEFAULT 2,
  PRIMARY KEY (`codBodega`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO tb_bodega VALUES("5","Dirección Hospital","Ernesto Gonzalez Choto","Solicitud Bodega","2022-04-04","Rechazado","1");
INSERT INTO tb_bodega VALUES("32","Unidad Financiara Institucional","Baltazar Alexander Marinero Perez","Solicitud Bodega","2022-03-30","Aprobado","2");
INSERT INTO tb_bodega VALUES("33","Departamento Mantenimiento Local","René Adán Villalta Pérez","Solicitud Bodega","2022-02-20","Aprobado","2");
INSERT INTO tb_bodega VALUES("40","Radiologia e imagenes","Baltazar Alexander Marinero Perez","Solicitud Bodega","2022-05-16","Aprobado","2");
INSERT INTO tb_bodega VALUES("42","Dirección Hospital","Baltazar Alexander Marinero Perez","Solicitud Bodega","2022-04-04","Rechazado","2");
INSERT INTO tb_bodega VALUES("45","Subdirección Hospital","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-21","Pendiente","1");
INSERT INTO tb_bodega VALUES("46","Servicio Consulta Externa","Baltazar Alexander Marinero Perez","Solicitud Bodega","2022-05-24","Aprobado","2");
INSERT INTO tb_bodega VALUES("102","Departamento Activo Fijo","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-15","Pendiente","1");
INSERT INTO tb_bodega VALUES("113","Servicio Almacén","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-15","Pendiente","1");
INSERT INTO tb_bodega VALUES("123","Subdirección Hospital","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-15","Pendiente","1");
INSERT INTO tb_bodega VALUES("148","Sección Equipo Básico","Baltazar Alexander Marinero Perez","Solicitud Bodega","2022-03-30","Aprobado","2");
INSERT INTO tb_bodega VALUES("151","Unidad Sala de Partos","Baltazar Alexander Marinero Perez","Solicitud Bodega","2022-04-05","Aprobado","2");
INSERT INTO tb_bodega VALUES("170","Unidad Máxima Urgencia","Anderson Eduardo López Rodriguez","Solicitud Bodega","2022-04-04","Pendiente","2");
INSERT INTO tb_bodega VALUES("179","EMERGENCIA","Yenifer Marisol Campos Yanez","Solicitud Bodega","2022-04-06","Aprobado","2");
INSERT INTO tb_bodega VALUES("188","Unidad Máxima Urgencia","Yenifer Marisol Campos Yanez","Solicitud Bodega","2022-04-04","Aprobado","2");
INSERT INTO tb_bodega VALUES("209","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-15","Pendiente","1");
INSERT INTO tb_bodega VALUES("215","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-10","Pendiente","1");
INSERT INTO tb_bodega VALUES("218","Área COVID 19","Yenifer Marisol Campos Yanez","Solicitud Bodega","2022-04-06","Aprobado","2");
INSERT INTO tb_bodega VALUES("224","bienestar magisterial","Yenifer Marisol Campos Yanez","Solicitud Bodega","2022-04-06","Aprobado","2");
INSERT INTO tb_bodega VALUES("228","Unidad Neonatos","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-15","Pendiente","1");
INSERT INTO tb_bodega VALUES("229","Unidad Neonatos","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-25","Aprobado","1");
INSERT INTO tb_bodega VALUES("230","Unidad Financiara Institucional","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-25","Aprobado","1");
INSERT INTO tb_bodega VALUES("231","LABORATORIO CLINICO","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-01","Pendiente","1");
INSERT INTO tb_bodega VALUES("236","Departamento Estadística y Documento Médicos","Miguel Antonio Corvera Torres","Solicitud Bodega","2022-03-25","Aprobado","2");
INSERT INTO tb_bodega VALUES("245","Servicio Consulta Externa","Yenifer Marisol Campos Yanez","Solicitud Bodega","2022-04-04","Aprobado","2");
INSERT INTO tb_bodega VALUES("255","Servicio Consulta Externa","René Adán Villalta Pérez","Solicitud Bodega","2022-03-30","Aprobado","2");
INSERT INTO tb_bodega VALUES("257","Aérea Servicios Auxiliares","Miguel Antonio Corvera Torres","Solicitud Bodega","2022-03-01","Aprobado","2");
INSERT INTO tb_bodega VALUES("260","Departamento Recursos Humanos","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-25","Aprobado","1");
INSERT INTO tb_bodega VALUES("263","Servicio Almacén","René Adán Villalta Pérez","Solicitud Bodega","2022-03-25","Aprobado","2");
INSERT INTO tb_bodega VALUES("264","Área COVID 19","Miguel Antonio Corvera Torres","Solicitud Bodega","2022-02-20","Aprobado","2");
INSERT INTO tb_bodega VALUES("268","EMERGENCIA","Yenifer Marisol Campos Yanez","Solicitud Bodega","2022-04-06","Aprobado","2");
INSERT INTO tb_bodega VALUES("269","Unidad Sala de Partos","Yenifer Marisol Campos Yanez","Solicitud Bodega","2022-04-06","Aprobado","2");
INSERT INTO tb_bodega VALUES("273","Unidad Máxima Urgencia","Yenifer Marisol Campos Yanez","Solicitud Bodega","2022-04-04","Aprobado","2");
INSERT INTO tb_bodega VALUES("278","Unidad Máxima Urgencia","Yenifer Marisol Campos Yanez","Solicitud Bodega","2022-04-04","Aprobado","2");
INSERT INTO tb_bodega VALUES("280","Área COVID 19","Yenifer Marisol Campos Yanez","Solicitud Bodega","2022-04-04","Aprobado","2");
INSERT INTO tb_bodega VALUES("281","Unidad Sala de Operación","Ernesto Gonzalez Choto","Solicitud Bodega","2022-04-06","Aprobado","1");
INSERT INTO tb_bodega VALUES("282","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-04-06","Aprobado","1");
INSERT INTO tb_bodega VALUES("284","Servicio Consulta Externa","Anderson Eduardo López Rodriguez","Solicitud Bodega","2022-03-29","Aprobado","2");
INSERT INTO tb_bodega VALUES("287","Departamento Lavandería y Ropería","Yenifer Marisol Campos Yanez","Solicitud Bodega","2022-03-29","Aprobado","2");
INSERT INTO tb_bodega VALUES("294","Unidad Sala de Operación","Miguel Antonio Corvera Torres","Solicitud Bodega","2022-03-30","Aprobado","2");
INSERT INTO tb_bodega VALUES("297","Departamento Mantenimiento Local","Anderson Eduardo López Rodriguez","Solicitud Bodega","2022-03-01","Aprobado","2");
INSERT INTO tb_bodega VALUES("301","Departamento Mantenimiento Local","Fransico Tolentino López","Solicitud Bodega","2022-03-30","Aprobado","2");
INSERT INTO tb_bodega VALUES("302","Departamento Lavandería y Ropería","René Adán Villalta Pérez","Solicitud Bodega","2022-03-01","Aprobado","2");
INSERT INTO tb_bodega VALUES("303","Servicio Medicina Hombres","Ronald Alexander Lopez Cisnero","Solicitud Bodega","2022-04-29","Aprobado","2");
INSERT INTO tb_bodega VALUES("304","Departamento Mantenimiento Local","Anderson Eduardo López Rodriguez","Solicitud Bodega","2022-04-05","Aprobado","2");
INSERT INTO tb_bodega VALUES("308","Aérea Servicios Auxiliares","Fransico Tolentino López","Solicitud Bodega","2022-04-04","Aprobado","2");
INSERT INTO tb_bodega VALUES("309","Departamento Mantenimiento Local","Miguel Antonio Corvera Torres","Solicitud Bodega","2022-04-05","Rechazado","2");
INSERT INTO tb_bodega VALUES("310","Departamento Mantenimiento Local","Anderson Eduardo López Rodriguez","Solicitud Bodega","2022-04-01","Aprobado","2");
INSERT INTO tb_bodega VALUES("312","Aérea Servicios Auxiliares","Miguel Antonio Corvera Torres","Solicitud Bodega","2022-04-04","Pendiente","2");
INSERT INTO tb_bodega VALUES("313","Unidad Neonatos","Anderson Eduardo López Rodriguez","Solicitud Bodega","2022-05-31","Aprobado","2");
INSERT INTO tb_bodega VALUES("314","DIVISIÓN ADMINISTRATIVA","Miguel Antonio Corvera Torres","Solicitud Bodega","2022-05-31","Aprobado","2");
INSERT INTO tb_bodega VALUES("315","Servicio Almacén","José Domingo Echeverría","Solicitud Bodega","2022-04-06","Aprobado","2");
INSERT INTO tb_bodega VALUES("316","Servicio Medicina Mujeres","René Adán Villalta Pérez","Solicitud Bodega","2022-04-04","Aprobado","2");
INSERT INTO tb_bodega VALUES("317","Servicio Medicina Mujeres","René Adán Villalta Pérez","Solicitud Bodega","2022-04-08","Aprobado","2");
INSERT INTO tb_bodega VALUES("319","Servicio Centro Quirúrgico","Napoleón Alfredo Rodas","Solicitud Bodega","2022-04-04","Pendiente","2");
INSERT INTO tb_bodega VALUES("322","Departamento Mantenimiento Local","Miguel Antonio Corvera Torres","Solicitud Bodega","2022-04-06","Aprobado","2");
INSERT INTO tb_bodega VALUES("323","FISIOTERAPIA","Anderson Eduardo López Rodriguez","Solicitud Bodega","2022-04-07","Aprobado","2");
INSERT INTO tb_bodega VALUES("326","Radiologia e imagenes","Yenifer Marisol Campos Yanez","Solicitud Bodega","2022-04-07","Aprobado","2");
INSERT INTO tb_bodega VALUES("333","LABORATORIO CLINICO","Anderson Eduardo López Rodriguez","Solicitud Bodega","2022-02-20","Aprobado","2");
INSERT INTO tb_bodega VALUES("339","Departamento Mantenimiento Local","Anderson Eduardo López Rodriguez","Solicitud Bodega","2022-02-20","Aprobado","2");
INSERT INTO tb_bodega VALUES("342","Área Residencial Médica","Ernesto Gonzalez Choto","Solicitud Bodega","2022-02-20","Aprobado","1");
INSERT INTO tb_bodega VALUES("354","Aérea Servicios Auxiliares","Miguel Antonio Corvera Torres","Solicitud Bodega","0000-00-00","Aprobado","2");
INSERT INTO tb_bodega VALUES("356","Departamento Mantenimiento Local","René Adán Villalta Pérez","Solicitud Bodega","2022-02-20","Aprobado","2");
INSERT INTO tb_bodega VALUES("357","Departamento Mantenimiento Local","Napoleon Alfredo Rodas","Solicitud Bodega","2022-02-20","Aprobado","2");
INSERT INTO tb_bodega VALUES("358","DIVISIÓN ADMINISTRATIVA","Napoleon Alfredo Rodas","Solicitud Bodega","2022-02-20","Aprobado","2");
INSERT INTO tb_bodega VALUES("359","Aérea Servicios Auxiliares","Miguel Antonio Corvera Torres","Solicitud Bodega","2022-04-01","Aprobado","2");
INSERT INTO tb_bodega VALUES("365","Unidad Sala de Operación","Anderson Eduardo López Rodriguez","Solicitud Bodega","0000-00-00","Aprobado","2");
INSERT INTO tb_bodega VALUES("387","Sección Equipo Médico","José Domingo Echeverría","Solicitud Bodega","0000-00-00","Aprobado","2");
INSERT INTO tb_bodega VALUES("388","Departamento Mantenimiento Local","Napoleon Alfredo Rodas","Solicitud Bodega","0000-00-00","Aprobado","2");
INSERT INTO tb_bodega VALUES("390","Unidad Sala de Partos","Anderson Eduardo López Rodriguez","Solicitud Bodega","0000-00-00","Aprobado","2");
INSERT INTO tb_bodega VALUES("396","Servicio Consulta Externa","Baltazar Alexander Marinero Perez","Solicitud Bodega","2022-04-29","Aprobado","2");
INSERT INTO tb_bodega VALUES("397","Servicio Almacén","Yenifer Marisol Campos Yanez","Solicitud Bodega","2022-04-29","Aprobado","2");
INSERT INTO tb_bodega VALUES("401","Radiologia e imagenes","Baltazar Alexander Marinero Perez","Solicitud Bodega","2022-05-16","Aprobado","2");
INSERT INTO tb_bodega VALUES("402","EMERGENCIA","Napoleon Alfredo Rodas","Solicitud Bodega","2022-05-11","Aprobado","2");
INSERT INTO tb_bodega VALUES("405","Unidad Sala de Operación","Kilmar Waldir Pérez Marin","Solicitud Bodega","2022-04-29","Aprobado","2");
INSERT INTO tb_bodega VALUES("409","Departamento Estadística y Documento Médicos","Fransico Tolentino López","Solicitud Bodega","2022-05-20","Aprobado","2");
INSERT INTO tb_bodega VALUES("411","EMERGENCIA","Miguel Antonio Corvera Torres","Solicitud Bodega","2022-05-06","Aprobado","2");
INSERT INTO tb_bodega VALUES("412","Departamento Mantenimiento Local","René Adán Villalta Pérez","Solicitud Bodega","2022-05-17","Pendiente","2");
INSERT INTO tb_bodega VALUES("418","Dirección Hospital","Fransico Tolentino López","Solicitud Bodega","2022-05-30","Aprobado","2");
INSERT INTO tb_bodega VALUES("419","Dirección Hospital","Fransico Tolentino López","Solicitud Bodega","2022-05-25","Aprobado","2");
INSERT INTO tb_bodega VALUES("420","EMERGENCIA","Fransico Tolentino López","Solicitud Bodega","2022-05-04","Aprobado","2");
INSERT INTO tb_bodega VALUES("422","Dirección Hospital","Miguel Antonio Corvera Torres","Solicitud Bodega","2022-05-06","Aprobado","2");
INSERT INTO tb_bodega VALUES("425","cirugia Hombre","Napoleon Alfredo Rodas","Solicitud Bodega","2022-05-06","Aprobado","2");
INSERT INTO tb_bodega VALUES("426","Servicio Trabajo Social","Miguel Antonio Corvera Torres","Solicitud Bodega","2022-05-09","Aprobado","2");
INSERT INTO tb_bodega VALUES("427","Departamento Mantenimiento Local","Miguel Antonio Corvera Torres","Solicitud Bodega","2022-05-11","Aprobado","2");
INSERT INTO tb_bodega VALUES("430","LABORATORIO CLINICO","Fransico Tolentino López","Solicitud Bodega","2022-05-16","Aprobado","2");
INSERT INTO tb_bodega VALUES("432","FARMACIA","Fransico Tolentino López","Solicitud Bodega","2022-05-11","Aprobado","2");
INSERT INTO tb_bodega VALUES("433","bienestar magisterial","Miguel Antonio Corvera Torres","Solicitud Bodega","2022-05-11","Aprobado","2");
INSERT INTO tb_bodega VALUES("445","Dirección Hospital","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-15","Pendiente","1");
INSERT INTO tb_bodega VALUES("449","Aérea Servicios Auxiliares","Kevin Alexander Guevara Marinero","Solicitud Bodega","2022-05-25","Aprobado","2");
INSERT INTO tb_bodega VALUES("450","Unidad Sala de Partos","Napoleon Alfredo Rodas","Solicitud Bodega","2022-05-17","Aprobado","2");
INSERT INTO tb_bodega VALUES("451","Departamento Mantenimiento Local","Napoleon Alfredo Rodas","Solicitud Bodega","2022-05-17","Aprobado","2");
INSERT INTO tb_bodega VALUES("452","Área COVID 19","Miguel Antonio Corvera Torres","Solicitud Bodega","2022-05-17","Aprobado","2");
INSERT INTO tb_bodega VALUES("453","FISIOTERAPIA","René Adán Villalta Pérez","Solicitud Bodega","2022-05-20","Aprobado","2");
INSERT INTO tb_bodega VALUES("478","Servicio Consulta Externa","René Adán Villalta Pérez","Solicitud Bodega","2022-05-24","Pendiente","2");
INSERT INTO tb_bodega VALUES("482","Departamento Mantenimiento Local","Yenifer Marisol Campos Yanez","Solicitud Bodega","2022-05-23","Aprobado","2");
INSERT INTO tb_bodega VALUES("483","Departamento Mantenimiento Local","Baltazar Alexander Marinero Perez","Solicitud Bodega","2022-05-20","Aprobado","2");
INSERT INTO tb_bodega VALUES("486","Sección Equipo Básico","Baltazar Alexander Marinero Perez","Solicitud Bodega","2022-05-24","Aprobado","2");
INSERT INTO tb_bodega VALUES("496","Servicio Obstetricia","Anderson Eduardo López Rodriguez","Solicitud Bodega","2022-05-25","Aprobado","2");
INSERT INTO tb_bodega VALUES("497","Departamento Mantenimiento Local","José Domingo Echeverría","Solicitud Bodega","2022-05-25","Aprobado","2");
INSERT INTO tb_bodega VALUES("500","Unidad Neonatos","René Adán Villalta Pérez","Solicitud Bodega","2022-05-27","Aprobado","2");
INSERT INTO tb_bodega VALUES("501","Departamento Mantenimiento Local","José Domingo Echeverría","Solicitud Bodega","2022-05-31","Aprobado","2");
INSERT INTO tb_bodega VALUES("502","Servicio Obstetricia","Fransico Tolentino López","Solicitud Bodega","2022-05-27","Aprobado","2");
INSERT INTO tb_bodega VALUES("504","Pediatría","Napoleon Alfredo Rodas","Solicitud Bodega","2022-05-01","Aprobado","2");
INSERT INTO tb_bodega VALUES("512","Área COVID 19","Napoleon Alfredo Rodas","Solicitud Bodega","2022-05-31","Aprobado","2");
INSERT INTO tb_bodega VALUES("514","Departamento Mantenimiento Local","Anderson Eduardo López Rodriguez","Solicitud Bodega","2022-05-30","Aprobado","2");
INSERT INTO tb_bodega VALUES("515","Pediatría","René Adán Villalta Pérez","Solicitud Bodega","2022-05-31","Aprobado","2");
INSERT INTO tb_bodega VALUES("516","FISIOTERAPIA","Fransico Tolentino López","Solicitud Bodega","2022-05-01","Aprobado","2");
INSERT INTO tb_bodega VALUES("517","Radiologia e imagenes","Yenifer Marisol Campos Yanez","Solicitud Bodega","2022-05-31","Aprobado","2");
INSERT INTO tb_bodega VALUES("518","bienestar magisterial","René Adán Villalta Pérez","Solicitud Bodega","2022-05-31","Aprobado","2");
INSERT INTO tb_bodega VALUES("519","Departamento Mantenimiento Local","Kevin Alexander Guevara Marinero","Solicitud Bodega","2022-05-01","Aprobado","2");
INSERT INTO tb_bodega VALUES("529","GINECOLOGIA","Napoleon Alfredo Rodas","Solicitud Bodega","2022-05-01","Aprobado","2");
INSERT INTO tb_bodega VALUES("554","Dirección Hospital","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-15","Pendiente","1");
INSERT INTO tb_bodega VALUES("1520","Sección Planta Física y Monitoreo","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-28","Aprobado","1");
INSERT INTO tb_bodega VALUES("1701","Unidad Máxima Urgencia","Anderson Eduardo López Rodriguez","Solicitud Bodega","2022-04-04","Pendiente","2");
INSERT INTO tb_bodega VALUES("2301","Unidad Financiara Institucional","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-15","Pendiente","1");
INSERT INTO tb_bodega VALUES("2451","Servicio Medicina Mujeres","Yenifer Marisol Campos Yanez","Solicitud Bodega","2022-04-06","Aprobado","2");
INSERT INTO tb_bodega VALUES("2641","Área COVID 19","Miguel Antonio Corvera Torres","Solicitud Bodega","2022-02-20","Aprobado","2");
INSERT INTO tb_bodega VALUES("2971","Departamento Mantenimiento Local","Anderson Eduardo López Rodriguez","Solicitud Bodega","2022-03-01","Rechazado","2");
INSERT INTO tb_bodega VALUES("2972","Departamento Mantenimiento Local","Anderson Eduardo López Rodriguez","Solicitud Bodega","2022-03-01","Aprobado","2");
INSERT INTO tb_bodega VALUES("3041","Departamento Mantenimiento Local","Anderson Eduardo López Rodriguez","Solicitud Bodega","2022-04-05","Pendiente","2");
INSERT INTO tb_bodega VALUES("3042","Departamento Mantenimiento Local","Anderson Eduardo López Rodriguez","Solicitud Bodega","2022-04-05","Aprobado","2");
INSERT INTO tb_bodega VALUES("3043","Departamento Mantenimiento Local","Anderson Eduardo López Rodriguez","Solicitud Bodega","2022-04-06","Aprobado","2");
INSERT INTO tb_bodega VALUES("3081","Aérea Servicios Auxiliares","Fransico Tolentino López","Solicitud Bodega","2022-04-04","Aprobado","2");
INSERT INTO tb_bodega VALUES("3082","Aérea Servicios Auxiliares","Fransico Tolentino López","Solicitud Bodega","2022-02-20","Aprobado","2");
INSERT INTO tb_bodega VALUES("3091","Departamento Mantenimiento Local","Miguel Antonio Corvera Torres","Solicitud Bodega","2022-04-05","Aprobado","2");
INSERT INTO tb_bodega VALUES("3101","Departamento Mantenimiento Local","Anderson Eduardo López Rodriguez","Solicitud Bodega","2022-04-01","Aprobado","2");
INSERT INTO tb_bodega VALUES("3131","Unidad Neonatos","Anderson Eduardo López Rodriguez","Solicitud Bodega","2022-05-31","Aprobado","2");
INSERT INTO tb_bodega VALUES("3141","DIVISIÓN ADMINISTRATIVA","Miguel Antonio Corvera Torres","Solicitud Bodega","2022-02-20","Aprobado","2");
INSERT INTO tb_bodega VALUES("3151","Servicio Almacén","José Domingo Echeverría","Solicitud Bodega","2022-04-06","Pendiente","2");
INSERT INTO tb_bodega VALUES("3152","FISIOTERAPIA","Fransico Tolentino López","Solicitud Bodega","2022-04-07","Aprobado","2");
INSERT INTO tb_bodega VALUES("3871","Departamento Mantenimiento Local","José Domingo Echeverría","Solicitud Bodega","2022-05-05","Aprobado","2");
INSERT INTO tb_bodega VALUES("4051","Departamento Mantenimiento Local","José Domingo Echeverría","Solicitud Bodega","2022-05-09","Aprobado","2");
INSERT INTO tb_bodega VALUES("4191","Dirección Hospital","Fransico Tolentino López","Solicitud Bodega","2022-05-25","Aprobado","2");
INSERT INTO tb_bodega VALUES("4261","Servicio Trabajo Social","Miguel Antonio Corvera Torres","Solicitud Bodega","2022-05-25","Aprobado","2");
INSERT INTO tb_bodega VALUES("4301","LABORATORIO CLINICO","Fransico Tolentino López","Solicitud Bodega","2022-05-16","Aprobado","2");
INSERT INTO tb_bodega VALUES("4321","FARMACIA","Fransico Tolentino López","Solicitud Bodega","2022-05-11","Aprobado","2");
INSERT INTO tb_bodega VALUES("4331","bienestar magisterial","Miguel Antonio Corvera Torres","Solicitud Bodega","2022-05-17","Aprobado","2");
INSERT INTO tb_bodega VALUES("4491","Aérea Servicios Auxiliares","Kevin Alexander Guevara Marinero","Solicitud Bodega","2022-05-25","Aprobado","2");
INSERT INTO tb_bodega VALUES("4511","Departamento Mantenimiento Local","Napoleon Alfredo Rodas","Solicitud Bodega","2022-05-17","Aprobado","2");
INSERT INTO tb_bodega VALUES("4512","Pediatría","Napoleon Alfredo Rodas","Solicitud Bodega","0000-00-00","Aprobado","2");
INSERT INTO tb_bodega VALUES("4521","Área COVID 19","Miguel Antonio Corvera Torres","Solicitud Bodega","0000-00-00","Aprobado","2");
INSERT INTO tb_bodega VALUES("4821","Departamento Mantenimiento Local","Yenifer Marisol Campos Yanez","Solicitud Bodega","2022-05-23","Aprobado","2");
INSERT INTO tb_bodega VALUES("4822","Departamento Mantenimiento Local","Yenifer Marisol Campos Yanez","Solicitud Bodega","2022-05-31","Aprobado","2");
INSERT INTO tb_bodega VALUES("5151","Pediatría","Yenifer Marisol Campos Yanez","Solicitud Bodega","2022-05-31","Aprobado","2");
INSERT INTO tb_bodega VALUES("5161","FISIOTERAPIA","Fransico Tolentino López","Solicitud Bodega","2022-05-01","Aprobado","2");
INSERT INTO tb_bodega VALUES("5181","Departamento Mantenimiento Local","José Domingo Echeverría","Solicitud Bodega","2022-05-01","Aprobado","2");
INSERT INTO tb_bodega VALUES("31601","Servicio Medicina Mujeres","René Adán Villalta Pérez","Solicitud Bodega","2022-04-05","Aprobado","2");
INSERT INTO tb_bodega VALUES("45111","Pediatría","Napoleon Alfredo Rodas","Solicitud Bodega","2022-05-18","Aprobado","2");
INSERT INTO tb_bodega VALUES("70222","Departamento Mantenimiento Local","Yenifer Marisol Campos Yanez","Solicitud Bodega","2022-04-05","Aprobado","2");
INSERT INTO tb_bodega VALUES("90222","Unidad Máxima Urgencia","Yenifer Marisol Campos Yanez","Solicitud Bodega","2022-04-05","Aprobado","2");
INSERT INTO tb_bodega VALUES("150322","Departamento Mantenimiento Local","Yenifer Marisol Campos Yanez","Solicitud Bodega","2022-04-05","Aprobado","2");
INSERT INTO tb_bodega VALUES("203220","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-03","Pendiente","1");
INSERT INTO tb_bodega VALUES("210422","DIVISIÓN ADMINISTRATIVA","Yenifer Marisol Campos Yanez","Solicitud Bodega","2022-04-01","Aprobado","2");
INSERT INTO tb_bodega VALUES("212121","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-02-25","Pendiente","1");
INSERT INTO tb_bodega VALUES("250222","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-02-26","Pendiente","1");
INSERT INTO tb_bodega VALUES("403220","Departamento Mantenimiento Local","Ernesto Choto","Solicitud Bodega","2022-03-05","Pendiente","2");
INSERT INTO tb_bodega VALUES("403221","Departamento Mantenimiento Local","Ernesto Choto","Solicitud Bodega","2022-03-05","Pendiente","2");
INSERT INTO tb_bodega VALUES("403222","Departamento Mantenimiento Local","Ernesto Choto","Solicitud Bodega","2022-03-05","Pendiente","2");
INSERT INTO tb_bodega VALUES("403223","Departamento Mantenimiento Local","Ernesto Choto","Solicitud Bodega","2022-03-05","Pendiente","2");
INSERT INTO tb_bodega VALUES("403225","Departamento Mantenimiento Local","Ernesto Choto","Solicitud Bodega","2022-03-05","Pendiente","2");
INSERT INTO tb_bodega VALUES("403226","Departamento Mantenimiento Local","Ernesto Choto","Solicitud Bodega","2022-03-05","Pendiente","2");
INSERT INTO tb_bodega VALUES("403227","Departamento Mantenimiento Local","Ernesto Choto","Solicitud Bodega","2022-03-05","Pendiente","2");
INSERT INTO tb_bodega VALUES("1032201","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-02","Pendiente","1");
INSERT INTO tb_bodega VALUES("1032202","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-02","Pendiente","1");
INSERT INTO tb_bodega VALUES("1032203","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-02","Pendiente","1");
INSERT INTO tb_bodega VALUES("1032204","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-02","Pendiente","1");
INSERT INTO tb_bodega VALUES("1032205","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-02","Pendiente","1");
INSERT INTO tb_bodega VALUES("1032206","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-02","Pendiente","1");
INSERT INTO tb_bodega VALUES("1032207","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-02","Pendiente","1");
INSERT INTO tb_bodega VALUES("1032208","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-02","Pendiente","1");
INSERT INTO tb_bodega VALUES("1032209","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-02","Pendiente","1");
INSERT INTO tb_bodega VALUES("1032210","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-02","Pendiente","1");
INSERT INTO tb_bodega VALUES("1032211","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-02","Pendiente","1");
INSERT INTO tb_bodega VALUES("1032212","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-02","Pendiente","1");
INSERT INTO tb_bodega VALUES("1032213","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-02","Pendiente","1");
INSERT INTO tb_bodega VALUES("1032214","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-02","Pendiente","1");
INSERT INTO tb_bodega VALUES("1032215","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-02","Pendiente","1");
INSERT INTO tb_bodega VALUES("1032216","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-02","Pendiente","1");
INSERT INTO tb_bodega VALUES("1032217","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-02","Pendiente","1");
INSERT INTO tb_bodega VALUES("1032220","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-02","Pendiente","1");
INSERT INTO tb_bodega VALUES("1032222","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-02","Pendiente","1");
INSERT INTO tb_bodega VALUES("1032224","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-02","Pendiente","1");
INSERT INTO tb_bodega VALUES("1032225","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-02","Pendiente","1");
INSERT INTO tb_bodega VALUES("1032226","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-02","Pendiente","1");
INSERT INTO tb_bodega VALUES("1032227","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-02","Pendiente","1");
INSERT INTO tb_bodega VALUES("1062022","Unidad Neonatos","Miguel Antonio Corvera Torres","Solicitud Bodega","2022-05-01","Aprobado","2");
INSERT INTO tb_bodega VALUES("1532022","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-02-25","Pendiente","1");
INSERT INTO tb_bodega VALUES("2032201","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-03","Pendiente","1");
INSERT INTO tb_bodega VALUES("2032202","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-03","Pendiente","1");
INSERT INTO tb_bodega VALUES("2032203","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-03","Pendiente","1");
INSERT INTO tb_bodega VALUES("2032204","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-03","Pendiente","1");
INSERT INTO tb_bodega VALUES("2032205","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-03","Pendiente","1");
INSERT INTO tb_bodega VALUES("2032206","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-03","Pendiente","1");
INSERT INTO tb_bodega VALUES("2032207","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-03","Pendiente","1");
INSERT INTO tb_bodega VALUES("2032208","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-03","Pendiente","1");
INSERT INTO tb_bodega VALUES("2032209","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-03","Pendiente","1");
INSERT INTO tb_bodega VALUES("2032210","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-03","Pendiente","1");
INSERT INTO tb_bodega VALUES("2032211","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-03","Pendiente","1");
INSERT INTO tb_bodega VALUES("2032212","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-03","Pendiente","1");
INSERT INTO tb_bodega VALUES("2032213","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-03","Pendiente","1");
INSERT INTO tb_bodega VALUES("2032214","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-03","Pendiente","1");
INSERT INTO tb_bodega VALUES("2032216","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-03","Pendiente","1");
INSERT INTO tb_bodega VALUES("2032217","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-03","Pendiente","1");
INSERT INTO tb_bodega VALUES("2502221","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-02-26","Pendiente","1");
INSERT INTO tb_bodega VALUES("2502222","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-02-26","Pendiente","1");
INSERT INTO tb_bodega VALUES("2502223","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-02-26","Pendiente","1");
INSERT INTO tb_bodega VALUES("2502224","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-02-26","Pendiente","1");
INSERT INTO tb_bodega VALUES("2502225","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-02-26","Pendiente","1");
INSERT INTO tb_bodega VALUES("2502226","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-02-26","Pendiente","1");
INSERT INTO tb_bodega VALUES("2502227","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-02-26","Pendiente","1");
INSERT INTO tb_bodega VALUES("2502228","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-02-26","Pendiente","1");
INSERT INTO tb_bodega VALUES("2502229","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-02-26","Pendiente","1");
INSERT INTO tb_bodega VALUES("2822221","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-01","Pendiente","1");
INSERT INTO tb_bodega VALUES("3032200","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-04","Pendiente","1");
INSERT INTO tb_bodega VALUES("3032201","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-04","Pendiente","1");
INSERT INTO tb_bodega VALUES("3032202","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-04","Pendiente","1");
INSERT INTO tb_bodega VALUES("3032203","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-04","Pendiente","1");
INSERT INTO tb_bodega VALUES("3032204","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-04","Pendiente","1");
INSERT INTO tb_bodega VALUES("3032205","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-04","Pendiente","1");
INSERT INTO tb_bodega VALUES("3032206","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-04","Pendiente","1");
INSERT INTO tb_bodega VALUES("3032207","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-04","Pendiente","1");
INSERT INTO tb_bodega VALUES("3032208","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-04","Pendiente","1");
INSERT INTO tb_bodega VALUES("3032209","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-04","Pendiente","1");
INSERT INTO tb_bodega VALUES("3032210","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-04","Pendiente","1");
INSERT INTO tb_bodega VALUES("3032211","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-04","Pendiente","1");
INSERT INTO tb_bodega VALUES("3032212","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-04","Pendiente","1");
INSERT INTO tb_bodega VALUES("3032213","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-04","Pendiente","1");
INSERT INTO tb_bodega VALUES("3032214","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-04","Pendiente","1");
INSERT INTO tb_bodega VALUES("3032215","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-04","Pendiente","1");
INSERT INTO tb_bodega VALUES("3032216","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-04","Pendiente","1");
INSERT INTO tb_bodega VALUES("3032217","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-04","Pendiente","1");
INSERT INTO tb_bodega VALUES("3032218","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-04","Pendiente","1");
INSERT INTO tb_bodega VALUES("3032219","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-04","Pendiente","1");
INSERT INTO tb_bodega VALUES("15320221","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-02-25","Pendiente","1");
INSERT INTO tb_bodega VALUES("15320223","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-02-25","Pendiente","1");
INSERT INTO tb_bodega VALUES("15320224","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-02-25","Pendiente","1");
INSERT INTO tb_bodega VALUES("28022201","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-01","Pendiente","1");
INSERT INTO tb_bodega VALUES("28022202","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-01","Pendiente","1");
INSERT INTO tb_bodega VALUES("28022203","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-01","Pendiente","1");
INSERT INTO tb_bodega VALUES("28022204","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-01","Pendiente","1");
INSERT INTO tb_bodega VALUES("28022205","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-01","Pendiente","1");
INSERT INTO tb_bodega VALUES("28022206","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-01","Pendiente","1");
INSERT INTO tb_bodega VALUES("28022208","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-01","Pendiente","1");
INSERT INTO tb_bodega VALUES("28022209","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-01","Pendiente","1");
INSERT INTO tb_bodega VALUES("28022210","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-01","Pendiente","1");
INSERT INTO tb_bodega VALUES("28022211","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-01","Pendiente","1");
INSERT INTO tb_bodega VALUES("28022212","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-01","Pendiente","1");
INSERT INTO tb_bodega VALUES("28022214","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-01","Pendiente","1");
INSERT INTO tb_bodega VALUES("28022216","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-01","Pendiente","1");
INSERT INTO tb_bodega VALUES("28022218","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-01","Pendiente","1");
INSERT INTO tb_bodega VALUES("28022219","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-01","Pendiente","1");
INSERT INTO tb_bodega VALUES("28022220","Departamento Mantenimiento Local","Ernesto Gonzalez Choto","Solicitud Bodega","2022-03-01","Pendiente","1");
INSERT INTO tb_bodega VALUES("405030522","Departamento Mantenimiento Local","José Domingo Echeverría","Solicitud Bodega","2022-05-03","Aprobado","2");
INSERT INTO tb_bodega VALUES("406030522","Unidad Sala de Operación","Miguel Antonio Corvera Torres","Solicitud Bodega","2022-05-03","Aprobado","2");
INSERT INTO tb_bodega VALUES("407030522","Departamento Mantenimiento Local","René Adán Villalta Pérez","Solicitud Bodega","2022-05-03","Aprobado","2");
INSERT INTO tb_bodega VALUES("408030522","Departamento Mantenimiento Local","Fransico Tolentino López","Solicitud Bodega","2022-05-03","Aprobado","2");



DROP TABLE tb_circulante;

CREATE TABLE `tb_circulante` (
  `codCirculante` int(15) NOT NULL,
  `campo` mediumtext NOT NULL DEFAULT 'Solicitud Circulante',
  `estado` mediumtext NOT NULL,
  `idusuario` int(11) NOT NULL DEFAULT 1,
  `fecha_solicitud` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`codCirculante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




DROP TABLE tb_compra;

CREATE TABLE `tb_compra` (
  `nSolicitud` int(11) NOT NULL,
  `dependencia` mediumtext NOT NULL,
  `plazo` mediumtext DEFAULT NULL,
  `unidad_tecnica` mediumtext NOT NULL,
  `descripcion_solicitud` mediumtext NOT NULL,
  `usuario` mediumtext NOT NULL,
  `campo` mediumtext NOT NULL DEFAULT 'Solicitud Compra',
  `estado` mediumtext NOT NULL,
  `idusuario` int(11) NOT NULL DEFAULT 1,
  `justificacion` mediumtext NOT NULL,
  `fecha_registro` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`nSolicitud`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




DROP TABLE tb_productos;

CREATE TABLE `tb_productos` (
  `cod` int(3) NOT NULL AUTO_INCREMENT,
  `codProductos` int(15) NOT NULL,
  `catalogo` int(15) NOT NULL,
  `descripcion` mediumtext NOT NULL,
  `unidad_medida` mediumtext NOT NULL DEFAULT 'C/U',
  `stock` decimal(6,2) unsigned NOT NULL DEFAULT 0.00,
  `precio` decimal(6,2) NOT NULL DEFAULT 0.00,
  `categoria` mediumtext NOT NULL,
  `fecha_registro` date NOT NULL DEFAULT current_timestamp(),
  `Dia` int(2) NOT NULL,
  `Mes` int(2) NOT NULL,
  `Año` int(4) NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=InnoDB AUTO_INCREMENT=702 DEFAULT CHARSET=utf8mb4;

INSERT INTO tb_productos VALUES("1","31161502","70212419","ANCLA PLASTICA PARA TABLA ROCA","C/U","56.00","0.23","Herramientas y Repuestos","2022-05-17","17","5","2022");
INSERT INTO tb_productos VALUES("2","43703002","72154119","NIPLE GALVANIZADO DE 1\" X 1 1/2\"","C/U","7.00","1.50","Minerales Metálicos","2022-03-07","7","3","2022");
INSERT INTO tb_productos VALUES("3","43703003","40142305","REDUCTOR CAMPANA GALVANIZADO DE 2 X 3/4\"","C/U","1.00","3.90","Minerales Metálicos","2022-03-08","8","3","2022");
INSERT INTO tb_productos VALUES("4","43703004","40142313","TAPON HEMBRA GALVANIZADO 1\"","C/U","10.00","1.10","Minerales Metálicos","2022-03-08","8","3","2022");
INSERT INTO tb_productos VALUES("5","43703005","40142305","REDUCTOR CAMPANA GALVANIZADO DE 1/2 X 5/8\"","C/U","6.00","1.80","Minerales Metálicos","2022-03-08","8","3","2022");
INSERT INTO tb_productos VALUES("6","43703006","40142305","REDUCTOR CAMPANA GALVANIZADO DE 1 X 5/8\"","C/U","3.00","2.00","Minerales Metálicos","2022-03-08","8","3","2022");
INSERT INTO tb_productos VALUES("7","43703007","40142305","REDUCTOR CAMPANA GALVANIZADO DE 1 X 3/4\"","C/U","3.00","2.30","Minerales Metálicos","2022-03-08","8","3","2022");
INSERT INTO tb_productos VALUES("8","43703008","40183104","TAPON HEMBRA PVC 1 1/4\" CON ROSCA","C/U","9.00","1.30","Herramientas y Repuestos","2022-03-08","8","3","2022");
INSERT INTO tb_productos VALUES("9","43703009","40183104","TAPON HEMBRA PVC DE 1\" CON ROSCA","C/U","5.00","1.00","Herramientas y Repuestos","2022-03-08","8","3","2022");
INSERT INTO tb_productos VALUES("10","43703010","40183104","TAPON MACHO DE 2\" PVC CON ROSCA","C/U","5.00","1.50","Herramientas y Repuestos","2022-03-08","8","3","2022");
INSERT INTO tb_productos VALUES("11","43703011","40175208","CODO PVC DE 2\" CON ROSCA","C/U","9.00","4.80","Herramientas y Repuestos","2022-03-08","8","3","2022");
INSERT INTO tb_productos VALUES("12","43703012","40175208","TEE PVC CON ROSCA 3/4\"","C/U","10.00","1.00","Herramientas y Repuestos","2022-03-08","8","3","2022");
INSERT INTO tb_productos VALUES("13","43703013","40161514","TAPON HEMBRA PVC 2 1/2\"","C/U","15.00","3.30","Herramientas y Repuestos","2022-03-08","8","3","2022");
INSERT INTO tb_productos VALUES("14","43703014","40171719","ADAPTADOR HEMBRA PVC 2 1/2\"","C/U","4.00","4.50","Herramientas y Repuestos","2022-03-08","8","3","2022");
INSERT INTO tb_productos VALUES("15","43703015","40171617","TUBO PVC 2 1/2 160 P.S.I.","mts","7.00","3.40","Herramientas y Repuestos","2022-03-08","8","3","2022");
INSERT INTO tb_productos VALUES("16","43703016","40141609","VALVULA DE PASO DE 1 1/2\"","C/U","1.00","62.00","Minerales Metálicos","2022-03-08","8","3","2022");
INSERT INTO tb_productos VALUES("17","43703017","30102403","HIERRO CUADRADO SOLIDO DE 1/4\"","mts","66.00","0.70","Minerales Metálicos","2022-03-11","11","3","2022");
INSERT INTO tb_productos VALUES("18","43703018","40142020","TUBO DE ABASTO PARA LAVAMANOS FLEXIBLE DE 3/8\" X1/2\" X 48\"","C/U","0.00","12.50","Herramientas y Repuestos","2022-03-15","15","3","2022");
INSERT INTO tb_productos VALUES("19","43703019","99999","CARBON 0252 PARA PULIDORA","C/U","2.00","5.30","Herramientas y Repuestos","2022-03-15","15","3","2022");
INSERT INTO tb_productos VALUES("20","43703020","99999","CARBON 1120 PARA PULIDORA","C/U","1.00","9.00","Herramientas y Repuestos","2022-03-15","15","3","2022");
INSERT INTO tb_productos VALUES("21","43703021","99999","Varilla lisa de 1/2\"","mts","24.00","2.33","Minerales Metálicos","2022-03-29","29","3","2022");
INSERT INTO tb_productos VALUES("22","43703022","40142604","CODO PVC 90° CON ROSCA","C/U","4.00","2.80","Herramientas y Repuestos","2022-05-17","17","5","2022");
INSERT INTO tb_productos VALUES("23","62502020","56101504","SILLA ERGONOMICAEJECUTIVA CON BRAZOS","C/U","1.00","175.00","MOBILIARIO","2022-06-07","7","6","2022");
INSERT INTO tb_productos VALUES("24","62504103","24102004","ESTANTE METÁLICO DE CINCO ENTREPAÑOS","C/U","0.00","97.00","MOBILIARIO","2022-06-07","7","6","2022");
INSERT INTO tb_productos VALUES("25","70101135","39101801","FOCO HALOGENO PARA MICROSCOPIO MICROESTAR 12V 20W,BASE G4","C/U","1.00","4.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("26","70101450","31171556","BALEROS N° 608-Z","C/U","2.00","3.80","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("27","70101453","31171556","BALEROS N° 6005-2Z","C/U","9.00","7.90","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("28","70101455","31171556","BALEROS N° 6200-2Z","C/U","3.00","4.20","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("29","70101458","31171556","BALEROS N° 6203-2Z","C/U","14.00","4.70","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("30","70101465","31171556","BALEROS N° 6309-Z","C/U","6.00","29.10","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("31","70101779","31162403","BISAGRA DE 2\"","C/U","30.00","0.40","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("32","70102969","42151657","BALONA METALICA DE COMPRESION 3/8\"","C/U","11.00","0.20","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("33","70103027","42182602","BOMBILLO PARA LAMPARA DE HENDIDURA 6 V","C/U","5.00","0.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("34","70103029","42182602","FOCO XHL DE 6V TUBO FLUORESCENTE DE FOTOTERAPIA F20T12/BB 20W AZUL","C/U","32.00","0.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("35","70104092","0","RELE DE ESTADO SOLIDO 120 VAC, 5 VOLTIOS","C/U","1.00","175.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("36","70104315","0","EMPAQUE DE COMPUERTA DE ESTERILIZADOR A VAPOR","C/U","3.00","800.00","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("37","70104350","99999","BOMBA DE AGUA PARA GENERADOR DE VAPOR","C/U","1.00","2825.00","Herramientas y Repuestos","2022-02-22","22","2","2022");
INSERT INTO tb_productos VALUES("38","70105620","39101801","FOCO HALOGENO 24V 150W","C/U","20.00","12.80","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("39","70110102","42143703","TUBO ULTRAVIOLETA PARA LAMPARA DE FOTOTERAPIA POTENCIA 20 WATTS, LUZ DE DIA","C/U","30.00","6.50","Materiales Eléctricos","2022-05-23","23","5","2022");
INSERT INTO tb_productos VALUES("40","70110115","39111705","LAMPARA FLUORESCENTE LUZ BLANCA 18 W PARA FOTOTERAPIA","C/U","24.00","1.60","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("41","70119002","32101617","TARJETA ELECTRONICA UNIVERSAL PARA EQUIPO DE AIRE ACONDICIONADO DE 9,000 A 24,000 BTU","C/U","4.00","20.00","Materiales Eléctricos","2022-05-26","26","5","2022");
INSERT INTO tb_productos VALUES("42","70120003","39121529","CONTACTOR DE 50 AMPERIOS, 3 POLOS , 480 VAC, BOBINA 24 VAC,TIPO 3PST","C/U","1.00","13.80","Materiales Eléctricos","2022-05-13","13","5","2022");
INSERT INTO tb_productos VALUES("43","70120019","39121529","CONTACTOR PARA 40 AMPERIOS, 2 POLOS COIL 220 VAC, 60 HZ.","C/U","2.00","10.00","Materiales Eléctricos","2022-05-30","30","5","2022");
INSERT INTO tb_productos VALUES("44","70120023","0","SECCIONADOR DE FASE DE 3 POLOS 250 V, 75 AMP","C/U","1.00","165.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("45","70120031","0","INTERRUPTOR SECCIONADOR F.160 AMP","C/U","1.00","0.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("46","70120080","99999","INTERRUPTOR TERMOMAGNETICO TRIFASICO, 400 AMPERIOS, 240 V., INCORPORADO EN GABINETE METALICO,NEMA 1","C/U","0.00","1.00","Materiales Eléctricos","2022-05-17","17","5","2022");
INSERT INTO tb_productos VALUES("47","70120206","32121502","CAPACITOR DE MARCHA DE 30MFD, 440VAC 60HZ","C/U","13.00","3.50","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("48","70120207","32121502","CAPACITOR DE MARCHA DE 35MFD, 440VAC 60HZ","C/U","2.00","3.50","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("49","70120208","32121502","CAPACITOR DE MARCHA DE 40MFD, 440VAC 60HZ","C/U","11.00","3.80","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("50","70120209","32121502","CAPACITOR DE MARCHA DE 55MFD, 440VAC 60HZ","C/U","56.00","6.40","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("51","70120211","32121502","CAPACITOR DE MARCHA DE 5O MFD, 440 VAC","C/U","13.00","4.50","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("52","70120212","32121502","CAPACITOR DE MARCHA DE 5MFD 370V","C/U","20.00","1.50","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("53","70120213","32121502","CAPACITOR DE MARCHA DE 7.5MFD 370V","C/U","17.00","1.70","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("54","70120216","32121502","CAPACITOR DE MARCHA DE 15 MFD, 370 VAC","C/U","19.00","2.90","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("55","70120222","32121502","CAPACITOR DE MARCHA DE 35 MFD. 370 VAC","C/U","10.00","3.60","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("56","70120224","32121502","CAPACITOR DE MARCHA DE 45 MFD, 370 VAC","C/U","27.00","4.30","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("57","70120225","32121502","CAPACITOR DE MARCHA DE 3 MFD, 450 VAC","C/U","1.00","0.90","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("58","70120226","32121502","CAPACITOR DE MARCHA DE 2 MFD, 450 VAC","C/U","10.00","1.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("59","70120227","32121502","CAPACITOR DE MARCHA DE 70 MFD, 370 VAC","C/U","27.00","5.90","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("60","70120228","32121502","CAPACITOR DE MARCHA DE 1.5 MFD, 450 VAC","C/U","12.00","0.80","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("61","70120229","32121502","CAPACITOR DE MARCHA DE 2.5 MFD, 450 VAC","C/U","3.00","1.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("62","70120231","32121502","CAPACITOR DE MARCHA DE 4.5 MFD, 450 VAC","C/U","2.00","1.30","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("63","70120234","32121502","CAPACITOR DE ARRANQUE DE 130-156 MFD, 220 V","C/U","12.00","3.10","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("64","70120238","32121502","CAPACITOR DE ARRANQUE DE 161-193 MDF 110-125 VAC","C/U","11.00","3.60","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("65","70120245","32121502","CAPACITOR DE ARRANQUE DE 161-193 MFD, 440 V","C/U","6.00","3.60","Materiales Eléctricos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("66","70120247","32121502","CAPACITOR DE ARRANQUE DE 189-227 MFD 370 VAC","C/U","8.00","5.20","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("67","70121027","40151607","COMPRESOR HERMETICO PARA AIRE ACONDICIONADO DE 12,000 BTU/H, 208/230 VOLTIOS, MONOFASICO, 60 HZ., TIPO SCROLL, GAS ECOLOGICO 410-A, SEER 13 O MAYOR","C/U","1.00","0.00","Materiales Eléctricos","2022-03-03","3","3","2022");
INSERT INTO tb_productos VALUES("68","70121081","40161514","FILTRO DESHIDRATADOR PARA 7. 5 TONELADAS, DE /8\", A SOLDAR","C/U","12.00","25.00","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("69","70121047","40151607","COMPRESOR HERMETICO DE 1/3 H. P., 120 VOLTIOS, REFRIGERANTE 134A, ENFRIADO POR AIRE, CON KIT DE ARRANQUE","C/U","3.00","191.25","Materiales Eléctricos","2022-03-03","3","3","2022");
INSERT INTO tb_productos VALUES("70","70120254","32121502","CAPACITOR DE MARCHA DE 60 MFD, (370-440) VAC","C/U","16.00","4.60","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("71","70121088","40161514","FILTRO DESHIDRATADOR 3/8\" A ROSCAR FLARE","cto","3.00","6.00","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("72","70121089","40161514","FILTRO DESHIDRATADOR 1/4\" A ROSCAR FLARE","C/U","2.00","0.00","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("73","70121091","40161514","FILTRO DESHIDRATADOR 3/4\" A ROSCAR FLARE","C/U","1.00","0.00","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("74","70121092","40161514","FILTRO DESHIDRATADOR 5/8\" A ROSCAR, FLARE","C/U","20.00","13.00","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("75","70121095","40161514","FILTRO DESHIDRATADOR DE 1/2? A SOLDAR","C/U","3.00","0.00","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("76","70121115","41112209","TERMOSTATO DE PARED PARA AIRE ACONDICIONADO, 24 VAC","C/U","5.00","20.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("77","70121127","41112209","TERMOSTATO PARA CUARTO FRIO, ANALOGO","C/U","1.00","5.30","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("78","70121142","39121523","TIMER RETARDADOR DE 0-8 MINUTOS","C/U","15.00","10.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("79","70121178","0","PROTECTOR DE FASE/VOLTAJE MONOFASICO, DIGITAL","C/U","1.00","78.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("80","70121180","39121523","RELAY FAN PARA AIRE ACONDICIONADO, 24 VOLTIOS, 1 PASO","C/U","6.00","8.50","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("81","70121497","39122219","SWITCH DE NIVEL FLOTADOR PARA CISTERNAS Y TANQUES","C/U","1.00","13.30","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("82","70121599","47131805","JABON LIMPIADOR DE SERPENTINES DE AIRE ACONDICIONADO","C/U","2.00","11.50","Químicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("83","70121654","0","CONTROL DE PRESION MODULANTE (VAPOR),MARCA HONEYWELL, L91A","C/U","1.00","0.00","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("84","70121708","0","MEDIDOR DE FLUJO DE COMBUSTIBLE, DIGITAL","C/U","0.00","975.00","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("85","70140024","31162903","ABRAZADERA DE ACERO INOXIDABLE SIN FIN PARA MANGUERA DE 3/8\"","C/U","48.00","0.80","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("86","70140025","31162903","ABRAZADERA DE ACERO INOXIDABLE SIN FIN PARA MANGUERA DE 5/8\"","C/U","44.00","1.10","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("87","70140026","31162903","ABRAZADERA DE ACERO INOXIDABLE SIN FIN PARA MANGUERA DE 1\"","C/U","6.00","0.30","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("88","70140027","31162903","ABRAZADERA DE ACERO INOXIDABLE SIN FIN PARA MANGUERA DE 1 1/2\"","C/U","25.00","1.80","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("89","70140028","31162903","ABRAZADERA DE ACERO INOXIDABLE SIN FIN PARA MANGUERA DE 2\"","C/U","20.00","0.70","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("90","70140070","31162903","ABRAZADERA DE ACERO INOXIDABLE SIN FIN 3/4\"","C/U","30.00","0.80","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("91","70150073","25174009","FAJA INDUSTRIAL No. A38","C/U","55.00","4.00","Cuero y Caucho","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("92","70150139","25174009","FAJA SPA- 3182 PARA LAVADORA","C/U","10.00","90.00","Cuero y Caucho","2022-05-18","18","5","2022");
INSERT INTO tb_productos VALUES("93","70150198","39121032","TRANSFORMADOR 100 VA","C/U","1.00","125.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("94","70150208","39122243","MICRO SWITCH DE FINAL DE CARRERA","C/U","1.00","49.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("95","70150547","31171556","RODAMIENTO (BALERO) 6202 2Z","C/U","1.00","3.50","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("96","70150551","31171556","RODAMIENTO (BALERO) 6205 2RSC3","C/U","1.00","5.30","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("97","70150563","31171556","RODAMIENTO (BALERO) 6305 RS","C/U","2.00","7.50","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("98","70150580","72154072","BOTONERA DE PARO DE EMERGENCIA","C/U","2.00","11.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("99","70154063","25174009","FAJA A63","C/U","3.00","0.00","Cuero y Caucho","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("100","70154142","25174009","FAJA A42","C/U","61.00","4.30","Cuero y Caucho","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("101","70154144","25174009","FAJA A44","C/U","4.00","0.00","Cuero y Caucho","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("102","70154416","25174009","FAJA AX 36","C/U","21.00","0.00","Cuero y Caucho","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("103","70154422","25174009","FAJAS FAJA AP-74 EN\"V","C/U","4.00","35.00","Cuero y Caucho","2022-05-18","18","5","2022");
INSERT INTO tb_productos VALUES("104","70154424","24100000","FAJA 3V 710 EN\"V\"","cto","6.00","60.00","Cuero y Caucho","2022-05-18","18","5","2022");
INSERT INTO tb_productos VALUES("105","70154510","25174009","FAJA AX 40","C/U","84.00","0.00","Cuero y Caucho","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("106","70170007","31162702","RODO GIRATORIO DE 60 MILIMETROS ( 2 PULG)","C/U","6.00","2.95","Herramientas y Repuestos","2022-05-17","17","5","2022");
INSERT INTO tb_productos VALUES("107","70170019","31162702","RODO GIRATORIO DE 125 MILIMETROS ( O SUEQUIVALENTE EN PULGADAS)","C/U","26.00","9.94","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("108","70170060","31162702","RODO FIJO DE 60 MILIMETROS ( O SU EQUIVALENTE EN PULGADAS)","C/U","31.00","2.20","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("109","70170069","31162702","RODO FIJO DE 125 MILIMETROS (5 PULGADAS)","C/U","26.00","2.75","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("110","70170100","31162702","RUEDA DE HULE DE 80","C/U","6.00","5.58","Herramientas y Repuestos","2022-05-17","17","5","2022");
INSERT INTO tb_productos VALUES("111","70205062","26121634","CABLE THHN NO 12 AWG, MILIMETROS ( 3 PLG)","mts","325.00","0.70","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("112","70189075","45121518","CABLE DE AUDIO MINI JACK 3,5 MM TRRS (CABLE PLANO P/","C/U","100.00","1.50","Materiales Eléctricos","2022-05-17","17","5","2022");
INSERT INTO tb_productos VALUES("113","70190804","25170000","LLANTA PARA BICICLETA 24\" X 2.125\"","C/U","6.00","9.80","Cuero y Caucho","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("114","70190806","25170000","LLANTA PARA BICICLETA 26\" X 2.125\"","C/U","11.00","9.80","Cuero y Caucho","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("115","70190825","25170000","TUBO PARA BICICLETA 24\" X 1.90\" X 2.125\"","C/U","27.00","5.20","Cuero y Caucho","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("116","70190826","0","TUBO DE BICICLETA DE 26\"","C/U","14.00","5.20","Cuero y Caucho","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("117","70190830","0","PARCHE PARA NEUMATICO DE BICICLETA,CAJA","C/U","120.00","2.40","Cuero y Caucho","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("118","70191288","99999","FILTRO DE COMBUSTIBLE DIESEL 50 PSI FILL RITE F2920","C/U","5.00","299.75","Herramientas y Repuestos","2022-05-17","17","5","2022");
INSERT INTO tb_productos VALUES("119","70205006","31152209","ALAMBRE DE COBRE No. 2 DESNUDO","mts","30.00","0.60","Materiales Eléctricos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("120","70205036","26121634","CABLE THHN NO 2 AWG, COLOR NEGRO","mts","80.00","6.20","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("121","70205037","26121634","CABLE THHN No. 4 AWG, COLOR NEGRO","mts","40.00","3.40","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("122","70205042","26121634","CABLE THHN No. 6 AWG, COLOR ROJO","mts","70.00","2.20","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("123","70205043","26121634","CABLE THHN No. 6 AWG, COLOR NEGRO","mts","80.00","2.20","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("124","70205044","26121634","CABLE THHN No. 6 AWG, COLOR BLANCO","mts","82.00","2.20","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("125","70205048","26121634","CABLE THHN No. 8 AWG, COLOR ROJO","mts","100.00","1.30","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("126","70205049","26121634","CABLE THHN No. 8 AWG, COLOR NEGRO","mts","170.00","1.30","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("127","70205050","26121634","CABLE THHN No. 8 AWG, COLOR BLANCO","mts","150.00","1.30","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("128","70205054","26121634","CABLE THHN No.10 AWG, COLOR ROJO","mts","50.00","1.00","Materiales Eléctricos","2022-05-23","23","5","2022");
INSERT INTO tb_productos VALUES("129","70205055","26121634","CABLE THHN No. 10 AWG, COLOR NEGRO","mts","50.00","0.70","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("130","70205056","26121634","CABLE THHN No. 10 AWG, COLOR BLANCO","mts","50.00","1.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("131","70205057","26121634","CABLE THHN No.10 AWG, COLOR AZUL","mts","150.00","0.70","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("132","70205058","26121634","CABLE THHN NO 10 AWG, COLOR VERDE","mts","0.00","1.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("133","70205060","26121634","CABLE THHN No. 12 AWG, COLOR ROJO","mts","175.00","0.70","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("134","70205061","26121634","CABLE THHN NO 12 AWG, COLOR NEGRO","mts","30.00","0.70","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("135","70205130","39121602","DADO TERMICO DE 20 AMPERIOS,1 DE POLO DE PRIMERA CALIDAD, IGUAL O COMPATIBLE CON LA MARCA GENERAL ELECTRIC","C/U","6.00","5.42","Materiales Eléctricos","2022-05-17","17","5","2022");
INSERT INTO tb_productos VALUES("136","70205135","39121602","DADO TERMICO DE 50 AMPERIOS, 1 POLO DE PRIMERA CALIDAD, IGUAL O COMPATIBLE CON LA MARCA GENERAL ELECTRIC","C/U","10.00","7.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("137","70205140","39121602","DADO TERMICO DE 50 AMPERIOS, 2 POLOS DE PRIMERA CALIDAD","C/U","2.00","28.90","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("138","70205141","39121602","DADO TERMICO DE 100 AMPERIOS, 2 POLOS DE PRIMERA CALIDAD, IGUAL O COMPATIBLE CON LA MARCA GENERAL","C/U","3.00","49.80","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("139","70205063","26121634","CABLE THHN NO 12 AWG, COLOR VERDE","mts","100.00","0.59","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("140","70205066","26121634","CABLE THHN No. 14 AWG, COLOR ROJO","mts","189.00","0.50","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("141","70205075","26121634","CABLE TNM NO 10/2","mts","30.00","2.40","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("142","70205076","26121634","CABLE TNM No. 12/2","mts","9.00","2.40","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("143","70205085","26121634","CABLE TNM No. 10/3","mts","295.00","3.10","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("144","70205086","26121634","CABLE TNM No. 12/3","mts","240.00","2.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("145","70205089","26121634","CABLE ELECTRICO TSJ 12/2 (VULCAN)","mts","204.00","1.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("146","70205090","26121634","CABLE ELECTRICO TSJ 14/2 (VULCAN)","mts","232.00","0.70","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("147","70205092","26121634","CABLE ELECTRICO TSJ 6/3 (VULCAN)","mts","12.00","9.60","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("148","70205093","26121634","CABLE ELECTRICO TSJ 14/3 (VULCAN)","mts","435.00","1.60","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("149","70205094","26121634","CABLE ELECTRICO TSJ 10/3 (VULCAN)","mts","12.00","4.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("150","70205097","26121634","CABLE ELECTRICO TSJ 12/3 (VULCAN)","mts","96.00","1.40","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("151","70205099","26121634","CABLE DUPLEX No. 12","mts","95.00","0.80","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("152","70205100","26121634","CABLE DUPLEX NO. 14","mts","122.00","0.50","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("153","70205105","26121634","CABLE DUPLEX NO. 10","mts","20.00","1.50","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("154","70205125","26121634","CABLE PORTAELECTRODOPARA SOLDAR PAWC 4 AWG","mts","21.00","6.10","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("155","70205126","26121634","CABLE PARA BOCINA","mts","217.00","0.60","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("156","70205140","39121602","DADO TERMICO DE 50 AMPERIOS, 2 POLOS DE PRIMERA CALIDAD","C/U","2.00","28.90","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("157","70205144","39121640","DADO TERMICO DE 40 AMPERIOS, 3 POLOS DE PRIMERA CALIDAD, IGUAL O COMPATIBLE CON LA MARCA GENERAL ELECTRIC","C/U","9.00","43.90","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("158","70205149","39121640","MARCA GENERALDADO TERMICO DE 40 AMP, 2 POLOS DE PRIMERA CALIDAD, IGUAL O COMPATIBLE CON LA ELECTRIC","C/U","10.00","14.90","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("159","70205156","39121602","DADO TERMICO DE 30 AMPERIOS, 3 POLOS DE PRIMERA CALIDAD,IGUAL O COMPATIBLE CON LA MARCA GENERAL ELECTRIC","C/U","9.00","34.60","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("160","70205157","39121529","DADO TERMICO DE 100 AMPERIOS, 3 POLOS DE PRIMERA CALIDAD, IGUAL O COMPATIBLE CON LA MARCA GENERAL ELECTRIC","C/U","5.00","82.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("161","70205152","39121602","DADO TERMICO DE 30 AMPERIOS, 2 POLOS DE PRIMERA CALIDAD, IGUAL O COMPATIBLE CON LA MARCA GENERAL ELECTRIC","C/U","5.00","14.70","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("162","70205148","39121602","DADO TERMICO DE 40 AMPERIOS, 1 POLOS DE PRIMERA CALIDAD, IGUAL O COMPATIBLE CON LA MARCA GENERAL ELECTRIC","C/U","62.00","7.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("163","70205170","39121303","CAJA TERMICA DE 4 CIRCUITOS, 2 POLOS, 240 VOLTIOS, IGUAL O COMPATIBLE CON LA MARCA GENERAL ELECTRIC","C/U","9.00","27.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("164","70205190","39121303","CAJA RECTANGULAR DE PVC 4\" X 2\"","C/U","250.00","0.40","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("165","70205158","39121602","DADO TERMICO DE 50 AMPERIOS, 3 POLOS DE PRIMERA CALIDAD,IGUAL O COMPATIBLE CON LA MARCA GENERAL ELECTRIC","C/U","5.00","34.60","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("166","70205192","39121309","CAJA OCTAGONAL PVC","C/U","9.00","0.70","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("167","70205193","39121304","TAPADERA PARA CAJA OCTAGONAL","C/U","115.00","0.30","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("168","70205215","39121303","CAJA TERMICA MONOFASICA DE 12 CIRCUITOS, 2 POLOS, NEMA 3R, 120/240 VOLTIOS","C/U","1.00","125.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("169","70205222","39101801","BOMBILLO PARA LAMPARA DE MERCURIO DE 175W, 220 VOLTIOS.","C/U","15.00","4.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("170","70205223","39111810","FOTOCELDA PARA LAMPARA DE MERCURIO DE 175W, 220 VOLTIOS","C/U","15.00","8.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("171","70205227","39101801","FOCO AHORRADOR DE ENERGIA DE 25 WATTS, 110 VOLTIOS","C/U","17.00","3.30","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("172","70205231","39101605","TUBO FLUORESCENTE DE 15 WATTS, 120 VOLTIOS","C/U","51.00","4.50","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("173","70205232","39101605","TUBO FLUORESCENTE DE 17 WATTS, 120 VOLTIOS","C/U","77.00","1.40","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("174","70205233","39101605","TUBO FLUORESCENTES DE 20 WATTS, 120 VOLTIOS","C/U","130.00","1.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("175","70205236","39101605","TUBO FLUORESCENTE DE 55 WATTS, 120 VOLTIOS","C/U","18.00","2.90","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("176","70205237","39101605","TUBO FLUORESCENTE DE 40 WATTS, 120 VOLTIOS","C/U","33.00","0.80","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("177","70205242","39101801","FOCO CORRIENTE DE 60 WATTS","cto","49.00","0.40","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("178","70205250","39101901","BALASTRO DE 2X40W, 120 VOLTIOS, RAPID STAR","C/U","34.00","18.40","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("179","70205252","39101901","BALASTRO ELECTRONICO DE 1X20 W, 120 VOLTIOS.","C/U","72.00","3.30","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("180","70205259","39101901","BALASTRO ELECTRONICO DE 2X32 W, 120 VOLTIOS","C/U","8.00","8.50","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("181","70205284","39121406","RECEPTACULO DE BAQUELITA FIJO","C/U","34.00","0.90","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("182","70205288","39120000","SOPORTE PARA LAMPARA C/U FLOURESCENTE TIPO RIEL","C/U","29.00","0.50","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("183","70205295","39121308","TOMACORRIENTE HEMBRA TIPO DADO, POLARIZADO","C/U","34.00","0.00","Materiales Eléctricos","2022-03-11","11","3","2022");
INSERT INTO tb_productos VALUES("184","70205296","39121308","TOMACORRIENTE HEMBRA, DOBLE, POLARIZADO","C/U","134.00","1.00","Herramientas y Repuestos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("185","70205297","39121308","TOMACORRIENTE HEMBRA , 220 VOLTIOS, 50 AMPERIOS","C/U","8.00","2.80","Materiales Eléctricos","2022-02-28","28","2","2022");
INSERT INTO tb_productos VALUES("186","70205300","39121308","TOMA CORRIENTE HEMBRA PARA VOLTIOS 50 AMPERIOS","C/U","8.00","2.80","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("187","70205301","39121308","TOMA CORRIENTE HEMBRA PARA EMPOTRAR, DE SEGURIDAD, 220 VOLTIOS 50 AMPERIOS, L630R TIPO NEMA","C/U","0.00","9.50","Materiales Eléctricos","2022-06-07","7","6","2022");
INSERT INTO tb_productos VALUES("188","70205310","39121308","TOMA CORRIENTE HEMBRA, DOBLE, POLARIZADO, GRADO HOSPITALARIO, 125 VOLTIOS, 15 AMPERIOS","C/U","5.00","7.50","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("189","70205312","39121308","TOMA CORRIENTE HEMBRA , 220 VOLTIOS, 30 AMPERIOS INCLUYE PLACA","C/U","4.00","4.20","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("190","70205319","39121308","TOMA CORRIENTE MACHO, TIPO CHINO DE 15 AMPERIOS","C/U","66.00","1.30","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("191","70205320","39121308","TOMA CORRIENTE MACHO, TIPO CHINO DE 20 AMPERIOS","C/U","8.00","2.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("192","70205328","39121308","TOMA CORRIENTE HEMBRA, 220 VOLTIOS, TIPO CHINO 15 AMPERIOS.","C/U","28.00","3.20","Materiales Eléctricos","2022-03-14","14","3","2022");
INSERT INTO tb_productos VALUES("193","70205329","39121308","TOMA CORRIENTE HEMBRA A 220 VOLTIOS, TIPO CHINO 20 AMPERIOS","C/U","3.00","3.50","Materiales Eléctricos","2022-03-14","14","3","2022");
INSERT INTO tb_productos VALUES("194","70205331","39121302","PLACA DOBLE DE BAQUELITA (PARA TOMA POLARIZADO)","C/U","30.00","0.30","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("195","70205338","39121302","PLACA SENCILLA METALICA","C/U","0.00","2.25","Materiales Eléctricos","2022-06-07","7","6","2022");
INSERT INTO tb_productos VALUES("196","70205344","39111810","INTERRUPTOR SENCILLO INTEGRADO DE PRIMERA CALIDAD","C/U","106.00","2.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("197","70205345","39111810","INTERRUPTOR DOBLE INTEGRADO DE PRIMERA CALIDAD","C/U","10.00","2.43","Materiales Eléctricos","2022-05-23","23","5","2022");
INSERT INTO tb_productos VALUES("198","70205357","70205357","SWITCH SUPERFICIAL PARA TIMBRE","C/U","8.00","1.40","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("199","70205359","0","TIMBRE A 110 VOLTIOS DIFUSOR ACRÍLICO TIPODIAMANTE PARA LÁMPARA DE 4x2 PIES","C/U","5.00","7.80","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("200","70205362","39122251","SWITCH SUPERFICIAL DE 10A, 125 VAC FUSIBLE PARA ALTA TENSION DE 10 AMPERIOS, TIPO K","C/U","20.00","1.50","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("201","70205421","39121432","TERMINAL DE BANDERA 12-10","C/U","40.00","0.16","Materiales Eléctricos","2022-05-26","26","5","2022");
INSERT INTO tb_productos VALUES("202","70205428","39121432","TERMINAL DE OJO No. 8","C/U","12.00","0.30","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("203","70205429","39120000","TERMINAL DE OJO No. 10","C/U","206.00","0.40","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("204","70205434","9999","BARRA COPERWELL DE 5/8\" X 2\" CON CEPO","C/U","2.00","4.80","Materiales Eléctricos","2022-03-14","14","3","2022");
INSERT INTO tb_productos VALUES("205","70205778","39121434","CONECTOR RECTO PARA 5/8\" X 2\" CON CEPO","C/U","60.00","10.50","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("206","70205453","39121434","CONECTOR RECTO DE 1/2\" METALICO","C/U","6.00","0.20","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("207","70205456","39120000","CONECTOR RECTO DE 3/4\", METALICO","C/U","80.00","0.90","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("208","70205459","39121434","CONECTOR RECTO DE 1\" METALICO","C/U","44.00","0.70","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("209","70205490","31231313","ELECTRICO POLIDUCTO DE 1/2\"","mts","50.00","1.00","Materiales Eléctricos","2022-03-11","11","3","2022");
INSERT INTO tb_productos VALUES("210","70205499","39131601","TECNODUCTO DE 3/4\"","mts","35.00","0.50","Materiales Eléctricos","2022-02-23","23","2","2022");
INSERT INTO tb_productos VALUES("211","70205500","39131601","TECNODUCTO DE 1\"","mts","100.00","0.75","Materiales Eléctricos","2022-05-23","23","5","2022");
INSERT INTO tb_productos VALUES("212","70205521","39121705","GRAPA PLASTICA PARA TNM 12/3","C/U","100.00","0.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("213","70205522","39121705","GRAPA PLASTICA PARA TNM 10/3","C/U","173.00","0.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("214","70205530","39121705","GRAPA PLASTICA PARA TNM 12/2","C/U","37.00","0.10","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("215","70205531","39121705","GRAPA PLASTICA PARA TNM 14/2","C/U","85.00","0.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("216","70205570","31201502","CINTA AISLANTE PVC 19 mm x 20 ydas x 0.177 mm, APROXIMADAMENTE, ROLLO","C/U","104.00","5.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("217","70205572","31201502","CINTA AISLANTE # 23, ROLLO","C/U","21.00","4.50","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("218","70205575","39121424","SCOTCHLOCK AZUL","C/U","147.00","0.10","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("219","70205577","39121424","SCOTCHLOCK ROJO","C/U","82.00","0.10","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("220","70205603","39121311","CUERPO TERMINAL DE 1\"","C/U","0.00","2.20","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("221","70205626","39121613","CEPO BIMETALICO NO. 1/0","C/U","2.00","3.20","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("222","70205627","39121613","CEPO BIMETALICO NO. 2/0","C/U","2.00","5.80","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("223","70205687","31162906","ABRAZADERA CONDUIT DE 2\"","C/U","60.00","0.90","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("224","70205688","31162906","ABRAZADERA CONDUIT DE 1 1/2\"","C/U","24.00","0.60","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("225","70205690","31162305","ABRAZADERA EMT DE 1 1/4\"","C/U","19.00","1.10","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("226","70205693","39121409","CONECTOR DE COMPRESION YPC2A8U","C/U","24.00","1.53","Materiales Eléctricos","2022-05-18","18","5","2022");
INSERT INTO tb_productos VALUES("227","70205744","30101809","CEPO GALVANIZADO DE 1/4\"","C/U","10.00","0.39","Minerales Metálicos","2022-06-07","7","6","2022");
INSERT INTO tb_productos VALUES("228","70205763","46171608","SENSOR DE MOVIMIENTOCON SOCKET DOBLE, 180° CORAZA GALVANIZADA DE 2\"","C/U","1.00","15.30","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("229","70205823","26121616","CABLE TELEFONICO 2 PARES","mts","340.00","0.20","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("230","70205825","0","CABLE DE EXTENSION ENESPIRAL PARA AURICULAR","C/U","103.00","3.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("231","70205826","39121310","CAJA TELEFONICA MODULAR","C/U","95.00","0.90","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("232","70205870","39101609","LUMINARIA EMPOTRAR, PANEL LED 2 X 4, 60WATTS,100-227 VAC, 6500K, 4800 LUMENS","C/U","0.00","50.95","Materiales Eléctricos","2022-05-23","23","5","2022");
INSERT INTO tb_productos VALUES("233","70205880","39101609","LUMINARIA LED DE ALTA EFICIENCIA PARA EXTERIORES, DE 50 WATTS, 100-277 VAC","C/U","12.00","30.94","Materiales Eléctricos","2022-05-18","18","5","2022");
INSERT INTO tb_productos VALUES("234","70205886","39111705","TUBO LED DE 18 WATTS, T8, 120 VOLTIOS","C/U","150.00","3.80","Materiales Eléctricos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("235","70206050","11101716","ESTAÑO 60X40 CON RESINA DE 1 mm EN CARRETE DE 500g","C/U","3.00","32.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("236","70207003","12142102","LIMPIADOR DE SISTEMA DE TUBERIA DE AIRE ACONDICIONADO","KG","32.00","24.70","Químicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("237","70207022","12142102","GAS REFRIGERANTE R410A, (TAMBO DE 25 LIBRAS)","C/U","5.00","119.90","Químicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("238","70207025","12142102","GAS REFRIGERANTE SUVA 134-A (TAMBO DE 24 LIBRAS)","C/U","2.00","149.88","Químicos","2022-05-23","23","5","2022");
INSERT INTO tb_productos VALUES("239","70207026","12142102","GAS REFRIGERANTE SUVA 134-A (FRASCO DE 1 Kg)","-","7.00","5.40","Químicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("240","70207046","40171511","TUBO DE COBRE FLEXIBLE PIE DE 3/8\"","-","150.00","1.10","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("241","70207047","40171511","TUBO DE COBRE FLEXIBLE PIE DE 7/8\"","-","40.00","2.30","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("242","70207049","40171511","TUBO DE COBRE FLEXIBLE PIE DE 1/4\"","-","150.00","0.80","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("243","70207066","40172103","CODO DE COBRE DE 1/2\" X90°","-","5.00","0.80","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("244","70207070","40172103","CODO DE COBRE DE 3/4\" X90°","C/U","112.00","1.20","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("245","70207072","40172103","CODO DE COBRE DE 1\" X90°","C/U","55.00","2.00","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("246","70207078","40172103","CODO DE COBRE DE 2.1/8\" X90°","C/U","4.00","9.30","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("247","70207080","40183103","CAMISA DE COBRE DE 3/4\"","C/U","16.00","0.90","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("248","70207090","40183103","CAMISA DE COBRE DE 2-1/8\"","C/U","5.00","5.30","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("249","70207092","40183103","CAMISA DE COBRE DE 1/2","C/U","20.00","0.70","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("250","70207101","31161722","TUERCAS DE BRONCE DE 1/4\", FLARE","C/U","34.00","0.50","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("251","70207106","31161722","TUERCA DE BRONCE DE 5/8\", FLARE","C/U","37.00","0.60","Minerales Metálicos","2022-03-30","30","3","2022");
INSERT INTO tb_productos VALUES("252","70207110","31161722","TUERCAS DE BRONCE DE 3/8\", FLARE","C/U","15.00","1.00","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("253","70207126","40183103","UNION DE BRONCE DE 5/8\", FLARE","C/U","3.00","1.30","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("254","70207143","0","VISOR DE LIQUIDO 1/2\"","C/U","4.00","9.00","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("255","70207144","0","VISOR DE LIQUIDO 3/8\"","C/U","9.00","5.60","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("256","70207145","0","VISOR DE LIQUIDO 5/8\"","C/U","14.00","22.80","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("257","70207146","0","VISOR DE LIQUIDO 7/8\"","C/U","22.00","14.30","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("258","70207147","40141609","VALVULA DE PASO DE 3/8\"","C/U","1.00","0.00","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("259","70207148","40141609","VALVULA DE PASO DE 5/8\"","C/U","10.00","0.00","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("260","70207155","39100000","SOLDADURA DE BRONCE 1/8\" (VARILLA)","C/U","46.00","2.30","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("261","70207156","23271804","SOLDADURA DE PLATA AL 5% (VARILLA)","C/U","94.00","2.60","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("262","70207162","31201503","CINTA ARNOLD PRIMERA CALIDAD, ROLLO","C/U","34.00","2.30","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("263","70207670","39121529","CONTACTOR ELECTROMECANICO, TRIFASICO, BOBINA 110 V","C/U","2.00","21.90","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("264","70207683","99999","TRAMPA DE VAPOR, TIPO TERMODINAMICA, DIAMETRO DE CONEXIÓN 3/4\", ROSCADA","C/U","3.00","110.00","Minerales Metálicos","2022-03-08","8","3","2022");
INSERT INTO tb_productos VALUES("265","70207774","99999","SAL INDUSTRIAL SIN YODO, PARA REGENERAR RESINA CATIONICA","Qq","0.00","17.38","Minerales no Metálicos","2022-03-25","25","3","2022");
INSERT INTO tb_productos VALUES("266","70207781","99999","PRODUCTO QUIMICO PARA TRATAMIENTO DEL AGUA EN CALDERAS, ANTI-INCRUSTANTE (","Galon","90.00","15.00","Químicos","2022-03-01","1","3","2022");
INSERT INTO tb_productos VALUES("267","70207782","99999","PRODUCTO QUIMICO PARA TRATAMIENTO DEL AGUA EN CALDERAS, ANTICORROSIVO (310-A)","Galon","30.00","18.00","Químicos","2022-03-01","1","3","2022");
INSERT INTO tb_productos VALUES("268","70207803","41103311","MANOMETRO","C/U","3.00","23.00","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("269","70207860","40141609","VALVULA DE GLOBO DE ACERO AL CARBONO, DIAMETRO 2\" PARA AGUA","C/U","6.00","46.00","Minerales Metálicos","2022-03-08","8","3","2022");
INSERT INTO tb_productos VALUES("270","70207979","40141607","VALVULA DE BOLA, ESFERA O CIERRE RAPIDO, ACERO AL CARBONO, DIAMETRO 1/2\"","C/U","1.00","55.00","Minerales Metálicos","2022-03-08","8","3","2022");
INSERT INTO tb_productos VALUES("271","70208043","30161602","CAPOTE INTERMEDIO PARA LAMINA METALICA TROQUELADA","C/U","7.00","10.80","Minerales Metálicos","2022-03-11","11","3","2022");
INSERT INTO tb_productos VALUES("272","70208067","31161507","AUTORROSCANTE 3/4\" X 5/16\"","C/U","150.00","0.00","Materiales Eléctricos","2022-03-16","16","3","2022");
INSERT INTO tb_productos VALUES("273","70208068","31161507","TORNILLO AUTORROSCANTE 1\"","C/U","4.00","0.06","Minerales Metálicos","2022-03-15","15","3","2022");
INSERT INTO tb_productos VALUES("274","70208080","99999","MASILLA PARA TABLA ROCA","Galon","25.00","3.90","Minerales no Metálicos","2022-05-05","5","5","2022");
INSERT INTO tb_productos VALUES("275","70208081","31201604","CEMENTO ASFALTICO TAPAGOTERAS","Galon","18.00","16.57","Químicos","2022-03-29","29","3","2022");
INSERT INTO tb_productos VALUES("276","70208083","31201513","CINTA ANTIDESLIZANTE 50 mm DE ANCHO , ROLLO","C/U","7.00","13.50","Minerales no Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("277","70208086","99999","IMPERMEABILIZANTE PARA CONCRETO","Galon","10.00","10.45","Químicos","2022-05-23","23","5","2022");
INSERT INTO tb_productos VALUES("278","70208110","30171703","CELOSÍA DE VIDRIO NEVADO DE 1 METRO","C/U","43.00","1.30","Minerales no Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("279","70208115","27111721","OPERADOR DE VENTANA","C/U","1.00","2.50","Herramientas y Repuestos","2022-02-28","28","2","2022");
INSERT INTO tb_productos VALUES("280","70208119","30111601","CEMENTO PARA PISO CERAMICO ,BOLSA DE 20 KILOGRAMOS","C/U","38.00","4.30","Minerales no Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("281","70208120","30111601","CEMENTO PORTLAND, BOLSA DE 42.5 KILOGRAMOS","C/U","15.00","10.80","Minerales no Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("282","70208300","30161509","TABLA ROCA DE YESO PARA INTERIORES DE 1.22 METROS X 2.44 METROS X 1/2\"","C/U","11.00","8.56","Minerales no Metálicos","2022-03-29","29","3","2022");
INSERT INTO tb_productos VALUES("283","70208307","30151703","POSTE METÁLICO GALVANIZADO DE 3.05 METROS PARA TABLA ROCA","C/U","25.00","1.90","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("284","70208312","31201510","CINTA PARA TABLA ROCA, USO INTERIORES,ROLLO","C/U","1.00","2.80","Minerales no Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("285","70208492","30171514","BRAZO HIDRAULICO TIPO LIVIANO PARA CIERRE DE PUERTA","C/U","1.00","24.50","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("286","70208495","30171514","BRAZO HIDRAULICO PARA CIERRE DE PUERTA","C/U","8.00","24.50","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("287","70208499","31162801","CHAPA PARA GAVETA DE ESCRITORIO TIPO PALETA","C/U","8.00","3.60","Herramientas y Repuestos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("288","70208500","31161606","CERRADURA PARA GAVETA","C/U","30.00","2.00","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("289","70208514","31162801","CHAPA PARA PUERTA , CON APERTURA ELECTRICA, (INCLUYE ACCESORIOS)","C/U","1.00","69.00","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("290","70208520","31162801","CHAPA DE PARCHE DERECHA","C/U","2.00","24.50","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("291","70208521","31162801","CHAPA DE PARCHE IZQUIERDA","C/U","1.00","15.95","Minerales Metálicos","2022-05-17","17","5","2022");
INSERT INTO tb_productos VALUES("292","70208522","31162801","CHAPA DE PIN DERECHA","C/U","2.00","29.80","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("293","70208523","31162801","CHAPA DE PIN IZQUIERDA","C/U","2.00","29.80","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("294","70208527","31162801","CHAPA CILÍNDRICA DE PALANCA CON LLAVE","C/U","13.00","22.30","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("295","70208549","46171501","CANDADO PARA INTERPERIE DE 30 MILIMETROS","C/U","2.00","3.40","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("296","70208554","46171501","CANDADO PARA INTERPERIE DE 60 MM","C/U","5.00","11.50","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("297","70208581","30161716","SEPARADOR PLASTICO DE 1/4\", PARA CERAMICA","C/U","750.00","0.00","Herramientas y Repuestos","2022-03-11","11","3","2022");
INSERT INTO tb_productos VALUES("298","70208630","0","PISO DE (33 X 33) CMS, PARA TRAFICO PESADO, VARIOS DISEÑOS Y COLORES","C/U","430.00","1.25","Minerales no Metálicos","2022-05-31","31","5","2022");
INSERT INTO tb_productos VALUES("299","70208750","30161602","LOSETA PARA CIELO FALSO, DE YESO, DE (4 X 2) PIES PERNO 1/2 X 2\" CON ARANDERLA PLANA Y PRESION CABEZA LISA","C/U","198.00","3.40","Minerales no Metálicos","2022-05-30","30","5","2022");
INSERT INTO tb_productos VALUES("300","70209066","31161601","PERNO 5 1/16 X 1 1/2\" ROSCA ORDINARIA","C/U","12.00","0.30","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("301","70209069","31161601","PERNO 5/16 X 2\" ROSCA ORDINARIA","C/U","46.00","0.40","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("302","70209073","31161700","PERNO 5/16 X 3/4\" TODO ROSCA","C/U","42.00","0.20","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("303","70209280","40173608","BUSHING REDUCTOR DE 1 1/2 A 1/2 PVC","C/U","6.00","0.55","Herramientas y Repuestos","2022-05-05","5","5","2022");
INSERT INTO tb_productos VALUES("304","70209283","40173608","BUSHING REDUCTOR DE 3\" A 1\" PVC","C/U","6.00","4.50","Minerales no Metálicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("305","70209284","40173608","BUSHING REDUCTOR DE 3\" A 2\" PVC","C/U","24.00","1.70","Herramientas y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("306","70209286","40175208","CODO PVC DE 1 1/2 X 45","C/U","4.00","1.80","Herramientas y Repuestos","2022-05-05","5","5","2022");
INSERT INTO tb_productos VALUES("307","70209289","40142604","CODO PVC 2 1/2 X 45","C/U","21.00","0.00","Herramientas y Repuestos","2022-03-03","3","3","2022");
INSERT INTO tb_productos VALUES("308","70209295","40175208","CODO PVC DE 3/4 1 BOCA CON ROSCA","C/U","47.00","0.70","Herramientas y Repuestos","2022-03-01","1","3","2022");
INSERT INTO tb_productos VALUES("309","70209296","40175208","CODO PVC DE 1\" X 90° CON ROSCA","C/U","31.00","1.20","Minerales no Metálicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("310","70209297","40175208","CODO PVC DE 1 1/2\" X 90° CON ROSCA","C/U","13.00","2.10","Minerales no Metálicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("311","70209299","40142115","TUBERÍA DE 1 1 /2\" DE 125 P.S.I DE P.V.C","mts","5.00","0.80","Herramientas y Repuestos","2022-03-02","2","3","2022");
INSERT INTO tb_productos VALUES("312","70209328","9999","CAMISA DE 1 1/4 GALVANIZADO","C/U","6.00","1.80","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("313","70209331","99999","CODO GALVANIZADO DE 4\" X 90","C/U","2.00","0.00","Minerales Metálicos","2022-03-04","4","3","2022");
INSERT INTO tb_productos VALUES("314","70209385","40142305","REDUCTOR CAMPANA DE 1 1/4 A 1\" GALVANIZADO","C/U","3.00","2.00","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("315","70209388","40142305","REDUCTOR CAMPANA DE 2\" A 1\" GALVANIZADO","C/U","4.00","0.00","Minerales Metálicos","2022-03-04","4","3","2022");
INSERT INTO tb_productos VALUES("316","70209427","40183104","TAPON MACHO DE 1 1/2","C/U","23.00","1.30","Herramientas y Repuestos","2022-02-28","28","2","2022");
INSERT INTO tb_productos VALUES("317","70208527","31162801","CHAPA CILÍNDRICA DE PALANCA CON LLAVE","C/U","13.00","22.30","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("318","70209519","0","CAMISA GALVANIZADA DE 2 1/2\"","C/U","3.00","4.90","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("319","70209654","39121705","GRAPA PARA CABLE 16-2","C/U","85.00","0.10","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("320","70209720","39121602","DADO TERMICO DE 20 IGUAL O COMPATIBLE CON EL TIPO CHB, MARCA","C/U","15.00","5.30","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("321","70209721","39121602","DADO TERMICO DE 30 AMPERIOS, 1 POLO, IGUAL O COMPATIBLE CON EL TIPO CHB, MARCA CUTLER HAMMER","C/U","3.00","6.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("322","70209719","39121601","DADO TERMICO DE 15 AMPERIOS, 1 POLO, IGUAL O COMPATIBLE CON EL TIPO CHB, MARCA CUTLER HAMMER 2 1/2\"","C/U","1.00","5.30","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("323","70209616","0","FUSIBLE DE 10 AMP 250V","C/U","66.00","0.30","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("324","70209618","0","FUSIBLE DE 2 AMP 250V","C/U","22.00","0.20","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("325","70209620","0","FUSIBLE DE 3 AMP 250V","C/U","28.00","0.30","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("326","70209622","0","FUSIBLE DE 5 AMP 250V","C/U","57.00","0.30","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("327","70209646","0","FUSIBLE 250V 6 A","C/U","1.00","0.80","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("328","70209746","39121602","DADO TÉRMICO DE 40 AMPERIOS, 2 POLOS, MODELO BAB","C/U","0.00","23.30","Materiales Eléctricos","2022-06-07","7","6","2022");
INSERT INTO tb_productos VALUES("329","70210041","30103605","TABLONCILLO DE CEDRO DE 3 VARAS","C/U","6.00","33.65","Agropecuarios y Forestales","2022-03-29","29","3","2022");
INSERT INTO tb_productos VALUES("330","70210087","30103605","TABLA DE CEDRO DE 3 VARAS","C/U","12.00","37.11","Agropecuarios y Forestales","2022-03-29","29","3","2022");
INSERT INTO tb_productos VALUES("331","70210139","30103607","REGLA PACHA DE CEDRO DE 4 VARAS","C/U","6.00","14.10","Agropecuarios y Forestales","2022-03-29","29","3","2022");
INSERT INTO tb_productos VALUES("332","70210181","30103601","CUARTON DE CEDRO DE 3 VARAS","C/U","15.00","32.80","Agropecuarios y Forestales","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("333","70210189","30103607","COSTANERA DE PINO DE 3.5 VARAS","C/U","0.00","14.10","Agropecuarios y Forestales","2022-03-29","29","3","2022");
INSERT INTO tb_productos VALUES("334","70210211","99999","COSTANERA DE CEDRO DE 3 VARAS","C/U","18.00","16.35","Agropecuarios y Forestales","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("335","70210280","11122001","PLYWOOD BANACK CLASE B DE 4 pies X 8 pies X 3/8\", PLIEGO","C/U","6.00","33.23","Agropecuarios y Forestales","2022-03-29","29","3","2022");
INSERT INTO tb_productos VALUES("336","70210283","11122001","PLYWOOD BANACK CLASE B DE 4 pies X 8 pies X 3/4\", PLIEGO","C/U","0.00","65.79","Agropecuarios y Forestales","2022-03-29","29","3","2022");
INSERT INTO tb_productos VALUES("337","70210289","11122001","PLYWOOD BANACK CLASE B DE 4 PIES X 8 PIES X 1/4\", PLIEGO","C/U","0.00","25.05","Agropecuarios y Forestales","2022-03-29","29","3","2022");
INSERT INTO tb_productos VALUES("338","70210292","11122001","PLYWOOD BANACK CLASE B DE 4 pies X 8 Forestales pies X 1/2\", PLIEGO","C/U","5.00","42.05","Agropecuarios y Forestales","2022-03-29","29","3","2022");
INSERT INTO tb_productos VALUES("339","70210315","30103604","FORMICA COLOR BLANCO C/U BRILLANTE, PLIEGO","C/U","0.00","31.95","Agropecuarios y Forestales","2022-03-25","25","3","2022");
INSERT INTO tb_productos VALUES("340","70210350","31191501","LIJA PARA MADERA NO.O, PLIEGO","C/U","10.00","0.55","Minerales no Metálicos","2022-03-29","29","3","2022");
INSERT INTO tb_productos VALUES("341","70210356","31191501","LIJA PARA MADERA No.36,PLIEGO","C/U","27.00","0.49","Minerales no Metálicos","2022-03-29","29","3","2022");
INSERT INTO tb_productos VALUES("342","70210357","31191501","LIJA PARA MADERA No. 50,PLIEGO","C/U","30.00","0.49","Minerales no Metálicos","2022-03-29","29","3","2022");
INSERT INTO tb_productos VALUES("343","70210359","31191501","LIJA PARA MADERA No. 80,PLIEGO","C/U","40.00","0.70","Minerales no Metálicos","2022-03-29","29","3","2022");
INSERT INTO tb_productos VALUES("344","70210360","31191501","LIJA PARA MADERA No. 100,PLIEGO","C/U","92.00","0.65","Minerales no Metálicos","2022-03-29","29","3","2022");
INSERT INTO tb_productos VALUES("345","70210362","31191501","LIJA PARA MADERA No. 150, PLIEGO","C/U","61.00","0.70","Minerales no Metálicos","2022-03-29","29","3","2022");
INSERT INTO tb_productos VALUES("346","70210363","31191501","LIJA PARA MADERA No. 180, PLIEGO","C/U","32.00","0.65","Minerales no Metálicos","2022-03-29","29","3","2022");
INSERT INTO tb_productos VALUES("347","70210365","31191501","LIJA PARA MADERA No. 220, PLIEGO","C/U","10.00","0.25","Minerales no Metálicos","2022-03-29","29","3","2022");
INSERT INTO tb_productos VALUES("348","70210400","31162801","HALADERA CROMADA DE 4\"","C/U","18.00","0.10","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("349","70210500","31201610","PEGAMENTO PARA MADERA","Galon","14.05","14.00","Químicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("350","70211000","30181506","URINARIO COLOR BLANCO COMPLETO ESTÁNDAR","C/U","1.00","115.00","Herramientas y Repuestos","2022-03-29","29","3","2022");
INSERT INTO tb_productos VALUES("351","70211005","30181505","SANITARIO COLOR BLANCO COMPLETO STANDARD","C/U","3.00","52.40","Herramientas y Repuestos","2022-03-29","29","3","2022");
INSERT INTO tb_productos VALUES("352","70211017","30181809","SIFON AL PISO ROSCADO DE 1 1/2 P/FREGADERO DE P.V.C.","C/U","18.00","3.50","Herramientas y Repuestos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("353","70211037","40141613","VALVULA, TIPO COMPUERTA, BRONCE,125 PSI, DIAMETRO 2\"","C/U","6.00","95.50","Minerales Metálicos","2022-03-08","8","3","2022");
INSERT INTO tb_productos VALUES("354","70211041","40141643","VÁLVULA CHECK HORIZONTAL 1 / 2\"","C/U","1.00","43.00","Minerales Metálicos","2022-03-09","9","3","2022");
INSERT INTO tb_productos VALUES("355","70211049","30181810","VÁLVULA PARA DUCHA DE 1 /2\"","C/U","29.00","11.40","Herramientas y Repuestos","2022-02-28","28","2","2022");
INSERT INTO tb_productos VALUES("356","70211050","40141609","VÁLVULA DE CONTROL CROMADA DE 1 /2\" AL PISO","C/U","36.00","2.75","Herramientas y Repuestos","2022-05-05","5","5","2022");
INSERT INTO tb_productos VALUES("357","70211051","40141609","VÁLVULA DE CONTROL CROMADA DE 1 / 2\"A LA PARED","C/U","88.00","2.50","Herramientas y Repuestos","2022-02-22","22","2","2022");
INSERT INTO tb_productos VALUES("358","70211063","30181810","MANECILLA PARA VÁLVULA PARA DUCHA","C/U","32.00","1.90","Herramientas y Repuestos","2022-03-02","2","3","2022");
INSERT INTO tb_productos VALUES("359","70211064","30181809","MANECILLA CROMADA PARA SERVICIO SANITARIO","C/U","74.00","0.94","Herramientas y Repuestos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("360","70211066","30181603","ASIENTO PLÁSTICO COLOR BLANCO PARA SANITARIO STANDARD","C/U","11.00","4.40","Herramientas y Repuestos","2022-02-28","28","2","2022");
INSERT INTO tb_productos VALUES("361","70211071","40142020","TUBO DE ABASTO DE ACERO INOXIDABLE PARA SANITARIO","C/U","63.00","2.60","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("362","70211109","40142604","CODO LISO DE 4\" X 90","C/U","12.00","5.60","Herramientas y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("363","70211073","40142020","TUBO DE ABASTO DE ACERO INOXIDABLE PARA LAVAMANOS","C/U","10.00","2.60","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("364","70211074","30181804","LLAVE DE 1 /2\" CON ROSCA PARA MANGUERA","C/U","28.00","5.00","Herramientas y Repuestos","2022-05-18","18","5","2022");
INSERT INTO tb_productos VALUES("365","70211076","30181804","LLAVE DE 1/2\" CROMADO PARA LAVAMANOS 1a CALIDAD","C/U","21.00","6.00","Minerales Metálicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("366","70211078","30181804","LLAVE CUELLO DE GANSO AL PISO PARA FREGADERO","C/U","63.00","13.50","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("367","70211087","30181809","SIFÓN HORIZONTAL DE 1 1/4\" P.V.C","C/U","10.00","3.30","Herramientas y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("368","70211089","4014719","ADAPTADOR MACHO DE 3\" DE P.V.C.","C/U","27.00","2.00","Herramientas y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("369","70211091","40141719","ADAPTADOR MACHO DE 3 /4\" P. V. C","C/U","83.00","0.10","Herramientas y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("370","70211092","40141719","ADAPTADOR MACHO DE 1\" DE P.V.C","C/U","217.00","0.30","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("371","70211093","40141719","ADAPTADOR MACHO DE 1.1 / 4\" DE P.V.C","C/U","53.00","0.40","Herramientas y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("372","70211094","40141719","ADAPTADOR MACHO DE 1. 1 / 2\" DE P.V.C","C/U","146.00","0.60","Herramientas y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("373","70211095","40141719","ADAPTADOR MACHO DE PVC 2\"","C/U","41.00","3.00","Minerales no Metálicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("374","70211096","40141719","ADAPTADOR MACHO PVC 2-1/2\"","C/U","28.00","1.90","Herramientas y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("375","70211097","40141719","ADAPTADOR HEMBRA DE 1/2\" DE P.V.C","C/U","55.00","0.20","Herramientas y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("376","70211098","40141719","ADAPTADOR MACHO PVC 4\"","C/U","22.00","2.80","Herramientas y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("377","70211099","40141719","ADAPTADOR HEMBRA DE 1\" DE P.V.C","C/U","66.00","0.90","Herramientas y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("378","70211100","40141719","ADAPTADOR HEMBRA DE 1. 1 / 4\" DE P.V.C","C/U","47.00","0.40","Herramientas y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("379","70211101","40141719","ADAPTADOR HEMBRA DE 1. 1 / 2\" DE P.V.C","C/U","38.00","0.51","Herramientas y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("380","70211102","40141719","ADAPTADOR HEMBRA LISO DE 1\" P.V.C.","C/U","12.00","0.27","Herramientas y Repuestos","2022-03-29","29","3","2022");
INSERT INTO tb_productos VALUES("381","70211103","40141751","CODO LISO DE 1\" DE P.V.C","C/U","41.00","0.30","Herramientas y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("382","70211104","40141751","CODO LISO DE 2\" X 90 DE P.V.C.","C/U","23.00","0.90","Herramientas y Repuestos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("383","70211105","40141751","CODO LISO DE 1 /2\" X 90 DE P.V.C","C/U","226.00","0.10","Herramientas y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("384","70211106","40141751","CODO LISO DE 3 /4\" X 90 P.V.C","C/U","82.00","0.20","Herramientas y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("385","70211107","40141751","CODO DE 1 1/4\" X 90 P.V.C","C/U","20.00","0.50","Herramientas y Repuestos","2022-02-28","28","2","2022");
INSERT INTO tb_productos VALUES("386","70211108","40142604","CODO LISO DE 3\" X 90 PVC","C/U","15.00","3.40","Herramientas y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("387","70211109","40142604","CODO LISO DE 4\" X 90 P.V.C","C/U","12.00","5.60","Herramientas y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("388","70211115","40173608","REDUCTOR DE 3 / 4\" A 1 / 2\" DE P.V.C","C/U","35.00","0.10","Herramientas y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("389","70211116","40173608","REDUCTOR DE 1\" A 3 / 4\" DE P.V.C","C/U","60.00","0.20","Herramientas y Repuestos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("390","70211117","40173608","REDUCTOR DE 1 1/2 A 1\" DE P.V.C","C/U","50.00","0.40","Herramientas y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("391","70211118","40173608","REDUCTOR DE 1 1/4 A 3/4 DE P.V.C","C/U","49.00","0.30","Herramientas y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("392","70211119","40173608","REDUCTOR DE 1\" A 1 / 2\" DE P.V.C","C/U","99.00","0.70","Herramientas y Repuestos","2022-03-08","8","3","2022");
INSERT INTO tb_productos VALUES("393","70211120","40173608","REDUCTOR DE 1 1/2\" A 3/4\" DE P.V.C","C/U","11.00","0.80","Minerales no Metálicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("394","70211122","40142615","REDUCTOR DE 2\" A 1/2\" DE P.V.C","C/U","16.00","1.10","Minerales no Metálicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("395","70211124","40173608","REDUCTOR DE 1 1/2 A 1 1/4\" DE P.V.C","C/U","51.00","0.40","Herramientas y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("396","70211125","40142615","REDUCTOR DE 2\" A 1\" DE P.V.C","C/U","94.00","0.80","Herramientas y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("397","70211126","40142615","REDUCTOR DE 2\" A 1 1/2\" DE P.V.C","C/U","25.00","1.20","Minerales no Metálicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("398","70211127","40142615","REDUCTOR DE 2\" A 1 1/4\" DE P.V.C.","C/U","66.00","0.70","Herramientas y Repuestos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("399","70211128","40142615","REDUCTOR DE 2 1/2\" A 2\" DE P.V.C","C/U","70.00","4.70","Herramientas y Repuestos","2022-03-03","3","3","2022");
INSERT INTO tb_productos VALUES("400","70211130","40173608","TEE DE 1/2\" DE PVC","C/U","18.00","0.20","Herramientas y Repuestos","2022-02-28","28","2","2022");
INSERT INTO tb_productos VALUES("401","70211132","40173608","TEE DE 1\" DE P.V.C","C/U","21.00","2.80","Herramientas y Repuestos","2022-03-08","8","3","2022");
INSERT INTO tb_productos VALUES("402","70211133","40173608","TEE DE 1 .1/ 4\" DE P.V.C","C/U","29.00","1.50","Minerales no Metálicos","2022-03-01","1","3","2022");
INSERT INTO tb_productos VALUES("403","70211134","40173608","TEE DE 1 .1/ 2\" DE P.V.C","C/U","166.00","1.50","Herramientas y Repuestos","2022-03-01","1","3","2022");
INSERT INTO tb_productos VALUES("404","70211135","40173608","TEE DE 2\" DE P.V.C","C/U","11.00","2.40","Herramientas y Repuestos","2022-03-11","11","3","2022");
INSERT INTO tb_productos VALUES("405","70211138","40142605","TEE DE 3\" DE P.V.C C/U","C/U","22.00","4.50","Herramientas y Repuestos","2022-02-28","28","2","2022");
INSERT INTO tb_productos VALUES("406","70211140","40183103","CAMISA DE 1 /2\" P.V.C","C/U","23.00","0.10","Herramientas y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("407","70211143","40183103","CAMISA DE 1 .1 / 4\" P.V.C","C/U","34.00","0.30","Herramientas y Repuestos","2022-02-28","28","2","2022");
INSERT INTO tb_productos VALUES("408","70211144","40183103","CAMISA DE 1 .1 / 2\" P.V.C","C/U","1.00","0.80","Herramientas y Repuestos","2022-03-03","3","3","2022");
INSERT INTO tb_productos VALUES("409","70211145","40183103","CAMISA DE 2\" P.V.C","C/U","28.00","1.20","Herramientas y Repuestos","2022-03-01","1","3","2022");
INSERT INTO tb_productos VALUES("410","70211146","40183103","CAMISA DE 3\" P.V.C","C/U","10.00","1.80","Herramientas y Repuestos","2022-02-28","28","2","2022");
INSERT INTO tb_productos VALUES("411","70211147","40141751","CODO LISO DE 2 1/2\" DE P.V.C.","C/U","88.00","0.00","Herramientas y Repuestos","2022-03-03","3","3","2022");
INSERT INTO tb_productos VALUES("412","70211148","40141751","CODO LISO DE 1 1/2\" DE P.V.C.","C/U","55.00","0.60","Herramientas y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("413","70211149","40142604","CODO MIXTO DE 1/2\", PVC","C/U","146.00","0.20","Herramientas y Repuestos","2022-02-28","28","2","2022");
INSERT INTO tb_productos VALUES("414","70211150","40171617","TUBERÍA DE 1 /2\" DE 315 P. S. I DE P.V.C","mts","204.00","0.30","Herramientas y Repuestos","2022-03-01","1","3","2022");
INSERT INTO tb_productos VALUES("415","70211151","40171617","TUBERÍA DE 3 /4\" DE 250 P.S.I DE P.V.C","mts","132.00","0.50","Herramientas y Repuestos","2022-03-01","1","3","2022");
INSERT INTO tb_productos VALUES("416","70211152","40171617","TUBERÍA DE 1\" DE 250 P.S.I. DE P.V.C","mts","246.00","0.70","Herramientas y Repuestos","2022-03-01","1","3","2022");
INSERT INTO tb_productos VALUES("417","70211155","40171617","TUBERÍA DE 2\" DE 160 P.S.I. DE P.V.C","mts","310.00","1.50","Herramientas y Repuestos","2022-03-01","1","3","2022");
INSERT INTO tb_productos VALUES("418","70211161","40171617","TUBERÍA DE 4\" DE 160 P.S.I DE P.V.C","mts","48.00","6.70","Herramientas y Repuestos","2022-02-28","28","2","2022");
INSERT INTO tb_productos VALUES("419","70211163","40171617","TUBERÍA DE 6\" DE 125 P.S.I DE P.V.C","mts","2.00","21.70","Herramientas y Repuestos","2022-03-08","8","3","2022");
INSERT INTO tb_productos VALUES("420","70211166","40171617","TUBERÍA DE 1 .1 /4\" 160 P.S.I DE P.V.C","mts","258.00","0.70","Herramientas y Repuestos","2022-03-01","1","3","2022");
INSERT INTO tb_productos VALUES("421","70211174","40141751","CODO CURVA DE 3\" X 90 P.V.C.","C/U","7.00","1.80","Herramientas y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("422","70211177","40183103","UNION UNIVERSAL DE 3\" PVC","C/U","24.00","1.36","Herramientas y Repuestos","2022-03-03","3","3","2022");
INSERT INTO tb_productos VALUES("423","70211179","40183103","UNION UNIVERSAL DE 1 1/4\" DE P.V.C.","C/U","20.00","5.10","Herramientas y Repuestos","2022-03-08","8","3","2022");
INSERT INTO tb_productos VALUES("424","70211197","40141719","ADAPTADOR HEMBRA DE 1/2\" DE P.V.C","C/U","53.00","0.20","Herramientas y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("425","70211220","39121452","UNION UNIVERSAL DE HIERRO GALVANIZADO, DIAMETRO 1/2\"","C/U","31.00","2.80","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("426","70211221","39121452","UNION UNIVERSAL DE HIERRO GALVANIZADO, DIAMETRO 3/4\"","C/U","20.00","3.30","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("427","70211222","39121452","UNION UNIVERSAL DE HIERRO GALVANIZADO, DIAMETRO 1\"","C/U","6.00","4.90","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("428","70211223","39121452","UNION UNIVERSAL DE HIERRO GALVANIZADO, DIAMETRO 1.1/4\"","C/U","1.00","5.00","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("429","70211224","39121452","UNION UNIVERSAL DE HIERRO GALVANIZADO, DIAMETRO 1.1/2\"","C/U","5.00","5.40","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("430","70211225","39121452","UNION UNIVERSAL DE HIERRO GALVANIZADO, DIAMETRO 2\"","C/U","1.00","0.00","Minerales Metálicos","2022-03-03","3","3","2022");
INSERT INTO tb_productos VALUES("431","70211227","9999","CAMISA GALVANIZADA, DIAMETRO 3\"","C/U","3.00","8.00","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("432","70211229","9999","CAMISA GALVANIZADA, DIAMETRO 1/2\"","C/U","13.00","0.60","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("433","70211230","40142609","CODO DE HIERRO GALVANIZADO, 90º, DIAMETRO 1/2\"","C/U","198.00","0.80","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("434","70211231","40142317","CODO DE HIERRO GALVANIZADO, 90º, DIAMETRO 3/4\"","C/U","21.00","1.10","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("435","70211232","40142317","CODO DE HIERRO GALVANIZADO, 90º, DIAMETRO 1\"","C/U","21.00","2.00","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("436","70211233","40142317","CODO DE HIERRO GALVANIZADO, 90º,DIAMETRO 1.1/4\"","C/U","18.00","2.60","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("437","70211235","40142317","CODO DE HIERRO GALVANIZADO, 90º, DIAMETRO 2\"","C/U","3.00","4.80","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("438","70211241","40142315","TEE DE HIERRO GALVANIZADO, DIAMETRO 3/4\"","C/U","19.00","1.40","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("439","70211242","40142315","TEE DE HIERRO GALVANIZADO ,DIAMETRO DE 1\"","C/U","3.00","2.40","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("440","70211251","72154119","NIPLE DE HIERRO GALVANIZADO, DE 3/4\" X 4\"","C/U","8.00","1.90","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("441","70211254","72154119","NIPLE DE HIERRO GALVANIZADO, DE 1.1/2\" X 4\"","C/U","5.00","2.60","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("442","70211255","72154119","NIPLE DE HIERRO GALVANIZADO, DE 2\" X 4\"","C/U","8.00","4.80","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("443","70211260","40171527","CAÑO GALVANIZADO, DE 1/2\", TIPO MEDIANO,CEDULA 30","mts","12.00","4.00","Minerales Metálicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("444","70211261","40171527","CAÑO GALVANIZADO, DE 3/4\", TIPO MEDIANO, CEDULA 30","mts","18.00","4.60","Minerales Metálicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("445","70211262","40171527","CAÑO GALVANIZADO, DE 1\", TIPO MEDIANO, CEDULA 30","mts","24.00","12.20","Minerales Metálicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("446","70211264","40141705","CAÑO GALVANIZADO, DE 1-1/2\", TIPO MEDIANO, CEDULA 30","mts","24.00","14.90","Minerales Metálicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("447","70211280","40142305","BUSHING REDUCTOR DE HIERRO GALVANIZADO DE 1\" A 1/2\"","C/U","4.00","0.80","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("448","70211283","40142305","BUSHING REDUCTOR DE HIERRO GALVANIZADO DE 3/4\" A 1/2\"","C/U","27.00","0.60","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("449","70211287","72154119","NIPLE DE HIERRO GALVANIZADO TODO ROSCA DE 1/2\" X 1\"","C/U","0.00","0.40","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("450","70211288","72154119","NIPLE DE HIERRO GALVANIZADO TODO ROSCA DE 1/2\" X 2\"","C/U","3.00","0.70","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("451","70211297","40142313","TAPON HEMBRA DE 1/2\" GALVANIZADO","C/U","15.00","0.60","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("452","70211298","40142313","TAPON HEMBRA DE 3/4\" GALVANIZADO","C/U","10.00","0.80","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("453","70211300","31201514","CINTA TEFLÓN","C/U","378.00","0.30","Químicos","2022-03-07","7","3","2022");
INSERT INTO tb_productos VALUES("454","70211303","40183104","TAPON MACHO DE 1/2\" GALVANIZADO","C/U","4.00","1.10","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("455","70211304","40183104","TAPON MACHO DE 3/4\" GALVANIZADO","C/U","10.00","1.60","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("456","70211305","40183104","TAPON MACHO DE 1\" GALVANIZADO","C/U","2.00","0.50","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("457","70211309","31201610","PEGAMENTO PARA P.V.C,","C/U","10.00","9.00","Químicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("458","70211400","40141703","DUCHA PARA BAÑO","C/U","5.00","3.30","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("459","70211423","40142008","MANGUERA PLASTICA DE 1/2\" X 100 PIES REFORZADA CON HILO DE NYLON CON TERMINALES MACHO Y HEMBRA","C/U","1.00","16.30","Herramientas y Repuestos","2022-02-28","28","2","2022");
INSERT INTO tb_productos VALUES("460","70211321","72154119","1 /8 DE GALÓN NIPLE DE HIERRO GALVANIZADO DE 3/4\" X 3\"","C/U","5.00","0.70","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("461","70211337","40142305","REDUCTOR CAMPANA DE HIERRO GALVANIZADO 1\" A 1/2\"","C/U","4.00","1.10","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("462","70211346","9999","CAMISA DE HIERRO GALVANIZADO DE 3/4\"","C/U","26.00","0.90","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("463","70211347","9999","CAMISA DE HIERRO GALVANIZADO DE 1\"","C/U","18.00","1.30","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("464","70211348","40141719","CAMISA DE HIERRO GALVANIZADO DE 1 1/2\"","C/U","6.00","2.20","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("465","70211349","40141719","CAMISA DE HIERRO GALVANIZADO DE 2\"","C/U","13.00","3.70","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("466","70211385","40171611","VALVULA TIPO GLOBO DE PP DE 1/2\"","C/U","23.00","3.25","Herramientas y Repuestos","2022-03-01","1","3","2022");
INSERT INTO tb_productos VALUES("467","70211390","30181804","GRIFO DE PEDAL HORIZONTAL, CUERPO Y PALANCA DE ACERO INOXIDABLE CROMADO","C/U","5.00","85.00","Minerales Metálicos","2022-03-01","1","3","2022");
INSERT INTO tb_productos VALUES("468","70211395","30181804","LLAVE DE 3/4\" CON ROSCA PARA MANGUERA","C/U","52.00","4.40","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("469","70211427","40142002","MANGUERA PLASTICA TRANSPARENTE DE 3/8\"","C/U","4.00","1.50","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("470","70211428","40142002","MANGUERA PLASTICA TRANSPARENTE DE 3/4\"","C/U","5.00","0.90","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("471","70211430","40183104","TAPON MACHO CON ROSCA PVC 1/2\"","C/U","612.00","0.60","Minerales no Metálicos","2022-03-01","1","3","2022");
INSERT INTO tb_productos VALUES("472","70211435","40183104","TAPON MACHO CON ROSCA PVC 3/4\"","C/U","38.00","0.70","Minerales no Metálicos","2022-03-01","1","3","2022");
INSERT INTO tb_productos VALUES("473","70211440","40183104","TAPON MACHO CON ROSCA PVC 1\"","C/U","113.00","0.84","Minerales no Metálicos","2022-03-01","1","3","2022");
INSERT INTO tb_productos VALUES("474","70211453","40183104","TAPON HEMBRA LISO PVC 1/2\"","C/U","104.00","0.05","Herramientas y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("475","70211454","40183104","TAPON HEMBRA LISO PVC 3/4\"","C/U","101.00","0.70","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("476","70211455","40183104","TAPON HEMBRA LISO PVC 1\"","C/U","123.00","0.40","Minerales no Metálicos","2022-03-01","1","3","2022");
INSERT INTO tb_productos VALUES("477","70211456","40183104","TAPON HEMBRA LISO PVC 1 1/2\"","C/U","31.00","0.30","Herramientas y Repuestos","2022-02-28","28","2","2022");
INSERT INTO tb_productos VALUES("478","70211457","40183104","TAPON HEMBRA LISO PVC 1 1/4\"","C/U","20.00","0.50","Minerales no Metálicos","2022-03-01","1","3","2022");
INSERT INTO tb_productos VALUES("479","70211458","40183104","TAPON HEMBRA LISO PVC 2\"","C/U","19.00","1.20","Minerales no Metálicos","2022-03-01","1","3","2022");
INSERT INTO tb_productos VALUES("480","70211460","40183104","TAPON HEMBRA LISO PVC 3\"","C/U","29.00","6.40","Herramientas y Repuestos","2022-03-08","8","3","2022");
INSERT INTO tb_productos VALUES("481","70211468","40183104","TAPON HEMBRA LISO PVC 4\"","C/U","33.00","3.20","Herramientas y Repuestos","2022-02-28","28","2","2022");
INSERT INTO tb_productos VALUES("482","70211472","40141719","ADAPTADOR HEMBRA DE PVC DE 3/4\"","C/U","4.00","0.30","Herramientas y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("483","70211475","40142612","ADAPTADOR HEMBRA DE PVC DE 2\"","C/U","98.00","0.70","Herramientas y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("484","70211481","30181809","SIFON CONTINUO PVC DE 1 1/2\"","C/U","8.00","4.30","Herramientas y Repuestos","2022-03-09","9","3","2022");
INSERT INTO tb_productos VALUES("485","70211483","30181809","SIFON CONTINUO PVC DE 2\"","C/U","8.00","4.50","Herramientas y Repuestos","2022-03-09","9","3","2022");
INSERT INTO tb_productos VALUES("486","70211484","30181809","70211484SIFON FLEXIBLE TIPO ACORDEON DE 1 1/4\" PVC","C/U","25.00","4.00","Herramientas y Repuestos","2022-03-11","11","3","2022");
INSERT INTO tb_productos VALUES("487","70211487","40141716","SIFON A LA PARED PLASTICO CROMADO DE 1 1/2\"","C/U","19.00","2.20","Herramientas y Repuestos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("488","70211534","40142615","REDUCTOR DE 2 1/2\" A 1\" DE P.V.C.","C/U","10.00","1.30","Herramientas y Repuestos","2022-03-08","8","3","2022");
INSERT INTO tb_productos VALUES("489","70211538","40173608","REDUCTOR DE 1 1/2 A 1/2 P.V.C","C/U","23.00","0.80","Herramientas y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("490","70211539","40173608","REDUCTOR DE 1 1/4 A 1/2 P.V.C","C/U","32.00","0.60","Minerales no Metálicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("491","70211540","40173608","REDUCTOR DE 1 1/4\" A 1\" DE P.V.C.","C/U","46.00","0.70","Minerales no Metálicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("492","70211541","40173608","REDUCTOR DE 2\" A 3/4\" DE P.V.C","C/U","17.00","0.70","Herramientas y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("493","70211542","40173608","REDUCTOR DE 3\" A 1 1/2\" DE P.V.C","C/U","6.00","0.00","Herramientas y Repuestos","2022-03-03","3","3","2022");
INSERT INTO tb_productos VALUES("494","70211543","40142615","REDUCTOR DE 3\" A 2 1/2\" DE P.V.C","C/U","19.00","5.00","Minerales no Metálicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("495","70211544","40142615","REDUCTOR DE 4\" A 2\" DE P.V.C","C/U","7.00","6.50","Minerales no Metálicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("496","70211545","40142615","REDUCTOR DE 4\" A 2 1/2\" DE P.V.C.","C/U","6.00","8.50","Minerales no Metálicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("497","70211546","40142615","REDUCTOR DE 4\" A 3\" DE P.V.C","C/U","23.00","6.90","Minerales no Metálicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("498","70211625","40142605","TEE DE 2 1/2\" DE P.V.C","C/U","16.00","4.90","Herramientas y Repuestos","2022-02-28","28","2","2022");
INSERT INTO tb_productos VALUES("499","70211627","40142020","TUBO DE ABASTO DE NYLON PARA LAVAMANOS DE 3/8\" X 1/2\" X 16\"","C/U","45.00","3.50","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("500","70211647","40142020","TUBO DE ABASTO DE NYLON PARA SERVICIO SANITARIO DE 3/8\" X 7/8\" X 20\"","C/U","57.00","2.70","Herramientas y Repuestos","2022-03-11","11","3","2022");
INSERT INTO tb_productos VALUES("501","70211808","40171719","ADAPTADOR MACHO CPVC DE 1/2\"","C/U","165.00","0.20","Herramientas y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("502","70211890","9999","CAMISA DE 2 1 / 2\" P.V.C","C/U","13.00","0.00","Herramientas y Repuestos","2022-03-03","3","3","2022");
INSERT INTO tb_productos VALUES("503","70211894","40142610","CAMISA DE 4\" P.V.C","C/U","56.00","0.00","Herramientas y Repuestos","2022-03-03","3","3","2022");
INSERT INTO tb_productos VALUES("504","70211900","30181809","KIT DE ACCESORIOS PARA SERVICIO SANITARIO STANDARD.","C/U","22.00","5.70","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("505","70212004","39121313","CINCHOS PLASTICOS, DIFERENTES MEDIDAS, JUEGO","C/U","14.00","7.30","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("506","70212015","31162002","CLAVO ROBOT DE 1\"","C/U","172.00","0.20","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("507","70212019","31162002","CLAVO CORRIENTE DE 3/4\" CON CABEZA","lb","25.00","2.00","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("508","70212020","31162002","CLAVO CORRIENTE DE 1\" CON CABEZA","lb","10.50","2.00","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("509","70212021","31162002","CLAVO CORRIENTE DE 1 1/2\" CON CABEZA","lb","19.00","1.90","Minerales Metálicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("510","70212023","31162002","CLAVO CORRIENTE DE 2\" CON CABEZA","lb","13.00","1.30","Minerales Metálicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("511","70212024","31162002","CLAVO CORRIENTE DE 21/2\" CON CABEZA","lb","34.00","0.40","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("512","70212027","31162002","CLAVO CORRIENTE DE 4\" CON CABEZA","lb","14.00","0.50","Minerales Metálicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("513","70212033","31162003","CLAVO DE ACERO DE 1 1/2\"","C/U","0.00","0.00","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("514","70212034","31162003","CLAVO DE ACERO DE 3/4\"","C/U","116.00","0.10","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("515","70212035","31162003","CLAVO DE ACERO DE 1\"","C/U","423.00","0.00","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("516","70212038","31162003","CLAVO DE ACERO DE 2\"","C/U","125.00","0.00","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("517","70212039","31162003","CLAVO DE ACERO DE 2 1/2\"","C/U","188.00","0.00","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("518","70212040","31162003","CLAVO DE ACERO DE 3\"","C/U","168.00","0.10","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("519","70212042","31162003","CLAVO DE ACERO DE 4\"","C/U","73.00","0.10","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("520","70212044","31162003","CLAVO CORRIENTE DE 3/4\" SIN CABEZA","lb","4.00","2.00","Minerales Metálicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("521","70212045","31162003","CLAVO CORRIENTE DE 1\" SIN CABEZA","lb","43.00","2.00","Minerales Metálicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("522","70212047","31162003","CLAVO CORRIENTE DE 1 1/2\" SIN CABEZA","lb","31.00","2.00","Minerales Metálicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("523","70212048","31162003","CLAVO CORRIENTE DE 2\" SIN CABEZA","lb","5.00","2.00","Minerales Metálicos","2022-03-07","7","3","2022");
INSERT INTO tb_productos VALUES("524","70212065","30101503","HIERRO ANGULO DE 1\" X 1\" X 1/8\" BAJO NORMA","mts","132.00","1.80","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("525","70212070","30101503","HIERRO ANGULO DE 1-1/2\" X 1-1/2\"X 1/8\" BAJO NORMA","mts","36.00","2.65","Minerales Metálicos","2022-05-18","18","5","2022");
INSERT INTO tb_productos VALUES("526","70212072","30101503","HIERRO ANGULO DE 2\" X 2\" X 1/8\" BAJO NORMA","mts","9.00","3.20","Minerales Metálicos","2022-02-28","28","2","2022");
INSERT INTO tb_productos VALUES("527","70212073","30101503","ANGULO DE 2\" X 2\" X 3/16\" BAJO NORMA","mts","2.00","7.10","Materiales Eléctricos","2022-03-08","8","3","2022");
INSERT INTO tb_productos VALUES("528","70212075","30101503","HIERRO ANGULO DE 1 1/2\" X 1 1/2\" X 3 /16\", BAJO NORMA","mts","4.00","4.60","Minerales Metálicos","2022-02-28","28","2","2022");
INSERT INTO tb_productos VALUES("529","70212078","30102003","PLETINA DE HIERRO, 1\" x 1/8\", PIEZA DE 6 METROS","mts","96.00","1.90","Minerales Metálicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("530","70212080","30102003","PLETINA DE HIERRO, 1 1/2\" X 1/8\", PIEZA DE 6 METROS","mts","60.00","1.30","Minerales Metálicos","2022-02-28","28","2","2022");
INSERT INTO tb_productos VALUES("531","70212088","30102403","HIERRO CUADRADO DE 3/8\"","mts","18.00","1.20","Minerales Metálicos","2022-03-11","11","3","2022");
INSERT INTO tb_productos VALUES("532","70212089","30102403","HIERRO CUADRADO DE 1/2\"","mts","33.00","0.90","Minerales Metálicos","2022-03-01","1","3","2022");
INSERT INTO tb_productos VALUES("533","70212095","30102403","HIERRO LISO DE 3/4\"","mts","8.00","2.90","Minerales Metálicos","2022-02-28","28","2","2022");
INSERT INTO tb_productos VALUES("534","70212097","30102403","HIERRO LISO DE 3/8\"","mts","9.00","0.80","Minerales Metálicos","2022-03-08","8","3","2022");
INSERT INTO tb_productos VALUES("535","70212385","31161601","PERNO TODO ROSCA DE 1/4\" x 1\" CON ARANDELA PLANA Y TUERCA","C/U","47.00","0.20","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("536","70212388","31161601","PERNO TODO ROSCA DE 1/4\" x 3\" CON ARANDELA PLANA Y TUERCA","C/U","17.00","0.60","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("537","70212396","31162202","REMACHE POP DE 3/16\" X 5/8\"","C/U","500.00","0.01","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("538","70212408","31162202","REMACHE POP DE 5/32\" X 1/2\"","cto","9.00","1.00","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("539","70212413","31162103","ANCLA PLASTICA DE 3/8\"","C/U","818.00","0.00","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("540","70212414","31162103","ANCLA PLASTICA DE 5/16\"","C/U","851.00","0.00","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("541","70212415","31162103","ANCLA PLASTICA DE 1/4\"","C/U","191.00","0.00","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("542","70212423","31161509","TORNILLO PARA TABLAROCA DE 1/2\"","cto","0.00","2.00","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("543","70212424","31161509","TORNILLO PARA TABLAROCA DE 1\"","C/U","1.00","0.01","Minerales Metálicos","2022-05-18","18","5","2022");
INSERT INTO tb_productos VALUES("544","70212425","31161509","TORNILLO PARA TABLAROCA DE 2\"","C/U","348.00","0.03","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("545","70212426","31161509","TORNILLO PARA TABLAROCA DE 1 1/2\"","C/U","1.00","0.02","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("546","70212440","31161512","TORNILLO PUNTA BROCA DE 1\"","C/U","1.00","0.02","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("547","70212442","31161512","TORNILLO PUNTA BROCA DE 1 1/2\"","cto","42.00","1.70","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("548","70212443","31161512","TORNILLO PUNTA BROCA DE 1 1/4\"","C/U","600.00","0.10","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("549","70212444","31161512","TORNILLO PUNTA BROCA DE 2\"","C/U","0.00","0.00","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("550","70212453","1162702","RODO DE 8\" CON BASE GIRATORIO","C/U","4.00","15.00","Herramientas y Repuestos","2022-05-23","23","5","2022");
INSERT INTO tb_productos VALUES("551","70212454","31162702","RODO DE 8\" CON BASE FIJA","C/U","10.00","15.00","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("552","70212455","31162702","RODO DE 6\" CON BASE GIRATORIO","C/U","8.00","21.40","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("553","70212456","31162702","RODO DE 6\" CON BASE FIJA","C/U","16.00","18.50","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("554","70212457","31162702","RODO DE 4\" CON BASE GIRATORIA DE 3\" X 4\"","C/U","109.00","9.30","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("555","70212458","31162702","RODO DE 4\" CON BASE FIJA DE 3\" X 4\"","C/U","56.00","6.40","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("556","70212460","31161507","TORNILLO GOLOSO DE 3/4\"","C/U","70.00","0.10","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("557","70212463","31161507","TORNILLO GOLOSO DE 2\"","C/U","324.00","0.20","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("558","70212465","31162702","RODO TIPO YOYO DE 2\" ESPIGA LISA","C/U","75.00","7.00","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("559","70212483","31161507","TORNILLO GOLOSO DE 1\" X 10 mm","C/U","942.00","0.03","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("560","70212484","31161507","TORNILLO GOLOSO DE 1 1/2\" X 10 mm","C/U","978.00","0.03","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("561","70212499","30102403","VARILLA ROSCADA DE 1/4\"","C/U","10.00","3.30","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("562","70212500","30102403","VARILLA ROSCADA DE 3/8\"","C/U","5.00","0.80","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("563","70212501","30102403","VARILLA ROSCADA DE 1/2\"","C/U","15.00","13.50","Minerales Metálicos","2022-03-02","2","3","2022");
INSERT INTO tb_productos VALUES("564","70212510","31161601","PERNO ANCLA 3/8\" X 2\"","C/U","83.00","1.20","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("565","70212535","31161601","PERNO DE 5/16\" X 1\" CON TUERCA","C/U","25.00","0.30","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("566","70212538","40171606","TUBO CUADRADO INDUSTRIAL DE 1/2\"","mts","222.00","0.40","Minerales Metálicos","2022-03-01","1","3","2022");
INSERT INTO tb_productos VALUES("567","70212539","40171606","TUBO CUADRADO INDUSTRIAL DE 3/4\"","mts","120.00","0.80","Minerales Metálicos","2022-02-28","28","2","2022");
INSERT INTO tb_productos VALUES("568","70212540","40171606","TUBO CUADRADO INDUSTRIAL DE 1\"","mts","96.00","1.20","Minerales Metálicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("569","70212560","40171606","TUBO CUADRADO ESTRUCTURAL DE 1 1/2\" CHAPA 16","mts","78.00","2.90","Minerales Metálicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("570","70212569","40171606","TUBO CUADRADO ESTRUCTURAL DE 2\" CHAPA 14","mts","78.00","5.00","Minerales Metálicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("571","70212610","31162403","BISAGRA CORRIENTE DE 1\"","C/U","55.00","0.10","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("572","70212612","31162403","BISAGRA CORRIENTE DE 3\"","C/U","145.00","0.60","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("573","70212613","31162403","BISAGRA CORRIENTE DE 3\"","PAR","3.00","0.60","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("574","70212617","31162403","BISAGRA CORRIENTE DE 4\"","C/U","39.00","1.50","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("575","70212620","31262403","BISAGRA ALCAYATE DE 3\" X 3\"","C/U","9.00","6.00","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("576","70212633","31191602","DISCO PARA CORTE DE METAL DE 4 1/2\" X 1/8\" X 7/8\"","C/U","46.00","0.65","Herramientas y Repuestos","2022-03-30","30","3","2022");
INSERT INTO tb_productos VALUES("577","70212635","31191602","DISCO PARA CORTE DE METAL DE 9\" x 1/8\" x 7/8\"","C/U","48.00","1.73","Herramientas y Repuestos","2022-05-17","17","5","2022");
INSERT INTO tb_productos VALUES("578","70212636","31191602","DISCO PARA CORTE DE METAL DE 9\" X 1/4\" X 7/8\"","C/U","20.00","2.20","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("579","70212643","31191603","DISCO PARA CORTE DE CONCRETO DE 4«\" X 1/8\" X 7/8\"","C/U","17.00","0.80","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("580","70212645","31191603","DISCO PARA CORTE DE CONCRETO DE 9\" x 1/8\" x 7/8\"","C/U","25.00","4.00","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("581","70212647","31191603","DISCO PARA CORTE DE METAL DE 4 1/2\" X 3/32\" X ??","C/U","11.00","1.60","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("582","70212648","31191602","DISCO PARA ESMERILAR METAL DE 4 1/2\" X 1/4\" X 7/8\"","C/U","14.00","1.60","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("583","70212651","23131503","DISCO PARA ESMERILAR METAL DE 9\" X 1/4\" X 7/8\"","C/U","35.00","8.90","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("584","70212654","31191510","PIEDRA COMBINADA PARA AFILAR DE 8\"","C/U","3.00","3.30","Equipo y Herramientas de Mantto","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("585","70212655","27112801","BROCA PARA MADERA DE 1/4\", 1/2\", 3/4\", 1\" JUEGO","C/U","1.00","7.50","Equipo y Herramientas de Mantto","2022-05-17","17","5","2022");
INSERT INTO tb_productos VALUES("586","70212688","31191602","DISCO DIAMANTADO SEGMENTADO PARA CORTE DE CONCRETO 4 1/2\" X 1/8\" X 7/8\"","C/U","0.00","0.65","Herramientas y Repuestos","2022-03-30","30","3","2022");
INSERT INTO tb_productos VALUES("587","70212694","0","PIEDRA PARA ESMERIL DE 6\" X 1\", GRANO 40","C/U","1.00","1.50","Equipo y Herramientas de Mantto","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("588","70212707","31162202","REMACHE POP DE 3/16\" X 3/4\"","C/U","500.00","3.00","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("589","70212708","31162202","REMACHE POP DE 3/16\" X 1/2\"","C/U","1.00","0.02","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("590","70212709","31162202","REMACHE POP, DE 1/8\" X 1/2\"","C/U","550.00","0.02","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("591","70212712","31162202","REMACHE POP, DE 3/16\" X 1/4\"","cto","19.00","3.10","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("592","70212716","27112802","HOJA DE SIERRA PARA HIERRO DIENTE FINO","C/U","58.00","2.20","Equipo y Herramientas de Mantto","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("593","70212727","31162417","PASADOR METALICO DE 2 1/2\"","C/U","0.00","3.50","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("594","70212729","31162407","PASADOR METALICO DE 4\"","C/U","20.00","1.30","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("595","70212735","27112802","HOJA DE SIERRA DE RECIPROCANTE PARA MADERA","C/U","7.00","5.50","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("596","70212736","27112802","HOJA DE SIERRA DE RECIPROCANTE PARA HIERRO","C/U","5.00","2.20","Equipo y Herramientas de Mantto","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("597","70212743","31191501","LIJA PARA HIERRO No. 36, PLIEGO","C/U","18.00","1.00","Minerales no Metálicos","2022-03-29","29","3","2022");
INSERT INTO tb_productos VALUES("598","70212745","31191501","LIJA PARA HIERRO No. 50, PLIEGO","C/U","17.00","0.80","Minerales no Metálicos","2022-03-29","29","3","2022");
INSERT INTO tb_productos VALUES("599","70212748","31191501","LIJA PARA HIERRO No. 80,PLIEGO","C/U","13.00","0.80","Minerales no Metálicos","2022-03-29","29","3","2022");
INSERT INTO tb_productos VALUES("600","70212750","31191501","LIJA PARA HIERRO No. 100, PLIEGO","C/U","12.00","0.80","Minerales no Metálicos","2022-03-29","29","3","2022");
INSERT INTO tb_productos VALUES("601","70212751","31191501","LIJA PARA HIERRO No. 150, PLIEGO","C/U","17.00","0.80","Minerales no Metálicos","2022-03-30","30","3","2022");
INSERT INTO tb_productos VALUES("602","70212754","31191501","LIJA PARA HIERRO No. 320,PLIEGO","C/U","6.00","0.50","Minerales no Metálicos","2022-03-30","30","3","2022");
INSERT INTO tb_productos VALUES("603","70212763","31191501","LIJA PARA AGUA No. 100, PLIEGO","C/U","3.00","0.50","Minerales no Metálicos","2022-03-30","30","3","2022");
INSERT INTO tb_productos VALUES("604","70212765","31191501","LIJA PARA AGUA No. 150, PLIEGO","C/U","14.00","0.50","Minerales no Metálicos","2022-03-30","30","3","2022");
INSERT INTO tb_productos VALUES("605","70212770","31191501","LIJA PARA AGUA No. 400, PLIEGO","C/U","30.00","0.50","Minerales no Metálicos","2022-03-30","30","3","2022");
INSERT INTO tb_productos VALUES("606","70212798","39121436","ELECTRODO PARA HIERRO lb DULCE, 3/32\",6013","lb","257.00","1.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("607","70212800","39121436","ELECTRODO 3/32\" PARA HIERRO DULCE","lb","90.50","1.00","Materiales Eléctricos","2022-02-22","22","2","2022");
INSERT INTO tb_productos VALUES("608","70212801","39121436","ELECTRODO PARA ACERO INOXIDABLE, 3/32\"","lb","18.00","7.22","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("609","70212825","12352310","TUBO SILICON DE ALTA TEMPERATURA COLOR ROJO","C/U","61.00","1.90","Químicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("610","70212829","31201610","PEGAMENTO ACERO PLASTICO, TUBO","C/U","15.00","9.70","Químicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("611","70212833","47131818","LIMPIADOR DE POLVO POR AIRE A PRESION ( AIRE COMPRIMIDO ), PARA ELECTRONICA, OPTICA E INFORMATICA, FRASCO DE 20 ONZAS","C/U","8.00","10.00","Químicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("612","70212837","47131825","LIMPIADOR DE CONTACTOS ELECTRICOS,SPRAY DE 10-11 ONZAS","C/U","20.00","4.30","Químicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("613","70212838","15121501","LUBRICANTE WD-40, SPRAY DE 11 ONZAS","C/U","12.00","2.60","Químicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("614","70212992","31152209","ALAMBRE ESPIGADO GALVANIZADO No. 16 ROLLO","C/U","7.00","36.00","Minerales Metálicos","2022-03-11","11","3","2022");
INSERT INTO tb_productos VALUES("615","70212995","26121540","GALVANIZADO CALIBRE 16","lb","24.00","1.15","Minerales Metálicos","2022-05-05","5","5","2022");
INSERT INTO tb_productos VALUES("616","70212998","31152209","ALAMBRE DE AMARRE","lb","10.00","1.05","Minerales Metálicos","2022-05-17","17","5","2022");
INSERT INTO tb_productos VALUES("617","70212999","11101716","ESTAÑO PURO EN BARRA","C/U","4.00","44.00","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("618","70213013","31211502","PINTURA DE AGUA COLOR Galon AZUL NAVAL","Galon","30.00","46.80","Químicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("619","70213020","31211502","PINTURA DE AGUA COLOR Galon BLANCO","Galon","16.00","8.50","Químicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("620","70213041","31211502","PINTURA DE AGUA COLOR Galon GRIS METEORO","Galon","28.00","28.40","Químicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("621","70213060","31211502","PINTURA DE AGUA COLOR Galon MELON","Galon","7.00","23.00","Químicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("622","70213105","31211505","PINTURA DE ACEITE Galon COLOR AMARILLO","Galon","2.00","17.90","Químicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("623","70213112","31211502","PINTURA PARA TRAFICO, COLOR AMARILLO","Galon","3.00","45.00","Químicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("624","70213450","31201605","MASILLA PLASTICA PARA SOS MULTIPLES","Galon","2.00","7.50","Químicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("625","70213113","31211502","PINTURA PARA TRAFICO, COLOR BLANCO","Galon","3.00","45.00","Químicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("626","70213122","31211507","PINTURA COLOR AZUL, EN AEROSOL O SPRAY, FRASCO","C/U","30.00","2.40","Químicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("627","70213126","31211505","PINTURA DE ACEITE COLOR CAFE","Galon","1.00","35.00","Químicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("628","70213135","31211505","PINTURA DE ACEITE COLOR BLANCO OSTRA","Galon","4.00","29.00","Químicos","2022-02-22","22","2","2022");
INSERT INTO tb_productos VALUES("629","70213145","31211505","PINTURA DE ACEITE COLOR GRIS OSCURO","Galon","1.00","22.10","Químicos","2022-02-28","28","2","2022");
INSERT INTO tb_productos VALUES("630","70213188","31211505","PINTURA EPOXICA COLOR AQUA INCLUYE CATALIZADOR","Galon","0.00","80.90","Químicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("631","70213189","31211505","PINTURA EPOXICA COLOR BLANCO INCLUYE CATALIZADOR","Galon","1.00","112.70","Químicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("632","70213190","31211505","PINTURA EPOXICA COLOR BLANCO HUESO INCLUYE CATALIZADOR","Galon","1.00","85.20","Químicos","2022-02-28","28","2","2022");
INSERT INTO tb_productos VALUES("633","70213197","31211505","PINTURA EPOXICA COLOR VERDE INCLUYE CATALIZADOR","Galon","22.00","112.70","Químicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("634","70213200","31211518","PINTURA ANTICORROSIVA COLOR BLANCO","Galon","1.00","18.00","Químicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("635","70213202","31211518","PINTURA ANTICORROSIVA COLOR AZUL","Galon","4.75","12.50","Químicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("636","70213205","31211518","PINTURA ANTICORROSIVA COLOR NEGRO","Galon","0.00","19.10","Químicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("637","70213206","31211518","PINTURA ANTICORROSIVA COLOR NEGRO BRILLANTE","Galon","1.25","17.90","Químicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("638","70213210","31211518","PINTURA ANTICORROSIVA COLOR ROJO","Galon","2.00","10.50","Químicos","2022-02-28","28","2","2022");
INSERT INTO tb_productos VALUES("639","70213221","31211507","PINTURA DE ALUMINIO","Galon","1.75","32.00","Químicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("640","70213303","31211803","THINNER CORRIENTE","cto","1.00","2.00","Químicos","2022-03-15","15","3","2022");
INSERT INTO tb_productos VALUES("641","70213308","31211906","RODILLO COMPLETO","C/U","29.00","2.80","Herramientas y Repuestos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("642","70213309","31211904","BROCHA DE 1\"","C/U","53.00","0.30","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("643","70213310","31211904","BROCHA DE 1 1/2\"","C/U","58.00","0.50","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("644","70213313","31211904","BROCHA DE 3\"","C/U","6.00","0.91","Herramientas y Repuestos","2022-05-17","17","5","2022");
INSERT INTO tb_productos VALUES("645","70213315","31211904","BROCHA DE 2\"","C/U","10.00","0.50","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("646","70213316","31211904","BROCHA DE 4\"","C/U","18.00","1.30","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("647","70213448","31201605","MASILLA AUTOMOTRIZ 1/4 DE GALON","C/U","2.00","9.00","Químicos","2022-03-07","7","3","2022");
INSERT INTO tb_productos VALUES("648","70302062","23101502","KIT DE TALADRO Y ATORNILLADOR DE IMPACTO, INALAMBRICO, CON CARGADOR Y DOS BATERIAS, 20 VOLTIOS","C/U","0.00","168.00","Equipo y Herramientas de Mantto","2022-03-01","1","3","2022");
INSERT INTO tb_productos VALUES("649","70302069","99999","LAVADORA ALTA PRESIÓN, 1200 PSI, 115 VOLTIOS, CONSUMO 2.1 GPM, PARA AGUA FRÍA, PISTOLA Y MANGUERA DE 25 PIES, MOTOR (2 A 5) HP, FÁCIL TRANSPORTACIÓN (2 RUEDAS)","C/U","1.00","300.00","Equipo y Herramientas de Mantto","2022-02-28","28","2","2022");
INSERT INTO tb_productos VALUES("650","70213507","31211507","PINTURA EN SPRAY 24 ONZAS COLOR BLANCO","C/U","16.00","4.30","Químicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("651","70213553","31211507","PINTURA EN SPRAY 12 ONZAS COLOR GRIS","C/U","9.00","4.30","Químicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("652","70215029","39121434","CONECTOR PARA TECNODUCTO DE 1 1/4\"","C/U","6.00","0.50","Materiales Eléctricos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("653","70225085","0","CADENA GALVANIZADA DE 1/8","mts","9.00","0.90","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("654","70225093","0","CADENA GALVANIZADA DE 3/16","mts","9.00","1.10","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("655","70225097","0","CADENA GALVANIZADA DE 1/4\"","mts","9.00","1.90","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("656","70225267","99999","GASOLINA REGULAR","CUARTO GAL","19.50","1.10","Combustibles y Lubricantes","2022-03-15","15","3","2022");
INSERT INTO tb_productos VALUES("657","70225269","15121902","GRASA","lb","1.00","10.00","Químicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("658","70225400","25174004","REFRIGERANTE PARA RADIADOR","C/U","9.00","0.00","Químicos","2022-03-04","4","3","2022");
INSERT INTO tb_productos VALUES("659","70226434","0","FUSIBLE DE 15 AMPERIOS 12 VOLTIOS","C/U","42.00","0.50","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("660","70301255","43222643","PROBADOR DE LINEA PARA JACK R11/RJ12/ RJ45, SOBRE CABLE UTP /STP / FTP","C/U","1.00","69.75","Equipo y Herramientas de Mantto","2022-05-17","17","5","2022");
INSERT INTO tb_productos VALUES("661","70302014","11101502","ESMERIL PEQUEÑO DE BANCO, 3450 RPM, 120 VOLTIOS, 60HZ. Marca TOTAL","C/U","1.00","79.00","Equipo y Herramientas de Mantto","2022-05-05","5","5","2022");
INSERT INTO tb_productos VALUES("662","70302020","23101512","CALADORA 6.5 AMP TIPO T VELOCIDAD VARIABLE marca TOTAL","C/U","1.00","50.29","Equipo y Herramientas de Mantto","2022-05-17","17","5","2022");
INSERT INTO tb_productos VALUES("663","70302035","27111515","TALADRO ROTOMARTILLO","C/U","1.00","199.95","EQUIPO Y hERRAMIENTAS DE MANTTO","2022-05-17","17","5","2022");
INSERT INTO tb_productos VALUES("664","70302040","23101509","LIJADORA PALMA PORTATIL 1,400 RPM 24 AMP marca TOTAL","C/U","1.00","50.00","Equipo y Herramientas de Mantto","2022-05-05","5","5","2022");
INSERT INTO tb_productos VALUES("665","70302203","32141108","TENAZA POLO TIERRA DE 600 AMPERIOS PARA SOLDADURA ELECTRICA","C/U","11.00","7.20","Herramientas y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("666","70302204","32141108","TENAZA PORTA ELECTRODO DE 600 IMPACTO, INALAMBRICO, CON CARGADOR Y DOS BATERIAS, 20 VOLTIOS","C/U","7.00","13.40","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("667","70302236","27111514","CORTADOR DE VIDRIO","C/U","2.00","2.50","Equipo y Herramientas de Mantto","2022-05-05","5","5","2022");
INSERT INTO tb_productos VALUES("668","70305083","27112845","BASICAS DE TALLER AMPERIOS PARA SOLDADURA ELECTRICA","C/U","1.00","22.45","Equipo y Herramientas de Mantto","2022-05-05","5","5","2022");
INSERT INTO tb_productos VALUES("669","70305098","27110000","BROCA PILOTO PARA CIERRA COPA, 1/4\"","C/U","1.00","3.00","Equipo y Herramientas de Mantto","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("670","70305128","27111907","CEPILLO DE ALAMBRE MANGO DE MADERA","C/U","22.00","1.80","Herramientas y Repuestos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("671","70305129","27111907","CEPILLO DE ALAMBRE DE COPA PARA PULIDORA, DE DIAMETRO 4\"","C/U","1.00","13.30","Herramientas y Repuestos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("672","70305165","27112502","GRIFA ARMADOR PARA VARILLA DE 3 /8\" PAR","C/U","1.00","15.45","Equipo y Herramientas de Mantto","2022-05-05","5","5","2022");
INSERT INTO tb_productos VALUES("673","70305270","27112104","TENAZA DE PRESION DE 10 PULGADAS","C/U","10.00","3.96","Equipo y Herramientas de Mantto","2022-05-17","17","5","2022");
INSERT INTO tb_productos VALUES("674","70305275","27112104","TENAZA DE PRESION DE 7 PULGADAS","C/U","6.00","3.56","Equipo y Herramientas de Mantto","2022-05-17","17","5","2022");
INSERT INTO tb_productos VALUES("675","70305308","25170000","VENTOSA PARA DESTAPAR LAVAMANOS/ INODOROS","C/U","36.00","2.30","Herramientas y Editar Repuestos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("676","70305333","14110000","ESCARTABON DE 12X24 PULGADAS","C/U","1.00","8.00","Equipo y Herramientas de Mantto","2022-05-17","17","5","2022");
INSERT INTO tb_productos VALUES("677","70305338","27111801","CINTA METRICA ENROLLABLE, METALICA DE 8 METROS","C/U","12.00","6.77","Equipo y Herramientas de Mantto","2022-05-17","17","5","2022");
INSERT INTO tb_productos VALUES("678","70305348","27111903","CEPILLO NUMERO 4 CON CUCHILLA PARA CARPINTERO","C/U","1.00","36.41","Equipo y Herramientas de Mantto","2022-05-05","5","5","2022");
INSERT INTO tb_productos VALUES("679","70305387","27112825","BROCA PARA HIERRO DE 3/16\"","C/U","2.00","1.10","Equipo y Herramientas de Mantto","2022-03-15","15","3","2022");
INSERT INTO tb_productos VALUES("680","70305402","27112843","BROCA CENTRO DE 5/16\"","C/U","1.00","5.00","Equipo y Herramientas de Mantto","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("681","70305720","27112502","GRIFA ARMADOR PARA VARILLA DE 1/4¨, PAR","C/U","1.00","12.61","Equipo y Herramientas de Mantto","2022-05-05","5","5","2022");
INSERT INTO tb_productos VALUES("682","70305931","40142002","MANGUERA INDUSTRIAL PARA ACETILENO 1/4\" (ROJA)","C/U","65.00","38.00","Equipo y Herramientas de Mantto","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("683","70330015","27113203","PONCHADORA PARA ESTRUCTURADO, CON CABLEADO CORTADOR","C/U","1.00","28.74","Equipo y Herramientas de Mantto","2022-05-17","17","5","2022");
INSERT INTO tb_productos VALUES("684","80200415","39111702","LAMPARA DE FRENTE, INCORPORADO","C/U","6.00","9.95","Equipo y Herramientas de Mantto","2022-05-05","5","5","2022");
INSERT INTO tb_productos VALUES("685","70330040","0","PASTA PARA SOLDAR, FRASCO DE 50g","C/U","6.00","2.30","Químicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("686","70408004","46181704","CASCO DE SEGURIDAD PARA OBRA, DE POLIETILENO","C/U","13.00","4.10","Equipo y Herramientas de Mantto","2022-05-05","5","5","2022");
INSERT INTO tb_productos VALUES("687","70408010","46181802","ANTEOJOS DE SEGURIDAD CLAROS","C/U","20.00","1.40","Equipo y Herramientas de Mantto","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("688","70408011","46181804","GAFAS PARA SOLDADURA AUTOGENA","C/U","6.00","4.30","Equipo y Herramientas de Mantto","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("689","70408020","46182001","MASCARILLAS DE PROTECCION DE UN FILTRO INTERCAMBIABLE","C/U","31.00","16.30","Equipo y Herramientas de Mantto","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("690","70408053","99999","ZAPATO DE SEGURIDAD CON PUNTERA DE ACERO, SUELA ANTIESTATICA, RESISTENTE A PERFORACIONES, CON ABSORCION DE ENERGIA EN EL TALON, PAR","C/U","13.00","59.92","Equipo y Herramientas de Mantto","2022-05-06","6","5","2022");
INSERT INTO tb_productos VALUES("691","70408070","46181703","CARETA CON VIDRIO PARA SOLDADOR","C/U","7.00","6.30","Equipo y Herramientas de Mantto","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("692","70408071","46181703","CARETA ELECTRONICA PARA SOLDADURA","C/U","2.00","36.12","Equipo y Herramientas de Mantto","2022-05-23","23","5","2022");
INSERT INTO tb_productos VALUES("693","70408073","46181548","DELANTAL (MANDIL) DE CUERO, Y PARA SOLDADOR","C/U","13.00","11.30","Equipo y Herramientas de Mantto","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("694","70408550","46181504","GUANTES DE PROTECCION MULTIUSO, PAR GUANTES ANTIDESLIZANTES, PAR","C/U","23.00","3.80","Equipo y Herramientas de Mantto","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("695","70409200","99999","CAJA PROTECTORA DE AEROSOLES","C/U","1.00","66.00","Herramientas y Repuestos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("696","72011259","72154119","NIPLE DE HIERRO GALVANIZADO, DIAMETRO DE 4\" X 9\"","C/U","12.00","15.30","Minerales Metálicos","2022-03-07","7","3","2022");
INSERT INTO tb_productos VALUES("697","79001200","99999","ACCESORIOS PARA SILLA DE RUEDAS,CAJA","C/U","1.00","77.30","Herramientas y Repuestos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("698","80200211","26111701","BATERIA RECARGABLE PEQUEÑA DE 1.5 V TIPO AAA.","C/U","2.00","0.90","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("699","80200215","26111701","BATERIA RECARGABLE MEDIANA DE 1.2 V TIPO AA","C/U","12.00","1.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("700","80200230","26111701","BATERIA RECARGABLE CUADRADA DE 9V MANOS LIBRES, TIPO CASERÍA, LUZ LED","C/U","6.00","3.40","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("701","80804065","46181525","CAPA IMPERMEABLES DE 1 PIEZA VARIOS COLORES Y TALLAS","C/U","12.00","11.95","Equipo y Herramientas de Mantto","2022-05-17","17","5","2022");



DROP TABLE tb_usuarios;

CREATE TABLE `tb_usuarios` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `username` mediumtext NOT NULL,
  `firstname` mediumtext NOT NULL,
  `lastname` mediumtext NOT NULL,
  `Establecimiento` mediumtext NOT NULL,
  `unidad` mediumtext NOT NULL,
  `password` mediumtext NOT NULL,
  `Habilitado` mediumtext NOT NULL,
  `tipo_usuario` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

INSERT INTO tb_usuarios VALUES("1","Admin","Admin","Master","Hospital Nacional Zacatecoluca PA \"Santa Tereza\"","Sin Unidad","Admin","Si","1");
INSERT INTO tb_usuarios VALUES("2","egchoto","Ernesto","Gonzales Choto","Hospital Nacional Zacatecoluca PA \"Santa Tereza\"","Departamento Mantenimiento Local","neto982006","Si","1");
INSERT INTO tb_usuarios VALUES("3","Usuario1","Baltazar Alexander","Marinero Perez","Hospital Nacional Zacatecoluca PA \"Santa Tereza\"","Sección Equipo Básico","123","Si","2");
INSERT INTO tb_usuarios VALUES("4","Usuario2","Fransico Tolentino","López","Hospital Nacional Zacatecoluca PA \"Santa Tereza\"","Sección Planta Física y Mobiliario","123","Si","2");
INSERT INTO tb_usuarios VALUES("5","Usuario3","René Adán","Villaltá Perez","Hospital Nacional Zacatecoluca PA \"Santa Tereza\"","Sección Planta Física y Mobiliario","123","Si","2");
INSERT INTO tb_usuarios VALUES("6","Usuario4","José Walter","Pineda Leiva","Hospital Nacional Zacatecoluca PA \"Santa Tereza\"","Sección Equipo Básico","123","Si","2");
INSERT INTO tb_usuarios VALUES("7","Usuario5","Justo Antonio","Alfaro","Hospital Nacional Zacatecoluca PA \"Santa Tereza\"","Sección Planta Física y Mobiliario","123","Si","2");
INSERT INTO tb_usuarios VALUES("8","Usuario6","José Dominguez","Echeverría","Hospital Nacional Zacatecoluca PA \"Santa Tereza\"","Sección Equipo Médico","123","Si","2");
INSERT INTO tb_usuarios VALUES("9","Usuario7","Nepoldo Alfaro","Rodas","Hospital Nacional Zacatecoluca PA \"Santa Tereza\"","Sección Equipo Básico","123","Si","2");
INSERT INTO tb_usuarios VALUES("10","Usuario8","Miguel Antonio","Corvera Torrez","Hospital Nacional Zacatecoluca PA \"Santa Tereza\"","Sección Planta Física y Mobiliario","123","Si","2");
INSERT INTO tb_usuarios VALUES("11","Usuario9","Anderson Eduardo","López Rodriguez","Hospital Nacional Zacatecoluca PA \"Santa Tereza\"","Departamento Mantenimiento Local","123","Si","2");
INSERT INTO tb_usuarios VALUES("12","Usuario10","kevin Alexander","Guevara Marinero","Hospital Nacional Zacatecoluca PA \"Santa Tereza\"","Sección Equipo Básico","123","Si","2");
INSERT INTO tb_usuarios VALUES("13","Usuario11","Yenifer Marisol","Campos Yanez","Hospital Nacional Zacatecoluca PA \"Santa Tereza\"","Departamento Mantenimiento Local","123","Si","2");
INSERT INTO tb_usuarios VALUES("14","Usuario12","kilmar Waldir","Pérez Marin","Hospital Nacional Zacatecoluca PA \"Santa Tereza\"","Departamento Mantenimiento Local","123","Si","2");
INSERT INTO tb_usuarios VALUES("15","Usuario13","Ronald Alexander","Lopez Cisnero","Hospital Nacional Zacatecoluca PA \"Santa Tereza\"","Departamento Mantenimiento Local","123","Si","2");



DROP TABLE tb_vale;

CREATE TABLE `tb_vale` (
  `codVale` int(11) NOT NULL,
  `departamento` mediumtext NOT NULL,
  `usuario` mediumtext NOT NULL,
  `idusuario` int(11) NOT NULL DEFAULT 1,
  `campo` mediumtext NOT NULL DEFAULT 'Solicitud Vale',
  `estado` mediumtext NOT NULL,
  `observaciones` mediumtext NOT NULL,
  `fecha_registro` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`codVale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




