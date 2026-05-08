<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login & Register - TokoOnline</title>
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/auth.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        #loading-overlay {
            position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(255, 255, 255, 0.9);
            z-index: 9999; display: none; flex-direction: column;
            justify-content: center; align-items: center;
        }
        .loader-icon {
            font-size: 5rem;
            color: #000;
            animation: pulse-loader 1.2s infinite ease-in-out;
        }
        .loader-text {
            margin-top: 20px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        @keyframes pulse-loader {
            0% { transform: scale(0.8); opacity: 0.5; }
            50% { transform: scale(1.1); opacity: 1; }
            100% { transform: scale(0.8); opacity: 0.5; }
        }
    </style>
</head>
<body>

<div id="loading-overlay">
    <div id="loader-content" class="loader-icon">
        <i class="fas fa-tshirt"></i>
    </div>
    <div class="loader-text">Processing...</div>
</div>

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
            
            // Check if it's likely an admin login to show shield
            const email = $(this).find('input[name="email"]').val();
            if(email.includes('admin')) {
                $('#loader-content').html('<i class="fas fa-shield-alt" style="color: #5f27cd;"></i>');
                $('.loader-text').text('Securing Admin Access...');
            } else {
                $('#loader-content').html('<i class="fas fa-tshirt"></i>');
                $('.loader-text').text('Entering Zeta Store...');
            }

            $('#loading-overlay').css('display', 'flex');
            $.ajax({
                url: '<?= BASEURL; ?>/Auth/login',
                type: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                    if(response.status == 'success') {
                        if(response.role == 'admin') {
                            $('#loader-content').html('<i class="fas fa-shield-alt" style="color: #5f27cd;"></i>');
                            $('.loader-text').text('Admin Verified!');
                        } else {
                            $('#loader-content').html('<i class="fas fa-tshirt"></i>');
                            $('.loader-text').text('Login Successful!');
                        }
                        
                        setTimeout(() => {
                            if(response.role == 'admin') {
                                window.location.href = '<?= BASEURL; ?>/Admin';
                            } else {
                                window.location.href = '<?= BASEURL; ?>/Home';
                            }
                        }, 1000);
                    } else {
                        $('#loading-overlay').hide();
                        Swal.fire('Error', response.message, 'error');
                    }
                }
            });
        });

        $('#formRegister').on('submit', function(e) {
            e.preventDefault();
            $('#loader-content').html('<i class="fas fa-tshirt"></i>');
            $('.loader-text').text('Creating Your Account...');
            $('#loading-overlay').css('display', 'flex');
            $.ajax({
                url: '<?= BASEURL; ?>/Auth/register',
                type: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                    if(response.status == 'success') {
                        $('.loader-text').text('Account Created!');
                        setTimeout(() => {
                            window.location.href = '<?= BASEURL; ?>/Home';
                        }, 1000);
                    } else {
                        $('#loading-overlay').hide();
                        Swal.fire('Error', response.message, 'error');
                    }
                }
            });
        });
    });
</script>

    <?php Flasher::flash(); ?>
</body>
</html>
