<!-- PAGINA COMENTARIS DE CERQUES -->
<div class="container" id="cont_cerques_width_auto3">

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

            <div class="col-xs-12" id="taula_cerques3">

                <!-- Mostrar taula amb totes les cerques del usuari -->
                <h2>Comentaris de la Cerca</h2>
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
                        <th>Comment.</th>
                        <th>Data</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    foreach ($comentaris as $pos) {
                        echo "<tr>";
                        $accepta_comentari;
                        foreach ($pos as $key => $value) {
                            switch ($key) {
                                case 'id_user';
                                    //no fer res, per no mostrar el id_user
                                    break;
                                case  'accepta_com';
                                    $accepta_comentari = $value;
                                    if ($value) {
                                        echo "<td>SI</td>";
                                    } else {
                                        echo "<td>NO</td>";
                                    }
                                    break;
                                default:
                                    echo "<td>" . $value . "</td>";
                                    break;
                            }
                        }
                        if ($accepta_comentari) echo "<td><a class='btn btn-warning' href=" . site_url('ContCerques/mostrar_form/') . ">Veure Comentaris</a></td>";
                        echo "</tr>";


                    }

                    ?>
                    </tbody>
                </table>
            </div>
            <!-- FI Mostrar Taula -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
