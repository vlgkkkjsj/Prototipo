
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="icon.png" type="image/png">
    <title>Cadastro Adm</title>
    <link rel ="stylesheet" href="cadastro.css">
</head>
<body>

    <main class="conteudo">
    <section class="formulario">    
    <div >
        <h1 id="titulo-principal">Cadastro via sistema Administrativo</h1>
        <p id="subtitulo">Complete as informacoes do usuario</p>
        <br>
    </div>
    <img class="img-logo-projeto" src="icon.png">
    <form class="formulario" method="POST" action="?page=salvar">
        <input type="hidden" name="acao" value="cadastrar">
        <fieldset class="grupo">
            <div class="campo" >
                <label for="nome"><strong>Nome</strong></label>
                <input type="text" name="nome" id="nome" required>
            </div>

            <div class="campo">
                <label for="Sobrenome" ><strong>Sobrenome</strong></label>
                <input type="text" name="sobrenome" id="Sobrenome"required>
            </div>

            <div class="campo">
                <label for="senha"><strong>Senha</strong></label>
                <input type=password name="senha" id="senha" required>
            </div>

            <div class="campo">
                <label for="cpf" ><strong>cpf</strong></label>
                <input type="text" name="cpf" id="cpf"required>
            </div>
        </fieldset>

        <div class="campo">
            <label for="email"><strong>Email</strong></label>
            <input type="email" name="email" id="email" required>
        </div>


      <button class="botao" type="submit" name="submit">Concluir</button>
    </form>
</section>
    </main>
    <footer class="rodape">
        <h2 class="desenvolvido">Desenvolvido por Nome do Produto</h2>
        <img class="logo-rodape" src="é_nois.png">
    </footer>
</body>
</html>