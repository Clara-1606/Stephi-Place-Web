/* AFFICHER LES VALEURS DES RANGE */

$(function() {
	$('.range').next().text('-');
	$('.range').on('input', function() {
		var $set = $(this).val();
		$(this).next().text($set);
	});
});

$(function() {
	$('.prix').next().text('-');
	$('.prix').on('input', function() {
		var $set = $(this).val();
		$(this).next().text($set);
	});
});

/* DEPLIER LES CRITERES DE LA BARRE DE RECHERCHE */

(function($){
    $('.boutonSuperficie').click(function(e){
		e.preventDefault();
		if ($(".deplierPrix")[0]){
			$('body').removeClass('deplierPrix')
			$('body').addClass('deplierSuperficie')
		}
		else if ($(".deplierPiece")[0]){
			$('body').removeClass('deplierPiece')
			$('body').addClass('deplierSuperficie')
		}
		else if ($(".deplierSuperficie")[0]){
			$('body').removeClass('deplierSuperficie')
		}
		else {
			$('body').addClass('deplierSuperficie')
		}
    })
})(jQuery);

(function($){
    $('.boutonPrix').click(function(e){
		e.preventDefault();
		if ($(".deplierSuperficie")[0]){
			$('body').removeClass('deplierSuperficie')
			$('body').addClass('deplierPrix')
		}
		else if ($(".deplierPiece")[0]){
			$('body').removeClass('deplierPiece')
			$('body').addClass('deplierPrix')
		}
		else if ($(".deplierPrix")[0]){
			$('body').removeClass('deplierPrix')
		}
		else {
			$('body').addClass('deplierPrix')
		}
    })
})(jQuery);

(function($){
    $('.boutonPiece').click(function(e){
		e.preventDefault();
		if ($(".deplierSuperficie")[0]){
			$('body').removeClass('deplierSuperficie')
			$('body').addClass('deplierPiece')
		}
		else if ($(".deplierPrix")[0]){
			$('body').removeClass('deplierPrix')
			$('body').addClass('deplierPiece')
		}
		else if ($(".deplierPiece")[0]){
			$('body').removeClass('deplierPiece')
		}
		else {
			$('body').addClass('deplierPiece')
		}
    })
})(jQuery);

/* FENETRE DE CONNEXION */

var fenetre = document.getElementById("connexionFenetre");
        
var btn = document.getElementById("connexionBouton");

var span = document.getElementsByClassName("fermer")[0];

btn.onclick = function() {
  fenetre.style.display = "block";
}

span.onclick = function() {
  fenetre.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == fenetre) {
	fenetre.style.display = "none";
  }
}

/* Connexion - Deconnexion */

var con = document.getElementsByClassName("okConnexion")[0];

con.onclick = function() {
	$('body').addClass('connecte')
	/*var text = document.getElementById('connexionBouton').innerText = "Mon espace";*/
	fenetre.style.display = "none";
}

var dec = document.getElementsByClassName("deconnexionBouton")[0];
dec.onclick = function() {
	$('body').removeClass('connecte')
	/*var text = document.getElementById('connexionBouton').innerText = "Connexion";*/
}