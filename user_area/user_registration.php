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
    <title>user registration</title>
       <!--bootstrap css link-->
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!--fontawesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--linking css file-->
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container-fluid mx-3">
    <h2 class="text-center">New User Registration</h2>
    <div class="row d-flex align-items-center justify-content-center">
        <div class="Col-lg-12 col-xl-6">
<form action="" method="post" enctype="multipart/form-data">
    <!-- username field -->
    <div class ="form-outline">
        <label for="username" class="form-label">Username</label>
        <input type="text" id="username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="username"/>          
</div>
<!--email field -->
<div class="form-outline mb-4">
    <label for="user_email" class="form-label">Email</label>
    <input type="email" id="user_email" class="form-control" placeholder="Enter your email" autocomplete="off" required="required"  name="user_email"/>

</div>
<!--image field -->
<div class="form-outline mb-4">
    <label for="user_image" class="form-label">User Image</label>
<input type="file" id="user_image" class="form-control" required="requried" name="user_image"/>
</div>
<!--password field -->
<div class="form-outline mb-4">
    <label for="user_password" class="form-label">Email</label>
<input type="password" id="user_password" class="form-control" placeholder="Enter your password" required="requried" autocomplete="off" name="user_password"/>
</div>
<!--confirm password field -->
<div class="form-outline mb-4">
    <label for="conf_user_password" class="form-label"> confirm password</label>
<input type="password" id="conf_user_password" class="form-control" placeholder="Confirm your password" autocomplete="off" required="required"  name="conf_user_password"/>

</div>
<!-- address field -->
<div class ="form-outline mb-4">
        <label for="user_address" class="form-label">Address</label>
        <input type="text" id="user_address" class="form-control" placeholder="Enter your address" autocomplete="off" required="required" name="user_address"/>          
</div>
<!-- contract field -->
<div class ="form-outline mb-4">
        <label for="user_mobile" class="form-label">contact</label>
        <input type="text" id="user_mobile" class="form-control"  placeholder="Enter your mobile number" autocomplete="off" required="required" name="user_mobile"/>          
</div>
<div class="mt-4 pt-2">
    <input type="submit" value="Register" class="bg-info py-2 px-3 border-0" name="user_register">
    <p class="small fw-bold mt-2 pt-1 mb-10"> Already have an account? <a href="user_login.php" class="text-danger">Login</a></p>
</div>
</form>
</div>
</div>
</div>
<?php
if(isset ($_POST['user_register'])){
    $user_username=$_POST['username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $conf_user_password=$_POST['conf_user_password'];
    $user_address=$_POST['user_address'];
    $user_contact=$_POST['user_mobile'];
    $user_image=$_FILES['user_image']['name'];
    $user_image_tmp=$_FILES['user_image']['tmp_name'];
    $user_ip=getIPAddress();
    $hashed_password=password_hash($user_password,PASSWORD_BCRYPT);

    $select_query="Select * from `user_table` where username='$user_username' or user_email='$user_email'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0)
    {
    echo "<script>alert('Username or email already exist')</script>";
    }else if($user_password!=$conf_user_password){
        echo " <script> alert ( 'Passwords do not match') </script>";
    }
    else
    {
    move_uploaded_file($user_image_tmp,"../user_image/$user_image") ;
    $insert_query="insert into `user_table` (username, user_email, user_password, user_image,user_ip,user_address, user_mobile)values ('$user_username', '$user_email', '$hashed_password','$user_image ','$user_ip', '$user_address','$user_contact')";
      $sql_execute=mysqli_query ($con,$insert_query);
    }
    // selecting wishlist items
$select_wishlist_items ="Select * from `wishlist` where ip_address= '$user_ip'";
$result_wishlist=mysqli_query($con, $select_wishlist_items);
$rows_count=mysqli_num_rows($result_wishlist);
if($rows_count>0){
$_SESSION['username']=$user_username;
echo "<script>alert('You have items in your wishlist')</script>";
echo "<script>window.open('payment.php','_self')</script> ";
}else{
    echo "<script>window.open ('../index.php','_self')</script>";
}
}
?>
 <!--boostrap js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>