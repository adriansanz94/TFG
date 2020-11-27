use tfg;

/*INSERT DE USUARIOS*/
INSERT INTO USUARIO (ID,NOMBRE,PASS,EMAIL,DESCRIPCION,IMAGEN,ROL)
 VALUES
 (1,'Adrian','$2y$10$nbm5Inx.l3F/ik5RuZa0Qu49NaFtC5i6nyYvCFLcCye6xh6GeoV3O','adriansanzclase@gmail.com','cuentanos algo de ti','/imgs/Adrian/perfil/adrian.jpg','ADMIN'),/*1234*/
 (2,'Steven','$2y$10$nbm5Inx.l3F/ik5RuZa0Qu49NaFtC5i6nyYvCFLcCye6xh6GeoV3O','steven.cadena.giler@gmail.com','cuentanos algo de ti','/imgs/Steven/perfil/steven.jpg','ADMIN'),/*1234*/
 (3,'German','$2y$10$nbm5Inx.l3F/ik5RuZa0Qu49NaFtC5i6nyYvCFLcCye6xh6GeoV3O','germancarab@gmail.com','cuentanos algo de ti','/imgs/German/perfil/german.jpg','ADMIN'),/*1234*/
 (4,'Pablo','$2y$10$nbm5Inx.l3F/ik5RuZa0Qu49NaFtC5i6nyYvCFLcCye6xh6GeoV3O','pablo@gmail.com','cuentanos algo de ti','/imgs/Pablo/perfil/pablo.jpg','USER'),/*1234*/
 (5,'Soraya','$2y$10$nbm5Inx.l3F/ik5RuZa0Qu49NaFtC5i6nyYvCFLcCye6xh6GeoV3O','soraya@gmail.com','cuentanos algo de ti','/imgs/Soraya/perfil/soraya.jpg','USER'),/*1234*/
 (6,'Lucia','$2y$10$nbm5Inx.l3F/ik5RuZa0Qu49NaFtC5i6nyYvCFLcCye6xh6GeoV3O','lucia@gmail.com','cuentanos algo de ti','/imgs/Lucia/perfil/lucia.jpg','USER');/*1234*/


INSERT INTO COMENTARIO (ID,CONTENIDO,ID_USUARIO_COMENTARIO)
 VALUES
 (1,'loremasdjabnwsdkfjbashdbfisabdfsadjfbih sadjbfhsabdfkjhbsadg f',1),
 (2,'loremasdjabnwsdkfjbashdbfisabdfsadjfbih sadjbfhsabdfkjhbsadg f',1),
 (3,'loremasdjabnwsdkfjbashdbfisabdfsadjfbih sadjbfhsabdfkjhbsadg f',2),
 (4,'loremasdjabnwsdkfjbashdbfisabdfsadjfbih sadjbfhsabdfkjhbsadg f',3);


