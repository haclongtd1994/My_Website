<?php
    session_start();
	include('include/myconnect.php');
	include('receive_device_id.php');

	if(isset($_SESSION['user'])){
		if(isset($_POST['request'])){
			$conn = new PDO("mysql:host=$DB_HOSTNAME;dbname=$DB_NAME",$DB_USERNAME,$DB_PASSWD);
			$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$sql_REQUEST = "SELECT * FROM `device_status` WHERE `SERIALNUMBER` <> ''";
			$sql_REQUEST2 = "SELECT * FROM `device_status2` WHERE `SERIALNUMBER` <> ''";
			$stmt = $conn->query($sql_REQUEST);
			$stmt2 = $conn->query($sql_REQUEST2);
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			$stmt2->setFetchMode(PDO::FETCH_ASSOC);
			$n = $stmt->rowCount();
			$m = $stmt2->rowCount();
			if($n>0){
				while($row=$stmt->fetch()){
					if($row["SERIALNUMBER"]=="GPIO"){
						$gpio_data = $row["DATA"];
					}
				}
			}
			if($m>0){
				while($row=$stmt2->fetch()){
					if($row["SERIALNUMBER"]=="GPIO"){
						$gpio_data = $gpio_data." ".$row["DATA"];
					}
				}
			}
			echo $gpio_data;
		}
	}
		
?>