<?php
error_reporting(0);
if (isset($_POST['bmidata'])) {

  include 'users.class.php';
  $user = new ManageUsers();


  $id = $_SESSION['ID'];
  $goal = $_POST['goal'];
  $weight = $_POST['weight'];
  $height = $_POST['height'];
  $ip_address = $_SERVER['REMOTE_ADDR'];
  $date = date("d-m-Y");
  $time = date("H:i");

//verify if empty
  if (empty($goal) || empty($weight) || empty($height)) {
    header("Location: ../home.php?e=Please Input all Fields.");
    $goal = true;
    $weight = true;
    $height = true;
    
  }
  else {
      //check data presence
      $bmi_availability = $user->GetBmi($id,$goal);
      if ($bmi_availability == 0) {
        $bmi_data = $user->Bmi($id, $goal, $weight, $height ,$ip_address, $time, $date);
        if ($bmi_data == 1) {
          $create_session = $user->user_session_data($id);
            header("Location: ../info?s=Data Successfully Saved.");
      
            exit();
          }
      }
      else {
        $create_session = $user->user_session_data($id);
        header("Location: ../info?e=We have your Data Already!!.");
        exit();
      }
  }

}
?>