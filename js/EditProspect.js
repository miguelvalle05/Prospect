(function load() {

    const $form = document.getElementById("frmGeneral")
    var information_array = []


    document.getElementById("account").disabled = true
    document.getElementById("datefac").disabled = true
    document.getElementById("amount").disabled = true
    document.getElementById("fac").disabled = true
    document.getElementById("name").disabled = true
    document.getElementById("business").disabled = true
    document.getElementById("tel").disabled = true
    document.getElementById("cel").disabled = true
    document.getElementById("email").disabled = true
    document.getElementById("state").disabled = true
    document.getElementById("agent").disabled = true
    document.getElementById("media").disabled = true
    document.getElementById("contact").disabled = true
    document.getElementById("menudeo").disabled = true
    document.getElementById("mayoreo").disabled = true
    document.getElementById("masi").disabled = true
    document.getElementById("meni").disabled = true
    document.getElementById("schedule").disabled = true
    document.getElementById("details").disabled = true
        // document.getElementById("btnNewSearch").disabled = true
    document.getElementById("btnSave").disabled = true
    document.getElementById("status").disabled = true

    $("#btnSave").hide();
    $("#btnNewSearch").hide();
    $("#btnDelete").hide();

    'use strict'
    // Obtener todos los formularios a los que queremos aplicar estilos de validación de Bootstrap personalizados
    var forms = document.querySelectorAll('.needs-validation')
        //Recorremos los forms y evitamos en envío sin validacion
    Array.prototype.slice.call(forms)
        .forEach(function(form) {
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                } else {
                    alert('FORM VALIDADO')
                }
                form.classList.add('was-validated')
            }, false)
        })

    $(document).on("click", "#btnSearch", function(e) {

        if ($form.customer.value == "") {
            alert("Ingresa un codigo")

        } else {
            $.ajax({
                url: "ValidateProspect.php",
                type: "post",
                data: {
                    customer: $form.customer.value
                }
            }).done(function(res) {
                if (res == 0) {
                    alert("Prospecto Inexistente")


                } else {


                    document.getElementById("account").disabled = false
                    document.getElementById("datefac").disabled = false
                    document.getElementById("amount").disabled = false
                    document.getElementById("fac").disabled = false
                    document.getElementById("name").disabled = false
                    document.getElementById("business").disabled = false
                    document.getElementById("tel").disabled = false
                    document.getElementById("cel").disabled = false
                    document.getElementById("email").disabled = false
                    document.getElementById("state").disabled = false
                    document.getElementById("agent").disabled = false
                    document.getElementById("media").disabled = false
                    document.getElementById("contact").disabled = false
                    document.getElementById("menudeo").disabled = false
                    document.getElementById("mayoreo").disabled = false
                    document.getElementById("masi").disabled = false
                    document.getElementById("meni").disabled = false
                    document.getElementById("schedule").disabled = false
                    document.getElementById("details").disabled = false
                    document.getElementById("btnSave").disabled = false
                        // document.getElementById("btnSearch").disabled = true
                        // document.getElementById("btnNewSearch").disabled = false
                    $("#btnSearch").hide();
                    $("#btnSave").show();
                    $("#btnNewSearch").show();
                    $("#btnDelete").show();

                    document.getElementById("status").disabled = false


                    resultado = JSON.parse(res);
                    console.log(resultado["info"]);
                    information = resultado["info"]
                    information_array = resultado["info"]




                    $("#account").val(information[0].id_cliente);
                    $("#datefac").val(information[0].fecha_factura);
                    $("#amount").val(information[0].monto_compra);
                    $("#fac").val(information[0].factura);

                    if (information[0].estatus != 0) {
                        $('#status option:contains(' + information[0].estatus + ')').attr('selected', true);


                    }




                    $("#name").val(information[0].Nombre_p);
                    $("#business").val(information[0].Empresa);
                    $("#tel").val(information[0].Telefono);
                    $("#cel").val(information[0].celularwhat);
                    $("#email").val(information[0].email);
                    $('#state option:contains(' + information[0].Estado + ')').attr('selected', true);
                    $('#agent option:contains(' + information[0].AsignadoA + ')').attr('selected', true);
                    $('#media option:contains(' + information[0].como_se_entero + ')').attr('selected', true);
                    $('#contact option:contains(' + information[0].Medio + ')').attr('selected', true);


                    $("#details").val(information[0].Comentarios_adicionales);
                    if (information[0].mayoreo_menudeo == 0) {
                        document.querySelector('#menudeo').checked = true;

                    } else if (information[0].mayoreo_menudeo == 1) {
                        document.querySelector('#mayoreo').checked = true;


                    }
                    if (information[0].inversion == 0) {
                        document.querySelector('#meni').checked = true;

                    } else if (information[0].inversion == 1) {
                        document.querySelector('#masi').checked = true;


                    }



                }

            });
        }

    })


    $(document).on("click", "#btnNewSearch", function(e) {
        //alert("soy el boton nuevo")

        location.reload();
        clearstatcache();

    });


    $(document).on("click", "#btnDelete", function(e) {

        var answer = confirm("¿Estas seguro de eliminar todo?");
        if (answer == true) {


            $.ajax({
                url: "DeleteProspect.php",
                type: "post",
                data: {
                    prospect: $form.customer.value
                }
            }).done(function(res) {
                if (res == 0) {
                    alert("No se eliminio correctamente el prospecto")

                }
            })




            location.reload();
            clearstatcache();


            return true;

        }



    });






    $("#account").change(function() {
        $("#account").each(function() {
            account = $(this).val();

            $.ajax({
                url: "Account.php",
                type: "post",
                data: {
                    account: account
                }
            }).done(function(res) {
                if (res == 0) {
                    alert("Cuenta Inexistente")
                    $("#account").val(null);
                    $("#datefac").val(null);
                    $("#amount").val(null);
                    $("#fac").val(null);

                    console.log(information_array);
                    console.log(information_array[0].estatus);


                    if (information_array[0].estatus != 0) {




                        $('#status option:contains(' + information_array[0].estatus + ')').attr('selected', 'selected');


                    } else {




                    }



                } else {


                    resultado = JSON.parse(res);
                    console.log(resultado["fac"]);
                    billing = resultado["fac"]



                    $("#datefac").val(billing[0].Fecha);
                    $("#amount").val(billing[0].Importe);
                    $("#fac").val(billing[0].Factura);

                    $('#status option:contains(Venta concluida)').attr('selected', 'selected');


                }

            });


        });
    })


})()