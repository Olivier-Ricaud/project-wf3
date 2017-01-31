
// Fonction d'affichage du détail des salles dans le formulaire de création d'événement
function showSalle(salleId) {
    if (salleId === "" ) {
        document.getElementById("txtSalle").innerHTML="";
        return;
    } 

    if (window.XMLHttpRequest) {
        // code pour IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    } else {  // code pour IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.open("GET","/salle-detail/"+salleId,true);
    xmlhttp.send();

    xmlhttp.onreadystatechange=function() {
        
        if (this.readyState==4 && this.status==200) {
            document.getElementById("txtSalle").innerHTML = this.responseText;
        }
    };
}
