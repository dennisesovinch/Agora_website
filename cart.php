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
                  <a class='nav-link' href='./users_area/profile.php'>Welcome ".$_SESSION['username']."</a>
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
                  <a class='nav-link' href='./users_area/logout.php'>Logout</a>
                </li>";
                }
                ?>
  </ul>
</nav>
<!-- third child -->
<div class="bg-light">
  <h3 class="text-center p-1">AGORA</h3>
  <p class="text-center">Agora your One-click Shopping Paradise</p>
</div>


<!-- fourth child-table -->
<div class="container">
    <div class="row">
      <form action="" method="post">
       <table class="table table-bordered text-center">
            
                           <!-- dynamic data -->
            <?php 
             global $con;
             $get_ip_add = getIPAddress(); 
             $total=0;
             $cart_query="Select * from `cart_details` where ip_address='$get_ip_add'";
             $result=mysqli_query($con,$cart_query);
             $result_count=mysqli_num_rows($result);
             if ($result_count>0){
              echo "<thead>
              <tr>
                  <th>Product Title</th>
                  <th>Product Image</th>
                  <th>Quantity</th>
                  <th>Total Price</th>
                  <th>Remove</th>
                  <th colspan='2'Operations</th>
              </tr>
          </thead>
          <tbody>";

          while($row=mysqli_fetch_array($result)){
            $product_id=$row['product_id'];
            $select_products="Select * from `products` where product_id='$product_id'";
            $result_products=mysqli_query($con,$select_products);
            while($row_product_price=mysqli_fetch_array($result_products)){
              $product_price=array($row_product_price['product_price']);
              $price_table=$row_product_price['product_price'];
              $product_title=$row_product_price['product_title'];
              $product_image1=$row_product_price['product_image1'];
              $product_values=array_sum($product_price);
              $total+=$product_values;
    
           
         ?>
         <tr>
             <td><?php echo $product_title ?></td>
             <td><img src="./admin_area/product_images/<?php echo $product_image1 ?>" alt="" class="cart_img"></td>
             <td><input type="text" name="qty" class="form-input w-50" ></td>
             <?php 
             $get_ip_add=getIPAddress();
             if (isset($_POST['update_cart'])){
                 $quantities=$_POST['qty'];
                 $update_cart="update `cart_details` set quantity=$quantities where ip_address='$get_ip_add'";
                 $result_products_quantity=mysqli_query($con,$update_cart);
               
                 $total=$total*$quantities;
}
 
                ?>
                <td><?php echo $price_table?></td>
                <td><input type="checkbox" name="removeitem[]" value="<?php echo
                $product_id ?>"></td>
                <td>
                    <!-- <button class="bg-warning px-3 py-2 border-0 
                    mx-3">Update</button> -->
                    <input type="submit" value="Update Cart" class="bg-warning px-3 py-2 
                    border-0 mx-3" name="update_cart">
                    <!-- <button class="bg-warning px-3 py-2 border-0 mx-3">Remove</button> -->
                    <input type="submit" value="Remove Cart" class="bg-warning px-3 
                    py-2 border-0 mx-3" name="remove_cart">
                </td>

            </tr> 
            
  <?php }}}

  else{
    
    echo "<h2 class='text-center text-danger' >Cart is empty</h2>";
  }
  ?>
            </tbody>
        </table>
        <!-- subtotal -->
        <div class="d-flex mb-3">
      <?php 
      $get_ip_add = getIPAddress(); 
      
      $cart_query="Select * from `cart_details` where ip_address='$get_ip_add'";
      $result=mysqli_query($con,$cart_query);
      $result_count=mysqli_num_rows($result);
      if ($result_count>0){
      echo "  <h4 class='px-4'>Subtotal:₱<strong>$total</strong></h4>
      <input type='submit' value='Continue Shopping' class='bg-warning px-3 py-2 border-0 mx-3' name='continue_shopping'>
      <button class='bg-secondary px-3 py-2 border-0 text-dark'><a href='./users_area/checkout.php' class='text-dark text-decoration-none'> Checkout</a></button>";
     
      }else{
        echo "<input type='submit' value='Continue Shopping' class='bg-warning px-3 py-2 border-0 mx-3' name='continue_shopping'>";
      }

      if(isset($_POST['continue_shopping'])){
        echo "<script>window.open('index.php','_self') </script>";
      }
      ?>
            
            </div>
    </div>
</div>
</form>
<!-- function to remove item -->
<?php 
function remove_cart_item(){
  global $con;
  if (isset($_POST['remove_cart'])){
    foreach($_POST['removeitem'] as $remove_id){
      echo $remove_id;
      $delete_query="Delete from `cart_details` where product_id=$remove_id";
      $run_delete=mysqli_query($con,$delete_query);
      if($run_delete){
        echo "<script>window.open('cart.php','_self') </script>";
      }
    }
  }
}
echo $remove_item=remove_cart_item();
?>



<!-- last child -->
  <!-- footer -->
  <?php
  include('./includes/footer.php')
  ?>
    </div>

<!-- boostsrap Js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
crossorigin="anonymous"></script>
</body>
</html>