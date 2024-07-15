<?php $page_title = "Nutri App || Set_Password" ?>
<?php include 'includes/keyword_file.php' ?>
<?php $siteauthor = "Emmanuel Gathu" ?>
<?php include 'includes/header.php' ?>
<?php include 'includes/navbar.php' ?>

<div style="background:#f1f7fc;margin-left:auto;margin-right:auto;">
<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="details">
        <a name="change_password"></a>
        <form action="classes/new_password" method="POST">
        <h2>Change Password</h2>
        <?php if (isset($_REQUEST['ep'])) {?>
            <div class="alert alert-danger" style="font-size: 10px;font-weight: bold;width:auto;text-align:center;">
            <?php echo $_REQUEST['ep']; ?>
            </div>
        <?php } ?>
        <?php if (isset($_REQUEST['s'])) {?>
            <div class="alert alert-success" style="font-size: 10px;font-weight: bold;width:auto;text-align:center;">
            <?php echo $_REQUEST['s']; ?>
            </div>
        <?php } ?>
        <div class="form-group">
            <input class="form-control" type="password" name="password" placeholder="New Password">
        </div>
        <div class="form-group">
            <input class="form-control" type="password" name="password_repeat" placeholder="New Password (repeat)">
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit" name="new_password">Change Password</button>
        </div>
        </form>
    </div>

</div>
</div>




<?php include 'includes/footer.php' ?>