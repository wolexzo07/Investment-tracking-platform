<?php
include_once("finishit.php");
xstart(0);
include_once("refcoder.php");
if(x_count("portalmode","status='offline' AND id='1' LIMIT 1") > 0){

	finish("notify/maintenance","Access denied!");
	exit();
}

?>
<!DOCTYPE html>
<html>
<head>
<?php include("abtop.php");?>
  <meta name="description" content="Abocent investments is a top savings and investment platform that began in Nigeria some years ago (2018). We then only operated as an investment firm by simply taking funds from investors and investing them into our major stream of investment: Catfish Farming. We would then afterwards give our investors good returns on their invested funds at the agreed-upon date"/>
  <meta name="keywords" content="Investing,Taking funds,Forex Trader,Financial Freedom,how to make money,online business,what to do,investing money,Funding,profiting more."/>
  <title>Abocent Capitals - Top savings and investment platform that began in Nigeria some years ago (2018) </title>
<?php include("abhead.php");?>
</head>
<body>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/58ac49c227e1fd0aacbb9322/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=5aa286f3878d220013f1647e&product=sticky-share-buttons"></script>

<?php include("navbarboss.php");?>

<?php
			use Jenssegers\Agent\Agent;
			$agent = new Agent();
			$desktop = $agent->isDesktop();
			if($desktop){}else{}
				?>
<section style="margin-top:40pt;" class="cid-s0qYyiLvNx" id="image2-v">

    

    <figure class="mbr-figure">
        <div class="image-block" style="width: 100%;">
            <img src="assets/images/useall-2698x1517.jpg" alt="Mobirise" title="">
            
        </div>
    </figure>
</section>



<section style="display:none;" class="header1 cid-rUAMKBhVBc" id="header1-0">

    <div class="mbr-overlay" style="opacity: 0.4; background-color: rgb(127, 25, 51);">
    </div>

    <div class="container">
        <div class="row justify-content-md-center">
            <div class="mbr-white col-md-10">
                <h1 class="mbr-section-title align-center mbr-bold pb-3 mbr-fonts-style display-2">
                    Abocent&nbsp;<span style="font-weight: normal;">Investments</span></h1>
                <h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">...an investment firm you can trust</h3>
                <p class="mbr-text align-center pb-3 mbr-fonts-style display-5">Investing puts money to work. The major reason to save money should be to invest it.&nbsp;-&nbsp;Grant Cardone</p>
                <div class="mbr-section-btn align-center"><a class="btn btn-md btn-warning display-7" href="ApplicationForm"><span class="mbrib-touch mbr-iconfont mbr-iconfont-btn"></span>
                        GET STARTED</a></div>
            </div>
        </div>
    </div>

</section>


<section class="header1 cid-rUDOwhjKTH" id="header16-2">

    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-10 align-center">
                
                
                <p class="mbr-text pb-3 mbr-fonts-style display-7">
                    Investing puts money to work. The major reason to save money should be to invest it.&nbsp;-&nbsp;<br><em><strong>Grant Cardone</strong></em></p>
                
            </div>
        </div>
    </div>

</section>

<section class="features10 cid-rUE3m9UVd4" id="features10-j">

    

    
    <div class="container">
        <div class="row justify-content-center">
            <div class="card p-3 col-12 col-md-6 col-lg-4">
                <div class="media mb-3">
                    <div class="card-img align-self-center">
                        <span class="mbr-iconfont mbrib-browse"></span>
                    </div>
                    <h4 class="card-title media-body py-3 mbr-fonts-style display-7">
                        Multiple Deposit</h4>
                </div>
                <div class="card-box">
                    <p class="mbr-text mbr-fonts-style display-7">We have multiple deposit methods.You can choose from different options we have.</p>
                </div>
            </div>

            <div class="card p-3 col-12 col-md-6 col-lg-4">
                <div class="media mb-3">
                    <div class="card-img align-self-center">
                        <span class="mbr-iconfont mbrib-responsive"></span>
                    </div>
                    <h4 class="card-title media-body py-3 mbr-fonts-style display-7">Flexible Dashboard</h4>
                </div>
                <div class="card-box">
                    <p class="mbr-text mbr-fonts-style display-7">Our user dashboard is very easy to use.It can track all your investment in realtime.</p>
                </div>
            </div>

            <div class="card p-3 col-12 col-md-6 col-lg-4">
                <div class="media mb-3">
                    <div class="card-img align-self-center">
                        <span class="mbr-iconfont mbrib-touch-swipe"></span>
                    </div>
                    <h4 class="card-title media-body py-3 mbr-fonts-style display-7">Instant withdrawal</h4>
                </div>
                <div class="card-box">
                    <p class="mbr-text mbr-fonts-style display-7">Instant withdrawal is available after maturity of investments.</p>
                </div>
            </div>

            
        </div>
    </div>