INSERT INTO EJERCICIO (ID,NOMBRE,GRUPOMUSCULAR,DESCRIPCION,IMAGEN)
 VALUES
 (1,'Fondos','Biceps','con las manos a la altura de los hombros y en paralelo al suelo, bajar hasta tocar con la nariz en el suelo y subir hasta extender totalmente los brazos, repetir','/imgs/Ejercicios/fondos.jpg'),
 (2,'Plancha','Abdomen','Colócate boca abajo, con los codos y antebrazos apoyados sobre el suelo. Con las piernas estiradas, mantén la espalda en línea recta y aprieta el abdomen. No debes moverteColócate boca abajo, con los codos y antebrazos apoyados sobre el suelo. Con las piernas estiradas, mantén la espalda en línea recta y aprieta el abdomen. No debes moverte.','/imgs/Ejercicios/plancha.jpg'),
 (3,'Sentadilla','Pierna',' Estando de pie, flexiona lentamente las rodillas adoptando una posición como si fueras a sentarte y estira los brazos hacia adelante. Luego, retoma la posición inicial y repite.','/imgs/Ejercicios/sentadilla.jpg'),
 (4,'Salto de estrella','Pierna','Empieza con los brazos hacia abajo y pegados al cuerpo. Realiza un salto hacia arriba, levantando los brazos y separando las piernas para formar una especie de estrella.','/imgs/Ejercicios/salto_estrella.jpg'),
 (5,'Abdominales','Abdomen','Debes recostarte con la espalda sobre el suelo y doblar las rodillas. Coloca las manos por detrás de las orejas y los codos abiertos, e impúlsate hacia arriba para acercar el tórax a tus piernas. No necesitas elevarte por completo.','/imgs/Ejercicios/abdominales.jpg'),
 (6,'Sentadilla en pared','Pierna',' La idea es apoyar tu espalda contra la pared y flexionar las rodillas, como si estuvieras en una silla.','/imgs/Ejercicios/sentadilla_pared.jpg'),
 (7,'Flexiones','Brazos','Debes colocar las manos en el suelo, en ambos lados y línea recta. Mantén las piernas completamente estiradas y baja el cuerpo doblando los codos hasta quedar cerca del suelo','/imgs/Ejercicios/flexiones.jpg'),
 (8,'Escalar montaña','Pierna','Mantén las palmas de tus manos en el suelo y los brazos estirados. Eleva una de las rodillas para acercarla a tu pecho y luego haz lo mismo con la otra rodilla. Repite estos movimientos rápidamente sin modificar el resto de tu postura.','/imgs/Ejercicios/escalar_montaña.jpg'),
 (9,'Flexiones y rotación','Pierna','Al igual que en las flexiones, baja el cuerpo doblando los codos hasta quedar cerca del suelo. La diferencia es que cuando llegue el momento de reincorporarte, gira tu cuerpo hacia un costado estirando el brazo hacia arriba. Cambia de lado en cada repetición.','/imgs/Ejercicios/flexion_rotacion.jpg'),
 (10,'Planchas de costado','Abdomen','Como indica su nombre, es como las panchas ya mencionadas, pero girando la totalidad del cuerpo para un costado. Apoya el codo y antebrazo del lado del cual te ejercitarás en el suelo y mantente en esa posición con las piernas estiradas.','/imgs/Ejercicios/plancha_costado.jpg'),
 (11,'Pasos atrás','Pierna','Parado y con las manos extendidas hacia adelante, mueve una pierna hacia atrás. Recupera la posición inicial y mueve la otra. Hazlo de forma constante y rítmica.','/imgs/Ejercicios/paso_atras.jpg'),
 (12,'Burpee','Abdominales','Colócate en cunclillas con las manos en el suelo para comenzar. Extiende las piernas hacia atrás y regresa a la posición inicial. Luego salta hacia arriba con las manos extendidas por encima de la cabeza.','/imgs/Ejercicios/burpees.jpg'),
 (13,'Tríceps','Brazos','Siéntate en el suelo con tus piernas hacia adelante. Coloca tus manos en el suelo, dobla las rodillas y levanta la cadera del suelo. Dobla los codos para bajar el cuerpo y luego extiende los brazos.','/imgs/Ejercicios/triceps.jpg'),
 (14,'Bíceps','Brazos','Agarra un objeto con algo de peso con una mano. De pie, extiende el brazo hacia abajo y en un sólo movimiento sube la mano doblando el codo.','/imgs/Ejercicios/biceps.jpg'),
 (15,'Hombros','Brazos',' Con el mismo objeto en la mano y el brazo extendido levántalo hacia adelante hasta ubicarlo por encima de tu cabeza.','/imgs/Ejercicios/hombro.jpg'),
 (16,'Supermanes','Brazos','Estírate boca abajo en el suelo. Aprieta los glúteos, y eleva los pies y los muslos, a la vez que el torso y los brazos. Aguanta dos segundos así y vuelve a la posición inicial.','/imgs/Ejercicios/superman.jpg'),
 (17,'Trote con elevación de rodilla','Pierna','Colócate en postura erguida, y comienza a correr sin moverte del sitio. Hay que elevar las rodillas lo más alto posible. Intenta que el muslo quede en paralelo, o incluso más alto, con cada zancada.','/imgs/Ejercicios/trote.jpg'),
 (18,'Torsión rusa','Abdomen','Túmbate con las rodillas dobladas y los pies levantados del suelo. Eleva el torso y agarra ambas manos. Gira a la derecha y toca el suelo con las manos. Luego, repite girando a la izquierda.','/imgs/Ejercicios/torsion_rusa.jpg'),
 (19,'Sentadillas lateral','Pierna','Colócate con las piernas separadas un poco distantes a la altura de los hombros, cambia tu peso hacia una pierna y baja lo más que puedas, empuja tus caderas hacia atrás. Mantén la pierna libre de peso y recta, luego flexiona el talón hacia el techo mientras bajas. Toma pausa y retorna a la posición original.','/imgs/Ejercicios/sentadilla.png'),
 (20,'Elevación de pierna','Pierna','Colócate de pie con tus manos arriba de las caderas, levanta una pierna lo más alto que puedas sin doblar la rodilla. Mantén tu torso derecho todo el tiempo.','/imgs/Ejercicios/elevacion_piernas.jpg'),
 (21,'Salto de sentadillas','Pierna','Colócate de pie con tus piernas separadas, dobla tus rodillas, empuja tu cadera hacia atrás y baja tu cuerpo hasta que tus muslos estén paralelos al piso (o hasta donde te sientas cómodo). Después sube hacia arriba saltando lo más alto posible. Incorpórate suave doblando tus rodillas y vuelve a hacer la sentadillas.','/imgs/Ejercicios/sentadillas_salto.jpg'),
 (22,'Puente de glúteos','Gluteos','Túmbate de espaldas y apoya las plantas de los pies en el suelo. Empuja desde los talones para elevar la cadera lo más alto que puedas, sin llegar a arquear la espalda baja. Piensa en contraer los glúteos. En la posición final deben estar alineadas las rodillas con la cadera y los hombros.','/imgs/Ejercicios/puente_gluteos.jpg'),
 (23,'Flexiones en la pared','Brazos','Al igual que en el suelo coloca tus manos a la altura de los hombros y eleva tus piernas esta es la posición inicial del ejercicio. Para realizarlo baja hacia la pared apretando el abdomen y procura que tu espalda no se tuerza.','/imgs/Ejercicios/flexiones_pared.jpg'),
 (24,'Subida de escalón','Pierna','Apoyamos uno de los pies completamente en el cajón y el otro en el suelo. El pie que está en el suelo se eleva y se coloca también en el cajón.','/imgs/Ejercicios/subir_escalon.jpg'),
 (25,'Abdominales en bicicleta','Pierna','Esta vez, en lugar de apoyar los pies colocándolos a 90 grados y tus dos manos debajo de tu cabeza. Intenta que tu nariz toque tu rodilla izquierda mientras que la pierna derecha está extendida, haz lo mismo, pero al revés.','/imgs/Ejercicios/abdominales_flexion.jpg');

 INSERT INTO RUTINA (ID,NOMBRE,DIFICULTAD,DESCRIPCION,ID_USUARIO_RUTINA)
  VALUES
  (1,'Quema grasa','Alta','Esta rutina se centra en ejercicios de alta intesidad para quemar grasa de forma rapida',1),
  (2,'Abdomen de acero','Media','Consigue unos abdominales de acero en 2 meses',3),
  (3,'Navy','Alta','La rutina que hacen los navy sheal atrevete a sentirte como ellos',2),
  (4,'Levantar Gluteos','Baja','En está rutina encontrarás, justo lo que buscabas para levantar el trasero.',1),
  (5,'Quitar rollito abdominal','Media','Para quitar ese molesto rollito abdominal, tenemos está rutina, que te va a venir de maravilla.',3),
  (6,'Gemelos fuertes','Media','Para aumentar esos gemelos, que mejor que una rutina especifica para ello.',2),
  (7,'Aumentar resistencia física','Alta','Aquí podrás mejorar tu resistencia física, con constancia y siguiendo está rutina lograrás tu objetivo.',1),
  (8,'Brazos de acero','Media','Para tener unos brazos fuertes y tonificados, tenemos está rutina, que es muy completa. En pocas semanas notarás la diferencia.',3),
  (9,'Cuerpo completo','Alta','Si quieres tener un cuerpo fuerte y sano, con esta rutina completa vas a lograrlo, nos centraremos en ejercitar todos los musculos, para ir avanzando progresivamente.',2);

