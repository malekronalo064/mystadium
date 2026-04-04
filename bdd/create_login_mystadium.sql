-- SUPPRIMER les tables récentes si elles existent
IF OBJECT_ID('reservations', 'U') IS NOT NULL DROP TABLE reservations;
IF OBJECT_ID('terrains', 'U') IS NOT NULL DROP TABLE terrains;
IF OBJECT_ID('slots', 'U') IS NOT NULL DROP TABLE slots;
IF OBJECT_ID('users', 'U') IS NOT NULL DROP TABLE users;

-- TABLE users (version moderne)
CREATE TABLE users (
    id INT IDENTITY(1,1) PRIMARY KEY,
    firstname NVARCHAR(50),
    lastname NVARCHAR(50),
    email NVARCHAR(100) UNIQUE,
    telephone NVARCHAR(20),
    login NVARCHAR(50) UNIQUE,
    password NVARCHAR(255),
    role NVARCHAR(20) DEFAULT 'user'
);

-- TABLE terrains
CREATE TABLE terrains (
    id INT IDENTITY(1,1) PRIMARY KEY,
    name NVARCHAR(100),
    description NVARCHAR(255),
    image NVARCHAR(255)
);

-- TABLE reservations
CREATE TABLE reservations (
    id INT IDENTITY(1,1) PRIMARY KEY,
    user_id INT,
    terrain_id INT,
    res_date DATE,
    res_slot NVARCHAR(20),
    created_at DATETIME DEFAULT GETDATE(),
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (terrain_id) REFERENCES terrains(id)
);

-- TABLE slots (optionnel)
CREATE TABLE slots (
    id INT IDENTITY(1,1) PRIMARY KEY,
    label NVARCHAR(20)
);
