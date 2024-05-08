<?php
require '../core/functions.php';
require '../core/script.php';

$barang = "SELECT * FROM barang WHERE kode_transaksi_pembeli IS NOT NULL AND kode_transaksi_supplier IS NULL";
$transaksi_pembeli = "SELECT * FROM transaksi_pembeli";
$petugas = "SELECT * FROM petugas";
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
    <div class="table-field-wrapper">
        <div class="table-field">
            <div class="table-database" id="table-database-0">
                <div class="table-database-topsection">
                    <h1>Daftar Barang</h1>
                    <div class="material-text-box table-database-search">
                        <div class="group"> <input type="text" required="required" />
                            <label>Search</label>
                        </div>
                    </div>
                </div>
                <div class="table-wrapper">
                    <table></table>
                </div>
            </div>
            <div class="table-edit-row"> </div>
        </div>
        <div class="table-field">
            <div class="table-database" id="table-database-1">
                <div class="table-database-topsection">
                    <h1>Daftar Barang</h1>
                    <div class="material-text-box table-database-search">
                        <div class="group"> <input type="text" required="required" />
                            <label>Search</label>
                        </div>
                    </div>
                </div>
                <div class="table-wrapper">
                    <table></table>
                </div>
            </div>
            <div class="table-edit-row"> </div>
        </div>
    </div>

    <div class="form-add-data-filter"> </div>
    <div class="form-with-table">
        <div class="table-field">
            <div class="table-database" id="table-database-2">
                <div class="table-database-topsection">
                    <h1>Daftar Barang</h1>
                    <div class="material-text-box table-database-search">
                        <div class="group"> <input type="text" required="required" />
                            <label>Search</label>
                        </div>
                    </div>
                </div>
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

<footer class=" nav-bottom" onclick="showFormWithTable()" onmousewheel="showAddDataForm()">
    <div id="btn-add">
        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
            <circle cx="12" cy="6" r="4" fill="currentColor" />
            <path fill="currentColor" d="M20 17.5c0 2.485 0 4.5-8 4.5s-8-2.015-8-4.5S7.582 13 12 13s8 2.015 8 4.5" opacity="0.5" />
        </svg>
        <h1 id="currentPetugas">Pilih Onichan yang Bertugas</h1>
    </div>
</footer>

