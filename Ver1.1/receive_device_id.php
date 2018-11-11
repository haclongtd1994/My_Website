<?php
    session_start();
	include('include/myconnect.php');
	if($connect_server == 1){
		if(isset($_POST['tk'])&&isset($_POST['mk'])){
			//xu ly cac bien truyen vao so sanh voi database
	        $SQL_CHECKLOGIN="SELECT `USERNAME` FROM `account_password` WHERE `USERNAME` = \"";
	        $SQL_CHECKLOGIN=$SQL_CHECKLOGIN.$_POST['tk']."\"";
	        $SQL_CHECKLOGIN=$SQL_CHECKLOGIN." && `PASSWORD` = \"";
	        $SQL_CHECKLOGIN=$SQL_CHECKLOGIN.$_POST['mk']."\"";
	        $stmt = $conn->query($SQL_CHECKLOGIN);
	        $stmt->setFetchMode(PDO::FETCH_ASSOC);
	        if($stmt->fetch()){
	          echo "OK";
	          $_SESSION['user']=$_POST['tk'];
	        }else {
	          echo "FAIL";
	        }
		}
		
		if((isset($_POST["serialnumber"]))
			&&(isset($_POST["frame"]))
			&&(isset($_POST["data"]))&&(isset($_SESSION['user']))){
			$sql_INSERT = "INSERT INTO `device` (";
			$sql_INSERT = $sql_INSERT."`SERIALNUMBER`,`FRAME`,`DATA`,`DATETIME`) VALUES (";
			$sql_INSERT = $sql_INSERT."\"".$_POST["serialnumber"]."\",";//dau \" de in ra dau "
			$sql_INSERT = $sql_INSERT."\"".$_POST["frame"]."\",";
			$sql_INSERT = $sql_INSERT."\"".$_POST["data"]."\",";
			$sql_INSERT = $sql_INSERT."\"".$date_time."\")";
			//thuc thi lenh SQL
			//echo $sql_INSERT;//ffor test
			$stmt = $conn->query($sql_INSERT);
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
?>