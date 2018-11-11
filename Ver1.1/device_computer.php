<?php
	session_start();
	include('include/myconnect.php');
	if(isset($_POST['back'])){
		header("Location: http://luutruthietbiiot.000webhostapp.com/loggedin.php");
		die();
	}
	$tang1=3;$tang2=3;$account_exists_rm=3;
	if(isset($_POST['submit'])){
		if($_POST['tang']=='1'){
			$sql_COUNT="SELECT * FROM `device_status`";
			$stmt=$conn->query($sql_COUNT);
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			$count=$stmt->rowCount();

			$sql_SELECT = "SELECT * FROM `device_status` WHERE `SERIALNUMBER` = \"";
			$sql_SELECT = $sql_SELECT.$_POST["tb"]."\"";
			if($stmt = $conn->query($sql_SELECT)->fetch()){
				$tang1=0;
				$sql_INSERT = "UPDATE `device_status` SET";
				$sql_INSERT = $sql_INSERT."`DATA`=";
				$sql_INSERT = $sql_INSERT."\"".$_POST["dl"]."\",`DATETIME`= ";
				$sql_INSERT = $sql_INSERT."\"".$date_time."\" ";
				$sql_INSERT = $sql_INSERT."WHERE `SERIALNUMBER`=";
				$sql_INSERT = $sql_INSERT."\"".$_POST["tb"]."\";";
				$sql_INSERT = $sql_INSERT."INSERT INTO `device` (";
				$sql_INSERT = $sql_INSERT."`SERIALNUMBER`,`DATA`,`DATETIME`) VALUES (";
				$sql_INSERT = $sql_INSERT."\"".$_POST["tb"]."\",";
				$sql_INSERT = $sql_INSERT."\"".$_POST["dl"]."\",";
				$sql_INSERT = $sql_INSERT."\"".$date_time."\")";
				//thuc thi lenh SQL
				//echo $sql_INSERT;//ffor test
				$stmt = $conn->query($sql_INSERT);
			}
			else{
				if($count<5){
					$tang1=0;
					$sql_INSERT = "INSERT INTO `device_status` (";
					$sql_INSERT = $sql_INSERT."`SERIALNUMBER`,`DATA`,`DATETIME`) VALUES (";
					$sql_INSERT = $sql_INSERT."\"".$_POST["tb"]."\",";//dau \" de in ra dau "
					$sql_INSERT = $sql_INSERT."\"".$_POST["dl"]."\",";
					$sql_INSERT = $sql_INSERT."\"".$date_time."\");";
					$sql_INSERT = $sql_INSERT."INSERT INTO `device` (";
					$sql_INSERT = $sql_INSERT."`SERIALNUMBER`,`DATA`,`DATETIME`) VALUES (";
					$sql_INSERT = $sql_INSERT."\"".$_POST["tb"]."\",";//dau \" de in ra dau "
					$sql_INSERT = $sql_INSERT."\"".$_POST["dl"]."\",";
					$sql_INSERT = $sql_INSERT."\"".$date_time."\")";
					//thuc thi lenh SQL
					//echo $sql_INSERT;//ffor test
					$stmt = $conn->query($sql_INSERT);
				}
				else{
					$tang1=1;
				}
			}

		}
		else if($_POST['tang']=='2'){
			$sql_COUNT="SELECT * FROM `device_status2`";
			$stmt=$conn->query($sql_COUNT);
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			$count=$stmt->rowCount();

			$sql_SELECT = "SELECT * FROM `device_status2` WHERE `SERIALNUMBER` = \"";
			$sql_SELECT = $sql_SELECT.$_POST["tb"]."\"";
			if($stmt = $conn->query($sql_SELECT)->fetch()){
				$tang2=0;
				$sql_INSERT = "UPDATE `device_status2` SET";
				$sql_INSERT = $sql_INSERT."`DATA`=";
				$sql_INSERT = $sql_INSERT."\"".$_POST["dl"]."\",`DATETIME`= ";
				$sql_INSERT = $sql_INSERT."\"".$date_time."\" ";
				$sql_INSERT = $sql_INSERT."WHERE `SERIALNUMBER`=";
				$sql_INSERT = $sql_INSERT."\"".$_POST["tb"]."\";";
				$sql_INSERT = $sql_INSERT."INSERT INTO `device2` (";
				$sql_INSERT = $sql_INSERT."`SERIALNUMBER`,`DATA`,`DATETIME`) VALUES (";
				$sql_INSERT = $sql_INSERT."\"".$_POST["tb"]."\",";
				$sql_INSERT = $sql_INSERT."\"".$_POST["dl"]."\",";
				$sql_INSERT = $sql_INSERT."\"".$date_time."\")";
				//thuc thi lenh SQL
				//echo $sql_INSERT;//ffor test
				$stmt = $conn->query($sql_INSERT);
			}
			else{
				if($count<5){
					$tang2=0;
					$sql_INSERT = "INSERT INTO `device_status2` (";
					$sql_INSERT = $sql_INSERT."`SERIALNUMBER`,`DATA`,`DATETIME`) VALUES (";
					$sql_INSERT = $sql_INSERT."\"".$_POST["tb"]."\",";//dau \" de in ra dau "
					$sql_INSERT = $sql_INSERT."\"".$_POST["dl"]."\",";
					$sql_INSERT = $sql_INSERT."\"".$date_time."\");";
					$sql_INSERT = $sql_INSERT."INSERT INTO `device2` (";
					$sql_INSERT = $sql_INSERT."`SERIALNUMBER`,`DATA`,`DATETIME`) VALUES (";
					$sql_INSERT = $sql_INSERT."\"".$_POST["tb"]."\",";//dau \" de in ra dau "
					$sql_INSERT = $sql_INSERT."\"".$_POST["dl"]."\",";
					$sql_INSERT = $sql_INSERT."\"".$date_time."\")";
					//thuc thi lenh SQL
					//echo $sql_INSERT;//ffor test
					$stmt = $conn->query($sql_INSERT);
				}
				else{
					$tang2=1;
				}
			}

		}
	}
	if(isset($_POST['submit_rm'])){
		if($_POST['tang_rm']=="1"){
			$sql_SELECT = "SELECT * FROM `device_status` WHERE `SERIALNUMBER` = \"";
			$sql_SELECT = $sql_SELECT.$_POST["tb_rm"]."\"";
			$sql_SELECT2 = "SELECT * FROM `device_status` WHERE `SERIALNUMBER` <> ''";
			$stmtn=$conn->query($sql_SELECT2);
			$stmtn->setFetchMode(PDO::FETCH_ASSOC);
			$n=$stmtn->rowCount();
			if(($stmt=$conn->query($sql_SELECT)->fetch())&&($n>1)){		
				$account_exists_rm=1;
				$sql_DELETE = "DELETE FROM `device_status` WHERE `SERIALNUMBER`=";
				$sql_DELETE = $sql_DELETE."\"".$_POST["tb_rm"]."\"";
				$stmt = $conn->query($sql_DELETE);
			}
			else{
				$account_exists_rm=0;
			}
		}
		else if($_POST['tang_rm']=="2"){
			$sql_SELECT = "SELECT * FROM `device_status2` WHERE `SERIALNUMBER` = \"";
			$sql_SELECT = $sql_SELECT.$_POST["tb_rm"]."\"";
			$sql_SELECT2 = "SELECT * FROM `device_status2` WHERE `SERIALNUMBER` <> ''";
			$stmtn=$conn->query($sql_SELECT2);
			$stmtn->setFetchMode(PDO::FETCH_ASSOC);
			$n=$stmtn->rowCount();
			if(($stmt = $conn->query($sql_SELECT)->fetch())&&($n>1)){		
				$account_exists_rm=1;
				$sql_DELETE = "DELETE FROM `device_status2` WHERE `SERIALNUMBER`=";
				$sql_DELETE = $sql_DELETE."\"".$_POST["tb_rm"]."\"";
				$stmt = $conn->query($sql_DELETE);
			}
			else{
				$account_exists_rm=0;
			}
		}
	}
