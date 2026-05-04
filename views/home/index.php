<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TokoOnline - Premium Minimalist Store</title>
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/user-home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    <!-- Floating WhatsApp Button -->
    <a href="https://wa.me/628123456789" class="whatsapp-btn" target="_blank">
        <i class="fab fa-whatsapp"></i>
    </a>

    <nav class="navbar">
        <div class="logo">Toko<span>Online</span>.</div>
        <div class="nav-links">
            <a href="<?= BASEURL; ?>/Home">Home</a>
            <a href="#collection-gallery">Collection</a>
            <a href="#new-arrival">New Arrival</a>
            <a href="#faq">FAQ</a>
            <a href="<?= BASEURL; ?>/Auth/logout" style="color: #e74c3c;">Logout</a>
        </div>
    </nav>

    <section class="hero">
        <div class="hero-content">
            <p>ESTABLISHED 2026</p>
            <h1>Defining Modern<br>Aesthetic Fashion.</h1>
            <p>Elevate your everyday style with our curated selection of premium apparel and accessories.</p>
            <a href="<?= BASEURL; ?>/Shop/fashion" style="background: var(--primary); color: #fff; padding: 15px 40px; border-radius: 30px; text-decoration: none; font-weight: 600;">Explore Shop</a>
        </div>
    </section>

    <div class="container">
        <!-- Section: About Us (Reveal) -->
        <section class="about-section reveal">
            <div class="about-image">
                <img src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?auto=format&fit=crop&w=800&q=80" alt="Our Story">
            </div>
            <div class="about-content">
                <p style="color: var(--accent); font-weight: 700;">OUR STORY</p>
                <h2>Crafting Style<br>Since 2026</h2>
                <p>TokoOnline lahir dari kecintaan kami terhadap fashion minimalis yang tetap memiliki karakter kuat. Kami percaya bahwa setiap pakaian menceritakan sebuah kisah, dan kami di sini untuk membantu Anda menceritakan kisah terbaik Anda.</p>
                <p>Setiap bahan kami pilih secara manual untuk memastikan kualitas premium yang tahan lama, bukan sekadar mengikuti tren sesaat.</p>
            </div>
        </section>

        <!-- Section: Lookbook Gallery (Single Row Bento) -->
        <section id="collection-gallery" class="reveal" style="margin-bottom: 80px;">
            <h2 class="section-title">The Store Lookbook</h2>
            <p style="text-align: center; color: #888; margin-bottom: 50px; margin-top: -30px;">Eksplorasi gaya dan estetika koleksi terbaru kami.</p>
            <div class="bento-grid" style="grid-template-columns: repeat(4, 1fr); grid-template-rows: 400px;">
                <div class="bento-item large" style="grid-row: span 1;">
                    <img src="<?= BASEURL; ?>/assets/image/aksesoris.jpeg?v=2">
                    <div class="item-overlay"><h3 style="margin:0;">Timeless Pieces</h3></div>
                </div>
                <div class="bento-item tall" style="grid-row: span 1;">
                    <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?auto=format&fit=crop&w=600&q=80">
                    <div class="item-overlay"><h3 style="margin:0;">Summer Style</h3></div>
                </div>
                <div class="bento-item tall" style="grid-row: span 1;">
                    <img src="https://images.unsplash.com/photo-1539109136881-3be0616acf4b?auto=format&fit=crop&w=600&q=80">
                    <div class="item-overlay"><h3 style="margin:0;">Streetwear</h3></div>
                </div>
            </div>
        </section>

        <!-- Direct Links Section (Moved Up) -->
        <div class="reveal" style="margin-bottom: 80px;">
            <h2 class="section-title">Shop by Category</h2>
            <div class="collection-grid">
                <div class="collection-card">
                    <img src="https://images.unsplash.com/photo-1490481651871-ab68de25d43d?auto=format&fit=crop&w=1200&q=80" alt="Apparel">
                    <div class="collection-content">
                        <h3>Premium<br>Fashion</h3>
                        <a href="<?= BASEURL; ?>/Shop/fashion" style="color: #fff; text-decoration: none; border-bottom: 2px solid #fff; padding-bottom: 5px; font-weight: 600;">Shop Fashion</a>
                    </div>
                </div>
                <div class="collection-card">
                    <img src="<?= BASEURL; ?>/assets/image/aksesoris.jpeg?v=1" alt="Accessories">
                    <div class="collection-content">
                        <h3>Timeless<br>Accessories</h3>
                        <a href="<?= BASEURL; ?>/Shop/accessories" style="color: #fff; text-decoration: none; border-bottom: 2px solid #fff; padding-bottom: 5px; font-weight: 600;">Shop Accessories</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section: New Arrival (Promo) -->
        <section id="new-arrival" class="reveal" style="padding: 50px 0;">
            <div style="background: #111; color: #fff; border-radius: 50px; padding: 60px; display: flex; align-items: center; gap: 50px;">
                <div style="flex: 1;">
                    <p style="color: var(--accent); font-weight: 700;">LIMITED DROP</p>
                    <h2 style="font-family: 'Playfair Display', serif; font-size: 3rem; margin: 15px 0;">New Arrival Ready!</h2>
                    <p style="opacity: 0.7; line-height: 1.8;">Koleksi **Summer Drop 2026** sudah mendarat. Nikmati potongan harga 15% untuk setiap pembelian produk baru di minggu ini.</p>
                    <a href="<?= BASEURL; ?>/Promo" style="display: inline-block; margin-top: 20px; background: #fff; color: #000; padding: 12px 30px; border-radius: 10px; text-decoration: none; font-weight: 700;">Ambil Promo</a>
                </div>
                <div style="flex: 1; height: 300px; border-radius: 20px; overflow: hidden;">
                    <img src="https://images.unsplash.com/photo-1490481651871-ab68de25d43d?auto=format&fit=crop&w=800&q=80" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
            </div>
        </section>

        <!-- Section: Testimonials -->
        <section class="testimonials reveal">
            <h2 class="section-title">What They Say</h2>
            <div class="testimonial-grid">
                <div class="testimonial-card">
                    <p>"Bahannya bener-bener premium. Kaos oversized-nya enak banget dipakai harian, nggak panas sama sekali!"</p>
                    <div class="user-info">
                        <img src="https://i.pravatar.cc/150?u=bagas" alt="User">
                        <div>
                            <div style="font-weight: 700;">Bagas Al Fakhri</div>
                            <div style="font-size: 0.8rem; color: #999;">Verified Buyer</div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <p>"Aksesoris jam tangannya gila sih. Terlihat mahal padahal harganya sangat terjangkau. Love it!"</p>
                    <div class="user-info">
                        <img src="https://i.pravatar.cc/150?u=rezy" alt="User">
                        <div>
                            <div style="font-weight: 700;">Rezy Rendratmo</div>
                            <div style="font-size: 0.8rem; color: #999;">Fashion Enthusiast</div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <p>"Pelayanan admin cepat dan ramah. Pengiriman cuma sehari sampai ke Jakarta. Rekomen banget!"</p>
                    <div class="user-info">
                        <img src="https://i.pravatar.cc/150?u=dewi" alt="User">
                        <div>
                            <div style="font-weight: 700;">Dewi Sartika</div>
                            <div style="font-size: 0.8rem; color: #999;">Returning Customer</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section: FAQ -->
        <section id="faq" class="faq-section reveal">
            <h2 class="section-title">Frequently Asked Questions</h2>
            <div class="faq-item">
                <div class="faq-question">Apakah produk bisa dikembalikan? <i class="fas fa-chevron-down"></i></div>
                <div class="faq-answer">Ya, kami menerima retur produk maksimal 3 hari setelah barang diterima jika terdapat cacat produksi atau salah kirim ukuran.</div>
            </div>
            <div class="faq-item">
                <div class="faq-question">Berapa lama waktu pengiriman? <i class="fas fa-chevron-down"></i></div>
                <div class="faq-answer">Pengiriman dilakukan setiap hari Senin-Sabtu. Untuk area Jabodetabek biasanya 1-2 hari kerja, luar kota 3-5 hari kerja.</div>
            </div>
            <div class="faq-item">
                <div class="faq-question">Apakah semua produk ready stock? <i class="fas fa-chevron-down"></i></div>
                <div class="faq-answer">Semua produk yang tampil di website adalah Ready Stock. Jika habis, produk akan otomatis hilang atau berlabel 'Out of Stock'.</div>
            </div>
        </section>
    </div>

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
                    <li><a href="#collection-gallery">Lookbook</a></li>
                    <li><a href="#new-arrival">New Arrival</a></li>
                    <li><a href="#faq">FAQ</a></li>
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
            <p>&copy; 2026 TokoOnline Premium. Semua Hak Dilindungi.</p>
            <div class="payment-methods" style="display: flex; gap: 15px; font-size: 1.5rem; color: #333;">
                <i class="fab fa-cc-visa"></i>
                <i class="fab fa-cc-mastercard"></i>
                <i class="fab fa-cc-paypal"></i>
            </div>
        </div>
    </footer>

    <script>
        // FAQ Accordion Logic
        document.querySelectorAll('.faq-question').forEach(button => {
            button.addEventListener('click', () => {
                const faqItem = button.parentElement;
                faqItem.classList.toggle('active');
                
                // Toggle icon
                const icon = button.querySelector('i');
                icon.classList.toggle('fa-chevron-down');
                icon.classList.toggle('fa-chevron-up');
            });
        });

        // Scroll Reveal Logic
        function reveal() {
            var reveals = document.querySelectorAll(".reveal");
            for (var i = 0; i < reveals.length; i++) {
                var windowHeight = window.innerHeight;
                var elementTop = reveals[i].getBoundingClientRect().top;
                var elementVisible = 150;
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
