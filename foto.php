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
    <title>Halaman Foto</title>
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

                <form action="tambah-foto.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Judul</td>
                <td><input type="text" name="judulfoto"></td>
            </tr>
            <tr>
                <td>deskripsi foto</td>
                <td><input type="text" name="deskripsifoto"></td>
            </tr>
            <tr>
                <td>Lokasi File</td>
                <td><input type="file" name="lokasifile"></td>
            </tr>
            <tr>
                <td>Album</td>
                <td>
                    <select name="albumid">
                        <?php 
                        include "koneksi.php";
                        $userid=$_SESSION['userid'];
                        $sql=mysqli_query($conn, "SELECT * FROM album WHERE userid='$userid'");
                        while($data=mysqli_fetch_array($sql)){
                         ?>
                         <option value="<?=$data['albumid']?>"><?=$data['namaalbum']?></option>
                         <?php
                     }
                          ?>
                    </select>
                </td>
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
            <th>Judul</th>
            <th>deskripsi foto</th>
            <th>Tanggal ungah</th>
            <th>Lokasi File</th>
            <th>Album</th>
            <th>Aksi</th>
        </tr>
        <?php
        include "koneksi.php";
        $userid=$_SESSION['userid'];
        $sql=mysqli_query($conn, "SELECT * FROM foto,album WHERE foto.userid='$userid' AND foto.albumid=album.albumid");
        while($data=mysqli_fetch_array($sql)){
            ?>
            <tr>
            <td><?=$data['fotoid']?></td>
            <td><?=$data['judulfoto']?></td>
            <td><?=$data['deskripsifoto']?></td>
            <td><?=$data['tanggalunggah']?></td>
            <td><img src="gambar/<?=$data['lokasifile']?>" width="100px"></td>
            <td><?=$data['namaalbum']?></td>
            <td>
                <a class="btn btn-danger" href="hapus-foto.php?fotoid=<?=$data['fotoid']?>">Hapus</a>
                <a class="btn btn-primary" href="edit-foto.php?fotoid=<?=$data['fotoid']?>">Edit</a>
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
  </div>
    </div>
</div>
<footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom">
   <p>&copy; UKK RPL 2024</p>
</footer>
<script type="text/javascript" src="asset/js/bootstrap.min.js"></script>
</body>
</html>