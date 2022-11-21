<?php 
include_once("../../finishit.php");
xstart("0");
?>
<div class="row">
<div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12 boxbase text-center">
<?php 
$total_invested = x_sum("amount","transaction","status='approved'");

?>
<h3 class="pull-left"><?php echo "Balance : <font style='color:green;font-weight:bold'>".$_SESSION["IQGAMES_WTYPE_2018_VISION"]." ".number_format($total_invested,2);?></font></h3>

</div>


<div class="col-md-3">
<img src="<?php
if($_SESSION["IQGAMES_PHOTO_2018_VISION"] == ""){
	echo "img/logo.png";
}else{
	echo $_SESSION["IQGAMES_PHOTO_2018_VISION"];
}
?>" class="img-responsive loh"/>
<button class="btn btn-success" style="float:left;margin-left:20pt;margin-top:10pt;"><i class="fa fa-signal"></i> <?php echo $_SESSION["IQGAMES_DEPT_2018_VISION"]." User";?></button>
</div>
<div class="col-md-9">
<table class="table table-hover table-bordered table-striped">
<tr align="left">
<th>Name</th><td><?php echo $_SESSION["IQGAMES_NAME_2018_VISION"];?></td>
</tr>
<tr align="left">
<th>Mobile</th><td><?php echo $_SESSION["IQGAMES_MOBILE_2018_VISION"];?></td>
</tr>
<tr align="left">
<th>UserID</th><td style="color:red;"><b><?php echo $_SESSION["IQGAMES_MATRIC_2018_VISION"];?></b></td>
</tr>
</table>
</div>

<div class="col-md-12">
<hr/>
</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
<button class="text-center btn btn-primary btn-lg" style="width:100%;text-transform:uppercase;"><i class="fa fa-cog"></i> cPanel MaNaGeR</button>
</div>

<div onclick="load('track_investment')" class="col-lg-3 col-md-3 col-sm-6 col-xs-6 boxbase text-center">
<p class="iconmenu"><i class="fa fa-calendar"></i></p>
<p class="fontmenu btn btn-success" style="font-size:7pt;"> TRACK INVESTMENTS</p>
</div>


<div onclick="load('credit')" class="col-lg-3 col-md-3 col-sm-12 col-xs-12 boxbase text-center">
<p class="iconmenu"><i class="fa fa-bitcoin"></i></p>
<p class="fontmenu btn btn-primary" style="font-size:7pt;"> CREDIT WALLET </p>
</div>

<div onclick="load('regist')" class="col-lg-3 col-md-3 col-sm-6 col-xs-6 boxbase text-center">
<p class="iconmenu"><i class="fa fa-users"></i></p>
<p class="fontmenu btn btn-primary" style="font-size:7pt;">REGISTERED</p>
</div>

<div onclick="" class="col-lg-3 col-md-3 col-sm-12 col-xs-12 boxbase text-center">
<p class="iconmenu"><i class="fa fa-lock"></i></p>
<p class="fontmenu btn btn-info" style="font-size:7pt;"> SUSPENDED</p>
</div>

<div onclick="load('payments_made')" class="col-lg-3 col-md-3 col-sm-6 col-xs-6 boxbase text-center">
<p class="iconmenu"><i class="fa fa-bar-chart"></i></p>
<p class="fontmenu btn btn-danger" style="font-size:7pt;">PAYMENTS  <i class="badge"><?php echo x_count("transaction","status='approved'");?></i></p>
</div>




<div onclick="parent.location='student'" class="col-lg-3 col-md-3 col-sm-6 col-xs-6 boxbase text-center">
<p class="iconmenu"><i class="fa fa-user"></i></p>
<p class="fontmenu btn btn-warning" style="font-size:7pt;"> ADD USERS </p>
</div>


<div onclick="load('with')" class="col-lg-3 col-md-3 col-sm-6 col-xs-6 boxbase text-center">
<p class="iconmenu"><i class="fa fa-credit-card"></i></p>
<p class="fontmenu btn btn-warning" style="font-size:7pt;"> WITHDRAWALS  <i class="badge"><?php echo x_count("withdrawalbase","status='pending'");?></i></p>
</div>

