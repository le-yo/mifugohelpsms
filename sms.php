<?php
//set the header to JSON
header('content-type: application/json; charset=utf-8');

//include('conn.php');
//lets get the number from which the SMS is coming from
$number = $_REQUEST['from'];

//the message
$message = $_REQUEST['message'];

if ($_REQUEST['message'] = 'mifugo') {
	//go the database messages_out table and select all that have not been sent
	//create a json that has message and recepient
	//call the json_encodize($reply, $no);
	//done
	$reply = "this is a message that originated from the server";
	$no = "+254727367704";
	json_encodize($reply, $no);
	exit();
	
}

// //We get the person gets a menu back
// $reply = "Welcome to Paul's KPLC transfer: Reply with".PHP_EOL."1. To transfer Token".PHP_EOL."2.To check your balance";
	// json_encodize($reply, $from_number);
	// exit();
//exit;
//if the message is hello reply hi, how are you?
if(strtolower($message)=='kawangware'){ 
	$reply = "Kawangware: John Kamau - Anthrax-0719286780";
	   
	json_encodize($reply, $number); 
	exit(); 
}elseif(strtolower($message)=='nakuru'){
	$reply = "John Kiptoo - Mastitis";
	json_encodize($reply, $number);
	exit();
	
	}elseif(strtolower($message)=='nyeri'){
	$reply = "Juma charo - menengitis-0726464723";
	json_encodize($reply, $number);
	exit();

}
elseif(strtolower($message)=='rurii'){
	$reply = " gachathi - all round vet-0726464723
	kamau-tonsils-0710985648
	";
	json_encodize($reply, $number);
	exit();

}
else{
	$reply = "No doctor in the area yet, thanks for using Mifugo Help";
	json_encodize($reply, $number); 
}


 function json_encodize($msg,$number){
			  		//lets add the variables to the records array
			  		if(is_array($msg)){
			  			$records[0]= array( 'message' => $msg[0], 'to' => $number[0]);
						$records[1]= array( 'message' => $msg[1], 'to' => $number[1]);
			  		}else{	  	
			  	$records[]= array( 'message' => $msg, 'to' => $number);
					}	
			  	$sms_array= array();
				$sms_array[] = array('success'=>"true",'secret'=>"",'task'=>"send",'messages'=>$records);
				$payload= array('payload'=>$sms_array[0]);
				header('content-type: application/json; charset=utf-8');
				echo json_encode($payload);
				//mysql_close($connect);
								
			  }
 
 
?>