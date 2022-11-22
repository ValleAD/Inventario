CREATE DATABASE IF NOT EXISTS `hospital` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `hospital` ;



CREATE TABLE `tb_almacen` (
  `codAlmacen` int(12) NOT NULL,
  `departamento` text COLLATE utf8_spanish_ci NOT NULL,
  `encargado` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` text COLLATE utf8_spanish_ci NOT NULL,
  `idusuario` int(11) NOT NULL DEFAULT 1,
  `fecha_solicitud` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`codAlmacen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;



CREATE TABLE `tb_bodega` (
  `codBodega` int(11) NOT NULL,
  `departamento` text COLLATE utf8_spanish_ci NOT NULL,
  `usuario` text COLLATE utf8_spanish_ci NOT NULL,
  `campo` text COLLATE utf8_spanish_ci NOT NULL DEFAULT ' Solicitud Bodega',
  `fecha_registro` date NOT NULL DEFAULT current_timestamp(),
  `estado` text COLLATE utf8_spanish_ci NOT NULL,
  `idusuario` int(11) NOT NULL DEFAULT 2,
  PRIMARY KEY (`codBodega`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO tb_bodega VALUES("342","70121708","Medidor De Flujo De Combustible, Digital","C/U","1.00","1.00","99.99");
INSERT INTO tb_bodega VALUES("343","70140024","Abrazadera De Acero Inoxidable Sin Fin Para Mangue","C/U","2.00","2.00","0.80");
INSERT INTO tb_bodega VALUES("344","70212414","Ancla Plástica De 5/16\"","C/U","4.00","4.00","0.00");
INSERT INTO tb_bodega VALUES("345","70212483","Tornillo Goloso De 1\" X 10 Mm","C/U","4.00","4.00","0.03");
INSERT INTO tb_bodega VALUES("346","70213315","Brocha De 2\"","C/U","1.00","1.00","0.50");
INSERT INTO tb_bodega VALUES("347","70205886","Tubo Led De 18 Watts, T8, 120 Voltios","C/U","18.00","18.00","3.80");
INSERT INTO tb_bodega VALUES("348","70205288","Soporte Para Lampara Fluorescente Tipo Riel","C/U","18.00","18.00","0.50");
INSERT INTO tb_bodega VALUES("349","70205090","Cable Eléctrico Tsj 14/2 (Vulcan)","Mts","18.00","18.00","0.70");
INSERT INTO tb_bodega VALUES("350","70205572","Cinta Aislante # 23, Rollo","C/U","1.00","1.00","14.50");
INSERT INTO tb_bodega VALUES("351","70212423","Tornillo Para Tablaroca De 1/2\"","Cto","30.00","30.00","2.00");
INSERT INTO tb_bodega VALUES("352","70208527","Chapa Cilíndrica De Palanca Con Llave","C/U","2.00","2.00","22.30");
INSERT INTO tb_bodega VALUES("353","70211071","Tubo De Abasto De Acero Inoxidable Para Sanitario","C/U","1.00","1.00","2.60");
INSERT INTO tb_bodega VALUES("354","70211049","Válvula Para Ducha De 1 /2\"","C/U","1.00","1.00","11.40");
INSERT INTO tb_bodega VALUES("355","70208492","Brazo Hidráulico Tipo Liviano Para Cierre De Puerta","C/U","1.00","1.00","24.50");
INSERT INTO tb_bodega VALUES("356","70208300","Tabla Roca De Yeso Para Interiores De 1.22 Metros","C/U","10.00","10.00","8.56");
INSERT INTO tb_bodega VALUES("357","70208307","Poste Metálico Galvanizado De 3.05 Metros Para Tabla","C/U","20.00","20.00","1.90");
INSERT INTO tb_bodega VALUES("358","70212426","Tornillo Para Tablaroca De 1 1/2\"","C/U","200.00","200.00","0.02");
INSERT INTO tb_bodega VALUES("359","70212020","Clavo Corriente De 1\" Con Cabeza","Lb","30.00","30.00","2.00");
INSERT INTO tb_bodega VALUES("360","70212413","Ancla Plástica De 3/8\"","C/U","50.00","50.00","0.00");
INSERT INTO tb_bodega VALUES("361","70212829","Pegamento Acero Plástico, Tubo","C/U","1.00","1.00","9.70");
INSERT INTO tb_bodega VALUES("362","70212483","Tornillo Goloso De 1\" X 10 Mm","C/U","50.00","50.00","0.03");
INSERT INTO tb_bodega VALUES("363","70210289","Plywood Banack Clase B De 4 Pies X 8 Pies X 1/4\",","C/U","1.00","1.00","25.05");
INSERT INTO tb_bodega VALUES("364","70212454","Rodo De 8\" Con Base Fija","C/U","2.00","2.00","15.00");
INSERT INTO tb_bodega VALUES("365","70211145","Camisa De 2\" P.V.C","C/U","2.00","2.00","1.20");
INSERT INTO tb_bodega VALUES("366","70212716","Hoja De Sierra Para Hierro Diente Fino","C/U","1.00","1.00","2.20");
INSERT INTO tb_bodega VALUES("367","70211309","Pegamento Para P.V.C, 1 /8 De Galón","C/U","1.00","1.00","9.00");
INSERT INTO tb_bodega VALUES("368","70212763","Lija Para Agua No. 100, Pliego","C/U","1.00","1.00","0.50");
INSERT INTO tb_bodega VALUES("369","70211104","Codo Liso De 2\" X 90 De P.V.C.","C/U","2.00","2.00","0.90");
INSERT INTO tb_bodega VALUES("370","70211155","Tubería De 2\" De 160 P.S.I. De P.V.C","Mts","1.00","1.00","1.50");
INSERT INTO tb_bodega VALUES("371","70225269","Grasa","Lb","1.00","1.00","10.00");
INSERT INTO tb_bodega VALUES("372","70120211","Capacitor De Marcha De 5o Mfd, 440 Vac","C/U","1.00","1.00","4.50");
INSERT INTO tb_bodega VALUES("373","70120212","Capacitor De Marcha De 5mfd 370v","C/U","1.00","1.00","1.50");
INSERT INTO tb_bodega VALUES("374","70208110","Celosía De Vidrio Nevado De 1 Metro","C/U","30.00","30.00","1.30");
INSERT INTO tb_bodega VALUES("375","70212748","Lija Para Hierro No. 80,Pliego","C/U","1.00","1.00","0.80");
INSERT INTO tb_bodega VALUES("376","70208115","Operador De Ventana","C/U","11.00","11.00","2.50");
INSERT INTO tb_bodega VALUES("377","70211071","Tubo De Abasto De Acero Inoxidable Para Sanitario","C/U","1.00","1.00","2.60");
INSERT INTO tb_bodega VALUES("378","70211051","Válvula De Control Cromada De 1 / 2\"A La Pared","C/U","1.00","1.00","2.50");
INSERT INTO tb_bodega VALUES("379","70211900","Kit De Accesorios Para Servicio Sanitario Standard","C/U","1.00","1.00","5.70");
INSERT INTO tb_bodega VALUES("380","70211005","Sanitario Color Blanco Completo Standard","C/U","2.00","2.00","52.40");
INSERT INTO tb_bodega VALUES("381","70211049","Válvula Para Ducha De 1 /2\"","C/U","3.00","3.00","11.40");
INSERT INTO tb_bodega VALUES("382","43703018","Tubo De Abasto Para Lavamanos Flexible De 3/8\" X1/","C/U","3.00","3.00","12.50");
INSERT INTO tb_bodega VALUES("383","70211076","Llave De 1/2\" Cromado Para Lavamanos 1a Calidad","C/U","3.00","3.00","6.00");
INSERT INTO tb_bodega VALUES("384","70211071","Tubo De Abasto De Acero Inoxidable Para Sanitario","C/U","1.00","1.00","2.60");
INSERT INTO tb_bodega VALUES("385","43703010","Tapón Macho De 2\" PVC Con Rosca","C/U","2.00","0.00","1.50");
INSERT INTO tb_bodega VALUES("386","70211300","Cinta Teflón","C/U","1.00","0.00","0.30");
INSERT INTO tb_bodega VALUES("387","70208527","Chapa Cilíndrica De Palanca Con Llave","C/U","6.00","6.00","22.30");
INSERT INTO tb_bodega VALUES("388","70212075","Hierro Angulo De 1 1/2\" X 1 1/2\" X 3 /16\", Bajo N","Mts","2.00","2.00","4.60");
INSERT INTO tb_bodega VALUES("389","70211300","Cinta Teflón","C/U","2.00","2.00","0.30");
INSERT INTO tb_bodega VALUES("390","70211051","Válvula De Control Cromada De 1 / 2\"A La Pared","C/U","3.00","3.00","2.50");
INSERT INTO tb_bodega VALUES("391","70211071","Tubo De Abasto De Acero Inoxidable Para Sanitario","C/U","2.00","2.00","2.60");
INSERT INTO tb_bodega VALUES("392","70208527","Chapa Cilíndrica De Palanca Con Llave","C/U","6.00","6.00","22.30");
INSERT INTO tb_bodega VALUES("393","70205570","Cinta Aislante PVC 19 Mm X 20 Ydas X 0.177 Mm, Apr","C/U","1.00","1.00","5.00");
INSERT INTO tb_bodega VALUES("394","70205099","Cable Dúplex No. 12","Mts","5.00","5.00","0.80");
INSERT INTO tb_bodega VALUES("395","70205190","Caja Rectangular De PVC 4\" X 2\"","C/U","1.00","1.00","0.40");
INSERT INTO tb_bodega VALUES("396","70205453","Conector Recto De 1/2\" Metálico","C/U","3.00","3.00","0.20");
INSERT INTO tb_bodega VALUES("397","70205296","Tomacorriente Hembra, Doble, Polarizado","C/U","1.00","1.00","1.00");
INSERT INTO tb_bodega VALUES("398","31161502","Ancla Plástica Para Tabla Roca","C/U","4.00","4.00","0.23");
INSERT INTO tb_bodega VALUES("399","70212415","Ancla Plástica De 1/4\"","C/U","4.00","4.00","0.00");
INSERT INTO tb_bodega VALUES("400","70212483","Tornillo Goloso De 1\" X 10 Mm","C/U","8.00","8.00","0.03");
INSERT INTO tb_bodega VALUES("401","70212838","Lubricante Wd-40, Spray De 11 Onzas","C/U","1.00","1.00","2.60");
INSERT INTO tb_bodega VALUES("402","70225269","Grasa","Lb","1.00","1.00","10.00");
INSERT INTO tb_bodega VALUES("403","70207162","Cinta Arnold Primera Calidad, Rollo","C/U","1.00","1.00","2.30");
INSERT INTO tb_bodega VALUES("404","70205310","Toma Corriente Hembra, Doble, Polarizado, Grado Ho","C/U","10.00","10.00","7.50");
INSERT INTO tb_bodega VALUES("405","70205499","Tecno ducto De 3/4\" Mt","Mts","50.00","50.00","0.50");
INSERT INTO tb_bodega VALUES("406","70205603","Cuerpo Terminal De 1\"","C/U","5.00","5.00","2.20");
INSERT INTO tb_bodega VALUES("407","70205570","Cinta Aislante PVC 19 Mm X 20 Ydas X 0.177 Mm, Apr","C/U","10.00","10.00","5.00");
INSERT INTO tb_bodega VALUES("408","70205170","Caja Térmica De 4 Circuitos, 2 Polos, 240 Voltios,","C/U","4.00","4.00","27.20");
INSERT INTO tb_bodega VALUES("409","70205190","Caja Rectangular De PVC 4\" X 2\"","C/U","10.00","10.00","0.40");
INSERT INTO tb_bodega VALUES("410","70205192","Caja Octagonal PVC","C/U","10.00","10.00","0.70");
INSERT INTO tb_bodega VALUES("411","70205066","Cable Thhn No. 14 Awg, Color Rojo","Mts","40.00","40.00","0.50");
INSERT INTO tb_bodega VALUES("412","70205063","Cable Thhn No 12 Awg, Color Verde","Mts","50.00","50.00","0.59");
INSERT INTO tb_bodega VALUES("413","70205060","Cable Thhn No. 12 Awg, Color Rojo","Mts","50.00","50.00","0.70");
INSERT INTO tb_bodega VALUES("414","70205062","Cable Thhn No 12 Awg, Color Blanco","Mts","50.00","50.00","0.70");
INSERT INTO tb_bodega VALUES("415","70205056","Cable Thhn No. 10 Awg, Color Blanco","Mts","25.00","25.00","1.00");
INSERT INTO tb_bodega VALUES("416","70205058","Cable Thhn No 10 Awg, Color Verde","Mts","25.00","25.00","1.00");
INSERT INTO tb_bodega VALUES("417","70205054","Cable Thhn No.10 Awg, Color Rojo","Mts","25.00","25.00","1.00");
INSERT INTO tb_bodega VALUES("418","70205130","Dado Térmico De 20 Amperios,1 De Polo De Primera C","C/U","4.00","4.00","5.42");
INSERT INTO tb_bodega VALUES("419","70205870","Luminaria Empotrar, Panel Led 2 X 4, 60watts,100-2","C/U","10.00","10.00","50.95");
INSERT INTO tb_bodega VALUES("420","70120211","Capacitor De Marcha De 5o Mfd, 440 Vac","C/U","1.00","1.00","4.50");
INSERT INTO tb_bodega VALUES("421","70205284","Receptáculo De Baquelita Fijo","C/U","2.00","2.00","0.90");
INSERT INTO tb_bodega VALUES("422","70205227","Foco Ahorrador De Energía De 25 Watts, 110 Voltios","C/U","2.00","2.00","3.30");
INSERT INTO tb_bodega VALUES("423","70213041","Pintura De Agua Color Gris Meteoro","Galón","1.00","0.00","28.40");
INSERT INTO tb_bodega VALUES("424","70212838","Lubricante Wd-40, Spray De 11 Onzas","C/U","1.00","0.00","2.60");
INSERT INTO tb_bodega VALUES("425","70205190","Caja Rectangular De PVC 4\" X 2\"","C/U","1.00","1.00","0.40");
INSERT INTO tb_bodega VALUES("426","70205331","Placa Doble De Baquelita (Para Toma Polarizado)","C/U","1.00","1.00","0.30");
INSERT INTO tb_bodega VALUES("427","70205453","Conector Recto De 1/2\" Metálico","C/U","1.00","1.00","0.20");
INSERT INTO tb_bodega VALUES("428","70205572","Cinta Aislante # 23, Rollo","C/U","1.00","1.00","14.50");
INSERT INTO tb_bodega VALUES("429","70212829","Pegamento Acero Plástico, Tubo","C/U","1.00","1.00","9.70");
INSERT INTO tb_bodega VALUES("430","70205296","Tomacorriente Hembra, Doble, Polarizado","C/U","1.00","1.00","1.00");
INSERT INTO tb_bodega VALUES("431","70205331","Placa Doble De Baquelita (Para Toma Polarizado)","C/U","1.00","1.00","0.30");
INSERT INTO tb_bodega VALUES("432","70205453","Conector Recto De 1/2\" Metálico","C/U","2.00","2.00","0.20");
INSERT INTO tb_bodega VALUES("433","70205097","Cable Eléctrico Tsj 12/3 (Vulcan)","Mts","6.00","6.00","1.40");
INSERT INTO tb_bodega VALUES("434","70212414","Ancla Plástica De 5/16\"","C/U","3.00","3.00","0.00");
INSERT INTO tb_bodega VALUES("435","70212463","Tornillo Goloso De 2\"","C/U","3.00","3.00","0.20");
INSERT INTO tb_bodega VALUES("436","70205192","Caja Octagonal PVC","C/U","1.00","1.00","0.70");
INSERT INTO tb_bodega VALUES("437","70205296","Tomacorriente Hembra, Doble, Polarizado","C/U","1.00","1.00","1.00");
INSERT INTO tb_bodega VALUES("438","70205331","Placa Doble De Baquelita (Para Toma Polarizado)","C/U","1.00","1.00","0.30");
INSERT INTO tb_bodega VALUES("439","70205097","Cable Eléctrico Tsj 12/3 (Vulcan)","Mts","6.00","6.00","1.40");
INSERT INTO tb_bodega VALUES("440","70212414","Ancla Plástica De 5/16\"","C/U","3.00","3.00","0.00");
INSERT INTO tb_bodega VALUES("441","70212463","Tornillo Goloso De 2\"","C/U","3.00","3.00","0.20");
INSERT INTO tb_bodega VALUES("442","70205456","Conector Recto De 3/4\", Metálico","C/U","2.00","2.00","0.90");
INSERT INTO tb_bodega VALUES("443","70205190","Caja Rectangular De PVC 4\" X 2\"","C/U","1.00","1.00","0.40");
INSERT INTO tb_bodega VALUES("444","70205572","Cinta Aislante # 23, Rollo","C/U","1.00","1.00","14.50");
INSERT INTO tb_bodega VALUES("445","70208080","Masilla Para Tabla Roca","Galón","10.00","10.00","3.90");
INSERT INTO tb_bodega VALUES("446","70205357","Switch Superficial Para Timbre","C/U","1.00","1.00","1.40");
INSERT INTO tb_bodega VALUES("447","70211287","Niple De Hierro Galvanizado Todo Rosca De 1/2\" X 1","C/U","2.00","2.00","0.40");
INSERT INTO tb_bodega VALUES("448","70211076","Llave De 1/2\" Cromado Para Lavamanos 1a Calidad","C/U","2.00","2.00","6.00");
INSERT INTO tb_bodega VALUES("449","43703018","Tubo De Abasto Para Lavamanos Flexible De 3/8\" X1/","C/U","2.00","2.00","12.50");
INSERT INTO tb_bodega VALUES("450","70211051","Válvula De Control Cromada De 1 / 2\"A La Pared","C/U","2.00","2.00","2.50");
INSERT INTO tb_bodega VALUES("451","70211900","Kit De Accesorios Para Servicio Sanitario Standard","C/U","1.00","1.00","5.70");
INSERT INTO tb_bodega VALUES("452","70212033","Clavo De Acero De 1 1/2\"","C/U","4.00","4.00","0.00");
INSERT INTO tb_bodega VALUES("453","70212709","Remache Pop, De 1/8\" X 1/2\"","C/U","50.00","50.00","1.70");
INSERT INTO tb_bodega VALUES("454","70205233","Tubo Fluorescentes De 20 Watts, 120 Voltios","C/U","4.00","4.00","1.00");
INSERT INTO tb_bodega VALUES("455","70205886","Tubo Led De 18 Watts, T8, 120 Voltios","C/U","6.00","6.00","3.80");
INSERT INTO tb_bodega VALUES("456","70208750","Loseta Para Cielo Falso, De Yeso, De (4 X 2) Pies","C/U","2.00","2.00","3.40");
INSERT INTO tb_bodega VALUES("457","70205227","Foco Ahorrador De Energía De 25 Watts, 110 Voltios","C/U","2.00","2.00","3.30");
INSERT INTO tb_bodega VALUES("458","70208300","Tabla Roca De Yeso Para Interiores De 1.22 Metros","C/U","2.00","2.00","8.56");
INSERT INTO tb_bodega VALUES("459","70212426","Tornillo Para Tablaroca De 1 1/2\"","C/U","200.00","200.00","0.02");
INSERT INTO tb_bodega VALUES("460","70208527","Chapa Cilíndrica De Palanca Con Llave","C/U","2.00","2.00","22.30");
INSERT INTO tb_bodega VALUES("461","70212727","Pasador Metálico De 2 1/2\"","C/U","2.00","2.00","3.50");
INSERT INTO tb_bodega VALUES("462","70210211","Costanera De Cedro De 3 Varas","C/U","1.00","1.00","16.35");
INSERT INTO tb_bodega VALUES("463","70120080","Interruptor Termomagnético Trifásico, 400 Amperios","C/U","1.00","1.00","1.00");
INSERT INTO tb_bodega VALUES("464","70170069","Rodo Fijo De 125 Milímetros (5 Pulgadas)","C/U","1.00","1.00","2.75");
INSERT INTO tb_bodega VALUES("465","70101779","Bisagra De 2\"","C/U","2.00","2.00","0.40");
INSERT INTO tb_bodega VALUES("466","70212800","Electrodo 3/32\" Para Hierro Dulce","Lb","0.50","0.50","1.00");
INSERT INTO tb_bodega VALUES("467","70211005","Sanitario Color Blanco Completo Standard","C/U","1.00","1.00","52.40");
INSERT INTO tb_bodega VALUES("468","70211071","Tubo De Abasto De Acero Inoxidable Para Sanitario","C/U","2.00","2.00","2.60");
INSERT INTO tb_bodega VALUES("469","70211051","Válvula De Control Cromada De 1 / 2\"A La Pared","C/U","2.00","2.00","2.50");
INSERT INTO tb_bodega VALUES("470","70211900","Kit De Accesorios Para Servicio Sanitario Standard","C/U","2.00","2.00","5.70");
INSERT INTO tb_bodega VALUES("471","70211300","Cinta Teflón","C/U","2.00","2.00","0.30");
INSERT INTO tb_bodega VALUES("472","70212825","Tubo Silicon De Alta Temperatura Color Rojo","C/U","1.00","1.00","1.90");
INSERT INTO tb_bodega VALUES("473","70208527","Chapa Cilíndrica De Palanca Con Llave","C/U","1.00","1.00","22.30");
INSERT INTO tb_bodega VALUES("474","70205242","Foco Corriente De 60 Watts","Acto","1.00","1.00","0.40");
INSERT INTO tb_bodega VALUES("475","70208630","Piso De (33 X 33) Cms, Para Tráfico Pesado, Vario","C/U","720.00","720.00","1.25");
INSERT INTO tb_bodega VALUES("476","70210500","Pegamento Para Madera","Galón","0.50","0.50","14.00");
INSERT INTO tb_bodega VALUES("477","70212425","Tornillo Para Tablaroca De 2\"","C/U","24.00","24.00","0.03");
INSERT INTO tb_bodega VALUES("478","70205089","Cable Eléctrico Tsj 12/2 (Vulcan)","Mts","5.00","5.00","1.00");
INSERT INTO tb_bodega VALUES("479","70205190","Caja Rectangular De PVC 4\" X 2\"","C/U","1.00","1.00","0.40");
INSERT INTO tb_bodega VALUES("480","70205319","Toma Corriente Macho, Tipo Chino De 15 Amperios","C/U","1.00","1.00","1.30");
INSERT INTO tb_bodega VALUES("481","70205331","Placa Doble De Baquelita (Para Toma Polarizado)","C/U","1.00","1.00","0.30");
INSERT INTO tb_bodega VALUES("482","70205456","Conector Recto De 3/4\", Metálico","C/U","1.00","1.00","0.90");
INSERT INTO tb_bodega VALUES("483","70212992","Alambre Espigado Galvanizado No. 16 Rollo","C/U","1.00","1.00","36.00");
INSERT INTO tb_bodega VALUES("484","70205094","Cable Eléctrico Tsj 10/3 (Vulcan)","Mts","18.00","18.00","4.00");
INSERT INTO tb_bodega VALUES("485","70205296","Tomacorriente Hembra, Doble, Polarizado","C/U","1.00","1.00","1.00");
INSERT INTO tb_bodega VALUES("486","70211460","Tapón Hembra Liso PVC 3\"","C/U","1.00","1.00","6.40");
INSERT INTO tb_bodega VALUES("487","70211130","Té De 1/2\" De PVC","C/U","4.00","4.00","0.20");
INSERT INTO tb_bodega VALUES("488","70211808","Adaptador Macho PVC De 1/2\"","C/U","2.00","2.00","0.20");
INSERT INTO tb_bodega VALUES("489","70211105","Codo Liso De 1 /2\" X 90 De P.V.C","C/U","2.00","2.00","0.10");
INSERT INTO tb_bodega VALUES("490","70211051","Válvula De Control Cromada De 1 / 2\"A La Pared","C/U","2.00","2.00","2.50");
INSERT INTO tb_bodega VALUES("491","70211071","Tubo De Abasto De Acero Inoxidable Para Sanitario","C/U","3.00","3.00","2.60");
INSERT INTO tb_bodega VALUES("492","70211073","Tubo De Abasto De Acero Inoxidable Para Lavamanos","C/U","2.00","2.00","2.60");
INSERT INTO tb_bodega VALUES("493","70211076","Llave De 1/2\" Cromado Para Lavamanos 1a Calidad","C/U","2.00","2.00","6.00");
INSERT INTO tb_bodega VALUES("494","70120208","Capacitor De Marcha De 40mfd, 440vac 60hz","C/U","1.00","1.00","3.80");


CREATE TABLE `tb_circulante` (
  `codCirculante` int(15) NOT NULL,
  `campo` text COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Solicitud Circulante',
  `estado` text COLLATE utf8_spanish_ci NOT NULL,
  `idusuario` int(11) NOT NULL DEFAULT 1,
  `fecha_solicitud` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`codCirculante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;



CREATE TABLE `tb_compra` (
  `nSolicitud` int(11) NOT NULL,
  `dependencia` text COLLATE utf8_spanish_ci NOT NULL,
  `plazo` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `unidad_tecnica` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcion_solicitud` text COLLATE utf8_spanish_ci NOT NULL,
  `usuario` text COLLATE utf8_spanish_ci NOT NULL,
  `campo` text COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Solicitud Compra',
  `estado` text COLLATE utf8_spanish_ci NOT NULL,
  `idusuario` int(11) NOT NULL DEFAULT 1,
  `justificacion` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_registro` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`nSolicitud`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;



CREATE TABLE `tb_productos` (
  `cod` int(3) NOT NULL AUTO_INCREMENT,
  `codProductos` int(15) NOT NULL,
  `catalogo` int(15) NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `unidad_medida` text COLLATE utf8_spanish_ci NOT NULL DEFAULT 'C/U',
  `stock` decimal(6,2) unsigned NOT NULL DEFAULT 0.00,
  `precio` decimal(6,2) NOT NULL DEFAULT 0.00,
  `categoria` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_registro` date NOT NULL DEFAULT current_timestamp(),
  `Dia` int(2) NOT NULL,
  `Mes` int(2) NOT NULL,
  `Año` int(4) NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=InnoDB AUTO_INCREMENT=702 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO tb_productos VALUES("1","31161502","70212419","Ancla Plástica Para Tabla Roca","C/U","56.00","0.23","Herramientas Y Repuestos","2022-05-17","17","5","2022");
INSERT INTO tb_productos VALUES("2","43703002","72154119","Niple Galvanizado De 1\" X 1 1/2\"","C/U","7.00","1.50","Minerales Metálicos","2022-03-07","7","3","2022");
INSERT INTO tb_productos VALUES("3","43703003","40142305","Reductor Campana Galvanizado De 2 X 3/4\"","C/U","1.00","3.90","Minerales Metálicos","2022-03-08","8","3","2022");
INSERT INTO tb_productos VALUES("4","43703004","40142313","Tapón Hembra Galvanizado 1\"","C/U","10.00","1.10","Minerales Metálicos","2022-03-08","8","3","2022");
INSERT INTO tb_productos VALUES("5","43703005","40142305","Reductor Campana Galvanizado De 1/2 X 5/8\"","C/U","6.00","1.80","Minerales Metálicos","2022-03-08","8","3","2022");
INSERT INTO tb_productos VALUES("6","43703006","40142305","Reductor Campana Galvanizado De 1 X 5/8\"","C/U","3.00","2.00","Minerales Metálicos","2022-03-08","8","3","2022");
INSERT INTO tb_productos VALUES("7","43703007","40142305","Reductor Campana Galvanizado De 1 X 3/4\"","C/U","3.00","2.30","Minerales Metálicos","2022-03-08","8","3","2022");
INSERT INTO tb_productos VALUES("8","43703008","40183104","Tapón Hembra PVC 1 1/4\" Con Rosca","C/U","9.00","1.30","Herramientas Y Repuestos","2022-03-08","8","3","2022");
INSERT INTO tb_productos VALUES("9","43703009","40183104","Tapón Hembra PVC De 1\" Con Rosca","C/U","5.00","1.00","Herramientas Y Repuestos","2022-03-08","8","3","2022");
INSERT INTO tb_productos VALUES("10","43703010","40183104","Tapón Macho De 2\" PVC Con Rosca","C/U","5.00","1.50","Herramientas Y Repuestos","2022-03-08","8","3","2022");
INSERT INTO tb_productos VALUES("11","43703011","40175208","Codo PVC De 2\" Con Rosca","C/U","9.00","4.80","Herramientas Y Repuestos","2022-03-08","8","3","2022");
INSERT INTO tb_productos VALUES("12","43703012","40175208","Tee PVC Con Rosca 3/4\"","C/U","10.00","1.00","Herramientas Y Repuestos","2022-03-08","8","3","2022");
INSERT INTO tb_productos VALUES("13","43703013","40161514","Tapón Hembra PVC 2 1/2\"","C/U","15.00","3.30","Herramientas Y Repuestos","2022-03-08","8","3","2022");
INSERT INTO tb_productos VALUES("14","43703014","40171719","Adaptador Hembra PVC 2 1/2\"","C/U","4.00","4.50","Herramientas Y Repuestos","2022-03-08","8","3","2022");
INSERT INTO tb_productos VALUES("15","43703015","40171617","Tubo PVC 2 1/2 160 P.S.I.","Mts","7.00","3.40","Herramientas Y Repuestos","2022-03-08","8","3","2022");
INSERT INTO tb_productos VALUES("16","43703016","40141609","Válvula De Paso De 1 1/2\"","C/U","1.00","62.00","Minerales Metálicos","2022-03-08","8","3","2022");
INSERT INTO tb_productos VALUES("17","43703017","30102403","Hierro Cuadrado Solido De 1/4\"","Mts","66.00","0.70","Minerales Metálicos","2022-03-11","11","3","2022");
INSERT INTO tb_productos VALUES("18","43703018","40142020","Tubo De Abasto Para Lavamanos Flexible De 3/8\" X1/2\" X 48\"","C/U","0.00","12.50","Herramientas Y Repuestos","2022-03-15","15","3","2022");
INSERT INTO tb_productos VALUES("19","43703019","99999","Carbón 0252 Para Pulidora","C/U","2.00","5.30","Herramientas Y Repuestos","2022-03-15","15","3","2022");
INSERT INTO tb_productos VALUES("20","43703020","99999","Carbón 1120 Para Pulidora","C/U","1.00","9.00","Herramientas Y Repuestos","2022-03-15","15","3","2022");
INSERT INTO tb_productos VALUES("21","43703021","99999","Varilla Lisa De 1/2\"","Mts","24.00","2.33","Minerales Metálicos","2022-03-29","29","3","2022");
INSERT INTO tb_productos VALUES("22","43703022","40142604","Codo PVC 90° Con Rosca","C/U","4.00","2.80","Herramientas Y Repuestos","2022-05-17","17","5","2022");
INSERT INTO tb_productos VALUES("23","62502020","56101504","Silla Ergonómica ejecutiva Con Brazos","C/U","1.00","175.00","Mobiliario","2022-06-07","7","6","2022");
INSERT INTO tb_productos VALUES("24","62504103","24102004","Estante Metálico De Cinco Entrepaños","C/U","0.00","97.00","Mobiliario","2022-06-07","7","6","2022");
INSERT INTO tb_productos VALUES("25","70101135","39101801","Foco Halógeno Para Microscopio Micro estar 12v 20w,Base G4","C/U","1.00","4.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("26","70101450","31171556","Baleros N° 608-Z","C/U","2.00","3.80","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("27","70101453","31171556","Baleros N° 6005-2z","C/U","9.00","7.90","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("28","70101455","31171556","Baleros N° 6200-2z","C/U","3.00","4.20","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("29","70101458","31171556","Baleros N° 6203-2z","C/U","14.00","4.70","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("30","70101465","31171556","Baleros N° 6309-Z","C/U","6.00","29.10","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("31","70101779","31162403","Bisagra De 2\"","C/U","30.00","0.40","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("32","70102969","42151657","Balona Metálica De Compresión 3/8\"","C/U","11.00","0.20","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("33","70103027","42182602","Bombillo Para Lampara De Hendidura 6 V","C/U","5.00","0.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("34","70103029","42182602","Foco Xhl De 6v Tubo Fluorescente De Fototerapia F20t12/Bb 20w Azul","C/U","32.00","0.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("35","70104092","0","Relé De Estado Solido 120 Vac, 5 Voltios","C/U","1.00","175.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("36","70104315","0","Empaque De Compuerta De Esterilizador A Vapor","C/U","3.00","800.00","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("37","70104350","99999","Bomba De Agua Para Generador De Vapor","C/U","1.00","2825.00","Herramientas Y Repuestos","2022-02-22","22","2","2022");
INSERT INTO tb_productos VALUES("38","70105620","39101801","Foco Halógeno 24v 150w","C/U","20.00","12.80","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("39","70110102","42143703","Tubo Ultravioleta Para Lampara De Fototerapia Potencia 20 Watts, Luz De Dia","C/U","30.00","6.50","Materiales Eléctricos","2022-05-23","23","5","2022");
INSERT INTO tb_productos VALUES("40","70110115","39111705","Lampara Fluorescente Luz Blanca 18 W Para Fototerapia","C/U","24.00","1.60","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("41","70119002","32101617","Tarjeta Electrónica Universal Para Equipo De Aire Acondicionado De 9,000 A 24,000 Btu","C/U","4.00","20.00","Materiales Eléctricos","2022-05-26","26","5","2022");
INSERT INTO tb_productos VALUES("42","70120003","39121529","Contactor De 50 Amperios, 3 Polos , 480 Vac, Bobina 24 Vac, Tipo 3pst","C/U","1.00","13.80","Materiales Eléctricos","2022-05-13","13","5","2022");
INSERT INTO tb_productos VALUES("43","70120019","39121529","Contactor Para 40 Amperios, 2 Polos Coil 220 Vac, 60 Hz.","C/U","2.00","10.00","Materiales Eléctricos","2022-05-30","30","5","2022");
INSERT INTO tb_productos VALUES("44","70120023","0","Seccionador De Fase De 3 Polos 250 V, 75 Amp","C/U","1.00","165.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("45","70120031","0","Interruptor Seccionador F.160 Amp","C/U","1.00","0.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("46","70120080","99999","Interruptor Termomagnético Trifásico, 400 Amperios, 240 V., Incorporado En Gabinete Metálico ,Nema 1","C/U","0.00","1.00","Materiales Eléctricos","2022-05-17","17","5","2022");
INSERT INTO tb_productos VALUES("47","70120206","32121502","Capacitor De Marcha De 30mfd, 440vac 60hz","C/U","13.00","3.50","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("48","70120207","32121502","Capacitor De Marcha De 35mfd, 440vac 60hz","C/U","2.00","3.50","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("49","70120208","32121502","Capacitor De Marcha De 40mfd, 440vac 60hz","C/U","11.00","3.80","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("50","70120209","32121502","Capacitor De Marcha De 55mfd, 440vac 60hz","C/U","56.00","6.40","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("51","70120211","32121502","Capacitor De Marcha De 5o Mfd, 440 Vac","C/U","13.00","4.50","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("52","70120212","32121502","Capacitor De Marcha De 5mfd 370v","C/U","20.00","1.50","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("53","70120213","32121502","Capacitor De Marcha De 7.5mfd 370v","C/U","17.00","1.70","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("54","70120216","32121502","Capacitor De Marcha De 15 Mfd, 370 Vac","C/U","19.00","2.90","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("55","70120222","32121502","Capacitor De Marcha De 35 Mfd. 370 Vac","C/U","10.00","3.60","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("56","70120224","32121502","Capacitor De Marcha De 45 Mfd, 370 Vac","C/U","27.00","4.30","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("57","70120225","32121502","Capacitor De Marcha De 3 Mfd, 450 Vac","C/U","1.00","0.90","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("58","70120226","32121502","Capacitor De Marcha De 2 Mfd, 450 Vac","C/U","10.00","1.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("59","70120227","32121502","Capacitor De Marcha De 70 Mfd, 370 Vac","C/U","27.00","5.90","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("60","70120228","32121502","Capacitor De Marcha De 1.5 Mfd, 450 Vac","C/U","12.00","0.80","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("61","70120229","32121502","Capacitor De Marcha De 2.5 Mfd, 450 Vac","C/U","3.00","1.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("62","70120231","32121502","Capacitor De Marcha De 4.5 Mfd, 450 Vac","C/U","2.00","1.30","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("63","70120234","32121502","Capacitor De Arranque De 130-156 Mfd, 220 V","C/U","12.00","3.10","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("64","70120238","32121502","Capacitor De Arranque De 161-193 Mdf 110-125 Vac","C/U","11.00","3.60","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("65","70120245","32121502","Capacitor De Arranque De 161-193 Mfd, 440 V","C/U","6.00","3.60","Materiales Eléctricos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("66","70120247","32121502","Capacitor De Arranque De 189-227 Mfd 370 Vac","C/U","8.00","5.20","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("67","70121027","40151607","Compresor Hermético Para Aire Acondicionado De 12,000 Btu/H, 208/230 Voltios, Monofásico, 60 Hz., Tipo Scroll, Gas Ecológico 410-A, Seer 13 O Mayor","C/U","1.00","0.00","Materiales Eléctricos","2022-03-03","3","3","2022");
INSERT INTO tb_productos VALUES("68","70121081","40161514","Filtro Deshidratador Para 7. 5 toneladas, De /8\", A Soldar","C/U","12.00","25.00","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("69","70121047","40151607","Compresor Hermético De 1/3 H. P., 120 Voltios, Refrigerante 134a, Enfriado Por Aire, Con Kit De Arranque","C/U","3.00","191.25","Materiales Eléctricos","2022-03-03","3","3","2022");
INSERT INTO tb_productos VALUES("70","70120254","32121502","Capacitor De Marcha De 60 Mfd, (370-440) Vac","C/U","16.00","4.60","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("71","70121088","40161514","Filtro Deshidratador 3/8\" A Roscar Flare","Cto","3.00","6.00","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("72","70121089","40161514","Filtro Deshidratador 1/4\" A Roscar Flare","C/U","2.00","0.00","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("73","70121091","40161514","Filtro Deshidratador 3/4\" A Roscar Flare","C/U","1.00","0.00","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("74","70121092","40161514","Filtro Deshidratador 5/8\" A Roscar, Flare","C/U","20.00","13.00","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("75","70121095","40161514","Filtro Deshidratador De 1/2? A Soldar","C/U","3.00","0.00","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("76","70121115","41112209","Termostato De Pared Para Aire Acondicionado, 24 Vac","C/U","5.00","20.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("77","70121127","41112209","Termostato Para Cuarto Frio, Análogo","C/U","1.00","5.30","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("78","70121142","39121523","Timar Retardador De 0-8 Minutos","C/U","15.00","10.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("79","70121178","0","Protector De Fase/Voltaje Monofásico, Digital","C/U","1.00","78.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("80","70121180","39121523","Replay Fan Para Aire Acondicionado, 24 Voltios, 1 Paso","C/U","6.00","8.50","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("81","70121497","39122219","Switch De Nivel Flotador Para Cisternas Y Tanques","C/U","1.00","13.30","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("82","70121599","47131805","Jabón Limpiador De Serpentines De Aire Acondicionado","C/U","2.00","11.50","Químicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("83","70121654","0","Control De Presión Modulante (Vapor),Marca Honeywell, L91a","C/U","1.00","0.00","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("84","70121708","0","Medidor De Flujo De Combustible, Digital","C/U","0.00","975.00","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("85","70140024","31162903","Abrazadera De Acero Inoxidable Sin Fin Para Manguera De 3/8\"","C/U","48.00","0.80","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("86","70140025","31162903","Abrazadera De Acero Inoxidable Sin Fin Para Manguera De 5/8\"","C/U","44.00","1.10","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("87","70140026","31162903","Abrazadera De Acero Inoxidable Sin Fin Para Manguera De 1\"","C/U","6.00","0.30","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("88","70140027","31162903","Abrazadera De Acero Inoxidable Sin Fin Para Manguera De 1 1/2\"","C/U","25.00","1.80","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("89","70140028","31162903","Abrazadera De Acero Inoxidable Sin Fin Para Manguera De 2\"","C/U","20.00","0.70","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("90","70140070","31162903","Abrazadera De Acero Inoxidable Sin Fin 3/4\"","C/U","30.00","0.80","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("91","70150073","25174009","Faja Industrial No. A38","C/U","55.00","4.00","Cuero Y Caucho","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("92","70150139","25174009","Faja Spa- 3182 Para Lavadora","C/U","10.00","90.00","Cuero Y Caucho","2022-05-18","18","5","2022");
INSERT INTO tb_productos VALUES("93","70150198","39121032","Transformador 100 Va","C/U","1.00","125.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("94","70150208","39122243","Micro Switch De Final De Carrera","C/U","1.00","49.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("95","70150547","31171556","Rodamiento (Balero) 6202 2z","C/U","1.00","3.50","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("96","70150551","31171556","Rodamiento (Balero) 6205 2rsc3","C/U","1.00","5.30","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("97","70150563","31171556","Rodamiento (Balero) 6305 Rs","C/U","2.00","7.50","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("98","70150580","72154072","Botonera De Paro De Emergencia","C/U","2.00","11.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("99","70154063","25174009","Faja A63","C/U","3.00","0.00","Cuero Y Caucho","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("100","70154142","25174009","Faja A42","C/U","61.00","4.30","Cuero Y Caucho","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("101","70154144","25174009","Faja A44","C/U","4.00","0.00","Cuero Y Caucho","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("102","70154416","25174009","Faja Ax 36","C/U","21.00","0.00","Cuero Y Caucho","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("103","70154422","25174009","Fajas Faja Ap-74 En","C/U","4.00","35.00","Cuero Y Caucho","2022-05-18","18","5","2022");
INSERT INTO tb_productos VALUES("104","70154424","24100000","Faja 3v 710 En\"","Cto","6.00","60.00","Cuero Y Caucho","2022-05-18","18","5","2022");
INSERT INTO tb_productos VALUES("105","70154510","25174009","Faja Ax 40","C/U","84.00","0.00","Cuero Y Caucho","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("106","70170007","31162702","Rodo Giratorio De 60 Milímetros ( 2 Pulg)","C/U","6.00","2.95","Herramientas Y Repuestos","2022-05-17","17","5","2022");
INSERT INTO tb_productos VALUES("107","70170019","31162702","Rodo Giratorio De 125 Milímetros ( O Su equivalente En Pulgadas)","C/U","26.00","9.94","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("108","70170060","31162702","Rodo Fijo De 60 Milímetros ( O Su Equivalente En Pulgadas)","C/U","31.00","2.20","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("109","70170069","31162702","Rodo Fijo De 125 Milímetros (5 Pulgadas)","C/U","26.00","2.75","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("110","70170100","31162702","Rueda De Hule De 80","C/U","6.00","5.58","Herramientas Y Repuestos","2022-05-17","17","5","2022");
INSERT INTO tb_productos VALUES("111","70205062","26121634","Cable Thhn No 12 Awg, Milímetros ( 3 Plg)","Mts","325.00","0.70","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("112","70189075","45121518","Cable De Audio Mini Jack 3,5 Mm Trrs (Cable Plano P/","C/U","100.00","1.50","Materiales Eléctricos","2022-05-17","17","5","2022");
INSERT INTO tb_productos VALUES("113","70190804","25170000","Llanta Para Bicicleta 24\" X 2.125\"","C/U","6.00","9.80","Cuero Y Caucho","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("114","70190806","25170000","Llanta Para Bicicleta 26\" X 2.125\"","C/U","11.00","9.80","Cuero Y Caucho","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("115","70190825","25170000","Tubo Para Bicicleta 24\" X 1.90\" X 2.125\"","C/U","27.00","5.20","Cuero Y Caucho","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("116","70190826","0","Tubo De Bicicleta De 26\"","C/U","14.00","5.20","Cuero Y Caucho","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("117","70190830","0","Parche Para Neumático De Bicicleta, Caja","C/U","120.00","2.40","Cuero Y Caucho","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("118","70191288","99999","Filtro De Combustible Diesel 50 Psi Fill Rite F2920","C/U","5.00","299.75","Herramientas Y Repuestos","2022-05-17","17","5","2022");
INSERT INTO tb_productos VALUES("119","70205006","31152209","Alambre De Cobre No. 2 Desnudo","Mts","30.00","0.60","Materiales Eléctricos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("120","70205036","26121634","Cable Thhn No 2 Awg, Color Negro","Mts","80.00","6.20","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("121","70205037","26121634","Cable Thhn No. 4 Awg, Color Negro","Mts","40.00","3.40","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("122","70205042","26121634","Cable Thhn No. 6 Awg, Color Rojo","Mts","70.00","2.20","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("123","70205043","26121634","Cable Thhn No. 6 Awg, Color Negro","Mts","80.00","2.20","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("124","70205044","26121634","Cable Thhn No. 6 Awg, Color Blanco","Mts","82.00","2.20","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("125","70205048","26121634","Cable Thhn No. 8 Awg, Color Rojo","Mts","100.00","1.30","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("126","70205049","26121634","Cable Thhn No. 8 Awg, Color Negro","Mts","170.00","1.30","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("127","70205050","26121634","Cable Thhn No. 8 Awg, Color Blanco","Mts","150.00","1.30","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("128","70205054","26121634","Cable Thhn No.10 Awg, Color Rojo","Mts","50.00","1.00","Materiales Eléctricos","2022-05-23","23","5","2022");
INSERT INTO tb_productos VALUES("129","70205055","26121634","Cable Thhn No. 10 Awg, Color Negro","Mts","50.00","0.70","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("130","70205056","26121634","Cable Thhn No. 10 Awg, Color Blanco","Mts","50.00","1.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("131","70205057","26121634","Cable Thhn No.10 Awg, Color Azul","Mts","150.00","0.70","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("132","70205058","26121634","Cable Thhn No 10 Awg, Color Verde","Mts","0.00","1.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("133","70205060","26121634","Cable Thhn No. 12 Awg, Color Rojo","Mts","175.00","0.70","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("134","70205061","26121634","Cable Thhn No 12 Awg, Color Negro","Mts","30.00","0.70","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("135","70205130","39121602","Dado Térmico De 20 Amperios,1 De Polo De Primera Calidad, Igual O Compatible Con La Marca General Electric","C/U","6.00","5.42","Materiales Eléctricos","2022-05-17","17","5","2022");
INSERT INTO tb_productos VALUES("136","70205135","39121602","Dado Térmico De 50 Amperios, 1 Polo De Primera Calidad, Igual O Compatible Con La Marca General Electric","C/U","10.00","7.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("137","70205140","39121602","Dado Térmico De 50 Amperios, 2 Polos De Primera Calidad","C/U","2.00","28.90","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("138","70205141","39121602","Dado Térmico De 100 Amperios, 2 Polos De Primera Calidad, Igual O Compatible Con La Marca General","C/U","3.00","49.80","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("139","70205063","26121634","Cable Thhn No 12 Awg, Color Verde","Mts","100.00","0.59","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("140","70205066","26121634","Cable Thhn No. 14 Awg, Color Rojo","Mts","189.00","0.50","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("141","70205075","26121634","Cable Tnm No 10/2","Mts","30.00","2.40","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("142","70205076","26121634","Cable Tnm No. 12/2","Mts","9.00","2.40","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("143","70205085","26121634","Cable Tnm No. 10/3","Mts","295.00","3.10","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("144","70205086","26121634","Cable Tnm No. 12/3","Mts","240.00","2.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("145","70205089","26121634","Cable Eléctrico Tsj 12/2 (Vulcan)","Mts","204.00","1.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("146","70205090","26121634","Cable Eléctrico Tsj 14/2 (Vulcan)","Mts","232.00","0.70","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("147","70205092","26121634","Cable Eléctrico Tsj 6/3 (Vulcan)","Mts","12.00","9.60","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("148","70205093","26121634","Cable Eléctrico Tsj 14/3 (Vulcan)","Mts","435.00","1.60","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("149","70205094","26121634","Cable Eléctrico Tsj 10/3 (Vulcan)","Mts","12.00","4.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("150","70205097","26121634","Cable Eléctrico Tsj 12/3 (Vulcan)","Mts","96.00","1.40","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("151","70205099","26121634","Cable Dúplex No. 12","Mts","95.00","0.80","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("152","70205100","26121634","Cable Dúplex No. 14","Mts","122.00","0.50","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("153","70205105","26121634","Cable Dúplex No. 10","Mts","20.00","1.50","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("154","70205125","26121634","Cable Porta electrodo para Soldar Pawc 4 Awg","Mts","21.00","6.10","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("155","70205126","26121634","Cable Para Bocina","Mts","217.00","0.60","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("156","70205140","39121602","Dado Térmico De 50 Amperios, 2 Polos De Primera Calidad","C/U","2.00","28.90","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("157","70205144","39121640","Dado Térmico De 40 Amperios, 3 Polos De Primera Calidad, Igual O Compatible Con La Marca General Electric","C/U","9.00","43.90","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("158","70205149","39121640","Marca General dado Térmico De 40 Amp, 2 Polos De Primera Calidad, Igual O Compatible Con La Electric","C/U","10.00","14.90","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("159","70205156","39121602","Dado Térmico De 30 Amperios, 3 Polos De Primera Calidad, Igual O Compatible Con La Marca General Electric","C/U","9.00","34.60","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("160","70205157","39121529","Dado Térmico De 100 Amperios, 3 Polos De Primera Calidad, Igual O Compatible Con La Marca General Electric","C/U","5.00","82.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("161","70205152","39121602","Dado Térmico De 30 Amperios, 2 Polos De Primera Calidad, Igual O Compatible Con La Marca General Electric","C/U","5.00","14.70","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("162","70205148","39121602","Dado Térmico De 40 Amperios, 1 Polos De Primera Calidad, Igual O Compatible Con La Marca General Electric","C/U","62.00","7.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("163","70205170","39121303","Caja Térmica De 4 Circuitos, 2 Polos, 240 Voltios, Igual O Compatible Con La Marca General Electric","C/U","9.00","27.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("164","70205190","39121303","Caja Rectangular De PVC 4\" X 2\"","C/U","250.00","0.40","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("165","70205158","39121602","Dado Térmico De 50 Amperios, 3 Polos De Primera Calidad, Igual O Compatible Con La Marca General Electric","C/U","5.00","34.60","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("166","70205192","39121309","Caja Octagonal PVC","C/U","9.00","0.70","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("167","70205193","39121304","Tapadera Para Caja Octagonal","C/U","115.00","0.30","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("168","70205215","39121303","Caja Térmica Monofásica De 12 Circuitos, 2 Polos, Nema 3r, 120/240 Voltios","C/U","1.00","125.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("169","70205222","39101801","Bombillo Para Lampara De Mercurio De 175w, 220 Voltios.","C/U","15.00","4.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("170","70205223","39111810","Fotocelda Para Lampara De Mercurio De 175w, 220 Voltios","C/U","15.00","8.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("171","70205227","39101801","Foco Ahorrador De Energía De 25 Watts, 110 Voltios","C/U","17.00","3.30","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("172","70205231","39101605","Tubo Fluorescente De 15 Watts, 120 Voltios","C/U","51.00","4.50","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("173","70205232","39101605","Tubo Fluorescente De 17 Watts, 120 Voltios","C/U","77.00","1.40","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("174","70205233","39101605","Tubo Fluorescentes De 20 Watts, 120 Voltios","C/U","130.00","1.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("175","70205236","39101605","Tubo Fluorescente De 55 Watts, 120 Voltios","C/U","18.00","2.90","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("176","70205237","39101605","Tubo Fluorescente De 40 Watts, 120 Voltios","C/U","33.00","0.80","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("177","70205242","39101801","Foco Corriente De 60 Watts","Cto","49.00","0.40","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("178","70205250","39101901","Balastro De 2x40w, 120 Voltios, Rapid Star","C/U","34.00","18.40","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("179","70205252","39101901","Balastro Electrónico De 1x20 W, 120 Voltios.","C/U","72.00","3.30","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("180","70205259","39101901","Balastro Electrónico De 2x32 W, 120 Voltios","C/U","8.00","8.50","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("181","70205284","39121406","Receptáculo De Baquelita Fijo","C/U","34.00","0.90","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("182","70205288","39120000","Soporte Para Lampara C/U Fluorescente Tipo Riel","C/U","29.00","0.50","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("183","70205295","39121308","Tomacorriente Hembra Tipo Dado, Polarizado","C/U","34.00","0.00","Materiales Eléctricos","2022-03-11","11","3","2022");
INSERT INTO tb_productos VALUES("184","70205296","39121308","Tomacorriente Hembra, Doble, Polarizado","C/U","134.00","1.00","Herramientas Y Repuestos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("185","70205297","39121308","Tomacorriente Hembra , 220 Voltios, 50 Amperios","C/U","8.00","2.80","Materiales Eléctricos","2022-02-28","28","2","2022");
INSERT INTO tb_productos VALUES("186","70205300","39121308","Toma Corriente Hembra Para Voltios 50 Amperios","C/U","8.00","2.80","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("187","70205301","39121308","Toma Corriente Hembra Para Empotrar, De Seguridad, 220 Voltios 50 Amperios, L630r Tipo Nema","C/U","0.00","9.50","Materiales Eléctricos","2022-06-07","7","6","2022");
INSERT INTO tb_productos VALUES("188","70205310","39121308","Toma Corriente Hembra, Doble, Polarizado, Grado Hospitalario, 125 Voltios, 15 Amperios","C/U","5.00","7.50","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("189","70205312","39121308","Toma Corriente Hembra , 220 Voltios, 30 Amperios Incluye Placa","C/U","4.00","4.20","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("190","70205319","39121308","Toma Corriente Macho, Tipo Chino De 15 Amperios","C/U","66.00","1.30","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("191","70205320","39121308","Toma Corriente Macho, Tipo Chino De 20 Amperios","C/U","8.00","2.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("192","70205328","39121308","Toma Corriente Hembra, 220 Voltios, Tipo Chino 15 Amperios.","C/U","28.00","3.20","Materiales Eléctricos","2022-03-14","14","3","2022");
INSERT INTO tb_productos VALUES("193","70205329","39121308","Toma Corriente Hembra A 220 Voltios, Tipo Chino 20 Amperios","C/U","3.00","3.50","Materiales Eléctricos","2022-03-14","14","3","2022");
INSERT INTO tb_productos VALUES("194","70205331","39121302","Placa Doble De Baquelita (Para Toma Polarizado)","C/U","30.00","0.30","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("195","70205338","39121302","Placa Sencilla Metálica","C/U","0.00","2.25","Materiales Eléctricos","2022-06-07","7","6","2022");
INSERT INTO tb_productos VALUES("196","70205344","39111810","Interruptor Sencillo Integrado De Primera Calidad","C/U","106.00","2.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("197","70205345","39111810","Interruptor Doble Integrado De Primera Calidad","C/U","10.00","2.43","Materiales Eléctricos","2022-05-23","23","5","2022");
INSERT INTO tb_productos VALUES("198","70205357","70205357","Switch Superficial Para Timbre","C/U","8.00","1.40","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("199","70205359","0","Timbre A 110 Voltios Difusor Acrílico Tipo diamante Para Lámpara De 4x2 Pies","C/U","5.00","7.80","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("200","70205362","39122251","Switch Superficial De 10a, 125 Vac Fusible Para Alta Tensión De 10 Amperios, Tipo K","C/U","20.00","1.50","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("201","70205421","39121432","Terminal De Bandera 12-10","C/U","40.00","0.16","Materiales Eléctricos","2022-05-26","26","5","2022");
INSERT INTO tb_productos VALUES("202","70205428","39121432","Terminal De Ojo No. 8","C/U","12.00","0.30","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("203","70205429","39120000","Terminal De Ojo No. 10","C/U","206.00","0.40","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("204","70205434","9999","Barra Coperwell De 5/8\" X 2\" Con Cepo","C/U","2.00","4.80","Materiales Eléctricos","2022-03-14","14","3","2022");
INSERT INTO tb_productos VALUES("205","70205778","39121434","Conector Recto Para 5/8\" X 2\" Con Cepo","C/U","60.00","10.50","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("206","70205453","39121434","Conector Recto De 1/2\" Metálico","C/U","6.00","0.20","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("207","70205456","39120000","Conector Recto De 3/4\", Metálico","C/U","80.00","0.90","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("208","70205459","39121434","Conector Recto De 1\" Metálico","C/U","44.00","0.70","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("209","70205490","31231313","Eléctrico Poliducto De 1/2\"","Mts","50.00","1.00","Materiales Eléctricos","2022-03-11","11","3","2022");
INSERT INTO tb_productos VALUES("210","70205499","39131601","Tecno ducto De 3/4\"","Mts","35.00","0.50","Materiales Eléctricos","2022-02-23","23","2","2022");
INSERT INTO tb_productos VALUES("211","70205500","39131601","Tecno ducto De 1\"","Mts","100.00","0.75","Materiales Eléctricos","2022-05-23","23","5","2022");
INSERT INTO tb_productos VALUES("212","70205521","39121705","Grapa Plástica Para Tnm 12/3","C/U","100.00","0.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("213","70205522","39121705","Grapa Plástica Para Tnm 10/3","C/U","173.00","0.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("214","70205530","39121705","Grapa Plástica Para Tnm 12/2","C/U","37.00","0.10","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("215","70205531","39121705","Grapa Plástica Para Tnm 14/2","C/U","85.00","0.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("216","70205570","31201502","Cinta Aislante PVC 19 Mm X 20 Ydas X 0.177 Mm, Aproximadamente, Rollo","C/U","104.00","5.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("217","70205572","31201502","Cinta Aislante # 23, Rollo","C/U","21.00","4.50","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("218","70205575","39121424","Scotchlock Azul","C/U","147.00","0.10","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("219","70205577","39121424","Scotchlock Rojo","C/U","82.00","0.10","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("220","70205603","39121311","Cuerpo Terminal De 1\"","C/U","0.00","2.20","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("221","70205626","39121613","Cepo Bimetálico No. 1/0","C/U","2.00","3.20","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("222","70205627","39121613","Cepo Bimetálico No. 2/0","C/U","2.00","5.80","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("223","70205687","31162906","Abrazadera Conduit De 2\"","C/U","60.00","0.90","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("224","70205688","31162906","Abrazadera Conduit De 1 1/2\"","C/U","24.00","0.60","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("225","70205690","31162305","Abrazadera Emt De 1 1/4\"","C/U","19.00","1.10","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("226","70205693","39121409","Conector De Compresión Ypc2a8u","C/U","24.00","1.53","Materiales Eléctricos","2022-05-18","18","5","2022");
INSERT INTO tb_productos VALUES("227","70205744","30101809","Cepo Galvanizado De 1/4\"","C/U","10.00","0.39","Minerales Metálicos","2022-06-07","7","6","2022");
INSERT INTO tb_productos VALUES("228","70205763","46171608","Sensor De Movimiento con Socket Doble, 180° Coraza Galvanizada De 2\"","C/U","1.00","15.30","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("229","70205823","26121616","Cable Telefónico 2 Pares","Mts","340.00","0.20","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("230","70205825","0","Cable De Extensión En espiral Para Auricular","C/U","103.00","3.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("231","70205826","39121310","Caja Telefónica Modular","C/U","95.00","0.90","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("232","70205870","39101609","Luminaria Empotrar, Panel Led 2 X 4, 60watts,100-227 Vac, 6500k, 4800 Lumens","C/U","0.00","50.95","Materiales Eléctricos","2022-05-23","23","5","2022");
INSERT INTO tb_productos VALUES("233","70205880","39101609","Luminaria Led De Alta Eficiencia Para Exteriores, De 50 Watts, 100-277 Vac","C/U","12.00","30.94","Materiales Eléctricos","2022-05-18","18","5","2022");
INSERT INTO tb_productos VALUES("234","70205886","39111705","Tubo Led De 18 Watts, T8, 120 Voltios","C/U","150.00","3.80","Materiales Eléctricos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("235","70206050","11101716","Estaño 60x40 Con Resina De 1 Mm En Carrete De 500g","C/U","3.00","32.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("236","70207003","12142102","Limpiador De Sistema De Tubería De Aire Acondicionado","Kg","32.00","24.70","Químicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("237","70207022","12142102","Gas Refrigerante R410a, (Tambo De 25 Libras)","C/U","5.00","119.90","Químicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("238","70207025","12142102","Gas Refrigerante Suva 134-A (Tambo De 24 Libras)","C/U","2.00","149.88","Químicos","2022-05-23","23","5","2022");
INSERT INTO tb_productos VALUES("239","70207026","12142102","Gas Refrigerante Suva 134-A (Frasco De 1 Kg)","-","7.00","5.40","Químicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("240","70207046","40171511","Tubo De Cobre Flexible Pie De 3/8\"","-","150.00","1.10","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("241","70207047","40171511","Tubo De Cobre Flexible Pie De 7/8\"","-","40.00","2.30","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("242","70207049","40171511","Tubo De Cobre Flexible Pie De 1/4\"","-","150.00","0.80","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("243","70207066","40172103","Codo De Cobre De 1/2\" X90°","-","5.00","0.80","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("244","70207070","40172103","Codo De Cobre De 3/4\" X90°","C/U","112.00","1.20","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("245","70207072","40172103","Codo De Cobre De 1\" X90°","C/U","55.00","2.00","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("246","70207078","40172103","Codo De Cobre De 2.1/8\" X90°","C/U","4.00","9.30","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("247","70207080","40183103","Camisa De Cobre De 3/4\"","C/U","16.00","0.90","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("248","70207090","40183103","Camisa De Cobre De 2-1/8\"","C/U","5.00","5.30","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("249","70207092","40183103","Camisa De Cobre De 1/2","C/U","20.00","0.70","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("250","70207101","31161722","Tuercas De Bronce De 1/4\", Flare","C/U","34.00","0.50","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("251","70207106","31161722","Tuerca De Bronce De 5/8\", Flare","C/U","37.00","0.60","Minerales Metálicos","2022-03-30","30","3","2022");
INSERT INTO tb_productos VALUES("252","70207110","31161722","Tuercas De Bronce De 3/8\", Flare","C/U","15.00","1.00","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("253","70207126","40183103","Unión De Bronce De 5/8\", Flare","C/U","3.00","1.30","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("254","70207143","0","Visor De Liquido 1/2\"","C/U","4.00","9.00","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("255","70207144","0","Visor De Liquido 3/8\"","C/U","9.00","5.60","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("256","70207145","0","Visor De Liquido 5/8\"","C/U","14.00","22.80","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("257","70207146","0","Visor De Liquido 7/8\"","C/U","22.00","14.30","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("258","70207147","40141609","Válvula De Paso De 3/8\"","C/U","1.00","0.00","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("259","70207148","40141609","Válvula De Paso De 5/8\"","C/U","10.00","0.00","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("260","70207155","39100000","Soldadura De Bronce 1/8\" (Varilla)","C/U","46.00","2.30","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("261","70207156","23271804","Soldadura De Plata Al 5% (Varilla)","C/U","94.00","2.60","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("262","70207162","31201503","Cinta Arnold Primera Calidad, Rollo","C/U","34.00","2.30","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("263","70207670","39121529","Contactor Electromecánico, Trifásico, Bobina 110 V","C/U","2.00","21.90","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("264","70207683","99999","Trampa De Vapor, Tipo Termodinámica, Diámetro De Conexión 3/4\", Roscada","C/U","3.00","110.00","Minerales Metálicos","2022-03-08","8","3","2022");
INSERT INTO tb_productos VALUES("265","70207774","99999","Sal Industrial Sin Yodo, Para Regenerar Resina Catiónica","Qq","0.00","17.38","Minerales No Metálicos","2022-03-25","25","3","2022");
INSERT INTO tb_productos VALUES("266","70207781","99999","Producto Químico Para Tratamiento Del Agua En Calderas, Anti-Incrustante (","Galón","90.00","15.00","Químicos","2022-03-01","1","3","2022");
INSERT INTO tb_productos VALUES("267","70207782","99999","Producto Químico Para Tratamiento Del Agua En Calderas, Anticorrosivo (310-A)","Galón","30.00","18.00","Químicos","2022-03-01","1","3","2022");
INSERT INTO tb_productos VALUES("268","70207803","41103311","Manómetro","C/U","3.00","23.00","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("269","70207860","40141609","Válvula De Globo De Acero Al Carbono, Diámetro 2\" Para Agua","C/U","6.00","46.00","Minerales Metálicos","2022-03-08","8","3","2022");
INSERT INTO tb_productos VALUES("270","70207979","40141607","Válvula De Bola, Esfera O Cierre Rápido, Acero Al Carbono, Diámetro 1/2\"","C/U","1.00","55.00","Minerales Metálicos","2022-03-08","8","3","2022");
INSERT INTO tb_productos VALUES("271","70208043","30161602","Capote Intermedio Para Lamina Metálica Troquelada","C/U","7.00","10.80","Minerales Metálicos","2022-03-11","11","3","2022");
INSERT INTO tb_productos VALUES("272","70208067","31161507","Autorizante 3/4\" X 5/16\"","C/U","150.00","0.00","Materiales Eléctricos","2022-03-16","16","3","2022");
INSERT INTO tb_productos VALUES("273","70208068","31161507","Tornillo Autorizante 1\"","C/U","4.00","0.06","Minerales Metálicos","2022-03-15","15","3","2022");
INSERT INTO tb_productos VALUES("274","70208080","99999","Masilla Para Tabla Roca","Galón","25.00","3.90","Minerales No Metálicos","2022-05-05","5","5","2022");
INSERT INTO tb_productos VALUES("275","70208081","31201604","Cemento Asfaltico Tapagoteras","Galón","18.00","16.57","Químicos","2022-03-29","29","3","2022");
INSERT INTO tb_productos VALUES("276","70208083","31201513","Cinta Antideslizante 50 Mm De Ancho , Rollo","C/U","7.00","13.50","Minerales No Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("277","70208086","99999","Impermeabilizante Para Concreto","Galón","10.00","10.45","Químicos","2022-05-23","23","5","2022");
INSERT INTO tb_productos VALUES("278","70208110","30171703","Celosía De Vidrio Nevado De 1 Metro","C/U","43.00","1.30","Minerales No Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("279","70208115","27111721","Operador De Ventana","C/U","1.00","2.50","Herramientas Y Repuestos","2022-02-28","28","2","2022");
INSERT INTO tb_productos VALUES("280","70208119","30111601","Cemento Para Piso Cerámico ,Bolsa De 20 Kilogramos","C/U","38.00","4.30","Minerales No Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("281","70208120","30111601","Cemento Portland, Bolsa De 42.5 Kilogramos","C/U","15.00","10.80","Minerales No Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("282","70208300","30161509","Tabla Roca De Yeso Para Interiores De 1.22 Metros X 2.44 Metros X 1/2\"","C/U","11.00","8.56","Minerales No Metálicos","2022-03-29","29","3","2022");
INSERT INTO tb_productos VALUES("283","70208307","30151703","Poste Metálico Galvanizado De 3.05 Metros Para Tabla Roca","C/U","25.00","1.90","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("284","70208312","31201510","Cinta Para Tabla Roca, Uso Interiores, Rollo","C/U","1.00","2.80","Minerales No Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("285","70208492","30171514","Brazo Hidráulico Tipo Liviano Para Cierre De Puerta","C/U","1.00","24.50","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("286","70208495","30171514","Brazo Hidráulico Para Cierre De Puerta","C/U","8.00","24.50","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("287","70208499","31162801","Chapa Para Gaveta De Escritorio Tipo Paleta","C/U","8.00","3.60","Herramientas Y Repuestos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("288","70208500","31161606","Cerradura Para Gaveta","C/U","30.00","2.00","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("289","70208514","31162801","Chapa Para Puerta , Con Apertura Eléctrica, (Incluye Accesorios)","C/U","1.00","69.00","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("290","70208520","31162801","Chapa De Parche Derecha","C/U","2.00","24.50","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("291","70208521","31162801","Chapa De Parche Izquierda","C/U","1.00","15.95","Minerales Metálicos","2022-05-17","17","5","2022");
INSERT INTO tb_productos VALUES("292","70208522","31162801","Chapa De Pin Derecha","C/U","2.00","29.80","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("293","70208523","31162801","Chapa De Pin Izquierda","C/U","2.00","29.80","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("294","70208527","31162801","Chapa Cilíndrica De Palanca Con Llave","C/U","13.00","22.30","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("295","70208549","46171501","Candado Para Intemperie De 30 Milímetros","C/U","2.00","3.40","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("296","70208554","46171501","Candado Para Intemperie De 60 Mm","C/U","5.00","11.50","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("297","70208581","30161716","Separador Plástico De 1/4\", Para Cerámica","C/U","750.00","0.00","Herramientas Y Repuestos","2022-03-11","11","3","2022");
INSERT INTO tb_productos VALUES("298","70208630","0","Piso De (33 X 33) Cms, Para Tráfico Pesado, Varios Diseños Y Colores","C/U","430.00","1.25","Minerales No Metálicos","2022-05-31","31","5","2022");
INSERT INTO tb_productos VALUES("299","70208750","30161602","Loseta Para Cielo Falso, De Yeso, De (4 X 2) Pies Perno 1/2 X 2\" Con Arandela Plana Y Presión Cabeza Lisa","C/U","198.00","3.40","Minerales No Metálicos","2022-05-30","30","5","2022");
INSERT INTO tb_productos VALUES("300","70209066","31161601","Perno 5 1/16 X 1 1/2\" Rosca Ordinaria","C/U","12.00","0.30","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("301","70209069","31161601","Perno 5/16 X 2\" Rosca Ordinaria","C/U","46.00","0.40","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("302","70209073","31161700","Perno 5/16 X 3/4\" Todo Rosca","C/U","42.00","0.20","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("303","70209280","40173608","Cushing Reductor De 1 1/2 A 1/2 PVC","C/U","6.00","0.55","Herramientas Y Repuestos","2022-05-05","5","5","2022");
INSERT INTO tb_productos VALUES("304","70209283","40173608","Cushing Reductor De 3\" A 1\" PVC","C/U","6.00","4.50","Minerales No Metálicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("305","70209284","40173608","Cushing Reductor De 3\" A 2\" PVC","C/U","24.00","1.70","Herramientas Y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("306","70209286","40175208","Codo PVC De 1 1/2 X 45","C/U","4.00","1.80","Herramientas Y Repuestos","2022-05-05","5","5","2022");
INSERT INTO tb_productos VALUES("307","70209289","40142604","Codo PVC 2 1/2 X 45","C/U","21.00","0.00","Herramientas Y Repuestos","2022-03-03","3","3","2022");
INSERT INTO tb_productos VALUES("308","70209295","40175208","Codo PVC De 3/4 1 Boca Con Rosca","C/U","47.00","0.70","Herramientas Y Repuestos","2022-03-01","1","3","2022");
INSERT INTO tb_productos VALUES("309","70209296","40175208","Codo PVC De 1\" X 90° Con Rosca","C/U","31.00","1.20","Minerales No Metálicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("310","70209297","40175208","Codo PVC De 1 1/2\" X 90° Con Rosca","C/U","13.00","2.10","Minerales No Metálicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("311","70209299","40142115","Tubería De 1 1 /2\" De 125 P.S.I De P.V.C","Mts","5.00","0.80","Herramientas Y Repuestos","2022-03-02","2","3","2022");
INSERT INTO tb_productos VALUES("312","70209328","9999","Camisa De 1 1/4 Galvanizado","C/U","6.00","1.80","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("313","70209331","99999","Codo Galvanizado De 4\" X 90","C/U","2.00","0.00","Minerales Metálicos","2022-03-04","4","3","2022");
INSERT INTO tb_productos VALUES("314","70209385","40142305","Reductor Campana De 1 1/4 A 1\" Galvanizado","C/U","3.00","2.00","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("315","70209388","40142305","Reductor Campana De 2\" A 1\" Galvanizado","C/U","4.00","0.00","Minerales Metálicos","2022-03-04","4","3","2022");
INSERT INTO tb_productos VALUES("316","70209427","40183104","Tapón Macho De 1 1/2","C/U","23.00","1.30","Herramientas Y Repuestos","2022-02-28","28","2","2022");
INSERT INTO tb_productos VALUES("317","70208527","31162801","Chapa Cilíndrica De Palanca Con Llave","C/U","13.00","22.30","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("318","70209519","0","Camisa Galvanizada De 2 1/2\"","C/U","3.00","4.90","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("319","70209654","39121705","Grapa Para Cable 16-2","C/U","85.00","0.10","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("320","70209720","39121602","Dado Térmico De 20 Igual O Compatible Con El Tipo Chb, Marca","C/U","15.00","5.30","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("321","70209721","39121602","Dado Térmico De 30 Amperios, 1 Polo, Igual O Compatible Con El Tipo Chb, Marca Cutler Hammer","C/U","3.00","6.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("322","70209719","39121601","Dado Térmico De 15 Amperios, 1 Polo, Igual O Compatible Con El Tipo Chb, Marca Cutler Hammer 2 1/2\"","C/U","1.00","5.30","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("323","70209616","0","Fusible De 10 Amp 250v","C/U","66.00","0.30","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("324","70209618","0","Fusible De 2 Amp 250v","C/U","22.00","0.20","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("325","70209620","0","Fusible De 3 Amp 250v","C/U","28.00","0.30","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("326","70209622","0","Fusible De 5 Amp 250v","C/U","57.00","0.30","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("327","70209646","0","Fusible 250v 6 A","C/U","1.00","0.80","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("328","70209746","39121602","Dado Térmico De 40 Amperios, 2 Polos, Modelo Bab","C/U","0.00","23.30","Materiales Eléctricos","2022-06-07","7","6","2022");
INSERT INTO tb_productos VALUES("329","70210041","30103605","Tabloncillo De Cedro De 3 Varas","C/U","6.00","33.65","Agropecuarios Y Forestales","2022-03-29","29","3","2022");
INSERT INTO tb_productos VALUES("330","70210087","30103605","Tabla De Cedro De 3 Varas","C/U","12.00","37.11","Agropecuarios Y Forestales","2022-03-29","29","3","2022");
INSERT INTO tb_productos VALUES("331","70210139","30103607","Regla Pacha De Cedro De 4 Varas","C/U","6.00","14.10","Agropecuarios Y Forestales","2022-03-29","29","3","2022");
INSERT INTO tb_productos VALUES("332","70210181","30103601","Cuartón De Cedro De 3 Varas","C/U","15.00","32.80","Agropecuarios Y Forestales","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("333","70210189","30103607","Costanera De Pino De 3.5 Varas","C/U","0.00","14.10","Agropecuarios Y Forestales","2022-03-29","29","3","2022");
INSERT INTO tb_productos VALUES("334","70210211","99999","Costanera De Cedro De 3 Varas","C/U","18.00","16.35","Agropecuarios Y Forestales","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("335","70210280","11122001","Plywood Banack Clase B De 4 Pies X 8 Pies X 3/8\", Pliego","C/U","6.00","33.23","Agropecuarios Y Forestales","2022-03-29","29","3","2022");
INSERT INTO tb_productos VALUES("336","70210283","11122001","Plywood Banack Clase B De 4 Pies X 8 Pies X 3/4\", Pliego","C/U","0.00","65.79","Agropecuarios Y Forestales","2022-03-29","29","3","2022");
INSERT INTO tb_productos VALUES("337","70210289","11122001","Plywood Banack Clase B De 4 Pies X 8 Pies X 1/4\", Pliego","C/U","0.00","25.05","Agropecuarios Y Forestales","2022-03-29","29","3","2022");
INSERT INTO tb_productos VALUES("338","70210292","11122001","Plywood Banack Clase B De 4 Pies X 8 Forestales Pies X 1/2\", Pliego","C/U","5.00","42.05","Agropecuarios Y Forestales","2022-03-29","29","3","2022");
INSERT INTO tb_productos VALUES("339","70210315","30103604","Formica Color Blanco C/U Brillante, Pliego","C/U","0.00","31.95","Agropecuarios Y Forestales","2022-03-25","25","3","2022");
INSERT INTO tb_productos VALUES("340","70210350","31191501","Lija Para Madera No. Pliego","C/U","10.00","0.55","Minerales No Metálicos","2022-03-29","29","3","2022");
INSERT INTO tb_productos VALUES("341","70210356","31191501","Lija Para Madera No.36,Pliego","C/U","27.00","0.49","Minerales No Metálicos","2022-03-29","29","3","2022");
INSERT INTO tb_productos VALUES("342","70210357","31191501","Lija Para Madera No. 50,Pliego","C/U","30.00","0.49","Minerales No Metálicos","2022-03-29","29","3","2022");
INSERT INTO tb_productos VALUES("343","70210359","31191501","Lija Para Madera No. 80,Pliego","C/U","40.00","0.70","Minerales No Metálicos","2022-03-29","29","3","2022");
INSERT INTO tb_productos VALUES("344","70210360","31191501","Lija Para Madera No. 100,Pliego","C/U","92.00","0.65","Minerales No Metálicos","2022-03-29","29","3","2022");
INSERT INTO tb_productos VALUES("345","70210362","31191501","Lija Para Madera No. 150, Pliego","C/U","61.00","0.70","Minerales No Metálicos","2022-03-29","29","3","2022");
INSERT INTO tb_productos VALUES("346","70210363","31191501","Lija Para Madera No. 180, Pliego","C/U","32.00","0.65","Minerales No Metálicos","2022-03-29","29","3","2022");
INSERT INTO tb_productos VALUES("347","70210365","31191501","Lija Para Madera No. 220, Pliego","C/U","10.00","0.25","Minerales No Metálicos","2022-03-29","29","3","2022");
INSERT INTO tb_productos VALUES("348","70210400","31162801","Heladera Cromada De 4\"","C/U","18.00","0.10","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("349","70210500","31201610","Pegamento Para Madera","Galón","14.05","14.00","Químicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("350","70211000","30181506","Urinario Color Blanco Completo Estándar","C/U","1.00","115.00","Herramientas Y Repuestos","2022-03-29","29","3","2022");
INSERT INTO tb_productos VALUES("351","70211005","30181505","Sanitario Color Blanco Completo Standard","C/U","3.00","52.40","Herramientas Y Repuestos","2022-03-29","29","3","2022");
INSERT INTO tb_productos VALUES("352","70211017","30181809","Sifón Al Piso Roscado De 1 1/2 P/Fregadero De P.V.C.","C/U","18.00","3.50","Herramientas Y Repuestos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("353","70211037","40141613","Válvula, Tipo Compuerta, Bronce,125 Psi, Diámetro 2\"","C/U","6.00","95.50","Minerales Metálicos","2022-03-08","8","3","2022");
INSERT INTO tb_productos VALUES("354","70211041","40141643","Válvula Check Horizontal 1 / 2\"","C/U","1.00","43.00","Minerales Metálicos","2022-03-09","9","3","2022");
INSERT INTO tb_productos VALUES("355","70211049","30181810","Válvula Para Ducha De 1 /2\"","C/U","29.00","11.40","Herramientas Y Repuestos","2022-02-28","28","2","2022");
INSERT INTO tb_productos VALUES("356","70211050","40141609","Válvula De Control Cromada De 1 /2\" Al Piso","C/U","36.00","2.75","Herramientas Y Repuestos","2022-05-05","5","5","2022");
INSERT INTO tb_productos VALUES("357","70211051","40141609","Válvula De Control Cromada De 1 / 2\"A La Pared","C/U","88.00","2.50","Herramientas Y Repuestos","2022-02-22","22","2","2022");
INSERT INTO tb_productos VALUES("358","70211063","30181810","Manecilla Para Válvula Para Ducha","C/U","32.00","1.90","Herramientas Y Repuestos","2022-03-02","2","3","2022");
INSERT INTO tb_productos VALUES("359","70211064","30181809","Manecilla Cromada Para Servicio Sanitario","C/U","74.00","0.94","Herramientas Y Repuestos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("360","70211066","30181603","Asiento Plástico Color Blanco Para Sanitario Standard","C/U","11.00","4.40","Herramientas Y Repuestos","2022-02-28","28","2","2022");
INSERT INTO tb_productos VALUES("361","70211071","40142020","Tubo De Abasto De Acero Inoxidable Para Sanitario","C/U","63.00","2.60","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("362","70211109","40142604","Codo Liso De 4\" X 90","C/U","12.00","5.60","Herramientas Y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("363","70211073","40142020","Tubo De Abasto De Acero Inoxidable Para Lavamanos","C/U","10.00","2.60","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("364","70211074","30181804","Llave De 1 /2\" Con Rosca Para Manguera","C/U","28.00","5.00","Herramientas Y Repuestos","2022-05-18","18","5","2022");
INSERT INTO tb_productos VALUES("365","70211076","30181804","Llave De 1/2\" Cromado Para Lavamanos 1a Calidad","C/U","21.00","6.00","Minerales Metálicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("366","70211078","30181804","Llave Cuello De Ganso Al Piso Para Fregadero","C/U","63.00","13.50","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("367","70211087","30181809","Sifón Horizontal De 1 1/4\" P.V.C","C/U","10.00","3.30","Herramientas Y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("368","70211089","4014719","Adaptador Macho De 3\" De P.V.C.","C/U","27.00","2.00","Herramientas Y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("369","70211091","40141719","Adaptador Macho De 3 /4\" P. V. C","C/U","83.00","0.10","Herramientas Y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("370","70211092","40141719","Adaptador Macho De 1\" De P.V.C","C/U","217.00","0.30","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("371","70211093","40141719","Adaptador Macho De 1.1 / 4\" De P.V.C","C/U","53.00","0.40","Herramientas Y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("372","70211094","40141719","Adaptador Macho De 1. 1 / 2\" De P.V.C","C/U","146.00","0.60","Herramientas Y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("373","70211095","40141719","Adaptador Macho De PVC 2\"","C/U","41.00","3.00","Minerales No Metálicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("374","70211096","40141719","Adaptador Macho PVC 2-1/2\"","C/U","28.00","1.90","Herramientas Y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("375","70211097","40141719","Adaptador Hembra De 1/2\" De P.V.C","C/U","55.00","0.20","Herramientas Y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("376","70211098","40141719","Adaptador Macho PVC 4\"","C/U","22.00","2.80","Herramientas Y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("377","70211099","40141719","Adaptador Hembra De 1\" De P.V.C","C/U","66.00","0.90","Herramientas Y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("378","70211100","40141719","Adaptador Hembra De 1. 1 / 4\" De P.V.C","C/U","47.00","0.40","Herramientas Y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("379","70211101","40141719","Adaptador Hembra De 1. 1 / 2\" De P.V.C","C/U","38.00","0.51","Herramientas Y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("380","70211102","40141719","Adaptador Hembra Liso De 1\" P.V.C.","C/U","12.00","0.27","Herramientas Y Repuestos","2022-03-29","29","3","2022");
INSERT INTO tb_productos VALUES("381","70211103","40141751","Codo Liso De 1\" De P.V.C","C/U","41.00","0.30","Herramientas Y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("382","70211104","40141751","Codo Liso De 2\" X 90 De P.V.C.","C/U","23.00","0.90","Herramientas Y Repuestos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("383","70211105","40141751","Codo Liso De 1 /2\" X 90 De P.V.C","C/U","226.00","0.10","Herramientas Y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("384","70211106","40141751","Codo Liso De 3 /4\" X 90 P.V.C","C/U","82.00","0.20","Herramientas Y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("385","70211107","40141751","Codo De 1 1/4\" X 90 P.V.C","C/U","20.00","0.50","Herramientas Y Repuestos","2022-02-28","28","2","2022");
INSERT INTO tb_productos VALUES("386","70211108","40142604","Codo Liso De 3\" X 90 PVC","C/U","15.00","3.40","Herramientas Y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("387","70211109","40142604","Codo Liso De 4\" X 90 P.V.C","C/U","12.00","5.60","Herramientas Y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("388","70211115","40173608","Reductor De 3 / 4\" A 1 / 2\" De P.V.C","C/U","35.00","0.10","Herramientas Y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("389","70211116","40173608","Reductor De 1\" A 3 / 4\" De P.V.C","C/U","60.00","0.20","Herramientas Y Repuestos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("390","70211117","40173608","Reductor De 1 1/2 A 1\" De P.V.C","C/U","50.00","0.40","Herramientas Y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("391","70211118","40173608","Reductor De 1 1/4 A 3/4 De P.V.C","C/U","49.00","0.30","Herramientas Y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("392","70211119","40173608","Reductor De 1\" A 1 / 2\" De P.V.C","C/U","99.00","0.70","Herramientas Y Repuestos","2022-03-08","8","3","2022");
INSERT INTO tb_productos VALUES("393","70211120","40173608","Reductor De 1 1/2\" A 3/4\" De P.V.C","C/U","11.00","0.80","Minerales No Metálicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("394","70211122","40142615","Reductor De 2\" A 1/2\" De P.V.C","C/U","16.00","1.10","Minerales No Metálicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("395","70211124","40173608","Reductor De 1 1/2 A 1 1/4\" De P.V.C","C/U","51.00","0.40","Herramientas Y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("396","70211125","40142615","Reductor De 2\" A 1\" De P.V.C","C/U","94.00","0.80","Herramientas Y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("397","70211126","40142615","Reductor De 2\" A 1 1/2\" De P.V.C","C/U","25.00","1.20","Minerales No Metálicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("398","70211127","40142615","Reductor De 2\" A 1 1/4\" De P.V.C.","C/U","66.00","0.70","Herramientas Y Repuestos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("399","70211128","40142615","Reductor De 2 1/2\" A 2\" De P.V.C","C/U","70.00","4.70","Herramientas Y Repuestos","2022-03-03","3","3","2022");
INSERT INTO tb_productos VALUES("400","70211130","40173608","Té De 1/2\" De PVC","C/U","18.00","0.20","Herramientas Y Repuestos","2022-02-28","28","2","2022");
INSERT INTO tb_productos VALUES("401","70211132","40173608","Tee De 1\" De P.V.C","C/U","21.00","2.80","Herramientas Y Repuestos","2022-03-08","8","3","2022");
INSERT INTO tb_productos VALUES("402","70211133","40173608","Tee De 1 .1/ 4\" De P.V.C","C/U","29.00","1.50","Minerales No Metálicos","2022-03-01","1","3","2022");
INSERT INTO tb_productos VALUES("403","70211134","40173608","Tee De 1 .1/ 2\" De P.V.C","C/U","166.00","1.50","Herramientas Y Repuestos","2022-03-01","1","3","2022");
INSERT INTO tb_productos VALUES("404","70211135","40173608","Tee De 2\" De P.V.C","C/U","11.00","2.40","Herramientas Y Repuestos","2022-03-11","11","3","2022");
INSERT INTO tb_productos VALUES("405","70211138","40142605","Tee De 3\" De P.V.C C/U","C/U","22.00","4.50","Herramientas Y Repuestos","2022-02-28","28","2","2022");
INSERT INTO tb_productos VALUES("406","70211140","40183103","Camisa De 1 /2\" P.V.C","C/U","23.00","0.10","Herramientas Y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("407","70211143","40183103","Camisa De 1 .1 / 4\" P.V.C","C/U","34.00","0.30","Herramientas Y Repuestos","2022-02-28","28","2","2022");
INSERT INTO tb_productos VALUES("408","70211144","40183103","Camisa De 1 .1 / 2\" P.V.C","C/U","1.00","0.80","Herramientas Y Repuestos","2022-03-03","3","3","2022");
INSERT INTO tb_productos VALUES("409","70211145","40183103","Camisa De 2\" P.V.C","C/U","28.00","1.20","Herramientas Y Repuestos","2022-03-01","1","3","2022");
INSERT INTO tb_productos VALUES("410","70211146","40183103","Camisa De 3\" P.V.C","C/U","10.00","1.80","Herramientas Y Repuestos","2022-02-28","28","2","2022");
INSERT INTO tb_productos VALUES("411","70211147","40141751","Codo Liso De 2 1/2\" De P.V.C.","C/U","88.00","0.00","Herramientas Y Repuestos","2022-03-03","3","3","2022");
INSERT INTO tb_productos VALUES("412","70211148","40141751","Codo Liso De 1 1/2\" De P.V.C.","C/U","55.00","0.60","Herramientas Y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("413","70211149","40142604","Codo Mixto De 1/2\", PVC","C/U","146.00","0.20","Herramientas Y Repuestos","2022-02-28","28","2","2022");
INSERT INTO tb_productos VALUES("414","70211150","40171617","Tubería De 1 /2\" De 315 P. S. I De P.V.C","Mts","204.00","0.30","Herramientas Y Repuestos","2022-03-01","1","3","2022");
INSERT INTO tb_productos VALUES("415","70211151","40171617","Tubería De 3 /4\" De 250 P.S.I De P.V.C","Mts","132.00","0.50","Herramientas Y Repuestos","2022-03-01","1","3","2022");
INSERT INTO tb_productos VALUES("416","70211152","40171617","Tubería De 1\" De 250 P.S.I. De P.V.C","Mts","246.00","0.70","Herramientas Y Repuestos","2022-03-01","1","3","2022");
INSERT INTO tb_productos VALUES("417","70211155","40171617","Tubería De 2\" De 160 P.S.I. De P.V.C","Mts","310.00","1.50","Herramientas Y Repuestos","2022-03-01","1","3","2022");
INSERT INTO tb_productos VALUES("418","70211161","40171617","Tubería De 4\" De 160 P.S.I De P.V.C","Mts","48.00","6.70","Herramientas Y Repuestos","2022-02-28","28","2","2022");
INSERT INTO tb_productos VALUES("419","70211163","40171617","Tubería De 6\" De 125 P.S.I De P.V.C","Mts","2.00","21.70","Herramientas Y Repuestos","2022-03-08","8","3","2022");
INSERT INTO tb_productos VALUES("420","70211166","40171617","Tubería De 1 .1 /4\" 160 P.S.I De P.V.C","Mts","258.00","0.70","Herramientas Y Repuestos","2022-03-01","1","3","2022");
INSERT INTO tb_productos VALUES("421","70211174","40141751","Codo Curva De 3\" X 90 P.V.C.","C/U","7.00","1.80","Herramientas Y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("422","70211177","40183103","Unión Universal De 3\" PVC","C/U","24.00","1.36","Herramientas Y Repuestos","2022-03-03","3","3","2022");
INSERT INTO tb_productos VALUES("423","70211179","40183103","Unión Universal De 1 1/4\" De P.V.C.","C/U","20.00","5.10","Herramientas Y Repuestos","2022-03-08","8","3","2022");
INSERT INTO tb_productos VALUES("424","70211197","40141719","Adaptador Hembra De 1/2\" De P.V.C","C/U","53.00","0.20","Herramientas Y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("425","70211220","39121452","Unión Universal De Hierro Galvanizado, Diámetro 1/2\"","C/U","31.00","2.80","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("426","70211221","39121452","Unión Universal De Hierro Galvanizado, Diámetro 3/4\"","C/U","20.00","3.30","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("427","70211222","39121452","Unión Universal De Hierro Galvanizado, Diámetro 1\"","C/U","6.00","4.90","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("428","70211223","39121452","Unión Universal De Hierro Galvanizado, Diámetro 1.1/4\"","C/U","1.00","5.00","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("429","70211224","39121452","Unión Universal De Hierro Galvanizado, Diámetro 1.1/2\"","C/U","5.00","5.40","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("430","70211225","39121452","Unión Universal De Hierro Galvanizado, Diámetro 2\"","C/U","1.00","0.00","Minerales Metálicos","2022-03-03","3","3","2022");
INSERT INTO tb_productos VALUES("431","70211227","9999","Camisa Galvanizada, Diámetro 3\"","C/U","3.00","8.00","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("432","70211229","9999","Camisa Galvanizada, Diámetro 1/2\"","C/U","13.00","0.60","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("433","70211230","40142609","Codo De Hierro Galvanizado, 90º, Diámetro 1/2\"","C/U","198.00","0.80","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("434","70211231","40142317","Codo De Hierro Galvanizado, 90º, Diámetro 3/4\"","C/U","21.00","1.10","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("435","70211232","40142317","Codo De Hierro Galvanizado, 90º, Diámetro 1\"","C/U","21.00","2.00","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("436","70211233","40142317","Codo De Hierro Galvanizado, 90º,Diametro 1.1/4\"","C/U","18.00","2.60","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("437","70211235","40142317","Codo De Hierro Galvanizado, 90º, Diámetro 2\"","C/U","3.00","4.80","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("438","70211241","40142315","Tee De Hierro Galvanizado, Diámetro 3/4\"","C/U","19.00","1.40","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("439","70211242","40142315","Tee De Hierro Galvanizado ,Diámetro De 1\"","C/U","3.00","2.40","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("440","70211251","72154119","Niple De Hierro Galvanizado, De 3/4\" X 4\"","C/U","8.00","1.90","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("441","70211254","72154119","Niple De Hierro Galvanizado, De 1.1/2\" X 4\"","C/U","5.00","2.60","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("442","70211255","72154119","Niple De Hierro Galvanizado, De 2\" X 4\"","C/U","8.00","4.80","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("443","70211260","40171527","Caño Galvanizado, De 1/2\", Tipo Mediano, Cedula 30","Mts","12.00","4.00","Minerales Metálicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("444","70211261","40171527","Caño Galvanizado, De 3/4\", Tipo Mediano, Cedula 30","Mts","18.00","4.60","Minerales Metálicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("445","70211262","40171527","Caño Galvanizado, De 1\", Tipo Mediano, Cedula 30","Mts","24.00","12.20","Minerales Metálicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("446","70211264","40141705","Caño Galvanizado, De 1-1/2\", Tipo Mediano, Cedula 30","Mts","24.00","14.90","Minerales Metálicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("447","70211280","40142305","Bushing Reductor De Hierro Galvanizado De 1\" A 1/2\"","C/U","4.00","0.80","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("448","70211283","40142305","Bushing Reductor De Hierro Galvanizado De 3/4\" A 1/2\"","C/U","27.00","0.60","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("449","70211287","72154119","Niple De Hierro Galvanizado Todo Rosca De 1/2\" X 1\"","C/U","0.00","0.40","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("450","70211288","72154119","Niple De Hierro Galvanizado Todo Rosca De 1/2\" X 2\"","C/U","3.00","0.70","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("451","70211297","40142313","Tapón Hembra De 1/2\" Galvanizado","C/U","15.00","0.60","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("452","70211298","40142313","Tapón Hembra De 3/4\" Galvanizado","C/U","10.00","0.80","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("453","70211300","31201514","Cinta Teflón","C/U","378.00","0.30","Químicos","2022-03-07","7","3","2022");
INSERT INTO tb_productos VALUES("454","70211303","40183104","Tapón Macho De 1/2\" Galvanizado","C/U","4.00","1.10","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("455","70211304","40183104","Tapón Macho De 3/4\" Galvanizado","C/U","10.00","1.60","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("456","70211305","40183104","Tapón Macho De 1\" Galvanizado","C/U","2.00","0.50","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("457","70211309","31201610","Pegamento Para P.V.C,","C/U","10.00","9.00","Químicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("458","70211400","40141703","Ducha Para Baño","C/U","5.00","3.30","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("459","70211423","40142008","Manguera Plástica De 1/2\" X 100 Pies Reforzada Con Hilo De Nylon Con Terminales Macho Y Hembra","C/U","1.00","16.30","Herramientas Y Repuestos","2022-02-28","28","2","2022");
INSERT INTO tb_productos VALUES("460","70211321","72154119","1 /8 De Galón Niple De Hierro Galvanizado De 3/4\" X 3\"","C/U","5.00","0.70","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("461","70211337","40142305","Reductor Campana De Hierro Galvanizado 1\" A 1/2\"","C/U","4.00","1.10","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("462","70211346","9999","Camisa De Hierro Galvanizado De 3/4\"","C/U","26.00","0.90","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("463","70211347","9999","Camisa De Hierro Galvanizado De 1\"","C/U","18.00","1.30","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("464","70211348","40141719","Camisa De Hierro Galvanizado De 1 1/2\"","C/U","6.00","2.20","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("465","70211349","40141719","Camisa De Hierro Galvanizado De 2\"","C/U","13.00","3.70","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("466","70211385","40171611","Válvula Tipo Globo De PP. De 1/2\"","C/U","23.00","3.25","Herramientas Y Repuestos","2022-03-01","1","3","2022");
INSERT INTO tb_productos VALUES("467","70211390","30181804","Grifo De Pedal Horizontal, Cuerpo Y Palanca De Acero Inoxidable Cromado","C/U","5.00","85.00","Minerales Metálicos","2022-03-01","1","3","2022");
INSERT INTO tb_productos VALUES("468","70211395","30181804","Llave De 3/4\" Con Rosca Para Manguera","C/U","52.00","4.40","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("469","70211427","40142002","Manguera Plástica Transparente De 3/8\"","C/U","4.00","1.50","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("470","70211428","40142002","Manguera Plástica Transparente De 3/4\"","C/U","5.00","0.90","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("471","70211430","40183104","Tapón Macho Con Rosca PVC 1/2\"","C/U","612.00","0.60","Minerales No Metálicos","2022-03-01","1","3","2022");
INSERT INTO tb_productos VALUES("472","70211435","40183104","Tapón Macho Con Rosca PVC 3/4\"","C/U","38.00","0.70","Minerales No Metálicos","2022-03-01","1","3","2022");
INSERT INTO tb_productos VALUES("473","70211440","40183104","Tapón Macho Con Rosca PVC 1\"","C/U","113.00","0.84","Minerales No Metálicos","2022-03-01","1","3","2022");
INSERT INTO tb_productos VALUES("474","70211453","40183104","Tapón Hembra Liso PVC 1/2\"","C/U","104.00","0.05","Herramientas Y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("475","70211454","40183104","Tapón Hembra Liso PVC 3/4\"","C/U","101.00","0.70","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("476","70211455","40183104","Tapón Hembra Liso PVC 1\"","C/U","123.00","0.40","Minerales No Metálicos","2022-03-01","1","3","2022");
INSERT INTO tb_productos VALUES("477","70211456","40183104","Tapón Hembra Liso PVC 1 1/2\"","C/U","31.00","0.30","Herramientas Y Repuestos","2022-02-28","28","2","2022");
INSERT INTO tb_productos VALUES("478","70211457","40183104","Tapón Hembra Liso PVC 1 1/4\"","C/U","20.00","0.50","Minerales No Metálicos","2022-03-01","1","3","2022");
INSERT INTO tb_productos VALUES("479","70211458","40183104","Tapón Hembra Liso PVC 2\"","C/U","19.00","1.20","Minerales No Metálicos","2022-03-01","1","3","2022");
INSERT INTO tb_productos VALUES("480","70211460","40183104","Tapón Hembra Liso PVC 3\"","C/U","29.00","6.40","Herramientas Y Repuestos","2022-03-08","8","3","2022");
INSERT INTO tb_productos VALUES("481","70211468","40183104","Tapón Hembra Liso PVC 4\"","C/U","33.00","3.20","Herramientas Y Repuestos","2022-02-28","28","2","2022");
INSERT INTO tb_productos VALUES("482","70211472","40141719","Adaptador Hembra De PVC De 3/4\"","C/U","4.00","0.30","Herramientas Y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("483","70211475","40142612","Adaptador Hembra De PVC De 2\"","C/U","98.00","0.70","Herramientas Y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("484","70211481","30181809","Sifón Continuo PVC De 1 1/2\"","C/U","8.00","4.30","Herramientas Y Repuestos","2022-03-09","9","3","2022");
INSERT INTO tb_productos VALUES("485","70211483","30181809","Sifón Continuo PVC De 2\"","C/U","8.00","4.50","Herramientas Y Repuestos","2022-03-09","9","3","2022");
INSERT INTO tb_productos VALUES("486","70211484","30181809","70211484sifon Flexible Tipo Acordeón De 1 1/4\" PVC","C/U","25.00","4.00","Herramientas Y Repuestos","2022-03-11","11","3","2022");
INSERT INTO tb_productos VALUES("487","70211487","40141716","Sifón A La Pared Plástico Cromado De 1 1/2\"","C/U","19.00","2.20","Herramientas Y Repuestos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("488","70211534","40142615","Reductor De 2 1/2\" A 1\" De P.V.C.","C/U","10.00","1.30","Herramientas Y Repuestos","2022-03-08","8","3","2022");
INSERT INTO tb_productos VALUES("489","70211538","40173608","Reductor De 1 1/2 A 1/2 P.V.C","C/U","23.00","0.80","Herramientas Y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("490","70211539","40173608","Reductor De 1 1/4 A 1/2 P.V.C","C/U","32.00","0.60","Minerales No Metálicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("491","70211540","40173608","Reductor De 1 1/4\" A 1\" De P.V.C.","C/U","46.00","0.70","Minerales No Metálicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("492","70211541","40173608","Reductor De 2\" A 3/4\" De P.V.C","C/U","17.00","0.70","Herramientas Y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("493","70211542","40173608","Reductor De 3\" A 1 1/2\" De P.V.C","C/U","6.00","0.00","Herramientas Y Repuestos","2022-03-03","3","3","2022");
INSERT INTO tb_productos VALUES("494","70211543","40142615","Reductor De 3\" A 2 1/2\" De P.V.C","C/U","19.00","5.00","Minerales No Metálicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("495","70211544","40142615","Reductor De 4\" A 2\" De P.V.C","C/U","7.00","6.50","Minerales No Metálicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("496","70211545","40142615","Reductor De 4\" A 2 1/2\" De P.V.C.","C/U","6.00","8.50","Minerales No Metálicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("497","70211546","40142615","Reductor De 4\" A 3\" De P.V.C","C/U","23.00","6.90","Minerales No Metálicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("498","70211625","40142605","Tee De 2 1/2\" De P.V.C","C/U","16.00","4.90","Herramientas Y Repuestos","2022-02-28","28","2","2022");
INSERT INTO tb_productos VALUES("499","70211627","40142020","Tubo De Abasto De Nylon Para Lavamanos De 3/8\" X 1/2\" X 16\"","C/U","45.00","3.50","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("500","70211647","40142020","Tubo De Abasto De Nylon Para Servicio Sanitario De 3/8\" X 7/8\" X 20\"","C/U","57.00","2.70","Herramientas Y Repuestos","2022-03-11","11","3","2022");
INSERT INTO tb_productos VALUES("501","70211808","40171719","Adaptador Macho PVC De 1/2\"","C/U","165.00","0.20","Herramientas Y Repuestos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("502","70211890","9999","Camisa De 2 1 / 2\" P.V.C","C/U","13.00","0.00","Herramientas Y Repuestos","2022-03-03","3","3","2022");
INSERT INTO tb_productos VALUES("503","70211894","40142610","Camisa De 4\" P.V.C","C/U","56.00","0.00","Herramientas Y Repuestos","2022-03-03","3","3","2022");
INSERT INTO tb_productos VALUES("504","70211900","30181809","Kit De Accesorios Para Servicio Sanitario Standard.","C/U","22.00","5.70","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("505","70212004","39121313","Cinchos Plásticos, Diferentes Medidas, Juego","C/U","14.00","7.30","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("506","70212015","31162002","Clavo Robot De 1\"","C/U","172.00","0.20","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("507","70212019","31162002","Clavo Corriente De 3/4\" Con Cabeza","Lb","25.00","2.00","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("508","70212020","31162002","Clavo Corriente De 1\" Con Cabeza","Lb","10.50","2.00","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("509","70212021","31162002","Clavo Corriente De 1 1/2\" Con Cabeza","Lb","19.00","1.90","Minerales Metálicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("510","70212023","31162002","Clavo Corriente De 2\" Con Cabeza","Lb","13.00","1.30","Minerales Metálicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("511","70212024","31162002","Clavo Corriente De 21/2\" Con Cabeza","Lb","34.00","0.40","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("512","70212027","31162002","Clavo Corriente De 4\" Con Cabeza","Lb","14.00","0.50","Minerales Metálicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("514","70212034","31162003","Clavo De Acero De 3/4\"","C/U","116.00","0.10","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("515","70212035","31162003","Clavo De Acero De 1\"","C/U","423.00","0.00","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("516","70212038","31162003","Clavo De Acero De 2\"","C/U","125.00","0.00","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("517","70212039","31162003","Clavo De Acero De 2 1/2\"","C/U","188.00","0.00","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("518","70212040","31162003","Clavo De Acero De 3\"","C/U","168.00","0.10","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("519","70212042","31162003","Clavo De Acero De 4\"","C/U","73.00","0.10","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("520","70212044","31162003","Clavo Corriente De 3/4\" Sin Cabeza","Lb","4.00","2.00","Minerales Metálicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("521","70212045","31162003","Clavo Corriente De 1\" Sin Cabeza","Lb","43.00","2.00","Minerales Metálicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("522","70212047","31162003","Clavo Corriente De 1 1/2\" Sin Cabeza","Lb","31.00","2.00","Minerales Metálicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("523","70212048","31162003","Clavo Corriente De 2\" Sin Cabeza","Lb","5.00","2.00","Minerales Metálicos","2022-03-07","7","3","2022");
INSERT INTO tb_productos VALUES("524","70212065","30101503","Hierro Angulo De 1\" X 1\" X 1/8\" Bajo Norma","Mts","132.00","1.80","Minerales Metálicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("525","70212070","30101503","Hierro Angulo De 1-1/2\" X 1-1/2\"X 1/8\" Bajo Norma","Mts","36.00","2.65","Minerales Metálicos","2022-05-18","18","5","2022");
INSERT INTO tb_productos VALUES("526","70212072","30101503","Hierro Angulo De 2\" X 2\" X 1/8\" Bajo Norma","Mts","9.00","3.20","Minerales Metálicos","2022-02-28","28","2","2022");
INSERT INTO tb_productos VALUES("527","70212073","30101503","Angulo De 2\" X 2\" X 3/16\" Bajo Norma","Mts","2.00","7.10","Materiales Eléctricos","2022-03-08","8","3","2022");
INSERT INTO tb_productos VALUES("528","70212075","30101503","Hierro Angulo De 1 1/2\" X 1 1/2\" X 3 /16\", Bajo Norma","Mts","4.00","4.60","Minerales Metálicos","2022-02-28","28","2","2022");
INSERT INTO tb_productos VALUES("529","70212078","30102003","Pletina De Hierro, 1\" X 1/8\", Pieza De 6 Metros","Mts","96.00","1.90","Minerales Metálicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("530","70212080","30102003","Pletina De Hierro, 1 1/2\" X 1/8\", Pieza De 6 Metros","Mts","60.00","1.30","Minerales Metálicos","2022-02-28","28","2","2022");
INSERT INTO tb_productos VALUES("531","70212088","30102403","Hierro Cuadrado De 3/8\"","Mts","18.00","1.20","Minerales Metálicos","2022-03-11","11","3","2022");
INSERT INTO tb_productos VALUES("532","70212089","30102403","Hierro Cuadrado De 1/2\"","Mts","33.00","0.90","Minerales Metálicos","2022-03-01","1","3","2022");
INSERT INTO tb_productos VALUES("533","70212095","30102403","Hierro Liso De 3/4\"","Mts","8.00","2.90","Minerales Metálicos","2022-02-28","28","2","2022");
INSERT INTO tb_productos VALUES("534","70212097","30102403","Hierro Liso De 3/8\"","Mts","9.00","0.80","Minerales Metálicos","2022-03-08","8","3","2022");
INSERT INTO tb_productos VALUES("535","70212385","31161601","Perno Todo Rosca De 1/4\" X 1\" Con Arandela Plana Y Tuerca","C/U","47.00","0.20","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("536","70212388","31161601","Perno Todo Rosca De 1/4\" X 3\" Con Arandela Plana Y Tuerca","C/U","17.00","0.60","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("537","70212396","31162202","Remache Pop De 3/16\" X 5/8\"","C/U","500.00","0.01","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("538","70212408","31162202","Remache Pop De 5/32\" X 1/2\"","Cto","9.00","1.00","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("539","70212413","31162103","Ancla Plástica De 3/8\"","C/U","818.00","0.00","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("540","70212414","31162103","Ancla Plástica De 5/16\"","C/U","851.00","0.00","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("541","70212415","31162103","Ancla Plástica De 1/4\"","C/U","191.00","0.00","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("542","70212423","31161509","Tornillo Para Tablaroca De 1/2\"","Cto","0.00","2.00","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("543","70212424","31161509","Tornillo Para Tablaroca De 1\"","C/U","1.00","0.01","Minerales Metálicos","2022-05-18","18","5","2022");
INSERT INTO tb_productos VALUES("544","70212425","31161509","Tornillo Para Tablaroca De 2\"","C/U","348.00","0.03","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("545","70212426","31161509","Tornillo Para Tablaroca De 1 1/2\"","C/U","1.00","0.02","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("546","70212440","31161512","Tornillo Punta Broca De 1\"","C/U","1.00","0.02","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("547","70212442","31161512","Tornillo Punta Broca De 1 1/2\"","Cto","42.00","1.70","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("548","70212443","31161512","Tornillo Punta Broca De 1 1/4\"","C/U","600.00","0.10","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("549","70212444","31161512","Tornillo Punta Broca De 2\"","C/U","0.00","0.00","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("550","70212453","1162702","Rodo De 8\" Con Base Giratorio","C/U","4.00","15.00","Herramientas Y Repuestos","2022-05-23","23","5","2022");
INSERT INTO tb_productos VALUES("551","70212454","31162702","Rodo De 8\" Con Base Fija","C/U","10.00","15.00","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("552","70212455","31162702","Rodo De 6\" Con Base Giratorio","C/U","8.00","21.40","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("553","70212456","31162702","Rodo De 6\" Con Base Fija","C/U","16.00","18.50","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("554","70212457","31162702","Rodo De 4\" Con Base Giratoria De 3\" X 4\"","C/U","109.00","9.30","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("555","70212458","31162702","Rodo De 4\" Con Base Fija De 3\" X 4\"","C/U","56.00","6.40","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("556","70212460","31161507","Tornillo Goloso De 3/4\"","C/U","70.00","0.10","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("557","70212463","31161507","Tornillo Goloso De 2\"","C/U","324.00","0.20","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("558","70212465","31162702","Rodo Tipo Yoyo De 2\" Espiga Lisa","C/U","75.00","7.00","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("559","70212483","31161507","Tornillo Goloso De 1\" X 10 Mm","C/U","942.00","0.03","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("560","70212484","31161507","Tornillo Goloso De 1 1/2\" X 10 Mm","C/U","978.00","0.03","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("561","70212499","30102403","Varilla Roscada De 1/4\"","C/U","10.00","3.30","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("562","70212500","30102403","Varilla Roscada De 3/8\"","C/U","5.00","0.80","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("563","70212501","30102403","Varilla Roscada De 1/2\"","C/U","15.00","13.50","Minerales Metálicos","2022-03-02","2","3","2022");
INSERT INTO tb_productos VALUES("564","70212510","31161601","Perno Ancla 3/8\" X 2\"","C/U","83.00","1.20","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("565","70212535","31161601","Perno De 5/16\" X 1\" Con Tuerca","C/U","25.00","0.30","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("566","70212538","40171606","Tubo Cuadrado Industrial De 1/2\"","Mts","222.00","0.40","Minerales Metálicos","2022-03-01","1","3","2022");
INSERT INTO tb_productos VALUES("567","70212539","40171606","Tubo Cuadrado Industrial De 3/4\"","Mts","120.00","0.80","Minerales Metálicos","2022-02-28","28","2","2022");
INSERT INTO tb_productos VALUES("568","70212540","40171606","Tubo Cuadrado Industrial De 1\"","Mts","96.00","1.20","Minerales Metálicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("569","70212560","40171606","Tubo Cuadrado Estructural De 1 1/2\" Chapa 16","Mts","78.00","2.90","Minerales Metálicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("570","70212569","40171606","Tubo Cuadrado Estructural De 2\" Chapa 14","Mts","78.00","5.00","Minerales Metálicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("571","70212610","31162403","Bisagra Corriente De 1\"","C/U","55.00","0.10","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("572","70212612","31162403","Bisagra Corriente De 3\"","C/U","145.00","0.60","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("573","70212613","31162403","Bisagra Corriente De 3\"","Par","3.00","0.60","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("574","70212617","31162403","Bisagra Corriente De 4\"","C/U","39.00","1.50","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("575","70212620","31262403","Bisagra Alcayate De 3\" X 3\"","C/U","9.00","6.00","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("576","70212633","31191602","Disco Para Corte De Metal De 4 1/2\" X 1/8\" X 7/8\"","C/U","46.00","0.65","Herramientas Y Repuestos","2022-03-30","30","3","2022");
INSERT INTO tb_productos VALUES("577","70212635","31191602","Disco Para Corte De Metal De 9\" X 1/8\" X 7/8\"","C/U","48.00","1.73","Herramientas Y Repuestos","2022-05-17","17","5","2022");
INSERT INTO tb_productos VALUES("578","70212636","31191602","Disco Para Corte De Metal De 9\" X 1/4\" X 7/8\"","C/U","20.00","2.20","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("579","70212643","31191603","Disco Para Corte De Concreto De 4«\" X 1/8\" X 7/8\"","C/U","17.00","0.80","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("580","70212645","31191603","Disco Para Corte De Concreto De 9\" X 1/8\" X 7/8\"","C/U","25.00","4.00","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("581","70212647","31191603","Disco Para Corte De Metal De 4 1/2\" X 3/32\" X ??","C/U","11.00","1.60","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("582","70212648","31191602","Disco Para Esmerilar Metal De 4 1/2\" X 1/4\" X 7/8\"","C/U","14.00","1.60","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("583","70212651","23131503","Disco Para Esmerilar Metal De 9\" X 1/4\" X 7/8\"","C/U","35.00","8.90","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("584","70212654","31191510","Piedra Combinada Para Afilar De 8\"","C/U","3.00","3.30","Equipo Y Herramientas De Mantto","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("585","70212655","27112801","Broca Para Madera De 1/4\", 1/2\", 3/4\", 1\" Juego","C/U","1.00","7.50","Equipo Y Herramientas De Mantto","2022-05-17","17","5","2022");
INSERT INTO tb_productos VALUES("586","70212688","31191602","Disco Diamantado Segmentado Para Corte De Concreto 4 1/2\" X 1/8\" X 7/8\"","C/U","0.00","0.65","Herramientas Y Repuestos","2022-03-30","30","3","2022");
INSERT INTO tb_productos VALUES("587","70212694","0","Piedra Para Esmeril De 6\" X 1\", Grano 40","C/U","1.00","1.50","Equipo Y Herramientas De Mantto","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("588","70212707","31162202","Remache Pop De 3/16\" X 3/4\"","C/U","500.00","3.00","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("589","70212708","31162202","Remache Pop De 3/16\" X 1/2\"","C/U","1.00","0.02","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("590","70212709","31162202","Remache Pop, De 1/8\" X 1/2\"","C/U","550.00","0.02","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("591","70212712","31162202","Remache Pop, De 3/16\" X 1/4\"","Cto","19.00","3.10","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("592","70212716","27112802","Hoja De Sierra Para Hierro Diente Fino","C/U","58.00","2.20","Equipo Y Herramientas De Mantto","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("593","70212727","31162417","Pasador Metálico De 2 1/2\"","C/U","0.00","3.50","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("594","70212729","31162407","Pasador Metálico De 4\"","C/U","20.00","1.30","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("595","70212735","27112802","Hoja De Sierra De Reciprocante Para Madera","C/U","7.00","5.50","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("596","70212736","27112802","Hoja De Sierra De Reciprocante Para Hierro","C/U","5.00","2.20","Equipo Y Herramientas De Mantto","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("597","70212743","31191501","Lija Para Hierro No. 36, Pliego","C/U","18.00","1.00","Minerales No Metálicos","2022-03-29","29","3","2022");
INSERT INTO tb_productos VALUES("598","70212745","31191501","Lija Para Hierro No. 50, Pliego","C/U","17.00","0.80","Minerales No Metálicos","2022-03-29","29","3","2022");
INSERT INTO tb_productos VALUES("599","70212748","31191501","Lija Para Hierro No. 80,Pliego","C/U","13.00","0.80","Minerales No Metálicos","2022-03-29","29","3","2022");
INSERT INTO tb_productos VALUES("600","70212750","31191501","Lija Para Hierro No. 100, Pliego","C/U","12.00","0.80","Minerales No Metálicos","2022-03-29","29","3","2022");
INSERT INTO tb_productos VALUES("601","70212751","31191501","Lija Para Hierro No. 150, Pliego","C/U","17.00","0.80","Minerales No Metálicos","2022-03-30","30","3","2022");
INSERT INTO tb_productos VALUES("602","70212754","31191501","Lija Para Hierro No. 320,Pliego","C/U","6.00","0.50","Minerales No Metálicos","2022-03-30","30","3","2022");
INSERT INTO tb_productos VALUES("603","70212763","31191501","Lija Para Agua No. 100, Pliego","C/U","3.00","0.50","Minerales No Metálicos","2022-03-30","30","3","2022");
INSERT INTO tb_productos VALUES("604","70212765","31191501","Lija Para Agua No. 150, Pliego","C/U","14.00","0.50","Minerales No Metálicos","2022-03-30","30","3","2022");
INSERT INTO tb_productos VALUES("605","70212770","31191501","Lija Para Agua No. 400, Pliego","C/U","30.00","0.50","Minerales No Metálicos","2022-03-30","30","3","2022");
INSERT INTO tb_productos VALUES("606","70212798","39121436","Electrodo Para Hierro Lb Dulce, 3/32\",6013","Lb","257.00","1.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("607","70212800","39121436","Electrodo 3/32\" Para Hierro Dulce","Lb","90.50","1.00","Materiales Eléctricos","2022-02-22","22","2","2022");
INSERT INTO tb_productos VALUES("608","70212801","39121436","Electrodo Para Acero Inoxidable, 3/32\"","Lb","18.00","7.22","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("609","70212825","12352310","Tubo Silicon De Alta Temperatura Color Rojo","C/U","61.00","1.90","Químicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("610","70212829","31201610","Pegamento Acero Plástico, Tubo","C/U","15.00","9.70","Químicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("611","70212833","47131818","Limpiador De Polvo Por Aire A Presión ( Aire Comprimido ), Para Electrónica, Óptica E Informática, Frasco De 20 Onzas","C/U","8.00","10.00","Químicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("612","70212837","47131825","Limpiador De Contactos Electricos,Spray De 10-11 Onzas","C/U","20.00","4.30","Químicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("613","70212838","15121501","Lubricante Wd-40, Spray De 11 Onzas","C/U","12.00","2.60","Químicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("614","70212992","31152209","Alambre Espigado Galvanizado No. 16 Rollo","C/U","7.00","36.00","Minerales Metálicos","2022-03-11","11","3","2022");
INSERT INTO tb_productos VALUES("615","70212995","26121540","Galvanizado Calibre 16","Lb","24.00","1.15","Minerales Metálicos","2022-05-05","5","5","2022");
INSERT INTO tb_productos VALUES("616","70212998","31152209","Alambre De Amarre","Lb","10.00","1.05","Minerales Metálicos","2022-05-17","17","5","2022");
INSERT INTO tb_productos VALUES("617","70212999","11101716","Estaño Puro En Barra","C/U","4.00","44.00","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("618","70213013","31211502","Pintura De Agua Color Galón Azul Naval","Galón","30.00","46.80","Químicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("619","70213020","31211502","Pintura De Agua Color Galón Blanco","Galón","16.00","8.50","Químicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("620","70213041","31211502","Pintura De Agua Color Galón Gris Meteoro","Galón","28.00","28.40","Químicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("621","70213060","31211502","Pintura De Agua Color Galón Melón","Galón","7.00","23.00","Químicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("622","70213105","31211505","Pintura De Aceite Galón Color Amarillo","Galón","2.00","17.90","Químicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("623","70213112","31211502","Pintura Para Trafico, Color Amarillo","Galón","3.00","45.00","Químicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("624","70213450","31201605","Masilla Plástica Para Sos Múltiples","Galón","2.00","7.50","Químicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("625","70213113","31211502","Pintura Para Trafico, Color Blanco","Galón","3.00","45.00","Químicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("626","70213122","31211507","Pintura Color Azul, En Aerosol O Spray, Frasco","C/U","30.00","2.40","Químicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("627","70213126","31211505","Pintura De Aceite Color Café","Galón","1.00","35.00","Químicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("628","70213135","31211505","Pintura De Aceite Color Blanco Ostra","Galón","4.00","29.00","Químicos","2022-02-22","22","2","2022");
INSERT INTO tb_productos VALUES("629","70213145","31211505","Pintura De Aceite Color Gris Oscuro","Galón","1.00","22.10","Químicos","2022-02-28","28","2","2022");
INSERT INTO tb_productos VALUES("630","70213188","31211505","Pintura Epódica Color Aqua Incluye Catalizador","Galón","0.00","80.90","Químicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("631","70213189","31211505","Pintura Epódica Color Blanco Incluye Catalizador","Galón","1.00","112.70","Químicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("632","70213190","31211505","Pintura Epódica Color Blanco Hueso Incluye Catalizador","Galón","1.00","85.20","Químicos","2022-02-28","28","2","2022");
INSERT INTO tb_productos VALUES("633","70213197","31211505","Pintura Epódica Color Verde Incluye Catalizador","Galón","22.00","112.70","Químicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("634","70213200","31211518","Pintura Anticorrosiva Color Blanco","Galón","1.00","18.00","Químicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("635","70213202","31211518","Pintura Anticorrosiva Color Azul","Galón","4.75","12.50","Químicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("636","70213205","31211518","Pintura Anticorrosiva Color Negro","Galón","0.00","19.10","Químicos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("637","70213206","31211518","Pintura Anticorrosiva Color Negro Brillante","Galón","1.25","17.90","Químicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("638","70213210","31211518","Pintura Anticorrosiva Color Rojo","Galón","2.00","10.50","Químicos","2022-02-28","28","2","2022");
INSERT INTO tb_productos VALUES("639","70213221","31211507","Pintura De Aluminio","Galón","1.75","32.00","Químicos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("640","70213303","31211803","Thinner Corriente","Cto","1.00","2.00","Químicos","2022-03-15","15","3","2022");
INSERT INTO tb_productos VALUES("641","70213308","31211906","Rodillo Completo","C/U","29.00","2.80","Herramientas Y Repuestos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("642","70213309","31211904","Brocha De 1\"","C/U","53.00","0.30","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("643","70213310","31211904","Brocha De 1 1/2\"","C/U","58.00","0.50","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("644","70213313","31211904","Brocha De 3\"","C/U","6.00","0.91","Herramientas Y Repuestos","2022-05-17","17","5","2022");
INSERT INTO tb_productos VALUES("645","70213315","31211904","Brocha De 2\"","C/U","10.00","0.50","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("646","70213316","31211904","Brocha De 4\"","C/U","18.00","1.30","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("647","70213448","31201605","Masilla Automotriz 1/4 De Galón","C/U","2.00","9.00","Químicos","2022-03-07","7","3","2022");
INSERT INTO tb_productos VALUES("648","70302062","23101502","Kit De Taladro Y Atornillador De Impacto, Inalámbrico, Con Cargador Y Dos Baterías, 20 Voltios","C/U","0.00","168.00","Equipo Y Herramientas De Mantto","2022-03-01","1","3","2022");
INSERT INTO tb_productos VALUES("649","70302069","99999","Lavadora Alta Presión, 1200 Psi, 115 Voltios, Consumo 2.1 Gpm, Para Agua Fría, Pistola Y Manguera De 25 Pies, Motor (2 A 5) Hp, Fácil Transportación (2 Ruedas)","C/U","1.00","300.00","Equipo Y Herramientas De Mantto","2022-02-28","28","2","2022");
INSERT INTO tb_productos VALUES("650","70213507","31211507","Pintura En Spray 24 Onzas Color Blanco","C/U","16.00","4.30","Químicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("651","70213553","31211507","Pintura En Spray 12 Onzas Color Gris","C/U","9.00","4.30","Químicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("652","70215029","39121434","Conector Para Tecno ducto De 1 1/4\"","C/U","6.00","0.50","Materiales Eléctricos","2022-02-25","25","2","2022");
INSERT INTO tb_productos VALUES("653","70225085","0","Cadena Galvanizada De 1/8","Mts","9.00","0.90","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("654","70225093","0","Cadena Galvanizada De 3/16","Mts","9.00","1.10","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("655","70225097","0","Cadena Galvanizada De 1/4\"","Mts","9.00","1.90","Minerales Metálicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("656","70225267","99999","Gasolina Regular","Cuarto Gal","19.50","1.10","Combustibles Y Lubricantes","2022-03-15","15","3","2022");
INSERT INTO tb_productos VALUES("657","70225269","15121902","Grasa","Lb","1.00","10.00","Químicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("658","70225400","25174004","Refrigerante Para Radiador","C/U","9.00","0.00","Químicos","2022-03-04","4","3","2022");
INSERT INTO tb_productos VALUES("659","70226434","0","Fusible De 15 Amperios 12 Voltios","C/U","42.00","0.50","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("660","70301255","43222643","Probador De Línea Para Jack R11/Rj12/ Rj45, Sobre Cable Utp /Stp / Ftp","C/U","1.00","69.75","Equipo Y Herramientas De Mantto","2022-05-17","17","5","2022");
INSERT INTO tb_productos VALUES("661","70302014","11101502","Esmeril Pequeño De Banco, 3450 Rpm, 120 Voltios, 60hz. Marca Total","C/U","1.00","79.00","Equipo Y Herramientas De Mantto","2022-05-05","5","5","2022");
INSERT INTO tb_productos VALUES("662","70302020","23101512","Caladora 6.5 Amp Tipo T Velocidad Variable Marca Total","C/U","1.00","50.29","Equipo Y Herramientas De Mantto","2022-05-17","17","5","2022");
INSERT INTO tb_productos VALUES("663","70302035","27111515","Taladro Rotomartillo","C/U","1.00","199.95","Equipo Y Herramientas De Mantto","2022-05-17","17","5","2022");
INSERT INTO tb_productos VALUES("664","70302040","23101509","Lijadora Palma Portátil 1,400 Rpm 24 Amp Marca Total","C/U","1.00","50.00","Equipo Y Herramientas De Mantto","2022-05-05","5","5","2022");
INSERT INTO tb_productos VALUES("665","70302203","32141108","Tenaza Polo Tierra De 600 Amperios Para Soldadura Eléctrica","C/U","11.00","7.20","Herramientas Y Repuestos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("666","70302204","32141108","Tenaza Porta Electrodo De 600 Impacto, Inalámbrico, Con Cargador Y Dos Baterías, 20 Voltios","C/U","7.00","13.40","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("667","70302236","27111514","Cortador De Vidrio","C/U","2.00","2.50","Equipo Y Herramientas De Mantto","2022-05-05","5","5","2022");
INSERT INTO tb_productos VALUES("668","70305083","27112845","Básicas De Taller Amperios Para Soldadura Eléctrica","C/U","1.00","22.45","Equipo Y Herramientas De Mantto","2022-05-05","5","5","2022");
INSERT INTO tb_productos VALUES("669","70305098","27110000","Broca Piloto Para Cierra Copa, 1/4\"","C/U","1.00","3.00","Equipo Y Herramientas De Mantto","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("670","70305128","27111907","Cepillo De Alambre Mango De Madera","C/U","22.00","1.80","Herramientas Y Repuestos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("671","70305129","27111907","Cepillo De Alambre De Copa Para Pulidora, De Diámetro 4\"","C/U","1.00","13.30","Herramientas Y Repuestos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("672","70305165","27112502","Grifa Armador Para Varilla De 3 /8\" Par","C/U","1.00","15.45","Equipo Y Herramientas De Mantto","2022-05-05","5","5","2022");
INSERT INTO tb_productos VALUES("673","70305270","27112104","Tenaza De Presión De 10 Pulgadas","C/U","10.00","3.96","Equipo Y Herramientas De Mantto","2022-05-17","17","5","2022");
INSERT INTO tb_productos VALUES("674","70305275","27112104","Tenaza De Presión De 7 Pulgadas","C/U","6.00","3.56","Equipo Y Herramientas De Mantto","2022-05-17","17","5","2022");
INSERT INTO tb_productos VALUES("675","70305308","25170000","Ventosa Para Destapar Lavamanos/ Inodoros","C/U","36.00","2.30","Herramientas Y Editar Repuestos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("676","70305333","14110000","Es cartabón De 12x24 Pulgadas","C/U","1.00","8.00","Equipo Y Herramientas De Mantto","2022-05-17","17","5","2022");
INSERT INTO tb_productos VALUES("677","70305338","27111801","Cinta Métrica Enrollable, Metálica De 8 Metros","C/U","12.00","6.77","Equipo Y Herramientas De Mantto","2022-05-17","17","5","2022");
INSERT INTO tb_productos VALUES("678","70305348","27111903","Cepillo Numero 4 Con Cuchilla Para Carpintero","C/U","1.00","36.41","Equipo Y Herramientas De Mantto","2022-05-05","5","5","2022");
INSERT INTO tb_productos VALUES("679","70305387","27112825","Broca Para Hierro De 3/16\"","C/U","2.00","1.10","Equipo Y Herramientas De Mantto","2022-03-15","15","3","2022");
INSERT INTO tb_productos VALUES("680","70305402","27112843","Broca Centro De 5/16\"","C/U","1.00","5.00","Equipo Y Herramientas De Mantto","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("681","70305720","27112502","Grifa Armador Para Varilla De 1/4¨, Par","C/U","1.00","12.61","Equipo Y Herramientas De Mantto","2022-05-05","5","5","2022");
INSERT INTO tb_productos VALUES("682","70305931","40142002","Manguera Industrial Para Acetileno 1/4\" (Roja)","C/U","65.00","38.00","Equipo Y Herramientas De Mantto","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("683","70330015","27113203","Ponchadora Para Estructurado, Con Cableado Cortador","C/U","1.00","28.74","Equipo Y Herramientas De Mantto","2022-05-17","17","5","2022");
INSERT INTO tb_productos VALUES("684","80200415","39111702","Lampara De Frente, Incorporado","C/U","6.00","9.95","Equipo Y Herramientas De Mantto","2022-05-05","5","5","2022");
INSERT INTO tb_productos VALUES("685","70330040","0","Pasta Para Soldar, Frasco De 50g","C/U","6.00","2.30","Químicos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("686","70408004","46181704","Casco De Seguridad Para Obra, De Polietileno","C/U","13.00","4.10","Equipo Y Herramientas De Mantto","2022-05-05","5","5","2022");
INSERT INTO tb_productos VALUES("687","70408010","46181802","Anteojos De Seguridad Claros","C/U","20.00","1.40","Equipo Y Herramientas De Mantto","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("688","70408011","46181804","Gafas Para Soldadura Autógena","C/U","6.00","4.30","Equipo Y Herramientas De Mantto","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("689","70408020","46182001","Mascarillas De Protección De Un Filtro Intercambiable","C/U","31.00","16.30","Equipo Y Herramientas De Mantto","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("690","70408053","99999","Zapato De Seguridad Con Puntera De Acero, Suela Antiestática, Resistente A Perforaciones, Con Absorción De Energía En El Talón, Par","C/U","13.00","59.92","Equipo Y Herramientas De Mantto","2022-05-06","6","5","2022");
INSERT INTO tb_productos VALUES("691","70408070","46181703","Careta Con Vidrio Para Soldador","C/U","7.00","6.30","Equipo Y Herramientas De Mantto","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("692","70408071","46181703","Careta Electrónica Para Soldadura","C/U","2.00","36.12","Equipo Y Herramientas De Mantto","2022-05-23","23","5","2022");
INSERT INTO tb_productos VALUES("693","70408073","46181548","Delantal (Mandil) De Cuero, Y Para Soldador","C/U","13.00","11.30","Equipo Y Herramientas De Mantto","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("694","70408550","46181504","Guantes De Protección Multiuso, Par Guantes Antideslizantes, Par","C/U","23.00","3.80","Equipo Y Herramientas De Mantto","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("695","70409200","99999","Caja Protectora De Aerosoles","C/U","1.00","66.00","Herramientas Y Repuestos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("696","72011259","72154119","Niple De Hierro Galvanizado, Diámetro De 4\" X 9\"","C/U","12.00","15.30","Minerales Metálicos","2022-03-07","7","3","2022");
INSERT INTO tb_productos VALUES("697","79001200","99999","Accesorios Para Silla De Ruedas, Caja","C/U","1.00","77.30","Herramientas Y Repuestos","2022-02-24","24","2","2022");
INSERT INTO tb_productos VALUES("698","80200211","26111701","Batería Recargable Pequeña De 1.5 V Tipo A.","C/U","2.00","0.90","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("699","80200215","26111701","Batería Recargable Mediana De 1.2 V Tipo A","C/U","12.00","1.00","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("700","80200230","26111701","Batería Recargable Cuadrada De 9v Manos Libres, Tipo Casería, Luz Led","C/U","6.00","3.40","Materiales Eléctricos","2022-02-11","11","2","2022");
INSERT INTO tb_productos VALUES("701","80804065","46181525","Capa Impermeables De 1 Pieza Varios Colores Y Tallas","C/U","12.00","11.95","Equipo Y Herramientas De Mantto","2022-05-17","17","5","2022");


CREATE TABLE `tb_usuarios` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `username` text COLLATE utf8_spanish_ci NOT NULL,
  `firstname` text COLLATE utf8_spanish_ci NOT NULL,
  `lastname` text COLLATE utf8_spanish_ci NOT NULL,
  `Establecimiento` text COLLATE utf8_spanish_ci NOT NULL,
  `unidad` text COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `Habilitado` text COLLATE utf8_spanish_ci NOT NULL,
  `tipo_usuario` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO tb_usuarios VALUES("1","Admin","Admin","Master","Hospital Nacional Zacatecoluca \"Santa Teresa\"","Sin Unidad","Admin","Si","1");
INSERT INTO tb_usuarios VALUES("2","egchoto","Ernesto","Gonzales Choto","Hospital Nacional Zacatecoluca \"Santa Teresa\"","Departamento Mantenimiento Local","neto982006","Si","1");
INSERT INTO tb_usuarios VALUES("3","Usuario1","Baltazar Alexander","Marinero Pérez","Hospital Nacional Zacatecoluca \"Santa Teresa\"","Sección Equipo Básico","123","Si","2");
INSERT INTO tb_usuarios VALUES("4","Usuario2","Fráncico Tolentino","López","Hospital Nacional Zacatecoluca \"Santa Teresa\"","Sección Planta Física Y Mobiliario","123","Si","2");
INSERT INTO tb_usuarios VALUES("5","Usuario3","René Adán","Villalta Pérez","Hospital Nacional Zacatecoluca \"Santa Teresa\"","Sección Planta Física Y Mobiliario","123","Si","2");
INSERT INTO tb_usuarios VALUES("6","Usuario4","José Walter","Pineda Leiva","Hospital Nacional Zacatecoluca \"Santa Teresa\"","Sección Equipo Básico","123","Si","2");
INSERT INTO tb_usuarios VALUES("7","Usuario5","Justo Antonio","Alfaro","Hospital Nacional Zacatecoluca \"Santa Teresa\"","Sección Planta Física Y Mobiliario","123","Si","2");
INSERT INTO tb_usuarios VALUES("8","Usuario6","José Domínguez","Echeverría","Hospital Nacional Zacatecoluca \"Santa Teresa\"","Sección Equipo Médico","123","Si","2");
INSERT INTO tb_usuarios VALUES("9","Usuario7","Leopoldo Alfaro","Rodas","Hospital Nacional Zacatecoluca \"Santa Teresa\"","Sección Equipo Básico","123","Si","2");
INSERT INTO tb_usuarios VALUES("10","Usuario8","Miguel Antonio","Corvera Torrez","Hospital Nacional Zacatecoluca \"Santa Teresa\"","Sección Planta Física Y Mobiliario","123","Si","2");
INSERT INTO tb_usuarios VALUES("11","Usuario9","Anderson Eduardo","López Rodríguez","Hospital Nacional Zacatecoluca \"Santa Teresa\"","Departamento Mantenimiento Local","123","Si","2");
INSERT INTO tb_usuarios VALUES("12","Usuario10","Kevin Alexander","Guevara Marinero","Hospital Nacional Zacatecoluca \"Santa Teresa\"","Sección Equipo Básico","123","Si","2");
INSERT INTO tb_usuarios VALUES("13","Usuario11","Jenifer Marisol","Campos Yánez","Hospital Nacional Zacatecoluca \"Santa Teresa\"","Departamento Mantenimiento Local","123","Si","2");
INSERT INTO tb_usuarios VALUES("14","Usuario12","Kalmar Waldir","Pérez Marín","Hospital Nacional Zacatecoluca \"Santa Teresa\"","Departamento Mantenimiento Local","123","Si","2");
INSERT INTO tb_usuarios VALUES("15","Usuario13","Ronald Alexander","López Cisneros","Hospital Nacional Zacatecoluca \"Santa Teresa\"","Departamento Mantenimiento Local","123","Si","2");


CREATE TABLE `tb_vale` (
  `codVale` int(11) NOT NULL,
  `departamento` text COLLATE utf8_spanish_ci NOT NULL,
  `usuario` text COLLATE utf8_spanish_ci NOT NULL,
  `idusuario` int(11) NOT NULL DEFAULT 1,
  `campo` text COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Solicitud Vale',
  `estado` text COLLATE utf8_spanish_ci NOT NULL,
  `observaciones` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_registro` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`codVale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO tb_vale VALUES("1","Área Saneamiento Ambiental","Admin Master","1","Solicitud Vale","Pendiente","2","2022-11-19");
INSERT INTO tb_vale VALUES("2","Área Saneamiento Ambiental","Baltazar Alexander Marinero Pérez","3","Solicitud Vale","Pendiente","1","2022-11-19");
INSERT INTO tb_vale VALUES("3","Área Saneamiento Ambiental","Baltazar Alexander Marinero Pérez","3","Solicitud Vale","Pendiente","1","2022-11-19");
INSERT INTO tb_vale VALUES("4","Área Saneamiento Ambiental","Ernesto Gonzales Choto","2","Solicitud Vale","Pendiente","1","2022-11-19");
INSERT INTO tb_vale VALUES("5","Área Saneamiento Ambiental","Ernesto Gonzales Choto","2","Solicitud Vale","Pendiente","1","2022-11-19");
INSERT INTO tb_vale VALUES("6","Área Saneamiento Ambiental","Ernesto Gonzales Choto","2","Solicitud Vale","Pendiente","q","2022-11-19");
INSERT INTO tb_vale VALUES("7","Área Saneamiento Ambiental","Ernesto Gonzales Choto","2","Solicitud Vale","Pendiente","11","2022-11-20");
INSERT INTO tb_vale VALUES("8","Área Saneamiento Ambiental","Ernesto Gonzales Choto","2","Solicitud Vale","Pendiente","1","2022-11-20");
INSERT INTO tb_vale VALUES("9","Área Saneamiento Ambiental","Ernesto Gonzales Choto","2","Solicitud Vale","Pendiente","1","2022-11-20");
INSERT INTO tb_vale VALUES("10","Área Saneamiento Ambiental","Ernesto Gonzales Choto","2","Solicitud Vale","Pendiente","1","2022-11-20");
INSERT INTO tb_vale VALUES("11","Área Saneamiento Ambiental","Ernesto Gonzales Choto","2","Solicitud Vale","Pendiente","1","2022-11-20");
INSERT INTO tb_vale VALUES("12","Área Saneamiento Ambiental","Ernesto Gonzales Choto","2","Solicitud Vale","Pendiente","1","2022-11-20");
INSERT INTO tb_vale VALUES("13","Área Saneamiento Ambiental","Ernesto Gonzales Choto","2","Solicitud Vale","Pendiente","1","2022-11-20");
INSERT INTO tb_vale VALUES("14","Área Saneamiento Ambiental","Ernesto Gonzales Choto","2","Solicitud Vale","Pendiente","1","2022-11-20");
INSERT INTO tb_vale VALUES("15","Área Saneamiento Ambiental","Ernesto Gonzales Choto","2","Solicitud Vale","Pendiente","1","2022-11-20");


CREATE TABLE `detalle_compra` (
  `codigodetallecompra` int(3) NOT NULL AUTO_INCREMENT,
  `categoria` text COLLATE utf8_spanish_ci NOT NULL,
  `codigo` int(15) NOT NULL,
  `catalogo` int(20) NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `unidad_medida` text COLLATE utf8_spanish_ci NOT NULL DEFAULT 'C/U',
  `stock` decimal(6,2) unsigned NOT NULL DEFAULT 0.00,
  `cantidad_despachada` decimal(6,2) NOT NULL DEFAULT 0.00,
  `precio` decimal(6,2) NOT NULL DEFAULT 0.00,
  `solicitud_compra` int(8) DEFAULT NULL,
  PRIMARY KEY (`codigodetallecompra`),
  KEY `fk_tb_compra_detalle_compra` (`solicitud_compra`),
  CONSTRAINT `fk_tb_compra_detalle_compra` FOREIGN KEY (`solicitud_compra`) REFERENCES `tb_compra` (`nSolicitud`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;



CREATE TABLE `detalle_almacen` (
  `codigoalmacen` int(3) NOT NULL AUTO_INCREMENT,
  `codigo` int(15) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `unidad_medida` text COLLATE utf8_spanish_ci NOT NULL,
  `cantidad_solicitada` decimal(6,2) NOT NULL DEFAULT 0.00,
  `cantidad_despachada` decimal(6,2) NOT NULL DEFAULT 0.00,
  `tb_almacen` int(20) NOT NULL,
  `precio` decimal(6,2) NOT NULL DEFAULT 0.00,
  PRIMARY KEY (`codigoalmacen`),
  KEY `fk_tb_almacen_detalle_almacen` (`tb_almacen`),
  CONSTRAINT `fk_tb_almacen_detalle_almacen` FOREIGN KEY (`tb_almacen`) REFERENCES `tb_almacen` (`codAlmacen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;



CREATE TABLE `detalle_bodega` (
  `codigodetallebodega` int(3) NOT NULL AUTO_INCREMENT,
  `codigo` int(15) NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `unidad_medida` text COLLATE utf8_spanish_ci NOT NULL DEFAULT 'C/U',
  `stock` decimal(6,2) unsigned NOT NULL DEFAULT 0.00,
  `cantidad_despachada` decimal(6,2) NOT NULL DEFAULT 0.00,
  `precio` decimal(6,2) NOT NULL DEFAULT 0.00,
  `odt_bodega` int(15) DEFAULT NULL,
  PRIMARY KEY (`codigodetallebodega`),
  KEY `fk_tb_bodega_detalle_bodega` (`odt_bodega`),
  CONSTRAINT `fk_tb_bodega_detalle_bodega` FOREIGN KEY (`odt_bodega`) REFERENCES `tb_bodega` (`codBodega`)
) ENGINE=InnoDB AUTO_INCREMENT=495 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;



CREATE TABLE `detalle_vale` (
  `codigodetallevale` int(3) NOT NULL AUTO_INCREMENT,
  `codigo` int(15) NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `unidad_medida` text COLLATE utf8_spanish_ci NOT NULL DEFAULT 'C/U',
  `stock` decimal(6,2) NOT NULL DEFAULT 0.00,
  `cantidad_despachada` decimal(6,2) NOT NULL DEFAULT 0.00,
  `precio` decimal(6,2) NOT NULL DEFAULT 0.00,
  `numero_vale` int(15) DEFAULT NULL,
  PRIMARY KEY (`codigodetallevale`),
  KEY `fk_tb_vale_detalle_vale` (`numero_vale`),
  CONSTRAINT `fk_tb_vale_detalle_vale` FOREIGN KEY (`numero_vale`) REFERENCES `tb_vale` (`codVale`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO detalle_vale VALUES("1","80804065","Capa Impermeables De 1 Pieza Varios Colores Y Tallas","C/U","3.00","0.00","11.95","1");
INSERT INTO detalle_vale VALUES("2","31161502","Ancla Plástica Para Tabla Roca","C/U","11.00","0.00","0.23","3");
INSERT INTO detalle_vale VALUES("3","31161502","Ancla Plástica Para Tabla Roca","C/U","1.00","0.00","0.23","4");
INSERT INTO detalle_vale VALUES("4","31161502","Ancla Plástica Para Tabla Roca","C/U","12.00","0.00","0.23","5");
INSERT INTO detalle_vale VALUES("5","43703002","Niple Galvanizado De 1","C/U","2.00","0.00","1.50","5");
INSERT INTO detalle_vale VALUES("6","43703003","Reductor Campana Galvanizado De 2 X 3/4","C/U","1.00","0.00","3.90","5");
INSERT INTO detalle_vale VALUES("7","43703004","Tapón Hembra Galvanizado 1","C/U","2.00","0.00","1.10","5");
INSERT INTO detalle_vale VALUES("8","43703005","Reductor Campana Galvanizado De 1/2 X 5/8","C/U","2.00","0.00","1.80","5");
INSERT INTO detalle_vale VALUES("9","43703006","Reductor Campana Galvanizado De 1 X 5/8","C/U","1.00","0.00","2.00","5");
INSERT INTO detalle_vale VALUES("10","43703007","Reductor Campana Galvanizado De 1 X 3/4","C/U","1.00","0.00","2.30","5");
INSERT INTO detalle_vale VALUES("11","43703008","Tapón Hembra PVC 1 1/4","C/U","1.00","0.00","1.30","5");
INSERT INTO detalle_vale VALUES("12","43703009","Tapón Hembra PVC De 1","C/U","1.00","0.00","1.00","5");
INSERT INTO detalle_vale VALUES("13","43703010","Tapón Macho De 2","C/U","1.00","0.00","1.50","5");
INSERT INTO detalle_vale VALUES("14","43703022","Codo PVC 90° Con Rosca","C/U","1.00","0.00","2.80","5");
INSERT INTO detalle_vale VALUES("15","43703011","Codo PVC De 2","C/U","1.00","0.00","4.80","6");
INSERT INTO detalle_vale VALUES("16","43703012","Tee PVC Con Rosca 3/4","C/U","1.00","0.00","1.00","6");
INSERT INTO detalle_vale VALUES("17","43703013","Tapón Hembra PVC 2 1/2","C/U","1.00","0.00","3.30","6");
INSERT INTO detalle_vale VALUES("18","43703014","Adaptador Hembra PVC 2 1/2","C/U","1.00","0.00","4.50","6");
INSERT INTO detalle_vale VALUES("19","43703015","Tubo PVC 2 1/2 160 P.S.I.","Mts","1.00","0.00","3.40","6");
INSERT INTO detalle_vale VALUES("20","43703016","Válvula De Paso De 1 1/2","C/U","1.00","0.00","62.00","6");
INSERT INTO detalle_vale VALUES("21","43703017","Hierro Cuadrado Solido De 1/4","Mts","1.00","0.00","0.70","6");
INSERT INTO detalle_vale VALUES("22","43703019","Carbón 0252 Para Pulidora","C/U","1.00","0.00","5.30","6");
INSERT INTO detalle_vale VALUES("23","43703020","Carbón 1120 Para Pulidora","C/U","1.00","0.00","9.00","6");
INSERT INTO detalle_vale VALUES("24","43703021","Varilla Lisa De 1/2","Mts","1.00","0.00","2.33","6");
INSERT INTO detalle_vale VALUES("25","80804065","Capa Impermeables De 1 Pieza Varios Colores Y Tallas","C/U","12.00","0.00","11.95","7");
INSERT INTO detalle_vale VALUES("26","80804065","Capa Impermeables De 1 Pieza Varios Colores Y Tallas","C/U","1.00","0.00","11.95","8");
INSERT INTO detalle_vale VALUES("27","80200230","Batería Recargable Cuadrada De 9v Manos Libres, Tipo Casería, Luz Led","C/U","1.00","0.00","3.40","9");
INSERT INTO detalle_vale VALUES("28","80200415","Lampara De Frente, Incorporado","C/U","1.00","0.00","9.95","9");
INSERT INTO detalle_vale VALUES("29","80804065","Capa Impermeables De 1 Pieza Varios Colores Y Tallas","C/U","1.00","0.00","11.95","9");
INSERT INTO detalle_vale VALUES("30","80804065","Capa Impermeables De 1 Pieza Varios Colores Y Tallas","C/U","1.00","0.00","11.95","10");
INSERT INTO detalle_vale VALUES("31","72011259","Niple De Hierro Galvanizado, Diámetro De 4","C/U","1.00","0.00","15.30","11");
INSERT INTO detalle_vale VALUES("32","79001200","Accesorios Para Silla De Ruedas, Caja","C/U","1.00","0.00","77.30","11");
INSERT INTO detalle_vale VALUES("33","70408011","Gafas Para Soldadura Autógena","C/U","1.00","0.00","4.30","12");
INSERT INTO detalle_vale VALUES("34","70408073","Delantal (Mandil) De Cuero, Y Para Soldador","C/U","1.00","0.00","11.30","12");
INSERT INTO detalle_vale VALUES("35","70408550","Guantes De Protección Multiuso, Par Guantes Antideslizantes, Par","C/U","1.00","0.00","3.80","12");
INSERT INTO detalle_vale VALUES("36","70409200","Caja Protectora De Aerosoles","C/U","1.00","0.00","66.00","12");
INSERT INTO detalle_vale VALUES("37","72011259","Niple De Hierro Galvanizado, Diámetro De 4","C/U","1.00","0.00","15.30","12");
INSERT INTO detalle_vale VALUES("38","79001200","Accesorios Para Silla De Ruedas, Caja","C/U","1.00","0.00","77.30","12");
INSERT INTO detalle_vale VALUES("39","80200211","Batería Recargable Pequeña De 1.5 V Tipo A.","C/U","1.00","0.00","0.90","12");
INSERT INTO detalle_vale VALUES("40","80200215","Batería Recargable Mediana De 1.2 V Tipo A","C/U","1.00","0.00","1.00","12");
INSERT INTO detalle_vale VALUES("41","80200230","Batería Recargable Cuadrada De 9v Manos Libres, Tipo Casería, Luz Led","C/U","1.00","0.00","3.40","12");
INSERT INTO detalle_vale VALUES("42","80200415","Lampara De Frente, Incorporado","C/U","1.00","0.00","9.95","12");
INSERT INTO detalle_vale VALUES("43","80804065","Capa Impermeables De 1 Pieza Varios Colores Y Tallas","C/U","1.00","0.00","11.95","12");
INSERT INTO detalle_vale VALUES("44","70330040","Pasta Para Soldar, Frasco De 50g","C/U","1.00","0.00","2.30","13");
INSERT INTO detalle_vale VALUES("45","70408073","Delantal (Mandil) De Cuero, Y Para Soldador","C/U","1.00","0.00","11.30","13");
INSERT INTO detalle_vale VALUES("46","70408550","Guantes De Protección Multiuso, Par Guantes Antideslizantes, Par","C/U","1.00","0.00","3.80","13");
INSERT INTO detalle_vale VALUES("47","70409200","Caja Protectora De Aerosoles","C/U","1.00","0.00","66.00","13");
INSERT INTO detalle_vale VALUES("48","72011259","Niple De Hierro Galvanizado, Diámetro De 4","C/U","1.00","0.00","15.30","13");
INSERT INTO detalle_vale VALUES("49","79001200","Accesorios Para Silla De Ruedas, Caja","C/U","1.00","0.00","77.30","13");
INSERT INTO detalle_vale VALUES("50","80200211","Batería Recargable Pequeña De 1.5 V Tipo A.","C/U","1.00","0.00","0.90","13");
INSERT INTO detalle_vale VALUES("51","80200215","Batería Recargable Mediana De 1.2 V Tipo A","C/U","1.00","0.00","1.00","13");
INSERT INTO detalle_vale VALUES("52","80200230","Batería Recargable Cuadrada De 9v Manos Libres, Tipo Casería, Luz Led","C/U","1.00","0.00","3.40","13");
INSERT INTO detalle_vale VALUES("53","80200415","Lampara De Frente, Incorporado","C/U","1.00","0.00","9.95","13");
INSERT INTO detalle_vale VALUES("54","70305931","Manguera Industrial Para Acetileno 1/4","C/U","1.00","0.00","38.00","14");
INSERT INTO detalle_vale VALUES("55","70330015","Ponchadora Para Estructurado, Con Cableado Cortador","C/U","1.00","0.00","28.74","14");
INSERT INTO detalle_vale VALUES("56","70408073","Delantal (Mandil) De Cuero, Y Para Soldador","C/U","1.00","0.00","11.30","14");
INSERT INTO detalle_vale VALUES("57","70408550","Guantes De Protección Multiuso, Par Guantes Antideslizantes, Par","C/U","1.00","0.00","3.80","14");
INSERT INTO detalle_vale VALUES("58","70409200","Caja Protectora De Aerosoles","C/U","1.00","0.00","66.00","14");
INSERT INTO detalle_vale VALUES("59","72011259","Niple De Hierro Galvanizado, Diámetro De 4","C/U","1.00","0.00","15.30","14");
INSERT INTO detalle_vale VALUES("60","79001200","Accesorios Para Silla De Ruedas, Caja","C/U","1.00","0.00","77.30","14");
INSERT INTO detalle_vale VALUES("61","80200211","Batería Recargable Pequeña De 1.5 V Tipo A.","C/U","1.00","0.00","0.90","14");
INSERT INTO detalle_vale VALUES("62","80200215","Batería Recargable Mediana De 1.2 V Tipo A","C/U","1.00","0.00","1.00","14");
INSERT INTO detalle_vale VALUES("63","80200230","Batería Recargable Cuadrada De 9v Manos Libres, Tipo Casería, Luz Led","C/U","1.00","0.00","3.40","14");
INSERT INTO detalle_vale VALUES("64","70408010","Anteojos De Seguridad Claros","C/U","12.00","0.00","1.40","15");
INSERT INTO detalle_vale VALUES("65","80200415","Lampara De Frente, Incorporado","C/U","1.00","0.00","9.95","15");
INSERT INTO detalle_vale VALUES("66","80804065","Capa Impermeables De 1 Pieza Varios Colores Y Tallas","C/U","1.00","0.00","11.95","15");


CREATE TABLE `detalle_circulante` (
  `codigodetallecirculante` int(3) NOT NULL AUTO_INCREMENT,
  `codigo` int(15) NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `unidad_medida` text COLLATE utf8_spanish_ci NOT NULL DEFAULT 'C/U',
  `stock` decimal(6,2) NOT NULL,
  `cantidad_despachada` decimal(6,2) NOT NULL,
  `precio` decimal(6,2) NOT NULL DEFAULT 0.00,
  `tb_circulante` int(15) DEFAULT NULL,
  PRIMARY KEY (`codigodetallecirculante`),
  KEY `fk_tb_circulante_detalle_circulante` (`tb_circulante`),
  CONSTRAINT `fk_tb_circulante_detalle_circulante` FOREIGN KEY (`tb_circulante`) REFERENCES `tb_circulante` (`codCirculante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;



CREATE TABLE `selects_dependencia` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `Habilitado` text COLLATE utf8_spanish_ci NOT NULL,
  `dependencia` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;



CREATE TABLE `selects_categoria` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `Habilitado` text COLLATE utf8_spanish_ci NOT NULL,
  `categoria` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO selects_categoria VALUES("1","Si","Agropecuarios Y Forestales");
INSERT INTO selects_categoria VALUES("2","Si","Cuero Y Caucho");
INSERT INTO selects_categoria VALUES("3","Si","Combustibles Y Lubricantes");
INSERT INTO selects_categoria VALUES("4","Si","Minerales No Metálicos");
INSERT INTO selects_categoria VALUES("5","Si","Minerales Metálicos");
INSERT INTO selects_categoria VALUES("6","Si","Herramientas Y Repuestos");
INSERT INTO selects_categoria VALUES("7","Si","Materiales Eléctricos");
INSERT INTO selects_categoria VALUES("8","Si","Mobiliario");
INSERT INTO selects_categoria VALUES("9","Si","Químicos");


CREATE TABLE `selects_unidad_medida` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `Habilitado` text COLLATE utf8_spanish_ci NOT NULL,
  `unidad_medida` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO selects_unidad_medida VALUES("1","Si","C/M");
INSERT INTO selects_unidad_medida VALUES("2","Si","Cto");
INSERT INTO selects_unidad_medida VALUES("3","Si","Cuarto Gal");
INSERT INTO selects_unidad_medida VALUES("4","Si","C/U");
INSERT INTO selects_unidad_medida VALUES("5","Si","Galón");
INSERT INTO selects_unidad_medida VALUES("6","Si","Lb");
INSERT INTO selects_unidad_medida VALUES("7","Si","Mts");
INSERT INTO selects_unidad_medida VALUES("8","Si","Pgo");
INSERT INTO selects_unidad_medida VALUES("9","Si","Qq");
INSERT INTO selects_unidad_medida VALUES("10","Si","Par");


CREATE TABLE `selects_departamento` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `Habilitado` text COLLATE utf8_spanish_ci NOT NULL,
  `departamento` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO selects_departamento VALUES("1","Si","Área Saneamiento Ambiental");
INSERT INTO selects_departamento VALUES("2","Si","Área Servicios Auxiliares");
INSERT INTO selects_departamento VALUES("3","Si","Área Clínica De Úlceras Y Heridas");
INSERT INTO selects_departamento VALUES("4","Si","Área Residencial Médica");
INSERT INTO selects_departamento VALUES("5","Si","Área Epidemiología");
INSERT INTO selects_departamento VALUES("6","Si","Área COVID 19");
INSERT INTO selects_departamento VALUES("7","Si","Bienestar Magisterial");
INSERT INTO selects_departamento VALUES("8","Si","Cirugía Hombre");
INSERT INTO selects_departamento VALUES("9","Si","Dirección Hospital");
INSERT INTO selects_departamento VALUES("10","Si","Departamento Lavandería Y Ropería");
INSERT INTO selects_departamento VALUES("11","Si","Departamento Mantenimiento Local");
INSERT INTO selects_departamento VALUES("12","Si","Departamento Estadística Y Documento Médicos");
INSERT INTO selects_departamento VALUES("13","Si","Departamento Activo Fijo");
INSERT INTO selects_departamento VALUES("14","Si","División Administrativa");
INSERT INTO selects_departamento VALUES("15","Si","Departamento Recursos Humanos");
INSERT INTO selects_departamento VALUES("16","Si","Departamento Terapia Dialítica");
INSERT INTO selects_departamento VALUES("17","Si","Fisioterapia");
INSERT INTO selects_departamento VALUES("18","Si","Farmacia");
INSERT INTO selects_departamento VALUES("19","Si","Ginecología");
INSERT INTO selects_departamento VALUES("20","Si","Laboratorio Clínico");
INSERT INTO selects_departamento VALUES("21","Si","Pediatría");
INSERT INTO selects_departamento VALUES("22","Si","Radiología E Imágenes");
INSERT INTO selects_departamento VALUES("23","Si","Subdirección Hospital");
INSERT INTO selects_departamento VALUES("24","Si","Sección Equipo Médico");
INSERT INTO selects_departamento VALUES("25","Si","Sección Equipo Básico");
INSERT INTO selects_departamento VALUES("26","Si","Sección Planta Física Y Monitoreo");
INSERT INTO selects_departamento VALUES("27","Si","Servicio Centro Quirúrgico");
INSERT INTO selects_departamento VALUES("28","Si","Servicio Medicina Hombres");
INSERT INTO selects_departamento VALUES("29","Si","Servicio Medicina Mujeres");
INSERT INTO selects_departamento VALUES("30","Si","Servicio Almacén");
INSERT INTO selects_departamento VALUES("31","Si","Servicio Consulta Externa");
INSERT INTO selects_departamento VALUES("32","Si","Servicio Trabajo Social");
INSERT INTO selects_departamento VALUES("33","Si","Servicio Obstetricia");
INSERT INTO selects_departamento VALUES("34","Si","Unidad Sala De Operación");
INSERT INTO selects_departamento VALUES("35","Si","Unidad Sala De Partos");
INSERT INTO selects_departamento VALUES("36","Si","Unidad Neonatos");
INSERT INTO selects_departamento VALUES("37","Si","Unidad Máxima Urgencia");
INSERT INTO selects_departamento VALUES("38","Si","Unidad Financiara Institucional");
INSERT INTO selects_departamento VALUES("39","Si","Unidad Auditoría Interna");
INSERT INTO selects_departamento VALUES("40","Si","Unidad Asesora De Suministro Médicos");
INSERT INTO selects_departamento VALUES("41","Si","Unidad Atención Integral E Integrada A la Salud Sexual Reproductiva");
INSERT INTO selects_departamento VALUES("42","Si","Unidad Cuidados Especiales");
