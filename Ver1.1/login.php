<?php
	include('include/myconnect.php');
	include('checkuser.php');
	if(isset($_SESSION['user'])){
        header("Location: http://luutruthietbiiot.000webhostapp.com/loggedin.php");
        die();
  }
?>

<html>
	<head>
		<meta charset="utf-8"/>
		<title>My_IOT_Dash_Board</title>
		<style type="text/css">
			table{
				width: 500px;
				height: 200px;
				background-color:#9cc8e5;
				margin: auto;
			}
			table input[type="submit"]{
				align-content: center;
				font-size: 18px;
				font-weight: bold;
				cursor: pointer;
			}
			table label{
				font-size: 16px;
				font-weight: inherit;
			}
			.title{
				font-size: 18px;
				font-weight: bold;
				background-color: #b59cbb;
				padding: 6px 0;
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

		<hr>
		<p class="middle"><font size="+2">Tác giả: <strong>Phan Thanh Hùng</strong> </font> </p>
        <p class="middle">Bản Quyền: 2018</p>
        <p class="middle">Made in VIETNAM</p>
		<div id="idLocalTime" class="middle"></div>
		<hr>

		<form name="dangnhap" method="post">
			<table>
				<tr>
					<th colspan="2" class="title">Vui Lòng Đăng Nhập</th>
				</tr>
				<tr>
					<td><label>Tài Khoản:</label> </td>
					<td><input type="text" name="tk" value=""/></td>
				</tr>
				<tr>
					<td><label>Mật Khẩu: </label></td>
					<td><input type="password" name="mk" value=""/></td>
				</tr>
				<tr>
					<td colspan="2" class="title"><input type="submit" name="submit" value="Đăng Nhập"/></td>
				</tr>
			</table>
		</form>


		<?php
			if($connect_server==1)
			{
		?>
			<p align="center" style="color:red">PHP_SERVER_CONNECT_OK</p>
		<?php
			}
		?>
	</body>
</html>
