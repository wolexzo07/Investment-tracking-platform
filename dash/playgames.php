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
	$("#btnplan").click(function(){
	$("#showplans").toggle("slow");
	});
});
</script>
<div class="row">
<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"></div>
<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 tourbase">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<h4 class="walletFunder"><i class="fa fa-bank"></i>&nbsp;&nbsp; START <font class="colorg">INVESTING</font><i id="closer" class="fa fa-remove pull-right"></i></h4>

</div>

<div id="instructionBoss" class="col-md-12">

<div class="list-group">
<div class="list-group-item list-group-item-success"><i class="fa fa-check-circle"></i> &nbsp;&nbsp;Make sure your wallet is funded.</div>
<div class="list-group-item list-group-item-default"><i class="fa fa-check-circle"></i> &nbsp;&nbsp;Please do not hesitate to read our terms and condition</div>
<div class="list-group-item list-group-item-success"><i class="fa fa-check-circle"></i> &nbsp;&nbsp;Please read our Withdrawal Policy</div>
<div class="list-group-item list-group-item-default"><i class="fa fa-check-circle"></i> &nbsp;&nbsp;Please read our Deposit policy</div>
<div class="list-group-item list-group-item-success"><i class="fa fa-check-circle"></i> &nbsp;&nbsp;You cannot make withdrawal until maturity.</div>
</div>

<?php
$curplan = x_clean($_SESSION["IQGAMES_PLAN_2018_VISION"]);
if(x_count("investment_duration","status='1' LIMIT 1") > 0){
	?>
	<button id="btnplan" class="btn btn-sm btn-info"><i class="fa fa-table"></i>&nbsp;&nbsp; Show plans</button>
	<table id="showplans" class="table table-striped table-bordered">
	<tr>
			<th>Plans </th>
			<th>Expiration</th>
			<th>Returns(%)</th>
		</tr>
	<?php
	foreach(x_select("0","investment_duration","status='1'","15","id") as $key){
		$id = $key["id"];$pid = $key["plan_id"];
		$duration = $key["duration"];$cm = $key["count_month"];
		$nod = $key["no_of_days"];$roi = $key["pecentage_roi"];
		
		$planR = x_getsingle("SELECT type FROM iqplans WHERE id='$pid' LIMIT 1","iqplans WHERE id='$pid' LIMIT 1","type");
			
			if($curplan == $planR){
					?>
		<tr>
			<td><?php 
			if($cm == "4"){
				echo $planR."  Plan";
			}?></td>
			<td><?php echo $duration." (".$nod." days)";?></td>
			<td><?php echo $roi."%";?></td>
		</tr>
		<?php
			}
	
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
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center playcenter">

<form method="POST" id="gameplay">

<div class="row">
	<div class="col-md-6">
<p class="banp"><font class="colorg"><i class="fa fa-calendar"></i>&nbsp;&nbsp; CHOOSE</font> DURATION</p>
<select name="gametype" required="required" class="form-control slec">
<?php
if(x_count("investment_duration","status='1' LIMIT 1") > 0){
	
	foreach(x_select("0","investment_duration","status='1'","10","id") as $key){
		$id = $key["id"];$pidder = $key["plan_id"];
		$duration = $key["duration"];$cm = $key["count_month"];
		$nod = $key["no_of_days"];$roi = $key["pecentage_roi"];
		
		$planReader = x_getsingle("SELECT type FROM iqplans WHERE id='$pidder' LIMIT 1","iqplans WHERE id='$pidder' LIMIT 1","type");
		
		if($curplan == $planReader){
			?>
		<option value="<?php echo $id;?>"><?php echo $planReader." ==> ".$duration;?></option>
		<?php
		}
		
		}
	}else{
		?>
		<option value="">No duration found!</option>
		<?php
	}
?>
</select>

	</div>
	<div class="col-md-6">
<p class="banp"><i class="fa fa-credit-card"></i>&nbsp;&nbsp; DEDUCT <font class="colorg"> FROM</font></p>
<select name="wallet" required="required" class="form-control slec">
<?php
$userid = x_clean($_SESSION["IQGAMES_ID_2018_VISION"]);
$wb = x_sum("wallet_balance","userdb_bank","id='$userid'");
?>
<option value="walletbalance">WALLET BALANCE = <?php x_print("NGN ".number_format($wb,2));?></option>
</select>

	</div>
	
<div class="col-md-12">
<p class="banp"><i class="fa fa-money"></i>&nbsp;&nbsp; AMOUNT <font class="colorg"> TO INVEST</font></p>
<?php
$plan = x_clean($_SESSION["IQGAMES_PLAN_2018_VISION"]);
$from = x_getsingle("SELECT from_amount FROM iqplans WHERE type='$plan' LIMIT 1","iqplans WHERE type='$plan' LIMIT 1","from_amount");
$to = x_getsingle("SELECT to_amount FROM iqplans WHERE type='$plan' LIMIT 1","iqplans WHERE type='$plan' LIMIT 1","to_amount");

	if($to == "0"){
		?>
		<input type="number" placeholder="AMOUNT TO INVEST" class="form-control ttx" name="amount_to_invest" required="required" min="<?php echo $from;?>" max=""/>
		<?php
	}else{
		?>
		<input type="number" placeholder="AMOUNT TO INVEST" class="form-control ttx" name="amount_to_invest" required="required" min="<?php echo $from;?>" max="<?php echo $to;?>"/>
		<?php
	}
?>


	</div>
	
</div>

<input type="hidden" value="<?php echo sha1(uniqid());?>" name="gamebase"/>
<button id="bup" style="margin-top:20pt;" class="btn btn-info"><i class="fa fa-send"></i>&nbsp;&nbsp; INVEST NOW</button>
</form>

<div id="gallery" style="margin-top:10px;"></div>

<p style="font-weight:bold;color:green;margin-top:10pt;">***NOTE : YOU CANNOT WITHDRAW INVESTED AMOUNT UNTIL MATURITY.***</p>
</div>



</div>

</div>
<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"></div>
</div>
