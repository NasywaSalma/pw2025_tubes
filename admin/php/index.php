<?php
function koneksi()
{
    $conn = mysqli_connect('localhost', 'root', '', 'pw2024_tubes_243040033');
    return $conn;
}

function select($query)
{
    $conn = koneksi();
    $result = mysqli_query($conn, $query);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

// Ambil data pendaftaran akun
$data_pendaftaran = select("SELECT * FROM orders ORDER BY id DESC");
$total_pendaftaran = count($data_pendaftaran);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel - Data Pendaftaran Akun</title>
    <link rel="icon" href="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo-shadow.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: #f8fafc;
        }
        .sidebar {
            background: linear-gradient(180deg, #0d6efd 80%, #2563eb 100%);
            min-height: 100vh;
            box-shadow: 2px 0 16px rgba(0,0,0,0.07);
        }
        .sidebar .navbar-brand {
            font-size: 1.3rem;
            letter-spacing: 1px;
        }
        .sidebar .avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            margin: 0 auto 1rem;
            display: block;
            border: 3px solid #fff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
        .nav-link.active, .nav-link:hover {
            background: rgba(255,255,255,0.15);
            font-weight: bold;
        }
        .card-summary {
            border: none;
            border-radius: 1rem;
            transition: transform 0.2s, box-shadow 0.2s;
            box-shadow: 0 4px 16px rgba(0,0,0,0.08);
        }
        .card-summary:hover {
            transform: translateY(-5px) scale(1.03);
            box-shadow: 0 8px 24px rgba(0,0,0,0.12);
        }
        .btn-custom {
            border-radius: 0.5rem;
        }
        .table-custom th, .table-custom td {
            vertical-align: middle;
        }
        .table-custom tbody tr:nth-child(even) {
            background: #f6f8fa;
        }
        .table-custom tbody tr:hover {
            background: #e9ecef;
        }
        .aksi-btns .btn {
            margin-right: 4px;
        }
        .footer {
            background: #0d6efd;
            color: #fff;
            padding: 1rem 0;
            text-align: center;
            margin-top: 3rem;
            border-radius: 0 0 1rem 1rem;
        }
        @media (max-width: 991px) {
            .sidebar {
                display: none;
            }
            main {
                margin-left: 0 !important;
            }
        }
    </style>
</head>
<body>
<!-- Sidebar -->
<div class="d-flex">
    <nav class="d-none d-lg-block sidebar shadow" style="width: 220px; position: fixed;">
        <div class="sidebar-sticky pt-4 text-center">
            <img src="https://ui-avatars.com/api/?name=Admin&background=0d6efd&color=fff" class="avatar mb-2" alt="Admin">
            <a class="navbar-brand text-white fw-bold px-3 mb-4 d-block" href="#"><i class="bi bi-speedometer2 me-2"></i>Admin Panel</a>
            <ul class="nav flex-column text-start px-3">
                <li class="nav-item mb-2">
                    <a class="nav-link text-white active" href="index.php">
                        <i class="bi bi-house-door me-2"></i>Dashboard
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-white" href="index.php">
                        <i class="bi bi-person-plus me-2"></i>Orders
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-white" href="cars.php">
                        <i class="bi bi-person-plus me-2"></i>Cars
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-white" href="cars.php">
                        <i class="bi bi-person-plus me-2"></i>Popular Vihecles
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-white" href="cars.php">
                        <i class="bi bi-person-plus me-2"></i>Subscribe
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-white" href="cars.php">
                        <i class="bi bi-person-plus me-2"></i>Contact
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-white" href="../../logout.php">
                        <i class="bi bi-box-arrow-right me-2"></i>Logout
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <div style="margin-left:220px; width:100%;">
<main class="col-lg-10 ms-lg-auto px-lg-4">
    <div class="container mt-4 mb-5">
        
        <div class="card shadow-lg">
            <div class="header text-white d-flex justify-content-between align-items-center bg-primary p-3 rounded-top">
                <h4 class="mb-0"><i class="bi bi-table me-2"></i>Data Pendaftaran Akun</h4>
                <a href="../../daftar.php" class="btn btn-light btn-custom shadow-sm"><i class="bi bi-plus-circle me-1"></i>Tambah Data</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-custom mb-0 align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>no</th>
                                 <th>Vehicles Id</th>
                                <th>first name</th>
                                <th>last name</th>
                                <th>Driving License</th>
                                <th>Address0</th>
                                <th>address1</th>
                                <th>Town/City</th>
                                <th>Pastcode/Zip</th>
                                <th>Country/State</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>note</th>
                                <th>Order Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($total_pendaftaran > 0): ?>
                                <?php $no = 1; ?>
                                <?php foreach ($data_pendaftaran as $akun): ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= ($akun['vehicle_id']); ?></td>
                                        <td><?= ($akun['first_name']); ?></td>
                                        <td><?= ($akun['last_name']); ?></td>
                                        <td><?= ($akun['draving_license']); ?></td>
                                        <td><?= ($akun['address0']); ?></td>
                                        <td><?= ($akun['address1']); ?></td>
                                        <td><?= ($akun['town/city']); ?></td>
                                        <td><?= ($akun['pastcode/zip']); ?></td>
                                        <td><?= ($akun['country/state']); ?></td>
                                        <td><?= ($akun['email']); ?></td>
                                        <td><?= ($akun['phone']); ?></td>
                                        <td><?= ($akun['note']); ?></td>
                                        <td><?= ($akun['order_date']); ?></td>
                                        <td class="aksi-btns">
                                            <a href="ubah/ubah-akun.php?id=<?= $akun['id']; ?>" class="btn btn-success btn-sm btn-custom" title="Ubah Data">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <a href="hapus/hapus-akun.php?id=<?= $akun['id']; ?>" class="btn btn-danger btn-sm btn-custom" onclick="return confirm('Yakin ingin menghapus data ini?');" title="Hapus Data">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7" class="text-center text-muted">Belum ada data pendaftaran akun.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
