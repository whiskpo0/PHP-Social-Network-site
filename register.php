<?php 

    require 'config/config.php';
    require 'includes/form_handlers/register_handler.php';
    require 'includes/form_handlers/login_handler.php';


  
    
?>

<html>
	<head>
		<title>Welcome to the Social Network page</title>
		<link rel="stylesheet" type="text/css" href="assets/css/register_style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script  src="assets/js/register.js"></script>
	</head>
	<body>
	
		<?php 
		  if (isset($_POST['register_button']))
		  {
		      echo '
                <script>
                    $(document).ready(function(){
                        $("#first").hide();
                        $("#second").show();
                    });
                    
                </script>
              ';
		  }
		?>
	
	
		<div class="wrapper">
		
		<div class="login_box">
		
			<div class="login_header">
				<h1>Swirlfeed!</h1>
				Login or sign up below!
			</div>	
				<div id="first"> 
    				<form action="register.php" method="POST">
            			<input type="email" name="log_email" value="<?php if (isset($_POST['log_email'])){ echo $_SESSION['log_email']; }?>" placeholder="Email Address">            			
            			<br>
            			 <input type="password" name="log_password" placeholder="Password">
            			<br> 
            			<?php if (in_array('Email or password are incorrect.<br>', $error_array)) echo 'Email or password are incorrect.<br>'; ?>
            			 <input type="submit" name="login_button" value="Login" >
            			 <br>
            			 <a href="#" id="signup" class="signup">Need an account Register here!</a>
            		</form>
				</div>	
				
				<div id="second">
	
            		<form action="register.php" method="POST">
            			
            			<input type="text" name="reg_fname" value="<?php if (isset($_POST['reg_fname'])){ echo $_SESSION['reg_fname'];} ?>" placeholder="First Name" required>
            			<br>
            			<?php if (in_array('Your first name must be between 2 and 25 characters<br>', $error_array)) echo 'Email is already in use<br>'; ?>
            			
            			<input type="text" name="reg_lname" value="<?php if (isset($_POST['reg_lname'])){ echo $_SESSION['reg_lname'];} ?>" placeholder="Last Name" required>
            			<br>
            			<?php if (in_array('Your last name must be between 2 and 25 characters<br>', $error_array)) echo 'Your last name must be between 2 and 25 characters<br>'; ?>
            			
            			<input type="email" name="reg_email1" value="<?php if (isset($_POST['reg_lname'])){ echo $_SESSION['reg_email'];} ?>" placeholder="Email" required>
            			<br>
            			<?php if (in_array('Email is already in use<br>', $error_array)) echo 'Email is already in use<br>'; ?>
            			
            			<input type="email" name="reg_email2" value="<?php if (isset($_POST['reg_lname'])){ echo $_SESSION['reg_email2'];} ?>" placeholder="Confirm Email" required>
            			<br>
            			<?php if (in_array('Email is already in use<br>', $error_array)) echo 'Email is already in use<br>';
                    	      elseif(in_array('Invalid email format<br>', $error_array)) echo 'Invalid email format<br>'; 
                    	      elseif(in_array('Emails dont match<br>', $error_array)) echo 'Emails dont match<br>'; 
                    	?>
            			
            			<input type="password" name="reg_password"  placeholder="Password" required>
            			<br>
            			<input type="password" name="reg_password2"  placeholder="Confirm Password" required>
            			<br>
            			<?php 
                			if (in_array('Your passwords do not match<br>', $error_array)) echo 'Your passwords do not match<br>';
                			elseif (in_array('Your password can only contain english characters or numbers<br>', $error_array)) echo 'Your password can only contain english characters or numbers<br>'; 
                			elseif (in_array('Your password must be between 5 and 30 characters<br>', $error_array)) echo 'Your password must be between 5 and 30 characters<br>'; 
            			?>	
            		
            			<input type="submit" name="register_button" value="Register" >
            			<br>
            			<?php if (in_array('<span style=\'color: #14c800;\'> You\'re all set! Go ahead and login!</span><br>', $error_array)) echo '<span style=\'color: #14c800;\'> You\'re all set! Go ahead and login!</span><br>';?>
            		
            			<a href="#" id="signin" class="signin">Already have an account? Sign in here!</a>
            	
            		</form>				
				
				</div>
								
			</div>

		</div>

	</body>
</html>