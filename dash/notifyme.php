<?php
include("validatebase.php");
?>
<div class="row">
<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12"></div>
<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 tourbase">
<h4 class="walletFunder"><i class="fa fa-bell"></i>&nbsp;&nbsp; ACCOUNT <font class="colorg">NOTIFICATION </font></h4>

	<script type="text/javascript" src="fetch.js"></script>
	<div id="showitnow"></div>
	 <div class="panel-group" id="accordion">
<?php

$counter = 0;
$userme = x_clean($_SESSION["IQGAMES_ID_2018_VISION"]);
if(x_count("notifyme","type='all' OR type='p' AND user_id='$userme' LIMIT 1") > 0){
	$cut = x_count("notifyme","type='all' OR type='p' AND user_id='$userme' LIMIT 1");
	foreach(x_select("id,title,message,rtime,status","notifyme","type='all' OR type='p' AND user_id='$userme'","50","id desc") as $key){
		$counter++;
		$id = $key["id"];
		$title = $key["title"];
		$msg = $key["message"];
		$rtime = $key["rtime"];
		$status = $key["status"];
		?>
	<div class="panel panel-default">
    <div class="panel-heading">
      <h4 onclick="msgupdate(<?php echo $id;?>)" style="padding:10px;" class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $counter;?>">
        <i class="fa fa-edit"></i> &nbsp;&nbsp;<?php echo xup($title,"");?>
        
		<?php
		if($status == "1"){
			?><span id="readmsg" class="badge pull-right">read</span><?php
		}else{
			?><span id="unreadmsg" class="badge pull-right">unread</span><?php
		}
		?>
		</a>
      </h4>
    </div>
    <div id="collapse<?php echo $counter;?>" class="panel-collapse collapse">
      <div class="panel-body">
	  <?php echo $msg;?>
	  </div>
    </div>
  </div>
		<?php
		}

	}else{
		echo "<p class='text-center'><i class='fa fa-trash hipe'></i><br/></br>No notification yet<br/><br/></p>";

		}

?>
</div>
	<style>
  p{
    color:black;
  }
	#abilp a:active{
		background-color:transparent;
		text-decoration:none;
		color:black;
		padding:10px;
	}
	#abilp a:hover{
			background-color:transparent;
		text-decoration:none;
		color:black;padding:10px;
	}
		#abilp a:visited{
			background-color:transparent;
		text-decoration:none;
		color:black;padding:10px;
	}
	#abilp a{
			background-color:transparent;
		text-decoration:none;
		color:black;padding:10px;
	}
	#readmsg{
		letter-spacing:1pt;
		background-color:white;
		color:purple;
		
		box-shadow:1px 1px 1px 1px lightgray;
		-moz-box-shadow:1px 1px 1px 1px lightgray;
	}
	#unreadmsg{
		letter-spacing:1pt;
		background-color:white;
		color:green;
		
		box-shadow:1px 1px 1px 1px lightgray;
		-moz-box-shadow:1px 1px 1px 1px lightgray;
	}
	</style>


</div>
<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12"></div>
</div>
