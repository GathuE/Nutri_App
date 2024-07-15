<?php 
error_reporting(0);
if (isset($_POST['new_password'])) {
    new_password();
  }

  function new_password() {

    include 'users.class.php';
    $user = new ManageUsers();
  
    $id = $_SESSION['ID'];
    $password = $_POST['password'];
    $password_repeat = $_POST['password_repeat'];
  
    if (empty($password) || empty($password_repeat)) {
      header("Location: ../new_password?ep=All fields are required.");
      exit();
    } else {
      $password = md5($password);
      $password_repeat = md5($password_repeat);
        if ($password === $password_repeat) {
            $change_password = $user->new_password($password);
            if ($change_password == 1) {
                session_unset();
                session_destroy();
                header("Location: ../login.php?sp=Password successfully changed.Please Log In.");
                exit();
            }
            else {
                header("Location: ../details.php?ep=An error occured. Please try again later.");
                exit();
              }
        }
        else {
            header("Location: ../new_password.php?ep=New passwords do not match.");
            exit();
          }
    }
  }

?>