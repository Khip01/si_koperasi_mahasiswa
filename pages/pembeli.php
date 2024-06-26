<?php
require '../core/functions.php';
require '../core/script.php';

$barang = "SELECT kode_barang, kode_supplier, nama_barang, qty, harga_item FROM barang WHERE qty > 0";
$transaksi_pembeli = "SELECT * FROM transaksi_pembeli WHERE kode_petugas IS NULL";
$pembeli = "SELECT * FROM pembeli";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="styles/pembeli.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembeli Page</title>
    <!-- Font Lexend -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
</head>

<header class="nav-header">
    <div class="tabel-title-field">
        <h1>TABEL</h1>
        <h2 id="what-table">Pembeli</h2>
    </div>
    <nav id="nav-pov-mode">
        <a>
            <h1>Pembeli</h1>
        </a>
        <a href="petugas.php">
            <h1>Petugas</h1>
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
    <div class="parallax-background-image"></div>
    <div class="table-field-wrapper">
        <div class="table-field">
            <div class="table-database" id="table-database-0">
                <div class="table-database-topsection">
                    <h1>Daftar Barang</h1>
                    <div class="material-text-box table-database-search" onclick="search(this)">
                        <div class="group">
                            <input type="text" required="required" />
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
        <!-- Add Table here     -->
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
    </div>
</body>

<footer class="nav-bottom" onclick="showFormWithTable()">
    <div id="btn-add">
        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
            <path d="M7 7V5a3 3 0 0 1 5-2.236A3 3 0 0 1 17 5v2h1.5A1.5 1.5 0 0 1 20 8.5V18a4 4 0 0 1-1.825 3.357l-.545-.096c-.775-.136-1.574-.563-2.175-1.172S14.5 18.743 14.5 18V7h1V5a1.5 1.5 0 0 0-2.656-.956c.101.3.156.622.156.956v13c0 1.229.582 2.326 1.387 3.142a5.8 5.8 0 0 0 1.08.858H8a4 4 0 0 1-4-4V8.5A1.5 1.5 0 0 1 5.5 7zm1.5-2v2h3V5a1.5 1.5 0 0 0-3 0" />
        </svg>
        <h1 id="currentPetugas">Beli Barang</h1>
    </div>
</footer>

