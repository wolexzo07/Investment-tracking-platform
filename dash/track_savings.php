<?php 
include("validatebase.php");
?>
<div class="row">
<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12"></div>
<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 tourbase">
<h4 class="walletFunder"><i class="fa fa-calendar"></i>&nbsp;&nbsp; TRACK <font class="colorg">SAVINGS</font>
</h4>

<?php
 $userme = x_clean($_SESSION["IQGAMES_ID_2018_VISION"]);
if(x_count("savings_master","user_id='$userme' LIMIT 1") > 0){
	$counter = 0;
	?>
	<div style="margin-top:20pt;"  class="panel-group" id="accordion">
	<?php
	foreach(x_select("0","savings_master","user_id='$userme'","25","id desc") as $key)
		{
		$counter++;
		$id = $key["id"];
		$tid = $key["tranx_id"];
		$amt_invested = $key["amount_invested"];
		$cur = $key["currency"];
		$plan = $key["current_plan"];
		$day = $key["duration_in_days"];
		$month = $key["duration_in_month"];		
		$interest = $key["interest_amount"];
		$roi = $key["roi_percentage"];
		$accept = $key["acceptance_status"];
		$payback = $key["payback_status"];	
		
		$start = $key["startdate"];
		$end = $key["enddate"];	
		$on = $key["invested_on"];
		$paidon = $key["paid_on"];		
		
		?>
	<div class="panel panel-default">
		 <div class="panel-heading">
		  <h4 style="padding:10px;" class="panel-title">
			<a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $id;?>">
			<?php
			if($accept == "1"){
				echo "<i class='fa fa-check-circle'></i>";
			}else{
				echo "<i class='fa fa-minus-circle'></i>";
			}
			?>
			 &nbsp;&nbsp;<?php echo $cur." ".number_format($amt_invested,2)." WAS INVESTED";?></a>
			 <?php
			if($payback == "1"){
				?>
				<span id="mature" class="badge pull-right">Matured</span>
				<?php
			}elseif($accept == "0"){
				?>
				<span id="reject" class="badge pull-right">Rejected</span>
				<?php
			}elseif($payback == "0"){
				?>
				<span id="wait" class="badge pull-right">waiting</span>
				<?php
			}else{
				
			}
			?>
			 
		  </h4>
		</div>

		<div id="collapse<?php echo $id;?>" class="panel-collapse collapse">
			<div class="panel-body">
				<button class="btn btn-sm btn-success"><i class="fa fa-map-marker"></i>&nbsp;&nbsp;Track ID : <?php echo $tid;?></button>
				
				<div class="row">
					<div class="col-md-6" id="sideStyle">
						<table id="spaceTab" class="table">
							<tr>
							<td>Amount Invested</td>
							<th><?php echo $cur." ".number_format($amt_invested,2);?></th>
							</tr>
							
							<tr>
							<td>Duration</td>
							<th><?php
								if($month > 1){
									echo "$month months <=> ".$day." days";
								}else{
									echo "$month month <=> ".$day." days";
								}
							?></th>
							</tr>
							
							<tr>
							<td>Roi</td>
							<th class="colorp"><?php echo $cur." ".number_format($interest,2)." ($roi %)";?></th>
							</tr>
							
							<?php
							
							if($accept == "1"){
								?>
							<tr>
							<td>Payback</td>
							<th class="colorg"><?php echo $cur." ".number_format($interest+$amt_invested,2);?></th>
							</tr>
							<?php
							if($payback=="1"){
								?><tr >
							<td>Paid at</td>
							<td class="colorp" style="font-weight:bold;"><?php echo $paidon;?></td>
							</tr><?php
							}
							?>
								<?php
								}?>
							

						</table>
					
					</div>
					<div class="col-md-6" id="sideStyle2">
						<table id="spaceTab" class="table">
							<tr>
							<td>Invested at</td>
							<th><?php echo $on;?></th>
							</tr>

							<?php
							if($accept == "1"){
								?>
							<tr class="colorg">
							<td>Invested on</td>
							<th><?php echo $start;?></th>
							</tr>
							
								<tr class="colorp">
							<td>Matured on</td>
							<th><?php echo $end;?></th>
							</tr>
							
							<tr class="colorp">
							<td>Time Left</td>
							<th><?php
							$cudat = date("Y-m-d");
							$startt = strtotime($cudat);
							$endd = strtotime($end);

							$days_between = ceil(abs($endd - $startt) / 86400);
							
							// Checking maturity time started
							
							if($payback == "1"){
								
							}else{
								
								if($days_between <= 0){
									$paidon = x_curtime("0","1");
									
									// Updating payback and time
									
									x_update("savings_master","id='$id'","payback_status='1',paid_on='$paidon'","success $id","Failed $id");
									
									// updating wallet with payback
									
		// Getting wallet balance and invested
			 
		$invested = x_sum("play_cash","userdb_bank","id='$userme'");
		$wb = x_sum("wallet_balance","userdb_bank","id='$userme'");
		
		$new_wb = $wb + $interest + $amt_invested;
		$new_invested = $invested - $amt_invested;
		
		// Notify users on dashboard
		
		$new_wb_f = $cur." ".number_format($interest + $amt_invested,2);
		$amt_invested_f = $cur." ".number_format($amt_invested,2);
		
		// Getting the name of user
		
		$nameuser = x_getsingle("SELECT name FROM userdb_bank WHERE id='$userme' LIMIT 1","userdb_bank WHERE id ='$userme' LIMIT 1","name");
		
		$paidon = x_curtime("0","1");$paidons = x_curtime("0","0");
		
		x_insert("type,title,user_id,message,rtime,stime","notifyme","'p','$new_wb_f WAS CREDITED TO YOUR WALLET','$userme','
		<p>Hi <b>$nameuser</b>,</p>
		<b>$new_wb_f</b> was credited to your wallet from your investment of <b>$amt_invested_f</b> that was made on <b>$on</b>.
		','$paidon','$paidons'","&nbsp;","&nbsp;");
		
		 x_update("userdb_bank","id='$userme'","wallet_balance='$new_wb',play_cash='$new_invested'","success $id","Failed $id");
		 
								}
							}
							
							// Checking maturity time ended
							
								if($payback == "1"){
									echo "<font style='color:red;'>Matured and settled.</font>";
								}else{
										if($days_between > 1){
											echo $days_between." days";
										}else{
											echo $days_between." day";
										}
									}
						
							
							?></th>
							</tr>
							
							
								<?php
							}
							?>
							

						</table>
					</div>
				</div>
				
				
			</div>
		</div>
	</div>
		<?php
		}
		echo "</div>";
	
}else{
	x_print("<p class='text-center'><i class='fa fa-calendar hipe'></i><br/></br>No savings record found<br/><br/></p>");
	}

?>

</div>
<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12"></div>
</div>


