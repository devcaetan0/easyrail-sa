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

CREATE TABLE status (
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
    usuario_id INT,
    carga_id INT,
    status_id INT DEFAULT 1,

    FOREIGN KEY (status_id) REFERENCES status(id),
    FOREIGN KEY (carga_id) REFERENCES carga(id),
    FOREIGN KEY (usuario_id) REFERENCES usuario(id)
);

CREATE TABLE endereco (
    id INT AUTO_INCREMENT PRIMARY KEY,
    estado VARCHAR(45) NOT NULL,
    cidade VARCHAR(100) NOT NULL,
    bairro VARCHAR(100) NOT NULL,
    rua VARCHAR(100) NOT NULL,
    usuario_id INT NOT NULL,

    FOREIGN KEY (usuario_id) REFERENCES usuario(id)
);

CREATE TABLE rota (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT,
    distancia FLOAT NOT NULL,
    duracao TIME NOT NULL,
    data_criacao DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    trem_id INT,

    FOREIGN KEY (trem_id) REFERENCES trem(id)
);

CREATE TABLE sensor (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    tipo VARCHAR(45) NOT NULL,
    status_id INT DEFAULT 1,
    trem_id INT,
    rota_id INT,

    FOREIGN KEY (status_id) REFERENCES status(id),
    FOREIGN KEY (trem_id) REFERENCES trem(id),
    FOREIGN KEY (rota_id) REFERENCES rota(id)
);

CREATE TABLE registro_sensor (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sensor_id INT NOT NULL,
    data_registro DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    valor FLOAT NOT NULL,

    FOREIGN KEY (sensor_id) REFERENCES sensor(id)
);

INSERT INTO perfil (nome) VALUES 
('Administrador'),
('Operador'),
('Analista de Manutenção'),
('Gestor de Frota'),
('Maquinista'),
('Auditor');

INSERT INTO carga (nome) VALUES 
('Mineral'),
('Combustível'),
('Agrícola'),
('Celulose'),
('Industrial'),
('Contêineres');

INSERT INTO status (nome) VALUES 
('Ativo'),
('Inativo'),
('Manutenção');

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
('nordeley.rei', 'nordeley.rei@easyrail.com.br', '$2y$10$Si2/M8kMHvJLIYqQPh656OChuwlAbPAXHcnH.53ztKeXNqbWu4iBW', 3),
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

