<?php

$produk = [
    [
        "nama" => "Asus ROG Strix G16",
        "kategori" => "Laptop",
        "harga" => 44500000,
        "stok" => 5,
        "gambar" => "images/laptop.jpg"
    ],
    [
        "nama" => "Lenovo Legion Monitor 25 inch",
        "kategori" => "Monitor",
        "harga" => 2700000,
        "stok" => 8,
        "gambar" => "images/legion.jpg"
    ],
    [
        "nama" => "Aula F75 HE",
        "kategori" => "Aksesoris",
        "harga" => 1100000,
        "stok" => 0,
        "gambar" => "images/keyboard.jpg"
    ],
    [
        "nama" => "Lamzu Maya X",
        "kategori" => "Aksesoris",
        "harga" => 1800000,
        "stok" => 6,
        "gambar" => "images/mouse.jpg"
    ],
    [
        "nama" => "Tanchjim Origin",
        "kategori" => "Audio",
        "harga" => 7500000,
        "stok" => 3,
        "gambar" => "images/iem.jpg"
    ],
    [
        "nama" => "Deskmat",
        "kategori" => "Aksesoris",
        "harga" => 300000,
        "stok" => 5,
        "gambar" => "images/deskmat.jpg"
    ]
];


function formatRupiah($angka) {
    return "Rp " . number_format($angka, 0, ',', '.');
}

function hitungDiskon($harga) {
    if ($harga >= 1000000) {
        return $harga * 0.10;
    }
    return 0;
}
?>