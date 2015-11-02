<?php

include("conexao.php");

if (isset($_REQUEST["email"]) && isset($_REQUEST["senha1"]) && isset($_REQUEST["senha2"]) && isset($_REQUEST["nick"])){
    
    // auth
    if ($_REQUEST["senha1"] != $_REQUEST["senha2"]){
        die("Senhas diferentes.");
    }
    
    // identificando campos
    $nick   = $_REQUEST["nick"];
    $email  = $_REQUEST["email"];
    $senha  = hash("sha256", $_REQUEST["senha1"]); // criptografia
    
    
    // efetuando insert no banco de dados
    $sql = "insert into usuario (nick, email, senha) values ('$nick', '$email', '$senha')";
    
    if(mysqli_query($link, $sql)){
        header("location: ../?t=login&ok=");
    }else{
        die("Erro ao tentar cadastrar.");
    }
    
    
} else{
    die("Acesso negado.");
}

?>