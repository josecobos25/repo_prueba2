$(document).ready(function(){
   
    console.log('jQuery está funcionando');
    
    

    $('#subirArchivo').submit(function(e){


        let archivo = $('#file').val();
    


        

        const postArchivo = {
            archivo:archivo
         
        };

        //console.log(postTurno);
        

        $.post('../php/CargarFicheros.php',postArchivo,function(respuesta){   
            console.log(respuesta); 


            if(respuesta == 1){

                $('#campos_vacios').fadeIn();     
                    setTimeout(function() {
                        $("#campos_vacios").fadeOut();           
                    },3000);

            }else if(respuesta == 2){
                $('#no_existente').fadeIn();     
                setTimeout(function() {
                    $("#no_existente").fadeOut();           
                },3000)

            }else if(respuesta == 3){
                $('#error').fadeIn();     
                setTimeout(function() {
                    $("#error").fadeOut();           
                },3000)

            }else if(respuesta == 4){
                $('#correcto').fadeIn(); 
                
                
                setTimeout(function() {
                    $("#correcto").fadeOut();           
                },3000)

                $('#formTurno').trigger('reset');

            }

        });
        e.preventDefault();
    });


 
  

});