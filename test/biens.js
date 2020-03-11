$(function() {
	$('.range').next().text('-'); // Valeur par défaut
	$('.range').on('input', function() {
		var $set = $(this).val();
		$(this).next().text($set);
	});
});

$(function() {
	$('.prix').next().text('-'); // Valeur par défaut
	$('.prix').on('input', function() {
		var $set = $(this).val();
		$(this).next().text($set);
	});
});