<?php
include "db_conn.php";

if (isset($_POST["Add"])) {
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
    // Profile Picture handling
    $Profile_Picture = $_FILES['Profile_Picture']['name'];
    $Profile_Picture_tmp = $_FILES['Profile_Picture']['tmp_name'];
    $Profile_Picture_folder = "Images/" . $Profile_Picture;

    // Resume handling
    $Resume = $_FILES['Resume']['name'];
    $Resume_tmp = $_FILES['Resume']['tmp_name'];
    $Resume_folder = "Resumes/" . $Resume;

    // Move uploaded files to their respective folders
    move_uploaded_file($Profile_Picture_tmp, $Profile_Picture_folder);
    move_uploaded_file($Resume_tmp, $Resume_folder);

    $sql = "INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `designation`, `Email_Address`, `Mobile_No`, `location`, `Website`, `Twitter_Profile`, `GitHub_Profile`, `LinkedIn_Profile`, `Instagram_Profile`, `Facebook_Profile`, `Profile_Picture`, `Resume`) VALUES (NULL,'$first_name','$last_name','$designation', '$Email_Address','$Mobile_No','$location','$Website','$Twitter_Profile','$GitHub_Profile','$LinkedIn_Profile','$Instagram_Profile','$Facebook_Profile','$Profile_Picture_folder','$Resume_folder')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: index.php?msg = User Added successfully!!!");
        exit();
    } else {
        echo "Failed: " . mysqli_error($conn);
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
    
    <div class="container">
        <div class="content-wrapper">
              <form action="" method="POST" enctype="multipart/form-data">
        <div class="row">
               <div class="col-md-6">
                  <label class="form-label">First Name</label>
                  <input type="text" class="form-control" name="first_name" placeholder="First name" required>
               </div>

               <div class="col-md-6">
                  <label class="form-label">Last Name </label>
                  <input type="text" class="form-control" name="last_name" placeholder="Last name " required>
               </div>
        </div>

        <div class="row">
                <div class="col-md-6">
                    <label class="form-label">Designation</label>
                    <input type="text"  name="designation" class="form-control" placeholder="designation" required>
                </div>
    
                <div class="col-md-6">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="Email_Address" class="form-control" placeholder="email@example.com" required>
                </div>
        </div>

         
        <div class="row">
               <div class="col-md-6">
               <label class="form-label">Mobile No</label>
               <input type="text" name="Mobile_No" class="form-control" maxlength="10" size="10" placeholder="Mobile No"required>
                </div>
      
                <div class="col-md-6">
                    <label class="form-label">Location</label>
                    <input type="text" name="location" class="form-control" placeholder="Location"required>
               </div>
         </div> <br>

         <div class="row">
                <div class="col-md-6"> 
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-globe"></i></span>
                        <input type="text" name="Website" class="form-control" placeholder="Website">
                    </div>
                </div>
         
      
                <div class="col-md-6"> 
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-twitter"></i></span>
                        <input type="text" name="Twitter_Profile" class="form-control" placeholder="Twitter Profile">
                    </div>
                </div>  
          </div> <br>

          <div class="row">
                <div class="col-md-6"> 
                    <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-github"></i></span>
                    <input type="text" name="GitHub_Profile" class="form-control" placeholder="GitHub Profile">
                    </div>
                </div>
         
      
                <div class="col-md-6"> 
                    <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-linkedin"></i></span>
                        <input type="text"  name="LinkedIn_Profile" class="form-control" placeholder="LinkedIn Profile">
                    </div>
                </div>  
          </div> <br>

          <div class="row">
                <div class="col-md-6"> 
                    <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-instagram"></i></span>
                        <input type="text" name="Instagram_Profile"  class="form-control" placeholder="Instagram Profile">
                    </div>
                </div>
         
      
                <div class="col-md-6"> 
                    <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-facebook"></i></span>
                        <input type="text" name="Facebook_Profile"  class="form-control" placeholder="Facebook Profile">
                    </div>
                </div>  
          </div> 
               
        <div class="row">
                     <div class="col-md-6">
                     <label  class="form-label">Profile Picture</label>
                        <input type="file" class="form-control" id="profilePicture" name="Profile_Picture" accept=".png, .jpeg, .jpg" required>
                    </div>
                      <div class="col-md-6">
                        <label class="form-label">Resume</label>
                         <input type="file" class="form-control" id="resume" name="Resume"required>
                       </div>
                    </div>
                </div> <br> 
                  
                <div class="container add-user-button">
                   <div class="row  justify-content-end " >
                       <div class="col-md-6">
                       <button type="submit" name="Add" class="btn btn-primary">Add</button>
                              <!-- <a href="index.php" class="btn btn-primary">Add</a>  -->
                       </div>
                   </div>
                </div><br> 
                
            </form>
        </div>
    </div>
</body>
</html>
