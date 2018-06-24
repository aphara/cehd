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
            setTimeout(dbSync,60000);
        }
    });
}

function sendAllEffectorValue(id, value){
    console.log(id,value);
    $.ajax({
        url: './controller/data.php',
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

function sendEffectorValue(id, effector, value){
    console.log(id,value,effector);
    $.ajax({
        url: './controller/data.php',
        type: 'post',
        data: 'command=sendEffectorData&id='+id+'&effector='+effector+'&value='+value,
        success: function(data,status){
            console.log(data,status);
        },
        complete:function(result,status){
            console.log(status);
        }
    });
}

