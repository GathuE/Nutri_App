<?php 
error_reporting (0);
include 'includes/conn.php'; 
$id=$_GET['plan'];

if (isset($_POST['newkey'])) {

    $sql="SELECT user_id FROM auth_key WHERE user_id=:id";
    $query= $conn -> prepare($sql);
    $query-> bindParam(':id', $id, PDO::PARAM_STR);
    $query-> execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
        if($query -> rowCount() > 0)
            {
                header("Location: set_authkey?plan=$id&error=Authentication Key Already Set !!");
                exit();
            } 

    else{
        function rand_string($length) {
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            return substr(str_shuffle($chars),0,$length);
            }
        
        $key = rand_string(12);
        $id=$_GET['plan'];

        $sql = "INSERT INTO auth_key (user_id, auth_code) values (:id, :key)";
        $query = $conn->prepare($sql);
        $query->bindParam(':id',$id,PDO::PARAM_STR);
        $query->bindParam(':key',$key,PDO::PARAM_STR);
        $query->execute();
        header("Location: set_authkey?plan=$id&success=Authentication Key Set !!");

    }
     
}

if (isset($_POST['changekey'])) {

        function rand_newstring($length) {
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            return substr(str_shuffle($chars),0,$length);
            }
        
        $newkey = rand_newstring(12);
        $id=$_GET['plan'];

        $sql = "update auth_key set auth_code=:newkey WHERE user_id=:$id";
        $query = $conn->prepare($sql);
        $query->bindParam(':id',$id,PDO::PARAM_STR);
        $query->bindParam(':changedkey',$changedkey,PDO::PARAM_STR);
        $query->execute();
        header("Location: set_authkey?plan=$id&success=Authentication Key Changed !!");

     
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" type="image/png" href="/img/logo.png"/>
    <title>Nutri--App </title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <!-- ckeditor -->       
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <!-- ckfinder -->       
    <script type="text/javascript" src="ckfinder/ckfinder.js"></script>
    <!-- File Input CSS --> 
    <link rel="stylesheet" type="text/css" href="assets/css/fileinput.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
    <div class="main-wrapper">

                <!-- INCLUDE DB CONNECTION -->
                    <?php include 'includes/conn.php'; ?> 
                <!-- INCLUDE DB CONNECTION -->

                <!-- header Code Goes Here -->
                    /* <?php include 'includes/header.php' ?> */
                <!-- header Code Goes Here -->
       
                <!-- Side Bar Code Goes Here -->
                    <?php include 'includes/sidebar.php' ?>
                <!-- Side Bar Code Goes Here -->

                <!-- Dashboard Content Goes Here -->
        <div class="page-wrapper">
            <div class="content">
             <!-- USER DATA AND NOTIFICATIONS -->
             <div class="row">
                    <div class=" col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="dash-widget">
                            <div class="dash-widget-info text-left">
                                <!-- Alert Box for Success -->
                                    <?php if ($_GET['success']){?>
                                    <div class="alert alert-success fade show" style="max-width:fit-content;max-height:wrap-content;position:fixed;margin-top:-10px;font-size:12px;" role="alert">
                                        <strong><?=htmlspecialchars($_GET['success'])?></strong>
                                    </div>
                                    <?php }?>
                                <!-- Alert Box for Error-->
                                    <?php if ($_GET['error']){?>
                                    <div class="alert alert-danger fade show" style="max-width:fit-content;max-height:wrap-content;position:fixed;margin-top:-10px;font-size:12px;" role="alert">
                                        <strong><?=htmlspecialchars($_GET['error'])?></strong>
                                    </div>
                                    <?php }?>
							</div>
							<div class="dash-widget-info text-right">
                                <h4 style="text-transform:uppercase;font-weight:600; font-family:monospace;">ADMIN</h4> 
							</div>
                        </div>
                    
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
                        <div class="dash-widget" style="font-weight: 700;">
                        <div class="card">
                            <div class="card-header">
                                    <h3>Set Authentication Key</h3><br>
                                            <?php 
                                                error_reporting (0);
                                            
                                                $id=$_GET['plan'];
                                                $ret="select * from users 
                                                join eer_data on eer_data.clientref=users.ID  
                                                join goal_guide on goal_guide.client_ID=users.ID
                                                join bmi_data on bmi_data.user_ID=users.ID
                                                join feeding_habits on feeding_habits.client_id=users.ID
                                                join allergies on allergies.clientid=users.ID
                                                where ID=:id";
                                                $query= $conn -> prepare($ret);
                                                $query->bindParam(':id',$id, PDO::PARAM_STR);
                                                $query-> execute();
                                                $results = $query -> fetchAll(PDO::FETCH_OBJ);
                                                $cnt=1;
                                                if($query -> rowCount() > 0)
                                                {
                                                foreach($results as $result)
                                                {
                                            
                                            ?>
                                                
                                                    <label style="font-size:12px;">
                                                    Name :
                                                    <?php echo htmlentities($result->username);?><br>
                                                    Goal :
                                                    <?php echo htmlentities($result->goal);?><br>
                                                    Target Weight :
                                                    <?php echo htmlentities($result->targetweight);?> kgs<br>
                                               
                                                



                                            <?php }} else{
                                                echo ' No Data Available !!';
                                                } 
                                            ?>
                            </div>
                            <div class="card-body">


                                 <div class="form-group">
                                    <?php 
                                        error_reporting (0);
                                            
                                        $id=$_GET['plan'];
                                        $ret="select * from auth_key
                                        where user_id=:id";
                                        $query= $conn -> prepare($ret);
                                        $query->bindParam(':id',$id, PDO::PARAM_STR);
                                        $query-> execute();
                                        $results = $query -> fetchAll(PDO::FETCH_OBJ);
                                        $cnt=1;
                                        if($query -> rowCount() > 0)
                                        {
                                        foreach($results as $result)
                                        {
                                    
                                    ?>
                                        <label>Current Authentication Key:</label>
                                            <div>
                                                <input class="form-control" name="authkey" id="authkey" value="<?php echo htmlentities($result->auth_code);?>" readonly>
                                            </div>

                                    <?php }} else{
                                                    echo '<label>Current Authentication Key:</label><div>
                                                    <input class="form-control" style="color:red;" Value="User Does Not Have an Authentication Key!!"  readonly>
                                                </div>';
                                                } 
                                    ?>
                                </div>
                                
                                    <form method="POST" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <input type="submit" name="newkey" class="btn btn-info" onclick="return confirm('Generate Authentication Key?');" value="Generate Key">

                                                    <input type="submit" name="changekey" class="btn btn-info" onclick="return confirm('Change Authentication Key?');" value="Change Key">

                                                </div>
                                            
                                    </form>

                                    
                                    
                                   

                                   

                            </div>
                        </div>
                           
                        
                               
                       
							
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/fileinput.js"></script>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    
    <!--====== Alert Script START ======-->
    <script type="text/javascript">
    
    var editor = CKEDITOR.replace('body');
    CKFinder.setupCKEditor( editor );
    
    setTimeout (function(){
    //closing the alert
    $('.alert').alert('close');
    }, 3000);
    
    </script>


</body>
</html>

