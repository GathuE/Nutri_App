<?php
session_start();
error_reporting(0);
if (!isset($_SESSION['logged_in'])) {
  header("Location: login.php");
  exit();
}
else {
$page_title = "Nutri App || Messages ";
$id = $_SESSION['ID'];
$weight =  $_SESSION['weight'];
$height =  $_SESSION['height'];
$goal =  $_SESSION['goal'];
$targetweight = $_SESSION['targetweight'];
$routine = $_SESSION['routine'];
$workout = $_SESSION['workout'];
include 'includes/header.php';
include 'includes/navbar.php';
include 'classes/db.class.php';
}
?>

<div class="content">
    <?php include 'includes/errors.php'; ?>
        <div class="row" style="padding:20px;">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" id="chathistory">
                <div class="card" style="height:400px;background-color: #f1f7fc;overflow-y:scroll; display:block;border:0;" >
                    <div class="row-mb-3">
                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6" style="margin-top:30px;float:left;">
                            <?php include 'includes/oldmessages/client_messages.php'; ?>     
                        </div>
                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6" style="float:right;">
                            <?php include 'includes/oldmessages/client_replies.php'; ?>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<?php include 'includes/footer.php' ?>
