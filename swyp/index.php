<?php
 header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
 header("Expires: " . gmdate("D, d M Y H:i:s") . " GMT"); 
 header("Cache-Control: no-cache, must-revalidate"); 
 header("Pragma: no-cache"); 
?>
<html >
    
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">


<link rel="stylesheet" href="http://localhost:1111/fontconstant.css">
<link rel="stylesheet" href="http://<?php print $_SERVER['HTTP_HOST']; ?>/siteconstant.css"> 
<link rel="stylesheet" href="swyp.css">
<link rel="shortcut icon"  href="img/mainlogo.png" />


   <meta name="theme-color" content="#000837"/>
 <meta name="title" content=" Swyp"> <meta name="description" content="  design "> <meta name="keywords" content=" erotica, sci-fi, fantasy, relationship, advices, stories, read, write"> <meta name="robots" content="index, follow"> <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> <meta name="language" content="English"> <meta name="revisit-after" content="1 days"> <meta name="author" content="aydavidgithere">
 <title > swyp  </title>
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
 <script src="swypMain.js"></script>
 
 
 
    <script>
    

       function is$Between(val, lim0, lim1){
           //destructuring assignment //check which is grrater
            [lim0, lim1] =  ( (lim1<lim0)?([lim1, lim0]):[lim0, lim1] )
            if(val>lim0 && val<lim1){ return true;  }
            else{ return false;}
       }
       function retCloser(val, lim0, lim1, gap){
           //destructuring assignment //check which is grrater
            [lim0, lim1] =  ( (lim1<lim0)?([lim1, lim0]):[lim0, lim1] )
            if(val>lim0 && val<lim0+gap){ return lim0;  }
            if(val>lim1-gap && val<lim1){ return lim1;  }
       }
       
       

       
       
       
       
       
      var possletts 
      =//"ABCDEFGHIJKLMNOPQRSTUVWXYZ"+
      //""
      //+"13579"
      //+"24680"
      ""
      +"33366"
      +"93363"
      function pickRand(type){
          var sV = 0;  var lim = possletts.length;
          if( Math.floor(Math.random()*3)%3 == 0 ){ 
              sV = 5
              lim = possletts.length-sV;
          }
          //increase occurence of numbers at random
          
          if(type == "even" ){
              sV = 5; 
              lim = possletts.length-sV;
          }
          if(type == "odd" ){
              lim = 5; sV = 0; 
          }
          if(type === "any"){
              
          }
          
          var val =
          possletts[ Math.floor(Math.random()*lim)+sV];
          
          
          return val;
      }
      function populateArr(arr, startType, sameType){
            arr.map(function(val, ind){
                arr[ind] = pickRand(startType);
                if(!sameType){
                   if( ind!= 0){ 
        if( arr[ind-1]%2 !=0 ){
            arr[ind] = pickRand("even"); 
        }
        if( arr[ind-1]%2 ==0 ){
            arr[ind] = pickRand("odd"); 
        }        
                }
                   }//EO if
                   
                   
                   
          }); //EO map
          return arr;
      }//EO populateArr
      
      
      
      
      
      
      
      
      
      
      
      
       
function run(){
         try{
    swypMain();
             }catch(e){ alert(""+e) }
}//EO run
      
      
      
      
      
      
      
      
      



  

        
        
    </script>

    
    
    
    
    
    
<div id="boxContain">
 
    <div id="containAll" class="rows" >
        <div class="els" row="" col="" >1</div>
        <div class="els" row="" col="" >2</div>
        <div class="els" row="" col="" >3</div>
        <div class="els" row="" col="" >4</div>
        <div class="els" row="" col="" >3</div>
        <div class="els" row="" col="" >4</div>
        <div class="els" row="" col="" >5</div>
        <div class="els" row="" col="" >6</div>
        <div class="els" row="" col="" >4</div>
        <div class="els" row="" col="" >5</div>
        <div class="els" row="" col="" >6</div>
        <div class="els" row="" col="" >7</div>
        <div class="els" row="" col="" >4</div>
        <div class="els" row="" col="" >5</div>
        <div class="els" row="" col="" >6</div>
        <div class="els" row="" col="" >7</div>
        <div class="els" row="" col="" >6</div>
        <div class="els" row="" col="" >7</div>
        <div class="els" row="" col="" >4</div>
        <div class="els" row="" col="" >5</div>
        <div class="els" row="" col="" >6</div>
        <div class="els" row="" col="" >7</div>
        <div class="els" row="" col="" >7</div>
        <div class="els" row="" col="" >4</div>
        <div class="els" row="" col="" >5</div>
        <div class="els" row="" col="" >6</div>
        <div class="els" row="" col="" >7</div>
    </div>  
     <linker> </linker>
</div>
    
    <div id="logger"></div>
    <div id="logg" class="logg"></div>
    
    </body>
    
    
    
    
</html>  
 