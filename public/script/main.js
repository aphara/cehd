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



//set value