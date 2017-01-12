$(document).ready(function(){
    $('#submit').click(function(){
        calculate();
    });
});

function calculate(){
    $.ajax({
        url: '/cube',
        data: {
            content: $('#input').val()
        },
        type: 'get',
        dataType: 'json',
        success: function(response){
            var data = response.data;
            var output = "";

            data.forEach(function(val){
                output += val + "\n";
            });
            $('#output').val(output);
        },
        error: function(a, b){
            console.error(a);
            console.error(b);
        }
    });
}
