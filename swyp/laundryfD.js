/**
 * Laundry Problem
 * Question 2
 *
 * @returns {any} Trip data analysis
 */
function getMaxPairs(noOfWashes, cleanPile, dirtyPile) {
      cleanPile.sort((a, b) => a - b);
      dirtyPile.sort((a, b) => a - b);

      let count = 0;
      let cleanUnpaired = [];
      cleanUnpaired.push(cleanPile[0]);
      //  console.log(cleanPile);

      for (let i = 1; i < cleanPile.length; i++) {
        if (cleanPile[i] == cleanUnpaired[cleanUnpaired.length - 1]) {
          count++;
          cleanUnpaired.pop();
        } else {
          cleanUnpaired.push(cleanPile[i]);
        }
      }

    //  console.log(cleanUnpaired);
      //console.log(dirtyPile);
      if (noOfWashes > 0 && cleanUnpaired.length > 0) {
        for (let j = 0; j < cleanUnpaired.length; j++) {
          if (dirtyPile.includes(cleanUnpaired[j])) {
            count++;
            noOfWashes--;
            //  let index = dirtyPile.findIndex((val)=>val == cleanUnpaired[j]);
            let index = dirtyPile.indexOf(cleanUnpaired[j]);
            dirtyPile.splice(index, 1);
            //   console.log(dirtyPile);
          }
        }
      }

      let result = [];
      result.push(dirtyPile[0]);

      for (let k = 1; k < dirtyPile.length; k++) {
        if (noOfWashes >= 2) {
          if (dirtyPile[k] == result[result.length - 1]) {
            count++;
            noOfWashes -= 2;
            result.pop()
          } else {
            result.push(dirtyPile[k]);
          }
        }
      }
      return count;
}


       var cleanPile = [1, 1, 1, 2, 3, 2];
       var dirtyPile = [1, 1, 2, 3, 3, 4, 4];
       cleanPile = ["pink", "indigo", "pink", "pink"];
       dirtyPile = ["pink", "royalblue", "red","pink","royalblue"];
       cleanPile = [1, 2, 1, 1];
       dirtyPile = [1, 4, 3, 2, 4];
       
      //call with any pile you want
      //and any limit
       var startTime = performance.now();
       //console.log(startTime)
       getMaxPairs = getMaxPairs(2, cleanPile, dirtyPile);
       console.log(getNoOfPairs)
       console.log(performance.now()-startTime);
//module.exports = getMaxPairs;
