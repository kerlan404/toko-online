<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Settings - Neubrutalism</title>
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;500;700&display=swap" rel="stylesheet">
</head>
<body>

    <aside class="sidebar">
        <div class="logo">ADMIN PANEL</div>
        <ul class="nav-menu">
            <li><a href="<?= BASEURL; ?>/Admin"><i class="fas fa-th-large"></i> Dashboard</a></li>
            <li><a href="<?= BASEURL; ?>/Admin/produk"><i class="fas fa-box"></i> Produk</a></li>
            <li><a href="<?= BASEURL; ?>/Admin/promo"><i class="fas fa-tags"></i> Kelola Promo</a></li>
            <li><a href="<?= BASEURL; ?>/Admin/users"><i class="fas fa-users"></i> Pelanggan</a></li>
            <li><a href="<?= BASEURL; ?>/Admin/settings" class="active"><i class="fas fa-cog"></i> Settings</a></li>
            <li style="margin-top: auto;"><a href="<?= BASEURL; ?>/Auth/logout" style="background: #ff5252; color: #fff;"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </aside>

    <main class="main-content">
        <header class="header">
            <h1 style="font-size: 2.5rem; font-weight: 900;">ADMIN SETTINGS</h1>
        </header>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px;">
            <!-- Profile Info -->
            <section class="content-box">
                <h2>Profile Information</h2>
                <form>
                    <div class="form-group">
                        <label>Admin Name</label>
                        <input type="text" class="form-control" value="Administrator">
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" class="form-control" value="admin@gmail.com">
                    </div>
                    <button type="submit" class="btn btn-main" style="width: 100%;">Update Profile</button>
                </form>
            </section>

            <!-- Change Password -->
            <section class="content-box" style="background: #ffff8d;">
                <h2>Security</h2>
                <form>
                    <div class="form-group">
                        <label>Current Password</label>
                        <input type="password" class="form-control" placeholder="••••••••">
                    </div>
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" class="form-control" placeholder="New Password">
                    </div>
                    <button type="submit" class="btn btn-accent" style="width: 100%;">Change Password</button>
                </form>
            </section>
        </div>
    </main>

</body>
</html>
