let  clase = document.querySelector('.c');

clase.addEventListener('change', (event) => {
	let resultado = document.getElementById('imagePreview');

	if(clase.value ==="Aerobicos"){
	   resultado.innerHTML = ` 
	   <img src="images/clases/aerobicos.jpg" alt="aerobicos" class="image">
	`;
		
	}else if (clase.value == "TaeBox"){

	   resultado.innerHTML = ` 
	   <img src="images/clases/taebox.jpg" alt="aerobicos" class="image">
	`;
	}else if (clase.value == "Rumba"){
	   resultado.innerHTML = ` 
	   <img src="images/clases/rumba.jpg" alt="rumba" class="image">
	`;
	}else if (clase.value == "Danza Pilates"){
	   resultado.innerHTML = ` 
	   <img src="images/clases/pilates.jpg" alt="pilates" class="image">
	`;
	}else if (clase.value == "Abdominales"){
	   resultado.innerHTML = ` 
	   <img src="images/clases/abdomen.jpg" alt="abodomen" class="image">
	`;
	}else if (clase.value == "Funcionales"){
	   resultado.innerHTML = ` 
	   <img src="images/clases/funcional.jpg" alt="funcional" class="image">
	`;
	}else{
		resultado.innerHTML = ` `;
	}
});


$(document).ready(function () {
	$('#new').parsley();
	var vclase = $("#clase");
	vclase.parsley();

	window.Parsley.addValidator('checkclase', {
		validateString: function (value) {
			
			var x = $.ajax({
				url: "?controller=clase&method=checkClass",
				type: "POST",
				async: false,
				data: { nombre: value }
			}).responseText;
			if (x == "false") {
				return false;
			} else if (x == "true") {
				return true;
			}
		},
		messages: { es: "La clase ya se encuentra registrada" }
	});	




});

$(".delete").click(function(e){
	var url  = this.href;
	e.preventDefault();
	  Swal.fire({
        title: 'Estas seguro de borrar este clase?',
        text: "Recuerque que solo las clases que no tengan horarios podran ser borradas",
		icon: 'danger',
		showCancelButton: true,
		confirmButtonText: 'Si, Borrar',
		cancelButtonText: 'Cancelar',
		reverseButtons: true
	  }).then((result) => {
		if (result.isConfirmed) {
			$.get(url,function(res){
				if(res =="true"){
					Swal.fire( {title: 'Clase eliminada correctamente',
					icon: 'success',
					confirmButtonText: 'Ok',
					reverseButtons: true}).then((result)=>{
						if(result.isConfirmed){
							location.href = "?controller=clase";
						}
					})
				}else{
					Swal.fire({title:"No se puede eliminar este clase", text: "La clase seleccionada tiene horarios asociados" })
				}
			})
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


