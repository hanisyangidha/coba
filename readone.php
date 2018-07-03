<?php
	require 'connection.php';
	//$sql = "SELECT * FROM helpdesk,teknisi where";
	$kondisi = (isset($_GET['myir'])) ? "where MYIR=".$_GET['myir'] : ""; 
	$sql="	SELECT MYIR,No_SC,No_Internet,Nama_Pelanggan,Alamat_Instalasi,Type_Permintaan,Kcontact,Tanggal_Input
			FROM `helpdesk`
	";
	$query = mysqli_query($conn, $sql.$kondisi);
	if (!$query){
		die  ('SQL Errror : '. mysqli_error ($conn));
	}
	//$response ["Data"] = array ();
	while ($row = mysqli_fetch_array($query)) {
		$data =array ();
		$data["MYIR"] = $row ["MYIR"];
		$data["No_SC"] = $row ["No_SC"];
		$data["No_Internet"] = $row ["No_Internet"];
		$data["Nama_Pelanggan"] = $row ["Nama_Pelanggan"];
		$data["Alamat_Instalasi"] = $row ["Alamat_Instalasi"];
		$data["Type_Permintaan"] = $row ["Type_Permintaan"];
		$data["Kcontact"] = $row ["Kcontact"];
		$data["Tanggal_Input"] = $row ["Tanggal_Input"];
		// $data["Status_permintaan"] = $row ["Status_permintaan"];
		// $data["Teknisi"] = $row ["Teknisi"];
		// $data["Keterangan_Teknisi"] = $row ["Keterangan_Teknisi"];
		// $data["Tindak_Lanjut"] = $row ["Tindak_Lanjut"];
		echo json_encode($data);
	}

?>