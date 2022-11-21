<?php
include_once("../finishit.php");
$to = "abocentdotcom@gmail.com";
		$message = "<html>
<head>
<title>Abocent Payments : NGN 220,000 Credited to your Wallet Balance</title>
</head>
<body>

<table cellpadding='20px' cellspacing='0px' border='0px' style='border:1px solid lightgray;' width='100%'>
<thead>
<tr style='background:DodgerBlue;'>
<th><center><img src='https://abocent.com/image/logboss.png' style='width:100px;'/></center></th>
</tr>
<tr>
<th><h2><font style='color:orange;font-weight:bold;'>ABOCENT</font> <font style='color:purple;font-weight:bold;'>INVESTMENTS</font><h2></th>
</tr>
</thead>
<tbody>
<tr>
<td>
<b>Hi Biobaku Oluwole</b>
<p>I am delighted to inform you that your abocent investment is now matured.</p>
</td>
</tr>
</tbody>
<tfoot>
<tr>
<td>
Thank you<br/>
From <b>Abocent Team</b>
</td>
</tr>
<tr style='background:DodgerBlue;color:white;'>
<td>
<h4>INCASE YOU HAVE ANY QUESTION REGARDING THIS TRANSACTION KINDLY CONTACT US ON:</h4>
<p>Mobile : +2348160975439</p>
<p>Mobile : +2347060405084</p>
<p>Mobile : +2348169452139</p>
<p>Email :  <a style='text-decoration:none;color:white;'>support@abocent.com</a></p>
<p style='text-align:center;border-top:1px solid lightgray;padding-top:10px;'>Powered by <b><a style='text-decoration:none;color:white;'>abocent.com</a> &copy; 2020</b></p>
</td>
</tr>
</tfoot>

</table>

</body>
</html>
";
		$subject = "Abocent Payments : NGN 220,000 Credited to your Wallet Balance";
			
			if(sendmail_local($to,$subject,$message) == 1){
				echo "Mail sent successfully";
			}else{
				echo "Failed to send email ";
			}
?>
