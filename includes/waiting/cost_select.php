<?php 
error_reporting(E_ALL & E_NOTICE);
include 'includes/db_conn.php';
$id = $_SESSION['ID'];
$query = "SELECT * from payment_data WHERE user_code='$id'";
$step=$conn->prepare($query);
if($step->execute()){
    $php_data_array=$step->fetchALL();
    $i = array($php_data_array);

    foreach ($i as $v) {

    //review numbers
    $goal = $v[0][2];
    //print_r($number1);
    
    }


}
?>