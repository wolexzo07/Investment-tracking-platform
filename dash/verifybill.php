<?php
include("validatebase.php");
?>
<div class="row">
<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"></div>
<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 tourbase">

<?php

//get paystack payment secret key

include_once("../finishit.php");
xstart("0");
if(isset($_SESSION["IQGAMES_EMAIL_2018_VISION"])){

	if(x_count("paymentkeys","status='Yes' LIMIT 1") > 0){

	$py = $_GET['reference'];
	require '../Paystack.php';
	foreach(x_select("secretkey,publickey","paymentkeys","status='Yes'","1","id") as $key){
		$sk = $key["secretkey"];
		$pk = $key["publickey"];

		$paystack = new Paystack($sk);
		$trx = $paystack->transaction->verify(
			[
			 'reference'=>$_GET['reference']
			]
		);
		if(!$trx->status){
			exit($trx->message);
		}

		if('success' == $trx->data->status){

			//validation started

		$pid = xg("pid");$ptoken = xg("ptoken");$user = xg("uid");
		$charge = xg("ch");$amt = xg("pamt");$ref = xg("reference");
		$os = xos();$br = xbr();$ip = xip();$time = x_curtime("0","1");
		$tok = sha1($user.$ref);
			if(x_count("userdb_bank","id='$pid' AND token='$ptoken' LIMIT 1") > 0){

				//Getting user wallet details started

				foreach(x_select("play_cash,wallet_balance,name,ref","userdb_bank","id='$pid' AND token='$ptoken'","1","id") as $leg){
					$pc = $leg["wallet_balance"];$namex = $leg["name"];$referme = $leg["ref"];
				}

				$new_amount = $pc + $amt;

				//Getting user wallet details ended

			// avoiding duplicate payments / reuse of payment ID

			if(x_count("transaction","paystack_id='$ref' LIMIT 1") > 0){

			x_print("<p class='hubmsg'>Transaction record already existing!</p>");

			}else{

		//crediting user wallet started

		x_update("userdb_bank","id='$pid'","wallet_balance='$new_amount'","","<p class='hubmsg'>Failed to update balance!</p>");

		//crediting user wallet ended

		//insert notification data started

	$rtimen = x_curtime("0","1");$stimen = x_curtime("0","0");$refamt = number_format($amt,2);
x_insert("type,title,user_id,message,status,rtime,stime","notifyme","'p','<b>NGN $refamt</b> WAS CREDITED TO YOUR WALLET.','$pid','<p>Hi <b>$namex</b>,</p>Your wallet has been credited with the amount (<b>NGN $refamt</b>).You can now start making investment. Thank you.<br/><br/><b>ABOCENT TEAM</b> ','0','$rtimen','$stimen'","&nbsp;","Failed to send notification");

//include_once("paymail.php");

		//insert notification data ended

		//credit referral if this user has any started now.
		$par = "/^[0-9a-zA-Z]([-.\w]*[0-9a-zA-Z_+])*@([0-9a-zA-Z][-\w]*[0-9a-zA-Z]\.)+[a-zA-Z]{2,9}$/";
		//$r = preg_match($par,$referme);
		if(($referme != "") && preg_match($par,$referme)){
			//valid referred users

			if(x_count("userdb_bank","email='$referme' LIMIT 1") > 0){
				
				foreach(x_select("id,wallet_balance,wallet_bonus,name,email,is_verified_agent","userdb_bank","email='$referme'","1","id") as $leg){
					$wabal = $leg["wallet_balance"];$wbonus = $leg["wallet_bonus"];$refname = $leg["name"];$refemail = $leg["email"];
					$is_agent = $leg["is_verified_agent"];
					$refid = $leg["id"];; 
				}
					$agent_percent = 5; // pecentage equivalent
					$refcredit = 20  ;//credit allocated for referring a user
				$bonus_amount = $wbonus + $refcredit; //normal user payment for game
				$agentcredit = (5/100)*$amt;
				$agentpayme = $wabal + ((5/100)*$amt); // agent payment

// verifying all agent payment everytime referral comes to pay STARTED

if($is_agent == "1"){
// see as an agent that get paid per user referred
include_once("agent_credited.php");
}elseif($is_agent == "0"){
	//see as normal user that gets credited to play just only game.
	include_once("normaluser_credited.php");
}else{
//invalid agent|user options
}

// verifying all agent payment everytime referral comes to pay ENDED



			}else{

			}

		}else{
		//invalid referral
		}

		//credit referral if this user has any ended now

	x_insert("type,wallet_credited,balance_after,paystack_id,paystack_charge,owner,currency,amount,status,paydate,token,os,br,ip","transaction","'online','wallet balance','$new_amount','$ref','$charge','$user','NGN','$amt','approved','$time','$tok','$os','$br','$ip'","<p class='text-center'><i class='fa fa-check-circle hipe'></i><br/></br>Payment was successful<br/><br/></p>","<p class='text-center'><i class='fa fa-minus hipe'></i><br/></br>Failed to make payment<br/><br/></p>");
		?>
		<button onclick="parent.location='./ApplicationView'" class="btn btn-success"><i class="fa fa-check-circle"></i> Finish</button>
		<?php
			}
			// avoiding duplicate payments / reuse of payment ID

			}else{
				x_print("<p class='hubmsg'>Invalid user detected!</p>");
			}

				//validation Ended
			}

		}

	}else{
		echo "Payment key deactivated!";
		#exit();
		}


}else{
	x_print("<p class='hubmsg'>Session Deactivated</p>");
}



?>

</div>
<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"></div>
</div>
