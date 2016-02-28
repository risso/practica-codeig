<!-- PAGINA NOTIFICACIONS  -->
<!-- PAGINA NOTIFICACIONS  -->
<!-- PAGINA NOTIFICACIONS  -->
<div class="container" id="cont_notificacions_width_auto">

    <!--<?php //echo anchor('contRegistre/enviar_emailami', 'Enviar-me missatge'); ?>-->

    <div class="row" id="cont_div_notificacins">
        <!-- edit form column -->
        <div class="col-md-4 col-md-offset-1">
            <!-- zona alerts -->
            <?php if (isset($form_incomplert) && $form_incomplert == true) { ?>
                <div class="alert alert-danger" role="alert">
                    <strong>ERROR!</strong>&nbsp; &nbsp; Falten Camps per Omplir.
                </div>
            <?php } ?>

            <!-- fi zona alerts -->
            <!-- Boto per mostrar formulari per afegir NOTIFICACIO -->

            <a href="<?php echo(site_url("ContNotificacions/mostrar_form/")); ?>" class="btn btn-primary"
                <?php if (isset($mostrar_form)) {
                    echo 'disabled';
                } ?>
            >Afegir Notificació</a>

            <?php if (isset($mostrar_form) && $mostrar_form == true) { ?>

                <!-- formulari de afegir cerca -->
                <?php $attributes = array('id' => 'notificacio-formulari', 'role' => 'form', 'class' => 'form-horizontal');
                echo form_open_multipart('ContNotificacions/afegir_notificacio', $attributes);
                ?>
                <h1 id="titol_notificacio">Nova Notificacio:</h1>
                <hr>
                <div class="form-group">
                    <label for="input_imm">Tipus Immoble:</label>
                    <?php $options = array(
                        'Pis' => 'Pis',
                        'Casa' => 'Casa',
                        'Local' => 'Local',
                    );
                    $atrib = array('id' => 'input_imm', 'class' => 'form-control');
                    echo form_dropdown('input_imm', $options, 'Pis', $atrib);
                    ?>
                </div>
                <div class="form-group">
                    <label for="input_prov">Provincia:</label>
                    <?php echo $dropdown_prov; ?>
                    <!-- El seguent link es ocult, canvia el atribut href quan és canvia de provincia i s'envia a l'hora -->
                    <a hidden id="boto_enviar_prov2"
                       href='<?php echo site_url('ContNotificacions/mostrar_form') . "?prov=2" ?>'>Mostrar Poblacions</a>
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
                    <?php echo form_error('input_m2'); ?>
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
                    <p>Orientacio:</p>
                    <label class="radio-inline">
                        <input type="radio" name="input_radio_orientacio" value="Nord">Nord
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="input_radio_orientacio" value="Sud">Sud
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="input_radio_orientacio" value="Est">Est
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="input_radio_orientacio" value="Oest">Oest
                    </label>
                </div>
                <div class="form-group">
                    <label for="input_planta">Estat Conservacio:</label>
                    <?php $options = array(
                        'Nou' => 'Nou',
                        'Bo' => 'Bo',
                        'Regular' => 'Regular',
                        'En Ruines' => 'En Ruines',
                    );
                    $atrib = array('id' => 'input_conservacio', 'class' => 'form-control');
                    echo form_dropdown('input_conservacio', $options, 1, $atrib);
                    ?>
                </div>
                <div class="form-group">
                    <label for="input_m2_exterior">Preu:</label>
                    <input type="number" class="form-control" id="input_preu" name="input_preu">
                </div>
                <div class="form-group">
                    <div class="">
                        <input class="btn btn-success" value="Guardar Canvis" type="submit">
                        <span></span>
                        <input class="btn btn-default" value="Borrar" type="reset">
                        <a href="<?php echo(site_url("ContNotificacions/index/")); ?>" class="btn btn-primary">
                            Cancelar</a>
                    </div>
                </div>
                </form>
            <?php } ?>
        </div>
        <!-- FI formulari de afegir cerca -->
        <div class="col-xs-12" id="taula_notificacions">

            <!-- Mostrar taula amb totes les cerques del usuari -->
            <h2>Filtres Creats  - Immobles Disponibles -</h2>
            <table class="table table-bordered">
                <thead class="thead-inverse">

                <?php
                //Bucle només per mostrar titols de la taula igual bd

                /*                echo "<tr>";
                                foreach ($cerques[0] as $key => $val) {
                                    if ($key != 'id_user') {
                                        echo "<th>" . $key . "</th>";
                                    }
                                }
                                echo "</tr>";
                                */ ?>
                <tr>
                    <th>#Ref.</th>
                    <th>Immoble</th>
                    <th>Provincia</th>
                    <th>Poblacio</th>
                    <th>Operacio</th>
                    <th>m2</th>
                    <th>Espais</th>
                    <th>Banys</th>
                    <th>m2 Ext.</th>
                    <th>Panta</th>
                    <th>Orient.</th>
                    <th>Conservacio</th>
                    <th>Preu</th>
                    <th>Data</th>
                </tr>
                </thead>
                <tbody>

                <?php
                foreach ($notificacions as $pos) {
                    echo "<tr>";
                    foreach ($pos as $key => $value) {
                        switch ($key) {
                            case 'id_user';
                                //no fer res, per no mostrar el id_user
                                break;
                            default:
                                echo "<td>" . $value . "</td>";
                                break;
                        }
                    }
                    //if ($accepta_comentari) echo "<td><a class='btn btn-warning' href=" . site_url('ContCerques/mostrar_form/') . ">Comentar</a></td>";
                    echo "</tr>";


                }

                ?>
                </tbody>
            </table>
        </div>
        <!-- FI Mostrar Taula Filtres Creats -->

        <div class="col-xs-12" id="taula_cerques">

            <!-- Mostrar taula amb totes les notificacions de l'usuari -->
            <h2>Notificacions:</h2>
        </div>
        <!-- FI Mostrar Taula Notificacions -->


    </div>
    <!-- /row -->
</div>
<!-- /container -->
