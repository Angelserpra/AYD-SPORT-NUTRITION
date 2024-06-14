var Abriremergente2 = document.getElementById('abrir-emergente2'),
	overlay2 = document.getElementById('overlay2'),
	emergente2 = document.getElementById('emergente2'),
	Cerraremergente2 = document.getElementById('cerrar-emergente2');

Abriremergente2.addEventListener('click', function(){
	overlay2.classList.add('active');
	emergente2.classList.add('active');
});

Cerraremergente2.addEventListener('click', function(e){
	e.preventDefault();
	overlay2.classList.remove('active');
	emergente2.classList.remove('active');
});