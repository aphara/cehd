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

try{
    jQuery(document).ready(function(){
        var timeout;
        // This button will increment the value
        $('[data-quantity="plus"]').click(function(e){
            //Reset timer
            clearTimeout(timeout);
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            fieldName = $(this).attr('data-field');
            id = $(this).attr('id');
            // Get its current value
            var currentVal = parseFloat($('input[name='+fieldName+']').val());
            // If is not undefined
            if (!isNaN(currentVal) && currentVal<30 ) {
                // Increment
                var a = currentVal + 0.1;
                currentVal=parseFloat(a.toFixed(1));
                $('input[name='+fieldName+']').val(currentVal);
            } else {
                // Otherwise put a 0 there
                $('input[name='+fieldName+']').val(30);
            }
            timeout = setTimeout(function(){sendAllEffectorValue(id,currentVal);}
                , 3000);
        });
        // This button will decrement the value till 0
        $('[data-quantity="minus"]').click(function(e) {
            //Reset timer
            clearTimeout(timeout);
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            fieldName = $(this).attr('data-field');
            id = $(this).attr('id');
            // Get its current value
            var currentVal = parseFloat($('input[name='+fieldName+']').val());
            // If it isn't undefined or its greater than 0
            if (!isNaN(currentVal) && currentVal > 15) {
                // Decrement one
                var a = currentVal - 0.1;
                currentVal=parseFloat(a.toFixed(1));
                $('input[name='+fieldName+']').val(currentVal);
            } else {
                // Otherwise put a 0 there
                $('input[name='+fieldName+']').val(15);
            }
            timeout = setTimeout(function(){sendAllEffectorValue(id,currentVal);}
                , 3000);
        });
    });
}catch (e){}


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

