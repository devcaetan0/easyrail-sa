CREATE DATABASE IF NOT EXISTS easyraildb DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE easyraildb;

CREATE TABLE perfil (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(45) NOT NULL
);

CREATE TABLE carga (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL
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
    usuario_id INT,
    carga_id INT,

    FOREIGN KEY (carga_id) REFERENCES carga(id),
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

INSERT INTO carga (nome) VALUES 
('Mineral'),
('Combustível'),
('Agrícola'),
('Celulose'),
('Industrial'),
('Contêineres');

INSERT INTO trilho (codigo_trecho) VALUES 
('TR-NORTE-001'), ('TR-NORTE-002'), ('TR-NORTE-003'), ('TR-NORTE-004'), ('TR-NORTE-005'),
('TR-SUL-001'), ('TR-SUL-002'), ('TR-SUL-003'), ('TR-SUL-004'), ('TR-SUL-005'),
('TR-LESTE-001'), ('TR-LESTE-002'), ('TR-OESTE-001'), ('TR-OESTE-002'), ('PÁTIO-CENTRAL');

INSERT INTO usuario (nome, email, senha, perfil_id) VALUES
('admin', 'admin@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 1),
('neymar.jr', 'neymar.jr@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 1),
('wellington.rato', 'wellington.rato@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 2),
('angel.romero', 'angel.romero@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 2),
('caca.rato', 'caca.rato@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 3),
('giorgian.arrascaeta', 'giorgian.arrascaeta@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 4),
('gabigol.barbosa', 'gabigol.barbosa@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 5),
('hulk.paraiba', 'hulk.paraiba@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 5),
('deyverson.palhaco', 'deyverson.palhaco@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 3),
('fred.nove', 'fred.nove@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 2),
('weverton.paredao', 'weverton.paredao@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 4),
('pedro.raul', 'pedro.raul@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 3),
('yago.pikachu', 'yago.pikachu@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 4),
('cassio.gigante', 'cassio.gigante@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 4),
('rogerio.ceni', 'rogerio.ceni@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 5),
('adriano.imperador', 'adriano.imperador@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 2),
('richarlison.pombo', 'richarlison.pombo@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 3),
('everton.cebolinha', 'everton.cebolinha@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 4),
('bruno.henrique', 'bruno.henrique@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 5),
('gerson.santos', 'gerson.santos@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 3),
('willian.bigode', 'willian.bigode@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 4),
('hernanes.profeta', 'hernanes.profeta@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 5),
('paulinho.tigrao', 'paulinho.tigrao@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 2),
('lucas.paqueta', 'lucas.paqueta@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 5),
('miguel.borja', 'miguel.borja@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 2),
('yeferson.soteldo', 'yeferson.soteldo@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 3),
('walter.kannemann', 'walter.kannemann@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 4),
('luis.suarez', 'luis.suarez@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 5),
('pedro.geromel', 'pedro.geromel@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 3),
('diego.souza', 'diego.souza@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 4),
('edmundo.animal', 'edmundo.animal@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 5),
('romario.baixinho', 'romario.baixinho@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 2),
('carlos.tevez', 'carlos.tevez@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 3),
('fagner.lateral', 'fagner.lateral@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 4),
('cassio.ramos', 'cassio.ramos@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 5),
('renato.gaucho', 'renato.gaucho@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 3),
('paulo.baier', 'paulo.baier@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 4),
('ronaldo.fenomeno', 'ronaldo.fenomeno@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 5),
('ronaldinho.gaucho', 'ronaldinho.gaucho@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 2),
('vampeta.vampetaco', 'vampeta.vampetaco@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 3),
('emerson.sheik', 'emerson.sheik@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 4),
('luis.fabiano', 'luis.fabiano@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 5),
('obina.maluco', 'obina.maluco@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 3),
('tinga.tinga', 'tinga.tinga@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 4),
('dagoberto.pelicano', 'dagoberto.pelicano@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 5),
('tche.tche', 'tche.tche@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 2),
('alexandre.pato', 'alexandre.pato@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 3),
('renato.augusto', 'renato.augusto@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 4),
('lucas.moura', 'lucas.moura@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 5),
('alisson.becker', 'alisson.becker@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 3),
('keno.velocista', 'keno.velocista@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 4),
('dudu.palmeiras', 'dudu.palmeiras@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 5),
('jo.mineiro', 'jo.mineiro@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 2),
('diego.costa', 'diego.costa@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 3),
('matheus.pereira', 'matheus.pereira@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 4),
('fernandao.inter', 'fernandao.inter@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 5),
('dinei.bola', 'dinei.bola@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 3),
('zinho.craque', 'zinho.craque@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 4),
('mazinho.oliveira', 'mazinho.oliveira@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 5),
('zico.galinho', 'zico.galinho@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 2),
('careca.artilheiro', 'careca.artilheiro@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 3),
('tostao.mineiro', 'tostao.mineiro@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 4),
('bebeto.embalo', 'bebeto.embalo@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 5),
('jairzinho.furacao', 'jairzinho.furacao@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 3),
('garrincha.alegria', 'garrincha.alegria@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 4),
('pele.rei', 'pele.rei@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 5),
('rivaldo.canhotinha', 'rivaldo.canhotinha@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 2);

INSERT INTO trem (modelo, carga_id, usuario_id) VALUES
('Locomotiva EMD SD70ACe', 1, 1),
('Locomotiva GE AC44i', 2, 2),
('Locomotiva Wabtec ES44AC', 4, 3),
('Locomotiva GE C30-7', 6, 1),
('Locomotiva EMD GT26MC', 2, 2),
('Locomotiva Bombardier TRAXX', 3, 4),
('Locomotiva Siemens Vectron', 5, 5),
('Locomotiva Alstom Prima', 1, 6),
('Locomotiva Stadler Eurodual', 4, 7),
('Locomotiva CRRC HXD3C', 2, 8);

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