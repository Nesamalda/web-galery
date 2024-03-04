<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

  <?php
session_start();
if(!isset($_SESSION['userid'])){
    header("location:login.php");
}
?>
<p>Selamat Datang <b><?=$_SESSION['namalengkap']?><</p>

  <table width="100%" border="1" cellpadding="5" cellspacing="0">
    <tr>
      <th>ID</th>
      <th>Judul</th>
      <th>Deskripsi</th>
      <th>Foto</th>
      <th>uploader</th>
      <th>Jumlah Like</th>
      <th>Aksi</th>
    </tr>
  <?php
  include "koneksi.php";
  $sql=mysqli_query($conn, "SELECT * from foto,user where foto.userid=user.userid");
  while($data=mysqli_fetch_array($sql)){
    ?>
    <tr>
      <td><?=$data['fotoid']?></td>
      <td><?=$data['judulfoto']?></td>
      <td><?=$data['deskripsi']?></td>
      <td><img src="gambar/<?=$data['lokasifile']?>" width="200px"></td>
      <td><?=$data['namalengkap']?></td>
      <td>
        <?php
        $fotoid=$data['fotoid'];
        $sql2=mysqli_query($conn, "SELECT * from likefoto where fotoid='$fotoid'");
        echo mysqli_num_rows($sql2);
        ?>
      </td>
      <td>
        <a href="like.php?fotoid=<?=$data['fotoid']?>">Like</a>
      </td>
    </tr>
    <?php
  }
  ?>
  </table>
 
<footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom">
   <p>&copy; UKK RPL 2024</p>
</footer>
<script type="text/javascript" src="asset/js/bootstrap.min.js"></script>
</body>
</html>