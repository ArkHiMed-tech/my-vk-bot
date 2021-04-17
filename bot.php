<?php
  $confirm_token = 94dfe8b8;
  $data = json_decode(file_get_contents('php://input'));
switch ($data->type) {  
	case 'confirmation': 
		echo $confirm_token; 
	break;  
?>