</section>

<section class="progress-bars3 cid-rUGiyrTPuj" id="progress-bars3-r">
 <?php
 if(x_count("investment_duration","status='1' LIMIT 1") > 0){
	 // Getting 4 months duration
	 foreach(x_select("pecentage_roi","investment_duration","status='1' AND id='1'","1","id") as $key){
		$four_Month = $key["pecentage_roi"]; 
	 }
	  // Getting 8 months duration
	 foreach(x_select("pecentage_roi","investment_duration","status='1' AND id='2'","1","id") as $key){
		$eight_Month = $key["pecentage_roi"]; 
	 }
	  // Getting 12 months duration
	 foreach(x_select("pecentage_roi","investment_duration","status='1' AND id='3'","1","id") as $key){
		$twelve_Month = $key["pecentage_roi"]; 
	 }
 }else{
	 $four_Month = 4;$eight_Month=0;$twelve_Month=0;
 }
 
 ?>
    <div class="container">
        <h2 class="mbr-section-title pb-3 align-center mbr-fonts-style display-2">
            Juicy ROI</h2>
		
	
			        <div class="media-container-row pt-5 mt-2">
            <div class="card p-3 align-center">
                <div class="wrap">
				
                    <div class="pie_progress progress1" role="progressbar" data-goal="<?php echo $four_Month;?>">
                        <p class="pie_progress__number mbr-fonts-style display-5"></p>
                    </div>
                </div> 
                <div class="mbr-crt-title pt-3">
                    <h4 class="card-title py-2 mbr-fonts-style display-7">
                        + Capital in 4 months</h4>
                </div>                 
            </div>

            <div class="card p-3 align-center">
                <div class="wrap">
                    <div class="pie_progress progress2" role="progressbar" data-goal="<?php echo $eight_Month;?>">
                        <p class="pie_progress__number mbr-fonts-style display-5"></p>
                    </div>
                </div> 
                <div class="mbr-crt-title pt-3">
                    <h4 class="card-title py-2 mbr-fonts-style display-7">
                        + Capital in 8 months</h4>
                </div>                 
            </div>

            <div class="card p-3 align-center">
                <div class="wrap">
                    <div class="pie_progress progress3" role="progressbar" data-goal="<?php echo $twelve_Month;?>">
                        <p class="pie_progress__number mbr-fonts-style display-5"></p>
                    </div>
                </div> 
                <div class="mbr-crt-title pt-3">
                    <h4 class="card-title py-2 mbr-fonts-style display-7">+ Capital in 12 months</h4>
                </div>                 
            </div>

            <!---<div style="display:none;" class="card p-3 align-center">
                <div class="wrap">
                    <div class="pie_progress progress4" role="progressbar" data-goal="80">
                        <p class="pie_progress__number mbr-fonts-style display-5">12%</p>
                    </div>
                </div> 
                <div class="mbr-crt-title pt-3">
                    <h4 class="card-title py-2 mbr-fonts-style display-7">
                        + Capital in 1 month</h4>
                </div>                 
            </div>--->

            

            
        </div>

		

</div>

</section>



