<link rel="stylesheet" type="text/css" href="css/custom/feed.css"/>
<div class="container">
    <div class="blog-header">

        <h1 class="blog-post-title">Escreva para seus seguidores_</h1>
        <form action="script/publicar.php" method="post">
            <input required type="text" placeholder="Escreva o título" id="inputTitulo" class="form-control" name="titulo"/>
            <textarea required class="form-control" id="inputConteudo" placeholder="Escreva o conteúdo" name="conteudo"></textarea>
            <button type="submit" class="form-control btn btn-primary">Publicar!</button>
        </form>

        <br/>
        <h1 class="blog-post-title">Feed de notícias_</h1>
        <p class="lead blog-description">Estas são as 5 publicações mais recentes de seus seguidores.</p>

    </div>

    <div class="row">

        <div class="col-sm-8 blog-main">

            <?php

            include("script/conexao.php");
            $usuario = $_SESSION["usuario"];

            // PRIMEIRO INNER JOIN DA MINHA VIDA, QUE FUMO!!!!!!
            $sql = "select postagem.*, seguimento.* from postagem inner join seguimento on postagem.autor = seguimento.seguido where seguimento.seguidor = ".$usuario["id"];

            $res = mysqli_query($link, $sql);
            $qtd = 0;

            // listagem de postagens
            while (($postagem = mysqli_fetch_array($res)) && $qtd <= 5){
                $qtd++;

                // conta comentários
                $sql = "select * from comentario where postagem = ".$postagem["id"];
                $qtdComentarios = mysqli_num_rows(mysqli_query($link, $sql));
                // verifica nome do autor
                $sql = "select * from usuario where id = ".$postagem["autor"];
                $nomeAutor = mysqli_fetch_array(mysqli_query($link, $sql))["nick"];

            ?>

            <div class="blog-post">
                <h1><?php echo $postagem["titulo"]; ?></h1>
                <p class="blog-post-meta">Publicado por <a href="./?t=perfil&nome=<?php echo $nomeAutor; ?>"><?php echo $nomeAutor; ?></a>
                    | <?php echo $postagem["datahora"]; ?> <br/>
                    Recebeu <a href="./?t=post&id=<?php echo $postagem["id"]; ?>"><?php echo $qtdComentarios; ?> comentário(s)</a></p>

                <div class="conteudo">
                    <?php echo $postagem["conteudo"]; ?>
                </div>

            </div><!-- /.blog-post -->
            <?php
            }
            ?>
            <!--
<nav>
<ul class="pager">
<li><a href="#">Previous</a></li>
<li><a href="#">Next</a></li>
</ul>
</nav>
-->

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
} else if(isset($_REQUEST["erro"])){
    echo "<script> alert('Não encontrado.'); </script>";    
}

?>