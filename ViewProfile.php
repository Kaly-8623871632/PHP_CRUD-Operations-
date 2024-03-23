<?php
include "db_conn.php";
$user_id = $_GET["user_id"];
  //$user_id = isset($_GET['user_id']) ? $_GET['user_id'] : null;
 // $sql = "SELECT * FROM `users` WHERE user_id = $user_id";
$sql = "SELECT * FROM `users` WHERE user_id = $user_id LIMIT 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);


   // Handle form submission
   if (isset($_POST["Display"])) {
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
  
    $sql = "INSERT INTO `users` `first_name` = '$first_name',`last_name` = '$last_name',`designation`= '$designation', `Email_Address` = '$Email_Address',`Mobile_No` = '$Mobile_No',`location` = '$location', `Website` = '$Website',
    `Twitter_Profile` = '$Twitter_Profile',`GitHub_Profile` = '$GitHub_Profile',`LinkedIn_Profile` = '$LinkedIn_Profile',`Instagram_Profile` = '$Instagram_Profile',`Facebook_Profile` = '$Facebook_Profile' WHERE user_id = $user_id";


  
    $result = mysqli_query($conn, $sql);

     if ($result) {
      header("Location: ViewProfile.php?msg= Display record successfully");
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
    <link rel="stylesheet" href="style.css"> <!-- Link to custom CSS file -->

    
</head>
<body>
<div class="container">
    <div class="main-body">
    
          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="index.php">User</a></li>
              <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
            
          </nav>
          <!-- /Breadcrumb -->
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                  <img src="<?php echo isset($row['Profile_Picture']) ? $row['Profile_Picture'] : 'default_profile.jpg'; ?>" alt="Admin" class="rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">

                    <div class="mt-3">
                      <h4><?php echo isset($row['first_name']) ? $row['first_name'] : ''; ?> <?php echo isset($row['last_name']) ? $row['last_name'] : ''; ?></h4>
                      <h5><p class="text-secondary mb-1"><?php echo isset($row['designation']) ? $row['designation'] : ''; ?></p><h5>
                      <p class="text-muted font-size-sm"><?php echo isset($row['location']) ? $row['location'] : ''; ?></p>
                      <button class="btn btn-primary">Follow</button>
                      <a href="<?php echo isset($row['Resume']) ? $row['Resume'] : '#'; ?>" download>
                          <button class="btn btn-outline-primary">Download Resume</button>
                      </a>
                      
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
                    <span class="text-secondary"><?php echo isset($row['Website']) ? $row['Website'] : ''; ?> </span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="bi bi-linkedin" viewBox="0 0 24 24"><path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z"></path></svg> LinkedIn </h6>
                    <span class="text-secondary"><?php echo isset($row['LinkedIn_Profile']) ? $row['LinkedIn_Profile'] : ''; ?></span>
                  </li> 

                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github mr-2 icon-inline"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>GitHub</h6>
                    <span class="text-secondary"><?php echo isset($row['GitHub_Profile']) ? $row['GitHub_Profile'] : ''; ?></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
                    <span class="text-secondary"><?php echo isset($row['Twitter_Profile']) ? $row['Twitter_Profile'] : ''; ?></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
                    <span class="text-secondary"><?php echo isset($row['Instagram_Profile']) ? $row['Instagram_Profile'] : ''; ?></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
                    <span class="text-secondary"><?php echo isset($row['Facebook_Profile']) ? $row['Facebook_Profile'] : ''; ?></span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">First Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo isset($row['first_name']) ? $row['first_name'] : ''; ?>
                    </div>
                  </div><hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Last Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo isset($row['last_name']) ? $row['last_name'] : ''; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo isset($row['Email_Address']) ? $row['Email_Address'] : ''; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Mobile</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo isset($row['Mobile_No']) ? $row['Mobile_No'] : ''; ?>  
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Location</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo isset($row['location']) ? $row['location'] : ''; ?>
                    </div>
                  </div>
                  <hr>

                </div>
              </div>

              <div class="row gutters-sm">
                <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2"></i>Language</h6>
                      <small>Marathi</small>
                      <div class="progress mb-3" style="height: 9px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width:90%" aria-valuemin="0" aria-valuemax="100">90%</div>
                      </div>
                      <small>Hindi</small>
                      <div class="progress mb-3" style="height: 9px">
                        <div class="progress-bar bg-primary" role="progressbar"  aria-valuemin="0" aria-valuemax="100" style="width:70%">70%</div>
                      </div>
                      <small>English</small>
                      <div class="progress mb-3" style="height: 9px">
                        <div class="progress-bar bg-primary" role="progressbar"  aria-valuemin="0" aria-valuemax="100" style="width:80%">80%</div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2"></i>Technical Skills </h6>
                      <small>Web Design</small>
                      <div class="progress mb-3" style="height: 9px">
                        <div class="progress-bar bg-primary" role="progressbar"  aria-valuemin="0" aria-valuemax="100" style="width:80%">80%</div>
                      </div>
                      <small>Web Developer </small>
                      <div class="progress mb-3" style="height: 9px">
                        <div class="progress-bar bg-primary" role="progressbar"   aria-valuemin="0" aria-valuemax="100" style="width:70%">70%</div>
                      </div>
                      <small> Full Stack Java Developer </small>
                      <div class="progress mb-3" style="height: 9px">
                        <div class="progress-bar bg-primary" role="progressbar"   aria-valuemin="0" aria-valuemax="100" style="width:75%">75%</div>
                      </div>
                      <small> Python </small>
                      <div class="progress mb-3" style="height: 9px">
                        <div class="progress-bar bg-primary" role="progressbar"  aria-valuemin="0" aria-valuemax="100" style="width:70%">70%</div>
                      </div>
                     
                    </div>
                  </div>
                </div>
              </div>



            </div>
          </div>

        </div>
    </div>
</body>
</html>