<?php

require_once("connection.php");
require_once("sessions.php");
require_once("functions.php");
?>

<?php
//Validation for the categories code 
if(isset($_POST["Submit"])){
    $Category = ($_POST["Category"]);
    date_default_timezone_set("Africa/Nairobi");
    $CurrentTime=time();
   // $DateTime = strftime("%Y-%m-%d %H:%M:%S", $CurrentTime);
$DateTime = strftime("%B-%d-%Y %H:%M:%S", $CurrentTime);
$DateTime;
$Admin = "Briyo";
if(empty($Category)){
    $_SESSION["ErrorMessage"] ="All Fields must be filled out";
    Redirect_to("categories.php");
      
}elseif(strlen($Category)>99){
    $_SESSION["ErrorMessage"] ="The Name is Too Long";
    Redirect_to("categories.php");
}
else{
    global $con;
    //the data should be arrange according to the way it is in the database
    $Query = "INSERT INTO categories(datetime,name,creatorname) VALUES('$DateTime', '$Category', '$Admin')";
    $Execute = mysqli_query($con,$Query);
    if($Execute){
        $_SESSION["SuccessMessage"] = "Category Added Successfully";
        Redirect_to("categories.php");
    }
    else{
        $_SESSION["ErrorMessage"] ="Something Went Wrong";
    Redirect_to("categories.php");
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
    <title>Categories</title>
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
                <li><a href="post.php"> <span class="glyphicon glyphicon-list-alt"></span> &nbsp; Add New</a></li>
                <li class="active" ><a href="#"> <span class="glyphicon glyphicon-tags"></span> &nbsp; Categories</a></li>
                <li><a href="#"> <span class="glyphicon glyphicon-comment"></span> &nbsp; Comments</a></li>
                <li><a href="#">  <span class="glyphicon glyphicon-equalizer"></span> &nbsp; Live</a></li>
                <li><a href="#"> <span class="glyphicon glyphicon-log-out"></span> &nbsp; Logout</a></li>
            </ul>
        </div>

        <div class="col-sm-10">
            <h1>Manage Categories</h1>
            <div><?php echo Message();
            echo SuccessMessage(); ?></div>
            <form action="categories.php" method="post">
                
                <fieldset>
                <div class="formgroup">
                    <label for="categoryname"><span class ="FieldInfo">Name:</span></label>
                    <input class="form-control" type="text" name="Category" id="categoryname" placeholder="Name">
        
                    </div>
                    <br>
                    <input class ="btn btn-success btn-lock" type="submit" name = "Submit" value ="Add New Category">
                </fieldset>
            </form>
            <br>
            <div class = "table-responsive">
            <table class ="table table-striped table-hover">
                <tr>
                    <th>Sr No.</th>
                    <th>Date & Time</th>
                    <th>Category Name</th>
                    <th>Category Creator</th>
                </tr>

                <?php   

                global $con;
                $ViewQuery = "SELECT * FROM categories ORDER BY datetime desc";
                $Execute = mysqli_query($con, $ViewQuery);
                $SrNo = 0;
                while($DataRows = mysqli_fetch_array($Execute)){
                    $Id = $DataRows["id"];
                    $DateTime = $DataRows["datetime"];
                    $CategoryName = $DataRows["name"];
                    $CreatorName = $DataRows["creatorname"];
                    $SrNo++;
                



?>

<tr>
    <td><?php echo $SrNo; ?></td>
    <td><?php echo $DateTime; ?></td>
    <td><?php echo $CategoryName; ?></td>
    <td><?php echo $CreatorName; ?></td>
</tr>

<?php } ?>
            </table>
        </div>

        
    </div>
</div>
        </div>


<div id="Footer">
    <p>Created By | Briyoo | &copy;2023-2025 ---All rights reserved</p>
</div>


    
</body>
</html>