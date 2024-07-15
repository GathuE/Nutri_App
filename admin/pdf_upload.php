<?php 
error_reporting (0);
include 'includes/conn.php'; 
$id=$_GET['upload'];

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.8.0/ckeditor.js"></script>
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
                                <!-- Alert Box for Successful Post Added -->
                                    <?php if ($_GET['uploadsuccess']) { ?>
                                    <div class="alert alert-success fade show" style="max-width:fit-content;max-height:wrap-content;position:fixed;margin-top:-10px;font-size:12px;" role="alert">
                                        <strong><?=htmlspecialchars($_GET['uploadsuccess']) ?></strong>
                                    </div>
                                    <?php } ?>
                               
							</div>
							<div class="dash-widget-info text-right">
                                <h4 style="text-transform:uppercase;font-weight:600; font-family:monospace;"> ADMIN </h4> 
							</div>
                        </div>
                    
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
                        <div class="dash-widget" style="font-weight: 700;">

                          <div class="row">
                              <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
                                <?php	
                                            $id=$_GET['upload'];
                                            $ret="select * from users 
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
                                 <label style="font-size:10px;">
                                   Client Name :
                                 <?php echo htmlentities($result->username);?><br>

                                 
                                 <?php }} else{
                                            echo ' No Data Available !!';
                                            } 
                                 ?>
                              </div>
                          </div>
                                <form method="POST" action="process_pdf" enctype="multipart/form-data">
                                        <div class="form-group">
                                                <div>
                                                    <label> Description: </label>
                                                    <input class="form-control" type="file" name="description" required><br>

                                                    <label> Meal Plan : </label>
                                                    <input class="form-control" type="file" name="mealplan" required><br>

                                                    <label> Detailed Plan <small style="font-weight:bold;"> (with Nutrient Analysis) </small>:  </label>
                                                    <input class="form-control" type="file" name="detailedplan" required>
                                                    

                                                    <small class="form-text text-muted">Allowed files: PDF ONLY.</small>
                                                    <input class="form-control" type="hidden" name="user_id"  value="<?php echo $id ?>">
                                                </div>
                                            <br>
                                            <input type="submit" name="submit" class="btn btn-info" onclick="return confirm('Upload Files?');" value="Upload PDF">
                                        </div>
                                </form>

	
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
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/Chart.bundle.js"></script>
    <script src="assets/js/chart.js"></script>
    <script src="assets/js/app.js"></script>
    
    <!--====== Alert Script START ======-->
    <script type="text/javascript">
    
    setTimeout (function(){
    //closing the alert
    $('.alert').alert('close');
    }, 3000);
    
    </script>

</body>
</html>
