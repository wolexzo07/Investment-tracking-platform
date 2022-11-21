<?php 
include_once("../../finishit.php");
xstart("0");
?>

  <script src="tinymce/js/tinymce/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>

<div class="row">
<div class="col-md-4">
<h4 class="lefttrack">
  <?php
		if(x_validateget("email") && x_validateget("uid")){
			$email = xg("email"); $id = xg("uid");
			?>
			<button onclick="load('send-message?email='+'<?php echo $email;?>'+'&uid=<?php echo $id;?>')" class="btn btn-success"><i class="fa fa-envelope-o"></i></button>
			<?php
		}
  ?>
 &nbsp;&nbsp;ACCOUNT <font class="spart">MESSENGER</font></h4>
</div>
<div class="col-md-4">
		<script>
		 function searcher(){
			 var elem = document.getElementById("searchbox").value;
			 //load('track_investment')
			 load("regist?call="+elem);
			 return false;
		 }
		</script>
		<form onsubmit="return searcher()">
		<div class="row">
		<div class="col-md-9"><input type="text" placeholder="Search by Email | Name | Mobile" id="searchbox" class="form-control " name=""/></div>
		<div class="col-md-3"><button class="btn btn-success"><i class="fa fa-search"></i> Go</button></div>
		</div>
		</form>
		
</div>
<div class="col-md-4">
	<button onclick="load('regist')" class="btn btn-info"><i class="fa fa-user"></i>&nbsp;&nbsp; Users Account</button>
	<button onclick="load('message_all')" class="btn btn-success"><i class="fa fa-send"></i>&nbsp;&nbsp; Message all&nbsp;&nbsp;</button>
</div>
</div>

<?php
if(x_validateget("email") && x_validateget("uid")){
	?>
<div style="margin-top:30pt;" class="row">
<div class="col-lg-6 col-md-6">
<img src="img/message.png" class="img-responsive"/>
<button style="margin-left:60px;" class="btn btn-lg btn-warning"><i class="fa fa-envelope-o"></i> &nbsp;&nbsp;RECENT MESSAGES <span class="badge">0</span></button>
</div>
<div class="col-lg-6 col-md-6">
	<?php
	$uid = xg("uid"); $email = xg("email");
	if(x_count("userdb_bank","id='$uid' LIMIT 1") > 0){
		foreach(x_select("user_photo,name,email,mobile,realtime","userdb_bank","id='$uid'","1","id") as $key){
			$name = $key["name"];$email = $key["email"];$join = $key["realtime"];
			$mobile = $key["mobile"];$user_photo = $key["user_photo"];
			?>
			<ul class="list-group">
				<li class="list-group-item">
					<center><img src="<?php
					if($user_photo == ""){
						?>img/users.png<?php
					}else{
						if(file_exists("../$user_photo")){
							echo "../".$user_photo;
						}else{
							?>img/users.png<?php
						}
					}
					?>" style="width:100px;border-radius:100%;margin-top:-50px;" class="img-responsive"/></center>
					
				</li>
				<li class="list-group-item"><i class="fa fa-user"></i>&nbsp;&nbsp; <?php echo $name;?> </li>
				<li class="list-group-item"><i class="fa fa-envelope-o"></i> &nbsp;&nbsp;<?php echo $email;?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-phone"></i> &nbsp;&nbsp;<?php echo $mobile;?></li>
				
				<li class="list-group-item">
				
				<form style="margin-top:15pt;" onsubmit="">
				<p> Message Title:</p>
					<input type="text" class="form-control" style="padding:10px;margin-bottom:10px;height:40px;" placeholder="Enter Title"/>
					<p> Message Content:</p>
					<textarea class="form-control" name="message" placeholder="Enter Message"></textarea>
					<input type="hidden" value="<?php echo $_GET['email'];?>" name="email"/>
					<input type="hidden" value="<?php echo $_GET['uid'];?>" name="uid"/>
					<button style="padding:12px;" class="btn btn-sm btn-primary"><i class="fa fa-envelope-o"></i>&nbsp;&nbsp; Send Message</button>
				</form>
				
				</li>
			</ul>
			<?php
		}
	}
	?>
	
</div>
<!---<div class="col-lg-3 col-md-3"></div>-->
</div>
<!--------Removing tinymce label------------>
<style type="text/css">
.mce-branding{
	display:none;
}
</style>
	<?php
}else{
	?>
	<p style="text-align:center;">
	<i class="fa fa-trash" style="font-size:40pt;"></i><br/><br/>
	Invalid parameter Detected
	</p>
	<?php
}
?>
