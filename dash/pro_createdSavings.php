<?php
include_once("../finishit.php");
xstart("0");
if(isset($_POST["savingsTracker"]) && !empty($_POST["savingsTracker"]) && isset($_SESSION["IQGAMES_ID_2018_VISION"])){
	$uid = x_clean($_SESSION["IQGAMES_ID_2018_VISION"]);
	$amt_to_invest = xp("amount_to_invest"); // handling duration
	$duration_id = xp("gametype"); // handling duration
	$wallet = xp("wallet"); // handling wallet type
	
	$trn = $uid.DATE("mYd").time(); // Tranx ID
	
	// checking for duplicate transaction id
	
	if(x_count("investment_master","tranx_id='$trn' LIMIT 1") > 0){
		x_print("<p class='hubmsg'>Duplicate transaction detected ! Contact support</p>");
		exit();
	}
	
	// Validate amount
	
	if(!is_numeric($amt_to_invest)){
		x_print("<p class='hubmsg'>Enter valid amount!</p>");
		exit();
	}
	
	if(x_count("userdb_bank","id='$uid' LIMIT 1") > 0){

		//creating table for game played

		$create=x_dbtab("investment_master","
		user_id INT NOT NULL,
		current_plan VARCHAR(255) NOT NULL,
		duration_in_days VARCHAR(100) NOT NULL,
		duration_in_month VARCHAR(100) NOT NULL,
		amount_invested DOUBLE NOT NULL,
		tranx_id VARCHAR(255) NOT NULL,
		roi_percentage DOUBLE NOT NULL,
		interest_amount DOUBLE NOT NULL,
		acceptance_status ENUM('0','1') NOT NULL,
		payback_status ENUM('0','1') NOT NULL,
		startdate DATETIME NOT NULL,
		enddate DATETIME NOT NULL,
		os VARCHAR(100) NOT NULL,
		br VARCHAR(100) NOT NULL,
		ip VARCHAR(100) NOT NULL
	","MYISAM");
		if(!$create){
		x_print("<p class='hubmsg'>Failed to create table!</p>");
		exit();
		}


		
		// Getting duration details
			$duration_in_month = x_getsingle("SELECT count_month FROM investment_duration WHERE id='$duration_id' LIMIT 1","investment_duration WHERE id='$duration_id' LIMIT 1","count_month");
			$duration_in_days = x_getsingle("SELECT no_of_days FROM investment_duration WHERE id='$duration_id' LIMIT 1","investment_duration WHERE id='$duration_id' LIMIT 1","no_of_days");
			$roi_percentage = x_getsingle("SELECT pecentage_roi FROM investment_duration WHERE id='$duration_id' LIMIT 1","investment_duration WHERE id='$duration_id' LIMIT 1","pecentage_roi");
			
			
		
		// Getting user current plan
		$plan = x_getsingle("SELECT plan FROM userdb_bank WHERE id='$uid' LIMIT 1","userdb_bank WHERE id='$uid' LIMIT 1","plan");
	
		if(x_count("iqplans","type='$plan' LIMIT 1") > 0){
			
		foreach(x_select("from_amount,to_amount,currency","iqplans","type='$plan'","1","id") as $key){
			// Getting the range for the current user plan
			$from = $key["from_amount"];
			$to = $key["to_amount"];
			$cur = $key["currency"];
		}
		
		// Validating the amount to the plan amount range
		$frm = $cur." ".number_format($from,2);
		$tom = $cur." ".number_format($to,2);
		$famt = $cur." ".number_format($amt_to_invest,2);
		
		if($amt_to_invest < $from){
			x_print("<p class='hubmsg'>Amount cannot be less than $frm!</p>");
			exit();
		}
		
		if($to == "0"){
			// Validating plan without amount limit
		}else{
			
			if($amt_to_invest > $to){
				x_print("<p class='hubmsg'>Amount cannot be greater than $tom!</p>");
				exit();
			}
		}
		$startdate = DATE("Y-m-d");$daytobackdate=$duration_in_days;
		$front_back="1";
		$enddate = x_backdate($startdate,$daytobackdate,$front_back);
		
		$ip = xip(); $os = xos(); $br = xbr();$ctime = x_curtime("0","1");
		$interest = round((($roi_percentage/100) * $amt_to_invest),2) ;
		
		
		// Making deduction from wallet balance
		
				// Getting wallet balance and invested
		
		$invested = x_sum("play_cash","userdb_bank","id='$uid'");
		$wb = x_sum("wallet_balance","userdb_bank","id='$uid'");
		
		if($wallet == "walletbalance"){
				
				// checking wallet balance b4 deduction
				
				if($amt_to_invest > $wb){
					x_print("<p class='hubmsg'><i class='fa fa-minus-circle'></i>&nbsp;&nbsp; You have insufficient funds in your wallet !</p>");
					exit();
				}
			$newbalance = $wb - $amt_to_invest;
			$new_invested = $invested + $amt_to_invest;
			$deducted_frm = "wallet balance";
			
			// Updating wallet balance
			x_update("userdb_bank","id='$uid'","play_cash='$new_invested',wallet_balance='$newbalance'","<p class='hubmsg'>Wallet balance updated</p>","<p class='hubmsg'>Failed to update wallet balance</p>");
		}
		
		// Sending mail started
		
		$usermail = x_clean($_SESSION["IQGAMES_EMAIL_2018_VISION"]);
		$nameuser = x_clean($_SESSION["IQGAMES_NAME_2018_VISION"]);
		$amtinvsted_ngn = $cur." ".number_format($amt_to_invest,2);
		$subject = "$amtinvsted_ngn WAS INVESTED SUCCESSFULLY";
		$message = "Hi $nameuser,
		$amtinvsted_ngn was deducted from your $deducted_frm for investment.Please logon to your dashboard for more details.
		";
		/**if(sendmail_local($usermail,$subject,$message) == "0"){
			echo "Failed to send mail.";
			exit();
		}***/
		
		
		x_insert("currency,invested_amt_balance,deducted_from,balance_before,balance_after,user_id,current_plan,duration_in_days,duration_in_month,amount_invested,tranx_id,roi_percentage,interest_amount,acceptance_status,payback_status,startdate,enddate,invested_on,ip,br,os","investment_master","'$cur','$new_invested','$deducted_frm','$wb','$newbalance','$uid','$plan','$duration_in_days','$duration_in_month','$amt_to_invest','$trn','$roi_percentage','$interest','1','0','$startdate','$enddate','$ctime','$ip','$br','$os'","<p class='hubmsg'><i class='fa fa-check-circle'></i> &nbsp;&nbsp;<b>$famt</b> was invested successfully!</p>","<p class='hubmsg'><i class='fa fa-minus-circle'></i> &nbsp;&nbsp;Failed to invest <b>$famt</b>! Contact support</p>");
		
		
		}else{
		x_print("<p class='hubmsg'>Invalid plan detected!</p>");
		exit();
		}

	}else{
		x_print("<p class='hubmsg'>Invalid user detected!</p>");
	}

}else{
	x_print("<p class='hubmsg'>Parameter missing!</p>");
}
?>
