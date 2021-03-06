<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Child Health Record System</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
		

    </head>

    <body>

        <!-- Top content -->
<div class="top-content">

  <div class="inner-bg">
    <div class="container">
      <div class="row">
        <div id="logiin">
          <div class="col-sm-8 col-sm-offset-2 text">
            <h1><strong>Child Health</strong> Record System</h1>

          </div>
          <div class="row">
            <div class="col-sm-10 col-sm-offset-1 form-box">
              <div class="form-top">
                <div class="form-top-left">
                  <h3>Sign Up</h3>
                  <p>Fullfill all the information:</p>

                </div>
                <div class="form-top-right">
                  <i class="glyphicon 	fa fa-file-o"></i>
                </div>
              </div>

              <div class="form-bottom">

                <form role="form" action="process.php" method="post" class="login-form">

<div class="row">
<div class="col-sm-12">
<div class="col-sm-6">
                  <div class="form-group">
                    <label class="bname">Full Name *</label>
                    <input name="bname" required="required" type="text" placeholder="" class="form-control">
                  </div>
                  <div class="form-group">
                    <label class="dob" data-icon="p">Date of Birth *</label>
                    <input name="dob" required="required" type="date" placeholder="2007-11-19" class="form-control">
                  </div>

                  <div class="form-group">
                    <label>Gender *</label>
                    <br>
                    <input type="radio" size="30" name="bgender" value="Male" checked> Male<br>
                    <input type="radio" name="bgender" value="Female"> Female<br>

                  </div>


                  <div class="form-group">
                    <label class="breligion" data-icon="p">Religion *</label>
                    <input name="breligion" required="required" type="text" placeholder="eg. Islam" class="form-control">
                  </div>
				 
                  <div class="form-group">
                    <label class="brace" data-icon="p">Race *</label>
                    <input name="brace" required="required" type="text" placeholder="eg. Melayu" class="form-control">
                  </div>
				  
				  
				  </div>
				 
				  
<div class="col-sm-6">
				  
                  <div class="form-group">
                    <label class="uname" data-icon="p">MYKID number *</label>
                    <input name="username" pattern="[0-9]{12}" required="required" type="text" placeholder="eg. 071119105461"  title="Your mykid number is not valid" class="form-control">
                  </div>
				  <div class="form-group">
                    <label class="uname" data-icon="p">Email *</label>
                    <input name="email" required="required" type="email" placeholder="syafiq@gmail.com"   class="form-control">
                  </div>
				  <div class="form-group">
                    <label class="uname" data-icon="p">Phone Number *</label>
                    <input name="phone" required="required" type="text" placeholder="60189463804" value="60"  class="form-control">
                  </div>
                  <div class="form-group">
                    <label  class="password" data-icon="p">Password *</label>
                    <input id="password" name="password" required="required" type="password" placeholder="eg. abc123" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" class="form-control">
                  </div>
				  <div class="form-group">
                    <label class="password" data-icon="p">Comfirmation Password *</label>
                    <input id="confirm_password" name="password" required="required" type="password" placeholder="eg. Abc12345" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="form-control">
                  </div>
				  
				   
				  </div>
				  </div>
				   <div class="form-group">
				  <div id="meter"></div>
				  <br>
				  <span id="pass_type"></span>
</div>
                  <button type="submit" name="submitregister" class="btn" value="signup">Sign up!</button>
                </form>

              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6 col-sm-offset-3 social-login">

              <div class="social-login-buttons">
                <a class="btn btn-link-2" href="index.php">
                  <i class="fa fa-key"></i> Sign in
                </a>


              </div>
            </div>
          </div>

        </div>


      </div>

    </div>
  </div>

</div>



<!-- Javascript -->
<script src="assets/js/custom.js"></script>
<script src="assets/js/jquery-1.11.1.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.backstretch.min.js"></script>
<script src="assets/js/scripts.js"></script>
        
 
    </body>

</html>