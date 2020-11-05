use tfg;

/*INSERT DE USUARIOS*/
INSERT INTO USUARIO (ID,NOMBRE,PASS,EMAIL,DESCRIPCION,IMAGEN,ROL,RECETAS_FAVORITAS,RUTINAS_FAVORITAS)
 VALUES
 (1,'Adrian','$2y$10$nbm5Inx.l3F/ik5RuZa0Qu49NaFtC5i6nyYvCFLcCye6xh6GeoV3O','adriansanzclase@gmail.com','cuentanos algo de ti','RUTAIMAGENES','ADMIN','',''),/*1234*/
 (2,'Steven','$2y$10$nbm5Inx.l3F/ik5RuZa0Qu49NaFtC5i6nyYvCFLcCye6xh6GeoV3O','steven.cadena.giler@gmail.com','cuentanos algo de ti','RUTAIMAGENES','ADMIN','',''),/*1234*/
 (3,'German','$2y$10$nbm5Inx.l3F/ik5RuZa0Qu49NaFtC5i6nyYvCFLcCye6xh6GeoV3O','germancarab@gmail.com','cuentanos algo de ti','RUTAIMAGENES','ADMIN','',''),/*1234*/
 (4,'Pablo','$2y$10$nbm5Inx.l3F/ik5RuZa0Qu49NaFtC5i6nyYvCFLcCye6xh6GeoV3O','pablo@gmail.com','cuentanos algo de ti','RUTAIMAGENES','USER','',''),/*1234*/
 (5,'Soraya','$2y$10$nbm5Inx.l3F/ik5RuZa0Qu49NaFtC5i6nyYvCFLcCye6xh6GeoV3O','soraya@gmail.com','cuentanos algo de ti','RUTAIMAGENES','USER','',''),/*1234*/
 (6,'Lucia','$2y$10$nbm5Inx.l3F/ik5RuZa0Qu49NaFtC5i6nyYvCFLcCye6xh6GeoV3O','lucia@gmail.com','cuentanos algo de ti','RUTAIMAGENES','USER','','');/*1234*/
 /*aqui pon tu correo german copia la pass que es 1234 *//*1234*/;

INSERT INTO COMENTARIO (ID,CONTENIDO,ID_USUARIO_COMENTARIO)
 VALUES
 (1,'loremasdjabnwsdkfjbashdbfisabdfsadjfbih sadjbfhsabdfkjhbsadg f',1),
 (2,'loremasdjabnwsdkfjbashdbfisabdfsadjfbih sadjbfhsabdfkjhbsadg f',1),
 (3,'loremasdjabnwsdkfjbashdbfisabdfsadjfbih sadjbfhsabdfkjhbsadg f',2),
 (4,'loremasdjabnwsdkfjbashdbfisabdfsadjfbih sadjbfhsabdfkjhbsadg f',3);

INSERT INTO RUTINA (ID,NOMBRE,DIFICULTAD,DESCRIPCION,ID_USUARIO_RUTINA)
 VALUES
 (1,'quema grasa','facil','etsa rutina se centra en ejercicios de alta intesidad para quemar grasa de forma rapida',1),
 (2,'abdomen de acero','medio','consigue unos abdominales de acero en 2 meses',3),
 (3,'navy','dificil','la rutina que hacen los navy sheal atrevete a sentirte como ellos',2),
 (4,'rutina 4','facil','etsa rutina se centra en ejercicios de alta intesidad para quemar grasa de forma rapida',1),
 (5,'rutina 5','medio','consigue unos abdominales de acero en 2 meses',3),
 (6,'rutina 6','dificil','la rutina que hacen los navy sheal atrevete a sentirte como ellos',2),
 (7,'rutina 7','facil','etsa rutina se centra en ejercicios de alta intesidad para quemar grasa de forma rapida',1),
 (8,'rutina 8','medio','consigue unos abdominales de acero en 2 meses',3),
 (9,'rutina 9','dificil','la rutina que hacen los navy sheal atrevete a sentirte como ellos',2);

