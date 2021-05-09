  
  
  //in the previous file.
  //function name was SORTED
  //it returned the pairs of as object-> pairedPile. 
  
  //in this file
  //function name is getNoOfPairs
  //it returns the max number of pairs -> pairedPile.length at line 82
  
  
  
  
         
    function getNoOfPairs(washLimit, cleanPile , dirtyPile){
       //i make each socks from each pile and object with properties
       cleanPile.map(function(col, ind){
           cleanPile[ind] = {type:"clean", col: col}
       })
       dirtyPile.map(function(col, ind){
           dirtyPile[ind] = {type:"dirty", col: col}
       })
       
       
       var pairedPile = [];  var washCount = 0;
         
       var jointPile = [...cleanPile, ...dirtyPile]
       jointPile.sort();
       jointPile.map(function(val, ind, self){ 
           //i pick each sock
           var valType = val.type
           //here i reset every pairfound info at every iteration
           var pairFound = null; pairFoundInd = null; pairFoundType = null;
           var eachStack = [];
           
           
           
           //i search from my index (ind) through the pile using for
           for(i=ind; jointPile.length>i; i++){ 
               if(i!=ind && val != "nulle" && val.col== jointPile[i].col ){
                   //i found its pair through the col property
                   //i save infos abt it
                   pairFound = jointPile[i]; 
                   pairFoundInd = i;
                   pairFoundType = jointPile[i].type
                   break; //i found my pair , bye bye to stack
               };
           } 
           
           //now i use the infos i saved up
           if(pairFound === null){
               eachStack = [val]
               //oops i didn't find pair. buhh amma sort it anyway
           }
           else{
               eachStack = [val, pairFound]; //i found my pair. let's hang'em 
               //i have to remove you and myself from pile
               jointPile[pairFoundInd] = "nulle" 
               jointPile[ind] = "nulle"
               
               //if the sock is dirty i have to wash it
               if(valType == "dirty"){ washCount++; }
               //if the pair i found too is dirty i have to wash it.
               if(pairFoundType == "dirty"){ washCount++; }
           }
           
           if(washCount<= washLimit){
               pairedPile.push(eachStack); //adding my hanger to new pile.
           }
           
           //end of search let me pick another sock 
       })
       pairedPile = pairedPile.filter(function(val){ 
           //i filter out the ones that does nkt have pair
           return ( val.length == 2);
       });
       
       
       console.log("mary takes this pile:"+JSON.stringify(pairedPile)+";\n She takes this ("+pairedPile.length+") pairs of socks to ....");
       
       
       return pairedPile.length;
    }//EO getNoOfPairs
    
    
    
    
    
     //case at line78 of test file.
    const numberMachineCanWash = 1;
    const cleanPile = [8];
    const dirtyPile = [8];


    getNoOfPairs = getNoOfPairs(numberMachineCanWash, cleanPile, dirtyPile);
    console.log(getNoOfPairs)
    //module.exports = getNoOfPairs;