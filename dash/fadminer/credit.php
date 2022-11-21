<?php 
include_once("../../finishit.php");
xstart("0");
?>


<div class="row">
<div class="col-md-4">
<h4 class="lefttrack"><button onclick="load('credit')" class="btn btn-success"><i class="fa fa-calculator"></i></button> &nbsp;&nbsp;WALLET <font class="spart">MANAGER</font></h4>
</div>
<div class="col-md-4">
		<script>
		 function searcher(){
			 var elem = document.getElementById("searchbox").value;
			 //load('track_investment')
			 load("track_investment?call="+elem);
			 return false;
		 }
		</script>
		<form onsubmit="return searcher()">
		<div class="row">
		<div class="col-md-9"><input type="text" placeholder="Search by Tranx id | Name | Date" id="searchbox" class="form-control " name=""/></div>
		<div class="col-md-3"><button class="btn btn-success"><i class="fa fa-search"></i> Go</button></div>
		</div>
		</form>
		
</div>
<div class="col-md-4">
	<button onclick="load('regist')" class="btn btn-info"><i class="fa fa-user"></i> Users Account</button>
	<button onclick="load('payments_made')" class="btn btn-success"><i class="fa fa-money"></i> Payments</button>
</div>
</div>

	<div style="margin-top:30pt;" class="row">
	<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"></div>
	<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">

	<div class="panel panel-default">
	<div class="panel-heading"><i class="fa fa-credit-card"></i> Wallet Manager </div>
	<div class="panel panel-body">
	<script type="text/javascript" src="log.js"></script>

	<?php
	$user = xclean($_SESSION["IQGAMES_MATRIC_2018_VISION"]);
	//checking permission to credit wallet
	if(x_count("userdata","is_credit='1' AND status='1' AND matric_no='$user' LIMIT 1") > 0){
	?>
	<div style="margin-top:10pt;margin-bottom:10pt;display:none;color:green;font-weight:bold" id="gallery"><img src="image/load.gif" class="img-responsive" style="width:80px;"/></div>

	<form method="POST" id="creditme">
	<button style="margin-top:-120px;margin-left:300px;padding:10px" class="btn btn-success btn-sm"><i class="fa fa-credit-card"></i>&nbsp;&nbsp; Process Request</button>
	<div class="row">
		<div class="col-lg-4 col-md-4">
			<p class="txt">Transaction type: </p>
		   <select required="required" id="txp" name="trans" class="form-control slect">
		   <option value="credit">Credit account</option>
		   <option selected value="debit">Debit account</option>
		   </select>
		</div>
		<div class="col-lg-4 col-md-4">
		<p class="txt">Choose wallet: </p>
		  <select required="required" id="txp" name="credit" class="form-control slect">
		  <option value="">Credit type...</option>
		  <option selected value="wallet_balance">Wallet Balance</option>
		  <option value="wallet_bonus">Wallet Bonus</option>
		  <option value="play_cash">Current Investment</option>
		  </select>
		</div>
		<div class="col-lg-4 col-md-4">
		<p class="txt">Email:</p>
		<input type="text" id="txp" placeholder="Email or mobile number" name="email" class="form-control txtt"/>
		</div>
		<div class="col-lg-12 col-md-12">
			<div id="validateuser"></div>
		</div>
	</div>
	


   

  

  <p class="txt">Amount:</p>
  <input type="number" min="1" max="" id="txp" placeholder="Enter Amount" name="amount" class="form-control txtt"/>
  <p class="txt">Note / Reason:</p>
  <textarea name="reason" class="form-control" placeholder="Note / Reason" ></textarea>
 <input type="hidden" name="tellme" value="<?php echo sha1(uniqid());?>"/>
  
  </form>
	<?php
	}else{
		x_print("<p style='border:0px;color:gray;' class='hubmsg text-center'><i style='font-size:60pt;' class='fa fa-minus-circle'></i><br/><br/> You are not permitted to perform this duty.</p>");
	}?>



	</div>
	</div>

	</div>
	  <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"></div>
	</div>


 <?php //include_once("footbase.php");?>
