<?php   
    require_once ('conexao.php');

    $criarTB = "CREATE TABLE IF NOT EXISTS user(
        id_usuario INT PRIMARY KEY AUTO_INCREMENT,
        nome VARCHAR(50) NOT NULL,
        telefone VARCHAR(12) NOT NULL,
        email VARCHAR(100) NOT NULL,
        senha VARCHAR(255) NOT NULL
    )";

    if(!$mysqli->query($criarTB)){
        echo("<script>alert('Não foi possivel criar a tabela')</script>");
    }

    $nome = filter_input(INPUT_POST,'nome',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $inserir = $mysqli -> prepare("INSERT INTO user (nome, telefone, email, senha) VALUES 
    (?,?,?,?)");

    $inserir -> bind_param("ssss",$nome,$telefone,$email,$senha);

    if($inserir-> execute()){
        echo ("<script>alert('Usuário cadastrado com sucesso!')</script>");
    }else{
        echo ("<script>alert('Não foi possivel cadastrar o usário!')</script>");
    } 
    $inserir->close();
    $mysqli->close();
    echo("<script>window.location.href='index.php'</script>");
?>