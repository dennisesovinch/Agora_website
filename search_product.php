<!-- connect file-->
<?php
session_start();
include('includes/connect.php');
include('functions/common_function.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AGORA</title>
    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
    crossorigin="anonymous">

    <!-- Font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" 
    integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css file -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-warning">
  <div class="container-fluid">

  <?php
                // Assuming you have a database connection and the necessary functions

                // Fetch the logo URL from the settings table
                $select_logo_query = "SELECT logo FROM `settings` WHERE id = 1";
                $result_logo_query = mysqli_query($con, $select_logo_query);

                if ($result_logo_query) {
                    $row_logo = mysqli_fetch_assoc($result_logo_query);
                    $logo_url = $row_logo['logo'];
                } else {

                }
                ?>

  <img src="./logo_images/<?php echo $logo_url; ?>" alt="" class="logo">
   


    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./users_area/user_registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php 
          cart_item();?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price: <?php total_cart_price();?>/-</a>
        </li>
      </ul>
      <form class="d-flex" action="" method="get">
        <input class="form-control me-2" type="search" 
        placeholder="Search" aria-label="Search" name="search_data">
      <input type="submit" value="Search" class="btn 
      btn-outline-light" name="search_data_product">
      </form>
    </div>
  </div>
</nav>
 
<!-- calling cart function -->
<?php
cart();
?>

<!-- second child -->
<nav class="navbar navbar expand-lg navbar-light bg-secondary">
    <ul class="navbar nav me-auto ">
        <?php
                 
                if(!isset($_SESSION['username'])){
                  echo " <li class='nav-item'>
                  <a class='nav-link text-white' href='./users_area/user_login.php'>Welcome Guest</a>
                </li>";
                }else{
                  echo "<li class='nav-item'>
                  <a class='nav-link text-white' href='./users_area/profile.php'>Welcome ".$_SESSION['username']."</a>
                </li>";
                }
        ?>
                <?php 
                if(!isset($_SESSION['username'])){
                  echo " <li class='nav-item'>
                  <a class='nav-link text-white' href='./users_area/user_login.php'>Login</a>
                </li>";
                }else{
                  echo " <li class='nav-item'>
                  <a class='nav-link text-white' href='./users_area/logout.php'>Logout</a>
                </li>";
                }
                ?>
  </ul>
</nav>
<!-- third child -->
<div class="bg-light">
    <h3 class="text-center">AGORA</h3>
    <p class="text-center">"Affordable Fashion, Overflowing Style"</p>
</div>

<!-- fourth child -->
<div class="row px-3">
    <div class="col-md-10">

        <!-- products -->
        <div class="row">
<!-- fetching products  -->
        <?php
        //calling function
        search_products();
        get_unique_categories();
        get_unique_brands();
        ?>  
<!-- row end -->
</div>
<!-- col end -->
</div>
    <div class="col-md-2 bg-secondary p-0">
        <!-- Brands to be displayed -->
        <ul class="navbar-nav me-auto text-center">
            <li class="nav-item bg-warning">
                <a href="#" class="nav-link text-light"><h4>OverRun Brands</h4></a>
            </li>
            <?php
            getbrands();
            ?>
      </ul>
        <!-- categories to be displayed -->
        <ul class="navbar-nav me-auto text-center">
            <li class="nav-item bg-warning">
                <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
            </li>
            <?php
            getcategories();     
            ?>     
        </ul>  

    </div>
</div>

<!-- last child -->
<!-- include footer -->
 <?php include("./includes/footer.php") ?>
</div> 


<!-- boostsrap Js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
crossorigin="anonymous"></script>
</body>
</html>