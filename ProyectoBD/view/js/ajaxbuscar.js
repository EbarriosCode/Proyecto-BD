function lista_EmpresasCliente(valor,pagina){
	var pagina = Number(pagina);
	$.ajax({
		url:'../../controller/controladorbusquedaEmpresas_controlador.php',
		type:'POST',
		data:'valor='+valor+'&pagina='+pagina+'&boton=buscar'
	}).done(function(resp){
		//alert(resp);
		var arregloDatos = resp.split("*");
		var valores = eval(arregloDatos[0]);
		 html="<div class='table-responsive'>"+
		 		"<table class='table table-hover table-striped table-condensed'>"+
					"<thead><tr class='info'>"+
								"<th>ID</th>"+
								"<th>NOMBRE</th>"+
								"<th>DESCRIPCION</th>"+
								"<th>DIRECCION</th>"+
								"<th>RESPONSABLE</th>"+
								"<th colspan='2'>OPCIONES</th>"+
							"</tr>"+
					"</thead>"+
					"<tbody>";
					
		for(i=0; i<valores.length; i++)
		{
			datos=valores[i]['ID']+"*"+valores[i]['NOMBRE']+"*"+valores[i]['DESCRIPCION']+"*"+valores[i]['DIRECCION']+"*"+valores[i]['RESPONSABLE'];
			html+="<tr>"+
						"<td>"+valores[i]['ID']+"</td>"+
						"<td>"+valores[i]['NOMBRE']+"</td>"+
						"<td>"+valores[i]['DESCRIPCION']+"</td>"+
						"<td>"+valores[i]['DIRECCION']+"</td>"+
						"<td>"+valores[i]['RESPONSABLE']+"</td>"+
						//"<input type='hidden' name='idEmpresa' id='idEmpresa'"+
						"<td><button class='btn btn-success' data-toggle='modal' data-target='#modal-editar' onclick='cargarDatosEditar("+'"'+datos+'"'+")'><span class='icon-pencil'></span>Editar</button></td>"+
						"<td><button type='button' id='eliminar' name='eliminar' class='btn btn-danger' onclick='confirmarRegistro("+'"'+valores[i]['ID']+'"'+")'><span class='icon-trash'></span>Borrar</button></td>"+
						
					"</tr>";
		}
		html+="		</tbody>"+
			"</table>"+
			"</div>"
			
		$("#lista").html(html); 

		 totalRegistros = arregloDatos[1];
		 num_links = Math.ceil(totalRegistros/5);
		//alert(num_links);
		var campoBusqueda = $("#buscar").val();
		paginar = "<ul class='pagination'>";

		if(pagina>1){
			paginar += "<li><a href='javascript:void(0)' onclick='lista_EmpresasCliente("+'"'+campoBusqueda+'","'+1+'"'+")'>&laquo;</a></li>";
			paginar += "<li><a href='javascript:void(0)' onclick='lista_EmpresasCliente("+'"'+campoBusqueda+'","'+(pagina-1)+'"'+")'>&lsaquo;</a></li>";
		}
		else{
			paginar += "<li class='disabled'><a href='javascript:void(0)'>&laquo;</a></li>";
			paginar += "<li class='disabled'><a href='javascript:void(0)'>&lsaquo;</a></li>";	
		}

		limite = 10;
 

			div = Math.ceil(limite / 2);

			pagInicio = (pagina > div) ? (pagina - div) : 1;


			if (num_links > div)
			{
				pagRestantes = num_links - pagina;
				pagFin = (pagRestantes > div) ? (pagina + div) : num_links;
			}
			else 
			{
				pagFin = num_links;
			} 
			
			for (var i=pagInicio; i<=num_links; i++) {
				if(i==pagina)
					paginar += "<li class='active'><a href='javascript:void(0)'>"+i+"</a></li>";
				else
				paginar += "<li><a href='javascript:void(0)' onclick='lista_EmpresasCliente("+'"'+campoBusqueda+'","'+i+'"'+")'>"+i+"</li>";
				
			}

		if(pagina<num_links)
		{
			paginar+="<li><a href='javascript:void(0)' onclick='lista_EmpresasCliente("+'"'+campoBusqueda+'","'+(pagina+1)+'"'+")'>&rsaquo;</a></li>";
			paginar+="<li><a href='javascript:void(0)' onclick='lista_EmpresasCliente("+'"'+campoBusqueda+'","'+num_links+'"'+")'>&raquo;</a></li>";

		}
		else
		{
			paginar+="<li class='disabled'><a href='javascript:void(0)'>&rsaquo;</a></li>";
			paginar+="<li class='disabled'><a href='javascript:void(0)'>&raquo;</a></li>";
		} 	

		paginar += "</ul>";

		$('#paginacion').html(paginar);
	});
}

$('#actualizar').click(function()
	{
		alert('Registro Actualizado Correctamente');
	});


/*	$("#insertar").click(function(){
		var name = $('#nombre').val();
		var descripcion = $('#descripcion').val();
		var direccion = $('#direccion').val();
		var responsable = $('#responsable').val();

		if (name ==''){
			alert("Todos los campos son requeridos");
			return false;
		}
		
	});
*/
function cargarDatosEditar(datos){
	//alert(datos);
	var d=datos.split("*");
	//alert(d.length);
	$("#idEmpresa").val(d[0]);
	$("#nombre").val(d[1]);
	$("#descripcion").val(d[2]);
	$("#direccion").val(d[3]);
	$("#responsable").val(d[4]);
}



/*
function eliminar(id){
	//alert(id);
	$.ajax({
		url:'../../controller/controladorbusquedaEmpresas_controlador.php',
		type:'POST',
		data:'idEmpresa='+id+'&boton=eliminar'
	}).done(function(resp){
		alert(resp);
		lista_EmpresasCliente('');
	});	
}  */

function confirmarRegistro(id)
{
   if (window.confirm("Esta seguro que desea eliminar este registro?") == true)
      {
         window.location = "../../controller/EmpresaClienteCRUD_controlador.php?idEmpresa="+id;
      }
}
