create database bd_mundo;
use bd_mundo;


create table tb_continentes (
id_continente int primary key not null auto_increment,
nome varchar(60) not null,
pop int not null,
area int not null,
total_paises int not null 
);

create table tb_governantes (
id_gov int primary key not null auto_increment,
nome varchar(60) not null,
partido varchar(60) not null,
dt_nascimento date not null,
idade int not null,
dt_inicio date not null,
dt_fim date not null
);

create table tb_paises (
id_pais int primary key not null auto_increment,
nome varchar(100) not null,
pop int not null,
area int not null,
idioma varchar(60) not null,
clima varchar(60) not null,
reg_pol varchar(60) not null,
moeda varchar(60) not null,
id_continente int not null,
id_gov int not null,
foreign key (id_continente)
references tb_continentes(id_continente),
foreign key (id_gov)
references tb_governantes(id_gov)
);

create table tb_cidades (
id_cidade int primary key not null auto_increment,
nome varchar(60) not null,
pop int not null,
area int not null,
clima varchar(60) not null,
dt_fund date not null,
id_pais int not null,
id_gov int not null,
foreign key (id_pais)
references tb_paises(id_pais),
foreign key (id_gov)
references tb_governantes(id_gov)
);

-- Continentes
INSERT INTO tb_continentes (nome, pop, area, total_paises) VALUES
('África', 1460000000, 30370000, 54),
('América do Norte', 602000000, 24709000, 23),
('América do Sul', 439000000, 17840000, 12),
('Ásia', 4780000000, 44579000, 49),
('Europa', 748000000, 10180000, 44),
('Oceania', 46000000, 8526000, 14),
('Antártida', 0, 14000000, 0);

-- Governantes 
INSERT INTO tb_governantes (nome, partido, dt_nascimento, idade, dt_inicio, dt_fim) VALUES
( 'Cyril Ramaphosa', 'ANC', '1952-11-17', 73, '2018-02-15', '2029-06-01'),
('Abdel Fattah el-Sisi', 'Independente', '1954-11-19', 71, '2014-06-08', '2030-04-02'),
( 'Bola Tinubu', 'APC', '1952-03-29', 74, '2023-05-29', '2027-05-29'),
('William Ruto', 'UDA', '1966-12-21', 59, '2022-09-13', '2027-09-13'),
( 'João Lourenço', 'MPLA', '1954-03-05', 72, '2017-09-26', '2027-09-26'),
( 'Joe Biden', 'Democrata', '1942-11-20', 83, '2021-01-20', '2025-01-20'),
( 'Justin Trudeau', 'Liberal', '1971-12-25', 54, '2015-11-04', '2025-10-20'),
( 'Claudia Sheinbaum', 'MORENA', '1962-06-24', 63, '2024-10-01', '2030-09-30'),
( 'Rodrigo Chaves', 'PPSD', '1961-06-10', 65, '2022-05-08', '2026-05-08'),
( 'Miguel Díaz-Canel', 'PCC', '1960-04-20', 66, '2018-04-19', '2028-04-19'),
( 'Luiz Inácio Lula da Silva', 'PT', '1945-10-27', 80, '2023-01-01', '2026-12-31'),
( 'Javier Milei', 'La Libertad Avanza', '1970-10-22', 55, '2023-12-10', '2027-12-10'),
( 'Gabriel Boric', 'Convergencia Social', '1986-02-11', 40, '2022-03-11', '2026-03-11'),
( 'Gustavo Petro', 'Colombia Humana', '1960-04-19', 66, '2022-08-07', '2026-08-07'),
( 'Dina Boluarte', 'Independente', '1962-05-31', 64, '2022-12-07', '2026-07-28'),
( 'Xi Jinping', 'PCC', '1953-06-15', 73, '2013-03-14', '2028-03-14'),
( 'Narendra Modi', 'BJP', '1950-09-17', 75, '2014-05-26', '2029-05-26'),
( 'Shigeru Ishiba', 'LDP', '1957-02-04', 69, '2024-10-01', '2025-10-01'),
( 'Yoon Suk-yeol', 'PPP', '1960-12-18', 65, '2022-05-10', '2027-05-10'),
( 'Prabowo Subianto', 'Gerindra', '1951-10-17', 74, '2024-10-20', '2029-10-20'),
('Emmanuel Macron', 'RE', '1977-12-21', 48, '2017-05-14', '2027-05-14'),
( 'Olaf Scholz', 'SPD', '1958-06-14', 68, '2021-12-08', '2025-10-01'),
( 'Keir Starmer', 'Trabalhista', '1962-09-02', 63, '2024-07-05', '2029-07-05'),
( 'Giorgia Meloni', 'FdI', '1977-01-15', 49, '2022-10-22', '2027-10-22'),
( 'Pedro Sánchez', 'PSOE', '1972-02-29', 54, '2018-06-02', '2027-11-01'),
( 'Anthony Albanese', 'Trabalhista', '1963-03-02', 63, '2022-05-23', '2025-05-23'),
( 'Christopher Luxon', 'Nacional', '1970-07-19', 55, '2023-11-27', '2026-11-27'),
( 'James Marape', 'Pangu Pati', '1971-04-24', 55, '2019-05-30', '2027-07-01'),
( 'Sitiveni Rabuka', 'People''s Alliance', '1948-09-13', 77, '2022-12-24', '2026-12-24'),
( 'Taneti Maamau', 'TKP', '1949-09-16', 76, '2016-03-11', '2024-09-13');

