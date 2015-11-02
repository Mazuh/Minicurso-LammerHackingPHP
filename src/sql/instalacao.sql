create database bd_hackbook;
use bd_hackbook;


create table usuario(
    id int primary key,
    nick varchar(20) not null unique,
    email varchar(30) not null unique,
    senha varchar(64) not null
);

create table seguimento(
    id int primary key,
    seguidor int not null references usuario(id),
    seguido int not null references usuario(id)
);


create table postagem(
    id int primary key,
    titulo varchar(50) not null,
    conteudo text not null
);

create table comentario(
    id int primary key,
    postagem int not null references postagem(id),
    autor int not null references usuario(id),
    conteudo text not null
);