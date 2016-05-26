<?php
//	Liệt kê bài viết theo loại tin		
	function lietkebaiviet($baiviet,$loaisoft,$cp)
	{
		GLOBAL $connect;
		if(is_null($cp))
			$cp=1;
		if($baiviet==NULL and $loaisoft==NULL)
			$baiviet="trangchu";
		if(is_null($baiviet) || $baiviet=='trangchu')
			{
				$cp-=1;	if($cp<0) $cp=$cp+abs($cp); //Lấy chỉ số limit bắt đầu từ record 0
				$cp*=10;//Mỗi page lấy 10 bản ghi và page thứ 2 bắt đầu từ vị trí thứ 1*10
				$sql="Select * From baiviet Where trangthai='Hienthi' limit $cp,10";
				$sql_num_row="Select * From baiviet Where trangthai='Hienthi'";	
			}
		else
				{
					$cp-=1; if($cp<0) $cp=$cp+abs($cp); 
					$cp*=10; 
					$sql="Select * From baiviet Where loaitin='".$_GET['baiviet']."' And trangthai='Hienthi' limit $cp,10";
					$sql_num_row="Select * From baiviet Where loaitin='".$_GET['baiviet']."' And trangthai='Hienthi'";
				}
		if($loaisoft!=NULL)
		{
			if($cp<0) $cp=$cp+abs($cp); 
			$sql="Select * From baiviet Where loaisoft='".$_GET['loaisoft']."' And trangthai='Hienthi' limit $cp,10";
			$sql_num_row="Select * From baiviet Where loaisoft='".$_GET['loaisoft']."' And trangthai='Hienthi'";
		}
		$cp/=10;
		if($_GET['baiviet']=='lienhe')
			include('module/lienhe.php');
		$query_excute=mysqli_query($connect,$sql);
		while($my_array=mysqli_fetch_array($query_excute))
		{
?>                         
			<div class="row tieudebaiviet">
				<div class="col-sm-12">
                	<?php
					//Trường hợp không có bài viết có nghĩa đang ở trang chủ
						$url="<a href='".$my_array['urlbaiviet']."-".$my_array['idbaiviet'].".html'>".$my_array['tieudebaiviet']."</a>";                     				
						if(isset($_GET['baiviet']))
	               			$url="<a href='".$_GET['baiviet']."/".$my_array['urlbaiviet']."-".$my_array['idbaiviet'].".html'>".$my_array['tieudebaiviet']."</a>";                     				
						if($_GET['baiviet']=="trangchu")							
							$url="<a href='".$my_array['urlbaiviet']."-".$my_array['idbaiviet'].".html'>".$my_array['tieudebaiviet']."</a>";    
						if(isset($_GET['loaisoft'])) 
               				$url="<a href='".$my_array['urlbaiviet']."-".$my_array['idbaiviet'].".html'>".$my_array['tieudebaiviet']."</a>";                     				
						echo $url;
                    ?>
				</div>
			</div>
			<div class="row tomtatbaiviet">
				<div class="col-sm-3">
					<img src="source/<?php echo $my_array["anhminhhoa"]; ?>" class="img-responsive">
				</div>
				<div class="col-sm-9">
					<?php echo $my_array["tomtatbaiviet"]; 
					?>
				</div>
			</div>
        <?php }?>
<!--/*        Phân trang ở chỗ này*/-->
			<!--Đếm tổng số bài viết theo loại soft hoặc bài viết-->
        <?php  
			$sql_num_row_excute=mysqli_query($connect,$sql_num_row);
			$num_row=ceil(mysqli_num_rows($sql_num_row_excute)/10);
		?>
		<div class="row">
        	<div class="col-sm-12">
            	<div class="box-phantrang">
                	<ul class="phantrang">
                    	<li><a href="index.php?<?php if(is_null($baiviet)) echo 'loaisoft'; else echo 'baiviet'; ?>=<?php if(is_null($baiviet)) echo $loaisoft; else echo $baiviet;?>&cp=<?php echo 1; ?>"><?php if($num_row>=2) echo "Về đầu" ?></a></li>                
                    	<li><a href="index.php?<?php if(is_null($baiviet)) echo 'loaisoft'; else echo 'baiviet'; ?>=<?php if(is_null($baiviet)) echo $loaisoft; else echo $baiviet;?>&cp=<?php echo $cp-2; ?>"><?php if(($cp-2<=$num_row) and $num_row>=2 and $cp-2>0) echo $cp-2;?></a></li>
                        <li><a href="index.php?<?php if(is_null($baiviet)) echo 'loaisoft'; else echo 'baiviet'; ?>=<?php if(is_null($baiviet)) echo $loaisoft; else echo $baiviet;?>&cp=<?php echo $cp-1; ?>"><?php if($num_row>=2 and $cp-1>0) echo $cp-1;?></a></li>
                        <li><a href="index.php?<?php if(is_null($baiviet)) echo 'loaisoft'; else echo 'baiviet'; ?>=<?php if(is_null($baiviet)) echo $loaisoft; else echo $baiviet;?>&cp=<?php echo $cp; ?>"><?php if(($cp<=$num_row) and $cp>0 and $num_row>=2) echo $cp;?></a></li>
                        <li><a href="index.php?<?php if(is_null($baiviet)) echo 'loaisoft'; else echo 'baiviet'; ?>=<?php if(is_null($baiviet)) echo $loaisoft; else echo $baiviet;?>&cp=<?php echo $cp+1; ?>"><?php if(($cp+1<=$num_row) and $num_row>=2) echo $cp+1;?></a></li>
                        <li><a href="index.php?<?php if(is_null($baiviet)) echo 'loaisoft'; else echo 'baiviet'; ?>=<?php if(is_null($baiviet)) echo $loaisoft; else echo $baiviet;?>&cp=<?php echo $cp+2; ?>"><?php if(($cp+2<=$num_row) and $num_row>=2) echo $cp+2;?></a></li>
                    	<li><a href="index.php?<?php if(is_null($baiviet)) echo 'loaisoft'; else echo 'baiviet'; ?>=<?php if(is_null($baiviet)) echo $loaisoft; else echo $baiviet;?>&cp=<?php echo $num_row; ?>"><?php if($num_row>=2) echo "Về cuối" ?></a></li>                
                    </ul>
                </div>
          	</div>
        </div>
        
	<?php  } ?>
