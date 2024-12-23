<?php

"CREATE DATABASE Register";

USE Register;

"CREATE TABLE Role(
    id int PRIMARY KEY not null,
    name varchar(20)not null)";

"CREATE TABLE Users(
    id int PRIMARY KEY NOT null ,
    name varchar(20) NOT null ,
    email varchar(50) not null ,
    role_id int not null ,
    FOREIGN KEY Users(role_id) 
    REFERENCES Role(id))";

"INSERT into role (id ,name)VALUES(1 ,'mohamed'),(2 ,'karim'),(3 ,'ahmed')";

?>