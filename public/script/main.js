function OnOff(i) {
    if (document.getElementsByClassName("hidden_content")[i].style.display == "none")
        document.getElementsByClassName("hidden_content")[i].style.display = "block";
    else
        document.getElementsByClassName("hidden_content")[i].style.display = "none";
}