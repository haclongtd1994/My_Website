<?php
	include('include/myconnect.php');
	include('checkuser.php');
?>
<?php
		if(isset($_POST['Quit'])){
			unset($_SESSION['user']);
			header("Location: http://luutruthietbiiot.000webhostapp.com/index.php");
			die();
		}
 ?>
<?php
	if(isset($_SESSION['user'])){
?>

<html>
	<head>
		<meta charset="utf-8"/>
		<title>Access_Successfull</title>
	</head>
	<body>
		<p>Congrulation You so <strong>Cool</strong> !</p>

		<form name="thoat" method="post">
			<p><input type="submit" name="Quit" value="Quit" /></p>
		</form>

	</body>
</html>


<?php }
else {
	?>
	<html>
		<head>
			<meta charset="utf-8"/>
			<title>Access_Fail</title>
		</head>
		<body>
			<p>You don't have permission to access my database !</p>
		</body>
	</html>
	<?php
} ?>
