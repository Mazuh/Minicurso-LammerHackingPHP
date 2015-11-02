
<link href="css/custom/login.css" rel="stylesheet">

<div class="jumbotron">
    <div class="container">
        <h1>The Hackbook<span id="piscante" class="">_</span></h1>
        <h2>Sistema livre para hackers acessarem e escreverem suas publicações e comentários.</h2>
    </div>
</div>

<div class="container">

    <div class="row">

        <div class="col-md-5">

            <form class="form-signin" action="script/logar.php" method="post">
                <h2 class="form-signin-heading">Entre agora!</h2>
                <label for="inputLoginUsuario" class="sr-only">Usuário</label>
                <input type="text" id="inputLoginUsuario" class="form-control" placeholder="Usuário" required autofocus>
                <label for="inputPassword" class="sr-only">Senha</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="Senha" required>

                <br/>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Acessar</button>

            </form>

        </div>

        <div class="col-md-7">

            <form class="form-signin" action="script/logar.php" method="post">
                <h2 class="form-signin-heading">Abra uma conta!</h2>
                <label for="inputEmail" class="sr-only">E-mail</label>
                <input type="email" id="inputEmail" class="form-control" placeholder="E-mail" required>
                
                <label for="inputPassword" class="sr-only">Senha</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="Senha" required>
                
                <label for="inputRePassword" class="sr-only">Repetir senha</label>
                <input type="password" id="inputRePassword" class="form-control" placeholder="Repetir senha" required>
                
                <label for="inputLoginUsuario" class="sr-only">Usuário</label>
                <input type="text" id="inputUsuario" class="form-control" placeholder="Usuário" required>

                <br/>
                <button class="btn btn-lg btn-warning btn-block" type="submit">Cadastrar</button>

            </form>

        </div>

    </div>

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
