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
                <table id="taula_comentaris" class="">
                    <thead class="">

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
                        <th>#Id Comentari</th>
                        <th>Num. Cerca</th>
                        <th>Usuari</th>
                        <th id="titol_comentari">Comentari</th>
                        <th>Data</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    foreach ($comentaris as $pos) {
                        echo "<tr>";
                        foreach ($pos as $key => $value) {
                            echo "<td>" . $value . "</td>";
                        }
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
