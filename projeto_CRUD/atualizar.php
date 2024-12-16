<?php
    require_once ('conexao.php');

    $id = filter_input(INPUT_POST,'id',FILTER_VALIDATE_INT);
    $nome = filter_input(INPUT_POST,'nome',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $telefone = filter_input(INPUT_POST,'telefone', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
    $senha = filter_input(INPUT_POST,'senha',FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $atualizar = $mysqli -> prepare("UPDATE user SET nome = ?, telefone = ?, email = ?, senha = ? 
    WHERE id_usuario = ?");

    $atualizar -> bind_param("ssssi",$nome,$telefone,$email,$senha,$id);

    $atualizar -> execute();

    $atualizar -> close();
    $mysqli -> close();

    echo("<script>
            alert('Dados alterados com sucesso!');
            window.location.href = 'index.php';
        </script>");
    exit;   
?>