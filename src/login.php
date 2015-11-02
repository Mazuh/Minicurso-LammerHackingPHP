
<link href="css/custom/login.css" rel="stylesheet">


<div class="container">

    <form class="form-signin" action="script/logar.php" method="post">

        <h1>The Hackbook<span id="piscante" class="">_</span></h1>

        <h2 class="form-signin-heading">Entre agora!</h2>
        <label for="inputEmail" class="sr-only">E-mail</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="E-mail" required autofocus>
        <label for="inputPassword" class="sr-only">Senha</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Senha" required>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Acessar</button>
        <p>Ou cadastre-se <a href="index.php?t=cadastro">aqui</a>.</p>
        
    </form>

</div>


<script type="text/javascript">
    // futuro eu, estou morrendo de fome e sono, então me perdoe por fazer uma pequena gambiarra

    var pisca = document.getElementById("piscante");

    function piscar(){
        if (pisca.getAttribute("class") == ""){
            pisca.setAttribute("class", "hidden");
        }else{
            pisca.setAttribute("class", "");
        }
    }

    setInterval("piscar()", 1000);

</script>
