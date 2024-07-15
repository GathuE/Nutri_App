 <!-- The Modal -->
 <div id="myModal2" class="modal2">
    <!-- Modal content -->
    <div class="modal2-content">
        <div class="row">
            <div class="col">
                <span class="close2">&times;</span>
            </div>
        </div>
        <?php	
                $id=$_GET['plan'];
                $ret="select * from users 
                join eer_data on eer_data.clientref=users.ID  
                join goal_guide on goal_guide.client_ID=users.ID
                join bmi_data on bmi_data.user_ID=users.ID
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
        <div class="row" style="font-size:12px;">
            <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                <label>Adjust Weight: </label>
                <input class="form-control" type="number" name="weight" id="weight" placeholder="Enter Weight" >
                <input type="hidden" name="gender" id="gender" value="<?php echo htmlentities($result->gender);?>">
                <input type="hidden" name="age" id="age" value="<?php echo htmlentities($result->age);?>">
                <input type="hidden" name="height" id="height" value="<?php echo htmlentities($result->height);?>">
                <input type="hidden" name="pregnant" id="pregnant" value="<?php echo htmlentities($result->pregnant);?>">
                <input type="hidden" name="lactating" id="lactating" value="<?php echo htmlentities($result->lactating);?>">
            </div>
            <div class="col-5 col-sm-5 col-md-4 col-lg-4 col-xl-4">
                <label>Adjust P.A.L: </label>
                    <select class="form-control" name="work" id="work" style="width:100%;">
                            <option type="optgroup"  value="" >Choose One...</option>
                            <option type="optgroup"  value="Sedentary">Sedentary</option>
                            <option type="optgroup"  value="Light">Light</option>
                            <option type="optgroup"  value="Moderate">Moderate</option>
                            <option type="optgroup"  value="Heavy">Heavy</option>
                    </select>
               
            </div>
            <div class="col-3 col-sm-3 col-md-4 col-lg-4 col-xl-4">
                <button class="btn-primary" style="padding:5px;margin-top:35px;font-size:12px;" type="button" onclick="EER();"> Calculate Nutrients </button>
            </div>
        </div>
        <div class="row" style="margin-top:20px;">
            <div class="col">
                    <table class="table-sm table-responsive" style="font-size:12px;">
                        <tbody>
                            <tr style="text-align:center;font-size:9px;color:darkgreen;background:#f1f1f1;">
                                <th colspan="5">New EER is :</th>
                            </tr>
                            <tr style="text-align:center;font-size:10px;font-weight:900;color:darkorange;">
                                <td colspan="5"><input type="text" name="eer" id="eer" style="border:0;text-align:center;color:darkorange;"></td>
                            </tr>
                            <tr style="font-size:10px; text-align:center;font-weight:500;color:darkorange;">
                                <th colspan="5" >MACRO NUTRIENTS</th>
                            </tr>
                            <tr style="text-align:center;font-size:9px;color:darkgreen;background:#f1f1f1;">
                                <th>Protein</th>
                                <th>Fats</th>
                                <th>Carbohydrates</th>
                                <th>Water</th>
                                <th>Fibre</th>
                            </tr>
                            <tr style="text-align:center;font-size:10px;font-weight:600;color:darkorange;">
                                <td><input type="text" name="protein" id="protein" style="border:0;text-align:center;color:darkorange;"></td>
                                <td><input type="text" name="fat" id="fat" style="border:0;text-align:center;color:darkorange;"></td>
                                <td><input type="text" name="carbohydrate" id="carbohydrate" style="border:0;text-align:center;color:darkorange;"></td>
                                <td><input type="text" name="water" id="water" style="border:0;text-align:center;color:darkorange;"></td>
                                <td><input type="text" name="fibre" id="fibre" style="border:0;text-align:center;color:darkorange;"></td>
                            </tr>
                            <tr style="font-size:10px; text-align:center;font-weight:500;color:darkorange;">
                                <th colspan="5" >MICRO NUTRIENTS</th>
                            </tr>
                            <tr style="text-align:center;font-size:9px;color:darkgreen;background:#f1f1f1;">
                                <th>Calcium (Ca)</th>
                                <th>Iron (Fe)</th>
                                <th>Magnesium (Mg)</th>
                                <th>Phosphorous (P)</th>
                                <th>Potassium (K)</th>
                            </tr>
                            <tr style="text-align:center;font-size:10px;font-weight:900;color:darkorange;">
                                <td><input type="text" name="calcium" id="calcium" style="border:0;text-align:center;color:darkorange;"></td>
                                <td><input type="text" name="iron" id="iron" style="border:0;text-align:center;color:darkorange;"></td>
                                <td><input type="text" name="magnesium" id="magnesium" style="border:0;text-align:center;color:darkorange;"></td>
                                <td><input type="text" name="phosphorous" id="phosphorous" style="border:0;text-align:center;color:darkorange;"></td>
                                <td><input type="text" name="potassium" id="potassium" style="border:0;text-align:center;color:darkorange;"></td>
                            </tr>
                            <tr style="text-align:center;font-size:9px;color:darkgreen;background:#f1f1f1;">
                                <th>Sodium (Na)</th>
                                <th>Zinc (Zn)</th>
                                <th> Selenium (Se)</th>
                                <th>Vit A-RAE</th>
                                <th>Vit A-RE</th>
                            </tr>
                            <tr style="text-align:center;font-size:10px;font-weight:900;color:darkorange;">
                                <td><input type="text" name="sodium" id="sodium" style="border:0;text-align:center;color:darkorange;"></td>
                                <td><input type="text" name="zinc" id="zinc" style="border:0;text-align:center;color:darkorange;"></td>
                                <td><input type="text" name="sellenium" id="sellenium" style="border:0;text-align:center;color:darkorange;"></td>
                                <td><input type="text" name="vitarae" id="vitarae" style="border:0;text-align:center;color:darkorange;"></td>
                                <td><input type="text" name="vitare" id="vitare" style="border:0;text-align:center;color:darkorange;"></td>
                            </tr>
                            <tr style="text-align:center;font-size:9px;color:darkgreen;background:#f1f1f1;">
                                <th>Retinol</th>
                                <th>b-carotene</th>
                                <th>Thiamin</th>
                                <th>Riboflavin</th>
                                <th>Niacin</th>
                            </tr>
                            <tr style="text-align:center;font-size:10px;font-weight:900;color:darkorange;">
                                <td><input type="text" name="retinol" id="retinol" style="border:0;text-align:center;color:darkorange;"></td>
                                <td><input type="text" name="bcarotene" id="bcarotene" style="border:0;text-align:center;color:darkorange;"></td>
                                <td><input type="text" name="thiamin" id="thiamin" style="border:0;text-align:center;color:darkorange;"></td>
                                <td><input type="text" name="riboflavin" id="riboflavin" style="border:0;text-align:center;color:darkorange;"></td>
                                <td><input type="text" name="niacin" id="niacin" style="border:0;text-align:center;color:darkorange;"></td>
                            </tr>
                            <tr style="text-align:center;font-size:9px;color:darkgreen;background:#f1f1f1;">
                                <th>Dietary Folate</th>
                                <th>Food Folate</th>
                                <th>Vit B12</th>
                                <th>Vit C</th>
                                <th>Cholestrol</th>
                            </tr>
                            <tr style="text-align:center;font-size:10px;font-weight:900;color:darkorange;">
                                <td><input type="text" name="dietaryfolate" id="dietaryfolate" style="border:0;text-align:center;color:darkorange;"></td>
                                <td><input type="text" name="foodfolate" id="foodfolate" style="border:0;text-align:center;color:darkorange;"></td>
                                <td><input type="text" name="vitb12" id="vitb12" style="border:0;text-align:center;color:darkorange;"></td>
                                <td><input type="text" name="vitc" id="vitc" style="border:0;text-align:center;color:darkorange;"></td>
                                <td><input type="text" name="cholestrol" id="cholestrol" style="border:0;text-align:center;color:darkorange;"></td>
                            </tr>
                            <tr style="text-align:center;font-size:9px;color:darkgreen;background:#f1f1f1;">
                            
                                <th colspan="3">Oxalic Acid</th>
                                <th colspan="2">Phytate</th>
                            </tr>
                            <tr style="text-align:center;font-size:10px;font-weight:900;color:darkorange;">
                            
                                <td colspan="3"><input type="text" name="oxalicacid" id="oxalicacid" style="border:0;text-align:center;color:darkorange;"></td>
                                <td colspan="2"><input type="text" name="phytate" id="phytate" style="border:0;text-align:center;color:darkorange;"></td>
                            </tr>
                        </tbody>             
                    </table>
            </div>
        </div>

        <?php }} else{
                echo ' No Data Available !!';
                } 
        ?>
            
    </div>
