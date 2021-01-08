
$(document).ready(function(){

    console.log('jQuery Login está funcionando');

    $('#show-hide').on('click',function(e){
        e.preventDefault();
        var current =$(this).attr('action');

        if(current == 'hide'){
            $('#contraseña').attr('type','text');
            $('#show-eye').hide();
            $('#hide-eye').show();
            $(this).attr('action','show')
            
        }
    
        if(current == 'show'){
            $('#contraseña').attr('type','password');
            $('#show-eye').show();
            $('#hide-eye').hide();
            $(this).attr('action','hide')
            
        }
       






    })
  




});