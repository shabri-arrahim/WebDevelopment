  
var header = document.getElementById('header');
window.onscroll = function (){
    if(window.pageYOffset > 100){
        header.style.position = "fixed";
        header.style.top = 0;
    }else{
        cover.style.position = "absolute";
        cover.style.top = 100;
    }
}