<?php 

try {
    $conn = mysqli_connect("localhost", "root", "", "db_koperasi_organisasi");
} catch (Exception $e) {
    // Raruu: Mending bikin dialog dari pada ganti page - saran
    // header("Location: pages/error_page.php?errorLog=" . $e->getMessage());
}

// MENGECEK KONEKSI
// fungsi akan mengambalikan 
// null => jika berhasil
// error => jika gagal
function checkConnection(){
    global $conn;
    try {
        if ($conn) {
            return null;
        } else {
            throw new Exception("Unable to connect to database");
        }
    } catch (Exception $e) {
        return $e->getMessage();
    }
}

// GET DATA DARI DATABASE
// return false => jika gagal
// return true => jika berhasil tetapi data kosong
// return data => jika berhasil dan ada data
function getDataFromQuery($query){
    global $conn;
    // Cek koneksi terlebih dahulu sebelum melakukan pengambilan data
    if (checkConnection($conn) != null) {
        return false;
    }
    $result = mysqli_query($conn, $query);

    $datas = [];
    while ($data = mysqli_fetch_assoc($result)) {
        $datas[] = $data;
    }
    return $datas;
}

function printData($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $datas = [];
    while ($data = mysqli_fetch_assoc($result)) {
        $datas[] = $data;
    }
    return $datas;
}

if (isset($_POST["action"])) {
    if ($_POST["action"] == "query") {
        $result = mysqli_query($conn, $_POST["data"]);
        if($result != false){
            echo 'aman desu!';
        } else {
            echo $result;
        }
    }
    if ($_POST["action"] == "insertPesan") {
        tambahPesanan();
    }
    if ($_POST["action"] == "insertBarang") {
        tambahBarang();
    }
    if ($_POST["action"] == "select") {
        echo json_encode(getDataFromQuery($_POST["query"]));
    }
    if($_POST["action"] == "pembeliMaxKd"){
        echo pembeliMaxKd();
    }
    if ($_POST["action"] == "supplierMaxKd") {
        echo supplierMaxKd();
    }
    if ($_POST["action"] == "barangMaxKd") {
        echo barangMaxKd();
    }
}

function tambahPesanan(){
    global $conn;
    $kd_transaksi = $_POST["kode_transaksi_pembeli"];
    $kd_brg = $_POST["kode_barang"];
    $qty_total = $_POST["qty_total"];
    $harga_total = $_POST["harga_total"];
    $tgl_transaksi = date('Y-m-d H:i:s', strtotime($_POST["tgl_transaksi"]));
    $nim = $_POST["nim"];
    $query = "INSERT INTO transaksi_pembeli (kode_transaksi_pembeli, kode_barang, qty_total, harga_total, tgl_transaksi, nim) VALUES ('$kd_transaksi', '$kd_brg', '$qty_total', '$harga_total', '$tgl_transaksi', '$nim')";
    mysqli_query($conn, $query);
    $queryu = "UPDATE barang SET kode_transaksi_pembeli = '$kd_transaksi' WHERE kode_barang = '$kd_brg'";
    mysqli_query($conn, $queryu);
    echo "Insert Succsess";
}

function tambahBarang(){
    global $conn;
    $kd_brg = $_POST["kode_barang"];
    $kd_supp = $_POST["kode_supplier"];
    $nama_brg = $_POST["nama_barang"];
    $qty = $_POST["qty"];
    $harga_item = $_POST["harga_item"];
    $query = "INSERT INTO barang (kode_barang, kode_supplier,nama_barang, qty, harga_item) VALUES ('$kd_brg', '$kd_supp', '$nama_brg', '$qty', '$harga_item')";
    mysqli_query($conn, $query);
    echo "UwU";
}
// function update($query){
//     global $conn;

//     $
//     mysqli_query($conn, $query);
// }

function pembeliMaxKd(){
    global $conn;
    $result = mysqli_query($conn, "SELECT MAX(RIGHT(kode_transaksi_pembeli, 4)) as kode FROM transaksi_pembeli");
    $q = mysqli_fetch_object($result);
    if ($q && $q->kode) {
        $kd = sprintf("%04s", ((int)$q->kode) + 1);
    } else {
        $kd = "0001";
    }
    return htmlspecialchars('TP' . $kd);
}

function supplierMaxKd(){
    global $conn;
    $result = mysqli_query($conn, "SELECT MAX(RIGHT(kode_transaksi_supplier, 4)) as kode FROM transaksi_supplier");
    $q = mysqli_fetch_object($result);
    if ($q && $q->kode) {
        $kd = sprintf("%04s", ((int)$q->kode) + 1);
    } else {
        $kd = "0001";
    }
    return htmlspecialchars('TS' . $kd);
}

function barangMaxKd(){
    global $conn;
    $result = mysqli_query($conn, "SELECT MAX(RIGHT(kode_barang, 3)) as kode FROM barang");
    $q = mysqli_fetch_object($result);
    if ($q && $q->kode) {
        $kd = sprintf("%03s", ((int)$q->kode) + 1);
    } else {
        $kd = "001";
    }
    return htmlspecialchars('B' . $kd);
}
?>