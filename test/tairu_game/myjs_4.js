var canvas = document.getElementById("canvas"),context = canvas.getContext("2d");
var percentage=0,loaded;
var height=100;

var a = []; a[0] = [-180 , 250, 250, 250, 375 ,0,1,1,2,0];
			a[1] = [495, 370, 320];	
			a[2] = [0,0];




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

	

	
	if (percentage == 100) {
		window.clearInterval(ID);
		}
		
}




function drawText(x,y,scale,text,context)
	  {
		  context.save();	
		context.font = scale + "px " + "LoadFont";
		 context.fillStyle = '#fff';
			context.fillText(text,x,y);
			context.restore();
	  }
	  
	  
	  function drawRectangle(context)
	  {
		  
		  
		context.save();
		
		
		context.beginPath();
		context.clearRect(0,0,canvas.width,canvas.height);
		context.fillStyle = "rgba(0, 0, 0, " + a[0][6] + ")";
		
		context.translate(a[0][3], a[0][4]); 
		context.rotate(a[0][0]*Math.PI/180);
		context.fillRect( 0, 0, a[0][1], a[0][2]);
		context.closePath();

		context.restore();  
	  }
	  
	  
	  function moveSquare(i) {
		  
		  while(a[i][7]<a[i][8] &&   (a[i][0]==-90  || a[i][0]==180  ))
		  {
				if(a[i][9]==1)
				{
				a[i][3]-=a[i][1];
				a[i][0]=270;	
				a[i][7]++;
				}
				else{
				a[i][3]+=a[i][1];
				a[i][0]=-180;	
				a[i][7]++;
				}
		  }
		  
			 drawRectangle(context);
			  if(a[i][9]==1){
				  
				   if(a[i][0] <= 180) a[2][i]=1;
				   else a[i][0]--;
				  
				  
			  }
				 else 
			 {
				if(a[i][0] >= -90) a[2][i]=1;
				 else a[i][0]++;
				
			 }

		  }
		  
		  
		  function resizeText(){
			  
		a[1] = [495, 370, 320];	
		for(var i=0;i < percentage;i++)
		{

				a[1][2]-=250/100;
				a[1][0]+=20/10;
				
		}
		
		if(percentage ==100){ a[2][1]=1;a[1][0]-=15; }
		if(a[0][5]<120)
		drawText(a[1][0],a[1][1],a[1][2],percentage,context);
			
		 }
		  
		  
		  
	  
	  
	  
		function anim() 
		{
				
		
		
		
			
	moveSquare(0);
			
		  
			
	
	if(a[2][0]==1)
	{
		
	resizeText();
	}
	
	
	
	if(a[2][1]==1 ){
					
				a[0][5]++;
				if(a[0][5]>120)
				{
					
				context.clearRect(0,0,canvas.width,canvas.height);
				document.getElementById('start').style.display = "block";
				if(height > 0)
				{	height--;
					document.getElementById('start').style.height = height + '%';
				}
				else window.clearInterval(animate);
				}	
				
	}
	
	

		

		
		
	
 }
		
		
	




	  
	  























var ID = window.setInterval("showprogress();", 100);
var animate = window.setInterval("anim();", 2);

















	

















	









































