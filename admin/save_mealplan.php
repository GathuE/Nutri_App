<?php 
$id=$_GET['plan'];
include 'includes/conn.php'; 
if(isset($_POST['submit'])){
    
    //check for Empty Form Here
    
foreach($_POST['id'] as $rec=> $value)
{
    
    $user_id = $_POST['user_id'];
    //$id = $_POST['id'][$rec];
    $day = $_POST['day'][$rec];
    $meal = $_POST['meal'][$rec];
    $name = $_POST['name'][$rec];
    $amount = $_POST['amount'][$rec];
    $servingitem = $_POST['servingitem'][$rec];
    $energy = $_POST['energy'][$rec];
    $water = $_POST['water'][$rec];
    $protein = $_POST['protein'][$rec];
    $fat = $_POST['fat'][$rec];
    $carbohydrate = $_POST['carbohydrate'][$rec];
    $fiber = $_POST['fiber'][$rec];
    

    
    $sql = "INSERT INTO meal_plans (user_id, day, meal, name, amount, servingitem, energy, water, protein, fat, carbohydrate, fiber) values (:user_id, :day, :meal, :name, :amount, :servingitem, :energy, :water, :protein, :fat, :carbohydrate, :fiber)";
    $query = $conn->prepare($sql);
    $query->bindParam(':user_id',$user_id,PDO::PARAM_STR);
    $query->bindParam(':day',$day,PDO::PARAM_STR);
    $query->bindParam(':meal',$meal,PDO::PARAM_STR);
    $query->bindParam(':name',$name,PDO::PARAM_STR);
    $query->bindParam(':amount',$amount,PDO::PARAM_STR);
    $query->bindParam(':servingitem',$servingitem,PDO::PARAM_STR);
    $query->bindParam(':energy',$energy,PDO::PARAM_STR);
    $query->bindParam(':water',$water,PDO::PARAM_STR);
    $query->bindParam(':protein',$protein,PDO::PARAM_STR);
    $query->bindParam(':fat',$fat,PDO::PARAM_STR);
    $query->bindParam(':carbohydrate',$carbohydrate,PDO::PARAM_STR);
    $query->bindParam(':fiber',$fiber,PDO::PARAM_STR);
    $query->execute();
    header("Location: set_authkey?plan=$user_id&success= Meal Plan Saved Successfully !!");

}
  
}

?>