INSERT INTO EJERCICIO (ID,NOMBRE,GRUPOMUSCULAR,DESCRIPCION,IMAGEN)
 VALUES
 (1,'Fondos','pecho','con las manos a la altura de los hombros y en paralelo al suelo, bajar hasta tocar con la nariz en el suelo y subir hasta extender totalmente los brazos, repetir',''),
 (2,'Plancha','abdomen','Colócate boca abajo, con los codos y antebrazos apoyados sobre el suelo. Con las piernas estiradas, mantén la espalda en línea recta y aprieta el abdomen. No debes moverteColócate boca abajo, con los codos y antebrazos apoyados sobre el suelo. Con las piernas estiradas, mantén la espalda en línea recta y aprieta el abdomen. No debes moverte.',''),
 (3,'Sentadilla','pierna',' Estando de pie, flexiona lentamente las rodillas adoptando una posición como si fueras a sentarte y estira los brazos hacia adelante. Luego, retoma la posición inicial y repite.',''),
 (4,'Salto de estrella','pierna','Empieza con los brazos hacia abajo y pegados al cuerpo. Realiza un salto hacia arriba, levantando los brazos y separando las piernas para formar una especie de estrella.',''),
 (5,'Abdominales','abdomen','Debes recostarte con la espalda sobre el suelo y doblar las rodillas. Coloca las manos por detrás de las orejas y los codos abiertos, e impúlsate hacia arriba para acercar el tórax a tus piernas. No necesitas elevarte por completo.',''),
 (6,'Sentadilla en pared','pierna',' La idea es apoyar tu espalda contra la pared y flexionar las rodillas, como si estuvieras en una silla.',''),
 (7,'Flexiones','brazos','Debes colocar las manos en el suelo, en ambos lados y línea recta. Mantén las piernas completamente estiradas y baja el cuerpo doblando los codos hasta quedar cerca del suelo',''),
 (8,'Escalar montaña','pierna','Mantén las palmas de tus manos en el suelo y los brazos estirados. Eleva una de las rodillas para acercarla a tu pecho y luego haz lo mismo con la otra rodilla. Repite estos movimientos rápidamente sin modificar el resto de tu postura.',''),
 (9,'Flexiones y rotación','pierna','Al igual que en las flexiones, baja el cuerpo doblando los codos hasta quedar cerca del suelo. La diferencia es que cuando llegue el momento de reincorporarte, gira tu cuerpo hacia un costado estirando el brazo hacia arriba. Cambia de lado en cada repetición.',''),
 (10,'Planchas de costado','pierna','Como indica su nombre, es como las panchas ya mencionadas, pero girando la totalidad del cuerpo para un costado. Apoya el codo y antebrazo del lado del cual te ejercitarás en el suelo y mantente en esa posición con las piernas estiradas.',''),
 (11,'Pasos atrás','pierna','Parado y con las manos extendidas hacia adelante, mueve una pierna hacia atrás. Recupera la posición inicial y mueve la otra. Hazlo de forma constante y rítmica.',''),
 (12,'Burpee','pierna','Colócate en cunclillas con las manos en el suelo para comenzar. Extiende las piernas hacia atrás y regresa a la posición inicial. Luego salta hacia arriba con las manos extendidas por encima de la cabeza.',''),
 (13,'Tríceps','pierna','Siéntate en el suelo con tus piernas hacia adelante. Coloca tus manos en el suelo, dobla las rodillas y levanta la cadera del suelo. Dobla los codos para bajar el cuerpo y luego extiende los brazos.',''),
 (14,'Bíceps','pierna','Agarra un objeto con algo de peso con una mano. De pie, extiende el brazo hacia abajo y en un sólo movimiento sube la mano doblando el codo.',''),
 (15,'Hombros','pierna',' Con el mismo objeto en la mano y el brazo extendido levántalo hacia adelante hasta ubicarlo por encima de tu cabeza.',''),
 (16,'Supermanes','pierna','Estírate boca abajo en el suelo. Aprieta los glúteos, y eleva los pies y los muslos, a la vez que el torso y los brazos. Aguanta dos segundos así y vuelve a la posición inicial.',''),
 (17,'Trote con elevación de rodilla','pierna','Colócate en postura erguida, y comienza a correr sin moverte del sitio. Hay que elevar las rodillas lo más alto posible. Intenta que el muslo quede en paralelo, o incluso más alto, con cada zancada.',''),
 (18,'Torsión rusa','pierna','Túmbate con las rodillas dobladas y los pies levantados del suelo. Eleva el torso y agarra ambas manos. Gira a la derecha y toca el suelo con las manos. Luego, repite girando a la izquierda.',''),
 (19,'Sentadillas lateral','pierna','Colócate con las piernas separadas un poco distantes a la altura de los hombros, cambia tu peso hacia una pierna y baja lo más que puedas, empuja tus caderas hacia atrás. Mantén la pierna libre de peso y recta, luego flexiona el talón hacia el techo mientras bajas. Toma pausa y retorna a la posición original.',''),
 (20,'Elevación de pierna','pierna','Colócate de pie con tus manos arriba de las caderas, levanta una pierna lo más alto que puedas sin doblar la rodilla. Mantén tu torso derecho todo el tiempo.',''),
 (21,'Salto de sentadillas','pierna','Colócate de pie con tus piernas separadas, dobla tus rodillas, empuja tu cadera hacia atrás y baja tu cuerpo hasta que tus muslos estén paralelos al piso (o hasta donde te sientas cómodo). Después sube hacia arriba saltando lo más alto posible. Incorpórate suave doblando tus rodillas y vuelve a hacer la sentadillas.',''),
 (22,'Puente de glúteos','pierna','Túmbate de espaldas y apoya las plantas de los pies en el suelo. Empuja desde los talones para elevar la cadera lo más alto que puedas, sin llegar a arquear la espalda baja. Piensa en contraer los glúteos. En la posición final deben estar alineadas las rodillas con la cadera y los hombros.',''),
 (23,'Flexiones en la pared','pierna','Al igual que en el suelo coloca tus manos a la altura de los hombros y eleva tus piernas esta es la posición inicial del ejercicio. Para realizarlo baja hacia la pared apretando el abdomen y procura que tu espalda no se tuerza.',''),
 (24,'Subida de escalón','pierna','Apoyamos uno de los pies completamente en el cajón y el otro en el suelo. El pie que está en el suelo se eleva y se coloca también en el cajón.',''),
 (25,'Abdominales en bicicleta','pierna','Esta vez, en lugar de apoyar los pies colocándolos a 90 grados y tus dos manos debajo de tu cabeza. Intenta que tu nariz toque tu rodilla izquierda mientras que la pierna derecha está extendida, haz lo mismo, pero al revés.','');
