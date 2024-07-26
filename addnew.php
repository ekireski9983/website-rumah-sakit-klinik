<?php
	include "koneksi.php";
	$sql1 = "SELECT*FROM pasien";
	$result1 = $conn->query($sql1);
	
	$sql2 = "SELECT*FROM dokter";
	$result2 = $conn->query($sql2);
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tambah Data Berobat</title>
</head>

<body>
<form method="post" action="save.php">
  <table width="80%" border="0" cellpadding="5">
    <tr>
      <th width="31%" scope="row"><div align="left">Nomor Transaksi</div></th>
      <td width="69%"><label for="notrans"></label>
      <input type="text" name="notrans" id="notrans" required="required" /></td>
    </tr>
    <tr>
      <th scope="row">
      <div align="left">
      	<label for="nmpasien">Nama Pasien</label>
      </div>
      </th>
      <td>
      <select name="nmpasien">
      	<?php 
			while($row1=$result1->fetch_assoc())
			{
				echo "<option value=".$row1["pasienklinik_id"].">".$row1["nama_pasienklinik"]."</option>";	
			}
  		?>
      </select>
      </td>
    </tr>
    <tr>
      <th scope="row">
      <div align="left">
      <label for="tgl">Tanggal Berobat</label>
      </div>
      </th>
      <td>
      	<select name="tgl">
        	<?php for ($t=1;$t<=31;$t++)
			{
				echo "<option value=$t>$t</option>";
			}
			?>
        </select>
        <label for="bln">Bulan</label>
        <select name="bln" id="bln">
        	<?php 
			$nmbulan = array ("--Pilih Bulan--","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
			for($b=0;$b<=12;$b++)
			{
				echo"<option value=$b>$nmbulan[$b]</option>";
			}
			?>
        </select>
		<label for="thn">Tahun</label>
        <input type="number" maxlength="4" min="2000" id="thn" size="10" name="thn" required/>       
      </td>
    </tr>
    <tr>
      <th scope="row">
      <div align="left">
      <label for="nmdokter">Nama Dokter</label>
      </div>
      </th>
      <td>
      <select name="nmdokter">
      	<?php 
			while($row2=$result2->fetch_assoc())
			{
				echo "<option value=".$row2["dokter_id"].">".$row2["nama_dokter"]."</option>";	
			}
  		?>
      </select>
      </td>
    </tr>
    <tr>
      <th scope="row"><div align="left">Keluhan</div></th>
      <td>
      <label for="keluhan"></label>
      <input type="text" name="keluhan" id="keluhan" required /></td>
    </tr>
    <tr>
      <th scope="row"><div align="left">Biaya Administrasi</div></th>
      <td><label for="biayaadm"></label>
      <input type="number" name="biayaadm" id="biayaadm" required /></td>
    </tr>
    <tr>
    	<td>&nbsp;</td>
        <td><input type="submit" value="Submit" /><input type="reset" value="Clear" />

        </td>
    </tr>
  </table>

</form>
</body>
</html>