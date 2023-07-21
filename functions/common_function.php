<?php
//include('./includes/connect.php');
// getting properties
function getproperties(){
global $con;  
// condtion to check isset or not
if(!isset($_GET['category'])){
   if(!isset($_GET['popular'])){
$select_query="Select * from `properties` order by rand() LIMIT 0,3";
$result_query=mysqli_query($con,$select_query);
while($row=mysqli_fetch_assoc($result_query)){
$property_id=$row['property_id'];
$property_title=$row['property_title'];
$property_description=$row['property_description'];
$property_image1=$row['property_image1'];
$property_price=$row['property_price'];
$phone_number=$row['phone_number'];
$category_id=$row['category_id'];
$popular_id=$row['popular_id'];
echo "<div class='col-md-4 mb-2'>
<div class='card'><!--change card width here-->
    <img src='./property_images/$property_image1' class='card-img-top' alt='$property_image1'>
    <div class='card-body'>
      <h5 class='card-title'>$property_title</h5>
      <p class='card-text'>$property_description</p>
      <h5 class='card-title'>Price:₹$property_price/-</h5>
      <a href='index.php?add_to_wishlist=$property_id' class='btn btn-info'>Add to Wishlist</a>
      <a href='properties_details.php?property_id=$property_id' class='btn btn-secondary'>View more</a>
      <a href='tel:$phone_number' class='btn btn-secondary'>call now</a>
    </div>
 </div>
</div>";
}
}
}
}

//get all property
function getallproperties(){
   global $con;  
   // condtion to check isset or not
   if(!isset($_GET['category'])){
      if(!isset($_GET['popular'])){
   $select_query="Select * from `properties` order by rand()";
   $result_query=mysqli_query($con,$select_query);
   while($row=mysqli_fetch_assoc($result_query)){
   $property_id=$row['property_id'];
   $property_title=$row['property_title'];
   $property_description=$row['property_description'];
   $property_image1=$row['property_image1'];
   $phone_number=$row['phone_number'];
   $property_price=$row['property_price'];
   $category_id=$row['category_id'];
   $popular_id=$row['popular_id'];
   echo "<div class='col-md-4 mb-2'>
   <div class='card'><!--change card width here-->
       <img src='./property_images/$property_image1' class='card-img-top' alt='$property_image1'>
       <div class='card-body'>
         <h5 class='card-title'>$property_title</h5>
         <p class='card-text'>$property_description</p>
         <h5 class='card-title'>Price:₹$property_price/-</h5>
         <a href='index.php?add_to_wishlist=$property_id' class='btn btn-info'>Add to Wishlist</a>
         <a href='properties_details.php?property_id=$property_id' class='btn btn-secondary'>View more</a>
         <a href='tel:$phone_number' class='btn btn-secondary'>call now</a>
       </div>
    </div>
   </div>";
   }
   }
   }
   }
// getting unique categories
function get_uniquecategories(){
   global $con;  
   // condtion to check isset or not
   if(isset($_GET['category'])){
      $category_id=$_GET['category'];
   $select_query="Select * from `properties` where category_id=$category_id";
   $result_query=mysqli_query($con,$select_query);
   $num_of_rows=mysqli_num_rows($result_query);
   if($num_of_rows==0){
      echo "<h2 class='text-center text-danger'>No stock for this category</h2>";
   }
   while($row=mysqli_fetch_assoc($result_query)){
   $property_id=$row['property_id'];
   $property_title=$row['property_title'];
   $property_description=$row['property_description'];
   $property_image1=$row['property_image1'];
   $property_price=$row['property_price'];
   $category_id=$row['category_id'];
   $popular_id=$row['popular_id'];
   $phone_number=$row['phone_number'];
   echo "<div class='col-md-4 mb-2'>
   <div class='card'><!--change card width here-->
       <img src='./property_images/$property_image1' class='card-img-top' alt='$property_image1'>
       <div class='card-body'>
         <h5 class='card-title'>$property_title</h5>
         <p class='card-text'>$property_description</p>
         <h5 class='card-title'>Price:₹$property_price/-</h5>
         <a href='index.php?add_to_wishlist=$property_id' class='btn btn-info'>Add to Wishlist</a>
         <a href='properties_details.php?property_id=$property_id' class='btn btn-secondary'>View more</a>
         <a href='tel:$phone_number' class='btn btn-secondary'>call now</a>
       </div>
    </div>
   </div>";
   }
   }
   }
   
   function get_uniquepopular(){
      global $con;  
      // condtion to check isset or not
      if(isset($_GET['popular'])){
         $popular_id=$_GET['popular'];
      $select_query="Select * from `properties` where popular_id=$popular_id";
      $result_query=mysqli_query($con,$select_query);
      $num_of_rows=mysqli_num_rows($result_query);
      if($num_of_rows==0){
         echo "<h2 class='text-center text-danger'>No stock for this category</h2>";
      }
      while($row=mysqli_fetch_assoc($result_query)){
      $property_id=$row['property_id'];
      $property_title=$row['property_title'];
      $property_description=$row['property_description'];
      $property_image1=$row['property_image1'];
      $property_price=$row['property_price'];
      $category_id=$row['category_id'];
      $popular_id=$row['popular_id'];
      $phone_number=$row['phone_number'];
      echo "<div class='col-md-4 mb-2'>
      <div class='card'><!--change card width here-->
          <img src='./property_images/$property_image1' class='card-img-top' alt='$property_image1'>
          <div class='card-body'>
            <h5 class='card-title'>$property_title</h5>
            <p class='card-text'>$property_description</p>
            <h5 class='card-title'>Price:₹$property_price/-</h5>
            <a href='index.php?add_to_caradd_to_wishlist=$property_id' class='btn btn-info'>Add to Wishlist</a>
            <a href='properties_details.php?property_id=$property_id' class='btn btn-secondary'>View more</a>
            <a href='tel:$phone_number' class='btn btn-secondary'>call now</a>
          </div>
       </div>
      </div>";
      }
      }
      }
