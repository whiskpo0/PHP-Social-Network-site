<?php
// Declaring variables to prevent errors
$fname = "";        // First Name
$lname = "";        // Last Name
$em = "";           // Email
$em2 = "";          // Email 2
$password = "";     // Password
$password2 = "";    // Password 2
$date = "";         // Sign up date
$error_array = array();  // Holds error messages

// If submit button was pressed
if (isset($_POST['register_button'])){
    
    // Registration form values
    
    // First Name
    $fname = strip_tags($_POST['reg_fname']);      // Remove html tags
    $fname = str_replace(' ', '', $fname);         // Remove spaces
    $fname = ucfirst(strtolower($fname));          // Uppercase first letter
    $_SESSION['reg_fname'] = $fname;
    
    // Last Name
    $lname = strip_tags($_POST['reg_lname']);      // Remove html tags
    $lname = str_replace(' ', '', $lname);         // Remove spaces
    $lname = ucfirst(strtolower($lname));          // Uppercase first letter
    $_SESSION['reg_lname'] = $lname;
    
    // Email
    $em = strip_tags($_POST['reg_email1']);         // Remove html tags
    $em = str_replace(' ', '', $em);               // Remove spaces
    $em = ucfirst(strtolower($em));                // Uppercase first letter
    $_SESSION['reg_email'] = $em;
    
    // Email2
    $em2 = strip_tags($_POST['reg_email2']);       // Remove html tags
    $em2 = str_replace(' ', '', $em2);             // Remove spaces
    $em2 = ucfirst(strtolower($em2));              // Uppercase first letter
    $_SESSION['reg_email2'] = $em2;
    
    // Password
    $password = strip_tags($_POST['reg_password']); // Remove html tags
    $password2 = strip_tags($_POST['reg_password2']);// Remove html tags
    
    
    // Date
    $date = date('Y-m-d'); // Gets the current date
    
    if ($em == $em2){
        // Check if email is in valid format
        if (filter_var($em, FILTER_VALIDATE_EMAIL)){
            
            $em = filter_var($em, FILTER_VALIDATE_EMAIL);
            
            // Check if email already exist
            $e_check = mysqli_query($con, "SELECT email FROM user WHERE email = '$em'");
            
            // Count the number of rows returned
            $num_rows = mysqli_num_rows($e_check);
            
            if ($num_rows > 0 ){
                array_push($error_array, 'Email is already in use<br>');
            }
            
        }else {
            
            array_push($error_array,'Invalid email format<br>');
        }
        
    }else {
        
        array_push($error_array,'Emails dont match<br>');
    }
    
    
    // Check First name is valid length
    if (strlen($fname) > 25 || strlen($fname) < 2){
        array_push($error_array,'Your first name must be between 2 and 25 characters<br>');
    }
    
    // Check last name is valid length
    if (strlen($lname)  > 25 || strlen($lname) < 2){
        array_push($error_array,'Your last name must be between 2 and 25 characters<br>');
    }
    
    // Check to make sure passwords are the same
    if($password !== $password2){
        array_push($error_array,'Your passwords do not match<br>');
    }else {
        if (preg_match('/[^A-Za-z0-9]/', $password)){
            array_push($error_array,'Your password can only contain english characters or numbers<br>');
        }
    }
    
    // Check to make sure the password is long enough
    if (strlen($password) > 30 || strlen($password) < 5){
        array_push($error_array,'Your password must be between 5 and 30 characters<br>');
    }
    
    
    if (empty($error_array)){
        $password = md5($password); // Encrypt password before sending to database
        
        // Generate username by concatenating first name and lastname
        $username = strtolower($fname .'-'.$lname);
        $check_username_query = mysqli_query($con, "SELECT username FROM user WHERE username='$username'");
        
        $i = 0;
        
        // If username exists add number to username
        while (mysqli_num_rows($check_username_query) != 0){
            $i++;
            $username = $username . '-' . $i;
            $check_username_query = mysqli_query($con,"SELECT username FROM user WHERE username='$username'");
        }
        
        // Profile picture assignment
        $rand = rand(1,2); // Random number between 1 and 2
        
        if ($rand == 1){
            $profile_pic = 'assests/images/defaults/head_deep_blue.png';
        }else {
            $profile_pic = 'assests/images/defaults/head_emerald.png';
        }
        
        $query = mysqli_query($con, "INSERT INTO user VALUES('', '$fname', '$lname', '$username', '$em', '$password', '$date', '$profile_pic', '0','0', 'no', ',')");
        
        array_push($error_array, '<span style=\'color: #14c800;\'> You\'re all set! Go ahead and login!</span><br>');
        
        // Clear session variables
        $_SESSION['reg_fname'] = '';
        $_SESSION['reg_lname'] = '';
        $_SESSION['reg_email'] = '';
        $_SESSION['reg_email2'] = '';
        
    }
    
}// end of if()

?>