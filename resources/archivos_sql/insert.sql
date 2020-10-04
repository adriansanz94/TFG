use tfg;

/*INSERT DE USUARIOS*/
INSERT INTO USUARIO (ID,NOMBRE,PASS,EMAIL,IMAGEN)
 VALUES
 (1,'Adrian','$2y$10$nbm5Inx.l3F/ik5RuZa0Qu49NaFtC5i6nyYvCFLcCye6xh6GeoV3O','adriansanzclase@gmail.com','RUTAIMAGENES'),/*1234*/
 (2,'Steven','$2y$10$nbm5Inx.l3F/ik5RuZa0Qu49NaFtC5i6nyYvCFLcCye6xh6GeoV3O','steven.cadena.giler@gmail.com','RUTAIMAGENES'),/*1234*/
 (3,'German','$2y$10$nbm5Inx.l3F/ik5RuZa0Qu49NaFtC5i6nyYvCFLcCye6xh6GeoV3O','germancarab@gmail.com','RUTAIMAGENES');/*1234*/
 /*aqui pon tu correo german copia la pass que es 1234 *//*1234*/;

INSERT INTO COMENTARIO (ID,CONTENIDO,ID_USUARIO)
 VALUES
 (1,'loremasdjabnwsdkfjbashdbfisabdfsadjfbih sadjbfhsabdfkjhbsadg f',1),
 (2,'loremasdjabnwsdkfjbashdbfisabdfsadjfbih sadjbfhsabdfkjhbsadg f',1),
 (3,'loremasdjabnwsdkfjbashdbfisabdfsadjfbih sadjbfhsabdfkjhbsadg f',2),
 (4,'loremasdjabnwsdkfjbashdbfisabdfsadjfbih sadjbfhsabdfkjhbsadg f',3);

INSERT INTO RUTINA (ID,NOMBRE,DIFICULTAD,DESCRIPCION)
 VALUES
 (1,'quema grasa','facil','etsa rutina se centra en ejercicios de alta intesidad para quemar grasa de forma rapida'),
 (2,'abdomen de acero','medio','consigue unos abdominales de acero en 2 meses'),
 (3,'navy','dificil','la rutina que hacen los navy sheal atrevete a sentirte como ellos');

INSERT INTO EJERCICIO (ID,NOMBRE,GRUPOMUSCULAR,DESCRIPCION,IMAGEN)
 VALUES
 (1,'fondos','pecho','con las manos a la altura de los hombros y en paralelo al suelo, bajar hasta tocar con la nariz en el suelo y subir hasta extender totalmente los brazos, repetir',''),
 (2,'plancha','abdomen','en paralelo al suelo con los antebrazos apollados , mantener el abdomen duro y aguantar la posicion',''),
 (3,'sentadilla','pierna','con los pies a la altura de los hombros , bajar hasta formar un angulode 90 grados con las piernas , manteniendo la espalda recta , repetir','');

INSERT INTO EJERCICIORUTINA (ID,ID_RUTINA,ID_EJERCICIO,REPETICIONES)
 VALUES
 (1,1,1,'10'),
 (2,1,2,'30 segundos'),
 (3,1,3,'20'),
 (4,2,2,'30 segundos'),
 (5,3,3,'20'),
 (6,3,1,'30'),
 (7,2,2,'1 minuto');

INSERT INTO RECETA (ID,NOMBRE,DESCRIPCION,TIEMPO,IMAGEN,ID_USUARIO)
 VALUES
(1,'pollo a la plancha','se cogeran los filetes de pollo , se sazonaran al gusto y en una sarten sin aceite se espera a que esten dorados','15 mintuos','',1 ),
(2,'patata cocida','se limpian las patatas bien bajo el grifo, se ponene en una holla con agua y sal y se espera una media hora a que cuezan','30 minutos','',3 ),
(3,'alcachofas al horno','se hierven a fuego lento durante 15 o 20 minutos mientras se precalienta el horno a 150 grados , y despues se meten al horno otros 15 o 20 minutos hasta que esten doradas','40 minutos','',2 );
