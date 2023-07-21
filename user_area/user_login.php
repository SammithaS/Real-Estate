<!-- connect file -->

<?php
include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user login</title>
       <!--bootstrap css link-->
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!--fontawesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--linking css file-->
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container-fluid mx-3">
    <h2 class="text-center">User login</h2>
    <div class="row d-flex align-items-center justify-content-center">
        <div class="Col-lg-12 col-xl-6">
<form action="" method="POST" enctype="multipart/form-data">
    <!-- username field -->
    <div class ="form-outline">
        <label for="user_username" class="form-label">Username</label>
        <input type="text" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="user_username"/>          
</div>

<!--password field -->
<div class="form-outline mb-4">
    <label for="user_password" class="form-label">Password</label>
<input type="password" id="user_password" class="form-control" placeholder="Enter your password" required="requried" autocomplete="off" name="user_password"/>
</div>
<div class="mt-4 pt-2">
    <input type="submit" value="Login" class="bg-info py-2 px-3 border-0" name="user_login">
    <p class="small fw-bold mt-2 pt-1 mb-10"> Dont have an account? <a href="../user_area/user_registration.php" class="text-danger">Register</a></p>
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
if(isset($_POST['user_login'])){
    $user_username=$_POST['user_username'];
    $user_password=$_POST['user_password'];
    $hashed_password="";
    $query_pass="Select user_password from `user_table` where username='$user_username'";
    $res=mysqli_query($con, $query_pass);
    if(mysqli_num_rows($res)>0){
        while($row=mysqli_fetch_assoc($res)){
            $hashed_password=$row['user_password'];
        }
    }
    $select_query="Select * from `user_table` where username='$user_username'";
    $result=mysqli_query($con, $select_query);
    $row_count=mysqli_num_rows($result);
    $user_ip=getIPAddress();
    $select_query_wishlist="Select * from `wishlist` where ip_address='$user_ip'";
    $select_wishlist=mysqli_query ($con, $select_query_wishlist);
    $row_count_wishlist=mysqli_num_rows($select_wishlist);
    if($row_count>0 and password_verify($user_password,$hashed_password)){
        $_SESSION['username']=$user_username;  
    if($row_count==1 and $row_count_wishlist==0){
        $_SESSION['username']=$user_username;
    echo "<script>alert ('Login successful')</script>";
    echo "<script>window.open('../index.php','_self')</script>";
    }else{
        $_SESSION['username']=$user_username;
    echo "<script> alert('Login successful') </script>";
    echo "<script>window.open('payment.php','_self') </script>";
    }
    }else{
        echo "<script> alert( 'invalid credentials $hashed_password ') </script>";}
    }
?>