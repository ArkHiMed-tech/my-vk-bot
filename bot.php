<?php
$confirmation_token = '258487ca';
function vk_msg_send($peer_id,$text){
	$request_params = array(
		'message' => $text, 
		'peer_id' => $peer_id, 
		'access_token' => "TOKEN",
		'v' => '5.87' 
	);
	$get_params = http_build_query($request_params); 
	file_get_contents('https://api.vk.com/method/messages.send?'. $get_params);
}
$data = json_decode(file_get_contents('php://input'));
switch ($data->type) {  
	case 'confirmation': 
		echo '94dfe8b8'; 
	break;  
		
	case 'message_new': 
		$message_text = $data -> object -> text;
		$chat_id = $data -> object -> peer_id;
		if ($message_text == "привет"){
			vk_msg_send($chat_id, "Привет, я бот, который говорит две фразы.");
		}
		if ($message_text == "пока"){
			vk_msg_send($chat_id, "Пока. Если захочешь с кем-то поговорить, то у тебя есть бот, который говорит две фразы.");
		}
		echo 'ok';
	break;
}
?>
