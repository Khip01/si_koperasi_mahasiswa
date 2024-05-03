<?php 

    // Mengecek jika tidak ada error yang dikirimkan di post
    if (!isset($_GET["errorLog"])) {
        $_GET["errorLog"] = "Undefined Error Log...";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error Kak</title>
</head>
<body>
    Error kak...
    <br>
    <br>
    Log:
    <br>
    <?= $_GET["errorLog"]; ?>
    <br>
    <br>
    Kembali ke <a href="../index.php">Main Page</a>
</body>
</html>