<?php
//checking connection and session start
include "connection_files/connection.php";
?>
<?php
//redirecting to index if user or admin is unknown
if(!isset($_SESSION['username_logged']) and !isset($_SESSION['admin-pin']))
{
    header("location:LogIn.php");
}
?>
<?php
$search_list='';
$search='';
$sql='';
$items='';
$count='';
if(isset($_POST['search']) or isset($_POST['search_btn'])) {
    $count=0;
    $search = mysqli_real_escape_string($connection, $_POST['search']);
    $sql = "SELECT item_name FROM items WHERE item_id AND (item_name LIKE '%{$search}%')  ORDER BY item_name ASC";
    $_SESSION['home_search'] = "<a style='color: #0099ff; text-decoration: none; font-weight: bold;' href='search.php'>Refresh<br></a>";

    $items = mysqli_query($connection, $sql);
    $count=mysqli_num_rows($items);


    if ($items) {
        while ($item = mysqli_fetch_assoc($items)) {

            $search_list .= "<tr>";
            $search_list.="<td><h4>{$item['item_name']}&nbsp{$item['']}</h4></td>";

            $search_list .= "<td><a style='text-decoration: none;' id='view' href=\"home.php item_name={$item['item_name']}\">View Product</a></td>";
            $search_list .= "</tr>";

        }

    } else {
        echo "Database  related error " . $connection->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Herb Store</title>
    <link rel="icon" href="logo.jfif">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="bootstrap/bootstrap1.css">
    <script lang="JavaScript" type="text/javascript">
    </script>

</head>
<body>

<!--page Content start-->

<div id="search_window" class="window_search">
    <span class="closeBtn"><a href="home.php" style="all: unset;"><i class="fa fa-arrow-circle-left" id="icon"></i></a></span>
    <div class="window_search-content">
        <form name="users_search" method="post" action="search.php">
            <input type="text" value="<?php echo $search ?>" placeholder="Enter the product name" name="search" autofocus required>
            <button name="search_btn" type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
    <div class="search-result">
        <table class="table table-dark table-hover"  style="border-collapse:separate; border-spacing:0 15px;">
            <?php
            if($count==0)
            {
                if (isset($_SESSION['home_search'])) {
                    echo "<br>" . $_SESSION['home_search'];
                    unset($_SESSION['home_search']);
                }
                echo "<p style='color: white;'>No Products Found</p>";

            }
            else
            {
                if (isset($_SESSION['home_search'])) {
                    echo "<br>" . $_SESSION['home_search'];
                    unset($_SESSION['home_search']);
                }
                echo $search_list;
            }
            ?>

        </table>

    </div>

</div>
<div style="background-color: white">



</div>
<!-- page Content end-->

</body>
</html>