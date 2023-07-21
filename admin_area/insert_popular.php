<?php
    include('../includes/connect.php');
    if(isset($_POST['insert_pop']))
    {
        $popular_title=$_POST['popular_title'];

        //select data from database
        $select_query="Select * from `popular` where popular_title='$popular_title'";
        $result_select=mysqli_query($con,$select_query);
        $number=mysqli_num_rows($result_select);
        if($number>0){
            echo"<script>alert('popular is already present')</script>";
        }else{
        $insert_query="insert into `popular` (popular_title) values ('$popular_title')";
        $result=mysqli_query($con,$insert_query);
        if($result){
            echo "<script>alert('popular has been inserted successfully')</script>";
        }
       }
    }
?>
<h2 class="text-center">Insert Popular</h2>
<form action="" method="post" class="mb-2">
<div class="input-group w-90 mb-2">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="popular_title" placeholder="Insert Popular" aria-label="popular">
</div>
<div class="input-group w-10 mb-2 m-auto">
  <input type="submit" class="bg-info border-0 p-2 my-3" name="insert_pop" value="Insert popular" aria-label="Username" aria-describedby="basic-addon1">
  
</div>
</form>