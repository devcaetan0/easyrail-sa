CREATE DATABASE IF NOT EXISTS easyraildb DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE easyraildb;

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

CREATE TABLE trem (
    id INT AUTO_INCREMENT PRIMARY KEY,
    modelo VARCHAR(100) NOT NULL,
    carga VARCHAR(100) NOT NULL,
    usuario_id INT,

    FOREIGN KEY (usuario_id) REFERENCES usuario(id)
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

CREATE TABLE registro_sensor (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sensor_id INT NOT NULL,
    data_registro DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    valor FLOAT NOT NULL,

    FOREIGN KEY (sensor_id) REFERENCES sensor(id)
);


CREATE TABLE rota (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT,
    distancia FLOAT NOT NULL,
    duracao TIME NOT NULL,
    data_criacao DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    trem_id INT NOT NULL,

    FOREIGN KEY (trem_id) REFERENCES trem(id)
);

INSERT INTO perfil (nome) VALUES 
('Administrador'),
('Operador'),
('Analista de Manutenção'),
('Gestor de Frota'),
('Maquinista');

INSERT INTO usuario (nome, email, senha, perfil_id) VALUES 
('admin', 'admin@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 1),
('carlos.almeida', 'carlos.almeida@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 1),
('mariana.costa', 'mariana.costa@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 2),
('roberto.silva', 'roberto.silva@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 2),
('fernanda.lima', 'fernanda.lima@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 3),
('joao.pereira', 'joao.pereira@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 4),
('ana.souza', 'ana.souza@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 5),
('paulo.mendes', 'paulo.mendes@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 5),
('luciana.alves', 'luciana.alves@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 3),
('thiago.ribeiro', 'thiago.ribeiro@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 2),
('camila.rocha', 'camila.rocha@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 4);

INSERT INTO trem (modelo, carga, usuario_id) VALUES
('Locomotiva EMD SD70ACe', 'Minério de ferro', 1),
('Locomotiva GE AC44i', 'Soja e milho', 2),
('Locomotiva Wabtec ES44AC', 'Celulose', 3),
('Locomotiva GE C30-7', 'Contêineres', 1),
('Locomotiva EMD GT26MC', 'Combustível', 2);

INSERT INTO trilho (codigo_trecho) VALUES 
('TR-NORTE-001'), ('TR-NORTE-002'), ('TR-NORTE-003'), ('TR-NORTE-004'), ('TR-NORTE-005'),
('TR-SUL-001'), ('TR-SUL-002'), ('TR-SUL-003'), ('TR-SUL-004'), ('TR-SUL-005'),
('TR-LESTE-001'), ('TR-LESTE-002'), ('TR-OESTE-001'), ('TR-OESTE-002'), ('PÁTIO-CENTRAL');

INSERT INTO rota (nome, descricao, distancia, duracao, trem_id) VALUES 
('Rota Norte 1', 'Trecho inicial de transporte', 120.5, '02:30:00', 1), 
('Rota Norte 2', 'Trecho intermediário de transporte', 85.0, '01:45:00', 1), 
('Rota Norte 3', 'Trecho final de transporte', 90.2, '01:50:00', 1), 
('Rota Norte 4', 'Expresso de grãos', 150.0, '03:00:00', 2), 
('Rota Norte 5', 'Conexão com pátio', 110.5, '02:15:00', 2), 
('Retorno Pátio A', 'Manobra no pátio central', 45.0, '00:50:00', 2),
('Rota Sul 1', 'Trecho sul de celulose', 200.0, '04:00:00', 3), 
('Rota Sul 2', 'Conexão sul', 175.5, '03:30:00', 3), 
('Rota Sul 3', 'Expresso sul', 130.0, '02:40:00', 3),
('Rota Sul 4', 'Transporte de contêineres A', 95.0, '01:55:00', 4), 
('Rota Sul 5', 'Transporte de contêineres B', 105.0, '02:10:00', 4), 
('Retorno Pátio B', 'Manobra e descarregamento', 50.0, '01:00:00', 4),
('Rota Leste 1', 'Trecho leste de combustíveis', 220.0, '04:20:00', 5), 
('Rota Leste 2', 'Conexão leste', 180.0, '03:45:00', 5), 
('Retorno Pátio C', 'Manobra final', 60.0, '01:15:00', 5);