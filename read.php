<?php
	require 'connection.php';
	
		
			$sql = "SELECT * FROM helpdesk,teknisi WHERE MYIR = MYIR";
			$query = mysqli_query($conn, $sql);
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
				$data["Status_permintaan"] = $row ["Status_permintaan"];
				$data["Teknisi"] = $row ["Teknisi"];
				$data["Keterangan_Teknisi"] = $row ["Keterangan_Teknisi"];
				$data["Tindak_Lanjut"] = $row ["Tindak_Lanjut"];
				echo json_encode($data);	
				//array_push ($response["Data"], $data);
			}
			//echo json_encode($response);
?>