<?php
    require '../core/functions.php';

    $brg = "SELECT * FROM barang WHERE kode_transaksi_pembeli IS NULL";
    $dataBarang = printData($brg);
    $pesan = "SELECT * FROM transaksi_pembeli";
    $dataPesan = printData($pesan);
    $person = "SELECT * FROM pembeli";
    $dataPembeli = printData($person);

    $result = mysqli_query($conn, "SELECT MAX(RIGHT(kode_transaksi_pembeli, 4)) as kode FROM transaksi_pembeli");
    $q = mysqli_fetch_object($result);
    if ($q && $q->kode) {
        $kd = sprintf("%04s", ((int)$q->kode) + 1);
    } else {
        $kd = "0005";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Section Pembeli</title>
</head>
<body>
    <h1>Daftar Barang</h1>
    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Qty</th>
            <th>Harga Item</th>
        </tr>

        <?php $i = 1; ?>
        <?php 
        if ($dataBarang) {
            foreach ($dataBarang as $data): ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= htmlspecialchars($data['kode_barang']); ?></td>
                <td><?= htmlspecialchars($data['nama_barang']); ?></td>
                <td><?= htmlspecialchars($data['qty']); ?></td>
                <td><?= htmlspecialchars($data['harga_item']); ?></td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; 
        } else {
            echo "<tr><td colspan='8'>No data available</td></tr>";
        }
        ?>
    </table>
    <h1>Daftar pesan</h1>
    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>    
        </tr>

        <?php $i = 1; ?>
        <?php 
        if ($dataPesan) {
            foreach ($dataPesan as $datap): ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= htmlspecialchars($datap['kode_transaksi_pembeli']); ?></td>
                <td><?= htmlspecialchars($datap['kode_barang']); ?></td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; 
        } else {
            echo "<tr><td colspan='8'>No data available</td></tr>";
        }
        ?>
    </table>
    <br>
    <h1>Add Pesanan</h1>
    <form autocomplete="off" action="" method="post">
        <label for="">Kode Transaksi:</label><br>
        <input type="text" id="kd_transaksi" value="<?= htmlspecialchars('TP' . $kd); ?>"  readonly> <br><br>
        <label for="">Kode barang:</label><br>
        <select name="" id="kd_brg">
            <option selected disabled value="">--- Select Goods ---</option>
            <?php foreach($dataBarang as $row) : ?>
            <option value="<?= htmlspecialchars($row['kode_barang']); ?>"><?= htmlspecialchars($row['nama_barang']); ?></option>
            <?php endforeach;?>
        </select> <br><br>
        <label for="">Total QTY:</label><br>
        <input type="text" id="qty" value=""> <br><br>
        <label for="">Harga total:</label><br>
        <input type="text" id="total" value=""> <br><br>
        <label for="">TGL Transaksi</label><br>
        <input type="datetime-local" id="tgl_transaksi" value=""> <br><br>
        <label for="">NIM</label><br>
        <select name="" id="nim">
            <option selected disabled value="">--- Select mhs ---</option>
            <?php foreach($dataPembeli as $org) : ?>
            <option value="<?= htmlspecialchars($org['nim']); ?>"><?= htmlspecialchars($org['nama_mhs']); ?></option>
            <?php endforeach;?>
        </select> <br><br>
        <button type="button" onclick="submitData('insert')">Submit</button>
    </form>
    <?php require '../core/script.php';?>
</body>

</html>