<?php
global $dbh;

if (filter_has_var(INPUT_POST, 'codigo') && filter_has_var(INPUT_POST, 'fecha_emision')) {
    $codigo = filter_input(INPUT_POST, 'codigo', FILTER_SANITIZE_STRING);
    $fecha_emision = filter_input(INPUT_POST, 'fecha_emision', FILTER_SANITIZE_STRING);
    $query = $dbh->prepare("INSERT INTO factura (codigo, fecha_emision) VALUES (:codigo, :fecha_emision);");
    $query->bindParam(':codigo', $codigo);
    $query->bindParam(':fecha_emision', $fecha_emision);
    $query->execute();
}

header("location:index.php?p=inicio");
