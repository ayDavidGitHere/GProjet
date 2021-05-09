function HANGER(myArr){
       pairedArr = []
       myArr.sort();
       myArr.map(function(val, ind, self){ //i pick a sock
       
           var pairFound = null; pairFoundInd = null;
           var eachStack = []
           for(i=ind; myArr.length>i; i++){ //search through the pile
               if(i!=ind && val != "nulle" && val== myArr[i] ){
                   //for its pair
                   pairFound = myArr[i]; 
                   pairFoundInd = i;
                   break; //i found my pair , bye bye to stack
               };
           }
           if(pairFound === null){
               eachStack = [val]//oops i didn't find pair. buhh amma hang it anyway
           }
           else{
               eachStack = [val, pairFound]; //i found my pair. let's hang'em 
               myArr[pairFoundInd] = "nulle" //i haave to remove you and myself from pile
               myArr[ind] = "nulle"
           }
           pairedArr.push(eachStack); //adding my hanger to new pile.
           
           //end of search let me pick another sock
       })
       pairedArr = pairedArr.filter(function(val){ 
           return val != ["nulle"]
       }) 
       
       return pairedArr;
    }
    
      
      
      
      
      //helper
        // flatten  helps to mske [ [3], [4] ]== [3, 4] 
        function flatten(arr) {
             return [].concat.apply([], arr);
        }
      //helper
        function unik(arr, remaining = false){
            //get arr without repeated values ->if false
            //gets arr remainal -> if true;
            var uniqueArr = [];
            var  uniqueArrRem = []
            arr.map(function(val, ind, self){
                if(self.indexOf(val) != val){   uniqueArr.push(val);     }
                else{  uniqueArrRem.push(val);   }
            })
            if(!remaining){ return uniqueArr; }
            if(remaining){ return uniqueArrRem };
        }

       
       var dirtyPile_unik = unik(dirtyPile);
       var dirtyPile_unikR = unik(dirtyPile, true);
       
       
       //
       cleanPile_hanged = HANGER(cleanPile); //put each into array.
       cleanPile_Paired = cleanPile_hanged.filter(function(val){
            return val.length == 2; //we want only clean and pairs here.
       })
       unpaired_cleanPile = flatten(cleanPile_hanged.filter(function(val){
           return  val.length == 1; 
           //we want clean socks that have not found pairs
           //flatten removes the hanger around it.
       }));
       
       
       
       
       //
       mixedPile_hanged= 
       HANGER( unpaired_cleanPile.concat(dirtyPile_unik) );  
       mixedPile_Paired= mixedPile_hanged.filter(function(val){
           return val.length == 2;
       });
       unpaired_mixedPile = flatten(mixedPile_hanged.filter(function(val){
           return  val.length == 1; 
           //we want mixed socks that have not found pairs
           //flatten removes the hanger around it.
       }));
       
       
       
       
       //
       dirtyPile_hanged = HANGER(dirtyPile_unikR.concat(unpaired_mixedPile)); //put each into array.
       dirtyPile_Paired = dirtyPile_hanged.filter(function(val){
            return val.length == 2; //we want only dirty and pairs here.
       })
       unpaired_dirtyPile = flatten(dirtyPile_hanged.filter(function(val){
           return  val.length == 1; 
           //we want dirty socks that have not found pairs
           //flatten removes the hanger around it.
       }));
       
       

       
       
       
       
       
       //lets operation is called washer
       //the order is important to obtain maximum possibilities.
       let washCount = 0;
       let totalPairs = []
       cleanPile_Paired.map(function(val, ind){
           //since is takes nothing to wash 1 clean sock.
           washCount+=0;
           if(washCount<=washLimit){  totalPairs.push(val); }
       })

       mixedPile_Paired.map(function(val, ind){
           //since it takes 1 wash to wash 1 dirty and 1 clean sock.
           washCount += 1;
           if(washCount<=washLimit){  totalPairs.push(val); }
       })
       
       dirtyPile_Paired.map(function(val, ind){
           //since it takes 1 wash to wash 2 dirty socks
           washCount += 2;
           if(washCount<=washLimit){  totalPairs.push(val); }
       })
       console.log("mary takes this :"+totalPairs+"; She takes "+totalPairs.length+" to ....");
       