<!-- PAGINA CERQUES  -->
<div id="contingut" class="container">

    <!--<?php //echo anchor('contRegistre/enviar_emailami', 'Enviar-me missatge'); ?>-->

    <div class="row" id="cont_div_cerques">
        <!-- edit form column -->
        <div class="col-md-8 col-md-offset-2">
            <!-- zona alerts -->
            <?php if (isset($canvis_perfil_correcte)) { ?>
                <div class="alert alert-info alert-dismissable">
                    <a class="panel-close close" data-dismiss="alert">×</a>
                    <i class="fa fa-hand-peace-o"></i>
                    Canvis Guardats Correctament.
                </div>
            <?php } ?>
            <!-- fi zona alerts -->
            <!-- Boto per mostrar formulari per afegir cerca -->
            <?php if (isset($mostrar_form)) {
                $attr = 'disabled';
            } else {
                $attr = 'enabled';
            } ?>
            <a href="<?php echo(site_url("ContCerques/mostrar_form/")); ?>" class="btn btn-primary">Afegir Cerca</a>

            <?php if (isset($mostrar_form) && $mostrar_form == true) { //($mostrar_form);?>

                <!-- formulari de afegir cerca -->
                <?php $attributes = array('id' => 'cerca-formulari', 'role' => 'form', 'class' => 'form-horizontal');
                echo form_open_multipart('contCerques/afegir_cerca', $attributes);
                ?>
                <h1 id="titol_cerca">Nova Cerca:</h1>
                <hr>
                <div class="form-group">
                    <label for="input_imm">Tipus Immoble:</label>
                    <?php $options = array(
                        'Pis' => 'Pis',
                        'Casa' => 'Casa',
                        'Local' => 'Local',
                    );
                    //$atributs = 'id="shirts" onChange="some_function();"';
                    $atrib = array('id' => 'input_imm', 'class' => 'form-control');
                    echo form_dropdown('input_imm', $options, 'Pis', $atrib);
                    ?>
                </div>
                <div class="form-group">
                    <label for="input_prov">Provincia:</label>
                    <?php echo $dropdown_prov; ?>
                    <?php ?>
                </div>
                <div class="form-group">
                    <label for="input_pob">Poblacio:</label>
                    <?php echo $dropdown_pob; ?>
                    <?php ?>
                </div>
                <div class="form-group">
                    <label for="input_oper">Operacio:</label>
                    <?php $options = array(
                        'Lloguer' => 'Lloguer',
                        'Compra' => 'Compra',
                    );
                    $atrib = array('id' => 'input_oper', 'class' => 'form-control');
                    echo form_dropdown('input_oper', $options, [1], $atrib);
                    ?>
                </div>
                <div class="form-group">
                    <label for="input_m2">Metres Quadrats:</label>
                    <input type="number" class="form-control" id="input_m2" name="input_m2">
                </div>
                <div class="form-group">
                    <label for="input_num_espais">Numero d'Espais:</label>
                    <input type="number" class="form-control" id="input_num_espais" name="input_num_espais">
                </div>
                <div class="form-group">
                    <label for="input_num_banys">Numero de Banys:</label>
                    <input type="number" class="form-control" id="input_num_banys" name="input_num_banys">
                </div>
                <div class="form-group">
                    <label for="input_m2_exterior">Metres Quadrats Exterior:</label>
                    <input type="number" class="form-control" id="input_m2_exterior" name="input_m2_exterior">
                </div>
                <div class="form-group">
                    <label for="input_planta">Planta:</label>
                    <?php $options = array(
                        'Planta Baixa' => 'Planta Baixa',
                        '1r' => '1r',
                        '2n' => '2n',
                        'Atic' => 'Atic',
                        'Indiferent' => 'Indiferent',
                    );
                    $atrib = array('id' => 'input_planta', 'class' => 'form-control');
                    echo form_dropdown('input_planta', $options, 1, $atrib);
                    ?>
                </div>
                <div class="form-group">
                    <label for="input_radio_orientacio">Orientacio:</label>
                    <?php $atrib = array('id' => 'input_radio_orientacio', 'class' => 'radio-inline','value'=> ''); ?>
                    echo form_dropdown('input_radio_orientacio', $options, $atrib);
                    <?php echo form_checkbox('newsletter',$atrib); ?>
                    ?>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-8">
                        <input class="btn btn-success" value="Guardar Canvis" type="submit">
                        <span></span>
                        <input class="btn btn-default" value="Borrar" type="reset">
                        <a href="<?php echo(site_url("ContCerques/index/")); ?>" class="btn btn-primary">
                            Cancelar</a>
                    </div>
                </div>
                </form>
            <?php } ?>
            <!-- FI formulari de afegir cerca -->
        </div>
    </div>
    <!-- /row -->
</div>
<!-- /container -->
