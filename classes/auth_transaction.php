<?php
error_reporting(E_ALL & E_NOTICE);
if (isset($_POST['submit'])) {

  include 'users.class.php';
  $user = new ManageUsers();
// CAPTURE USER INPUT

$key = $_POST['authkey'];
$id = $_SESSION['ID'];

if (empty($key)) {
    header("Location: ../verifypayment?e=Please enter Transaction Code!!");
    exit();
  } 

  else {
            $check_code = $user->CheckCode($id,$key);
            if ($check_code == 1){
                $status_change =  $user->status_update($id);
                    header("Location: ../proceedsurvey?s=Payment Successfully Verified!!.");
                    exit();
                      
                }
            elseif($check_code == 0)
            {
                header("Location: ../waiting?e=We have not Confirmed your Payment Yet!!.");
                exit();
            }
   
  }

}
?>