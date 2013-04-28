var pdfCanvas = document.getElementById('pdfpad');
var pdfContext = pdfCanvas.getContext('2d');

var canvas = document.getElementById('sketchpad');
var context = canvas.getContext('2d');

var hiddenCanvas = document.getElementById('tmpCanvas');
var hidden = hiddenCanvas.getContext('2d');

/*******************************************
********************************************/

$('#sketchpad').mousedown(function (e) {
    paint = true;
    var pos = findPos(canvas.offsetParent);
    addClick(e.pageX - pos.x, e.pageY - pos.y);
    redraw();
});

$('#sketchpad').mousemove(function (e) {
    if (paint) {
        var pos = findPos(canvas.offsetParent);
        addClick(e.pageX - pos.x, e.pageY - pos.y, true);
        redraw();
    }
});

$('#sketchpad').mouseup(function (e) {
    paint = false;
});

$('#sketchpad').mouseleave(function (e) {
    paint = false;
});

canvas.addEventListener('touchstart', function (e) {
    e.preventDefault();
    var mouseX = e.pageX - this.offsetLeft;
    var mouseY = e.pageY - this.offsetTop;

    paint = true;
    var pos = findPos(canvas.offsetParent);
    addClick(e.targetTouches[0].pageX - pos.x, e.targetTouches[0].pageY - pos.y);
    redraw();
}, false);

canvas.addEventListener('touchmove', function (e) {
    e.preventDefault();
    if (paint) {
        var pos = findPos(canvas.offsetParent);
        addClick(e.targetTouches[0].pageX - pos.x, e.targetTouches[0].pageY - pos.y, true);
        redraw();
    }
}, false);

canvas.addEventListener('touchend', function (e) {
    e.preventDefault();
    paint = false;
}, false);


canvas.addEventListener('touchcancel', function (e) {
    e.preventDefault();
    paint = false;
}, false);

var clickX = [];
var clickY = [];
var clickDrag = [];
var paint;

function addClick(x, y, dragging) {
    clickX.push(x);
    clickY.push(y);
    clickDrag.push(dragging);
}

function redraw() {
    canvas.width = canvas.width; // Clears the canvas

    context.strokeStyle = "#0000ff";
    context.lineJoin = "round";
    context.lineWidth = 5;

    for (var i = 0; i < clickX.length; i++) {
        context.beginPath();
        if (clickDrag[i] && i) {
            context.moveTo(clickX[i - 1], clickY[i - 1]);
        } else {
            context.moveTo(clickX[i] - 1, clickY[i]);
        }
        context.lineTo(clickX[i], clickY[i]);
        context.closePath();
        context.stroke();
    }
}

/*******************************************
********************************************/


var gWidth = 0;
var gHeight = 0;
var gScale = 0;


// Function for window resizing.
var delay = (function(){
  var timer = 0;
  return function(callback, ms){
    clearTimeout (timer);
    timer = setTimeout(callback, ms);
  };
})();

$(window).resize(function() {
    delay(function(){
        renderPage(pageNum);

        //hiddenCanvas.drawImage(canvas, 0, 0);
        canvas.width = pdfCanvas.width;
        canvas.height = pdfCanvas.width;
        context.scale(gScale);    
        //canvas.drawImage(hiddenCanvas, 0, 0);

    }, 100);
});

function findPos(obj) {
	var curleft = 0,
        curtop = 0;
    
	if (obj.offsetParent) {
        	do {
            		curleft += obj.offsetLeft;
            		curtop += obj.offsetTop;
        	} while (obj == obj.offsetParent);
        
		return {
            		x: curleft,
            		y: curtop
        	};
    	}

    	return undefined;
}

function updateAnno() {
    // hiddenCanvas.drawImage(canvas, 0, 0);

    canvas.width = pdfCanvas.width;
    canvas.height = pdfCanvas.width;
    alert(canvas.width + " " + pdfCanvas.width);
    context.scale(gScale);

    // canvas.drawImage(hiddenCanvas, 0, 0)
}

// Setting the PDF.
var url = 'main.pdf';
PDFJS.disableWorker = true;

var pdfDoc = null;
var pageNum = 1;

