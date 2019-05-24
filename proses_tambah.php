<?php

include "koneksi.php";

$hari = $_POST['hari'];
$tanggal = $_POST['tanggal'];
$sesi = $_POST['sesi'];
$materi = $_POST['materi'];

$query = "INSERT INTO jadwalharian(hari,tanggal,sesi,materi) VALUES('$hari','$tanggal','$sesi','$materi')";
$sql = mysqli_query($koneksi,$query);

if($sql){
    header("location:main.php");
}else{
    echo"Gagal. Coba kembali.";
}


?>