INSERT INTO endereco (estado, cidade, bairro, rua, usuario_id) VALUES
('Santa Catarina', 'Florianópolis', 'Centro', 'Rua Felipe Schmidt', 1),
('São Paulo', 'São Paulo', 'Pinheiros', 'Rua dos Pinheiros', 2),
('Rio de Janeiro', 'Rio de Janeiro', 'Copacabana', 'Avenida Nossa Senhora de Copacabana', 3),
('Minas Gerais', 'Belo Horizonte', 'Savassi', 'Rua Pernambuco', 4),
('Paraná', 'Curitiba', 'Batel', 'Avenida Vicente Machado', 5),
('Rio Grande do Sul', 'Porto Alegre', 'Moinhos de Vento', 'Rua Padre Chagas', 6),
('Bahia', 'Salvador', 'Pituba', 'Avenida Manoel Dias da Silva', 7),
('Pernambuco', 'Recife', 'Boa Viagem', 'Avenida Boa Viagem', 8),
('Ceará', 'Fortaleza', 'Aldeota', 'Avenida Dom Luís', 9),
('Goiás', 'Goiânia', 'Setor Bueno', 'Avenida T-10', 10),
('Distrito Federal', 'Brasília', 'Asa Sul', 'SQS 308', 11),
('Espírito Santo', 'Vitória', 'Praia do Canto', 'Rua Joaquim Lírio', 12),
('Mato Grosso', 'Cuiabá', 'Goiabeiras', 'Avenida Fernando Corrêa da Costa', 13),
('Pará', 'Belém', 'Nazaré', 'Avenida Nazaré', 14),
('Santa Catarina', 'Joinville', 'América', 'Rua Dr. João Colin', 15),
('Santa Catarina', 'Blumenau', 'Velha', 'Rua Amazonas', 16),
('Santa Catarina', 'Itajaí', 'Fazenda', 'Rua Brusque', 17),
('Santa Catarina', 'Chapecó', 'Centro', 'Avenida Getúlio Vargas', 18),
('São Paulo', 'Campinas', 'Cambuí', 'Rua Coronel Quirino', 19),
('São Paulo', 'Santos', 'Gonzaga', 'Avenida Ana Costa', 20),
('São Paulo', 'Ribeirão Preto', 'Jardim Sumaré', 'Avenida Presidente Vargas', 21),
('Rio de Janeiro', 'Niterói', 'Icaraí', 'Rua Moreira César', 22),
('Rio de Janeiro', 'Petrópolis', 'Centro', 'Rua do Imperador', 23),
('Minas Gerais', 'Uberlândia', 'Centro', 'Avenida Afonso Pena', 24),
('Minas Gerais', 'Juiz de Fora', 'São Mateus', 'Avenida Barão do Rio Branco', 25),
('Paraná', 'Londrina', 'Gleba Palhano', 'Avenida Madre Leônia Milito', 26),
('Paraná', 'Maringá', 'Zona 7', 'Avenida Colombo', 27),
('Rio Grande do Sul', 'Caxias do Sul', 'Centro', 'Rua Sinimbu', 28),
('Rio Grande do Sul', 'Pelotas', 'Centro', 'Rua Félix da Cunha', 29),
('Bahia', 'Feira de Santana', 'Centro', 'Avenida Getúlio Vargas', 30),
('Pernambuco', 'Olinda', 'Carmo', 'Rua do Amparo', 31),
('Ceará', 'Juazeiro do Norte', 'Centro', 'Rua São Pedro', 32),
('Goiás', 'Anápolis', 'Jundiaí', 'Avenida Brasil', 33),
('Mato Grosso do Sul', 'Campo Grande', 'Centro', 'Rua 14 de Julho', 34),
('Mato Grosso', 'Rondonópolis', 'Vila Aurora', 'Avenida Fernando Corrêa', 35),
('Amazonas', 'Manaus', 'Adrianópolis', 'Avenida Djalma Batista', 36),
('Pará', 'Santarém', 'Centro', 'Avenida Tapajós', 37),
('Maranhão', 'São Luís', 'Renascença', 'Avenida Colares Moreira', 38),
('Piauí', 'Teresina', 'Jóquei', 'Avenida Jóquei Clube', 39),
('Rio Grande do Norte', 'Natal', 'Ponta Negra', 'Avenida Engenheiro Roberto Freire', 40),
('Paraíba', 'João Pessoa', 'Tambaú', 'Avenida Olinda', 41),
('Alagoas', 'Maceió', 'Ponta Verde', 'Avenida Álvaro Otacílio', 42),
('Sergipe', 'Aracaju', 'Atalaia', 'Avenida Santos Dumont', 43),
('Tocantins', 'Palmas', 'Plano Diretor Sul', 'Avenida JK', 44),
('Rondônia', 'Porto Velho', 'Centro', 'Avenida Sete de Setembro', 45),
('Acre', 'Rio Branco', 'Bosque', 'Avenida Ceará', 46),
('Amapá', 'Macapá', 'Central', 'Avenida FAB', 47),
('Roraima', 'Boa Vista', 'Centro', 'Avenida Capitão Ene Garcez', 48),
('Espírito Santo', 'Vila Velha', 'Itapuã', 'Avenida Hugo Musso', 49),
('Espírito Santo', 'Serra', 'Laranjeiras', 'Avenida Eldes Scherrer Souza', 50),
('São Paulo', 'Sorocaba', 'Centro', 'Rua XV de Novembro', 51),
('São Paulo', 'São José dos Campos', 'Jardim Esplanada', 'Avenida São João', 52),
('Santa Catarina', 'Criciúma', 'Centro', 'Rua Marechal Deodoro', 53),
('Santa Catarina', 'Jaraguá do Sul', 'Baependi', 'Rua Reinoldo Rau', 54),
('Santa Catarina', 'Lages', 'Centro', 'Rua Correia Pinto', 55),
('Paraná', 'Ponta Grossa', 'Oficinas', 'Rua Balduíno Taques', 56),
('Paraná', 'Foz do Iguaçu', 'Centro', 'Avenida Brasil', 57),
('Rio Grande do Sul', 'Santa Maria', 'Nossa Senhora do Rosário', 'Rua Venâncio Aires', 58),
('Rio Grande do Sul', 'Passo Fundo', 'Centro', 'Avenida Brasil Leste', 59),
('Minas Gerais', 'Contagem', 'Eldorado', 'Avenida João César de Oliveira', 60),
('Minas Gerais', 'Montes Claros', 'Centro', 'Avenida Cula Mangabeira', 61),
('Rio de Janeiro', 'Campos dos Goytacazes', 'Parque Tamandaré', 'Avenida Pelinca', 62),
('Rio de Janeiro', 'Volta Redonda', 'Aterrado', 'Rua 33', 63),
('Bahia', 'Vitória da Conquista', 'Candeias', 'Avenida Luís Eduardo Magalhães', 64),
('Pernambuco', 'Caruaru', 'Maurício de Nassau', 'Avenida Agamenon Magalhães', 65),
('Ceará', 'Sobral', 'Centro', 'Rua Anita Garibaldi', 66),
('Goiás', 'Rio Verde', 'Setor Universitário', 'Avenida Presidente Vargas', 67);

INSERT INTO trem (modelo, carga_id, usuario_id, status_id) VALUES
('Locomotiva EMD SD70ACe', 1, 1, 1),
('Locomotiva GE AC44i', 2, 2, 1),
('Locomotiva Wabtec ES44AC', 4, 3, 1),
('Locomotiva GE C30-7', 5, 1, 3),
('Locomotiva EMD GT26MC', 2, 4, 1),
('Locomotiva Bombardier TRAXX', 3, 5, 2),
('Locomotiva Siemens Vectron', 5, 6, 1),
('Locomotiva Alstom Prima', 1, 7, 1),
('Locomotiva Stadler Eurodual', 4, 8, 1),
('Locomotiva CRRC HXD3C', 2, 9, 3),
('Locomotiva EMD SD40-2', 1, 10, 1),
('Locomotiva GE Dash 9-44CW', 2, 11, 1),
('Locomotiva EMD SD70M', 3, 12, 2),
('Locomotiva GE ES40DC', 4, 13, 1),
('Locomotiva EMD GT22', 5, 14, 1),
('Locomotiva GE U20C', 3, 15, 3),
('Locomotiva EMD G12', 1, 67, 1);

