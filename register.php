<?php $page_title = "Nutri App || Registration" ?>
<?php include 'includes/keyword_file.php' ?>
<?php $siteauthor = "Emmanuel Gathu" ?>
<?php include 'includes/header.php' ?>
<?php include 'includes/navbar.php' ?>

<div class="row mt-3">
      <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
        <div class="login-clean">
            <div class="card" id="card_one">
              <div class="card-body">
                <h5>What we do</h5>
                <hr>
                <p>At Emmanuel Gathu,&nbsp;We try to use the <a href="http://www.nutritionhealth.or.ke/wp-content/uploads/Downloads/National%20Guidelines%20for%20Healthy%20Diets%20and%20Physical%20Activity%202017.pdf" style="color:#138ea4;">Kenyan dietary guidelines</a> as a road map for any healthy diet plan. We incorporate your food preferences and creatively make your diet plan more consistent with guidelines. 
                    <br>We ensure that you get all nutrients you need as per the dietary reference intakes while lowering saturated fats, trans fat, added sugars, cholesterol and improving physical activity.
                    We offer a client centric nutrition system to ensure the meal plan is provided congruently with your food choices and values. 
                    <br>We offer a value-based nutrition care plan where you will avoid unnecessary spending.
                    <br>We deliver consistently high-quality diet plans easy to use at an ordinary lifestyle. 
                    We are accountable nutrition care center by seamlessly delivering accurate, client-specific nutrition interventions.
                    We are working on providing a comprehensive nutrition intervention with an expanded IT infrastructure and Clinical Nutrition Resources. So that you can monitor your goals progress by a click of a button.
                    We are committed to offering scientific nutrition information and dietary services including our diet plans within <a href="http://www.nutritionhealth.or.ke/wp-content/uploads/Downloads/National%20Guidelines%20for%20Healthy%20Diets%20and%20Physical%20Activity%202017.pdf" style="color:#138ea4;">Kenyan dietary guidelines</a> and <a href="http://www.fao.org/3/i8897en/I8897EN.pdf" style="color:#138ea4;">Kenya Food Composition Tables</a>. 
                </p>

              </div>
                
            </div>

        </div>
      </div>

      <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
        <div class="login-clean">
                <form action="classes/register" method="POST" >
                  <h5 class="text-center">
                    <strong>Sign Up</strong>
                  </h5>
                      <!-- Alert Box -->
                      <?php if (isset($_REQUEST['e'])) {?>
                        <div class="alert alert-danger">
                          <?php echo $_REQUEST['e']; ?>
                        </div>
                      <?php } ?>
                      <!-- Alert Box -->

                  <div class="form-group">
                    <!-- Status input -->
                      <input class="form-control" type="hidden" name="status" value="0">
                    <!-- Status input -->
                    <input class="form-control" type="text" name="username" placeholder="Full Names e.g John Mwangi">
                  </div>
                  <div class="form-group">
                    <input class="form-control" type="text" name="phone" placeholder="Phone Number e.g 0712345678">
                  </div>
                  <div class="form-group">
                    <input class="form-control" type="email" name="email" placeholder="Email">
                  </div>
                  <div class="form-group">
                    <input class="form-control" type="password" name="password" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <input class="form-control" type="password" name="password_repeat" placeholder="Confirm Password ">
                  </div>
                  <div class="form-group">
                      <select class="form-control" name="question" required>
                          <option type="optgroup"   value="" >Choose Security Question...</option>
                          <option type="optgroup"   value="1" >Which is your favourite food?</option>
                          <option type="optgroup"   value="2" >Which is your favourite drink?</option>
                          <option type="optgroup"   value="3" >Which is your favourite fruit?</option>
                      </select>
                  </div>
                  <div class="form-group">
                    <input class="form-control" type="text" name="answer" placeholder="Answer to security Question">
                  </div>
                  <div class="form-group">
                      <input type="checkbox" id="terms" name="terms" value="Yes">
                      <label><small> I have read the <a href="terms_conditions" style="color:red;">Terms and Conditions.</a></small></label><br>
                  </div>
                  <div class="form-group">
                    <input class="btn btn-primary btn-block" type="submit" name="register" value="Sign Up">
                  </div>
                  <div class="form-group">
                    <p style="text-align:center;color:#421966;">Already have an account ?
                      <a href="login" class="already"> Login here.</a>
                    </p>
                  </div>
                  
                </form>
        </div>
      </div>
</div>


    
<?php include 'includes/footer.php' ?>
