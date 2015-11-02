<!DOCTYPE html>
<html lang="pt-br">
    
    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Simplório e frágil sistema em que usuários podem publicar artigos prórpios e ler ou escrever comentários nas publicações alheias.">
        <meta name="author" content="Mazuh">

        <title>The Hackbook</title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        
    </head>

    <body>
        
        <?php
        // inclui o template solicitado
        
        $pagina = "login";
            
        if (isset($_REQUEST["t"])){
            $pagina = $_REQUEST["t"];
        }
        
        include($pagina . ".php");
        
        ?>
        
    </body>
    
</html>
