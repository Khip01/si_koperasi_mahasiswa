<?php
require '../core/functions.php';
require '../core/script.php';

$barang = "SELECT * FROM barang";
$supplier = "SELECT * FROM supplier";
$supplier = "SELECT * FROM supplier";
$transaksi_supplier = "SELECT * FROM transaksi_supplier WHERE kode_supplier IS NULL";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="styles/supplier.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier Page</title>
    <!-- Font Lexend -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
</head>

<header class="nav-header">
    <div class="tabel-title-field">
        <h1>TABEL</h1>
        <h2 id="what-table">Supplier</h2>
    </div>
    <nav id="nav-pov-mode">
        <a href="pembeli.php">
            <h1>Pembeli</h1>
        </a>
        <a href="petugas.php">
            <h1>Petugas</h1>
        </a>
        <a>
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
    <div class="parallax-background-image"></div>
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
            <div class="table-edit-row">
            </div>
        </div>
    </div>

    <div class="form-add-data-filter"> </div>
    <div class="form-with-table">
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
        <div class="table-field">
            <div class="table-database" id="table-database-3">
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

    <div class="dialog-yes-no">
        <div class="dialog-yes-no-top-section">
            <img src="imgs/zete-gemoy.webp" />
            <h1>Hold ON!~</h1>
        </div>
        <div class="dialog-yes-no-content">
            <h1>Ambatu Loli</h1>
        </div>
        <div class="btn-field-accept-cancle">
            <div class="btn-cancle" onclick="closeDialogYesNo(0)">
                <h1>I'm change my mind</h1>
            </div>
            <div class="btn-accept" onclick="acceptDialogYesNo(0)">
                <h1>I KNOW</h1>
            </div>
        </div>
    </div>

    <div class="dialog-ga-cukup">
        <div class="dialog-yes-no-top-section">
            <h1>Yahaha stok ga cukup</h1>
        </div>
        <div class="dialog-yes-no-content">
            <h1></h1>
            <img src="imgs/barang-habis.webp" />
        </div>
        <div class="btn-field-accept-cancle">
            <div class="btn-cancle" onclick="closeDialogGadaBarang()">
                <h1>Okaii</h1>
            </div>
            <div class="btn-accept" onclick="closeDialogGadaBarang()">
                <h1>Refresh</h1>
            </div>
        </div>
    </div>



    <div class="form-add-data">
        <div class="top-bar-form-add-data">
            <h1>Edit Data</h1>
        </div>
        <div class="form-add-data-fieldtext">
            <div class="value-editor-wrapper">
                <!-- <div class="value-editor">
                    <div class="material-text-box">
                        <div class="group original-value">
                            <input type="text" required="required" />
                            <label>Original</label>
                        </div>
                    </div>
                    <div class="arrow-to-edited">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 15">
                            <path d="M8.293 2.293a1 1 0 0 1 1.414 0l4.5 4.5a1 1 0 0 1 0 1.414l-4.5 4.5a1 1 0 0 1-1.414-1.414L11 8.5H1.5a1 1 0 0 1 0-2H11L8.293 3.707a1 1 0 0 1 0-1.414" />
                        </svg>
                    </div>
                    <div class="material-text-box">
                        <div class="group edited-value">
                            <input type="text" required="required" />
                            <label>Edited Value</label>
                            <div class="dropdown">
                                <div class="dropdown-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M16.88 2.88a1.25 1.25 0 0 0-1.77 0L6.7 11.29a.996.996 0 0 0 0 1.41l8.41 8.41c.49.49 1.28.49 1.77 0s.49-1.28 0-1.77L9.54 12l7.35-7.35c.48-.49.48-1.28-.01-1.77" />
                                    </svg>
                                </div>
                                <div class="dropdown-content">
                                    <!-- <div class="dropdown-content-wrapper">
                                    </div> -
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

            </div>
        </div>
        <div class="btn-field-accept-cancle">
            <div class="btn-cancle" onclick="closeAddDataForm()">
                <h1>Discard</h1>
            </div>
            <div class="btn-accept" onclick="saveAddDataForm()">
                <h1>Save</h1>
            </div>
        </div>
    </div>
</body>

