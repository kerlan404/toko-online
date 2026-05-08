    </div> <!-- Close content-wrapper -->

    <footer>
        <div class="footer-container">
            <div class="footer-col">
                <div class="logo" style="color: #fff; margin-bottom: 25px;">Zeta<span></div>
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
                    <li><a href="<?= BASEURL; ?>/Shop/fashion">Collection</a></li>
                    <li><a href="<?= BASEURL; ?>/Shop/accessories">Accessories</a></li>
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
                <input type="email" placeholder="Alamat Email Anda" class="newsletter-input" style="border: 2px solid #000; border-radius: 10px;">
                <button style="background: var(--accent); color: #fff; border: 2px solid #000; padding: 12px 25px; border-radius: 10px; width: 100%; cursor: pointer; font-weight: 700; margin-top: 10px; box-shadow: 4px 4px 0px #000;">Subscribe</button>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2026 Zeta My Fantech. Semua Hak Dilindungi.</p>
            <div class="payment-methods" style="display: flex; gap: 15px; font-size: 1.5rem; color: #333;">
                <i class="fab fa-cc-visa"></i>
                <i class="fab fa-cc-mastercard"></i>
                <i class="fab fa-cc-paypal"></i>
                <i class="fab fa-whatsapp"></i>
            </div>
        </div>
    </footer>

    <script>
        // Image Loading Skeleton Logic
        document.querySelectorAll('.bento-item img').forEach(img => {
            img.style.opacity = '0';
            img.parentElement.classList.add('skeleton');
            img.onload = () => {
                img.parentElement.classList.remove('skeleton');
                img.style.opacity = '1';
                img.style.transition = 'opacity 0.5s ease-in-out';
            };
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
        reveal();
    </script>

    <?php Flasher::flash(); ?>

</body>
</html>
