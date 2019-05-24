<!DOCTYPE html>
<html>
<head>
	<title>Jadwal Bootcamp Array</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="fluid-container">
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow bg-primary">
    <div class="container">
    <a class="navbar-brand" href="index.html"><img class="m-0" src="img/logo-white.png" width="150px"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
        aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
		<li class="nav-item mx-1 active">
		<button class="btn btn-sm btn-outline-light my-2" data-toggle="modal" data-target="#myModal">Tambah jadwal</button>
    </li>
    <li class="nav-item mx-1 active">
		<a href="index.html"><button class="btn btn-sm btn-outline-light my-2">Keluar</button></a>
    </li>
    </ul>
    </div>
    </div>
    </nav>
</div>

<div class="container pt-5">
<center>
<h2 class="mb-4"> Jadwal saat ini</h2>
<?php
include 'koneksi.php';
$q=mysqli_query($koneksi,"select * from jadwalharian");
while($r=mysqli_fetch_assoc($q)){
	$jadwal[$r['hari']][$r['sesi']] = $r['materi'];
	$jadwal[$r['hari']]['tanggal'] = date("d-m-Y",strtotime($r['tanggal']))	;
	$array_id[$r['hari'].'_'.$r['sesi']] = $r['id'];
}

$i=0;
$today = date('d-m-Y');
foreach ($jadwal as $hari => $v) {
	if ($v['tanggal']==$today) {
		$kapan = 'sekarang';
	}else{
		$kapan = 'lainhari';
	}
	echo "<div class=jadwal><table border=1 class=".$kapan.">";
	echo "<tr><th colspan=3 >".$hari." <br><span class=tgl>".$v['tanggal']."</span> </th></tr>";
	foreach ($v as $sesi => $kelas)
	{
		$i++;
		$arr[$kelas][]=$i;
		if ($kelas=='kosong') 
		{
			$ketersediaan = 'ready';
		}else{
			$ketersediaan = 'full';
		}
		if ($sesi != 'tanggal') 
		{
		echo "<tr>
			<td>".$sesi."</td>
			<td><span class=".$ketersediaan.">".$kelas." ";
		if ($kelas != 'kosong') 
		{
			echo "(".count($arr[$kelas]).")";
		}
		echo "</span></td><td><a class=hapus href=hapus.php?id=".$array_id[$hari.'_'.$sesi].">x</a></td></tr>";
		}
	}
		echo"</tr></table></div>";
}
		// echo count($arr['android']);

		/* mengakses array $VAR[key][value]
		   kurung kotak pertama untuk mengakses key pertama, 
		   kurung kotak kedua untuk mengakses value dari key
		   contoh di bawah :
		$tes=array('kucing','anjing','meong','kelinci');
		echo $tes[3];
		echo "<pre>".print_r($arr,1)."</pre>";
		*/

?>

<!-- Add Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambah Jadwal</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form method="post" action="proses_tambah.php" enctype="multipart/form-data">
        <div class="row">
          <div class="col">
            <div class="form-group">
            <label>Hari</label>
            <input type="text" name="hari" class="form-control">
            </div>
          </div>
          <div class="col">
            <div class="form-group">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control">
            </div>
          </div>
          </div>
          <div class="row">
          <div class="col">
            <div class="form-group">
            <label>Sesi</label>
            <select class="form-control" name="sesi">
            <option value="pagi" >Pagi</option>
            <option value="siang" >Siang</option>
            <option value="malam" >Malam</option>
            </select>
            </div>
          </div>
        <div class="col">
            <div class="form-group">
            <label>Materi</label>
            <input type="text" name="materi" class="form-control">
            </div>
        </div>
        </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <input class="btn btn-primary" type="submit" name="simpan" value="Simpan">
      </div>
      </form>
    </div>
  </div>
</div>
<!-- End Modal -->

</center>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>