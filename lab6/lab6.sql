CREATE DATABASE lab6;
USE lab6;
CREATE TABLE users (
                       id INT AUTO_INCREMENT PRIMARY KEY,
                       name VARCHAR(100) NOT NULL,
                       email VARCHAR(100) NOT NULL UNIQUE,
                       password VARCHAR(255) NOT NULL
);
INSERT INTO users (name, email, password) VALUES
                                              ('John', 'john.doe@example.com', 'password123'),
                                              ('Vanchik21', 'egfgbfb@gmail.com', 'QWE123ZXC');

