<?php 
error_reporting (0);       
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
                                    <?php if ($_GET['success']) { ?>
                                    <div class="alert alert-success fade show" style="max-width:fit-content;max-height:wrap-content;position:fixed;margin-top:-10px;font-size:12px;" role="alert">
                                        <strong><?=htmlspecialchars($_GET['success']) ?></strong>
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
                            <!-- <a class="btn btn-info" href="handled_forms" style="color:white;float:right;">Handled Forms</a> --><h1 style="float: left;">Pending Forms</h1>
                                    <table class="table mb-0 table-striped" style="border:2px;font-size:12px;text-align:right;cursor:pointer;">
                                        <thead style="font-weight:500;color:#421966">
                                            <tr>
                                                <td>No:</td>
                                                <td>Client Name</td>
                                                <td>Goal</td>
                                                <td>Action</td>

                                            </tr>
                                        </thead>
										<tbody>

                                            <?php 
                                            include 'includes/conn.php';
                                                $sql = "SELECT * FROM users join bmi_data on bmi_data.user_ID=users.ID where status='1'";
                                                $query = $conn -> prepare($sql);
                                                $query->execute();
                                                $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                $cnt=1;
                                                if($query->rowCount() > 0)
                                                {
                                                foreach($results as $result)
                                                {	
                                            ?>
											<tr>
		                                        <td><?php echo htmlentities($cnt);?></td> 
                                                <td><?php echo htmlentities($result->username);?></td>
                                                <td><?php echo htmlentities($result->goal);?></td>
												<td style="font-size:12px;padding:10px;">
                                                    <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="send_response?response=<?php echo $result->ID;?>"><i class="fa fa-comments-o"></i> Respond</a>
                                                        <a class="dropdown-item" href="make_plan?plan=<?php echo $result->ID;?>"><i class="fa fa-file-text-o"></i> Make a Plan</a>
                                                    </div>
                                                    </div>
                                                </td>
											</tr>
                                            <?php $cnt=$cnt+1; }} else{ echo '<td colspan="6" style="text-align:center;color:red;font-weight:bold;">You have no pending Forms Yet! </td>'; } ?>
											
										</tbody>
									</table>
                        
                                
                       
							
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


