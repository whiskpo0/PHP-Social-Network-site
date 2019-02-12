<?php 
    require 'config/config.php';
    
    if (isset($_SESSION['username'])){
        $userLoggedIn = $_SESSION['username']; 
        $user_details_query = mysqli_query($con, "SELECT * FROM user WHERE username = '$userLoggedIn'"); 
        $user = mysqli_fetch_array($user_details_query); 
        
    }else{
        header("Location: register.php"); 
    }
?>


<html>
	<head>
		<title>Index page</title>	
		
		<!-- Javascript -->	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="assets/js/bootstrap.js"></script>
		
		<!-- CSS -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">
		
		
		
		
	</head>
<body>

	<div class="top_bar">
		<div class="logo">
			<a href="">Swirlfeed!</a>
		</div>
		
		<nav>
			<a href="<?php echo $userLoggedIn; ?>">
				<?php echo $user['first_name'];  ?>
			</a>
			<a href="#"><i class="fas fa-home"></i></a>
			<a href="#"><i class="far fa-envelope"></i></a>
			<a href="#"><i class="far fa-bell"></i></a>	
			<a href=""><i class="fas fa-users"></i></a>		
			<a href=""><i class="fas fa-cog"></i></a>
			<a href="includes/handlers/logout.php"><i class="fas fa-sign-out-alt"></i></a>	
		</nav>
	
	</div>
	
	<div class="wrapper">
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
