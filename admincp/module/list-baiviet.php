<table class="table table-responsive table-bordered">
	<thead>
    	<tr>
        	<th>Id bài viết</th>
            <th>Tên bài viết</th>
            <th>Link bài viết không dấu</th>
            <th>Trạng thái</th>
            <th colspan="2">Thao tác</th>
        </tr>
    </thead>
  	<tbody>
        
<?php
	$sql="Select idbaiviet,tieudebaiviet,urlbaiviet,trangthai From baiviet Order by idbaiviet DESC";
	$sql_query_excute=mysql_query($sql);
	while($myarray_listbaiviet=mysql_fetch_array($sql_query_excute))
	{
?>
	<tr>
        <td><?php echo $myarray_listbaiviet['idbaiviet']; ?></td>
        <td><?php echo $myarray_listbaiviet['tieudebaiviet']; ?></td>
        <td><?php echo $myarray_listbaiviet['urlbaiviet']; ?></td>
        <td><?php echo $myarray_listbaiviet['trangthai']; ?></td>
        <td><a href="index.php?quanly=baiviet&action=sua&idbaiviet=<?php echo $myarray_listbaiviet['idbaiviet']; ?>">Sửa</a></td>
        <td><a href="index.php?quanly=baiviet&action=xoa&idbaiviet=<?php echo $myarray_listbaiviet['idbaiviet']; ?>">Xóa</a></td>
   </tr>
<?php
	//Kết thúc vòng while
	}
?>
    </tbody>
</table>