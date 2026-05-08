<?php $this->view('templates/header', $data); ?>

    <div class="container" style="margin-top: 50px;">
        <h1 class="section-title">Hasil Pencarian</h1>
        <p style="text-align: center; margin-top: -30px; margin-bottom: 50px; font-weight: 700; color: #666;">
            Menemukan <?= count($data['produk']); ?> produk untuk kata kunci Anda.
        </p>

        <?php if(empty($data['produk'])) : ?>
            <div style="text-align: center; padding: 100px; border: 6px dashed #000; background: #fefefe;">
                <i class="fas fa-search-minus" style="font-size: 5rem; color: #000; margin-bottom: 25px;"></i>
                <h2 style="font-weight: 900; text-transform: uppercase;">Waduh, barang tidak ditemukan!</h2>
                <p style="font-weight: 600;">Coba gunakan kata kunci lain yang lebih umum atau jelajahi koleksi kami.</p>
                <a href="<?= BASEURL; ?>/Home" style="display: inline-block; margin-top: 30px; background: #000; color: #fff; padding: 15px 40px; text-decoration: none; font-weight: 900; border: 3px solid #000; box-shadow: 8px 8px 0px var(--primary);">Kembali ke Beranda</a>
            </div>
        <?php else : ?>
            <div class="bento-grid">
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
                            <span style="font-weight: 800; font-size: 1.2rem; background: var(--accent); color: #000; padding: 2px 10px; border: 2px solid #000;">Rp <?= number_format($produk['harga'], 0, ',', '.'); ?></span>
                            <a href="<?= BASEURL; ?>/Shop/detail/<?= $produk['id']; ?>" style="color: #fff; background: #000; padding: 10px 20px; border: 2px solid #fff; text-decoration: none; font-size: 0.8rem; font-weight: 700; text-transform: uppercase;">Lihat Detail</a>
                        </div>
                    </div>
                </div>
                <?php $i++; endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

<?php $this->view('templates/footer', $data); ?>
