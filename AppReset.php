<?php
include_once("finishit.php");
if(x_count("portalmode","status='offline' AND id='1' LIMIT 1") > 0){

	finish("notify/maintenance","Access denied!");
	exit();
}?>
<html>
<head>
<title>Abocent - Password Reset </title>

	<meta name="description" content="Reset abocent account password , top savings and investment platform that began in Nigeria some years ago (2018) as Remocent Investments."/>

   <meta name="keywords" content="Investing,Taking funds,Forex Trader,Financial Freedom,how to make money,online business,what to do,investing money,Funding,profiting more."/>

<?php include_once("headextra.php");?>
</head>
<body class="renew">

<div class="boxsh">
	<div class="modal-dialog modal-signup">
	    <div class="modal-content">
			<div class="card card-signup card-plain">
				<div class="modal-header">
		        	<center>
					<img src="image/logboss.png" onclick="parent.location='./'" class="img-responsive" id="toru"/>
					<h3 class="modal-title card-title text-center" id="myModalLabel"><font class="furbish">Reset</font> Password</h3></center>
		      	</div>
		      	<div class="modal-body">
					<div class="row">

						<div class="col-md-12">

							<form class="form" id="resetme" method="POST" autocomplete="off">
								<div class="card-content">


									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-inbox fa-2x"></i>
										</span>
										<input type="text" autocomplete="off" required="required" class="form-control" placeholder="Email..." name="email"/>
									</div>


									<input type="hidden" name="blessme" value="<?php echo sha1(uniqid());?>"/>
									<div class="fr">
									<div class="g-recaptcha" data-sitekey="6LcDo1sUAAAAAEPlrWpeHZlvDbV1ydwDuM0lJe9N"></div>
									</div>
									<!-- If you want to add a checkbox to this form, uncomment this code -->


								</div>
								<div class="modal-footer text-center">
									<button type="submit" class="btn btn-primary btn-round"><i class="fa fa-sign-in"></i> &nbsp;Reset password</button>
								</div>
							</form>

							<script src="log.js"></script>
							<script>
							proform("#resetme","reset_pass","#gallery","");
							</script>
							<div style="margin-top:10pt;display:none;color:green;font-weight:bold;" id="gallery"><img style="width:50px;" src="image/load.gif"/></div>


							<div class="social text-center">
								<button class="btn btn-just-icon btn-round btn-twitter">
									<i class="fa fa-twitter"></i>
								</button>
								<button class="btn btn-just-icon btn-round btn-dribbble">
									<i class="fa fa-dribbble"></i>
								</button>
								<button class="btn btn-just-icon btn-round btn-facebook">
									<i class="fa fa-facebook"> </i>
								</button>
								<!--<h4> or be classical </h4>-->
							</div>
							<div class="changebase text-center">
							<a href="ApplicationForm" class="linkiq">Sign-up</a> | 
							<a href="ApplicationLogin" class="linkiq">Sign-in</a>
							</div>
						</div>
					</div>
		      	</div>
			</div>
	    </div>
	</div>
</div>
<!--  End Modal -->


<?php include_once("footextra.php");?>
</body>
</html>
