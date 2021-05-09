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
<link rel="stylesheet" href="swyp2.css">
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
 </script>
 
 
 
    <script>
    


                 
                 
 function run(){
         try{
     
     
      var possletts 
      =//"ABCDEFGHIJKLMNOPQRSTUVWXYZ"+
      ""
      +"abcdefghijklmnopqrstuvwxyz"
      //+"**************************"
      //+"                          "
      +"0123456789"
      +"2468";
      function pickRand(type){
          var sV = 0;  var lim = possletts.length;
          if( Math.floor(Math.random()*3)%3 == 0 ){ 
              sV = 26
              lim = possletts.length-sV;
          }
          //increase occurence of numbers at random
          
          if(type == "number" ){
              sV = 26; 
              lim = possletts.length-sV;
          }
          if(type == "letter" ){
              lim = 26; sV = 0; 
          }
          if(type === "any"){
              
          }
          
          var val =
          possletts[ Math.floor(Math.random()*lim)+sV];
          
          
          return val;
      }
      function populateArr(arr, startType){
          arr.map(function(val, ind){
                   arr[ind] = pickRand(startType);
                   if( ind!= 0){ 
        if( !isNaN(arr[ind-1]) ){
            arr[ind] = pickRand("letter");
        }
        if( isNaN(arr[ind-1]) ){
            arr[ind] = pickRand("number");
        }
                   }//EO if
                   
                   
                   
          }); //EO map
          return arr;
      }
      
      
      var matAll = [];
      var matRow1 = ["a", "D", 14, "k"];
      var matRow2 = [ 4, "h", 10, "s"];
      var matRow3 = ["g", 34, "y", 30];
      var matRow4 = [8, 12, "y", 30];
      matRow1 =populateArr(matRow1, "any");
      matRow2 =populateArr(matRow2, isNaN(matRow1[0])?"number":"letter" );
      matRow3 =populateArr(matRow3, isNaN(matRow2[0])?"number":"letter" );
      matRow4 =populateArr(matRow4, isNaN(matRow3[0])?"number":"letter" );
      matAll[0] = matRow1;
      matAll[1] = matRow2;
      matAll[2] = matRow3;
      matAll[3] = matRow4;
      
      
      
      
      
      
      
      //attempt to use swiper
      var elemTouchStart;
      var elemTouchMove;
      $("boxContain").ontouchstart = function(e){
            e.preventDefault()
            elemTouchStart = e.target;
      }
      $("boxContain").ontouchmove = function(e){
           e.preventDefault()
           elemTouchMove = e.target;
           elemTouchMove = 
           document.elementFromPoint(e.touches[0].pageX,e.touches[0].pageY);
           var dots = document.createElement("div"); 
           dots.setAttribute("class", "dots");
           TAGN("body", 0).append(dots);
           //dots.style = "top: "+(e.touches[0].pageY)+"px; "+
                        "left: "+(e.touches[0].pageX)+"px; ";
             
           //$("logger").innerHTML= e.touches[0].pageY
      }
      $("boxContain").ontouchend = function(e){
          e.preventDefault()
          //$("logger").innerHTML= elemTouchStart.getAttribute("col")+"; "+elemTouchMove.getAttribute("col");
           elemTouchStart.click()
           elemTouchMove.click();
           getAllElem( CLS("dots", "class"), function(dotAt, dotInd){
               document.removeChildElement(dotAt);
           })
      }
      
      
      var clickedPos = [];
      var clickedEl = [];
      var bCol = "black"
      var presentV = [];

      getAllElem(CLS("els", "class"), function(elsAt, elsInd){
          //init
          var elsRow = elsAt.getAttribute("row");
          var elsCol = elsAt.getAttribute("col");
          var valInArr= matAll[elsRow-1][elsCol-1];
              if(!isNaN(valInArr)){
                   elsAt.setAttribute("isNumber", "yes") 
              }else{  elsAt.setAttribute("isNumber", "no") }
          //elsAt.innerHTML  = (!isNaN(valInArr)?valInArr:"☠️");
          //elsAt.innerHTML= valInArr;
          elsAt.innerHTML= (!isNaN(valInArr)?"👼":"💀");
          //events
          elsAt.ontouchstart = function(){
          }
          elsAt.onclick = function(e){    
                  e.preventDefault();
                  var elsRow = elsAt.getAttribute("row");
                  var elsCol = elsAt.getAttribute("col");
                  
                  if(clickedPos.length>0){
                  if(elsRow-1>clickedPos[0].row+1 ||
                    elsRow-1<clickedPos[0].row-1 ||
                    elsCol-1>clickedPos[0].col+1 ||
                    elsCol-1<clickedPos[0].col-1 
                  ){  
                       resetValues(); 
                  }
                  }
              
                 getAllElem(CLS("els", "class"), function(at, ind){
                    if(at.getAttribute("lastClicked") != "yes"){
                        at.style = "border-style: none;"
                    }else{ 
                        at.setAttribute("lastClicked", "no"); 
                        bCol = "white"
                    }
                 });
                 
                 elsAt.setAttribute("lastClicked", "yes");
                 elsAt.style = "border-style: solid; border-color: "+bCol+";";
                 clickedPos.push( {row: elsRow-1, col: elsCol-1} );
                 presentV.push( matAll[elsRow-1][elsCol-1] );
                 clickedEl.push(elsAt);
                 if(presentV.length >= 2){  switchValues();     }
                 
                 
                 elsAtPosX = elsAt.clientWidth*(elsRow-1)+elsAt.clientWidth/2;
                 elsAtPosY=elsAt.clientHeight*(elsCol-1)+elsAt.clientHeight/2;
                 TAGN("linker", 0).style=
                 "top:"+elsAtPosX+"; left:"+elsAtPosY+"; width: 0%";
                 //elsAt.innerHTML = elsAtPosX
                 //elsAt.style = "display: none;"
              
          }//EO ontouchstart
          
          function switchValues(){
              var clickedRow =clickedPos[0].row;
              var clickedCol =clickedPos[0].col;
              var clickedRow2 =clickedPos[1].row;
              var clickedCol2 =clickedPos[1].col;
              
                     animateValChange( clickedRow, clickedCol);
              matAll[clickedPos[0].row][clickedPos[0].col] = presentV[1];
                     animateValChange( clickedRow2, clickedCol2, 400);
              matAll[clickedPos[1].row][clickedPos[1].col] = presentV[0];
              
              setTimeout(function(){ 
                   //checkMeets();
                   checkLine(clickedRow, clickedCol, clickedRow2,clickedCol2);
                   resetValues();
              }, 500);//EO setTimeout
          }//EO switchValues
          function resetValues(){
                         getAllElem(CLS("els", "class"), function(at, ind){
                            //resetall
                            var elsRow = at.getAttribute("row");
                            var elsCol = at.getAttribute("col");
                            at.setAttribute("noborder", "no");
                            at.setAttribute("lastClicked", "no"); 
                            bCol = "red";
                            presentV = [];
                            clickedPos = [];
                            clickedEl = []
                            var valInArr= matAll[elsRow-1][elsCol-1];
                            if(!isNaN(valInArr)){
                                  at.setAttribute("isNumber", "yes");
                            }else{  at.setAttribute("isNumber", "no") }
                            //at.innerHTML= valInArr;
                            at.innerHTML= (!isNaN(valInArr)?"👼":"💀");
                         });//getAllElem
          }
          function checkMeets(){
             lineFound = false; 
             matAll.map(function(arrAt, arrInd){  
                 arrAt.map(function(colAt, colInd){ 
                       if( !isNaN( matAll[3][colInd] ) &&
                           !isNaN( matAll[2][colInd] ) &&
                           !isNaN( matAll[1][colInd] ) &&
                           !isNaN( matAll[0][colInd] ) &&
                           arrInd == 3
                        ){ 
                             lineFound = true;
                             
                             
                                animateValChange(3, colInd, 800, function(){
                             matAll[3][colInd] =
                                  Number(matAll[3][colInd])
                                 +Number(matAll[2][colInd]);
                                 //new Val
                                 matAll[2][colInd] = pickRand("any");
                                 resetValues()
                                            });
                                            
                               animateValChange(3, colInd, 1600, function(){
                            matAll[3][colInd] =
                              Number(matAll[3][colInd])
                              +Number(matAll[1][colInd]);
                              matAll[1][colInd] = 
                              pickRand(matAll[2][colInd]?"number":"letter" );
                                 resetValues()
                                            });
                                            
                                animateValChange(3, colInd, 2400, function(){
                             matAll[3][colInd] =
                                  Number(matAll[3][colInd])
                                 +Number(matAll[0][colInd]);
                                 matAll[0][colInd] = pickRand("any");
                                 resetValues()
                                            });
                                    
                             animateLineFound(3, colInd)
                         }//EO if
                         
                         
                       if( !isNaN( matAll[arrInd][0] ) &&
                           !isNaN( matAll[arrInd][1] ) &&
                           !isNaN( matAll[arrInd][2] ) &&
                           !isNaN( matAll[arrInd][3] ) &&
                           colInd == 3
                        ){ 
                             lineFound = true;
                             matAll[arrInd][3] =
                                           Number(matAll[arrInd][0])+
                                           Number(matAll[arrInd][1])
                                           +Number(matAll[arrInd][2])
                                           +Number(matAll[arrInd][3]) 
                         }//EO if
                         
                 }) 
             })//EO matAll map

             if(lineFound){   //alert(); 
                          }
          }//EO checkMeets
          function checkLine(rowInd, colInd, row2Ind, col2Ind){
                       //check if there is more even that odd
                       var evenInd = 0;
                       evenInd+= !isNaN(matAll[3][colInd])?( 
                                 (Number(matAll[3][colInd]) %2 == 0 )?1:-1 ):0
                       evenInd+= !isNaN(matAll[2][colInd])?( 
                                 (Number(matAll[2][colInd]) %2 == 0 )?1:-1 ):0
                       evenInd+= !isNaN(matAll[1][colInd])?( 
                                 (Number(matAll[1][colInd]) %2 == 0 )?1:-1 ):0
                       evenInd+= !isNaN(matAll[0][colInd])?( 
                                 (Number(matAll[0][colInd]) %2 == 0 )?1:-1 ):0
                                 
                       var even2Ind = 0;
                       even2Ind+= !isNaN(matAll[3][col2Ind])?( 
                                (Number(matAll[3][col2Ind]) %2 == 0 )?1:-1 ):0
                       even2Ind+= !isNaN(matAll[2][col2Ind])?( 
                                (Number(matAll[2][col2Ind]) %2 == 0 )?1:-1 ):0
                       even2Ind+= !isNaN(matAll[1][col2Ind])?( 
                                (Number(matAll[1][col2Ind]) %2 == 0 )?1:-1 ):0
                       even2Ind+= !isNaN(matAll[0][col2Ind])?( 
                                (Number(matAll[0][col2Ind]) %2 == 0 )?1:-1 ):0
                                 
                                 
                       
                       $("logger").innerHTML = "";//colInd+"; "+evenInd;
                       if(evenInd<=-1 || even2Ind<=-1){
                            //$("logger").innerHTML+= "odd";
                            animateValChange(rowInd, colInd, 800, function(){
                                 matAll[rowInd][colInd] = pickRand("letter");
                                 resetValues()
                             });//EO animateValChange
                           //$("logger").innerHTML+= "odd"  
                            animateValChange(row2Ind, col2Ind, 800,function(){
                                 matAll[row2Ind][col2Ind] =pickRand("letter");
                                 resetValues()
                            });//EO animateValChange
                       }
                       if(evenInd>=1 && even2Ind>=1){
                            $("logger").innerHTML+= "even";
                            animateValChange(rowInd, colInd, 800, function(){
                                 matAll[rowInd][colInd]=
                                 Number(pickRand("number"))+10;
                                 resetValues()
                             });//EO animateValChange
                           //$("logger").innerHTML+= "even"  
                            animateValChange(row2Ind, col2Ind, 800,function(){
                               matAll[row2Ind][col2Ind]=
                               Number(pickRand("number"))+10;
                               resetValues()
                            });//EO animateValChange
                       }

          }//checkLine
          function animateLineFound(row, col){ 
                 col += 1; 
                 //CLS("els",  row*4+col-1 ).style = "font-size: 5px;"
          }
         function animateValChange(row, col, wait= 1, callB=function(){}){
            setTimeout(function(){  
                 col += 1; 
                 CLS("els",  row*4+col-1 ).style = 
                       "font-size: 1px; background:#000837;"; 
                 setTimeout(function(){
                      callB()
                      CLS("els",  row*4+col-1 ).style =
                        "font-size: 15px; "
                 }, 400);//EO setTimeout
                 
            }, wait);
          }//EO animateValChange
             
             
           
           
      })//EO getAllElem
     
       

             }catch(e){ alert(""+e) }
      }//EO run
      
      
      
      
      
      
      
      
      



  

        
        
    </script>

    
    
    
    
    
    
<div id="boxContain">
 
    <div id="row1" class="rows" >
        <div class="els" row="1" col="1" >1</div>
        <div class="els" row="1" col="2" >2</div>
        <div class="els" row="1" col="3" >3</div>
        <div class="els" row="1" col="4" >4</div>
    </div>
     <div id="row2" class="rows">
        <div class="els" row="2" col="1" >3</div>
        <div class="els" row="2" col="2" >4</div>
        <div class="els" row="2" col="3" >5</div>
        <div class="els" row="2" col="4" >6</div>
    </div>
    <div id="row3" class="rows">
        <div class="els" row="3" col="1" >4</div>
        <div class="els" row="3" col="2" >5</div>
        <div class="els" row="3" col="3" >6</div>
        <div class="els" row="3" col="4" >7</div>
    </div>  
    <div id="row4" class="rows">
        <div class="els" row="4" col="1" >4</div>
        <div class="els" row="4" col="2" >5</div>
        <div class="els" row="4" col="3" >6</div>
        <div class="els" row="4" col="4" >7</div>
    </div>  
     <linker> </linker>
</div>
    
    <div id="logger"></div>
    
    
    </body>
    
    
    
    
</html>  
 