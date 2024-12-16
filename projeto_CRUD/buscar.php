<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Cadastro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="" method="post">
        <h1>Buscar Usuário</h1>
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" placeholder="Insira seu nome" required>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="email@gmail.com" required>

        <button type="submit">Buscar</button>
        <a id="cancelar" href="index.php">Cancelar</a>
    </form>
</body>
</html>
<?php
    require_once ('conexao.php');
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = filter_input(INPUT_POST,'nome',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);

        $sql = $mysqli -> prepare("SELECT * FROM user WHERE nome = ? AND email = ?");

        $sql -> bind_param("ss",$nome,$email);

        $sql -> execute();

        $resultado = $sql->get_result();

        if($resultado -> num_rows > 0){
            while($row = $resultado -> fetch_assoc()){
                echo ("
                    <table border = '1'> 
                        <tr>
                            <td>Nome: $row[nome]</td>
                            <td>Telefone: $row[telefone]</td>
                            <td>Email: $row[email]</td>
                            <td><a class='links' id='editar' href='editar.php?id=$row[id_usuario]'>Editar</a></td>
                            <td><a class='links' id='excluir' href='excluir.php?id=$row[id_usuario]'>Excluir</a></td>
                        </tr>
                    </table>
                ");
        }
        }else{
            echo("<script>alert('Usuário não encontrado!')</script>");
        }
    }
?>