<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	
	<title></title>

</head>
<body style="background-image:url('https://hdwallsource.com/img/2018/2/frank-ocean-wide-hd-wallpaper-64121-66287-hd-wallpapers.jpg') ;background-size: 2100px 1200px ;background-repeat: no-repeat ; ">
	<form method="POST" enctype="multipart/form-data">
		<?php 
		 $connect = mysqli_connect('localhost','root','','musicwebsite');
		?>
	
	<div class="container-fluid">
    <section class="container">
		<div class="container-page">				
			<div class="col-md-6">
				<h3 class="dark-grey">ADD SONG</h3>
				
				<div class="form-group col-lg-6">
					<label>Song ID</label>
					<input type="text" name="song_id" class="form-control" id="" value="">
				</div>
				
				<div class="form-group col-lg-6">
					<label>Song Name</label>
					<input type="text" name="song_name" class="form-control" id="" value="">
				</div>
				
				<div class="form-group col-lg-6">
					<label>Song Description</label>
					<input type="text" name="song_description" class="form-control" id="" value="">
				</div>
								
				<div class="form-group col-lg-6">
					<label>Song Price</label>
					<input type="text" name="song_price" class="form-control" id="" value="">
				</div>
				
				<div class="form-group col-lg-6">
					<label>Song Img</label>
					<input type="file" name="song_img" class="form-control" id="" value="">
				</div>		
				<div class="form-group col-lg-6">
					<label>Song Audio</label>
					<input type="file" name="song_audio" class="form-control" id="" value="">
				</div>		
				
							
			
			</div>
		
			<div class="col-md-6" style="margin-top: 37px;">
				<h3 class="dark-grey"></h3>
				<tr>
					<td><b>Genre Name</b></td>
					<td colspan='2'>
						<select name='genre_id'>
							<?php 
									
								$sql2 = 'select * from genre';
								$result2 = mysqli_query($connect, $sql2);
								while($row_cat =  mysqli_fetch_array($result2)){
									$genre_id =$row_cat['genre_id'];
									$genre_name =$row_cat['genre_name'];
									echo "<option value='$genre_id'>$genre_name</option>";		
								}
							?>
						</select>
					</td>
				</tr>
				<br>
				<tr>
					<td><b>Singer Name</b> </td>
					<td colspan='2'>
						<select name='singer_id'>
							<?php 
								
								$sql3 = 'select * from singer';
								$result3 = mysqli_query($connect, $sql3);
								while($row_singer =  mysqli_fetch_array($result3)){
									$singer_id =$row_singer['singer_id'];
									$singer_name =$row_singer['singer_name'];
									echo "<option value='$singer_id'>$singer_name</option>";		
								}
							?>
						</select>
					</td>
				</tr>
			<tr> 
			</tr>
				
				<button type="submit" class="btn btn-primary" name="add_song">ADD</button>
				<td><input type="submit" name="add_song" value="Thêm"> </td>
			</div>
		</div>
	</section>
</div>
</form>
	<!-- làm giống form đăng ký tài khoản -->
	
		


	<?php 
	
	if(isset($_POST['add_song'])){
		$song_id = $_POST['song_id'];
		$song_name = $_POST['song_name'];
		$song_price = $_POST['song_price'];
					//Lấy ảnh từ thư mục bất kỳ của máy tính
		$song_img = $_FILES['song_img']['name'];
					// di chuyển ảnh từ thư mục bất kỳ sang thư mục tmp_name của htdocs
		$song_img_tmp = $_FILES['song_img']['tmp_name'];

					// Đưa ảnh từ thư mục tmp sang thư mục cần lưu 
		move_uploaded_file($song_img_tmp, "img/$song_img");
		$song_audio = $_FILES['song_audio']['name'];
					// di chuyển ảnh từ thư mục bất kỳ sang thư mục tmp_name của htdocs
		$song_audio_tmp = $_FILES['song_audio']['tmp_name'];
		move_uploaded_file($song_audio_tmp, "audio/$song_audio");
		$genre_id = $_POST['genre_id'];
		$singer_id = $_POST['singer_id'];

					//Thêm sản phẩm vào cơ sở dữ liệu
		$sql = "INSERT INTO song VALUES(NULL,'$song_name','$song_description','$song_price','$song_audio','$song_img','$genre_id','$singer_id')";
		$result = mysqli_query($connect,$sql);
		if($result){
			echo"<script>alert('Add successfully') </script>";
			echo"<script> window.open('music.php','_self') </script>";
		}
		else{
			echo"<script>alert('Thêm mới lỗi') </script>";
		}
	}
	?>




</body>
</html>