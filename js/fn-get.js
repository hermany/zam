//funciones

function return_view(url){
     var result = null;
     var scriptUrl = url;
     $.ajax({
        url: scriptUrl,
        type: 'get',
        dataType: 'html',
        async: false,
        success: function(data) {
            result = data;
        } 
     });
     return result;
}