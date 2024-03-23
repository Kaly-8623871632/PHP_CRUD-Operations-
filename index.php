<?php
include "db_conn.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">  
    
    <link rel="stylesheet" href="style.css"> <!-- Link to custom CSS file -->
   
    
</head>
<body> 
<div class="container my-4">
<?php
if (isset($_GET["msg"])) {
    $msg = $_GET["msg"];
?>
<div id="alert-msg" class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Success!</strong> <?php echo $msg; ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<script>
// Automatically close the alert after 1 second (1000 milliseconds)
setTimeout(function() {
    document.getElementById('alert-msg').style.display = 'none';
}, 1000);
</script>
<?php
}
?>
<nav aria-label="breadcrumb ">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Users</a></li>
           
        </ol>
    </nav> 
    
    <div class="add-user-button my-4 d-flex justify-content-end">
    <a href="add_user.php" class="btn btn-primary">Add New User</a>
</div>
    <table class="table table-bordered my-4 text-center">
    <thead class="table-dark">
                <tr>
                   <th>Id</th>
                   <th>First name</th>
                   <th>last name</th>
                   <th> Email </th>
                   <th> Designation </th>
                   <th>Actions</th>
                </tr>
            </thead>
           
            <tbody>
        <?php
        $sql = "SELECT * FROM `users`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>

        
        
          <tr>
            <td><?php echo $row["user_id"] ?></td>
            <td><?php echo $row["first_name"] ?></td>
            <td><?php echo $row["last_name"] ?></td>
            <td><?php echo $row["Email_Address"] ?></td>
            <td><?php echo $row["designation" ]?></td>

            <td>
            <a href="ViewProfile.php?user_id=<?php echo $row["user_id"] ?>" class="link-danger"><i class="bi bi-eye-fill fs-5 me-3"></i></a>
            <a href="edit_user.php?user_id=<?php echo $row["user_id"] ?>" class="link-danger"><i class="bi bi-pencil-square me-4"></i></a>
            <a href="delete_user.php?user_id=<?php echo $row["user_id"] ?>" class="link-dark"><i class="bi bi-trash fs-5 me-3"></i></a>
           
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
        </table>
</div> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.bundle.min.js"></script> 

</body>
</html>