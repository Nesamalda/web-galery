<?php
session_start();
if(!isset($_SESSION['userid'])){
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit foto</title>
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <div class="container">
      <a class="navbar-brand" href="home.php"><b><i style="color: red;">Galery</i></b> Foto</a>
      <marquee class="fs-5"><div><b><i style="color: darkblue;">Selamat Datang <?=$_SESSION['namalengkap']?></i></b></div></marquee>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav me-auto">
</div>
          <a href="foto.php" class="btn btn-outline-dark m-1 bg-danger">Kembali</a>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="row">
        <div class="col-md-50">
            <div class="card mt-4">
                <div class="card-header">Tambah Data</div>
                <div class="card-body">
    <form action="update-foto.php" method="POST" enctype="multipart/form-data">
        <?php
        include "koneksi.php";
        $fotoid=$_GET['fotoid'];
        $sql=mysqli_query($conn,"SELECT * FROM foto WHERE fotoid='$fotoid'");
        while($data=mysqli_fetch_array($sql)){
        ?>
        <input type="text" name="fotoid" value="<?=$data['fotoid']?>"hidden>
        <table class="table table-success table-striped">
            <tr>
                <td>Judul</td>
                <td><input type="text" name="judulfoto" value="<?=$data['judulfoto']?>"></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><input type="text" name="deskripsifoto" value="<?=$data['deskripsifoto']?>"></td>
            </tr>
            <tr>
                <td>Lokasi file</td>
                <td><input type="file" name="lokasifile"></td>
            </tr>
            <tr>
                <td>Album</td>
                <td>
                    <select name="albumid">
                        <?php 
                        include "koneksi.php";
                        $userid=$_SESSION['userid'];
                        $sql2=mysqli_query($conn, "SELECT * FROM album WHERE userid='$userid'");
                        while($data2=mysqli_fetch_array($sql2)){
                         ?>
                         <option value="<?$data2['albumid']?>"<?php if($data2['albumid']){echo'selected';}?>><?=$data2['namaalbum']?></option>
                         <?php
                     }
                          ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="edit" class="btn btn-success"></td>
            </tr>
        </table>
        <?php
        }
        ?>
    </form>
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