<footer class="nav-bottom">
    <div class="footer-btn" onclick="showFormWithTable(0)">
        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 20 20">
            <path d="M18 5.5a4.5 4.5 0 1 1-9 0a4.5 4.5 0 0 1 9 0m-4-2a.5.5 0 0 0-1 0V5h-1.5a.5.5 0 0 0 0 1H13v1.5a.5.5 0 0 0 1 0V6h1.5a.5.5 0 0 0 0-1H14zM6 4h2.207a5.5 5.5 0 0 0-.185 1H6a2 2 0 0 0-2 2h4.207q.149.524.393 1H4v3h3.5a.5.5 0 0 1 .5.5a2 2 0 1 0 4 0a.5.5 0 0 1 .5-.5H16v-.6a5.5 5.5 0 0 0 1-.657V15a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3" />
        </svg>
        <h1 id="currentPetugas">Tambah Barang</h1>
    </div>
    <div class="footer-items-separator"> </div>
    <div class="footer-btn" onclick="showFormWithTable(1)">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
            <g stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="4">
                <path d="M39 6H9a3 3 0 0 0-3 3v30a3 3 0 0 0 3 3h30a3 3 0 0 0 3-3V9a3 3 0 0 0-3-3" />
                <path d="m21 31l5 4l8-10M14 15h20m-20 8h8" />
            </g>
        </svg>
        <h1 id="currentPetugas">Lakukan Transaksi</h1>
    </div>
</footer>

