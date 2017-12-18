$(document).ready(function(){
    $('.reactieSubmit').attr('disabled',true);
    
    $('#author').keyup(function(){
        if($(this).val().length !=0){
            $('.reactieSubmit').attr('disabled', false);
        }
        else
        {
            $('.reactieSubmit').attr('disabled', true);        
        }
    })

    $('#author').keyup(function(){
        if($(this).val().length !=0){
            $('.reactieSubmit').attr('disabled', false);
        }
        else
        {
            $('.reactieSubmit').attr('disabled', true);        
        }
    })
});

function myFunctionReageren(){
alert('Uw reactie wordt verzonden!');
};