<script src="app.js"></script>
<script>
    const tables = [
        ["Daftar Pesanan Pembeli", "<?= $transaksi_pembeli ?>"],
        ["Siapa Pembeli", "<?= $pembeli ?>"],
        ["Daftar Barang", "<?= $barang ?>"],
    ];


    const tableFormId = 2;
    const formWithTableDialog =
        '<div class="form-with-table-dialog"> <h1 id="form-with-table-dialog-title">Tambahkan?</h1> <div id="form-with-table-edit-row-section"> <h2 id="form-with-table-highlight-sel-val"></h2> <div class="material-text-box"> <div class="group"> <input type="text" required="required" /> <label>Search</label> </div> <div id="form-with-table-bottom-text-section"> <h3>Total: </h3> <h3></h3> </div> </div> </div> <div class="table-edit-field-wrapper"> </div> <div class="btn-field-accept-cancle"> <div class="btn-cancle" onclick="closeFormWithTable(this)"> <h1>Bukan</h1> </div> <div class="btn-accept" onclick="acceptFormWithTable(this)"> <h1>Untuk Nyata</h1> </div> </div> </div>';
    var formWithTableDialog_HighlightIdx = 0;

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

    function loadThings(strTitile, x, things) {
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
            tabel.innerHTML = '';
            tabelthings.style.width = '450px';
        } else {
            tabelthings.style = null;
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
                if (x == 0) {
                    tableContent = "<tr onclick='editSelectedRow(this)'>";
                } else {
                    tableContent = "<tr onclick='editSelectedRow_Dialog(this)'>";
                }
                for (let index = 0; index < strTableHeader[x].length; index++) {
                    const element = things[i][strTableHeader[x][index]];
                    // console.log(element);
                    tableContent += "<td style='max-width: 200px; overflow:hidden;'>" + element + "</td>";
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
        if (x == 0) {
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
        } else {
            editField =
                document.getElementsByClassName("table-edit-row")[x];
            editField.innerHTML = formWithTableDialog;
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

    function maxQtyFunction(x) {
        console.log(x.value);
        if (x.value > x.max) {
            x.value = x.max;
        }
    }

    function maxQtyEventListerner(x, max, perItemValue) {
        x.removeEventListener("input", function() {
            if (Number(x.value) > Number(max)) {
                x.value = max;
            }
            if (Number(x.value) < 0) {
                x.value = 0
            }
        });
        x.addEventListener("input", function() {
            if (Number(x.value) > Number(max)) {
                x.value = max;
            }
            if (Number(x.value) < 0) {
                x.value = 0
            }
            x.parentElement.parentElement.children[1].children[1].textContent = idrFormatter.format(Number(x.value) * Number(perItemValue));
        });
    }

    let qty_before = 0;

    function editSelectedRow_Dialog(x) {
        if (editSelectedRowWidget != null) {
            editSelectedRowWidget.style.backgroundColor = null;
        }
        editSelectedRowWidget = x;
        editSelectedRowWidget.style.backgroundColor = `rgba(194, 182, 182, 0.7)`;
        let parentId = getParentId_tableEditRow(
            x.parentNode.parentNode.parentNode.parentNode.id
        );
        generateFormTextField(parentId);

        let parentTableField =
            document.getElementsByClassName("table-database")[parentId].parentElement;
        parentTableField.style.padding = `0px 3.25rem`;
        const td = x.children;
        const highLightSelVal = document.getElementsByClassName("form-with-table-dialog")[dialogPageAt].children[1].children[0];

        const formDialog = document.getElementsByClassName("form-with-table-dialog")[dialogPageAt];
        if (dialogPageAt == 0) {
            formDialog.children[0].textContent = "Anda?";
            formWithTableDialog_HighlightIdx = 1;
            // formTable.children[1].style.display = "none";
        }
        if (dialogPageAt == 1) {
            formDialog.children[0].textContent = "Beli ini?";
            formWithTableDialog_HighlightIdx = 2;
            // Material Text Form
            let qtyTextBox = document.getElementsByClassName("form-with-table-dialog")[1].children[1].children[1];
            qtyTextBox.style.display = null;
            qtyTextBox.style.display = 'block';
            qtyTextBox.children[0].children[0].type = 'number';

            qty_before = td[3].innerHTML;
            qtyTextBox.children[0].children[0].value = qty_before;
            maxQtyEventListerner(qtyTextBox.children[0].children[0], qty_before, td[4].innerHTML);

            qtyTextBox.children[0].children[0].parentElement.parentElement.children[1].children[1].textContent = idrFormatter.format(Number(qtyTextBox.children[0].children[0].value) * Number(td[4].innerHTML));
            qtyTextBox.children[0].children[1].textContent = 'QTY';
            // formTable.children[0].style.display = "none";
        }

        if (formWithTableDialog_HighlightIdx == 2) {
            let namaBarang = td[formWithTableDialog_HighlightIdx].innerHTML;
            if (namaBarang.length > 40) {
                namaBarang = namaBarang.substring(0, 27) + '...';
            }
            highLightSelVal.textContent = `${namaBarang} [${td[0].innerHTML}]`;
        } else {
            highLightSelVal.textContent = td[formWithTableDialog_HighlightIdx].innerHTML;
        }
    }

    var dialogPageAt = -1;
    let dialogValueToSubmit;
    let addtionalValues;

    function showFormWithTable() {
        const formTable = document.getElementsByClassName("form-with-table")[0];
        formTable.children[0].style.display = null;
        formTable.children[1].style.display = null;
        if (dialogPageAt < 0) {
            dialogValueToSubmit = new Map();
            addtionalValues = new Map();
            tableLoader();
            const formAddData = document.getElementsByClassName("form-with-table")[0];
            const formAddDataFilter = document.getElementsByClassName(
                "form-add-data-filter"
            )[0];
            formAddDataFilter.style.backgroundColor = `rgba(0, 0, 0, 0.7)`;
            formAddDataFilter.style.pointerEvents = "all";
            formAddDataFilter.onclick = function() {
                closeFormWithTable(null);
            };
            formAddData.style.top = "50%";
            dialogPageAt = 0;
        }

        if (dialogPageAt == 0) {
            formTable.children[1].style.display = "none";
        }
        if (dialogPageAt == 1) {
            formTable.children[0].style.display = "none";
        }
    }

    function closeFormWithTable(x) {
        // let qtyTextBox = document.getElementsByClassName("form-with-table-dialog")[1].children[1].children[1];
        // qtyTextBox.style.display = null;
        dialogPageAt -= 1;
        if (x == null) {
            let tableField = document.getElementsByClassName("table-field");
            const formAddDataFilter = document.getElementsByClassName(
                "form-add-data-filter"
            )[0];
            formAddDataFilter.style.backgroundColor = `rgba(0, 0, 0, 0)`;
            formAddDataFilter.style.pointerEvents = "none";
            formAddDataFilter.onclick = null;
            for (let index = 1; index < tableField.length; index++) {
                let parentId = getParentId_tableEditRow(tableField[index].children[0].id);
                // console.log(tableField[index]);
                // console.log(parentId);
                dialogPageAt = -1;
                const formAddData = document.getElementsByClassName("form-with-table")[0];

                formAddData.style.top = "1500%";
                const editField =
                    document.getElementsByClassName("table-edit-row")[parentId];
                // console.log(editField);
                editField.innerHTML = "";
                editField.style.margin = "0px 10px 50px 1px";
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
            formAddDataFilter.style.backgroundColor = `rgba(0, 0, 0, 0)`;
            formAddDataFilter.style.pointerEvents = "none";
            formAddDataFilter.onclick = null;
            formAddData.style.top = "1500%";
            const editField =
                document.getElementsByClassName("table-edit-row")[parentId];
            console.log(editField);
            editField.innerHTML = "";
            editField.style.margin = "0px 10px 50px 1px";
            editSelectedRowWidget.style.backgroundColor = null;
            editSelectedRowWidget = null;
            let parent =
                document.getElementsByClassName("table-database")[parentId]
                .parentElement;
            parent.style.padding = null;
            return;
        }

        showFormWithTable();
    }

    const toSubmitHeaderMap = new Map([
        ['nim', 'nim'],
        ['kode_barang', 'kode_barang'],
        ['kode_transaksi_pembeli', 'kode_transaksi_pembeli'],
        ['qty', 'qty_total'],
        ['harga_item', 'harga_total'],
    ]);


    async function acceptFormWithTable(x) {
        // x.parentElement.parentElement.parentElement.style = null;

        const formAddData = editSelectedRowWidget;
        let valueToSubmit = [];
        for (let index = 0; index < formAddData.children.length; index++) {
            valueToSubmit.push(formAddData.children[index].innerHTML);
        }

        if (dialogPageAt == 0) {
            dialogValueToSubmit.set(toSubmitHeaderMap.get(strTableHeader[1][0]), valueToSubmit[0]);
            x.parentElement.parentElement.parentElement.parentElement.style = null;
            x.parentElement.parentElement.innerHTML = "";
            dialogPageAt += 1;
        } else if (dialogPageAt == 1) {
            addtionalValues.set(toSubmitHeaderMap.get(strTableHeader[2][0]), valueToSubmit[0]);
            dialogValueToSubmit.set('kode_transaksi_pembeli', await pembeliMaxKd());

            let qtyTextBox = document.getElementsByClassName("form-with-table-dialog")[1].children[1].children[1];
            dialogValueToSubmit.set(toSubmitHeaderMap.get(strTableHeader[2][3]), qtyTextBox.children[0].children[0].value);
            dialogValueToSubmit.set(toSubmitHeaderMap.get(strTableHeader[2][4]), Number(dialogValueToSubmit.get('qty_total')) * Number(valueToSubmit[4]));

            dialogPageAt += 1;
        }

        if (dialogPageAt < 2) {
            showFormWithTable();
        } else {
            completeDialog();
            closeFormWithTable(null);
        }
    }

    async function completeDialog() {
        dialogValueToSubmit.set('tgl_transaksi', formatDateAndTime(new Date()));

        let selectKdPembeli = await selectTable(`SELECT kode_transaksi_pembeli FROM barang WHERE kode_barang = '${addtionalValues.get('kode_barang')}'`);
        console.log(selectKdPembeli);
        if (selectKdPembeli[0]['kode_transaksi_pembeli'] != null) {
            selectKdPembeli = selectKdPembeli[0]['kode_transaksi_pembeli'].split(';');
        } else {
            selectKdPembeli = [];
        }
        if (!selectKdPembeli.includes(dialogValueToSubmit.get('kode_transaksi_pembeli'))) {
            selectKdPembeli.push(dialogValueToSubmit.get('kode_transaksi_pembeli'));
        }
        selectKdPembeli = selectKdPembeli.join(';');
        await update('barang', 'kode_barang', addtionalValues.get('kode_barang'), 'kode_transaksi_pembeli', selectKdPembeli);


        console.log(dialogValueToSubmit);
        console.log(addtionalValues);



        await insert('transaksi_pembeli', dialogValueToSubmit);
        // await update('barang', 'kode_barang', addtionalValues.get('kode_barang'), 'qty', Number(qty_before) - Number(dialogValueToSubmit.get('qty_total')));
        tableLoader();
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
        // console.log();
        // console.log((event.pageY));
    }
    document.addEventListener("mousemove", parallax_background);
</script>

</html>