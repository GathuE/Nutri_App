<?php
error_reporting(0);
if (isset($_POST['register'])) {

  include 'users.class.php';
  $user = new ManageUsers();

  $status = $_POST['status'];
  $username = $_POST['username'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $password_repeat = md5($_POST['password_repeat']);
  $question = $_POST['question'];
  $answer = md5($_POST['answer']);
  $terms = $_POST['terms'];
  $ip_address = $_SERVER['REMOTE_ADDR'];
  $date = date("d-m-Y");
  $time = date("H:i");

  if (empty($username) || empty($phone)  || empty($email) || empty($password) || empty($password_repeat) || empty($question) || empty($answer) || empty($terms)) {
    header("Location: ../register?e=All fields are required.");
    exit();
  } elseif ($password !== $password_repeat) {
    header("Location: ../register?e=Passwords do not match.");
    exit();
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../register?e=Please enter a valid email.");
    exit();
  } else {
    $username_availability = $user->GetUserInfo($username,$email);
    if ($username_availability == 0) {
      $register_user = $user->Register( $status, $username, $phone, $password, $email, $question, $answer, $terms, $ip_address, $time, $date);
      if ($register_user == 1) {
        header("Location: ../login?s=Successfully registered, login now.");
        exit();
      }
    } else {
      header("Location: ../login?e=A similar user Exists.Please Login.");
      exit();
    }
  }
}
 ?>
