<?php
include('../includes/connect.php');

if (isset($_POST['insert_property'])){
    $property_title = $_POST['property_title'];
    $description = $_POST['description'];
    $property_keyword = $_POST['property_keyword'];
    $phone_number = $_POST['phone_number'];
    $properties_categories = $_POST['properties_categories'];
    $properties_popular = $_POST['properties_popular'];
    $property_image1 = $_FILES['property_image1']['name'];
    $property_image2 = $_FILES['property_image2']['name'];
    $property_image3 = $_FILES['property_image3']['name'];
    $property_price = $_POST['property_price'];
    $property_status = "true";

    // Accessing temp name of images
    $temp_image1 = $_FILES['property_image1']['tmp_name'];
    $temp_image2 = $_FILES['property_image2']['tmp_name'];
    $temp_image3 = $_FILES['property_image3']['tmp_name'];

    // Checking empty condition
    if($property_title == '' || $description == '' || $property_keyword == '' || $properties_categories == '' || $properties_popular == '' || $property_image1 == '' || $property_image2 == '' || $phone_number == '' || $property_image3 == '' || $property_price == '') {
        echo "<script>alert('Please fill all the available fields')</script>";
    } else {
        move_uploaded_file($temp_image1, "../property_images/$property_image1");
        move_uploaded_file($temp_image2, "../property_images/$property_image2");
        move_uploaded_file($temp_image3, "../property_images/$property_image3");

        // Insert query
        $insert_properties = "INSERT INTO `properties` (property_title, property_description, property_keywords, category_id, popular_id, phone_number, property_image1, property_image2, property_image3, property_price, date, status) VALUES ('$property_title', '$description', '$property_keyword', '$properties_categories', '$properties_popular', '$phone_number', '$property_image1', '$property_image2', '$property_image3', '$property_price', NOW(), '$property_status')";
        $result_query = mysqli_query($con, $insert_properties);

        if($result_query) {
            echo "<script>alert('Property details have been inserted successfully')</script>";
        } else {
            echo "<script>alert('Error: Failed to insert property details')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Properties-Admin dashboard</title>
        <!--bootstrap css link-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!--fontawesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <!--linking css file-->
      <link rel="stylesheet" href="../style.css">
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Properties</h1>
   
     <!-- form -->
     <form action="" method="post" enctype="multipart/form-data">
        <!-- title -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="property_title" class="form-label">Property title</label>
            <input type="text" name="property_title" id="property_title" class="form-control" placeholder="enter product title" autocomplete="off" required="required">
        </div>
         <!-- description -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="description" class="form-label">Property description</label>
            <input type="text" name="description" id="description" class="form-control" placeholder="enter product description" autocomplete="off" required="required">
        </div>

         <!-- keyword -->
         <div class="form-outline mb-4 w-50 m-auto">
            <label for="property_keyword" class="form-label">Property keywords</label>
            <input type="text" name="property_keyword" id="property_keyword" class="form-control" placeholder="enter product keywords" autocomplete="off" required="required">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="phone_number" class="form-label">Phone number</label>
            <input type="text" name="phone_number" id="phone_number" class="form-control" placeholder="enter phoone number" autocomplete="off" required="required">
        </div>
     
        </div>
          <!-- Categories -->
          <div class="form-outline mb-4 w-50 m-auto">
            <select name="properties_categories" id="" class="form-select">
                <option value="">Select Category</option>
                <?php
                  $select_query="Select * from `categories`";
                  $result_query=mysqli_query ($con, $select_query);
                  while ($row=mysqli_fetch_assoc ($result_query)){
                  $category_title=$row[ 'category_title'];
                  $category_id=$row['category_id'];
                  echo "<option value='$category_id'>$category_title</option>";
              }
              ?>
            </select>
        </div>
        <!-- Popular -->
        <div class="form-outline mb-4 w-50 m-auto">
            <select name="properties_popular" id="" class="form-select">
                <option value="">Select Popular</option>
                <?php
                  $select_query="Select * from `popular`";
                  $result_query=mysqli_query ($con,$select_query);
                  while ($row=mysqli_fetch_assoc($result_query)){
                  $popular_title=$row[ 'popular_title'];
                  $popular_id=$row['popular_id'];
                  echo "<option value='$popular_id'>$popular_title</option>";
              }
              ?>
            </select>
        </div>
        <!-- Images -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="property_image1" class="form-label">Property image 1</label>
            <input type="file" name="property_image1" id="property_image1" class="form-control" required="required"> 
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="property_image2" class="form-label">Property image 2</label>
            <input type="file" name="property_image2" id="property_image2" class="form-control" required="required"> 
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="property_image3" class="form-label">Property image 3</label>
            <input type="file" name="property_image3" id="property_image3" class="form-control" required="required"> 
        </div>

        <!-- Price -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="property_price" class="form-label">Property price</label>
            <input type="text" name="property_price" id="property_price" class="form-control" placeholder="enter property price" autocomplete="off" required="required">
        </div>
        <!-- Price -->
        <div class="form-outline mb-4 w-50 m-auto">
            <input type="submit" name="insert_property" class="btn btn-info" value="Insert Property">
        </div>
     </form>
     </div>
  <!--boostrap js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>     
</body>
</html>