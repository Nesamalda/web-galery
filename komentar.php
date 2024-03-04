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
    <title>komentar</title>
    <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">
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
          <a href="home.php" class="btn btn-outline-dark m-1 bg-danger">Kembali</a>
      </div>
    </div>
  </nav>

    <form action="tambah-komentar.php" method="post">
    <?php
        include "koneksi.php";
        $fotoid=$_GET['fotoid'];
        $sql=mysqli_query($conn,"SELECT * FROM foto WHERE fotoid='$fotoid'");
        while($data=mysqli_fetch_array($sql)){
        ?>
        <input type="text" name="fotoid" value="<?=$data['fotoid']?>"hidden>
        <table>
            <tr>
                <td>Judul</td>
                <td><input type="text" name="Judulfoto" value="<?=$data['judulfoto']?>"></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><input type="text" name="deskripsi" value="<?=$data['deskripsi']?>"></td>
            </tr>
            <tr>
                <td>foto</td>
                <td><img src="gambar/<?=$data['lokasifile']?>" width="200px"></td>
            </tr>
            <tr>
                <td>komentar</td>
                <td><input type="text" name="isikomentar"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Tambah"></td>
            </tr>
        </table>
        <?php
        }
        ?>
    </form>

    <table width="100%" border="1" cellpadding="5" cellspacing="0">
        <tr>
            <td>ID</td>
            <td>Nama</td>
            <td>Komentar</td>
            <td>tanggal</td>
            <td>Aksi</td>
        </tr>
        <?php
        include "koneksi.php";
        $userid=$_SESSION['userid'];
        $sql=mysqli_query($conn, "SELECT * FROM komentarfoto,user WHERE komentarfoto.userid=user.userid");
        while($data=mysqli_fetch_array($sql)){
            ?>
            <tr>
                <td><?=$data['komentarid']?></td>
                <td><?=$data['namalengkap']?></td>
                <td><?=$data['isikomentar']?></td>
                <td><?=$data['tanggalkomentar']?></td>
                <td>
                <a href="hapus-komentar.php?komentarid=<?=$data['komentarid']?>" class="btn btn-danger">Hapus</a>
                <a href="edit-komentar.php?komentarid=<?=$data['komentarid']?>" class="btn btn-primary">Edit</a>

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