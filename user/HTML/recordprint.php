<?php 
   include '../session.php';
   date_default_timezone_set("Asia/Kuala_Lumpur");
  
   require_once "../../class.php";
   $dbl = new db_class();
  
   $loggedin_id=$row['id'];
   
   $dbl->users_info($loggedin_id);	
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Profile Print</title>

    <!-- favicon -->
    <link href="favicon.png" rel=icon>

    <!-- web-fonts -->
    <link href="https://fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet">

    <!-- font-awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Style CSS -->
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar">
<div id="main-wrapper">
<div class="columns-block container">
<div class="right-col-block blocks">
<div class="theiaStickySidebar">
<section class="section-contact section-wrapper gray-bg">
    <div class="container-fluid">
       
        <!--.row-->
        <div class="row">
            <div class="col-md-12">
		
                                <h4 class="title">Curent Record</h4>
                                
                          

                   	  <div class='content table-responsive table-full-width'>
							<table class='table table-hover table-striped'>
<?php
$dbl->record_user($loggedin_id)
									?>
                                </table>
								<input class="hide-from-printer btn btn-outline-primary" type="button" value="Print" onclick="myFunction()">
								  </div>
                </div>
                <!-- .feedback-form -->


            
        </div>
    </div>
    <!--.container-fluid-->
</section>
<!--.section-contact-->


<!-- .footer -->
</div>
<!-- Sticky -->
</div>
<!-- .right-col-block -->
</div>
<!-- .columns-block -->
</div>
<!-- #main-wrapper -->
<script>function myFunction() {
    window.print();
}</script>
	<style>
	@media print {
  /* style sheet for print goes here */
  .hide-from-printer{  display:none; }
}
	</style>
<!-- jquery -->
<script src="js/jquery-2.1.4.min.js"></script>

<!-- Bootstrap -->
<script src="js/bootstrap.min.js"></script>
<script src="js/theia-sticky-sidebar.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>