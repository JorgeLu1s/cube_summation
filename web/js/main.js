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
            console.log(response);
            var data = response.data;
            var output = "";

            data.forEach(function(val){
                output += val + "\n";
            });
            $('.alert-danger').append("");
            $('.alert-danger').addClass("hidden");
            $('#output').val(output);
            $("html, body").animate({ scrollTop: $(document).height() }, 1000);
        },
        error: function(a, b){
            $('.alert-danger').append("Something went wrong, please try again.");
            $('.alert-danger').removeClass("hidden");
        }
    });
}
