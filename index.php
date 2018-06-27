<?php
define('BOT_TOKEN','585691080:AAEmTxrSye2KZNW4ohSewbbM4DFIaGwdKpw');
define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');
// read incoming info and grab the chatID
$content = file_get_contents("php://input");
$update = json_decode($content, true);
$chatID = $update["message"]["chat"]["id"];
//messageFromUser
$messageFromUser = $update["message"]["text"];
$output="";
if ($messageFromUser=="/start") {
	$output = urlencode("Pilih Fitur\n /check");
}if ($messageFromUser=="/check") {
	$fromdb = file_get_contents('https://hunhani.000webhostapp.com/read.php');
	$efromdb= json_decode($fromdb);

	$output = $efromdb['Data'][0]['Status_permintaan'];
}else{
	$output="Perintah Tidak diketahui";
}
$reply = $output;
// compose reply
//cek json
//checkJSON($chatID,$update);
// send reply
$sendto =API_URL."sendmessage?chat_id=".$chatID."&text=".$reply;
file_get_contents($sendto);
// function checkJSON($chatID,$update){
// 	$myFile = "log.txt";
// 	$updateArray = print_r($update,TRUE);
// 	$fh = fopen($myFile, 'a') or die("can't open file");
// 	fwrite($fh, $chatID ."\n\n");
// 	fwrite($fh, $updateArray."\n\n");
// 	fclose($fh);
// }
function sendMessage(){
	$message = "I am a baby bot.";
	return $message;
}