INSERT INTO EJERCICIORUTINA (ID,REPETICIONES,ID_RUTINA,ID_EJERCICIO)
 VALUES
 (1,'10 rep',1,1),
 (2,'30 segundos',1,2),
 (3,'20 rep',1,3),
 (4,'30 segundos',2,2),
 (5,'25 rep',2,3),
 (6,'30 rep',3,1),
 (7,'1 minuto',3,2),
 (8,'30 rep',4,3),
 (9,'30 rep',4,8),
 (10,'30 rep',4,11),
 (11,'30 seg',4,22),
 (12,'60 rep',5,18),
 (13,'25 rep',5,12),
 (14,'50 segundos',5,24),
 (15,'18 rep',5,10),
 (16,'16 rep',5,25),
 (17,'30 rep',6,17),
 (18,'30 rep',6,19),
 (19,'20 rep',6,11),
 (20,'50 segundos',6,8),
 (21,'30 rep',6,20),
 (22,'30 segundos',7,4),
 (23,'30 rep',7,2),
 (24,'14 rep',7,8),
 (25,'12 rep',7,9),
 (26,'30 segundos',7,24),
 (27,'20 rep',7,25),
 (28,'14 rep',7,18),
 (29,'30 segundos',7,17),
 (30,'18 rep',8,1),
 (31,'30 seg',8,2),
 (32,'30 seg',8,13),
 (33,'12 rep',8,14),
 (34,'14 rep',8,15),
 (35,'14 rep',8,16),
 (36,'30 segundos',9,4),
 (37,'18 rep',9,4),
 (38,'14 rep',9,1),
 (39,'30 rep',9,10),
 (40,'1 minuto',9,9),
 (41,'12 rep',9,12),
 (42,'16 rep',9,14),
 (43,'18 rep',9,22),
 (44,'30 segundos',9,23),
 (45,'16 rep',9,16),
 (46,'14 rep',9,17),
 (47,'30 segundos',9,21);

