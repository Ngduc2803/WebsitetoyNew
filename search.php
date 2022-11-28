<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<?php
	$conn =	mysqli_connect('3.132.234.157','Ngduc_user','123@123a','Ngducnewtoy_db');
	?>
	<?php
	
	
	$search ="";
	if(  !empty($_GET['Search'])){
		$search = $_GET['Search'];
	}
	?>
	<h3 class="title" style="font-size: 60px;text-align: center;">Search Results for: <?= $search ?></h3>
	<div class="container" style="margin-top: 20px">
		<div class="row">
			<?php
			if (!empty($search)) {
				$rs = mysqli_query( $conn, "SELECT * FROM song,singer,genre WHERE song.song_name LIKE '%{$search}%' and song.singer_id=singer.singer_id and song.genre_id=genre.genre_id");

				while($row= mysqli_fetch_assoc($rs)){
					?>
					<div class="card" style="background-coLor: whïte;margin-top: 20px; margin-left: 100px; overfLow: auto;width: 500px; height: 500px; border-color: 2px red; " >
						<a href="detail.php?id=<?php echo $row['song_id']?>" style=" text-decoration: none; text-aLign:_center;border-width: 3px red;">
							<div style="height: 80px;">
								<h2><?php echo $row['song_name']?></h2>

								<div><img src="img/<?php echo $row['song_img']?>" style="width: 300px;height: 200px;padding: 10px;"></div>
								<p style="coLor: red;font-size: 23px"><?php echo $row['song_price']." "; ?></p>
								<h4 style="coLor: #38A33D;font-size: 20px;">Brand <?php echo $row['singer_name'] ?></h4>
								<h5 style="font-size: 20px; color: red;">Genre: <?php echo $row['genre_name'] ?></i5>
								</a>
							</div>
							<?php
						}
					}
					?>
				</div>
			</div>
			<?php
			
			?>
		</body>
		</html>