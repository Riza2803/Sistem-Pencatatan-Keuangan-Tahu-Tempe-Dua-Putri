<?php
class Pabrik {
private $koneksi;

public function __construct($db) {
    $this->koneksi = $db;
}

public function simpanBeli($tanggal, $supplier, $berat, $biaya) {
    $kueri = "INSERT INTO tb_pembelian (tanggal_beli, nama_supplier, berat_kedelai_kg, total_biaya) VALUES (?, ?, ?, ?)";
    $pernyataan = $this->koneksi->prepare($kueri);
    $pernyataan->execute([$tanggal, $supplier, $berat, $biaya]);
    return true;
}
}
?>

