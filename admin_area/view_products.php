<!--VIEW CATEGORIES  -->
<h3 class="text-center ">ALL Categories</h3>
<table class="table table-bordered mt-3 bg-warning">
<thread class="bg-secondary">
    <tr class="text-center">
        <th>no.</th>
        <th>Category</th>
        <th>Edit</th>
        <th>Delete</th>

    </tr>
    </thread>
    <tbody class="bg-secondary text-light">
        <?php
        $select_cat="Select *from `categories`";
        $result=mysqli_query($con,$select_cat);
        $number=0;
        while($row=mysqli_fetch_assoc($result)){
            $category_id=$row['category_id'];
            $category_title=$row['category_title'];
            $number++;        
        ?>

        <tr class="text-center">
            <td><?php echo $number;?></td>
            <td><?php echo $category_title;?></td>
            <td><a href='index.php?edit_category=<?php echo $category_id?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td><a href='index.php?delete_category=<?php echo $category_id?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>

            
        </tr>
        <?php
        
        }?>
    </tbody>
</table>

<!-- VIEW BRANDS -->
<h3 class="text-center text-sucess">ALL Brands</h3>
<table class="table table-bordered mt-5 bg-warning">
<thread class="bg-secondary">
    <tr class="text-center">
        <th>no.</th>
        <th>Brands Title</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thread>
    <tbody class="bg-secondary text-light">
        <?php
        $select_cat="Select *from `brands`";
        $result=mysqli_query($con,$select_cat);
        $number=0;
        while($row=mysqli_fetch_assoc($result)){
            $brand_id=$row['brand_id'];
            $brand_title=$row['brand_title'];
            $number++;        
        ?>

        <tr class="text-center">
            <td><?php echo $number;?></td>
            <td><?php echo $brand_title;?></td>
            <td><a href='index.php?edit_brands=<?php echo $brand_id?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td><a href='index.php?delete_brands=<?php echo $brand_id?>' 
            type="button" class="text-light" data-toggle="modal" 
            data-target="#exampleModal"><i class='fa-solid fa-trash'></i></td>
  
        </tr>
        <?php
        
}?>
    </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h4>Are you sure you want to delete this?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary"
        data-dismiss="modal"><a href="./index.php?view_brands" 
        class='text-light text-decoration-none'>NO</a></button>
        
        <button type="button" class="btn btn-primary"><a href='./index.php?
        delete_brands=<?php echo $brand_id?>' class="text-light text-decoration-none">YES</a></button>
      </div>
    </div>
  </div>
</div>

<!-- END OF BRANDS -->

<!-- VIEW ALL PRODUCTS -->
    <h1 class="text-center text-success">All products</h1>
<table class="table table-bordered mt-2 bg-warning text-center">
<thread>
    <tr>
        <th>Product ID </th>
        <th>Product Title</th>
        <th>Product Image</th>
        <th>Product Price</th>
        <th>Total Sold </th>
        <th>Status</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
</thread>
<tbody class="bg-secondary text-light">

<?php
$get_products="Select * from `products`";
$result=mysqli_query($con,$get_products);
$number=0;
while($row=mysqli_fetch_assoc($result)){
    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_image1=$row['product_image1'];
    $product_price=$row['product_price'];
    $status=$row['status'];
    $number++;
?>
    <tr class='text-center'>
    <td><?php echo $number;?></td>
    <td><?php echo $product_title;?></td>
    <td><img src='./product_images/<?php echo $product_image1;?>' class='product_img'/></td>
    <td><?php echo $product_price;?>₱</td>
    <td><?php
    $get_count="Select * from `user_orders` where user_id=$status";
    $result_count=mysqli_query($con,$get_count);
    $rows_count=mysqli_num_rows($result_count);
    echo $rows_count;
    ?></td>
    
    <td><?php echo $status;?></td>
    <td><a href='index.php?edit_products=<?php echo $product_id ?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
    <td><a href='index.php?delete_product=<?php echo $product_id ?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
</tr>

 <?php
 }
 ?>
</tbody>
</table>