<?php
if(x_count("offer_tracking","status='1' AND id='1' LIMIT 1") > 0){
	?><section style="background-color:white;padding-bottom:30pt;" class="content wrapper text-center">
	<div class="container">
	<?php
	foreach(x_select("timecount,headertext,descriptext","offer_tracking","status='1' AND id='1'","1","id") as $key){
		$tc = $key["timecount"];
		$ht = $key["headertext"];
		$dt = $key["descriptext"];
		?>
				<h4><?php echo $ht." <font style='color:gray;'>$tc</font>";?></h4>
		<!--<p class="description"><?php echo $dt;?></p>

		<p><?php //echo $tc;?></p>-->
		<?php
	}
?></div></section><?php
}else{

}
?>



		<?php
		if($desktop || !$desktop){
			?><section class="pricing-table1 cid-rUEk5lPZ1D" id="pricing-tables1-p">

    <div class="container-fluid">
		<?php
			if(x_count("iqplans","id='1' AND status='1' LIMIT 1") > 0){
				foreach(x_select("0","iqplans","id='1' AND status='1'","1","id") as $key){
					$plan = ucfirst($key["type"]);
					$from = $key["from_amount"];
					$to = $key["to_amount"];
					$cur = $key["currency"];
					$status = $key["status"];
				}
			}
			?>
			        <div class="media-container-row">
            <div class="plan col-12 mx-2 my-2 justify-content-center col-lg-3">
                <div class="plan-header text-center pt-5">
                    <h3 class="plan-title mbr-fonts-style display-5">
                        <?php echo $plan;?> Plan<br><br></h3>
                    <div class="plan-price">
                        <span class="price-value mbr-fonts-style display-5">
                            <sup><?php echo $cur;?></sup>
                        </span>
						<?php
						if($desktop){
							?>
							<span class="price-figure mbr-fonts-style display-6"><?php echo number_format($from,0);?> - <?php echo number_format($to,0);?></span>
							<?php
						}
						?>
                        
                        
                    </div>
				
                </div>
                <div class="plan-body pb-5">
                    <div class="plan-list align-center">
                        <ul class="list-group list-group-flush mbr-fonts-style display-7">
						
							<div class="list-group-item"></div>
							<?php
							if(!$desktop){
								?>
								<div class="list-group-item"><?php echo number_format($from,0);?> - <?php echo number_format($to,0);?></div>
								<?php
							}
							?>
							
							<div class="list-group-item">ROI + Capital</div>
							<div class="list-group-item">4-12 Months maturity</div>
							<div class="list-group-item">instant withdrawal</div>
						</ul>
                    </div>
                    <div class="mbr-section-btn text-center pt-4">
						<a href="ApplicationForm" class="btn btn-sm btn-primary display-4"><span class="mbrib-browse mbr-iconfont mbr-iconfont-btn"></span>INVEST</a>
					</div>
                </div>
            </div>
				
				<?php
			if(x_count("iqplans","id='2' AND status='1' LIMIT 1") > 0){
				foreach(x_select("0","iqplans","id='2' AND status='1'","1","id") as $key){
					$plan = ucfirst($key["type"]);
					$from = $key["from_amount"];
					$to = $key["to_amount"];
					$cur = $key["currency"];
					$status = $key["status"];
				}
			}
				?>
				
            <div class="plan col-12 mx-2 my-2 justify-content-center col-lg-3">
                <div class="plan-header text-center pt-5">
                      <h3 class="plan-title mbr-fonts-style display-5">
                        <?php echo $plan;?> Plan<br><br></h3>
                    <div class="plan-price">
                        <span class="price-value mbr-fonts-style display-5">
                            <sup><?php echo $cur;?></sup>
                        </span>
                      <?php
						if($desktop){
							?>
							<span class="price-figure mbr-fonts-style display-6"><?php echo number_format($from,0);?> - <?php echo number_format($to,0);?></span>
							<?php
						}
						?>
                        
                    </div>
                </div>
                <div class="plan-body pb-5">
                    <div class="plan-list align-center">
                        <ul class="list-group list-group-flush mbr-fonts-style display-7">
						<div class="list-group-item"></div>
						<?php
							if(!$desktop){
								?>
								<div class="list-group-item"><?php echo number_format($from,0);?> - <?php echo number_format($to,0);?></div>
								<?php
							}
							?>
							<div class="list-group-item">ROI + Capital</div>
							<div class="list-group-item">4-12 Months maturity</div>
							<div class="list-group-item">instant withdrawal</div>
						</ul>
                    </div>
                    <div class="mbr-section-btn text-center pt-4"><a href="ApplicationForm" class="btn btn-sm btn-success display-4"><span class="mbrib-browse mbr-iconfont mbr-iconfont-btn"></span>INVEST</a></div>
                </div>
            </div>
			
				<?php
			if(x_count("iqplans","id='3' LIMIT 1") > 0){
				foreach(x_select("0","iqplans","id='3'","1","id") as $key){
					$plan = ucfirst($key["type"]);
					$from = $key["from_amount"];
					$to = $key["to_amount"];
					$cur = $key["currency"];
					$status = $key["status"];
				}
			}
				?>
            <div class="plan col-12 mx-2 my-2 justify-content-center col-lg-3">
                <div class="plan-header text-center pt-5">
                     <h3 class="plan-title mbr-fonts-style display-5">
                        <?php echo $plan;?> Plan<br><br></h3>
                    <div class="plan-price">
                        <span class="price-value mbr-fonts-style display-5">
                            <sup><?php echo $cur;?></sup>
                        </span>
                      <?php
						if($desktop){
							?>
							<span class="price-figure mbr-fonts-style display-6"><?php echo number_format($from,0);?> - <?php echo number_format($to,0);?></span>
							<?php
						}
						?>
                        
                    </div>
                </div>
                <div class="plan-body pb-5">
                    <div class="plan-list align-center">
                        <ul class="list-group list-group-flush mbr-fonts-style display-7">
						<div class="list-group-item"></div>
						<?php
							if(!$desktop){
								?>
								<div class="list-group-item"><?php echo number_format($from,0);?> - <?php echo number_format($to,0);?></div>
								<?php
							}
							?>
							<div class="list-group-item">ROI + Capital</div>
							<div class="list-group-item">4-12 Months maturity</div>
							<div class="list-group-item">instant withdrawal</div>
						</ul>
                    </div>
                    <div class="mbr-section-btn text-center pt-4">
					<?php
					if($status == "1"){
						?>
						<a href="ApplicationForm" class="btn btn-sm btn-primary display-4"><span class="mbrib-cash mbr-iconfont mbr-iconfont-btn"></span>INVEST</a>
						<?php
					}else{
						?>
						<a href="#" class="btn btn-sm btn-primary display-4"><span class="mbrib-cash mbr-iconfont mbr-iconfont-btn"></span>COMING SOON</a>
						<?php
					}
					?>
					</div>
                </div>
            </div>
		<?php
			if(x_count("iqplans","id='4' LIMIT 1") > 0){
				foreach(x_select("0","iqplans","id='4'","1","id") as $key){
					$plan = ucfirst($key["type"]);
					$from = $key["from_amount"];
					$to = $key["to_amount"];
					$cur = $key["currency"];
					$status = $key["status"];
				}
			}
				?>
            <div class="plan col-12 mx-2 my-2 justify-content-center col-lg-3">
                <div class="plan-header text-center pt-5">
                     <h3 class="plan-title mbr-fonts-style display-5">
                        <?php echo $plan;?> Plan<br><br></h3>
                    <div class="plan-price">
                        <span class="price-value mbr-fonts-style display-5">
                            <sup><?php echo $cur;?></sup>
                        </span>
                        <?php
						if($desktop){
							?>
							<span class="price-figure mbr-fonts-style display-6"><?php echo number_format($from,0);?> +</span>
							<?php
						}
						?>
                        
                    </div>
                </div>
                <div class="plan-body pb-5">
                    <div class="plan-list align-center">
                        <ul class="list-group list-group-flush mbr-fonts-style display-7">
						<div class="list-group-item"></div>
						<?php
							if(!$desktop){
								?>
								<div class="list-group-item"><?php echo number_format($from,0);?> + </div>
								<?php
							}
							?>
							<div class="list-group-item">ROI + Capital</div>
							<div class="list-group-item">4-12 Months maturity</div>
							<div class="list-group-item">instant withdrawal</div>
						</ul>
                    </div>
                    <div class="mbr-section-btn text-center pt-4">
					
					<?php
					if($status == "1"){
						?>
						<a href="ApplicationForm" class="btn btn-sm btn-success display-4"><span class="mbrib-cash mbr-iconfont mbr-iconfont-btn"></span>INVEST</a>
						<?php
					}else{
						?>
						<a href="#" class="btn btn-sm btn-success display-4"><span class="mbrib-cash mbr-iconfont mbr-iconfont-btn"></span>COMING SOON</a>
						<?php
					}
					?>
					</div>
                </div>
            </div>
        </div>
    	</div>
</section>
			<?php
	}else{
			?>
			
			<?php
		}
		?>




