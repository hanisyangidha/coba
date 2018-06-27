<?php
	require 'connection.php';
	
		
			$sql = "SELECT * FROM teknisi";
			$query = mysqli_query($conn, $sql);
			if (!$query){
				die  ('SQL Errror : '. mysqli_error ($conn));
			}
			//$response ["Data"] = array ();
			while ($row = mysqli_fetch_array($query)) {
				$data =array ();
				$data["Status_permintaan"] = $row ["Status_permintaan"];
				$data["Teknisi"] = $row ["Teknisi"];
				$data["Keterangan_Teknisi"] = $row ["Keterangan_Teknisi"];
				$data["Tindak_Lanjut"] = $row ["Tindak_Lanjut"];
				echo json_encode($data);	
				//array_push ($response["Data"], $data);
			}
			//echo json_encode($response);
?>