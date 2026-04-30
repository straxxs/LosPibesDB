CREATE DATABASE LosPibes;
USE LosPibes;

CREATE TABLE IF NOT EXISTS clientes(
    id_cli INT AUTO_INCREMENT PRIMARY KEY,
    cli_nom VARCHAR(50) NOT NULL,
    cli_ape VARCHAR(50) NOT NULL,
    cli_DNI INT(8) NOT NULL,
    cli_correo VARCHAR(50),
    cli_tel VARCHAR(50)
);

CREATE TABLE IF NOT EXISTS proveedores(
    id_prov INT AUTO_INCREMENT PRIMARY KEY,
    prov_nom VARCHAR(50) NOT NULL,
    prov_tel VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS producto(
    id_pro INT AUTO_INCREMENT PRIMARY KEY,
    pro_nom VARCHAR(50) NOT NULL,
    pro_precio DECIMAL(10,2),
    pro_secc VARCHAR(50),
    pro_stock INT,
    id_prov INT,
    FOREIGN KEY (id_prov) REFERENCES proveedores(id_prov)
);

CREATE TABLE IF NOT EXISTS ventas(
    id_ven INT AUTO_INCREMENT PRIMARY KEY,
    ven_fecha DATE,
    ven_cant INT,
    id_cli INT,
    id_pro INT,
    FOREIGN KEY (id_cli) REFERENCES clientes(id_cli),
    FOREIGN KEY (id_pro) REFERENCES producto(id_pro)
);

CREATE TABLE IF NOT EXISTS pedidos(
    id_ped INT AUTO_INCREMENT PRIMARY KEY,
    ped_fecha_entrega DATE,
    ped_direcc VARCHAR(50),
    id_ven INT,
    FOREIGN KEY (id_ven) REFERENCES ventas(id_ven)
);

INSERT INTO clientes (cli_nom, cli_ape, cli_DNI, cli_correo, cli_tel) VALUES
('Juan','Perez',12345678,'juan@gmail.com','111111111'),
('Ana','Gomez',23456789,'ana@gmail.com','222222222'),
('Luis','Martinez',34567890,'luis@gmail.com','333333333'),
('Sofia','Lopez',45678901,'sofia@gmail.com','444444444'),
('Carlos','Diaz',56789012,'carlos@gmail.com','555555555'),
('Maria','Fernandez',67890123,'maria@gmail.com','666666666'),
('Pedro','Sanchez',78901234,'pedro@gmail.com','777777777'),
('Lucia','Ramirez',89012345,'lucia@gmail.com','888888888'),
('Diego','Torres',90123456,'diego@gmail.com','999999999'),
('Valeria','Castro',11223344,'valeria@gmail.com','101010101');

INSERT INTO proveedores (prov_nom, prov_tel) VALUES
('Proveedor A','111111111'),
('Proveedor B','222222222'),
('Proveedor C','333333333'),
('Proveedor D','444444444'),
('Proveedor E','555555555'),
('Proveedor F','666666666'),
('Proveedor G','777777777'),
('Proveedor H','888888888'),
('Proveedor I','999999999'),
('Proveedor J','101010101');

INSERT INTO producto (pro_nom, pro_precio, pro_secc, pro_stock, id_prov) VALUES
('Paracetamol 500mg',1200.50,'Analgésicos',50,1),
('Ibuprofeno 600mg',1500.00,'Antiinflamatorios',40,2),
('Amoxicilina 500mg',3500.99,'Antibióticos',30,3),
('Aspirina',1000.75,'Analgésicos',60,4),
('Omeprazol 20mg',2000.00,'Gastrointestinal',35,5),
('Loratadina',1800.00,'Antialérgicos',25,6),
('Salbutamol Inhalador',7500.20,'Respiratorio',15,7),
('Insulina',12000.30,'Diabetes',10,8),
('Alcohol en gel',900.40,'Higiene',70,9),
('Vitamina C',1300.00,'Suplementos',45,10);

INSERT INTO ventas (ven_fecha, ven_cant, id_cli, id_pro) VALUES
('2026-01-01',2,1,1),
('2026-01-02',1,2,2),
('2026-01-03',3,3,3),
('2026-01-04',1,4,4),
('2026-01-05',5,5,5),
('2026-01-06',2,6,6),
('2026-01-07',1,7,7),
('2026-01-08',4,8,8),
('2026-01-09',2,9,9),
('2026-01-10',3,10,10);

INSERT INTO pedidos (ped_fecha_entrega, ped_direcc, id_ven) VALUES
('2026-01-05','Calle 123',1),
('2026-01-06','Calle 456',2),
('2026-01-07','Calle 789',3),
('2026-01-08','Av Siempre Viva 742',4),
('2026-01-09','Av Corrientes 1234',5),
('2026-01-10','Av Rivadavia 5678',6),
('2026-01-11','Calle Falsa 123',7),
('2026-01-12','Calle Mitre 456',8),
('2026-01-13','Calle Belgrano 789',9),
('2026-01-14','Av Libertador 999',10);
