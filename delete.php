<?php
	include "koneksi.php";
	
	$notrans = $_GET["x"];
	
	$sql = "DELETE FROM berobat WHERE no_transaksi='$notrans'";
	
	$conn->query($sql);
	
	header("location:list_berobat.php");
	
?>