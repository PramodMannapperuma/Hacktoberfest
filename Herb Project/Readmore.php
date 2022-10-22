<?php
//checking connection and session start
include "connection_files/connection.php";
?>
<?php
//redirecting to index if user or admin is unknown
if(!isset($_SESSION['username_logged']) and !isset($_SESSION['admin-pin']))
{
    header("location:index.php");
}
?>
<?php


$IID=$_POST['item_id'];
$sql="SELECT * FROM items WHERE item_id='$IID' LIMIT 1";
$result=mysqli_query($connection,$sql);

if ($result==true){
    $display=mysqli_fetch_assoc($result);
}

else{
 echo "Can't Read data from database";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReadMore - Herb Store</title>
    <link rel="icon" href="logo.jfif">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="bootstrap/bootstrap1.css">

    <script lang="JavaScript" type="text/javascript">
        function ConfLogout() {
            let text = "You will be logged out as a result of this Action.\nContinue the Action?";
            if (confirm(text) == true)
            {
                return true;
            }
        }
    </script>

</head>
<body style="background-color:#000000; ">
<nav>
    <div class="navpanel">
        <div class="logo"><a href="home.php"><img src="logo.jfif"> </a></div>
        <input type="radio" name="responsive_slide" id="menu-btn">
        <input type="radio" name="responsive_slide" id="close-btn">
        <ul class="nav-links">
            <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
            <li><a href="home.php">Home</a></li>
            <li><a href="search.php">Search &nbsp<i class="fa fa-search"></i> </a></li>



            <li>
                <a href="#" class="clubs_and_societies_navigation">My Profile &nbsp;<i class="fa fa-caret-down"></i></a>
                <input type="checkbox" id="showDrop">
                <label for="showDrop" class="clubs">My Profile &nbsp;<i class="fa fa-caret-down"></i></label>
                <ul class="my_profile-dropbox">
                    <li><a href="profile/profile.php">View</a></li>
                    <li><a onclick="return ConfLogout()==true" href="profile/logout.php">Log Out</a></li>
                </ul>
            </li>
        </ul>
        <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
    </div>
</nav>

<!--page content start-->
<div class="readmore_content">

<?php  echo '<img alt="Event Image" src="data:image/jpeg;base64,'.base64_encode($display['picture']).'" style="height:700px; width:100%;" />'; ?>

    <h1 class="readmore_header"><?php echo $display['item_name']; ?></h1>

    <div class="text_area">
        <h4 class="d_t">Price Rs.<?php  echo $display['price']; ?></h4>
        <br>
        <p class="readmore_details"><?php echo $display['description']; ?></p>

    </div>
    <table border="0">
        <tr>
            <td class="tda">
        <a href="home.php" class="buttn">Go Back</a>
            </td>
            <td class="tdb">
                <a href="Payment/payment.html"<button class="btutn">Buy Now</button></a>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="tdc">
                <a href="massagebox/login.php" class="buttn"> Ask Me</a>
            </td>
        </tr>
    </table>





</div>



<!--page content end-->

<footer class="footer-section">
    <div class="container">
        <div class="footer-cta pt-5 pb-5">
            <div class="row">
                <div class="col-xl-4 col-md-4 mb-30">
                    <div class="single-cta">
                        <i class="fa fa-map-marker"></i>
                        <div class="cta-text">
                            <h4>Visit us</h4>
                            <span>J'pura,
                Gangodawila, Nugegoda,
                Sri Lanka </span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4 mb-30">
                    <div class="single-cta"  style="padding-left: 100px;">
                        <i class="fa fa-phone"></i>
                        <div class="cta-text">
                            <h4>Call us</h4>
                            <span>+94 11 2758000</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4 mb-30">
                    <div class="single-cta">
                        <i class="fa fa-envelope"></i>
                        <div class="cta-text">
                            <h4>Mail us</h4>
                            <span>info@sjp.ac.lk</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-content pt-5 pb-5">
            <div class="row">
                <div class="col-xl-4 col-lg-4 mb-50">
                    <div class="footer-widget">
                        <div class="footer-logo">
                            <a href="home.php">
                                <img src="logo.jfif" class="img-fluid" alt="logo" style="height: 75px;">
                            </a>
                        </div>
                        <div class="footer-text">
                            <p>Herb Store is an online Herb Shop with certificated herbal & Natural products. Herb Store with special offers and island wide free delivery.</p>
                        </div>
                        <div class="footer-social-icon">
                            <span>Follow us</span>
                            <a href=""><i class="fab fa-facebook" style="font-size: 36px;"></i></a>
                            <a href=""><i class="fab fa-twitter" style="font-size: 36px;"></i></a>
                            <a href=""><i class="fab fa-instagram" style="font-size: 36px;"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 mb-30" style="text-align: right;">
                    <div class="footer-widget">
                        <div class="footer-widget-heading">
                            <h3 style="padding-right: 70px;">Useful Links</h3>
                        </div>
                        <ul class="useful_links">
                            <li><a href="home.php">Home</a></li>
                            <li><a href="search.php">Search</a></li>
                            <li><a href="https://www.sjp.ac.lk/">Ofiicial site</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 text-center text-lg-left">
                    <div class="copyright-text">
                        <p>Copyright &copy; 2022, All Right Reserved </p>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 d-none d-lg-block text-right">

                </div>
            </div>
        </div>
    </div>
    </div>
</footer>

</body>
</html>