use `pompiers`;

DROP TABLE IF EXISTS profil;
CREATE TABLE profil (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tel VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    dateCreation DATETIME NOT NULL,
    address VARCHAR(255) NOT NULL
);

DROP TABLE IF EXISTS role;
CREATE TABLE role (
    id INT AUTO_INCREMENT PRIMARY KEY,
    libelle VARCHAR(255) NOT NULL,
    permissions TEXT NOT NULL
);

DROP TABLE IF EXISTS user;
CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(255) UNIQUE NOT NULL,
    passwdHash VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL,
    status VARCHAR(50) NOT NULL,
    dateclosure DATE,
    profil_id INT,
    role_id INT,
    FOREIGN KEY (profil_id) REFERENCES profil(id),
    FOREIGN KEY (role_id) REFERENCES role(id)
);