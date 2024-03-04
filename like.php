<?php
include "koneksi.php";
session_start();

if (!isset($_SESSION['userid'])) {
    //untuk bisa like harus login terlebih dahulu
    header("location:index.php");
} else {
    $fotoid=$_GET['fotoid'];
    $userid=$_SESSION['userid'];
    //cek apa user pernah like foto ini apa belum

    $sql=mysqli_query($conn, "SELECT * from likefoto where fotoid='$fotoid' and userid='$userid'");

    if (mysqli_num_rows($sql)==1) {
        //user sudah pernah like foto ini
        header("location:home.php");
    } else {
        $tanggallike=date("y-m-d");
        mysqli_query($conn,"INSERT into likefoto values('','$fotoid','$userid','$tanggallike')");
        header("location:home.php");
    }
}
?>