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

/*$(".plus").click(function(e) {
        e.preventDefault();
        var $this = $(this);
        var $input = $this.siblings('input');
        var value = parseFloat($input.val());
        if (value < 30) {
            value = value + 0.1;
        }
        else {
            value =30;
        }
        $input.val(value);
        $(".minus").prop("disabled",false);
    });

    $(".minus").click(function(e) {
        e.preventDefault();
        var $this = $(this);
        var $input = $this.siblings('input')
        var value = parseFloat($input.val());
        if (value > 15) {
            value = value - 0.1;
            $(this).removeAttr('disabled');
        }
        else {
            value = 15;
            $(this).attr('disabled', true);
        }
        $input.val(value);
    });
    $('.btn-number').click(function(e){
        e.preventDefault();

        fieldName = $(this).attr('data-field');
        // type      = $(this).attr('data-type');
        var input = $("input[name='"+fieldName+"']");
        var currentVal = parseFloat(input.val());
        if (!isNaN(currentVal)) {
            if($(this).attr('data-type') == 'minus') {

                if(currentVal > input.attr('min')) {
                    input.val(currentVal - 0.1).change();
                }
                if(parseInt(input.val()) == input.attr('min')) {
                    $(this).attr('disabled', true);
                    console.log(this);
                }

            } else if($(this).attr('data-type') == 'plus') {

                if(currentVal < input.attr('max')) {
                    input.val(currentVal + 0.1).change();
                }
                if(parseInt(input.val()) == input.attr('max')) {
                    $(this).attr('disabled', true);
                }

            }
        } else {
            input.val(15);
        }
    });
    $('.input-number').focusin(function(){
        $(this).data('oldValue', $(this).val());
    });*/