</div>

<script>

     // Get the modal
     var modal2 = document.getElementById("myModal2");

     // Get the button that opens the modal
     var btn2 = document.getElementById("myBtn2");

     // Get the <span> element that closes the modal
     var span2 = document.getElementsByClassName("close2")[0];

     // When the user clicks the button, open the modal 
    btn2.onclick = function() {
    modal2.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span2.onclick = function() {
    modal2.style.display = "none";
    }
     // When the user clicks anywhere outside of the modal2, close it
     window.onclick = function(event) {
    if (event.target == modal2) {
        modal2.style.display = "none";
    }
    }


            // Calculate Reference Data
        function EER(){

        var h = document.getElementById("height").value;
        var w = document.getElementById("weight").value;
        var g = document.getElementById("gender").value;
        var p = document.getElementById("pregnant").value;
        var l = document.getElementById("lactating").value;
        var j = document.getElementById("work").value;
        var a = document.getElementById("age").value;


        //male EER  + Nutrients Calculation

        // (0.5 - 1 years)
        if (a >= 0.5 && a <= 1 && g == "Male") {
                var eer = (99 * w - 100) + 22;
                var protein = (eer * 0.0375).toFixed(1);
                var fat = (eer * 0.0333).toFixed(1);
                var carbohydrate = (eer * 0.1375).toFixed(1);
                var water = (eer * 1).toFixed(1);
                var fibre = 12;
                var calcium = 260;
                var iron = 11;
                var magnesium = 75;
                var phosphorous = 275;
                var potassium = 700;
                var sodium = 370;
                var zinc = 5;
                var sellenium = 20;
                var vitarae = 500;
                var vitare = 0;
                var retinol = 0;
                var bcarotene = 0;
                var thiamin = 0.3;
                var riboflavin = 0.4;
                var niacin = 4;
                var dietaryfolate = 80;
                var foodfolate = 0;
                var vitb12 = 0.5;
                var vitc = 50;
                var cholestrol = 300;
                var oxalicacid = 0;
                var phytate = 0;
        }  
        // 2 - 3 yrs
        else if (a >= 2 && a <= 3 && g == "Male") {
                var eer = (99 * w - 100) + 20;
                var protein = (eer * 0.0375).toFixed(1);
                var fat = (eer * 0.0333).toFixed(1);
                var carbohydrate = (eer * 0.1375).toFixed(1);
                var water = (eer * 1).toFixed(1);
                var fibre = 19;
                var calcium = 700;
                var iron = 7;
                var magnesium = 65;
                var phosphorous = 460;
                var potassium = 3000;
                var sodium = 1000;
                var zinc = 7;
                var sellenium = 20;
                var vitarae = 300;
                var vitare = 0;
                var retinol = 0;
                var bcarotene = 0;
                var thiamin = 0.5;
                var riboflavin = 0.5;
                var niacin = 6;
                var dietaryfolate = 150;
                var foodfolate = 0;
                var vitb12 = 0.9;
                var vitc = 15;
                var cholestrol = 300;
                var oxalicacid = 0;
                var phytate = 0;
        }
        // 4 - 8 yrs (PAL = Sedentary)
        else if (a >= 4 && a <= 8 && j == "Sedentary" && g == "Male") {
                var eer = 88.5 - 61.9 * a + 1.00 * (26.7 * w + 903 * (h / 100)) + 20;
                var protein = (eer * 0.0375).toFixed(1);
                var fat = (eer * 0.0333).toFixed(1);
                var carbohydrate = (eer * 0.1375).toFixed(1);
                var water = (eer * 1).toFixed(1);
                var fibre = 25;
                var calcium = 1000;
                var iron = 10;
                var magnesium = 130;
                var phosphorous = 500;
                var potassium = 3800;
                var sodium = 1200;
                var zinc = 12;
                var sellenium = 30;
                var vitarae = 400;
                var vitare = 0;
                var retinol = 0;
                var bcarotene = 0;
                var thiamin = 0.6;
                var riboflavin = 0.6;
                var niacin = 8;
                var dietaryfolate = 200;
                var foodfolate = 0;
                var vitb12 = 1.2;
                var vitc = 25;
                var cholestrol = 300;
                var oxalicacid = 0;
                var phytate = 0;
        }
        // 4 - 8 yrs (PAL = Light)
        else if (a >= 4 && a <= 8 && j == "Light" && g == "Male") {
                var eer = 88.5 - 61.9 * a + 1.13 * (26.7 * w + 903 * (h / 100)) + 20;
                var protein = (eer * 0.0375).toFixed(1);
                var fat = (eer * 0.0333).toFixed(1);
                var carbohydrate = (eer * 0.1375).toFixed(1);
                var water = (eer * 1).toFixed(1);
                var fibre = 25;
                var calcium = 1000;
                var iron = 10;
                var magnesium = 130;
                var phosphorous = 500;
                var potassium = 3800;
                var sodium = 1200;
                var zinc = 12;
                var sellenium = 30;
                var vitarae = 400;
                var vitare = 0;
                var retinol = 0;
                var bcarotene = 0;
                var thiamin = 0.6;
                var riboflavin = 0.6;
                var niacin = 8;
                var dietaryfolate = 200;
                var foodfolate = 0;
                var vitb12 = 1.2;
                var vitc = 25;
                var cholestrol = 300;
                var oxalicacid = 0;
                var phytate = 0;
        }
        // 4 - 8 yrs (PAL = Moderate)
        else if (a >= 4 && a <= 8 && j == "Moderate" && g == "Male") {
                var eer = 88.5 - 61.9 * a + 1.26 * (26.7 * w + 903 * (h / 100)) + 20;
                var protein = (eer * 0.0375).toFixed(1);
                var fat = (eer * 0.0333).toFixed(1);
                var carbohydrate = (eer * 0.1375).toFixed(1);
                var water = (eer * 1).toFixed(1);
                var fibre = 25;
                var calcium = 1000;
                var iron = 10;
                var magnesium = 130;
                var phosphorous = 500;
                var potassium = 3800;
                var sodium = 1200;
                var zinc = 12;
                var sellenium = 30;
                var vitarae = 400;
                var vitare = 0;
                var retinol = 0;
                var bcarotene = 0;
                var thiamin = 0.6;
                var riboflavin = 0.6;
                var niacin = 8;
                var dietaryfolate = 200;
                var foodfolate = 0;
                var vitb12 = 1.2;
                var vitc = 25;
                var cholestrol = 300;
                var oxalicacid = 0;
                var phytate = 0;
        }
        // 4 - 8 yrs (PAL = Heavy)
        else if (a >= 4 && a <= 8 && j == "Heavy" && g == "Male") {
            var eer = 88.5 - 61.9 * a + 1.42 * (26.7 * w + 903 * (h / 100)) + 20;
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 25;
            var calcium = 1000;
            var iron = 10;
            var magnesium = 130;
            var phosphorous = 500;
            var potassium = 3800;
            var sodium = 1200;
            var zinc = 12;
            var sellenium = 30;
            var vitarae = 400;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 0.6;
            var riboflavin = 0.6;
            var niacin = 8;
            var dietaryfolate = 200;
            var foodfolate = 0;
            var vitb12 = 1.2;
            var vitc = 25;
            var cholestrol = 300;
            var oxalicacid = 0;
            var phytate = 0;
        }
        // 9 - 13 yrs (PAL = Sedentary)
        else if (a >= 9 && a <= 13 && j == "Sedentary" && g == "Male") {
            var eer = 88.5 - 61.9 * a + 1.00 * (26.7 * w + 903 * (h / 100)) + 25;
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 31;
            var calcium = 1300;
            var iron = 8;
            var magnesium = 240;
            var phosphorous = 1250;
            var potassium = 4500;
            var sodium = 1500;
            var zinc = 12;
            var sellenium = 40;
            var vitarae = 600;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 0.9;
            var riboflavin = 0.9;
            var niacin = 12;
            var dietaryfolate = 300;
            var foodfolate = 0;
            var vitb12 = 1.8;
            var vitc = 45;
            var cholestrol = 300;
            var oxalicacid = 0;
            var phytate = 0;
        }
        // 9 - 13 yrs (PAL = Light)
        else if (a >= 9 && a <= 13 && j == "Light" && g == "Male") {
            var eer = 88.5 - 61.9 * a + 1.13 * (26.7 * w + 903 * (h / 100)) + 25;
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 31;
            var calcium = 1300;
            var iron = 8;
            var magnesium = 240;
            var phosphorous = 1250;
            var potassium = 4500;
            var sodium = 1500;
            var zinc = 12;
            var sellenium = 40;
            var vitarae = 600;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 0.9;
            var riboflavin = 0.9;
            var niacin = 12;
            var dietaryfolate = 300;
            var foodfolate = 0;
            var vitb12 = 1.8;
            var vitc = 45;
            var cholestrol = 300;
            var oxalicacid = 0;
            var phytate = 0;
        }
        // 9 - 13 yrs (PAL = Moderate)
        else if (a >= 9 && a <= 13 && j == "Moderate" && g == "Male") {
            var eer = 88.5 - 61.9 * a + 1.26 * (26.7 * w + 903 * (h / 100)) + 25;
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 31;
            var calcium = 1300;
            var iron = 8;
            var magnesium = 240;
            var phosphorous = 1250;
            var potassium = 4500;
            var sodium = 1500;
            var zinc = 12;
            var sellenium = 40;
            var vitarae = 600;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 0.9;
            var riboflavin = 0.9;
            var niacin = 12;
            var dietaryfolate = 300;
            var foodfolate = 0;
            var vitb12 = 1.8;
            var vitc = 45;
            var cholestrol = 300;
            var oxalicacid = 0;
            var phytate = 0;
        }
        // 9 - 13 yrs (PAL = Heavy)
        else if (a >= 9 && a <= 13 && j == "Heavy" && g == "Male") {
            var eer = 88.5 - 61.9 * a + 1.42 * (26.7 * w + 903 * (h / 100)) + 25;
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 31;
            var calcium = 1300;
            var iron = 8;
            var magnesium = 240;
            var phosphorous = 1250;
            var potassium = 4500;
            var sodium = 1500;
            var zinc = 12;
            var sellenium = 40;
            var vitarae = 600;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 0.9;
            var riboflavin = 0.9;
            var niacin = 12;
            var dietaryfolate = 300;
            var foodfolate = 0;
            var vitb12 = 1.8;
            var vitc = 45;
            var cholestrol = 300;
            var oxalicacid = 0;
            var phytate = 0;
        }
        // 14 -18 (PAL = Sedentary)
        else if (a >= 14 && a <= 18 && j == "Sedentary" && g == "Male") {
            var eer = 88.5 - 61.9 * a + 1.00 * (26.7 * w + 903 * (h / 100)) + 25;
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 38;
            var calcium = 1300;
            var iron = 11;
            var magnesium = 410;
            var phosphorous = 1250;
            var potassium = 4700;
            var sodium = 2300;
            var zinc = 11;
            var sellenium = 55;
            var vitarae = 900;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 1.2;
            var riboflavin = 1.3;
            var niacin = 16;
            var dietaryfolate = 400;
            var foodfolate = 0;
            var vitb12 = 2.4;
            var vitc = 75;
            var cholestrol = 300;
            var oxalicacid = 0;
            var phytate = 0;
        }
        // 14 -18 (PAL = Light)
        else if (a >= 14 && a <= 18 && j == "Light" && g == "Male") {
            var eer = 88.5 - 61.9 * a + 1.13 * (26.7 * w + 903 * (h / 100)) + 25;
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 38;
            var calcium = 1300;
            var iron = 11;
            var magnesium = 410;
            var phosphorous = 1250;
            var potassium = 4700;
            var sodium = 2300;
            var zinc = 11;
            var sellenium = 55;
            var vitarae = 900;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 1.2;
            var riboflavin = 1.3;
            var niacin = 16;
            var dietaryfolate = 400;
            var foodfolate = 0;
            var vitb12 = 2.4;
            var vitc = 75;
            var cholestrol = 300;
            var oxalicacid = 0;
            var phytate = 0;
        }
        // 14 -18 (PAL = Moderate)
        else if (a >= 14 && a <= 18 && j == "Moderate" && g == "Male") {
            var eer = 88.5 - 61.9 * a + 1.26 * (26.7 * w + 903 * (h / 100)) + 25;
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 38;
            var calcium = 1300;
            var iron = 11;
            var magnesium = 410;
            var phosphorous = 1250;
            var potassium = 4700;
            var sodium = 2300;
            var zinc = 11;
            var sellenium = 55;
            var vitarae = 900;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 1.2;
            var riboflavin = 1.3;
            var niacin = 16;
            var dietaryfolate = 400;
            var foodfolate = 0;
            var vitb12 = 2.4;
            var vitc = 75;
            var cholestrol = 300;
            var oxalicacid = 0;
            var phytate = 0;
        }
        // 14 -18 (PAL = Heavy)
        else if (a >= 14 && a <= 18 && j == "Heavy" && g == "Male") {
            var eer = 88.5 - 61.9 * a + 1.42 * (26.7 * w + 903 * (h / 100)) + 25;
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 38;
            var calcium = 1300;
            var iron = 11;
            var magnesium = 410;
            var phosphorous = 1250;
            var potassium = 4700;
            var sodium = 2300;
            var zinc = 11;
            var sellenium = 55;
            var vitarae = 900;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 1.2;
            var riboflavin = 1.3;
            var niacin = 16;
            var dietaryfolate = 400;
            var foodfolate = 0;
            var vitb12 = 2.4;
            var vitc = 75;
            var cholestrol = 300;
            var oxalicacid = 0;
            var phytate = 0;
        }
        //19 -30 (PAL = Sedentary)
        else if (a >= 19 && a <= 30 && j == "Sedentary" && g == "Male") {
            var eer = 662 - 9.53 * a + 1.00 * (15.91 * w + 539.6 * (h / 100));
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 38;
            var calcium = 1000;
            var iron = 8;
            var magnesium = 400;
            var phosphorous = 700;
            var potassium = 4700;
            var sodium = 2300;
            var zinc = 11;
            var sellenium = 55;
            var vitarae = 900;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 1.2;
            var riboflavin = 1.3;
            var niacin = 16;
            var dietaryfolate = 400;
            var foodfolate = 0;
            var vitb12 = 2.4;
            var vitc = 90;
            var cholestrol = 300;
            var oxalicacid = 0;
            var phytate = 0;
        }
        //19 -30 (PAL = Light)
        else if (a >= 19 && a <= 30 && j == "Light" && g == "Male") {
            var eer = 662 - 9.53 * a + 1.11 * (15.91 * w + 539.6 * (h / 100));
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 38;
            var calcium = 1000;
            var iron = 8;
            var magnesium = 400;
            var phosphorous = 700;
            var potassium = 4700;
            var sodium = 2300;
            var zinc = 11;
            var sellenium = 55;
            var vitarae = 900;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 1.2;
            var riboflavin = 1.3;
            var niacin = 16;
            var dietaryfolate = 400;
            var foodfolate = 0;
            var vitb12 = 2.4;
            var vitc = 90;
            var cholestrol = 300;
            var oxalicacid = 0;
            var phytate = 0;
        }
        //19 -30 (PAL = Moderate)
        else if (a >= 19 && a <= 30 && j == "Moderate" && g == "Male") {
            var eer = 662 - 9.53 * a + 1.25 * (15.91 * w + 539.6 * (h / 100));
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 38;
            var calcium = 1000;
            var iron = 8;
            var magnesium = 400;
            var phosphorous = 700;
            var potassium = 4700;
            var sodium = 2300;
            var zinc = 11;
            var sellenium = 55;
            var vitarae = 900;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 1.2;
            var riboflavin = 1.3;
            var niacin = 16;
            var dietaryfolate = 400;
            var foodfolate = 0;
            var vitb12 = 2.4;
            var vitc = 90;
            var cholestrol = 300;
            var oxalicacid = 0;
            var phytate = 0;
        }
        //19 -30 (PAL = Heavy)
        else if (a >= 19 && a <= 30 && j == "Heavy" && g == "Male") {
            var eer = 662 - 9.53 * a + 1.48 * (15.91 * w + 539.6 * (h / 100));
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 38;
            var calcium = 1000;
            var iron = 8;
            var magnesium = 400;
            var phosphorous = 700;
            var potassium = 4700;
            var sodium = 2300;
            var zinc = 11;
            var sellenium = 55;
            var vitarae = 900;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 1.2;
            var riboflavin = 1.3;
            var niacin = 16;
            var dietaryfolate = 400;
            var foodfolate = 0;
            var vitb12 = 2.4;
            var vitc = 90;
            var cholestrol = 300;
            var oxalicacid = 0;
            var phytate = 0;
        }
        //31 - 50 (PAL = Sedentary)
        else if (a >= 31 && a <= 50 && j == "Sedentary" && g == "Male") {
            var eer = 662 - 9.53 * a + 1.00 * (15.91 * w + 539.6 * (h / 100));
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 38;
            var calcium = 1000;
            var iron = 8;
            var magnesium = 420;
            var phosphorous = 700;
            var potassium = 4700;
            var sodium = 2300;
            var zinc = 11;
            var sellenium = 55;
            var vitarae = 900;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 1.2;
            var riboflavin = 1.3;
            var niacin = 16;
            var dietaryfolate = 400;
            var foodfolate = 0;
            var vitb12 = 2.4;
            var vitc = 90;
            var cholestrol = 300;
            var oxalicacid = 0;
            var phytate = 0;
        }
        //31 - 50 (PAL = Light)
        else if (a >= 31 && a <= 50 && j == "Light" && g == "Male") {
            var eer = 662 - 9.53 * a + 1.11 * (15.91 * w + 539.6 * (h / 100));
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 38;
            var calcium = 1000;
            var iron = 8;
            var magnesium = 420;
            var phosphorous = 700;
            var potassium = 4700;
            var sodium = 2300;
            var zinc = 11;
            var sellenium = 55;
            var vitarae = 900;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 1.2;
            var riboflavin = 1.3;
            var niacin = 16;
            var dietaryfolate = 400;
            var foodfolate = 0;
            var vitb12 = 2.4;
            var vitc = 90;
            var cholestrol = 300;
            var oxalicacid = 0;
            var phytate = 0;
        }
        //31 - 50 (PAL = Moderate)
        else if (a >= 31 && a <= 50 && j == "Moderate" && g == "Male") {
            var eer = 662 - 9.53 * a + 1.25 * (15.91 * w + 539.6 * (h / 100));
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 38;
            var calcium = 1000;
            var iron = 8;
            var magnesium = 420;
            var phosphorous = 700;
            var potassium = 4700;
            var sodium = 2300;
            var zinc = 11;
            var sellenium = 55;
            var vitarae = 900;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 1.2;
            var riboflavin = 1.3;
            var niacin = 16;
            var dietaryfolate = 400;
            var foodfolate = 0;
            var vitb12 = 2.4;
            var vitc = 90;
            var cholestrol = 300;
            var oxalicacid = 0;
            var phytate = 0;
        }
        //31 - 50 (PAL = Heavy)
        else if (a >= 31 && a <= 50 && j == "Heavy" && g == "Male") {
            var eer = 662 - 9.53 * a + 1.48 * (15.91 * w + 539.6 * (h / 100));
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 38;
            var calcium = 1000;
            var iron = 8;
            var magnesium = 420;
            var phosphorous = 700;
            var potassium = 4700;
            var sodium = 2300;
            var zinc = 11;
            var sellenium = 55;
            var vitarae = 900;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 1.2;
            var riboflavin = 1.3;
            var niacin = 16;
            var dietaryfolate = 400;
            var foodfolate = 0;
            var vitb12 = 2.4;
            var vitc = 90;
            var cholestrol = 300;
            var oxalicacid = 0;
            var phytate = 0;
        }
        //51 - 70 (PAL = Sedentary)
        else if (a >= 51 && a <= 70 && j == "Sedentary" && g == "Male") {
            var eer = 662 - 9.53 * a + 1.00 * (15.91 * w + 539.6 * (h / 100));
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 30;
            var calcium = 1000;
            var iron = 8;
            var magnesium = 420;
            var phosphorous = 700;
            var potassium = 4700;
            var sodium = 2300;
            var zinc = 11;
            var sellenium = 55;
            var vitarae = 900;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 1.2;
            var riboflavin = 1.3;
            var niacin = 16;
            var dietaryfolate = 400;
            var foodfolate = 0;
            var vitb12 = 2.4;
            var vitc = 90;
            var cholestrol = 300;
            var oxalicacid = 0;
            var phytate = 0;
        }
        //51 - 70 (PAL = Light)
        else if (a >= 51 && a <= 70 && j == "Light" && g == "Male") {
            var eer = 662 - 9.53 * a + 1.11 * (15.91 * w + 539.6 * (h / 100));
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 30;
            var calcium = 1000;
            var iron = 8;
            var magnesium = 420;
            var phosphorous = 700;
            var potassium = 4700;
            var sodium = 2300;
            var zinc = 11;
            var sellenium = 55;
            var vitarae = 900;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 1.2;
            var riboflavin = 1.3;
            var niacin = 16;
            var dietaryfolate = 400;
            var foodfolate = 0;
            var vitb12 = 2.4;
            var vitc = 90;
            var cholestrol = 300;
            var oxalicacid = 0;
            var phytate = 0;
        }
        //51 - 70 (PAL = Moderate)
        else if (a >= 51 && a <= 70 && j == "Moderate" && g == "Male") {
            var eer = 662 - 9.53 * a + 1.25 * (15.91 * w + 539.6 * (h / 100));
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 30;
            var calcium = 1000;
            var iron = 8;
            var magnesium = 420;
            var phosphorous = 700;
            var potassium = 4700;
            var sodium = 2300;
            var zinc = 11;
            var sellenium = 55;
            var vitarae = 900;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 1.2;
            var riboflavin = 1.3;
            var niacin = 16;
            var dietaryfolate = 400;
            var foodfolate = 0;
            var vitb12 = 2.4;
            var vitc = 90;
            var cholestrol = 300;
            var oxalicacid = 0;
            var phytate = 0;
        }
        //51 - 70 (PAL = Heavy)
        else if (a >= 51 && a <= 70 && j == "Heavy" && g == "Male") {
            var eer = 662 - 9.53 * a + 1.48 * (15.91 * w + 539.6 * (h / 100));
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 30;
            var calcium = 1000;
            var iron = 8;
            var magnesium = 420;
            var phosphorous = 700;
            var potassium = 4700;
            var sodium = 2300;
            var zinc = 11;
            var sellenium = 55;
            var vitarae = 900;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 1.2;
            var riboflavin = 1.3;
            var niacin = 16;
            var dietaryfolate = 400;
            var foodfolate = 0;
            var vitb12 = 2.4;
            var vitc = 90;
            var cholestrol = 300;
            var oxalicacid = 0;
            var phytate = 0;
        }
        //71 - 100 (PAL = Sedentary)
        else if (a >= 71 && a <= 100 && j == "Sedentary" && g == "Male") {
            var eer = 662 - 9.53 * a + 1.00 * (15.91 * w + 539.6 * (h / 100));
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 30;
            var calcium = 1200;
            var iron = 8;
            var magnesium = 420;
            var phosphorous = 700;
            var potassium = 4700;
            var sodium = 1200;
            var zinc = 11;
            var sellenium = 55;
            var vitarae = 900;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 1.2;
            var riboflavin = 1.3;
            var niacin = 16;
            var dietaryfolate = 400;
            var foodfolate = 0;
            var vitb12 = 2.4;
            var vitc = 90;
            var cholestrol = 300;
            var oxalicacid = 0;
            var phytate = 0;
        }
        //71 - 100 (PAL = Light)
        else if (a >= 71 && a <= 100 && j == "Light" && g == "Male") {
            var eer = 662 - 9.53 * a + 1.11 * (15.91 * w + 539.6 * (h / 100));
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 30;
            var calcium = 1200;
            var iron = 8;
            var magnesium = 420;
            var phosphorous = 700;
            var potassium = 4700;
            var sodium = 1200;
            var zinc = 11;
            var sellenium = 55;
            var vitarae = 900;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 1.2;
            var riboflavin = 1.3;
            var niacin = 16;
            var dietaryfolate = 400;
            var foodfolate = 0;
            var vitb12 = 2.4;
            var vitc = 90;
            var cholestrol = 300;
            var oxalicacid = 0;
            var phytate = 0;
        }
        //71 - 100 (PAL = Moderate)
        else if (a >= 71 && a <= 100 && j == "Moderate" && g == "Male") {
            var eer = 662 - 9.53 * a + 1.25 * (15.91 * w + 539.6 * (h / 100));
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 30;
            var calcium = 1200;
            var iron = 8;
            var magnesium = 420;
            var phosphorous = 700;
            var potassium = 4700;
            var sodium = 1200;
            var zinc = 11;
            var sellenium = 55;
            var vitarae = 900;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 1.2;
            var riboflavin = 1.3;
            var niacin = 16;
            var dietaryfolate = 400;
            var foodfolate = 0;
            var vitb12 = 2.4;
            var vitc = 90;
            var cholestrol = 300;
            var oxalicacid = 0;
            var phytate = 0;
        }
        //71 - 100 (PAL = Heavy)
        else if (a >= 71 && a <= 100 && j == "Heavy" && g == "Male") {
            var eer = 662 - 9.53 * a + 1.48 * (15.91 * w + 539.6 * (h / 100));
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 30;
            var calcium = 1200;
            var iron = 8;
            var magnesium = 420;
            var phosphorous = 700;
            var potassium = 4700;
            var sodium = 1200;
            var zinc = 11;
            var sellenium = 55;
            var vitarae = 900;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 1.2;
            var riboflavin = 1.3;
            var niacin = 16;
            var dietaryfolate = 400;
            var foodfolate = 0;
            var vitb12 = 2.4;
            var vitc = 90;
            var cholestrol = 300;
            var oxalicacid = 0;
            var phytate = 0;
        }

        //End of male EER  + Nutrients Calculation

        //Female EER  + Nutrients Calculation

        // (0.5 - 1 years)
        else if (a >= 0.5 && a <= 1 && g == "Female") {
            var eer = (99 * w - 100) + 22;
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 12;
            var calcium = 260;
            var iron = 11;
            var magnesium = 75;
            var phosphorous = 275;
            var potassium = 700;
            var sodium = 370;
            var zinc = 3;
            var sellenium = 20;
            var vitarae = 500;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 0.3;
            var riboflavin = 0.4;
            var niacin = 4;
            var dietaryfolate = 80;
            var foodfolate = 0;
            var vitb12 = 0.5;
            var vitc = 30;
            var cholestrol = 0;
            var oxalicacid = 0;
            var phytate = 0;
        }
        //(2 - 3 years)
        else if (a >= 2 && a <= 3 && g == "Female") {
            var eer = (99 * w - 100) + 20;
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 19;
            var calcium = 700;
            var iron = 9;
            var magnesium = 80;
            var phosphorous = 460;
            var potassium = 3000;
            var sodium = 1000;
            var zinc = 3;
            var sellenium = 20;
            var vitarae = 300;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 0.5;
            var riboflavin = 0.5;
            var niacin = 6;
            var dietaryfolate = 150;
            var foodfolate = 0;
            var vitb12 = 0.9;
            var vitc = 35;
            var cholestrol = 0;
            var oxalicacid = 0;
            var phytate = 0;
        }
        //4 - 8 (PAL = Sedentary)
        else if (a >= 4 && a <= 8 && j == "Sedentary" && g == "Female") {
            var eer = (135.3 - (30.8 * a) + (10 * w * 1.00)) + (934 * h / 100) + 20;
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 25;
            var calcium = 1000;
            var iron = 10;
            var magnesium = 130;
            var phosphorous = 500;
            var potassium = 3800;
            var sodium = 1200;
            var zinc = 5;
            var sellenium = 30;
            var vitarae = 400;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 0.6;
            var riboflavin = 0.6;
            var niacin = 8;
            var dietaryfolate = 200;
            var foodfolate = 0;
            var vitb12 = 1.2;
            var vitc = 35;
            var cholestrol = 0;
            var oxalicacid = 0;
            var phytate = 0;
        }
        //4 - 8 (PAL = Light)
        else if (a >= 4 && a <= 8 && j == "Light" && g == "Female") {
            var eer = (135.3 - (30.8 * a) + (10 * w * 1.16)) + (934 * h / 100) + 20;
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 25;
            var calcium = 1000;
            var iron = 10;
            var magnesium = 130;
            var phosphorous = 500;
            var potassium = 3800;
            var sodium = 1200;
            var zinc = 5;
            var sellenium = 30;
            var vitarae = 400;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 0.6;
            var riboflavin = 0.6;
            var niacin = 8;
            var dietaryfolate = 200;
            var foodfolate = 0;
            var vitb12 = 1.2;
            var vitc = 35;
            var cholestrol = 0;
            var oxalicacid = 0;
            var phytate = 0;
        }
        //4 - 8 (PAL = Moderate)
        else if (a >= 4 && a <= 8 && j == "Moderate" && g == "Female") {
            var eer = (135.3 - (30.8 * a) + (10 * w * 1.31)) + (934 * h / 100) + 20;
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 25;
            var calcium = 1000;
            var iron = 10;
            var magnesium = 130;
            var phosphorous = 500;
            var potassium = 3800;
            var sodium = 1200;
            var zinc = 5;
            var sellenium = 30;
            var vitarae = 400;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 0.6;
            var riboflavin = 0.6;
            var niacin = 8;
            var dietaryfolate = 200;
            var foodfolate = 0;
            var vitb12 = 1.2;
            var vitc = 35;
            var cholestrol = 0;
            var oxalicacid = 0;
            var phytate = 0;
        }
        //4 - 8 (PAL = Heavy)
        else if (a >= 4 && a <= 8 && j == "Heavy" && g == "Female") {
            var eer = (135.3 - (30.8 * a) + (10 * w * 1.56)) + (934 * h / 100) + 20;
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 25;
            var calcium = 1000;
            var iron = 10;
            var magnesium = 130;
            var phosphorous = 500;
            var potassium = 3800;
            var sodium = 1200;
            var zinc = 5;
            var sellenium = 30;
            var vitarae = 400;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 0.6;
            var riboflavin = 0.6;
            var niacin = 8;
            var dietaryfolate = 200;
            var foodfolate = 0;
            var vitb12 = 1.2;
            var vitc = 35;
            var cholestrol = 0;
            var oxalicacid = 0;
            var phytate = 0;
        }
        //9 - 13 (PAL = Sedentary)
        else if (a >= 9 && a <= 13 && j == "Sedentary" && g == "Female") {
            var eer = (135.3 - (30.8 * a) + (10 * w * 1.00)) + (934 * h / 100) + 25;
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 26;
            var calcium = 1300;
            var iron = 8;
            var magnesium = 240;
            var phosphorous = 1250;
            var potassium = 4500;
            var sodium = 1500;
            var zinc = 8;
            var sellenium = 40;
            var vitarae = 600;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 0.9;
            var riboflavin = 0.9;
            var niacin = 12;
            var dietaryfolate = 300;
            var foodfolate = 0;
            var vitb12 = 1.8;
            var vitc = 45;
            var cholestrol = 0;
            var oxalicacid = 0;
            var phytate = 0;
        }
        //9 - 13 (PAL = Light)
        else if (a >= 9 && a <= 13 && j == "Light" && g == "Female") {
            var eer = (135.3 - (30.8 * a) + (10 * w * 1.16)) + (934 * h / 100) + 25;
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 26;
            var calcium = 1300;
            var iron = 8;
            var magnesium = 240;
            var phosphorous = 1250;
            var potassium = 4500;
            var sodium = 1500;
            var zinc = 8;
            var sellenium = 40;
            var vitarae = 600;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 0.9;
            var riboflavin = 0.9;
            var niacin = 12;
            var dietaryfolate = 300;
            var foodfolate = 0;
            var vitb12 = 1.8;
            var vitc = 45;
            var cholestrol = 0;
            var oxalicacid = 0;
            var phytate = 0;
        }
        //9 - 13 (PAL = Moderate)
        else if (a >= 9 && a <= 13 && j == "Moderate" && g == "Female") {
            var eer = (135.3 - (30.8 * a) + (10 * w * 1.31)) + (934 * h / 100) + 25;
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 26;
            var calcium = 1300;
            var iron = 8;
            var magnesium = 240;
            var phosphorous = 1250;
            var potassium = 4500;
            var sodium = 1500;
            var zinc = 8;
            var sellenium = 40;
            var vitarae = 600;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 0.9;
            var riboflavin = 0.9;
            var niacin = 12;
            var dietaryfolate = 300;
            var foodfolate = 0;
            var vitb12 = 1.8;
            var vitc = 45;
            var cholestrol = 0;
            var oxalicacid = 0;
            var phytate = 0;
        }
        //9 - 13 (PAL = Heavy)
        else if (a >= 9 && a <= 13 && j == "Heavy" && g == "Female") {
            var eer = (135.3 - (30.8 * a) + (10 * w * 1.31)) + (934 * h / 100) + 25;
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 26;
            var calcium = 1300;
            var iron = 8;
            var magnesium = 240;
            var phosphorous = 1250;
            var potassium = 4500;
            var sodium = 1500;
            var zinc = 8;
            var sellenium = 40;
            var vitarae = 600;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 0.9;
            var riboflavin = 0.9;
            var niacin = 12;
            var dietaryfolate = 300;
            var foodfolate = 0;
            var vitb12 = 1.8;
            var vitc = 45;
            var cholestrol = 0;
            var oxalicacid = 0;
            var phytate = 0;
        }
        //14 - 18 (NON PREGNANT & NON LACTATING)

        //(PAL = Sedentary)
        else if (a >= 14 && a <= 18 && j == "Sedentary" && p == "No" && l == "No" && g == "Female") {
            var eer = (135.3 - (30.8 * a) + (10 * w * 1.00)) + (934 * h / 100) + 25;
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 26;
            var calcium = 1400;
            var iron = 15;
            var magnesium = 360;
            var phosphorous = 1250;
            var potassium = 4700;
            var sodium = 2300;
            var zinc = 9;
            var sellenium = 55;
            var vitarae = 700;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 1;
            var riboflavin = 1;
            var niacin = 14;
            var dietaryfolate = 400;
            var foodfolate = 0;
            var vitb12 = 2.4;
            var vitc = 65;
            var cholestrol = 300;
            var oxalicacid = 0;
            var phytate = 0;
        }
        //(PAL = Light)
        else if (a >= 14 && a <= 18 && j == "Light" && p == "No" && l == "No" && g == "Female") {
            var eer = (135.3 - (30.8 * a) + (10 * w * 1.16)) + (934 * h / 100) + 25;
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 26;
            var calcium = 1400;
            var iron = 15;
            var magnesium = 360;
            var phosphorous = 1250;
            var potassium = 4700;
            var sodium = 2300;
            var zinc = 9;
            var sellenium = 55;
            var vitarae = 700;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 1;
            var riboflavin = 1;
            var niacin = 14;
            var dietaryfolate = 400;
            var foodfolate = 0;
            var vitb12 = 2.4;
            var vitc = 65;
            var cholestrol = 300;
            var oxalicacid = 0;
            var phytate = 0;
        }
        //(PAL = Moderate)
        else if (a >= 14 && a <= 18 && j == "Moderate" && p == "No" && l == "No" && g == "Female") {
            var eer = (135.3 - (30.8 * a) + (10 * w * 1.31)) + (934 * h / 100) + 25;
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 26;
            var calcium = 1400;
            var iron = 15;
            var magnesium = 360;
            var phosphorous = 1250;
            var potassium = 4700;
            var sodium = 2300;
            var zinc = 9;
            var sellenium = 55;
            var vitarae = 700;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 1;
            var riboflavin = 1;
            var niacin = 14;
            var dietaryfolate = 400;
            var foodfolate = 0;
            var vitb12 = 2.4;
            var vitc = 65;
            var cholestrol = 300;
            var oxalicacid = 0;
            var phytate = 0;
        }
        //(PAL = Heavy)
        else if (a >= 14 && a <= 18 && j == "Heavy" && p == "No" && l == "No" && g == "Female") {
            var eer = (135.3 - (30.8 * a) + (10 * w * 1.56)) + (934 * h / 100) + 25;
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 26;
            var calcium = 1400;
            var iron = 15;
            var magnesium = 360;
            var phosphorous = 1250;
            var potassium = 4700;
            var sodium = 2300;
            var zinc = 9;
            var sellenium = 55;
            var vitarae = 700;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 1;
            var riboflavin = 1;
            var niacin = 14;
            var dietaryfolate = 400;
            var foodfolate = 0;
            var vitb12 = 2.4;
            var vitc = 65;
            var cholestrol = 300;
            var oxalicacid = 0;
            var phytate = 0;
        }

        //14 - 18 (PREGNANT & NON LACTATING)

        //(PAL = Sedentary)
        else if (a >= 14 && a <= 18 && j == "Sedentary" && p == "Yes" && l == "No" && g == "Female") {
            var eer = (135.3 - (30.8 * a) + (10 * w * 1.00)) + (934 * h / 100) + 25 + 272 + 180;
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 28;
            var calcium = 1300;
            var iron = 27;
            var magnesium = 400;
            var phosphorous = 1250;
            var potassium = 4700;
            var sodium = 2300;
            var zinc = 12;
            var sellenium = 60;
            var vitarae = 750;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 1.4;
            var riboflavin = 1.4;
            var niacin = 18;
            var dietaryfolate = 600;
            var foodfolate = 0;
            var vitb12 = 2.6;
            var vitc = 80;
            var cholestrol = 300;
            var oxalicacid = 0;
            var phytate = 0;
        }
        //(PAL = Light)
        else if (a >= 14 && a <= 18 && j == "Light" && p == "Yes" && l == "No" && g == "Female") {
            var eer = (135.3 - (30.8 * a) + (10 * w * 1.12)) + (934 * h / 100) + 25 + 272 + 180;
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 28;
            var calcium = 1300;
            var iron = 27;
            var magnesium = 400;
            var phosphorous = 1250;
            var potassium = 4700;
            var sodium = 2300;
            var zinc = 12;
            var sellenium = 60;
            var vitarae = 750;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 1.4;
            var riboflavin = 1.4;
            var niacin = 18;
            var dietaryfolate = 600;
            var foodfolate = 0;
            var vitb12 = 2.6;
            var vitc = 80;
            var cholestrol = 300;
            var oxalicacid = 0;
            var phytate = 0;
        }
        //(PAL = Moderate)
        else if (a >= 14 && a <= 18 && j == "Moderate" && p == "Yes" && l == "No" && g == "Female") {
            var eer = (135.3 - (30.8 * a) + (10 * w * 1.27)) + (934 * h / 100) + 25 + 272 + 180;
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 28;
            var calcium = 1300;
            var iron = 27;
            var magnesium = 400;
            var phosphorous = 1250;
            var potassium = 4700;
            var sodium = 2300;
            var zinc = 12;
            var sellenium = 60;
            var vitarae = 750;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 1.4;
            var riboflavin = 1.4;
            var niacin = 18;
            var dietaryfolate = 600;
            var foodfolate = 0;
            var vitb12 = 2.6;
            var vitc = 80;
            var cholestrol = 300;
            var oxalicacid = 0;
            var phytate = 0;
        }
        //(PAL = Heavy)
        else if (a >= 14 && a <= 18 && j == "Heavy" && p == "Yes" && l == "No" && g == "Female") {
            var eer = (135.3 - (30.8 * a) + (10 * w * 1.45)) + (934 * h / 100) + 25 + 272 + 180;
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 28;
            var calcium = 1300;
            var iron = 27;
            var magnesium = 400;
            var phosphorous = 1250;
            var potassium = 4700;
            var sodium = 2300;
            var zinc = 12;
            var sellenium = 60;
            var vitarae = 750;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 1.4;
            var riboflavin = 1.4;
            var niacin = 18;
            var dietaryfolate = 600;
            var foodfolate = 0;
            var vitb12 = 2.6;
            var vitc = 80;
            var cholestrol = 300;
            var oxalicacid = 0;
            var phytate = 0;
        }

        //14 - 18 (NON PREGNANT & LACTATING)
        //(PAL = Sedentary)
        else if (a >= 14 && a <= 18 && j == "Sedentary" && l == "Yes" && p == "No" && g == "Female") {
            var eer = (135.3 - (30.8 * a) + (10 * w * 1.00)) + (934 * h / 100) + 25 + 500 - 170;
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 26;
            var calcium = 1400;
            var iron = 15;
            var magnesium = 360;
            var phosphorous = 1250;
            var potassium = 4700;
            var sodium = 2300;
            var zinc = 9;
            var sellenium = 55;
            var vitarae = 700;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 1;
            var riboflavin = 1;
            var niacin = 14;
            var dietaryfolate = 400;
            var foodfolate = 0;
            var vitb12 = 2.4;
            var vitc = 65;
            var cholestrol = 300;
            var oxalicacid = 0;
            var phytate = 0;
        } 
        //(PAL = Light)
        else if (a >= 14 && a <= 18 && j == "Light" && l == "Yes" && p == "No" && g == "Female") {
            var eer = (135.3 - (30.8 * a) + (10 * w * 1.12)) + (934 * h / 100) + 25 + 500 - 170;
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 26;
            var calcium = 1400;
            var iron = 15;
            var magnesium = 360;
            var phosphorous = 1250;
            var potassium = 4700;
            var sodium = 2300;
            var zinc = 9;
            var sellenium = 55;
            var vitarae = 700;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 1;
            var riboflavin = 1;
            var niacin = 14;
            var dietaryfolate = 400;
            var foodfolate = 0;
            var vitb12 = 2.4;
            var vitc = 65;
            var cholestrol = 300;
            var oxalicacid = 0;
            var phytate = 0;
        } 
        //(PAL = Moderate)
        else if (a >= 14 && a <= 18 && j == "Moderate" && l == "Yes" && p == "No" && g == "Female") {
            var eer = (135.3 - (30.8 * a) + (10 * w * 1.27)) + (934 * h / 100) + 25 + 500 - 170;
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 26;
            var calcium = 1400;
            var iron = 15;
            var magnesium = 360;
            var phosphorous = 1250;
            var potassium = 4700;
            var sodium = 2300;
            var zinc = 9;
            var sellenium = 55;
            var vitarae = 700;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 1;
            var riboflavin = 1;
            var niacin = 14;
            var dietaryfolate = 400;
            var foodfolate = 0;
            var vitb12 = 2.4;
            var vitc = 65;
            var cholestrol = 300;
            var oxalicacid = 0;
            var phytate = 0;
        } 
        //(PAL = Heavy)
        else if (a >= 14 && a <= 18 && j == "Heavy" && l == "Yes" && p == "No" && g == "Female") {
            var eer = (135.3 - (30.8 * a) + (10 * w * 1.45)) + (934 * h / 100) + 25 + 500 - 170;
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 26;
            var calcium = 1400;
            var iron = 15;
            var magnesium = 360;
            var phosphorous = 1250;
            var potassium = 4700;
            var sodium = 2300;
            var zinc = 9;
            var sellenium = 55;
            var vitarae = 700;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 1;
            var riboflavin = 1;
            var niacin = 14;
            var dietaryfolate = 400;
            var foodfolate = 0;
            var vitb12 = 2.4;
            var vitc = 65;
            var cholestrol = 300;
            var oxalicacid = 0;
            var phytate = 0;
        } 
        //19 - 30 (NON PREGNANT & NON LACTATING)
        //(PAL = Sedentary)
        else if (a >= 19 && a <= 30 && j == "Sedentary" && p == "No" && l == "No" && g == "Female") {
            var eer = (354.6 - (6.91 * a) + (9.36 * w * 1.00)) + (726 * h / 100);
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 25;
            var calcium = 1300;
            var iron = 18;
            var magnesium = 360;
            var phosphorous = 700;
            var potassium = 4700;
            var sodium = 2300;
            var zinc = 8;
            var sellenium = 55;
            var vitarae = 700;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 1.1;
            var riboflavin = 1.1;
            var niacin = 14;
            var dietaryfolate = 400;
            var foodfolate = 0;
            var vitb12 = 2.4;
            var vitc = 75;
            var cholestrol = 300;
            var oxalicacid = 0;
            var phytate = 0;
        }
        //(PAL = Light)
        else if (a >= 19 && a <= 30 && j == "Light" && p == "No" && l == "No" && g == "Female") {
            var eer = (354.6 - (6.91 * a) + (9.36 * w * 1.12)) + (726 * h / 100);
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 25;
            var calcium = 1300;
            var iron = 18;
            var magnesium = 360;
            var phosphorous = 700;
            var potassium = 4700;
            var sodium = 2300;
            var zinc = 8;
            var sellenium = 55;
            var vitarae = 700;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 1.1;
            var riboflavin = 1.1;
            var niacin = 14;
            var dietaryfolate = 400;
            var foodfolate = 0;
            var vitb12 = 2.4;
            var vitc = 75;
            var cholestrol = 300;
            var oxalicacid = 0;
            var phytate = 0;
        }
        //(PAL = Moderate)
        else if (a >= 19 && a <= 30 && j == "Moderate" && p == "No" && l == "No" && g == "Female") {
            var eer = (354.6 - (6.91 * a) + (9.36 * w * 1.27)) + (726 * h / 100);
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 25;
            var calcium = 1300;
            var iron = 18;
            var magnesium = 360;
            var phosphorous = 700;
            var potassium = 4700;
            var sodium = 2300;
            var zinc = 8;
            var sellenium = 55;
            var vitarae = 700;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 1.1;
            var riboflavin = 1.1;
            var niacin = 14;
            var dietaryfolate = 400;
            var foodfolate = 0;
            var vitb12 = 2.4;
            var vitc = 75;
            var cholestrol = 300;
            var oxalicacid = 0;
            var phytate = 0;
        }
        //(PAL = Heavy)
        else if (a >= 19 && a <= 30 && j == "Heavy" && p == "No" && l == "No" && g == "Female") {
            var eer = (354.6 - (6.91 * a) + (9.36 * w * 1.45)) + (726 * h / 100);
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 25;
            var calcium = 1300;
            var iron = 18;
            var magnesium = 360;
            var phosphorous = 700;
            var potassium = 4700;
            var sodium = 2300;
            var zinc = 8;
            var sellenium = 55;
            var vitarae = 700;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 1.1;
            var riboflavin = 1.1;
            var niacin = 14;
            var dietaryfolate = 400;
            var foodfolate = 0;
            var vitb12 = 2.4;
            var vitc = 75;
            var cholestrol = 300;
            var oxalicacid = 0;
            var phytate = 0;
        }

        //19 - 50 (PREGNANT & NON LACTATING)
        //(PAL = Sedentary)
        else if (a >= 19 && a <= 50 && j == "Sedentary" && p == "Yes" && l == "No" && g == "Female") {
            var eer = (354.6 - (6.91 * a) + (9.36 * w * 1.00)) + (726 * h / 100) + 272 + 180;
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 28;
            var calcium = 1000;
            var iron = 27;
            var magnesium = 350;
            var phosphorous = 700;
            var potassium = 4700;
            var sodium = 2300;
            var zinc = 11;
            var sellenium = 60;
            var vitarae = 770;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 1.4;
            var riboflavin = 1.4;
            var niacin = 18;
            var dietaryfolate = 600;
            var foodfolate = 0;
            var vitb12 = 2.6;
            var vitc = 85;
            var cholestrol = 300;
            var oxalicacid = 0;
            var phytate = 0;
        } 
        //(PAL = Light)
        else if (a >= 19 && a <= 50 && j == "Light" && p == "Yes" && l == "No" && g == "Female") {
            var eer = (354.6 - (6.91 * a) + (9.36 * w * 1.12)) + (726 * h / 100) + 272 + 180;
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 28;
            var calcium = 1000;
            var iron = 27;
            var magnesium = 350;
            var phosphorous = 700;
            var potassium = 4700;
            var sodium = 2300;
            var zinc = 11;
            var sellenium = 60;
            var vitarae = 770;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 1.4;
            var riboflavin = 1.4;
            var niacin = 18;
            var dietaryfolate = 600;
            var foodfolate = 0;
            var vitb12 = 2.6;
            var vitc = 85;
            var cholestrol = 300;
            var oxalicacid = 0;
            var phytate = 0;
        }
        //(PAL = Moderate)
        else if (a >= 19 && a <= 50 && j == "Moderate" && p == "Yes" && l == "No" && g == "Female") {
            var eer = (354.6 - (6.91 * a) + (9.36 * w * 1.27)) + (726 * h / 100) + 272 + 180;
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 28;
            var calcium = 1000;
            var iron = 27;
            var magnesium = 350;
            var phosphorous = 700;
            var potassium = 4700;
            var sodium = 2300;
            var zinc = 11;
            var sellenium = 60;
            var vitarae = 770;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 1.4;
            var riboflavin = 1.4;
            var niacin = 18;
            var dietaryfolate = 600;
            var foodfolate = 0;
            var vitb12 = 2.6;
            var vitc = 85;
            var cholestrol = 300;
            var oxalicacid = 0;
            var phytate = 0;
        } 
        //(PAL = Heavy)
        else if (a >= 19 && a <= 50 && j == "Heavy" && p == "Yes" && l == "No" && g == "Female") {
            var eer = (354.6 - (6.91 * a) + (9.36 * w * 1.45)) + (726 * h / 100) + 272 + 180;
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 28;
            var calcium = 1000;
            var iron = 27;
            var magnesium = 350;
            var phosphorous = 700;
            var potassium = 4700;
            var sodium = 2300;
            var zinc = 11;
            var sellenium = 60;
            var vitarae = 770;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 1.4;
            var riboflavin = 1.4;
            var niacin = 18;
            var dietaryfolate = 600;
            var foodfolate = 0;
            var vitb12 = 2.6;
            var vitc = 85;
            var cholestrol = 300;
            var oxalicacid = 0;
            var phytate = 0;
        } 
        //19 - 50 (NONPREGNANT &  LACTATING)
        //(PAL = Sedentary)
        else if (a >= 19 && a <= 50 && j == "Sedentary" && l == "Yes" && p == "No" && g == "Female") {
            var eer = (354.6 - (6.91 * a) + (9.36 * w * 1.00)) + (726 * h / 100) + 500 - 170;
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 29;
            var calcium = 1000;
            var iron = 9;
            var magnesium = 310;
            var phosphorous = 700;
            var potassium = 5100;
            var sodium = 2300;
            var zinc = 12;
            var sellenium = 70;
            var vitarae = 1300;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 1.4;
            var riboflavin = 1.6;
            var niacin = 17;
            var dietaryfolate = 500;
            var foodfolate = 0;
            var vitb12 = 2.8;
            var vitc = 120;
            var cholestrol = 300;
            var oxalicacid = 0;
            var phytate = 0;
        }
        //(PAL = Light)
        else if (a >= 19 && a <= 50 && j == "Light" && l == "Yes" && p == "No" && g == "Female") {
            var eer = (354.6 - (6.91 * a) + (9.36 * w * 1.12)) + (726 * h / 100) + 500 - 170;
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 29;
            var calcium = 1000;
            var iron = 9;
            var magnesium = 310;
            var phosphorous = 700;
            var potassium = 5100;
            var sodium = 2300;
            var zinc = 12;
            var sellenium = 70;
            var vitarae = 1300;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 1.4;
            var riboflavin = 1.6;
            var niacin = 17;
            var dietaryfolate = 500;
            var foodfolate = 0;
            var vitb12 = 2.8;
            var vitc = 120;
            var cholestrol = 300;
            var oxalicacid = 0;
            var phytate = 0;
        }
        //(PAL = Moderate)
        else if (a >= 19 && a <= 50 && j == "Moderate" && l == "Yes" && p == "No" && g == "Female") {
            var eer = (354.6 - (6.91 * a) + (9.36 * w * 1.27)) + (726 * h / 100) + 500 - 170;
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 29;
            var calcium = 1000;
            var iron = 9;
            var magnesium = 310;
            var phosphorous = 700;
            var potassium = 5100;
            var sodium = 2300;
            var zinc = 12;
            var sellenium = 70;
            var vitarae = 1300;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 1.4;
            var riboflavin = 1.6;
            var niacin = 17;
            var dietaryfolate = 500;
            var foodfolate = 0;
            var vitb12 = 2.8;
            var vitc = 120;
            var cholestrol = 300;
            var oxalicacid = 0;
            var phytate = 0;
        }
        //(PAL = Heavy)
        else if (a >= 19 && a <= 50 && j == "Heavy" && l == "Yes" && p == "No" && g == "Female") {
            var eer = (354.6 - (6.91 * a) + (9.36 * w * 1.45)) + (726 * h / 100) + 500 - 170;
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 29;
            var calcium = 1000;
            var iron = 9;
            var magnesium = 310;
            var phosphorous = 700;
            var potassium = 5100;
            var sodium = 2300;
            var zinc = 12;
            var sellenium = 70;
            var vitarae = 1300;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 1.4;
            var riboflavin = 1.6;
            var niacin = 17;
            var dietaryfolate = 500;
            var foodfolate = 0;
            var vitb12 = 2.8;
            var vitc = 120;
            var cholestrol = 300;
            var oxalicacid = 0;
            var phytate = 0;
        }
        //31 - 100 (NONPREGNANT & NON LACTATING) 
        //(PAL = Sedentary)
        else if (a >= 31 && a <= 100 && j == "Sedentary" && l == "No" && p == "No" && g == "Female") {
            var eer = (354.6 - (6.91 * a) + (9.36 * w * 1.00)) + (726 * h / 100);
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 29;
            var calcium = 1000;
            var iron = 9;
            var magnesium = 310;
            var phosphorous = 700;
            var potassium = 5100;
            var sodium = 2300;
            var zinc = 12;
            var sellenium = 70;
            var vitarae = 1300;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 1.4;
            var riboflavin = 1.6;
            var niacin = 17;
            var dietaryfolate = 500;
            var foodfolate = 0;
            var vitb12 = 2.8;
            var vitc = 120;
            var cholestrol = 300;
            var oxalicacid = 0;
            var phytate = 0;
        }
        //(PAL = Light)
        else if (a >= 31 && a <= 100 && j == "Light" && l == "No" && p == "No" && g == "Female") {
            var eer = (354.6 - (6.91 * a) + (9.36 * w * 1.12)) + (726 * h / 100);
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 29;
            var calcium = 1000;
            var iron = 9;
            var magnesium = 310;
            var phosphorous = 700;
            var potassium = 5100;
            var sodium = 2300;
            var zinc = 12;
            var sellenium = 70;
            var vitarae = 1300;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 1.4;
            var riboflavin = 1.6;
            var niacin = 17;
            var dietaryfolate = 500;
            var foodfolate = 0;
            var vitb12 = 2.8;
            var vitc = 120;
            var cholestrol = 300;
            var oxalicacid = 0;
            var phytate = 0;
        }
        //(PAL = Moderate)
        else if (a >= 31 && a <= 100 && j == "Moderate" && l == "No" && p == "No" && g == "Female") {
            var eer = (354.6 - (6.91 * a) + (9.36 * w * 1.27)) + (726 * h / 100);
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 29;
            var calcium = 1000;
            var iron = 9;
            var magnesium = 310;
            var phosphorous = 700;
            var potassium = 5100;
            var sodium = 2300;
            var zinc = 12;
            var sellenium = 70;
            var vitarae = 1300;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 1.4;
            var riboflavin = 1.6;
            var niacin = 17;
            var dietaryfolate = 500;
            var foodfolate = 0;
            var vitb12 = 2.8;
            var vitc = 120;
            var cholestrol = 300;
            var oxalicacid = 0;
            var phytate = 0;
        }
        //(PAL = Heavy)
        else if (a >= 31 && a <= 100 && j == "Heavy" && l == "No" && p == "No" && g == "Female") {
            var eer = (354.6 - (6.91 * a) + (9.36 * w * 1.45)) + (726 * h / 100);
            var protein = (eer * 0.0375).toFixed(1);
            var fat = (eer * 0.0333).toFixed(1);
            var carbohydrate = (eer * 0.1375).toFixed(1);
            var water = (eer * 1).toFixed(1);
            var fibre = 29;
            var calcium = 1000;
            var iron = 9;
            var magnesium = 310;
            var phosphorous = 700;
            var potassium = 5100;
            var sodium = 2300;
            var zinc = 12;
            var sellenium = 70;
            var vitarae = 1300;
            var vitare = 0;
            var retinol = 0;
            var bcarotene = 0;
            var thiamin = 1.4;
            var riboflavin = 1.6;
            var niacin = 17;
            var dietaryfolate = 500;
            var foodfolate = 0;
            var vitb12 = 2.8;
            var vitc = 120;
            var cholestrol = 300;
            var oxalicacid = 0;
            var phytate = 0;
        }

        var eer = (eer.toFixed(2));

        document.getElementById("eer").value = eer + "Kcals";
        document.getElementById("protein").value = protein + "g";
        document.getElementById("fat").value = fat + "g";
        document.getElementById("carbohydrate").value = carbohydrate + "g";
        document.getElementById("water").value = water + "mls";
        document.getElementById("fibre").value = fibre + "g";
        document.getElementById("calcium").value = calcium + "mg";
        document.getElementById("iron").value = iron + "mg";
        document.getElementById("magnesium").value = magnesium + "mg";
        document.getElementById("phosphorous").value = phosphorous + "mg";
        document.getElementById("potassium").value = potassium + "mg";
        document.getElementById("sodium").value = sodium + "mg";
        document.getElementById("zinc").value = zinc + "mg";
        document.getElementById("sellenium").value = sellenium + "mcg";
        document.getElementById("vitarae").value = vitarae + "mcg";
        document.getElementById("vitare").value = vitare + "mcg";
        document.getElementById("retinol").value = retinol + "mcg";
        document.getElementById("bcarotene").value = bcarotene + "mcg";
        document.getElementById("thiamin").value = thiamin + "mg";
        document.getElementById("riboflavin").value = riboflavin + "mg";
        document.getElementById("niacin").value = niacin + "mg";
        document.getElementById("dietaryfolate").value = dietaryfolate + "mcg";
        document.getElementById("foodfolate").value = foodfolate + "mcg";
        document.getElementById("vitb12").value = vitb12 + "mcg";
        document.getElementById("vitc").value = vitc + "mg";
        document.getElementById("cholestrol").value = cholestrol + "mg";
        document.getElementById("oxalicacid").value = oxalicacid + "mg";
        document.getElementById("phytate").value = phytate + "mg";

        };

</script>