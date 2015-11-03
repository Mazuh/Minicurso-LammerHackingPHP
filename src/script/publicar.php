<?php

session_start();

include("conexao.php");

if (isset($_REQUEST["titulo"]) && isset($_REQUEST["conteudo"]) && isset($_SESSION["usuario"])){
    
    // reconhece parâmetros
    $titulo = $_REQUEST["titulo"];
    $conteudo = $_REQUEST["conteudo"];
    $usuario = $_SESSION["usuario"]["id"];
    
    // insert
    $sql = "insert into postagem (titulo, conteudo, autor) values ('$titulo', '$conteudo', $usuario)";
    echo $sql;
    if (mysqli_query($link, $sql)){
        header("location: ../?t=feed&ok=");
        
    } else{ // auths
        die("Falha ao tentar publicar.");
    }
    
} else{
    die("Acesso não autorizado.");
}

?>