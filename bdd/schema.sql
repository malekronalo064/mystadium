-- Nettoyage : Ajout de contraintes d'unicité et suppression des anciennes tables
ALTER TABLE users ADD CONSTRAINT unique_email UNIQUE(email);
ALTER TABLE users ADD CONSTRAINT unique_login UNIQUE(login);
ALTER TABLE reservations ADD CONSTRAINT unique_resa UNIQUE(terrain_id, res_date, res_slot);
DROP TABLE IF EXISTS stadium_user;
DROP TABLE IF EXISTS reservation;
-- Structure SQL moderne pour application de réservation de terrains de foot

CREATE TABLE users (
  id INT PRIMARY KEY IDENTITY,
  firstname NVARCHAR(50),
  lastname NVARCHAR(50),
  email NVARCHAR(100) UNIQUE,
  telephone NVARCHAR(20),
  login NVARCHAR(50) UNIQUE,
  password NVARCHAR(255),
  role NVARCHAR(20) DEFAULT 'user'
);

CREATE TABLE terrains (
  id INT PRIMARY KEY IDENTITY,
  name NVARCHAR(100),
  description NVARCHAR(255),
  image NVARCHAR(255)
);

CREATE TABLE reservations (
  id INT PRIMARY KEY IDENTITY,
  user_id INT,
  terrain_id INT,
  res_date DATE,
  res_slot NVARCHAR(20),
  created_at DATETIME DEFAULT GETDATE(),
  FOREIGN KEY (user_id) REFERENCES users(id),
  FOREIGN KEY (terrain_id) REFERENCES terrains(id)
);

-- Créneaux horaires (optionnel)
CREATE TABLE slots (
  id INT PRIMARY KEY IDENTITY,
  label NVARCHAR(20)
);

-- Exemples d'insertion
INSERT INTO terrains (name, description, image) VALUES
('Terrain 1', 'Grand terrain synthétique', 'terrain1.jpg'),
('Terrain 2', 'Terrain 5v5 couvert', 'terrain2.jpg');

INSERT INTO slots (label) VALUES
('08:00-09:00'),('09:00-10:00'),('10:00-11:00'),('11:00-12:00'),('12:00-13:00'),('13:00-14:00'),('14:00-15:00'),('15:00-16:00'),('16:00-17:00'),('17:00-18:00'),('18:00-19:00'),('19:00-20:00'),('20:00-21:00');
