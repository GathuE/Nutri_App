<?php
error_reporting(0);
if (isset($_POST['save_bmi'])) {

  include 'users.class.php';
  $user = new ManageUsers();

  $id = $_SESSION['ID'];
  $bmivalue = $_POST['bmivalue'];
  $bmiclass = $_POST['bmiclass'];
  $lowerweightrange = $_POST['lowerweightrange'];
  $upperweightrange =  $_POST['upperweightrange'];
  $lowertimerange = $_POST['lowertimerange'];
  $uppertimerange = $_POST['uppertimerange'];
  $ip_address = $_SERVER['REMOTE_ADDR'];
  $date = date("d-m-Y");
  $time = date("H:i");

  //check data presence
  $bmi_availability = $user->Getdata($id);
  if ($bmi_availability == 0) {
  $save_bmi = $user->savebmidata($id, $bmivalue, $bmiclass, $lowerweightrange, $upperweightrange, $lowertimerange, $uppertimerange, $ip_address, $time, $date);
      if ($save_bmi == 1) {
        header("Location: ../eer?s=Your Data has been Successfully Saved.");
        exit();
      }
     else {
      header("Location: ../referencedata?e=Could Not Save your Data!Please try Again!.");
      exit();
    }
  }
  else {
    header("Location: ../eer?e=Your Data is Already Saved!.");
    exit();
  }
}


?>