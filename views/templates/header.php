<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= (isset($data['judul'])) ? $data['judul'] . ' - TokoOnline' : 'TokoOnline - Premium Minimalist Store'; ?></title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    
    <!-- CSS -->
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/user-home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        /* Smooth Page Transition */
        body {
            animation: fadeIn 0.8s ease-in-out;
            background: #fdfdfd;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* Premium Minimalist Floating Navbar (Non-Sticky) */
        .navbar-container {
            position: absolute;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            width: 90%;
            max-width: 1200px;
            z-index: 1000;
            display: flex;
            justify-content: center;
        }
        .navbar {
            background: #fff;
            border: 3px solid #000;
            padding: 15px 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            box-shadow: 10px 10px 0px #000;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 900;
            letter-spacing: -1px;
            text-transform: uppercase;
        }
        .logo span { color: var(--primary); }
        .nav-links { display: flex; align-items: center; gap: 30px; }
        .nav-links a {
            text-decoration: none;
            color: #000;
            font-weight: 800;
            font-size: 0.9rem;
            text-transform: uppercase;
            position: relative;
            padding-bottom: 2px;
        }
        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 3px;
            background: var(--primary);
            transition: 0.3s;
        }
        .nav-links a:hover::after { width: 100%; }

        .search-mini {
            display: flex;
            background: #f0f0f0;
            border: 2px solid #000;
            padding: 5px 15px;
            border-radius: 20px;
        }
        .search-mini input {
            border: none;
            background: transparent;
            outline: none;
            font-weight: 600;
            width: 100px;
            font-size: 0.8rem;
        }

        /* Skeleton Loading */
        .skeleton {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: shimmer 1.5s infinite;
            border-radius: 4px;
        }
        @keyframes shimmer {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }
    </style>
</head>
<body>

    <!-- Floating WhatsApp Button -->
    <a href="https://wa.me/62859102765755" class="whatsapp-btn" target="_blank">
        <i class="fab fa-whatsapp"></i>
    </a>

    <?php if(!isset($data['hide_nav'])): ?>
    <div class="navbar-container">
        <nav class="navbar" id="mainNav">
            <div class="logo">
                <a href="<?= BASEURL; ?>/Home" style="text-decoration: none; color: #000;">Zeta<span></a>
            </div>
            <div class="nav-links">
                <a href="<?= BASEURL; ?>/Home">Home</a>
                <a href="<?= BASEURL; ?>/Shop/fashion">Fashion</a>
                <a href="<?= BASEURL; ?>/Shop/accessories">Accessories</a>
                
                <form action="<?= BASEURL; ?>/Shop/search" method="post" class="search-mini">
                    <input type="text" name="keyword" placeholder="Search...">
                    <button type="submit" style="background: none; border: none; cursor: pointer;"><i class="fas fa-search"></i></button>
                </form>

                <?php if(isset($_SESSION['user']) || isset($_SESSION['admin'])): ?>
                    <a href="<?= BASEURL; ?>/Auth/logout" style="color: #ff5252;">Logout</a>
                <?php else: ?>
                    <a href="<?= BASEURL; ?>/Auth" class="btn-login">Login</a>
                <?php endif; ?>
            </div>
        </nav>
    </div>
    <?php endif; ?>

    <div id="content-wrapper" style="margin-top: <?= isset($data['hide_nav']) ? '40px' : '120px'; ?>;">
