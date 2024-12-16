<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="cadastrar.php" method="post">
        <h1>Cadastrar</h1>
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" placeholder="Insira seu nome" required>

        <label for="telefone">Telefone</label>
        <input type="tel" name="telefone" id="telefone" placeholder="Insira seu telefone" required>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="email@gmail.com" required>
        
        <label for="senha">Senha</label>
        <input type="password" name="senha" id="senha">

        <fieldset>
            <legend>Termos de Uso</legend>
            <input type="checkbox" name="termos" required>
            <label for="termos">Concordo com as Politicas de Privacidade e Termos de uso</label>
            <br>
            <input type="checkbox" name="propaganda">
            <label for="checkbox">Aceito Receber Anúncios Via Email</label>
        </fieldset>
        <button type="submit">Cadastrar</button>
        <a href="buscar.php">Buscar</a>
    </form>
</body>
</html>