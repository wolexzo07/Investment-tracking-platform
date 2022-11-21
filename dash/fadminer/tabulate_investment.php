<?php 
include_once("../../finishit.php");
xstart("0");
?>


<div class="row">
<div class="col-md-4">
<h4 class="lefttrack"><button onclick="load('tabulate_investment')" class="btn btn-success"><i class="fa fa-calculator"></i></button> &nbsp;&nbsp;TRACK <font class="spart">INVESTMENTS</font></h4>
</div>

<div class="col-md-4">
	<!----<button onclick="load('generate_investment')" class="btn btn-info"><i class="fa fa-calendar"></i> Generate Report</button>
	<button onclick="load('tabulate_investment')" class="btn btn-success"><i class="fa fa-table"></i> Tabulate Report</button>---->
</div>


<div class="col-md-4">
		<script>
		 function searcher(){
			 var elem = document.getElementById("searchbox").value;
			 //load('track_investment')
			 load("tabulate_investment?call="+elem);
			 return false;
		 }
		</script>
		<form onsubmit="return searcher()">
		<div class="row">
		<div class="col-md-9"><input type="text" placeholder="Search by Tranx id | Name | Date" id="searchbox" class="form-control " name=""/></div>
		<div class="col-md-3"><button class="btn btn-success"><i class="fa fa-search"></i> Go</button></div>
		</div>
		</form>
		
</div>

</div>


<?php
//setting role management
$user = xclean($_SESSION["IQGAMES_MATRIC_2018_VISION"]);
if(x_count("userdata","is_view='1' AND status='1' AND matric_no='$user' LIMIT 1") > 0){
	?>
<script src="js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
changePagination('0');
});
function changePagination(pageId){
     $(".flash").show();
     $(".flash").fadeIn(400).html("<center><img src='image/load_1.gif' style='width:100px;margin:50pt'/></center>");
     var dataString = 'pageId='+ pageId;
     $.ajax({
           type: "POST",
           url: "read_table?call=<?php if(isset($_GET['call'])){echo $_GET['call'];}else{} ?>&sm=<?php echo md5(rand(123,89292));?>",
           data: dataString,
           cache: false,
           success: function(result){
           $(".flash").hide();
                 $("#pageData").html(result);
           }
      });
}
</script>

<div id="pageData"></div>
<span class="flash"></span>

	<?php
}else{
x_print("<p class='hubmsg text-center'><i style='font-size:70pt;' class='fa fa-briefcase'></i><br/>You are not authorized to view.</p>");
}
?>

