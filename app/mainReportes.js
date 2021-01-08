
$(document).ready(function(){
   

console.log('jQuery Reportes está funcionando');
verificarFecha();
listarReportes();
llenarSelect();


function verificarFecha(){
    let id = '';
    let idReporte = '';
    var FechaHora = new Date();
    var fecha =  FechaHora.getUTCFullYear()+ '/' + ((FechaHora.getMonth()+1)<10?'0'+(FechaHora.getMonth()+1):(FechaHora.getMonth()+1))+ '/' +  (FechaHora.getDate()<10?'0'+FechaHora.getDate():FechaHora.getDate());
    var diaSemana = new Date(fecha).getDay();

    console.log(diaSemana);


    console.log(fecha);

    
    var dia = (new Date(fecha).getDay()-1);

    //console.log(dia);

    let diasRes = (24*60*60*1000) * dia;

    let miliFecha = new Date(fecha).getTime();
    //console.log(miliFecha);
    //console.log(diasRes);
    
    let resta = miliFecha - diasRes;
    //console.log(resta);
   
    let fecha1 = new Date(resta);
    var date = fecha1.getUTCFullYear()+ '/' + ((fecha1.getMonth()+1)<10?'0'+(fecha1.getMonth()+1):(fecha1.getMonth()+1))+ '/' +  (fecha1.getDate()<10?'0'+fecha1.getDate():fecha1.getDate());
    console.log(date);


    if(diaSemana >= 5){

        const Fechas = {
            fecha1: date,
            fecha2:  fecha
        };

        $.post('../php/insertarFecha.php',Fechas,function(response){
            console.log(response);


        });
    }

}



function listarReportes(){

    $.ajax({

        url:'../php/listarReportes.php',
        type: 'GET',
        success: function(respuesta){
            let datos = JSON.parse(respuesta);
         
            let templete ='';    

            //onsole.log(mobs);
            console.log(datos);
            
            datos.forEach(reporte=>{
                
 
                templete += 
                `<tr id="trTabla" class=" align-items-center" id-reporte="${reporte.id_reporte}">
                    <td class="py-2">${reporte.id_reporte}</td>
                    <td class="py-2">${reporte.fecha_reporte}</td>
                    
                    <td>
                    <button class="imprimirR btn btn-outline-info btn-sm ">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-printer-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                         <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5z"/>
                            <path fill-rule="evenodd" d="M11 9H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
                            <path fill-rule="evenodd" d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                        </svg>
                        
                    </button>
                    </td>
                </tr>`               
            })
            $('#reportes').html(templete);
            
        }

    });

   }

function llenarSelect(){

    $.ajax({

        url:'../php/llenar-select.php',
        type: 'GET',
        success: function(respuesta){
            let datos = JSON.parse(respuesta);
         
            let templete ='<option value="" selected disabled>Seleccione el periodo del reporte</option>';    

            //onsole.log(mobs);
            //console.log(datos);
            
            datos.forEach(reporte=>{
                templete += 
                `<option value ="${reporte.id_reporte}">${reporte.fecha_reporte}</option>`               
            })
            $('#SelectBuscarReporte').html(templete);
            
        }

      
    });

  

  

}

$('#buscarR').submit(function(e){

    var reporteSelected = $('#SelectBuscarReporte option:selected').val();
   
    console.log(reporteSelected);
    $('#reporte_id').val(reporteSelected);
    
    if($('#reporte_id').val()==''){

        $('#alertReporte').fadeIn();     
            setTimeout(function() {
                $("#alertReporte").fadeOut();           
            },4000);
        

    }else{

        const idRe = {
            idReporte: reporteSelected
        };
    
        console.log(reporteSelected);
        
        
        $.post('../php/reporte-busqueda.php',idRe,function(respuesta){
    
            let resReporte = JSON.parse(respuesta);
            console.log(resReporte);
            let templete ='';
    
            resReporte.forEach(reporte=>{
                    
     
                templete += 
                `<tr id="trTabla" class=" align-items-center" id-reporte="${reporte.id_reporte}">
                    <td class="py-2">${reporte.id_reporte}</td>
                    <td class="py-2">${reporte.fecha_reporte}</td>
                    
                    <td>
                    <button class="imprimirR btn btn-outline-info btn-sm ">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-printer-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                         <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5z"/>
                            <path fill-rule="evenodd" d="M11 9H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
                            <path fill-rule="evenodd" d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                        </svg>
                        
                    </button>
                    </td>
                </tr>`               
            })
            $('#reportes').html(templete);
        });
        
        
        
    }
    e.preventDefault();

   
});


$(document).on('click','.imprimirR',function(){

       
    
    let elemento = $(this)[0].parentElement.parentElement;
    let id = $(elemento).attr('id-reporte');
    $('#idR').val(id);
   
    //$.post('../reportes/crearPdfTurnos.php',{id},function(respuesta){
        //window.open('../reportes/crearPdfTurnos.php', '_blank');
       //console.log(respuesta);

    //})
   

});









});