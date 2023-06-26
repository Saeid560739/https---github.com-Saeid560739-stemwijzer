
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Free Web tutorials">
        <meta name="keywords" content="HTML, CSS, JavaScript">
        <meta name="author" content="John Doe">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="http://localhost/stemwijzer/public/style/style.css">
        <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://fontawesome.com/icons/house?f=sharp&s=light" crossorigin="anonymous"></script>    </head>
    <body>

    <nav class="navbar fixed-top" style="background-color: #664EEF">
        <div class="container-fluid">
            <a class="logo" href="http://localhost/stemwijzer/public/dashboard">StemWijzer</a>
    <?php
    $actual_link = $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $linkArray = explode("/", $actual_link);
    $finalDescription = $linkArray[0]."/".$linkArray[1]."/".$linkArray[2]."/".$linkArray[3]."/".$linkArray[4];

    ?>
            <div class="d-flex flex-end">
                    <a class="username me-2" style="<?php if($finalDescription == ROOT){ echo ' display:none"';}?>'){ echo ' display:none"';}?>" aria-current="page" href="http://localhost/stemwijzer/public/userEdit">saeid</a>
                    <div class="uitloggen_btn me-2 " style="<?php if($finalDescription == ROOT){ echo ' display:none"';}?>">
                        <a class="uitloggen" style="<?php if($finalDescription == ROOT){ echo ' display:none"';}?>" href="http://localhost/stemwijzer/public/log_out">Uitloggen</a>
                    </div>
                <button class="navbar-toggler bg-white" style="<?php if($finalDescription == ROOT){ echo ' display:none"';}?>" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

            <div class="offcanvas offcanvas-end" tabindex="3" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">

                        <li class="nav-item dropdown">
                           
                                <a class="dropdown-item" href="http://localhost/stemwijzer/public/accountAanmaken">New admin</a></li>  
                    </ul>
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">             
                        <li class="nav-item dropdown">                        
                                <a class="dropdown-item" href="http://localhost/stemwijzer/public/stellingen">Stellingen</a></li>                    
                    </ul>

                </div>
            </div>
        </div>
    </nav>


