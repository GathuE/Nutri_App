<?php 
error_reporting (E_ALL & E_NOTICE);
include 'includes/conn.php'; 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" type="image/png" href="/img/logo.png"/>
    <title>Nutri--App </title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- ckeditor -->       
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.8.0/ckeditor.js"></script>
    <!-- File Input CSS --> 
    <link rel="stylesheet" type="text/css" href="assets/css/fileinput.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->

    <style>
            /* The Modal (background) */
            .modal {
            display:none; /* Hidden by default */
            position:relative; /* Stay in place */
            z-index:1; /* Sit on top */
            /* Location of the box */
            top:-150px;
            width:100%; /* Full width */
            height:100%; /* Full height */
            overflow: none; /* Enable scroll if needed */
            
            /*background-color: rgb(0,0,0); /* Fallback color */
            /*background-color: rgba(0,0,0,0.1); /* Black w/ opacity */
            }
            .modal2 {
            display:none; /* Hidden by default */
            position:relative; /* Stay in place */
            z-index:1; /* Sit on top */
            /* Location of the box */
            top:-150px;
            width:100%; /* Full width */
            height:100%; /* Full height */
            overflow: none; /* Enable scroll if needed */
            
            /*background-color: rgb(0,0,0); /* Fallback color */
            /*background-color: rgba(0,0,0,0.1); /* Black w/ opacity */
            }

            /* Modal Content */
            .modal-content {
            background-color: #fefefe;
            border: 0.5px solid #421966;
            width: 100%;
            font-weight:normal;

            }
            .modal2-content {
            background-color: #fefefe;
            border: 0.5px solid #421966;
            width: 90%;
            font-weight:normal;

            }
            .modal-content >.row{
                padding-left:10px;
                padding-right:10px;
            }
            .modal2-content >.row{
                padding-left:10px;
                padding-right:10px;
            }

            /* The Close Button */
            .close {
            color: #aaaaaa;
            font-size: 28px;
            float:right;
            font-weight: bold;
            }
            .close2 {
            color: #aaaaaa;
            font-size: 28px;
            float:right;
            font-weight: bold;
            }

            .close:hover,
            .close:focus {
            color: #138ea4;;
            text-decoration: none;
            cursor: pointer;
            }
            .close2:hover,
            .close2:focus {
            color: #138ea4;;
            text-decoration: none;
            cursor: pointer;
            }
            .fade{
            position:relative; /* Stay in place */
            z-index:1; /* Sit on top */
            /* Location of the box */
            top:-500px;
            width:100%; /* Full width */
            height:100%; /* Full height */
            overflow: none; /* Enable scroll if needed */
            opacity:1;
            }
            .modal-content{
              overflow: auto; 
            }
           
            .add-new-button{
                padding: 10px;
                padding-bottom: 10px;
            }
            .head-title{
                padding-top: 40px;
            }
</style>
<script src="assets/js/jquery-3.2.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  $(".js-example-basic-single").select2();
});
</script>
</head>

