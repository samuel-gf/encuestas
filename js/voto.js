var arr_resp = [];
var tmp;

document.addEventListener('DOMContentLoaded', function(){ 
	// Votar caras
	var caras = document.querySelectorAll(".voto_item");
	
	for (let i=0; i<caras.length; i++){
		caras[i].addEventListener("click", function (){
			let cod = this.id.substring(1).split("-");
			let id = cod[0];
			let resp = cod[1];
			arr_resp[id] = resp;
			for (let j=1; j<=5; j++){
				let item = document.getElementById("p"+id+"-"+j);
				if (j != resp){
					item.style.opacity = "0.15";
					item.style.borderWidth = "0";
				} else {
					item.style.opacity = "1";
					item.style.borderWidth = "3px";
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
