<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        
        <title>ATM-BRI</title>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url('assets/login/bootstrap.css') ?>" rel="stylesheet" type="text/css"></script>
        <!--external css-->
        <link href="<?php echo base_url('assets/search/normalize.css') ?>" rel="stylesheet" type="text/css"></script>
        <link href="<?php echo base_url('assets/search/demo.css.css') ?>" rel="stylesheet" type="text/css"></script>
        <link href="<?php echo base_url('assets/search/component.css') ?>" rel="stylesheet" type="text/css"></script>

        <!-- Custom styles for this template -->
        <link href="<?php echo base_url('assets/login/style.css') ?>" rel="stylesheet" type="text/css"></script>
        <link href="<?php echo base_url('assets/login/style-responsive.css') ?>" rel="stylesheet" type="text/css"></script>
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

    <div id="login-page">
        <div class="container">
            <form class="form-login" method="POST" action="<?php echo $action ?>">
                <h2><img src="<?php echo base_url('assets/login/logobri2.jpg') ?>"></h2>
                    <div class="login-wrap">
                        <input type="text" id="userId" class="form-control" name="username" placeholder="Username" autofocus>
		        <br>
		        <input type="password" id="password" class="form-control" name="password" placeholder="Password">
                        <div class="text-center text-error">
                            <?php echo $error; ?>
                        </div>
						<br>
                        <center><button type="submit" class="btn btn-primary" >Login</button>
                    </div>
            </form>                 
			<br>
			<center><a href="<?php echo site_url('Register/register')?>" target="_blank">Register Here</a>
        </div>
    </div>
     
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script src="<?php echo base_url('assets/login/jquery.backstretch.min.js') ?>"></script>
    <script>
        $.backstretch("<?php echo base_url('assets/login/login-bg.jpg') ?>", {speed: 800});
    </script>
	<script>
		function fungsiGuest() 
		{
			document.getElementById("userId").value= "Guest";
			document.getElementById("password").value= "Guest";
			document.getElementById("loginas2").value= "GUEST";
		}
	</script>
<script src="<?php echo base_url() ?>asset/bootstrap/bootstrap.js"></script>    
        <script src="<?php echo base_url() ?>asset/bootstrap/jquery-1.11.0.js"></script>    
        
        
        

  </body>
</html>
