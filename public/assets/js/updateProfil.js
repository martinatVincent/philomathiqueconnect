$(function() {

	$('#photo').on('change',function(e) {
		console.log($(this));
		var $form = $('form#upload');
        var formdata = (window.FormData) ? new FormData($form[0]) : null;
        var data = (formdata !== null) ? formdata : $form.serialize();

        $.ajax({
            url: $form.attr('action'),
            type: $form.attr('method'),
            contentType: false, // obligatoire pour de l'upload
            processData: false, // obligatoire pour de l'upload
            dataType: 'json', // selon le retour attendu
            data: data,
            success: function (response) {
                // La réponse du serveur
                console.log(response);
                $('#message').empty();
                if(response.valide) {
                	$('.profilePic').attr('src',response.picUrl);
                	$('#message').text('Votre avatar a été mis à jour');
                } else {
                	$('#message').text(response.errors);
                }
            }
        });
	})
})

