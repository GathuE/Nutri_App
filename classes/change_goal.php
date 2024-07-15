<?php
error_reporting(0);
if (isset($_POST['changeplan'])) {

  include 'users.class.php';
  $user = new ManageUsers();


  $id = $_SESSION['ID'];
  $goal =  $_SESSION['goal'];


//verify if empty
  if (empty($id) || empty($goal)) {
    header("Location: ../paymentplans?e=Session Expired..Please Login again!!.");
   
  }
  else {
      //check data presence
      //1.bmi
      $bmi_availability = $user->GetBmi($id,$goal);
      //2.goal
      $goal_guide = $user->Goalguide($id);
      //3.Reference
      $reference_availability = $user->Getdata($id);
      //EER
      $eer_availability = $user->CheckEER($id);


      if ($bmi_availability != 0 && $goal_guide != 0 && $reference_availability != 0 && $eer_availability != 0) {
        $erase_data1 = $user->Erasebmi($id);
        $erase_data2 = $user->Erasegoal($id);
        $erase_data3 = $user->Erasereference($id);
        $erase_data4 = $user->EraseEer($id);
        $erase_data5 = $user->ErasePayment($id);
        $change_status = $user->ChangeUserStatus($id);
        if ($erase_data1 == 1 && $erase_data2 == 1 && $erase_data3 == 1 && $erase_data4 == 1) {
              header("Location: ../home?s=You can now change your Plan!!.");
              exit();
            }
       
      }
      else {
        $create_session = $user->user_session_data($id);
        header("Location: ../paymentplans?e=Something went Wrong....Please Try again!!.");
        exit();
      }
  }

}
?>