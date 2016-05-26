<?php
	$sql_del_baiviet="Delete From baiviet Where idbaiviet=".$_GET['idbaiviet'];
	$sql_del_baiviet_query=mysqli_query($connect,$sql_del_baiviet);
	header('location: index.php?quanly=baiviet&action=them');
?>