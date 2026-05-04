<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul']; ?> - TokoOnline</title>
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/user-home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .promo-header {
            height: 450px;
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1607082348824-0a96f2a4b9da?auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            text-align: center;
            margin-bottom: 80px;
        }
        
        .promo-card {
            background: #fff;
            border-radius: 40px;
            overflow: hidden;
            box-shadow: 0 25px 70px rgba(0,0,0,0.07);
            margin-bottom: 50px;
            display: flex;
            transition: 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            border: 1px solid #eee;
        }
        
        .promo-card:hover { 
            transform: scale(1.02);
            box-shadow: 0 30px 80px rgba(0,0,0,0.12);
        }

        /* Voucher Effect */
        .promo-card::before, .promo-card::after {
            content: '';
            position: absolute;
            left: 38%;
            width: 40px;
            height: 40px;
            background: #fdfdfd; /* Same as body bg */
            border-radius: 50%;
            z-index: 10;
        }
        .promo-card::before { top: -20px; box-shadow: inset 0 -5px 10px rgba(0,0,0,0.03); }
        .promo-card::after { bottom: -20px; box-shadow: inset 0 5px 10px rgba(0,0,0,0.03); }

        .promo-img-wrapper {
            width: 40%;
            height: 350px;
            overflow: hidden;
            position: relative;
        }
        
        .promo-img { 
            width: 100%; 
            height: 100%; 
            object-fit: cover;
            transition: 0.5s;
        }

        .promo-card:hover .promo-img { transform: scale(1.1); }

        .promo-info { 
            padding: 50px; 
            flex: 1; 
            display: flex; 
            flex-direction: column; 
            justify-content: center;
            border-left: 2px dashed #eee;
            margin-left: 20px;
            position: relative;
        }
        
        .promo-code {
            display: inline-flex;
            align-items: center;
            gap: 15px;
            background: #f8f9fa;
            padding: 15px 25px;
            border: 2px dashed var(--accent);
            border-radius: 15px;
            font-weight: 800;
            margin: 25px 0;
            cursor: pointer;
            color: var(--primary);
            font-size: 1.1rem;
            letter-spacing: 2px;
            transition: 0.3s;
        }

        .promo-code:hover {
            background: var(--accent);
            color: #fff;
            border-style: solid;
        }

        .discount-tag {
            position: absolute;
            top: 30px;
            right: 30px;
            background: var(--accent);
            color: #fff;
            padding: 8px 20px;
            border-radius: 30px;
            font-weight: 700;
            font-size: 0.9rem;
        }

        @media (max-width: 992px) {
            .promo-card { flex-direction: column; }
            .promo-img-wrapper { width: 100%; height: 250px; }
            .promo-info { border-left: none; border-top: 2px dashed #eee; margin-left: 0; margin-top: 0; }
            .promo-card::before, .promo-card::after { display: none; }
        }
    </style>
</head>
<body style="background: #fdfdfd;">

    <a href="<?= BASEURL; ?>/Home" style="position: fixed; top: 30px; left: 30px; color: #111; text-decoration: none; z-index: 100; font-weight: 600; display: flex; align-items: center; gap: 10px; background: rgba(255,255,255,0.9); padding: 12px 25px; border-radius: 50px; backdrop-filter: blur(10px); box-shadow: 0 10px 30px rgba(0,0,0,0.1); border: 1px solid rgba(0,0,0,0.05);">
        <i class="fas fa-arrow-left"></i> Back to Home
    </a>

    <header class="promo-header">
        <p style="color: var(--accent); font-weight: 700; letter-spacing: 5px; text-transform: uppercase;">Exclusive Member Deals</p>
        <h1 style="font-family: 'Playfair Display', serif; font-size: 4.5rem; margin-top: 10px;">Unbox Your<br>Surprise.</h1>
    </header>

    <div class="container" style="max-width: 1000px;">
        <?php foreach($data['promo'] as $p) : ?>
        <div class="promo-card reveal">
            <div class="promo-img-wrapper">
                <img src="<?= $p['gambar']; ?>" class="promo-img">
            </div>
            <div class="promo-info">
                <div class="discount-tag"><?= $p['diskon_persen']; ?>% OFF</div>
                <h2 style="font-family: 'Playfair Display', serif; font-size: 2.2rem; margin-bottom: 10px;"><?= $p['judul']; ?></h2>
                <p style="color: #666; line-height: 1.7;"><?= $p['deskripsi']; ?></p>
                <div style="margin-top: 25px;">
                    <span style="background: #111; color: #fff; padding: 10px 20px; border: 3px solid #000; font-weight: 900; box-shadow: 5px 5px 0px var(--accent); font-size: 0.8rem;">
                        VALID UNTIL: <?= date('d/m/Y', strtotime($p['berlaku_sampai'])); ?>
                    </span>
                </div>
                <div>
                    <div class="promo-code" onclick="copyCode('<?= $p['kode_promo']; ?>')">
                        <?= $p['kode_promo']; ?> <i class="far fa-copy"></i>
                    </div>
                </div>
                <p style="font-size: 0.75rem; color: #999; font-weight: 500;">*Tap to copy code and use at checkout</p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- Professional Multi-Column Footer -->
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
                    <li><a href="<?= BASEURL; ?>/Promo">Promo Terbaru</a></li>
                    <li><a href="<?= BASEURL; ?>/Shop/fashion">Koleksi Baju</a></li>
                    <li><a href="<?= BASEURL; ?>/Shop/accessories">Aksesoris</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h3>Support</h3>
                <ul class="footer-links">
                    <li><a href="#">Bantuan Pelanggan</a></li>
                    <li><a href="#">Lacak Pesanan</a></li>
                    <li><a href="#">Kebijakan Privasi</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h3>Newsletter</h3>
                <p>Dapatkan update promo eksklusif langsung di email Anda.</p>
                <input type="email" placeholder="Email Anda" class="newsletter-input">
                <button style="background: var(--accent); color: #fff; border: none; padding: 12px 25px; border-radius: 10px; width: 100%; cursor: pointer; font-weight: 600; margin-top: 10px;">Subscribe</button>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2026 TokoOnline Premium. Semua Hak Dilindungi.</p>
            <div class="payment-methods" style="display: flex; gap: 15px; font-size: 1.5rem; color: #333;">
                <i class="fab fa-cc-visa"></i>
                <i class="fab fa-cc-mastercard"></i>
                <i class="fab fa-cc-paypal"></i>
            </div>
        </div>
    </footer>

    <script>
        function copyCode(code) {
            navigator.clipboard.writeText(code);
            // Sweet alert style or simple alert
            alert("Voucher copied: " + code);
        }

        // Scroll Reveal Logic
        function reveal() {
            var reveals = document.querySelectorAll(".reveal");
            for (var i = 0; i < reveals.length; i++) {
                var windowHeight = window.innerHeight;
                var elementTop = reveals[i].getBoundingClientRect().top;
                var elementVisible = 100;
                if (elementTop < windowHeight - elementVisible) {
                    reveals[i].classList.add("active");
                }
            }
        }
        window.addEventListener("scroll", reveal);
        reveal(); // Initial check
    </script>

</body>
</html>
