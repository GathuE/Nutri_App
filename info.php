<?php
session_start();
error_reporting(0);
if (!isset($_SESSION['logged_in'])) {
  header("Location: login.php");
  exit();
}
else {
$page_title = "Nutri App || Survey ";
$id = $_SESSION['ID'];
$weight =  $_SESSION['weight'];
$goal =  $_SESSION['goal'];
include 'includes/header.php';
include 'includes/navbar.php';
include 'includes/messages_card.php';
include 'classes/db.class.php';
}
?>

<div class="content">
    <?php include 'includes/errors.php'; ?>
    <?php include 'includes/info/biodata.php'; ?> 
    
</div>
    

<?php include 'includes/footer.php' ?>
