<?php

$mysqli = null;

function conectarBancoDeDados() {
    $hostRemoto = "149.100.151.103";
    $usuarioRemoto = "u815655858_root";
    $senhaRemoto = "Dimidrica09'@";
    $bancoDeDadosRemoto = "u815655858_bdsis";

    $mysqli = @new mysqli($hostRemoto, $usuarioRemoto, $senhaRemoto, $bancoDeDadosRemoto);

    return $mysqli;
}

function executarConsulta($sql, $campo) {
    // Conectar ao banco de dados
    global $mysqli;

    $mysqli = conectarBancoDeDados($mysqli);

    if (!$mysqli) {
        return false;
    }

    $result = $mysqli->query($sql);

    if (!$result) {
        echo "Erro na consulta: " . $mysqli->error;
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


function executarConsultaMultipla($sql) {
    // Conectar ao banco de dados
   global $mysqli;
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

    $rows = array();  // Array para armazenar os resultados

    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }

    $result->free_result();
    return $rows;
}
?>