-- Governantes
INSERT INTO tb_governantes (nome, partido, dt_nascimento, idade, dt_inicio, dt_fim) VALUES
-- África do Sul (Cidades 1 a 5)
( 'Geordin Hill-Lewis', 'Democratic Alliance', '1986-12-01', 39, '2021-11-18', '2026-11-01'),
( 'Cilliers Brink', 'Democratic Alliance', '1987-06-12', 39, '2023-03-28', '2026-11-01'),
('Kabelo Gwamanda', 'Al Jama-ah', '1984-10-23', 41, '2023-05-05', '2026-11-01'),
( 'Mxolisi Kaunda', 'African National Congress', '1972-09-15', 53, '2019-09-05', '2026-11-01'),
( 'Gregory Nthatisi', 'African National Congress', '1964-04-02', 62, '2023-04-14', '2026-11-01'),
-- Egito (Cidades 6 a 10)
( 'Khaled Abdel Aal', 'Independente', '1959-07-10', 66, '2018-08-30', '2026-08-30'),
( 'Mohamed Taher El-Sherif', 'Independente', '1961-03-14', 65, '2019-11-27', '2026-11-27'),
( 'Ahmed Rashed', 'Independente', '1956-11-05', 69, '2018-09-01', '2026-09-01'),
( 'Adel Ghadban', 'Independente', '1957-01-20', 69, '2015-12-26', '2026-12-26'),
( 'Mustafa Alham', 'Independente', '1960-08-18', 65, '2018-09-01', '2026-09-01'),
-- Nigéria (Cidades 11 a 15)
('Babajide Sanwo-Olu', 'All Progressives Congress', '1965-06-25', 60, '2019-05-29', '2027-05-29'),
( 'Nyesom Wike', 'People''s Democratic Party', '1967-12-13', 58, '2023-08-21', '2027-08-21'),
( 'Kabiru Yusuf', 'New Nigeria People''s Party', '1962-02-04', 64, '2023-05-29', '2027-05-29'),
( 'Seyi Makinde', 'People''s Democratic Party', '1967-12-25', 58, '2019-05-29', '2027-05-29'),
( 'Siminalayi Fubara', 'People''s Democratic Party', '1975-01-28', 51, '2023-05-29', '2027-05-29'),
-- Quênia (Cidades 16 a 20)
( 'Johnson Sakaja', 'United Democratic Alliance', '1985-02-02', 41, '2022-08-25', '2027-08-25'),
( 'Abdulswamad Nassir', 'Orange Democratic Movement', '1974-12-25', 51, '2022-09-15', '2027-09-15'),
( 'Anyang Nyong''o', 'Orange Democratic Movement', '1945-10-10', 80, '2017-08-21', '2027-08-21'),
( 'Susan Kihika', 'United Democratic Alliance', '1974-03-20', 52, '2022-08-25', '2027-08-25'),
( 'Jonathan Bii', 'United Democratic Alliance', '1969-01-01', 57, '2022-08-25', '2027-08-25'),
-- Angola (Cidades 21 a 25)
( 'Manuel Homem', 'MPLA', '1981-11-24', 44, '2022-09-16', '2027-09-16'),
( 'Luís Nunes', 'MPLA', '1962-03-10', 64, '2021-05-12', '2026-05-12'),
( 'Lotti Nolika', 'MPLA', '1960-07-05', 65, '2020-05-25', '2026-05-25'),
( 'Armando Vieira', 'MPLA', '1968-09-14', 57, '2022-10-02', '2027-10-02'),
( 'Evaristo de Mário', 'MPLA', '1974-04-18', 52, '2023-01-15', '2028-01-15'),
-- Estados Unidos (Cidades 26 a 30)
( 'Eric Adams', 'Democrata', '1960-09-01', 65, '2022-01-01', '2026-01-01'),
( 'Karen Bass', 'Democrata', '1953-10-03', 72, '2022-12-12', '2026-12-12'),
( 'Brandon Johnson', 'Democrata', '1976-03-27', 50, '2023-05-15', '2027-05-15'),
( 'John Whitmire', 'Democrata', '1949-08-13', 76, '2024-01-01', '2028-01-01'),
( 'Muriel Bowser', 'Democrata', '1972-08-02', 53, '2015-01-02', '2027-01-02'),
-- Canadá (Cidades 31 a 35)
( 'Olivia Chow', 'Novo Partido Democrático', '1957-03-24', 69, '2023-07-12', '2026-10-26'),
( 'Valérie Plante', 'Projet Montréal', '1974-06-14', 52, '2017-11-16', '2025-11-16'),
( 'Ken Sim', 'ABC Vancouver', '1970-10-18', 55, '2022-11-07', '2026-10-17'),
( 'Mark Sutcliffe', 'Independente', '1968-07-14', 57, '2022-11-15', '2026-11-15'),
( 'Jyoti Gondek', 'Independente', '1969-01-01', 57, '2021-10-25', '2025-10-25'),
-- México (Cidades 36 a 40)
( 'Clara Brugada', 'MORENA', '1963-08-12', 62, '2024-10-05', '2030-10-04'),
( 'Verónica Delgadillo', 'Movimiento Ciudadano', '1982-11-13', 43, '2024-10-01', '2027-09-30'),
( 'Adrian de la Garza', 'PRI', '1971-09-17', 54, '2024-09-30', '2027-09-29'),
( 'Ana Patricia Peralta', 'MORENA', '1990-06-11', 36, '2022-09-26', '2024-09-29'),
('José Chedraui', 'MORENA', '1968-03-06', 58, '2024-10-15', '2027-10-14'),
-- Costa Rica (Cidades 41 a 45)
( 'Diego Miranda', 'Juntos San José', '1989-12-05', 36, '2024-05-01', '2028-04-30'),
( 'Roberto Thompson', 'Liberación Nacional', '1960-07-10', 65, '2024-05-01', '2028-04-30'),
( 'Mario Redondo', 'Alianza Demócrata Cristiana', '1962-10-26', 63, '2020-05-01', '2024-04-30'),
( 'Angela Aguilar', 'Independente', '1973-04-15', 53, '2024-05-01', '2028-04-30'),
( 'Randall Chavarría', 'Unidad Social Cristiana', '1970-08-22', 55, '2024-05-01', '2028-04-30'),
-- Cuba (Cidades 46 a 50)
( 'Reinaldo García Zapata', 'Partido Comunista de Cuba', '1968-03-12', 58, '2020-01-18', '2025-01-18'),
( 'Yaneydis Hechavarría', 'Partido Comunista de Cuba', '1981-05-14', 45, '2020-01-18', '2025-01-18'),
( 'Yoseily Góngora', 'Partido Comunista de Cuba', '1979-11-02', 46, '2020-01-18', '2025-01-18'),
( 'Julio César Estupiñán', 'Partido Comunista de Cuba', '1972-07-20', 53, '2020-01-18', '2025-01-18'),
( 'Alis Azahares', 'Partido Comunista de Cuba', '1975-08-15', 50, '2023-05-28', '2028-05-28'),
-- Brasil (Cidades 51 a 55)
( 'Ricardo Nunes', 'MDB', '1967-11-13', 58, '2021-05-16', '2028-12-31'),
( 'Eduardo Paes', 'PSD', '1969-11-14', 56, '2021-01-01', '2028-12-31'),
( 'Ibaneis Rocha', 'MDB', '1971-07-10', 54, '2019-01-01', '2026-12-31'),
( 'Bruno Reis', 'União Brasil', '1977-05-17', 49, '2021-01-01', '2028-12-31'),
( 'Evandro Leitão', 'PT', '1967-04-16', 59, '2025-01-01', '2028-12-31'),
-- Argentina (Cidades 56 a 60)
( 'Jorge Macri', 'PRO', '1965-03-05', 61, '2023-12-10', '2027-12-10'),
( 'Daniel Passerini', 'Hacemos por Córdoba', '1965-03-11', 61, '2023-12-10', '2027-12-10'),
( 'Pablo Javkin', 'Creo', '1971-11-19', 54, '2019-12-10', '2027-12-10'),
( 'Ulpiano Suarez', 'Unión Cívica Radical', '1970-09-02', 55, '2019-12-10', '2027-12-10'),
( 'Julio Alak', 'Unión por la Patria', '1958-01-09', 68, '2023-12-10', '2027-12-10'),
-- Chile (Cidades 61 a 65)
( 'Claudio Orrego', 'Independente', '1966-12-20', 59, '2021-07-14', '2025-01-06'),
( 'Jorge Sharp', 'Transformar Chile', '1985-03-25', 41, '2016-12-06', '2024-12-06'),
( 'Álvaro Ortiz', 'Partido Demócrata Cristiano', '1977-12-28', 48, '2012-12-06', '2024-12-06'),
( 'Jonathan Velásquez', 'Independente', '1975-01-24', 51, '2021-06-28', '2024-12-06'),
( 'Claudio Radonich', 'Renovación Nacional', '1973-01-25', 53, '2016-12-06', '2024-12-06'),
-- Colômbia (Cidades 66 a 70)
( 'Carlos Fernando Galán', 'Nuevo Liberalismo', '1977-06-04', 49, '2024-01-01', '2027-12-31'),
( 'Federico Gutiérrez', 'Creemos Colombia', '1974-11-29', 51, '2024-01-01', '2027-12-31'),
( 'Alejandro Eder', 'Revivamos Cali', '1975-12-01', 50, '2024-01-01', '2027-12-31'),
( 'Alejandro Char', 'Cambio Radical', '1966-04-16', 60, '2024-01-01', '2027-12-31'),
( 'Dumek Turbay', 'En Marcha', '1971-02-14', 55, '2024-01-01', '2027-12-31'),
-- Peru (Cidades 71 a 75)
( 'Rafael López Aliaga', 'Renovación Popular', '1961-02-11', 65, '2023-01-01', '2026-12-31'),
( 'Víctor Hugo Rivera', 'Juntos por el Desarrollo', '1967-11-12', 58, '2023-01-01', '2026-12-31'),
( 'Mario Reyna', 'Alianza para el Progresso', '1976-08-20', 49, '2024-01-15', '2026-12-31'),
( 'Luis Pantoja Calvo', 'Inka Cusco', '1960-05-10', 66, '2023-01-01', '2026-12-31'),
( 'Vladimir Chong', 'Somos Perú', '1975-03-15', 51, '2023-01-01', '2026-12-31'),
-- China (Cidades 76 a 80)
( 'Yin Yong', 'Partido Comunista da China', '1969-08-01', 56, '2022-10-28', '2027-10-28'),
( 'Gong Zheng', 'Partido Comunista da China', '1960-03-01', 66, '2020-03-23', '2025-03-23'),
( 'Qin Weizhong', 'Partido Comunista da China', '1971-07-01', 54, '2021-04-24', '2026-04-24'),
( 'Sun Zhiyang', 'Partido Comunista da China', '1974-05-01', 52, '2023-10-09', '2028-10-09'),
( 'Wang Fengchao', 'Partido Comunista da China', '1965-12-01', 60, '2020-08-29', '2025-08-29'),
-- Índia (Cidades 81 a 85)
( 'Arvinder Singh Lovely', 'Indian National Congress', '1968-12-11', 57, '2023-08-31', '2026-08-31'),
( 'Bhushan Gagrani', 'Independente', '1966-06-18', 59, '2024-03-20', '2027-03-20'),
( 'Tushar Giri Nath', 'Independente', '1968-09-25', 57, '2022-05-16', '2025-05-16'),
( 'Firhad Hakim', 'All India Trinamool Congress', '1959-01-01', 67, '2021-12-24', '2026-12-24'),
( 'Ronald Rose', 'Independente', '1979-05-15', 47, '2023-07-12', '2026-07-12'),
-- Japão (Cidades 86 a 90)
( 'Yuriko Koike', 'Tomin First no Kai', '1952-07-15', 73, '2016-08-02', '2028-07-30'),
( 'Hideyuki Yokoyama', 'Osaka Ishin no Kai', '1981-05-13', 45, '2023-04-09', '2027-04-08'),
( 'Koji Matsui', 'Independente', '1960-05-14', 66, '2024-02-25', '2028-02-24'),
( 'Takeharu Yamanaka', 'Independente', '1972-09-27', 53, '2021-08-30', '2025-08-29'),
( 'Katsuhiro Akimoto', 'Independente', '1955-02-02', 71, '2015-05-02', '2027-05-01'),
-- Coreia do Sul (Cidades 91 a 95)
( 'Oh Se-hoon', 'Partido do Poder Popular', '1961-01-04', 65, '2021-04-08', '2026-06-30'),
( 'Park Heong-joon', 'Partido do Poder Popular', '1960-02-13', 66, '2021-04-08', '2026-06-30'),
( 'Yoo Jeong-bok', 'Partido do Poder Popular', '1957-06-16', 69, '2022-07-01', '2026-06-30'),
( 'Hong Joon-pyo', 'Partido do Poder Popular', '1954-12-05', 71, '2022-07-01', '2026-06-30'),
( 'Lee Jang-woo', 'Partido do Poder Popular', '1965-02-10', 61, '2022-07-01', '2026-06-30'),
-- Indonésia (Cidades 96 a 100)
( 'Heru Budi Hartono', 'Independente', '1965-12-13', 60, '2022-10-17', '2024-10-17'),
( 'Eri Cahyadi', 'PDI-P', '1977-05-27', 49, '2021-02-26', '2024-12-31'),
( 'Bambang Tirtoyuliono', 'Independente', '1966-07-10', 59, '2023-09-20', '2024-09-20'),
( 'Bobby Nasution', 'Gerindra', '1991-07-05', 34, '2021-02-26', '2024-12-31'),
( 'Bambang Susantono', 'Independente', '1963-11-04', 62, '2022-03-10', '2024-06-03'),
-- França (Cidades 101 a 105)
( 'Anne Hidalgo', 'Partido Socialista', '1959-06-19', 67, '2014-04-05', '2026-04-05'),
( 'Benoît Payan', 'Partido Socialista', '1978-01-31', 48, '2020-12-21', '2026-12-21'),
( 'Grégory Doucet', 'Os Verdes', '1973-08-22', 52, '2020-07-04', '2026-07-04'),
( 'Jean-Luc Moudenc', 'Os Republicanos', '1960-07-19', 65, '2014-04-04', '2026-04-04'),
( 'Christian Estrosi', 'Horizons', '1955-06-01', 71, '2017-05-15', '2026-05-15'),
-- Alemanha (Cidades 106 a 110)
( 'Kai Wegner', 'CDU', '1972-09-15', 53, '2023-04-27', '2026-10-27'),
( 'Peter Tschentscher', 'SPD', '1966-01-20', 60, '2018-03-28', '2025-03-28'),
( 'Dieter Reiter', 'SPD', '1958-05-19', 68, '2014-05-01', '2026-05-01'),
( 'Henriette Reker', 'Independente', '1956-12-09', 69, '2015-11-09', '2025-11-09'),
( 'Mike Josef', 'SPD', '1983-01-25', 43, '2023-05-11', '2029-05-11'),
-- Reino Unido (Cidades 111 a 115)
( 'Sadiq Khan', 'Trabalhista', '1970-10-08', 55, '2016-05-09', '2028-05-09'),
( 'John Cotton', 'Trabalhista', '1973-04-12', 53, '2023-05-23', '2024-05-23'),
( 'Bev Craig', 'Trabalhista', '1985-04-20', 41, '2021-12-01', '2024-12-01'),
( 'Jacqueline McLaren', 'National Party', '1965-02-18', 61, '2022-05-19', '2027-05-19'),
( 'Robert Aldridge', 'Liberal Democratas', '1955-06-30', 70, '2022-05-26', '2027-05-26'),
-- Itália (Cidades 116 a 120)
( 'Roberto Gualtieri', 'Partido Democrático', '1966-07-19', 59, '2021-10-21', '2026-10-21'),
( 'Giuseppe Sala', 'Independente de Centro-Esquerda', '1958-05-28', 68, '2016-06-21', '2026-06-21'),
( 'Gaetano Manfredi', 'Independente', '1964-01-04', 62, '2021-10-18', '2026-10-18'),
( 'Stefano Lo Russo', 'Partido Democrático', '1975-10-15', 50, '2021-10-27', '2026-10-27'),
( 'Roberto Lagalla', 'União dos Democratas Cristãos', '1955-04-16', 71, '2022-06-20', '2027-06-20'),
-- Espanha (Cidades 121 a 125)
( 'José Luis Martínez-Almeida', 'Partido Popular', '1975-04-17', 51, '2019-06-15', '2027-06-15'),
( 'Jaume Collboni', 'Partido dos Socialistas da Catalunha', '1969-09-05', 56, '2023-06-17', '2027-06-17'),
( 'María José Catalá', 'Partido Popular', '1981-03-03', 45, '2023-06-17', '2027-06-17'),
( 'José Luis Sanz', 'Partido Popular', '1968-09-21', 57, '2023-06-17', '2027-06-17'),
( 'Natalia Chueca', 'Partido Popular', '1976-09-16', 49, '2023-06-17', '2027-06-17'),
-- Austrália (Cidades 126 a 130)
( 'Clover Moore', 'Independente', '1945-10-22', 80, '2004-03-27', '2024-09-14'),
( 'Nick Reece', 'Independente', '1974-08-11', 51, '2024-07-02', '2024-10-31'),
( 'Adrian Schrinner', 'Liberal National Party', '1977-07-29', 48, '2019-04-08', '2028-03-31'),
( 'Basil Zempilas', 'Independente', '1971-07-30', 54, '2020-10-19', '2025-10-19'),
( 'Andrew Barr', 'Trabalhista', '1973-04-29', 53, '2014-12-11', '2024-10-19'),
-- Nova Zelândia (Cidades 131 a 135)
( 'Wayne Brown', 'Independente', '1946-08-22', 79, '2022-10-28', '2025-10-28'),
( 'Tory Whanau', 'Independente (Verde)', '1983-06-12', 43, '2022-10-28', '2025-10-28'),
( 'Phil Mauger', 'Independente', '1958-11-14', 67, '2022-10-28', '2025-10-28'),
( 'Paula Southgate', 'Independente', '1962-04-05', 64, '2019-10-24', '2025-10-24'),
( 'Jules Radich', 'Independente', '1954-09-18', 71, '2022-10-28', '2025-10-28'),
-- Papua Nova Guiné (Cidades 136 a 140)
( 'John Rosso', 'Pangu Pati', '1970-08-14', 55, '2022-08-09', '2027-08-09'),
( 'James Khay', 'Independente', '1975-03-22', 51, '2022-09-01', '2027-09-01'),
( 'Nathaniel Mora', 'People''s Progress Party', '1980-11-05', 45, '2022-09-10', '2027-09-10'),
( 'Peter Yama', 'People''s Labour Party', '1955-04-14', 71, '2017-08-10', '2022-08-10'),
( 'Ezekiel Massingan', 'Independente', '1973-06-18', 52, '2022-09-15', '2027-09-15'),
-- Fiji (Cidades 141 a 145)
( 'Tevita Boseiwaqa', 'Independente', '1968-07-25', 57, '2024-02-01', '2025-02-01'),
( 'Imanueli Louvatu', 'Independente', '1972-11-12', 53, '2024-02-01', '2025-02-01'),
( 'Isireli Dausiga', 'Independente', '1970-04-15', 56, '2024-02-01', '2025-02-01'),
( 'Salik Govind', 'FijiFirst', '1953-09-08', 72, '2024-02-01', '2025-02-01'),
( 'Paul Jaduram', 'Independente', '1951-03-14', 75, '2024-02-01', '2025-02-01'),
-- Kiribati (Cidades 146 a 150)
( 'Baraniko Baaro', 'Tobwaan Kiribati Party', '1974-12-05', 51, '2022-04-15', '2026-04-15'),
( 'Teburoro Tito', 'Boutokan Kiribati Moa', '1952-08-25', 73, '2022-04-15', '2026-04-15'),
( 'Etera Teangana', 'Tobwaan Kiribati Party', '1978-01-20', 48, '2022-04-15', '2026-04-15'),
( 'Karia Biriata', 'Independente', '1981-06-14', 45, '2022-04-15', '2026-04-15'),
( 'Ieremia Tabai', 'Boutokan Kiribati Moa', '1950-12-16', 75, '2022-04-15', '2026-04-15');

