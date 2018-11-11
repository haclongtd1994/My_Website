<?php
	include('include/myconnect.php');
	include('checkuser.php');
	$n_account=0;
	$account_exists=0;
	$account_exists_rm=0;
?>
<?php
		if(isset($_POST['quit'])){
			unset($_SESSION['user']);
			header("Location: http://luutruthietbiiot.000webhostapp.com/index.php");
			die();
		}
		if(isset($_POST['back'])){
			header("Location: http://luutruthietbiiot.000webhostapp.com/loggedin.php");
			die();
		}

		if(isset($_POST['all'])){
			$SQL_ACCOUNT="SELECT * FROM `account_password` WHERE `id` <> \"";
			$SQL_ACCOUNT=$SQL_ACCOUNT.'0'."\"";
			$stmt_account = $conn->query($SQL_ACCOUNT);
        	$stmt_account->setFetchMode(PDO::FETCH_ASSOC);
        	$n_account=$stmt_account->rowCount();
		}
		if(isset($_POST['hide_account']))
		{
			$n_account=0;
		}

		if(isset($_POST['submit_add'])){
			$sql_SELECT = "SELECT * FROM `account_password` WHERE `USERNAME` = \"";
			$sql_SELECT = $sql_SELECT.$_POST["id_add"]."\"";
			//thuc thi lenh SQL;
			if($stmt = $conn->query($sql_SELECT)->fetch()){		//kiem tra du lieu co ton tai
				$account_exists=1;
			}
			else{
				$account_exists=0;
				//du lieu khong ton tai->INSERT du lieu
				$sql_INSERT = "INSERT INTO `account_password` (";
				$sql_INSERT = $sql_INSERT."`USERNAME`,`PASSWORD`,`DATETIME`) VALUES (";
				$sql_INSERT = $sql_INSERT."\"".$_POST["id_add"]."\",";//dau \" de in ra dau "
				$sql_INSERT = $sql_INSERT."\"".$_POST["password_add"]."\",";
				$sql_INSERT = $sql_INSERT."\"".$date_time."\")";
				//thuc thi lenh SQL
				//echo $sql_INSERT;//ffor test
				$stmt = $conn->query($sql_INSERT);
			}
		}
		if(isset($_POST['submit_rm'])){
			$sql_SELECT = "SELECT * FROM `account_password` WHERE `USERNAME` = \"";
			$sql_SELECT = $sql_SELECT.$_POST["id_rm"]."\"";
			if($stmt = $conn->query($sql_SELECT)->fetch()){		
				$account_exists_rm=1;
				$sql_DELETE = "DELETE FROM `account_password` WHERE `USERNAME`=";
				$sql_DELETE = $sql_DELETE."\"".$_POST["id_rm"]."\"";
				$stmt = $conn->query($sql_DELETE);
			}
			else{
				$account_exists_rm=0;
			}
		}
 ?>
<?php
	if(isset($_SESSION['user'])){
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
		    .menu{
		    	font-size: 28px;
		        font-weight: bold;
		        color: #C30E0E;
		        text-align: center;
		    }
		    table label{
		    	font-size: 24px;
		    	font-weight: bold;
		    	color: #06303E;
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

    	<p class="infor"><strong>Manager_Account_Password !</strong></p>
		<form name="menu" method="post">
			<table>
				<tr>
					<th colspan="2" class="menu">Manager_My_Home</th>
				</tr>
				<tr>
					<td><label>Show_All_Account_In_My_DB :</label></td>
					<td><input type="submit" name="all" value="Click here !"></td>
				</tr>

				<?php
					if($n_account>0){
				?>
					<tr>
						<td style="color:red;">ID</td>
						<td style="color:red;">Password</td>
					</tr>
					<?php
						while($row_account=$stmt_account->fetch()){
							$n_account-=1;
					?>
						<tr>
							<td><?php echo $row_account['USERNAME'] ?></td>
							<td><?php echo $row_account['PASSWORD'] ?></td>
						</tr>
					<?php
						}
					?>
					<tr>
						<td>Hide_Information:</td>
						<td><input type="submit" name="hide_account" value="HIDE"></td>
					</tr>
				<?php
					}
				?>


				<tr>
					<td><label>Add_New_Account_Password :</label></td>
					<td><input type="submit" name="add" value="Click here !"></td>
				</tr>

				<?php
					if(isset($_POST['add'])){
				?>
					<tr>
						<td>ID:</td>
						<td><input type="text" name="id_add" value="<?php if(isset($_POST['id_add'])) echo $_POST['id_add'] ?>"></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><input type="password" name="password_add" value="<?php if(isset($_POST['id_add'])) echo $_POST['id_add'] ?>"></td>
					</tr>
					<tr>
						<td>ADD_ACCOUNT:</td>
						<td><input type="submit" name="submit_add" value="Comfrim ?"></td>
					</tr>
				<?php }
					if($account_exists==0&&isset($_POST['submit_add'])) {
						?>
						<tr>
							<td colspan="2">Creat Account Successfull !</td>
						</tr>
						<?php
					}
					else if($account_exists==1&&isset($_POST['submit_add']))
					{
						?>
						<tr>
							<td colspan="2"> Account Exist, Pleave check all account !</td>
						</tr>
						<?php
					}
				?>

				<tr>
					<td><label>Remove_Account_Password :</label></td>
					<td><input type="submit" name="rm" value="Click here !"></td>
				</tr>

				<?php
					if(isset($_POST['rm'])){
				?>
					<tr>
						<td>ID:</td>
						<td><input type="text" name="id_rm" value="<?php if(isset($_POST['id_rm'])) echo $_POST['id_rm'] ?>"></td>
					</tr>
					<tr>
						<td>REMOVE_ACCOUNT:</td>
						<td><input type="submit" name="submit_rm" value="Comfrim ?"></td>
					</tr>
				<?php }
					if($account_exists_rm==1&&isset($_POST['submit_rm'])) {
						?>
						<tr>
							<td colspan="2">Remove Account Successfull !</td>
						</tr>
						<?php
					}
					else if($account_exists_rm==0&&isset($_POST['submit_rm']))
					{
						?>
						<tr>
							<td colspan="2"> Account not Exist, Pleave check all account !</td>
						</tr>
						<?php
					}
				?>
				<tr>
					<td><label>Back :</label></td>
					<td><input type="submit" name="back" value="Click here !"></td>
				</tr>
				<tr>
					<td><label>LogOut :</label></td>
					<td><input type="submit" name="quit" value="Click here !"></td>
				</tr>
			</table>
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


<?php }
else {
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
} ?>
