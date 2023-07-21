<!-- connect file -->

<?php
include('./includes/connect.php');
include('functions/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Estate Management</title>
    <!--bootstrap css link-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!--fontawesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--linking css file-->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!--navbar-->
    <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-success">
  <div class="container-fluid">
    <img src="./images/logo.jfif" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-light" aria-current="page" href="index.php" >Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="displayall_properties.php" >Properties</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="user_area/user_registration.php" >Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="wishlist.php" ><i class="fa-solid fa-bookmark"></i><sup>
        <?php
        wishlistnum();
        ?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="#" >Total price:₹<?php
        total_price();
        ?></a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light" type="submit">Search</button>
      </form>
    </div>
        </div>
     </nav>
     <!--second navbar part-->
     <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="#">Welcome Guest</a>
        </li>  
        <?php
        if(!isset($_SESSION['username'])){
          echo " <li class='nav-item'>
          <a class='nav-link' href='./user_login.php'>Login</a>
        </li> ";
        }
        else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='./user_area/logout.php'>Logout</a>
        </li>";
        }; 
        ?>
        <li class="nav-item">
          <a class="nav-link" href="./admin_area/admin_login.php">Admin</a>
        </li> 
        </ul>
        </nav>
    
    
     <div class="row p-3">
         <!--properties-->
        <div class="col-md-10">
            <div class="row">
              <!-- fetching products -->
              <?php
            getallproperties();
            get_uniquecategories();
            get_uniquepopular();
              ?>
                
                    
               
            </div>

        </div>

         <!--sidenavbar-->
        <div class="col-md-2 bg-secondary p-0">
            <!--top rated-->
    <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-info">
          <a class="nav-link text-light" href="#"><h4>Top rated</h4></a>
        </li>  
    <?php
        getpop();
    ?>
    </ul>
  <!--categories-->
    <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-info">
          <a class="nav-link text-light" href="#"><h4>Categories</h4></a>
        </li>  
    <?php
        getcat();
    ?>  
    </ul> 
    </div>
    </div>
     <!--footer-->
    <?php
    include("./includes/footer.php" );
    ?>

    </div>

<!--boostrap js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>