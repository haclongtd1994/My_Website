<?php
  //ket noi co so du lieu database
  $connect_server=0;
  $DB_HOSTNAME='localhost';
  $DB_NAME='id723487_myhome';
  $DB_USERNAME='id723487_haclongtd1994';
  $DB_PASSWD='hunglapro13';
  date_default_timezone_set('UTC');
  $date_time = gmdate('Y-m-d H:i:s');

	try{
		$conn = new PDO("mysql:host=$DB_HOSTNAME;dbname=$DB_NAME",$DB_USERNAME,$DB_PASSWD);
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $connect_server=1;
  }
	catch(PDOException $e){
		echo $e->getMessage();//hien thi loi SQL
	}

 ?>
