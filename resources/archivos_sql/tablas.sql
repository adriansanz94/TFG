/*
  BASE DE DATOS DE pagina deporte
*/


USE tfg;
/* SET FOREIGN_KEY_CHECKS=0;   si es que se agregan las tablas mas de una vez */
/*SET FOREIGN_KEY_CHECKS=0;*/
ALTER DATABASE tfg charset=utf8;


DROP TABLE IF EXISTS COOKIESESION;
DROP TABLE IF EXISTS TOKEN;
DROP TABLE IF EXISTS RECETA;
DROP TABLE IF EXISTS EJERCICIORUTINA;
DROP TABLE IF EXISTS EJERCICIO;
DROP TABLE IF EXISTS RUTINA;
DROP TABLE IF EXISTS COMENTARIO;
DROP TABLE IF EXISTS USUARIO;

CREATE TABLE USUARIO (
  ID     INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  NOMBRE VARCHAR(45) NOT NULL UNIQUE,
  PASS   VARCHAR(200) NOT NULL,
  EMAIL  VARCHAR(45) NOT NULL UNIQUE,
  DESCRIPCION VARCHAR(200),
  IMAGEN VARCHAR(200),
  ROL VARCHAR(20),
  RECETAS_FAVORITAS VARCHAR(500),
  RUTINAS_FAVORITAS VARCHAR(500)
);

CREATE TABLE COMENTARIO (
  ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  CONTENIDO VARCHAR(200) NOT NULL,
  ID_USUARIO_COMENTARIO   INT,
  FOREIGN KEY (ID_USUARIO_COMENTARIO ) REFERENCES USUARIO(ID) ON DELETE CASCADE
);

CREATE TABLE RUTINA(
  ID INT AUTO_INCREMENT PRIMARY KEY,
  NOMBRE VARCHAR(45),
  DIFICULTAD VARCHAR(45),
  DESCRIPCION VARCHAR(200),
  ID_USUARIO_RUTINA INT,
  FOREIGN KEY (ID_USUARIO_RUTINA ) REFERENCES USUARIO(ID) ON DELETE CASCADE
);

CREATE TABLE EJERCICIO(
  ID INT AUTO_INCREMENT PRIMARY KEY,
  NOMBRE VARCHAR(45),
  GRUPOMUSCULAR VARCHAR(45),
  DESCRIPCION VARCHAR(1000),
  IMAGEN VARCHAR(200)
);

CREATE TABLE EJERCICIORUTINA(
  ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  REPETICIONES VARCHAR(45),
  ID_RUTINA INT,
  ID_EJERCICIO INT,
  FOREIGN KEY (ID_RUTINA) REFERENCES RUTINA(ID) ON DELETE CASCADE,
  FOREIGN KEY (ID_EJERCICIO) REFERENCES EJERCICIO(ID) ON DELETE CASCADE
);

/*
FOREIGN KEY (ID_RUTINA) REFERENCES RUTINA(ID) ON DELETE CASCADE,
FOREIGN KEY (ID_EJERCICIO) REFERENCES EJERCICIO(ID) ON DELETE CASCADE
*/

CREATE TABLE RECETA(
  ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  NOMBRE VARCHAR(45),
  DESCRIPCION VARCHAR(2000),
  TIEMPO VARCHAR(30),
  IMAGEN VARCHAR(200),
  ID_USUARIO_RECETA INT,
  FOREIGN KEY (ID_USUARIO_RECETA) REFERENCES USUARIO(ID) ON DELETE CASCADE
);

CREATE TABLE TOKEN (
  ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  EMAIL VARCHAR(200) NOT NULL,
  TOKEN VARCHAR(200) NOT NULL
);
CREATE TABLE COOKIESESION(
  ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  COOKIE VARCHAR(200) NOT NULL,
  ID_USUARIO_COOKIE INT NOT NULL ,
  FOREIGN KEY (ID_USUARIO_COOKIE) REFERENCES USUARIO(ID) ON DELETE CASCADE
);
