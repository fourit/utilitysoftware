<?php session_start();
	ob_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Trang quản trị Thủ Thuật - Tiện Ích</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="../style/css/custom.css">
<link rel="stylesheet" type="text/css" href="../style/css/bootstrap.min.css">
<link rel="icon" href="../source/logo_Four.png" type="image/gif" >
</head>

<body>
	<?php include("../config.php"); ?>
    <?php 
		if(is_null($_SESSION["username"]) & is_null($_SESSION["password"]))
			header("location: log.php");
	?>
	<div class="header-adcp">
    	<div class="container">
        	<div class="row">
            	<div class="col-sm-12 col-md-12">
                	<p>Trang quản trị thủ thuật - tiện ích</p>
                    <p>admin: Nguyễn Văn Tư</p>
                    <p>developer: Mr. FourIT</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container content">
		<div class="row">
        	<div class="col-sm-2 col-md-2 content-left">
           		<div class="menu">
                    <ul>
                        <li><a href="index.php?quanly=baiviet&action=them">Quản lý bài viết</a></li>
                        <li><a href="index.php?quanly=loaisoft&action=them">Quản lý loại soft</a></li>
                        <li><a href="#">Quản lý tài khoản</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-10 col-md-10 content-right">
            	<?php include("module/content-right.php"); ?>
            </div>
        </div>
    </div>
</body>
</html>