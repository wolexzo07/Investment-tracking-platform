<?php
include("validatebase.php");
?>
<script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
	
	$("#closer").hide();
	$("#closer").click(function(){
		$(".playcenter").hide("slow");
		$("#Agreement").show("slow");
		$("#instructionBoss").show("slow");
		$("#closer").hide();
	})
	$("#playpaidbase").click(function(){
	$(".playcenter").show("slow");
	$("#Agreement").hide("slow");
	$("#closer").show();
	$("#instructionBoss").hide("slow");
	//$(".playdemo").hide("slow");
	});
});
</script>
<div class="row">
<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"></div>
<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 tourbase">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<h4 class="walletFunder"><i class="fa fa-bank"></i>&nbsp;&nbsp; START <font class="colorg">SAVING</font><i id="closer" class="fa fa-remove pull-right"></i></h4>

</div>

<div id="instructionBoss" class="col-md-12">

<div class="list-group">
<div class="list-group-item list-group-item-success"><i class="fa fa-check-circle"></i> &nbsp;&nbsp;</div>
<div class="list-group-item list-group-item-default"><i class="fa fa-check-circle"></i> &nbsp;&nbsp;</div>
<div class="list-group-item list-group-item-success"><i class="fa fa-check-circle"></i> &nbsp;&nbsp;</div>
<div class="list-group-item list-group-item-default"><i class="fa fa-check-circle"></i> &nbsp;&nbsp;</div>
<div class="list-group-item list-group-item-success"><i class="fa fa-check-circle"></i> &nbsp;&nbsp;</div>
</div>

<?php
if(x_count("savings_duration","status='1' LIMIT 1") > 0){
	?><table style="display:none;" class="table table-striped table-bordered">
	<tr>
			<th>Durations </th>
			<th>Expiration (days)</th>
			<th>Returns(%)</th>
		</tr>
	<?php
	foreach(x_select("0","savings_duration","status='1'","10","id") as $key){
		$id = $key["id"];
		$duration = $key["duration"];$cm = $key["count_month"];
		$nod = $key["no_of_days"];$roi = $key["pecentage_roi"];
		?>
		<tr>
			<td><?php echo $duration;?></td>
			<td><?php echo $nod;?></td>
			<td><?php echo $roi."%";?></td>
		</tr>
		<?php
		}?>	</table><?php
	}else{
		?>
		<option value="">No duration found!</option>
		<?php
	}
?>


</div>

<div id="Agreement" class="col-md-12 spd">
<button class="btn btn-success" id="playpaidbase" style="width:100%;padding:20px;margin-top:10pt;"><i class="fa fa-check-circle"></i>&nbsp;&nbsp; AGREE AND CONTINUE</button>
</div>

<script type="text/javascript" src="../log.js"></script>
<script type="text/javascript" src="js/extra.js"></script>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center playcenter">

<form method="POST" id="createSavings">

<div class="row">
<div class="col-md-12">
<p class="banp"><font class="colorg"><i class="fa fa-briefcase"></i>&nbsp;&nbsp; SAVINGS</font> PLAN </p>
<select onchange="return displayChange(this.value)" name="savingplan" required="required" class="form-control slec">
<option value="">Choose savings plan...</option>
<?php
if(x_count("savings_plans","status='1' LIMIT 1") > 0){
	foreach(x_select("0","savings_plans","status='1'","10","type") as $key){
		$sid = $key["id"];
		$type = $key["type"];
		?>
		<option value="<?php echo $type;?>"><?php echo strtoupper($type)." SAVINGS";?></option>
		<?php
		}
	}else{
		?>
		<option value="">No duration found!</option>
		<?php
	}
?>
</select>

	</div>
	
	<div id="wdate" class="col-md-12">
	<p class="banp"><font class="colorg"><i class="fa fa-calendar"></i>&nbsp;&nbsp; WITHDRAWAL</font> DATE</p>
		<input type="date" placeholder="TIME TO WITHDRAW" class="form-control ttx" id="withdate" name="time2withdraw" />
	
	</div>
	
	<div id="taramount" class="col-md-6">
	<p class="banp"><font class="colorg"><i class="fa fa-money"></i>&nbsp;&nbsp; TARGET</font> AMOUNT</p>
		<input type="number" placeholder="ENTER TARGET AMOUNT" class="form-control ttx" name="target_amount" id="targetAmount" min="" max=""/>
	
	</div>
	

	
	<div id="initial_deposit" class="col-md-6">
