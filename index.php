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

$totalProduk = count($produk);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cia Store - Katalog Produk</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header class="navbar">
        <div class="brand">
            Cia Store
        </div>
        <nav>
            <a href="#" class="active">Home</a>
            <a href="#katalog">Products</a>
            <a href="#tentang">About</a>
            <a href="#keranjang">Keranjang</a>
        </nav>
    </header>

    <section class="hero" id="tentang">
        <div class="hero-text">
            <h1>Gaming <span>Accessories</span></h1>
            <p>Temukan berbagai perangkat dan aksesoris untuk kebutuhanmu.</p>
            <button class="btn-hero" onclick="document.getElementById('katalog').scrollIntoView({behavior:'smooth'})">
                Lihat Produk →
            </button>
        </div>
    </section>

    <main class="katalog-section" id="katalog">
        <div class="katalog-header">
            <div class="kiri">
                <div class="tag">OUR PRODUCTS</div>
                <h2>Katalog Produk</h2>
                <p>Pilih perangkat gaming yang cocok untuk setup-mu.</p>
            </div>
            <div class="info-box">
                <div>
                    <div class="label">Total Produk</div>
                    <div class="angka"><?php echo $totalProduk; ?></div>
                </div>
            </div>
        </div>

        <div class="grid-produk">
            <?php foreach ($produk as $item): ?>
                <?php
                    $stok = $item["stok"];
                    $harga = $item["harga"];
                    $diskon = hitungDiskon($harga);
                    $hargaSetelahDiskon = $harga - $diskon;
                ?>
                <div class="card">
                    
                    <div class="card-thumb">
                        <?php if ($diskon > 0): ?>
                        <span class="badge-diskon">DISKON 10%</span>
                        <?php endif; ?>
                        <span class="wishlist">♡</span>

                        <?php if (!empty($item["gambar"]) && file_exists($item["gambar"])): ?>
                            <img src="<?php echo htmlspecialchars($item["gambar"]); ?>" alt="<?php echo htmlspecialchars($item["nama"]); ?>">
                        <?php else: ?>
                            <?php echo strtoupper(substr($item["kategori"], 0, 2)); ?>
                        <?php endif; ?>
                    </div>

                    <div class="card-body">
                        <span class="kategori"><?php echo htmlspecialchars($item["kategori"]); ?></span>
                        <div class="nama-produk"><?php echo htmlspecialchars($item["nama"]); ?></div>

                        <?php if ($diskon > 0): ?>
                            <div class="harga-normal-coret"><?php echo formatRupiah($harga); ?></div>
                            <div class="harga-diskon"><?php echo formatRupiah($hargaSetelahDiskon); ?></div>
                        <?php else: ?>
                            <div class="harga"><?php echo formatRupiah($harga); ?></div>
                        <?php endif; ?>

                        <div class="card-footer-row">
                            <span class="stok-text">
                                <span class="dot <?php echo $stok > 0 ? 'tersedia' : 'habis'; ?>"></span>
                                Stok: <?php echo $stok; ?>
                            </span>
                            <?php if ($stok > 0): ?>
                                <span class="status tersedia">Tersedia</span>
                            <?php else: ?>
                                <span class="status habis">Stok Habis</span>
                            <?php endif; ?>
                        </div>

                        <?php if ($stok > 0): ?>
                            <button class="btn-beli">Beli Sekarang</button>
                        <?php else: ?>
                            <button class="btn-disabled" disabled>Stok Habis</button>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
</body>
</html>