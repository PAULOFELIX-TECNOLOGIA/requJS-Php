create database petshop;

use petshop;


create table Petshop( 
    codPet INT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    gen ENUM('M', 'F') NOT NULL,
    nasc DATE NOT NULL,
    tutor VARCHAR(100)
);

select * from Petshop;

