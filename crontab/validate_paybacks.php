<?php
include_once("../finishit.php");
xstart("0");
if(x_validateget("command")){

	$cmd = xg("command");

	if($cmd == "pusher"){
		// Getting paid investments
		$pinv = x_count("investment_master","acceptance_status='1' AND payback_status='1'");
		// Getting rejected investment
		$reject = x_count("investment_master","acceptance_status='0' AND payback_status='0'");
		// Getting the list of investments
		$investmentcounter = x_count("investment_master","acceptance_status='1' AND payback_status='0'");
		if($investmentcounter > 0){
			?>
		<h3>Total current Investment = <?php echo $investmentcounter;?></h3>
		<h3>Total Paid Investment = <?php echo $pinv;?></h3>
		<h3>Total Rejected Investment = <?php echo $reject;?></h3>
			<?php
			foreach(x_select("id,deducted_from,user_id,amount_invested,interest_amount,startdate,enddate,currency,invested_on,tranx_id,roi_percentage","investment_master","acceptance_status='1' AND payback_status='0'","0","id asc") as $key){
				
			$id = $key["id"];
			$userid = $key["user_id"];
			$df = $key["deducted_from"];
			$amt_invested = $key["amount_invested"];
			$interest = $key["interest_amount"];
			$start = $key["startdate"];
			$end = $key["enddate"];
			$cur = $key["currency"];
			$investon =  $key["invested_on"];
			$tranx_id =  $key["tranx_id"];
			$roi = $key["roi_percentage"];
			
			// Getting wallet balance and invested
			//$invested = x_sum("play_cash","userdb_bank","id='$userid'");
			//$wb = x_sum("wallet_balance","userdb_bank","id='$userid'");
			
			// Getting name of users
			$nameuser = x_getsingle("SELECT name FROM userdb_bank WHERE id='$userid' LIMIT 1","userdb_bank WHERE id ='$userid' LIMIT 1","name");
			// Getting email of users
			$useremail = x_getsingle("SELECT email FROM userdb_bank WHERE id='$userid' LIMIT 1","userdb_bank WHERE id ='$userid' LIMIT 1","email");
			
			/***echo "Name : ".$nameuser."<br/>";
			echo "Email : ".$useremail."<br/>";
			exit();***/
			
			// Getting time for investment to elapse
			
			$cudat = date("Y-m-d");
			$startt = strtotime($cudat);
			$endd = strtotime($end);

			$days_between = ceil(abs($endd - $startt) / 86400);
			
			if($days_between <= 0){
				
				$paidon = x_curtime("0","1");
				$paidons = x_curtime("0","0");
		
		// Updating payback and time
		
		x_update("investment_master","id='$id'","payback_status='1',paid_on='$paidon'","success $id","Failed $id");
		
		// updating wallet with payback
									
		// Getting wallet balance and invested
		
		$invested = x_sum("play_cash","userdb_bank","id='$userid'");
		$wb = x_sum("wallet_balance","userdb_bank","id='$userid'");
		
		$new_wb = $wb + $interest + $amt_invested;
		$new_invested = $invested - $amt_invested;
		
		$new_wb_f = $cur." ".number_format($interest + $amt_invested,2);
		$amt_invested_f = $cur." ".number_format($amt_invested,2);
		
		// Notify users on dashboard
		
		x_insert("type,title,user_id,message,rtime,stime","notifyme","'p','$new_wb_f WAS CREDITED TO YOUR WALLET','$userid','
		<p>Hi <b>$nameuser</b>,</p>
		<b>$new_wb_f</b> was credited to your wallet from your investment of <b>$amt_invested_f</b> that was made on <b>$investon</b>.
		','$paidon','$paidons'","&nbsp;","&nbsp;");
		
		// Sending an email to the user

		include("usermailer.php");
		
		// sending an email to admin (abocentdotcom@gmail.com)
		
		include("admin_mailer.php");
		
		// updating wallet balance and investment balance
		
		 x_updated("userdb_bank","id='$userid'","wallet_balance='$new_wb',play_cash='$new_invested'","$nameuser was paid for investment $id\n\n","Failed to pay $nameuser for investment $id\n\n");
								
								}
			}
			
		}else{
			 echo "No current investment was detected \n\n";
		}
		
	}else{
		echo "Invalid command detected \n\n";
	}

}
?>