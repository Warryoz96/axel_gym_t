$(document).ready(function(){

   Parsley.addValidator('checkpassword', {
    validateString: function (value) {
        url = "?controller=user&method=checkPassword";
        var x = $.ajax({
            url,
            type: "POST",
            async: false,
            data: { clave: value }
        }).responseText;
        console.log(x)
        if (x == "false") {
            return false;
        } else if (x == "true") {
            return true;
        }
    },
    messages: { es: "La contraseña no es correcta" }
});
});


$(".change").click(function(e){
    $("#clave").parsley().validate();
    $("#claveO").parsley().validate();
    $("#clave2").parsley().validate();
e.preventDefault();
let clave = $("#clave").val();

let url = "?controller=user&&method=changePassword";
if($("#clave").parsley().isValid() && $("#claveO").parsley().isValid() && $("#clave2").parsley().isValid()){
    $.post({
        url: url,
        data: {clave :clave}
     }).done(function(response){
         console.log(typeof response)
         console.log(response);
        if(response == "true"){

            Swal.fire({
                title: 'Constraseña actualizada correctamente',
                confirmButtonText: 'ok'
              }).then((result) => {
                if (result.isConfirmed) {
                    location.href = "?controller=user&method=profile"
                }
              })
        }else if(response == false){
            Swal.fire("Error al actualizar la contraseña")
        }
    })
}


})


