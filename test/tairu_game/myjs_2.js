
var canvas = document.getElementById("canvas"),
    context = canvas.getContext("2d");
	var percentage=0;
	var loaded,prog,fl=0;
	


function showprogress() {


	if (document.images.length == 0) {
	return false;
	}	


	loaded = 0;
	for (var i=0; i<document.images.length; i++) {
		if (document.images[i].complete) {
		loaded++;
		}
	}


		percentage = Math.round(100 * loaded / document.images.length);
	
	if(percentage>25 && fl==0){
		drawRectangle(0,139, context);
		fl++;
	}
	
	if(percentage>50 && fl==1){
		drawRectangle(125,139, context);
		drawText(150,265,"tairu",context);
		fl++;
	}
	
	if(percentage>75 && fl==2){
		drawRectangle(125,0, context);
		fl++;
	}
	
	if(percentage>99 && fl==3){
		drawRectangle(0,0, context);

		fl++;
	}
	document.getElementById('loading_text').innerHTML = 'Loading ' + percentage + '%';
	
	  

	
	/*document.getElementById("progress").innerHTML = percentage + "% loaded";*/
	if (percentage == 100) {
		window.clearInterval(ID);
		}
}
var ID = window.setInterval("showprogress();", 10);
	  
	  

      function drawRectangle(x,y, context) {
        context.beginPath();
        context.rect(x, y, 125, 139);
        context.fillStyle = '#000';
        context.fill();
      }
	  
	  function drawText(x,y,text,context)
	  {
		 context.font="45px Segoe UI";
		 context.fillStyle = '#fff';
			context.fillText(text,x,y);
			
	  }







































