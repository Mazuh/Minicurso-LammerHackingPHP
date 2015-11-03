<?php

session_start();

include("conexao.php");

if (isset($_REQUEST["id"]) && isset($_SESSION["usuario"])){
    
    // reconhece parâmetros
    $seguido = $_REQUEST["id"];
    $seguidor = $_SESSION["usuario"]["id"];
    
    // insert
    $sql = "insert into seguimento (seguido, seguidor) values ($seguido, $seguidor)";
    
    if (mysqli_query($link, $sql)){
        header("location: ../?t=feed");
        
    } else{ // auths
        die("Falha ao tentar seguir.");
    }
    
} else{
    die("Acesso não autorizado.");
}

?>
