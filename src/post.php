<?php

if (!isset($_REQUEST["id"])){ // auth: id da tabela publicacao
    die("Acesso não autorizado.");
}

include("script/conexao.php");

// identificando postagem
$sql = "select * from postagem where id=".$_REQUEST["id"];
$res = mysqli_query($link, $sql);

if (mysqli_num_rows($res) < 0){ // auth
    die("Publicação não encontrada.");
}

$postagem = mysqli_fetch_array($res);

// identificando autor
$sql = "select * from usuario where id=".$postagem["autor"];
$nomeAutor = mysqli_fetch_array(mysqli_query($link, $sql))["nick"];

?>

<link rel="stylesheet" type="text/css" href="css/custom/feed.css"/>
<div class="container">
    <div class="blog-header">

        <h1>Comente o que <?php echo $nomeAutor; ?> escreveu!</h1>
        <form action="script/comentar.php" method="post">
            <textarea required class="form-control" id="inputConteudo" placeholder="Escreva o comentário" name="conteudo"></textarea>
            <button type="submit" class="form-control btn btn-primary">Comentar!</button>
        </form> 

        <br/>
        <h1 class="blog-post-title">Comentários da publicação "<?php echo $postagem["titulo"]; ?>"</h1><br/></br>
        <?php

        $usuario = $_SESSION["usuario"];

        $sql = "select * from comentario where postagem=".$_REQUEST["id"];
        $res = mysqli_query($link, $sql);
        
        // listagem de comentários
        while ($comentario = mysqli_fetch_array($res)){
        
            // verifica nome do autor do comentário
            $sql = "select * from usuario where id = ".$comentario["autor"];
            $nomeAutorComentario = mysqli_fetch_array(mysqli_query($link, $sql))["nick"];

        ?>
        <div class="blog-post">
            <p class="lead blog-description">Por: <?php echo $nomeAutorComentario; ?> | Em: <?php echo $comentario["datahora"]; ?></p>
            <div><?php echo $comentario["conteudo"]; ?></div>
        </div>
        <?php
        }
        ?>

    </div><!-- /.blog-main -->

</div><!-- /.row -->

</div><!-- /.container -->


?>