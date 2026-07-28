<?php

header("Content-Type: application/json");

require_once "../../middleware/auth.php";


$usuario = verificarToken();


echo json_encode([
    "status" => true,
    "mensagem" => "Token válido.",
    "usuario" => [
        "id" => $usuario->id,
        "email" => $usuario->email
    ]
]);

?>