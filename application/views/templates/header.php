<!DOCTYPE html >
<html>
<head>
    <title>Practica Codeigniter</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!-- IMPORTANTÍSSIM: correcció del viewport per a versions mòbils -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet"
          href="http://localhost/practica-codeig/application/css/bootstrap/css/bootstrap.min.css"/>

    <!-- Optional theme -->
    <link rel="stylesheet"
          href="http://localhost/practica-codeig/application/css/bootstrap/css/bootstrap-theme.min.css"/>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <link rel="stylesheet" href="http://localhost/practica-codeig/application/css/bootstrap/js/bootstrap.min.js"/>

    <!-- Fonts Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- Bootstrap de Internet PERQUÈ EL MEU NO FUNCIONA BÉ-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css"
          integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
            integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
            crossorigin="anonymous"></script>

    <!-- Per utilitzar media-querys -->
    <script src="http://localhost/practica-codeig/application/css/jQuery/jquery.js"
            type="text/javascript"></script>
    <script src="http://localhost/practica-codeig/application/css/jQuery/login_form.js"
            type="text/javascript"></script>

    <!-- La nostra fulla d'estil -->
    <link rel="stylesheet" type="text/css" href="http://localhost/practica-codeig/application/css/reset.css"/>
    <link rel="stylesheet" type="text/css" href="http://localhost/practica-codeig/application/css/estil.css"/>
</head>
<body id="body_img">
<nav class="navbar navbar-inverse  navbar-fixed-top " role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">
                <i class="fa fa-home"></i>
                <!-- <img alt="Logo" src="">-->
            </a>
            <a class="navbar-brand" href="#">Info Immobles</a>
        </div>
        <div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="<?php echo site_url("contIndex"); ?>">Home</a></li>
            </ul>
        </div>
    </div>
</nav>