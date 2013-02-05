var canvasDiv = document.getElementById('canvasDiv');
canvas = document.createElement('canvas');
canvas.setAttribute('width', 500);
canvas.setAttribute('height', 500);
canvas.setAttribute('id', 'canvas');
canvasDiv.appendChild(canvas);

if (typeof G_vmlCanvasManager != 'undefined') {
    canvas = G_vmlCanvasManager.initElement(canvas);
}

context = canvas.getContext("2d");

// Tracks when the user clicks.
$('#canvas').mousedown(function (e) {
    var mouseX = e.pageX - this.offsetLeft;
    var mouseY = e.pageY - this.offsetTop;

    paint = true;
    addClick(e.pageX - this.offsetLeft, e.pageY - this.offsetTop);
    redraw();
});

// Tracks when the user moves.
$('#canvas').mousemove(function (e) {
    if (paint) {
        addClick(e.pageX - this.offsetLeft, e.pageY - this.offsetTop, true);
        redraw();
    }
});

// Tracks when the user releases.
$('#canvas').mouseup(function (e) {
    paint = false;
});

// Pretty much same as above.
$('#canvas').mouseleave(function (e) {
    paint = false;
});

// Store X, Y, and drag poisitions in an array.
var clickX = new Array();
var clickY = new Array();
var clickDrag = new Array();
var paint;

// Adds the click into the corresponding arrays.
function addClick(x, y, dragging) {
    clickX.push(x);
    clickY.push(y);
    clickDrag.push(dragging);
}

// Draws the canvas.
function redraw() {
    // Clears the canvas
    canvas.width = canvas.width; 

    context.strokeStyle = "#df4b26";
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

// Function to clear the canvas
$("#target").click(function() {
     clickX = new Array();
     clickY = new Array();
     clickDrag = new Array();
     redraw();
});