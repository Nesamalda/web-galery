<!DOCTYPE html>
 <html>
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>home</title>
    <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 </head>
 <body>
 <?php
session_start();
if(!isset($_SESSION['userid'])){
    header("location:login.php");
}
?>
<nav class="navbar navbar-expand-lg navbar-light bg-warning fixed-top">
    <div class="container">
      <a class="navbar-brand" href="home.php"><b><i style="color: red;">Galery</i></b> Foto</a>
      <marquee class="fs-5"><div><b><i style="color: darkblue;">Selamat Datang <?=$_SESSION['namalengkap']?></i></b></div></marquee>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav me-auto">
</div>
          <a href="album.php" class="btn btn-outline-dark m-1 bg-secondary">Album</a>
          <a href="foto.php" class="btn btn-outline-dark m-1 bg-secondary">Foto</a>
          <a href="logout.php" class="btn btn-outline-dark m-1 bg-danger">Logout</a>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="row">
        <div class="col-md-50">
            <div class="card mt-4">
                <div class="card-header">Tambah Data</div>
                <div class="card-body">
<table>
  <tr>
    <th>ID</th>
    <th>Judul</th>
    <th>Deskripsi</th>
    <th>foto</th>
    <th>uploader</th>
    <th>Jumlah like</th>
    <th>Aksi</th>
  </tr>
  <?php
  include "koneksi.php";
  $sql=mysqli_query($conn, "SELECT * from foto,user where foto.userid=user.userid");
  while ($data=mysqli_fetch_array($sql)) {
    ?>
    <tr>
      <td><?=$data['fotoid']?></td>
      <td><?=$data['judulfoto']?></td>
      <td><?=$data['deskripsifoto']?></td>
      <td><img src="gambar/<?=$data['lokasifile']?>" width="200px" alt="foto"></td>
      <td><?=$data['namalengkap']?></td>
      <td>
        <?php
        $fotoid=$data['fotoid'];
        $sql2=mysqli_query($conn, "SELECT * from likefoto where fotoid='$fotoid'");
        echo mysqli_fetch_array($sql2);
        ?>
      </td>
      <td>
        <a href="like.php">like</a>
      </td>
    </tr>
    <?php
  }
  ?>
</table>
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