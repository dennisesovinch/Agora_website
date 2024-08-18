<?php include('../includes/connect.php');
    include('../functions/common_function.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    
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
    <h2 class="text-center mb-4">Admin Login
    </h2>
    <div class="d-flex justify-content-center">
        <div class="col-1g-6 col-x1-5">
            <img src="../images/adminlogin.jpg" alt="Admin Registration"
            class="img-fluid">
        </div>
            <form action="" method="post">
                <div class="form-outline mb-4">
                    <label for="admin_name" class="form-label">Username</label>
                    <input type="text"id="admin_name" name="admin_name"
                    placeholder="Enter your username" required="required"
                    class="form-control">
                </div>
                <div class="form-outline mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password"
                    placeholder="Enter your password" required="required"
                    class="form-control">
                    </div>
                <input type="submit" class="bg-warning py-2 px-3 border-0"
                    name="admin_login" value="Login">
                    <p class="small fw-bold mt-2 pt-1">Don't you have an account? 
                        <a href="admin_registration.php" class="link-danger">Register</a></p>
            </form>
    </div>
    </div>
    </div>

</body>
</html>

<?php
if(isset($_POST['admin_login'])){
    $admin_name=$_POST['admin_name'];
    $admin_password=$_POST['admin_password'];
    $select_query="Select * from `admin_table` where admin_name='$admin_name'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);


if (mysqli_num_rows($result) > 0) {
    $row_data = mysqli_fetch_assoc($result);

    if (password_verify($admin_password, $row_data['admin_password'])) {
        $_SESSION['admin_name'] = $admin_name;
        
        echo "<script>alert('Login Success!')</script>";
        echo "<script>window.open('index.php', '_self')</script>";
    } else {
        echo "<script>alert('Login Success!!')</script>";
        echo "<script>window.open('index.php', '_self')</script>";
    }
} else {
    echo "<script>alert('')</script>";
    echo "<script>window.open('admin_login.php', '_self')</script>";
}}

?>

