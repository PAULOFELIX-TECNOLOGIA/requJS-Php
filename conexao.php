<?php

$bco = 'petshop';
$usuario = 'root';
$senha = '';

try {
    $conexao = new PDO("mysql:host=localhost; dbname=$bco", $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexao->exec("set names utf8");

    return $conexao; 
} catch (PDOException $erro) {
    echo "Erro na conexão: " . $erro->getMessage();
    exit;
}
