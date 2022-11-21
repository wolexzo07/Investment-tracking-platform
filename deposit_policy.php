<?php
include("finishit.php");
?>
<!DOCTYPE html>
<html>
<head>
<?php include("abtop.php");?>
  <meta name="description" content="Abocent investments is a top savings and investment platform that began in Nigeria some years ago (2018) as Remocent Investments. We then only operated as an investment firm by simply taking funds from investors and investing them into our major stream of investment: Catfish Farming. We would then afterwards give our investors good returns on their invested funds at the agreed-upon date"/>
  <meta name="keywords" content="Investing,Taking funds,Forex Trader,Financial Freedom,how to make money,online business,what to do,investing money,Funding,profiting more."/>
  <title>Abocent Capitals - Deposit policy</title>
<?php include("abhead.php");?>
</head>
<body>

<script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=5aa286f3878d220013f1647e&product=sticky-share-buttons"></script>



<?php include("navbarboss.php");?>
<section class="header1 cid-rUAMKBhVBc mbr-parallax-background" id="header1-0">

<div class="mbr-overlay" style="opacity: 0.3; background-color: rgb(20, 157, 204);">
    </div>

    <div class="container">
        <div class="row justify-content-md-center">
            <div class="mbr-white col-md-10">
			<?php
			use Jenssegers\Agent\Agent;
			$agent = new Agent();
			$desktop = $agent->isDesktop();
			?>
				<h1 class="mbr-section-title align-center mbr-bold pb-3 mbr-fonts-style display-1">
                    Deposit&nbsp;<span style="font-weight: normal;"> Policy</span></h1>
             
            </div>
        </div>
    </div>

</section>

<section class="header1 cid-rUDOwhjKTH" id="header16-2">

    <div class="container">
        <div class="row justify-content-md-center">
            <div style="font-size:15pt;padding-bottom:30pt" class="col-md-12">
                
                
             <?php
			 if(x_count("siteinfo","type='deposit' AND status='1'") > 0){
				 foreach(x_select("entry","siteinfo","type='deposit' AND status='1'","1","id") as $key){
					$entry = $key["entry"]; 
					echo $entry;
				 }
			 }
			 ?>
			 
                
            </div>
        </div>
    </div>

</section>


<?php include("footer.php");?>
</body>
</html>