INSERT INTO tb_paises (nome, pop, area, idioma, clima, reg_pol, moeda, id_continente, id_gov) VALUES
-- África (id_continente = 1)
('África do Sul', 60400000, 1221037, 'Inglês', 'Semiarid e Subtropical', 'República Parlamentarista', 'Rand (ZAR)', 1, 1),
('Egito', 112000000, 1002450, 'Árabe', 'Árido e Desértico', 'República Semipresidencialista', 'Libra Egípcia (EGP)', 1, 2),
('Nigéria', 223800000, 923768, 'Inglês', 'Tropical e Semiarid', 'República Presidencialista', 'Naira (NGN)', 1, 3),
('Quênia', 55100000, 580367, 'Inglês', 'Tropical e Semiarid', 'República Presidencialista', 'Xelim Queniano (KES)', 1, 4),
('Angola', 36700000, 1246700, 'Português', 'Tropical e Semiarid', 'República Presidencialista', 'Kwanza (AOA)', 1, 5),

-- América do Norte (id_continente = 2)
('Estados Unidos', 339000000, 9833517, 'Inglês', 'Temperado', 'República Presidencialista', 'Dólar Americano (USD)', 2, 6),
('Canadá', 38200000, 9984670, 'Inglês e Francês', 'Subártico', 'Monarquia Constitucional', 'Dólar Canadense (CAD)', 2, 7),
('México', 128000000, 1964375, 'Espanhol', 'Tropical e Desértico', 'República Presidencialista', 'Peso Mexicano (MXN)', 2, 8),
('Costa Rica', 5100000, 51100, 'Espanhol', 'Tropical', 'República Presidencialista', 'Colón Costarriquenho (CRC)', 2, 9),
('Cuba', 11000000, 109884, 'Espanhol', 'Tropical Semitropical', 'Estado Socialista', 'Peso Cubano (CUP)', 2, 10),

