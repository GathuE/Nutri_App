<?php
error_reporting(0);
if (isset($_POST['recover'])) {

  include 'users.class.php';
  $user = new ManageUsers();

  $email = $_POST['email'];
  $question = $_POST['question'];
  $answer = md5($_POST['answer']);

  if (empty($email) || empty($question) || empty($answer) ) {
    header("Location: ../recover?e=All fields are required.");
    exit();
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../recover?e=Email is not valid.");
    exit();
  } else {
    $login_user = $user->Recover($email, $question, $answer);
    if ($login_user == 1) {
      $create_session = $user->create_session($email);
      header("Location: ../new_password?s=Details Verified.Please Input New Password");
      exit();
    } else {
      header("Location: ../recover?e=Incorrect Details Provided.");
      exit();
    }
  }
}
 ?>
