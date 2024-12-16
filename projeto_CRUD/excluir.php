<?php
    require_once ('conexao.php');
    $id = filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);

    if ($id === false || $id === null) {
        echo "<script>alert('ID inválido!'); window.location.href='listar.php';</script>";
        exit;
    }
    

    $deletar = $mysqli -> prepare("DELETE FROM user WHERE id_usuario = ?");
    $deletar -> bind_param("i",$id);
    if($deletar -> execute()){
        echo("<script>alert('Usuário deletado com sucesso!')</script>");
    }else{
        echo("<script>alert('Não foi possivel deletar o usuário')</script>");
    }

    $deletar -> close();
    $mysqli -> close();

    echo("<script>window.location.href='listar.php'</script>");
?>