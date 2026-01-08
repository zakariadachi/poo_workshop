create database workshop;
use workshop;



create table author(
    name varchar(30) primary key
    );



create table book(
    id int PRIMARY KEY AUTO_INCREMENT,
    title varchar(30),
    author_name varchar(30),
    price decimal(5,2),
    stock int CHECK (stock >= 0),
    FOREIGN key (author_name) REFERENCES author(name)
    );