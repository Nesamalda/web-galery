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
    <title>Document</title>
</head>
<body>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Album</title>
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
  
  <div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card mt-2">
                <div class="card-header">Tambah Data</div>
                <div class="card-body">

                <form action="tambah-album.php" method="post">
        <table>
            <tr>
                <td>Nama Album</td>
                <td><input type="text" name="namaalbum"></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><input type="text" name="deskripsi"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="tambah" class="btn btn-success"></td>
            </tr>
        </table>
    </form>
            
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card mt-2">
                <div class="card-header">Data Album</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                             <th>ID</th>
                             <th>Nama</th>
                             <th>Deskripsi</th>
                             <th>Tanggal Di Buat</th>
                             <th>Aksi</th>
                        </tr>
                        </thead>
                            <tbody>
                                <tr>
                                <?php
        include 'koneksi.php';
        $userid=$_SESSION['userid'];
        $sql=mysqli_query($conn, "SELECT * FROM album WHERE userid='$userid'");
        while($data=mysqli_fetch_array($sql)){
            ?>
            <tr>
            <td><?=$data['albumid']?></td>
            <td><?=$data['namaalbum']?></td>
            <td><?=$data['deskripsi']?></td>
            <td><?=$data['tanggaldibuat']?></td>
            <td>
                <a href="hapus-album.php?albumid=<?=$data['albumid']?>" class="btn btn-danger">Hapus</a>
                <a href="edit-album.php?albumid=<?=$data['albumid']?>" class="btn btn-primary">Edit</a>
            </td>
        </tr>
        <?php
        }
        ?>
                                </tr>
                            </tbody>
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