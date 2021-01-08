$(document).ready(function(){

    console.log('jQuery está funcionando');

    ListarTurnos();
    BuscarTurno();
    contarTurnos();
    BuscarEstatus();

   


    $('.fecha_acuseReci #fecha_acuseReci').datepicker({
        'format': 'yyyy/mm/dd',
        'autoclose' : true,   
     });
     $('.fechaOficioReci #fechaOficioReci').datepicker({
        'format': 'yyyy/mm/dd',
        'autoclose' : true,   
     });
     $('.fecha_oficio_contes #fecha_oficio_contes').datepicker({
        'format': 'yyyy/mm/dd',
        'autoclose' : true,   
     });
    
     function contarTurnos(){

        $.ajax({
            url:'../php/ContarTurno.php',
            type: 'GET',
            success: function(respuesta){
                let contar = JSON.parse(respuesta);
                console.log(contar)
                contar.forEach(no=>{
                    $('#TCompletados').html(no.no_Completados);
                    $('#TPendientes').html(no.no_Pendientes);
                    $('#TEnProceso').html(no.no_EnProceso);


      
                })
    
            }
    
        });



     }

    function ListarTurnos(){
        let FechaHora = new Date();
        let fecha =  FechaHora.getUTCFullYear()+ '/' + ((FechaHora.getMonth()+1)<10?'0'+(FechaHora.getMonth()+1):(FechaHora.getMonth()+1))+ '/' +  (FechaHora.getDate()<10?'0'+FechaHora.getDate():FechaHora.getDate());
        
        $.ajax({
            url:'../php/seguimientoListar.php',
            type: 'GET',
            success: function(respuesta){

                let datos = JSON.parse(respuesta);
                console.log(respuesta);
                datos.forEach(turno=>{


                    if(turno.turno_estatus == 'EN PROCESO'){

                        let fechaActual = fecha;
                        console.log(turno.fecha_recibido);
                        console.log(fechaActual);
                        let fechaTurnoRecibido = turno.fecha_recibido;
                        fechaTurnoRecibido = fechaTurnoRecibido.replace('-','/').replace('-','/');
                        let diferencia = Math.abs(new Date(fechaActual).getTime()- new Date(fechaTurnoRecibido).getTime());
                        let dias = (diferencia/(1000*60*60*24));
    
                        console.log(dias);

                        if(dias >= 5){
                            location.reload();                  
                            const postDturno = {
                                id_turno:turno.turno_id,
                                estatusTurno:'PENDIENTE'
                             };
    
                             $.post('../php/actualizarEstatus.php',postDturno,function(res){   
                                console.log(res);
                                
                             
               
                            }); 
                            
                        }
                    }
      
                })
    
            }
    
        });

        $.get('../php/seguimientoListar.php',function(datosTurno,status){
            let datosT = JSON.parse(datosTurno);
            console.log(datosT);

            let templete ='';   
    
            datosT.forEach(turno=>{

                var clase = '';
                var btnEditar = ''; 
            

                if(turno.turno_estatus == 'PENDIENTE'){
                    
                       
                    clase = 'table-danger';
                    
                }else if(turno.turno_estatus == 'EN PROCESO'){
                    
                    clase = 'table-active';
                }else if(turno.turno_estatus == 'COMPLETADO'){
                  
                    clase = 'table-success';
                }

               
 
                templete += 
                `<tr id="trTabla" class="${clase} align-items-center" id-turno="${turno.turno_id}">
                    <td class="py-2">${turno.no_turno}</td>
                    <td class="py-2">${turno.no_oficio}</td>
                    <td class="py-2">${turno.responsable}</td>
                    <td class="py-2">${turno.turno_estatus}</td>
                    <td >
                    <button class=" actualizar btn btn-warning btn-sm "  id="btnEditar" >
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                        </svg>
                        Editar Turno
                    </button>
                    </td>
                </tr>` 
                
                
               
            })

            
            $('#turnos').html(templete);
            

        });

    }

    function BuscarTurno(){

        $('#buscarTurno').keyup(function(e){
            if($('#buscarTurno').val()){

                let buscar = $('#buscarTurno').val();
                $.ajax({
                    url:'../php/Turno-Busqueda.php',
                    type:'POST',
                    data:{buscar},
                    success: function(respuesta){
                        let datos = JSON.parse(respuesta);
                     
                        let templete ='';   
                    
                        datos.forEach(turno=>{
        
            
                            var clase = '';
                         
            
                            if(turno.turno_estatus == 'PENDIENTE'){
                               
                                clase = 'table-danger';
                                
                            }else if(turno.turno_estatus == 'EN PROCESO'){
                                
                                clase = 'table-active';
                            }else if(turno.turno_estatus == 'COMPLETADO'){
                                
                                clase = 'table-success';
                            }
    
                            
                           
                            
             
                            templete += 
                            `<tr id="trTabla" class="${clase} align-items-center" id-turno="${turno.turno_id}">
                                    <td class="py-2">${turno.no_turno}</td>
                                    <td class="py-2">${turno.no_oficio}</td>
                                    <td class="py-2">${turno.responsable}</td>
                                    <td class="py-2">${turno.turno_estatus}</td>
                                <td >
                                <button class="actualizar btn btn-warning btn-sm " id="btnEditar">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                    </svg>
                                    Editar Turno
                                </button>
                                </td>
                            </tr>` 
                            
                        })
                        $('#turnos').html(templete);
                        
                    }
                    
                });


            }else{
                ListarTurnos();
            }

        });

    }

    function BuscarEstatus(){

       

        $('#BuscarEstatus').change(function(e){
            if($('#BuscarEstatus option:selected').val()){

                let buscar = $('#BuscarEstatus option:selected').val();
                console.log(buscar);
                $.ajax({
                    url:'../php/Turno-Busqueda.php',
                    type:'POST',
                    data:{buscar},
                    success: function(respuesta){
                        console.log(respuesta);
                        let datos = JSON.parse(respuesta);
                     
                        let templete ='';   
                    
                        datos.forEach(turno=>{
        
            
                            var clase = '';
                         
            
                            if(turno.turno_estatus == 'PENDIENTE'){
                               
                                clase = 'table-danger';
                                
                            }else if(turno.turno_estatus == 'EN PROCESO'){
                                
                                clase = 'table-active';
                            }else if(turno.turno_estatus == 'COMPLETADO'){
                                
                                clase = 'table-success';
                            }
    
                            
                           
                            
             
                            templete += 
                            `<tr id="trTabla" class="${clase} align-items-center" id-turno="${turno.turno_id}">
                                    <td class="py-2">${turno.no_turno}</td>
                                    <td class="py-2">${turno.no_oficio}</td>
                                    <td class="py-2">${turno.responsable}</td>
                                    <td class="py-2">${turno.turno_estatus}</td>
                                <td >
                                <button class="actualizar btn btn-warning btn-sm " id="btnEditar">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                    </svg>
                                    Editar Turno
                                </button>
                                </td>
                            </tr>` 
                            
                        })
                        $('#turnos').html(templete);
                        
                    }
                    
                });


            }else{
                ListarTurnos();
            }

        });

    }



    $(document).on('click','.actualizar',function(){
        let elemento = $(this)[0].parentElement.parentElement;
        let id = $(elemento).attr('id-turno');
      
        console.log(id);

        $('#contenedor1').hide();
        $('#contenedor2').show();



        $.post('../php/turno-Setear.php',{id},function(res){
           
            let datos = JSON.parse(res);
            console.log(datos);
            datos.forEach(turno=>{ 
                
                $('#id_turno').val(turno.turno_id);
                $('#no_turno').val(turno.no_turno);
                $('#fechaRecibido').val(turno.fecha_recibido),
                $('#no_oficio').val(turno.no_oficio),
                $('#fechaOficio').val(turno.fecha_recibido),
                $('#remitente').val(turno.remitente);
                $('#asunto').val(turno.asunto);
                $('#area').val(turno.area);
                $('#responsable').val(turno.responsable);
                $('#fecha1Segui').val(turno.fecha1_segui);
                $('#fecha_acuseReci').val(turno.acuse_reci);
                $('#fechaOficioReci').val(turno.no_oficio_contes);
                $('#porcentaje').val(turno.porcentaje);
                $('#estatus').val(turno.estatus);
                $('#no_oficio_contes').val(turno.no_oficio_conte);
                $('#fecha_oficio_contes').val(turno.fecha_oficio_contes);
                $('#no_oficio_contes').val(turno.no_oficio_contes);
                $('#observaciones').val(turno.observaciones);
               
                $('#destinatario').val(turno.destinatario);
                $('#contestacion').val(turno.contestacion);
                $('#SNContes').val(turno.SNContes);

                console.log(turno.SNContes);
                if(turno.SNContes == 'No'){
                    $('.fecha_acuseReci').hide();
                    $('.fechaOficioReci').hide();
                    $('.fecha_oficio_contes').hide();
                    $('.no_oficio_contes').hide();
                    $('.fecha_oficio_contes').hide();
                    $('.destinatario').hide();
                    $('.contestacion').hide();

                }else {
                    

                }
                

            })
            console.log(res);  
        })



    });


    $(document).on('click','.cancelar',function(){
        $('#formActualizarTurno').trigger('reset');
        $('#contenedor1').show();
        $('#contenedor2').hide();

});

$('#formActualizarTurno').submit(function(e){
    
    let id_turno = $('#id_turno').val();
    let fechaAcuseReci = $('#fecha_acuseReci').val();
    let fechaOficioReci = $('#fechaOficioReci').val();
    let fechaOficioContes = $('#fecha_oficio_contes').val();
    let noOficioContes = $('#no_oficio_contes').val();
    let destinatario = $('#destinatario').val();
    let contestacion = $('#contestacion').val();
    let observaciones = $('#observaciones').val();
    let SNContes = $('#SN option:selected').val();
    console.log(SNContes);
     
    const postActTurno = {
        id_turno:id_turno,
        fechaAcuseReci:fechaAcuseReci,
        fechaOficioReci:fechaOficioReci,
        fechaOficioContes:fechaOficioContes,
        noOficioContes:noOficioContes,
        destinatario:destinatario,
        contestacion:contestacion,
        observaciones:observaciones,
        SNContes:SNContes
    };

    console.log(postActTurno);

    
    

    $.post('../php/actualizarTurno.php',postActTurno,function(respuesta){   
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
            $('#formActualizarTurno').trigger('reset');
            $('#correcto').fadeIn();
            setTimeout(function() {
                $("#correcto").fadeOut();
            },3000)

            
            setTimeout(function(){
                $('#contenedor2').hide();
                $('#contenedorSubirContes').show();

            },3050)
        }

    });
    e.preventDefault();
});


$(document).on('click','.descargar',function(){
    console.log('Descargando');
    //$('#archivos').show();
    $('#btnRegresar').show();
    $('#DesRecep').show();
    $('#DesContes').show();
    $('#tabla').hide();
    $('#btnDescargar').hide();
    $('#buscarTurno').hide();
    $('#basic-addon2').hide();
    $('#buscarEstatus').hide();
    $('#contarTurnos').hide();
    $("#titulo").text('Descarga de Archivos');
    
});
$(document).on('click','.DesRecep',function(){
    console.log('Descargando');
    $('#archivosRecep').show();
    $('#archivosContes').hide();
    $("#titulo").text('Descarga de Recepciones');

    
});
$(document).on('click','.DesContes',function(){
    console.log('Descargando');
    $('#archivosContes').show();
    $('#archivosRecep').hide();
    $("#titulo").text('Descarga de Contestaciones');
  
    
});

$(document).on('click','.regresar',function(){
    console.log('Descargando');
    $('#archivos').hide();
    $('#btnRegresar').hide();
    $('#DesRecep').hide();
    $('#DesContes').hide();
    $('#tabla').show();
    $('#btnDescargar').show();
    $('#buscarTurno').show();
    $('#buscarEstatus').show();
    $('#basic-addon2').show();
    $('#contarTurnos').show();
    $('#archivosRecep').hide();
    $('#archivosContes').hide();
    $("#titulo").text('Seguimiento de Turnos');
  
    
});


$('#formSubirContes').submit(function(e){


    var archivo =document.getElementById('turnoFile');
    var file = archivo.files[0];
    var data = new FormData();
    data.append('turnoFile',file);

    $.ajax({
        url:'../TurnosArchivos/CargarFicherosContes.php',
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

                $('#formSubirContes').trigger('reset');

                
                setTimeout(function(){
                    window.location.href = "../paginas/Seguimiento.php";

              },4050)


               
                

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