<?php $page_title = "Nutri App || Login" ?>
<?php include 'includes/keyword_file.php' ?>
<?php $siteauthor ="Emmanuel Gathu" ?>
<?php include 'includes/header.php' ?>
<?php include 'includes/navbar.php' ?>


    <div class="login-clean">
        <form role="form" name="loginform" id="loginform" method="post" action="classes/login.php" onsubmit="return validateLoginForm();">
            <h2 class="text-center">
                  <strong>Log In</strong>
            </h2>
            <?php if (isset($_REQUEST['e'])) {?>
              <div class="alert alert-danger">
                <?php echo $_REQUEST['e']; ?>
              </div>
            <?php } ?>
            <?php if (isset($_REQUEST['s'])) {?>
              <div class="alert alert-success">
                <?php echo $_REQUEST['s']; ?>
              </div>
            <?php } ?>
            <?php if (isset($_REQUEST['sp'])) {?>
              <div class="alert alert-success">
                <?php echo $_REQUEST['sp']; ?>
              </div>
            <?php } ?>
            <?php if (isset($_REQUEST['su'])) {?>
              <div class="alert alert-success">
                <?php echo $_REQUEST['su']; ?>
              </div>
            <?php } ?>
            <div class="form-group">
              <input class="form-control" type="text" name="email" placeholder="Email">
              <div class="form_error" id="emailErr"></div>
            </div>
            <div class="form-group">
              <input class="form-control" type="password" name="password" placeholder="Password">
              <div  class="form_error"  id="passwordErr"></div>
            </div>
            <div class="form-group">
              <button class="btn btn-primary btn-block" type="submit" name="login">Log In</button>
            </div>
            <div class="form-group">
              <p style="text-align:center;color:#421966;">Don't have an account ?
                <a href="register" class="forgot"> Register here.</a>
              </p>
            </div>
            
            <p style="text-align:center;">
              <a href="recover" style="color:#138ea4;font-size:12px;font-weight:bold;"> I can't remember password.</a>
            </p>
          </form>
          
    </div>
    
    

<?php include 'includes/footer.php' ?>

