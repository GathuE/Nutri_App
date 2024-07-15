<div class="row mt-3" style ="padding:20px;">
        <!-- Information Card -->
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                <div class="card" id="card_one">
                    <div class="card-body">
                        <img src="img/twentyone.png" style="width:100%;height:100%;border-radius:10px;padding:0px;">
                    </div>
                </div>
            </div>
            <!-- End of  Information Card -->
            <!-- BMI Calculation Card -->
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                <div class="card" id="data_card" style="display:block;">
                    <div class="card-body">
                        <div class="row">
                            <label class="label" style="color:#421966;"> Your Goal For this Session: </label>
                            <input type = "text" name="bmigoal" id="bmigoal" value="<?php echo $goal ?>" class="form-control" readonly>
                            <label class="label" style="color:#421966;">Your Weight: </label>
                            <input type = "text" name="bmiweight" id="bmiweight" value="<?php echo $weight ?> kgs" class="form-control" readonly>
                            <label class="label" style="color:#421966;"> Your Height: </label>
                            <input type = "text" name="bmiheight" id="bmiheight" value="<?php echo $height ?> cms" class="form-control" readonly>
                            
                            <input type = "hidden" name="targetweight" id="targetweight" value="<?php echo $targetweight ?>" class="form-control" readonly>      
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <input type="button" class="btn" name="bmi" id="bmi" onclick="change_cards();" value="Calculate my BMI" style="float:right;background-color:#421966;color:#fff;">
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card" id="bmi_card" style="display:none;">
                <form method="post" action="classes/bmi_save.php">
                    <div class="card-body" style="text-align:center;">
                        <div style="text-align:center;">
                            <table class="table table-borderless">
                                <tr>
                                    <td colspan="3">
                                        <!-- BMI VALUE -->
                                        <span style="color:#421966;font-weight:bold;"> Your BMI is :</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <input type="text" name="bmivalue" id="bmivalue" class="form-control"  style="width:150px;outline:0;margin-left:auto; margin-right:auto;text-align:center;border:0px;">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <span style="color:#421966;font-weight:bold;"> Classified as :</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td id="background" colspan="3">
                                         <input type="text" name="bmiclass" id="bmiclass" class="form-control"  style="outline:0;margin-left:auto; margin-right:auto;text-align:center;border:0px;background:none;">
                                    </td>
                                </tr>
                                <tr style="margin-top:10px;">
                                    <td colspan="3">
                                        <span style="color:#421966;font-weight:bold;"> Your Ideal Weight Range is :</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align:right;">
                                        <!-- IDEAL LOWER WEIGHT RANGE -->
                                        <input type="text" name="lowerweightrange" id="lowerweightrange" class="form-control" style="outline:0;text-align:center;border:0px;background-color:#421966;color:#fff;" readonly>   
                                    </td>
                                    <td style="text-align:center;">
                                        <span style="color:#421966;font-weight:bold;"> to </span>
                                    </td>
                                    <td style="text-align:left;">
                                        <!-- IDEAL UPPER WEIGHT RANGE -->
                                        <input type="text" name="upperweightrange" id="upperweightrange" class="form-control" style="outline:0;text-align:center;border:0px;background-color:#421966;color:#fff;" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <p style="color:#421966;">With our Healthy Diet Plans, <br> You can achieve your target weight of :</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <!-- Target Weight -->
                                        <input type ="text" name="tweight" id="tweight" class="form-control" style="width:100px;outline:0;margin-top:-10px;margin-left:auto; margin-right:auto;text-align:center;border:0px;background-color:#421966;color:#fff;" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <p style="color:#421966;"> within a period of between :</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align:right;">
                                        <!-- LOWER TARGET TIME RANGE -->
                                        <input type="text" name="lowertimerange" id="lowertimerange" class="form-control" style="outline:0;text-align:center;border:0px;background-color:#421966;color:#fff;" readonly>   
                                    </td>
                                    <td style="text-align:center;">
                                         <span style="color:#421966;font-weight:bold;">to</span>
                                    </td>
                                    <td style="text-align:left;">
                                         <!-- UPPER TARGET TIME RANGE -->
                                        <input type="text" name="uppertimerange" id="uppertimerange" class="form-control" style="outline:0;text-align:center;border:0px;background-color:#421966;color:#fff;" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="display:none;" id="special_info" colspan="3">
                                        <p style="color:#421966;font-weight:900;font-size:12px;">
                                           OUR HEALTHY DIET PLANS WILL : <br> 
                                           1. Provide a balanced Carbohydrates Count per meal.<br>
                                           2. Help you balance your Blood Glucose Level, <br> <b> between  4mmol/L and below 10 mmol/L </b> per Day.<br>
                                           3. Target a HbA1c of < 7%.
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <button type="submit" class="btn btn-lg" style="font-size:16px;float:right;background-color:#f55911;padding:5px;"  name="save_bmi"> Proceed </button>
                                    </td>
                                </tr>
                            </table>
                          </div>       
                       
                    </div>
                </div>
                </form>

            </div>
            <!-- End of BMI Calculation Card -->
            
           
</div>




