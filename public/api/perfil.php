<?php

require_once "../../config/cors.php";
require_once "../../config/verificarToken.php";
require_once "../../conexao.php";


$tokenUsuario = verificarToken();


$id = $tokenUsuario->id;


$sql = "SELECT id, nome, email, criado_em 
        FROM usuarios 
        WHERE id = :id";


$stmt = $pdo->prepare($sql);


$stmt->execute([
    ":id" => $id
]);


$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$usuario) {

    http_response_code(404);

    echo json_encode([
        "status" => false,
        "mensagem" => "Usuário não encontrado."
    ]);

    exit;
}

echo json_encode([
    "status" => true,
    "usuario" => $usuario
]);

?>