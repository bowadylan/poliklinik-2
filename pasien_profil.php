<?php 
include 'config.php';
session_start();

if (!isset($_SESSION['id_pasien'])) {
    die("Akses ditolak. Silakan login terlebih dahulu.");
}

$id_pasien = $_SESSION['id_pasien'];

// Ambil data pasien berdasarkan ID
$sql = "SELECT * FROM pasien WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $id_pasien);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    die("Data pasien tidak ditemukan.");
}

$pasien = $result->fetch_assoc();

// Proses pembaruan data jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_ktp = $_POST['no_ktp'];
    $no_hp = $_POST['no_hp'];

    // Validasi input (bisa ditambah sesuai kebutuhan)
    if (empty($nama) || empty($alamat) || empty($no_ktp) || empty($no_hp)) {
        echo "<script>
                alert('Semua field yang bertanda * harus diisi.');
                window.location.href = 'pasien_profil.php';
              </script>";
    } else {
        // Update data pasien
        $sql_update = "UPDATE pasien SET nama = ?, alamat = ?, no_ktp = ?, no_hp = ? WHERE id = ?";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param('sssii', $nama, $alamat, $no_ktp, $no_hp, $id_pasien);

        if ($stmt_update->execute()) {
            echo "<script>
                    alert('Profil berhasil diperbarui.');
                    window.location.href = 'pasien_profil.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Gagal memperbarui profil.');
                    window.location.href = 'pasien_profil.php';
                  </script>";
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="styles.css" />
    <title>POLIKLINIK</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
                    <i class="fas fa-clinic-medical me-2"></i>POLIKLINIK
                </div>
                <div class="list-group list-group-flush my-3">
                    <a href="pasien_dashboard.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                        <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                    </a>
                    <a href="pasien_poli.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                        <i class="fas fa-hospital me-2"></i>Poli
                    </a>
                    <a href="pasien_profil.php" class="list-group-item list-group-item-action bg-transparent second-text active">
                        <i class="fas fa-user me-2"></i>Profil
                    </a>
                    <a href="logout.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold">
                        <i class="fas fa-power-off me-2"></i>Logout
                    </a>
                </div>
            </div>

        <!-- Page Content -->
        <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Profil</h2>
                </div>
            </nav>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Edit Profil Pasien</h1>

                <form method="POST" class="mt-4">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" id="nama" name="nama" class="form-control" value="<?= htmlspecialchars($pasien['nama']); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea id="alamat" name="alamat" class="form-control" required><?= htmlspecialchars($pasien['alamat']); ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="no_ktp" class="form-label">Nomor KTP</label>
                        <input type="number" id="no_ktp" name="no_ktp" class="form-control" value="<?= htmlspecialchars($pasien['no_ktp']); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="no_hp" class="form-label">Nomor HP</label>
                        <input type="number" id="no_hp" name="no_hp" class="form-control" value="<?= htmlspecialchars($pasien['no_hp']); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="no_rm" class="form-label">No RM</label>
                        <input type="text" id="no_rm" name="no_rm" class="form-control" value="<?= htmlspecialchars($pasien['no_rm']); ?>" readonly>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>
