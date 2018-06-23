try {
    $("#slider").ready(function () {
        if ( value  && typeof value !== 'undefined' ) {
            getShutterValue(value);
            $(".text .textcontent").html(value);
            setImageShutter(value);
        }
    });
}catch (e){
    alert("Erreur de chargement du javascript");
}


function getShutterValue(value){
    try {
        var timeout;
        $("#slider").slider({
            orientation: "vertical",
            step: 5,
            value: value,
            change: function (change, ui) {
                clearTimeout(timeout);
                var request = $("#slider").slider("value");
                $(".text .textcontent").html(request);
                setImageShutter(request);
                var id = 'allShutter';
                timeout = setTimeout(function () {
                        sendAllEffectorValue(id, request);
                    }
                    , 5000);
            }
        });
    }catch (e){}
}

function setImageShutter(value){

    if (value==0) {
        $("#slider_image").html('<img src="public/img/volet0.PNG">');
    }
    if (value>=5 && value<20) {
        $("#slider_image").html('<img src="public/img/volet10.PNG">');
    }
    if (value>=20 && value<30) {
        $("#slider_image").html('<img src="public/img/volet20.PNG">');
    }
    if (value>=30 && value<40) {
        $("#slider_image").html('<img src="public/img/volet30.PNG">');
    }
    if (value>=40 && value<50) {
        $("#slider_image").html('<img src="public/img/volet40.PNG">');
    }
    if (value>=50 && value<60) {
        $("#slider_image").html('<img src="public/img/volet50.PNG">');
    }
    if (value>=60 && value<70) {
        $("#slider_image").html('<img src="public/img/volet60.PNG">');
    }
    if (value>=70 && value<80) {
        $("#slider_image").html('<img src="public/img/volet70.PNG">');
    }
    if (value>=80 && value<90) {
        $("#slider_image").html('<img src="public/img/volet80.PNG">');
    }
    if (value>=90 && value<100) {
        $("#slider_image").html('<img src="public/img/volet90.PNG">');
    }
    if (value==100) {
        $("#slider_image").html('<img src="public/img/volet100.PNG">');
    }
}