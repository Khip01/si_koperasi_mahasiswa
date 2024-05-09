<?php
    require '../core/functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

        <tbody id="live-data">
        </tbody>        
    </table>
    <h1>Add Pesanan</h1>
    <form autocomplete="off" action="" method="post">
        <label for="">Kode Transaksi:</label><br>
        <input type="text" id="kd_transaksi" value="<?= htmlspecialchars('TP' . $kd); ?>"  readonly> <br><br>
        <label for="">Kode Supplier:</label><br>
        <select name="" id="kd_brg">
            <option selected disabled value="">--- Select Supplier ---</option>
            <?php foreach($dtSupp as $row) : ?>
            <option value="<?= htmlspecialchars($row['kode_supplier']); ?>"><?= htmlspecialchars($row['nama_supplier']); ?></option>
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
        <button type="button" onclick="submitPesan('insert')">Submit</button>
    </form>
    <?php require '../core/script.php';?>
</body>
<script>
    
</script>
</html>