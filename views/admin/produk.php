<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Produk - Neubrutalism Admin Pro</title>
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;500;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0; top: 0; width: 100%; height: 100%;
            background: rgba(0,0,0,0.6);
            backdrop-filter: blur(8px);
            align-items: center; justify-content: center; /* Centering */
        }
        .modal.active { display: flex; }
        .modal-content {
            background: #fff;
            padding: 40px;
            border: 5px solid #000;
            width: 90%;
            max-width: 600px;
            box-shadow: 20px 20px 0px #000;
            position: relative;
        }
        .filter-container {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
            background: var(--main);
            padding: 20px;
            border: 4px solid #000;
            box-shadow: 8px 8px 0px #000;
        }
        .pagination {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 30px;
        }
    </style>
</head>
<body>

    <?php Flasher::flash(); ?>

    <aside class="sidebar">
        <div class="logo">ADMIN PANEL</div>
        <ul class="nav-menu">
            <li><a href="<?= BASEURL; ?>/Admin"><i class="fas fa-th-large"></i> Dashboard</a></li>
            <li><a href="<?= BASEURL; ?>/Admin/produk" class="active"><i class="fas fa-box"></i> Produk</a></li>
            <li><a href="<?= BASEURL; ?>/Admin/promo"><i class="fas fa-tags"></i> Kelola Promo</a></li>
            <li><a href="<?= BASEURL; ?>/Admin/users"><i class="fas fa-users"></i> Pelanggan</a></li>
            <li><a href="<?= BASEURL; ?>/Admin/settings"><i class="fas fa-cog"></i> Settings</a></li>
            <li style="margin-top: auto;"><a href="<?= BASEURL; ?>/Auth/logout" style="background: #ff5252; color: #fff;"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </aside>

    <main class="main-content">
        <header class="header">
            <h1 style="font-size: 2.5rem; font-weight: 900;">PRODUCT INVENTORY</h1>
            <button class="btn btn-main" style="background: #b2ff59;" onclick="openModal('tambah')">+ Add New Product</button>
        </header>

        <!-- Search & Filter Bar -->
        <div class="filter-container">
            <div style="flex: 2;">
                <label style="font-weight: 900; display: block; margin-bottom: 5px;">Search Product</label>
                <input type="text" id="searchInput" class="form-control" placeholder="Type product name..." onkeyup="filterData()">
            </div>
            <div style="flex: 1;">
                <label style="font-weight: 900; display: block; margin-bottom: 5px;">Category</label>
                <select id="categoryFilter" class="form-control" onchange="filterData()">
                    <option value="all">All Categories</option>
                    <option value="1">Fashion</option>
                    <option value="2">Accessories</option>
                </select>
            </div>
            <div style="display: flex; align-items: flex-end;">
                <button class="btn" onclick="resetFilter()" style="background: #fff;">Reset</button>
            </div>
        </div>

        <section class="content-box">
            <table id="productTable">
                <thead>
                    <tr><th>Image</th><th>Name</th><th>Category</th><th>Price</th><th>Stock</th><th>Actions</th></tr>
                </thead>
                <tbody>
                    <?php foreach($data['produk'] as $p) : ?>
                    <tr class="product-row" data-name="<?= strtolower($p['nama_produk']); ?>" data-category="<?= $p['id_kategori']; ?>">
                        <td><img src="<?= $p['gambar']; ?>" style="width: 50px; height: 50px; border: 3px solid #000; object-fit: cover;"></td>
                        <td style="font-weight: 900;"><?= $p['nama_produk']; ?></td>
                        <td><?= ($p['id_kategori'] == 1) ? 'Fashion' : 'Accessories'; ?></td>
                        <td>Rp <?= number_format($p['harga'], 0, ',', '.'); ?></td>
                        <td><span style="background: #ffff8d; padding: 5px 10px; border: 2px solid #000; font-weight: 800;"><?= $p['stok']; ?></span></td>
                        <td>
                            <div style="display: flex; gap: 10px;">
                                <button class="btn" style="background: #80d8ff;" onclick="openModal('edit', <?= $p['id']; ?>)"><i class="fas fa-edit"></i></button>
                                <a href="<?= BASEURL; ?>/Admin/hapusProduk/<?= $p['id']; ?>" class="btn" style="background: #ff8a80;" onclick="return confirm('Delete this product?')"><i class="fas fa-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <!-- Pagination Simulation -->
            <div class="pagination">
                <button class="filter-btn active">1 - 20</button>
                <button class="filter-btn">20 - 40</button>
                <button class="filter-btn">40+</button>
            </div>
        </section>
    </main>

    <!-- Modal Form (Centered) -->
    <div id="produkModal" class="modal">
        <div class="modal-content">
            <h2 id="modalTitle" style="margin-bottom: 30px; font-weight: 900; text-transform: uppercase;">Tambah Produk</h2>
            <form action="<?= BASEURL; ?>/Admin/tambahProduk" method="post" id="produkForm" enctype="multipart/form-data">
                <input type="hidden" name="id" id="produkId">
                <input type="hidden" name="gambar_lama" id="gambarLama">
                
                <div class="form-group">
                    <label>Nama Produk</label>
                    <input type="text" name="nama_produk" id="nama_produk" class="form-control" required>
                </div>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div class="form-group">
                        <label>Harga (Rp)</label>
                        <input type="number" name="harga" id="harga" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Stok</label>
                        <input type="number" name="stok" id="stok" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label>Kategori</label>
                    <select name="id_kategori" id="id_kategori" class="form-control">
                        <option value="1">Fashion</option>
                        <option value="2">Accessories</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Upload Gambar Produk</label>
                    <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*">
                    <p style="font-size: 0.7rem; color: #666; margin-top: 5px;">*Format: JPG, PNG. Max 2MB.</p>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3"></textarea>
                </div>
                <div style="display: flex; gap: 15px; margin-top: 30px;">
                    <button type="button" class="btn" style="flex: 1;" onclick="closeModal()">CANCEL</button>
                    <button type="submit" class="btn btn-main" style="flex: 2; background: var(--main);" id="submitBtn">SAVE PRODUCT</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const modal = document.getElementById('produkModal');
        const form = document.getElementById('produkForm');
        
        function openModal(mode, id = null) {
            modal.classList.add('active');
            if(mode === 'edit') {
                document.getElementById('modalTitle').innerText = 'Edit Produk';
                form.action = '<?= BASEURL; ?>/Admin/ubahProduk';
                document.getElementById('submitBtn').innerText = 'UPDATE PRODUCT';
                
                fetch('<?= BASEURL; ?>/Admin/getubahProduk', {
                    method: 'POST',
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                    body: 'id=' + id
                })
                .then(res => res.json())
                .then(data => {
                    document.getElementById('produkId').value = data.id;
                    document.getElementById('nama_produk').value = data.nama_produk;
                    document.getElementById('harga').value = data.harga;
                    document.getElementById('stok').value = data.stok;
                    document.getElementById('id_kategori').value = data.id_kategori;
                    document.getElementById('deskripsi').value = data.deskripsi;
                    document.getElementById('gambarLama').value = data.gambar;
                });
            } else {
                document.getElementById('modalTitle').innerText = 'Tambah Produk';
                form.action = '<?= BASEURL; ?>/Admin/tambahProduk';
                document.getElementById('submitBtn').innerText = 'SAVE PRODUCT';
                form.reset();
            }
        }

        function closeModal() { modal.classList.remove('active'); }

        // Filter Logic
        function filterData() {
            const search = document.getElementById('searchInput').value.toLowerCase();
            const category = document.getElementById('categoryFilter').value;
            const rows = document.querySelectorAll('.product-row');

            rows.forEach(row => {
                const name = row.getAttribute('data-name');
                const cat = row.getAttribute('data-category');
                
                const matchSearch = name.includes(search);
                const matchCategory = (category === 'all' || cat === category);

                if(matchSearch && matchCategory) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        function resetFilter() {
            document.getElementById('searchInput').value = '';
            document.getElementById('categoryFilter').value = 'all';
            filterData();
        }

        window.onclick = function(event) { if (event.target == modal) closeModal(); }
    </script>
</body>
</html>
