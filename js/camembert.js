var url = document.getElementById('cam').getAttribute('src');
var paramGeo = url.split('?')[1];
var paramDiver = url.split('?')[2];
var paramHist = url.split('?')[3];
var paramSport = url.split('?')[4];
var paramInfo = url.split('?')[5];
var paramPerso = url.split('?')[6];
var player = url.split('?')[7];

if (paramGeo == 1){
    var camGeo = document.getElementById("camGeo"+player);
    camGeo.style.borderTop = "66.6px solid #77B5FE";
}

if (paramDiver == 1){
    var camDiver = document.getElementById("camDiver"+player);
    camDiver.style.borderTop = "66.6px solid pink";
}

if (paramHist == 1){
    var camHist = document.getElementById("camHist"+player);
    camHist.style.borderTop = "66.6px solid #F7FF3C";
}

if (paramSport == 1){
    var camSport = document.getElementById("camSport"+player);
    camSport.style.borderTop = "66.6px solid #FF8C00";
}

if (paramInfo == 1){
    var camInfo = document.getElementById("camInfo"+player);
    camInfo.style.borderTop = "66.6px solid #7FDD4C";
}

if (paramPerso == 1){
    var camPerso = document.getElementById("camPerso"+player);
    camPerso.style.borderTop = "66.6px solid #BA55D3";
}