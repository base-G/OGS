var pdfCanvas = document.getElementById('pdfpad');
var pdfContext = pdfCanvas.getContext('2d');

var canvas = document.getElementById('sketchpad');
var context = canvas.getContext('2d');

var hiddenCanvas = document.getElementById('tmpCanvas');
var hidden = hiddenCanvas.getContext('2d');

var color = "#0000ff";

var cur = 0;

var colors = [];
var histX = [];
var histY = [];
var histDrag = [];

histX[0] = 0;
histY[0] = 0;
histDrag[0] = 0;

var lastUndo = false;
var undoCount = 0;

var gTestID;
var gClassID;
var gStudentID;
/*******************************************
********************************************/

function updateArrays(val) {
	for (var i = 0; i < val; i++) {
		clickX.pop();
		clickY.pop();
		clickDrag.pop();
	}
}

$('#sketchpad').mousedown(function (e) {
	if (lastUndo) {
		updateArrays(histX[cur+undoCount] - histX[cur]);
		lastUndo = false;
		undoCount = 0;
	}

	cur++;
	histX[cur] = clickX.length;
	histY[cur] = clickY.length;
	histDrag[cur] = clickDrag.length;

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
	redraw();
});

$('#sketchpad').mouseleave(function (e) {
    paint = false;
    redraw();
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
	histX[cur]++;
        histY[cur]++;
        histDrag[cur]++;


    clickX.push(x);
    clickY.push(y);
    clickDrag.push(dragging);
	colors.push(color);
}

function redraw() {
    canvas.width = canvas.width; // Clears the canvas

    context.strokeStyle = color;
    context.lineJoin = "round";
    context.lineWidth = 5;

    for (var i = 0; i < histX[cur]; i++) {
	context.strokeStyle = colors[i];
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

$('#undo').click(function undo() {
	if (cur > 0) {
		cur--;
		lastUndo = true;
		undoCount++;
		redraw();
	}
});

$('#redo').click(function() {
	if (histX[cur + 1] != null) {
		

		cur++;
		redraw();
	}
});

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
	var data = clickX + 'END' + clickY + 'END' + clickDrag + 'END' + colors;

    if (plusMinus == "plus") {
        var pageNext = pageNum + 1;
    } else {
        var pageNext = pageNum - 1;
    }

    var res = "";

    $.ajax({ 
        url: 'php/save.php',
        data: {
            canvas: data,
            page: pageNum,
            next: pageNext,
            _class: gClassID,
	    _test: gTestID,
	    _student: gStudentID,
        },
        type: 'post',
        
        success: function(output) {
                    	res = output;
			empty();
        		arr = res.split('END');

			console.log(arr);

			var values = arr[0].split(',');
			clickX = [];
			clickX = values.slice(1);

			values = arr[1].split(',');
                        clickY = [];
			clickY = values.slice(1);

			values = arr[2].split(',');
                        clickDrag = [];
			clickDrag = values.slice(1);

			values = arr[3].split(',');
			colors = [];
			colors = values.slice(1);

			cur = 0;
			histX[cur] = clickX.length;
			histY[cur] = clickY.length;
			histDrag[cur] = clickDrag.length;

			redraw();
                 },
    });	
}

function saveScores() {
	data = [];
	$(".question").each(function(index) {
		var tmp = $(this).serializeArray();
		data[index] = (this.id) + ":" + tmp[0].value + ":" + tmp[1].value;
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

function resetAnno() {
	clickX = [];
	clickY = [];
	clickDrag = [];

	histX = [];
	histY = [];
	histDrag = [];

	colors= [];
}

$(".testlink").click(function(event) {
	pageNum = 1;
	resetAnno();
	saveScores();

	var info = $(this).parent().attr('id');
	var tmp = info.split(":");
	var test_id = tmp[0];
	var class_id = tmp[1];
	var student_id = $(this).attr('class').split(' ')[1];

	/*
	$.ajax({
        url: 'php/loadCanvas.php',
        data: {
            canvas: data,
            page: pageNum,
            _class: gClassID,
            _test: gTestID,
            _student: gStudentID,
        },
        type: 'post',

        success: function(output) {
                        res = output;
                        empty();
                        arr = res.split('END');

                        var values = arr[0].split(',');
                        clickX = [];
                        clickX = values.slice(0);

                        values = arr[1].split(',');
                        clickY = [];
                        clickY = values.slice(0);

                        values = arr[2].split(',');
                        clickDrag = [];
                        clickDrag = values.slice(0);

                        values = arr[3].split(',');
                        colors = [];
                        colors = values.slice(0);

                        cur = 0;
                        histX[cur] = clickX.length;
                        histY[cur] = clickY.length;
                        histDrag[cur] = clickDrag.length;
                 },
    });
	*/

	gTestID = test_id;
	gClassID = class_id;
	gStudentID = student_id;

	$.ajax({
		url: 'php/questions.php',
		data: {
			_test: test_id,
			_class: class_id,
			_student: student_id
		},
		type: 'post',
		success: function(output) {
			$("#side2").empty();
			var resTmp = output.split("\n");
			var res = resTmp[0].split(" ");
			var res2 = resTmp[1].split(" ");
			var res3 = resTmp[2].split("***");
			for (var i = 0; i < res.length - 1; i++) {
				var tmp = res[i].split(":");
				var tmp2 = res2[i].split(":");

				var q2 = '<form id="' + student_id + ':' + class_id + ':' + test_id + ':' + tmp[0] + '" class="question"><fieldset><legend>Question '+(i+1)+'</legend><div class="input-append"><input class="span2" id="appendedInput" type="text" name="value" value="' + tmp2[1] + '"><span class="add-on">/' + tmp[1] + '</span></div><span class="help-block"></span><textarea name="comments" rows="3">'+ res3[i] +'</textarea></fieldset></form>';
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

	histX = [];
	histY = [];
	histDrag = [];

	colors = [];

    redraw();
}

$("#clear").click(function() { empty(); });

$("#erase").click(function() { color = "#ffffff"; });
$("#black").click(function() { color = "#000000"; });
$("#red").click(function() { color = "#ff0000"; });
$("#green").click(function() { color = "#00ff00"; });
$("#blue").click(function() { color = "#0000ff"; });
