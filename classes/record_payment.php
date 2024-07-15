<?php
error_reporting(0);
if (isset($_POST['payplan'])) {

  include 'users.class.php';
  $user = new ManageUsers();


  $id = $_SESSION['ID'];
  $planid = $_POST['goal'];
  $amount = $_POST['plancost'];
  $phone = $_POST['phone'];
  $ip_address = $_SERVER['REMOTE_ADDR'];
  $date = date("d-m-Y");
  $time = date("H:i");

//verify if empty
  if (empty($phone)) {
    header("Location: ../paymentplans?e=Please Input Your Phone Number!!.");
   
  }
  else {
      //check data presence
      $payment_availability = $user->GetPayment($id,$planid);
      if ($payment_availability == 0) {
        $payment_data = $user->Payment($id, $planid, $amount, $phone ,$ip_address, $time, $date);
        if ($payment_data == 1) {
          $status_change = $user->Changestatus($id);
            if($status_change == 1){
              header("Location: ../waiting?s=Payment Request Successful!!.");
              exit();
            }
          }
      }
      else {
        $create_session = $user->user_session_data($id);
        header("Location: ../waiting?e=A similar Request is Underway!!.");
        exit();
      }
  }

}
?>