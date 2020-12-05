// Declarar array global que contendra la lista de categorias
// var arrMuscles = []
$("#musculo").selectpicker();

showMuscles();
//LLamar función de jquery para acción click del botón addElement
$("#addElement").click(function(e) {

    //Deshabilitar el envio por Http
    e.preventDefault()

    let idMuscle = $("#musculo").val()
    let nameMuscle = $("#musculo option:selected").text()

    if (idMuscle != '') {
        if (typeof existMuscle(idMuscle) === 'undefined') {
            //agregar categoria al array
            arrMuscles.push({
                'id': idMuscle,
                'name': nameMuscle

            })
        } else {
            Swal.fire("El  musculo ya se Encuentra Seleccionada")
        }
        // Metodo para mostrar en Html el array de las categorias
        showMuscles()
    } else {
        Swal.fire("Debe Seleccionar un musculo")
    }
});

function existMuscle(idMuscle) {
    let existMuscle = arrMuscles.find(function(muscle) {
        return muscle.id == idMuscle
    });
    return existMuscle
}

function showMuscles() {
    $("#list-muscles").empty()

    arrMuscles.forEach(function(muscle) {
        $("#list-muscles").append('<tr class="mt-2 mb-2"><td><span class=" mr-5 mb-3">' + muscle.name + '</span></td><td class=" text-center mt-5 mb-2"> <button onclick="removeElement(' + muscle.id + ')" class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></button></td> </tr>')
    })
}

function removeElement(idMuscle) {
    let index = arrMuscles.indexOf(existMuscle(idMuscle))
    arrMuscles.splice(index, 1)
    showMuscles()
}

//Generar el metodo de envio al backend

$("#submit").click(function(e) {
    $('#file').parsley().validate()
    $('#nombre').parsley().validate()
    $('#tipo').parsley().validate()

    //Deshabilitar el envio por Http
    if ($('#file').parsley().isValid() && $('#nombre').parsley().isValid() && $('#tipo').parsley().isValid()
    ) {
        e.preventDefault();

        var url = "?controller=exercise&method=save"

        var form = new FormData();
        form.append("file", $('#file')[0].files[0]);
        form.append("nombre", $('#nombre').val());
        form.append("tipo", $('#tipo').val());
        form.append("muscles", JSON.stringify(arrMuscles))

        $.post({
            url: url,
            type: 'POST',
            data: form,
            processData: false,
            contentType: false,
            success: function(data) {
                Swal.fire({
                    title: 'Inserción exitosa',
                    icon: 'danger',
                    confirmButtonText: 'Si, activar',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href = "?controller=exercise"

                    } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                            'Cancelado',
                        )
                    }
                })
            }

        });
    }

});


let fileInput = $('#file');
fileInput.change(function() {
    var filePath = this.value;
    // Allowing file type 
    var allowedExtensions =
        /(\.mp4|\.mov|\.WebM|\.OGG)$/i;

    if (!allowedExtensions.exec(filePath)) {
        Swal.fire('El archivo es invalido');
        fileInput.val("");
    }
})

$("#update").click(function(e) {
    if (true) {
        e.preventDefault();
        var url = "?controller=exercise&method=update"
        var form = new FormData();
        form.append("file", $('#file')[0].files[0]);
        form.append("ejercicio_id", $('#id').val());
        form.append("nombre", $('#nombre').val());
        form.append("tipo", $('#tipo').val());
        form.append("descripcion", $('#descripcion').val());
        form.append("muscles", JSON.stringify(arrMuscles))

        $.post({
            url: url,
            type: 'POST',
            data: form,
            processData: false,
            contentType: false,
            success: function(data) {
                if(typeof data.error == 'undefined'){
                    Swal.fire({
                        title: 'Actualizacion exitosa',
                        text: 'Los videos pueden tardar algunos minutos en ser procesados',
                        icon: 'danger',
                        confirmButtonText: 'Si, activar',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.href = "?controller=exercise"
                        } else if (
                            /* Read more about handling dismissals below */
                            result.dismiss === Swal.DismissReason.cancel
                        ) {
                            swalWithBootstrapButtons.fire(
                                'Cancelado',
                            )
                        }
                    })
                }else{
                     Swal.fire("Error al actulizar el ejercicio")
                }
            }
        });
    }

});

$(".delete").click(function(e) {
    var url = this.href;
    e.preventDefault();


    Swal.fire({
        title: 'Estas seguro de inactivar este ejercicio?',
        text: "Si lo inactiva las rutinas a las que este se encuentra asociado ya no estara disponible",
        icon: 'danger',
        showCancelButton: true,
        confirmButtonText: 'Si, inactivar',
        cancelButtonText: 'Cancelar',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            location.href = url

        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Cancelado',
            )
        }
    })
})

$(".active").click(function(e) {
    var url = this.href;
    e.preventDefault();
    Swal.fire({
        title: 'Estas seguro de activar este ejercicio?',
        text: "Si lo activa las rutinas a las que este se encuentra asociado estara disponible",
        icon: 'danger',
        showCancelButton: true,
        confirmButtonText: 'Si, activar',
        cancelButtonText: 'Cancelar',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            location.href = url
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Cancelado',
            )
        }
    })
})

let pause = $(".close").click(function() {


})


$('.close').click(()=> {
     document.querySelector(".embed-responsive-item").pause();
});