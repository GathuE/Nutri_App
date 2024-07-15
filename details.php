<?php
session_start();
error_reporting(0);
if (!isset($_SESSION['logged_in'])) {
  header("Location: login.php");
  exit();
}
else {
$page_title = "User Details | Nutri App";
include 'includes/header.php';
include 'includes/navbar.php';
include 'classes/users.class.php';
$username = $_SESSION['username'];
$user = new ManageUsers();
$details = $user->get_details($username);
}
?>

<div class="content">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
            <div class="details">
              <form action="classes/details.php" method="POST">
                <h1> Update Details</h1>
                <?php if (isset($_REQUEST['eu'])) {?>
                  <div class="alert alert-danger" style="font-size: 10px;font-weight: bold;width:auto;text-align:center;">
                    <?php echo $_REQUEST['eu']; ?>
                  </div>
                <?php } ?>
                <?php if (isset($_REQUEST['su'])) {?>
                  <div class="alert alert-success" style="font-size: 10px;font-weight: bold;width:auto;text-align:center;">
                    <?php echo $_REQUEST['su']; ?>
                  </div>
                <?php } ?>
                <div class="form-group">
                  <label style="font-weight:bold;">Name:</label>
                  <input class="form-control" type="text" name="username" value="<?php echo $details['username'] ?>">
                </div>
                <div class="form-group">
                  <label style="font-weight:bold;">Email:</label>
                  <input class="form-control" type="email" name="email" value="<?php echo $details['email'] ?>">
                </div>
                <div class="form-group">
                  <button class="btn btn-primary btn-block" type="submit" name="update">Update</button>
                </div>
              </form>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
            <div class="details">
              <a name="change_password"></a>
              <form action="classes/details.php" method="POST">
                <h2>Change Password</h2>
                <?php if (isset($_REQUEST['ep'])) {?>
                  <div class="alert alert-danger" style="font-size: 10px;font-weight: bold;width:auto;text-align:center;">
                    <?php echo $_REQUEST['ep']; ?>
                  </div>
                <?php } ?>
                <?php if (isset($_REQUEST['sp'])) {?>
                  <div class="alert alert-success" style="font-size: 10px;font-weight: bold;width:auto;text-align:center;">
                    <?php echo $_REQUEST['sp']; ?>
                  </div>
                <?php } ?>
                <div class="form-group">
                  <input class="form-control" type="password" name="old_password" placeholder="Old Password">
                </div>
                <div class="form-group">
                  <input class="form-control" type="password" name="password" placeholder="New Password">
                </div>
                <div class="form-group">
                  <input class="form-control" type="password" name="password_repeat" placeholder="New Password (repeat)">
                </div>
                <div class="form-group">
                  <button class="btn btn-primary btn-block" type="submit" name="change_password">Change Password</button>
                </div>
              </form>
            </div>

        </div>
      </div>
  

  
</div>

<?php include 'includes/footer.php' ?>
