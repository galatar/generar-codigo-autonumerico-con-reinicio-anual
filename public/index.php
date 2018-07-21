<?php

// Configuración
$dbname = "facturacion";
$user = "root";
$password = "Un_mal_password_lo_tiene_cualquiera";

// Conecta base de datos con PDO
try {
    $dsn = "mysql:host=localhost;dbname=$dbname";
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTRR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    echo $e->getMessage();
}

// Enrutado
$pagina = __DIR__ . "/../src/";
if (filter_has_var(INPUT_GET, 'p')) {
    $pagina .= filter_input(INPUT_GET, 'p', FILTER_SANITIZE_URL);
} else {
    $pagina .= 'inicio';
}

$pagina .= ".php";
include_once($pagina);