<?php
	include "koneksi.php";
	$sql 	= "SELECT*FROM vrekammedis";
	$result	= $conn->query($sql);
	
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Daftar list Berobat</title>
</head>

<body>
<h2 align="center">Daftar list Berobat</h2>
<table border="1" width="82%" cellpadding="5" align="center">
	<tr>
    	<td colspan="10"><input type="button" value="AddNew" onclick="location='addnew.php'" />
		<colspan="10"><input type="button" value="Menu" onclick="location='menu.php'" /></td>
    </tr>
	  <tr bgcolor="#DC143C">
	    <th width="91" scope="col">No Transaksi</th>
	    <th width="100" scope="col">Tanggal</th>
	    <th width="106" scope="col">Nama Pasien</th>
		<th width="70" scope="col">Usia</th>
	    <th width="118" scope="col">Jenis Kelamin</th>
	    <th width="78" scope="col">Keluhan</th>
	    <th width="87" scope="col">Nama Poli</th>
	    <th width="68" scope="col">Dokter</th>
	    <th width="138" scope="col">Biaya Administrasi</th>
	    <th width="99" scope="col">Action</th>
  </tr>
  
  <?php
  	while ($row = $result->fetch_array()){
  ?>
	<tr>
	    <td align="center">
			<?= $row["no_transaksi"]; ?>
       	</td>
	    <td align="center">
			<?= $row["tanggal_berobat"]; ?>
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
	    <td align="center">
        	<a href="edit.php?notrans=<?= $row["no_transaksi"] ?>">Edit</a>
        		| 
        	  <a href="delete.php?x=<?= $row["no_transaksi"] ?>" onclick="return confirm('Data Anda akan dihapus klik ok untuk melanjutkan')">Del</a></h3>
        </td>
  	</tr>
  	<?php
		};
	?>
</table>
</body>
</html>