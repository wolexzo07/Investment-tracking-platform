<?php
session_start();
include_once("../../finishit.php");
if(!isset($_SESSION["IQGAMES_NAME_2018_VISION"])){
	finish("logon_checker","0");
	exit();
}else{

}
?>
