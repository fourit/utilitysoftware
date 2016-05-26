<?php 
//Convert Tiếng Việt sang tiếng anh để lấy url
function convert_vi_to_en($str) 
{
	$str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
  	$str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
  	$str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
  	$str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
  	$str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
  	$str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
  	$str = preg_replace("/(đ)/", 'd', $str);
  	$str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
  	$str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
  	$str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
  	$str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
  	$str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
  	$str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
  	$str = preg_replace("/(Đ)/", 'D', $str);
  	$str = str_replace(" ", "-", str_replace("&*#39;","",$str));
  	$str = str_replace("/", "-", str_replace("&*#39;","",$str));
  	$str = str_replace("$", "-", str_replace("&*#39;","",$str));
  	$str = str_replace("#", "-", str_replace("&*#39;","",$str));	
  	$str = str_replace("@", "-", str_replace("&*#39;","",$str));	
  	$str = str_replace("*", "-", str_replace("&*#39;","",$str));	
  	$str = str_replace("%", "-", str_replace("&*#39;","",$str));	
  	$str = str_replace("*", "-", str_replace("&*#39;","",$str));	
  	$str = str_replace("(", "-", str_replace("&*#39;","",$str));	
  	$str = str_replace(")", "-", str_replace("&*#39;","",$str));	
  	$str = str_replace("=", "-", str_replace("&*#39;","",$str));	
  	$str = str_replace("&", "-", str_replace("&*#39;","",$str));		
  	$str = str_replace("!", "-", str_replace("&*#39;","",$str));		
  	$str = str_replace(".", "-", str_replace("&*#39;","",$str));			
  	$str = str_replace("'", "-", str_replace("&*#39;","",$str));			
  	return $str;
}
//Lấy tên ảnh đã có nếu admin không chọn ảnh
function fileimage($idbaiviet)
{
	GLOBAL $connect;
	$sql_fileimage="Select anhminhhoa From baiviet Where idbaiviet=".$idbaiviet;
	$sql_fileimage_query=mysqli_query($connect,$sql_fileimage);
	$array_file_image=mysqli_fetch_array($sql_fileimage_query);
	return $array_file_image['anhminhhoa'];
}
//Lấy title bài viết hiển thị lên title web

function title_baiviet($idbaiviet)
{
	GLOBAL $connect;
	$sql_title="Select tieudebaiviet From baiviet Where idbaiviet=".$idbaiviet;	
	$sql_title_excute=mysqli_query($connect,$sql_title);
	$array_title=mysqli_fetch_array($sql_title_excute);
	return $array_title['tieudebaiviet'];
}
?>