<?php

// localização do banco de dados
$host = "localhost";
// nome do banco de dados
$bd = "bd_hackbook";
// autenticação de acesso ao banco
$usuario = "root";
$senha = "root";

// tenta conectar ao server
if ($link = mysqli_connect($host, $usuario, $senha)){
    // tenta selecionar o banco de dados
    mysqli_select_db($link, $bd) or die("Erro ao tentar acessar banco de dados");
} else{
    die("Falha ao tentar acessar servidor.");
}


?>