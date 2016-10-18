<script src="https://code.createjs.com/createjs-2015.11.26.min.js"></script> 
<script src="<?php echo $rootvendor;?>loading-anim.js"></script>
<script type="text/javascript">
	var canvas, stage, exportRoot;
	function inits() {
		canvas = document.getElementById("canvas");
		handleComplete();
	}
	function handleComplete() {
		//This function is always called, irrespective of the content. You can use the variable "stage" after it is created in token create_stage.
		exportRoot = new lib.loadinganim();
		stage = new createjs.Stage(canvas);
		stage.addChild(exportRoot);	
		//Registers the "tick" event listener.
		createjs.Ticker.setFPS(lib.properties.fps);
		createjs.Ticker.addEventListener("tick", stage);	    
		//Code to support hidpi screens and responsive scaling.
		(function(isResp, respDim, isScale, scaleType) {		
			var lastW, lastH, lastS=1;		
			window.addEventListener('resize', resizeCanvas);		
			resizeCanvas();		
			function resizeCanvas() {			
				var w = lib.properties.width, h = lib.properties.height;			
				var iw = window.innerWidth, ih=window.innerHeight;			
				var pRatio = window.devicePixelRatio, xRatio=iw/w, yRatio=ih/h, sRatio=1;			
				if(isResp) {                
					if((respDim=='width'&&lastW==iw) || (respDim=='height'&&lastH==ih)) {                    
						sRatio = lastS;                
					}				
					else if(!isScale) {					
						if(iw<w || ih<h)						
							sRatio = Math.min(xRatio, yRatio);				
					}				
					else if(scaleType==1) {					
						sRatio = Math.min(xRatio, yRatio);				
					}				
					else if(scaleType==2) {					
						sRatio = Math.max(xRatio, yRatio);				
					}			
				}			
				canvas.width = w*pRatio*sRatio;			
				canvas.height = h*pRatio*sRatio;
				canvas.style.width = w*sRatio+'px';			
				canvas.style.height = h*sRatio+'px';
				stage.scaleX = pRatio*sRatio;			
				stage.scaleY = pRatio*sRatio;			
				lastW = iw; lastH = ih; lastS = sRatio;		
			}
		})(true,'both',false,1);	
	}

</script>

<div id='loadingbox' class="loadding-box" >
	<div class="inners" >
		<canvas id="canvas" width="50" height="73" style="display: block; background-color:rgba(0, 0, 0, 0)"></canvas>
		<!-- <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
		   width="40px" height="40px" viewBox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve">
		  <path opacity="0.5" fill="#ffffff" d="M20.201,5.169c-8.254,0-14.946,6.692-14.946,14.946c0,8.255,6.692,14.946,14.946,14.946
		    s14.946-6.691,14.946-14.946C35.146,11.861,28.455,5.169,20.201,5.169z M20.201,31.749c-6.425,0-11.634-5.208-11.634-11.634
		    c0-6.425,5.209-11.634,11.634-11.634c6.425,0,11.633,5.209,11.633,11.634C31.834,26.541,26.626,31.749,20.201,31.749z"/>
		  <path fill="#ffffff" d="M26.013,10.047l1.654-2.866c-2.198-1.272-4.743-2.012-7.466-2.012h0v3.312h0
		    C22.32,8.481,24.301,9.057,26.013,10.047z">
		    <animateTransform attributeType="xml"
		      attributeName="transform"
		      type="rotate"
		      from="0 20 20"
		      to="360 20 20"
		      dur=".5s"
		      repeatCount="indefinite"/>
		    </path>
		  </svg> -->

	</div>	
</div>
<script type="text/javascript">
	inits();
</script>

