<?php
$page_title = "Nutri App -- Welcome";
include 'includes/keyword_file.php';
include 'includes/header.php';
include 'includes/navbar.php';
include 'classes/db.class.php';
?>

<div class="content">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                <div class="card" id="card_one">
                    <div class="card-body">
                        <h5>Do you know what is a Healthy Diet?</h5>
                        <hr>
                        <p>A healthy diet is simply a diet that <b>ADEQUATELY</b> provides proper amounts of <b>NUTRIENT-DENSE</b> foods which <b>BALANCE</b> all food types so that not one nutrient is consumed at the expense of another. 
                        <br> It is also <b> CALORIE CONTROLLED </b> by supplying reasonable food energy allowances that <b>MATCH</b> your energy output and by <b>MODERATELY</b> drawing from a <b>VARIETY</b> of Nutritious foods that are locally available.
                        </p>

                        <h5>Portioning as the Heart of Meal Planning.</h5>
                        <hr>
                        <p>In a healthy diet, the quantity of food you serve matters a lot.<br>
                        Meal portioning allows you to meet your individual nutrient requirements necessary to maintain a healthy status..</p> 
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                <div class="card" id="card_one">
                    <div class="card-body">
                            <div>
                            <h5 style="text-align:center;margin-bottom:5px;color:#421966;">How We do it Different at Buni.</h5>
                            <hr>
                            <p>At Nutri App, we simplify meal portioning for you.<br>
                                We incorporate the <b>NORMAL</b>, <b>EASY TO FIND</b> and <b>MOST COMMON</b> kitchen utensils in our portioning criterion.<br>
                                Have a quick look at these sample utensils and respond to the question below.
                            </p>
                                        <div id="carouselExampleInterval" class="carousel slide" style="border-radius:20px;width:auto;margin-left:auto;margin-right:auto;" data-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active" data-interval="300">
                                                <img style="width:50px;" src="assets/img/servingitems/servingspoon.png"  class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item" data-interval="300">
                                                <img style="width:50px;" src="assets/img/servingitems/cup.png"  class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item" data-interval="300">
                                                <img style="width:50px;" src="assets/img/servingitems/metalcup.png"  class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item" data-interval="300">
                                                <img style="width:50px;" src="assets/img/servingitems/glass.png"  class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item" data-interval="300">
                                                <img style="width:50px;" src="assets/img/servingitems/bowls.png"  class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item" data-interval="300">
                                                <img style="width:50px;" src="assets/img/servingitems/chapati.png"  class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item" data-interval="300">
                                                <img style="width:50px;" src="assets/img/servingitems/breadslice.png"  class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item" data-interval="300">
                                                <img style="width:50px;" src="assets/img/servingitems/mealplan.png"  class="d-block w-100" alt="...">
                                                </div>
                                            </div>
                                            <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" style="padding:12px;background-color:#421966;border-radius:10px;" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" style="padding:12px;background-color:#421966;border-radius:10px;" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                            </div>
                                    </div>
                                <h5>Do you Serve most of your Foods with the above items or in similar portions?</h5>
                                <select class="form-control" id="Selector" style="font-size:11px;font-weight:900px;">
                                    <option value=""><b>Choose your most suitable answer...</b></option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            <br>
                            <div class="card" id="successdiv">
                               <p>Great!!<br>You may now proceed to Register.</p>
                            </div>
                            <div class="card" id="disclaimerdiv">
                               <p>Note!!<br> Our meal plans incorporate the use of the above Kitchen Utensils for meal Portioning.<br> <b>You may proceed to Register</b> </p>
                            </div>
                       
                        <a href="register" id="registerbutton" class="btn btn-success" style="background-color:#421966;font-size:12px;margin-top:10px;float:right;display:none;">Proceed to Register </a>
                    </div>
                </div>
            </div>

        </div>
        
        <?php include 'includes/partner_invite.php' ?>
        
  

</div>




<?php include 'includes/footer.php' ?>
