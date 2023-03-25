<?php

require_once("connection.php");
require_once("sessions.php");
require_once("functions.php");
?>

<?php
//Validation for the categories code 
if(isset($_POST["Submit"])){
    $Title = ($_POST["Title"]);
    $Category = ($_POST["Category"]);
    $Post = ($_POST["Post"]);
    date_default_timezone_set("Africa/Nairobi");
    $CurrentTime=time();
   // $DateTime = strftime("%Y-%m-%d %H:%M:%S", $CurrentTime);
$DateTime = strftime("%B-%d-%Y %H:%M:%S", $CurrentTime);
$DateTime;
$Admin = "Briyo";
$Image =$_FILES["Image"]['name'];
$Target ="Uploads/".basename($_FILES["Image"]['name']); //this code saves the pictures into the local databases
if(empty($Title)){
    $_SESSION["ErrorMessage"] ="Title Can't Be Empty";
    Redirect_to("post.php");
      
}elseif(strlen($Title)<"2"){
    $_SESSION["ErrorMessage"] ="Title Should Be At-least 2 Characters";
    Redirect_to("post.php");
}
else{
    global $con;
    //the data should be arrange according to the way it is in the database
    $Query = "INSERT INTO admin_panel(datetime,title,category,author,image,post) VALUES('$DateTime','$Title' ,'$Category', '$Admin', '$Image', '$Post')";
    $Execute = mysqli_query($con,$Query);
    move_uploaded_file($_FILES["Image"]["tmp_name"], $Target);
    if($Execute){
        $_SESSION["SuccessMessage"] = "Post Added Successfully";
        Redirect_to("post.php");
    }
    else{
        $_SESSION["ErrorMessage"] ="Something Went Wrong...Try Again";
    Redirect_to("post.php");
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
    <title>Add New Post</title>
    <link rel="stylesheet" href="do.css">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" >
</head>

<style>
    .FieldInfo{
color: rgb(251, 174, 44);
font-family: Bitter,Georgia, 'Times New Roman', Times, serif;
font-size: 1.5rem;
}
</style>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2">
            <!-- Side Bar Section -->
            <h1>Admin</h1>
            <ul id="Side_Menu"  class="nav nav-pills nav-stacked">
                <li > <a href="Dashboard.php"> <span class="glyphicon glyphicon-th"></span> &nbsp; Dashboard</a></li>
                <li><a href="#"> <span class="glyphicon glyphicon-user"></span> &nbsp; Settings</a></li>
                <li class="active"><a href=""> <span class="glyphicon glyphicon-list-alt"></span> &nbsp; Add New</a></li>
                <li ><a href="categories.php"> <span class="glyphicon glyphicon-tags"></span> &nbsp; Categories</a></li>
                <li><a href="#"> <span class="glyphicon glyphicon-comment"></span> &nbsp; Comments</a></li>
                <li><a href="#">  <span class="glyphicon glyphicon-equalizer"></span> &nbsp; Live</a></li>
                <li><a href="#"> <span class="glyphicon glyphicon-log-out"></span> &nbsp; Logout</a></li>
            </ul>
        </div>

        <div class="col-sm-10">
            <h1>Add New Post</h1>
            <div><?php echo Message();
            echo SuccessMessage(); ?></div>
            <form action="post.php" method="post" enctype="multipart/form-data">
                
                <fieldset>
                <div class="formgroup">
                    <label for="title"><span class ="FieldInfo">Title:</span></label>
                    <input class="form-control" type="text" name="Title" id="title" placeholder="Title">
                    </div>

                    <div class="formgroup">
                    <label for="categoryselect"><span class ="FieldInfo">Category:</span></label>
                    <select class ="form-control"  name="Category" id="categoryselect">
                    <?php   

global $con;
$ViewQuery = "SELECT * FROM categories ORDER BY datetime desc";
$Execute = mysqli_query($con, $ViewQuery);
while($DataRows = mysqli_fetch_array($Execute)){
    $Id = $DataRows["id"];
    $CategoryName = $DataRows["name"];
?>

<option>
    <?php
    echo $CategoryName;
    ?>
</option>

<?php }?>
                    </select>
                    </div>

                    <div class="formgroup">
                    <label for="imageselect"><span class ="FieldInfo">Select Image:</span></label>
                    <input class="form-control" type="file" name="Image" id="imageselect" >
                    </div>

                    <div class="formgroup">
                    <label for="postarea"><span class ="FieldInfo">Post:</span></label>
                    <textarea class="form-control" name="Post" id="postarea"></textarea>
                    </div>

                    <br>
                    <input class ="btn btn-success btn-lock" type="submit" name = "Submit" value ="Add New Post">
                </fieldset>
            </form>
            <br>
            

     

  
    </div>
</div>
        </div>


<div id="Footer">
    <p>Created By | Briyoo | &copy;2023-2025 ---All rights reserved</p>
</div>


    
</body>
</html>