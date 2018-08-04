CREATE TABLE Comida (
  id_comida INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nombre VARCHAR NOT NULL,
  precio INTEGER UNSIGNED NOT NULL,
  tipo VARCHAR NOT NULL,
  borrado INT NOT NULL,
  cantidad INTEGER UNSIGNED NULL,
  PRIMARY KEY(id_comida)
);

CREATE TABLE Ingrediente (
  id_ingrediente INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nombre VARCHAR NOT NULL,
  cantidad INTEGER UNSIGNED NOT NULL,
  descripcion VARCHAR NULL,
  borrado INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(id_ingrediente)
);

CREATE TABLE Bebida (
  id_bebida INT UNSIGNED NOT NULL AUTO_INCREMENT,
  nombre VARCHAR NOT NULL,
  precio DOUBLE NOT NULL,
  tipo VARCHAR NOT NULL,
  borrado INT NOT NULL,
  cantidad INT NOT NULL,
  PRIMARY KEY(id_bebida)
);

CREATE TABLE Usuario (
  id_usuario VARCHAR NOT NULL AUTO_INCREMENT,
  nombre VARCHAR NOT NULL,
  pwd VARCHAR NOT NULL,
  tipo INT NOT NULL,
  fecha_inicio DATE NOT NULL,
  descripcion VARCHAR NULL,
  borrado BIT NOT NULL,
  PRIMARY KEY(id_usuario)
);

CREATE TABLE Extra (
  id_extra INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  id_ingrediente INTEGER UNSIGNED NOT NULL,
  precio DOUBLE NOT NULL,
  PRIMARY KEY(id_extra),
  FOREIGN KEY(id_ingrediente)
    REFERENCES Ingrediente(id_ingrediente)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Mesa (
  id_mesa VARCHAR NOT NULL AUTO_INCREMENT,
  id_usuario VARCHAR NOT NULL,
  nombre VARCHAR NOT NULL,
  estatus BIT NOT NULL,
  union VARCHAR NULL,
  PRIMARY KEY(id_mesa),
  FOREIGN KEY(id_usuario)
    REFERENCES Usuario(id_usuario)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Comida_has_Extra (
  id_extra INTEGER UNSIGNED NOT NULL,
  id_comida INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(id_extra, id_comida),
  FOREIGN KEY(id_comida)
    REFERENCES Comida(id_comida)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(id_extra)
    REFERENCES Extra(id_extra)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
)
TYPE=InnoDB;

CREATE TABLE Pedido (
  id_pedido INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  id_mesa VARCHAR NOT NULL,
  total DOUBLE NOT NULL,
  propina DOUBLE NOT NULL,
  borrado BIT NOT NULL,
  observacion VARCHAR NULL,
  PRIMARY KEY(id_pedido),
  FOREIGN KEY(id_mesa)
    REFERENCES Mesa(id_mesa)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Bebida_has_Pedido (
  id_bebida INT UNSIGNED NOT NULL,
  id_pedido INTEGER UNSIGNED NOT NULL,
  cantidad INTEGER UNSIGNED NOT NULL,
  descripcion VARCHAR NULL,
  PRIMARY KEY(id_bebida, id_pedido),
  FOREIGN KEY(id_bebida)
    REFERENCES Bebida(id_bebida)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(id_pedido)
    REFERENCES Pedido(id_pedido)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Comida_has_Pedido (
  id_pedido INTEGER UNSIGNED NOT NULL,
  id_comida INTEGER UNSIGNED NOT NULL,
  cantidad INTEGER UNSIGNED NOT NULL,
  descripcion VARCHAR NOT NULL,
  estado BIT NOT NULL,
  PRIMARY KEY(id_pedido, id_comida),
  FOREIGN KEY(id_comida)
    REFERENCES Comida(id_comida)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(id_pedido)
    REFERENCES Pedido(id_pedido)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);


