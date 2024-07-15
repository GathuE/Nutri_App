<?php
session_start();
error_reporting(0);
ini_set('display_errors', 1);
if (isset($_POST['login'])) {
  include 'users.class.php';
  $user = new ManageUsers();

  $email = $_POST['email'];
  $password = md5($_POST['password']);

  if (empty($email) || empty($password)) {
    header("Location: ../login?e=All fields are required.");
    exit();
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../login?e=Email is not valid.");
    exit();
  } else {
    $check_status = $user->Checkstatus($email, $password);
    $check_firststatus = $user->Checkfirststatus($email, $password);
    $check_secondstatus = $user->Checksecondstatus($email, $password);
    $check_finalstatus = $user->Checkfinalstatus($email, $password);

    if ($check_status == 1 && $check_firststatus == 0 && $check_secondstatus == 0 && $check_finalstatus == 0){
      $login_user = $user->Login($email, $password);
      if ($login_user == 1) {
        $create_session = $user->create_session($email);
        header("Location: ../home?s=Successfully logged in.");
        exit();
      } else {
        header("Location: ../login?e=Incorrect Login Details!.");
        exit();
      }
    }
    elseif($check_status == 0 && $check_firststatus == 1 && $check_secondstatus == 0 && $check_finalstatus == 0)
    {
      $login_user = $user->Login($email, $password);
      if ($login_user == 1) {
        $create_session = $user->create_session($email);
        header("Location: ../waiting?s=Your Payment has not been Verified Yet!!.");
        exit();
      } else {
        header("Location: ../login?e=Incorrect Login Details!.");
        exit();
      }
    }
    elseif($check_status == 0 && $check_firststatus == 0 && $check_secondstatus == 1 && $check_finalstatus == 0)
    {
      $surveydata_check = $user->Beverages_check($id);
      if($surveydata_check == 1){
        $login_user = $user->Login($email, $password);
        if ($login_user == 1) {
          $create_session = $user->create_session($email);
          header("Location: ../success?s=You Have an Existing Goal in Progress!!.");
          exit();
        } else {
          header("Location: ../login?e=Incorrect Login Details!.");
          exit();
        }
      }
      elseif($surveydata_check == 0){
        $login_user = $user->Login($email, $password);
        if ($login_user == 1) {
          $create_session = $user->create_session($email);
          header("Location: ../proceedsurvey?s=Please Complete filling the Information Below!!.");
          exit();
        } else {
          header("Location: ../login?e=Incorrect Login Details!.");
          exit();
        }

      }
    }
    elseif($check_status == 0 && $check_firststatus == 0 && $check_secondstatus == 0 && $check_finalstatus == 1)
    {
     
        $login_user = $user->Login($email, $password);
        if ($login_user == 1) {
          $create_session = $user->create_session($email);
          header("Location: ../success?s=You Have an Existing Goal in Progress!!.");
          exit();
        } else {
          header("Location: ../login?e=Incorrect Login Details!.");
          exit();
        }
      
    }

    else{
      header("Location: ../login?e=Incorrect Login Details!.");
          exit();
    }

   
    
  }
}

