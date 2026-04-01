-- Création du login SQL Server (si besoin)
IF NOT EXISTS (SELECT 1 FROM sys.server_principals WHERE name = 'malek.toukebri')
  CREATE LOGIN [malek.toukebri] WITH PASSWORD = 'Titou**123';
GO


IF DB_ID('mystadium') IS NOT NULL
  DROP DATABASE mystadium;
GO
CREATE DATABASE mystadium;
GO
USE mystadium;
GO

-- Table centre
CREATE TABLE centre (
  id INT NOT NULL PRIMARY KEY,
  nom_centre VARCHAR(50) NULL,
  adresse_centre VARCHAR(50) NULL,
  horaire_centre DATETIME NULL,
  email_centre VARCHAR(50) NULL
);

INSERT INTO centre (id, nom_centre, adresse_centre, horaire_centre, email_centre) VALUES
(1, NULL, NULL, NULL, NULL);

-- Table stadium_user
CREATE TABLE stadium_user (
  id INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
  firstname VARCHAR(50) NULL,
  lastname VARCHAR(50) NULL,
  email VARCHAR(50) NULL,
  telephone VARCHAR(50) NULL,
  login VARCHAR(50) NULL,
  password VARCHAR(255) NULL
);

SET IDENTITY_INSERT stadium_user ON;
INSERT INTO stadium_user (id, firstname, lastname, email, telephone, login, password) VALUES
(1, 'malek', 'toukebri', 'malek.toukebri@example.com', '0123456789', 'malek', 'Titou**123');
SET IDENTITY_INSERT stadium_user OFF;

-- Table terrain
CREATE TABLE terrain (
  id INT NOT NULL PRIMARY KEY,
  nom_terrain VARCHAR(50) NULL,
  nbr_pers_terrain VARCHAR(50) NULL,
  temps_terrain TIME NULL,
  prix_terrain VARCHAR(50) NULL,
  id_1 INT NOT NULL
);

INSERT INTO terrain (id, nom_terrain, nbr_pers_terrain, temps_terrain, prix_terrain, id_1) VALUES
(0, 'terrain_1', '', '00:00:00', '', 1),
(1, 'terrain_2', '', '00:00:00', '', 1),
(2, 'terrain_3', '', '00:00:00', '', 1),
(3, 'terrain_4', '', '00:00:00', '', 1);

-- Table reservation
CREATE TABLE reservation (
  res_id INT NOT NULL PRIMARY KEY,
  res_name VARCHAR(50) NULL,
  res_tel VARCHAR(50) NULL,
  res_email VARCHAR(50) NULL,
  res_date_debut DATETIME NULL,
  res_date_fin VARCHAR(50) NULL,
  res_prix VARCHAR(50) NULL,
  id INT NOT NULL,
  id_1 INT NOT NULL
);

-- Index et clés étrangères

ALTER TABLE reservation
  ADD CONSTRAINT FK_reservation_user FOREIGN KEY (id) REFERENCES stadium_user(id);
ALTER TABLE reservation
  ADD CONSTRAINT FK_reservation_terrain FOREIGN KEY (id_1) REFERENCES terrain(id);

ALTER TABLE terrain
  ADD CONSTRAINT FK_terrain_centre FOREIGN KEY (id_1) REFERENCES centre(id);