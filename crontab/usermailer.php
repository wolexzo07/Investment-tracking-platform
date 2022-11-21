<?php
$to = $useremail;
		$message = "<html>
<head>
<title>Abocent Payments : $new_wb_f Was Credited To Your Wallet Balance</title>
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
<p>Hi <b>$nameuser</b>,</p>
<p>I am delighted to inform you that one of your investment (Transaction ID : <b>$tranx_id</b>) with us is now matured.<b>$new_wb_f</b> was credited to your Wallet Balance from your investment of <b>$amt_invested_f</b> that was made on <b>$investon</b> with <b>$roi % Roi</b>.You can now request for withdrawal or re-invest with us.</p>
</td>
</tr>
</tbody>
<tfoot>
<tr>
<td>
Thank you for choosing abocent<br/>
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
</html>";
		$subject = "Abocent Payments : $new_wb_f Was Credited To Your Wallet Balance";
			
			if(sendmail_local($to,$subject,$message) == 0){
				echo "Failed to send mail to $useremail\n\n";
			}else{
				echo "Mail sent to $useremail successfully\n\n";
			}
?>
