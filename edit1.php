<?php
	include "koneksi.php";
	  $sql1 = "SELECT*FROM pasien";
		$result1 = $conn->query($sql1);
	
			$sql2 = "SELECT*FROM dokter";
			  $result2 = $conn->query($sql2);
	
				$notrans 	= $_GET["notrans"];
			  $sql3		= "SELECT*FROM berobat WHERE no_transaksi='$notrans'";
			 $result3	= $conn->query($sql3);
			$row3		= $result3->fetch_assoc();
	
		$tanggal 	= $row3["tanggal_berobat"];
	  $tgl		= explode('-',$tanggal);
	$th			= $tgl[0];
  $bl			= $tgl[1];
$tg			= $tgl[2];
?>


<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Tambah Data Berobat</title>
</head>

<body>
<form method="post" action="update.php">
  <table width="80%" border="0" cellpadding="5">
    <tr>
      <th width="31%" scope="row"><div align="left">Nomor Transaksi</div></th>
      <td width="69%"><label for="notrans"></label>
      <input type="text" name="notrans" id="notrans" required="required" value="<?= $notrans; ?>"/></td>
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
	if($row1["pasienklinik_id"]==$row3["pasienklinik_id"])
		{
	echo "<option value=".$row1["pasienklinik_id"]."selected='selected'>".$row1["nama_pasienklinik"];	
		}
	else
		{
	echo "<option value=".$row1["pasienklinik_id"].">".$row1["nama_pasienklinik"];	
		}
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
		if($t==$tg)
			{
			echo "<option value=$t selected='selected'>$t</option>";
			}
				else
			{
			echo "<option value=$t>$t</option>";
			}
	}
?>
    </select>
        <label for="bln">Bulan</label>
        <select name="bln" id="bln">
        	<?php 
			$nmbulan = array ("--Pilih Bulan--","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
			for($b=0;$b<=12;$b++)
			{
				if($b==$bl)
				{
				echo"<option value=$b selected='selected'>$nmbulan[$b]</option>";
				}
				echo"<option value=$b>$nmbulan[$b]</option>";
			}
			?>
        </select>
		<label for="thn">Tahun</label>
        <input type="number" maxlength="4" min="2000" max="2019" id="thn" size="10" name="thn"  value="<?= $th; ?>" required/>       
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
				if($row2["dokter_id"]==$row3["dokter_id"])
				{
				echo "<option value=". $row2["dokter_id"]. "selected='selected'>". $row2["nama_dokter"]. "</option>";	
				}
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
      <input type="text" name="keluhan" id="keluhan" required value="<?= $row3["keluhan_pasien"]; ?>" /></td>
    </tr>
    <tr>
      <th scope="row"><div align="left">Biaya Administrasi</div></th>
      <td><label for="biayaadm"></label>
      <input type="number" name="biayaadm" id="biayaadm" required value="<?= $row3["biaya_admin"];?>" /></td>
    </tr>
    <tr>
    	<td>&nbsp;</td>
        <td><input type="submit" value="submit" /><input type="reset" value="clear" />
        </td>
    </tr>
  </table>

</form>
</body>
</html>