<?php 
	include('editor.php');
	include("../config.php");
	$sql_loaisoft="Select * From loaisoft";
	$sql_loaisoft_excute=mysqli_query($connect,$sql_loaisoft);
?>
<div class="row">
	<div class="col-md-8">
        <form action="module/add-process.php" method="post" enctype="multipart/form-data">
            <div class="thembaiviet">
                <p>Thêm dữ liệu bài viết</p>
                <p>Tiêu đề bài viết</p><p><input name="tieudebaiviet" type="text"></p>
                <p>Tóm tắt bài viết</p><p><textarea name="tomtatbaiviet" cols="30" rows="5"></textarea></p>
                <p>Nội dung bài viết</p><p><textarea name="noidungbaiviet" cols="30" rows="30"></textarea></p>
                <p>Hình minh họa: </p><p><input type="file" name="anhminhhoa"></p>
                <p>Loại tin: <select name="loaitin">	
                        <option value="thuthuat">Thủ thuật (thuthuat)</option>
                        <option value="windows">Windows (windows)</option>    
                        <option value="ghost">Ghost (ghost)</option>
                        <option value="software">Phần mềm (software)</option>
                    </select>
                </p>
                <p>Phần mềm: <select name="loaisoft">
                        <?php
                            while($myarray_loaisoft=mysqli_fetch_array($sql_loaisoft_excute))
                            {
                        ?> 
                        <option value="<?php echo $myarray_loaisoft["tenloaisoft"]; ?>"><?php echo $myarray_loaisoft["tendaydu"]; ?></option>
                        <?php } ?>	
                    </select>
                </p>
                <p>Trạng thái: <select name="trangthai">
                                    <option value="Hienthi">Hiển thị</option>
                                    <option value="Khonghienthi">Không hiển thị</option>
                            </select> 
                </p>
                <p><input type="submit" name="thembaiviet" value="Thêm bài viết"></p>
            </div>
        </form>
	</div>
</div>
<?php include('module/list-baiviet.php'); ?>