<!--//Kết thúc hàm liệt kê bài viết-->
		<?php
		//Bắt đầu hàm chi tiết loại tin bài viết
		function chitietloaitin()
		{
			GLOBAL $connect;
			$chitietloaitin=$_GET["baiviet"];
			$idbaiviet=$_GET["idbaiviet"];
			$sql="Select * From baiviet Where loaitin='".$chitietloaitin."' And trangthai='Hienthi' And idbaiviet=".$idbaiviet."";
			if(is_null($_GET['baiviet']) or $_GET['baiviet']=='trangchu')
				$sql="Select * From baiviet Where trangthai='Hienthi' And idbaiviet=".$idbaiviet."";
			$query_excute1=mysqli_query($connect,$sql);
			$my_array=mysqli_fetch_array($query_excute1);
		?>
		<div class="row tieudechitietloaitin">
        	<div class="col-sm-12">
            	<?php echo $my_array["tieudebaiviet"]; ?>
            </div>
            <div class="row">
                <div class="col-sm-12 date-time">
                    <p>Cập nhật bởi: <?php echo $my_array['nguoidang'];echo "  ".$my_array['datetime']; ?> </p>            
                </div>
            </div>
        </div>
        <div class="row chitietnoidungbaiviet">
        	<div class="col-sm-6">
            	<img class="img-responsive" src="source/<?php echo $my_array["anhminhhoa"]; ?>">
            </div>
              	<?php echo "<span class='img-res'>".$my_array["noidungbaiviet"]."</span>"; ?>                
        </div>
        <div class="baivietlienquan">
        	<div class="row">
            	<div class="col-sm-11 co-the-ban-quan-tam">
                	Có thể bạn quan tâm
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 tieudebaivietlienquan">
					<?php 
						$query_baivietlienquan="Select * From baiviet Where trangthai='Hienthi' And loaisoft='".$_GET['loaisoft']."' And idbaiviet!=".$idbaiviet." Order By Rand() Limit 0,4";
						$query_baivietlienquan="Select * From baiviet Where trangthai='Hienthi' And idbaiviet!='".$idbaiviet."' Order By Rand() Limit 0,4";
						if(isset($_GET['loaisoft']))	
							$query_baivietlienquan="Select * From baiviet Where trangthai='Hienthi' And loaisoft='".$_GET['loaisoft']."' And idbaiviet!=".$idbaiviet." Order By Rand() Limit 0,4";
						if(isset($_GET['baiviet']))
							$query_baivietlienquan="Select * From baiviet Where trangthai='Hienthi' And loaitin='".$_GET['baiviet']."' And idbaiviet!=".$idbaiviet." Order By Rand() Limit 0,4";	
/*						if(is_null($_GET['loaisoft']) and is_null($_GET['baiviet']))							
							$query_baivietlienquan="Select * From baiviet Where idbaiviet!='".$idbaiviet."'";
*/	
						$result_baivietloaitin=mysqli_query($connect,$query_baivietlienquan);
					?>
							<div class="row"><!--//Mỗi phần tử là 6 ô, sau khi hết 12 ô sẽ float trái-->
					<?php
						while($array_baivietlienquan=mysqli_fetch_array($result_baivietloaitin))		
						{?>
                        	
                            	<div class="col-sm-6 box-co-the-ban-quan-tam">
                                	<div class="row">
                                        	<div class="col-sm-3">
												<img class="img-responsive" src="source/<?php echo $array_baivietlienquan['anhminhhoa'] ?>">
                                            </div>
                                            <div class="col-sm-9 item_baivietlienquan">
                                                <a href="<?php echo $array_baivietlienquan['urlbaiviet'] ?>-<?php echo $array_baivietlienquan['idbaiviet']; ?>.html"><?php echo $array_baivietlienquan['tieudebaiviet']; ?></a>
                                                <p class="nguoi-dang">Cập nhật bởi: <?php echo $array_baivietlienquan['nguoidang'];echo "   ".$array_baivietlienquan['datetime']; ?></p>
                                            </div>
                                    </div>
                                </div>
                           
					<?php			
						}
					?>     
                    		 </div>               
                </div>
            </div>
        </div>

<!-----Facebook comment--->
<div class="row">
	<div class="col-sm-12">
		<div class="fb-comments" data-href="thuthuattienich.netne.net" data-colorscheme="light" data-numposts="5" data-width="auto"></div>											
        </div>

</div>

<!---End face comment---->


        
		<?php 
		}  //Kết thúc hàm chi tiết loại tin ?>
        <?php //Begin function search ?>