<body>
    <div class="main-wrapper">

                <!-- INCLUDE DB CONNECTION -->
                    <?php include 'includes/conn.php'; ?> 
                <!-- INCLUDE DB CONNECTION -->

                <!-- header Code Goes Here -->
                    /* <?php include 'includes/header.php' ?> */
                <!-- header Code Goes Here -->
       
                <!-- Side Bar Code Goes Here -->
                    <?php include 'includes/sidebar.php' ?>
                <!-- Side Bar Code Goes Here -->

                <!-- Dashboard Content Goes Here -->
        <div class="page-wrapper">
            <div class="content">
             <!-- USER DATA AND NOTIFICATIONS -->
             <div class="row">
                    <div class=" col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="dash-widget">
                            <div class="dash-widget-info text-left">
                              <!-- Trigger/Open The Modal -->
                                <button class="btn btn-primary" id="myBtn">Client Details</button>
                                <button class="btn btn-primary" id="myBtn2">Adjust Nutrients</button>
                          </div>
                          <div class="dash-widget-info text-right">
                                <h4 style="text-transform:uppercase;font-weight:600; font-family:monospace;">ADMIN</h4> 
                          </div>
                        </div>
                    </div>
                </div>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                          <!-- CLIENT REFERENCE DATA MODAL -->
                              <?php include 'modal_reference.php'?>
                              <?php include 'modal_nutrients.php'?>
                              <br>
                </div>           
            </div>


            <!-- Food Entry Table Goes Here -->
              <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                  <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="col-md-3 float-right">
                              
                            <?php 
                                error_reporting (0);
                               
                                $id=$_GET['plan'];
                                $ret="select * from users 
                                join eer_data on eer_data.clientref=users.ID  
                                join goal_guide on goal_guide.client_ID=users.ID
                                join bmi_data on bmi_data.user_ID=users.ID
                                join feeding_habits on feeding_habits.client_id=users.ID
                                join allergies on allergies.clientid=users.ID
                                where ID=:id";
                                $query= $conn -> prepare($ret);
                                $query->bindParam(':id',$id, PDO::PARAM_STR);
                                $query-> execute();
                                $results = $query -> fetchAll(PDO::FETCH_OBJ);
                                $cnt=1;
                                if($query -> rowCount() > 0)
                                {
                                foreach($results as $result)
                                {
                            
                            ?>
                             <label style="font-size:12px;">
                              Name :
                            <?php echo htmlentities($result->username);?><br>
                              Goal :
                            <?php echo htmlentities($result->goal);?><br>
                              Target Weight :
                            <?php echo htmlentities($result->targetweight);?> kgs<br>

                            

                            <?php }} else{
                                  echo ' No Data Available !!';
                                  } 
                            ?>
                            </div>
                            <div class="col-md-3 float-left add-new-button">
                              <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addModal">
                                <i class="fa fa-plus"></i> Add New Record
                              </a>
                            </div>
                            <h4 class="text-center">Meal Entries</h4>
                           
                            <br>
                                <form action="save_mealplan.php" method="POST">
                                    <input type="hidden" id="user_id" name="user_id" value="<?php echo $id ?>">
                                    <table class="table mb-0 table-responsive" style="font-size:10px;">
                                      <thead class="bg-primary text-white">
                                        <tr>
                                          <th>ID</th>
                                          <th>Day</th>
                                          <th>Meal</th>
                                          <th>Food</th>
                                          <th>Amount of Servings</th>
                                          <th>Energy (Kcals) </th>
                                          <th>Water (mls)</th>
                                          <th>Protein (g)</th>
                                          <th>Fat (g)</th>
                                          <th>CHO (g)</th>
                                          <th>Fiber (g)</th>
                                      <!-- Other Nutrients Hidden 

                                          <th>Ca (mg)</th>
                                          <th>Fe (mg)</th>
                                          <th>Mg (mg)</th>
                                          <th>P (mg)</th>
                                          <th>k (mg)</th>
                                          <th>Na (mg)</th>
                                          <th>Zn (mg)</th>
                                          <th>Se (mcg)</th>
                                          <th>Vit_A_RAE (mcg)</th>
                                          <th>Vit_A_RE (mcg)</th>
                                          <th>Retinol (mcg)</th>
                                          <th>B_Carotene (mcg)</th>
                                          <th>Thiamin (mg)</th>
                                          <th>Riboflavin (mg)</th>
                                          <th>Niacin (mg)</th>
                                          <th>Dietary Folate (mcg)</th>
                                          <th>Food Folate (mcg)</th>
                                          <th>Vit_B_12 (mcg)</th>
                                          <th>Vit_C (mg)</th>
                                          <th>Cholestrol (mg)</th>
                                          <th>Oxalic Acid (mg)</th>
                                          <th>Phytate (mg)</th>

                                          Other Nutrients Hidden -->

                                   <!--  <th>Action</th> -->
                                        </tr>
                                      </thead>
                                      <tbody>

                                      <?php 
                                        error_reporting (0);
                                      
                                        $id=$_GET['plan'];
                                        $ret="select client_meals.id, client_meals.user_id, client_meals.day,client_meals.meal,client_meals.food_id,client_meals.amount ,foods.food_name as name, servings.name as servingitem,
                                        round(servings.energy*client_meals.amount,2) as energy,
                                        round(servings.water*client_meals.amount,2) as water,
                                        round(servings.protein*client_meals.amount,2) as protein,
                                        round(servings.fat*client_meals.amount,2) as fat,
                                        round(servings.cho*client_meals.amount,2) as carbohydrate,
                                        round(servings.fiber*client_meals.amount,2) as fiber,
                                        round(servings.ca*client_meals.amount, 2) as ca,
                                        round(servings.fe*client_meals.amount, 2) as fe,
                                        round(servings.mg*client_meals.amount, 2) as mg,
                                        round(servings.p*client_meals.amount, 2) as p,
                                        round(servings.k*client_meals.amount, 2) as k,
                                        round(servings.na*client_meals.amount, 2) as na,
                                        round(servings.zn*client_meals.amount, 2) as zn,
                                        round(servings.se*client_meals.amount, 2) as se,
                                        round(servings.Vit_A_RAE*client_meals.amount, 2) as Vit_A_RAE,
                                        round(servings.Vit_A_RE*client_meals.amount, 2) as Vit_A_RE,
                                        round(servings.retinol*client_meals.amount, 2) as retinol,
                                        round(servings.b_carotene_equivalent*client_meals.amount, 2) as b_carotene_equivalent,
                                        round(servings.thiamin*client_meals.amount, 2) as thiamin,
                                        round(servings.riboflavin*client_meals.amount, 2) as riboflavin,
                                        round(servings.niacin*client_meals.amount, 2) as niacin,
                                        round(servings.dietary_folate_eq*client_meals.amount, 2) as dietary_folate_eq,
                                        round(servings.food_folate*client_meals.amount, 2) as food_folate,
                                        round(servings.vit_B_12*client_meals.amount, 2) as vit_B_12,
                                        round(servings.vit_c*client_meals.amount, 2) as vit_c,
                                        round(servings.cholesterol*client_meals.amount, 2) as cholesterol,
                                        round(servings.Oxalic_acid_OXALAC*client_meals.amount, 2) as Oxalic_acid_OXALAC,
                                        round(servings.phytate*client_meals.amount, 2) as phytate,

                                        users.ID, users.username
                                        from client_meals
                                        
                                        inner join foods on foods.id=client_meals.food_id
                                        inner join servings on servings.id=client_meals.servings_id
                                        inner join users on users.ID=client_meals.user_id
                                      
                                        where user_id=:id";
                                        $query= $conn -> prepare($ret);
                                        $query->bindParam(':id',$id, PDO::PARAM_STR);
                                        $query-> execute();
                                        $results = $query -> fetchAll(PDO::FETCH_OBJ);
                                        $cnt=1;
                                        if($query -> rowCount() > 0)
                                        {
                                        foreach($results as $result)
                                        {
                                    
                                    ?>
                                        <tr>
                                          
                                          <td><input type="hidden" name="id[]" value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->id);?></td>
                                          <td><input type="hidden" name="day[]" value="<?php echo htmlentities($result->day);?>"><?php echo htmlentities($result->day);?></td>
                                          <td><input type="hidden" name="meal[]" value="<?php echo htmlentities($result->meal);?>"><?php echo htmlentities($result->meal);?></td>
                                          <td><input type="hidden" name="name[]" value="<?php echo htmlentities($result->name);?>"><?php echo htmlentities($result->name);?></td>
                                          <td><input type="hidden" name="amount[]" value="<?php echo htmlentities($result->amount);?>"> <?php echo htmlentities($result->amount);?> <input type="hidden" name="servingitem[]" value="<?php echo htmlentities($result->servingitem);?>"><?php echo htmlentities($result->servingitem);?></td>
                                          <td><input type="hidden" name="energy[]" value="<?php echo htmlentities($result->energy);?>"><?php echo htmlentities($result->energy);?></td>
                                          <td><input type="hidden" name="water[]" value="<?php echo htmlentities($result->water);?>"><?php echo htmlentities($result->water);?></td>
                                          <td><input type="hidden" name="protein[]" value="<?php echo htmlentities($result->protein);?>"><?php echo htmlentities($result->protein);?></td>
                                          <td><input type="hidden" name="fat[]" value="<?php echo htmlentities($result->fat);?>"><?php echo htmlentities($result->fat);?></td>
                                          <td><input type="hidden" name="carbohydrate[]" value="<?php echo htmlentities($result->carbohydrate);?>"><?php echo htmlentities($result->carbohydrate);?></td>
                                          <td><input type="hidden" name="fiber[]" value="<?php echo htmlentities($result->fiber);?>"><?php echo htmlentities($result->fiber);?></td>

                                          <!-- Other Nutrients Hidden 
                                          <td><?php echo htmlentities($result->ca);?></td>
                                          <td><?php echo htmlentities($result->fe);?></td>
                                          <td><?php echo htmlentities($result->mg);?></td>
                                          <td><?php echo htmlentities($result->p);?></td>
                                          <td><?php echo htmlentities($result->k);?></td>
                                          <td><?php echo htmlentities($result->na);?></td>
                                          <td><?php echo htmlentities($result->zn);?></td>
                                          <td><?php echo htmlentities($result->se);?></td>
                                          <td><?php echo htmlentities($result->Vit_A_RAE);?></td>
                                          <td><?php echo htmlentities($result->Vit_A_RE);?></td>
                                          <td><?php echo htmlentities($result->retinol);?></td>
                                          <td><?php echo htmlentities($result->b_carotene_equivalent);?></td>
                                          <td><?php echo htmlentities($result->thiamin);?></td>
                                          <td><?php echo htmlentities($result->riboflavin);?></td>
                                          <td><?php echo htmlentities($result->niacin);?></td>
                                          <td><?php echo htmlentities($result->dietary_folate_eq);?></td>
                                          <td><?php echo htmlentities($result->food_folate);?></td>
                                          <td><?php echo htmlentities($result->vit_B_12);?></td>
                                          <td><?php echo htmlentities($result->vit_c);?></td>
                                          <td><?php echo htmlentities($result->cholesterol);?></td>
                                          <td><?php echo htmlentities($result->Oxalic_acid_OXALAC);?></td>
                                          <td><?php echo htmlentities($result->phytate);?></td>

                                        Other Nutrients Hidden -->

                                          <td style="font-size:12px;padding:10px;">
                                                <div class="dropdown dropdown-action">
                                                  <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                  <div class="dropdown-menu dropdown-menu-right">
                                                      <a class="dropdown-item viewBtn"> <i class="fa fa-eye"></i> View </a>
                                                <!--  <a class="dropdown-item updateBtn"> <i class="fa fa-edit"></i> Update </a> -->
                                                      <a class="dropdown-item deleteBtn"> <i class="fa fa-trash"></i> Delete </a>
                                                  </div>
                                                </div>
                                          </td>
                                        </tr>
                                        <?php $cnt=$cnt+1; }} else{
                                          echo '<tr><td><td></td></td><td style="text-align:center;font-size:10px;color:red;">Meal Entries Not Available !</td><td></td></tr>';
                                          } 
                                        ?>
                                        <?php 
                                        error_reporting (0);
                                      
                                        $id=$_GET['plan'];
                                        $ret="select client_meals.id, client_meals.user_id, client_meals.day,client_meals.meal,client_meals.food_id,client_meals.amount ,foods.food_name as name, servings.name as servingitem,
                                        sum(round(servings.energy*client_meals.amount,2)) as totalenergy,
                                        sum(round(servings.water*client_meals.amount,2)) as totalwater,
                                        sum(round(servings.protein*client_meals.amount,2)) as totalprotein,
                                        sum(round(servings.fat*client_meals.amount,2)) as totalfat,
                                        sum(round(servings.cho*client_meals.amount,2)) as totalcarbohydrate,
                                        sum(round(servings.fiber*client_meals.amount,2)) as totalfiber,
                                        sum(round(servings.ca*client_meals.amount, 2)) as totalca,
                                        sum(round(servings.fe*client_meals.amount, 2)) as totalfe,
                                        sum(round(servings.mg*client_meals.amount, 2)) as totalmg,
                                        sum(round(servings.p*client_meals.amount, 2)) as totalp,
                                        sum(round(servings.k*client_meals.amount, 2)) as totalk,
                                        sum(round(servings.na*client_meals.amount, 2)) as totalna,
                                        sum(round(servings.zn*client_meals.amount, 2)) as totalzn,
                                        sum(round(servings.se*client_meals.amount, 2)) as totalse,
                                        sum(round(servings.Vit_A_RAE*client_meals.amount, 2)) as totalVit_A_RAE,
                                        sum(round(servings.Vit_A_RE*client_meals.amount, 2)) as totalVit_A_RE,
                                        sum(round(servings.retinol*client_meals.amount, 2)) as totalretinol,
                                        sum(round(servings.b_carotene_equivalent*client_meals.amount, 2)) as totalb_carotene_equivalent,
                                        sum(round(servings.thiamin*client_meals.amount, 2)) as totalthiamin,
                                        sum(round(servings.riboflavin*client_meals.amount, 2)) as totalriboflavin,
                                        sum(round(servings.niacin*client_meals.amount, 2)) as totalniacin,
                                        sum(round(servings.dietary_folate_eq*client_meals.amount, 2)) as totaldietary_folate_eq,
                                        sum(round(servings.food_folate*client_meals.amount, 2)) as totalfood_folate,
                                        sum(round(servings.vit_B_12*client_meals.amount, 2)) as totalvit_B_12,
                                        sum(round(servings.vit_c*client_meals.amount, 2)) as totalvit_c,
                                        sum(round(servings.cholesterol*client_meals.amount, 2)) as totalcholesterol,
                                        sum(round(servings.Oxalic_acid_OXALAC*client_meals.amount, 2)) as totalOxalic_acid_OXALAC,
                                        sum(round(servings.phytate*client_meals.amount, 2)) as totalphytate,

                                        users.ID, users.username
                                        from client_meals
                                        
                                        inner join foods on foods.id=client_meals.food_id
                                        inner join servings on servings.id=client_meals.servings_id
                                        inner join users on users.ID=client_meals.user_id
                                      
                                        where user_id=:id";
                                        $query= $conn -> prepare($ret);
                                        $query->bindParam(':id',$id, PDO::PARAM_STR);
                                        $query-> execute();
                                        $results = $query -> fetchAll(PDO::FETCH_OBJ);
                                        $cnt=1;
                                        if($query -> rowCount() > 0)
                                        {
                                        foreach($results as $result)
                                        {
                                    
                                    ?>
                                        <tr>
                                          <td colspan ="5">Total Nutrients</td>
                                          <td><?php echo htmlentities($result->totalenergy);?></td>
                                          <td><?php echo htmlentities($result->totalwater);?></td>
                                          <td><?php echo htmlentities($result->totalprotein);?></td>
                                          <td><?php echo htmlentities($result->totalfat);?></td>
                                          <td><?php echo htmlentities($result->totalcarbohydrate);?></td>
                                          <td><?php echo htmlentities($result->totalfiber);?></td>
                                          <!-- Other Nutrients Hidden 

                                          <td><?php echo htmlentities($result->totalca);?></td>
                                          <td><?php echo htmlentities($result->totalfe);?></td>
                                          <td><?php echo htmlentities($result->totalmg);?></td>
                                          <td><?php echo htmlentities($result->totalp);?></td>
                                          <td><?php echo htmlentities($result->totalk);?></td>
                                          <td><?php echo htmlentities($result->totalna);?></td>
                                          <td><?php echo htmlentities($result->totalzn);?></td>
                                          <td><?php echo htmlentities($result->totalse);?></td>
                                          
                                          Other Nutrients Hidden -->
                                        </tr>
                                        <?php $cnt=$cnt+1; }} else{
                                          echo '<tr><td><td></td></td><td style="text-align:center;font-size:10px;color:red;">Meal Entries Not Available !</td><td></td></tr>';
                                          } 
                                        ?>
                                      </tbody>
                                    </table>
                                    <br>
                                    
                                    <div class="row">
                                      <div class="col">
                                          <input type="submit" name="submit" id="savemeals" class="btn btn-primary" value="Save Meal Plan" style="display:none;float:right;">
                                      </div>
                                    </div>
                                </form>
                                      <button class="btn btn-primary" id="fillmeals" style="display:block;float:left;" onclick="savedata();">Finish Meal Entry</button>
                        </div>
                    </div>
                </div>

            <!-- Food Entry Table Goes Here -->
            <!-- Modals go Here -->
                              <?php include 'modal_meals.php' ?>
            <!-- Modals go Here -->

          

            <!-- <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <a class="btn btn-primary" href="pdf_upload?upload=<?php echo $result->ID;?>">Upload MealPlan <i class="fa fa-upload"></i></a>

                </div>
            </div> -->
        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    
    
	  <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/fileinput.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/Chart.bundle.js"></script>
    <script src="assets/js/chart.js"></script>
    <script src="assets/js/app.js"></script>
   
  
    
    <!--====== Alert Script START ======-->
    <script type="text/javascript">

    setTimeout (function(){
    //closing the alert
    $('.alert').alert('close');
    }, 3000);

    function savedata(){
      document.getElementById("fillmeals").style.display='none';
      document.getElementById("savemeals").style.display='block';
    }

    console.log(c);

    </script>
    <script>
