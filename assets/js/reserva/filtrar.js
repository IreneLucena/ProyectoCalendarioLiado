var conexion;

function accionAJAX() {
	document.getElementById("aulas").innerHTML=conexion.responseText;
}

	function verOR() {
		
		var categoria=document.getElementById('categoria').value;
		var red= "NO";
		var proyector= "NO";
		
		if(document.getElementById('red').checked)
		{
			red=document.getElementById('red').value;
		}
		
		if(document.getElementById('proyector').checked)
		{
			proyector= document.getElementById('proyector').value;
		}
		
		var equipos= document.getElementById('equipos').value;
		var capacidad= document.getElementById('capacidad').value;
		conexion = new XMLHttpRequest();
		
		conexion.open('POST', "http://localhost/ProyectoCalendario/booking/filtrarPost", true);
		conexion.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
		conexion.setRequestHeader("Content-type","application/x-www-form-urlencoded"); 
		conexion.send("categoria="+categoria+"&red="+red+"&proyector="+proyector+"&equipos="+equipos+"&capacidad="+capacidad);
	
		
		conexion.onreadystatechange = function() {
			if (conexion.readyState==4 && conexion.status==200) {
				accionAJAX();
			}
		}
	}
	/*
  	$(function(){
    	$("#sliderEquipos").slider({
     		value:0,
      		min: 0,
      		max: 50,
      		step: 5,
      		slide: function( event, ui ) {
        	$("#equipos").val(ui.value );
      		}
    	});
    	$("#equipos").val($("#sliderEquipos").slider("value"));

    	$("#sliderCapacidad").slider({
     		value: 10,
      		min: 10,
      		max: 200,
      		step: 10,
      		slide: function( event, ui ) {
        	$("#capacidad").val(ui.value );
      		}
    	});
    	$("#capacidad").val($("#sliderCapacidad").slider("value"));
  	});
  	*/