INSERT INTO rota (nome, descricao, distancia, duracao, trem_id) VALUES
('Rota Norte 1', 'Trecho inicial de transporte', 120.5, '02:30:00', 1),
('Rota Norte 2', 'Trecho intermediário de transporte', 85.0, '01:45:00', 1),
('Rota Norte 3', 'Trecho final de transporte', 90.2, '01:50:00', 1),
('Rota Norte 4', 'Expresso de grãos', 150.0, '03:00:00', 2),
('Rota Norte 5', 'Conexão com pátio', 110.5, '02:15:00', 2),
('Retorno Pátio A', 'Manobra no pátio central', 45.0, '00:50:00', 2),
('Rota Sul 1', 'Trecho sul de celulose', 200.0, '04:00:00', 3),
('Rota Sul 2', 'Conexão sul', 175.5, '03:30:00', 3),
('Rota Sul 4', 'Transporte de contêineres A', 95.0, '01:55:00', 4),
('Rota Sul 5', 'Transporte de contêineres B', 105.0, '02:10:00', 4),
('Retorno Pátio B', 'Manobra e descarregamento', 50.0, '01:00:00', 4),
('Rota Leste 1', 'Trecho leste de combustíveis', 220.0, '04:20:00', 5),
('Rota Leste 2', 'Conexão leste', 180.0, '03:45:00', 5),
('Rota Leste 3', 'Expresso leste', 140.0, '02:50:00', 6),
('Rota Oeste 1', 'Trecho oeste agrícola', 160.0, '03:10:00', 6),
('Rota Oeste 2', 'Conexão oeste', 125.5, '02:30:00', 7),
('Rota Oeste 3', 'Transporte industrial oeste', 190.0, '03:50:00', 7),
('Retorno Pátio C', 'Manobra final', 60.0, '01:15:00', 7),
('Rota Centro 1', 'Ligação com o pátio central', 70.0, '01:25:00', 8),
('Rota Centro 2', 'Trecho urbano de carga mineral', 55.5, '01:10:00', 8),
('Rota Porto 1', 'Escoamento até o porto', 230.0, '04:30:00', 8),
('Rota Serra 1', 'Subida da serra', 88.0, '02:20:00', NULL),
('Rota Serra 2', 'Descida da serra', 88.0, '01:55:00', NULL),
('Rota Litoral 1', 'Trecho litorâneo de carga mineral', 150.0, '03:00:00', NULL),
('Rota Vale 1', 'Transporte de combustíveis no vale', 135.0, '02:45:00', NULL),
('Rota Reserva 1', 'Trecho reserva para contingência', 50.0, '01:00:00', NULL);

INSERT INTO sensor (nome, tipo, status_id, trem_id, rota_id) VALUES
('Sensor de Temperatura 01', 'Temperatura', 1, 1, 1),
('Sensor de Vibração 02', 'Vibração', 1, 1, 2),
('Sensor de Velocidade 03', 'Velocidade', 3, 1, NULL),
('Sensor de Pressão 04', 'Pressão', 1, 2, 4),
('Sensor de Umidade 05', 'Umidade', 2, 2, 5),
('Sensor de Peso 06', 'Peso', 1, 2, NULL),
('Sensor de Temperatura 07', 'Temperatura', 1, 3, 7),
('Sensor de Vibração 08', 'Vibração', 1, 3, NULL),
('Sensor de Velocidade 09', 'Velocidade', 3, 4, 9),
('Sensor de Pressão 10', 'Pressão', 1, 4, 10),
('Sensor de Umidade 11', 'Umidade', 1, 4, NULL),
('Sensor de Peso 12', 'Peso', 1, 5, 12),
('Sensor de Temperatura 13', 'Temperatura', 1, 5, NULL),
('Sensor de Vibração 14', 'Vibração', 1, 9, NULL),
('Sensor de Velocidade 15', 'Velocidade', 2, 9, NULL),
('Sensor de Pressão 16', 'Pressão', 3, 10, NULL),
('Sensor de Umidade 17', 'Umidade', 1, 11, NULL),
('Sensor de Peso 18', 'Peso', 1, 11, NULL),
('Sensor de Temperatura 19', 'Temperatura', 1, 12, NULL),
('Sensor de Vibração 20', 'Vibração', 2, 12, NULL),
('Sensor de Velocidade 21', 'Velocidade', 1, NULL, NULL),
('Sensor de Pressão 22', 'Pressão', 2, NULL, NULL),
('Sensor de Umidade 23', 'Umidade', 1, NULL, NULL);