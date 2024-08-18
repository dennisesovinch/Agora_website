<?php include('../includes/connect.php');
    include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>

    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
    crossorigin="anonymous">
    
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" 
    integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" 
    crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <style>
        body{
            overflow: hidden;
        }
        
    </style>
</head>
<body>
        <div class="container-fluid m-3">
    <h2 class="text-center mb-4">Admin Registration
    </h2>
    <div class="d-flex justify-content-center ">
        <div class="col-1g-9 col-x1-9">
            <img src="../images/adminreg.jpg" alt="Admin Registration"
            class="img-fluid">
        </div>
            <form action="" method="post">
                <div class="form-outline mb-4">
                    <label for="admin_name" class="form-label">Username</label>
                    <input type="text" id="admin_name" name="admin_name"
                    placeholder="Enter your username" autocomplete="off"
                    required="required" class="form-control">
                </div>

                <!-- email -->
                <div class="form-outline mb-4">
                    <label for="admin_email" class="form-label">Email</label>
                    <input type="admin_email" id="admin_email" name="admin_email"
                    placeholder="Enter your email" required="required"
                    class="form-control">
                </div>

                <!-- password -->
                <div class="form-outline mb-4">
                    <label for="admin_password" class="form-label">Password</label>
                    <input type="password" id="admin_password" name="admin_password"
                    placeholder="Enter your password" autocomplete="off" required="required"
                    class="form-control">
                    </div>

                 <!-- confim password -->
                <div class="form-outline mb-4">
                    <label for="conf_admin_password" class="form-label">Confirm password</label>
                    <input type="password" id="conf_admin_password" name="conf_admin_password"
                    placeholder="Confrim your password" autocomplete="off" required="required" 
                    class="form-control">
                </div>

                <input type="submit" class="bg-warning py-2 px-3 border-0"
                    name="admin_register" value="Register">

                    <p class="small fw-bold mt-2 pt-1">Do youhave an account ? 
                        <a href="admin_login.php">Login</a></p>
            </form>
    </div>
    </div>
    </div>
</body>
</html>


<!-- php code -->
<?php
if(isset($_POST['admin_register'])){
    $admin_name=$_POST['admin_name'];
    $admin_email=$_POST['admin_email'];
    $admin_password=$_POST['admin_password'];
    $hash_password=password_hash($admin_password,PASSWORD_DEFAULT);
    $conf_admin_password=$_POST['conf_admin_password'];
    $admin_id=get_Admin_id();
    
    // select query
        $select_query="Select * from `admin_table` where admin_name='$admin_name' or 
        admin_id='$admin_id'";
        $result=mysqli_query($con,$select_query);
        $rows_count=mysqli_num_rows($result);
    if($rows_count>0){
        echo "<script>alert('Username and Email already exist')</script>";
    }else if($admin_password!=$conf_admin_password){
        echo "<script>alert('Password do not match')</script>";
}
else{
    // insert_query
    $insert_query="insert into `admin_table` (admin_id,admin_name,admin_email,admin_password) value
    ('$admin_id','$admin_name','$admin_email','$hash_password')";
    $sql_execute=mysqli_query($con,$insert_query);
    echo "<script>alert('Account created sucessfully')</script>";
    echo "<script>window.open('admin_login.php','_self')</script>";
}

}