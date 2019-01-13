<?php
	session_start();
	include('include/myconnect.php');
	if(isset($_SESSION['user'])){
		if(isset($_POST['request'])){
			$conn = new PDO("mysql:host=$DB_HOSTNAME;dbname=$DB_NAME",$DB_USERNAME,$DB_PASSWD);
			$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$sql_REQUEST = "SELECT * FROM `device_status` WHERE `SERIALNUMBER` <> ''";
			$sql_REQUEST2= "SELECT * FROM `device_status2` WHERE `SERIALNUMBER` <> ''";
			$stmt = $conn->query($sql_REQUEST);
			$stmt2= $conn->query($sql_REQUEST2);
			$stmt->setFetchMode(PDO::FETCH_ASSOC);$stmt2->setFetchMode(PDO::FETCH_ASSOC);
			$n = $stmt->rowCount();$m = $stmt2->rowCount();
			if($n>0&&$m>0){
				echo '{';
				echo "\"Tang1\":[";
				while($row=$stmt->fetch()){
					$array = array(
						"id"=>$row["ID"],
						"serialnumber"=>$row["SERIALNUMBER"],
						"data"=>$row["DATA"],
						"datetime"=>$row["DATETIME"],
						"frame"=>$row["FRAME"]
					);
					echo json_encode($array);
					$n--;
					if($n>0) echo ',';
				}
				echo "],\"Tang2\":[";
				while($row=$stmt2->fetch()){
					$array = array(
						"id"=>$row["ID"],
						"serialnumber"=>$row["SERIALNUMBER"],
						"data"=>$row["DATA"],
						"datetime"=>$row["DATETIME"],
						"frame"=>$row["FRAME"]
					);
					echo json_encode($array);
					$m--;
					if($m>0) echo ',';
				}
				echo ']}';
			}
		}
	}
		
?>