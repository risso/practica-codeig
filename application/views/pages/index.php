<!-- PAGINA PRINCIPAL -->
<div id="contingut" class="container">

    <?php if (isset($errores) && $errores == 1) { ?>
        <div class="alert alert-danger" role="alert">
            <strong>Error!</strong>&nbsp; &nbsp; Aquest email ja es troba a la nostra base de dades. Si has perdut la
            contrasenya pots recuperar-la <a href="#" class="alert-link">&nbsp; aquí</a>
        </div>
    <?php } ?>
    <?php if (isset($reg_correcte)) { ?>
        <div class="alert alert-success" role="alert">
            <strong>ENHORABONA!</strong>&nbsp; &nbsp; T'has registrat correctament. Te'm enviat un e-mail al teu correu
            per validar el compte. Si us plau, obriu el correu i feu click al enllaç enviat.
        </div>
    <?php } ?>
    <?php if (isset($activacio_correcte) && $activacio_correcte == true) { ?>
        <div class="alert alert-success" role="alert">
            <strong>COMPTE ACTIVAT CORRECTAMENT!</strong>&nbsp; &nbsp; Ja pots iniciar sessió amb el teu compte.
        </div>
    <?php } ?>
    <?php if (isset($login_incorrecte) && $login_incorrecte == true) { ?>
        <div class="alert alert-danger" role="alert">
            <strong>DADES INCORRECTES!</strong>&nbsp; &nbsp; Revisa les dades introduides. O potser que encara no hagis validat el compte.
        </div>
    <?php } ?>

    <!--<?php //echo anchor('contRegistre/enviar_emailami', 'Enviar-me missatge'); ?>-->

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-login">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="#" class="<?php if (!isset($actiu)) {
                                echo("active");
                            } ?>" id="login-form-link">Login</a>
                        </div>
                        <div class="col-xs-6">
                            <a href="#" class="<?php if (isset($actiu) && $actiu == 2) {
                                echo "active";
                            } ?>" id="register-form-link">Register</a>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- <form id="login-form" action="http://phpoll.com/login/process" method="post" role="form" style="display: block;">-->
                            <?php
                            if (!isset($actiu)) {
                                $display = "block";
                            } else {
                                $display = "none";
                            }
                            $attributes = array('id' => 'login-form', 'role' => 'form', 'style' => 'display:' . $display);
                            echo form_open_multipart('contRegistre/loginarse', $attributes);
                            ?>

                            <div class="form-group">
                                <input type="email" name="inputEmail" id="inputEmail" tabindex="1" class="form-control"
                                       placeholder="e-mail" value="<?php echo set_value('inputemail'); ?>">
                            </div>
                            <div class="form-group">
                                <input type="password" name="inputPassword" id="inputPassword" tabindex="2"
                                       class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group text-center">
                                <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                <label for="remember"> Remember Me</label>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6 col-sm-offset-3">
                                        <input type="submit" name="login-submit" id="login-submit" tabindex="4"
                                               class="form-control btn btn-login" value="Log In">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="text-center">
                                            <a href="http://phpoll.com/recover" tabindex="5" class="forgot-password">Has
                                                perdut la Contrasenya?</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                            <!-- <form id="register-form" action="http://phpoll.com/register/process" method="post" role="form" style="display: none;">-->
                            <?php
                            if (isset($actiu) && $actiu == 2) {
                                $display = "block";
                            } else {
                                $display = "none";
                            }
                            $attributes = array('id' => 'register-form', 'role' => 'form', 'style' => 'display:' . $display);
                            echo form_open_multipart('contRegistre/index', $attributes);
                            ?>

                            <div class="form-group">
                                <?php echo form_error('inputNick'); ?>
                                <input type="text" name="inputNick" id="inputNick" tabindex="1" class="form-control"
                                       placeholder="Username" value="<?php echo set_value('inputNick'); ?>">
                            </div>
                            <div class="form-group">
                                <?php echo form_error('Email'); ?>
                                <input type="email" name="inputEmail" id="inputEmail" tabindex="1" class="form-control"
                                       placeholder="Email Address" value="<?php echo set_value('inputEmail'); ?>">
                            </div>
                            <div class="form-group">
                                <?php echo form_error('inputPassword'); ?>
                                <input type="password" name="inputPassword" id="inputPassword" tabindex="2"
                                       class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <?php echo form_error('inputPasswordConfirm'); ?>
                                <input type="password" name="inputPasswordConfirm" id="inputPasswordConfirm"
                                       tabindex="2" class="form-control" placeholder="Confirm Password">
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6 col-sm-offset-3">
                                        <input type="submit" name="register-submit" id="register-submit" tabindex="4"
                                               class="form-control btn btn-register" value="Registrar-se">
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
</div>
<!-- /container -->
