var Abriremergente = document.getElementById('abrir-emergente'),
	overlay = document.getElementById('overlay'),
	emergente = document.getElementById('emergente'),
	Cerraremergente = document.getElementById('cerrar-emergente');

	Abriremergente.addEventListener('click', function(){
	overlay.classList.add('active');
	emergente.classList.add('active');
});

Cerraremergente.addEventListener('click', function(e){
	e.preventDefault();
	overlay.classList.remove('active');
	emergente.classList.remove('active');
});

