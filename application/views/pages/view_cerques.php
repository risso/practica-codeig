<!-- PAGINA CERQUES  -->
<div class="container">

    <!--<?php //echo anchor('contRegistre/enviar_emailami', 'Enviar-me missatge'); ?>-->

    <div class="row" id="cont_div_cerques">
        <!-- edit form column -->
        <div class="col-md-4 col-md-offset-1">
            <!-- zona alerts -->
            <?php if (isset($canvis_perfil_correcte)) { ?>
                <div class="alert alert-info">
                    <i class="fa fa-hand-peace-o"></i>
                    Canvis Guardats Correctament.
                </div>
            <?php } ?>
            <!-- fi zona alerts -->
            <!-- Boto per mostrar formulari per afegir cerca -->

            <a href="<?php echo(site_url("ContCerques/mostrar_form/")); ?>" class="btn btn-primary"
                <?php if (isset($mostrar_form)) {
                    echo 'disabled';
                } ?>
            >Afegir Cerca</a>

            <?php if (isset($mostrar_form) && $mostrar_form == true) { ?>

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
                    <p>Accepta Comanda:</p>
                    <label class="radio-inline">
                        <input type="radio" name="input_accept_comentari" value="1">Si
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="input_accept_comentari" value="0">No
                    </label>
                </div>
                <div class="form-group">
                    <div class="">
                        <input class="btn btn-success" value="Guardar Canvis" type="submit">
                        <span></span>
                        <input class="btn btn-default" value="Borrar" type="reset">
                        <a href="<?php echo(site_url("ContCerques/index/")); ?>" class="btn btn-primary">
                            Cancelar</a>
                    </div>
                </div>
                </form>
            <?php } ?>
        </div>
        <!-- FI formulari de afegir cerca -->
        <div class="col-xs-12" id="taula_cerques">
            <!-- Mostrar taula amb totes les cerques del usuari -->
            <h2>Cerques Realitzades</h2>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
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
                    <th>Comment.</th>
                    <th>Data</th>
                </tr>
                </thead>
                <tbody>
                <?php for ($i = 0; $i < sizeof($cerques); $i++) { ?>
                    <tr>
                        <td><?php echo $cerques[$i]["ref"]; ?></td>
                        <td><?php echo $cerques[$i]["type_im"]; ?></td>
                        <td><?php echo $cerques[$i]["provincia"]; ?></td>
                        <td><?php echo $cerques[$i]["poblacio"]; ?></td>
                        <td><?php echo $cerques[$i]["operacio"]; ?></td>
                        <td><?php echo $cerques[$i]["m2"]; ?></td>
                        <td><?php echo $cerques[$i]["num_espais"]; ?></td>
                        <td><?php echo $cerques[$i]["num_banys"]; ?></td>
                        <td><?php echo $cerques[$i]["m2_exterior"]; ?></td>
                        <td><?php echo $cerques[$i]["planta"]; ?></td>
                        <td><?php echo $cerques[$i]["orientacio"]; ?></td>
                        <td><?php echo $cerques[$i]["estat_conservacio"]; ?></td>
                        <td><?php echo $cerques[$i]["preu"]; ?></td>
                        <td><?php echo $cerques[$i]["accepta_com"]; ?></td>
                        <td><?php echo $cerques[$i]["data"]; ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>

        <!-- FI Mostrar Taula -->
    </div>
    <!-- /row -->
</div>
<!-- /container -->
