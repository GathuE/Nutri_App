<?php
error_reporting (0);
include 'includes/conn.php'; 

// Insert data into the database
if(!empty($_POST["meal"]) && !empty($_POST["food"])){
        $meal = htmlentities($_POST['meal']);
        $food = htmlentities($_POST['food']);
        $clientid = htmlentities($_POST['clientid']);

  $sql="SELECT * FROM client_meals WHERE meal=:meal AND food_id=:food";
  $query= $conn -> prepare($sql);
  $query-> bindParam(':meal', $meal, PDO::PARAM_STR);
  $query-> bindParam(':food', $food, PDO::PARAM_STR);
  $query-> execute();
  $results = $query -> fetchAll(PDO::FETCH_OBJ);
  $cnt=1;
      if($query -> rowCount() > 0)
          {
            header("Location: make_plan?plan=$clientid");
            $msg = "A similar Food Entry Exists!!";
           // echo '<script> alert("A similar Food Entry Exists!!"); </script>';
          } 

    else if(ISSET($_POST['insertData']))
    {
        
        $clientid = htmlentities($_POST['clientid']);
        $day = htmlentities($_POST['day']);
        $meal = htmlentities($_POST['meal']);
        $food = htmlentities($_POST['food']);
        $servingitem = htmlentities($_POST['servingitem']);
        $amount = htmlentities($_POST['amount']);
        $sql = "INSERT INTO client_meals (user_id,day, meal, food_id, servings_id,amount) values (:clientid,:day,:meal,:food,:servingitem,:amount)";
        $query = $conn->prepare($sql);
        $query->bindParam(':clientid',$clientid,PDO::PARAM_STR);
        $query->bindParam(':day',$day,PDO::PARAM_STR);
        $query->bindParam(':meal',$meal,PDO::PARAM_STR);
        $query->bindParam(':food',$food,PDO::PARAM_STR);
        $query->bindParam(':servingitem',$servingitem,PDO::PARAM_STR);
        $query->bindParam(':amount',$amount,PDO::PARAM_STR);
        $query->execute();

        //echo '<script type="text/javascript"> alert("Food Entry Successful!!"); </script>';
        header("Location: make_plan?plan=$clientid");
        
        //$msg = "Food Entry Successful!!";
        exit();

       
       
        
    }
}

   // Delete data from the database
   if(ISSET($_POST['deleteData']))
   {
       
       $clientid = htmlentities($_POST['clientid']);
       $id = $_POST['deleteId']; 
  
       $sql = "DELETE FROM client_meals WHERE id=:id";
       $query= $conn->prepare($sql);
       $query->bindParam(':id',$id,PDO::PARAM_STR);
       $query->execute();
  
       //echo '<script type="text/javascript"> alert("Deleted Successful!!"); </script>';
       header("Location: make_plan?plan=$clientid");

       //$msg = "Deleted Successfully!!";
       exit();
   }
?>

<?php
include 'includes/db_conn.php'; 
$result = mysqli_query($con,"SELECT * FROM foods");
?>

<!-- MODALS -->
<div class="container">
  <!-- ADD RECORD MODAL -->
  <div class="modal fade" id="addModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h4 class="modal-title text-center">New Meal Entry</h4>
          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="modal_meals.php" method="POST">
            <input type="hidden" id="clientid" name="clientid" value="<?php echo $id ?>">
            <div class="row">
              <div class="col">
                  <div class="form-group">
                  <label>Select Day:</label>
                    <select class="form-control" id='day' name="day" required>
                        <option value="">Select Day.....</option>
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday">Saturday</option>
                        <option value="Sunday">Sunday</option>
                    </select>
                  </div>
              </div>
              <div class="col">
                  <div class="form-group">
                  <label>Select Meal:</label>
                      <select class="form-control" id='meal' name="meal" required>
                          <option value="">Choose Meal.....</option>
                          <option value="Breakfast">Breakfast</option>
                          <option value="Midmorning">Midmorning</option>
                          <option value="Lunch">Lunch</option>
                          <option value="Midafternoon">Midafternoon</option>
                          <option value="Supper">Supper</option>
                          <option value="Latesupper">Latesupper</option>
                      </select>
                  </div>
              </div>
            </div>
          
          
            <div class="form-group">
              <label>Select Food taken:</label><br>
                  <select id="category" name="food" class="js-example-basic-single" style="width:300px;font-size:12px;" required>
                      <option value="">Select Food</option>
                        <?php
                      while($row = mysqli_fetch_array($result)) {
                      ?>
                        <option value="<?php echo $row["id"];?>"><?php echo $row["food_name"];?></option>
                      <?php
                      }
                      ?>
                  
                  </select>
                  
            </div>
            <div class="form-group">
              <label>Select Serving Item:</label><br>
                  <select  id="sub_category" name="servingitem" class="js-example-basic-single" style="width:200px;font-size:12px;" required>
			
		              </select>
            </div>
            <div class="form-group">
              <label for="amount">No of Serving Item(s):</label>
                  <input type="number" min="0"  class="form-control"  name="amount" id="amount"  placeholder="Enter Amount e.g 0.5" required >
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" name="insertData">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  

   <!-- VIEW MODAL -->
   <div class="modal fade" id="viewModal">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header bg-info text-white">
          <h5 class="modal-title">Meal Nutrients</h5>
          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-5 col-xs-6 tital " >
              <strong>Day:</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewDay"></div>
            </div>
            <div class="col-sm-5 col-xs-6 tital " >
              <strong>Meal:</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewMeal"></div>
            </div>
            <div class="col-sm-5 col-xs-6 tital " >
              <strong>Food:</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewFood"></div>
            </div>
            <div class="col-sm-5 col-xs-6 tital " >
              <strong>Amount of Servings:</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewAmountofservings"></div>
            </div>
            <div class="col-sm-5 col-xs-6 tital " >
              <strong>Energy (Kcals):</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewEnergy"></div>
            </div> 

            <div class="col-sm-5 col-xs-6 tital " >
              <strong>Water (mls):</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewWater"></div>
            </div> 

            <div class="col-sm-5 col-xs-6 tital " >
              <strong>Protein (g):</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewProtein"></div>
            </div> 

            <div class="col-sm-5 col-xs-6 tital " >
              <strong>Fat (g):</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewFat"></div>
            </div> 
            
            <div class="col-sm-5 col-xs-6 tital " >
              <strong>Carbohydrate (g):</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewCarbohydrate"></div>
            </div>  

            <div class="col-sm-5 col-xs-6 tital " >
              <strong>Fiber (g):</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewFiber"></div>
            </div>  

            <div class="col-sm-5 col-xs-6 tital " >
              <strong>Calcium (mg):</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewCalcium"></div>
            </div>  
           

            <!-- 
            <div class="col-sm-5 col-xs-6 tital " >
              <strong> ():</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="view"></div>
            </div>  
            -->

          </div>
          <br>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  
  <!-- DELETE MODAL -->
  <div class="modal fade" id="deleteModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title text-center" id="exampleModalLabel">Delete Meal Entry</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="modal_meals.php" method="POST">

          <div class="modal-body">
            <input type="hidden" id="clientid" name="clientid" value="<?php echo $id ?>">

            <input type="hidden" name="deleteId" id="deleteId">

            <h4>Sure you want to delete?</h4>

          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
          <button type="submit" class="btn btn-primary" name="deleteData">Yes</button>
        </div>

        </form>
      </div>
    </div>
  </div>
  </div>