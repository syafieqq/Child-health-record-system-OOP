<?php 
   include 'session.php';
   date_default_timezone_set("Asia/Kuala_Lumpur"); 
   require_once "../class.php";
   $dbl = new db_class(); 
   $loggedin_id=$_GET['id'];
   $dbl->users_info($loggedin_id);
   $dbl->health_info($loggedin_id);
   $dr = new db_class();
   $loggedin_id=$row['id'];
   $dr->users_info($loggedin_id);
      
   
?>

<script>
 function updatesum() {
    var d1= new Date(document.getElementById("d1").value); // was value;); removed inner ;
    var d2 = new Date(document.getElementById("d2").value); // was value;); removed inner ;

    var total = (d2.getDate() - d1.getDate()) / 30 +
        d2.getMonth() - d1.getMonth() +
        (12 * (d2.getFullYear() - d1.getFullYear()));
		
    // alert(total);
    document.getElementById("txtTotal").value = total.toFixed(1);
    return false;
  }
</script>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Light Bootstrap Dashboard by Creative Tim</title>

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
	<script type="text/javascript">
        function GetDays(){
                var dropdt = new Date(document.getElementById("drop_date").value);
                var pickdt = new Date(document.getElementById("pick_date").value);
                return parseInt((dropdt - pickdt) / (24 * 3600 * 1000));
        }

        function cal(){
        if(document.getElementById("drop_date")){
            document.getElementById("numdays2").value=GetDays();
        }  
    }

    </script>
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
                                <h4 class="title"><?php  echo  $dbl->name;  ?></h4>
                                <p class="category">Created using Roboto Font Family</p>
                            </div>
					<div class="content">		
 <div class="row">
<div class="col-md-4">
<form role="form" action="../process.php" method="post" class="login-form">
<input name= "id"type="text" value= "<?php  echo  $dbl->id;  ?>" ></input>
<h5 style=""><span class="glyphicon glyphicon-plus"></span> ADD REMINDER  </h5>

	
											<hr>
						
							<h6>Immunization Type *:</h6></label>
						<select style = "width:70%;" class = "form-control" name = "a_vaccine" required = "required">
							<option value = "">--Please select an option--</option>
							
				<?php $rows=$db->query("select * from vaccines"); 
				while(list($id,$vaccines)=$rows->fetch_row())
				{
					echo"<option value = '$vaccines'>$vaccines</option>";
				}
				
				?>
											
						</select>
						<br/>
						<h6>Dose *:</h6>
						<select style = "width:70%;" class = "form-control" name = "a_dos" required = "required">
							<option value = "">--Please select an option--</option>
							<option value = "Dos 1">Dose 1</option>
							<option value = "Dos 2">Dose 2</option>
							<option value = "Dos 3">Dose 3</option>
							<option value = "Booster">Booster</option>
							<option value = "Girls Only"> Girls Only</option>
							<option value = "Sabah Only">Sabah Only</option>
						</select>
						<br>
							
   
	
	 <div class="form-group">
                                                <h6>Date Reminder</h6>
												 <input type="text" value="<?php  echo  $dbl->dates;  ?>" class="textbox" id="pick_date" name="pickup_date" onchange="cal()">
                                               <input required = "required" class= "d2 form-control" type="date" name="d2" id="drop_date" onchange="cal()" />
											  
                                               <input type="text" class="textbox" id="numdays2" name="a_duration"/>
											    <input type="text" class="textbox" value="<?php  echo  $dbl->email;  ?>" name="a_email"/>
												<input type="text" class="textbox" value="<?php  echo  $dbl->phone;  ?>" name="a_phone"/>
											 
                                            </div>
						
							
											
											<button type="submit" name="updatereminder" value="recorddata" class="btn pull-right btn-info">Add Reminder</button>
						
						</form>
						
						
						</div>
						
						
						<style>
.vl {
    border-left: 1px solid gray;
    height: 500px;
}
</style>

						<div class="col-md-8">
						
											
											
							<div class='content' style="text-align: center;">
							<img class="img-responsive" style="height:450px; width: 600px; margin: auto;" src = "imune.jpg">
								  </div>				
										
											
										
	
						</div>
						
										
		
</div>	
        
                    </div>


                   


                </div>
            </div>
        </div>




    </div>
</div>
        <?php 
include 'footer.php'
?>

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