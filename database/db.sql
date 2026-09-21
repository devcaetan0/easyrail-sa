CREATE DATABASE IF NOT EXISTS easyraildb DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE easyraildb;


CREATE TABLE trem (
    id INT AUTO_INCREMENT PRIMARY KEY,
    modelo VARCHAR(100) NOT NULL
);


CREATE TABLE trilho (
    id INT AUTO_INCREMENT PRIMARY KEY,
    codigo_trecho VARCHAR(45)
);


CREATE TABLE sensor (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    tipo VARCHAR(45) NOT NULL,
    status VARCHAR(45) NOT NULL,
    trem_id INT,
    trilho_id INT,
    FOREIGN KEY (trem_id) REFERENCES trem(id),
    FOREIGN KEY (trilho_id) REFERENCES trilho(id)
);


CREATE TABLE perfil (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(45) NOT NULL
);


CREATE TABLE usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    perfil_id INT,
    FOREIGN KEY (perfil_id) REFERENCES perfil(id)
);


CREATE TABLE registro_sensor (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sensor_id INT NOT NULL,
    data_registro DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    valor FLOAT NOT NULL,
    FOREIGN KEY (sensor_id) REFERENCES sensor(id)
);


CREATE TABLE rota (
    id INT AUTO_INCREMENT PRIMARY KEY,
    trem_id INT NOT NULL,
    trilho_id INT NOT NULL,
    FOREIGN KEY (trem_id) REFERENCES trem(id),
    FOREIGN KEY (trilho_id) REFERENCES trilho(id)
);


CREATE TABLE carga (
    id INT AUTO_INCREMENT PRIMARY KEY,
    trem_id INT NOT NULL,
    tipo VARCHAR(100) NOT NULL,
    peso DOUBLE NOT NULL,
    FOREIGN KEY (trem_id) REFERENCES trem(id)
);