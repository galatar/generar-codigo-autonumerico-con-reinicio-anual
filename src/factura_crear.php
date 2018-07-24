<?php
global $dbh;

$query = $dbh->prepare(
    "SELECT CONCAT('F-',LPAD(SUBSTR(codigo,3,4)+1,4,'0'), '/', 
                YEAR(NOW())) AS codigo 
                FROM factura WHERE year(fecha_emision) = YEAR(NOW())
              UNION
                SELECT CONCAT('F-0001', '/', YEAR(NOW())) AS codigo
              ORDER BY codigo DESC LIMIT 1;;
    ");
// Establece la forma de devolver los resultados, en este caso devolverá un array asociativo
$query->setFetchMode(PDO::FETCH_ASSOC);
$query->execute();

echo "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'></head><body>";
while ($row = $query->fetch()){
    echo '<form method="post" action="index.php?p=factura_grabar">';
    echo '<input type="text" name="codigo" value="' . $row["codigo"] . '">';
    echo '<input type="date" name="fecha_emision">';
    echo '<input type="submit" value="Grabar factura">';
    echo '</form>';
}
echo "</body></html>";