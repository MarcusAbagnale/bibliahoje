<?php
include 'functions.php';

$dia = date('d');
$mes = date('m');

$dia = intval($dia);
$mes = intval($mes);

$sql_cont = "SELECT 
livros_biblicos.livro,
capitulo, links FROM PRG_ANUAL 
INNER JOIN livros_biblicos
ON PRG_ANUAL.livro = id
WHERE DIA = $dia AND MES = $mes 
ORDER BY CAPITULO";

$l = executarConsultaMultipla($sql_cont);

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
echo json_encode($l);
