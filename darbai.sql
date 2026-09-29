CREATE DATABASE IF NOT EXISTS darbu_maldyklas;
USE darbu_maldyklas;

DROP TABLE IF EXISTS darbai;

CREATE TABLE darbai (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    darbas VARCHAR(255) NOT NULL,
    laikas DATETIME NULL,
    atliktas BOOLEAN DEFAULT 0
);

INSERT INTO darbai (darbas, laikas, atliktas) VALUES
('Nupirkti maisto', '2026-09-20 18:00:00', 0), 
('Padaryti namų darbus', '2026-09-22 12:00:00', 0), 
('Isvalyt kamabri', '2026-09-25 15:00:00', 0), 
('pasivaikcioti ', NULL, 0), 
('nusipirkti knyga', '2026-09-19 10:00:00', 1); 