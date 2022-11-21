<?php 
include_once("../../finishit.php");
xstart("0");
?>

<div class="row">
<div class="col-md-4">
<h4 class="lefttrack"><button onclick="load('regist')" class="btn btn-success"><i class="fa fa-users"></i></button> &nbsp;&nbsp;ACCOUNT <font class="spart">MANAGER</font></h4>
</div>
<div class="col-md-4">
		<script>
		 function searcher(){
			 var elem = document.getElementById("searchbox").value;
			 //load('track_investment')
			 load("regist?call="+elem);
			 return false;
		 }
		</script>
		<form onsubmit="return searcher()">
		<div class="row">
		<div class="col-md-9"><input type="text" placeholder="Search by Email | Name | Mobile" id="searchbox" class="form-control " name=""/></div>
		<div class="col-md-3"><button class="btn btn-success"><i class="fa fa-search"></i> Go</button></div>
		</div>
		</form>
		
</div>
<div class="col-md-4">
	<button onclick="load('credit')" class="btn btn-info"><i class="fa fa-user"></i> Credit user</button>
	<button onclick="load('payments_made')" class="btn btn-success"><i class="fa fa-money"></i> Payments</button>
</div>
</div>

	<script src="js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
changePagination('0');
});
function changePagination(pageId){
     $(".flash").show();
     $(".flash").fadeIn(400).html('Loading <img src="../image/load.gif" />');
     var dataString = 'pageId='+ pageId;
     $.ajax({
           type: "POST",
           url: "alluser?call=<?php if(isset($_GET['call']) && !empty($_GET['call'])){echo $_GET['call'];}else{} ?>&ref=<?php if(isset($_GET['ref']) && !empty($_GET['ref'])){echo $_GET['ref'];}else{} ?>&sm=<?php echo md5(rand(123,89292));?>",
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

