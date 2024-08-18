<!-- connect file-->
<?php
session_start();
include('../includes/connect.php');
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
        
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



                    <link rel="icon" type="image/x-icon" href="../logo_images/<?php echo $logo_url; ?>">


    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
    crossorigin="anonymous">
    
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" 
    integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- css file -->
    <link rel="stylesheet" href="../style.css">

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
            <!-- <img src="../images/logo.png" alt="" class="logo"> -->
            

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


                <img src="../logo_images/<?php echo $logo_url; ?>" alt="" class="logo">

                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <!-- <b><a href="admin_login.php" class="nav link text-white">Welcome Guest</a></b> -->
                            <button><a href="../users_area/logout.php"class="nav-link text-light bg-danger ">Logout</a></button>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>

        
        <!-- Second child -->
        <div class="bg-light ">
            <h3 class="text-center p-2 bg-secondary">Admin Dashboard</h3>
        

        <!-- <php
                 
                if(!isset($_SESSION['adminname'])){
                  echo " <li class='nav-item'>
                  <a class='nav-link' href='admin_login.php'>Welcome Guest</a>
                </li>";
                }else{
                  echo "<li class='nav-item'>
                  <a class='nav-link' href='list_orders.php'>Welcome ".$_SESSION['admin_name']."</a>
                </li>";
                }
        ?>
                <php 
                if(!isset($_SESSION['admin_name'])){
                  echo " <li class='nav-item'>
                  <a class='nav-link' href='admin_login.php'>Login</a>
                </li>";
                }else{
                  echo " <li class='nav-item'>
                  <a class='nav-link' href='logout.php'>Logout</a>
                </li>";
                }
                ?> -->

        <!-- third child -->
        <div class="row ">
            <div class="col-md-12 bg-warning p-1 d-flex align-items-center">
                <div class="p-3">
                <!-- <i class="fa-solid fa-cart-shopping  mb-2" style="font-size: 50px;"></i> -->
                
                    <a href="#"><img src="../images/admin.png" alt="" class="admin_image"></a>
                    
                    <p class="text-light text-center "> </p>               
                </div>
                <!-- button*10>a.navlink.text-light.bg-warning.my-1 -->
                <div class="button text-center">
                    <button class="3"><a href="index.php?logos" class="nav-link text-light bg-secondary my-1">Edit Logo</a></button>
                    <button class="3"><a href="insert_products.php" class="nav-link text-light bg-secondary my-1">Insert Products</a></button>
                    <button><a href="index.php?insert_category" class="nav-link text-light bg-secondary my-1">Insert Categories</a></button>
                    <button><a href="index.php?insert_brands" class="nav-link text-light bg-secondary my-1">Insert Brands</a></button>
                    <!-- <button><a href="index.php?view_categories" class="nav-link text-light bg-secondary my-1">View Categories</a></button> -->
                    <!-- <button><a href="index.php?view_brands" class="nav-link text-light bg-secondary my-1">View Brands</a></button> -->                   
                    <button><a href="index.php?view_products" class="nav-link text-light bg-secondary my-1">View Products</a></button>
                    <button><a href="index.php?list_orders" class="nav-link text-light bg-secondary my-1">All Orders</a></button>
                    <button><a href="index.php?list_payments" class="nav-link text-light bg-secondary my-1">All Payments</a></button>
                    <button><a href="index.php?list_users" class="nav-link text-light bg-secondary my-1">List User</a></button>
                </div>
            </div>

        

        </div>
    </div>
    </div>
    <!-- fourth child -->
    <div class="container my-5">
        <?php
        if(isset($_GET['logos'])){
                    include('logos.php');
                }
        if(isset($_GET['insert_category'])){
            include('insert_categories.php');
                }
        if(isset($_GET['insert_brands'])){
            include('insert_brands.php');
                }
        if(isset($_GET['view_products'])){
            include('view_products.php');
                }
        if(isset($_GET['edit_products'])){
            include('edit_products.php');
                }
        if(isset($_GET['delete_product'])){
            include('delete_product.php');
                }
         if(isset($_GET['view_categories'])){
            include('view_categories.php');
                }
        if(isset($_GET['view_brands'])){
            include('view_brands.php');
                }
        if(isset($_GET['edit_category'])){
            include('edit_category.php');
                }     
        if(isset($_GET['edit_brands'])){
            include('edit_brands.php');
                }
        if(isset($_GET['delete_category'])){
            include('delete_category.php');
                }                  
        if(isset($_GET['delete_brands'])){
            include('delete_brands.php');
                }
        if(isset($_GET['list_orders'])){
            include('list_orders.php');
                }
        if(isset($_GET['list_payments'])){
            include('list_payments.php');
                }
        if(isset($_GET['list_users'])){
            include('list_users.php');
                }      
        ?>
    
 
   


            <div class="row align-items-center text-center">
                
            <div class="col-xl-3 col-md-6">
                <div class="card bg-info text-white mb-4">
                <i class="fa fa-users  mb-2" style="font-size: 50px;"></i>

                            <div class="card-body"> Total Users                         
                            <?php 
                                $dash_user_query = "SELECT * from user_table";
                                $dash_user_query_run = mysqli_query ($con, $dash_user_query);
                                
                                if($user_total = mysqli_num_rows ($dash_user_query_run))
                                {
                                    echo '<h4 class="mb-0"> '.$user_total.' </h4>';
                                }else{
                                    echo '<h4 class="mb-0"> No Data </h4>';
                                }
                            ?>
                            </div>
                        </div>
                    </div>     

                <div class="col-xl-3 col-md-6">
                <div class="card bg-secondary text-white mb-4">
                <i class="fa fa-th-large mb-2" style="font-size: 50px;"></i>        
                    <div class="card-body"> Total Categories                           
                            <?php 
                                $dash_category_query = "SELECT * from categories";
                                $dash_category_query_run = mysqli_query ($con, $dash_category_query);
                                
                                if($category_total = mysqli_num_rows ($dash_category_query_run))
                                {
                                    echo '<h4 class="mb-0"> '.$category_total.' </h4>';
                                }else{
                                    echo '<h4 class="mb-0"> No Data </h4>';
                                }
                            ?>
                            </div>
                        </div>
                    </div>              
                    
                    
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                        <i class="fa fa-list mb-2" style="font-size: 50px;"></i>

                            <div class="card-body">Total Brands
                            <?php 
                                $dash_brands_query = "SELECT * from brands";
                                $dash_brands_query_run = mysqli_query($con, $dash_brands_query);
                                
                                if($brands_total = mysqli_num_rows ($dash_brands_query_run))
                                {
                                    echo '<h4 class="mb-0"> '.$brands_total.' </h4>';
                                }else{
                                    echo '<h4 class="mb-0"> No Data </h4>';
                                }
                            ?>
                        </div>
                    </div>
                </div> 

                    
                <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <i class="fa fa-th mb-2" style="font-size: 50px;"></i>
                        <div class="card-body">Total products                           
                        <?php 
                            $dash_products_query = "SELECT * from products";
                            $dash_products_query_run = mysqli_query ($con, $dash_products_query);
                            
                            if($products_total = mysqli_num_rows ($dash_products_query_run))
                            {
                                echo '<h4 class="mb-0"> '.$products_total.' </h4>';
                            }else{
                                echo '<h4 class="mb-0"> No Data </h4>';
                            }
                        ?>
                        </div>
                    </div>
                </div>
                
                

         
        </div></div>
        </div>
        </div>
                        
    <!-- last child -->
    <?php include("../includes/footer.php") ?>

  <!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>

