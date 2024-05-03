<?php 

try {
    $conn = mysqli_connect("localhost", "root", "", "db_koperasi_organisasi");
} catch (Exception $e) {
    header("Location: pages/error_page.php?errorLog=" . $e->getMessage());
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

?>