<section class="step1 cid-rUDRGTR1GE" id="step1-6">

    <div class="container">
        
       <!--- <h3 class="mbr-section-subtitle pb-5 mbr-fonts-style align-center display-5"><strong>Steps to making investment</strong></h3>-->
		<h2 style="font-weight:bold;margin-bottom:30pt;text-align:center;" class="mbr-section-title pb-3 mbr-fonts-style display-5">STEPS TO INVESTING</h2>
        <div class="step-container">
            <div class="card separline pb-4">
                <div class="step-element d-flex">
                    <div class="step-wrapper pr-3">
                        <h3 class="step d-flex align-items-center justify-content-center">
                            1
                        </h3>
                    </div>          
                    <div class="step-text-content">
                        <h4 class="mbr-step-title pb-3 mbr-fonts-style display-5">Register an account</h4>
                        <p class="mbr-step-text mbr-fonts-style display-7">
                            You must have a valid account with us before you can invest into any of our plans.
                        </p>
                    </div>
                </div>
            </div>

            <div class="card separline pb-4">
                <div class="step-element d-flex">
                    <div class="step-wrapper pr-3">
                        <h3 class="step d-flex align-items-center justify-content-center">
                            2
                        </h3>
                    </div>          
                    <div class="step-text-content">
                        <h4 class="mbr-step-title pb-3 mbr-fonts-style display-5">Choose an investment plan</h4>
                        <p class="mbr-step-text mbr-fonts-style display-7">
                            You must choose an investment plan you want to use.Multiple investment can be made through our easy to use platform.</p>
                    </div>
                </div>
            </div>

            <div class="card separline pb-4">
                <div class="step-element d-flex">
                    <div class="step-wrapper pr-3">
                        <h3 class="step d-flex align-items-center justify-content-center">
                            3
                        </h3>
                    </div>          
                    <div class="step-text-content">
                        <h4 class="mbr-step-title pb-3 mbr-fonts-style display-5">Make your deposit</h4>
                        <p class="mbr-step-text mbr-fonts-style display-7">Then make your deposit with any of the supported mediums in your country.
                        </p>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="step-element d-flex">
                    <div class="step-wrapper pr-3">
                        <h3 class="step d-flex align-items-center justify-content-center">
                            4
                        </h3>
                    </div>          
                    <div class="step-text-content">
                        <h4 class="mbr-step-title pb-3 mbr-fonts-style display-5">Wait &nbsp;for maturity time</h4>
                        <p class="mbr-step-text mbr-fonts-style display-7">
                            And then you are expected to wait for the investment maturity date before making any withdrawal.&nbsp;</p>
                    </div>
                </div>
            </div>
            
            
            
            
            
            
            
            
            
            
        </div>
    </div>
