<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>&gt;
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>&gt;
	<title></title>
	<style type="text/css">
		body#LoginForm{ background-image:url("https://images8.alphacoders.com/476/thumb-1920-476260.jpg"); background-repeat:no-repeat; background-position:center; background-size:cover; padding:10px;}

.form-heading { color:#fff; font-size:23px;}
.panel h2{ color:#444444; font-size:18px; margin:0 0 8px 0;}
.panel p { color:#777777; font-size:14px; margin-bottom:30px; line-height:24px;}
.login-form .form-control {
  background: #f7f7f7 none repeat scroll 0 0;
  border: 1px solid #d4d4d4;
  border-radius: 4px;
  font-size: 14px;
  height: 50px;
  line-height: 50px;
}
.main-div {
  background: #ffffff none repeat scroll 0 0;
  border-radius: 2px;
  margin: 80px auto 30px;
  max-width: 38%;
  padding: 50px 70px 70px 71px;
 
}

.login-form .form-group {
  margin-bottom:10px;
}
.login-form{ text-align:center;}
.forgot a {
  color: #777777;
  font-size: 14px;
  text-decoration: underline;
}
.login-form  .btn.btn-primary {
  background: #f0ad4e none repeat scroll 0 0;
  border-color: #f0ad4e;
  color: #ffffff;
  font-size: 14px;
  width: 100%;
  height: 50px;
  line-height: 50px;
  padding: 0;
}
.forgot {
  text-align: left; margin-bottom:30px;
}
.botto-text {
  color: #ffffff;
  font-size: 14px;
  margin: auto;
}
.login-form .btn.btn-primary.reset {
  background: #ff9900 none repeat scroll 0 0;
}
.back { text-align: left; margin-top:10px;}
.back a {color: #444444; font-size: 13px;text-decoration: none;}	
	</style>
</head>
<body id="LoginForm">
	<div class="container">
		<h1 class="form-heading"></h1>
		<div class="login-form">
			<div class="main-div">
				<div class="panel">
					<h2> Login</h2>
					<p>Please enter your Username and password</p>
				</div>
				<form id="Login" method="post">
					<div class="form-group">
						<input type="text" class="form-control" id="inputEmail" placeholder="Username" name="username">

					</div>

					<div class="form-group">

						<input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">

					</div>
					<div class="forgot">
						<a href="reset.html">Forgot password?</a>
					</div>
					<button type="submit" name ="login" class="btn btn-primary">Login</button>

				</form>
			</div>
			<p class="botto-text"></p>
		</div></div></div>

	
	<?php

	$connect =	mysqli_connect('3.128.54.48','Ngduc_user','123@123a','Ngducnewtoy_db');
	if($connect){
		echo"";
	}
	else{
		echo "kết nối thất bại ";
	}
	?>


<?php 
if(isset($_POST['login']))
{
$username = $_POST['username'];
$password = $_POST['password'];
$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($connect,$sql);
$num_rows = mysqli_num_rows($result);
$r = mysqli_fetch_array($result);
if ($num_rows ==0) {
	echo "username password is incorrect";
}
else
{
	

	$_SESSION['user_id']= $r['user_id'];
	?>
		<script>
			alert("Login success");
			window.location.href = "music.php";
			//
		</script>
	<?php
}
}
?>

</body>
</html>
