<!-- connect file -->

<?php
include('./includes/connect.php');
include('functions/common_function.php');
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
    <style>
    .wishlist_img{
          width: 80px;
         height: 58px;
         object-fit:contain;
     }
    </style>
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
        <li class="nav-item ">
          <a class="nav-link active text-light " aria-current="page" href="index.php" >Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="displayall_properties.php" >Properties</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="user_area/user_registration.php" >Register</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link " href="#" ><i class="fa-solid fa-bookmark"></i><sup>
        <?php
        wishlistnum();
        ?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="#" >Total price:₹ <?php
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
  
   <!-- fourth child-table-->
    <div class="container">
         <div class="row">
            <form action="" method="post">
<table class="table table-bordered text-center">

    <?php
    global $con;
    $get_ip_add = getIPAddress();
    $total_price=0;
    $wishlist_query="select * from `wishlist` where ip_address='$get_ip_add'";
    $result=mysqli_query($con,$wishlist_query);
    $result_count=mysqli_num_rows($result);
if($result_count>0){
   echo " <thead>
<tr> 
    <th>property Title</th>
    <th>property Image</th> 
    <th>Total Price</th> 
    <th>Remove</th>
     <th colspan='2'>Operations</th>
</tr>
 </thead> 
 <tbody>";
    while($row=mysqli_fetch_array($result)){
        $property_id=$row['property_id'];
        $select_property="Select *from `properties` where property_id='$property_id'";
        $result_property=mysqli_query($con,$select_property);
        while($row_property_price=mysqli_fetch_array($result_property)){
            $property_price=array($row_property_price['property_price']);
            $price_table=$row_property_price['property_price'];
            $property_title= $row_property_price ['property_title'];
            $property_image1 = $row_property_price['property_image1'];
            $property_values=array_sum($property_price);
            $total_price+=$property_values;
      
    ?>
<tr> 
<td><?php echo $property_title?></td>
<td><img src="./property_images/<?php echo $property_image1?>"
alt="" class="wishlist_img"> </td>


<td><?php echo $price_table ?>/-</td>
<td><input type="checkbox" name="removeitem[]" value="<?php echo
$property_id ?>"></td>
<td>
<input type="submit" value="remove wishlist" class="bg-info px-3 py-2
border-0 mx-3" name="remove_wishlist">
</td>
</tr> 
<?php
  }
}
}
else{
    echo "<h2 class='text-center text-danger'> Cart is empty</h2> ";
}
?>
</tbody>
</table>
<!-- subtotal -->
<div class="d-flex mb-5">
    <?php
global $con;
$get_ip_add = getIPAddress();
$wishlist_query="select * from `wishlist` where ip_address='$get_ip_add'";
$result=mysqli_query($con,$wishlist_query);
$result_count=mysqli_num_rows ($result);
if($result_count>0){
    $wishlist_query="insert into `payment` (payment_amount) values('$total_price')";
    $result=mysqli_query($con,$wishlist_query);
    echo "<h4 class='px-3'>Subtotal:₹<strong class='text-info'>$total_price /-</strong></h4>
    <input type='submit' value='Continue Exploring' class='bg-info px-3 py-2 border-0 mx-3'
    name='continue_shopping'>
     <button class='bg-info p-3 py-2 border-0 text-light'><a href='user_area/payment.php' class='text-light text-decoration-none border-0'>Checkout</button></a>";
}
else{
    echo "<input type='submit' value='Continue Exploring' class='bg-info px-3 py-2 border-0 mx-3'
    name='continue_shopping'>";
}
if(isset ($_POST['continue_shopping'])){
echo "<script>window.open('index.php','_self')</script> ";}

?>

</div> </div>
</div>
</form>
   <!-- function php remove wishlist -->
<?php
function remove_wishlist_item(){
global $con;
if(isset($_POST['remove_wishlist'])){
foreach($_POST['removeitem'] as $remove_id){
echo $remove_id;
$delete_query="Delete from `wishlist` where property_id=$remove_id";
$run_delete=mysqli_query($con,$delete_query);
if($run_delete){
echo "<script>window.open('wishlist.php','_self')</script>";
}
}
}
}
echo $remove_item=remove_wishlist_item();

?>
     <!--footer-->
    <?php
    include("./includes/footer.php" );
    ?>

  

<!--boostrap js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>