<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<title></title>
	   <style type="text/css">
        .images-detail img {
        margin-top: 5%;
        width: 100%;
        align-items: center;
        border-radius: 100%;
        margin-bottom: 30px;
        animation: app-logo-spin infinite 20s linear
        }
        @keyframes app-logo-spin {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }

    </style>
</head>
<body style="background-image: url(https://hdwallsource.com/img/2014/9/simple-wallpaper-27241-27958-hd-wallpapers.jpg); color: white; background-repeat: no-repeat;background-size: 1600px 800px ;">
<div class="container" style="margin-top: 80px;">
    <div class="row">
        <?php
        $connect =	mysqli_connect('3.132.234.157','ngduc_user','123@123a','nguduc_db');
        session_start();
        $id = $_GET["id"];
        $sql = "SELECT * FROM song,singer,genre WHERE song.genre_id = genre.genre_id and song.singer_id = singer.singer_id and song_id = {$id}";
        $result = mysqli_query($connect,$sql);
        while($row= mysqli_fetch_array($result)){
            $id = $row['song_id'];
            ?>

            <div class="col-md-6" style="text-align: left;">
                <h2> Name of Music: <?php echo $row['song_name'];?> </h2>
                <p>Price: <?php echo $row['song_price'];?> </p>
                <br>
                <audio controls controlsList="nodownload" ontimeupdate="myAudio(this)" style="width: 250px;">
                           <source src="Audio/<?php echo $row['song_audio'];?>" type="audio/mpeg">
                       </audio>
                       <script type="text/javascript">
                           function MyAudio(event){
                               if(event.currentTime>30){
                                   event.currentTime=0;
                                   event.pause();
                                   alert("Bạn phải trả phí để nghe cả bài")
                               }
                           }
                       </script>
                       <br><br>
                       <h5> Singer: <?php echo $row["singer_name"] ;?></h5>
                   
                       <h4> Genre: <?php echo $row["genre_name"]; ?></h4>
                        
<br>
                      <a href="democart.php?id=<?php echo $id ;?>">  <button type="submit" name ="buy" class='btn btn-primary'><i class="fas fa-cart-plus"></i> Add to cart</button> </a>
                    
            </div>  
            <!-- cho ảnh quay tròn-->
            <div class="images-detail">
            <div class="col-md-6">
                <img src="img/<?php echo $row['song_img'] ?>" style = "width: 500px;height: 500px;">
            </div>
        </div>
       
            <?php
        }

    ?>
    </div>
</div>
</body>
</html>