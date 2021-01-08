$(document).ready(function(){

    
   
    console.log('jQuery está funcionando');
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
    checkStatus();
    listarTurno();


    function checkStatus(){
        let FechaHora = new Date();
        let fecha =  FechaHora.getUTCFullYear()+ '/' + ((FechaHora.getMonth()+1)<10?'0'+(FechaHora.getMonth()+1):(FechaHora.getMonth()+1))+ '/' +  (FechaHora.getDate()<10?'0'+FechaHora.getDate():FechaHora.getDate());
        
        $.ajax({
    
            url:'../php/seguimientoListar.php',
            type: 'GET',
            success: function(respuesta){
                let datos = JSON.parse(respuesta);
             
                   
    
                //onsole.log(mobs);
                console.log(datos);
                
                datos.forEach(turno=>{
    
                    let clase='';
                    let fechaActual = fecha;
                    let fechaTurnoRecibido = turno.fecha_recibido;
                    fechaTurnoRecibido = fechaTurnoRecibido.replace('-','/').replace('-','/');
                    let diferencia = Math.abs(new Date(fechaActual).getTime()- new Date(fechaTurnoRecibido).getTime());
    
                    let dias = (diferencia/(1000*60*60*24));
    
                   //console.log(fechaMili);
                    
                    //console.log(fechaActual);
                    //console.log(fechaTurnoRecibido);
                    console.log(dias);
                     
                    if(dias >= 5 && turno.turno_estatus == 'EN PROCESO'){                  
                        const postDturno = {
                            id_turno:turno.turno_id,
                            estatusTurno:'PENDIENTE'
                         };
                        $.post('../php/actualizarEstatus.php',postDturno,function(respuesta){   
                            console.log(respuesta); 
                            location.reload();
                        });  
                    }
       
                })
                
                
            }
    
        });

    }
   
    $('#buscarTurno').keyup(function(e){



        if($('#buscarTurno').val()){
            let buscar = $('#buscarTurno').val();
            console.log(buscar);
            $.ajax({
                url:'../php/Turno-Busqueda.php',
                type:'POST',
                data:{buscar},
                success: function(respuesta){
                    let datos = JSON.parse(respuesta);
                 
                    let templete ='';   
                    let FechaHora = new Date();
                    let fecha =  FechaHora.getUTCFullYear()+ '/' + ((FechaHora.getMonth()+1)<10?'0'+(FechaHora.getMonth()+1):(FechaHora.getMonth()+1))+ '/' +  (FechaHora.getDate()<10?'0'+FechaHora.getDate():FechaHora.getDate());
        
     
        
                    //onsole.log(mobs);
                    console.log(datos);
                    
                    datos.forEach(turno=>{
    
        
                        var clase = '';
                        let fechaActual = fecha;
                        let fechaTurnoRecibido = turno.fecha_recibido;
                        fechaTurnoRecibido = fechaTurnoRecibido.replace('-','/').replace('-','/');
                        let diferencia = Math.abs(new Date(fechaActual).getTime()- new Date(fechaTurnoRecibido).getTime());
        
                        let dias = (diferencia/(1000*60*60*24));
        
                       //console.log(fechaMili);
                        
                        console.log(fechaActual);
                        console.log(fechaTurnoRecibido);
                        console.log(dias);
        
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
            listarTurno();
        }
       
    });
    

  

   function listarTurno(){

   

    //let FechaHora = new Date();
    //let fecha =  FechaHora.getUTCFullYear()+ '/' + ((FechaHora.getMonth()+1)<10?'0'+(FechaHora.getMonth()+1):(FechaHora.getMonth()+1))+ '/' +  (FechaHora.getDate()<10?'0'+FechaHora.getDate():FechaHora.getDate());
    

    $.ajax({

        url:'../php/seguimientoListar.php',
        type: 'GET',
        success: function(respuesta){
            let datos = JSON.parse(respuesta);
         
            let templete ='';    

            //onsole.log(mobs);
            //console.log(datos);
            
            datos.forEach(turno=>{

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
           
            
        }

    });

   }









   $(document).on('click','.actualizar',function(){
    
        let elemento = $(this)[0].parentElement.parentElement;
        let id = $(elemento).attr('id-turno');
      
        //console.log(id);

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
                $('#destinatario').val(turno.destinatario);
                $('#contestacion').val(turno.contestacion);
                

            })
            console.log(res);  
        })


      
       
    
});

$(document).on('click','.cancelar',function(){
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
     
    const postActTurno = {
        id_turno:id_turno,
        fechaAcuseReci:fechaAcuseReci,
        fechaOficioReci:fechaOficioReci,
        fechaOficioContes:fechaOficioContes,
        noOficioContes:noOficioContes,
        destinatario:destinatario,
        contestacion:contestacion,
        observaciones:observaciones
    };

    //console.log(postActTurno);
    

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
            $('#correcto').fadeIn();
            setTimeout(function() {
                $("#correcto").fadeOut();
            },3000)
        }

    });
    e.preventDefault();
});


   



});