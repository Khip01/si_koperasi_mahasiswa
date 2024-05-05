<?php
require '../core/functions.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="styles/petugas.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POV Petugas</title>
    <!-- Font Lexend -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
</head>

<header class="nav-header">
    <div class="tabel-title-field">
        <h1>TABEL</h1>
        <h2 id="what-table">Petugas</h2>
    </div>
    <nav id="nav-pov-mode">
        <a>
            <h1>Petugas</h1>
        </a>
        <a href="pembeli.php">
            <h1>Pembeli</h1>
        </a>
        <a href="supplier.php">
            <h1>Supplier</h1>
        </a>
    </nav>
    <nav id="nav-kaerimashou">
        <a href="../index.php">
            <h1>Kaerimashou~</h1>
        </a>
    </nav>
</header>

<body>
    <?php
    // testing query
    $query = "SELECT * FROM barang";
    $barang = getDataFromQuery($query);
    if ($barang === false) {
        header("Location: error_page.php?errorLog=Tabel barang tidak ditemukan");
        exit;
    } else if ($barang != null) {
        $barang = json_encode($barang);
    }
    ?>
    <div class="table-field">
        <div class="table-database">
            <h1>Daftar Barang</h1>
            <div class="table-wrapper">
                <table></table>
            </div>
        </div>
        <div class="table-edit-row">
            <h1>Edit Row</h1>
            <div class="table-edit-field-wrapper">
                <!-- <div class="material-text-box">
                    <div class="group">
                        <input type="text" required="required"/>
                        <label>Name</label>
                    </div>
                </div>                 -->
            </div>
            <div class="btn-field">
                <div id="btn-discard">
                    <h1>Discard</h1>
                </div>
                <div id="btn-save" onclick="saveFormTextField()">
                    <h1>Save</h1>
                </div>
            </div>
        </div>
    </div>
</body>

<footer class="nav-bottom" onclick="addData()">
    <div id="btn-add">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
            <path fill="currentColor" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32v144H48c-17.7 0-32 14.3-32 32s14.3 32 32 32h144v144c0 17.7 14.3 32 32 32s32-14.3 32-32V288h144c17.7 0 32-14.3 32-32s-14.3-32-32-32H256z" />
        </svg>
    </div>
</footer>

<script>
    const strTableHeader = ['Kode Barang', 'Kode Supplier', 'Kode Transaksi Supplier', 'Kode Transaksi Pembeli', 'Nama Barang', 'Qty', 'Harga Item'];

    function loadBarang() {
        const barang = <?= $barang ?>;
        const tabelBarang = document.getElementsByClassName('table-database')[0];
        const tabel = tabelBarang.children[1].children[0];
        const title = tabelBarang.children[0];

        console.log(`barang: ${barang}`);
        if (barang == true) {
            title.textContent = 'Barang kosong kak';
        } else {
            title.textContent = 'Daftar Barang';
            let generateHeader = '<tr>';
            for (let index = 0; index < strTableHeader.length; index++) {
                generateHeader += '<th>' + strTableHeader[index] + '</th>';
            }
            generateHeader += '</tr>';
            tabel.innerHTML = generateHeader;
            for (let i = 0; i < barang.length; i++) {
                tabel.innerHTML += "<tr>" +
                    "<td>" + barang[i].kode_barang + "</td>" +
                    "<td>" + barang[i].kode_supplier + "</td>" +
                    "<td>" + barang[i].kode_transaksi_supplier + "</td>" +
                    "<td>" + barang[i].kode_transaksi_pembeli + "</td>" +
                    "<td>" + barang[i].nama_barang + "</td>" +
                    "<td>" + barang[i].qty + "</td>" +
                    "<td>" + barang[i].harga_item + "</td>" +
                    "</tr>";
            }
        }
    }
    loadBarang();

    function generateFormTextField() {
        const editFieldWrapper = document.getElementsByClassName('table-edit-field-wrapper')[0];
        for (let index = 0; index < strTableHeader.length; index++) {
            editFieldWrapper.innerHTML += '<div class="material-text-box"> <div class="group"> <input type="text" required="required"/> <label>' +
                strTableHeader[index] + '</label> </div> </div>';
        }
    }
    generateFormTextField();

    function saveFormTextField() {
        const editFieldWrapper = document.getElementsByClassName('table-edit-field-wrapper')[0];
        let valueToSubmit = [];
        for (let index = 0; index < editFieldWrapper.children.length; index++) {
            valueToSubmit.push(editFieldWrapper.children[index].children[0].children[0].value);

        }
        console.log(valueToSubmit);
    }

    function addData(){
        //TODO: Add data to database
        console.log("UwU");
    }
</script>

</html>