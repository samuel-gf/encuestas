var arr_resp = [];
var tmp;

document.addEventListener('DOMContentLoaded', function(){ 
	// Pinchar sobre una cara
	var caras = document.querySelectorAll(".voto_item");
	for (let i=0; i<caras.length; i++){
		caras[i].addEventListener("click", function (){
			let cod = this.id.substring(1).split("-");
			let id = cod[0];
			let resp = cod[1];
			let pregunta = document.getElementById("p"+id);
			arr_resp[id] = resp;
			if (pregunta.dataset.respuesta == resp){
				// Ha pinchado sobre la que ya estaba seleccionada
				// Habilitar todos, borrar la respuesta y salir
				for (let j=1; j<=5; j++){
					let item = document.getElementById("p"+id+"-"+j);
					habilita(item);
					pregunta.dataset.respuesta = "";
				}
			} else {
				// Ha pinchado sobre uno que aún no estaba seleccionado
				// Habilita el pinchado y deshabilitar todos los demás
				for (let j=1; j<=5; j++){
					let item = document.getElementById("p"+id+"-"+j);
					// Recorre los cinco items y para cada uno comprueba si es la seleccionada
					// para deshabilitarla o habilitarla
					if (j != resp){
						// No es la seleccionada
						deshabilita(item);
					} else {
						// Es la seleccionada
						habilita(item);
						item.style.borderWidth = "3px";
						pregunta.dataset.respuesta = j;
					}
				}
			}
		});
	}

	// Terminar encuesta
	var btn_terminar = document.getElementById("btn_terminar");
	btn_terminar.addEventListener("click", function (){
		let obj_post = {
			resp: []
		}
		arr_resp.forEach(function (a, i){
			obj_post.resp[i] = a;
		});
		let xhr = new XMLHttpRequest(); 
		xhr.onreadystatechange = function (){
			switch (xhr.readyState){
				case 1:	// Leyendo
					btn_terminar.innerHTML = "Enviando";
					break;
				case 4:	// Terminado
					document.querySelector("section#preguntas").style.display="none";
					document.querySelector("section#terminado").style.display="block";
					console.log("TERMINADO");

					break;
			}
		};
		xhr.open("POST", "http://192.168.1.58:8080/rq/rec_encuesta.php");
		xhr.setRequestHeader("Content-Type", "application/json");
		xhr.send(JSON.stringify(obj_post));

	});

	
}, false);


function deshabilita(item){
	item.style.opacity = "0.15";
	item.style.borderWidth = "0";
}

function habilita(item){
	item.style.opacity = "1";
	item.style.borderWidth = "0";
}
