<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<title></title>
</head>
<body style="background-image: url('https://thumbs.dreamstime.com/z/semless-background-sketch-music-elements-eps-vector-illustration-39855863.jpg');">
    <?php 
         $connect = mysqli_connect('3.132.234.157','ngduc_user','123@123a','nguduc_db');
        ?>
        <b><p style="text-align: center; font-family: Courier New; font-size: 100px; color: #4d4dff; background-color: #ff9999; text-decoration: bold"> Song Management </p></b>

	<table  style="margin: auto;text-align: center; width: 900px; margin-top: 30px; background-color: whitesmoke; text-decoration: bold; border: 5px solid #993333  ; ">
    <tr>
        <th>Song Id</th>
        <th>Song Name </th>
        <th>Price </th>
        <th>Images </th>
        <th>Genre Name </th>
        <th>Singer Name </th>
        <th>Action </th>
     </tr>

     
         <?php
         $sql = "SELECT * FROM song,singer,genre WHERE song.genre_id = genre.genre_id and song.singer_id = singer.singer_id";
        $result = mysqli_query($connect, $sql);
        while($row= mysqli_fetch_array($result)){
               $song_id = $row['song_id'];
               $song_name = $row['song_name'];
               $song_price = $row['song_price'];
               $song_image = $row['song_img'];
               $genre_name = $row['genre_name'];
               $singer_name = $row['singer_name'];

            ?>
        <tr>
            <td> <?php echo $song_id ?></td>

            <td> <?php echo $song_name ?></td>
            <td> <?php echo $song_price ?></td>
            <td> <img src="img/<?php echo $song_image ?>" style ="width: 170px;"></td>
            <td> <?php echo $genre_name ?></td>
            <td> <?php echo $singer_name ?></td>
            <td> <a href="?uid=<?php echo $song_id ?>">Update Song </a></td>
            <td> <a href="?id=<?php echo $song_id ?>">Delete Song </a></td>
             </tr>
             <?php
             }
             ?>

     
</table>
<?php
if(isset($_GET["id"])){
    $id = $_GET["id"];
    $sql="DELETE FROM song where song_id = $id";
    $result=mysqli_query($connect,$sql);
    if($result) {
        echo "<script> alert ('Delete successfully')</script>";
    }
} else{
    echo"Lỗi";
}
?>
<?php
if(isset($_GET["uid"])){
    $uid = $_GET["uid"];
    $sql="UPDATE song where song_id = $uid";
    $result=mysqli_query($connect,$sql);
    if($result) {
        echo "<script> alert ('Update successfully')</script>";
    }
} else{
    echo"Lỗi";
}
?>

</body>
</html>