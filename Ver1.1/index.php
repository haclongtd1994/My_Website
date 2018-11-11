<?php
    session_start();
    if(isset($_POST['button'])) {
        header("Location: http://luutruthietbiiot.000webhostapp.com/login.php");
        die();
    }
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

    <form name="login" method="post">
        <input class="center" type="submit" name="button" value="Click_Here_To_Login" />
    </form>

		<hr>
		<p class="middle"><font size="+2">Tác giả: <strong>Phan Thanh Hùng</strong> </font> </p>
        <p class="middle">Bản Quyền: 2018</p>
        <p class="middle">Made in VIETNAM</p>
		<div id="idLocalTime" class="middle"></div>
		<hr>

		<table>
        <tr>
            <td colspan="2" class="infor">ĐỒ ÁN TỐT NGHIỆP IOT</td>
        </tr>
        <tr>
            <th><strong style="color:red;">Chuyên nghành: </strong></th>
            <th>Điện Điện Tử</th>
        </tr>
        <tr>
            <th><strong style="color:red;">GCHD: </strong></th>
            <th>None</th>
        </tr>
        <tr>
            <th><strong style="color:red;">SVTH: </strong></th>
            <th>Phan Thanh Hùng</th>
        </tr>
        <tr>
            <th><strong style="color:red;">Đề tài: </strong></th>
            <th>Điều khiển thiết bị thông qua mạng Wireless phối hợp chuẩn mạng công nghiệp ZigBee</th>
        </tr>
        <tr>
            <th><strong style="color:red;">Tổng quan: </strong></th>
            <th><strong>1 Node chính</strong> : Các node phụ(Điều khiển các phân khu)</th>
        </tr>
    </table>


	</body>
</html>
