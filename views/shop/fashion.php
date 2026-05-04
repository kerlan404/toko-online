<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul']; ?> - TokoOnline</title>
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/user-home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .category-header {
            height: 400px;
            background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('https://images.unsplash.com/photo-1490481651871-ab68de25d43d?auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            text-align: center;
            margin-bottom: 50px;
        }
        .category-header h1 { font-family: 'Playfair Display', serif; font-size: 4rem; }
    </style>
</head>
<body>

    <a href="<?= BASEURL; ?>/Home" style="position: absolute; top: 30px; left: 30px; color: #fff; text-decoration: none; z-index: 100; font-weight: 600; display: flex; align-items: center; gap: 10px; background: rgba(0,0,0,0.3); padding: 10px 20px; border-radius: 30px; backdrop-filter: blur(10px);">
        <i class="fas fa-arrow-left"></i> Back to Home
    </a>

    <header class="category-header">
        <div class="hero-content">
            <p>COLLECTION</p>
            <h1>Premium Fashion</h1>
        </div>
    </header>

    <div class="container">
        <div class="bento-grid">
            <?php 
                $classes = ['large', '', '', 'wide', 'tall', '']; 
                $i = 0;
                foreach($data['produk'] as $produk) : 
            ?>
            <div class="bento-item <?= $classes[$i % 6]; ?>">
                <img src="<?= $produk['gambar']; ?>" alt="<?= $produk['nama_produk']; ?>">
                <div class="item-overlay">
                    <h3 style="margin: 0; font-size: 1.5rem;"><?= $produk['nama_produk']; ?></h3>
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 15px;">
                        <span style="font-weight: 700; font-size: 1.2rem;">Rp <?= number_format($produk['harga'], 0, ',', '.'); ?></span>
                        <a href="#" style="color: #fff; background: var(--accent); padding: 8px 15px; border-radius: 15px; text-decoration: none; font-size: 0.8rem;">Add to Cart</a>
                    </div>
                </div>
            </div>
            <?php $i++; endforeach; ?>
        </div>
    </div>

    <!-- Include Footer logic here or reuse -->
    <footer>
        <div class="footer-container">
            <div class="footer-col">
                <div class="logo" style="color: #fff; margin-bottom: 25px;">Toko<span>Online</span>.</div>
                <p>Butik fashion premium yang menghadirkan koleksi pakaian dan aksesoris kurasi terbaik untuk gaya hidup modern Anda.</p>
                <div class="footer-social">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-tiktok"></i></a>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
            <div class="footer-col">
                <h3>Quick Links</h3>
                <ul class="footer-links">
                    <li><a href="<?= BASEURL; ?>/Home">Beranda</a></li>
                    <li><a href="<?= BASEURL; ?>/Shop/fashion">Koleksi Terbaru</a></li>
                    <li><a href="#">Promo Spesial</a></li>
                    <li><a href="#">Tentang Kami</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h3>Support</h3>
                <ul class="footer-links">
                    <li><a href="#">Bantuan Pelanggan</a></li>
                    <li><a href="#">Lacak Pesanan</a></li>
                    <li><a href="#">Kebijakan Privasi</a></li>
                    <li><a href="#">Syarat & Ketentuan</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h3>Newsletter</h3>
                <p>Dapatkan update koleksi terbaru dan promo eksklusif langsung di email Anda.</p>
                <input type="email" placeholder="Alamat Email Anda" class="newsletter-input">
                <button style="background: var(--accent); color: #fff; border: none; padding: 12px 25px; border-radius: 10px; width: 100%; cursor: pointer; font-weight: 600;">Subscribe</button>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2026 TokoOnline Premium Fashion. Semua Hak Dilindungi.</p>
            <div class="payment-methods" style="display: flex; gap: 15px; font-size: 1.5rem; color: #333;">
                <i class="fab fa-cc-visa"></i>
                <i class="fab fa-cc-mastercard"></i>
                <i class="fab fa-cc-paypal"></i>
            </div>
        </div>
    </footer>

</body>
</html>