?>


<?php
	if(isset($_SESSION['user'])){
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>
			Device_manager_IoT
		</title>
		<style type="text/css">
			table{
				background : linear-gradient(to left, #51DBFF, #6E2286);
    			background : -moz-linear-gradient(left, #51DBFF, #6E2286);
    			background : -webkit-linear-gradient(left, #51DBFF, #6E2286);
    			background : -o-linear-gradient(left, #51DBFF, #6E2286);
				margin: auto;
				padding: 6px 0;
			}
			.header{
				text-align: left;
				font-weight: bold;
				font-size: 20px;
				color: #FF0019;
			}
			.tg{
				color: #FFF900;
			}
			.nd{
				color: black;
			}
		</style>
		<script type="text/javascript">
        	var myTimer = setInterval(function(){
													loadTime();
												}
												,1000);
			function loadTime(){
				var d = Date(); //Lay thoi gian hien tai
				document.getElementById("idLocalTime").innerHTML = "<b>Local TIme: </b>" + d.toString();
			}

			var myTimeout = setTimeout(function(){
													loadXMLDoc();
												}
												,100);
			var xmlhttp;
			var XMLstr="",json;
			var iddevice={
				"0":"idDevice0",
				"1":"idDevice1",
				"2":"idDevice2",
				"3":"idDevice3",
				"4":"idDevice4"
			};
			var datadevice={
				"0":"dataDevice0",
				"1":"dataDevice1",
				"2":"dataDevice2",
				"3":"dataDevice3",
				"4":"dataDevice4"
			};
			var iddevice2={
				"0":"idDevice02",
				"1":"idDevice12",
				"2":"idDevice22",
				"3":"idDevice32",
				"4":"idDevice42"
			};
			var datadevice2={
				"0":"dataDevice02",
				"1":"dataDevice12",
				"2":"dataDevice22",
				"3":"dataDevice32",
				"4":"dataDevice42"
			};
			var j=0;
			function loadXMLDoc(){
				if(window.XMLHttpRequest){//code for IE7+,Firefox,Safari,..
					xmlhttp=new XMLHttpRequest();
				}
				else{//code for IE6, IE5
					xmlhttp=new ActiveXObject("Mircosoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function(){
					if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
						XMLstr = xmlhttp.responseText;
						//xu ly du lieu
						document.getElementById("idDebug").innerHTML = "<b>Debug: </b>"+XMLstr;
						json=JSON.parse(XMLstr);

						j=5-json.Tang1.length;
						document.getElementById("count").innerHTML=json.Tang1.length;
						for(var i=0;i<json.Tang1.length;i++) document.getElementById(iddevice[i]).innerHTML=json.Tang1[i].serialnumber;
						for(var i=0;i<j;i++)	document.getElementById(iddevice[4-i]).innerHTML='';
						for(var i=0;i<json.Tang1.length;i++) document.getElementById(datadevice[i]).innerHTML=json.Tang1[i].data;
						for(var i=0;i<j;i++)	document.getElementById(datadevice[4-i]).innerHTML='';
						j=5-json.Tang2.length;
						document.getElementById("count2").innerHTML=json.Tang2.length;
						for(var i=0;i<json.Tang2.length;i++) document.getElementById(iddevice2[i]).innerHTML=json.Tang2[i].serialnumber;
						for(var i=0;i<j;i++)	document.getElementById(iddevice2[4-i]).innerHTML='';
						for(var i=0;i<json.Tang2.length;i++) document.getElementById(datadevice2[i]).innerHTML=json.Tang2[i].data;
						for(var i=0;i<j;i++)	document.getElementById(datadevice2[4-i]).innerHTML='';

						//dat lai thoi gian timeout
						setTimeout(loadXMLDoc,5000);
					}
				}
				xmlhttp.open("POST","./device_status.php",true);
				xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				xmlhttp.send("request=1");
			}
        </script>
	</head>
	<body background="background_device_computer.jpeg">
		<form name="title" method="post">
			<table>
				<tr>
					<td><input type="submit" name="back" value="Back" /></td>
					<td style="color:  #FB5B04; ;font-weight: bold;font-size: 75px;">My_Database_Device_IoT</td>
					<td style="color:  #00FF85;">Coppy_Write: 2018</td>
				</tr>
			</table>
		</form>

		<form name="display" method="post">
			<table>
				<tr>
					<th colspan="5" style="color: #01FF00;font-weight: bold;font-size: 35px;">BẢNG THÔNG TIN NGƯỜI DÙNG</th>
				</tr>
				<tr>
					<td colspan="3" class="header">THỜI GIAN:</td>
					<td colspan="2" class="tg"><div id="idLocalTime"></div></td>
				</tr>
				<tr>
					<td colspan="3" class="header">TÀI KHOẢN:</td>
					<td colspan="2" style="color: #FFF900;"><?php echo $_SESSION['user']; ?></td>
				</tr>
			</table>

			<table style="width: 800px; background:linear-gradient(red, yellow);">
				<tr>
					<th colspan="6" style="text-align: center;color: #01FF00;font-weight: bold;font-size: 35px;">Thông Tin Tầng</th>
				</tr>
				<tr>
					<td colspan="4" style="text-align: center;color:#A8FFD5;font-weight: bold;font-size: 25px">Tầng 1: Số thiết bị:</td>
					<td class="nd"><div id="count"></div></td>
					<td class="nd">(Min:1;Max:5)</td>
				</tr>
				<tr>
					<td class="header">MÃ THIẾT BỊ:</td>
					<td class="nd"><div id="idDevice0"></div></td>
					<td class="nd"><div id="idDevice1"></div></td>
					<td class="nd"><div id="idDevice2"></div></td>
					<td class="nd"><div id="idDevice3"></div></td>
					<td class="nd"><div id="idDevice4"></div></td>
				</tr>
				<tr>
					<td class="header">DỮ LIỆU: </td>
					<td class="nd"><div id="dataDevice0"></div></td>
					<td class="nd"><div id="dataDevice1"></div></td>
					<td class="nd"><div id="dataDevice2"></div></td>
					<td class="nd"><div id="dataDevice3"></div></td>
					<td class="nd"><div id="dataDevice4"></div></td>
				</tr>
			</table>
			<table style="width: 800px; background:linear-gradient(red, yellow);">
				<tr>
					<th colspan="6" style="text-align: center;color: #01FF00;font-weight: bold;font-size: 35px;">Thông Tin Tầng</th>
				</tr>
				<tr>
					<td colspan="4" style="text-align: center;color:#A8FFD5;font-weight: bold;font-size: 25px">Tầng 2: Số thiết bị:</td>
					<td class="nd"><div id="count2"></div></td>
					<td class="nd">(Min:1;max:5)</td>
				</tr>
				<tr>
					<td class="header">MÃ THIẾT BỊ:</td>
					<td class="nd"><div id="idDevice02"></div></td>
					<td class="nd"><div id="idDevice12"></div></td>
					<td class="nd"><div id="idDevice22"></div></td>
					<td class="nd"><div id="idDevice32"></div></td>
					<td class="nd"><div id="idDevice42"></div></td>
				</tr>
				<tr>
					<td class="header">DỮ LIỆU: </td>
					<td class="nd"><div id="dataDevice02"></div></td>
					<td class="nd"><div id="dataDevice12"></div></td>
					<td class="nd"><div id="dataDevice22"></div></td>
					<td class="nd"><div id="dataDevice32"></div></td>
					<td class="nd"><div id="dataDevice42"></div></td>
				</tr>
			</table>
		</form>
		<form name="control" method="post">
			<table style="width: 800px; background:linear-gradient(#7DFF00, #FF3600a);">
				<tr>
					<th colspan="2" style="text-align: center;color: #01FF00;font-weight: bold;font-size: 35px;">Bảng Điều Khiển Tầng</th>
				</tr>
				<tr>
					<td style="text-align: center;color:#A8FFD5;font-weight: bold;font-size: 25px">Chọn Tầng(1 Hoặc 2):</td>
					<td class="nd"><input type="text" name="tang" value="<?php if(isset($_POST['tang'])) echo $_POST['tang'] ?>"></td>
				</tr>
				<tr>
					<td class="header">MÃ THIẾT BỊ:</td>
					<td class="nd"><input type="text" name="tb" value="<?php if(isset($_POST['tb'])) echo $_POST['tb']; ?>"></div></td>
				</tr>
				<tr>
					<td class="header">DỮ LIỆU: </td>
					<td class="nd"><input type="text" name="dl" value="<?php if(isset($_POST['dl'])) echo $_POST['dl']; ?>"></div></td>
				</tr>
				<tr>
					<td class="header">Xác Nhận:</td>
					<td class="nd"><input type="submit" name="submit" value="Xác Nhận"></td>
				</tr>
				<?php
				if($tang1==1||$tang2==1){
				?>
				<tr>
					<td class="nd">Full Tang: </td>
					<td><?php echo $_POST['tang']; ?></td>
				</tr>
				<?php
				}else if($tang1==0||$tang2==0){
				?>
				<tr>
					<td class="nd">OK !</td>
				</tr>
				<?php
				}
				?>
			</table>
		</form>
		<form name="remove" method="post">
			<table style="width: 800px; background:linear-gradient(#7DFF00, #FF3600a);">
				<tr>
					<th colspan="2" style="text-align: center;color: #01FF00;font-weight: bold;font-size: 35px;">Bảng Xóa Thiết Bị</th>
				</tr>
				<tr>
					<td style="text-align: center;color:#A8FFD5;font-weight: bold;font-size: 25px">Chọn Tầng(1 Hoặc 2):</td>
					<td class="nd"><input type="text" name="tang_rm" value="<?php if(isset($_POST['tang_mn'])) echo $_POST['tang_mn'] ?>"></td>
				</tr>
				<tr>
					<td class="header">MÃ THIẾT BỊ:</td>
					<td class="nd"><input type="text" name="tb_rm" value="<?php if(isset($_POST['tb_mn'])) echo $_POST['tb_mn']; ?>"></div></td>
				</tr>
				<tr>
					<td class="header">Xác Nhận:</td>
					<td class="nd"><input type="submit" name="submit_rm" value="Xác Nhận"></td>
				</tr>
				<?php
					if($account_exists_rm==1){
				?>
					<tr>
						<td class="header">OK</td>
					</tr>
				<?php
				}else if($account_exists_rm==0){
				?>
					<tr>
						<td class="header">Fail !</td>
					</tr>
				<?php
				}?>
			</table>
		</form>
		<form >
			<tr>
				<div id="idDebug"></div>
			</tr>
			<tr>
				<div id="idLocalTime"></div>
			</tr>
		</form>

	</body>
</html>

<?php
	}
	else{
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
	}
?>
