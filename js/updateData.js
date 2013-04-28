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

$("#myform").ajaxForm(function(output) {alert("UPLOAD - THIS WILL LOOK BETTER LATER")});

/*$("#formSub").click(function() {
	alert("in");
	$.ajax({
	type: "POST",
        url: "upload.php",
	data: { hello: "hello" },
        success: function(output) {
		alert("worked");
        },
	});
});*/
