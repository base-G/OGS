$("#create").click(function() {
	$("#create").addClass("btn-success");
	$("#delete").removeClass("btn-success");

	$("#deleteContent").css('display', 'none');
	$("#createContent").css('display', 'block');
});

$("#delete").click(function() {
	$("#delete").addClass("btn-success");
	$("#create").removeClass("btn-success");

	$("#createContent").css('display', 'none');
        $("#deleteContent").css('display', 'block');

	var id = $(".curUser").attr('id');
	
	$('#class')
    		.find('option')
    			.remove()
    				.end()
    					.append('<option value="whatever">Select Class</option>')
    						.val('whatever')
	;

	$.ajax({
		type: "POST",
		url: "php/refreshClass.php",
		data: {creator:id,},
		success: function(output) {
			res = output.split('\n');

			for (var i = 0; i < res.length - 1; i++) {
				$("#class").append('<option>' + res[i] + '</option>');	
			}
			
		}
	});
});


$("#createForm").ajaxForm(function(output) {
	if (output != '1') {
		$("#error").show();
                setTimeout(function() {
                        $("#error").fadeOut('slow');
                }, 2000);

	} else {
		$("#success").show();
        	setTimeout(function() {
 	       		$("#success").fadeOut('slow');
        	}, 2000);
	}
});

$("#deleteForm").ajaxForm(function(output) {
        if (output != '1') {
                $("#error2").show();
                setTimeout(function() {
                        $("#error2").fadeOut('slow');
                }, 2000);

        } else {
                $("#success2").show();
                setTimeout(function() {
                        $("#success2").fadeOut('slow');
                }, 2000);
        }
});