-- América do Sul (id_continente = 3)
('Brasil', 214000000, 8515767, 'Português', 'Tropical', 'República Presidencialista', 'Real (BRL)', 3, 11),
('Argentina', 46000000, 2780400, 'Espanhol', 'Temperado e Subtropical', 'República Presidencialista', 'Peso Argentino (ARS)', 3, 12),
('Chile', 19600000, 756102, 'Espanhol', 'Mediterrâneo e Desértico', 'República Presidencialista', 'Peso Chileno (CLP)', 3, 13),
('Colômbia', 52000000, 1141748, 'Espanhol', 'Equatorial e Tropical', 'República Presidencialista', 'Peso Colombiano (COP)', 3, 14),
('Peru', 34000000, 1285216, 'Espanhol e Quechua', 'Variado e Árido', 'República Presidencialista', 'Sol (PEN)', 3, 15),

-- Ásia (id_continente = 4)
('China', 1412000000, 9596961, 'Mandarim', 'Variado', 'Estado Socialista', 'Yuan (CNY)', 4, 16),
('Índia', 1428000000, 3287263, 'Hindi e Inglês', 'Monçônico e Tropical', 'República Parlamentarista', 'Rúpia Indiana (INR)', 4, 17),
('Japão', 125000000, 377975, 'Japonês', 'Temperado Marítimo', 'Monarquia Constitucional', 'Iene (JPY)', 4, 18),
('Coreia do Sul', 51700000, 100210, 'Coreano', 'Temperado Continental', 'República Presidencialista', 'Won Sul-coreano (KRW)', 4, 19),
('Indonésia', 277000000, 1904569, 'Indonésio', 'Equatorial', 'República Presidencialista', 'Rúpia Indonésia (IDR)', 4, 20),

