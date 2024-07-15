<?php
error_reporting(0);
ini_set('display_errors', 'Off');
//display_errors(false);

if (isset($_POST['submit'])) {
  include 'users.class.php';
  $user = new ManageUsers();
// CAPTURE USER INPUT
  //1.goal_guide
  $id = $_SESSION['ID'];
  $goal = $_POST['goal'];
  $currentweight = $_POST['currentweight'];
  $targetweight = $_POST['targetweight'];
  $routine = $_POST['routine'];
  $workout = $_POST['workout'];
  

  // STANDARD SECURITY META
  $ip_address = $_SERVER['REMOTE_ADDR'];
  $date = date("d-m-Y");
  $time = date("H:i");
  

  //verify if user Identity is true
  if (empty($id) || empty($goal)) {
    header("Location: ../info.php?e=Please Input all Fields.");
    exit();
    
  }
  else {
      //Check Data Presence
      $goal_guide = $user->Goalguide($id);
      
      if ($goal_guide == 0)
       {
        $guide_data = $user->guide($id, $goal, $currentweight, $targetweight, $routine, $workout, $ip_address, $time, $date);
        

      // Insert Ignore Records
        if ($guide_data == 1) 
        {
          $create_session = $user->user_session_data($id);
          $create_data_session = $user->session_bio_data($id);
            header("Location: ../referencedata?s=Data Successfully Saved.");
            exit();
          }
      }
      else {
        $create_data_session = $user->session_bio_data($id);
        header("Location: ../referencedata?e=Your Data already Exists.");
        exit();
      }
  }

}
?>