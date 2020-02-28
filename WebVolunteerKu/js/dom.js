function openInfo(evt, chose) {
    var index, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("dropdown_menu");
    for (index = 0; index < tabcontent.length; index++) {
        tabcontent[index].style.display = "none";
    }
    tablinks = document.getElementsByClassName("current_open");
    for (index = 0; index < tablinks.length; index++) {
        tablinks[index].className = tablinks[index].className.replace(" active", "");
    }
    document.getElementById(chose).style.display = "block";
    evt.currentTarget.className += " active";
}