INSERT INTO RECETA (ID,NOMBRE,INGREDIENTES,DESCRIPCION,TIEMPO,IMAGEN,ID_USUARIO_RECETA)
 VALUES
(1,'Pollo a la plancha','1 Pollo entero,Sal,Pimienta,Guarnición','se cogeran los filetes de pollo , se sazonaran al gusto y en una sarten sin aceite se espera a que esten dorados','15 mintuos','/imgs/Adrian/recetas/pollo a la plancha/pollo.jpg',1 ),
(2,'Patata cocida','5 Patatas,Aceite Oliva','se limpian las patatas bien bajo el grifo, se ponene en una holla con agua y sal y se espera una media hora a que cuezan','30 minutos','/imgs/German/recetas/patata cocida/patata.jpg',3 ),
(3,'Alcachofas al horno','Alcachofas,Aceite','se hierven a fuego lento durante 15 o 20 minutos mientras se precalienta el horno a 150 grados , y despues se meten al horno otros 15 o 20 minutos hasta que esten doradas','40 minutos','/imgs/Steven/recetas/alcachofas al horno/alcachofas.jpg',2 ),
(4,'Cocido madrileño','Garbanzos,Chorizo,Morcilla,Repollo,Pollo','se cogeran los filetes de pollo , se sazonaran al gusto y en una sarten sin aceite se espera a que esten dorados','15 mintuos','/imgs/Adrian/recetas/cocido madrileño/cocido.jpg',1 ),
(5,'Fabada','Judias,Chorizo,Morcilla','se limpian las patatas bien bajo el grifo, se ponene en una holla con agua y sal y se espera una media hora a que cuezan','30 minutos','/imgs/German/recetas/fabada/fabada.jpg',3 ),
(6,'Ceviche','Camarones,Chifles,Cebolla,Tomates','se hierven a fuego lento durante 15 o 20 minutos mientras se precalienta el horno a 150 grados , y despues se meten al horno otros 15 o 20 minutos hasta que esten doradas','40 minutos','/imgs/Steven/recetas/ceviche/ceviche.jpg',2 ),
(7,'Fritada','Costillas de cerdo,Mote,','se cogeran los filetes de pollo , se sazonaran al gusto y en una sarten sin aceite se espera a que esten dorados','15 mintuos','/imgs/Adrian/recetas/fritada/fritada.jpg',1 ),
(8,'Empanadas de verde','Platano macho,Queso','se limpian las patatas bien bajo el grifo, se ponene en una holla con agua y sal y se espera una media hora a que cuezan','30 minutos','/imgs/German/recetas/empanadas de verde/empanadas.jpg',3 ),
(9,'Tallarines','Tallarines,Carne,Pimienta,Sal','se hierven a fuego lento durante 15 o 20 minutos mientras se precalienta el horno a 150 grados , y despues se meten al horno otros 15 o 20 minutos hasta que esten doradas','40 minutos','/imgs/Steven/recetas/tallarines/tallarines.jpg',2 );