// Get page info from document, resize canvas accordingly, and render page
function renderPage(num) {
	// Using promise to fetch the page
	pdfDoc.getPage(num).then(function(page) {
        pdfCanvas.width = pdfCanvas.width;
        renderContext = null;

        var ratio = $("#main").width() / 612;
        var viewport = page.getViewport(ratio);
        gScale = ratio;

		pdfCanvas.width = viewport.width;
        pdfCanvas.height = viewport.height;

        gWidth = viewport.width;
        gHeight = viewport.height;		

		// Render PDF page into canvas context
		var renderContext = {
			canvasContext: pdfContext,
			viewport: viewport
		};

		page.render(renderContext);
	});
}



// Run once at the start.
PDFJS.getDocument(url).then(function getPdfHelloWorld(_pdfDoc) {
	pdfDoc = _pdfDoc;
	$(document).ready(function() {
    	renderPage(pageNum);

        canvas.setAttribute('width', gWidth);
        canvas.setAttribute('height', gHeight);
        context.scale(gScale);
        context.lineWidth = 1.0;
        context.strokeStyle = '#0000ff';
        context.lineCap = 'round';
    });
});

var change = 1;

$("#showside").click(function() {
    if (change == 1) {
            $("#side2").css('display', 'block');
            $("#side2").animate({
                    right: '+=50%'
                }, 500, function() {
                    $("#side2").css('right', '0');
            });
        change = 0;
    } else {
        $("#side2").animate({
            right: '-=50%'
        }, 500, function() {
            $("#side2").css('right', '-50%');
            $("#side2").css('display', 'none');
        });
        
        change = 1;
    }
});

$("#next").click(function() {
    if (pageNum >= pdfDoc.numPages) {
        return;
    }

    saveCanvas("plus");
    pageNum++;
    renderPage(pageNum);
});

$("#back").click(function() {
    if (pageNum >= 1) {
        saveCanvas("minus");
        pageNum--;
    }

    renderPage(pageNum);
});

function saveCanvas(plusMinus) {
    var data = canvas.toDataURL();
    var test = "1";

    if (plusMinus == "plus") {
        var pageNext = pageNum + 1;
    } else {
        var pageNext = pageNum - 1;
    }

    empty();
    var res = "";

    var user = $("#user").html();

    $.ajax({ 
        url: 'save.php',
        data: {
            canvas: data,
            page: pageNum,
            next: pageNext,
            test: test
        },
        type: 'post',
        
        success: function(output) {
                    res = output;
			//alert("Hello");
                 },
	error: function() {
		//alert("Hello");
	}
    });
}

function saveScores() {
	data = [];
	$(".question").each(function(index) {
		var tmp = $(this).serializeArray();
		data[index] = (this.id) + ":" + tmp[0].value;
	});

	$.ajax({
		url: 'php/updateQuestions.php',
		data: {info:data},
		type: 'post',
		success: function(output) {
			//alert(output + " DONE");
		}
	});
}

$(".testlink").click(function(event) {
	saveScores();

	var info = $(".testlink").parent().attr('id');
	var tmp = info.split(":");
	var test_id = tmp[0];
	var class_id = tmp[1];
	var student_id = $(this).attr('class').split(' ')[1];

	$.ajax({
		url: 'questions.php',
		data: {
			_test: test_id,
			_class: class_id
		},
		type: 'post',
		success: function(output) {
			$("#side2").empty();
			var res = output.split(" ");
			for (var i = 0; i < res.length - 1; i++) {
				var tmp = res[i].split(":");

				var q2 = '<form id="' + student_id + ':' + class_id + ':' + test_id + ':' + tmp[0] + '" class="question"><fieldset><legend>Question '+(i+1)+'</legend><div class="input-append"><input class="span2" id="appendedInput" type="text" name="value"><span class="add-on">/' + tmp[1] + '</span></div><span class="help-block"></span></fieldset></form>';
				$("#side2").append(q2);	
			}
		}
	});

    	PDFJS.getDocument(event.target.id + "").then(function getPdfHelloWorld(_pdfDoc) {
        	pdfDoc = _pdfDoc;
        	
		$(document).ready(function() {
			pageNum = 1;
            		renderPage(pageNum);

            		canvas.setAttribute('width', gWidth);
            		canvas.setAttribute('height', gHeight);
            		context.scale(gScale);
            		context.lineWidth = 1.0;
            		context.strokeStyle = '#0000ff';
            		context.lineCap = 'round';
        	});
    	});
});

function empty() {
    clickX.length = 0;
    clickY.length = 0;
    clickDrag.length = 0;

    redraw();
}
