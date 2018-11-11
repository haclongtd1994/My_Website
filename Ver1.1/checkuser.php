<?php
session_start();
$loggedIn=0;
if(isset($_POST['submit']))
{
  if(isset($_POST['tk'])&&isset($_POST['mk'])){
      if($connect_server==1){
        //xu ly cac bien truyen vao so sanh voi database
        $SQL_CHECKLOGIN="SELECT `USERNAME` FROM `account_password` WHERE `USERNAME` = \"";
        $SQL_CHECKLOGIN=$SQL_CHECKLOGIN.$_POST['tk']."\"";
        $SQL_CHECKLOGIN=$SQL_CHECKLOGIN." && `PASSWORD` = \"";
        $SQL_CHECKLOGIN=$SQL_CHECKLOGIN.$_POST['mk']."\"";
        $stmt = $conn->query($SQL_CHECKLOGIN);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        if($stmt->fetch()){
          $loggedIn=1;
          $_SESSION['user']=$_POST['tk'];
        }else {
          $loggedIn=0;
        }
        //neu dung thi ta dan nguoi dung sang trang da login
        if ($loggedIn==1) {
            header("Location: http://luutruthietbiiot.000webhostapp.com/loggedin.php");
            die();
        }
      }
  }
}
?>
