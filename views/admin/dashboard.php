<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Neubrutalism Analytics Pro</title>
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;500;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .analytics-grid { display: grid; grid-template-columns: 2fr 1fr; gap: 30px; margin-top: 30px; }
        .chart-placeholder {
            height: 280px;
            background: #fff;
            border: 4px solid #000;
            display: flex;
            align-items: flex-end;
            justify-content: space-around;
            padding: 30px 20px;
            position: relative;
        }
        .bar-wrapper { display: flex; flex-direction: column; align-items: center; gap: 10px; flex: 1; }
        .bar { background: var(--main); border: 2px solid #000; width: 45px; transition: 0.5s; position: relative; }
        .bar:hover { background: var(--accent); transform: scaleX(1.1); }
        .bar-value { font-weight: 900; font-size: 0.8rem; }
        .bar-label { font-size: 0.7rem; font-weight: 700; text-transform: uppercase; }
        
        .filter-group { display: flex; gap: 10px; margin-bottom: 20px; }
        .filter-btn {
            padding: 8px 15px;
            border: 2px solid #000;
            background: #fff;
            font-weight: 800;
            cursor: pointer;
            font-size: 0.8rem;
        }
        .filter-btn.active { background: var(--main); box-shadow: 3px 3px 0px #000; transform: translate(-2px, -2px); }
        
        .growth-tag {
            background: #b2ff59;
            padding: 2px 8px;
            border: 2px solid #000;
            font-size: 0.7rem;
            font-weight: 900;
            margin-left: 10px;
        }
    </style>
</head>
<body>

    <aside class="sidebar">
        <div class="logo">ADMIN PANEL</div>
        <ul class="nav-menu">
            <li><a href="<?= BASEURL; ?>/Admin" class="active"><i class="fas fa-th-large"></i> Dashboard</a></li>
            <li><a href="<?= BASEURL; ?>/Admin/produk"><i class="fas fa-box"></i> Produk</a></li>
            <li><a href="<?= BASEURL; ?>/Admin/promo"><i class="fas fa-tags"></i> Kelola Promo</a></li>
            <li><a href="<?= BASEURL; ?>/Admin/users"><i class="fas fa-users"></i> Pelanggan</a></li>
            <li><a href="<?= BASEURL; ?>/Admin/settings"><i class="fas fa-cog"></i> Settings</a></li>
            <li style="margin-top: auto;"><a href="<?= BASEURL; ?>/Auth/logout" style="background: #ff5252; color: #fff;"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </aside>

    <main class="main-content">
        <header class="header">
            <h1 style="font-size: 2.5rem; font-weight: 900;">DASHBOARD</h1>
            <div class="user-info">
                <span style="font-weight: 800; border: 3px solid #000; padding: 10px 20px; background: #fff;">Hello, Administrator</span>
            </div>
        </header>

        <!-- Stats Overview -->
        <section class="stats-grid">
            <div class="stat-card">
                <h3>Users Active <span class="growth-tag">+12%</span></h3>
                <div class="value">1,240</div>
            </div>
            <div class="stat-card">
                <h3>Items Sold <span class="growth-tag" style="background: #ff8a80;">-5%</span></h3>
                <div class="value">5,420</div>
            </div>
            <div class="stat-card">
                <h3>Current Stock</h3>
                <div class="value">850</div>
            </div>
            <div class="stat-card">
                <h3>Net Profit <span class="growth-tag">+24%</span></h3>
                <div class="value">Rp 45M</div>
            </div>
        </section>

        <!-- Analytics Section -->
        <div class="analytics-grid">
            <div class="content-box">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                    <h2>User Growth Analysis</h2>
                    <div class="filter-group">
                        <button class="filter-btn">Today</button>
                        <button class="filter-btn">Weekly</button>
                        <button class="filter-btn active">Monthly</button>
                    </div>
                </div>
                
                <div class="chart-placeholder">
                    <div class="bar-wrapper">
                        <span class="bar-value">240</span>
                        <div class="bar" style="height: 40%;"></div>
                        <span class="bar-label">Jan</span>
                    </div>
                    <div class="bar-wrapper">
                        <span class="bar-value">380</span>
                        <div class="bar" style="height: 60%;"></div>
                        <span class="bar-label">Feb</span>
                    </div>
                    <div class="bar-wrapper">
                        <span class="bar-value">310</span>
                        <div class="bar" style="height: 50%;"></div>
                        <span class="bar-label">Mar</span>
                    </div>
                    <div class="bar-wrapper">
                        <span class="bar-value">520</span>
                        <div class="bar" style="height: 85%;"></div>
                        <span class="bar-label">Apr</span>
                    </div>
                    <div class="bar-wrapper">
                        <span class="bar-value">460</span>
                        <div class="bar" style="height: 75%;"></div>
                        <span class="bar-label">May</span>
                    </div>
                    <div class="bar-wrapper">
                        <span class="bar-value">610</span>
                        <div class="bar" style="height: 95%;"></div>
                        <span class="bar-label">Jun</span>
                    </div>
                </div>
                <p style="margin-top: 20px; font-weight: 700; color: #555;">
                    <i class="fas fa-info-circle"></i> Showing data for the last 6 months. Highest growth in **June**.
                </p>
            </div>

            <div class="content-box" style="background: #80d8ff;">
                <h2>Sales Insights</h2>
                <div style="margin-top: 20px;">
                    <div style="margin-bottom: 20px;">
                        <div style="display: flex; justify-content: space-between; font-weight: 900; margin-bottom: 5px;">
                            <span>Fashion</span><span>75%</span>
                        </div>
                        <div style="width: 100%; height: 20px; background: #fff; border: 3px solid #000;">
                            <div style="width: 75%; height: 100%; background: var(--accent); border-right: 3px solid #000;"></div>
                        </div>
                    </div>
                    <div>
                        <div style="display: flex; justify-content: space-between; font-weight: 900; margin-bottom: 5px;">
                            <span>Accessories</span><span>25%</span>
                        </div>
                        <div style="width: 100%; height: 20px; background: #fff; border: 3px solid #000;">
                            <div style="width: 25%; height: 100%; background: var(--main); border-right: 3px solid #000;"></div>
                        </div>
                    </div>
                </div>
                <div style="margin-top: 40px; background: #fff; padding: 15px; border: 3px solid #000;">
                    <h4 style="margin-bottom: 10px;">PROMO IMPACT</h4>
                    <p style="font-size: 0.85rem; font-weight: 600;">Voucher **SUMMERHOT** contributed to **18%** of total sales this week.</p>
                </div>
            </div>
        </div>

        <!-- Recent Activity Table -->
        <section class="content-box" style="margin-top: 40px;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
                <h2>Recent Orders</h2>
                <button class="btn btn-main">Download PDF</button>
            </div>
            <table>
                <thead>
                    <tr><th>Order ID</th><th>Customer</th><th>Product</th><th>Amount</th><th>Status</th></tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#ORD-9921</td>
                        <td>Bagas Al Fakhri</td>
                        <td>Premium Oversized Tee</td>
                        <td>Rp 250.000</td>
                        <td><span style="background: #b2ff59; padding: 5px 10px; border: 2px solid #000;">COMPLETED</span></td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>

    <?php Flasher::flash(); ?>
</body>
</html>
