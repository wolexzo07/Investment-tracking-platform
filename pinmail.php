<?php
$subject = "IQGAMES - PASSWORD RESET";

$message = "
<html>
<head>
<title>IQGAMES - PASSWORD RESET</title>
</head>
<body>
<div style='margin:0%;border:1px solid purple;'>
<div style='height:30px;padding:1%;background-color:purple;color:white'>

</div>
<div style='background-color:white;padding:1%;'>
<center>
<h2 style='text-align:center;display:block;'><img src='https://iqgames.app/image/logome.png' style='width:80px;padding:0px;'/> <br/><font style='color:green;'>IQ-GAMES</font>.ng</h2></center>
</div>
<div style='padding:1%;'>
<p>
Your pin has been changed to <b>$code</b>.

<style type='text/css'>
.br{
background-color:purple;
padding:10px;
border-radius:7px;

}
.br:hover{
background-color:gold;
padding:10px;
}
a{
color:white;
text-decoration:none;
}
.mail{
text-decoration:none;
color:white;
font-size:13pt;
}

</style>
</p>
</div>
<div style='padding:1%;background-color:purple;color:white'>

<b>From C.E.O <i>PBNG</i> ( T.O Biobaku Oluwole)</b><br/>


<font style='color:;font-weight:bold;font;'>Contact our support on:</font><br/>
Email : hello@iqgames.app<br/>
Phone : +234(0)9031144111<br/>
</div>
</div>
</body>
</html>
";

if(x_count("mailer","status='1' LIMIT 1") > 0){

	  $mailsend =   sendmail($email,$subject,$message);
  if($mailsend==0){

	echo '<h2>There are some issue sending mail.</h2>';
  }
  else{
	#echo '<h2>email sent.</h2>';
  }

	}else{


		}



						?>
