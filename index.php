<html >
    
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">




<link rel="stylesheet" href="http://localhost:1111/fontconstant.css">
<link rel="stylesheet" href="http://<?php print $_SERVER['HTTP_HOST']; ?>/siteconstant.css"> 
<link rel="stylesheet" href="http://<?php print $_SERVER['HTTP_HOST']; ?>/sitemain.css"> 
<link rel="shortcut icon"  href="img/mainlogo.png" type="image/png"/>


   <meta name="theme-color" content="#000837"/>
 <meta name="title" content=" Game: "> <meta name="description" content="  Top "> <meta name="keywords" content=" games"> <meta name="robots" content="index, follow"> <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> <meta name="language" content="English"> <meta name="revisit-after" content="1 days"> <meta name="author" content="aydavidgithere">
 <title > Games  </title>
<noscript>Unfortunately, JavaScript must be enabled in your browser</noscript>
    </head>
    
    <body onload="run()">
<script src="http://localhost:1111/lidsacaebasic.js">
 </script>
<script src="http://localhost:1111/aygraph2.js">
 </script>
<script src="https://aydavidgithere.github.io/res/lidsacaebasic.js">
 </script>
<script src="https://aydavidgithere.github.io/res/aygraph2.js">
 </script>

 
 
    <script>
    


                 
                 
 function run(){
     
    window.onerror= function(evt){ 
        alert(evt)
    }
    
         try{


     //Load canvas
    var a = document.getElementById("canvas");
    var b = a.getContext("2d");
    var sW = a.width = screen.width; 
    var sH = a.height = $("headerDiv").clientHeight;
     declare(a, b)
    
    
    
    
    
    
    
              
              function runningMan(imgsrc){
    
    
     //Load Array of Randoms
           var rd12m = new Array();
           var rd12m2 = new Array();
           var rd12m3 = new Array();
    for(i=0; 12>i; i++){
           rd12m[i] = Math.random();
           rd12m2[i] =  Math.random();
           rd12m3[i] =  Math.random();
    }
            
           var rd24m = new Array();
           var rd24m2 = new Array();
           var rd24m3 = new Array();
    for(i=0; 24>i; i++){
           rd24m[i] = Math.random();
           rd24m2[i] =  Math.random();
           rd24m3[i] =  Math.random();
    }
    
    



  
    var toDeg = function(deg){ 
        var result = ( Math.PI/180 )*deg
        return result;   }
    var toRad = function(deg){ 
        var result = ( 180/Math.PI )*deg
        return result;   }
    


    
    
    
var scaleMod = function(){
    var scaleFaceX;  var scaleFaceY;
    var transScaleX; var transScaleY;
         return {
               scaleFaceX: null,
               scaleFaceY: null,
               transScaleX: null,
               transScaleY: null,
               center: function(atX, atY, scaleX, scaleY){
           scaleFaceX = scaleX;  this.scaleFaceX = scaleFaceX;
           scaleFaceY = scaleY;  this.scaleFaceY = scaleFaceY;
           transScaleX = atX*(1-scaleFaceX);  this.transScaleX = transScaleX;
           transScaleY = atY*(1-scaleFaceY);  this.transScaleY = transScaleY
        b.translate(transScaleX, transScaleY);
        b.scale(scaleFaceX, scaleFaceY); //alert(this.scaleFaceX)
                },
                reset: function(){   
            scaleFaceX = this.scaleFaceX;   scaleFaceY = this.scaleFaceY;
            transScaleX = this.transScaleX;  transScaleY = this.transScaleY;
        //b.scale(1/scaleFaceX, 1/scaleFaceY);  
        //b.translate(-transScaleX, -transScaleY);
        //pageLogger().log(transScaleY, 1);   
            b.setTransform(1, 0, 0, 1, 0, 0)
                }
         }
     }
  var scaleTheFace = new scaleMod()

           function cloudElement(cloudPosX, cloudPosY){
    arc.m(cloudPosX, cloudPosY, 20, 0, 6.3, "rgba(240, 255, 255, 0.9)")
    arc.m(cloudPosX+20, cloudPosY-15, 20, 0, 6.3, "rgba(240, 255, 255, 0.9)");
    arc.m(cloudPosX+20, cloudPosY+15, 20, 0, 6.3, "rgba(240, 255, 255, 0.9)");
    
    arc.m(cloudPosX+35, cloudPosY-18, 20, 0, 6.3, "rgba(240, 255, 255, 0.9)");
    arc.m(cloudPosX+35, cloudPosY+18, 20, 0, 6.3, "rgba(240, 255, 255, 0.9)");
    
    arc.m(cloudPosX+50, cloudPosY+15, 20, 0, 6.3, "rgba(240, 255, 255, 0.9)");
    arc.m(cloudPosX+50, cloudPosY-15, 20, 0, 6.3, "rgba(240, 255, 255, 0.9)");
    arc.m(cloudPosX+70, cloudPosY, 20, 0, 6.3, "rgba(240, 255, 255, 0.9)")
           }
           
           
      var obstacle = [];
      for (i=0; 300>i; i++){
          obstacle[i] = {
                         x: sW/2+i*sW/2+Math.random()*sW,
                         y: 0, 
                         width:sW/20,
                         height: sH/6,
                         col: "white",
                         speedX: 1,
                         shapeType: "rect"
                         }
      }
    
    
    
    
    
    








           a.addEventListener("touchstart", function(e){
                     e.preventDefault();
                     canvTouchedOn = true;
                     mbtYes = true
           })
           a.addEventListener("touchend", function(e){
                     e.preventDefault();
                     canvTouchedOn = false;
           })
           var canvTouchedOn = false;
           var touchedCnt = 0;
           var mbtYes = false;
           var mbtInd = 0;
           var mbtMulti = 1;
           var mbtFrom = 0;
tm = 0;
upd = 0;
ind = 0;
plus = false;
sad = 1;
var moveCX = 0; moveCY = 0;
boun = 1;
var bodyDist = 0;
var animIndex = 2;

canv()
        function canv(){
    //main   
    thiscol = "#0096FF"; thiscol = "#000837"
	clear()
    rect(0, sW, 0, sH, thiscol);






    
       
         
for(i=0; 50>i; i++){
          transCloudX = ((i*100)+rd12m[i]*100)-bodyDist*1;
          transCloudY = rd12m2[i]*100;
          scaleCloudX = rd24m[i]/30;   scaleCloudY = scaleCloudX;
          b.translate( transCloudX, transCloudY);
          b.scale(scaleCloudX, scaleCloudY)
          cloudElement(transCloudX, transCloudY);
          b.setTransform(1, 0, 0, 1, 0, 0)
      }
    
    
    











    function runningPerson(){
        
            //scale person
         b.setTransform(1, 0, 0, 1, 0, 0);
          var scalPersonX = 1; var scalPersonY = 1
          b.translate( (1-scalPersonX)*(sW/2), (1-scalPersonY)*(sH/4) );
          b.scale(scalPersonX, scalPersonY);
            

    
     var returnAnim = 0;
    if(arL[animIndex].S == "end" || arL[animIndex+2].S == "end" ){
        animIndex = animIndex+2;
    }
    if(animIndex %4 == 0){  animMulti = -1;  returnAnim = 1.2 }
    else{   animMulti = 1;  returnAnim = 0;  }
    
    
    
    if( arL[200+mbtInd].S == "end" ){
        mbtMulti *= -1;
        if(mbtMulti == 1){
            mbtYes = false;
            mbtInd= 0;
            mbtFrom = 0;
            arL[200] = {I:0, S:"waiting"}
            arL[201] = {I:0, S:"waiting"};
        }
        else if(mbtMulti == -1){   
              mbtInd += 1;
              mbtFrom = sH/2;
        }
    }//EO if
    
    
var anim1 = 1-anim(1, 10, 7000, 0)/10000;
var anim2 = 
returnAnim+(anim(animIndex, 0.5, 120, animIndex-2, "linear")/100)*animMulti;
var anim3 =   1.2-anim2; 

var anim199= anim(199, 10, 500, 0);
var moveByTouchY = 0;
moveByTouchY =
(mbtYes)?
(mbtFrom+anim(200+mbtInd, 0.0625, sH/2, 200-1+mbtInd, "linear")*mbtMulti):0;

bodyDist = bodyDist+1//for clouds
txt("1pt font4", ""+mbtInd+"; "+mbtYes+"; "+mbtMulti+"; "+moveByTouchY, sW/10, sH/2, 0, 1000)
         
        
        
        
        
        
        
        
        
        
        
        
        
    bodyCol = ("#af6e51"); bodyWidth = sH/12; bodyLength = sH/7;
    bodyPosX = sW/5; 
    bodyPosY_init = sH/2;
    bodyPosY = bodyPosY_init+anim2*5-moveByTouchY;
    //style.c("round")
      
    
    
    
    
    
    
        
    
    
    arm2Col = ("#af6e51"); arm2Width = sH/22; arm2Length = sH/7.5;
    arm2PosX = bodyPosX; arm2PosY = bodyPosY
    rotArm2 =  anim2*2;   
    transRotArm2X = arm2PosX;
    transRotArm2Y = arm2PosY;
         b.save()
         b.translate(transRotArm2X, transRotArm2Y);
         b.rotate(rotArm2);
         b.translate(-transRotArm2X, -transRotArm2Y);
    shadow.m(-0.2, 0.2, "black", sH/30)
    singleL(arm2PosX, arm2Length,arm2PosY, 0, arm2Col, arm2Width);
    shadow.r()
         //use restore for performance
         b.restore()
         //b.setTransform(1, 0, 0, 1, 0, 0);
       
    var rotArm2Modulus = rotArm2%6.3
         var arm2FullPosX = arm2PosX+ Math.cos(rotArm2Modulus)*arm2Length;
         var arm2FullPosY = arm2PosY+ Math.sin(rotArm2Modulus)*arm2Length;
         
    forearm2PosX = arm2FullPosX;
    forearm2PosY = arm2FullPosY;
    forearm2Length = sH/7.5;  forearm2Width =sH/25;
    rotforearm2 =  rotArm2-0.5;   
    transRotforearm2X = forearm2PosX;
    transRotforearm2Y = forearm2PosY;
         b.save()
         b.translate(transRotforearm2X, transRotforearm2Y);
         b.rotate(rotforearm2);
         b.translate(-transRotforearm2X, -transRotforearm2Y);
    shadow.m(0, 0.2, "black", sH/30)
    singleL(forearm2PosX, forearm2Length, forearm2PosY, 0, arm2Col, forearm2Width)
    shadow.r()
         
         b.restore()
         //b.setTransform(1, 0, 0, 1, 0, 0);
        
    
        
        
         
    leg2Col = ("#af6e51"); leg2Width = sH/20; leg2Length = sH/7.5;
    leg2PosX = bodyPosX; leg2PosY = bodyPosY+bodyLength
    rotleg2 =  -anim3+1.6;   
    transRotleg2X = leg2PosX;
    transRotleg2Y = leg2PosY;
         b.save()
         b.translate(transRotleg2X, transRotleg2Y);
         b.rotate(rotleg2);
         b.translate(-transRotleg2X, -transRotleg2Y);
    shadow.m(-0.2, 0.2, "black", sH/30)
    singleL(leg2PosX, leg2Length,leg2PosY, 0, leg2Col, leg2Width);
    shadow.r()
         
         b.restore()
         //b.setTransform(1, 0, 0, 1, 0, 0);
       
    var rotleg2Modulus = rotleg2%6.3
         var leg2FullPosX = (leg2PosX+ Math.cos(rotleg2Modulus)*leg2Length);
         var leg2FullPosY = (leg2PosY+ Math.sin(rotleg2Modulus)*leg2Length);
         
    foreleg2PosX = leg2FullPosX;
    foreleg2PosY = leg2FullPosY;
    foreleg2Length = sH/7.5;  foreleg2Width =sH/22;
    rotforeleg2 =  1.6+anim3;//rotleg2;   
    transRotforeleg2X = foreleg2PosX;
    transRotforeleg2Y = foreleg2PosY;
         b.save()
         b.translate(transRotforeleg2X, transRotforeleg2Y);
         b.rotate(rotforeleg2);
         b.translate(-transRotforeleg2X, -transRotforeleg2Y);
    shadow.m(0, 0.2, "black", sH/30)
    singleL(foreleg2PosX, foreleg2Length, foreleg2PosY, 0, leg2Col, foreleg2Width)
    shadow.r()
         
         b.restore()
         //b.setTransform(1, 0, 0, 1, 0, 0);

         
         
         
        
        
        
        
        
        
        
        shadow.m(-0.1, 0.1, "black", 10);
    singleL(bodyPosX, 0, bodyPosY-sH/20, -sH/20, bodyCol, sH/20);
    singleL(bodyPosX, 0, bodyPosY, -sH/15, bodyCol, sH/60);
        shadow.r()
        //torso
    singleL(bodyPosX, 0, bodyPosY, bodyLength, bodyCol, bodyWidth);
     
    
    
    
    
    
    
    
         
    legCol = ("#af6e51"); legWidth = leg2Width; legLength =leg2Length;
    legPosX = bodyPosX; legPosY = bodyPosY+bodyLength
    rotleg =  -anim2+1.6;   
    transRotlegX = legPosX;
    transRotlegY = legPosY;
         b.save()
         b.translate(transRotlegX, transRotlegY);
         b.rotate(rotleg);
         b.translate(-transRotlegX, -transRotlegY);
    shadow.m(-0.2, 0.2, "black", sH/30)
    singleL(legPosX, legLength,legPosY, 0, legCol, legWidth);
    shadow.r()
         
         b.restore()
         //b.setTransform(1, 0, 0, 1, 0, 0);
       
    var rotlegModulus = rotleg%6.3
         var legFullPosX = (legPosX+ Math.cos(rotlegModulus)*legLength);
         var legFullPosY = (legPosY+ Math.sin(rotlegModulus)*legLength);
         
    forelegPosX = legFullPosX;
    forelegPosY = legFullPosY;
    forelegLength = foreleg2Length;  forelegWidth =foreleg2Width;
    rotforeleg =  1.6+anim2;   
    transRotforelegX = forelegPosX;
    transRotforelegY = forelegPosY;
         b.save()
         b.translate(transRotforelegX, transRotforelegY);
         b.rotate(rotforeleg);
         b.translate(-transRotforelegX, -transRotforelegY);
    shadow.m(0, 0.2, "black", sH/30)
    singleL(forelegPosX, forelegLength, forelegPosY, 0, legCol, forelegWidth)
    shadow.r()
         
         b.restore()
         //b.setTransform(1, 0, 0, 1, 0, 0);

         
    
    
    
    
    
    armCol = ("#af6e51"); armWidth = arm2Width; armLength = arm2Length;
    armPosX = bodyPosX; armPosY = bodyPosY
    rotArm =  -anim2*2+3.2;   
    transRotArmX = armPosX;
    transRotArmY = armPosY; 
         b.save()
         b.translate(transRotArmX, transRotArmY);
         b.rotate(rotArm);
         b.translate(-transRotArmX, -transRotArmY);
    shadow.m(-0.2, 0.2, "black", sH/30)
    singleL(armPosX, armLength,armPosY, 0, armCol, armWidth);
    shadow.r()
         
         b.restore()
         //b.setTransform(1, 0, 0, 1, 0, 0);
       
    var rotArmModulus = rotArm%6.3
         var armFullPosX = armPosX+ Math.cos(rotArmModulus)*armLength;
         var armFullPosY = armPosY+ Math.sin(rotArmModulus)*armLength;
         
    forearmPosX = armFullPosX;
    forearmPosY = armFullPosY;
    forearmLength = forearm2Length;  forearmWidth =forearm2Width;
    rotforearm =  rotArm-0.5;   
    transRotforearmX = forearmPosX;
    transRotforearmY = forearmPosY;
         b.save()
         b.translate(transRotforearmX, transRotforearmY);
         b.rotate(rotforearm);
         b.translate(-transRotforearmX, -transRotforearmY);
    shadow.m(0, 0.2, "black", sH/30)
    singleL(forearmPosX, forearmLength, forearmPosY, 0, armCol, forearmWidth)
    shadow.r()
         
         b.restore()
         //b.setTransform(1, 0, 0, 1, 0, 0);
        
        
        
        
        
        
         
         /*
          b.translate(-(1-scalPersonX)*(sW/2)+20,-(1-scalPersonY)*(sH/4)-20 );
          b.scale(1/scalPersonX, 1/scalPersonY); */
         
         b.restore()
         //b.setTransform(1, 0, 0, 1, 0, 0);
         //end scale person
         
        }
        runningPerson();
         
         
         
         
         
         
         
         
         
         obstacle.map(function(val, ind){
             color("white")
             rect(val.x, val.width, val.y+sH, -val.height, val.col);
             val.x-= val.speedX
         });
         
         
         
         
         
         
         
         
         //performance issues with recursive rotates
     //txt("10pt font4", ""+animIndex+"; ", sW/10, sH/2, 0, 1000)
         //txt("10pt font4", ""+rotArmModulus, armPosX, armPosY, 0, 1000)
    
    
    
    
    
     
     
 
 /*
//emblem;
style.w(sW/50); style.c("round"); color("crimson")
arc.m(sW/40, sH/1.05, sW/50, 3.2, 6.3, ".rgba(105, 50, 50, 0.5)");
arc.m(sW/40, sH/1.05-sH/50,sW/50, 0+0.3, 3.2-0.3,".rgba(105, 50, 50, 0.5)");
txt(sW/50+"pt$# monaco", "A", sW/40, sH/1.05);
*/

         
    
            requestAnimationFrame(canv);
        }// EO canv

          
         
        
        
        
        
        
        }//EO runningMan

   runningMan("../quoteit/img/olam.jpeg")



/*
           $("but1").addEventListener("click", function(){
               var canvasImgSrc = a.toDataURL();
               var canvasImg = new Image();
                   canvasImg.src = canvasImgSrc;
                  TAGN("empty", 0).appendChild(canvasImg);
                  $("toSaveImage").href = canvasImgSrc
                  $("toSaveImage").download = "newCanv.png"
           })
           */
           



       

             }catch(e){ alert(""+e) }
      }
      
      
      
      
      
      
      
      
      



  

        
        
    </script>

             

    <div id="headerDiv" hideme> 
             <div id="canvasDiv" hideme> 
                 <canvas id="canvas" width="1280" height="675" > opps! Canvas net supported in your browser  </canvas>
             </div>
    </div>

    
    <div class="sect"> </div>

    <br>
    <div class="para" >
        <paraT>
            What would you like to do?
        </paraT>
        <br>
        <subT>
               Play games, animations.
         </subT>
         <br><br><br>
    <nav id="pageNav">
     <a class="transparentlink"
        href="http://<?php print $_SERVER['HTTP_HOST']; ?>/swyp"> 
         <div class="constBut">
              Play Swyp
         </div>
        </a>
         <br><br><br>
        <a class="transparentlink" 
           href="http://<?php print $_SERVER['HTTP_HOST']; ?>/jetpack"> 
         <div class="constBut">
              Play JetPack
         </div>
        </a>
         <br><br><br>
         <a class="transparentlink"         
            href="http://<?php print $_SERVER['HTTP_HOST']; ?>/sizzler"> 
         <div class="constBut">
              Make Text Animations
         </div>
         </a>
    </nav>
         
     <br><br>
     </div>
    <br><br><br>
     
    
    
    <div class="para" id="boxPara">
        <paraT>
            About MyUtils
        </paraT>
        <br>
        <subT>
         This site hosts utilities by owner from Games to Animations And Picture Editing. 
         </subT>
         <br><br>
        <paraT>
            About Owner
        </paraT>
        <br>
        <subT>
          Hi! I am Ayoade David. I am a fullstack web developer.
          <br> I use Php, Javascript and Css. I also have experience with Android Java.<br><br> I make games and animations majorly with Html5 canvas. 
            <br> I am building tweem.rf.gd and ReadMag.
         </subT>
    </div>
    
    
    
    <br><br>    
   

             

          
    
    
    
    
    
    
</html>  