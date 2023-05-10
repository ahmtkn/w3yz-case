$(document).on('click', '[data-toggle=\'basic\']', function(e) {
	var element = this;
	$('#loader').remove();
	$('#modal-basic').remove();
	$.ajax({
		url: $(this).attr('data-action'),
		dataType: 'html',
		beforeSend: function() {
			$('body').append('<div id="loader" class="ajaxLoader"><div class="lds-ripple"><div></div><div></div></div></div>');
		},
		complete: function() {
			$('#loader').remove();
		},
		success: function(html) {
            console.log(html)
			$('#loader').remove();
			$('body').append(html);
			$('#modal-basic').modal('show');
		}
	});
});


$(document).on('click', '[data-toggle=\'basicSubmit\']', function(e) {
    var element = this;
    $.ajax({
        url: $(this).attr('data-action'),
        method: 'post',
        data: $('#' + $(this).attr('data-form')).serialize(),
        beforeSend: function() {},
        error: function(data) {
            if( data.status === 422 ) {
                var data = $.parseJSON(data.responseText);
                validation.error(data['errors'], data['message']);
            }
        },
        complete: function() {},
        success: function(result) {
            $('.alert-danger').hide();
            $('#modal-basic').modal('hide');
            document.location.reload();
        }
    });
});


