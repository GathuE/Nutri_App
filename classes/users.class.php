<?php
  session_start();
  error_reporting(E_ALL & E_NOTICE);

  // Set timezone
  date_default_timezone_set('Africa/Nairobi');
  
  include_once 'db.class.php';

  class ManageUsers {
    public $dbh;

    function __construct() {
      $db_connection = new Dbh;
      $this->dbh = $db_connection->connect();
      return $this->dbh;
    }

    function Register($status, $username, $phone, $password, $email, $question, $answer, $terms, $ip_address, $time, $date) {
      $query = $this->dbh->prepare("INSERT INTO users (status, username, phonenumber, password, email, question, answer, terms, ip_address, time, date) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
      $values = array( $status, $username, $phone, $password, $email, $question, $answer, $terms, $ip_address, $time, $date);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      return $resultCheck;
    }

    function Login($email, $password) {
      $query = $this->dbh->prepare("SELECT * FROM users WHERE email=? AND password=?");
      $values = array($email, $password);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      return $resultCheck;
    }

    function Recover($email, $question, $answer) {
      $query = $this->dbh->prepare("SELECT * FROM users WHERE email=? AND question=? AND answer=?");
      $values = array($email, $question, $answer);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      return $resultCheck;
    }

    function Update($username, $email) {
      $id = $_SESSION['ID'];
      $query = $this->dbh->prepare("UPDATE users SET username=?, email=? WHERE ID = $id;");
      $values = array($username, $email);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      return $resultCheck;
    }

    function Changestatus($id){
      $id = $_SESSION['ID'];
      $query = $this->dbh->prepare("UPDATE users SET status='1' WHERE ID = $id;");
      $values = array($id);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      return $resultCheck;
    }
    function ChangeUserStatus($id){
      $id = $_SESSION['ID'];
      $query = $this->dbh->prepare("UPDATE users SET status='0' WHERE ID = $id;");
      $values = array($id);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      return $resultCheck;
    }

    function Checkstatus($email, $password){
      $query = $this->dbh->prepare("SELECT * FROM users WHERE email=? AND password=? AND status ='0'");
      $values = array($email, $password);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      return $resultCheck;

    }
    function Checkfirststatus($email, $password){
      $query = $this->dbh->prepare("SELECT * FROM users WHERE email=? AND password=? AND status ='1'");
      $values = array($email, $password);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      return $resultCheck;

    }
    function Checksecondstatus($email, $password){
      $query = $this->dbh->prepare("SELECT * FROM users WHERE email=? AND password=? AND status ='2'");
      $values = array($email, $password);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      return $resultCheck;

    }
    function Checkfinalstatus($email, $password){
      $query = $this->dbh->prepare("SELECT * FROM users WHERE email=? AND password=? AND status ='3'");
      $values = array($email, $password);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      return $resultCheck;

    }
    function Checkdownloads($id, $key){
      $query = $this->dbh->prepare("SELECT * FROM auth_key WHERE user_id=? AND auth_code=?");
      $values = array($id, $key);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      return $resultCheck;

    }
    function CheckCode($id,$key){
      $query = $this->dbh->prepare("SELECT mpesa_code FROM payment_data WHERE user_code=? AND mpesa_code=?");
      $values = array($id, $key);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      return $resultCheck;

    }
    function status_update($id){
      $id = $_SESSION['ID'];
      $query = $this->dbh->prepare("UPDATE users SET status='2' WHERE ID = $id;");
      $values = array($id);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      return $resultCheck;
    }
    function finalstatus_update($id){
      $id = $_SESSION['ID'];
      $query = $this->dbh->prepare("UPDATE users SET status='3' WHERE ID = $id;");
      $values = array($id);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      return $resultCheck;
    }

    function check_password($old_password) {
      $id = $_SESSION['ID'];
      $query = $this->dbh->query("SELECT password FROM users WHERE ID='$id'");
      $results = $query->fetch();
      $password = $results['password'];
      if ($password === $old_password) {
        $result = 1;
        return $result;
      } else {
        $result = 0;
        return $result;
      }
    }
    function change_password($password) {
      $id = $_SESSION['ID'];
      $query = $this->dbh->prepare("UPDATE users SET password=? WHERE ID = $id;");
      $values = array($password);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      return $resultCheck;
    }
    function new_password($password) {
      $id = $_SESSION['ID'];
      $query = $this->dbh->prepare("UPDATE users SET password=? WHERE ID = $id;");
      $values = array($password);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      return $resultCheck;
    }
    

    function get_details($username) {
      $query = $this->dbh->query("SELECT * FROM users WHERE username='$username'");
      $results = $query->fetch();
      return $results;
    }

    function GetUserInfo($username,$email) {
      $query = $this->dbh->prepare("SELECT * FROM users WHERE username=? AND email=?");
      $values = array($username,$email);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      if ($resultCheck == 1) {
        $result = $query->fetchAll();
        return $result;
      } else {
        return $resultCheck;
      }
    }

    function create_session($email) {
      $query = $this->dbh->query("SELECT * FROM users WHERE email='$email'");
      $user = $query->fetch();
      $_SESSION['ID'] = $user['ID'];
      $_SESSION['username'] = $user['username'];
      $_SESSION['email'] = $user['email'];
      $_SESSION['logged_in'] = 1;
    }

    //create session reference user_data
    function user_session_data($id) {
      $query = $this->dbh->query("SELECT * FROM bmi_data WHERE user_ID='$id'");
      $user = $query->fetch();
      $_SESSION['ID'] = $user['user_ID'];
      $_SESSION['goal'] = $user['goal'];
      $_SESSION['weight'] = $user['weight'];
      $_SESSION['height'] = $user['height'];
      $_SESSION['logged_in'] = 1;
    }
  //create session reference user_data
  function session_bio_data($id) {
    $query = $this->dbh->query("SELECT * FROM goal_guide WHERE client_ID='$id'");
    $user = $query->fetch();
    $_SESSION['ID'] = $user['client_ID'];
    $_SESSION['targetweight'] = $user['targetweight'];
    $_SESSION['routine'] = $user['routine'];
    $_SESSION['workout'] = $user['workout'];
    $_SESSION['logged_in'] = 1;
  }

    function create_verification($id, $key) {
      $query = $this->dbh->query("SELECT * FROM auth_key WHERE user_id='$id' AND auth_code='$key'");
      $user = $query->fetch();
      $_SESSION['ID'] = $user['ID'];
      $_SESSION['logged_in'] = 1;
      $_SESSION['verified'] = 1;
    }
    

    //Record user BMI DATA
    //check availability first
    function GetBmi($id) {
      $query = $this->dbh->prepare("SELECT * FROM bmi_data WHERE user_ID=?");
      $values = array($id);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      if ($resultCheck == 1) {
        $result = $query->fetchAll();
        return $result;
      } else {
        return $resultCheck;
      }
    }
    function Bmi($id, $goal, $weight, $height ,$ip_address, $time, $date) {
      $query = $this->dbh->prepare("INSERT INTO bmi_data (user_ID, goal, weight, height, ip_address, time, date) VALUES (?,?,?,?,?,?,?)");
      $values = array($id, $goal, $weight, $height ,$ip_address, $time ,$date);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      return $resultCheck;
    }



   //check user availability for document downloads
   function Getuserdata($id) {
    $query = $this->dbh->prepare("SELECT * FROM users WHERE ID=?");
    $values = array($id);
    $query->execute($values);
    $resultCheck = $query->rowCount();
    if ($resultCheck == 1) {
      $result = $query->fetchAll();
      return $result;
    } else {
      return $resultCheck;
    }
  }
//Record user FORM DATA
    // A. Check  availability first

    // 1. GOAL GUIDE
    function Goalguide($id) {
      $query = $this->dbh->prepare("SELECT * FROM goal_guide WHERE client_ID=?");
      $values = array($id);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      if ($resultCheck == 1) {
        $result = $query->fetchAll();
        return $result;
      } else {
        return $resultCheck;
      }
    }
    // 2. ALLERGIES
    function Allergies_check($id) {
      $query = $this->dbh->prepare("SELECT * FROM allergies WHERE clientid=?");
      $values = array($id);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      if ($resultCheck == 1) {
        $result = $query->fetchAll();
        return $result;
      } else {
        return $resultCheck;
      }
    }
    // 3. HABITS
    function Habits_check($id) {
      $query = $this->dbh->prepare("SELECT * FROM feeding_habits WHERE client_id=?");
      $values = array($id);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      if ($resultCheck == 1) {
        $result = $query->fetchAll();
        return $result;
      } else {
        return $resultCheck;
      }
    }
    // 4. UJI PREFERENCE
    function Uji_check($id) {
      $query = $this->dbh->prepare("SELECT * FROM uji_preference WHERE id_client=?");
      $values = array($id);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      if ($resultCheck == 1) {
        $result = $query->fetchAll();
        return $result;
      } else {
        return $resultCheck;
      }
    }
     // 5. UGALI PREFERENCE
     function Ugali_check($id) {
      $query = $this->dbh->prepare("SELECT * FROM ugali_preference WHERE user_id=?");
      $values = array($id);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      if ($resultCheck == 1) {
        $result = $query->fetchAll();
        return $result;
      } else {
        return $resultCheck;
      }
    }
     // 6. WHEATFOODS PREFERENCE
     function Wheatfoods_check($id) {
      $query = $this->dbh->prepare("SELECT * FROM wheatfoods_preference WHERE client_code=?");
      $values = array($id);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      if ($resultCheck == 1) {
        $result = $query->fetchAll();
        return $result;
      } else {
        return $resultCheck;
      }
    }
     // 7. BAKEDFOODS PREFERENCE
     function Bakedfoods_check($id) {
      $query = $this->dbh->prepare("SELECT * FROM bakedfoods_preference WHERE clientcode=?");
      $values = array($id);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      if ($resultCheck == 1) {
        $result = $query->fetchAll();
        return $result;
      } else {
        return $resultCheck;
      }
    }
     // 8. RICEFOODS PREFERENCE
     function Ricefoods_check($id) {
      $query = $this->dbh->prepare("SELECT * FROM ricefoods_preference WHERE client=?");
      $values = array($id);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      if ($resultCheck == 1) {
        $result = $query->fetchAll();
        return $result;
      } else {
        return $resultCheck;
      }
    }
     // 9. MASHEDFOODS PREFERENCE
     function Mashedfoods_check($id) {
      $query = $this->dbh->prepare("SELECT * FROM mashedfoods_preference WHERE user=?");
      $values = array($id);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      if ($resultCheck == 1) {
        $result = $query->fetchAll();
        return $result;
      } else {
        return $resultCheck;
      }
    }
     // 10. LEGUMES PREFERENCE
     function Legumes_check($id) {
      $query = $this->dbh->prepare("SELECT * FROM legumes_preference WHERE usercode=?");
      $values = array($id);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      if ($resultCheck == 1) {
        $result = $query->fetchAll();
        return $result;
      } else {
        return $resultCheck;
      }
    }
     // 11. FRUITS PREFERENCE
     function Fruits_check($id) {
      $query = $this->dbh->prepare("SELECT * FROM fruits_preference WHERE user_code=?");
      $values = array($id);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      if ($resultCheck == 1) {
        $result = $query->fetchAll();
        return $result;
      } else {
        return $resultCheck;
      }
    }
     // 12. VEGETABLES PREFERENCE
     function Vegetable_check($id) {
      $query = $this->dbh->prepare("SELECT * FROM vegetable_preference WHERE ref_id=?");
      $values = array($id);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      if ($resultCheck == 1) {
        $result = $query->fetchAll();
        return $result;
      } else {
        return $resultCheck;
      }
    }
     // 13. TUBERS PREFERENCE
     function Tubers_check($id) {
      $query = $this->dbh->prepare("SELECT * FROM tubers_preference WHERE ref=?");
      $values = array($id);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      if ($resultCheck == 1) {
        $result = $query->fetchAll();
        return $result;
      } else {
        return $resultCheck;
      }
    }
     // 14. ANIMALPRODUCTS PREFERENCE
     function Animalproducts_check($id) {
      $query = $this->dbh->prepare("SELECT * FROM animalproducts_preference WHERE ref_code=?");
      $values = array($id);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      if ($resultCheck == 1) {
        $result = $query->fetchAll();
        return $result;
      } else {
        return $resultCheck;
      }
    }
     // 15. BEVERAGES PREFERENCE
     function Beverages_check($id) {
      $query = $this->dbh->prepare("SELECT * FROM beverages_preference WHERE ref_client=?");
      $values = array($id);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      if ($resultCheck == 1) {
        $result = $query->fetchAll();
        return $result;
      } else {
        return $resultCheck;
      }
    }
    // 16. MEALPLAN HISTORY
    function Plan_check($id) {
      $query = $this->dbh->prepare("SELECT * FROM plan_history WHERE client_number=?");
      $values = array($id);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      if ($resultCheck == 1) {
        $result = $query->fetchAll();
        return $result;
      } else {
        return $resultCheck;
      }
    }
    // B.  Record into Respective Databases
    // 1. Goal Guide
    function guide($id, $goal, $currentweight, $targetweight, $routine, $workout, $ip_address, $time, $date) {
      $query = $this->dbh->prepare("INSERT INTO goal_guide (client_ID, goal, currentweight, targetweight, routine, workout, ip_address, time, date) VALUES (?,?,?,?,?,?,?,?,?)");
      $values = array($id, $goal, $currentweight, $targetweight, $routine, $workout, $ip_address, $time, $date);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      return $resultCheck;
    }
   
    // 2. Allergies
    function allergies($id, $lactose, $gluten, $vegan, $vegeterian, $noallergy, $ip_address, $time, $date) {
      $query = $this->dbh->prepare("INSERT INTO allergies (clientid, lactose, gluten, vegan, vegeterian, no_allergy, ip_address, time, date) VALUES (?,?,?,?,?,?,?,?,?)");
      $values = array($id, $lactose, $gluten, $vegan, $vegeterian, $noallergy, $ip_address, $time, $date);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      return $resultCheck;
    }

    // 3. Habits
    function habits($id, $leftovers, $roastedmeat, $softdrinks, $sweets, $salt, $latesupper, $skiplunch, $alcoholic, $ocassional, $nohabit, $waterintake, $mealscount, $ip_address, $time, $date) {
      $query = $this->dbh->prepare("INSERT INTO feeding_habits (client_id, leftovers, roastedmeat, softdrinks, sweets, salt, latesupper, skiplunch, alcoholic, ocassional_alcoholic, no_habit, waterintake, mealscount, ip_address, time, date) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
      $values = array($id, $leftovers, $roastedmeat, $softdrinks, $sweets, $salt, $latesupper, $skiplunch, $alcoholic, $ocassional, $nohabit, $waterintake, $mealscount, $ip_address, $time, $date);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      return $resultCheck;
    }

    // 4. Uji Preference
    function uji($id, $ujiwawimbi, $ujiwamahindi, $ujispecial, $ujispecial2, $ujiwamuhogo, $ujiwamawele, $fbf, $ujiwamchele, $ujiwangano, $oatporridge, $oatmeal, $ujispecial3, $ujispecial4, $nouji, $ip_address, $time, $date) {
      $query = $this->dbh->prepare("INSERT INTO uji_preference (id_client, ujiwimbi, ujimahindi, ujispecial,ujispecial2, ujimuhogo, ujimawele, fbf, ujimchele,ujingano, oatporridge, oatmeal, ujispecial3, ujispecial4,no_uji, ip_address, time, date) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
      $values = array($id, $ujiwawimbi, $ujiwamahindi, $ujispecial, $ujispecial2, $ujiwamuhogo, $ujiwamawele, $fbf, $ujiwamchele, $ujiwangano, $oatporridge, $oatmeal, $ujispecial3, $ujispecial4, $nouji, $ip_address, $time, $date);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      return $resultCheck;
    }
     // 5. Ugali Preference
     function ugali($id, $wholemaize, $ugalispecial1, $ugalispecial2,  $ugalispecial3,  $ugalispecial4,  $ugalispecial5,  $ugalispecial6,  $ugalispecial7,  $ugalispecial8,  $ugalispecial9, $nougali,  $ip_address, $time, $date) {
      $query = $this->dbh->prepare("INSERT INTO ugali_preference (user_id, wholemaize, ugalispecial1, ugalispecial2, ugalispecial3, ugalispecial4, ugalispecial5, ugalispecial6, ugalispecial7, ugalispecial8, ugalispecial9, no_ugali, ip_address, time, date) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
      $values = array($id, $wholemaize, $ugalispecial1, $ugalispecial2,  $ugalispecial3,  $ugalispecial4,  $ugalispecial5,  $ugalispecial6,  $ugalispecial7,  $ugalispecial8,  $ugalispecial9, $nougali,  $ip_address, $time, $date);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      return $resultCheck;
    }
    // 6. Wheat Preference
    function wheat($id, $mandazi, $kaimati, $scones, $mahamri, $qita, $pizza, $bhature, $splitdal, $roti, $chapatiwhite, $chapatibrown, $pancakes, $nowheatfoods, $ip_address, $time, $date) {
      $query = $this->dbh->prepare("INSERT INTO wheatfoods_preference (client_code, mandazi, kaimati, scones, mahamri, qita, pizza, bhature, splitdal, roti, chapatiwhite, chapatibrown, pancakes, nowheat_foods, ip_address, time, date) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
      $values = array($id, $mandazi, $kaimati, $scones, $mahamri, $qita, $pizza, $bhature, $splitdal, $roti, $chapatiwhite, $chapatibrown, $pancakes, $nowheatfoods, $ip_address, $time, $date);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      return $resultCheck;
    }
    // 7. Baked Preference
    function baked($id, $whitebread, $brownbread, $sweetbread, $sweetbiscuits, $biscuitsavoury, $weetabix, $cornflakes, $buns, $cupcakes, $fruitcakes, $spongecakes, $icedcakes, $cookies, $nobakedfoods, $ip_address, $time, $date) {
      $query = $this->dbh->prepare("INSERT INTO bakedfoods_preference (clientcode, whitebread, brownbread, sweetbread, sweetbiscuits, biscuitsavoury, weetabix, cornflakes, buns, cupcakes, fruitcakes, spongecakes, icedcakes, cookies, nobaked_foods, ip_address, time, date) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
      $values = array($id, $whitebread, $brownbread, $sweetbread, $sweetbiscuits, $biscuitsavoury, $weetabix, $cornflakes, $buns, $cupcakes, $fruitcakes, $spongecakes, $icedcakes, $cookies, $nobakedfoods, $ip_address, $time, $date);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      return $resultCheck;
    }
     // 8. Rice Preference
     function rice($id, $pilau, $boiledrice, $biryani, $friedrice, $ricespecial1, $ricespecial2, $ricespecial3, $steamedrice, $ricespecial4, $macaroni, $spaghetti, $noricefoods, $ip_address, $time, $date) {
      $query = $this->dbh->prepare("INSERT INTO ricefoods_preference (client, pilau, boiledrice, biryani, friedrice, ricespecial1, ricespecial2, ricespecial3, steamedrice, ricespecial4, macaroni, spaghetti, norice_foods, ip_address, time, date) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
      $values = array($id, $pilau, $boiledrice, $biryani, $friedrice, $ricespecial1, $ricespecial2, $ricespecial3, $steamedrice, $ricespecial4, $macaroni, $spaghetti, $noricefoods, $ip_address, $time, $date);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      return $resultCheck;
    }
    // 9. Mashed Preference
    function mashed($id, $mukimo1, $mukimo2, $mukimo3, $mukimo4, $mashedpotatoes, $mashedbananas, $kimanga, $mukimo5, $ndoto, $nzenga, $kimanga2, $kimito, $nyenyi, $githeri, $githeri2, $nomashedfoods, $ip_address, $time, $date) {
      $query = $this->dbh->prepare("INSERT INTO mashedfoods_preference (user, mukimo1, mukimo2, mukimo3, mukimo4, mashedpotatoes, mashedbananas, kimanga, mukimo5, ndoto, nzenga, kimanga2, kimito, nyenyi, githeri, githeri2, nomashed_foods, ip_address, time, date) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
      $values = array($id, $mukimo1, $mukimo2, $mukimo3, $mukimo4, $mashedpotatoes, $mashedbananas, $kimanga, $mukimo5, $ndoto, $nzenga, $kimanga2, $kimito, $nyenyi, $githeri, $githeri2, $nomashedfoods, $ip_address, $time, $date);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      return $resultCheck;
    }
    // 10. Legumes Preference
    function legumes($id, $ndengu, $maharagwe, $kamande, $pigeonstew, $peasstew, $chickpeas, $blackbeans, $nolegumes, $ip_address, $time, $date) {
      $query = $this->dbh->prepare("INSERT INTO legumes_preference (usercode, ndengu, maharagwe, kamande, pigeon, pea, chickpeas, blackbeans, no_legumes,  ip_address, time, date) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
      $values = array($id, $ndengu, $maharagwe, $kamande, $pigeonstew, $peasstew, $chickpeas, $blackbeans, $nolegumes, $ip_address, $time, $date);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      return $resultCheck;
    }
    // 11. Fruits Preference
    function fruits($id, $melon, $treetomato, $tangerine, $strawberries, $plums, $pineapple, $pear, $peach, $passion, $pawpaw, $orange, $mulberry, $mango, $lime, $lemon, $loquat, $jackfruit, $guava, $grapes, $doupalm, $dates, $custard, $baobab, $banana, $avocado, $apple, $zambarau, $passionjiuce, $nofruits,  $ip_address, $time, $date) {
      $query = $this->dbh->prepare("INSERT INTO fruits_preference (user_code, melon, treetomato, tangerine, strawberries, plums, pineapple, pear, peach, passion, pawpaw, orange, mulberry, mango, lime, lemon, loquat, jackfruit, guava, grapes, doupalm, dates, custard, baobab, banana, avocado, apple, zambarau, passionjuice, no_fruits,  ip_address, time, date) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
      $values = array($id, $melon, $treetomato, $tangerine, $strawberries, $plums, $pineapple, $pear, $peach, $passion, $pawpaw, $orange, $mulberry, $mango, $lime, $lemon, $loquat, $jackfruit, $guava, $grapes, $doupalm, $dates, $custard, $baobab, $banana, $avocado, $apple, $zambarau, $passionjiuce, $nofruits,  $ip_address, $time, $date);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      return $resultCheck;
    }
    // 12. Vegetable Preference
    function vegetable($id, $sukumawiki, $cabbage, $terere, $spinach, $thabai, $pumpkinleaves, $cowpeasleaves, $vinespinach, $stewedkunde, $veges1, $veges2, $broccoli, $veges3, $obwoba, $veges4, $veges5, $novegetablefoods, $ip_address, $time, $date) {
      $query = $this->dbh->prepare("INSERT INTO vegetable_preference (ref_id, sukumawiki, cabbage, terere, spinach, thabai, pumpkinleaves, cowpeasleaves, vinespinach, stewedkunde, veges1, veges2, broccoli, veges3, obwoba, veges4, veges5, novegetable_foods, ip_address, time, date) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
      $values = array($id, $sukumawiki, $cabbage, $terere, $spinach, $thabai, $pumpkinleaves, $cowpeasleaves, $vinespinach, $stewedkunde, $veges1, $veges2, $broccoli, $veges3, $obwoba, $veges4, $veges5, $novegetablefoods, $ip_address, $time, $date);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      return $resultCheck;
    }

    // 13.  Tubers Preference
    function tubers($id, $yamstew, $tuber1, $tuber2, $tuber3, $tuber4, $mushenye, $nduma, $boiledcassava, $tuber5, $tuber6, $tuber7, $tuber8, $notuberfoods, $ip_address, $time, $date) {
      $query = $this->dbh->prepare("INSERT INTO tubers_preference (ref, yamstew, tuber1, tuber2, tuber3, tuber4, mushenye, nduma, boiledcassava, tuber5, tuber6, tuber7, tuber8, notuber_foods, ip_address, time, date) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
      $values = array($id, $yamstew, $tuber1, $tuber2, $tuber3, $tuber4, $mushenye, $nduma, $boiledcassava, $tuber5, $tuber6, $tuber7, $tuber8, $notuberfoods, $ip_address, $time, $date);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      return $resultCheck;
    }

    // 14. Animal Products Preference
    function animal($id, $beef, $goatmeat, $mutton, $camelmeat, $fish, $omena, $chicken, $mincedmeat, $guineafowl, $quail, $eggs, $eggtoast, $samosa, $sausages, $omelette, $okra, $pork, $rabbit, $cheese, $ghee, $honey, $beefbroth, $nomeatfoods, $ip_address, $time, $date) {
      $query = $this->dbh->prepare("INSERT INTO animalproducts_preference (ref_code, beef, goatmeat, mutton, camelmeat, fish, omena, chicken, mincedmeat, guineafowl, quail, eggs, eggtoast, samosa, sausages, omelette, okra, pork, rabbit, cheese, ghee, honey, beefbroth, noanimal_products,  ip_address, time, date) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
      $values = array($id, $beef, $goatmeat, $mutton, $camelmeat, $fish, $omena, $chicken, $mincedmeat, $guineafowl, $quail, $eggs, $eggtoast, $samosa, $sausages, $omelette, $okra, $pork, $rabbit, $cheese, $ghee, $honey, $beefbroth, $nomeatfoods, $ip_address, $time, $date);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      return $resultCheck;
    }
    // 15. Beverages Preference
    function beverages($id, $chai, $whitecoffee, $whitechocolate, $icecream, $cowmilk, $camelmilk, $maziwamala, $yoghurt, $sugarcanejuice, $water, $wine, $energydrinks, $beer, $fruitjuice, $skimmedmilk, $nobeverages, $ip_address, $time, $date) {
      $query = $this->dbh->prepare("INSERT INTO beverages_preference (ref_client, chai, whitecoffee, whitechocolate, icecream, cowmilk, camelmilk, maziwamala, yoghurt, sugarcanejuice, water, wine, energydrinks, beer, fruitjuice, skimmedmilk, no_beverages, ip_address, time, date) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
      $values = array($id, $chai, $whitecoffee, $whitechocolate, $icecream, $cowmilk, $camelmilk, $maziwamala, $yoghurt, $sugarcanejuice, $water, $wine, $energydrinks, $beer, $fruitjuice, $skimmedmilk, $nobeverages, $ip_address, $time, $date);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      return $resultCheck;
    }
    //16. Meal Guide
    function planhistory($id, $mealplan, $success, $reason, $ip_address, $time, $date){
      $query = $this->dbh->prepare("INSERT INTO plan_history (client_number, mealplan, success, reason, ip_address, time, date) VALUES (?,?,?,?,?,?,?)");
      $values = array($id, $mealplan, $success, $reason, $ip_address, $time, $date);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      return $resultCheck;
    }

    //Record user BMI 
    //check availability first
    function Getdata($id) {
      $query = $this->dbh->prepare("SELECT * FROM reference_data WHERE client_ref=?");
      $values = array($id);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      if ($resultCheck == 1) {
        $result = $query->fetchAll();
        return $result;
      } else {
        return $resultCheck;
      }
    }
    // SAVE BMI DATA
    function savebmidata($id, $bmivalue, $bmiclass, $lowerweightrange, $upperweightrange, $lowertimerange, $uppertimerange, $ip_address, $time, $date) {
      $query = $this->dbh->prepare("INSERT INTO reference_data (client_ref, bmivalue, bmiclass, lowerweightrange, upperweightrange, lowertimerange, uppertimerange, ip_address, time, date) VALUES (?,?,?,?,?,?,?,?,?,?)");
      $values = array($id, $bmivalue, $bmiclass, $lowerweightrange, $upperweightrange, $lowertimerange, $uppertimerange, $ip_address, $time, $date);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      return $resultCheck;
    }

    //Record user EER DATA
    //check availability first
    function CheckEER($id) {
      $query = $this->dbh->prepare("SELECT * FROM eer_data WHERE clientref=?");
      $values = array($id);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      if ($resultCheck == 1) {
        $result = $query->fetchAll();
        return $result;
      } else {
        return $resultCheck;
      }
    }

    // SAVE EER DATA
    function SaveEER($id, $age, $gender, $pregnant, $lactating, $pal, $eer, $protein, $fat, $carbohydrate, $water, $fibre, $calcium, $iron, $magnesium, $phosphorous, $potassium, $sodium, $zinc, $sellenium, $vitarae, $vitare, $retinol, $bcarotene, $thiamin, $riboflavin, $niacin, $dietaryfolate, $foodfolate, $vitb12, $vitc, $cholestrol, $oxalicacid, $phytate ,$ip_address, $time, $date) {
      $query = $this->dbh->prepare("INSERT INTO eer_data (clientref, age, gender, pregnant, lactating, pal, eer, protein, fat, carbohydrate, water, fibre, calcium, iron, magnesium, phosphorous, potassium, sodium, zinc, sellenium, vitarae, vitare, retinol, bcarotene, thiamin, riboflavin, niacin, dietaryfolate, foodfolate, vitb12, vitc, cholestrol, oxalicacid, phytate, ip_address, time, date) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
      $values = array($id, $age, $gender, $pregnant, $lactating, $pal, $eer, $protein, $fat, $carbohydrate, $water, $fibre, $calcium, $iron, $magnesium, $phosphorous, $potassium, $sodium, $zinc, $sellenium, $vitarae, $vitare, $retinol, $bcarotene, $thiamin, $riboflavin, $niacin, $dietaryfolate, $foodfolate, $vitb12, $vitc, $cholestrol, $oxalicacid, $phytate ,$ip_address, $time, $date);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      return $resultCheck;
    }

    //check availability first
    function CheckReplies($id,$message) {
      $query = $this->dbh->prepare("SELECT * FROM client_replies WHERE ID=? AND message=?");
      $values = array($id,$message);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      if ($resultCheck == 1) {
        $result = $query->fetchAll();
        return $result;
      } else {
        return $resultCheck;
      }
    }

    function Replymessage($id,$message,$ip_address,$date,$time){
      $query = $this->dbh->prepare("INSERT INTO client_replies (ID, message, status, ip_address, date, time) VALUES (?,?,'0',?,?,?)");
      $values = array($id, $message,$ip_address,$date, $time);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      return $resultCheck;

    }

    function MessageStatus($id){
      $query = $this->dbh->prepare("UPDATE client_messages SET status='1' WHERE ID =?;");
      $values = array($id);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      return $resultCheck;
    }


    //check availability first
    function GetPayment($id,$planid) {
      $query = $this->dbh->prepare("SELECT * FROM payment_data WHERE user_code=? AND goal=?");
      $values = array($id,$planid);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      if ($resultCheck == 1) {
        $result = $query->fetchAll();
        return $result;
      } else {
        return $resultCheck;
      }
    }

    function Payment($id, $planid, $amount, $phone ,$ip_address, $time, $date){
      $query = $this->dbh->prepare("INSERT INTO payment_data (user_code, goal, cost, phonenumber, ip_address, time, date) VALUES (?,?,?,?,?,?,?)");
      $values = array($id, $planid, $amount, $phone ,$ip_address, $time, $date);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      return $resultCheck;

    }

    //erase data for new goal selection
    function Erasebmi($id){
      $id = $_SESSION['ID'];
      $query = $this->dbh->prepare("DELETE FROM bmi_data WHERE user_ID=$id;");
      $values = array($id);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      return $resultCheck;
    }
    function Erasegoal($id){
      $id = $_SESSION['ID'];
      $query = $this->dbh->prepare("DELETE FROM goal_guide WHERE client_ID=$id;");
      $values = array($id);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      return $resultCheck;
      
    }
    function Erasereference($id){
      $id = $_SESSION['ID'];
      $query = $this->dbh->prepare("DELETE FROM reference_data WHERE client_ref=$id;");
      $values = array($id);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      return $resultCheck;
      
    }
    function EraseEer($id){
      $id = $_SESSION['ID'];
      $query = $this->dbh->prepare("DELETE FROM eer_data WHERE clientref=$id;");
      $values = array($id);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      return $resultCheck;
      
    }
    function ErasePayment($id){
      $id = $_SESSION['ID'];
      $query = $this->dbh->prepare("DELETE FROM payment_data WHERE user_code=$id;");
      $values = array($id);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      return $resultCheck;
      
    }

   
  }

 ?>
