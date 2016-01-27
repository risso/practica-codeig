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
<body id="<?php if(isset($index_si)){echo "body_img";}?>" >
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
                <?php if($this->session->has_userdata('nick')){ ?>
                <li><a href="<?php echo site_url("contCerques/index"); ?>">Cerques</a></li>
                <?php } ?>
                <li><a href="#">Notificacions</a></li>
            </ul>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <!-- User Account: style can be found in dropdown.less -->
            <?php if ($this->session->has_userdata('nick') == true) { ?>
                <li class="">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php
                        $nom = $this->session->userdata('nick');
                        if ($this->session->userdata('avatar') == "") {
                            //$src = './application/avatars/user_default.png';
                            $src = 'http://localhost/practica-codeig/application/avatars/user_default.png';
                        } else {
                            $src = 'http://localhost/practica-codeig/application/avatars/' . $this->session->userdata('mail') . '/' . $this->session->userdata('avatar');
                        } ?>
                        <img src="<?php echo($src); ?>" class="user-image" alt="Image">
                        <span class="hidden-xs"><?php echo($nom); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?php echo($src); ?>" class="img-circle profile-image img_avatar" alt="Image">
                            <p><?php echo($this->session->userdata('mail')); ?></p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <a href="<?php echo (site_url("ContPerfil/index"));?>" class="btn btn-default btn-flat">Modificar Perfil</a>

                        </li>
                    </ul>
                </li>
            <?php } ?>
            <!-- -->
            <!-- -->
            <!-- -->
            <?php if ($this->session->has_userdata('nick') == true) { ?>
                <li><a href="<?php echo site_url("contRegistre/eliminar_sessio"); ?>"><span
                            class="glyphicon glyphicon-log-in"></span> Sortir</a>
                </li>
            <?php } ?>
        </ul>
    </div>
</nav>