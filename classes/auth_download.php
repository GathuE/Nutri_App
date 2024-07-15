<?php
error_reporting(E_ALL & E_NOTICE);
if (isset($_POST['submit'])) {

  include 'users.class.php';
  $user = new ManageUsers();
// CAPTURE USER INPUT

$key = $_POST['authkey'];
$id = $_SESSION['ID'];

if (empty($key)) {
    header("Location: ../downloads.php?e=All fields are required.");
    exit();
  } 

  else {
            $check_downloads = $user->Checkdownloads($id, $key);
            if ($check_downloads == 1){
                //$verification = create_verification($id, $key);
                header("Location: ../myfiles.php?s=Authentication Key Verified!!.");
                exit();
                }
            elseif($check_downloads == 0)
            {
                header("Location: ../downloads.php?e=Incorrect Authentication Key!!.");
                exit();
            }
   
  }

}
?>