<?php $this->view('templates/header', $data); ?>

    <style>
        .category-header {
            height: 350px;
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://images.unsplash.com/photo-1490481651871-ab68de25d43d?auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            text-align: center;
            margin-bottom: 50px;
            border-bottom: 5px solid #000;
        }
        .category-header h1 { font-family: 'Playfair Display', serif; font-size: 4rem; text-transform: uppercase; font-weight: 900; }
    </style>

    <a href="<?= BASEURL; ?>/Home" style="position: fixed; top: 30px; left: 30px; z-index: 1100; background: #000; color: #fff; padding: 12px 25px; border: 3px solid #fff; box-shadow: 6px 6px 0px #000; text-decoration: none; font-weight: 900; text-transform: uppercase; letter-spacing: 1px; display: flex; align-items: center; gap: 10px;">
        <i class="fas fa-arrow-left"></i> Home
    </a>

    <header class="category-header">
        <div class="hero-content">
            <p style="letter-spacing: 5px; font-weight: 800;">COLLECTION</p>
            <h1><?= $data['judul']; ?></h1>
        </div>
    </header>

    <div class="container">
        <div class="bento-grid" id="productGrid">
            <?php 
                $classes = ['large', '', '', 'wide', 'tall', '']; 
                $i = 0;
                foreach($data['produk'] as $produk) : 
            ?>
            <div class="bento-item <?= $classes[$i % 6]; ?> reveal">
                <img src="<?= $produk['gambar']; ?>" alt="<?= $produk['nama_produk']; ?>">
                <div class="item-overlay">
                    <h3 style="margin: 0; font-size: 1.5rem;"><?= $produk['nama_produk']; ?></h3>
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 15px;">
                        <span style="font-weight: 800; font-size: 1.2rem; background: #b2ff59; color: #000; padding: 2px 10px; border: 2px solid #000;">Rp <?= number_format($produk['harga'], 0, ',', '.'); ?></span>
                        <a href="<?= BASEURL; ?>/Shop/detail/<?= $produk['id']; ?>" style="color: #fff; background: #000; padding: 10px 20px; border: 2px solid #fff; text-decoration: none; font-size: 0.8rem; font-weight: 700; text-transform: uppercase;">Lihat Detail</a>
                    </div>
                </div>
            </div>
            <?php $i++; endforeach; ?>
        </div>
    </div>

<?php $this->view('templates/footer', $data); ?>
