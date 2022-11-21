<?php
//echo round(100.728,2);
$salt = "ABCDEFGHIJKKLMNOPQ1234567890abcghdtuwioalkjsnh?@";
 $pass = "open";
 $hash = md5(sha1($pass).$salt).sha1(sha1($pass).$salt);
 echo $hash;
?>