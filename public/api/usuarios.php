<?php

require_once "../../config/cors.php";
require_once __DIR__ . "/../../config/verificarToken.php";
require_once "../../conexao.php";

verificarToken();

$sql = "SELECT id, nome, email FROM usuarios ORDER BY nome";

$stmt = $pdo->prepare($sql);
$stmt->execute();

$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode([
    "status" => true,
    "usuarios" => $usuarios
]);

 ?>