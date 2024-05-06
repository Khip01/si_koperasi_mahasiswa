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
    $barang = getDataFromQuery("SELECT * FROM barang WHERE kode_transaksi_pembeli IS NOT NULL AND kode_transaksi_supplier IS NULL");
    // $barang = getDataFromQuery("SELECT * FROM barang ");
    $barang = json_encode($barang);

    $transaksi_pembeli = getDataFromQuery("SELECT * FROM transaksi_pembeli");
    $transaksi_pembeli = json_encode($transaksi_pembeli);

    $petugas = getDataFromQuery("SELECT * FROM petugas");
    $petugas = json_encode($petugas);
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
        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
            <circle cx="12" cy="6" r="4" fill="currentColor" />
            <path fill="currentColor" d="M20 17.5c0 2.485 0 4.5-8 4.5s-8-2.015-8-4.5S7.582 13 12 13s8 2.015 8 4.5" opacity="0.5" />
        </svg>
        <h1 id="currentPetugas">Pilih Onichan yang Bertugas</h1>
    </div>
</footer>

<script>
    var strTableHeader = [
        [],
        [],
        []
    ];
    const editFieldOrigin = '<h1>Edit Data</h1> <div class="table-edit-field-wrapper"> </div> <div class="btn-field-accept-cancle"> <div class="btn-cancle" id="btn-discard" onclick="discardFormTextField(this)"> <h1>Discard</h1> </div> <div class="btn-accept" id="btn-save" onclick="saveFormTextField(this)"> <h1>Save</h1> </div> </div>';
    const editFieldPetugasDialog = '<div class="petugas-form-add-data-dialog"> <h1>Kore wa onii-chan?</h1> <h2 id="onii-chan-name"></h2> <div class="btn-field-accept-cancle"> <div class="btn-cancle" onclick="closePetugasAddDataForm()"> <h1>いいえ</h1> </div> <div class="btn-accept" onclick="addPetugasAddDataForm()"> <h1>はい〜</h1> </div> </div> </div>';

    function getParentId_tableEditRow(x) {
        return x[x.length - 1];
    }

    function loadThings(strTitile, x, things) {
        // const things = ;
        const tabelthings = document.getElementsByClassName('table-database')[x];
        const tabel = tabelthings.children[1].children[0];
        const title = tabelthings.children[0];

        console.log('things:');
        console.log(things);
        // console.log(Object.keys(things).length == 0);
        if (Object.keys(things).length == 0) {
            title.textContent = `${strTitile} kosong kak`;
            tabelthings.parentElement.style.flex = `4`;
        } else {
            let arrHeader = [];
            for (let index = 0; index < Object.keys(things[0]).length; index++) {
                arrHeader.push(Object.keys(things[0])[index]);
                // console.log(Object.keys(things[0]));
            }
            strTableHeader[x] = arrHeader;

            title.textContent = strTitile;
            let generateHeader = '<tr>';
            for (let index = 0; index < strTableHeader[x].length; index++) {
                generateHeader += '<th>' + strTableHeader[x][index] + '</th>';
            }
            generateHeader += '</tr>';
            tabel.innerHTML = generateHeader;
            for (let i = 0; i < things.length; i++) {
                let tableContent = "<tr onclick='editSelectedRow(this)'>";
                for (let index = 0; index < strTableHeader[x].length; index++) {
                    const element = things[i][strTableHeader[x][index]];
                    console.log(element);
                    tableContent += "<td>" + element + "</td>";
                }
                tableContent += "</tr>";
                tabel.innerHTML += tableContent;
            }

        }
    }
    loadThings('Daftar Pesanan Pembeli', 0, <?= $barang ?>);
    loadThings('Transaksi Supplier', 1, <?= $transaksi_pembeli ?>);

    var rowEditTableOpen = false;
    var rowEditTableLastOpen = null;

    function generateFormTextField(x) {
        if (rowEditTableOpen == true) {
            let editField;
            editField = document.getElementsByClassName('table-edit-row')[rowEditTableLastOpen];
            editField.innerHTML = '';
            editField.style.margin = null;
            rowEditTableOpen = false;
        }
        rowEditTableOpen = true;
        rowEditTableLastOpen = x;
        const editField = document.getElementsByClassName('table-edit-row')[x];
        if (x == 2) {
            editField.innerHTML = editFieldPetugasDialog;
        } else {
            editField.style.margin = `50px 50px 50px 25px`;
            editField.innerHTML = editFieldOrigin;
            const editFieldWrapper = document.getElementsByClassName('table-edit-field-wrapper')[0];
            for (let index = 0; index < strTableHeader[x].length; index++) {
                editFieldWrapper.innerHTML += '<div class="material-text-box"> <div class="group"> <input type="text" required="required"/> <label>' +
                    strTableHeader[x][index] + '</label> </div> </div>';
            }
        }
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

        let parent = document.getElementsByClassName('table-database')[parentId].parentElement;
        parent.style.padding = `0px 300px`;

        const td = x.children;
        if (parentId == 2) {
            const isThisOniichan = document.getElementById('onii-chan-name');
            isThisOniichan.textContent = td[2].innerHTML;
            return;
        }        
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
        editSelectedRowWidget = null;

        let parent = document.getElementsByClassName('table-database')[rowEditTableLastOpen].parentElement;
        parent.style.padding = null;
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

    function showPetugasFormAdd() {
        loadThings('Onii-chan~ wa dare?', 2, <?= $petugas ?>);
        const formAddData = document.getElementsByClassName('petugas-form-add-data')[0];
        const formAddDataFilter = document.getElementsByClassName('form-add-data-filter')[0];
        formAddDataFilter.style.backgroundColor = `rgba(0, 0, 0, 0.7)`;
        formAddDataFilter.style.pointerEvents = 'all';
        formAddDataFilter.onclick = function() {
            closePetugasAddDataForm();
        };
        formAddData.style.top = '50%';
    }

    function closePetugasAddDataForm() {
        const formAddData = document.getElementsByClassName('petugas-form-add-data')[0];
        const formAddDataFilter = document.getElementsByClassName('form-add-data-filter')[0];
        formAddDataFilter.style.backgroundColor = `rgba(0, 0, 0, 0)`;
        formAddDataFilter.style.pointerEvents = 'none';
        formAddDataFilter.onclick = null;
        formAddData.style.top = '150%';
        const editField = document.getElementsByClassName('table-edit-row')[2];
        editField.innerHTML = '';
        editField.style.margin = '0px 10px 50px 1px';
        editSelectedRowWidget.style.backgroundColor = null;
        editSelectedRowWidget = null;
        let parent = document.getElementsByClassName('table-database')[2].parentElement;
        parent.style.padding = null;
    }

    function addPetugasAddDataForm() {
        const formAddData = editSelectedRowWidget;
        let valueToSubmit = [];
        for (let index = 0; index < formAddData.children.length; index++) {
            valueToSubmit.push(formAddData.children[index].innerHTML);

        }
        document.getElementById('currentPetugas').innerText = valueToSubmit[2];
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