/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
var ns4 = (document.layers);
var ie4 = (document.all && !document.getElementById);
var ie5 = (document.all && document.getElementById);
var ns6 = (!document.all && document.getElementById);

function todasocultas(){

    document.getElementById('r1').style.visibility="hidden";
    document.getElementById('r2').style.visibility="hidden";
    document.getElementById('r3').style.visibility="hidden";
    document.getElementById('r4').style.visibility="hidden";
    document.getElementById('r5').style.visibility="hidden";
    document.getElementById('r6').style.visibility="hidden";
    document.getElementById('r7').style.visibility="hidden";
    document.getElementById('r8').style.visibility="hidden";


    document.getElementById('r1').style.display="none";
    document.getElementById('r2').style.display="none";
    document.getElementById('r3').style.display="none";
    document.getElementById('r4').style.display="none";
    document.getElementById('r5').style.display="none";
    document.getElementById('r6').style.display="none";
    document.getElementById('r7').style.display="none";
    document.getElementById('r8').style.display="none";
    

}

function capas(id){

    todasocultas();
    //console.log("Abriendo");
    // Netscape 4
    if(ns4){
        document.layers[id].visibility = "show";
        document.getElementById(id).style.display="block";
    }
    // Explorer 4
    else if(ie4){
        document.all[id].style.visibility = "visible";
        document.getElementById(id).style.display="block";
    }
    // W3C - Explorer 5+ and Netscape 6+
    else if(ie5 || ns6){
        document.getElementById(id).style.visibility="visible";
        document.getElementById(id).style.display="block";
    }
}