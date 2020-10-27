/*
  BASE DE DATOS DE pagina deporte
*/


USE tfg;
/* SET FOREIGN_KEY_CHECKS=0;   si es que se agregan las tablas mas de una vez */
SET FOREIGN_KEY_CHECKS=0;
ALTER DATABASE tfg charset=utf8;

DROP TABLE IF EXISTS USUARIO;
DROP TABLE IF EXISTS COMENTARIO;
DROP TABLE IF EXISTS RUTINA;
DROP TABLE IF EXISTS EJERCICIO;
DROP TABLE IF EXISTS EJERCICIORUTINA;
DROP TABLE IF EXISTS RECETA;
DROP TABLE IF EXISTS TOKEN;
DROP TABLE IF EXISTS COOKIESESION;


CREATE TABLE USUARIO (
  ID     INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  NOMBRE VARCHAR(45) NOT NULL UNIQUE,
  PASS   VARCHAR(200) NOT NULL,
  EMAIL  VARCHAR(45) NOT NULL UNIQUE,
  IMAGEN VARCHAR(200),
  ROL VARCHAR(20),
  ID_RUTINA INT ,
  ID_EJERCICIO INT
);

CREATE TABLE COMENTARIO (
  ID     INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  CONTENIDO VARCHAR(200) NOT NULL,
  ID_USUARIO   INT,
  FOREIGN KEY (ID_USUARIO) REFERENCES USUARIO(ID) ON DELETE CASCADE
);

CREATE TABLE RUTINA(
  ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  NOMBRE VARCHAR(45),
  DIFICULTAD VARCHAR(45),
  DESCRIPCION VARCHAR(200)
);

CREATE TABLE EJERCICIO(
  ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  NOMBRE VARCHAR(45),
  GRUPOMUSCULAR VARCHAR(45),
  DESCRIPCION VARCHAR(200),
  IMAGEN VARCHAR(200)
);

CREATE TABLE EJERCICIORUTINA(
  ID INT NOT NULL AUTO_INCREMENT,
  ID_RUTINA INT NOT NULL ,
  ID_EJERCICIO INT NOT NULL,
  REPETICIONES VARCHAR(45),
  FOREIGN KEY (ID_RUTINA) REFERENCES RUTINA(ID) ON DELETE CASCADE,
  FOREIGN KEY (ID_EJERCICIO) REFERENCES EJERCICIO(ID) ON DELETE CASCADE,
  CONSTRAINT PRIMARY KEY (ID,ID_RUTINA,ID_EJERCICIO)
);

CREATE TABLE RECETA(
  ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  NOMBRE VARCHAR(45),
  DESCRIPCION VARCHAR(2000),
  TIEMPO VARCHAR(30),
  IMAGEN VARCHAR(200),
  ID_USUARIO   INT,
  FOREIGN KEY (ID_USUARIO) REFERENCES USUARIO(ID) ON DELETE CASCADE
);

CREATE TABLE TOKEN (
  ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  EMAIL VARCHAR(200) NOT NULL,
  TOKEN VARCHAR(200) NOT NULL
);
CREATE TABLE COOKIESESION(
  ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  COOKIE VARCHAR(200) NOT NULL,
  ID_USUARIO INT NOT NULL ,
  FOREIGN KEY (ID_USUARIO) REFERENCES USUARIO(ID) ON DELETE CASCADE
);
