<?php

require_once "../../config/cors.php";
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