<?php
//	Liệt kê bài viết theo loại tin		
	function search()
	{
		$keyword_search=$_POST["txt-search"];
		$sql_search="Select * From baiviet Where trangthai='Hienthi' And noidungbaiviet like '%".$keyword_search."%'";		
		$sql_search_query=mysqli_query($connect,$sql_search);
		while($my_array_search=mysqli_fetch_array($sql_search_query))
		{
?>                         
			<div class="row tieudebaiviet">
				<div class="col-sm-12">
                	<?php
           				$url="<a href='index.php?loaisoft=".$my_array_search['loaisoft']."&idbaiviet=".$my_array_search['idbaiviet']."'>".$my_array_search['tieudebaiviet']."</a>";                     				
						echo $url;
                    ?>
				</div>
			</div>
			<div class="row tomtatbaiviet">
				<div class="col-sm-3">
					<img src="source/<?php echo $my_array_search["anhminhhoa"]; ?>" class="img-responsive">
				</div>
				<div class="col-sm-9">
					<?php echo $my_array_search["tomtatbaiviet"]; ?>
				</div>
			</div>
        <?php }
	} 
	//End Function search

		if(isset($_POST['btn-search']))
			search();
		else
			if(is_null($_GET['idbaiviet']))		
				lietkebaiviet($_GET['baiviet'],$_GET['loaisoft'],$_GET['cp']);
			else
				chitietloaitin();

	
	?>
	
	

		
