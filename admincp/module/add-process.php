<?php
	date_default_timezone_set('asia/Ho_Chi_Minh');
	session_start();
///*	Dữ liệu từ trang thêm đưa vào để xử lý*/
	include("../../config.php");//
	include("../../lib/lib.php");
	if(isset($_POST["thembaiviet"]))
	{
		$tieudebaiviet=$_POST["tieudebaiviet"];
		$tomtatbaiviet=$_POST["tomtatbaiviet"];
		$noidungbaiviet=$_POST["noidungbaiviet"];
		$loaitin=$_POST["loaitin"];
		$loaisoft=$_POST["loaisoft"];
		$thutubaiviet=$_POST["thutu"];
		$trangthaibaiviet=$_POST["trangthai"];
		$file_path=$_FILES["anhminhhoa"]["tmp_name"];
		$file_name=$_FILES["anhminhhoa"]["name"];
		move_uploaded_file($file_path,"../../source/".$file_name);
		$sql="Insert Into baiviet(tieudebaiviet,urlbaiviet,tomtatbaiviet,noidungbaiviet,anhminhhoa,loaitin,loaisoft,trangthai,nguoidang,datetime) Values('".$tieudebaiviet."','".convert_vi_to_en($tieudebaiviet)."','".$tomtatbaiviet."','".$noidungbaiviet."','".$file_name."','".$loaitin."','".$loaisoft."','".$trangthaibaiviet."','".$_SESSION['username']."','".date('y-m-d h:i:s')."')";
		$query_excute=mysql_query($sql);
		header("location: ../index.php?quanly=baiviet&action=them");
	}
	if(isset($_POST["themloaisoft"]))
	{
		$tenloaisoft=$_POST["tenloaisoft"];	
		$tendaydu=$_POST["tendaydu"];
		$thutuloaisoft=$_POST["thutu"];
		$trangthailoaisoft=$_POST["trangthai"];
		$vitri=$_POST['vitri'];
		$file_path_loaisoft=$_FILES["anhminhhoa"]["tmp_name"];
		$file_name_loaisoft=$_FILES["anhminhhoa"]["name"];
		move_uploaded_file($file_path_loaisoft,"../../source/".$file_name_loaisoft);
		$sql_loaisoft="Insert Into loaisoft(tenloaisoft,tendaydu,anhminhhoa,thutu,trangthai,vitri) Values('".$tenloaisoft."','".$tendaydu."','".$file_name_loaisoft."','".$thutuloaisoft."','".$trangthailoaisoft."','".$vitri."')";
		$themloaisoft_excute=mysql_query($sql_loaisoft);
		header("location: ../index.php?quanly=loaisoft&action=them");
	}
	if(isset($_POST["suabaiviet"]))
	{
		$tieudebaiviet=$_POST["tieudebaiviet"];
		$tomtatbaiviet=$_POST["tomtatbaiviet"];
		$noidungbaiviet=$_POST["noidungbaiviet"];
		$loaitin=$_POST["loaitin"];
		$loaisoft=$_POST["loaisoft"];
		$thutubaiviet=$_POST["thutu"];
		$trangthaibaiviet=$_POST["trangthai"];
		$file_path=$_FILES["anhminhhoa"]["tmp_name"];
		$file_name=$_FILES["anhminhhoa"]["name"];
		if(!empty($file_path))
		{
			move_uploaded_file($file_path,"../../source/".$file_name);
		}
		else
			$file_name=fileimage($_GET['idbaiviet']);
		$sql="Update baiviet Set tieudebaiviet='".$tieudebaiviet."',urlbaiviet='".convert_vi_to_en($tieudebaiviet)."',tomtatbaiviet='".$tomtatbaiviet."',noidungbaiviet='".$noidungbaiviet."',anhminhhoa='".$file_name."',loaitin='".$loaitin."',loaisoft='".$loaisoft."',trangthai='".$trangthaibaiviet."',nguoidang='".$_SESSION['username']."',datetime='".date('y-m-d h:i:s')."' Where idbaiviet=".$_GET['idbaiviet'];
		$query_excute=mysql_query($sql);
		header("location: ../index.php?quanly=baiviet&action=them");
	}
?>