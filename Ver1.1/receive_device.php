
<?php
	include('include/myconnect.php');
	include('receive_device_id.php');

	if($connect_server==1){
		if(isset($_SESSION['user'])){
			if((isset($_POST["serialnumber"]))
				&&(isset($_POST["frame"]))
				&&(isset($_POST["data"]))){
				//echo "INSERT OK";
				//kiem tra thiet bi co ket noi lan nao den sever chua
				$sql_SELECT = "SELECT * FROM `device_status` WHERE `SERIALNUMBER` = \"";
				$sql_SELECT = $sql_SELECT.$_POST["serialnumber"]."\"";
				//thuc thi lenh SQL;
				if($stmt = $conn->query($sql_SELECT)->fetch()){		//kiem tra du lieu co ton tai
					//du lieu co ton tai-> UPDATE du lieu
					$sql_UPDATE = "UPDATE `device_status` SET ";
					$sql_UPDATE = $sql_UPDATE."`FRAME`=\"".$_POST["frame"]."\",";
					$sql_UPDATE = $sql_UPDATE."`DATA`=\"".$_POST["data"]."\",";
					$sql_UPDATE = $sql_UPDATE."`DATETIME`=\"".$date_time."\" ";
					$sql_UPDATE = $sql_UPDATE."WHERE `SERIALNUMBER` =\"".$_POST["serialnumber"]."\"";
					//thuc thi lenh SQL
					$stmt = $conn->query($sql_UPDATE);
					echo "OK#UPDATE";
				}
				else{
					//du lieu khong ton tai->INSERT du lieu
					$sql_INSERT = "INSERT INTO `device_status` (";
					$sql_INSERT = $sql_INSERT."`SERIALNUMBER`,`FRAME`,`DATA`,`DATETIME`) VALUES (";
					$sql_INSERT = $sql_INSERT."\"".$_POST["serialnumber"]."\",";//dau \" de in ra dau "
					$sql_INSERT = $sql_INSERT."\"".$_POST["frame"]."\",";
					$sql_INSERT = $sql_INSERT."\"".$_POST["data"]."\",";
					$sql_INSERT = $sql_INSERT."\"".$date_time."\")";
					//thuc thi lenh SQL
					//echo $sql_INSERT;//ffor test
					$stmt = $conn->query($sql_INSERT);
					echo "OK#INSERTED";
				}
			}
			else{
				echo"ERROR";
			}
		}
	}
	
?>

