<?php 
include("validatebase.php");
?>
<div class="row">
<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"></div>
<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 tourbase">
<h3 class="yii"><font style="color:green"><i class="fa fa-globe"></i> Developers</font> Page </h3>
<p>This is strictly for website owner that intend to put our banner on their website to earn referral bonus</p>
	<?php
$user = $_SESSION["IQGAMES_ID_2018_VISION"];
if(x_count("userdb_bank","id='$user' AND status='1' LIMIT 1") > 0){
	foreach(x_select("token","userdb_bank","id='$user' AND status='1'","1","name") as $key){
	$tok = $key["token"];
	}
	}else{
		exit();
		}
?>	
	<?php
			// start checking for hostname
			if(x_count("contactinfo","status='1' AND type='host' LIMIT 1") > 0){
			foreach(x_select("title","contactinfo","status='1' AND type='host'","1","id desc") as $key){
				$host = $key["title"];
			}
			}
			// end checking for hostname				
			?>
<p class="bui">Ads Preview for Banner 1</p>

<div class="bna">
<img src="../image/ads/banner.png" style="width:100%;"/>
</div>
<p class="bui">Code for Banner 1</p>
<div class="bna">
<textarea onclick="this.focus();this.select()" style="padding:10px;height:110px;" class="form-control" readonly="readonly">
<a href="#" onclick="parent.location='https://<?php echo $host;?>/ApplicationForm?ref_code=<?php echo $tok;?>'">
<img src="https://<?php echo $host;?>/image/ads/banner.png" style="width:100%;"/>
</a>
</textarea>
</div>

<!-----second banner started--->
<p class="bui">Ads Preview for Banner 2</p>
<div class="bna">
<img src="../image/ads/banner_4.png" style="width:500px;"/>
</div>
<p class="bui">Code for Banner 2</p>
<div class="bna">
<textarea onclick="this.focus();this.select()" style="padding:10px;height:110px;" class="form-control" readonly="readonly">
<a href="#" onclick="parent.location='https://<?php echo $host;?>/ApplicationForm?ref_code=<?php echo $tok;?>'">
<img src="https://<?php echo $host;?>/image/ads/banner_4.png" style="width:500px;"/>
</a>
</textarea>
</div>



<!-----third banner started--->
<p class="bui">Ads Preview for Banner 3</p>
<div class="bna">
<img src="../image/ads/banner_3.png" style="width:300px;"/>
</div>
<p class="bui">Code for Banner 3</p>
<div class="bna">
<textarea onclick="this.focus();this.select()" style="padding:10px;height:110px;" class="form-control" readonly="readonly">
<a href="#" onclick="parent.location='https://<?php echo $host;?>/ApplicationForm?ref_code=<?php echo $tok;?>'">
<img src="https://<?php echo $host;?>/image/ads/banner_3.png" style="width:300px;"/>
</a>
</textarea>
</div>

<!-----third banner started---><br/><br/>
<p class="bui">Embed a link</p>
<div class="bna">
<a class="btn btn-success btn-lg" href="https://<?php echo $host;?>/ApplicationForm?ref_code=<?php echo $tok;?>" >Earn upto 76% ROI + Capital
</a>
</div>
<br/>
<p class="bui">Code for Embedding Link</p>
<div class="bna">
<textarea onclick="this.focus();this.select()" style="padding:10px;height:110px;" class="form-control" readonly="readonly">
<a href="#" onclick="parent.location='https://<?php echo $host;?>/ApplicationForm?ref_code=<?php echo $tok;?>'">Earn upto 76% ROI + Capital
</a>
</textarea>
</div>




<style>
.bui{
	color:black;
	border:1px dashed lightgray;
	padding:10px;
	text-transform:uppercase;
	font-size:;
	margin-top:10pt;
}
</style>


</div>
<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"></div>

<?php include("ads.php");?>

</div>
