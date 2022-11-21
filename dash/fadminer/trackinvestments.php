<?php
include_once("../../finishit.php");
include_once("validate.php");

if(isset($_GET["sm"])){

if(isset($_GET['call']) && !empty($_GET['call'])){
$call = x_clean($_GET['call']);
$query="select id from investment_master WHERE tranx_id LIKE '%$call%' OR amount_invested LIKE '%$call%' OR startdate LIKE '%$call%' OR enddate LIKE '%$call%' order by user_id desc";
}else{
$query="select id from investment_master order by user_id desc";
}
$res    = mysqli_query(x_cstring(),$query);
$count  = mysqli_num_rows($res);
$page = (int) (!isset($_REQUEST['pageId']) ? 1 :$_REQUEST['pageId']);
$page = ($page == 0 ? 1 : $page);
$recordsPerPage = 20;
$start = ($page-1) * $recordsPerPage;
$adjacents = "2";

$prev = $page - 1;
$next = $page + 1;
$lastpage = ceil($count/$recordsPerPage);
$lpm1 = $lastpage - 1;
$pagination = "";
if($lastpage > 1)
    {
        $pagination .= "<div class='pagination'>";
        if ($page > 1)
            $pagination.= "<a href=\"#Page=".($prev)."\" onClick='changePagination(".($prev).");'>&laquo; Previous&nbsp;&nbsp;</a>";
        else
            $pagination.= "<span class='disabled'>&laquo; Previous&nbsp;&nbsp;</span>";
        if ($lastpage < 7 + ($adjacents * 2))
        {
            for ($counter = 1; $counter <= $lastpage; $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<span class='current'>$counter</span>";
                else
                    $pagination.= "<a href=\"#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a>";

            }
        }
        elseif($lastpage > 5 + ($adjacents * 2))
        {
            if($page < 1 + ($adjacents * 2))
            {
                for($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                {
                    if($counter == $page)
                        $pagination.= "<span class='current'>$counter</span>";
                    else
                        $pagination.= "<a href=\"#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a>";
                }
                $pagination.= "...";
                $pagination.= "<a href=\"#Page=".($lpm1)."\" onClick='changePagination(".($lpm1).");'>$lpm1</a>";
                $pagination.= "<a href=\"#Page=".($lastpage)."\" onClick='changePagination(".($lastpage).");'>$lastpage</a>";

           }
           elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
           {
               $pagination.= "<a href=\"#Page=\"1\"\" onClick='changePagination(1);'>1</a>";
               $pagination.= "<a href=\"#Page=\"2\"\" onClick='changePagination(2);'>2</a>";
               $pagination.= "...";
               for($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
               {
                   if($counter == $page)
                       $pagination.= "<span class='current'>$counter</span>";
                   else
                       $pagination.= "<a href=\"#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a>";
               }
               $pagination.= "..";
               $pagination.= "<a href=\"#Page=".($lpm1)."\" onClick='changePagination(".($lpm1).");'>$lpm1</a>";
               $pagination.= "<a href=\"#Page=".($lastpage)."\" onClick='changePagination(".($lastpage).");'>$lastpage</a>";
           }
           else
           {
               $pagination.= "<a href=\"#Page=\"1\"\" onClick='changePagination(1);'>1</a>";
               $pagination.= "<a href=\"#Page=\"2\"\" onClick='changePagination(2);'>2</a>";
               $pagination.= "..";
               for($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
               {
                   if($counter == $page)
                        $pagination.= "<span class='current'>$counter</span>";
                   else
                        $pagination.= "<a href=\"#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a>";
               }
           }
        }
        if($page < $counter - 1)
            $pagination.= "<a href=\"#Page=".($next)."\" onClick='changePagination(".($next).");'>Next &raquo;</a>";
        else
            $pagination.= "<span class='disabled'>Next &raquo;</span>";

        $pagination.= "</div>";
    }

if(isset($_POST['pageId']) && !empty($_POST['pageId']))
{
    $id=$_POST['pageId'];
}
else
{
    $id='0';
}

//$user = xclean($_SESSION["PBNG_EMAIL_2018_VISION"]);

if(isset($_GET['call']) && !empty($_GET['call'])){
$call = x_clean($_GET['call']);
$query="SELECT * FROM investment_master WHERE tranx_id LIKE '%$call%' OR amount_invested LIKE '%$call%' OR startdate LIKE '%$call%' OR enddate LIKE '%$call%' ORDER BY user_id desc
limit ".mysqli_real_escape_string(x_cstring(),$start).",$recordsPerPage";
}else{
$query="SELECT * FROM investment_master ORDER BY user_id desc
limit ".mysqli_real_escape_string(x_cstring(),$start).",$recordsPerPage";
}

//echo $query;
$res    =   mysqli_query(x_cstring(),$query);
$count  =   mysqli_num_rows($res);
$HTML='';
echo $pagination;
if($count > 0)
{
	$counter = 0;
?>


<?php
$user = xclean($_SESSION["IQGAMES_MATRIC_2018_VISION"]);

//checking permission to view

if(x_count("userdata","is_view='1' AND status='1' AND matric_no='$user' LIMIT 1") > 0){
	?>
<div style="margin-top:20pt;"  class="panel-group" id="accordion">
	<?php
	  while($row=mysqli_fetch_array($res))
    {
	$counter++;

	$id = $row["id"];
	$tid = $row["tranx_id"];
	$wallet = $row["deducted_from"];
	$currency = $row["currency"];
	$before = $row["balance_before"];
	$after = $row["balance_after"];
	$invamount_balance = $row["invested_amt_balance"];
	$amount_invested = $row["amount_invested"];
	$interest_amount = $row["interest_amount"];
	$roi = $row["roi_percentage"];
	$userid = $row["user_id"];
	$cp = $row["current_plan"];
	$dd = $row["duration_in_days"];
	$dm = $row["duration_in_month"];
	$accep_status = $row["acceptance_status"];
	$payback_status = $row["payback_status"];
	$start = $row["startdate"];
	$end = $row["enddate"];
	
	$invested_on = $row["invested_on"];
	$paid_on = $row["paid_on"];

	$os = $row["os"];
	$br = $row["br"];
	$ip = $row["ip"];

		if(x_count("userdb_bank","id='$userid' LIMIT 1") > 0){
			foreach(x_select("wallet_type,play_cash,wallet_balance,wallet_bonus,user_photo,status,name,gender,email,account_name,bank_name,account_number,mobile","userdb_bank","id='$userid'","1","id") as $key){
				$name = $key["name"];
				$gender = $key["gender"];
				$email = $key["email"];
				$mobile = $key["mobile"];
				$acctname = $key["account_name"];
				$bank = $key["bank_name"];
				$acctnum = $key["account_number"];
				
				$wallet_type = $key["wallet_type"];
				$tcinv = $key["play_cash"];
				$wbal = $key["wallet_balance"];
				$wbonus = $key["wallet_bonus"];
				$userphoto = $key["user_photo"];
			}
		}else{
				$name = "";$email = "";
				$mobile = "";$acctname = "";
				$bank = "";$acctnum = "";
				
				$wallet_type = "";
				$tcinv = "";
				$wbal = "";
				$userphoto = "";
		}
	?>
		
	<div class="panel panel-default">
		 <div class="panel-heading">
		  <h4 style="padding:10px;" class="panel-title">
			<a style="font-weight:none;" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $id;?>"><i class="fa fa-user"></i>&nbsp;&nbsp;<b><?php echo substr(strtoupper($name),0,30);?></b> INVESTED <b><?php echo $currency." ".number_format($amount_invested,2);?></b> ==> <b><?php echo $currency." ".number_format(($interest_amount + $amount_invested),2);?> (<?php echo $roi."%"?>)</b>&nbsp;</a>&nbsp;&nbsp;<i class="fa fa-calendar"></i>
			<?php
							$cudat = date("Y-m-d");
							$startt = strtotime($cudat);
							$endd = strtotime($end);

							$days = ceil(($endd - $startt) / 86400);
							if($days <= 0){
								$days_between = ceil(abs($endd - $startt) / 86400);
								echo "0 day left (Matured)";
							}else{
								$days_between = ceil(abs($endd - $startt) / 86400);
							echo $days_between." days left";
							}

			?>
			<span class="badge pull-right"><?php
			if($payback_status == "1"){
				?><i class="fa fa-check"></i><i class="fa fa-check"></i><?php
			}else{
				?><i class="fa fa-check"></i><?php
			}
			
			?></span>
			</h4>
			
		</div>
		<div id="collapse<?php echo $id;?>" class="panel-collapse collapse">
			<div class="panel-body">
			
			<div class="row">
				<div class="col-md-6">
					<!--<div class="panel panel-default panel-dist">
						<div class="panel-heading"><i class="fa fa-credit-card"></i> &nbsp;&nbsp;PAYMENT DETAILS</div>
						<div class="panel-body">-->
						
			<div class="list-group">
			<div class="list-group-item">
	<h5 class="trackhead"><i class="fa fa-credit-card"></i> &nbsp;&nbsp;PAYMENT DETAILS</h5>
	</div>
	<div class="list-group-item">
	<h5 class="trackhead">Investment Status&nbsp;&nbsp;&nbsp;&nbsp; <?php 
	if($accep_status == "1"){
		?><i style="color:blue;"><i class="fa fa-check-circle"></i> Approved</i><?php
	}else{
		?><i style="color:red;"><i class="fa fa-minus-circle"></i> Denied</i><?php
	}
	?></h5>
	<p class="tracktext btn btn-info"><i class="fa fa-laptop"></i> Tranx_ID : <?php echo $tid ;?></p>
	</div>
	
	<div class="list-group-item">
	<h5 class="trackhead">Current Plan</h5>
	<p class="tracktext"><?php echo ucwords($cp). " Plan";?></p>
	</div>
	
	<div class="list-group-item">
	<h5 class="trackhead">Amount Invested</h5>
	<p class="tracktext"><?php echo $currency." ".number_format($amount_invested,2);?></p>
	</div>
	<div class="list-group-item">
	<h5 class="trackhead">Payment made From</h5>
	<p class="tracktext"><?php echo ucwords(strtolower($wallet));?></p>
	</div>
	<div class="list-group-item">
	<h5 class="trackhead"><?php echo ucwords(strtolower($wallet));?> Before Investing</h5>
	<p class="tracktext"><?php echo $currency." ".number_format($before,2);?></p>
	</div>
	<div class="list-group-item">
	<h5 class="trackhead"><?php echo ucwords(strtolower($wallet));?> After Investing</h5>
	<p class="tracktext"><?php echo $currency." ".number_format($after,2);?></p>
	</div>
	<div class="list-group-item">
	<h5 class="trackhead">Current Investment Balance</h5>
	<p class="tracktext"><?php echo $currency." ".number_format($invamount_balance,2);?></p>
	</div>
	<div class="list-group-item"><h5 class="trackhead"><i class="fa fa-bank"></i> &nbsp;&nbsp;BANK DETAILS</h5></div>
	<div class="list-group-item">
	<h5 class="trackhead">Bank Name</h5>
	<p class="tracktext"><?php echo ucwords(strtolower($bank));?></p>
	</div>
	<div class="list-group-item">
	<h5 class="trackhead">Account Name</h5>
	<p class="tracktext"><?php echo ucwords(strtolower($acctname));?></p>
	</div>
	<div class="list-group-item">
	<h5 class="trackhead">Account Number</h5>
	<p class="tracktext"><?php echo $acctnum;?></p>
	</div>
	
			</div>

						
						
				</div>
				<div class="col-md-6">
				
					<div class="list-group">
					<div class="list-group-item"><h5 class="trackhead"><i class="fa fa-calendar"></i> &nbsp;&nbsp;PAYBACK DETAILS</h5></div>
					
					<div class="list-group-item">
						<h5 class="trackhead">Investment Duration</h5>
						<p class="tracktext"><?php echo $dm." Months => ".$dd." days";?></p>
					</div>
					
					<div class="list-group-item">
						<h5 class="trackhead">Rate of Return (ROI)</h5>
						<p class="tracktext"><?php echo $roi."%"?> => <?php echo $currency." ".number_format($interest_amount,2);?></p>
						
						</div>
						<div class="list-group-item">
						<h5 class="trackhead">Total Payback Amount</h5>
						<p class="tracktext"><?php echo $currency." ".number_format(($interest_amount + $amount_invested),2);?></p>
						</div>
						
						<div class="list-group-item">
						<h5 class="trackhead">Investment Interval (Start Date - End Date)</h5>
						<p class="tracktext">
						<?php echo $start." - ". $end ;?>
						</p>
						</div>
						
						<div class="list-group-item">
						<h5 class="trackhead">Invested on | Paid on</h5>
						<p class="tracktext">
						<?php 
						if($payback_status == "1"){
							echo $invested_on." &nbsp;&nbsp;|&nbsp;&nbsp;<font style='color:purple;font-weight:bold'>".$paid_on." (Matured)</font>" ;
						}else{
							echo $invested_on." &nbsp;&nbsp;|&nbsp;&nbsp;Not Matured" ;
						}
						?>
						</p>
						</div>
						<div class="list-group-item">
						<h5 class="trackhead">Investment countdown</h5>
						<p class="tracktext">
						<?php
							$cudat = date("Y-m-d");
							$startt = strtotime($cudat);
							$endd = strtotime($end);

							$days = ceil(($endd - $startt) / 86400);
							if($days <= 0){
								$days_between = ceil(abs($endd - $startt) / 86400);
								echo "0 day left (Matured)";
							}else{
								$days_between = ceil(abs($endd - $startt) / 86400);
							echo $days_between." days left";
							}
			
						?>
						</p>
						</div>
						
							<div class="list-group-item"><h5 class="trackhead"><i class="fa fa-user"></i> &nbsp;&nbsp;PROFILE DETAILS</h5></div>
					<div class="list-group-item">
						<div class="row">
							<div class="col-md-4">
							<img src="<?php
						if($userphoto == ""){
							?>img/users.png<?php
						}else{
							if(file_exists("../".$userphoto)){
								echo "../".$userphoto;
							}else{
								?>img/users.png<?php
							}
						}
						?>" class="img-responsive" style="width:120px;border:0px solid gray;box-shadow:2px 2px 2px 2px lightgray;"/>
							</div>
							<div class="col-md-8">
								<h5 class="trackhead">Contact Details</h5>
								<p class="tracktext"><?php echo strtolower($email)." | ".$mobile;?></p>
							</div>
						</div>
						
					</div>
					<div class="list-group-item">
						<div class="row">
							<div class="col-md-6"><h5 class="trackhead">Full Name</h5>
						<p class="tracktext"><?php echo ucwords(strtolower($name));?></p></div>
							<div class="col-md-6"><h5 class="trackhead">Gender</h5>
						<p class="tracktext"><?php echo ucwords(strtolower($gender));?></p></div>
						</div>
						
					</div>
					<div class="list-group-item">
						<h5 class="trackhead">Account Balances</h5>
							<div class="row">
								<div class="col-md-6">
								<p class="tracktext">Wallet Balance : <?php echo $currency." ".number_format($wbal,2);?></p>
								</div>
								<div class="col-md-6">
								<p class="tracktext">Current Investment : <?php echo $currency." ".number_format($tcinv,2);?></p>
								</div>
								<div class="col-md-6">
								<p class="tracktext">Wallet Bonus : <?php echo $currency." ".number_format($wbonus,2);?></p>
								</div>
							</div>
						
					
						
					</div>
						
					</div>
					
				</div>
				
				
				
				
				
			</div>
		
			</div>
		</div>
	</div>
		
	<?php


	}
	?></div><?php
}else{
	x_print("<p class='hubmsg text-center'><i style='font-size:70pt;' class='fa fa-briefcase'></i><br/>You are not authorized to View.</p>");

}

}
else
{

	$msg = "<p class='text-center' style='font-size:60pt;margin-bottom:10pt;color:lightgray;'><span class='fa fa-briefcase'></span></p>";
$msg .= "<p class='text-center'>No data was found!!</p>";
			echo $msg;

}

echo "<div style='margin-bottom:1%;'></div>";
echo $pagination;
}else{
	echo "No parameter";
}
?>
