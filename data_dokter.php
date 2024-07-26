<?php
	include "koneksi.php";
	$sql 	= "SELECT*FROM dokter";
	$result	= $conn->query($sql);
	
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Data Dokter</title>
</head>

<body>
<h2 align="center">Data Dokter</h2>
<table border="1" width="82%" cellpadding="5" align="center">
	<tr>
	<td colspan="10"><input type="button" value="Menu" onclick="location='menu.php'" />
    </tr>
	  <tr bgcolor="#00ff00">
	    <th width="91" scope="col">Dokter ID</th>
	    <th width="100" scope="col">Nama Dokter</th>
	    <th width="106" scope="col">Poli ID</th>
  </tr>
  
  <?php
  	while ($row = $result->fetch_assoc()){
  ?>
	<tr>
	    <td align="center">
			<?= $row["dokter_id"]; ?>
       	</td>
	    <td align="center">
			<?= $row["nama_dokter"]; ?>
       	</td>
	    <td>
			<?= $row["poli_id"]; ?>
       	</td>
	   
  	</tr>
  	<?php
		};
	?>
</table>
</body>
</html>