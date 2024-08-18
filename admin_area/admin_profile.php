<!-- connect file-->
<?php
session_start();
include('../includes/connect.php');
include('../functions/common_function.php');
?>

<?php
                 
                 if(!isset($_SESSION['username'])){
                   echo " <li class='nav-item'>
                   <a class='nav-link' href='#'>Welcome Guest</a>
                 </li>";
                 }else{
                   echo "<li class='nav-item'>
                   <a class='nav-link' href='profile.php'>Welcome ".$_SESSION['username']."</a>
                 </li>";
                 }
         ?>
                 <?php 
                 if(!isset($_SESSION['username'])){
                   echo " <li class='nav-item'>
                   <a class='nav-link' href='./users_area/user_login.php'>Login</a>
                 </li>";
                 }else{
                   echo " <li class='nav-item'>
                   <a class='nav-link' href='logout.php'>Logout</a>
                 </li>";
                 }
                 ?>