try{
    for (var i=0;i<5;i++){
        var a = document.getElementsByClassName("hidden_content")[i];
        a.style.display = "none";
    }
}catch(TypeError){}
function OnOff(i) {
    if (document.getElementsByClassName("hidden_content")[i].style.display == "none")
        document.getElementsByClassName("hidden_content")[i].style.display = "block";
    else
        document.getElementsByClassName("hidden_content")[i].style.display = "none";
}



//set value