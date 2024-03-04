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
    <title>edit_album</title>
</head>
<body>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Album</title>
    <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">
</head>
<body>

<<nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <div class="container">
      <a class="navbar-brand" href="home.php"><b><i style="color: red;">Galery</i></b> Foto</a>
      <marquee class="fs-5"><div><b><i style="color: darkblue;">Selamat Datang <?=$_SESSION['namalengkap']?></i></b></div></marquee>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav me-auto">
</div>
          <a href="album.php" class="btn btn-outline-dark m-1 bg-danger">Kembali</a>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="row">
        <div class="col-md-50">
            <div class="card mt-4">
                <div class="card-header">Tambah Data</div>
                <div class="card-body">
    <form action="update-album.php" method="post">
        <?php
        include "koneksi.php";
        $albumid=$_GET['albumid'];
        $sql=mysqli_query($conn,"SELECT * FROM album WHERE albumid='$albumid'");
        while($data=mysqli_fetch_array($sql)){
        ?>
        <input type="text" name="albumid" value="<?=$data['albumid']?>"hidden>
        <table>
            <tr>
                <td>Nama Album</td>
                <td><input type="text" name="namaalbum" value="<?=$data['namaalbum']?>"></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><input type="text" name="deskripsi" value="<?=$data['deskripsi']?>"></td>
            </tr>
            <tr>
                <td><input type="submit" value="edit"></td>
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