<?php
	include "koneksi.php";
	
	$notrans 	= $_POST["notrans"];
	$nmpasien   = $_POST["nmpasien"];
	$tg 		 = $_POST["tgl"];
	$bl		 = $_POST["bln"];
	$th		 = $_POST["thn"];
	$tgl		= $th.'-'.$bl.'-'.$tg;
	$nmdokter   = $_POST["nmdokter"];
	$kel		= $_POST["keluhan"];
	$biaya	  = $_POST["biayaadm"];
	
	$query = "UPDATE berobat 
				SET 
				pasienklinik_id='$nmpasien',
				tanggal_berobat='$tgl',
				dokter_id='$nmdokter',
				keluhan_pasien='$kel',
				biaya_admin='$biaya'
				WHERE no_transaksi='$notrans'";
				
	$conn->query($query);
	
	header("location:list_berobat.php")
?>