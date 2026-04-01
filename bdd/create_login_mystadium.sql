-- Script SQL à exécuter dans SSMS pour créer un login SQL Server dédié à l'application
-- À adapter selon vos besoins

-- 1. Créer le login au niveau du serveur
CREATE LOGIN mystadium_user WITH PASSWORD = 'motdepassefort';
GO

-- 2. Associer ce login à un utilisateur de la base mystadium
USE mystadium;
GO
CREATE USER mystadium_user FOR LOGIN mystadium_user;
GO

-- 3. Donner les droits nécessaires (ici propriétaire, à adapter si besoin)
ALTER ROLE db_owner ADD MEMBER mystadium_user;
GO

-- Après exécution, utilisez ces identifiants dans config.php :
-- DB_USER = 'mystadium_user'
-- DB_PASSWORD = 'motdepassefort'
