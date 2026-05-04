<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login & Register - TokoOnline</title>
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/auth.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<div id="loading-overlay"><div class="spinner"></div></div>

<div class="container" id="container">
    <!-- Form Register (Kiri) -->
    <div class="form-container sign-up-container">
        <form id="formRegister">
            <h1>Join Us</h1>
            <p>Experience the new way of premium shopping.</p>
            <div class="input-group">
                <input type="text" name="nama" placeholder="Full Name" required />
            </div>
            <div class="input-group">
                <input type="email" name="email" placeholder="Email Address" required />
            </div>
            <div class="input-group">
                <input type="password" name="password" placeholder="Create Password" required />
            </div>
            <button type="submit">Get Started</button>
        </form>
    </div>

    <!-- Form Login (Kiri) -->
    <div class="form-container sign-in-container">
        <form id="formLogin">
            <h1>Sign In</h1>
            <p>Welcome back! Please enter your details.</p>
            <div class="input-group">
                <input type="email" name="email" placeholder="Email Address" required />
            </div>
            <div class="input-group">
                <input type="password" name="password" placeholder="Password" required />
            </div>
            <a href="#" style="font-size: 14px; color: var(--text-light); text-decoration: none; margin-bottom: 20px;">Forgot password?</a>
            <button type="submit">Sign In</button>
        </form>
    </div>

    <!-- Sisi Ungu (Overlay) -->
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1>Welcome Back!</h1>
                <p>Already have an account? Log in and keep exploring our premium collection.</p>
                <button class="ghost" id="signIn">Sign In</button>
            </div>
            <div class="overlay-panel overlay-right">
                <h1>Hello, Friend!</h1>
                <p>Don't have an account yet? Join us and start your journey with TokoOnline.</p>
                <button class="ghost" id="signUp">Sign Up</button>
            </div>
        </div>
    </div>
</div>

<script>
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');

    signUpButton.addEventListener('click', () => {
        container.classList.add("right-panel-active");
    });

    signInButton.addEventListener('click', () => {
        container.classList.remove("right-panel-active");
    });

    $(document).ready(function() {
        $('#formLogin').on('submit', function(e) {
            e.preventDefault();
            $('#loading-overlay').css('display', 'flex');
            $.ajax({
                url: '<?= BASEURL; ?>/Auth/login',
                type: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                    $('#loading-overlay').hide();
                    if(response.status == 'success') {
                        Swal.fire({ icon: 'success', title: response.message, showConfirmButton: false, timer: 1500 }).then(() => {
                            if(response.role == 'admin') {
                                window.location.href = '<?= BASEURL; ?>/Admin';
                            } else {
                                window.location.href = '<?= BASEURL; ?>/Home';
                            }
                        });
                    } else {
                        Swal.fire('Error', response.message, 'error');
                    }
                }
            });
        });

        $('#formRegister').on('submit', function(e) {
            e.preventDefault();
            $('#loading-overlay').css('display', 'flex');
            $.ajax({
                url: '<?= BASEURL; ?>/Auth/register',
                type: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                    $('#loading-overlay').hide();
                    if(response.status == 'success') {
                        Swal.fire({ icon: 'success', title: response.message, text: 'Logging you in automatically...', showConfirmButton: false, timer: 2000 }).then(() => {
                            window.location.href = '<?= BASEURL; ?>/Home';
                        });
                    } else {
                        Swal.fire('Error', response.message, 'error');
                    }
                }
            });
        });
    });
</script>

</body>
</html>
