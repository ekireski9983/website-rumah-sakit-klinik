<?php
	$srvr 	= "localhost";
	$un		= "root";
	$pw		= "";
	$db		= "ujikom_rezkyjayadisaputra";
	
	$conn = new mysqli ($srvr,$un,$pw,$db);
	
	if ($conn->connect_error)
	{
		die("Gagal Koneksi:".$conn->connect_error);
	}
?>