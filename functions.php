<?php

$mysqli = null;


function conectarBancoDeDados() {
    $hostRemoto = "focoformaturas.com";
    $usuarioRemoto = "u815655858_dbbiblia";
    $senhaRemoto = "Dimidrica09'@";
    $bancoDeDadosRemoto = "u815655858_dbbiblia";

    $hostLocal = "localhost";
    $usuarioLocal = "root";
    $senhaLocal = "";
    $bancoDeDadosLocal = "dbbiblia";

    // Desativar exibição de erros
    //error_reporting(0);

    // Tentar conexão com o banco de dados remoto
    $mysqli = @new mysqli($hostRemoto, $usuarioRemoto, $senhaRemoto, $bancoDeDadosRemoto);

    if ($mysqli->connect_errno) {

        // Tentar conexão com o banco de dados local
        

        if ($mysqli->connect_errno) {
            return false;
        }
    }
    
$mysqli = @new mysqli($hostLocal, $usuarioLocal, $senhaLocal, $bancoDeDadosLocal);
    // Restaurar configuração de exibição de erros
    //error_reporting(E_ALL);

    return $mysqli;
}



function executarConsulta($sql, $campo) {
    // Conectar ao banco de dados
    $mysqli = conectarBancoDeDados();

    if (!$mysqli) {
        return false;
    }

    $result = $mysqli->query($sql);

    if (!$result) {
        echo "Erro na consulta: " . $mysqli->error;
        $mysqli->close();
        return false;
    }

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $valor = $row[$campo];
        $result->free_result();
        return $valor;
    }

    return false;
}
