<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pelanggan - Neubrutalism Admin</title>
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
            <li><a href="<?= BASEURL; ?>/Admin/users" class="active"><i class="fas fa-users"></i> Pelanggan</a></li>
            <li><a href="<?= BASEURL; ?>/Admin/settings"><i class="fas fa-cog"></i> Settings</a></li>
            <li style="margin-top: auto;"><a href="<?= BASEURL; ?>/Auth/logout" style="background: #ff5252; color: #fff;"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </aside>

    <main class="main-content">
        <header class="header">
            <h1 style="font-size: 2.5rem; font-weight: 900;">CUSTOMER LIST</h1>
        </header>

        <section class="content-box">
            <table>
                <thead>
                    <tr><th>ID</th><th>Customer Name</th><th>Email</th><th>Status</th><th>Actions</th></tr>
                </thead>
                <tbody>
                    <?php foreach($data['users'] as $u) : ?>
                    <tr>
                        <td>#<?= $u['id']; ?></td>
                        <td><div style="font-weight: 900;"><?= $u['nama']; ?></div></td>
                        <td><?= $u['email']; ?></td>
                        <td><span style="background: #b2ff59; padding: 5px 10px; border: 2px solid #000;"><?= $u['status']; ?></span></td>
                        <td>
                            <button class="btn" style="background: #ff8a80; padding: 5px 15px;"><i class="fas fa-ban"></i> Block</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </main>

</body>
</html>
