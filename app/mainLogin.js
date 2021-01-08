
$(document).ready(function(){

    //console.log('jQuery Login está funcionando');
   

    $('#login').submit(function(e){
        $('#lbbien').hide();
        $('#advertencia-campos').hide();
        const datosPost = {
            correo: $('#correo').val(),
            contraseña: $('#contraseña').val()
        };
       $.post('php/login-sesion.php',datosPost, function(response){

        let datos = JSON.parse(response);
        let templete = '';
        console.log(response); 

        
        

        datos.forEach(dato=>{
            //console.log(dato.status);  
            console.log(dato.rol_id);
            
            if(dato.status == 1){
                $('#advertencia-campos').fadeIn();     
                setTimeout(function() {
                    $("#advertencia-campos").fadeOut();           
            },4000);
            }else if(dato.status == 2){

                

               

                $('#btnin').hide();
               
                $('#barra').show();
                $('#lbbien').show();
                location.href = 'paginas/Seguimiento.php';
               
                

                //console.log('Bienvenido');
            }else if( dato.status == 3){

                $('#advertencia-incorrectos').fadeIn();     
                setTimeout(function() {
                    $("#advertencia-incorrectos").fadeOut();           
            },4000);
                
               
                console.log('Correo y/o Contraseña Incorrectos');
            }
        })
     

         
           





        
               

                
           
       });
       
       e.preventDefault();
    
    });



});