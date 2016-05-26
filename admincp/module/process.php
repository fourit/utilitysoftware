<?php session_start(); ?>
<?php 
	include("../../config.php");
		
		$username=$_POST["username"];
		$password=$_POST["password"];
		$query="Select * From account Where username='".$username."' And password='".$password."'";
		$query_excute=mysql_query($query);
		$num_row=mysql_num_rows($query_excute);
		if($num_row==1)
			{
				$_SESSION["username"]=$username;
				$_SESSION["password"]=$password;
				header("location: ../index.php");
			}
		else
			header("location: ../log.php");

?>