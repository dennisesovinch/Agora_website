

<?php
// Include your database connection code here
include('./includes/connect.php');

// Count total users
$sql = "SELECT COUNT(*) as total_users FROM users";
$result = mysqli_query($con, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $totalUsers = $row['total_users'];

    echo "Total Users: " . $totalUsers;
} else {
    echo "Error in query: " . mysqli_error($con);
}

// Close the database connection
mysqli_close($con);
?>