<script>
    const tables = [
        ["Daftar Pesanan Pembeli", "<?= $barang ?>"],
        ["Daftar Transaksi Pembeli", "<?= $transaksi_pembeli ?>"],
        ["Siapa yang Bertugas?", "<?= $petugas ?>"],
    ];
    const tableFormId = tables.length - 1;
    const formWithTableDialog =
        '<div class="form-with-table-dialog"> <h1 id="form-with-table-dialog-title">Anda adalah?</h1> <h2 id="form-with-table-highlight-sel-val"></h2> <div class="btn-field-accept-cancle"> <div class="btn-cancle" onclick="closeFormWithTable(1)"> <h1>Bukan</h1> </div> <div class="btn-accept" onclick="acceptFormWithTable()"> <h1>Untuk Nyata</h1> </div> </div> </div>';
    const formWithTableDialog_HighlightIdx = 2;


    var strTableHeader = [];
    const editFieldOrigin =
        '<h1>Edit Data</h1> <div class="table-edit-field-wrapper"> </div> <div class="btn-field-accept-cancle"> <div class="btn-cancle" id="btn-discard" onclick="discardFormTextField(this)"> <h1>Discard</h1> </div> <div class="btn-accept" id="btn-save" onclick="saveFormTextField(this)"> <h1>Save</h1> </div> </div>';

    function getParentId_tableEditRow(x) {
        let id = x[x.length - 1];
        return id;
    }

    function searchAddListener() {
        let searchWidget = document.getElementsByClassName("table-database-search");
        for (let index = 0; index < searchWidget.length; index++) {
            const element = searchWidget[index].children[0].children[0];
            console.log(element);
            element.addEventListener('input', function() {
                search(searchWidget[index]);
                // console.log(searchWidget[index].children[0].children[0].value);
            });
        }
    }
    searchAddListener();

    function test(x) {
        console.log(x);
        console.log(x.children[0].children[0].value)
    }

    // doksil https://stackoverflow.com/a/40358801

    function search(x) {
        const searchInput = x.children[0].children[0].value;
        const table = document.getElementsByClassName('table-wrapper')[getParentId_tableEditRow(x.parentElement.parentElement.id)].children[0];

        const searchTerm = searchInput;
        tr = table.getElementsByTagName("tr");
        // console.log(tr);

        for (let index = 1; index < tr.length; index++) {
            if(searchInput == "") {
                tr[index].style.display = null;
                continue;
            }
            let td = tr[index].getElementsByTagName("td");
            let found = false;
            for (let index = 0; index < td.length; index++) {
                if(td[index].innerHTML.toUpperCase().indexOf(searchTerm.toUpperCase()) > -1) {
                    found = true;
                    break;
                };
            }
            if(found) {
                tr[index].style.display = '';
            }else{
                tr[index].style.display = 'none';
            }
        }
    }

    function loadThings(strTitile, x, things) {
        const tabelthings = document.getElementsByClassName("table-database")[x];
        const tabel = tabelthings.children[1].children[0];
        const title = tabelthings.children[0].children[0];

        console.log("things:");
        console.log(things);
        // console.log(Object.keys(things).length == 0);
        if (Object.keys(things).length == 0) {
            title.textContent = `${strTitile} kosong kak`;
            tabelthings.children[0].children[1].style.display = "none";
            tabel.innerHTML = '';
        } else {
            let arrHeader = [];
            for (let index = 0; index < Object.keys(things[0]).length; index++) {
                arrHeader.push(Object.keys(things[0])[index]);
                // console.log(Object.keys(things[0]));
            }
            strTableHeader[x] = arrHeader;

            title.textContent = strTitile;
            let generateHeader = "<tr>";
            for (let index = 0; index < strTableHeader[x].length; index++) {
                generateHeader += "<th>" + strTableHeader[x][index] + "</th>";
            }
            generateHeader += "</tr>";
            tabel.innerHTML = generateHeader;
            for (let i = 0; i < things.length; i++) {
                let tableContent = "<tr onclick='editSelectedRow(this)'>";
                for (let index = 0; index < strTableHeader[x].length; index++) {
                    const element = things[i][strTableHeader[x][index]];
                    // console.log(element);
                    tableContent += "<td>" + element + "</td>";
                }
                tableContent += "</tr>";
                tabel.innerHTML += tableContent;
            }
        }
    }

    // For Update values
    async function tableLoader() {
        for (let index = 0; index < tables.length; index++) {
            loadThings(tables[index][0], index, await selectTable(tables[index][1]));
        }
    }
    tableLoader(tables);

    var rowEditTableOpen = false;
    var rowEditTableLastOpen = null;

    function generateFormTextField(x) {
        if (rowEditTableOpen == true && x != tableFormId) {
            let editField;
            editField =
                document.getElementsByClassName("table-edit-row")[rowEditTableLastOpen];
            editField.innerHTML = "";
            editField.style.margin = null;
            rowEditTableOpen = false;
        }
        rowEditTableOpen = true;
        rowEditTableLastOpen = x;
        let editField = document.getElementsByClassName("table-edit-row")[x];
        console.log(x);
        if (x == tableFormId) {
            editField =
                document.getElementsByClassName("table-edit-row")[tables.length - 1];
            editField.innerHTML = formWithTableDialog;
        } else {
            editField.style.margin = `30px 20px 30px 25px`;
            editField.innerHTML = editFieldOrigin;
            const editFieldWrapper = document.getElementsByClassName(
                "table-edit-field-wrapper"
            )[0];
            for (let index = 0; index < strTableHeader[x].length; index++) {
                editFieldWrapper.innerHTML +=
                    '<div class="material-text-box"> <div class="group"> <input type="text" required="required"/> <label>' +
                    strTableHeader[x][index] +
                    "</label> </div> </div>";
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
        let parentId = getParentId_tableEditRow(
            x.parentNode.parentNode.parentNode.parentNode.id
        );
        generateFormTextField(parentId);
        console.log(parentId);

        let parentTableField =
            document.getElementsByClassName("table-database")[parentId].parentElement;
        parentTableField.style.padding = `0px 3.25rem`;
        const td = x.children;
        console.log(parentId + tableFormId);
        if (parentId == tableFormId) {
            const highLightSelVal = document.getElementById("form-with-table-highlight-sel-val");
            highLightSelVal.textContent = td[formWithTableDialog_HighlightIdx].innerHTML;
            return;
        } else {
            if (tables.length > 2) {
                let tableField;
                if (parentId == 0) {
                    tableField = document.getElementsByClassName("table-field")[1];
                }
                if (parentId == 1) {
                    tableField = document.getElementsByClassName("table-field")[0];
                }
                tableField.style.position = "absolute";
                tableField.style.top = "50%";
                tableField.style.left = "-1250%";
                // tableField.style.visibility = 'hidden';
                tableField.style.transform = "translate(-50%, -50%)";
                tableField.style.zIndex = `-1`;
            }

            const editFieldWrapper = document.getElementsByClassName(
                "table-edit-field-wrapper"
            )[0];
            for (let index = 0; index < td.length; index++) {
                editFieldWrapper.children[index].children[0].children[0].value =
                    td[index].innerHTML;
            }
        }
    }

    function discardFormTextField(x) {
        let parentId = getParentId_tableEditRow(
            x.parentNode.parentNode.parentNode.children[0].id
        );
        tableLoader();
        const editField = document.getElementsByClassName("table-edit-row")[parentId];
        editField.innerHTML = "";
        editField.style.margin = "0px 25px 0px 0px";
        editSelectedRowWidget.style.backgroundColor = null;
        editSelectedRowWidget = null;

        let parent =
            document.getElementsByClassName("table-database")[rowEditTableLastOpen]
            .parentElement;
        parent.style.padding = null;

        let tableField;
        if (parentId == 0) {
            tableField = document.getElementsByClassName("table-field")[1];
        }
        if (parentId == 1) {
            tableField = document.getElementsByClassName("table-field")[0];
        }
        tableField.style = null;
    }

    function saveFormTextField(x) {
        const editFieldWrapper = document.getElementsByClassName(
            "table-edit-field-wrapper"
        )[0];
        let valueToSubmit = [];
        for (let index = 0; index < editFieldWrapper.children.length; index++) {
            valueToSubmit.push(
                editFieldWrapper.children[index].children[0].children[0].value
            );
        }
        discardFormTextField(x);
        console.log(valueToSubmit);
    }

    function showFormWithTable() {
        tableLoader();
        const formAddData = document.getElementsByClassName("form-with-table")[0];
        const formAddDataFilter = document.getElementsByClassName(
            "form-add-data-filter"
        )[0];
        formAddDataFilter.style.backgroundColor = `rgba(0, 0, 0, 0.7)`;
        formAddDataFilter.style.pointerEvents = "all";
        formAddDataFilter.onclick = function() {
            closeFormWithTable();
        };
        formAddData.style.top = "50%";
    }

    function closeFormWithTable() {
        const formAddData = document.getElementsByClassName("form-with-table")[0];
        const formAddDataFilter = document.getElementsByClassName(
            "form-add-data-filter"
        )[0];
        formAddDataFilter.style.backgroundColor = `rgba(0, 0, 0, 0)`;
        formAddDataFilter.style.pointerEvents = "none";
        formAddDataFilter.onclick = null;
        formAddData.style.top = "1500%";
        const editField =
            document.getElementsByClassName("table-edit-row")[tableFormId];
        editField.innerHTML = "";
        editField.style.margin = "0px 10px 50px 1px";
        editSelectedRowWidget.style.backgroundColor = null;
        editSelectedRowWidget = null;
        let parent =
            document.getElementsByClassName("table-database")[tableFormId]
            .parentElement;
        parent.style.padding = null;
    }

    function acceptFormWithTable() {
        const formAddData = editSelectedRowWidget;
        let valueToSubmit = [];
        for (let index = 0; index < formAddData.children.length; index++) {
            valueToSubmit.push(formAddData.children[index].innerHTML);
        }
        document.getElementById("currentPetugas").innerText = valueToSubmit[2];
        console.log(valueToSubmit);
        closeFormWithTable();
    }

    // scroll form
    function showAddDataForm() {
        const formAddData = document.getElementsByClassName("form-add-data")[0];
        const formAddDataFilter = document.getElementsByClassName(
            "form-add-data-filter"
        )[0];
        formAddDataFilter.style.backgroundColor = `rgba(0, 0, 0, 0.7)`;
        formAddDataFilter.style.pointerEvents = "all";
        formAddData.style.top = "50%";
    }

    function closeAddDataForm() {
        const formAddData = document.getElementsByClassName("form-add-data")[0];
        const formAddDataFilter = document.getElementsByClassName(
            "form-add-data-filter"
        )[0];
        formAddDataFilter.style.backgroundColor = `rgba(0, 0, 0, 0)`;
        formAddDataFilter.style.pointerEvents = "none";
        formAddData.style.top = "1500%";
    }

    function addAddDataForm() {
        const formAddData = document.getElementsByClassName(
            "form-add-data-fieldtext"
        )[0];
        let valueToSubmit = [];
        for (let index = 0; index < formAddData.children.length; index++) {
            valueToSubmit.push(
                formAddData.children[index].children[0].children[0].value
            );
        }
        console.log(valueToSubmit);
        closeAddDataForm();
        console.log("UwU");
    }
</script>

</html>