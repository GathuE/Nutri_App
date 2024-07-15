<div class="row mt-3">

                        <div class="card"id="card_one">
                                <div class="card-body">
                                        <!-- Height Section -->
                                    <h5 style="margin-left:auto;margin-right:auto;">Please Enter your Height in any <b>ONE</b> of the Units Below.</h5>
                                  <div class="row">
                                        <div class="col">
                                                <label>Height (Feet):</label>
                                                <input type="number" min="0" id="inputFeet" placeholder="Enter Height in Feet" class="form-control" oninput="FeetConverter(this.value)" onchange="FeetConverter(this.value)">
                                        </div>
                                <!--    <div class="col">
                                                <label>Inches</label>
                                                <input type="number" min="0" id="inputInches" placeholder="Inches" class="form-control" oninput="InchesConverter(this.value)" onchange="InchesConverter(this.value)">
                                        </div>
                                        <div class="col">
                                                <label>Meters</label>
                                                <input type="number" min="0" id="inputMeters" placeholder="Meters" class="form-control" oninput="MeterConverter(this.value)" onchange="MeterConverter(this.value)">
                                        </div>
                                -->
                                  </div>
                                  <br>
                                    <div class="row">
                                        <div class="col calculator" style="color:green;">
                                            <h5>Your Height In Centimeters:</h5>
                                            <p style="color:orange;font-size:16px;font-weight:bold;text-align:center;"><span id="outputCentimeters"></span></p>
                                        </div>
                                    </div>
                                        <div class="row">
                                            <a href="home.php" class="btn btn-block" style="margin-left:auto;margin-right:auto;background-color:#421966;color:#fff;">Back</a>
                                        </div>
                                </div>
                            </div>

</div>

<script type="text/javascript">
    function FeetConverter(valNum) 
    {
       
        var cm = valNum/0.032808;
        var cmoutput = cm.toFixed(0);
    document.getElementById("outputCentimeters").innerHTML=cmoutput;
    

    }
    function MeterConverter(valNum) 
    {
        
        var cm = valNum * 100;
        var cmoutput = cm.toFixed(0);
    document.getElementById("outputCentimeters").innerHTML=cmoutput;
    }
    function InchesConverter(valNum) 
    {
        
        var cm = valNum/0.39370;
        var cmoutput = cm.toFixed(0);
    document.getElementById("outputCentimeters").innerHTML=cmoutput;
    }


</script>