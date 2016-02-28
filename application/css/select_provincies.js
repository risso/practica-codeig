function obtenir_codi_prov() {


    var codi_prov = document.getElementById('input_prov').value;

    console.info(codi_prov);

    var element_a = document.getElementById("boto_enviar_prov");

    element_a.setAttribute('href', 'http://localhost/practica-codeig/index.php/ContCerques/mostrar_form?prov=' + codi_prov);

    console.info(element_a);

    element_a.click();


}

function obtenir_codi_prov2() {


    var codi_prov = document.getElementById('input_prov').value;

    console.info(codi_prov);

    var element_a = document.getElementById("boto_enviar_prov2");

    element_a.setAttribute('href', 'http://localhost/practica-codeig/index.php/ContNotificacions/mostrar_form?prov=' + codi_prov);

    console.info(element_a);

    element_a.click();


}
