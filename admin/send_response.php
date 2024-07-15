<?php 
//error_reporting (0);
include 'includes/conn.php'; 
if(isset($_POST['submit']))
    {
        $id=$_POST['userid'];
        $message=$_POST['message'];
        $ip_address = $_SERVER['REMOTE_ADDR'];
        $date = date("d-m-Y");
        $time = date("H:i:s");
            
        $sql = "INSERT INTO client_messages (ID, message, status, ip_address, date, time ) values (:id, :message, '0', :ip_address, :date, :time)";
        $query = $conn->prepare($sql);
        $query->bindParam(':id',$id,PDO::PARAM_STR);
        $query->bindParam(':message',$message,PDO::PARAM_STR);
        $query->bindParam(':ip_address',$ip_address,PDO::PARAM_STR);
        $query->bindParam(':date',$date,PDO::PARAM_STR);
        $query->bindParam(':time',$time,PDO::PARAM_STR);
        $query->execute();
        header("Location: pending_forms?success= Response Sent !!");
        exit();
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
                            <a class="btn btn-info" href="pending_forms" style="color:white;float:right;">Back</a><h1 style="float: left;">Send Response</h1>
                        
                                <form method="POST" enctype="multipart/form-data">

                                    <?php	
                                            $id=$_GET['response'];
                                            $ret="select * from users where id=:id";
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
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" name="userid" id="userid" value="<?php echo htmlentities($result->ID);?>">
                                                <div>
                                                    <input class="form-control" name="username" id="username" value="<?php echo htmlentities($result->username);?>" readonly>
                                                </div>
                                            <br>
                                            <label>Message:</label>
                                                <div>
                                                   <textarea class="form-control" name="message" id="message" rows="5" col="10" required > 

                                                   </textarea>
                                                </div>
                                            <br>
                                           
                                            <input type="submit" name="submit" class="btn btn-info" onclick="return confirm('Send Response?');" value="Send Response">
                                        </div>

                                        <?php }} else{
                                            echo ' No Data Available !!';
                                            } 
                                        ?>
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
    
    CKEDITOR.replace('body');
    
    setTimeout (function(){
    //closing the alert
    $('.alert').alert('close');
    }, 3000);
    
    </script>
</body>
</html>
