<?php
global $dbh;

echo "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'></head><body>";
echo "<h1>Facturación</h1>";
echo "<p><a href='index.php?p=factura_crear'>Crear factura</a></p>";

$query = $dbh->prepare("SELECT * FROM factura;");
// Establece la forma de devolver los resultados, en este caso devolverá un array asociativo
$query->setFetchMode(PDO::FETCH_ASSOC);
$query->execute();
echo '<ul>';
while ($row = $query->fetch()){
    echo '<li>' . $row["codigo"] . '</li>';
}
echo '</ul>';

echo "</body></html>";