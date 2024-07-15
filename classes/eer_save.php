<?php
error_reporting(0);
if (isset($_POST['eer'])) {

  include 'users.class.php';
  $user = new ManageUsers();

  $id = $_SESSION['ID'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $pregnant = $_POST['pregnant'];
  $lactating = $_POST['lactating'];
  $pal = $_POST['pal'];
  $eer = $_POST['eer'];
  $protein = $_POST['protein'];
  $fat = $_POST['fat'];
  $carbohydrate = $_POST['carbohydrate'];
  $water = $_POST['water'];
  $fibre = $_POST['fibre'];
  $calcium = $_POST['calcium'];
  $iron = $_POST['iron'];
  $magnesium = $_POST['magnesium'];
  $phosphorous = $_POST['phosphorous'];
  $potassium = $_POST['potassium'];
  $sodium = $_POST['sodium'];
  $zinc = $_POST['zinc'];
  $sellenium = $_POST['sellenium'];
  $vitarae = $_POST['vitarae'];
  $vitare = $_POST['vitare'];
  $retinol = $_POST['retinol'];
  $bcarotene = $_POST['bcarotene'];
  $thiamin = $_POST['thiamin'];
  $riboflavin = $_POST['riboflavin'];
  $niacin = $_POST['niacin'];
  $dietaryfolate = $_POST['dietaryfolate'];
  $foodfolate = $_POST['foodfolate'];
  $vitb12 = $_POST['vitb12'];
  $vitc = $_POST['vitc'];
  $cholestrol = $_POST['cholestrol'];
  $oxalicacid = $_POST['oxalicacid'];
  $phytate = $_POST['phytate'];
  
  $ip_address = $_SERVER['REMOTE_ADDR'];
  $date = date("d-m-Y");
  $time = date("H:i");

      //check data presence
      $eer_availability = $user->CheckEER($id);
      if ($eer_availability == 0) {
        $eer_data = $user->SaveEER($id, $age, $gender, $pregnant, $lactating, $pal, $eer, $protein, $fat, $carbohydrate, $water, $fibre, $calcium, $iron, $magnesium, $phosphorous, $potassium, $sodium, $zinc, $sellenium, $vitarae, $vitare, $retinol, $bcarotene, $thiamin, $riboflavin, $niacin, $dietaryfolate, $foodfolate, $vitb12, $vitc, $cholestrol, $oxalicacid, $phytate ,$ip_address, $time, $date);
        //$status_change = $user->Changestatus($id);
        if ($eer_data == 1) {
            $create_data_session = $user->session_bio_data($id);
            $user_data = $user->user_session_data($id);
            header("Location: ../paymentplans?s=Data Successfully Saved.");
            exit();
          }
      }
      else {
        header("Location: ../paymentplans?e=We have your Data Already!!.");
        exit();
      }
 

}
?>