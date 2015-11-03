<?php
session_start();

$estaLogado = isset($_SESSION["usuario"]);
$usuario = $estaLogado ? $_SESSION["usuario"] : null;

?>

<!DOCTYPE html>
<html lang="pt-br">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Simplório e frágil sistema em que usuários podem publicar artigos própios e ler ou escrever comentários nas publicações alheias.">
        <meta name="author" content="Mazuh">

        <title>The Hackbook</title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <style type="text/css">
            /* Move down content because we have a fixed navbar that is 50px tall */
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }

            footer{
                background-color: lightgray;
            }
        </style>

    </head>

    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo $estaLogado? '?t=feed' : ''; ?>">The Hackbook<?php if ($estaLogado) echo " - ".$usuario["nick"]; ?></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <form class="navbar-form navbar-right" method="get" action="listagem.php">
                        <div class="form-group">
                            <input type="search" 
                                   placeholder="Buscar hacker" 
                                   class="form-control"
                                   <?php if (!$estaLogado) echo " disabled "; ?>
                                   required />
                        </div>
                        <button type="submit" 
                                class="btn btn-success"
                                <?php if (!$estaLogado) echo " disabled "; ?>
                                >Buscar</button>
                    </form>
                </div>
            </div>
        </nav>

        <?php
        // inclui o template solicitado

        $pagina = "login";

        if (isset($_REQUEST["t"])){
            $pagina = $_REQUEST["t"];
        }

        include($pagina . ".php");

        ?>

        <br/>
        <footer class="container text-center">
            <p>(c) 2015 - Desenvolvido por <a href="https://github.com/Mazuh/Minicurso-HackingPHP">Mazuh</a></p>
        </footer>

    </body>

</html>
