<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>%TITLE%</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/lnq/css/bootstrap.min.css">
        <script src="/lnq/js/jquery-3.2.1.min.js"></script>
        <script src="/lnq/js/bootstrap.min.js"></script>
        <script src="/lnq/js/custom.js"></script>
        <link href="/lnq/css/custom.css" rel="stylesheet">
        <link rel="stylesheet" href="/lnq/css/font-awesome.min.css">
    </head>
    <body class="container-fluid">
    <header>
    
      <div class="col-sm-12">
    
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
               <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span> 
                    </button>
                     <a class="navbar-brand" href="index.php"><img src="/lnq/images/lnq-logo.jpeg" alt="lnq logo" height="78" width="98"/></a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        
                    <?php if(isset($_SESSION['user'])):?>
                        <li><a class="custom-a" target="rightframe" href="#">Posts&nbsp;<span class="glyphicon glyphicon-info-sign"></span></a></li>
                        <li><a class="custom-a" target="rightframe" href="#">Messages <span class="glyphicon glyphicon-envelope"></span></a></li>
                        <li><a class="custom-a" target="rightframe" href="#">News&nbsp;<span class="glyphicon glyphicon-globe"></span></a></li>
                        <li><a class="custom-a" href="logout.php">Logout&nbsp;<span class="glyphicon glyphicon-log-out"></span></a></li>
                    <?php else:?> 
                        <li><a class="custom-a" href="#">ABOUT &nbsp;<span class="glyphicon glyphicon-info-sign"></span></a></li>
                        <li><a class="custom-a" href="#">PRIVACY POLICY &nbsp;<span class="glyphicon glyphicon-lock"></span></a></li>
                        <li><a class="custom-a" href="#">CONTACT &nbsp;<span class="glyphicon glyphicon-envelope"></span></a></li>
                        <li><a class="custom-a" href="#regModal" data-toggle="modal" >SIGN UP &nbsp;<span class="glyphicon glyphicon-new-window"></span></a></li>
                        <li><a class="custom-a" href="#logModal" data-toggle="modal" >SIGN IN &nbsp;<span class="glyphicon glyphicon-log-in"></span></a></li>   
                    <?php endif;?>
                    </ul>
                </div>
 
           </div>
        </nav>

      </div>
</header>