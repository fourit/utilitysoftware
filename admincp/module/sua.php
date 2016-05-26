<?php 
	include("editor.php"); 
	$sql_loaisoft="Select * From loaisoft";
	$sql_loaisoft_excute=mysqli_query($connect,$sql_loaisoft);
	$sql_suabaiviet="Select * From baiviet Where idbaiviet='".$_GET['idbaiviet']."'";
	$sql_sua_excute=mysqli_query($connect,$sql_suabaiviet);
	$myarray_suabaiviet=mysqli_fetch_array($sql_sua_excute);
?>
<div class="row">
	<div class="col-md-8">
        <form action="module/add-process.php?idbaiviet=<?php echo $_GET['idbaiviet']; ?>" method="post" enctype="multipart/form-data">
            <div class="thembaiviet">
                <p>Sửa dữ liệu bài viết</p>
                <p>Tiêu đề bài viết</p><p><input name="tieudebaiviet" type="text" value="<?php echo $myarray_suabaiviet['tieudebaiviet']; ?>"></p>
                <p>Tóm tắt bài viết</p><p><textarea name="tomtatbaiviet" cols="80" rows="5"><?php echo $myarray_suabaiviet['tomtatbaiviet']; ?></textarea></p>
                <p>Nội dung bài viết</p><p><textarea name="noidungbaiviet" cols="80" rows="30"><?php echo $myarray_suabaiviet['noidungbaiviet']; ?></textarea></p>
                <p>Hình minh họa: </p>
                <p> <img class="img-responsive" src="../source/<?php echo $myarray_suabaiviet['anhminhhoa']; ?>"</p>
                <p><input type="file" name="anhminhhoa" value="<?php echo $myarray_suabaiviet['anhminhhoa']; ?>"></p>
                <p>Loại tin: <select name="loaitin">	
                        <option <?php if($myarray_suabaiviet['loaitin']=='thuthuat') echo 'selected';?> value="thuthuat">Thủ thuật (thuthuat)</option>
                        <option <?php if($myarray_suabaiviet['loaitin']=='windows') echo 'selected';?> value="windows">Windows (windows)</option>    
                        <option <?php if($myarray_suabaiviet['loaitin']=='ghost') echo 'selected';?> value="ghost">Ghost (ghost)</option>
                        <option <?php if($myarray_suabaiviet['loaitin']=='software') echo 'selected';?> value="software">Phần mềm (software)</option>
                    </select>
                </p>
                <p>Phần mềm: <select name="loaisoft">
                        <?php
                            while($myarray_loaisoft=mysqli_fetch_array($sql_loaisoft_excute))
                            {
                        ?> 
                        <option <?php if($myarray_loaisoft['tenloaisoft']==$myarray_suabaiviet['loaisoft']) echo "selected"; ?> value="<?php echo $myarray_loaisoft["tenloaisoft"]; ?>"><?php echo $myarray_loaisoft["tendaydu"]; ?></option>
                        <?php } ?>	
                    </select>
                </p>
                <p>Trạng thái: <select name="trangthai">
                                    <option <?php if($myarray_suabaiviet['trangthai']=='Hienthi') echo "selected";?> value="Hienthi">Hiển thị</option>
                                    <option <?php if($myarray_suabaiviet['trangthai']=='Khonghienthi') echo "selected";?> value="Khonghienthi">Không hiển thị</option>
                            </select> 
                </p>
                <p><input type="submit" name="suabaiviet" value="Sửa bài viết"></p>
            </div>
        </form>
	</div>
</div>
<?php include('module/list-baiviet.php'); ?>