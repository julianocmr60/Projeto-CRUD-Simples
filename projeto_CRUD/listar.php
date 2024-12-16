<?php
    require_once ('conexao.php');

    $sql = "SELECT * FROM user";

    $resultado = $mysqli -> query($sql);

    echo('<link rel="stylesheet" href="style.css">');

    if($resultado -> num_rows > 0){
        while($row = $resultado -> fetch_assoc()){
            echo("
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
        echo("<a class='links' id='voltar' href='index.php'>Voltar</a>");
    }
?>