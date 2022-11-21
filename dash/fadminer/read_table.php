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
$recordsPerPage = 10;
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
<div style="margin-top:20pt;">
<table class="table table-striped table-hover">
<tr> <th>No.</th> <th>User Details.</th> <th>Payment</th><th>Bank Details</th> <th>Timestamp</th> </tr>
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
		
		<tr> 
		<td><p style="width:40px;height:40px;padding-top:8px;border-radius:20px;text-align:center;border:2px solid lightgray;font-weight:bold;background-color:gray;color:white;box-shadow:2px;"><?php echo $counter;?></p></td> 
		<td>
		<p class="username"><?php echo ucwords(strtolower($name));?></p>
		<p class="contact"><?php echo $email?></p>
		<p class="contact"><?php echo $mobile ?></p>
		</td>
	
		
		<td>
			<p><b><?php echo $currency." ".number_format($amount_invested,2);?></b> (Invested)</p>
		<p><b><?php echo $currency." ".number_format(($interest_amount + $amount_invested),2);?></b> (Payout)</p>
		<p><b><?php echo $roi."%"?></b> (ROI)</p>
		</td>
		
		<td>
		<p class="bankstyl"><?php echo ucwords(strtolower($acctname));?></p>
		<p class="bankstyl"><?php echo ucwords(strtolower($bank));?></p>
		<p class="bankstyl"><?php echo $acctnum;?></p>
		
		</td> 
		<td>
		<b><?php echo $start." - ". $end ;?></b>
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
		</td> 
		</tr>
		
	<?php


	}
	?></table><?php
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
<style type="text/css">
.contact{
	font-weight:bold;
	color:red;
}
.username{
	font-weight:bold;
	color:purple;
}
.bankstyl{
	font-weight:bold;
}
</style>
