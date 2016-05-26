<div class="row box-left">
	<div class="col-sm-4 col-md-4">
        <form action="module/add-process.php" method="post" enctype="multipart/form-data">
        
        <p>Thêm loại soft</p>
                <p>Tên loại soft: <input type="text" name="tenloaisoft"></p>
                <p>Tên đầy đủ: <input type="text" name="tendaydu"></p>
                <p>Ảnh minh họa: <input type="file" name="anhminhhoa"></p>
                <p>Thứ tự: <input type="text" name="thutu"></p>
                <p>Trạng thái: <select name="trangthai">
                    <option value="Hienthi">Hiển thị</option>
                    <option value="Khonghienthi">Không hiển thị</option>
                </select>
                </p>
                <p>Vị trí hiển thị: <select name="vitri">
                	<option value="1">Top right</option>
                    <option value="2">Footer</option>
                </select>
                </p>
                <input type="submit" name="themloaisoft" value="Thêm loại soft">
        </form>
     </div>
	<div class="col-sm-8 col-md-8">
				<table class="table table-hover table-bordered">
                    <tr>
                        <th>Id loại soft</th>
                        <th>Tên loại soft</th>
                        <th>Tên đầy đủ</th>
                        <th>Ảnh minh họa</th>
                        <th>Thứ tự</th>
                        <th>Vị trí</th>
                        <th>Trạng thái</th>
                    </tr>
                    <?php 
						include("../config.php");
						$sql_loaisoft="Select * From loaisoft Order By thutu DESC";
						$sql_loaisoft_excute=mysqli_query($connect,$sql_loaisoft);
						while($my_array_loaisoft=mysqli_fetch_array($sql_loaisoft_excute))
						{
					?>
                    <tr>
                    	<td><?php echo $my_array_loaisoft["idloaisoft"]; ?></td>
                        <td><?php echo $my_array_loaisoft["tenloaisoft"]; ?></td>
                        <td><?php echo $my_array_loaisoft["tendaydu"]; ?></td>
                        <td><img width="50px" height="40px" src="../source/<?php echo $my_array_loaisoft["anhminhhoa"]; ?>"></td>
                        <td><?php echo $my_array_loaisoft["thutu"]; ?></td>
                        <td><?php echo ($my_array_loaisoft["vitri"]=='1')?"Top right":"Footer";?></td>
                        <td><?php echo $my_array_loaisoft["trangthai"]; ?></td>
                    </tr>
                    <?php } ?>
                </table>
	</div>
</div>