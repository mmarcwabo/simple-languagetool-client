//All api calls goes here
$(function(){
    $('#language').change(function(){
        $("form").submit(function(event){
            var formData ={
                language: $("#language").val(),
                text: $("#txtEditor").val()
            };
        $.ajax({
            contentType: 'application/json; charset=utf-8',
            url: "http://localhost:8809/v2/check?",
            data: formData,
            dataType: 'json',

        }).done(function(data){
            alert(data);
        });
        event.preventDefault();
        });
    });
    

});