<div onclick="parent.location='feedme'" class="col-lg-3 col-md-3 col-sm-6 col-xs-6 boxbase text-center">
<p class="iconmenu"><i class="fa fa-inbox"></i></p>
<p class="fontmenu btn btn-info" style="font-size:7pt;"> FEEDBACK <i class="badge"><?php echo x_count("feedback","status='pending'");?></i></p>
</div>



<div onclick="parent.location='plose'" class="col-lg-3 col-md-3 col-sm-6 col-xs-6 boxbase text-center">
<p class="iconmenu"><i class="fa fa-minus-circle"></i></p>
<p class="fontmenu btn btn-warning" style="font-size:7pt;"> LOSERS <i class="badge">0</i></p>
</div>



<div onclick="parent.location=''" class="col-lg-3 col-md-3 col-sm-6 col-xs-6 boxbase text-center">
<p class="iconmenu"><i class="fa fa-signal"></i></p>
<p class="fontmenu btn btn-primary" style="font-size:7pt;"> PA </p>
</div>

<div onclick="parent.location='played'" class="col-lg-3 col-md-3 col-sm-6 col-xs-6 boxbase text-center">
<p class="iconmenu"><i class="fa fa-gamepad"></i></p>
<p class="fontmenu btn btn-warning" style="font-size:7pt;"> GAMES PLAYED  <i class="badge">0</i></p>
</div>

<div onclick="parent.location='pwon'" class="col-lg-3 col-md-3 col-sm-6 col-xs-6 boxbase text-center">
<p class="iconmenu"><i class="fa fa-plus-circle"></i></p>
<p class="fontmenu btn btn-info" style="font-size:7pt;"> WINNERS <i class="badge">0</i></p>
</div>

<div onclick="parent.location='apprwith'" class="col-lg-3 col-md-3 col-sm-6 col-xs-6 boxbase text-center">
<p class="iconmenu"><i class="fa fa-check-circle"></i></p>
<p class="fontmenu btn btn-info" style="font-size:7pt;"> APPROVED FUNDS </p>
</div>

<div onclick="parent.location='offlinealert'" class="col-lg-3 col-md-3 col-sm-6 col-xs-6 boxbase text-center">
<p class="iconmenu"><i class="fa fa-bell"></i></p>
<p class="fontmenu btn btn-info" style="font-size:7pt;"> OFFLINE ALERT <i class="badge"><?php echo x_count("alertus","status='0'");?></i></p>
</div>

<div onclick="parent.location='treated'" class="col-lg-3 col-md-3 col-sm-6 col-xs-6 boxbase text-center">
<p class="iconmenu"><i class="fa fa-check-circle"></i></p>
<p class="fontmenu btn btn-success" style="font-size:7pt;"> TREATED ALERT <i class="badge"><?php echo x_count("alertus","status='1'");?></i></p>
</div>



<div onclick="parent.location='trickbase'" class="col-lg-3 col-md-3 col-sm-6 col-xs-6 boxbase text-center">
<p class="iconmenu"><i class="fa fa-trash"></i></p>
<p class="fontmenu btn btn-primary" style="font-size:7pt;"> TRICKBASE <i class="badge"><?php echo x_count("withdrawalbase","status='approved'");?></i></p>
</div>


<div onclick="parent.location='payout'" class="col-lg-3 col-md-3 col-sm-6 col-xs-6 boxbase text-center">
<p class="iconmenu"><i class="fa fa-money"></i></p>
<p class="fontmenu btn btn-success" style="font-size:7pt;"> PAYOUTS <i class="badge"><?php echo x_count("withdrawalbase","status='approved'");?></i></p>
</div>

<div onclick="parent.location='settings'" class="col-lg-3 col-md-3 col-sm-6 col-xs-6 boxbase text-center">
<p class="iconmenu"><i class="fa fa-cog"></i></p>
<p class="fontmenu btn btn-info" style="font-size:7pt;"> SETTINGS <i class="badge">0</i></p>
</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
<button class="text-center btn btn-success btn-lg" style="width:100%;text-transform:uppercase;"><i class="fa fa-signal"></i> Server Statistics</button>
</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
<?php //include_once("../share.php");?>
</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
<?php //include_once("../shareall.php");?>
</div>

</div>