<?php
    require '../core/functions.php';
    require '../core/script.php';

    $dtSupplier = "SELECT * FROM supplier";
    $dtSupp = printData($dtSupplier);
    
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
    
    <div id="live_data">

    </div>        
    <h1>Add Pesanan</h1>
    <form autocomplete="off" id="form_brg" action="" method="post">
        <label for="">Kode barang:</label><br>
        <input type="text" id="kd_brg" value=""  readonly> <br><br>
        <label for="">Kode Supplier:</label><br>
        <select name="" id="kd_supplier">
            <option selected disabled value="">--- Select Supplier ---</option>
            <?php foreach($dtSupp as $row) : ?>
            <option value="<?= htmlspecialchars($row['kode_supplier']); ?>"><?= htmlspecialchars($row['nama_supplier']); ?></option>
            <?php endforeach;?>
        </select> <br><br>
        <label for="">Nama Barang:</label><br>
        <input type="text" id="nama_brg" value=""> <br><br>
        <label for="">QTY:</label><br>
        <input type="text" id="qty" value=""> <br><br>
        <label for="">Harga Item:</label><br>
        <input type="text" id="harga_item" value=""> <br><br>
        <button type="button" onclick="insertBarang('insertBarang')">Submit</button>
    </form>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    async function kdBrg(){
        document.getElementById('kd_brg').value = await barangMaxKd();
    }
    kdBrg();
</script>
</html>