-- Europa (id_continente = 5)
('França', 68000000, 551695, 'Francês', 'Temperado Oceânico', 'República Semipresidencialista', 'Euro (EUR)', 5, 21),
('Alemanha', 84000000, 357022, 'Alemão', 'Temperado Continental', 'República Parlamentarista', 'Euro (EUR)', 5, 22),
('Reino Unido', 67000000, 242495, 'Inglês', 'Temperado Marítimo', 'Monarquia Constitucional', 'Libra Esterlina (GBP)', 5, 23),
('Itália', 59000000, 301340, 'Italiano', 'Mediterrâneo', 'República Parlamentarista', 'Euro (EUR)', 5, 24),
('Espanha', 48000000, 505990, 'Espanhol', 'Mediterrâneo', 'Monarquia Constitucional', 'Euro (EUR)', 5, 25),

-- Oceania (id_continente = 6)
('Austrália', 26000000, 7692024, 'Inglês', 'Árido e Temperado', 'Monarquia Constitucional', 'Dólar Australiano (AUD)', 6, 26),
('Nova Zelândia', 5100000, 268021, 'Inglês e Maori', 'Temperado Marítimo', 'Monarquia Constitucional', 'Dólar da Nova Zelândia (NZD)', 6, 27),
('Papua Nova Guiné', 10000000, 462840, 'Tok Pisin e Inglês', 'Tropical Equatorial', 'Monarquia Constitucional', 'Kina (PGK)', 6, 28),
('Fiji', 930000, 18274, 'Fijiano e Inglês', 'Tropical Marítimo', 'República Parlamentarista', 'Dólar de Fiji (FJD)', 6, 29),
('Kiribati', 130000, 811, 'Quiribatiano e Inglês', 'Tropical Marítimo', 'República Presidencialista', 'Dólar Australiano (AUD)', 6, 30);

