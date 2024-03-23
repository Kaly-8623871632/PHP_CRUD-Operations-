<?php
include "db_conn.php";
    
// Fetch user details based on user_id
$user_id = $_GET["user_id"];
  //$user_id = isset($_GET['user_id']) ? $_GET['user_id'] : null;
 // $sql = "SELECT * FROM `users` WHERE user_id = $user_id";
$sql = "SELECT * FROM `users` WHERE user_id = $user_id LIMIT 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);


   // Handle form submission
   if (isset($_POST["Save"])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $designation= $_POST['designation'];
    $Email_Address = $_POST['Email_Address'];
    $Mobile_No = $_POST['Mobile_No'];
    $location = $_POST['location'];
    $Website = $_POST['Website'];
    $Twitter_Profile = $_POST['Twitter_Profile'];
    $GitHub_Profile = $_POST['GitHub_Profile'];
    $LinkedIn_Profile = $_POST['LinkedIn_Profile'];
    $Instagram_Profile = $_POST['Instagram_Profile'];
    $Facebook_Profile = $_POST['Facebook_Profile'];
    
    // Update user details in the database
    $sql = "UPDATE `users` SET `first_name` = '$first_name',`last_name` = '$last_name',`designation`= '$designation', `Email_Address` = '$Email_Address',`Mobile_No` = '$Mobile_No',`location` = '$location', `Website` = '$Website',
            `Twitter_Profile` = '$Twitter_Profile',`GitHub_Profile` = '$GitHub_Profile',`LinkedIn_Profile` = '$LinkedIn_Profile',`Instagram_Profile` = '$Instagram_Profile',`Facebook_Profile` = '$Facebook_Profile' WHERE user_id = $user_id";

    if (mysqli_query($conn, $sql)) {
      header("Location: index.php?msg= Record Updated successfully !! ");
    } else {
      echo "Error updating user details: " . mysqli_error($conn);
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.bundle.min.js"></script> 
    <link rel="stylesheet" href="style.css"> <!-- Link to custom CSS file -->
    
</head>
<body> 
     
<nav aria-label="breadcrumb">
        <ol class="breadcrumb mx-4 my-4 justify-content-start">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="index.php">User</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit User</li>
        </ol>
    </nav>
    
    <div class="container my-4">
        <div class="content-wrapper">
        <form action="" method="post">
        <div class="row">
        <div class="col-md-6">
                  <label class="form-label">First Name</label>
                  <input type="text" class="form-control" name="first_name" value="<?php echo $row['first_name'] ?>">
               </div>
              
               <div class="col-md-6">
                  <label class="form-label">Last Name </label>
                  <input type="text" class="form-control" name="last_name"value="<?php echo  $row['last_name']  ?>">
               </div>
        </div>

        <div class="row"> 
               <div class="col-md-6">
                  <label class="form-label">Designation</label>      
                  <input type="text" name="designation" class="form-control" value="<?php echo $row['designation'] ?>">
                </div>

              <div class="col-md-6">
                <label class="form-label">Email Address</label>
               <input type="email" name="Email_Address" class="form-control" value="<?php echo $row['Email_Address'] ?>">
            </div>
       </div>    

        <div class="row">
               <div class="col-md-6">
               <label class="form-label">Mobile No</label>
               <input type="text" name="Mobile_No" class="form-control" maxlength="10" size="10" value="<?php echo $row['Mobile_No'] ?>">
                </div>
      
                <div class="col-md-6">
                    <label class="form-label">Location</label>
                    <input type="text" name="location" class="form-control" value="<?php echo $row['location'] ?>">
                </div>
               </div> <br>       

               <div class="row">
             <div class="col-md-6"> 
                <div class="input-group">
                   <span class="input-group-text"><i class="bi bi-globe"></i></span>
                   <input type="text" name="Website" class="form-control" value="<?php echo isset($row['Website']) ? $row['Website'] : '' ?>">
                 </div>
             </div>
 
              <div class="col-md-6"> 
                <div class="input-group">
                      <span class="input-group-text"><i class="bi bi-twitter"></i></span>
                     <input type="text" name="Twitter_Profile" class="form-control" value="<?php echo isset($row['Twitter_Profile']) ? $row['Twitter_Profile'] : '' ?>">
                  </div>
                </div>  
              </div><br>

        <div class="row">
               <div class="col-md-6"> 
                 <div class="input-group">
                   <span class="input-group-text"><i class="bi bi-github"></i></span>
                   <input type="text" name="GitHub_Profile" class="form-control" value="<?php echo isset($row['GitHub_Profile']) ? $row['GitHub_Profile'] : '' ?>">
                 </div>
           </div>
 
              <div class="col-md-6"> 
                <div class="input-group">
                   <span class="input-group-text"><i class="bi bi-linkedin"></i></span>
                  <input type="text"  name="LinkedIn_Profile" class="form-control" value="<?php echo isset($row['LinkedIn_Profile']) ? $row['LinkedIn_Profile'] : '' ?>">
                  </div>
               </div>  
            </div><br>

            <div class="row">
               <div class="col-md-6"> 
                    <div class="input-group">
                      <span class="input-group-text"><i class="bi bi-instagram"></i></span>
                      <input type="text" name="Instagram_Profile"  class="form-control" value="<?php echo isset($row['Instagram_Profile']) ? $row['Instagram_Profile'] : '' ?>">
                    </div>
            </div>
 
            <div class="col-md-6"> 
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-facebook"></i></span>
                    <input type="text" name="Facebook_Profile"  class="form-control" value="<?php echo isset($row['Facebook_Profile']) ? $row['Facebook_Profile'] : '' ?>">
                     </div>
                  </div>  
            </div><br>
               
            <div class="row">
               <div class="col-md-6">
                    <label class="form-label">Profile Picture</label>
                    <input type="file" class="form-control" name="Profile_Picture" accept=".png, .jpeg, .jpg" value="<?php echo isset($row['Profile Picture']) ? $row['Profile Picture'] : '' ?>">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Resume</label>
                    <input type="file" class="form-control" name="Resume" value="<?php echo isset($row['Resume']) ? $row['Resume'] : '' ?>">
                </div>
           </div>
                 
            <div class="container add-user-button">
                   <div class="row  justify-content-end " >
                       <div class="col-md-6">
                       <button type="submit" name="Save" class="btn btn-primary" >Save</button>
                       </div>
                   </div>
              </div><br> 

            </form>
        </div>
    </div>
</body>
</html>
