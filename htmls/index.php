<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Tunas">
    <link rel="apple-touch-icon" sizes="180x180" href="skin/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="skin/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="skin/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="skin/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="skin/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">


    <meta property="og:type" content="article"/>
    <meta property="og:title" content="<?php echo $title?>">
    <meta property="og:description" content="<?php echo $title?>"/>
    <meta property="og:image" content="<?php echo $img?>">
    <meta property="og:site_name" content="<?php echo $author?>">
    <meta name="description" content="<?php echo $title?>">
    <meta name="author" content="<?php echo $author?>">

    <meta name="twitter:site" content="@jakpost">
    <meta name="twitter:creator" content="@jakpost">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="javascript:window.location.href">

    <meta name="twitter:title" content="<?php echo $title?>">
    <meta name="twitter:description" content="<?php echo $title?>">
    <meta name="twitter:image" content="<?php echo $img?>"/>
    <meta name="tjp:thumbnail" content="<?php echo $img?>"/>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i&display=swap" rel="stylesheet">

    <title><?php echo $titleBrowser?></title>
    <!-- CSS -->
    <link rel="stylesheet" href="skin/css/apps.css">
</head>
<body>
    <!-- Pre loader -->
    <div id="loader" class="loader">
        <div class="plane-container">
            <div class="preloader-wrapper small active">
            </div>
        </div>
    </div>
    <div id="tunas-app">
<main>
    <div class="height-full responsive-phone">
        <div class="container height-full">
            <div class="row d-flex align-center height-full">
                <div class="col-lg-7 hide-phone">
                    <img src="skin/img/banner-login.png" alt="">
                </div>
                <div class="col-lg-5 col-md-12 col-xs-12 p-t-100 mb-center">
                    <div class="row">
	                	<img src="skin/img/logo.svg" class="width-270 mb-15" alt="Tunas" />
	                    <form action="#" class="from-login">
                            <div class="form-group mb-15">
                                <input type="text" class="width-270" placeholder="Username">
                            </div>
                            <div class="form-group mb-15">
                                <input type="text" class="width-270" placeholder="Password">
                            </div>
                            <div class="width-270 buttonLogin">
                            	<div class="checkboxCustom mb-15 s-16">
                            	    <input type="checkbox" id="remember" name="remember" />
                            	    <label for="remember"> Remember Me</label>
                            	</div>
                                <!-- SAMPLE link -->
                                <a href="od" class="mb-15 btn btn-main btn-lg btn-block r-10">Sign In as OD <span></span></a>
                                <a href="employee" class="btn btn-main btn-lg btn-block r-10">Sign In as Employee <span></span></a>
                                <!-- <button type="submit" class="mb-15 btn btn-main btn-lg btn-block r-10">Sign In as DO <span></span></button> -->
                                <!-- <button type="submit" class="btn btn-main btn-lg btn-block r-10">Sign In as Employee <span></span></button> -->
                            </div>
                            <p class="forget-pass text-white">Have you forgot your username or password ?</p>
                		</form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #primary -->
</main>
<script src="skin/js/app.js"></script>
<?php include('resources/partials/foot.php');?>