<?php
// Mengatur agar output berupa JSON
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

include "config/database.php";

// Menangkap metode request (GET/POST)
$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'GET') {
    // API untuk mengambil semua data transaksi
    $sql = "SELECT t.id, t.jumlah, t.tipe, t.keterangan, k.nama_kategori, t.tanggal 
            FROM transaksi t 
            JOIN kategori k ON t.kategori_id = k.id";
            
    $result = mysqli_query($conn, $sql);
    $data = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    // Mengirimkan respon JSON ke pihak lain
    echo json_encode([
        "status" => "success",
        "project" => "SIMAKU API",
        "data" => $data
    ]);
} else {
    echo json_encode(["message" => "Metode tidak diizinkan"]);
}
?>