function updateTests(value, user) {
    $('#tests')
    .find('option')
    .remove()
    .end()
    .append('<option>Select Test</option>')
    ;

	var _class = value;
	var _user = user;

	var res = "";

	$.ajax({ 
        url: 'php/loadTests.php',
        data: {
            _class: _class,
            _user: _user
        },
        type: 'post',
        
        success: function(output) {
                    var str = output.split(" ");

                    for (var i = 0; i < str.length - 1; i++) {
			$("#tests").append('<option>' + str[i] + '</option>');
		}
        }
    });
}

function updateTests2(value, user) {
	$("#results").empty();

    $('#tests')
    .find('option')
    .remove()
    .end()
    .append('<option>Select Test</option>')
    ;

        var _class = value;
        var _user = user;

        var res = "";

        $.ajax({
        url: 'php/loadTests.php',
        data: {
            _class: _class,
            _user: _user
        },
        type: 'post',

        success: function(output) {
                    var str = output.split(" ");

                    for (var i = 0; i < str.length - 1; i++) {
                        $("#tests").append('<option>' + str[i] + '</option>');
                }
        }
    });
}


$("#formSub").click(function() {
	$("#shield").fadeIn(1000);
});

$("#myform").ajaxForm(function(output) {
	$("#shield").fadeOut(1000);
});


// RESULTS FUNCTIONS

$("#resultsForm").ajaxForm(function(output) {
	$("#results").append(output);
});
