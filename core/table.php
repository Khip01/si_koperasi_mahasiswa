<?php
    require 'functions.php';
    $dtBarang = "SELECT * FROM barang";
    $dtBrg = printData($dtBarang);
?>

<table border="1" cellspacing="0" cellpadding="10">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Kode Supplier</th>
            <th>Kode Transaksi Supplier</th>
            <th>Kode Transaksi Pembeli</th>
            <th>Nama Barang</th>
            <th>Qty</th>
            <th>Harga Item</th>
        </tr>
    </thead>        
    <tbody>
    <?php $i = 1; ?>
        <?php 
        if ($dtBrg) {
            foreach ($dtBrg as $data): ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= htmlspecialchars($data['kode_barang']); ?></td>
                <td><?= htmlspecialchars($data['kode_supplier']); ?></td>
                <td><?= htmlspecialchars($data['kode_transaksi_supplier']); ?></td>
                <td><?= htmlspecialchars($data['kode_transaksi_pembeli']); ?></td>
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
    </tbody>
    </table>
