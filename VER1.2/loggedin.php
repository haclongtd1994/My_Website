<?php
	session_start();
	if(isset($_POST['quit'])){
		unset($_SESSION['user']);
		header("Location: http://luutruthietbiiot.000webhostapp.com/index.php");
		die();
	}
	if(isset($_POST['account']))
	{
		header("Location: http://luutruthietbiiot.000webhostapp.com/account.php");
		die();
	}
	if(isset($_POST['device']))
	{
		header("Location: http://luutruthietbiiot.000webhostapp.com/device_computer.php");
		die();
	}
 ?>
<?php
	if(isset($_SESSION['user'])){
?>

<html>
	<head>
		<meta charset="utf-8"/>
		<title>My_IOT_Dash_Board</title>

		<style type="text/css">
			table{
		        background-color: #A19F9F;
		        font-size: 16px;
		        border: none;
		        margin: auto;
		     }
		     .infor{
		        font-size: 20px;
		        font-weight: bold;
		        color: #C30E0E;
		        text-align: center;
		     }
			img.image{
				display: block;
				margin-left: auto;
				margin-right: auto;
			}
			.middle{
				margin: auto;
				text-align: center;
				color: #3982b2;
			}
		    .center{
		        display: block;
		        margin-left: auto;
		        margin-right: auto;
		        width: 250px;
		     }
		    .menu{
		    	font-size: 28px;
		        font-weight: bold;
		        color: #C30E0E;
		        text-align: center;
		    }
		    table label{
		    	font-size: 24px;
		    	font-weight: bold;
		    	color: #06303E;
		    }
		</style>

		<script type="text/javascript">
			var myTimer = setInterval(function(){
													loadTime();
												}
												,1000);
			function loadTime(){
				var d = Date(); //Lay thoi gian hien tai
				document.getElementById("idLocalTime").innerHTML = "<b>Local Time: </b>" + d.toString();
			}
		</script>
	</head>
	<body background="background_index.jpeg">
		<img src="logo_hcmute.png" alt="Đại Học Sư Phạm Kỹ THuật HCM" class="image"></img>
		<br>

    	<p class="infor"><strong>Logged IN Successfull !</strong></p>
		<form name="menu" method="post">
			<table>
				<tr>
					<th colspan="2" class="menu">Manager_My_Home</th>
				</tr>
				<tr>
					<td><label>Manager_Account_Password :</label></td>
					<td><input type="submit" name="account" value="Click here !"></td>
				</tr>
				<tr>
					<td><label>Manager_Device :</label></td>
					<td><input type="submit" name="device" value="Click here !"></td>
				</tr>
				<tr>
					<td><label>LogOut :</label></td>
					<td><input type="submit" name="quit" value="Click here !"></td>
				</tr>
			</table>
		</form>
		<hr>
		<p class="middle"><font size="+2">Tác giả: <strong>Phan Thanh Hùng</strong> </font> </p>
        <p class="middle">Bản Quyền: 2018</p>
        <p class="middle">Made in VIETNAM</p>
		<div id="idLocalTime" class="middle"></div>
		<hr>

		<table>
	        <tr>
	            <td colspan="2" class="infor">ĐỒ ÁN TỐT NGHIỆP</td>
	        </tr>
	        <tr>
	            <th><strong style="color:red;">Chuyên nghành: </strong></th>
	            <th>Điện Điện Tử</th>
	        </tr>
	        <tr>
	            <th><strong style="color:red;">GCHD: </strong></th>
	            <th>Nguyễn Đình Phú</th>
	        </tr>
	        <tr>
	            <th><strong style="color:red;">SVTH: </strong></th>
	            <th>Phan Thanh Hùng</th>
	        </tr>
	        <tr>
	            <th><strong style="color:red;">Đề tài: </strong></th>
	            <th>Điều khiển giám sát tòa nhà</th>
	        </tr>
	    </table>

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
