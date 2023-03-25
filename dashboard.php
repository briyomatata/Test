<?php

require_once("connection.php");
require_once("sessions.php");
require_once("functions.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./Css/do.css">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" >
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2">
            <!-- Side Bar Section -->
            <h1 class ="top-header">Admin</h1>
            <ul id="Side_Menu"  class="nav nav-pills nav-stacked">
                <li class="active" > <a href="Dashboard.php"> <span class="glyphicon glyphicon-th"></span> &nbsp; Dashboard</a></li>
                <li><a href="#"> <span class="glyphicon glyphicon-user"></span> &nbsp; Settings</a></li>
                <li><a href="post.php"> <span class="glyphicon glyphicon-list-alt"></span> &nbsp; Add New</a></li>
                <li><a href="categories.php"> <span class="glyphicon glyphicon-tags"></span> &nbsp; Categories</a></li>
                <li><a href="#"> <span class="glyphicon glyphicon-comment"></span> &nbsp; Comments</a></li>
                <li><a href="#">  <span class="glyphicon glyphicon-equalizer"></span> &nbsp; Live</a></li>
                <li><a href="#"> <span class="glyphicon glyphicon-log-out"></span> &nbsp; Logout</a></li>
            </ul>
        </div>

        <div class="col-sm-10"> 
           
            <h1 class ="headings">  Admin Dashboard</h1>

            <div><?php echo Message();
            echo SuccessMessage(); ?></div>
            <!-- <p>Which Money have we never seen before</p>
            <h4>About</h4>
            <p>Which Money have we never seen before</p>
            <h4>About</h4>
            <p>Which Money have we never seen before</p>
            
            <h4>About</h4>
            <p>Which Money have we never seen before</p>
            <h4>About</h4>
            <p>Which Money have we never seen before</p>
            <h4>About</h4>
            <p>Which Money have we never seen before</p> -->
        </div>

        
    </div>
</div>
<div id="Footer">
    <p>Created By | Briyoo | &copy;2023-2025 ---All rights reserved</p>
</div>


    
</body>
</html>