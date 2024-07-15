<?php
session_start();
error_reporting(0);
if (!isset($_SESSION['logged_in'])) {
  header("Location: login.php");
  exit();
}
else {
include 'includes/keyword_file.php';
$siteauthor = "Emmanuel Gathu";
$page_title = "Nutri App || Our Unit Converter";
$username = $_SESSION['username'];
$id = $_SESSION['ID'];
include 'includes/header.php';
include 'includes/navbar.php';
include 'includes/messages_card.php';
include 'classes/db.class.php';
}
?>

<div class="content">
    <?php include 'includes/errors.php'; ?>
    <?php include 'includes/home/converter.php'; ?>   
    
</div>
    

<?php include 'includes/footer.php' ?>
