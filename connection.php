<?php
	$servername = "localhost";
	$name = "id6315716_hanisyangidha";
	$password = "namakuhni@98";
	$dbname= "id6315716_coba";
	$conn = mysqli_connect($servername, $name,$password, $dbname);
	if (!$conn) {
		die ('Fail to connect to MySQL :'. mysqli_connect_error ());
	};
?>