//view details
function viewdetails(){
   global $con;  
   // condtion to check isset or not
   if(isset($_GET['property_id'])){
   if(!isset($_GET['category'])){
      if(!isset($_GET['popular'])){
         $property_id=$_GET['property_id'];
   $select_query="Select * from `properties` where property_id=$property_id";
   $result_query=mysqli_query($con,$select_query);
   while($row=mysqli_fetch_assoc($result_query)){
   $property_id=$row['property_id'];
   $property_title=$row['property_title'];
   $property_description=$row['property_description'];
   $property_image1=$row['property_image1'];
   $property_image2=$row['property_image2'];
   $property_image3=$row['property_image3'];
   $property_price=$row['property_price'];
   $category_id=$row['category_id'];
   $popular_id=$row['popular_id'];
   $phone_number=$row['phone_number'];
   echo "<div class='col-md-4 mb-2'>
   <div class='card'>
       <img src='./property_images/$property_image1' class='card-img-top' alt='$property_image1'>
       <div class='card-body'>
         <h5 class='card-title'>$property_title</h5>
         <p class='card-text'>$property_description</p>
         <h5 class='card-title'>Price:₹$property_price/-</h5>
         <a href='index.php?add_to_wishlist=$property_id' class='btn btn-info'>Add to Wishlist</a>
         <a href='index.php' class='btn btn-secondary'>GO HOME</a>
         <a href='tel:$phone_number' class='btn btn-secondary'>call now</a>
       </div>
    </div>
   </div>
   <div class='col-md-8'>
   <div class='row'>
       <div class='col-md-12'>
           <h4 class='text-center text-info'>Related property</h4>
       </div>
       <div class='col-md-6'>
       <img src='./property_images/$property_image2' class='card-img-top' alt='$property_image2'>
       </div>
       <div class='col-md-6'>
       <img src='./property_images/$property_image3' class='card-img-top' alt='$property_image3'>
       </div>
   </div>
   
</div>";
   }
   }
   }
   }
   }
// displaying categories
function getpop(){
    global $con;  
    $select_popular="Select * from `popular`";
    $result_pop=mysqli_query($con,$select_popular);
   while($row_data=mysqli_fetch_assoc($result_pop)){
        $pop_title=$row_data['popular_title'];
        $pop_id=$row_data['popular_id'];
        echo  "<li class='nav-item '>
        <a class='nav-link text-light' href='index.php?popular=$pop_id'>$pop_title</a>
      </li>";
   }
}

function getcat(){
    global $con;
    $select_category="Select * from `categories`";
    $result_cat=mysqli_query($con,$select_category);
   while($row_data=mysqli_fetch_assoc($result_cat)){
        $cat_title=$row_data['category_title'];
        $cat_id=$row_data['category_id'];
        echo  "<li class='nav-item '>
        <a class='nav-link text-light' href='index.php?category=$cat_id'>$cat_title</a>
      </li>";
   }
}

// get ip adress 
    function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  

// Wishlist function
function wishlist(){
   if(isset($_GET['add_to_wishlist'])){
      global $con;
      $ip=getIPAddress();
      $get_property_id=$_GET['add_to_wishlist'];
      $select_query="Select *from `wishlist` where ip_address='$ip' and
      property_id=$get_property_id";
      $result_query=mysqli_query($con,$select_query);
      $num_of_rows=mysqli_num_rows($result_query);
      if($num_of_rows>0){
         echo "<script>alert('This item is already present inside wishlist')</script>";
         echo "<script>window.open('index.php','_self')</script>";}
         else
         {
            $insert_query="insert into `wishlist` (property_id,ip_address) values ($get_property_id,'$ip')";
            $result_query=mysqli_query($con,$insert_query);
            echo "<script>alert('This item added to wishlist wishlist')</script>";
            echo "<script>window.open('index.php','_self')</script>";
         }
      }
   }

   // function to get Wishlist item numbers
   function wishlistnum(){
      if(isset($_GET['add_to_wishlist'])){
         global $con;
         $ip=getIPAddress();
         $select_query="Select *from `wishlist` where ip_address='$ip'";
         $result_query=mysqli_query($con,$select_query);
         $count_wishlist=mysqli_num_rows($result_query);
      }else
         {  
            global $con;
            $ip=getIPAddress();
            $select_query="Select *from `wishlist` where ip_address='$ip'";
            $result_query=mysqli_query($con,$select_query);
            $count_wishlist=mysqli_num_rows($result_query);
         }
      echo $count_wishlist;
   }

   function total_price(){
      global $con;
      $get_ip_add = getIPAddress();
      $total_price=0;
      $wishlist_query="select * from `wishlist` where ip_address='$get_ip_add'";
      $result=mysqli_query($con,$wishlist_query);
      while($row=mysqli_fetch_array($result)){
          $property_id=$row['property_id'];
          $select_property="Select *from `properties` where property_id='$property_id'";
          $result_property=mysqli_query($con,$select_property);
          while($row_property_price=mysqli_fetch_array($result_property)){
              $property_price=array($row_property_price['property_price']);
              $property_values=array_sum($property_price);
              $total_price+=$property_values;
          }
      }
      echo $total_price;
   }
?>  
