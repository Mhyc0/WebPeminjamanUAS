<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - TabunganKu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/style.css">
</head>
<body class="bg-login">

    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-5">
                
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-body p-5">
                        
                        <div class="text-center mb-4">
                            <h3 class="font-weight-bold text-primary">🏦 TabunganKu</h3>
                            <p class="text-muted">Silakan login untuk melanjutkan</p>
                        </div>

                        <?php Flasher::flash(); ?>

                        <form action="<?= BASEURL; ?>/auth/login" method="post">
                            <div class="form-group">
                                <label class="small mb-1 font-weight-bold" for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control py-4" placeholder="Masukkan username..." required>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1 font-weight-bold" for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control py-4" placeholder="Masukkan password..." required>
                            </div>
                            
                            <button type="submit" class="btn btn-primary btn-block btn-lg mt-4 shadow-sm">
                                Masuk Sekarang
                            </button>
                        </form>
                    </div>
                    
                    <div class="card-footer text-center py-3 bg-light border-0">
                        <small class="text-muted">Aplikasi Tabungan by <b>Mhyco</b> &copy; 2026</small>
                    </div>
                    </div>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>