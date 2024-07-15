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
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" id="textbox">
                    <form action="classes/send_reply.php" method="POST">
                        <div class="form-group" style="padding-bottom:60px;">
                        <h5 style="text-align:center;color:#421966;font-weight:bold;">Talk to Us:</h5>
                        <h6 style="text-align:center;color:#138ea4;font-weight:bold;">We reply your Messages in the shortest time possible.</h6>
                            <input type="hidden" name="userid" value="<?php echo $id ?>">
                                <textarea class="form-control" name="message" style="font-size:normal;height:100px;" placeholder="Type your Text Message..."></textarea>
                            <br>
                            <button type="button" style="background-color:#421966;color:#fff;border-radius:2px;border:0;outline:0;font-size:12px;padding:5px;float:left;"><a href="chat_history" style="color:#fff;text-decoration:none;">Chat History</a></button>  
                            <input type="submit" name="reply" style="background-color:#421966;color:#fff;border-radius:2px;border:0;outline:0;font-size:12px;padding:5px;float:right;" value="Send Message..">
                        </div>
                    </form>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" id="messagecard">
                        <div class="card" style="height:auto;background-color: #f1f7fc;overflow-y:scroll; display:block;border:0;">
                            <div class="row mb-3">
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6" style="margin-top:30px;float:left;">
                                            <?php include 'includes/newmessages/client_messages.php'; ?>       
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6" style="float:right;">
                                            <?php include 'includes/newmessages/client_replies.php'; ?>   
                                    </div>
                            </div>
                        </div>
                </div>

                
    </div>
</div>
<?php include 'includes/footer.php' ?>
