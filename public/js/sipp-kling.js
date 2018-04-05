$(function(){
	$('select[core-angler="select-retrieve-data-rw"]').on('change', function(){
		$('#' + $(this).val()).modal('show');
	});
});