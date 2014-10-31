var canvas = document.getElementById("canvas"),context = canvas.getContext("2d");
var percentage=0,loaded,stage=0;

var a = [];
a[0] = [90 , 125, 125, 125 , 375 , 0];
a[1] = [90 , 125, 125, 125 , 375 , 0];
a[2] = [90 , 125, 125, 125 , 250 , 0];
a[3] = [0 , 125, 125, 375 , 250 , 0];
a[4] = [0,0,0,0];







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
		
	/*
	if(percentage>50 &&  stage==1){
		
		stage++;
	}
	
	if(percentage>75 && fl==2){
		drawRectangle(125,0, context);
		fl++;
	}
	
	if(percentage>99 && fl==3){
		drawRectangle(0,0, context);

		fl++;
	}*/
	document.getElementById('loading_text').innerHTML = 'Loading ' + percentage + '%';
	
	  

	
	if (percentage == 100) {
		window.clearInterval(ID);
		}
		
	  

	  
	  		

		
}

		  function drawText(x,y,text,context)
	  {
		 context.font="45px Segoe UI";
		 context.fillStyle = '#fff';
			context.fillText(text,x,y);
			
	  }
		function anim(context) 
		{
			
					
		context.save();
				
	
	if(percentage>25)
	{
		context.beginPath();
		context.clearRect(0,0,canvas.width,canvas.height);
		
		context.fillStyle = '#000';
		
		context.translate(a[0][3], a[0][4]); 
		context.rotate(-(90+a[0][0])*Math.PI/180);
		context.fillRect( 0, 0, a[0][1], a[0][2]);
		
		
		if(a[0][0] <= 0  && a[0][5] == 0) 
		
		{
			
			a[0][3]+=125;
			a[0][1]=125;
			a[0][2]=125;
			
			a[0][0]=90;	
			a[0][5]=1;
			
		}
		
		
		
		if(a[0][0] <= 0) a[4][0]=1;
		else a[0][0]--;
	}

		
		context.restore();
		context.save();
		
		
	if(percentage>50 && a[4][0]==1)
		{
		
		context.translate(a[1][3], a[1][4]); 
		context.rotate(-(90+a[1][0])*Math.PI/180);
		context.fillRect( 0, 0, a[1][1], a[1][2]);
		
		
		
		if(a[1][0] <= 0) a[4][1]=1;
		else a[1][0]--;
			
			
		}
		
		context.restore();
		context.save();
			
		if(percentage>75 && a[4][1]==1)
		{
	
				
		
		context.translate(a[2][3], a[2][4]); 
		context.rotate(a[2][0]*Math.PI/180);
		context.fillRect( 0, 0, a[2][1], a[2][2]);
		
		
		
		if(a[2][0] >= 270) a[4][2]=1;
		else a[2][0]++;
		
		}
		
		
		context.restore();
		context.save();
		
		
		drawText(275,365,"tairu",context);
		
		context.restore();
		context.save();
		
			
		if(percentage>90 && a[4][2]==1)
		{
	
	
		
		context.translate(a[3][3], a[3][4]); 
		context.rotate(a[3][0]*Math.PI/180);
		context.fillRect( 0, 0, a[3][1], a[3][2]);
		
		
		
		if(a[3][0] <= -180) a[4][3]=1;
		else a[3][0]--;
		}
		

		context.restore();
		
		
		
		
		//if(a[4][0] == 1 && a[4][1] == 1 && a[4][2] == 1 && a[4][3] == 1 ) clearInterval(animate);
		
		
	
        }
		
		
	




	  
	  























var ID = window.setInterval("showprogress();", 100);
var animate = window.setInterval("anim(context);", 5);

















	

















	









































