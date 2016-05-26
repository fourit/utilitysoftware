<?php
	$quanly=$_GET["quanly"];
	$action=$_GET["action"];
	if($quanly=='baiviet'&$action=='them')
		include("them.php");
	if($quanly=='baiviet'&$action=='sua')
		include("sua.php");
	if($quanly=='baiviet'&$action=='xoa')
		include('xoa.php');
	if($quanly=='loaisoft'&$action=='them')
		include('them_loai_soft.php');
		
?>