</section>


            <!--News update in progress-->
			<?php 
		   if(x_count("writepost","status='1' LIMIT 1") > 0){
			   $countme = 0;
			   ?>
			   <section class="timeline2 cid-rUDQ0PIhxm" id="timeline2-3">
    <div class="mbr-overlay" style="opacity: 0.9; background-color: rgb(204, 204, 204);">
    </div>
    <div class="container align-center">
        <!---<h2 class="mbr-section-title pb-3 mbr-fonts-style display-5">NEWS UPDATE</h2>--->
        <h2 style="font-weight:bold;margin-bottom:30pt;text-align:center;" class="mbr-section-title pb-3 mbr-fonts-style display-5">NEWS UPDATE</h2>

        <div class="container timelines-container" mbri-timelines="">
			   <?php
			  $counterme = x_querycount("writepost WHERE status='1' LIMIT 10");
			   foreach(x_select("0","writepost","status='1'","10","id desc") as $key){
				    $countme++;
				   $id = $key["id"];
				    $title = $key["title"];
					 $path = $key["user_photo"];
						$full = $key["full"];
						
				
						if($countme%2 == "0"){
							
							?>
				 <div class="row timeline-element separline">
                <span class="iconsBackground">
                    <span class="mbri-pages mbr-iconfont"></span>
                </span>
                <div class="col-xs-12 col-md-6 align-left ">
                    <div class="timeline-text-content">
                        <h4 class="mbr-timeline-title pb-3 mbr-fonts-style display-5">
                            <?php echo ucfirst(strtolower($title));?></h4>
                        <p class="mbr-timeline-text mbr-fonts-style display-7">
                           <?php echo $full;?></p>
                    </div>
                </div>
            </div>
							<?php
						}elseif(($countme == $counterme) && ($countme%2 == "0")){
							?>
				<div class="row timeline-element separline">
                <span class="iconsBackground">
                    <span class="mbri-pages mbr-iconfont"></span>
                </span>
                <div class="col-xs-12 col-md-6 align-left ">
                    <div class="timeline-text-content">
                        <h4 class="mbr-timeline-title pb-3 mbr-fonts-style display-5">
                             <?php echo ucfirst(strtolower($title));?></h4>
                        <p class="mbr-timeline-text mbr-fonts-style display-7">
                            <?php echo $full;?></p>
                    </div>
                </div>
            </div>
							<?php
						}elseif(($countme == $counterme) && ($countme%2 != "0")){
							?>
				<div class="row timeline-element reverse">
                <span class="iconsBackground">
                    <span class="mbri-pages mbr-iconfont"></span>
                </span>
                <div class="col-xs-12 col-md-6 align-left ">
                    <div class="timeline-text-content">
                        <h4 class="mbr-timeline-title pb-3 mbr-fonts-style display-5">
                             <?php echo ucfirst(strtolower($title));?></h4>
                        <p class="mbr-timeline-text mbr-fonts-style display-7">
                            <?php echo $full;?></p>
                    </div>
                </div>
            </div>
							<?php
						}else{
							?>
				   <div class="row timeline-element reverse separline">
                <span class="iconsBackground">
                    <span class="mbri-pages mbr-iconfont"></span>
                </span>          
                <div class="col-xs-12 col-md-6 align-left">
                    <div class="timeline-text-content">
                        <h4 class="mbr-timeline-title pb-3 mbr-fonts-style display-5">
                            <?php echo ucfirst(strtolower($title));?></h4>
                        <p class="mbr-timeline-text mbr-fonts-style display-7">
                            <?php echo $full;?>
                        </p>
                     </div>
                </div>
            </div>
							<?php
						}
						
						}
						?>
						      </div>
    </div>
</section>
						<?php
		   }else{
			   
		   }?>
		   
            <!---------New updates system finished---------->
  

