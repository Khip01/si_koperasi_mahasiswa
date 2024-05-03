<?php
    require 'core/functions.php';

    // Mengecek koneksi, jika terdapat error langsung di arahkan ke page error_page.php;
    $getResult = checkConnection();
    if ($getResult != null) {
        header("Location: pages/error_page.php?errorLog=$getResult");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
</head>
<body>
    <h1>Halo, menu:</h1>
    <br>
    <ul>
        <li>
            <a href="pages/pembeli.php">POV Pembeli</a>
        </li>
        <li>
            <a href="pages/petugas.php">POV Petugas</a>
        </li>
        <li>
            <a href="pages/supplier.php">POV Supplier</a>
        </li>
    </ul>
</body>
</html>