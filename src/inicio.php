<?php global $dbh; ?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>Generar código autonumérico con reinicio anual</title>
    <link rel='stylesheet' href='css/normalize.css'>
    <link rel='stylesheet' href='css/skeleton.css'>
    <link rel='stylesheet' href='css/custom.css'>
</head>
<body>
<div class='container'>
    <section class='header'>
      <h3>Generar código autonumérico con reinicio anual</h3>
    </section>
    <p><a href='index.php?p=factura_crear'>Crear factura</a></p>

    <?php
    $query = $dbh->prepare("SELECT * FROM factura;");
    // Establece la forma de devolver los resultados, en este caso devolverá un array asociativo
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $query->execute();
    echo '<ul>';
    while ($row = $query->fetch()) {
        echo '<li>' . $row["codigo"] . '</li>';
    }
    echo '</ul>';
    ?>
</div>
</body>
</html>
