<html>
<head>
	<title>Pengolaan Pasien</title>
</head>
<body>
	<h2>Pengelolaan Data Pasien</h2>
	<br/>
	<a href="list_berobat.php">View List</a>
	<br/>
	<br/>
	<h3>Edit Data</h3>
	<?php
	include 'koneksi.php';
	  $notrans = $_GET['notrans'];
	  $sql = "Select * from berobat where no_transaksi='$notrans'";
  	  $data = mysqli_query($conn,$sql);
	  while ($r = mysqli_fetch_array($data)) {
	    $tgl = explode("-",$r["tanggal_berobat"]);
		$bl = intval($tgl[1]);
		$tg = intval($tgl[2]);

	?>
	<form method="post" action="update.php">
		<table>
			<tr>
				<td>No Transaksi </td>
				<td><input type="text" name="notrans" value=<?=$notrans?> ></td>
			</tr>
			<tr>
				<td>Nama Pasien</td>
				<td>
					<select name="nmpasien">
  					  <?php
								$data = mysqli_query($conn,"select * from pasien");
								while($d = mysqli_fetch_array($data)){
									if ($r['pasienklinik_id']==$d['pasienklinik_id'])
   										echo "<option value=" . $d['pasienklinik_id'] ." selected='selected'>" . $d[nama_pasienklinik]. "</option>";
									else
										echo "<option value=" . $d['pasienklinik_id'] .">" . $d[nama_pasienklinik]. "</option>";
								}
							 ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Tangal</td>
				<td>
						<select name="tgl">
							<?php
							 for ($x=1;$x<=31;$x++){
							    if($x==$tg)
								    echo "<option value=$x selected='selected'> $x </option>";
									else
									echo "<option value=$x> $x </option>";
							  }
							 ?>
						</select>
						Bulan
						<select name="bln">
							<?php
							 for ($x=1;$x<=12;$x++){
								if($x==$bl) 
								 echo "<option value=$x selected='selected'> $x </option>";
								 else
								 echo "<option value=$x> $x </option>";
							  }
							 ?>
						</select>
						<label for="thn">Tahun</label>
        <input type="number" maxlength="4" min="2000" max="2019" id="thn" size="10" name="thn"  value="<?= $th; ?>" required/>       
      </td>
				</td>
			</tr>
			<tr>
				<td>Nama Dokter</td>
				<td>
					<select name="nmdokter">
  					  <?php
								$data = mysqli_query($conn,"select * from dokter");
								while($d = mysqli_fetch_array($data)){
									if ($r['dokter_id']==$d['dokter_id'])
   										echo "<option value=" . $d['dokter_id'] ." selected='selected'>" . $d[nama_dokter]. "</option>";
									else
										echo "<option value=" . $d['dokter_id'] .">" . $d[nama_dokter]. "</option>";
								}
							 ?>
					</select>
				</td>
			</tr>
			<tr>
				<tr>
					<td>Keluhan</td>
					<td><input type="text" name="keluhan" value="<?=$r ['keluhan_pasien']?>"></td>
				</tr>
				<tr>
					<tr>
						<td>Biaya Administrasi</td>
						<td><input type="number" name="biayaadm" value="<?=$r ['biaya_admin']?>"></td>
					</tr>
					<tr>

				<td></td>
				 <td><input type="submit" value="Simpan" /><input type="reset" value="Ulang" />
				 </td>
			</tr>
		</table>
	<?php
	  };
	?>
	</form>
	
	
</body>
</html>
