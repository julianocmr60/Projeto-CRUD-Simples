<?php
    try{
        $mysqli = new mysqli("localhost","root","","teste_backend");

        if($mysqli -> connect_errno){
            throw new Exception("Ocorreu um erro na conexão com o Banco, verfique seu servidor!");
         }
    }catch(Exception $e){
        echo ("ERROR: ".$e->getMessage());
    }
?>