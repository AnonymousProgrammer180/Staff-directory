<?php

// Include the database connection file
require_once("connection.php");

// Check if the form has been submitted by looking for 'submit' key in POST data
if(isset($_POST['submit'])) {
    
// Validate that none of the required fields are empty
    if(empty($_POST['FullName']) || empty($_POST['Email']) || empty($_POST['PhoneNumber']) || empty($_POST['Password'])) {
// Display an error message if any field is empty
        echo "Please fill in the blank fields";
    } else {
// Sanitize and assign form input values to variables
        $FullName = $_POST['FullName'];
        $Email = $_POST['Email'];
        $PhoneNumber = $_POST['PhoneNumber'];
        $Password = md5($_POST['Password']);
        
//  inserting user data into the 'signup' table
        $query = "INSERT INTO signup(FullName, Email, PhoneNumber, Password) VALUES ('$FullName', '$Email', '$PhoneNumber', '$Password')";
        
// Executing the query and store the result
        $result = mysqli_query($con, $query);

// Checking if the query was successful
        if($result) {
// Redirecting to 'directory.html' if the insertion was successful
            header("location:directory.html");
        } else {
// Display an error message if there was an issue with the query
            echo "There is an error in your query statement. Please check and try again: " . mysqli_error($con);
        }
    }
} else {
// Redirecting to 'directory.html' if the form was not submitted
    header("location:directory.html");
}








// Login PhP
session_start();

// Include the database connection file, which contains the code to connect to the MySQL database
require_once("connection.php");

// Check if the form has been submitted by looking for the 'submit' key in the POST data
if (isset($_POST['submit'])) {
    
// Retrieving the email and password from the form submission
    $Email = $_POST['Email'];
    $Password = md5($_POST['Password']);
    
// Validating that both the email and password fields are filled in
    if (empty($Email) || empty($Password)) {
// Display an error message if any required fields are empty
        echo "Please fill in all fields";
    } else {
// Construct an SQL query to select records from the 'signup' table where the email and password match the provided values
        $query = "SELECT * FROM signup WHERE Email='$Email' AND Password='$Password'";
        
// Executing the SQL query and store the result
        $result = mysqli_query($con, $query);

// Check if the query was successful and if any records were found
        if ($result && mysqli_num_rows($result) > 0) {
// If a matching record is found, store the user's email in a session variable
            $_SESSION['user_email'] = $Email;
            
// Redirecting the user to 'directory.html' upon successful login
            header("Location:directory.html");
            
// Exit the script to ensure no further code is executed after redirection
            exit();
        } else {
// Display an error message if no matching record is found (invalid email or password)
            echo "Invalid email or password";
        }
    }
} else {
// Redirect to 'login.html' if the form has not been submitted
    header("Location:login.html");
}
?>


