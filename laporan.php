<?php
	include "koneksi.php";
	$sql 	= "SELECT*FROM vrekammedis";
	$result	= $conn->query($sql);
	
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>laporan Data Berobat</title>
</head>

<body>
<h2 align="center">laporan Data Berobat</h2>
<table border="1" width="82%" cellpadding="5" align="center">
	<tr>
    	<td colspan="10"><input type="button" value="Menu" onclick="location='menu.php'" />
    </tr>
	  <tr bgcolor="#DC143C">
	    <th width="91" scope="col">No Transaksi</th>
	    <th width="106" scope="col">Nama Pasien</th>
		<th width="70" scope="col">Usia</th>
	    <th width="118" scope="col">Jenis Kelamin</th>
	    <th width="78" scope="col">Keluhan</th>
	    <th width="87" scope="col">Nama Poli</th>
	    <th width="68" scope="col">Dokter</th>
	    <th width="138" scope="col">Biaya Administrasi</th>
  </tr>
  
  <?php
  	while ($row = $result->fetch_array()){
  ?>
	<tr>
	    <td align="center">
			<?= $row["no_transaksi"]; ?>
       	</td>
	    <td>
			<?= $row["nama_pasienklinik"]; ?>
       	</td>
		   <td>
			<?= $row["usia"]; ?>
       	</td>
	    <td align="center">
			<?= $row["jenis_kelaminpsien"]; ?>
      	</td>
	    <td align="center">
			<?= $row["keluhan_pasien"]; ?>
       	</td>
	    <td align="center">
			<?= $row["nama_poli"]; ?>
      	</td>
	    <td>
			<?= $row["nama_dokter"]; ?>
       	</td>
	    <td align="center">
			<?= $row["biaya_admin"]; ?>
       	</td>
  	</tr>
  	<?php
		};
	?>
</table>
</body>
</html>