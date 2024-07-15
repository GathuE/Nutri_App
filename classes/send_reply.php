<?php
//session_start();
error_reporting(0);
if (isset($_POST['reply'])) {
    include 'users.class.php';
    $user = new ManageUsers();

    $id = $_POST['userid'];
    $message = $_POST['message'];
    $ip_address = $_SERVER['REMOTE_ADDR'];
    $date = date("d-m-Y");
    $time = date("H:i");

    if (empty($message)) {
        header("Location: ../messages.php?e=You forgot to write us some message!!.");
        exit();
      }
      //check data presence
      $check_replies = $user->CheckReplies($id,$message);
      if ($check_replies == 0) {
        $save_reply = $user->Replymessage($id,$message,$ip_address,$date,$time);
        if ($save_reply == 1) {
          $message_status = $user->MessageStatus($id);
          header("Location: ../messages.php?s=Message Sent!!.");
          exit();
        }
        else{
            header("Location: ../messages.php?e=Message Not Sent.Try again!!.");
            exit();
        }
        
      }
      else{
        header("Location: ../messages.php?e=A similar response is being processed.Please Wait!!.");
            exit();
      }
    
}