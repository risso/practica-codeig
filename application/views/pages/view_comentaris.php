<!-- PAGINA COMENTARIS  -->
<div class="container" id="cont_cerques_width_auto2">

    <!--<?php //echo anchor('contRegistre/enviar_emailami', 'Enviar-me missatge'); ?>-->

    <div class="row" id="cont_div_cerques2">
        <!-- edit form column -->
        <div class="col-md-4 col-md-offset-1">
            <!-- zona alerts -->
            <?php if (isset($canvis_perfil_correcte)) { ?>
                <div class="alert alert-info">
                    <i class="fa fa-hand-peace-o"></i>
                    Canvis Guardats Correctament.
                </div>
            <?php } ?>
            <?php if (isset($form_incomplert) && $form_incomplert == true) { ?>
                <div class="alert alert-danger" role="alert">
                    <strong>ERROR!</strong>&nbsp; &nbsp; Falten Camps per Omplir.
                </div>
            <?php } ?>

            <!-- fi zona alerts -->

            <!-- formulari de afegir comentari -->
            <?php $attributes = array('id' => 'comentari-formulari', 'role' => 'form', 'class' => 'form-horizontal');
            echo form_open_multipart('ContComentaris/afegir_comentari', $attributes);
            ?>

            <h1 id="titol_cerca">Afegir Comentari:</h1>
            <hr>

            <div class="form-group">
                <label for="input_m2_exterior">Referencia Cerca:</label>
                <input type="text" class="form-control" id="input_preu" name="input_preu" value="<?php if (isset($referencia)) echo $referencia; ?>" disabled>
            </div>


            <!--<div class="form-group">
                <label for="inputRef">Referència Cerca:</label>
                <input type="text" id="input_ref" name="input_ref" tabindex="1" class="form-control"
                       value="<?php /*if (isset($referencia)) echo $referencia; */?>" disabled>
            </div>-->

            <div class="form-group">
                <label for="input_comment">Comentari:</label>
                <textarea class="form-control" rows="5" id="input_comment" name="input_comment"></textarea>
            </div>

            <div class="form-group">
                <div class="">
                    <input class="btn btn-success" value="Guardar Comentari" type="submit">
                    <span></span>
                    <input class="btn btn-default" value="Borrar" type="reset">
                    <a href="<?php echo(site_url("ContComentaris/index/")); ?>" class="btn btn-primary">
                        Cancelar</a>
                </div>
            </div>
            </form>

        </div>
        <!-- FI formulari de afegir cerca -->

        <!-- FI Mostrar Taula -->
    </div>
    <!-- /row -->
</div>
<!-- /container -->
