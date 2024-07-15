
<div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
        <div class="card">
            <img src="img/twentyeight.png" style="width:100%;height:100%;border-radius:10px;padding:0px;">
        </div>

    </div>
    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
    <div class="card">
        <div class="card-body">
            <h6 style="text-align:center;color:#421966;font-weight:bold;">Please Fill All the Sections below.</h6>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                    <!-- Age Years -->
                    <label style="color:#421966;font-weight:bold;"> Age (Yrs): </label>
                    <input type="number" style="font-size:14px;" name="years" id="years" placeholder="Age in Years" class="form-control" required>
                    <!-- Age Years-->
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                    <!-- Age Months -->
                    <label style="color:#421966;font-weight:bold;"> Age (Months): </label>
                        <input type="number" style="font-size:14px;" name="months" id="months" oninput="calcSum();show();" placeholder="Age in months" class="form-control" required>
                    <!-- Age  Months-->
                </div>
                <input type="hidden" name="age" id="age" class="form-control">
            </div>
            <!-- Gender -->
            <div class="row mt-3">
                <div class="col">
                    <label class="form-label" style="color:#421966;font-weight:bold;">Gender:</label>
                        <select class="form-control" style="font-size:14px;" id="gender" name="gender" required>
                            <option type="optgroup"   value="" >Choose Gender...</option>
                            <option type="optgroup"   value="Male" >Male</option>
                            <option type="optgroup"   value="Female">Female</option>
                        </select>
                </div>
            </div>
            <!-- Gender -->
            <!-- Pregnant & Lactating-->
            <div id="combo" style="display:none;">
                <div class="row mt-3">
                    <div class="col">
                        <label class="form-label" style="color:#421966;font-weight:bold;">Pregnant:</label>
                            <select class="form-control" style="font-size:14px;" id="pregnant" name="pregnant" style="width:100px;"  required >
                                <option type="optgroup"  value="Yes" >Yes</option>
                                <option type="optgroup"  value="No" selected>No</option>
                            </select>
                    </div>
                    <div class="col">
                        <label class="form-label" style="color:#421966;font-weight:bold;">Lactating:</label> 
                            <select class="form-control" style="font-size:14px;" id="lactating" name="lactating" style="width:100px;"  required >
                                <option type="optgroup"   value="Yes" >Yes</option>
                                <option type="optgroup"   value="No" selected>No</option>
                            </select>
                    </div>
                </div>  
            </div>
            
                
            <div class="row mt-3">
                <div class="col">
                    <input type="hidden" name="routine" id="routine" value="<?php echo $routine ?>">
                    <input type="hidden" name="workout" id="workout" value="<?php echo $workout ?>">
                    <input type="hidden" name="weight" id="weight" value="<?php echo $weight ?>">
                    <input type="hidden" name="height" id="height" value="<?php echo $height ?>">
                    <input type="hidden" name="pal" id="pal" class="form-control">

                    <input type="button" id="btn" class="btn" style="font-size:16px;float:right;visibility:hidden;background-color:#421966;color:#fff;" value="Calculate Nutrients" onclick="EER();">
                </div>
            </div>
        </div>
</div>

    </div>

</div>

<script>
//show Pregnant and Lactating Sections
  document.getElementById("gender").onchange = setListener;
  
  function setListener(){
  var value = this.value
      console.log(value);
      if (value == "Male"){
          document.getElementById("combo").style.display = "none";
      }else if (value == "Female"){
          document.getElementById("combo").style.display = "block"; 
      }
      
  }
</script>
