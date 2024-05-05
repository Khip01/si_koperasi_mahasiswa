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
    <div class="table-field-wrapper">
        <div class="table-field">
            <div class="table-database" id="table-database-0">
                <h1>Daftar Barang</h1>
                <div class="table-wrapper">
                    <table></table>
                </div>
            </div>
            <div class="table-edit-row"> </div>
        </div>
        <div class="table-field">
            <div class="table-database" id="table-database-1">
                <h1>Daftar Barang</h1>
                <div class="table-wrapper">
                    <table></table>
                </div>
            </div>
            <div class="table-edit-row"> </div>
        </div>
    </div>

    <div class="form-add-data-filter"> </div>
    <div class="petugas-form-add-data">
        <div class="table-field">
            <div class="table-database" id="table-database-2">
                <h1>Daftar Barang</h1>
                <div class="table-wrapper">
                    <table></table>
                </div>
            </div>
            <div class="table-edit-row"> </div>
        </div>
    </div>
    <div class="form-add-data">
        <div class="top-bar-form-add-data">
            <h1>Form Tambah Transaksi</h1>
        </div>
        <div class="form-add-data-fieldtext">
            <div class="material-text-box">
                <div class="group">
                    <input type="text" required="required" />
                    <label>Kode Transaksi Supplier</label>
                </div>
            </div>
            <div class="material-text-box">
                <div class="group">
                    <input type="text" required="required" />
                    <label>Harga Total</label>
                </div>
            </div>
            <div class="material-text-box">
                <div class="group">
                    <input type="text" required="required" />
                    <label>Quantity</label>
                </div>
            </div>
            <div class="material-text-box">
                <div class="group">
                    <input type="text" required="required" />
                    <label>Kode Petugas</label>
                </div>
            </div>
            <div class="material-text-box">
                <div class="group">
                    <input type="text" required="required" />
                    <label>Kode Supplier</label>
                </div>
            </div>
            <!-- TODO: Add Date Selector -->
            <div class="material-text-box">
                <div class="group">
                    <input type="text" required="required" />
                    <label>Tanggal Transaksi</label>
                </div>
            </div>
        </div>
        <div class="btn-field-accept-cancle">
            <div class="btn-cancle" onclick="closeAddDataForm()">
                <h1>Discard</h1>
            </div>
            <div class="btn-accept" onclick="addAddDataForm()">
                <h1>Add</h1>
            </div>
        </div>
    </div>
</body>

<footer class=" nav-bottom" onclick="showPetugasFormAdd()" onmousewheel="showAddDataForm()">
    <div id="btn-add">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
            <path fill="currentColor" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32v144H48c-17.7 0-32 14.3-32 32s14.3 32 32 32h144v144c0 17.7 14.3 32 32 32s32-14.3 32-32V288h144c17.7 0 32-14.3 32-32s-14.3-32-32-32H256z" />
        </svg>
        <h1>Tambah Transaksi</h1>
    </div>
</footer>