<script>
    const tables_target = ["barang", "supplier", "supplier", "transaksi_supplier"];

    const tables = [
        ["Daftar Barang", "<?= $barang ?>", null],
        ["Daftar Supplier", "<?= $supplier ?>", 0],
        ["Daftar Supplier", "<?= $supplier ?>", 1],
        ["Daftar Transaksi Supplier", "<?= $transaksi_supplier ?>", 1],
    ];
    const tableFormId = tables.length - 1;
    const formWithTableDialog =
        '<div class="form-with-table-dialog"> <div class="table-edit-row-header"> <h1 id="form-with-table-dialog-title">Tambahkan?</h1> <div class="edit-row-btn-del" onclick="showDialogYesNo(1)"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"> <path d="M7 21q-.825 0-1.412-.587T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413T17 21zM17 6H7v13h10zM9 17h2V8H9zm4 0h2V8h-2zM7 6v13z" /> </svg> </div> </div> <div id="form-with-table-edit-row-section"> <h2 id="form-with-table-highlight-sel-val"></h2> <div class="material-text-box"> <div class="group"> <input type="text" required="required" /> <label>Search</label> </div> <div id="form-with-table-bottom-text-section"> <h3></h3> <h3></h3> </div> </div> <div class="material-text-box"> <div class="group"> <input type="text" required="required" /> <label>Search</label> </div> <div id="form-with-table-bottom-text-section"> <h3></h3> <h3></h3> </div> </div> <div class="material-text-box"> <div class="group"> <input type="text" required="required" /> <label>Search</label> </div> <div id="form-with-table-bottom-text-section"> <h3></h3> <h3></h3> </div> </div> <div class="material-text-box"> <div class="group"> <input type="text" required="required" /> <label>Search</label> </div> <div id="form-with-table-bottom-text-section"> <h3></h3> <h3></h3> </div> </div> </div> <div class="table-edit-field-wrapper"> </div> <div class="btn-field-accept-cancle"> <div class="btn-cancle" onclick="closeFormWithTable(this)"> <h1>Bukan</h1> </div> <div class="btn-accept" onclick="acceptFormWithTable(this)"> <h1>Untuk Nyata</h1> </div> </div> </div>';
    var formWithTableDialog_HighlightIdx = 2;

    var dialogStartAt = 1;


    var strTableHeader = [];
    const editFieldOrigin =
        '<h1>Edit Data</h1> <div class="table-edit-field-wrapper"> </div> <div class="btn-field-accept-cancle"> <div class="btn-cancle" id="btn-discard" onclick="discardFormTextField(this)"> <h1>Discard</h1> </div> <div class="btn-accept" id="btn-save" onclick="saveFormTextField(this)"> <h1>Save</h1> </div> </div>';

    const editFieldOrigin_Delete = '<div class="table-edit-row-header"> <h1>Edit Data</h1> <div class="edit-row-btn-del" onclick="showDialogYesNo(0)"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"> <path d="M7 21q-.825 0-1.412-.587T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413T17 21zM17 6H7v13h10zM9 17h2V8H9zm4 0h2V8h-2zM7 6v13z" /> </svg> </div> </div> <div class="table-edit-field-wrapper"> </div> <div class="btn-field-accept-cancle"> <div class="btn-cancle" id="btn-discard" onclick="discardFormTextField(this)"> <h1>Discard</h1> </div> <div class="btn-accept" id="btn-save" onclick="saveFormTextField(this)"> <h1>Save</h1> </div> </div>';

    function getParentId_tableEditRow(x) {
        let id = x[x.length - 1];
        return id;
    }

    function searchAddListener() {
        let searchWidget = document.getElementsByClassName("table-database-search");
        for (let index = 0; index < searchWidget.length; index++) {
            const element = searchWidget[index].children[0].children[0];
            // console.log(element);
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
            if (searchInput == "") {
                tr[index].style.display = null;
                continue;
            }
            let td = tr[index].getElementsByTagName("td");
            let found = false;
            for (let index = 0; index < td.length; index++) {
                if (td[index].innerHTML.toUpperCase().indexOf(searchTerm.toUpperCase()) > -1) {
                    found = true;
                    break;
                };
            }
            if (found) {
                tr[index].style.display = '';
            } else {
                tr[index].style.display = 'none';
            }
        }
    }

    function loadThings(strTitile, x, things, dialogId) {
        // console.log(`DialogID: ${dialogId}`);
        const tabelthings = document.getElementsByClassName("table-database")[x];
        const tabel = tabelthings.children[1].children[0];
        const title = tabelthings.children[0].children[0];
        tabelthings.style = null;

        console.log("things:");
        console.log(things);
        // console.log(Object.keys(things).length == 0);
        if (Object.keys(things).length == 0) {
            title.textContent = `${strTitile} kosong kak`;
            tabelthings.children[0].children[1].style.display = "none";
            tabelthings.style.width = '350px';
            tabel.innerHTML = '';
        } else {
            // tabelthings.style = null;
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
                let tableContent;
                if (x < dialogStartAt) {
                    tableContent = "<tr onclick='editSelectedRow(this)'>";
                } else {
                    tableContent = `<tr onclick='editSelectedRow_Dialog(this, ${dialogId})'>`;
                }
                for (let index = 0; index < strTableHeader[x].length; index++) {
                    let element = things[i][strTableHeader[x][index]];
                    tableContent += "<td style='max-width: 250px; overflow:hidden;'>" + element + "</td>";
                }
                tableContent += "</tr>";
                tabel.innerHTML += tableContent;
            }
        }
    }

    // For Update values
    async function tableLoader() {
        for (let index = 0; index < tables.length; index++) {
            loadThings(tables[index][0], index, await selectTable(tables[index][1]), tables[index][2]);
        }
    }
    tableLoader(tables);

    var rowEditTableOpen = false;
    var rowEditTableLastOpen = null;

    function closeLastRowEdit() {
        let editField = document.getElementsByClassName("table-edit-row")[rowEditTableLastOpen];
        editField.innerHTML = "";
        editField.style.margin = null;
        rowEditTableOpen = false;
        document.getElementsByClassName('table-field-wrapper')[0].children[0].style = null;
    }

    function generateFormTextField(x, closeLastopen = true) {
        if (rowEditTableOpen == true && x != tableFormId && closeLastopen) {
            closeLastRowEdit();
        }
        rowEditTableOpen = true;
        rowEditTableLastOpen = x;
        let editField = document.getElementsByClassName("table-edit-row")[x];
        // console.log(x);
        if (x < dialogStartAt) {
            editField.style.margin = `30px 20px 30px 25px`;
            editField.innerHTML = editFieldOrigin_Delete;
            const editFieldWrapper = document.getElementsByClassName(
                "table-edit-field-wrapper"
            )[0];
            for (let index = 0; index < strTableHeader[x].length; index++) {
                editFieldWrapper.innerHTML +=
                    '<div class="material-text-box"> <div class="group"> <input type="text" required="required"/> <label>' +
                    strTableHeader[x][index] +
                    "</label> </div> </div>";
            }
        } else {
            editField =
                document.getElementsByClassName("table-edit-row")[x];
            editField.innerHTML = formWithTableDialog;
        }
    }

    var editSelectedRowWidget = null;
    let currentTd;
    let editRow_Kd;

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
        // console.log(parentId);

        let parentTableField =
            document.getElementsByClassName("table-database")[parentId].parentElement;
        parentTableField.style.padding = `0px 3.25rem`;
        const td = x.children;
        currentTd = td;
        // console.log(parentId + tableFormId);
        if (parentId == tableFormId) {
            const highLightSelVal = document.getElementById("form-with-table-highlight-sel-val");
            highLightSelVal.textContent = td[formWithTableDialog_HighlightIdx].innerHTML;
            return;
        } else {
            const editFieldWrapper = document.getElementsByClassName(
                "table-edit-field-wrapper"
            )[0];
            editRow_Kd = [];
            let kdId = 0;
            for (let index = 0; index < td.length; index++) {
                let value = td[index].innerHTML;
                // console.log(value.length);
                if (index == 2 || index == 3) {
                    if (value.length < 1 || value == 'null') {
                        editFieldWrapper.children[index].style.pointerEvents = 'none';
                        editFieldWrapper.children[index].children[0].children[1].textContent = 'No Editing For this >w<';
                    } else {
                        editFieldWrapper.children[index].children[0].style.pointerEvents = 'none';
                        editFieldWrapper.children[index].children[0].children[1].textContent = `${strTableHeader[0][index]}`;
                    }
                    editRow_Kd.push(value.split(';').filter(function(e) {
                        return e
                    }));
                    let currentKdId = kdId;
                    let currentKdBarang = td[0].innerHTML;
                    editFieldWrapper.children[index].onclick = function() {
                        showAddDataForm(currentKdId, currentKdBarang);
                    };
                    kdId += 1;
                    continue;
                }
                editFieldWrapper.children[index].children[0].children[0].value = value;
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

    async function saveFormTextField(x) {
        let parentID = getParentId_tableEditRow(x.parentElement.parentElement.parentElement.children[0].id);
        const editFieldWrapper = document.getElementsByClassName("table-edit-field-wrapper")[parentID];

        let valueToSubmit = new Map();
        let where_data = currentTd[0].innerHTML;
        // let valueFromTableRow = [];
        for (let index = 0; index < editFieldWrapper.children.length; index++) {
            if (index == 2 || index == 3) {
                continue;
            }
            let value = editFieldWrapper.children[index].children[0].children[0].value
            if (value == '') {
                value = null;
            }
            valueToSubmit.set(strTableHeader[parentID][index], value);
            // valueFromTableRow.push(value);
        }
        for (let [key, value] of valueToSubmit) {
            await update(tables_target[parentID], 'kode_barang', where_data, key, valueToSubmit.get(key));
            where_data = valueToSubmit.get('kode_barang');
        }
        console.log(valueToSubmit);
        discardFormTextField(x);
    }

    let dialogPageAt = -1;
    let dialogValueToSubmit;
    let addtionalValues;

    async function editSelectedRow_Dialog(x, dialogId) {
        if (editSelectedRowWidget != null) {
            editSelectedRowWidget.style.backgroundColor = null;
        }
        editSelectedRowWidget = x;
        editSelectedRowWidget.style.backgroundColor = `rgba(194, 182, 182, 0.7)`;
        let parentId = getParentId_tableEditRow(
            x.parentNode.parentNode.parentNode.parentNode.id
        );
        generateFormTextField(parentId, false);

        let parentTableField =
            document.getElementsByClassName("table-database")[parentId].parentElement;
        parentTableField.style.padding = `0px 3.25rem`;
        const td = x.children;
        // console.log(parentTableField);

        // console.log(dialogPageAt);
        const formDialog = parentTableField.getElementsByClassName("form-with-table-dialog")[0];
        const highLightSelVal = formDialog.children[1].children[0];

        console.log(dialogId);
        if (dialogId == 0) {
            formDialog.children[0].children[0].textContent = "Isi ini dulu kak";
            formWithTableDialog_HighlightIdx = 0;
            highLightSelVal.display = 'none';
            let qtyTextBoxes = formDialog.children[1];
            for (let index = 1; index < qtyTextBoxes.children.length; index++) {
                let qtyTextBox = formDialog.children[1].children[index];
                qtyTextBox.style.display = null;
                qtyTextBox.style.display = 'block';
                if (index == 1) {
                    qtyTextBox.children[0].children[0].value = await barangMaxKd();
                    qtyTextBox.children[0].children[1].innerHTML = strTableHeader[0][index - 1];
                    continue;
                }
                qtyTextBox.children[0].children[1].innerHTML = strTableHeader[0][index + 2];
                if (index > 2) {
                    qtyTextBox.children[0].children[0].type = 'number';
                    qtyTextBox.children[0].children[0].min = '0';
                }
            }
            // let qtyTextBox = formDialog.children[1].children[1];
            // qtyTextBox.style.display = null;
            // qtyTextBox.style.display = 'block';
        }

        if (dialogId == 1) {
            if (dialogPageAt == 0) {
                formDialog.children[0].children[0].textContent = "Siapa Supplier?";
                formWithTableDialog_HighlightIdx = 0;
            }
            if (dialogPageAt == 1) {
                formDialog.children[0].children[0].textContent = "Acc?";
                formDialog.children[0].children[1].style.display = 'block';
                let dialogYesNo = document.getElementsByClassName('dialog-yes-no')[0];
                dialogYesNo.children[2].children[0].onclick = function() {
                    closeDialogYesNo(1);
                }

                dialogYesNo.children[2].children[1].onclick = function() {
                    acceptDialogYesNo(1);
                }
                formWithTableDialog_HighlightIdx = 0;
            }
            highLightSelVal.textContent = td[formWithTableDialog_HighlightIdx].innerHTML;
        }
    }

    let showingDialogId = 0;

    function showFormWithTable(dialogId) {
        showingDialogId = dialogId;
        const formTable = document.getElementsByClassName("form-with-table")[0];
        for (let index = 0; index < formTable.children.length; index++) {
            formTable.children[index].style.display = null;
        }

        if (dialogPageAt < 0) {
            addtionalValues = new Map();
            dialogValueToSubmit = new Map();
            tableLoader();
            const formAddData = document.getElementsByClassName("form-with-table")[0];
            const formAddDataFilter = document.getElementsByClassName(
                "form-add-data-filter"
            )[0];
            formAddDataFilter.style.backgroundColor = `rgba(0, 0, 0, 0.7)`;
            formAddDataFilter.style.pointerEvents = "all";
            formAddDataFilter.onclick = function() {
                closeFormWithTable(null);
                closeDialogYesNo(1);
            };
            formAddData.style.top = "50%";
            dialogPageAt = 0;
        }

        if (dialogId == 0) {
            formTable.children[dialogId].style.display = 'flex';
            return;
        }

        if (dialogId == 1 && dialogPageAt == 0) {
            formTable.children[dialogId].style.display = 'flex';
            return;
        }

        if (dialogId == 1 && dialogPageAt == 1) {
            formTable.children[dialogId + 1].style.display = 'flex';
            return;
        }
    }

    function closeFormWithTable(x) {
        dialogPageAt -= 1;
        if (x == null) {
            closeDialogGadaBarang();
            let tableField = document.getElementsByClassName("table-field");
            const formAddDataFilter = document.getElementsByClassName(
                "form-add-data-filter"
            )[0];
            const formAddData = document.getElementsByClassName("form-with-table")[0];
            formAddDataFilter.style = null;
            formAddDataFilter.onclick = null;
            formAddData.style = null;
            for (let index = 1; index < tableField.length; index++) {
                let parentId = getParentId_tableEditRow(tableField[index].children[0].id);
                // console.log(tableField[index]);
                // console.log(parentId);
                dialogPageAt = -1;

                const editField =
                    document.getElementsByClassName("table-edit-row")[parentId];
                // console.log(editField);
                editField.innerHTML = "";
                editField.style = null;
                if (editSelectedRowWidget != null) {
                    editSelectedRowWidget.style.backgroundColor = null;
                    editSelectedRowWidget = null;
                }
                let parent =
                    document.getElementsByClassName("table-database")[parentId]
                    .parentElement;
                parent.style.padding = null;
            }

            return;
        }

        if (x != null && dialogPageAt < 0) {
            let parentId = getParentId_tableEditRow(x.parentElement.parentElement.parentElement.parentElement.children[0].id);
            dialogPageAt = -1;
            const formAddData = document.getElementsByClassName("form-with-table")[0];
            const formAddDataFilter = document.getElementsByClassName(
                "form-add-data-filter"
            )[0];
            // formAddDataFilter.style.backgroundColor = `rgba(0, 0, 0, 0)`;
            formAddDataFilter.style = null;
            formAddDataFilter.onclick = null;
            formAddData.style = null;
            const editField =
                document.getElementsByClassName("table-edit-row")[parentId];
            // console.log(editField);
            editField.innerHTML = "";
            editField.style = null;
            if (editSelectedRowWidget != null) {
                editSelectedRowWidget.style.backgroundColor = null;
                editSelectedRowWidget = null;
            }
            let parent =
                document.getElementsByClassName("table-database")[parentId]
                .parentElement;
            parent.style.padding = null;
            return;
        }
        showFormWithTable(showingDialogId);
    }

    async function acceptFormWithTable(x) {
        const formAddData = editSelectedRowWidget;
        let valueFromTable = [];
        for (let index = 0; index < formAddData.children.length; index++) {
            valueFromTable.push(formAddData.children[index].innerHTML);
        }
        if (showingDialogId == 0) {
            dialogValueToSubmit.set('kode_supplier', valueFromTable[0]);
            textBoxesField = x.parentElement.parentElement.parentElement.children[0].children[1];
            for (let index = 1; index < textBoxesField.children.length; index++) {
                dialogValueToSubmit.set(textBoxesField.children[index].children[0].children[1].innerHTML, textBoxesField.children[index].children[0].children[0].value);

            }
            completeDialog(0);
            closeFormWithTable(null);
        }

        if (showingDialogId == 1) {
            if (dialogPageAt == 0) {
                dialogValueToSubmit.set(strTableHeader[2][0], valueFromTable[0]);
            }
            if (dialogPageAt == 1) {
                dialogValueToSubmit.set(strTableHeader[3][0], valueFromTable[0]);
                dialogValueToSubmit.set(strTableHeader[3][1], valueFromTable[1]);
            }

            dialogPageAt += 1;
            // console.log(dialogPageAt);
            if (dialogPageAt < 2) {
                showFormWithTable(showingDialogId);
            } else {
                completeDialog(1);
            }
        }
    }

    async function completeDialog(dialogId) {
        console.log(dialogValueToSubmit);
        if (dialogId == 0) {
            await insert('barang', dialogValueToSubmit);
        }
        if (dialogId == 1) {
            let selectKd = await selectTable('SELECT  kode_barang, kode_transaksi_supplier, qty FROM barang;');

            for (let index = 0; index < selectKd.length; index++) {
                let selectKdTransaksiSup = selectKd[index]['kode_transaksi_supplier'];
                if (selectKdTransaksiSup == null) {
                    continue;
                }
                selectKdTransaksiSup = selectKdTransaksiSup.split(';');
                if (selectKdTransaksiSup.includes(dialogValueToSubmit.get('kode_transaksi_supplier'))) {
                    let qtyAfter = Number(selectKd[index]['qty']) - Number(dialogValueToSubmit.get('qty_total'));
                    if (qtyAfter < 0) {
                        showDialogGadaBarang();
                        return;
                    }
                    await update('barang', 'kode_barang', selectKd[index]['kode_barang'], 'qty', qtyAfter);
                }
            }

            await update('transaksi_supplier', 'kode_transaksi_supplier', dialogValueToSubmit.get('kode_transaksi_supplier'),
                'kode_supplier', dialogValueToSubmit.get('kode_supplier'));

            await update('transaksi_supplier', 'kode_transaksi_supplier', dialogValueToSubmit.get('kode_transaksi_supplier'),
                'kode_supplier', dialogValueToSubmit.get('kode_supplier'));
        }
        closeFormWithTable(null);
        tableLoader();
    }


    // Dialog-Yes-No
    function showDialogYesNo(x) {
        if (x == 0) {
            const formYesNo = document.getElementsByClassName("dialog-yes-no")[0];
            const formAddDataFilter = document.getElementsByClassName(
                "form-add-data-filter"
            )[0];
            formAddDataFilter.style.backgroundColor = `rgba(0, 0, 0, 0.7)`;
            formAddDataFilter.style.pointerEvents = "all";
            formAddDataFilter.onclick = function() {
                closeDialogYesNo(0);
            };
            formYesNo.style.top = "50%";

            let question = `Hapus Data dengan Id: '${currentTd[0].innerHTML}' ?`;

            formYesNo.children[1].children[0].textContent = question;
        }

        if (x == 1) {
            const formYesNo = document.getElementsByClassName("dialog-yes-no")[0];
            formYesNo.style.top = "50%";

            let parentTableField =
                document.getElementsByClassName("table-database")[3].parentElement;
            const formDialog = parentTableField.getElementsByClassName("form-with-table-dialog")[0];
            const highLightSelVal = formDialog.children[1].children[0];

            let question = `Hapus Transaksi dengan Id: '${highLightSelVal.textContent}' ?`;
            formYesNo.children[1].children[0].textContent = question;
        }

    }

    function closeDialogYesNo(x) {
        if (x == 0) {
            const formYesNo = document.getElementsByClassName("dialog-yes-no")[0];
            const formAddDataFilter = document.getElementsByClassName(
                "form-add-data-filter"
            )[0];
            formAddDataFilter.style = null;
            formAddDataFilter.onclick = null;
            formYesNo.style = null;
        }
        if (x == 1) {
            const formYesNo = document.getElementsByClassName("dialog-yes-no")[0];
            formYesNo.style = null;
        }
    }

    async function acceptDialogYesNo(x) {
        if (x == 0) {
            await deleteRow(tables_target[0], 'kode_barang', currentTd[0].innerHTML);
            closeLastRowEdit();
            tableLoader();
            closeDialogYesNo(0);
        }
        if (x == 1) {            
            const parentTableField =
                document.getElementsByClassName("table-database")[3].parentElement;
            const formDialog = parentTableField.getElementsByClassName("form-with-table-dialog")[0];
            const highLightSelVal = formDialog.children[1].children[0];
            let deleteKey = highLightSelVal.textContent;

            let selectKd = await selectTable('SELECT kode_barang, kode_transaksi_supplier, kode_transaksi_pembeli FROM barang;');

            await deleteRow('transaksi_supplier', 'kode_transaksi_supplier', deleteKey);

            for (let index = 0; index < selectKd.length; index++) {
                let selectKdTransaksiSup = selectKd[index]['kode_transaksi_supplier'];
                if (selectKdTransaksiSup == null) {
                    continue;
                }
                selectKdTransaksiSup = selectKdTransaksiSup.split(';');
                if (selectKdTransaksiSup.includes(deleteKey)) {
                    selectKdTransaksiSup.splice(selectKdTransaksiSup.indexOf(deleteKey), 1);
                    console.log(selectKdTransaksiSup);
                    selectKdTransaksiSup = selectKdTransaksiSup.join(';');
                    await update('barang', 'kode_barang', selectKd[index]['kode_barang'], 'kode_transaksi_supplier', selectKdTransaksiSup);
              
                    // WARNING
                    index = selectKd.length + 1;
                }
                
                // selectKdTransaksiPem = selectKd[index]['kode_transaksi_pembeli'];
                // selectKdTransaksiPem = selectKdTransaksiPem.split(';');
                // deleteKey = `TP${deleteKey.substring(2, deleteKey.length)}`;
                // if (selectKdTransaksiPem.includes(deleteKey)) {
                //     selectKdTransaksiPem.splice(selectKdTransaksiPem.indexOf(deleteKey), 1);
                //     console.log(selectKdTransaksiPem);
                //     selectKdTransaksiPem = selectKdTransaksiPem.join(';');
                //     await update('barang', 'kode_barang', selectKd[index]['kode_barang'], 'kode_transaksi_pembeli', selectKdTransaksiPem);
                   
                // }
            }
            

            closeDialogYesNo(1);
            closeLastRowEdit();
            tableLoader();
        }
    }

    // FormEdit Kd
    let valueEditorWrapperWidget = '<div class="value-editor"> <div class="material-text-box"> <div class="group original-value"> <input type="text" required="required" /> <label>Original</label> </div> </div> <div class="arrow-to-edited"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 15"> <path d="M8.293 2.293a1 1 0 0 1 1.414 0l4.5 4.5a1 1 0 0 1 0 1.414l-4.5 4.5a1 1 0 0 1-1.414-1.414L11 8.5H1.5a1 1 0 0 1 0-2H11L8.293 3.707a1 1 0 0 1 0-1.414" /> </svg> </div> <div class="material-text-box"> <div class="group edited-value"> <input type="text" required="required" /> <label>Edited Value</label> <div class="dropdown"> <div class="dropdown-btn"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"> <path d="M16.88 2.88a1.25 1.25 0 0 0-1.77 0L6.7 11.29a.996.996 0 0 0 0 1.41l8.41 8.41c.49.49 1.28.49 1.77 0s.49-1.28 0-1.77L9.54 12l7.35-7.35c.48-.49.48-1.28-.01-1.77" /> </svg> </div> <div class="dropdown-content"> <!-- <div class="dropdown-content-wrapper"> </div> --> </div> </div> </div> </div> </div>';

    function selectDropDownValue(x) {
        let inputComponent = x.parentElement.parentElement.parentElement.children[0];
        inputComponent.value = x.textContent;
    }

    async function showAddDataForm(kdId, currentKdBarang) {
        console.log('editRow_Kd');
        console.log(kdId);
        const formAddData = document.getElementsByClassName("form-add-data")[0];
        const formAddDataFilter = document.getElementsByClassName(
            "form-add-data-filter"
        )[0];
        formAddDataFilter.style.backgroundColor = `rgba(0, 0, 0, 0.7)`;
        formAddDataFilter.style.pointerEvents = "all";
        formAddDataFilter.onclick = function() {
            closeAddDataForm();
        };
        formAddData.style.top = "50%";


        let valueEditorWrapper = document.getElementsByClassName('value-editor-wrapper')[0];
        valueEditorWrapper.innerHTML = '';
        valueEditorWrapper.style = null;
        if (editRow_Kd[kdId].length < 12) {
            valueEditorWrapper.style.overflow = 'unset';
        }
        valueEditorWrapper.id = `${(kdId == 0) ? 'kode_transaksi_supplier' : 'kode_transaksi_pembeli'}-${currentKdBarang}`;

        for (let index = 0; index < editRow_Kd[kdId].length; index++) {
            valueEditorWrapper.innerHTML += valueEditorWrapperWidget;
        }
        let dropDownContent = Array.from(new Set(editRow_Kd[kdId]));
        for (let index = 0; index < editRow_Kd[kdId].length; index++) {
            let valueEditor = valueEditorWrapper.getElementsByClassName('value-editor')[index];
            let originalValue = valueEditor.getElementsByClassName('original-value')[0];
            originalValue.children[0].value = editRow_Kd[kdId][index];
            originalValue.children[0].style.pointerEvents = "none";
            valueEditor.getElementsByClassName('edited-value')[0].children[0].value = editRow_Kd[kdId][index];

            for (let index = 0; index < dropDownContent.length; index++) {
                valueEditor.getElementsByClassName('dropdown-content')[0].innerHTML += `<div class="dropdown-content-wrapper" onclick="selectDropDownValue(this)">${dropDownContent[index]}</div>`;

            }
        }
    }

    function closeAddDataForm() {
        const formAddData = document.getElementsByClassName("form-add-data")[0];
        const formAddDataFilter = document.getElementsByClassName(
            "form-add-data-filter"
        )[0];
        formAddDataFilter.style = null;
        formAddDataFilter.onclick = null;
        formAddData.style = null;
    }

    async function saveAddDataForm() {
        const valueEditorWrapper = document.getElementsByClassName('value-editor-wrapper')[0];
        let valueEditor = valueEditorWrapper.getElementsByClassName('value-editor');
        let arrValueFromEditor = [];
        for (let index = 0; index < valueEditor.length; index++) {
            arrValueFromEditor.push(valueEditor[index].getElementsByClassName('edited-value')[0].children[0].value);
        }
        arrValueFromEditor = Array.from(new Set(arrValueFromEditor));
        let strToSubmit = arrValueFromEditor.join(';');
        let keys = valueEditorWrapper.id.split('-');
        await update(tables_target[0], 'kode_barang', keys[1], keys[0], strToSubmit);
        closeAddDataForm();
        closeLastRowEdit();
        tableLoader();
    }

    function showDialogGadaBarang() {
        const formYesNo = document.getElementsByClassName("dialog-ga-cukup")[0];
        formYesNo.style.top = "50%";
    }

    function closeDialogGadaBarang() {
        const formYesNo = document.getElementsByClassName("dialog-ga-cukup")[0];
        formYesNo.style = null;
    }
</script>
<script>
    function clamp(number, min, max) {
        return Math.max(min, Math.min(number, max));
    }

    function parallax_background(event) {
        const position = document.getElementsByClassName("parallax-background-image")[0];
        const x = clamp((event.pageX - (window.innerWidth / 2)) / 90, -4, 4);
        const y = clamp((event.pageY - (window.innerHeight / 2)) / 90, -4, 4);

        position.style.transform = `translateX(-${50+x}%) translateY(-${50+y}%)`;
    }
    document.addEventListener("mousemove", parallax_background);
</script>


</html>