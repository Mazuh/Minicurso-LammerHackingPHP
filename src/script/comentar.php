<?php

session_start();

include("conexao.php");

if (isset($_REQUEST["conteudo"]) && isset($_SESSION["usuario"]) && isset($_REQUEST["postagem"])){
    
    // reconhece parâmetros
    $conteudo = $_REQUEST["conteudo"];
    $usuario = $_SESSION["usuario"]["id"];
    $postagem = $_REQUEST["postagem"];
    
    // insert
    $sql = "insert into comentario (conteudo, autor, postagem) values ('$conteudo', $usuario, $postagem)";
    
    if (mysqli_query($link, $sql)){
        header("location: ../?t=post&id=$postagem&ok=");
        
    } else{ // auths
        die("Falha ao tentar comentar.");
    }
    
} else{
    die("Acesso não autorizado.");
}

?>
