<?php
include_once("../../finishit.php");
xstart("0");
if(isset($_POST['pid']) && !empty($_POST['pid']) && isset($_SESSION["IQGAMES_ID_2018_VISION"])){
$id = xp("pid");
$amt = xp("amount");
$user = xpmail("email");
$userid = xp("uid");
$namex = xp("name");
$currentadmin = $_SESSION["IQGAMES_MATRIC_2018_VISION"];
$reason = x_post("reason");

$create = x_dbtab("denied_withdrawal","
amount DOUBLE NOT NULL,
balance_before_reversing DOUBLE NOT NULL,
user_id VARCHAR(100) NOT NULL,
reason TEXT NOT NULL,
timer VARCHAR(100) NOT NULL,
doneby VARCHAR(200) NOT NULL
","MYISAM");
if(!$create){
	echo "Failed to create table!";
	exit();
}


if(x_count("withdrawalbase","id='$id' AND status='pending' LIMIT 1") > 0){

//insert notification data started

$rtimen = x_curtime("0","1");$stimen = x_curtime("0","0");$refamt = number_format($amt,2);



	// Getting user wallet Balance

	if(x_count("userdb_bank","id='$userid' LIMIT 1") > 0){
		foreach(x_select("wallet_balance","userdb_bank","id='$userid'","1","id") as $key){
			$wb = $key["wallet_balance"];
		}
		$newbal = $wb + $amt;
		
		x_update("userdb_bank","id='$userid'","wallet_balance='$newbal'","","Failed");
		
		// Creating denied withdrawal records
		
		x_insert("amount,balance_before_reversing,user_id,reason,timer,doneby","denied_withdrawal","'$amt','$wb','$userid','$reason','$rtimen','$currentadmin'","&nbsp;","Failed to keep record");
		
		// Delete the withdrawal
		
		x_del("withdrawalbase","id='$id' AND status='pending'","&nbsp;","Failed to delete withdrawal");
		
		//sending notifications
		if($reason == ""){
			x_insert("type,title,user_id,message,status,rtime,stime","notifyme","'p','YOUR WITHDRAWAL OF <b>NGN $refamt</b> WAS DECLINED.','$userid','<p>Hi <b>$namex</b>,</p>Your withdrawal request of <b>NGN $refamt</b> was declined and the money has been reversed back to your wallet.Kindly contact us to resolve this problem. Thank you.<br/><br/><b>ABOCENT TEAM</b> ','0','$rtimen','$stimen'","&nbsp;","Failed to send notification");
		}else{
			x_insert("type,title,user_id,message,status,rtime,stime","notifyme","'p','YOUR WITHDRAWAL OF <b>NGN $refamt</b> WAS DECLINED.','$userid','<p>Hi <b>$namex</b>,</p>Your withdrawal request of <b>NGN $refamt</b> was declined and the money has been reversed back to your wallet.Kindly contact us to resolve this problem.<h4>Reason:</h4><p>$reason</p> Thank you.<br/><br/><b>ABOCENT TEAM</b> ','0','$rtimen','$stimen'","&nbsp;","Failed to send notification");
		}
		
		
		x_print("Declined <i class='fa fa-minus-circle'></i>");
	}else{
		echo "Invalid user";
		exit();
	}

//notification ended

//x_update("withdrawalbase","id='$id' AND status='pending'","status='approved'","","Failed");

}else{
x_print("invalid data");
}

}else{
  x_print("invalid parameter");
}
?>
