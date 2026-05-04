<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Promo - Neubrutalism Admin Pro</title>
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0; top: 0; width: 100%; height: 100%;
            background: rgba(0,0,0,0.6);
            backdrop-filter: blur(8px);
            align-items: center; justify-content: center;
        }
        .modal.active { display: flex; }
        .modal-content {
            background: #fff;
            padding: 40px;
            border: 5px solid #000;
            width: 90%;
            max-width: 600px;
            box-shadow: 20px 20px 0px #000;
        }
        .filter-container {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
            background: #ffff8d;
            padding: 20px;
            border: 4px solid #000;
            box-shadow: 8px 8px 0px #000;
        }
        .flatpickr-calendar {
            border: 4px solid #000 !important;
            box-shadow: 10px 10px 0px #000 !important;
            border-radius: 0 !important;
            font-family: 'Space Grotesk', sans-serif !important;
            background: #fff !important;
        }
        .flatpickr-day.selected, .flatpickr-day.selected:hover {
            background: var(--main) !important;
            color: #000 !important;
            border: 2px solid #000 !important;
            font-weight: 900 !important;
        }
        .flatpickr-months { background: #000 !important; padding: 10px 0 !important; }
        .flatpickr-month { color: #fff !important; fill: #fff !important; }
        .flatpickr-weekday { color: #aaa !important; font-weight: 900 !important; }
        .flatpickr-current-month .flatpickr-monthDropdown-months { background: #000 !important; }
        .flatpickr-prev-month, .flatpickr-next-month { fill: #fff !important; }
        
        .date-input-wrapper { position: relative; }
        .date-input-wrapper i {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
            font-size: 1.2rem;
        }
    </style>
</head>
<body>

    <?php Flasher::flash(); ?>

    <aside class="sidebar">
        <div class="logo">ADMIN PANEL</div>
        <ul class="nav-menu">
            <li><a href="<?= BASEURL; ?>/Admin"><i class="fas fa-th-large"></i> Dashboard</a></li>
            <li><a href="<?= BASEURL; ?>/Admin/produk"><i class="fas fa-box"></i> Produk</a></li>
            <li><a href="<?= BASEURL; ?>/Admin/promo" class="active"><i class="fas fa-tags"></i> Kelola Promo</a></li>
            <li><a href="<?= BASEURL; ?>/Admin/users"><i class="fas fa-users"></i> Pelanggan</a></li>
            <li><a href="<?= BASEURL; ?>/Admin/settings"><i class="fas fa-cog"></i> Settings</a></li>
            <li style="margin-top: auto;"><a href="<?= BASEURL; ?>/Auth/logout" style="background: #ff5252; color: #fff;"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </aside>

    <main class="main-content">
        <header class="header">
            <h1 style="font-size: 2.5rem; font-weight: 900;">PROMO MANAGEMENT</h1>
            <button class="btn btn-main" style="background: #80d8ff;" onclick="openModal('tambah')">+ Add New Promo</button>
        </header>

        <div class="filter-container">
            <div style="flex: 1;">
                <label style="font-weight: 900; display: block; margin-bottom: 5px;">Search Promo</label>
                <input type="text" id="promoSearch" class="form-control" placeholder="Search by title or code..." onkeyup="filterPromo()">
            </div>
        </div>

        <section class="content-box">
            <table>
                <thead>
                    <tr><th>Banner</th><th>Promo Info</th><th>Code</th><th>Discount</th><th>Valid Until</th><th>Actions</th></tr>
                </thead>
                <tbody id="promoTable">
                    <?php foreach($data['promo'] as $p) : ?>
                    <tr class="promo-row" data-search="<?= strtolower($p['judul'] . ' ' . $p['kode_promo']); ?>">
                        <td><img src="<?= $p['gambar']; ?>" style="width: 80px; height: 50px; border: 2px solid #000; object-fit: cover;"></td>
                        <td>
                            <div style="font-weight: 900;"><?= $p['judul']; ?></div>
                            <div style="font-size: 0.8rem; color: #666;"><?= $p['deskripsi']; ?></div>
                        </td>
                        <td><span style="background: #ffff8d; padding: 5px 10px; border: 2px solid #000; font-family: monospace; font-weight: 700;"><?= $p['kode_promo']; ?></span></td>
                        <td><span style="background: #b2ff59; padding: 5px 10px; border: 2px solid #000; font-weight: 900;"><?= $p['diskon_persen']; ?>%</span></td>
                        <td><span style="background: #ffde03; padding: 8px 12px; border: 3px solid #000; font-weight: 900; box-shadow: 4px 4px 0px #000; white-space: nowrap;"><?= date('d/m/Y', strtotime($p['berlaku_sampai'])); ?></span></td>
                        <td>
                            <div style="display: flex; gap: 10px;">
                                <button class="btn" style="background: #80d8ff;" onclick="openModal('edit', <?= $p['id']; ?>)"><i class="fas fa-edit"></i></button>
                                <a href="<?= BASEURL; ?>/Admin/hapusPromo/<?= $p['id']; ?>" class="btn" style="background: #ff8a80;" onclick="return confirm('Delete this promo?')"><i class="fas fa-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div style="display: flex; justify-content: center; gap: 10px; margin-top: 30px;">
                <button class="filter-btn active">1 - 20</button>
                <button class="filter-btn">Next</button>
            </div>
        </section>
    </main>

    <!-- Modal Form (Centered) -->
    <div id="promoModal" class="modal">
        <div class="modal-content">
            <h2 id="modalTitle" style="margin-bottom: 30px; font-weight: 900; text-transform: uppercase;">Tambah Promo</h2>
            <form action="<?= BASEURL; ?>/Admin/tambahPromo" method="post" id="promoForm" enctype="multipart/form-data">
                <input type="hidden" name="id" id="promoId">
                <input type="hidden" name="gambar_lama" id="gambarLama">

                <div class="form-group">
                    <label>Judul Promo</label>
                    <input type="text" name="judul" id="judul" class="form-control" required>
                </div>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div class="form-group">
                        <label>Kode Promo</label>
                        <input type="text" name="kode_promo" id="kode_promo" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Diskon (%)</label>
                        <input type="number" name="diskon_persen" id="diskon_persen" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label>Upload Banner Promo</label>
                    <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*">
                </div>
                <div class="form-group">
                    <label>Berlaku Sampai</label>
                    <div class="date-input-wrapper">
                        <input type="text" name="berlaku_sampai" id="berlaku_sampai" class="form-control datepicker" placeholder="Klik atau Ketik (DD/MM/YYYY)" required>
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3"></textarea>
                </div>
                <div style="display: flex; gap: 15px; margin-top: 30px;">
                    <button type="button" class="btn" style="flex: 1;" onclick="closeModal()">CANCEL</button>
                    <button type="submit" class="btn btn-main" style="flex: 2; background: var(--main);" id="submitBtn">SAVE PROMO</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const modal = document.getElementById('promoModal');
        const form = document.getElementById('promoForm');
        
        function openModal(mode, id = null) {
            modal.classList.add('active');
            if(mode === 'edit') {
                document.getElementById('modalTitle').innerText = 'Edit Promo';
                form.action = '<?= BASEURL; ?>/Admin/ubahPromo';
                document.getElementById('submitBtn').innerText = 'UPDATE PROMO';
                
                fetch('<?= BASEURL; ?>/Admin/getubahPromo', {
                    method: 'POST',
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                    body: 'id=' + id
                })
                .then(res => res.json())
                .then(data => {
                    document.getElementById('promoId').value = data.id;
                    document.getElementById('judul').value = data.judul;
                    document.getElementById('kode_promo').value = data.kode_promo;
                    document.getElementById('diskon_persen').value = data.diskon_persen;
                    document.getElementById('berlaku_sampai').value = data.berlaku_sampai;
                    document.getElementById('deskripsi').value = data.deskripsi;
                    document.getElementById('gambarLama').value = data.gambar;
                });
            } else {
                document.getElementById('modalTitle').innerText = 'Tambah Promo';
                form.action = '<?= BASEURL; ?>/Admin/tambahPromo';
                document.getElementById('submitBtn').innerText = 'SAVE PROMO';
                form.reset();
            }
        }

        function closeModal() { modal.classList.remove('active'); }

        function filterPromo() {
            const search = document.getElementById('promoSearch').value.toLowerCase();
            const rows = document.querySelectorAll('.promo-row');
            rows.forEach(row => {
                const text = row.getAttribute('data-search');
                row.style.display = text.includes(search) ? '' : 'none';
            });
        }

        window.onclick = function(event) { if (event.target == modal) closeModal(); }

        // Initialize Flatpickr
        flatpickr(".datepicker", {
            dateFormat: "Y-m-d",
            altInput: true,
            altFormat: "d/m/Y",
            allowInput: true,
            disableMobile: true,
            onOpen: function(selectedDates, dateStr, instance) {
                // Ensure the calendar looks neat when opened
                instance.calendarContainer.classList.add('neubrutalist-picker');
            }
        });
    </script>
</body>
</html>
