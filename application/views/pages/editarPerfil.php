<!-- PAGINA EDITAR PERFIL -->
<div class="container">


    <!--<?php //echo anchor('contRegistre/enviar_emailami', 'Enviar-me missatge'); ?>-->

    <h1 class="titol_perfil">Editar Perfil</h1>
    <hr>
    <div class="row" id="cont_div_perfil">
        <!-- left column -->
        <div class="col-md-3">
            <div class="text-center">
                <?php $src = 'http://localhost/Practica_Codeigniter/application/avatars/' . $this->session->userdata('mail') . '/' . $this->session->userdata('avatar'); ?>
                <img src="<?php echo $src ?>" class="avatar img-circle img_avatar" alt="avatar">
                <!-- Aqui fa el formulari per canviar la imatge -->
                <?php echo form_open_multipart('contUpload/do_upload'); ?>
                <input type="file" name="userfile" size="20" /><br/>
                <input class="btn btn-primary" value="Canviar Imatge" type="submit">
                <?=form_close()?>
            </div>
        </div>

        <!-- edit form column -->
        <div class="col-md-9 personal-info">
            <?php if( isset($canvis_perfil_correcte) ){?>
            <div class="alert alert-info alert-dismissable">
                <a class="panel-close close" data-dismiss="alert">×</a>
                <i class="fa fa-hand-peace-o"></i>
                Canvis Guardats Correctament.
            </div>
            <?php } ?>
            <!-- fi zona alerts -->
            <?php $attributes = array('id' => 'perfil-formulari', 'role' => 'form', 'class' => 'form-horizontal');
            echo form_open_multipart('contPerfil/modificar_perfil', $attributes);
            ?>

            <div class="form-group">
                <?php echo form_error('inputNick'); ?>
                <input type="text" name="inputNick" id="inputNick" tabindex="1" class="form-control"
                       placeholder="Username" value="<?php echo set_value('inputNick');?>">
            </div>
            <div class="form-group">
                <input type="email" name="inputEmail" id="inputEmail" tabindex="1" class="form-control"
                       value="<?php echo $this->session->userdata("mail"); ?>" disabled>
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
                <label class="col-md-3 control-label"></label>
                <div class="col-md-8">
                    <input class="btn btn-primary" value="Guardar Canvis" type="submit">
                    <span></span>
                    <input class="btn btn-default" value="Cancelar" type="reset">
                </div>
            </div>
            </form>


        </div>
    </div>
</div>
<!-- /row -->
</div>
<!-- /container -->