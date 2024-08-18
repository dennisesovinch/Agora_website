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
    <style>
.footer{
  position:absolute;
  bottom:0;
}
*{
    margin:0px;
    padding:0px;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
.section{
    width: 100%;
    min-height: 10vh;
    
}
.container{
    width: 80%;
    display: block;
    margin:auto;
    padding-top: 100px;
}
.image-section{
    float: right;
    width: 35%;
}
.content-section{
    float: left;
    width: 60%; 
}
.image-section img{
    width: 100%;
    height: auto;
}
.content-section .content h3{
  margin-top: 20px;
  color:#5d5d5d;
  font-size: 21px;
}
.content-section .content p{
  margin-top: 10px;
  font-family: sans-serif;
  font-size: 18px;
  line-height: 1.5;
}
.content-section .social{
  margin-top:40px 40px;
}
.content-section .social i{
  color:FF6666;
  font-size: 30px;
  padding:0px 10px;
}  
    </style>

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
        <?php
  if(isset( $_SESSION['username'])){
    echo "<li class='nav-item'>
    <a class='nav-link' href='./users_area/profile.php'>My Account</a>
  </li>";
  }else{
    echo "<li class='nav-item'>
    <a class='nav-link' href='./users_area/user_registration.php'>Register</a>
  </li>";
  }
?>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php 
          cart_item();?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php">Total Price: ₱ <?php total_cart_price();?> </a>
        </li>
      </ul>
      <form class="d-flex" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" 
        placeholder="Search" aria-label="Search" name="search_data">
        <!-- <a class="bn39" href="/"><span class="bn39span">Button</span></a> -->
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
                  <a class='nav-link text-white' href='profile.php'>Welcome ".$_SESSION['username']."</a>
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
                  <a class='nav-link text-white' href='logout.php'>Logout</a>
                </li>";
                }
                ?>
  </ul>
</nav>
<!-- third child -->
<div class="bg-light">
    
    
</div>

<nav class="navbar navbar expand-lg navbar-light ">
    <ul class="navbar nav me-auto ">

    <div class="section">
      <div class="container">
        <div class="content-section">
          <div class="title">
            <h1>About Us</h1>
          </div>
          <div class="content">
            <h3>You can find information about Shopee on our official platforms:</h3>

              <p>Agora Help Center: provides detailed guides on how to navigate Agora and other useful information regarding different processes involving buyers.
              Official Shopee social media accounts: Latest updates on Agora

              </p>

              <p>

              Contact us!
              Instagram
              LinkedIn
              Twitter
              <br>
              or email us agoraweb011@gmail.com


            
            </p>
          </div>
              <div class="social">
              <a href=""><i class="fab fa-facebook-f"></i></a>
              <a href=""><i class="fab fa-twitter"></i></a>
              <a href=""><i class="fab fa-instagram"></i></a>
          </div>
        </div>
        <div class="image-section">
          <img src="./images/logo.png">
        </div>
      </div>
    </div>
   

</ul>
</nav>


<div>

                    

            </div>


 <!-- fourth child -->

</div>
<!-- col end -->
</div>

</div>

<!-- last child -->
<!-- include footer -->
 <?php include("./includes/footer.php") 
 ?>
</div> 


<!-- boostsrap Js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
crossorigin="anonymous"></script>
</body>
</html>