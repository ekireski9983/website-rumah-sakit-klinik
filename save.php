<?php
	include "koneksi.php";
	
	$notrans 	= $_POST["notrans"];
	$nmpasien	= $_POST["nmpasien"];
	$tg 		= $_POST["tgl"];
	$bl			= $_POST["bln"];
	$th			= $_POST["thn"];
	$tgl		= $th.'-'.$bl.'-'.$tg;
	$nmdokter	= $_POST["nmdokter"];
	$kel		= $_POST["keluhan"];
	$biaya		= $_POST["biayaadm"];
	
	$query = "INSERT INTO berobat VALUES('$notrans','$nmpasien','$tgl','$nmdokter','$kel','$biaya')";
	$conn->query($query);
	
	header("location:list_berobat.php")
?>