INSERT INTO EJERCICIORUTINA (ID,REPETICIONES,ID_RUTINA,ID_EJERCICIO)
 VALUES
 (1,'10',1,1),
 (2,'30 segundos',1,2),
 (3,'20',1,3),
 (4,'30 segundos',2,2),
 (5,'20',3,3),
 (6,'30',3,1),
 (7,'1 minuto',2,2);

INSERT INTO RECETA (ID,NOMBRE,DESCRIPCION,TIEMPO,IMAGEN,ID_USUARIO_RECETA)
 VALUES
(1,'pollo a la plancha','se cogeran los filetes de pollo , se sazonaran al gusto y en una sarten sin aceite se espera a que esten dorados','15 mintuos','',1 ),
(2,'patata cocida','se limpian las patatas bien bajo el grifo, se ponene en una holla con agua y sal y se espera una media hora a que cuezan','30 minutos','',3 ),
(3,'alcachofas al horno','se hierven a fuego lento durante 15 o 20 minutos mientras se precalienta el horno a 150 grados , y despues se meten al horno otros 15 o 20 minutos hasta que esten doradas','40 minutos','',2 ),
(4,'cocido madrileño','se cogeran los filetes de pollo , se sazonaran al gusto y en una sarten sin aceite se espera a que esten dorados','15 mintuos','',1 ),
(5,'fabada','se limpian las patatas bien bajo el grifo, se ponene en una holla con agua y sal y se espera una media hora a que cuezan','30 minutos','',3 ),
(6,'ceviche','se hierven a fuego lento durante 15 o 20 minutos mientras se precalienta el horno a 150 grados , y despues se meten al horno otros 15 o 20 minutos hasta que esten doradas','40 minutos','',2 ),
(7,'fritada','se cogeran los filetes de pollo , se sazonaran al gusto y en una sarten sin aceite se espera a que esten dorados','15 mintuos','',1 ),
(8,'empanadas de verde','se limpian las patatas bien bajo el grifo, se ponene en una holla con agua y sal y se espera una media hora a que cuezan','30 minutos','',3 ),
(9,'tallarines','se hierven a fuego lento durante 15 o 20 minutos mientras se precalienta el horno a 150 grados , y despues se meten al horno otros 15 o 20 minutos hasta que esten doradas','40 minutos','',2 );