<p class="banp"><i class="fa fa-money"></i>&nbsp;&nbsp; INITIAL <font class="colorg"> DEPOSIT</font></p>

<input type="number" placeholder="INITIAL DEPOSIT AMOUNT" class="form-control ttx" name="initial_amount" required="required" min="" max=""/>
	
</div>
	
		<div id="fundlocker" class="col-md-12">
	<p class="banp"><font class="colorg"><i class="fa fa-credit-card"></i>&nbsp;&nbsp; AMOUNT</font> TO LOCK</p>
		<input type="number" placeholder="ENTER AMOUNT TO LOCK" class="form-control ttx" name="lock_amount" id="lockAmount" min="" max=""/>
	
	</div>
	
	<div id="SavingDuration" class="col-md-6">
<p class="banp"><font class="colorg"><i class="fa fa-calendar"></i>&nbsp;&nbsp; CHOOSE</font> DURATION</p>
<select name="gametype" required="required" class="form-control slec">
<?php
if(x_count("savings_duration","status='1' LIMIT 1") > 0){
	foreach(x_select("0","savings_duration","status='1'","12","count_month") as $key){
		$id = $key["id"];
		$duration = $key["duration"];$cm = $key["count_month"];
		$nod = $key["no_of_days"];$roi = $key["pecentage_roi"];
		?>
		<option value="<?php echo $id;?>"><?php echo $duration." <==> ".$roi."% Roi";?></option>
		<?php
		}
	}else{
		?>
		<option value="">No duration found!</option>
		<?php
	}
?>
</select>

	</div>
	
	<div id="deductFrom" class="col-md-6">
<p class="banp"><i class="fa fa-credit-card"></i>&nbsp;&nbsp; DEDUCT <font class="colorg"> FROM</font></p>
<select name="wallet" required="required" class="form-control slec">
<?php
$userid = x_clean($_SESSION["IQGAMES_ID_2018_VISION"]);
$wb = x_sum("wallet_balance","userdb_bank","id='$userid'");
?>
<option value="walletbalance">WALLET BALANCE = <?php x_print("NGN ".number_format($wb,2));?></option>
<option value="cardpayment">CREDIT CARD (Coming soon)</option>
</select>

	</div>
	
<div id="amount2invest" class="col-md-12">
<p class="banp"><i class="fa fa-money"></i>&nbsp;&nbsp; AMOUNT <font class="colorg"> TO INVEST</font></p>
<?php
$plan = x_clean($_SESSION["IQGAMES_PLAN_2018_VISION"]);
$from = x_getsingle("SELECT from_amount FROM iqplans WHERE type='$plan' LIMIT 1","iqplans WHERE type='$plan' LIMIT 1","from_amount");
$to = x_getsingle("SELECT to_amount FROM iqplans WHERE type='$plan' LIMIT 1","iqplans WHERE type='$plan' LIMIT 1","to_amount");

	if($to == "0"){
		?>
		<input type="number" id="amt_inv" placeholder="AMOUNT TO INVEST" class="form-control ttx" name="amount_to_invest" required="required" min="<?php echo $from;?>" max=""/>
		<?php
	}else{
		?>
		<input type="number" id="amt_inv" placeholder="AMOUNT TO INVEST" class="form-control ttx" name="amount_to_invest" required="required" min="<?php echo $from;?>" max="<?php echo $to;?>"/>
		<?php
	}
?>


	</div>
	
	<div id="additionalNote" class="col-md-12">
		<p class="banp"><i class="fa fa-pencil"></i>&nbsp;&nbsp; ADDITIONAL <font class="colorg"> NOTE:</font></p>
		<textarea name="note" id="note" class="form-control" placeholder="ENTER ADDITIONAL NOTE"></textarea>
	</div>
	
</div>

<input type="hidden" value="<?php echo sha1(uniqid());?>" name="savingsTracker"/>
<button id="bup" style="margin-top:20pt;" class="btn btn-info"><i class="fa fa-send"></i>&nbsp;&nbsp; PROCESS REQUEST</button>
</form>

<div id="gallery" style="margin-top:10px;"></div>

<p style="font-weight:bold;color:green;margin-top:10pt;display:none;">***NOTE : YOU CAN NOT WITHDRAW INVESTED AMOUNT NOT UNTIL MATURITY.***</p>
</div>



</div>

</div>
<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"></div>
</div>
