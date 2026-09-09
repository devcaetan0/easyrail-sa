INSERT INTO `easyrail`.`perfil` (`nome`) VALUES 
('Administrador Geral'),
('Operador de CCO'),
('Analista de Manutenção'),
('Gestor de Frota'),
('Maquinista');

INSERT INTO `easyrail`.`usuario` (`nome`, `email`, `senha`, `perfil_id`) VALUES 
('Carlos Almeida', 'carlos.almeida@easyrail.com.br', 'senha123', 1),
('Mariana Costa', 'mariana.costa@easyrail.com.br', 'senha123', 2),
('Roberto Silva', 'roberto.silva@easyrail.com.br', 'senha123', 2),
('Fernanda Lima', 'fernanda.lima@easyrail.com.br', 'senha123', 3),
('João Pereira', 'joao.pereira@easyrail.com.br', 'senha123', 4),
('Ana Souza', 'ana.souza@easyrail.com.br', 'senha123', 5),
('Paulo Mendes', 'paulo.mendes@easyrail.com.br', 'senha123', 5),
('Luciana Alves', 'luciana.alves@easyrail.com.br', 'senha123', 3),
('Thiago Ribeiro', 'thiago.ribeiro@easyrail.com.br', 'senha123', 2),
('Camila Rocha', 'camila.rocha@easyrail.com.br', 'senha123', 4);

INSERT INTO `easyrail`.`trem` (`modelo`) VALUES 
('Locomotiva GE AC44i - Alpha'),
('Locomotiva GE AC44i - Beta'),
('Locomotiva EMD SD70MAC - Gama'),
('Locomotiva EMD SD70MAC - Delta'),
('Locomotiva GE ES43BBi - Eco'),
('Locomotiva GE ES43BBi - Fox'),
('Vagão Motorizado Leve - VML-01'),
('Vagão Motorizado Leve - VML-02');

INSERT INTO `easyrail`.`trilho` (`codigo_trecho`) VALUES 
('TR-NORTE-001'), ('TR-NORTE-002'), ('TR-NORTE-003'), ('TR-NORTE-004'), ('TR-NORTE-005'),
('TR-SUL-001'), ('TR-SUL-002'), ('TR-SUL-003'), ('TR-SUL-004'), ('TR-SUL-005'),
('TR-LESTE-001'), ('TR-LESTE-002'), ('TR-OESTE-001'), ('TR-OESTE-002'), ('PÁTIO-CENTRAL');

INSERT INTO `easyrail`.`carga` (`trem_id`, `tipo`, `peso`) VALUES 
(1, 'Minério de Ferro', 12500.50),
(2, 'Minério de Ferro', 12450.00),
(3, 'Soja a Granel', 8500.75),
(4, 'Milho a Granel', 8300.20),
(5, 'Celulose', 6200.00),
(6, 'Combustíveis (Diesel)', 7100.00),
(7, 'Contêineres Mistos', 4500.00),
(8, 'Fertilizantes', 5800.25);

INSERT INTO `easyrail`.`rota` (`trem_id`, `trilho_id`) VALUES 
(1, 1), (1, 2), (1, 3), 
(2, 4), (2, 5), (2, 15),
(3, 6), (3, 7), (3, 8),
(4, 9), (4, 10), (4, 15),
(5, 11), (5, 12), (5, 15),
(6, 13), (6, 14), (6, 15);

INSERT INTO `easyrail`.`sensor` (`nome`, `tipo`, `status`, `trem_id`, `trilho_id`) VALUES 
('S-VEL-ALPHA', 'Velocidade', 'Ativo', 1, NULL),
('S-TEMP-MOT-ALPHA', 'Temperatura', 'Ativo', 1, NULL),
('S-VEL-BETA', 'Velocidade', 'Ativo', 2, NULL),
('S-TEMP-MOT-BETA', 'Temperatura', 'Alerta', 2, NULL),
('S-GPS-GAMA', 'Localização', 'Ativo', 3, NULL),
('S-VIBRA-DELTA', 'Vibração', 'Inativo', 4, NULL),
('S-ENER-ECO', 'Consumo Energia', 'Ativo', 5, NULL);

