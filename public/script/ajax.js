dbSync();



function dbSync(){
    $.ajax({
        url: './controller/data.php',
        type: 'post',
        data: 'command=getData',
        success: function(data,status){
            console.log(data);
        },
        complete:function(resultat,status){
            setTimeout(dbSync,30000);
        }
    });
}

function sendAllEffectorValue(id,value){
    console.log(id,value);
    $.ajax({
        url: './controller/data.php?command=sendAllEffectorData&',
        type: 'post',
        data: 'command=sendAllEffectorData&id='+id+'&value='+value,
        success: function(data,status){
            console.log(data,status);
        },
        complete:function(result,status){
            console.log(status);
        }
    });
}
