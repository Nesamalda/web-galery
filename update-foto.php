<?php
include "koneksi.php";
session_start();

$judulfoto = $_POST['judulfoto'];
$deskripsifoto = $_POST['deskripsifoto'];
$fotoid = $_POST['fotoid'];

//upload gambar baru
if ($filename = $_FILES['lokasifile']['name'] != " "){
    $rand = rand();
    $ekstensi = array("png", "jpg", "jpeg", "gif", "mp4");
    $filename = $_FILES['lokasifile']['name'];
    $ukuran = $_FILES['lokasifile']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if(!in_array($ext, $ekstensi)) {
        header("location:foto.php");
    } else{
        if($ukuran < 1044070) {
            $lokasifile = $rand . '_' . $filename;
            move_uploaded_file($_FILES['lokasifile']['tmp_name'], 'gambar/' . $rand . '_' . $filename);
            mysqli_query($conn, "UPDATE foto set judulfoto='$judulfoto', deskripsifoto='$deskripsifoto', lokasifile='$lokasifile', fotoid='$fotoid'");
            header("location:foto.php");
        } else {
            header("location:foto.php");
        }
    }
} else {
    mysqli_query($conn, "UPDATE foto set judulfoto='$judulfoto',deskripsifoto='$deskripsifoto' where fotoid='$fotoid'");
    header("location:foto.php");
}
?>