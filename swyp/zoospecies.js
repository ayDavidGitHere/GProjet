function Zoo(species, count) {
    this.species = species;
    this.count = count;
}
var animals = [];

function addSpecies() {
    var species = document.getElementById("species").value;
    var count = document.getElementById("count").value;
    var obj = new Zoo(species, count);
    var speciesFound = false;
    var speciesFoundIndex;
    animals.map(function(objAtIndex, index){
        if(objAtIndex.species === obj.species ){   
            speciesFound =true;
            speciesFoundIndex = index;}
    })
    if (speciesFound) {
        animals[speciesFoundIndex].count =Number(animals[speciesFoundIndex].count)+Number(obj.count);
        console.log(animals[obj.count++]);

    } else {
        console.log(animals.push(obj));

    }
    createList();
}

function createList() {
    var html = "";
    for (var i = 0; i < animals.length; i++) {
        html += "<li>" + animals[i].species + animals[i].count + "</li>";
    }
    console.log(document.getElementById("zoo").innerHTML = html);
}

function removeSpecies() {
    var species = document.getElementById("species").value;
    var count = document.getElementById("count").value;
    var obj = new Zoo(species, count);
    var speciesFound = false;
    var speciesFoundIndex;
    animals.map(function(objAtIndex, index){
        if(objAtIndex.species === obj.species ){   
            speciesFound =true;
            speciesFoundIndex = index;
        }
    })
    if (speciesFound) {
        animals[speciesFoundIndex].count =Number(animals[speciesFoundIndex].count)-Number(obj.count);
        if(animals[speciesFoundIndex].count <=0){   
            //if count is <=0 remove species
            animals.splice( speciesFoundIndex, 1); 
        }
        console.log(animals[obj.count++]);

    } else {
        console.log(animals.push(obj));

    }
    createList();
}