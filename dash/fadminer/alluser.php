<?php
include_once("../../finishit.php");
include_once("validate.php");

if(isset($_GET["sm"])){

if(isset($_GET['call']) && !empty($_GET['call'])){
	$call = xclean($_GET['call']);
	$query="select id from userdb_bank WHERE name LIKE '%$call%' OR email LIKE '%$call%' OR mobile LIKE '%$call%' order by id desc";
}elseif(isset($_GET['ref']) && !empty($_GET['ref'])){
	$ref = xclean($_GET['ref']);
	$query="select id from userdb_bank WHERE ref='$ref' order by id desc";
}else{
	$query="select id from userdb_bank order by id desc";
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
$call = xclean($_GET['call']);
$query="SELECT * FROM userdb_bank WHERE name LIKE '%$call%' OR email LIKE '%$call%' OR mobile LIKE '%$call%' ORDER BY id desc
limit ".mysqli_real_escape_string(x_cstring(),$start).",$recordsPerPage";
}elseif(isset($_GET['ref']) && !empty($_GET['ref'])){
$ref = xclean($_GET['ref']);
$query="SELECT * FROM userdb_bank WHERE ref='$ref' ORDER BY id desc
limit ".mysqli_real_escape_string(x_cstring(),$start).",$recordsPerPage";
}else{
$query="SELECT * FROM userdb_bank ORDER BY id desc
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

$user = xclean($_SESSION["IQGAMES_MATRIC_2018_VISION"]);

//checking permission to view

if(x_count("userdata","is_view='1' AND status='1' AND matric_no='$user' LIMIT 1") > 0){
	?>
<table style="margin-top:20pt;" class="table table-bordered">
	<?php
	if(isset($_GET['ref']) && !empty($_GET['ref'])){
		?>
		<caption style="padding:15px;border:1px solid lightgray;font-size:12pt;color:green;font-weight:bold;">
		Referral(s) From <b><?php echo $_GET['ref'];?></b>
		</caption>
		<?php
	}else{
		?>
		<caption style="padding:15px;border:1px solid lightgray;font-size:12pt;color:green;font-weight:bold;">&nbsp;&nbsp; <font style="color:purple;">Activated</font> <font class='coml' style="color:green;"><span class="badge"> <?php echo x_count("userdb_bank","status='1'");?></span></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Not Activated <font class='coml' style="color:green;"> <span class="badge"><?php echo x_count("userdb_bank","status='0'");?></span></font>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Suspended <font class='coml' style="color:green;"> <span class="badge"><?php echo x_count("userdb_bank","status='2'");?></span></font>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <font style="color:purple;">Credited-WB</font> <font class='coml' style="color:green;"> <span class="badge"><?php echo x_count("userdb_bank","status='2'");?></span></font>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Empty-WB <font class='coml' style="color:green;"> <span class="badge"><?php echo x_count("userdb_bank","status='2'");?></span></font>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <font style="color:purple;">Credited-CI</font> <font class='coml' style="color:green;"> <span class="badge"><?php echo x_count("userdb_bank","status='2'");?></span></font>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Empty-CI <font class='coml' style="color:green;"> <span class="badge"><?php echo x_count("userdb_bank","status='2'");?></span></font>
</caption>
		<?php
	}
	?>

<tr style="text-transform:uppercase;">
<th>No.</th>
<th>Name</th>
<th>Ref.</th>
<th>Plan</th>
<th>Wallet</th>
<th>Contact</th>
<th>Device</th>
<th>Action</th>
</tr>
	<?php
	  while($row=mysqli_fetch_array($res))
    {
	$counter++;

	$id = $row["id"];
	$cat = $row["plan"];
	$nam = $row["name"];
	$wb = $row["wallet_balance"];
	$bo = $row["wallet_bonus"];
	$pc = $row["play_cash"];
	$mobile = $row["mobile"];
	$email = $row["email"];
	$ts = $row["total_spent"];
	$rt = $row["realtime"];
	$status = $row["status"];
	$wt = $row["wallet_type"];

	$os = $row["os"];
	$br = $row["br"];
	$ip = $row["ip"];


	?>
<tr>
<th><?php echo $counter;?></th>
<th><?php echo $nam;?></th>
<th><?php
if(x_count("userdb_bank","ref='$email'") > 0){
echo x_count("userdb_bank","ref='$email'");
?>
<a href="#" class="btn btn-sm" onclick="load('regist?ref=<?php echo $email;?>')"><i class='fa fa-eye'></i></a>
<?php
}else{
echo x_count("userdb_bank","ref='$email'");
}
?></th>
<th><?php echo $cat;?></th>
<th>
<p>CI:<?php echo $wt." ".number_format($pc,2);?></p>
<p>WB:<?php echo $wt." ".number_format($wb,2);?></p>
<p>BO:<?php echo $wt." ".number_format($bo,2);?></p>
</th>
<th><p><?php echo $email;?> <a onclick="load('send-message?email='+'<?php echo $email;?>'+'&uid=<?php echo $id;?>')" class="btn btn-sm"><i class="fa fa-envelope-o"></i></a></p>
<p><?php echo $mobile;?></p>
</th>
<th>
<p>OS:<?php echo $os;?></p>
<p>BR:<?php echo $br;?></p>
<p>IP:<?php echo $ip;?></p>
</th>
<th><button class="btn btn-primary"><i class="fa fa-trash"></i></button></th>
</tr>
	<?php


	}
	?></table>
	<div style="font-weight:bold;color:green;">
	CI = Current Investment &nbsp;&nbsp;&nbsp;WB = Wallet Balance
	</div>
	<?php
}else{
	x_print("<p class='hubmsg text-center'><i style='font-size:70pt;' class='fa fa-briefcase'></i><br/>You are not authorized to View.</p>");

}

}
else
{

	$msg = "<p class='text-center' style='font-size:60pt;margin-bottom:10pt;'><span class='fa fa-briefcase'></span></p>";
$msg .= "<p class='text-center'>No question was pending!!</p>";
			echo $msg;

}

echo "<div style='margin-bottom:1%;'></div>";
echo $pagination;
}else{
	echo "No parameter";
}
?>
