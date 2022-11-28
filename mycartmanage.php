<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body style="background-image:url('https://hdwallsource.com/img/2018/2/frank-ocean-wide-hd-wallpaper-64121-66287-hd-wallpapers.jpg') ;background-size: 3000px 3000px ;background-repeat: no-repeat ;color:;font-size: 20px; ">
	<?php 
session_start();
?>

<div id="content_area"> 

  <div class="shopping_cart_container">

    <div id="shopping_cart" align="right" style="padding:15px">
      <?php 

      if(isset($_SESSION['username'])){

        echo "<b>Your username:</b>" . $_SESSION['username'];

      }else{

        echo "";
      }

      ?>



    </div><!-- /.shopping_cart --> 

    <form action="" method="post" enctype="multipart/form-data">
      <table align="center" width="100%">

        <tr align="center">
          <th> Song ID </th>
          <th>Song Name</th>
          <th>Song Price</th>          
          <th>Remove</th>
        </tr>

        <?php 
        $connect = mysqli_connect('3.132.234.157','ngduc_user','123@123a','nguduc_db');
        $total = 0;
          //lấy user_id đăng nhập
        $user_id = $_SESSION['user_id'];

        $result = mysqli_query($connect, "select * from orders where user_id={$user_id}");

        while($row = mysqli_fetch_array($result)){

          $song_id = $row['song_id'];


          $result_song = mysqli_query($connect, "select * from song where song_id = '$song_id'");
          while($row_song = mysqli_fetch_array($result_song)){
            //Lấy ra các thông tin song

            $song_name = $row_song['song_name'];
            $song_price = $row_song['song_price'];
            $song_img = $row_song['song_img'];




              // Getting Quality of the product



            ?>
            <tr align="center">

             <td> <?php echo $song_id ?> </td>
             <td>
              <?php echo $song_name;?>
              <br />
              <img src="img/<?php echo $song_img; ?> " style="width: 150px; height: 150px;" />
            </td>
            <td><?php echo $song_price; ?></td>
            <td><input type="checkbox" name="remove[]" value="<?php echo $song_id;?>" /></td>
          </tr>

        <?php } } // End While  ?> 

        <tr>
          <td colspan="4" align="right"><b>Sub Total: 4$</b></td>
          <td> </td>
        </tr>
        <tr>
          <td>
            <label>Receiver</label>
            <input type="text" class="form-control" name="nguoinhan">
          </td>
        </tr>
        <tr>
          <td>
            <label>Phone</label>
            <input type="text" class="form-control" name="sdt">
          </td>
        </tr>
        <tr>
          <td>
            <label>Address</label>
            <input type="text" class="form-control" name="diachi">
          </td> 
        </tr>
        <tr>
          <td>
            <label>Note</label>
            <textarea name="not" id="" cols="" rows="" class="form-control"></textarea>
          </td>  
        </tr>
        <tr align="center">
          <td colspan="2"><input type="submit" name="update_cart" value="Update Cart" /></td>
          <a href="music.php"><td><input type="submit" name="continue" value="Continue Shopping" /></td></a>
          <td><button><a href="checkout.php">Checkout</a></td>
          </tr>

        </table>
      </form>

      <?php 
      if(isset($_POST['remove'])){

        foreach($_POST['remove'] as $remove_id){

          $run_delete = mysqli_query($con,"delete from orders where song_id = '$remove_id'");

          if($run_delete){
            echo "<script>window.open('addcart.php','_self')</script>";
            echo "<script>alert('Remove song from cart successfully!')</script>";;
          }
        }
      }

      if(isset($_POST['continue'])){
        echo "<script>window.open('music.php','_self')</script>";
      }

      ?>

    </div><!-- /.shopping_cart_container-->

    <div id="products_box">   


    </div><!-- /#products_box -->
  </div><!-- /#content_area -->

</div><!-- /.content_wrapper-->
<!------------ Content wrapper ends -------------->


</body>
</html>