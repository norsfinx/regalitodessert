"use strict";

var liens = document.getElementsByClassName("suppr");



//Array.from(liens).forEach( function ( lien ) {

    for (let lien of liens) {
         lien.addEventListener("click", function (event){
         console.log(lien); 
        
    if (!confirm ("Voulez-vous supprimez ? ")){
    event.preventDefault();
    }
});
};

