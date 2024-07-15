<div class="row mt-3" style="padding:20px;">
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6" id="col">
                <div class="card" id="card_one">
                    <div class="card-body">
                        <img src="img/one.png" style="width:100%;height:100%;border-radius:10px;padding:0px;">
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6" id="col" style="display:block;">
                <div class="card" id="card_two">
                    <div class="card-body">
                        <form class="form" method="post" action="classes/bmi_data.php">
                                <div class="row">
                                    
                                    <input type="hidden" name="user_id" value="<?php echo $id?>">
                                    <label class="form-label">Diet Plan Goal:</label>
                                    <select class="form-control" id="goal" name="goal">
                                        <option type="optgroup"  value="">Choose your Goal...</option>
                                        <option type="optgroup"  value="Weight Management Diet Plan" >Weight Management Diet Plan</option>
                                        <option type="optgroup"  value="Diabetes Management Diet Plan">Diabetes Management Diet Plan</option>
                                        <option type="optgroup"  value="Diabetes and Weight Management Diet Plan">Diabetes & Weight Management Diet Plan</option>
                                    </select>
                                    
                                </div>
                                    <label class="form-label">Weight: <small>(Kgs)</small></label>
                                        <input type="number" name="weight" id="weight" min="0" value="<?php echo $weight?>" class="form-control" placeholder="Enter Weight in Kgs" aria-label="Weight in Kgs">
                                    <label class="form-label">Height: <small>(cms)</small></label><br>
                                        <span style="font-weight:600;color:red;font-size:11px;">
                                            NB: If your Height is in Feet, Use our <a href="units_converter"> Height Converter</a> to change feet to cms.
                                            <br>Do not input height here if not in centimeters.
                                        </span><br>
                                    
                                    <input type="text" name="height" id="height" min="0" value="<?php echo $height?>" class="form-control" placeholder="Enter Height in cms" aria-label="Enter Height in cms">
                
                                        
                                <div class="row mt-3">
                                    <div class="col">
                                        <input type="reset" name="reset" value="Reset" class="btn btn-warning" style="float:left;color:#fff;">
                                        <input type="submit" name="bmidata"  value="Save Data" class="btn btn-success" style="float:right;margin-right:0px;">
                                    </div>         
                                </div>
                        </form>
                    </div>
                </div>
            </div>
</div>


        