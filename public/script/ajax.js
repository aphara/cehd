dbSync();



function dbSync(){
    $.ajax({
        url: './controller/data.php?command=getData',
        type: 'post',

        success: function(data){
            console.log(data);
        },
        complete:function(){
            setTimeout(dbSync,10000);
        }
    });
}

function sendEffectorValue(value){
    console.log(value);
/*    $.ajax({
        url: './controller/data.php?command=sendData',
        type: 'get',

        success: function(data){
            console.log(data);
            console.log('test');
        },
        complete:function(){
           console.log('done')
        }
    });*/
}
