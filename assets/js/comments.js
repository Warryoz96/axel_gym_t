$(document).on("click", ".btnEditar", function(){		
	//Recojo los datos de la tabla        
    fila = $(this).closest("tr");	        
    comentario_id = parseInt(fila.find('td:eq(0)').text()); //capturo el ID		            
    tipo = fila.find('td:eq(1)').text();
    descripcion = fila.find('td:eq(2)').text();
	
//Asigno los datos a los campos del formulario editar

	$("#comentario_id").val(comentario_id);
    $("#tipo").val(tipo);
    $("#descripcion").val(descripcion);


	
});

$(".delete").click(function(e){
	var url  = this.href;
	e.preventDefault();
	
	  
	  Swal.fire({
        title: 'Estas seguro de eliminar este comentario?',
		icon: 'danger',
		showCancelButton: true,
		confirmButtonText: 'Si, borrar',
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