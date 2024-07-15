<?php $page_title = "Nutri App | Password_Recovery" ?>
<?php include 'includes/keyword_file.php' ?>
<?php $siteauthor = "Emmanuel Gathu" ?>
<?php include 'includes/header.php' ?>
<?php include 'includes/navbar.php' ?>

<div class="login-clean">
        <form method="post" action="classes/recover">
            <h2 class="text-center">
                  <strong>Recover Password</strong>
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
              <input class="form-control" type="email" name="email" placeholder="Please Enter Your Registration Email..">
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
              <button class="btn btn-primary btn-block" type="submit" name="recover">Recover Password</button>
            </div>
            <div class="form-group">
                  <p style="text-align:center;color:#421966;">Already have an account ?
                    <a href="login" class="already"> Login here.</a>
                  </p>
                </div>
          </form>
          
            
          
    </div>




<?php include 'includes/footer.php' ?>