CREATE DATABASE IF NOT EXISTS management;

USE management;

CREATE TABLE IF NOT EXISTS user (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    name VARCHAR(50) NOT NULL,
    surname VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS customer (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    surname VARCHAR(50) NOT NULL,
    phone VARCHAR(9) NOT NULL,
    enterprise VARCHAR(50) NOT NULL,
    address VARCHAR(80) NOT NULL
);

CREATE TABLE IF NOT EXISTS business_chance (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    customerId INT NOT NULL,
    name VARCHAR(50) NOT NULL,
    status ENUM("ganada","en conversacion","pausada","presupuestada","perdida") NOT NULL,
    date DATE NOT NULL,
    CONSTRAINT FOREIGN KEY (customerId) REFERENCES customer(id) 
    	ON UPDATE CASCADE
    	ON DELETE CASCADE
);