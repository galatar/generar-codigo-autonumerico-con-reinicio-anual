<?php
global $dbh;

$query = $dbh->prepare(
    "SELECT 
                CASE WHEN COUNT(*) > 0 THEN 
                    CONCAT('F-',LPAD(SUBSTR(codigo,7,11)+1,4,'0'), '/', YEAR(NOW()))
                ELSE 
                    CONCAT('F-0001', '/', YEAR(NOW()))
                END AS codigo 
              FROM factura 
              WHERE year(fecha_emision) = YEAR(NOW()) 
              ORDER BY codigo DESC LIMIT 1;
    ");
// Establece la forma de devolver los resultados, en este caso devolverá un array asociativo
$query->setFetchMode(PDO::FETCH_ASSOC);
$query->execute();
while ($row = $stmt->fetch()){
    echo $row["codigo"];
}