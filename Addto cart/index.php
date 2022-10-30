<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="Navi.css">

<link rel = "icon" href ="Home Page/titlelogo.jpg" type = "image/x-icon">
<title>Water Closets</title>


<body>
<!-- Header-->
<div class="bg-img"> 
<div class="topnav">
  <div class="bg-div">
   <img class="logo-img" src="Home Page/logo2.png" width="160" height="80" ALT="align box" ALIGN=CENTER>
  </div>
      <div class="topnav-right">
         <a class="" href="home.html">Home</a>
         <a class="active" href="Product_list.html">Product</a>
         <a href="#about">About</a>
         <a href="Contact_us.html">Contact</a>
      </div>
</div>

<?php


session_start();

require_once ('php/CreateDb.php');
require_once ('./php/component.php');


// create instance of Createdb class
$database = new CreateDb("Productdb", "Producttb");

if (isset($_POST['add'])){
    /// print_r($_POST['product_id']);
    if(isset($_SESSION['cart'])){

        $item_array_id = array_column($_SESSION['cart'], "product_id");

        if(in_array($_POST['product_id'], $item_array_id)){
            echo "<script>alert('Product is already added in the cart..!')</script>";
            echo "<script>window.location = 'index.php'</script>";
        }else{

            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['product_id']
            );

            $_SESSION['cart'][$count] = $item_array;
        }

    }else{

        $item_array = array(
                'product_id' => $_POST['product_id']
        );

        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
        print_r($_SESSION['cart']);
    }
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
</head>
<body>


<?php require_once ("php/header.php"); ?>
<h1><center> <p style="color:#b09e80;font-size:1.5em; font-family:sans-serif;"> <i><b>Water Closet</b></i></p></center></h1>
<div class="container">
        <div class="row text-center py-5">
            <?php
                $result = $database->getData();
                while ($row = mysqli_fetch_assoc($result)){
                    component($row['product_name'], $row['product_price'], $row['product_image'], $row['id'],$row['product_detail']);
                }
            ?>
        </div>
</div>





<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!-- Footer-->
<footer class="footer">
<div class="fleft">
<h3>Eternal<span> Bathware</span></h3>
<p class="footer-links">
<a href="home.html">Home</a>
|
<a href="Product_list.html">Product</a>
|
<a href="About_us.html">About</a>
|
<a href="Contact_us.html">Contact</a><br><br>

</p>
<p class="footer-company-name">Copyright &copy; 2022,Eternal Bathware.</p>
</div>
<div class="fcenter">
<form>
<div class="top">
<p><span style="font-style:normal; font-size: 1.6em;font-family:cursive;">Newsletter</span></p><br>
<label for="email"><p class="footer-company-about">Promotions, new products and sales. Directly to your inbox.</p> </label>
<input type="text" placeholder="Enter your Email to subscribe newsletter" name="email" required>
<button type="submit" class="subbtn" id="subbtn">Join</button>
</input>

</div>
</form>
</div>
<div class="fright">
<p class="footer-company-about">
<span>Follow Us</span>
</p>
<div class="footer-icons">
<a target="_blank" href="https://m.facebook.com/Eternal-Bathware-110462294916120/"><img class= "ico" src="icon/fb.png"></a>
<a target="_blank" href="https://instagram.com/eternal_bathware?utm_medium=copy_link"><img class= "ico" src="icon/insta.png"></a>
<a target="_blank" href="#"><img class= "ico" src="icon/twitter.png"></a>
<a target="_blank" href="#"><img class= "ico" src="icon/youtube.png"></a>
</div>
<p class="footer-links">
<a href="#" style="font-size: 0.8em">Latest News</a><br>
<a href="#" target="_blank" style="font-size: 0.8em">Terms & Conditions</a><br>
<a href="#" target="_blank" style="font-size: 0.8em">Refund Policy</a><br><br>
<a href="home.html" style="font-size: 0.9em; color: black;"><i>Back to Home</i></a>
</p>
</div>
</footer>
</body>
</html>
