<?php $this->view('templates/header', $data); ?>

    <style>
        .detail-container {
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            gap: 60px;
            margin-top: 50px;
            margin-bottom: 80px;
            background: #fff;
            border: 6px solid #000;
            box-shadow: 20px 20px 0px #000;
            padding: 50px;
        }
        .product-gallery {
            position: relative;
        }
        .product-image-main {
            width: 100%;
            border: 5px solid #000;
            box-shadow: 10px 10px 0px rgba(0,0,0,0.1);
            transition: 0.3s;
            cursor: zoom-in;
        }
        .product-image-main:hover {
            transform: scale(1.02);
        }
        .product-info h1 {
            font-size: 3.5rem;
            font-weight: 900;
            margin-bottom: 10px;
            text-transform: uppercase;
            line-height: 0.9;
        }
        .price-tag {
            font-size: 2.2rem;
            font-weight: 900;
            color: #000;
            background: #b2ff59;
            display: inline-block;
            padding: 10px 25px;
            border: 4px solid #000;
            margin-bottom: 35px;
            box-shadow: 6px 6px 0px #000;
        }
        .description {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #333;
            margin-bottom: 40px;
            padding: 20px;
            background: #f9f9f9;
            border-left: 10px solid var(--primary);
        }
        .action-buttons {
            display: flex;
            gap: 20px;
            margin-top: 20px;
        }
        .buy-btn {
            flex: 2;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            background: #25d366;
            color: #fff;
            padding: 22px;
            font-size: 1.3rem;
            font-weight: 900;
            text-decoration: none;
            border: 4px solid #000;
            box-shadow: 8px 8px 0px #000;
            transition: 0.2s;
            text-transform: uppercase;
        }
        .wishlist-btn {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #ff8a80;
            color: #000;
            padding: 22px;
            font-size: 1.3rem;
            border: 4px solid #000;
            box-shadow: 8px 8px 0px #000;
            cursor: pointer;
            transition: 0.2s;
        }
        .buy-btn:hover, .wishlist-btn:hover {
            transform: translate(-4px, -4px);
            box-shadow: 12px 12px 0px #000;
        }
        
        .related-section {
            margin-top: 80px;
            margin-bottom: 100px;
        }
        .section-title-left {
            font-size: 2.5rem;
            font-weight: 900;
            margin-bottom: 40px;
            text-transform: uppercase;
            border-bottom: 8px solid #000;
            display: inline-block;
        }
    </style>

    <div class="container">
        <a href="javascript:history.back()" style="display: inline-block; margin-bottom: 30px; font-weight: 800; color: #000; text-decoration: none; text-transform: uppercase; letter-spacing: 2px;">
            <i class="fas fa-arrow-left"></i> Back to Collection
        </a>
        
        <div class="detail-container reveal">
            <div class="product-gallery">
                <img src="<?= $data['produk']['gambar']; ?>" class="product-image-main" alt="<?= $data['produk']['nama_produk']; ?>" id="mainImg">
                <div style="display: flex; gap: 15px; margin-top: 20px;">
                    <img src="<?= $data['produk']['gambar']; ?>" style="width: 80px; border: 3px solid #000; cursor: pointer;">
                    <!-- Placeholder for extra gallery images -->
                    <div style="width: 80px; height: 80px; background: #eee; border: 3px solid #000; display: flex; align-items: center; justify-content: center; font-weight: 900;">+2</div>
                </div>
            </div>
            <div class="product-info">
                <p style="font-weight: 800; color: var(--primary); letter-spacing: 3px; margin-bottom: 5px;">PREMIUM ARTICLE</p>
                <h1><?= $data['produk']['nama_produk']; ?></h1>
                <div class="price-tag">Rp <?= number_format($data['produk']['harga'], 0, ',', '.'); ?></div>
                
                <div class="description">
                    <?= $data['produk']['deskripsi']; ?>
                </div>

                <div style="margin-bottom: 30px;">
                    <p style="font-weight: 900; margin-bottom: 10px;">PILIH UKURAN:</p>
                    <div style="display: flex; gap: 10px;">
                        <div style="width: 45px; height: 45px; border: 3px solid #000; display: flex; align-items: center; justify-content: center; font-weight: 900; cursor: pointer;">S</div>
                        <div style="width: 45px; height: 45px; border: 3px solid #000; display: flex; align-items: center; justify-content: center; font-weight: 900; cursor: pointer; background: #000; color: #fff;">M</div>
                        <div style="width: 45px; height: 45px; border: 3px solid #000; display: flex; align-items: center; justify-content: center; font-weight: 900; cursor: pointer;">L</div>
                        <div style="width: 45px; height: 45px; border: 3px solid #000; display: flex; align-items: center; justify-content: center; font-weight: 900; cursor: pointer;">XL</div>
                    </div>
                </div>

                <?php 
                    $message = "halo, saya ingin menanyakan produk " . $data['produk']['nama_produk'] . " yang harganya Rp " . number_format($data['produk']['harga'], 0, ',', '.') . ", apakah masih ada?";
                    $wa_link = "https://wa.me/62859102765755?text=" . urlencode($message);
                ?>
                
                <div class="action-buttons">
                    <a href="<?= $wa_link; ?>" class="buy-btn" target="_blank">
                        <i class="fab fa-whatsapp"></i> Chat & Beli
                    </a>
                    <button class="wishlist-btn" onclick="addToWishlist('<?= $data['produk']['nama_produk']; ?>')">
                        <i class="far fa-heart"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Related Products -->
        <?php if(!empty($data['produk_terkait'])) : ?>
        <section class="related-section reveal">
            <h2 class="section-title-left">You Might Also Like</h2>
            <div class="bento-grid" style="grid-template-columns: repeat(4, 1fr);">
                <?php foreach($data['produk_terkait'] as $related) : ?>
                <div class="bento-item">
                    <img src="<?= $related['gambar']; ?>" alt="<?= $related['nama_produk']; ?>">
                    <div class="item-overlay">
                        <h4 style="margin:0;"><?= $related['nama_produk']; ?></h4>
                        <a href="<?= BASEURL; ?>/Shop/detail/<?= $related['id']; ?>" style="color: #fff; text-decoration: none; border-bottom: 2px solid #fff; font-size: 0.8rem; font-weight: 700;">View Detail</a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>
        <?php endif; ?>
    </div>

<script>
    function addToWishlist(name) {
        Swal.fire({
            title: 'Tersimpan!',
            text: name + ' telah ditambahkan ke Wishlist Anda.',
            icon: 'success',
            confirmButtonColor: '#000'
        });
    }
</script>

<?php $this->view('templates/footer', $data); ?>
