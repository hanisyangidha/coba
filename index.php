<?php
define('BOT_TOKEN','585691080:AAEmTxrSye2KZNW4ohSewbbM4DFIaGwdKpw');
define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');
$content = file_get_contents("php://input");
$update = json_decode($content, true);
$chatID = $update["message"]["chat"]["id"];
$state=file_get_contents('https://hunhani.000webhostapp.com/getState.php?uid='.$chatID);
$state=json_decode($state);
$messageFromUser = $update["message"]["text"];
$output="";
if ($messageFromUser=="/start") {
	$output = urlencode("Pilih Fitur\n/check");
}
else if ($messageFromUser=="/check") {
	$output = urlencode("masukkan MYIR atau kode registrasi pelanggan");
	setState($chatID,2);
}
else{
	if ($state->state==2) {
		$fromdb = file_get_contents('https://hunhani.000webhostapp.com/readone.php?myir='.$messageFromUser);
		$efromdb= json_decode($fromdb);
		$output = urlencode(
			"myir : ".$efromdb->MYIR."\n".
			"nomer sc : ".$efromdb->No_SC."\n".
			"nomer internet : ".$efromdb->No_Internet."\n".
			"nama pelanggan : ".$efromdb->Nama_Pelanggan."\n".
			"alamat instalasi : ".$efromdb->Alamat_Instalasi."\n".
			"tipe permintaan : ".$efromdb->Type_Permintaan."\n".
			"kcontact : ".$efromdb->Kcontact."\n".
			"tanggal input : ".$efromdb->Tanggal_Input."\n".
			"status permintaan : ".$efromdb->Status_permintaan."\n".
			"nama teknisi : ".$efromdb->Teknisi."\n".
			"keterangan : ".$efromdb->Keterangan_Teknisi."\n".
			"tindak lanjut : ".$efromdb->Tindak_Lanjut

		);
		setState($chatID,1);
	}else{
		$output="Perintah Tidak diketahui";
	}
}
$reply = $output;
$sendto =API_URL."sendmessage?chat_id=".$chatID."&text=".$reply;
file_get_contents($sendto);
// checkJSON($chatID,$update);

// function checkJSON($chatID,$update){
// 	$myFile = "log.txt";
// 	$updateArray = print_r($update,TRUE);
// 	$fh = fopen($myFile, 'a') or die("can't open file");
// 	fwrite($fh, $chatID ."\n\n");
// 	fwrite($fh, $updateArray."\n\n");
// 	fclose($fh);
// }
function setState($x,$y){
	file_get_contents('https://hunhani.000webhostapp.com/setState.php?uid='.$x."&state=".$y);
}
