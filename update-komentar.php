<?php
include "koneksi.php";
session_start();

$isikomentar=$_POST['isikomentar'];
$userid=$_POST['userid'];
$komentarid=$_POST['komentarid'];


$sql=mysqli_query($conn,"UPDATE komentarfoto set isikomentar='$isikomentar' where komentarid='$komentarid'");

header("location:komentar.php?fotoid=11");
?>