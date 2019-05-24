<?php

include 'koneksi.php';

$hari = $_POST['hari'];
$tgl = $_POST['tanggal'];
$sesi = $_POST['sesi'];
$murid = $_POST['murid'];

//$tanggal = date('Y-m-d');

$query = mysqli_query($koneksi,"insert into jadwalharian values('','$hari','$tgl','$sesi','$murid')");

if ($query) {
	echo "input berhasil";
}else{
	echo "gagal input";
}


?>