$(document).ready(function() {
	$('#category').on('change', function() {
			var category_id = this.value;
			$.ajax({
				url: "get_subcat.php",
				type: "POST",
				data: {
					category_id: category_id
				},
				cache: false,
				success: function(dataResult){
					$("#sub_category").html(dataResult);
				}
			});
		
		
	});
});
</script>

<!-- UPDATE MODAL 
<script>
    $(document).ready(function () {
      $('.updateBtn').on('click', function(){

        $('#updateModal').modal('show');

        // Get the table row data.
        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        console.log(data);

        $('#updateId').val(data[0]);
        $('#updateDay').val(data[1]);
        $('#updateMeal').val(data[2]);
        $('#food').val(data[3]);
        $('#servingitem').val(data[4]);
        $('#amount').val(data[5]);      

        });
        
    });
  </script>

 UPDATE MODAL -->

<!-- VIEW MODAL -->
  <script>
    $(document).ready(function () {
      $('.viewBtn').on('click', function(){

        $('#viewModal').modal('show');

        // Get the table row data.
        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        console.log(data);

        $('#viewDay').text(data[1]);
        $('#viewMeal').text(data[2]);
        $('#viewFood').text(data[3]);
        $('#viewAmountofservings').text(data[4]);
        $('#viewEnergy').text(data[5]); 
        $('#viewWater').text(data[6]);  
        $('#viewProtein').text(data[7]); 
        $('#viewFat').text(data[8]); 
        $('#viewCarbohydrate').text(data[9]); 
        $('#viewFiber').text(data[10]); 
        $('#viewCalcium').text(data[11]); 
        $('#viewIron').text(data[12]); 
        $('#viewMagnesium').text(data[13]); 
        $('#viewPhosphorous').text(data[14]); 
        $('#viewPotassium').text(data[15]); 
        $('#viewSodium').text(data[16]); 
        $('#viewZinc').text(data[17]); 
        $('#viewSelenium').text(data[18]); 
       // $('#viewVitarae').text(data[19]); 
       // $('#viewVitare').text(data[20]); 
       // $('#viewRetinol').text(data[21]); 
       // $('#viewBcarotene').text(data[22]); 
       // $('#viewThiamin').text(data[23]); 
       // $('#viewRiboflavin').text(data[24]); 
       // $('#viewNiacin').text(data[25]); 
       // $('#viewDietaryfolate').text(data[26]); 
       // $('#viewFoodfolate').text(data[27]); 
       // $('#viewVitb12').text(data[28]); 
       // $('#viewVitc').text(data[29]); 
       // $('#viewCholestrol').text(data[30]); 
       // $('#viewOalicacid').text(data[31]); 
       // $('#viewPhytate').text(data[32]);    

        });
    
    });
  </script>

<!-- DELETE MODAL -->
  <script>
    $(document).ready(function () {
      $('.deleteBtn').on('click', function(){

        $('#deleteModal').modal('show');
        
        // Get the table row data.
        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        console.log(data);

        $('#deleteId').val(data[0]);

        });
    
    });
  </script>
</body>
</html>
