<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Simplório e frágil sistema em que usuários podem publicar artigos prórpios e ler ou escrever comentários nas publicações alheias. O acesso é exclusivo a membros da comunidade hacker.">
        <meta name="author" content="Mazuh">
        <link rel="icon" href="../../favicon.ico">

        <title>The Hackbook</title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        
    </head>

    <body>
        
        <link href="css/custom/login.css" rel="stylesheet">
        
        <div class="container">

            <form class="form-signin" action="script/logar.php" method="post">
                
                <h1>The Hackbook<span id="piscante" class="">_</span></h1>
                <p><small>(SOMENTE HACKERS AUTORIZADOS)</small></p>
                
                <h2 class="form-signin-heading">Entre agora!</h2>
                <label for="inputEmail" class="sr-only">E-mail</label>
                <input type="email" id="inputEmail" class="form-control" placeholder="E-mail" required autofocus>
                <label for="inputPassword" class="sr-only">Senha</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="Senha" required>
                
                <button class="btn btn-lg btn-primary btn-block" type="submit">Acessar</button>
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
        
    </body>
</html>
