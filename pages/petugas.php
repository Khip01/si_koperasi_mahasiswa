<?php 
    require '../core/functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Section Petugas</title>
</head>
<body>
    <?php 
        // testing query
        $query = "SELECT * FROM barang";
        $barang = getDataFromQuery($query);
        if($barang === false){
            header("Location: error_page.php?errorLog=Tabel barang tidak ditemukan");
            exit;
        } else if ($barang === true){
            echo "<h1>Barang kosong kak</h1>";
        } else if ($barang != null) {
            echo "<h1>Daftar Barang</h1>";
            echo "<table>";
            echo "<tr>";
            echo "<th>Kode Barang</th>";
            echo "<th>Kode Supplier</th>";
            echo "<th>Kode Transaksi Supplier</th>";
            echo "<th>Kode Transaksi Pembeli</th>";
            echo "<th>Nama Barang</th>";
            echo "<th>Qty</th>";
            echo "<th>Harga Item</th>";
            echo "</tr>";

            foreach($barang as $row){
                echo "<tr>";
                echo "<td>".$row['kode_barang']."</td>";
                echo "<td>".$row['kode_supplier']."</td>";
                echo "<td>".$row['kode_transaksi_supplier']."</td>";
                echo "<td>".$row['kode_transaksi_pembeli']."</td>";
                echo "<td>".$row['nama_barang']."</td>";
                echo "<td>".$row['qty']."</td>";
                echo "<td>".$row['harga_item']."</td>";
                echo "</tr>";
            }

            echo "</table>";
        }
    ?>
</body>
</html>