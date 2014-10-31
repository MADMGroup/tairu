var canvas = document.getElementById("canvas"),
    context = canvas.getContext("2d");

var a = [];

var animate;
var started = true;


window.addEventListener('resize', resizeCanvas, false);

function resizeCanvas() {
    canvas.width = 250 * Math.floor(window.innerHeight / 250, 0);
    canvas.height = canvas.width;
    document.getElementById("blockInner").style.width = canvas.width + 'px';

    a[0] = [-180, canvas.width / 12, canvas.height / 12, canvas.width / 2, canvas.width / 2, 0, 1];
    a[1] = [1, 0,0];
    drawRectangle();

}
resizeCanvas();




function drawRectangle() {


    context.save();


    context.beginPath();
    context.clearRect(0, 0, canvas.width, canvas.height);
    context.fillStyle = "rgba(0, 0, 0, " + a[0][6] + ")";

    context.translate(a[0][3], a[0][4]);
    context.rotate(a[0][0] * Math.PI / 180);
    context.fillRect(0, 0, a[0][1], a[0][2]);
    context.closePath();

    context.restore();
}


function moveSquare(dir) {

    if (dir == 0) {

        if (a[0][4] - a[0][2] < 5) {


            if (a[0][0] == 90) {

                a[0][4] += a[0][2];
                a[0][0] = -180;
                a[1][0] = 1;


            } else a[0][0] ++;

        } else {


            if (a[0][0] == 180) {
                a[1][0] = 1;


            } else a[0][0] --;


        }



    }

    if (dir == 1) {

        if (a[0][4] - a[0][2] < 5) {

            if (a[0][0] == 0) {
                a[0][3] += a[0][1];
                a[0][4] += a[0][2];
                a[0][0] = -180;
                a[1][0] = 1;

            } else a[0][0] --;

        } else {


            if (a[0][0] == -90) {
                a[1][0] = 1;
                a[0][3] += a[0][1];
                a[0][0] = -180;
            } else a[0][0] ++;



        }


    }



    if (dir == 2) {


        if (a[0][3] - a[0][1] < 5) {


            if (a[0][0] == 360) {

                a[0][3] += a[0][1];
                a[0][4] += a[0][2];
                a[0][0] = -180;
                a[1][0] = 1;
            } else a[0][0] ++;

        } 
		else 
		{
			if(a[1][2]==1 && a[0][3]  != canvas.width){
				
				 if (a[0][0] == 360) {
                a[0][3] += a[0][1];
				 a[0][4] += a[0][2];
                a[0][0] = -180;
                a[1][0] = 1;

            } else a[0][0] ++;
				
			}
			else
			{
            if (a[0][0] == -270) {
                a[0][4] += a[0][2];
                a[0][0] = -180;
                a[1][0] = 1;

            } else a[0][0] --;
			}

        }


    }



    if (dir == 3) {

        if (a[0][3] - a[0][1] < 5) {


            if (a[0][0] == 270) {

                a[0][3] += a[0][1];
                a[0][0] = -180;
                a[1][0] = 1;
            } else a[0][0] --;

        } 
		else 
		{
			if(a[1][2]==1 && a[0][3]  != canvas.width){
				
	            if (a[0][0] == 270) {
				a[0][3] += a[0][1];
				a[0][0] = -180;
                a[1][0] = 1;
            } else a[0][0] --;
				
			}
			else
			{
            if (a[0][0] == 180) {

                a[0][0] = -180;
                a[1][0] = 1;
            } else a[0][0] ++;
			}

        }



    }

    drawRectangle();

}




function anim(dir) {

    moveSquare(dir);

    if (a[1][0] == 1) window.clearInterval(animate);

}




window.addEventListener('keydown', function(event) {
    switch (event.keyCode) {


        case 37:
            {
                // Left
                if (a[1][0] == 0) return false;
				
				

                if (a[0][3] - a[0][1] > 5) {
                    if (a[0][4] - a[0][2] < 5) {
	
                        a[0][3] -= a[0][1];
                        a[0][4] -= a[0][2];
                        a[0][0] = 0;

                    } else {

						
                        a[0][3] -= a[0][1];
                        a[0][0] = 270;
                    }

					a[1][2]=0;
                    a[1][0] = 0;

                    animate = window.setInterval("anim(0);", 1);
                    a[1][1] = 0;
                }
                break;
            }


        case 39:
            {
                // Right

                if (a[1][0] == 0) return false;
                if (a[0][3] < canvas.width) {

                    if (a[0][4] - a[0][2] < 5) {

                        a[0][4] -= a[0][2];
                        a[0][0] = 90;

                    } else {
                        a[0][0] = -180;

                    }
					a[1][2]=1;
                    a[1][0] = 0;
                    animate = window.setInterval("anim(1);", 1);
                    a[1][1] = 1;
                }
                break;
            }




        case 40:
            { // Down
                if (a[1][0] == 0) return false;
                if (a[0][4] < canvas.height) {
					
					

                    if (a[0][3] - a[0][1] < 5) {
                        a[0][3] -= a[0][1];
                        a[0][0] = 270;
                    } 
					else {
						
						
							if(a[1][2]==1 && a[0][3]  != canvas.width){
								
								a[0][3] -= a[0][1];
                        a[0][0] = 270;
							}
							
							else
							
							{

                        a[0][0] = -180;
						
							}

                    }
					
                    a[1][0] = 0;

                    animate = window.setInterval("anim(2);", 1);
                    a[1][1] = 2;
					
                }
                break;
            }

        case 38:
            { // Up
                if (a[1][0] == 0) return false;

                if (a[0][4] - a[0][2] > 5) {

                    if (a[0][3] - a[0][1] < 5) {
                        a[0][4] -= a[0][2];
                        a[0][3] -= a[0][1];
                        a[0][0] = 360;
                    } else {
						
							if(a[1][2]==1 && a[0][3]  != canvas.width){
								
                       		
                       		 a[0][3] -= a[0][1];
							 a[0][4] -= a[0][2];
								 a[0][0] = 360;
							}
							else
							{

                        a[0][0] = 90;
                        a[0][4] -= a[0][2];
						
							}

                    }
                    a[1][0] = 0; 
                    animate = window.setInterval("anim(3);", 1);
                    a[1][1] = 3;

                }

                break;
            }

    }
}, false);