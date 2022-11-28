<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<?php
	
	include('detail.php');

	$song_id =  $_GET['id'];

	echo $_SESSION['user_id'];
	if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != null){
		$user_id = $_SESSION['user_id'];
		$sql="select * from orders where song_id = $song_id AND user_id='$user_id'";
		$result = mysqli_query($connect, $sql);
		$check_song = mysqli_num_rows($result);
		if ($check_song > 0) {
			echo "<script>alert('Song already in the cart')</script>";
			echo "<script>window.open('music.php','_self')</script>";
		}
		else {
			$sql = "insert into orders values ('',$song_id, '$users_id') ";
			$result = mysqli_query($connect, $sql);	
			if ($result) {
				echo "<script>alert('Song added to the cart successfully!')</script>";
				echo "<script>window.open('mycartmanage.php','_self')</script>";
			}
			else {
				echo "<script>alert('Error')</script>";
				//echo "<script>window.open('index.php','_self')</script>";
			}
		}
	}


	?>
	



</body>
</html>