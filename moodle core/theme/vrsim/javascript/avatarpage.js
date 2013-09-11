
function toggleHelmets(){
   var helmets = document.getElementById('helmetchoices');
   if(helmets.style.display == "none"){
   	helmets.style.display = "inline-block";
   	document.getElementById('shirtchoices').style.display = "none";
   	document.getElementById('glovechoices').style.display = "none";
   	document.getElementById('pantchoices').style.display = "none";
   	document.getElementById('shoechoices').style.display = "none";
   }
   else{
   	helmets.style.display = "none";
   }
}
function toggleShirts(){
   var shirts = document.getElementById('shirtchoices');
   if(shirts.style.display == "none"){
   	shirts.style.display = "inline-block";
   	document.getElementById('helmetchoices').style.display = "none";
   	document.getElementById('glovechoices').style.display = "none";
   	document.getElementById('pantchoices').style.display = "none";
   	document.getElementById('shoechoices').style.display = "none";
   }
   else{
   	shirts.style.display = "none";
   }
}
function toggleGloves(){
   var gloves = document.getElementById('glovechoices');
   if(gloves.style.display == "none"){
   	gloves.style.display = "inline-block";
   	document.getElementById('helmetchoices').style.display = "none";
   	document.getElementById('shirtchoices').style.display = "none";
   	document.getElementById('pantchoices').style.display = "none";
   	document.getElementById('shoechoices').style.display = "none";
   }
   else{
   	gloves.style.display = "none";
   }
}
function togglePants(){
   var pants = document.getElementById('pantchoices');
   if(pants.style.display == "none"){
   	pants.style.display = "inline-block";
   	document.getElementById('helmetchoices').style.display = "none";
   	document.getElementById('shirtchoices').style.display = "none";
   	document.getElementById('glovechoices').style.display = "none";
   	document.getElementById('shoechoices').style.display = "none";
   }
   else{
   	pants.style.display = "none";
   }
}
function toggleShoes(){
   var shoes = document.getElementById('shoechoices');
   if(shoes.style.display == "none"){
   	shoes.style.display = "inline-block";
   	document.getElementById('helmetchoices').style.display = "none";
   	document.getElementById('shirtchoices').style.display = "none";
   	document.getElementById('glovechoices').style.display = "none";
   	document.getElementById('pantchoices').style.display = "none";
   }
   else{
   	shoes.style.display = "none";
   }
}

/****************** SWAP FUNCTIONS *****************************/
function swaphelmet(image) 
{
    document.getElementById("helmet").src = image.href;
    saveClothing();
}
function swapshirt(image){
    document.getElementById("shirt").src = image.href;
    saveClothing();
}
function swapgloves(image){
    document.getElementById("gloves").src = image.href;
    saveClothing();
}
function swappants(image){
    document.getElementById("pants").src = image.href;
    saveClothing();
}
function swapshoes(image){
    document.getElementById("shoes").src = image.href;
    saveClothing();
}