INSERT INTO `easyrail`.`sensor` (`nome`, `tipo`, `status`, `trem_id`, `trilho_id`) VALUES 
('S-DILATA-N01', 'Dilatação Térmica', 'Ativo', NULL, 1),
('S-PRES-N02', 'Pressão no Trilho', 'Ativo', NULL, 2),
('S-PRES-S01', 'Pressão no Trilho', 'Ativo', NULL, 6),
('S-FALHA-S02', 'Detecção de Fissura', 'Falha', NULL, 7),
('S-DILATA-PATIO', 'Dilatação Térmica', 'Ativo', NULL, 15);

INSERT INTO `easyrail`.`registro_sensor` (`sensor_id`, `data_registro`, `valor`) VALUES 
(1, '2026-09-09 08:00:00', 45.5),
(1, '2026-09-09 08:05:00', 48.0),
(1, '2026-09-09 08:10:00', 52.3),
(1, '2026-09-09 08:15:00', 55.0),
(1, '2026-09-09 08:20:00', 50.1);

INSERT INTO `easyrail`.`registro_sensor` (`sensor_id`, `data_registro`, `valor`) VALUES 
(2, '2026-09-09 08:00:00', 85.0),
(2, '2026-09-09 08:05:00', 86.5),
(2, '2026-09-09 08:10:00', 87.2),
(2, '2026-09-09 08:15:00', 86.8),
(2, '2026-09-09 08:20:00', 88.0);

INSERT INTO `easyrail`.`registro_sensor` (`sensor_id`, `data_registro`, `valor`) VALUES 
(4, '2026-09-09 08:00:00', 95.0),
(4, '2026-09-09 08:05:00', 98.5),
(4, '2026-09-09 08:10:00', 102.1),
(4, '2026-09-09 08:15:00', 105.8),
(4, '2026-09-09 08:20:00', 110.5);

INSERT INTO `easyrail`.`registro_sensor` (`sensor_id`, `data_registro`, `valor`) VALUES 
(8, '2026-09-09 06:00:00', 2.1),
(8, '2026-09-09 08:00:00', 2.5),
(8, '2026-09-09 10:00:00', 3.4),
(8, '2026-09-09 12:00:00', 4.8),
(8, '2026-09-09 14:00:00', 5.5);

INSERT INTO `easyrail`.`registro_sensor` (`sensor_id`, `data_registro`, `valor`) VALUES 
(11, '2026-09-09 07:00:00', 0),
(11, '2026-09-09 07:30:00', 0),
(11, '2026-09-09 08:00:00', 1),
(11, '2026-09-09 08:05:00', 1),
(11, '2026-09-09 08:10:00', 1);

INSERT INTO `easyrail`.`registro_sensor` (`sensor_id`, `data_registro`, `valor`) VALUES 
(7, '2026-09-09 08:00:00', 300.5), (7, '2026-09-09 08:10:00', 305.0), (7, '2026-09-09 08:20:00', 315.2),
(3, '2026-09-09 08:00:00', 60.0),  (3, '2026-09-09 08:10:00', 62.5),  (3, '2026-09-09 08:20:00', 58.0),
(9, '2026-09-09 08:00:00', 1500.0), (9, '2026-09-09 08:10:00', 1650.0), (9, '2026-09-09 08:20:00', 1700.0),
(10, '2026-09-09 08:00:00', 1200.0), (10, '2026-09-09 08:10:00', 1250.0), (10, '2026-09-09 08:20:00', 1150.0),
(12, '2026-09-09 08:00:00', 1.5), (12, '2026-09-09 10:00:00', 2.0), (12, '2026-09-09 12:00:00', 3.1);