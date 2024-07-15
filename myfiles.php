<?php
session_start();
error_reporting(0);
if (!isset($_SESSION['logged_in'])) {
  header("Location: login.php");
  exit();
}
else {
$page_title = "Downloads || Nutri App";
include 'includes/header.php';
include 'includes/navbar.php';
include 'includes/messages_card.php';
include 'classes/users.class.php';
$username = $_SESSION['username'];
$id = $_SESSION['ID'];
$user = new ManageUsers();
$details = $user->get_details($username);
}
?>

<div class="content">
    <?php include 'includes/errors.php'; ?>
    <?php include 'includes/downloads/files.php'; ?> 

    
    
</div>
    

<?php include 'includes/footer.php' ?>
