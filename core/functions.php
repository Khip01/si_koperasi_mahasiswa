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
    if ($_POST["action"] == "insert") {
        tambahPesanan();
    }
    if ($_POST["action"] == "select") {
        echo json_encode(getDataFromQuery($_POST["query"]));
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
        $kd = "0005";
    }
    echo htmlspecialchars('TP' . $kd);
}

?>