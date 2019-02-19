/**Script de acciones*/
$( document ).ready(function() {
   //Acciones del menu principal
   var Accordion = function(el, multiple) {
		this.el = el || {};
		this.multiple = multiple || false;

		// Variables privadas
		var links = this.el.find('.link');
		// Evento
		links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
	}

	Accordion.prototype.dropdown = function(e) {
		var $el = e.data.el;
			$this = $(this),
			$next = $this.next();

		$next.slideToggle();
		$this.parent().toggleClass('open');

		if (!e.data.multiple) {
			$el.find('.submenu').not($next).slideUp().parent().removeClass('open');
		};
	}

	var accordion = new Accordion($('#accordion'), false);

  /*var cssLink = document.createElement("link");
cssLink.href = "Utilidades/Bootstrap/bootstrap.min.css";
cssLink.rel = "stylesheet";
cssLink.type = "text/css";
frames['ventana_iframe'].document.head.appendChild(cssLink);

var frm = frames['ventana_iframe'].document;
var otherhead = frm.getElementsByTagName("head")[0];
var link = frm.createElement("link");
link.setAttribute("rel", "stylesheet");
link.setAttribute("type", "text/css");
link.setAttribute("href", " Utilidades/Bootstrap/bootstrap.css");
otherhead.appendChild(link);*/

});

/*var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    });
}*/


function navegacionMenu(tema){
	console.log('el tema es:...'+tema);
	if( $('#'+tema).is(":visible") ){
   		$('#'+tema).removeClass('collapseIn');
		$('#'+tema).addClass('collapseOn');
	}else{
	    $('#'+tema).removeClass('collapseOn');
		$('#'+tema).addClass('collapseIn');
	}
}

function navegacionPagina(tema, subtema){
	//var ruta = tema+"/"+tema+".html"+"#"+subtema;
	var ruta = tema+"/"+subtema+".php";
	if(tema =="index"){
		ruta = "portada.html"
	}

	console.log("La ruta que va cargar es:....."+ruta);
	//$('#contenedorPrincipal').load(ruta);
	//window.frames["ventana_iframe"].location = ruta;
	// capturamos la url
        var loc = document.location.href;
        // si existe el interrogante
        if(loc.indexOf('?')>0)
        {
            // cogemos la parte de la url que hay despues del interrogante
            var getString = loc.split('?')[1];
            // obtenemos un array con cada clave=valor
            var GET = getString.split('&');
            var get = {};
            // recorremos todo el array de valores
            for(var i = 0, l = GET.length; i < l; i++){
                var tmp = GET[i].split('=');
                get[tmp[0]] = unescape(decodeURI(tmp[1]));
            }
            return get;
        }else{
        	console.log("la ruta que tomo es "+loc);
        }
	document.href="index.php?nav="+subtema+"";
}

/**
 * Funcion para la autenticacion de usuario
 */
function autenticarUsuario(){
	//alert("autenticar usuario");
	/*$('#contenedorPrincipal').load("Modulos/autenticacion.php");
	window.frames["ventana_iframe"].location = "Modulos/autenticacion.php";*/
	var loc = document.location.href;
	console.log("lan ruta es::..."+loc);
	location.href=loc+"index.php?nav=autenticacion";
}
