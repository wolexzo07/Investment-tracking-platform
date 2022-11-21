<script type="text/javascript">
function loader(){
	var reg = document.getElementById("amountme").value;
	if(reg == ""){
		alert("Enter top-up amount");
		return false;
	}else{
		load("paybills?memy="+reg);
		return true;
	}

}
</script>
 <div style="margin-top:20pt;"  class="panel-group" id="accordion">
<div class="panel panel-default">

<div class="panel-heading">
  <h4 style="padding:10px;" class="panel-title">
    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
    <i class="fa fa-cc-mastercard"></i> &nbsp;&nbsp;ONLINE FUNDING</a>
  </h4>
</div>
<div id="collapse1" class="panel-collapse collapse">
<div class="panel-body">

  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center wallet">
    
  <!----<form method="POST" onsubmit="return loader()" id="fundwallet">--->
  <form method="POST">
	  <div class="row">
	  <div class="col-md-6">
	  <p class="banp"><i class="fa fa-money"></i>&nbsp;&nbsp; AMOUNT <font class="colorg">TOP-UP </font></p>
  <input type="number" disabled="disabled" placeholder="ENTER TOP-UP AMOUNT" required="required" min="1000" max="" class="form-control ttx" id="amountme" name="amount"/>
	  </div>
	  <div class="col-md-6">
	  <p class="banp"><i class="fa fa-bank"></i>&nbsp;&nbsp; WALLET TO <font class="colorg">FUND</font></p>
  <select name="type" required="required" class="form-control slec">
  <option value="pc"> ACCOUNT WALLET</option>
  <!--<option value="wb">WALLET BALANCE</option>-->
  </select>
	  </div>
	  <div class="col-md-12">
	  <button id="bup" disabled="" style="margin-top:20pt;" class="btn btn-success"><i class="fa fa-credit-card"></i> PROCEED TO PAYMENT</button>
	  </div>
	  </div>
  
  
  
  </form>

  </div>

</div>
</div>




</div>



<div class="panel panel-default">

<div class="panel-heading">
  <h4 style="padding:10px;" class="panel-title">
    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
    <i class="fa fa-bank"></i> &nbsp;&nbsp;BANK TRANSFER </a>
  </h4>
</div>
<div id="collapse2" class="panel-collapse collapse">
<div class="panel-body">

  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center walletbank">

  <table class="table table-hover table-striped">
  <caption style="margin-bottom:10pt;" class="capp"><i class="fa fa-mobile"></i>&nbsp;&nbsp;SEND US TRANSFER ALERT <font class="colorg">AFTER PAYMENT</font> </caption>
  <tr align="left">
  <th>BANK NAME</th>
  <td>PROVIDUS BANK</td>
  </tr>

  <tr align="left">
  <th>ACCOUNT NAME</th>
  <td>LENOP CONSULTING</td>
  </tr>

  <tr align="left">
  <th>ACCOUNT NUMBER</th>
  <td>5400478376</td>
  </tr>
  </table>
  </div>

</div>
</div>


</div>



<div class="panel panel-default">

<div class="panel-heading">
  <h4 style="padding:10px;" class="panel-title">
    <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
    <i class="glyphicon glyphicon-transfer"></i> &nbsp;&nbsp;SEND TRANSFER ALERT </a>
  </h4>
</div>
<div id="collapse3" class="panel-collapse collapse">
<div class="panel-body">

<p class="warnText"><b>NOTE :<b> Please send alert only after making bank transfer. </p>

<script type="text/javascript" src="../log.js"></script>
<form method="POST"  id="sendalert">
<div class="row">
<div class="col-md-6">
<p class="banp"><i class="fa fa-money"></i>&nbsp;&nbsp; Amount <font class="colorg"> Sent</font></p>
<input type="number" placeholder="Enter Amount Sent" required="required" min="100" max="" class="form-control ttx" id="amountmet" name="amount"/>
</div>

<div class="col-md-6">

<p class="banp"><i class="fa fa-calendar"></i>&nbsp;&nbsp; Transfer<font class="colorg"> Date</font></p>

<input type="date" placeholder="Enter Transfer Date" required="required"  class="form-control ttx" id="transferdate" name="tdate"/>

</div>

<div class="col-md-6">
<p class="banp"><i class="fa fa-bank"></i>&nbsp;&nbsp; Bank Used</p>
<select name="bankname" required="required" id="bankid" class="form-control slec">
<option> Select Bank name .......</option>
<?php require_once("fetch_banks.php");?>
</select>
</div>
<div class="col-md-6">

<p class="banp"><i class="fa fa-credit-card"></i>&nbsp;&nbsp; Account <font class="colorg">Name</font></p>

<input type="text" placeholder="Enter the account name" required="required" class="form-control ttx" id="acctname" name="acctname"/>

</div>

<div class="col-md-12">
<input type="hidden" value="<?php echo sha1(uniqid());?>" name="alertus"/>
<button id="bup" style="margin-top:20pt;" class="btn btn-success"><i class="fa fa-bell"></i> SEND ALERT</button>
</div>

</div>



</form>

<div style="margin-top:10pt;display:none;color:green;font-weight:bold;text-center" id="gallery"><img src="../image/load.gif" class="img-responsive" style="width:80px;"/></div>

</div>
</div>

</div>

</div>

<style>
#abilp a:active{
  background-color:transparent;
  text-decoration:none;
  color:black;
  padding:10px;
}
#abilp a:hover{
    background-color:transparent;
  text-decoration:none;
  color:black;padding:10px;

}
  #abilp a:visited{
    background-color:transparent;
  text-decoration:none;
  color:black;padding:10px;
}
#abilp a{
    background-color:transparent;
  text-decoration:none;
  color:black;padding:10px;
}
</style>
