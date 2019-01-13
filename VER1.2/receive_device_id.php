<?php
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
	          $_SESSION['user']=$_POST['tk'];
	        }else {
	          echo "FAIL";
	        }
		}
		
		
	}
?>