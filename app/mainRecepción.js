$(document).ready(function(){
   
    console.log('jQuery está funcionando');
    
    var re = '';
    var SNContes = '';
   
    $('#remitente').keyup(function(e){
         re = $('#remitente').val();
        $('#remitente').val(re.toUpperCase());

    });

    var area = '';

    $('.fechaRe #fechaRecibido').datepicker({
        'format': 'yyyy/mm/dd',
        'autoclose' : true,   
     });

     $('.fechaOficio #fechaOficio').datepicker({
        'format': 'yyyy/mm/dd',
        'autoclose' : true,   
     });

     $('.fechaSegui #fechaSegui').datepicker({
        'format': 'yyyy/mm/dd',
        'autoclose' : true,   
     });


     $('#area').change(function(){
        area = $('#area option:selected').val();
        console.log(area);

        $.ajax({
            url:'../php/consultarResponsable.php',
            type:'POST',
            data:{area},
            success:function(respuesta){
               
                let responsable = JSON.parse(respuesta);
                console.log(responsable);

                responsable.forEach(dato => {
                    $('#responsable').val(dato.responsableArea);
                });
            }
            
        });
     });

     $('#SNContes').change(function(){
        SNContes = $('#SNContes option:selected').val();
        console.log(SNContes);
        
    });
   

    $('#formTurno').submit(function(e){


        let no_turno = $('#no_turno').val();
        let fechaRecibido = $('#fechaRecibido').val();
        let no_oficio = $('#no_oficio').val();
        let fechaOficio = $('#fechaOficio').val();
        let remitente = re;
        let asunto = $('#asunto').val();
       

     
    
        
        let responsable_area = $('#responsable').val();
        let fechaSegui = $('#fechaSegui').val();
        

        const postTurno = {
            no_turno:no_turno,
            fechaRecibido:fechaRecibido,
            no_oficio:no_oficio,
            fechaOficio:fechaOficio,
            remitente:remitente,
            asunto:asunto,
            area:area,
            responsable_area:responsable_area,
            fecha_segui:fechaSegui,
            SNContes:SNContes
        };

        console.log(postTurno);
        

        $.post('../php/agregarTurno.php',postTurno,function(respuesta){    
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

                setTimeout(function(){
                    $('#contenedorRecepcion').hide();
                    $('#contenedorSubir').show();
                    $("#titulo").text('Subir Archvio');

                },3100)


               

            }

        });
        e.preventDefault();
    });


    

    $('#formSubir').submit(function(e){


      var archivo =document.getElementById('turnoFile');
      var file = archivo.files[0];
      var data = new FormData();
      data.append('turnoFile',file);

      $.ajax({
          url:'../TurnosArchivos/CargarFicheros.php',
          type:'POST',
          data:data,
          contentType: false,
          cache:false,
          processData: false,
          success: function(data){
              console.log(data);

              if(data == 1){
                  console.log('No se ha seleccionado el archivo a subir');
                  $('#archivo-no').fadeIn();     
                  setTimeout(function() {
                      $("#archivo-no").fadeOut();           
                  },4000);
              }else if(data == 2){
                  
                console.log('Archivo Subido Exitosamente');

                  $('#archivo-correcto').fadeIn();     
                  setTimeout(function() {
                      $("#archivo-correcto").fadeOut();           
                  },4000);

                  $('#formSubir').trigger('reset');
                  $("#titulo").text('Recepción de Turnos');

                  
                  setTimeout(function(){
                    window.location.href = "../paginas/RecepciónTurnos.php";

                },4100)
                 
                  

              }else if(data == 3){
                  console.log('Error al subir archivo');
                  $('#error-archivo').fadeIn();     
                  setTimeout(function() {
                      $("#error-archivo").fadeOut();           
                  },4000);
              }else if(data == 4){
                  console.log('El archivo que intenta subir ya existe');
                  $('#archivo-existente').fadeIn();     
                  setTimeout(function() {
                      $("#archivo-existente").fadeOut();           
                  },4000);

              }else if(data == 5){
                  console.log('La extención de archivo que intenta subir no está permitido');
                  $('#formato-no').fadeIn();     
                  setTimeout(function() {
                      $("#formato-no").fadeOut();           
                  },4000);

              }

          }
      })


        e.preventDefault();
    });

 
  

});