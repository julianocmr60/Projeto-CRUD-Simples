<?php
    require_once ('conexao.php');
    $id = $_GET['id'];

    $select = $mysqli -> prepare("SELECT * FROM user WHERE id_usuario = ?");
    $select -> bind_param("i",$id);
    $select -> execute();
    $resultado = $select -> get_result();

    if($resultado -> num_rows > 0){
        $usuario = $resultado -> fetch_assoc();
    }else{
        $usuario = null;
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
   <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="atualizar.php" method="post">
    <h1>Alterar Cadastro</h1>

        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" 
        value="<?php echo htmlspecialchars($usuario['nome']); ?>" required>

        <label for="telefone">Telefone</label>
        <input type="tel" name="telefone" id="telefone"  
        value="<?php echo htmlspecialchars($usuario['telefone']); ?>"required>

        <label for="email">Email</label>
        <input type="email" name="email" id="email"
        value="<?php echo htmlspecialchars($usuario['email']); ?>" required>
        
        <label for="senha">Senha</label>
        <input type="password" name="senha" id="senha" 
        value="<?php echo htmlspecialchars($usuario['senha']); ?>" required>

        <button type="submit">Atualizar</button>
    </form>
</body>
</html>