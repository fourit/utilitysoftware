<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Đăng nhập trang quản trị Thủ Thuật - Tiện Ích</title>
<link rel="stylesheet" type="text/css" href="../style/css/custom.css">
<link rel="stylesheet" type="text/css" href="../style/css/bootstrap.min.css">
<link rel="icon" href="source/logo_Four.png" type="image/gif" >
</head>

<body>
	<div class="log">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-4 col-sm-4 col-xs-offset-3 icon-login log-img">
                	<img src="../source/LoginManager.png" class="img-responsive"  alt="lock login"/>
                </div>
                <div class="col-md-5 col-sm-5 log-form col-xs-pull-3">
					<form action="module/process.php" method="post">
                    	<p>Username: <input autofocus type="text" name="username" placeholder="Nhập username...."></p>
                        <p>Password: <input type="password" name="password" placeholder="Nhập password...."></p>
                        <p><input type="submit" name="login" value="Đăng nhập"><a href="#">Quên mật khẩu?</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>