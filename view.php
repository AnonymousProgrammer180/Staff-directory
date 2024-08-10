<?php
require_once("connection.php");
$query = "SELECT * FROM staff";
$result = mysqli_query($con, $query);
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="css\view.css">
  <title>signup</title>
</head>

<body>
<!--Header-->
<div class="navbar">
        
        <div class="logo" ><img src="images\logo.png" ></div>
        <ul class="nav-links">
            <li class="option"><a href="https://umat.edu.gh/" class="nav-item">Home</a></li>
            <li><a href="login.html" class="nav-item">Sign Out</a></li>
        </ul>
        </div>
    </div>
    
    <h1>staff directory</h1>

 <!--section--> 
 <div class="container">  
    
        <div class="form-box">
            
            <table>
                <thead>
                <tr>
                    <td>Staff-ID</td>
                    <td>Full Name</td>
                    <td>Department</td>
                    <td>Subject</td> 
                    <td>About</td>                    
                </tr></thead>

                <?php
                while($row = mysqli_fetch_assoc($result))
                {
                    $ID =$row['ID'];
                    $FullName =$row['FullName'];
                    $Department =$row['Department'];
                    $Subject =$row['Subject'];
                    $About =$row['About'];
                    ?>

                    <tr>
                        <td> <?php echo $ID ?></td>
                        <td><?php echo $FullName ?></td>
                        <td><?php echo $Department ?></td>
                        <td><?php echo $Subject ?></td>
                        <td><?php echo $About ?></td>
                    </tr>
                    <?php
                }                
                ?>
            </table>
        </div>
        <footer class="foot">
        <h5 id="copyright">© All right reserved, University of Mines and Technology <br> <a href="terms and condition.html">Terms and Conditions</a> 
            and <a href="privacy.html">Privacy Policies</a></h5>
        
    </footer>
    </section></div>
    
</body>
</html>