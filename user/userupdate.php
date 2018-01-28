<?php 
   include 'session.php';
   date_default_timezone_set("Asia/Kuala_Lumpur");  
   require_once "../class.php";  
   $dbl = new db_class(); 
   $loggedin_id=$row['id'];  
   $dbl->users_info($loggedin_id);	
?>		
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />


	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
	
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
	

</head>

<body>


<div class="wrapper">
    

<!--- sidenav start here --->
<?php
			include 'sidenav.php'
			
			?>

<!-- sidenav end here--->
    	


    <div class="main-panel">
		
		<!--topnav-->
		<?php
			include 'topnav.php'
			
			?>
		<!---topnav end here--->


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Profile</h4>
                            </div>
							<hr>
							
						
                            <div class="content">
							<div>
							
							<form id="imageform" method="post" enctype="multipart/form-data" action='ajaximage2.php'>
							<label>Profile Picture</label>
									<div class="row">
									
                                        <div class="col-md-12">
										
										<div id='preview'>
</div>
										
										<?php	echo "<img src='user/../uploads/$dbl->n_img' width='200' height='200'>" ?>
										</div>
										</div>
										<div class="row">
										 <div class="col-md-12">
										<input type='file' name="photoimg" id="photoimg"  value='<?php  echo  $s_img;?>'>
										</div>
										</div>
										<div class="row">
										<div class="col-md-12">
										<button type="submit" name="update-profile" value="update-profile" class="btn pull-left">Save</button>
										</div>
										</div>
										
										</form>
										 <hr>
							

                                <form role="form" action="../process.php" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control" disabled placeholder="Name" value="<?php  echo  $dbl->name;  ?>" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Nickname</label>
                                                <input type="text" class="form-control" placeholder="Username"  value="<?php  echo  $dbl->nickname;  ?>" name="nickname">
                                            </div>
                                        </div>
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label>MyKid</label>
                                                <input disabled type="text" class="form-control" placeholder="Username"  value="<?php  echo  $dbl->username;  ?>">
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Date of birthday</label>
                                                <input disabled type="text" class="form-control" placeholder="Company" value="<?php  echo  $dbl->dob;  ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Place of birthday</label>
                                                <input type="text" class="form-control" placeholder="Last Name" value="<?php  echo  $dbl->pob;  ?>" name="pob">
                                            </div>
                                        </div>
                                    </div>

									<div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <input disabled type="text" class="form-control" placeholder="City" value="<?php  echo  $dbl->gender;  ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Religion</label>
                                                <input disabled type="text" class="form-control" placeholder="Country" value="<?php  echo  $dbl->religion;  ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Race</label>
                                                <input disabled type="text" class="form-control" placeholder="ZIP Code" value="<?php  echo  $dbl->race;?>">
                                            </div>
                                        </div>
                                    </div>
									  <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input  name="email" type="text" class="form-control" placeholder="Company" value="<?php  echo  $dbl->email;  ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Phone Number</label>
                                                <input type="text" class="form-control" placeholder="Last Name" value="<?php  echo  $dbl->phone;  ?>" name="phone">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control" placeholder="Home Address" value="<?php  echo  $dbl->address;  ?>" name="address">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Postcode</label>
                                                <input type="text" class="form-control" placeholder="City" value="<?php  echo  $dbl->postcode;  ?>" name="postcode">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" class="form-control" placeholder="Country" value="<?php  echo  $dbl->town;  ?>" name="town">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>State</label>
                                                <input type="text" class="form-control" placeholder="ZIP Code" value="<?php  echo  $dbl->state;?>" name="state">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>About Me</label>
                                                <textarea rows="5" class="form-control" placeholder="Here can be your description" value="huhu" name="status"><?php  echo  $dbl->status;?></textarea>
                                            </div>
                                        </div>
                                    </div>
									
									
								<td><input type="hidden" name="id" value=<?php echo $dbl->id;?>></td>
                                    <button type="submit" name="update" value="update" class="btn btn-info btn-fill pull-right"onclick="demo.showNotification('top','right')">Update Profile</button>
									
                                    <div class="clearfix"></div>
									
                                </form>
								
                            </div>
                        </div>
                    </div>
					
                 

                </div>
            </div>
        </div>

	<?php
//  close  connection;
mysqli_close($db);

?>	
        <?php 
include 'footer.php'
?>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>
	
</html>