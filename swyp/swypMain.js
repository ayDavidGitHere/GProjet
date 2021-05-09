    function swypMain(){
             
             
        var countX = 5; var countY = 5;
        var null_elsStyleLeft; var null_elsStyleTop;
        var null_els_row; var null_els_col;
        
        
        
        
        //init
        //create multi-dim
        /*
        var arr_rows = new Array(countY);
        for(ind=0; countX>ind; ind++){ 
             arr_rows[ind] = new Array(countX);
             for(indCol=0; countY>indCol; indCol++){ 
                 arr_rows[ind][indCol] =("3"); 
             }
             arr_rows[ind] = populateArr(arr_rows[ind], "any");
        }
        */
        //init
        //create multi-dim
        var arr_all = new Array(countX*countY);
        arr_all.fill("empty")
        arr_all = populateArr(arr_all, "any", true);

        var arr_rows = new Array(countY);
        var arr_elems = new Array(countY);
        //remember: Array.fill is a bitch
        for(indCol=0; countY>indCol; indCol++){ 
           arr_rows[indCol] = [];
           arr_elems[indCol] = [];
        }
        for(ind=0; countX*countY>ind; ind++){ 
             var rowInd =Math.floor(ind/countY);
             arr_rows[rowInd].push(arr_all[ind]); 
             arr_elems[rowInd].push(null);
        }
        
        
        

        
                   function loadAllEls(){
        
        //generate
        $("containAll").innerHTML = ""; 
        var i= 0;
        while(i< (countX*countY) ){
            $("containAll").innerHTML += 
            '<div class="els" row="" col="" >1</div>'
            i++;
        }
        
        
        
        
        //iterate at set
        getAllElem(CLS("els", "class"), function(elsAt, elsInd){
              //init
              
              setRow = Math.floor(elsInd/countX);
              setCol = Math.floor(elsInd-setRow*countY)
              elsAt.setAttribute("row", setRow);
              elsAt.setAttribute("col", setCol);
              elsAt.setAttribute("ind", elsInd);
              elsAt.setAttribute("null", "no");
              elsAt.setAttribute("focused", false)
              //elsAt.innerHTML =setRow+", "+setCol;
              elsAtWid= (100/countX); elsAt.style.width = elsAtWid+"%"
              elsAtHei= (100/countY); elsAt.style.height = elsAtHei+"%"
              elsAt.style.top =  (setRow/countX)*100+"%"; // 1/4*100%;
              elsAt.style.left = (setCol/countY)*100+"%";
              elsAt.innerHTML = arr_rows[setRow][setCol];
              arr_elems[setRow][setCol] = elsAt;
              
              var lastTouchState = null;
              var setRow; var setCol;
              var prev_ePX = 0;  var prev_ePY = 0; 
              var ePX=0; var ePY=0;
              var elsAtStyleLeft = 0; var elsAtStyleTop = 0;
              var init_elsAtStyleLeft; var init_elsAtStyleTop;
              var restrictY; var restrictX;
              var directMovement; var moveToPos;
              
              
              elsAt.ontouchstart = function(ev){
                   ev.preventDefault();
                   ePX = ev.touches[0].pageX;
                   ePY = ev.touches[0].pageY;
                   prev_ePX = ePX;
                   prev_ePY = ePY;
                   init_elsAtStyleLeft = Number(elsAt.style.left.replace("%", ""))
                   init_elsAtStyleTop = Number(elsAt.style.top.replace("%", ""))
                   setRow = elsAt.getAttribute("row");
                   setCol = elsAt.getAttribute("col");
                   
                   
                   
                   
                            if(elsAt.getAttribute("focused") == "true" ){
                  lastTouchState = "start";
                  //determine direction function
                  elsAtDirection = elsAt.getAttribute("direction");
                  switch(elsAtDirection){
                      
                      case "left":
                      directMovement = function(){
                      if( !is$Between(elsAtStyleLeft+1, init_elsAtStyleLeft, (null_elsStyleLeft) ) ){ 
                          restrictX = true;
                      } 
                      }//directMovement
                      moveToPos = function(){
                      if(is$Between(elsAtStyleLeft,100,null_elsStyleLeft+1) ){
                            elsAtStyleLeft = null_elsStyleLeft;
                            editArrRows(setRow, setCol, null_els_col, null_els_row);
                            loadAllEls();
                            setElsToNull(elsAtInd)
                      }
                      else{ elsAtStyleLeft = init_elsAtStyleLeft }; 
                      }//moveToPos
                      break;
                      
                      
                      case "top":
                      directMovement = function(){
                      if( !is$Between(elsAtStyleTop+1, init_elsAtStyleTop, (null_elsStyleTop) ) ){ 
                          restrictY = true;
                      } 
                      }//EO directMovement
                      moveToPos = function(){
                      if(is$Between(elsAtStyleTop, 100, null_elsStyleTop+1) ){
                          elsAtStyleTop = null_elsStyleTop;
                          editArrRows(setRow, setCol, null_els_col, null_els_row);
                          loadAllEls();
                          setElsToNull(elsAtInd); 
                      }
                      else{ elsAtStyleTop = init_elsAtStyleTop; }; 
                      }//EO moveToPos
                      break;
                      
                      
                      case "bottom":
                      directMovement = function(){
                      if( !is$Between(elsAtStyleTop-1, init_elsAtStyleTop, null_elsStyleTop) ){
                          restrictY = true;
                      }
                      }//EO directMovement
                      moveToPos = function(){ 
                      if(is$Between(elsAtStyleLeft, -0.01, null_elsStyleLeft+1)){
                          elsAtStyleLeft = null_elsStyleLeft;
                          editArrRows(setRow, setCol, null_els_col, null_els_row);
                          loadAllEls();
                          setElsToNull(elsAtInd)
                      }else{ elsAtStyleLeft = init_elsAtStyleLeft } 
                      }//EO moveToPos
                      break;
                      
                      
                      case "right":
                      directMovement = function(){
                      if( !is$Between(elsAtStyleLeft-1, init_elsAtStyleLeft, null_elsStyleLeft) ){
                          restrictX = true;
                      }
                      }//EO directMovement
                      moveToPos = function(){
                      if(is$Between(elsAtStyleTop, -0.01, null_elsStyleTop+1) ){
                          elsAtStyleTop = null_elsStyleTop;
                          editArrRows(setRow, setCol, null_els_col, null_els_row);
                          loadAllEls();
                          setElsToNull(elsAtInd);
                      }else{ elsAtStyleTop = init_elsAtStyleTop }; 
                      }//EO moveToPos
                      
                  }//EO switch
              
                                
                                
                                
                            }//EO if
                   
              }//EO ontouchstart
              elsAt.ontouchmove = function(ev){
                  //dragger hack
                  //uses difference in touch moves
                           
                            if(elsAt.getAttribute("focused") == "true" ){
                   lastTouchState = "move"
                   ev.preventDefault();
                   ePX = ev.touches[0].pageX;
                   ePY = ev.touches[0].pageY;
                   diff_ePX = ePX-prev_ePX;
                   diff_ePY = ePY-prev_ePY;
                   elsAtStyleLeft = Number(elsAt.style.left.replace("%", ""))
                   elsAtStyleTop = Number(elsAt.style.top.replace("%", ""))
                   
                                
                                
                                
                  setRow = elsAt.getAttribute("row");
                  setCol = elsAt.getAttribute("col")
                  restrictY = (setRow == null_els_row)?true:false;
                  restrictX = (setCol == null_els_col)?true:false;
                  
                   directMovement();
                   //could use direction attribute instead
                   if(!restrictX) elsAtStyleLeft += diff_ePX/2;
                   if(!restrictY) elsAtStyleTop += diff_ePY/2;
                   elsAt.style.top =  elsAtStyleTop+"%"; // 1/4*100%;
                   elsAt.style.left = elsAtStyleLeft+"%";
                   /*
                   arr_elems[null_els_col][null_els_row].style.top =
                   (- elsAtStyleTop)+"%";
                   arr_elems[null_els_col][null_els_row].style.left =
                   (- elsAtStyleLeft)+"%"
                   */
                   //elsAt.innerHTML = elsAtDirection+" "+is$Between(elsAtStyleTop, init_elsAtStyleTop, null_elsStyleTop)+", "+elsAtStyleTop+" "+ init_elsAtStyleTop+" "+null_elsStyleTop;
                   //$("logger").innerHTML+= 
                   prev_ePX = ePX;
                   prev_ePY = ePY;
                        }//EO if
              }//EO ontouchmove
              elsAt.ontouchend = function(ev){  
                        if(elsAt.getAttribute("focused") == "true" && lastTouchState == "move"){ 
                   lastTouchState = "end"
                   ev.preventDefault();
                   elsAtInd = Number(elsAt.getAttribute("ind")); 
                   moveToPos(); 
                   elsAt.style.top =  elsAtStyleTop+"%"; // 1/4*100%;
                   elsAt.style.left = elsAtStyleLeft+"%";
                        }//EO if    
              }//EO ontouchstart
              
        });//EO getAllElem
        
        
        
                   }//EO loadAllEls
                   
                   
                   
                   
                   
                   
                   
                   
                   
        
        
                    function setElsToNull(elstoNull){
        //allows element or index
        if(typeof elstoNull != "object"){    
            elstoNull = CLS("els", elstoNull);
        }
        
        //set null elements
        null_els = elstoNull;
        null_els_row = null_els.getAttribute("row");
        null_els_col = null_els.getAttribute("col");
        null_elsStyleTop =  (null_els_row/countX)*100; // 1/4*100%;
        null_elsStyleLeft = (null_els_col/countY)*100;
        
        
        
        //delete elem at center
        //null_els.style.background = "azure";
        //null_els.style.zIndex = "-1"
        null_els.setAttribute("null", "yes");
        null_els.innerHTML = arr_rows[null_els_row][null_els_col];
         
        
        //arr_elems[null_els_row][null_els_col].setAttribute("banned", true);
        
         //set focuses
        arr_focused = [];
        arr_focused.push([Number(null_els_row), Number(null_els_col)-1, "left"]);
        arr_focused.push([Number(null_els_row)-1, Number(null_els_col), "top"]);
        arr_focused.push([Number(null_els_row), Number(null_els_col)+1, "right"]);
        arr_focused.push([Number(null_els_row)+1, Number(null_els_col), "bottom"]);
        //alert( JSON.stringify(arr_focused))
        getAllElem(CLS("els", "class"), function(elsAt, elsInd){ 
            elsAt.setAttribute("focused", false);
            elsAt.removeAttribute("direction");
        });
        arr_focused.forEach(function(focused){
            fcR = focused[0];
            fcC = focused[1]; 
            fDirection = focused[2];
            focusedInd = ( (fcR)*countX )+ (fcC); //generate index
            //$("containAll").querySelector('[row ="'+fcR+'"]  [col ="'+fcC+'"]').setAttribute("focused", true);
                 if(is$Between(focusedInd, 0, CLS("els", "class").length) &&
                    CLS("els", focusedInd).getAttribute("banned") != "true" ){
                     //check if exist
            //alert(  CLS("els", focusedInd).getAttribute("banned")   )
            CLS("els", focusedInd).setAttribute("focused", true);
            CLS("els", focusedInd).setAttribute("direction", fDirection);
                 }
        });
                        }//EO //setElsToNull

        
        
    
      function editArrRows(setRow, setCol, null_els_col, null_els_row){ 
          const sw1 = arr_rows[setRow][setCol];
          const sw2 = arr_rows[null_els_row][null_els_col] ;
          
          arr_rows[setRow][setCol]  = Number(sw2);
          arr_rows[null_els_row][null_els_col] = Number(sw1)
          /*
          var addRow = 0;   var addCol = 0;
          while(addCol<countY && addRow<countX){
            addRow = ( (null_els_row==setRow)?setRow:addRow+1);
            addCol = ( (null_els_col==setCol)?setCol:addCol+1);
            //arr_row[addRow][addCol] = 2;
          }
          */
      }//EO  editArrRows

        
        
        
        
        loadAllEls()
        //setElsToNull at center
        var centerInd = Math.floor( CLS("els", "class").length/2 );
        var elsAtCenter = CLS("els", centerInd);
        var null_els = elsAtCenter;
        setElsToNull(elsAtCenter);
                    
                    
                    
      
        }//EO swypMain
        