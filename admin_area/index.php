<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1 py-2 px-5.0">
    <title>Admin Dashboard</title>
    <!--bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!--fontawesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <!--linking css file-->
      <link rel="stylesheet" href="../style.css">
</head>
<body>
<!--header-->
     <!--navbar-->
     <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../images/logo.jfif"  alt="" class="logo">
                <nav class="navbar navbar-expand-lg navbar-light bg-info">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link">Welcome guest</a>
                </nav>
            </div>
        </nav>
<!--body-->
        <div class="bg-light">
              <h3 class="text-center p-2">Manage details</h3>
        </div>

        <div class="row">
              <div class="col-md-12 bg-secondary py-2 px-5 d-flex align-items-center">
                <div class="px-5">
                    <a href="#"><img src="../images/logo.jfif" class="admin_image" alt=""></a>
                    <p class="text-light text-center">Admin Name</p>
                </div>
                <div class="button text-center">
                    <button class="my-3"><a href="insert_properties.php" class="nav-link text-light bg-info m-1 py-2 px-5">Insert properties</a></button>
                    <button><a href="index.php?insert_popular" class="nav-link text-light bg-info m-1 py-2 px-5">Insert Popular</a></button>
                    <button><a href="index.php?insert_category" class="nav-link text-light bg-info m-1 py-2 px-5">Insert categories</a></button>
                    <button><a href="../wishlist.php" class="nav-link text-light bg-info m-1 py-2 px-5">Wishlist</a></button>
                    <button><a href="../index.php" class="nav-link text-light bg-info m-1 py-2 px-5">Logout</a></button>
                </div>
              </div>
        </div>
        <!--button operation-->
        <div class="container my-5">
            <?php
            if(isset($_GET['insert_category'])){
                  include('insert_categories.php');
            }
            ?>
         </div>
         <div class="container my-5">
            <?php
            if(isset($_GET['insert_popular'])){
                  include('insert_popular.php');
            }
            ?>
         </div>
        <!--footer-->
     <div class="bg-info p-3 text-center footer">
        All rights reserved @-designed by Sammitha-2022
     </div>
</div>

 <!--boostrap js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>   
</body>
</html>