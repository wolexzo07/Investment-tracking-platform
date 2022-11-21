<?php 
include_once("../../finishit.php");
xstart("0");
if(x_validatepost("email") && x_validatepost("uid")){
	$email = xpmail("email");
	$uid = xp("uid");
	
	if(x_count("userdb_bank","id='$uid' AND email='$email' LIMIT 1") > 0){
		
	}else{
		
	}
	
}else{
	?>
	<div class="alert ">
	<i class="fa fa-minus"></i> Parameter Missing
	</div>
	<?php
}
?>