<script>
    const strTableHeader = ['Kode Barang', 'Kode Supplier', 'Kode Transaksi Supplier', 'Kode Transaksi Pembeli', 'Nama Barang', 'Qty', 'Harga Item'];
    const editFieldOrigin = '<h1>Edit Data</h1> <div class="table-edit-field-wrapper"> </div> <div class="btn-field-accept-cancle"> <div class="btn-cancle" id="btn-discard" onclick="discardFormTextField(this)"> <h1>Discard</h1> </div> <div class="btn-accept" id="btn-save" onclick="saveFormTextField(this)"> <h1>Save</h1> </div> </div>';
    const editFieldPetugasDialog = '<div class="petugas-form-add-data-dialog"> <h1>Tambahakan terpilih ke transaksi_supplier?</h1> <div class="btn-field-accept-cancle"> <div class="btn-cancle" onclick="closePetugasAddDataForm()"> <h1>Discard</h1> </div> <div class="btn-accept" onclick="addPetugasAddDataForm()"> <h1>Add</h1> </div> </div> </div>';

    function loadThings(strTitile, x, things) {
        // const things = ;
        const tabelthings = document.getElementsByClassName('table-database')[x];
        const tabel = tabelthings.children[1].children[0];
        const title = tabelthings.children[0];

        console.log(`things: ${things}`);
        if (things == true) {
            title.textContent = `${strTitile} kosong kak`;
        } else {
            title.textContent = `Daftar ${strTitile}`;
            let generateHeader = '<tr>';
            for (let index = 0; index < strTableHeader.length; index++) {
                generateHeader += '<th>' + strTableHeader[index] + '</th>';
            }
            generateHeader += '</tr>';
            tabel.innerHTML = generateHeader;
            for (let i = 0; i < things.length; i++) {
                tabel.innerHTML += "<tr onclick='editSelectedRow(this)'>" +
                    "<td>" + things[i].kode_barang + "</td>" +
                    "<td>" + things[i].kode_supplier + "</td>" +
                    "<td>" + things[i].kode_transaksi_supplier + "</td>" +
                    "<td>" + things[i].kode_transaksi_pembeli + "</td>" +
                    "<td>" + things[i].nama_barang + "</td>" +
                    "<td>" + things[i].qty + "</td>" +
                    "<td>" + things[i].harga_item + "</td>" +
                    "</tr>";
            }
        }
    }
    loadThings('Barang', 0, <?= $barang ?>);
    loadThings('Transaksi Supplier', 1, <?= $barang ?>);
    loadThings('Pesanan', 2, <?= $barang ?>);

    var rowEditTableOpen = false;

    function generateFormTextField(x) {
        if (rowEditTableOpen == true) {
            let editField;
            if (x == 0) {
                editField = document.getElementsByClassName('table-edit-row')[1];
            } else {
                editField = document.getElementsByClassName('table-edit-row')[0];
            }
            editField.innerHTML = '';
            editField.style.margin = '0px 25px 0px 0px';
            rowEditTableOpen = false;
        }
        rowEditTableOpen = true;
        const editField = document.getElementsByClassName('table-edit-row')[x];
        if (x == 2) {
            editField.innerHTML = editFieldPetugasDialog;
        } else {
            editField.style.margin = `50px 50px 50px 25px`;
            editField.innerHTML = editFieldOrigin;
            const editFieldWrapper = document.getElementsByClassName('table-edit-field-wrapper')[0];
            for (let index = 0; index < strTableHeader.length; index++) {
                editFieldWrapper.innerHTML += '<div class="material-text-box"> <div class="group"> <input type="text" required="required"/> <label>' +
                    strTableHeader[index] + '</label> </div> </div>';
            }
        }
    }

    function getParentId_tableEditRow(x) {
        return x[x.length - 1];
    }

    var editSelectedRowWidget = null;

    function editSelectedRow(x) {
        if (editSelectedRowWidget != null) {
            editSelectedRowWidget.style.backgroundColor = null;
        }
        editSelectedRowWidget = x;
        editSelectedRowWidget.style.backgroundColor = `rgba(194, 182, 182, 0.7)`;
        let parentId = getParentId_tableEditRow(x.parentNode.parentNode.parentNode.parentNode.id);
        generateFormTextField(parentId);
        console.log(parentId);
        if (parentId == 2) {
            return;
        }
        const td = x.children;
        const editFieldWrapper = document.getElementsByClassName('table-edit-field-wrapper')[0];
        for (let index = 0; index < td.length; index++) {
            editFieldWrapper.children[index].children[0].children[0].value = td[index].innerHTML;
        }
    }

    function discardFormTextField(x) {
        const editField = document.getElementsByClassName('table-edit-row')[getParentId_tableEditRow(x.parentNode.parentNode.parentNode.children[0].id)];
        editField.innerHTML = '';
        editField.style.margin = '0px 25px 0px 0px';
        editSelectedRowWidget.style.backgroundColor = null;
    }

    function saveFormTextField(x) {
        const editFieldWrapper = document.getElementsByClassName('table-edit-field-wrapper')[0];
        let valueToSubmit = [];
        for (let index = 0; index < editFieldWrapper.children.length; index++) {
            valueToSubmit.push(editFieldWrapper.children[index].children[0].children[0].value);

        }
        discardFormTextField(x);
        console.log(valueToSubmit);
    }

    function showPetugasFormAdd(){
        const formAddData = document.getElementsByClassName('petugas-form-add-data')[0];
        const formAddDataFilter = document.getElementsByClassName('form-add-data-filter')[0];
        formAddDataFilter.style.backgroundColor = `rgba(0, 0, 0, 0.7)`;
        formAddDataFilter.style.pointerEvents = 'all';
        formAddDataFilter.onclick = function(){closePetugasAddDataForm();};       
        formAddData.style.top = '50%';
    }

    function closePetugasAddDataForm(){
        const formAddData = document.getElementsByClassName('petugas-form-add-data')[0];
        const formAddDataFilter = document.getElementsByClassName('form-add-data-filter')[0];
        formAddDataFilter.style.backgroundColor = `rgba(0, 0, 0, 0)`;
        formAddDataFilter.style.pointerEvents = 'none';
        formAddDataFilter.onclick = null;
        formAddData.style.top = '150%';
    }

    function addPetugasAddDataForm() {
        const formAddData = editSelectedRowWidget;
        let valueToSubmit = [];
        for (let index = 0; index < formAddData.children.length; index++) {
            valueToSubmit.push(formAddData.children[index].innerHTML);

        }
        console.log(valueToSubmit);
        closePetugasAddDataForm();
        //TODO: Add data to database
        console.log("UwU");
    }





    // double click form
    function showAddDataForm() {
        //TODO: Animate Later
        //Malas pakai modal ehe
        const formAddData = document.getElementsByClassName('form-add-data')[0];
        const formAddDataFilter = document.getElementsByClassName('form-add-data-filter')[0];
        formAddDataFilter.style.backgroundColor = `rgba(0, 0, 0, 0.7)`;
        formAddDataFilter.style.pointerEvents = 'all';
        formAddData.style.top = '50%';
    }

    function closeAddDataForm() {
        const formAddData = document.getElementsByClassName('form-add-data')[0];
        const formAddDataFilter = document.getElementsByClassName('form-add-data-filter')[0];
        formAddDataFilter.style.backgroundColor = `rgba(0, 0, 0, 0)`;
        formAddDataFilter.style.pointerEvents = 'none';
        formAddData.style.top = '150%';
    }

    function addAddDataForm() {
        const formAddData = document.getElementsByClassName('form-add-data-fieldtext')[0];
        let valueToSubmit = [];
        for (let index = 0; index < formAddData.children.length; index++) {
            valueToSubmit.push(formAddData.children[index].children[0].children[0].value);

        }
        console.log(valueToSubmit);
        closeAddDataForm();
        //TODO: BUAT GO FAR
        console.log("UwU");
    }
</script>

</html>