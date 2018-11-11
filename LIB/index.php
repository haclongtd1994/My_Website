<?php
	$DB_HOSTNAME = "localhost";
	$DB_USERNAME = "rpi_test";
	$DB_PASSWD = "RPITEST";
	$DB_NAME = "rpi_test";
	
	date_default_timezone_set('UTC');
	$date_time = gmdate('Y-m-d H:i:s');
	
	
	if(isset($_POST["request"])){
		echo "OK";
		try{
			$conn = new PDO("mysql:host=$DB_HOSTNAME;dbname=$DB_NAME",$DB_USERNAME,$DB_PASSWD);
			$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			//echo "Ket noi thanh cong";//de test
			$sql_SELECT = "SELECT * FROM `device_status` WHERE `SERIALNUMBER` <> ''";
			$stmt = $conn->query($sql_SELECT);
			//dua ve kieu mang
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			$n = $stmt->rowCount();
			echo "{\"DEV\"[";
			if($n>0){
				while($row=$stmt->fetch()){
					echo "\"SN\":\"".$row["SERIALNUMBER"]."\"}";
					$n--;
					if($n>0)	echo ",";
				}
			}
			else{
				echo "\"\"";
			}
			echo "]}";
			
		}
		catch(PDOException $e){
			echo $sql."<br>".$e->getMessage();//hien thi loi SQL
		}
		exit();
	}
?>

<!DOCTYPE html>
<html>
	<!-- Day la comment -->
    <head>
    	<title>My IOT</title>
        <meta charset="utf-8"><!-- Day la dinh dang tieng viet -->
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
			var XMLstr="";
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
						//dat lai thoi gian timeout
						setTimeout(loadXMLDoc,10000);
					}
				}
				xmlhttp.open("POST","./index.php",true);
				xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				xmlhttp.send("request=1");
			}
        </script>
    </head>
    <body>
    	<h1><font color="#333399">My IoT Dashboard</font></h1>
        <!-- Cac the chinh html -->
		<b><font color="#FF66CC" size="+2">Tác giả: <u>PTH ^.^</u> </font> </b><br>
        Bản Quyền: 2018<p>
        <i>Made in VIETNAM</i><hr>
		<div id="idLocalTime"></div>
        <div id="idDevice"></div>
        <hr>
        <div id="idDebug"></div>
    </body>
</html>