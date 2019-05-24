<?php

include 'koneksi.php';

$id = $_GET['id'];

$hapus = mysqli_query($koneksi,"delete from jadwalharian where id='$id'");

if ($hapus) {
	echo "berhasil dihapus";
	header("location:main.php");
}else{
	echo "gagal dihapus";
}

?>