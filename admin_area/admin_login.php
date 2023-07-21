<!-- connect file -->

<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin login</title>
       <!--bootstrap css link-->
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!--fontawesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--linking css file-->
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container-fluid mx-3">
    <h2 class="text-center">Admin login</h2>
    <div class="row d-flex align-items-center justify-content-center">
        <div class="Col-lg-12 col-xl-6">
<form action="" method="post" enctype="multipart/form-data">
    <!-- username field -->
    <div class ="form-outline">
        <label for="admin_username" class="form-label">Username</label>
        <input type="text" id="admin_username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="admin_username"/>          
</div>

<!--password field -->
<div class="form-outline mb-4">
    <label for="admin_password" class="form-label">Password</label>
<input type="password" id="admin_password" class="form-control" placeholder="Enter your password" required="requried" autocomplete="off" name="admin_password"/>
</div>
<div class="mt-4 pt-2">
    <input type="submit" value="Login" class="bg-info py-2 px-3 border-0" name="admin_login">
</div>
</form>
</div>
</div>
</div>

 <!--boostrap js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
<?php
if(isset($_POST['admin_login'])){
$admin_username=$_POST['admin_username'];
$admin_password=$_POST['admin_password'];
$select_query="Select * from `admin` where admin_username='$admin_username' and admin_password='$admin_password'";
$result=mysqli_query($con, $select_query);
$row_count=mysqli_num_rows($result);

if($row_count>0) {
echo "<script> alert ('Login successfull') </script>";
echo "<script>window.open('index.php','_self')</script>";
}
else
{
     echo "<script> alert ('Invalid Credentials') </script>";
}
}
?>