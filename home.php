<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poliklinik Sehat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="home.css" />
</head>
<body>
    <!-- Header -->
    <header>
        <h1>POLIKLINIK</h1>
    </header>
    <!-- isi -->
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8 mb-4">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-clinic-medical"></i> POLIKLINIK
                    </div>
                    <div class="card-body">
                        <p>Selamat datang di Poliklinik, layanan kesehatan terpercaya dengan fasilitas modern dan tenaga medis profesional untuk melayani kebutuhan Anda.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tata cara -->
        <section id="why-us" class="why-us">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="row text-center">
                            <div class="col-md-3">
                                <div class="icon-box">
                                    <i class="bx bx-user-circle"></i>
                                    <h4>Login/ Registrasi</h4>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="icon-box">
                                    <i class="bx bx-search-alt"></i>
                                    <h4>Pilih Layanan Poli</h4>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="icon-box">
                                    <i class="bx bx-calendar"></i>
                                    <h4>Atur Jadwal</h4>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="icon-box">
                                    <i class="bx bx-check-circle"></i>
                                    <h4>Kunjungi Poliklinik</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Login pasien/dokter -->
        <div class="text-center mt-5">
 
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <i class="fas fa-stethoscope"></i> Pasien
                        </div>
                        <div class="card-body">
                            <a href="login.php" class="btn btn-custom w-100">Login Sebagai Pasien</a>
                            <p class="description">Jika Anda seorang pasien, silakan login untuk mengatur jadwal pemeriksaan, memilih layanan, dan melihat riwayat kesehatan Anda.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <i class="fas fa-user-md"></i> Dokter
                        </div>
                        <div class="card-body">
                            <a href="login_dokter.php" class="btn btn-custom w-100">Login Sebagai Dokter</a>
                            <p class="description">Login sebagai dokter, login untuk mengelola jadwal konsultasi, memberikan diagnosis, dan mengakses informasi pasien dengan mudah.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2024 Bowa Dylan Austa.</p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
