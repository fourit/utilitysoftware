<?php include("config.php"); 
	$sql_count_loaisoft="Select * From loaisoft Where trangthai='Hienthi' And vitri=1 Order By thutu ASC";
	$sql_count_loaisoft_excute=mysqli_query($connect,$sql_count_loaisoft);
	while($mysql_count_loaisoft=mysqli_fetch_array($sql_count_loaisoft_excute))
	{
?>
<link rel="stylesheet" type="text/css" href="../style/css/bootstrap.min.css">
<div class="row menu-doc">
	<div class="col-sm-12">
    
<!--    Bắt đầu menu dọc-->

	<table class="table table-responsive" style="border:none;">
    	<thead></thead>
        <tbody>
        	<tr>
            	<td><img src="source/<?php echo $mysql_count_loaisoft["anhminhhoa"]; ?>" class="img-responsive" alt="" height="45px" width="45px"/></td>
                <td><a href="software/<?php echo $mysql_count_loaisoft["tenloaisoft"]; ?>"><?php echo $mysql_count_loaisoft["tendaydu"]; ?></a></td>
                <td><?php 
			$count_loaisoft="Select * From baiviet Where trangthai='Hienthi' And loaisoft='".$mysql_count_loaisoft['tenloaisoft']."'";
			$count_loaisoft_excute=mysqli_query($connect,$count_loaisoft);
			echo "[".mysqli_num_rows($count_loaisoft_excute)."]"; 
		?></td>
            	
            </tr>
        
        </tbody>
    </table>


	<!--	Kết thúc menu dọc-->
	</div>    
    
    
    
</div>
	<?php } ?>
<!--Box search-->
<form action="index.php" method="post" accept-charset="utf-8" class="form-group">
<div class="row box-search">
 	<input type="text" class="col-sm-10 txt-search" style="height:50px" name="txt-search" placeholder="Tìm kiếm theo tên phần mềm.........">
   	<input type="submit" name="btn-search" value="GO" class="btn btn-primary col-sm-2" style="height:50px">
</div>
</form>
<!--Bài viết mới nhất-->    
<div class="row baivietmoinhat">
	<div class="col-sm-12 glyphicon glyphicon-hand-right panel page-header">
		<span class="panel-title">Bài viết mới nhất</span>
    </div>
</div>
<?php
	
	if($_GET['idbaiviet'])
		$sql_baivietmoinhat="Select * From baiviet Where trangthai='Hienthi' And idbaiviet!=".$_GET['idbaiviet']." Order By idbaiviet DESC limit 0,5";
	else
		$sql_baivietmoinhat="Select * From baiviet Where trangthai='Hienthi' Order By idbaiviet DESC limit 0,5";
	$sql_baivietmoinhat_excute=mysqli_query($connect,$sql_baivietmoinhat);
	while($array_baivietmoinhat=mysqli_fetch_array($sql_baivietmoinhat_excute))
	{
?>
	<div class="row list_baivietmoinhat">
    	<div class="col-sm-3">
        	<img class="img-responsive" src="source/<?php echo $array_baivietmoinhat['anhminhhoa']; ?>">
        </div>
        <div class="col-sm-9">
        	<p><a href="<?php echo $array_baivietmoinhat['urlbaiviet']; ?>-<?php echo $array_baivietmoinhat['idbaiviet']; ?>.html"><?php echo $array_baivietmoinhat['tieudebaiviet'] ?></a></p>
            <div class="row">
            	<div class="col-sm-12">
                	<span class="capnhatboi">Cập nhật bởi: <?php echo $array_baivietmoinhat['nguoidang']; ?></span>
                </div>
            </div>
        </div>
    </div>
<?php } ?>