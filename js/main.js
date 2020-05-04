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
    $('.boutonSuperficie').click(function(){
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
    $('.boutonPrix').click(function(){
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
    $('.boutonPiece').click(function(){
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

/* MON ESPACE */

(function($){
    $('.boutonInfo').click(function(){
		if ($(".deplierAgence")[0]){
			$('body').removeClass('deplierAgence')
			$('body').addClass('deplierInfo')
		}
		else if ($(".deplierId")[0]){
			$('body').removeClass('deplierId')
			$('body').addClass('deplierInfo')
		}
		else if ($(".deplierFav")[0]){
			$('body').removeClass('deplierFav')
			$('body').addClass('deplierInfo')
		}
		else if ($(".deplierInfo")[0]){
			$('body').removeClass('deplierInfo')
		}
		else {
			$('body').addClass('deplierInfo')
		}
    })
})(jQuery);

(function($){
    $('.boutonAgence').click(function(){
		if ($(".deplierInfo")[0]){
			$('body').removeClass('deplierInfo')
			$('body').addClass('deplierAgence')
		}
		else if ($(".deplierId")[0]){
			$('body').removeClass('deplierId')
			$('body').addClass('deplierAgence')
		}
		else if ($(".deplierFav")[0]){
			$('body').removeClass('deplierFav')
			$('body').addClass('deplierAgence')
		}
		else if ($(".deplierAgence")[0]){
			$('body').removeClass('deplierAgence')
		}
		else {
			$('body').addClass('deplierAgence')
		}
    })
})(jQuery);

(function($){
    $('.boutonId').click(function(){
		if ($(".deplierInfo")[0]){
			$('body').removeClass('deplierInfo')
			$('body').addClass('deplierId')
		}
		else if ($(".deplierAgence")[0]){
			$('body').removeClass('deplierAgence')
			$('body').addClass('deplierId')
		}
		else if ($(".deplierFav")[0]){
			$('body').removeClass('deplierFav')
			$('body').addClass('deplierId')
		}
		else if ($(".deplierId")[0]){
			$('body').removeClass('deplierId')
		}
		else {
			$('body').addClass('deplierId')
		}
    })
})(jQuery);

(function($){
    $('.boutonFav').click(function(){
		if ($(".deplierInfo")[0]){
			$('body').removeClass('deplierInfo')
			$('body').addClass('deplierFav')
		}
		else if ($(".deplierAgence")[0]){
			$('body').removeClass('deplierAgence')
			$('body').addClass('deplierFav')
		}
		else if ($(".deplierId")[0]){
			$('body').removeClass('deplierId')
			$('body').addClass('deplierFav')
		}
		else if ($(".deplierFav")[0]){
			$('body').removeClass('deplierFav')
		}
		else {
			$('body').addClass('deplierFav')
		}
    })
})(jQuery);

/* CLONE DEPENDANCE */

$(".conteneurAjoutDependance").click(function(){
	$(".conteneurAjoutPlus:first").clone().appendTo(".conteneurDepAjout");
  });

/*ETAGE FORMULAIRE DEPOT*/

$(document).ready(function(){

	$('#appartement').click(function(){

		if($(this).is(":checked")){

			$("#etageDepot").removeAttr("disabled");

		}

		else if($(this).is(":not(:checked)")){

			document.getElementById("etageDepot").setAttribute("disabled", "disabled");

		}

	});

});

/* FENETRE DE CONNEXION */

$('#connexionBouton').click(function(){
	document.getElementById("connexionFenetre").style.display = "block";
});

$('.fermer').click(function(){
	document.getElementById("connexionFenetre").style.display = "none";
});

$('#connexionFenetre').click(function(event){
	if (event.target == document.getElementById("connexionFenetre")) {
		document.getElementById("connexionFenetre").style.display = "none";
	  }
});

/* Connexion - Deconnexion */

$('.okConnexion').click(function(){
	$('body').addClass('connecte')
	document.getElementById("connexionFenetre").style.display = "none";
});


$('.deconnexionBouton').click(function(){
	document.getElementsByClassName("deconnexionBouton").onclick = function() {
		$('body').removeClass('connecte')
};
});




