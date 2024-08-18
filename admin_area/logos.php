<?php
if (isset($_GET['logos'])) {
 
    $select_query = "SELECT * FROM `settings` WHERE id=1";
    $result_query = mysqli_query($con, $select_query);
    $row_fetch = mysqli_fetch_assoc($result_query);
    
    $logo_image = $row_fetch['logo']; // Assuming this is the column in your table storing the image filename

    if (isset($_POST['logo_update'])) {
        $logo_image1 = $_FILES['logo_image']['name'];
        $logo_image_tmp = $_FILES['logo_image']['tmp_name'];
        
        // Specify the correct path relative to the location of this PHP file
        $destination_path = "../logo_images/$logo_image1";

        move_uploaded_file($logo_image_tmp, $destination_path);

        // Update query
        $update_data = "UPDATE `settings` SET logo='$logo_image1' WHERE id=1";
        $result_query_update = mysqli_query($con, $update_data);
        if ($result_query_update) {
            echo "<script>alert('Data updated successfully') </script>";
            echo "<script>window.open('index.php','_self') </script>";
        } else {
            echo "<script>alert('Error updating data: " . mysqli_error($con) . "')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Logo</title>
</head>
<body>
    <h3 class="text-center text-success mb-4">Edit Logo</h3>
    <form action="" method="post" enctype="multipart/form-data" class="text-center">

        <div class="form-outline mb-4 d-flex w-30 m-auto">
            <input type="file" class="form-control" name="logo_image" required="required">
            <img src="../logo_images/<?php echo $logo_image ?>" alt="hey" class="edit_image">
        </div>

        <input type="submit" value="Save" class="bg-warning py-2 px-3 border-0" name="logo_update">

        <br>
        

    </form>
</body>
</html>
