<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galery Foto</title>
    <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <div class="container">
      <a class="navbar-brand" href="#">Galery Foto</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav me-auto">
</div>
          <a href="login.php" class="btn btn-outline-dark m-1 bg-success">Login</a>
          <a href="registrasi.php" class="btn btn-outline-dark m-1 bg-primary">Daftar</a>
      </div>
    </div>
  </nav>

<div class="container py-5">
     <div class="row justify-content-center">
         <div class="col-md-4">
            <div class="card">
                <div class="card-body bg-light">
                    <div class="text-center">
                        <h5>LOGIN APPLIKASI</h5>
                    </div>
                    <form action="proses-login.php" method="post">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" required>
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
                        <div class="d-grid mt-2">
                            <button class="btn btn-primary" type="submit" name="kirim">Masuk</button>
                        </div>
                    </form>
                    <hr>
                    <p>belum punya akun? <a href="registrasi.php">Daftar di sini</p>
                </div>
            </div>
         </div>
     </div>
</div>


<footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom">
   <p>&copy; UKK RPL 2024</p>
</footer>
<script type="text/javascript" src="asset/js/bootstrap.min.js"></script>
</body>
</html>