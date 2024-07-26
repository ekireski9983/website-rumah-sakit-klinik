<?php
	include "koneksi.php";
	$sql 	= "SELECT*FROM pasien";
	$result	= $conn->query($sql);
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Data Pasien</title>
</head>

<body>
<h2 align="center">Data Pasien</h2>
<table border="1" width="82%" cellpadding="5" align="center">
	<tr>
	<td colspan="10"><input type="button" value="AddNew" onclick="location='addnew.php'" />
	<colspan="10"><input type="button" value="Menu" onclick="location='menu.php'" /></td>
    </tr>
	  <tr bgcolor="##00FFFF">
	    <th width="91" scope="col">Pasien ID</th>
	    <th width="106" scope="col">Nama Pasien</th>
	    <th width="44" scope="col">Tanggal Lahir</th>
	    <th width="118" scope="col">Jenis Kelamin</th>
		<th width="118" scope="col">Alamat</th>
		<th width="99" scope="col">Action</th>
  </tr>
  
  <?php
  	while ($row = $result->fetch_assoc()){
  ?>
	<tr>
	    <td align="center">
			<?= $row["pasienklinik_id"]; ?>
       	</td>
	    <td align="center">
			<?= $row["nama_pasienklinik"]; ?>
       	</td>
	    <td>
			<?= $row["tanggal_lahirpasien"]; ?>
       	</td>
	    <td align="center">
			<?= $row["jenis_kelaminpsien"]; ?>
     	</td>
	    <td align="center">
			<?= $row["alamat_pasien"]; ?>
	    <td align="center">
        	<a href="editpasien.php?notrans=<?= $row["no_transaksi"] ?>">Edit</a>
        		| 
        	  <a href="deletepasien.php?x=<?= $row["no_transaksi"] ?>" onclick="return confirm('Data Anda akan dihapus klik ok untuk melanjutkan')">Del</a></h3>
        </td>
  	</tr>
  	<?php
		};
	?>
</table>
</body>
</html>