INSERT INTO tb_cidades (nome, pop, area, clima, dt_fund, id_pais, id_gov) VALUES

-- África do Sul (id_pais = 1)
('Cidade do Cabo', 4700000, 2446, 'Mediterrâneo', '1652-04-06', 1, 31),
('Pretória', 2470000, 687, 'Subtropical Úmido', '1855-11-16', 1, 32),
('Joanesburgo', 4430000, 1645, 'Subtropical de Altitude', '1886-10-04', 1, 33),
('Durban', 3440000, 2292, 'Subtropical Úmido', '1835-06-23', 1, 34),
('Bloemfontein', 556000, 236, 'Semiárido', '1846-03-11', 1, 35),

-- Egito (id_pais = 2)
('Cairo', 10100000, 3085, 'Árido e Desértico', '0969-07-06', 2, 36),
('Alexandria', 5200000, 2679, 'Mediterrâneo', '0331-01-01', 2, 37),
('Giza', 4879000, 1580, 'Árido e Desértico', '0642-01-01', 2, 38),
('Port Said', 750000, 1351, 'Mediterrâneo', '1859-04-25', 2, 39),
('Luxor', 1300000, 416, 'Árido e Desértico', '1400-01-01', 2, 40),

-- Nigéria (id_pais = 3)
('Lagos', 15300000, 1171, 'Tropical Atlântico', '1472-03-01', 3, 41),
('Abuja', 1200000, 713, 'Tropical de Savana', '1976-02-03', 3, 42),
('Kano', 4100000, 499, 'Semiárido', '0999-01-01', 3, 43),
('Ibadan', 3600000, 3080, 'Tropical Úmido', '1829-01-01', 3, 44),
('Port Harcourt', 3100000, 360, 'Monçônico Tropical', '1912-01-01', 3, 45),

-- Quênia (id_pais = 4)
('Nairóbi', 4400000, 696, 'Subtropical de Altitude', '1899-04-16', 4, 46),
('Mombasa', 1200000, 212, 'Tropical Úmido', '0900-01-01', 4, 47),
('Kisumu', 410000, 139, 'Tropical de Savana', '1901-01-01', 4, 48),
('Nakuru', 570000, 290, 'Subtropical de Altitude', '1904-01-01', 4, 49),
('Eldoret', 475000, 147, 'Subtropical de Altitude', '1910-01-01', 4, 50),

-- Angola (id_pais = 5)
('Luanda', 9300000, 113, 'Tropical Semiárido', '1576-01-25', 5, 51),
('Benguela', 555000, 2100, 'Semiárido', '1617-05-17', 5, 52),
('Huambo', 815000, 2600, 'Subtropical de Altitude', '1912-08-08', 5, 53),
('Lubango', 432000, 3140, 'Subtropical de Altitude', '1923-05-31', 5, 54),
('Lobito', 393000, 3648, 'Semiárido', '1913-09-02', 5, 55),

-- Estados Unidos (id_pais = 6)
('Nova York', 8335000, 783, 'Temperado', '1624-05-24', 6, 56),
('Los Angeles', 3822000, 1302, 'Mediterrâneo', '1781-09-04', 6, 57),
('Chicago', 2665000, 606, 'Continental', '1837-03-04', 6, 58),
('Houston', 2300000, 1739, 'Subtropical', '1836-08-30', 6, 59),
('Washington D.C.', 671000, 177, 'Temperado', '1790-07-16', 6, 60),

-- Canadá (id_pais = 7)
('Toronto', 2930000, 630, 'Continental', '1793-08-27', 7, 61),
('Montreal', 1760000, 365, 'Continental', '1642-05-17', 7, 62),
('Vancouver', 662000, 115, 'Oceânico', '1886-04-06', 7, 63),
('Ottawa', 1017000, 2790, 'Continental', '1826-09-26', 7, 64),
('Calgary', 1306000, 825, 'Semiárido', '1875-08-01', 7, 65),

-- México (id_pais = 8)
('Cidade do México', 9209000, 1485, 'Subtropical de Altitude', '1325-03-13', 8, 66),
('Guadalajara', 1385000, 151, 'Subtropical', '1542-02-14', 8, 67),
('Monterrey', 1142000, 324, 'Semiárido', '1596-09-20', 8, 68),
('Cancún', 888000, 197, 'Tropical', '1970-04-20', 8, 69),
('Puebla', 1692000, 546, 'Subtropical', '1531-04-16', 8, 70),

-- Costa Rica (id_pais = 9)
('San José', 342000, 44, 'Tropical', '1738-05-21', 9, 71),
('Alajuela', 43000, 9, 'Tropical', '1782-10-12', 9, 72),
('Cartago', 23000, 6, 'Tropical de Altitude', '1563-10-29', 9, 73),
('Heredia', 34000, 5, 'Tropical', '1706-03-14', 9, 74),
('Puntarenas', 35000, 11, 'Tropical Safana', '1858-09-17', 9, 75),

-- Cuba (id_pais = 10)
('Havana', 2130000, 728, 'Tropical', '1515-08-25', 10, 76),
('Santiago de Cuba', 431000, 1023, 'Tropical', '1515-07-25', 10, 77),
('Camagüey', 321000, 1106, 'Tropical', '1514-02-02', 10, 78),
('Holguín', 287000, 655, 'Tropical', '1523-04-04', 10, 79),
('Guantánamo', 228000, 741, 'Semiárido', '1797-12-01', 10, 80),

