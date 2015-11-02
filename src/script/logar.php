<?php

session_start();

include("conexao.php");

if (isset($_REQUEST["nick"]) && isset($_REQUEST["senha"])){
    
    $nick = $_REQUEST["nick"];
    $senha = hash("sha256", $_REQUEST["senha"]); // criptografia
    
    // busca / select
    $sql = "select * from usuario where nick='$nick' and senha='$senha'";
    $res = mysqli_query($link, $sql);
    
    if (mysqli_num_rows($res) > 0){
        
        $usuario = mysqli_fetch_array($res);
        
        // registra e redireciona
        $_SESSION["usuario"] = $usuario["id"];
        header("location: ../?t=feed");
        
    } else{
        die("Acesso negado.");
    }
    
}

?>