<?php
error_reporting(0);
ini_set('display_errors', 'Off');
//display_errors(false);

if (isset($_POST['submit'])) {
  include 'users.class.php';
  $user = new ManageUsers();
// CAPTURE USER INPUT
  //1.goal_guide
  $id = $_SESSION['ID'];
  $mealplan = $_POST['mealplan'];
  $success = $_POST['success'];
  $reason = $_POST['reason'];
 
  //2.allergies
  $lactose = $_POST['lactose'];
  $gluten = $_POST['gluten'];
  $vegan = $_POST['vegan'];
  $vegeterian = $_POST['vegeterian'];
  $noallergy = $_POST['noallergy'];
  //3.habits
  $leftovers = $_POST['leftovers'];
  $roastedmeat = $_POST['roastedmeat'];
  $softdrinks = $_POST['softdrinks'];
  $sweets = $_POST['sweets'];
  $salt = $_POST['salt'];
  $latesupper = $_POST['latesupper'];
  $skiplunch = $_POST['skiplunch'];
  $alcoholic = $_POST['alcoholic'];
  $ocassional = $_POST['ocassional'];
  $nohabit = $_POST['nohabit'];
  $waterintake = $_POST['waterintake'];
  $mealscount = $_POST['mealscount'];
  //4.uji
  $ujiwawimbi = $_POST['ujiwawimbi'];
  $ujiwamahindi = $_POST['ujiwamahindi'];
  $ujispecial = $_POST['ujispecial'];
  $ujispecial2 = $_POST['ujispecial2'];
  $ujiwamuhogo = $_POST['ujiwamuhogo'];
  $ujiwamawele = $_POST['ujiwamawele'];
  $fbf = $_POST['fbf'];
  $ujiwamchele = $_POST['ujiwamchele'];
  $ujiwangano = $_POST['ujiwangano'];
  $oatporridge = $_POST['oatporridge'];
  $oatmeal = $_POST['oatmeal'];
  $ujispecial3 = $_POST['ujispecial3'];
  $ujispecial4 = $_POST['ujispecial4'];
  $nouji = $_POST['nouji'];
  //5.ugali
  $wholemaize = $_POST['wholemaize'];
  $ugalispecial1 = $_POST['ugalispecial1'];
  $ugalispecial2 = $_POST['ugalispecial2'];
  $ugalispecial3 = $_POST['ugalispecial3'];
  $ugalispecial4 = $_POST['ugalispecial4'];
  $ugalispecial5 = $_POST['ugalispecial5'];
  $ugalispecial6 = $_POST['ugalispecial6'];
  $ugalispecial7 = $_POST['ugalispecial7'];
  $ugalispecial8 = $_POST['ugalispecial8'];
  $ugalispecial9 = $_POST['ugalispecial9'];
  $nougali = $_POST['nougali'];
  //6.wheatfoods
  $mandazi = $_POST['mandazi'];
  $kaimati = $_POST['kaimati'];
  $scones = $_POST['scones'];
  $mahamri = $_POST['mahamri'];
  $qita = $_POST['qita'];
  $pizza = $_POST['pizza'];
  $bhature = $_POST['bhature'];
  $splitdal = $_POST['splitdal'];
  $roti = $_POST['roti'];
  $chapatiwhite = $_POST['chapatiwhite'];
  $chapatibrown = $_POST['chapatibrown'];
  $pancakes = $_POST['pancakes'];
  $nowheatfoods = $_POST['nowheatfoods'];
  //7.bakedfoods
  $whitebread = $_POST['whitebread'];
  $brownbread = $_POST['brownbread'];
  $sweetbread = $_POST['sweetbread'];
  $sweetbiscuits = $_POST['sweetbiscuits'];
  $biscuitsavoury = $_POST['biscuitsavoury'];
  $weetabix = $_POST['weetabix'];
  $cornflakes = $_POST['cornflakes'];
  $buns = $_POST['buns'];
  $cupcakes = $_POST['cupcakes'];
  $fruitcakes = $_POST['fruitcakes'];
  $spongecakes = $_POST['spongecakes'];
  $icedcakes = $_POST['icedcakes'];
  $cookies = $_POST['cookies'];
  $nobakedfoods = $_POST['nobakedfoods'];
  //8.ricefoods
  $pilau = $_POST['pilau'];
  $boiledrice = $_POST['boiledrice'];
  $biryani = $_POST['biryani'];
  $friedrice = $_POST['friedrice'];
  $ricespecial1 = $_POST['ricespecial1'];
  $ricespecial2 = $_POST['ricespecial2'];
  $ricespecial3 = $_POST['ricespecial3'];
  $steamedrice = $_POST['steamedrice'];
  $ricespecial4 = $_POST['ricespecial4'];
  $macaroni = $_POST['macaroni'];
  $spaghetti = $_POST['spaghetti'];
  $noricefoods = $_POST['noricefoods'];
  //9.mashedfoods
  $mukimo1 = $_POST['mukimo1'];
  $mukimo2 = $_POST['mukimo2'];
  $mukimo3 = $_POST['mukimo3'];
  $mukimo4 = $_POST['mukimo4'];
  $mashedpotatoes = $_POST['mashedpotatoes'];
  $mashedbananas = $_POST['mashedbananas'];
  $kimanga = $_POST['kimanga'];
  $mukimo5 = $_POST['mukimo5'];
  $ndoto = $_POST['ndoto'];
  $nzenga = $_POST['nzenga'];
  $kimanga2 = $_POST['kimanga2'];
  $kimito = $_POST['kimito'];
  $nyenyi = $_POST['nyenyi'];
  $githeri = $_POST['githeri'];
  $githeri2 = $_POST['githeri2'];
  $nomashedfoods = $_POST['nomashedfoods'];
  //10.legumes
  $ndengu = $_POST['ndengu'];
  $maharagwe = $_POST['maharagwe'];
  $kamande = $_POST['kamande'];
  $pigeonstew = $_POST['pigeonstew'];
  $peasstew = $_POST['peasstew'];
  $chickpeas = $_POST['chickpeas'];
  $blackbeans = $_POST['blackbeans'];
  $nolegumes = $_POST['nolegumes'];
  //11.fruits
  $melon = $_POST['melon'];
  $treetomato = $_POST['treetomato'];
  $tangerine = $_POST['tangerine'];
  $strawberries = $_POST['strawberries'];
  $plums = $_POST['plums'];
  $pineapple = $_POST['pineapple'];
  $pear = $_POST['pear'];
  $peach = $_POST['peach'];
  $passion = $_POST['passion'];
  $pawpaw = $_POST['pawpaw'];
  $orange = $_POST['orange'];
  $mulberry = $_POST['mulberry'];
  $mango = $_POST['mango'];
  $lime = $_POST['lime'];
  $lemon = $_POST['lemon'];
  $loquat = $_POST['loquat'];
  $jackfruit = $_POST['jackfruit'];
  $guava = $_POST['guava'];
  $grapes = $_POST['grapes'];
  $doupalm = $_POST['doupalm'];
  $dates = $_POST['dates'];
  $custard = $_POST['custard'];
  $baobab = $_POST['baobab'];
  $banana = $_POST['banana'];
  $avocado = $_POST['avocado'];
  $apple = $_POST['apple'];
  $zambarau = $_POST['zambarau'];
  $passionjiuce = $_POST['passionjuice'];
  $nofruits = $_POST['nofruits'];
  //12.Vegetables
  $sukumawiki = $_POST['sukumawiki'];
  $cabbage = $_POST['cabbage'];
  $terere = $_POST['terere'];
  $spinach = $_POST['spinach'];
  $thabai = $_POST['thabai'];
  $pumpkinleaves = $_POST['pumpkinleaves'];
  $cowpeasleaves = $_POST['cowpeasleaves'];
  $vinespinach = $_POST['vinespinach'];
  $stewedkunde = $_POST['stewedkunde'];
  $veges1 = $_POST['veges1'];
  $veges2 = $_POST['veges2'];
  $broccoli = $_POST['broccoli'];
  $veges3 = $_POST['veges3'];
  $obwoba = $_POST['obwoba'];
  $veges4 = $_POST['veges4'];
  $veges5 = $_POST['veges5'];
  $novegetablefoods = $_POST['novegetablefoods'];
  //13.tubers
  $yamstew = $_POST['yamstew'];
  $tuber1 = $_POST['tuber1'];
  $tuber2 = $_POST['tuber2'];
  $tuber3 = $_POST['tuber3'];
  $tuber4 = $_POST['tuber4'];
  $mushenye = $_POST['mushenye'];
  $nduma = $_POST['nduma'];
  $boiledcassava = $_POST['boiledcassava'];
  $tuber5 = $_POST['tuber5'];
  $tuber6 = $_POST['tuber6'];
  $tuber7 = $_POST['tuber7'];
  $tuber8 = $_POST['tuber8'];
  $notuberfoods = $_POST['notuberfoods'];
  //14.animal products
  $beef = $_POST['beef'];
  $goatmeat = $_POST['goatmeat'];
  $mutton = $_POST['mutton'];
  $camelmeat = $_POST['camelmeat'];
  $fish = $_POST['fish'];
  $omena = $_POST['omena'];
  $chicken = $_POST['chicken'];
  $mincedmeat = $_POST['mincedmeat'];
  $guineafowl = $_POST['guineafowl'];
  $quail = $_POST['quail'];
  $eggs = $_POST['eggs'];
  $eggtoast = $_POST['eggtoast'];
  $samosa = $_POST['samosa'];
  $sausages = $_POST['sausages'];
  $omelette = $_POST['omelette'];
  $okra = $_POST['okra'];
  $pork = $_POST['pork'];
  $rabbit = $_POST['rabbit'];
  $cheese = $_POST['cheese'];
  $ghee = $_POST['ghee'];
  $honey = $_POST['honey'];
  $beefbroth = $_POST['beefbroth'];
  $nomeatfoods = $_POST['nomeatfoods'];
  //15.beverages
  $chai = $_POST['chai'];
  $whitecoffee = $_POST['whitecoffee'];
  $whitechocolate = $_POST['whitechocolate'];
  $icecream = $_POST['icecream'];
  $cowmilk = $_POST['cowmilk'];
  $camelmilk = $_POST['camelmilk'];
  $maziwamala = $_POST['maziwamala'];
  $yoghurt = $_POST['yoghurt'];
  $sugarcanejuice = $_POST['sugarcanejuice'];
  $water = $_POST['water'];
  $wine = $_POST['wine'];
  $energydrinks = $_POST['energydrinks'];
  $beer = $_POST['beer'];
  $fruitjuice = $_POST['fruitjuice'];
  $skimmedmilk = $_POST['skimmedmilk'];
  $nobeverages = $_POST['nobeverages'];

  // STANDARD SECURITY META
  $ip_address = $_SERVER['REMOTE_ADDR'];
  $date = date("d-m-Y");
  $time = date("H:i");
  

  //verify if user Identity is true
  if (empty($id)) {
    header("Location: ../info.php?e=Please Input all Fields.");
    exit();
    
  }
  else {
      //Check Data Presence
      $goal_guide = $user->Plan_check($id);
      $allergies = $user->Allergies_check($id);
      $habits = $user->Habits_check($id);
      $uji = $user->Uji_check($id);
      $ugali = $user->Ugali_check($id);
      $wheatfoods = $user->Wheatfoods_check($id);
      $bakedfoods = $user->Bakedfoods_check($id);
      $ricefoods = $user->Ricefoods_check($id);
      $mashedfoods = $user->Mashedfoods_check($id);
      $legumes = $user->Legumes_check($id);
      $fruits = $user->Fruits_check($id);
      $vegetable = $user->Vegetable_check($id);
      $tubers = $user->Tubers_check($id);
      $animalproducts = $user->Animalproducts_check($id);
      $beverages = $user->Beverages_check($id);
     
      if ($goal_guide == 0 && $allergies == 0 && $habits == 0 && $uji == 0 && $ugali == 0 && $wheatfoods==0 && $bakedfoods == 0 && $ricefoods == 0 && $mashedfoods == 0 && $legumes == 0 && $fruits == 0 && $vegetable == 0 && $tubers == 0 && $animalproducts == 0 && $beverages == 0)
       {
        $guide_data = $user->planhistory($id, $mealplan, $success, $reason, $ip_address, $time, $date);
        $allergy_data = $user->allergies($id, $lactose, $gluten, $vegan, $vegeterian, $noallergy, $ip_address, $time, $date);
        $habits_data = $user->habits($id, $leftovers, $roastedmeat, $softdrinks, $sweets, $salt, $latesupper, $skiplunch, $alcoholic, $ocassional, $nohabit, $waterintake, $mealscount, $ip_address, $time, $date);
        $uji_data = $user->uji($id, $ujiwawimbi, $ujiwamahindi, $ujispecial, $ujispecial2, $ujiwamuhogo, $ujiwamawele, $fbf, $ujiwamchele, $ujiwangano, $oatporridge, $oatmeal, $ujispecial3, $ujispecial4, $nouji, $ip_address, $time, $date);
        $ugali_data = $user->ugali($id, $wholemaize, $ugalispecial1, $ugalispecial2,  $ugalispecial3,  $ugalispecial4,  $ugalispecial5,  $ugalispecial6,  $ugalispecial7,  $ugalispecial8,  $ugalispecial9, $nougali,  $ip_address, $time, $date);
        $wheat_data = $user->wheat($id, $mandazi, $kaimati, $scones, $mahamri, $qita, $pizza, $bhature, $splitdal, $roti, $chapatiwhite, $chapatibrown, $pancakes, $nowheatfoods, $ip_address, $time, $date);
        $baked_data = $user->baked($id, $whitebread, $brownbread, $sweetbread, $sweetbiscuits, $biscuitsavoury, $weetabix, $cornflakes, $buns, $cupcakes, $fruitcakes, $spongecakes, $icedcakes, $cookies, $nobakedfoods, $ip_address, $time, $date);
        $rice_data = $user->rice($id, $pilau, $boiledrice, $biryani, $friedrice, $ricespecial1, $ricespecial2, $ricespecial3, $steamedrice, $ricespecial4, $macaroni, $spaghetti, $noricefoods, $ip_address, $time, $date);
        $mashed_data = $user->mashed($id, $mukimo1, $mukimo2, $mukimo3, $mukimo4, $mashedpotatoes, $mashedbananas, $kimanga, $mukimo5, $ndoto, $nzenga, $kimanga2, $kimito, $nyenyi, $githeri, $githeri2, $nomashedfoods, $ip_address, $time, $date);
        $legumes_data = $user->legumes($id, $ndengu, $maharagwe, $kamande, $pigeonstew, $peasstew, $chickpeas, $blackbeans, $nolegumes, $ip_address, $time, $date);
        $fruits_data = $user->fruits($id, $melon, $treetomato, $tangerine, $strawberries, $plums, $pineapple, $pear, $peach, $passion, $pawpaw, $orange, $mulberry, $mango, $lime, $lemon, $loquat, $jackfruit, $guava, $grapes, $doupalm, $dates, $custard, $baobab, $banana, $avocado, $apple, $zambarau, $passionjiuce, $nofruits,  $ip_address, $time, $date);
        $vegetable_data = $user->vegetable($id, $sukumawiki, $cabbage, $terere, $spinach, $thabai, $pumpkinleaves, $cowpeasleaves, $vinespinach, $stewedkunde, $veges1, $veges2, $broccoli, $veges3, $obwoba, $veges4, $veges5, $novegetablefoods, $ip_address, $time, $date);
        $tubers_data = $user->tubers($id, $yamstew, $tuber1, $tuber2, $tuber3, $tuber4, $mushenye, $nduma, $boiledcassava, $tuber5, $tuber6, $tuber7, $tuber8, $notuberfoods, $ip_address, $time, $date);
        $animal_data = $user->animal($id, $beef, $goatmeat, $mutton, $camelmeat, $fish, $omena, $chicken, $mincedmeat, $guineafowl, $quail, $eggs, $eggtoast, $samosa, $sausages, $omelette, $okra, $pork, $rabbit, $cheese, $ghee, $honey, $beefbroth, $nomeatfoods, $ip_address, $time, $date);
        $beverages_data = $user->beverages($id, $chai, $whitecoffee, $whitechocolate, $icecream, $cowmilk, $camelmilk, $maziwamala, $yoghurt, $sugarcanejuice, $water, $wine, $energydrinks, $beer, $fruitjuice, $skimmedmilk, $nobeverages, $ip_address, $time, $date);

      // Insert Ignore Records
        if ($guide_data == 1 && $allergy_data == 1 && $habits_data == 1 && $uji_data == 1 && $ugali_data == 1 && $wheat_data == 1 && $baked_data == 1 && $rice_data == 1 && $mashed_data == 1 && $legumes_data == 1 && $fruits_data == 1 && $vegetable_data == 1 && $tubers_data == 1 && $animal_data == 1 && $beverages_data == 1) 
        {
          $create_data_session = $user->session_bio_data($id);
          $status_change =  $user->finalstatus_update($id);
          if($status_change == 1){
            header("Location: ../success?s=Data Successfully Saved.");
            exit();
          }
           
          }
      }
      else {
        $create_data_session = $user->session_bio_data($id);
        header("Location: ../success?e=Your Data already Exists.");
        exit();
      }
  }

}
?>