-- Brasil (id_pais = 11)
('São Paulo', 11451000, 1521, 'Subtropical', '1554-01-25', 11, 81),
('Rio de Janeiro', 6211000, 1200, 'Tropical Atlântico', '1565-03-01', 11, 82),
('Brasília', 2817000, 5760, 'Tropical de Altitude', '1960-04-21', 11, 83),
('Salvador', 2418000, 692, 'Tropical Úmido', '1499-03-29', 11, 84),
('Fortaleza', 2428000, 312, 'Tropical Semitropical', '1726-04-13', 11, 85),

-- Argentina (id_pais = 12)
('Buenos Aires', 3057000, 203, 'Pampeano Temperado', '1536-02-02', 12, 86),
('Córdoba', 1329000, 576, 'Semiárido', '1573-07-06', 12, 87),
('Rosário', 948000, 178, 'Temperado', '1725-10-07', 12, 88),
('Mendoza', 115000, 54, 'Árido', '1561-03-02', 12, 89),
('La Plata', 193000, 926, 'Temperado', '1882-11-19', 12, 90),

-- Chile (id_pais = 13)
('Santiago', 6250000, 641, 'Mediterrâneo', '1541-02-12', 13, 91),
('Valparaíso', 296000, 401, 'Mediterrâneo', '1536-09-03', 13, 92),
('Concepción', 223000, 221, 'Oceânico', '1550-10-05', 13, 93),
('Antofagasta', 361000, 30718, 'Desértico', '1868-10-22', 13, 94),
('Punta Arenas', 123000, 17846, 'Semiárido Frio', '1848-12-18', 13, 95),

-- Colômbia (id_pais = 14)
('Bogotá', 7743000, 1587, 'Frio de Altitude', '1538-08-06', 14, 96),
('Medellín', 2529000, 380, 'Subtropical Úmido', '1616-03-02', 14, 97),
('Cali', 2227000, 619, 'Tropical Safana', '1536-07-25', 14, 98),
('Barranquilla', 1274000, 154, 'Tropical Seco', '1629-04-07', 14, 99),
('Cartagena', 914000, 572, 'Tropical Semitropical', '1533-06-01', 14, 100),

-- Peru (id_pais = 15)
('Lima', 9674000, 2672, 'Árido Subtropical', '1535-01-18', 15, 101),
('Arequipa', 1008000, 850, 'Semiárido', '1540-08-15', 15, 102),
('Trujillo', 919000, 110, 'Árido', '1534-12-05', 15, 103),
('Cusco', 428000, 385, 'Subtropical de Altitude', '1100-01-01', 15, 104),
('Iquitos', 377000, 368, 'Equatorial Úmido', '1757-01-01', 15, 105),

-- China (id_pais = 16)
('Pequim', 21890000, 16410, 'Continental Monçônico', '1045-01-01', 16, 106),
('Xangai', 24870000, 6340, 'Subtropical Úmido', '1292-01-01', 16, 107),
('Shenzhen', 17490000, 1997, 'Subtropical', '1979-03-05', 16, 108),
('Cantão', 18730000, 7434, 'Subtropical', '0214-01-01', 16, 109),
('Chengdu', 20930000, 14335, 'Subtropical Úmido', '0311-01-01', 16, 110),

-- Índia (id_pais = 17)
('Nova Déli', 32900000, 1484, 'Semiárido', '1911-12-12', 17, 111),
('Mumbai', 21290000, 603, 'Tropical Monçônico', '1507-01-01', 17, 112),
('Bangalore', 13600000, 709, 'Tropical Safana', '1537-01-01', 17, 113),
('Calcutá', 15300000, 206, 'Tropical Safana', '1690-08-24', 17, 114),
('Hyderabad', 10800000, 650, 'Tropical Safana', '1591-01-01', 17, 115),

-- Japão (id_pais = 18)
('Tóquio', 14000000, 2194, 'Temperado Úmido', '1457-05-01', 18, 116),
('Osaka', 2750000, 225, 'Temperado Úmido', '1496-01-01', 18, 117),
('Quioto', 1460000, 827, 'Temperado Úmido', '0794-11-18', 18, 118),
('Yokohama', 3770000, 437, 'Temperado Marítimo', '1859-06-02', 18, 119),
('Sapporo', 1970000, 1121, 'Continental Húmido', '1869-01-01', 18, 120),

-- Coreia do Sul (id_pais = 19)
('Seul', 9400000, 605, 'Continental Temperado', '0018-01-01', 19, 121),
('Busan', 3300000, 770, 'Subtropical Úmido', '0015-01-01', 19, 122),
('Incheon', 2900000, 1062, 'Continental Temperado', '0475-01-01', 19, 123),
('Daegu', 2300000, 883, 'Subtropical Úmido', '0001-01-01', 19, 124),
('Daejeon', 1400000, 539, 'Continental Temperado', '1914-01-01', 19, 125),

-- Indonésia (id_pais = 20)
('Jacarta', 10560000, 661, 'Equatorial', '1527-06-22', 20, 126),
('Surabaya', 2870000, 326, 'Tropical Safana', '1293-05-31', 20, 127),
('Bandung', 2440000, 167, 'Subtropical de Altitude', '1810-09-25', 20, 128),
('Medan', 2430000, 265, 'Equatorial Úmido', '1590-07-01', 20, 129),
('Nusantara', 200000, 2560, 'Equatorial', '2022-01-18', 20, 130),

-- França (id_pais = 21)
('Paris', 2140000, 105, 'Temperado Oceânico', '0250-01-01', 21, 131),
('Marselha', 870000, 240, 'Mediterrâneo', '0600-01-01', 21, 132),
('Lyon', 522000, 48, 'Oceânico Alterado', '0043-01-01', 21, 133),
('Toulouse', 49000, 118, 'Oceânico', '0100-01-01', 21, 134),
('Nice', 342000, 71, 'Mediterrâneo', '0350-01-01', 21, 135),

-- Alemanha (id_pais = 22)
('Berlim', 3670000, 891, 'Temperado Continental', '1237-10-28', 22, 136),
('Hamburgo', 1850000, 755, 'Oceânico', '0808-01-01', 22, 137),
('Munique', 1480000, 310, 'Continental Húmido', '1158-01-01', 22, 138),
('Colônia', 1080000, 405, 'Oceânico', '0038-01-01', 22, 139),
('Frankfurt', 764000, 248, 'Temperado Continental', '0794-01-01', 22, 140),

