<?php 
error_reporting(0);

//description
if(isset($_POST['description'])){
    include 'users.class.php';
    $user = new ManageUsers();


    $id = $_POST['user_id'];

    $user_availability = $user->Getuserdata($id);

    if ($user_availability > 0) {
        header("Location:../guide.php?id=$id");
    }
    else{
        header("Location:../myfiles.php?e=No Dietplan Description!!");
    }
}

//mealplan
if(isset($_POST['mealplan'])){
    include 'users.class.php';
    $user = new ManageUsers();


    $id = $_POST['user_id'];
    
    $user_availability = $user->Getuserdata($id);

    if ($user_availability > 0) {
        header("Location:../meal_plan.php?id=$id");
    }
    else{
        header("Location:../myfiles.php?e=No Dietplan Description!!");
    }
}

//detailed mealplan
if(isset($_POST['detailedplan'])){
    include 'users.class.php';
    $user = new ManageUsers();


    $id = $_POST['user_id'];
    
    $user_availability = $user->Getuserdata($id);

    if ($user_availability > 0) {
        header("Location:../detailed_plan.php?id=$id");
    }
    else{
        header("Location:../myfiles.php?e=No Dietplan Description!!");
    }
}

//prescription
if(isset($_POST['prescription'])){
    include 'users.class.php';
    $user = new ManageUsers();


    $id = $_POST['user_id'];
    
    $user_availability = $user->Getuserdata($id);

    if ($user_availability > 0) {
        header("Location:../e_prescription.php?id=$id");
    }
    else{
        header("Location:../myfiles.php?e=No Dietplan Description!!");
    }
}



?>