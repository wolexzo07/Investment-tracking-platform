<?php
include_once("finishit.php");
xstart(0);
include_once("refcoder.php");
if(x_count("portalmode","status='offline' AND id='1' LIMIT 1") > 0){

	finish("notify/maintenance","Access denied!");
	exit();
}

if(isset($_SESSION["IQGAMES_EMAIL_2018_VISION"])){
	finish("dash/manpag","0");
	exit();
}
?>
<html>
<head>
<title>Abocent - Login | Sign In</title>

	<meta name="description" content="Login into your abocent account , top savings and investment platform that began in Nigeria some years ago (2018) as Remocent Investments."/>

   <meta name="keywords" content="Abocent.com login,Abocent login,Abocent.com sign in,Abocent sign in,Investing,Taking funds,Forex Trader,Financial Freedom,how to make money,online business,what to do,investing money,Funding,profiting more."/>

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
					<h3 class="modal-title card-title text-center" id="myModalLabel"><font class="furbish">Login</font> into account</h3>

					<?php
					if(isset($_GET["msg"]) && !empty($_GET["msg"])){
						?><p class="hubmsg" style="border:1px dashed green;padding:10px;margin-top:10pt;color:green;"><?php x_print($_GET["msg"]);?></p><?php
					}
					?>
					</center>
		      	</div>
		      	<div class="modal-body">
					<div class="row">

						<div class="col-md-12">
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/scriptloaded.js"></script>


		<form id="processlogboss" class="form" method="POST" autocomplete="off">

								<div class="card-content">
					<?php
					if(x_validateget("keyaccess")){
						
						if(xg("keyaccess") == "1"){
							?>
							<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-user fa-2x"></i>
										</span>
								<input id="email" type="text" autocomplete="off" required="required" class="form-control" placeholder="Mobile or email..." name="email"/>
									</div>

									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-lock fa-2x"></i>
										</span>
										<input type="password" id="pass" autocomplete="off" required="required" placeholder="Password..." class="form-control" name="pass" value="payup" readonly />
									</div>

							<?php
						}
						
					}
					?>
									
								<!---<div class="fr">
									<div class="g-recaptcha" data-sitekey="6LcDo1sUAAAAAEPlrWpeHZlvDbV1ydwDuM0lJe9N"></div>
								</div>--->

									<input type="hidden" name="blessme" value="<?php echo sha1(uniqid());?>"/>


								</div>
								<div class="modal-footer text-center">
									<button type="submit" class="btn btn-primary btn-round"><i class="fa fa-sign-in"></i> &nbsp;Sign In</button>
								</div>
							</form>
							<div style="margin-top:10pt;display:none;color:green;font-weight:bold;text-center" id="gallery"><img src="image/load.gif" class="img-responsive" style="width:80px;"/></div>
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
							<a href="AppReset" class="linkiq">Reset Password</a> | <a href="ApplicationForm" class="linkiq">Sign-up Now</a>
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