<section class="carousel slide testimonials-slider cid-rUE2Wu03Yz" data-interval="false" id="testimonials-slider1-g">
    
    

    <div class="mbr-overlay" style="opacity: 0.8; background-color: rgb(255, 255, 255);">
    </div>

    <div class="container text-center">
        <!---<h2 class="pb-5 mbr-fonts-style display-2">Testimonials</h2>-->
	<h2 style="font-weight:bold;margin-bottom:30pt;" class="mbr-section-title pb-3 mbr-fonts-style display-5">TESTIMONIALS</h2>
			
        <div class="carousel slide" role="listbox" data-pause="true" data-keyboard="false" data-ride="carousel" data-interval="5000">
            <div class="carousel-inner">
                
                
           <?php 
		   if(x_count("testifyus","status='treated' LIMIT 1") > 0){
			   foreach(x_select("0","testifyus","status='treated'","10","id desc") as $key){
				   $id = $key["id"];
				    $name = $key["name"];
					 $ppath = $key["photo_path"];
					  $occ = $key["occupation"];
					   $msg = $key["message"];
					    $time = $key["timereal"];
						
						?>
						 <div class="carousel-item">
                    <div class="user col-md-8">
                        <div class="user_image">
                            <img src="<?php
							if($ppath == ""){
								echo 'assets/images/ad516503a11cd5ca435acc9bb6523536.png';
							}else{
								if(file_exists("test/".$ppath)){
									echo "test/".$ppath;
								}else{
									echo 'assets/images/ad516503a11cd5ca435acc9bb6523536.png';
								}
								
							}
							?>">
                        </div>
                        <div class="user_text pb-3">
                            <p class="mbr-fonts-style display-7">
                                <?php echo $msg;?>
                            </p>
                        </div>
                        <div class="user_name mbr-bold pb-2 mbr-fonts-style display-7">
                            <?php echo ucwords(strtolower($name));?>
                        </div>
                        <div class="user_desk mbr-light mbr-fonts-style display-7">
                            <?php echo ucwords(strtolower($occ));?>
                        </div>
                    </div>
                </div>
						<?php
			   }
		   }else{
			   
		   }
		   ?>

				</div>

            <div class="carousel-controls">
                <a class="carousel-control-prev" role="button" data-slide="prev">
                  <span aria-hidden="true" class="mbri-arrow-prev mbr-iconfont"></span>
                  <span class="sr-only">Previous</span>
                </a>
                
                <a class="carousel-control-next" role="button" data-slide="next">
                  <span aria-hidden="true" class="mbri-arrow-next mbr-iconfont"></span>
                  <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="counters6 counters cid-rUEdNaRv8K" id="counters6-o">

    

    

    <div class="container pt-4 mt-2">
        <!--<h2 class="mbr-section-title pb-3 align-center mbr-fonts-style display-2">Why Choose Us</h2>-->
        <h2 style="font-weight:bold;padding-bottom:30pt;text-align:center;" class="mbr-section-title pb-3 mbr-fonts-style display-5">WHY CHOOSE US</h2>
        <div>
                <div class="cards-container">
                    <div class="card col-12 col-md-6 col-lg-4 pb-md-4">
                        <div class="panel-item align-center">
                            <div class="card-img pb-3">
                                <h3 class="img-text mbr-fonts-style display-1">01.</h3>
                            </div>
                            <div class="card-text">
                                <h4 class="mbr-content-title mbr-bold mbr-fonts-style display-7">Our Priorities</h4>
                                <p class="mbr-content-text mbr-fonts-style display-7">
                                    Our investors' happiness is our first and topmost priority, seconded by our company's interest in profits and expansion, as we are of the strong belief that when we keep our investors and clients consistently happy, then we can always achieve our long term goals. It's a win-win!</p>
                            </div>
                        </div>
                    </div>
                    <div class="card col-12 col-md-6 col-lg-4 pb-md-4">
                        <div class="panel-item align-center">
                            <div class="card-img pb-3">
                                <h3 class="img-text mbr-fonts-style display-1">02.</h3>
                            </div>
                            <div class="card-text">
                                <h4 class="mbr-content-title mbr-bold mbr-fonts-style display-7">Our Professionalism and Reliability</h4>
                                <p class="mbr-content-text mbr-fonts-style display-7">
                                    We work only with teams of investment managers, investors, traders and executives with years of proven experiences in what they do, and with a heart for keeping our investors happy. This has enabled us to sustainably manage investors' funds judiciously and keep our investors happy over the years.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card col-12 col-md-6 col-lg-4 last-child">
                        <div class="panel-item align-center">
                            <div class="card-img pb-3">
                                <h3 class="img-text mbr-fonts-style display-1">03.</h3>
                            </div>
                            <div class="card-text">
                                <h4 class="mbr-content-title mbr-bold mbr-fonts-style display-7">Our Passion</h4>
                                <p class="mbr-content-text mbr-fonts-style display-7">
                                        Beyond money making, our passion is to create a sustainable system that gives people an advantage in life, not only by giving them good returns for their funds, but also through the devotion of some of our returns to charitable causes!</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
    </div>
</section>



<?php include("footer.php");?>
</body>
</html>