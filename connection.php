<?php

//connection//
$con = new mysqli("localhost", "root", "", "contact directory");

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>