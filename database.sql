CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    dob DATE NOT NULL,
    favorite_player VARCHAR(255) NOT NULL,
    position ENUM('Midfielder', 'Forward', 'Defender') NOT NULL
);