<?php
session_start();
error_reporting(0);
if (!isset($_SESSION['logged_in'])) {
  header("Location: login.php");
  exit();
}
else {
$page_title = "Nutri App || Home";
$username = $_SESSION['username'];
$id = $_SESSION['ID'];
$weight =  $_SESSION['weight'];
$height =  $_SESSION['height'];
$goal =  $_SESSION['goal'];
$targetweight = $_SESSION['targetweight'];
$routine = $_SESSION['routine'];
$workout = $_SESSION['workout'];
include 'includes/header.php';
include 'includes/navbar.php';
include 'includes/messages_card.php';
include 'classes/db.class.php';
}
?>

<div class="content">
    <?php include 'includes/errors.php'; ?>
    <?php include 'includes/home/bmidata.php'; ?>   
    
</div>
    

<?php include 'includes/footer.php' ?>
