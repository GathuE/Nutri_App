<div class="row mt-3" style="padding:20px;">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" id="col" style="display:block;">
                <div class="card">
                    <div class="card-body">
                        <form id="regForm" class="form" method="post" action="classes/bio_data.php" enctype="multipart/form-data">
                           <input type="hidden" name="user_id" value="<?php echo $id?>">
                           <div class="tab">
                                <div class="row">
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                <img src="img/two.png" style="width:100%;height:100%;border-radius:10px;padding:0px;">
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                <label class="label">Your Target Goal is:</label> 
                                                <p><input type="text" name="goal" class="form-control" oninput="this.className = ''" value="<?php echo $goal?>" readonly></p>
                                                <label class="label">Your Current Weight is:</label>
                                                <p><input type="text" name="currentweight" class="form-control" oninput="this.className = ''" value="<?php echo $weight?> Kgs" readonly></p>
                                                <label class="label">What is your target weight? (Kgs) </label> 
                                                <p><input type="number" min="0" name="targetweight" class="form-control" style="width:100%;" oninput="this.className = ''"></p>
                                            </div>
                                </div>
                            </div>
                            <div class="tab">
                                    <div class="row">
                                                <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                    <img src="img/four.png" style="width:100%;height:100%;border-radius:10px;padding:0px;">
                                                </div>
                                                <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                    <label class="label">Describe your Routine Work of your Daily Living: </label><br>
                                                    <select class="form-control" name="routine" id="routine" style="width:100%;" oninput="this.className = ''">
                                                            <option type="optgroup"  value="" >Please Choose One...</option>
                                                            <option type="optgroup"  value="Sitting Alot" >I sit more and walk less.</option>
                                                            <option type="optgroup"  value="Walking Alot" >I walk more and sit less.</option>
                                                            <option type="optgroup"  value="Standing Alot" >I stand alot but walk and sit less.</option>
                                                            <option type="optgroup"  value="Lifting Alot" >I Lift, Push or Pull Items.</option>
                                                            <option type="optgroup"  value="Athlete" >I'm an athlete.</option>
                                                    </select><br>
                                                    <label class="label">Do you Work Out ? </label><br>
                                                    <select class="form-control" name="workout" id="workout" style="width:100%;" oninput="this.className = ''">
                                                            <option type="optgroup"  value="" >Please Choose One...</option>
                                                            <option type="optgroup"  value="Not Really">Not Really.</option>
                                                            <option type="optgroup"  value="1-2 Days">1-2 Days a week.</option>
                                                            <option type="optgroup"  value="3-5 Days">3-5 Days a weeks.</option>
                                                            <option type="optgroup"  value="6-7 Days">6-7 Days a weeks.</option>
                                                    </select><br>   
                                                </div>
                                    </div>
                            </div>
                            
                            <div style="overflow:auto;">
                                <div style="float:right;margin-top:20px;">
                                    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                                    <button type="button" name="submit" id="nextBtn" onclick="nextPrev(1)">Next</button>
                                </div>
                            </div>

                             <!-- Circles which indicates the steps of the form: -->
                             <div style="text-align:center;margin-top:40px;">
                                <span class="step"></span>
                                <span class="step"></span>
                            </div>
                        </form>
                    </div>
                </div> 
            </div>
</div>


        