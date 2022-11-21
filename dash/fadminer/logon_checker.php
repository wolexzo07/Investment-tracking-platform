<?php include_once("headextra.php");?>
		
<?php //include_once("logo.php");?></legend>




  <div class="col-md-4">
  
  </div>
  <div class="col-md-4">
	
	<div class="list-group">
			<div class="list-group-item">
				<h4><i class="fa fa-sign-in"></i>&nbsp;&nbsp; CPANEL <font style="color:green;">LOGIN</font></h4>
			</div>
		<div class="list-group-item">
		<center><img src="img/undraw_Login_v483.png" class="img-responsive" style="width:120px;"/></center>
		
		  <form method="POST" action="prologin" autocomplete="off">
   <div class="row">
 
 <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
 
 <p style="display:block;font-weight:bold;color:green;" class="txt"><i class="fa fa-user"></i>&nbsp;&nbsp; Admin userid.</p>
<input type="text" autocomplete="off"  class="form-control" required="" placeholder="Enter valid admin ID." style="height:50px;padding:10px;" name="matric"/>
 
 </div>

 
  <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
 
 <p style="display:block;font-weight:bold;color:purple;"  class="txt"><i class="fa fa-lock"></i>&nbsp;&nbsp; Admin password.</p>
<input type="password" style="height:50px;padding:10px;" autocomplete="off" class="form-control" required="" placeholder="Enter valid password" name="pass"/>
 
 </div>

 </div>

 
 <input type="hidden" name="tellme" value="<?php echo sha1(uniqid());?>"/>
 <button style="height:50px;padding:10px;margin-top:30px;" class="btn btn-success btn-lg fr"><i class="fa fa-sign-in"></i> Sign In</button>

</form>
		
		</div>
		<div class="list-group-item"></div>
		
	</div>
  

  </div>
  <div class="col-md-4">
  
  </div>
 

 


<?php include_once("footextra.php");?>



