<?php
if (!isset($_REQUEST["nome"])){
    // sem busca? retorna ao feed
    header("location: ./?t=feed");
} 

// efetua select
include("script/conexao.php");

$sql = "select * from usuario where nick='".$_REQUEST["nome"]."'";
$res = mysqli_query($link, $sql);

if (mysqli_num_rows($res) < 0){
    // nada encontrado? redireciona com flag
    header("location: ./?t=feed&erro=404");
}

// identifica
$perfil = mysqli_fetch_array($res);

?>

<link rel="stylesheet" type="text/css" href="css/custom/feed.css"/>
<div class="container">
    <div class="blog-header">

        <h1 class="blog-title"><?php echo $perfil["nick"]; ?>_</h1>
        
        <p class="lead blog-description">
            <?php
            //$sql = "select * from seguimento where seguido=".$perfil["id"]; // ineficiente
            $sql = "select seguimento.*, usuario.* from seguimento inner join usuario on usuario.id = seguimento.seguidor where seguimento.seguido = ".$perfil["id"];
            $res = mysqli_query($link, $sql);
            
            echo "<strong>Seguidores (".mysqli_num_rows($res)."):  </strong>";
            
            while ($seguidor = mysqli_fetch_array($res)){
                echo $seguidor["nick"]." | ";
            }
            ?>
        </p>
        
        <p class="lead blog-description">
            <?php
            //$sql = "select * from seguimento where seguidor=".$perfil["id"]; // ineficiente
            $sql = "select seguimento.*, usuario.* from seguimento inner join usuario on usuario.id = seguimento.seguido where seguimento.seguidor = ".$perfil["id"];
            $res = mysqli_query($link, $sql);
            
            echo "<strong>Seguindo (".mysqli_num_rows($res)."):  </strong>";
            
            while ($seguido = mysqli_fetch_array($res)){
                echo $seguido["nick"]." | ";
            }
            ?>
        </p>

    </div>

    <div class="row">

        <div class="col-sm-8 blog-main">

            <?php

            // listagem de postagens

            $sql = "select * from postagem where autor=".$perfil["id"];
            $res = mysqli_query($link, $sql);

            while ($postagem = mysqli_fetch_array($res)){

                // conta comentários
                $sql = "select * from comentario where postagem = ".$postagem["id"];
                $qtdComentarios = mysqli_num_rows(mysqli_query($link, $sql));
                // verifica nome do autor
                $nomeAutor = $perfil["nick"];

            ?>

            <div class="blog-post">
                <h1><?php echo $postagem["titulo"]; ?></h1>
                <p class="blog-post-meta">Publicado por <a href="./?t=perfil&nome=<?php echo $nomeAutor; ?>"><?php echo $nomeAutor; ?></a>
                    | <?php echo $postagem["datahora"]; ?> <br/>
                    Recebeu <a href="#"><?php echo $qtdComentarios; ?> comentário(s)</a></p>

                <div class="conteudo">
                    <?php echo $postagem["conteudo"]; ?>
                </div>

            </div><!-- /.blog-post -->
            <?php
            }
            ?>

        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
            <div class="sidebar-module sidebar-module-inset">
                <h4>Networking</h4>
                <ol class="list-unstyled">
                    <li><a href="https://github.com/Mazuh/" target="_blank">GitHub</a></li>
                    <li><a href="https://www.facebook.com/marcell.guilherme" target="_blank">Facebook</a></li>
                </ol>
            </div>
        </div><!-- /.blog-sidebar -->

    </div><!-- /.row -->

</div><!-- /.container -->

<?php

if (isset($_REQUEST["ok"])){
    echo "<script> alert('Publicado com sucesso.'); </script>";
}

?>