
$(document).ready(function(){

    //console.log('jQuery Login está funcionando');
   

    $('#cerrar-sesion').submit(function(e){

      
        let FechaHora = new Date();

        let fecha =  FechaHora.getFullYear()+ '-' + (FechaHora.getMonth() + 1)+ '-' +  FechaHora.getDate();
        let hora =  FechaHora.getHours() + ':' + FechaHora.getMinutes() +':'+FechaHora.getSeconds();
        let FH = fecha+' '+hora;
     
        const datosLogout = {
           
            FechaLogout:FH
        };
       $.post('../php/cerrar-sesion.php',datosLogout, function(response){

        let datos = JSON.parse(response);

        datos.forEach(dato=>{
            console.log(dato.status);


            if(dato.status == 1){
                location.href = '../Login.php';


            }
       
        })
       

        
      
           
       });
       
       e.preventDefault();
    
    });



});