CREATE DATABASE library;
USE library;
CREATE TABLE member(
	firstname VARCHAR(50),
    lastname VARCHAR(50),
    username VARCHAR(50) PRIMARY KEY,
    email VARCHAR(50) UNIQUE,
    password VARCHAR(50),
    phone VARCHAR(30)
);

CREATE TABLE admin(
	id INT(50) AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(50),
    lastname VARCHAR(50),
    username VARCHAR(50) UNIQUE ,
    email VARCHAR(50) UNIQUE,
    password VARCHAR(50),
    phone VARCHAR(30),
	pic VARCHAR(100); 
);


CREATE TABLE books(
	bid INT PRIMARY KEY,
    name VARCHAR(100),
    authors VARCHAR(100),
    edition VARCHAR(30),
    status VARCHAR(30),
    quantity INT,
    department VARCHAR(50)
);

CREATE TABLE comments(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	comment VARCHAR(500),
    username VARCHAR(100)
);

CREATE TABLE issue_book(
	username VARCHAR(50),
    bid INT(100),
    approve VARCHAR(100),
    issue VARCHAR(100),
    `return` VARCHAR(100)
);