-- Reino Unido (id_pais = 23)
('Londres', 8980000, 1572, 'Temperado Marítimo', '0043-01-01', 23, 141),
('Birmingham', 1140000, 267, 'Temperado Marítimo', '1166-01-01', 23, 142),
('Manchester', 550000, 115, 'Temperado Marítimo', '0079-01-01', 23, 143),
('Glasgow', 635000, 175, 'Oceânico Marítimo', '0560-01-01', 23, 144),
('Edimburgo', 526000, 264, 'Temperado Marítimo', '1124-01-01', 23, 145),

-- Itália (id_pais = 24)
('Roma', 2760000, 1285, 'Mediterrâneo', '0753-04-21', 24, 146),
('Milão', 1370000, 181, 'Subtropical Úmido', '0600-01-01', 24, 147),
('Nápoles', 913000, 117, 'Mediterrâneo', '0475-01-01', 24, 148),
('Turim', 847000, 130, 'Subtropical Úmido', '0028-01-01', 24, 149),
('Palermo', 630000, 158, 'Mediterrâneo', '0734-01-01', 24, 150),

-- Espanha (id_pais = 25)
('Madri', 3280000, 604, 'Mediterrâneo Continental', '0860-01-01', 25, 151),
('Barcelona', 1620000, 101, 'Mediterrâneo', '0230-01-01', 25, 152),
('Valência', 792000, 134, 'Mediterrâneo', '0138-01-01', 25, 153),
('Sevilha', 681000, 140, 'Mediterrâneo', '0700-01-01', 25, 154),
('Saragoça', 673000, 973, 'Semiárido', '0024-01-01', 25, 155),

-- Austrália (id_pais = 26)
('Sydney', 5300000, 12368, 'Temperado Marítimo', '1788-01-26', 26, 156),
('Melbourne', 5030000, 9993, 'Temperado Oceânico', '1835-08-30', 26, 157),
('Brisbane', 2600000, 1584, 'Subtropical Úmido', '1824-09-13', 26, 158),
('Perth', 2100000, 6418, 'Mediterrâneo', '1829-06-12', 26, 159),
('Canberra', 430000, 814, 'Temperado Oceânico', '1913-03-12', 26, 160),

-- Nova Zelândia (id_pais = 27)
('Auckland', 1650000, 1086, 'Temperado Marítimo', '1840-09-18', 27, 161),
('Wellington', 420000, 444, 'Temperado Marítimo', '1839-09-20', 27, 162),
('Christchurch', 380000, 1426, 'Temperado Oceânico', '1848-03-27', 27, 163),
('Hamilton', 179000, 110, 'Temperado Marítimo', '1864-08-24', 27, 164),
('Dunedin', 130000, 3314, 'Oceânico Marítimo', '1848-03-23', 27, 165),

-- Papua Nova Guiné (id_pais = 28)
('Port Moresby', 400000, 240, 'Tropical de Savana', '1873-11-06', 28, 166),
('Lae', 149000, 95, 'Equatorial Úmido', '1920-01-01', 28, 167),
('Mount Hagen', 46000, 30, 'Subtropical de Altitude', '1930-01-01', 28, 168),
('Madang', 35000, 25, 'Equatorial Úmido', '1871-01-01', 28, 169),
('Kokopo', 26000, 20, 'Equatorial Úmido', '1890-01-01', 28, 170),

-- Fiji (id_pais = 29)
('Suva', 85000, 204, 'Tropical Úmido', '1849-01-01', 29, 171),
('Nasinu', 92000, 45, 'Tropical Úmido', '1999-01-01', 29, 172),
('Lautoka', 52000, 16, 'Tropical Marítimo', '1860-01-01', 29, 173),
('Nadi', 42000, 12, 'Tropical Marítimo', '1947-01-01', 29, 174),
('Labasa', 28000, 15, 'Tropical Marítimo', '1939-01-01', 29, 175),

-- Kiribati (id_pais = 30)
('Tarawa do Sul', 63000, 15, 'Equatorial Marítimo', '1947-01-01', 30, 176),
('Betio', 17000, 2, 'Equatorial Marítimo', '1950-01-01', 30, 177),
('Bikenibeu', 7000, 1, 'Equatorial Marítimo', '1955-01-01', 30, 178),
('Eita', 3500, 1, 'Equatorial Marítimo', '1960-01-01', 30, 179),
('Bairiki', 3200, 1, 'Equatorial Marítimo', '1940-01-01', 30, 180);

create table tb_usuario(
username varchar(30) primary key not null,
password varchar(128) not null,
nome varchar(60) not null,
qtd_acesso int not null, 
status ENUM('A', 'B') NOT NULL DEFAULT 'A', -- A=Ativo, B=Bloqueado
tipo ENUM('A', 'U') NOT NULL DEFAULT 'U'     -- A=Admin, U=User
);

create table tb_logs(
id_log int primary key auto_increment not null,
descricao varchar(200),
data_log date not null,
username varchar(30) not null,
foreign key (username)
references tb_usuario (username)
);


-- Usuário Administrador (Senha inicial: 123456)
INSERT INTO tb_usuario (username, password, nome, qtd_acesso, status, tipo) 
VALUES ('admin@email.com', '123456', 'Administrador do Sistema', 0, 'A','A'),
  ('user@email.com', '123456', 'Comum', 0, 'A','U');

-- Registro de tentativa de login bem-sucedida
INSERT INTO tb_logs (descricao, data_log, username) 
VALUES ('Login realizado com sucesso', CURDATE(), 'admin@email.com');

-- Registro de falha de senha
INSERT INTO tb_logs (descricao, data_log, username) 
VALUES ('Tentativa incorreta de senha (1/3)', CURDATE(), 'user@email.com');

-- Registro de conta bloqueada
INSERT INTO tb_logs (descricao, data_log, username) 
VALUES ('Bloqueio de conta por exceder 3 tentativas incorretas', CURDATE(), 'user@email.com');

UPDATE tb_usuario 
SET status = 'A', qtd_acesso = 1 
WHERE username = 'admin@email.com';

UPDATE tb_usuario 
SET status = 'A', qtd_acesso = 1 
WHERE username = 'user@email.com';