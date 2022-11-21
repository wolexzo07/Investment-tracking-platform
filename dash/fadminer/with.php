<?php 
include_once("../../finishit.php");
xstart("0");
?>

<div class="row">
<div class="col-md-4">
<h4 class="lefttrack"><button onclick="load('with')" class="btn btn-success"><i class="fa fa-minus-circle"></i></button> &nbsp;&nbsp;PENDING <font class="spart">WITHDRAWAL</font></h4>
</div>
<div class="col-md-4">
		<script>
		 function searcher(){
			 var elem = document.getElementById("searchbox").value;
			 //load('track_investment')
			 load("with?call="+elem);
			 return false;
		 }
		</script>
		<form onsubmit="return searcher()">
		<div class="row">
		<div class="col-md-9"><input type="text" disabled placeholder="Search by Tranx id | Name | Date" id="searchbox" class="form-control " name=""/></div>
		<div class="col-md-3"><button disabled  class="btn btn-success"><i class="fa fa-search"></i> Go</button></div>
		</div>
		</form>
		
</div>
<div class="col-md-4">
	<button onclick="load('generate_investment')" disabled class="btn btn-info"><i class="fa fa-calendar"></i> Generate Report</button>
	<button onclick="load('tabulate_investment')" disabled class="btn btn-success"><i class="fa fa-table"></i> Tabulate Report</button>
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
           url: "withdrawal?call=<?php if(isset($_GET['call']) && !empty($_GET['call'])){echo $_GET['call'];}else{} ?>&sm=<?php echo md5(rand(123,1000));?>",
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
