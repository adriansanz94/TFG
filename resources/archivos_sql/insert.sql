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
(1,'Ensalada fresca de salmón','Salmón fresco 250 gramos,Lechuga 1,Lima 1,Azucar (pizca), Sal (pizca),Rabanitos,Pepino medio','En primer lugar, prepara el salmón. Nosotros lo hemos cocinado a baja temperatura, salpimentando el salmón, cerrándolo en bolsa de vacío, y cocinándolo durante 45 minutos a 48,9 ºC. Tras este tiempo, consérvalo en la nevera. Puedes hacer este paso con hasta dos días de antelación. Si no quieres o no puedes cocinar el salmón a baja temperatura, puedes usar cualquier salmón fresco cocinado al horno o a la plancha. Eso sí, es mejor que no esté muy hecho.En un bote, mezcla los elementos del aliño: la salsa de pescado, el zumo de una lima, la sal, un poco de pimienta negra, el aceite de oliva y una de las chalotas picada muy fina. Reserva.
En una fuente o ensaladera, dispón la lechuga lavada y cortada y los rabanitos, la chalota restante y el pepino cortados en láminas –si tienes rabanos o peninos grandes corta las laminas por la mitad o en cuartos–. Desmenuza el salmón por encima, en trozos irregulares, que quepan en un bocado. Añade el cilantro y el orégano picados (también van bien la albahaca o la menta).
Sirve con el aliño ya mezclado o presentado en el mismo bote, para que se lo echen los comensales a su gusto','15 mintuos','/imgs/Adrian/recetas/Ensalada fresca de salmón/ensalada1.jpg',1 ),
(2,'Wok de fideos de calabacín','Calabacín grande 2,Zanahoria pequeña 1,Cebolla pequeña 1,Cebolleta 1,Pimiento rojo  1,Aceite de girasol 5ml,Aceite de sésamo o coco 5ml,Salsa tamari o de soja','Lavamos el calabacín y lo pasamos por un cortador de verduras en forma de espiral o espiralizador para hacer fideos de calabacín. Lavamos y pelamos la zanahoria y la pasamos también por el espiralizador, aunque podemos laminarla finamente si lo preferimos.
Pelamos la cebolla y la cebolleta y las cortamos por la mitad. Después cortamos cada mitad en finas tiras. Lavar el pimiento rojo y cortar en tiras finas.
Calentamos los aceites en un wok o en una sartén grande y salteamos la cebolla, cebolleta, zanahoria y pimiento durante unos dos o tres minutos. Removemos sin parar para que el calor llegue por igual a todas las verduras y se mezclen los sabores.
Añadimos la salsa tamari o de soja, una cucharadita de semillas de sésamo y removemos. Por último agregamos los fideos de calabacín, mezclamos todo bien y salteamos durante un par de minutos antes de servir. ','30 minutos','/imgs/German/recetas/Wok de fideos de calabacín/wok.jpg',3 ),
(3,'Guisantes con jamón','Guisantes 500 gramos,Cebolla cortada en brunoise fino 100 gramos,Jamón serrano en tacos 150 gramos,Harina de trigo 10 gramos','Para hacer esta receta, comenzamos cortando la cebolla y picándola en brunoise con la técnica que os enseñé hace unos meses. Ponemos la cebolla a fuego lento en una sartén con dos cucharadas de aceite de oliva. Mientras la cebolla se pocha, vamos cociendo los guisantes.
Si usáis guisantes frescos, será necesario tenerlos unos 8 minutos para que estén perfectos, verdes verdes y llenos de sabor. Si usáis congelados, serán necesarios unos 12 minutos de cocción y si utilizáis guisantes en conserva, ya los tenéis listos para los siguientes pasos.
Cuando la cebolla está transparente y comience a sudar, agregamos el jamón serrano muy picado -se agradecen los trocitos de tocino que aportan mucha jugosidad- y se rehogan con la cebolla. Se añade también una puntita de harina y un cucharón del agua de la cocción de los guisantes.
Se liga un poco esa salsa de cebolla, jamón y harina y se agregan los guisantes bien escurridos. Se mezcla el conjunto hasta que forma un cuerpo uniforme y se decora con una hojita de salvia o con otro brote aromático y se lleva a la mesa inmediatamente. ','40 minutos','/imgs/Steven/recetas/Guisantes con jamón/guisantes.jpg',2 ),
(4,'Espinacas a la catalana','Espinaca fresca  500 gramos,Piñones 50 gramos,Diente de ajo 1,Uvas pasas sultanas  50 gramos','En una sartén con una cucharada de aceite de oliva, salteamos las hojas de espinacas hasta que pierdan toda el agua. Tardaremos unos 15 minutos en tenerlas a punto, viendo como pierden más de la mitad de su volumen en este paso.
Reservamos las espinacas y en la misma sartén, tostamos los piñones. Cuando empiecen a tomar color, añadimos también las pasas y el diente de ajo muy picado. Salteamos un minuto y reincorporamos las espinacas reservadas.
Mezclamos bien todos los ingredientes meneando la sartén y tras uno o dos minutos más para que todo esté bien caliente, pasamos el contenido de la sartén a una fuente y llevamos a la mesa inmediatamente. ','15 mintuos','/imgs/Adrian/recetas/Espinacas a la catalana/espinacas.jpg',1 ),
(5,'Tarta tatín de verduras','Hojaldre lámina 1,Calabacín 1,Tomate pera 1,Berenjena 1,Pimiento rojo 1,Aceite de oliva virgen extra 30 gramos,Salsa de soja 30 gramos,Azúcar moreno 15 gramos','Lavamos bien todas las verduras y las escurrimos. Cortamos el calabacín en discos de medio centímetro de grosor. Hacemos lo mismo con los tomates pera y con la berenjena, que procuramos comprar estrecha y alargada (como el calabacín) para que los discos tengan un diámetro lo más similar posible. Cortamos el pimiento en cuadrados.Mezclamos el aceite de oliva virgen extra, la salsa de soja y el azúcar moreno. Cubrimos con ello la base de un molde de tartaleta de 22 centímetros de diámetro y colocamos las verduras en espiral, alternando unas con otras hasta cubrir bien el molde. Han de quedar bien apretadas y sin huecos.
Cubrimos con la lámina de hojaldre, recortamos el sobrante y remetemos los extremos entre las verduras y el borde del molde. Cocemos en horno precalentado a 190ºC con calor arriba y abajo durante 20 minutos o hasta que el hojaldre adquiera un tono dorado. Retiramos y esperamos unos minutos antes de desmoldar (cubrimos la sartén con un plato y volteamos), espolvorear con un poco de pimienta negra molida y servir. ','30 minutos','/imgs/German/recetas/Tarta tatín de verduras/tarta.jpg',3 ),
(6,'Sartén de brócoli con especias y coco','Brócoli 2,Cebolla morada pequeña 1,Jengibre fresco (un trocito pequeño) 1,Ajo granulado 1/2 cucharadita,Cúrcuma molida 1/2 cucharadita,Pimentón dulce 1/4 cucharadita,Pimentón picante una pizca,Cilantro molido 1/2 cucharadita,Coco rallado ,Limón  1,Sal,Aceite de olive,Pimienta negra','Para empezar, lavar bien el brócoli y cortar los tallos, que debemos guardar para otras recetas -de verdad, no los tiréis a la basura, hacedme caso-. Cortar los ramilletes y picar muy bien con un buen cuchillo, o usar un procesador de alimentos. Yo he preferido dejar algunas piezas más enteras, pero con una picadora se puede obtener la textura de cuscús, más recomendable para los menos amigos del brócoli.
Picar la cebolla roja, rallar el jengibre y tener a mano todas las especias. Calentar un poco de aceite en una buena sartén antiadherente, mejor si tenéis una tipo skillet de hierro fundido, y echar las semillas de mostada y comino. Cuando empiecen a saltar, agregar la cebolla con el jengibre y una pizquita de sal, removiendo bien, hasta que la cebolla se transparente un poco.
Añadir todas las especias molidas, remover un poco y agregar el brócoli. Saltear sin dejar de remover para que coja todos los sabores, echar dos cucharadas de coco, salpimentar y añadir un poco de agua. Tapar y dejar cocinar 5 minutos, procurando que no se queme por abajo.
Continuar la cocción salteando el conjunto hasta tener la textura deseada del brócoli. Salpimentar al gusto, añadir un poco de zumo y ralladura de limón y servir con coco rallado extra y unas hierbas frescas picadas. Yo he optado esta vez por cebollino.','40 minutos','/imgs/Steven/recetas/Sartén de brócoli con especias y coco/sarten.jpg',2 ),
(7,'Judías verdes asadas al balsámico','Judías verdes redondas  350 gramos,Chalota 2,Aceite de oliva virgen extra 30 ml,Vinagre balsámico 20 ml,Salsa Worcestershire,Comino molido 1/2 cucharadita,Cúrcuma molida 1/2 cucharadita,Pimentón dulce 1/4 cucharadita,Ajo granulado,Sal,Pimienta negra','Precalentar el horno a 190ºC y engrasar una bandeja o fuente con una cucharada de aceite de oliva. Lavar y secar bien las judías verdes. Cortar los extremos con el rabito y disponerlas en la bandeja. Pelar las chalotas y cortarlas en dos.Rociar las judías verdes con el vinagre balsámico de Módena, la salsa Worcestershire, el aceite restante, el comino, la cúrcuma el pimentón, ajo granulado, pimientanegra y una pizca de sal. Remover bien para mezclar todos los ingredientes. Disponer encima las chalotas boca abajo.
Hornear durante unos 25-30 minutos, removiendo de vez en cuando, hasta alcanzar el punto deseado. Cortar las judías que sean más grandes, picar las chalotas y servirlas por encima. Dar un golpe de pimienta negra y sazonar con sal gruesa al gusto.','15 mintuos','/imgs/Adrian/recetas/Judías verdes asadas al balsámico/judias.jpg',1 ),
(8,'Garbanzos guisados','Garbanzos 500 gramos,Cebolla grande 2,Dientes de ajo 3,Tomate 2,Aceite de oliva,Sal,Pimentón dulce,Agua 500 ml,Huevos (hervido duro) 1','Para hacer esta receta usé garbanzos ya hervidos, pero los podemos usar secos y hervirlos nosotros mismos. En este caso, los ponemos en remojo toda la noche, al día siguiente los escurrimos, ponemos al fuego una olla con agua y cuando hierva echamos los garbanzos.
Cuando estén tiernos los escurrimos. De los garbanzos escurridos, retiramos medio cucharón y los reservamos. Pelamos la cebolla, los ajos y el tomate y los trituramos por separado. En una cazuela, ponemos un poco de aceite y sofreímos la cebolla, después añadimos el ajo y el tomate y lo dejamos hacer todo junto.
Añadimos el agua, el trozo de unto y llevamos a ebullición. Cuando hierva, agregamos los garbanzos, salamos y dejamos hervir. Mientras, pelamos el huevo hervido y lo trituramos con el medio cucharón de garbanzos que habíamos reservado, si es necesario podemos añadir un poco de agua de la cazuela.','30 minutos','/imgs/German/recetas/Garbanzos guisados/garbanzos.jpg',3 ),
(9,'Ensalada de lentejas','Lentejas cocidas 400 gramos,Zanahoria 1,Tomate medio,Cebolla morada media,Lima media,Queso feta 40 gramos,Vinagre de Módena 15 ml,Aceite de oliva virgen extra  45ml,Mostaza de Dijon  5gramos,Sal,Pimienta negra','Aunque es preferible utilizar lentejas secas y cocerlas nosotros mismos, si no contáis con tiempo para ello siempre podéis comprar unas lentejas en conserva de calidad y ahorraros algo de tiempo.
En caso de usar lentejas en conserva es importante lavarlas bien bajo un chorro de agua fría durante un buen rato. El liquido en el que vienen conservadas les confiere un sabor peculiar, pero lo solucionamos con el lavado. Una vez limpias, escurrimos y secamos bien para que no nos arruinen la ensalada con una cantidad de líquido innecesaria.
Pelamos una zanahoria y la cocemos en agua salada hasta que, al pinchar con una brocheta, la notemos tierna. Escurrimos el agua y la refrescamos en abundante agua fría para cortar la cocción. La cortamos en pequeños dados. Así mismo, troceamos el tomate en pequeños dados. Podemos pelarlo, pero los trozos son tan pequeños que apenas se nota la piel.
Por otro lado, pelamos y picamos media cebolla morada en trozos de igual tamaño que los de las verduras anteriores. Mezclamos todas las verduras con las lentejas. Rallamos media lima, exprimimos su zumo y agregamos ambas cosas a la mezcla.
Ahora sólo queda preparar una vinagreta con mostaza con la que aderezar la ensalada. En un cuenco amplio batimos con unas varillas metálicas el aceite junto con el vinagre, la mostaza, la sal y la pimienta. Cuando la mezcla haya emulsionado y todos sus ingredientes estén integrados, regamos la ensalada con ella y removemos bien. Servimos con queso feta desmenuzado por encima.','40 minutos','/imgs/Steven/recetas/Ensalada de lentejas/lentejas.jpg',2 );
