<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    


  
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-datepicker.css">
   
    
    <title>Correspondencia Seguimiento de Turnos</title>
  </head>
  
<body style="background-image: url(../Imagenes/fondoPinos.jpg); background-size: cover; background-repeat: no-repeat;">

<header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary pl-5 fixed-top" >
      
      
      
      <a class="navbar-brand pl-1 p-1" style="margin-left: 25px;" href="Seguimiento.php"><h4 id="titulo">Seguimiento de Turnos</h4> </a> 

        <button class="navbar-toggler mr-5 " type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" 
          aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
     
      
          <div class="collapse navbar-collapse px-2" id="navbarTogglerDemo01"  >
              <div class="navbar-nav w-75 justify-content-center " >

              
                      <a class="nav-item nav-link active " href="Seguimiento.php"  style="margin-right: 0;"><h5>Seguimiento</h5></a>
                      <a class="nav-item nav-link  " href="RecepciónTurnos.php" style="margin-right: 0;"><h5>Recepción de Turnos</h5></a>
                      <a class="nav-item nav-link " href="ReportesTurnos.php"  style="margin-right: 0;"><h5>Reportes</h5></a>
              
                        
    
              
              </div>
              <div class="navbar-nav p-2 justify-content-center " style="width: 200px" >
              <div class="navbar-nav dropdown  w-100 float-left" >
            
                            <a class="nav-item nav-link dropdown-toggle float-left w-100 " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                            <svg width="1.4em" height="1.4em" viewBox="0 0 15 15" class="bi bi-person-fill float-left mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                              </svg>
                              <h5 class="float-left mr-2"><?php include ('../php/Sesion-Activa.php');?></h5>
                              
                            </a>
                            
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown" >
                             
                              <!--<div class="dropdown-divider"></div>-->
                              <form id="cerrar-sesion">
                                <button   class="btn btn-info p-2 ml-2 h-50" type="submit">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-door-open-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                      <path fill-rule="evenodd" d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2v13h1V2.5a.5.5 0 0 0-.5-.5H11zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/>
                                    </svg>  
                                  Cerrar Session
                                </button>
                              </form>
                            </div>
                          </div>
              </div>

            
              
          </div>
    
      
  </nav>


</header>

   
<main >
 

  <div class="conteiner-fluid"  style="padding-top: 120px; " id="contenedor1">
    <div class="row justify-content-center"  >
      <div class="col-md-3">
        <div class="card  border-primary ml-3 mb-3 " >
            <form class="FormbuscarTurno">
              <div class="row m-2"  >
                  <div class="input-group w-100 m-2" id="DivbuscarTurno">   
                      <input type="text" autocomplete="off" id="buscarTurno" class="form-control form-control-sm w-75" placeholder="Buscar Turno...."/>
                        <div class="input-group-append">
                          <span class="bg-white input-group-text " id="basic-addon2">
                          <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                            <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                          </svg>
                         </span>
                      </div>
                    <div class="input-group">
                  
                    </div>
                  </div>             
              </div>
            </form>
            <form class="FormbuscarTurno">
              
                  <div class="input-group w-100 ">        
                    <div class="form-group w-100 " id="buscarEstatus">
                       <label class="col-form-label col-form-label-md" >Buscar por Estatus del Turno</label>
                         <select class="form-control form-control-sm w-100" id="BuscarEstatus">
                             <option value="" selected disabled>Seleccione el estatus</option>
                             <option value ="EN PROCESO">TURNOS EN PROCESO</option>
                             <option value ="COMPLETADO">TURNOS COMPLETADOS</option>
                             <option value ="PENDIENTE">TURNOS PENDIENTES</option>
                         </select>
                     </div>
                  </div>             
              
            </form>

            <div class="row mx-2">
                  <div class="input-group w-100 mx-2">        
                    <div class="form-group w-100 text-center" id="btnDescargar">
                       <label class="col-form-label col-form-label-md w-100" >Descargar Archivos</label>
                       <button type="submit" class=" descargar btn btn-outline-primary w-100 ">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                          <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                        </svg>
                       Descargar</button>
                     </div>
                     <div class="DesRecep form-group w-100 text-center" id="DesRecep" style="display: none;">
                       <label class="col-form-label col-form-label-md w-100" >Descargar Recepciones</label>
                       <button type="submit" class=" descargar btn btn-outline-primary w-100 ">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                          <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                        </svg>
                       Mostrar lista</button>
                     </div>
                     <div class="DesContes form-group w-100 text-center" id="DesContes" style="display: none;">
                       <label class="col-form-label col-form-label-md w-100" >Descargar Contestaciónes</label>
                       <button type="submit" class=" descargar btn  btn-outline-primary w-100 ">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                          <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                        </svg>
                       Mostrar lista </button>
                     </div>
                     <div class="form-group w-100 text-center " id="btnRegresar" style="display: none;">
                       <label class="col-form-label col-form-label-md w-100" >Regresar a los turnos</label>
                       <button type="submit" class=" regresar btn btn-outline-success w-100 ">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                      </svg>
                       Regresar</button>
                     </div>
                     
                  </div>             
              </div>

        </div>
        
        <div class="card text-white border-primary ml-3 mb-3 " id="contarTurnos">
            
              
                <div class="col-sm mt-3">
                  <div class="alert alert-success h-25 p-0" role="alert">
                    <label class="mx-2 mt-3"><h6>Turnos Completados  = </h6></label>
                    <label ><h6 id="TCompletados"></h6></label>
                  </div>   
                </div>
              

              
                <div class="col-sm ">
                  <div class="alert alert-danger  h-25 p-0" role="alert">
                  
                    <label class="mx-2 mt-3"><h6>Turnos Pendientes  = </h6></label>
                    <label><h6 id="TPendientes"></h6></label>
               
                  </div>
                </div>
          
              
              
                <div class="col-sm ">
                  <div class="alert alert-light  h-25 p-0" role="alert">
                    <label class="mx-2 mt-3"><h6>Turnos En Proceso  = </h6></label>
                    <label> <h6 id="TEnProceso"></h6></label>
                  </div>
                  
                 
                </div>



                        
        </div>
      </div>
      <div class="col-md-9 px-5 " >

        <table class="table table-hover table-sm text-center" id="tabla">
          <thead>
            <tr class=" navbar-dark bg-primary text-light">
              <th scope="col">No. Turno</th>
              <th scope="col">No. Oficio</th>
              <th scope="col">Responsable</th>
              <th scope="col">Estatus</th>
              <th scope="col">Operaciones</th>
            </tr>
          </thead>
          <tbody id="turnos">
          </tbody>
        </table> 

        <table class="table table-hover table-sm text-center" style="display: none;" id="archivosRecep">
        
            <thead>
              <tr class="navbar-dark bg-primary text-light">
                <th scope="col" width="7%">No.</th>
                <th scope="col" width="70%">Nombre del Archivo</th>
                <th scope="col" width="13%">Descargar</th>
                
              </tr>
            </thead>
            <tbody>
          <?php
          $archivos = scandir("../TurnosArchivos/TurnosRecepción");
          $num=0;
          for ($i=2; $i<count($archivos); $i++)
          {$num++;
          ?>
          <p>  
          </p>
                  
              <tr class="table-secondary">
                <th scope="row"><?php echo $num;?></th>
                <td><?php echo $archivos[$i]; ?></td>
                <td><a title="Descargar Archivo" href="../TurnosArchivos/TurnosRecepción/<?php echo $archivos[$i]; ?>" download="<?php echo $archivos[$i]; ?>" style="color: blue; font-size:18px; "> 
                
                  <button type="button" class="btn btn-success btn-sm">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                      <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                    </svg>              
                  </button>
                 </a></td>
               
              </tr>
          <?php }?> 

            </tbody>
         
        </table> 
        <table class="table table-hover table-sm text-center" style="display: none;" id="archivosContes">
        
        <thead>
          <tr class="navbar-dark bg-primary text-light">
            <th scope="col" width="7%">No.</th>
            <th scope="col" width="70%">Nombre del Archivo</th>
            <th scope="col" width="13%">Descargar</th>
            
          </tr>
        </thead>
        <tbody>
      <?php
      $archivos = scandir("../TurnosArchivos/TurnosContestación");
      $num=0;
      for ($i=2; $i<count($archivos); $i++)
      {$num++;
      ?>
      <p>  
      </p>
              
          <tr class="table-secondary">
            <th scope="row"><?php echo $num;?></th>
            <td><?php echo $archivos[$i]; ?></td>
            <td><a title="Descargar Archivo" href="../TurnosArchivos/TurnosContestación/<?php echo $archivos[$i]; ?>" download="<?php echo $archivos[$i]; ?>" style="color: blue; font-size:18px; "> 
            <button type="button" class="btn btn-success btn-sm">
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                    <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                  </svg>              
            </button>
              
             </a></td>
           
          </tr>
      <?php }?> 

        </tbody>
     
    </table> 
      </div>




    </div>

  </div>






  <div class="conteiner-fluid"  style="padding-top: 100px; display: none;" id="contenedor2" >
      <div class="row justify-content-center mx-2">
          <div class="col-md-12">
              <div class="card border-primary mb-3 " >
                      <div class="card-body ml-5">
                        <form id="formActualizarTurno">
                          <div class="row">
                              <div class="col-md-4">
                                  <div class="form-group w-75" style="display: none;">
                                      <label class="col-form-label col-form-label-sm" for="id_turno" >id_turno</label>
                                      <input type="text" class="form-control form-control-sm" id="id_turno"  placeholder="">
                                  </div>
                                  <div class="form-group w-75">
                                      <fieldset>
                                        <label class="col-form-label col-form-label-sm" for="no_turno">No. de Turno</label>
                                        <input type="text" class="form-control form-control-sm" id="no_turno" readonly="" placeholder="">
                                      </fieldset>
                                  </div>
                                  <div class="form-group fechaRe w-75" id="fechaRe">
                                      <label class="col-form-label col-form-label-sm" for="fechaRecibido">Fecha Recibido</label>
                                      <input type="text" autocomplete="off" id="fechaRecibido" readonly="" class="form-control form-control-sm" placeholder=""/> 
                                  </div>
                                  <div class="form-group w-75">
                                      <label class="col-form-label col-form-label-sm" for="no._Oficio">No. Oficio</label>
                                      <input type="text" class="form-control form-control-sm"  readonly="" placeholder="" id="no_oficio">
                                  </div>
                                  <div class="form-group fechaOficio w-75">
                                      <label class="col-form-label col-form-label-sm " for="fechaOficio">Fecha de Oficio</label>
                                  <input type="text" autocomplete="off" id="fechaOficio" readonly="" class="form-control form-control-sm" placeholder=""/> 
                                  </div>
                                  <div class="form-group w-75">
                                      <label class="col-form-label col-form-label-sm" for="remitente">Remitente</label>
                                      <input type="text" autocomplete="off" id="remitente" readonly="" class="form-control form-control-sm" placeholder=""/> 
                                  </div>
                                  <div class="form-group w-75">
                                      <label class="col-form-label col-form-label-sm" for="asunto">Asunto</label>                            
                                      <textarea class="form-control" id="asunto" readonly="" rows="3"></textarea> 
                                  </div>
                                  
                              
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group w-75">
                                      <label class="col-form-label col-form-label-sm" for="area">Área</label>
                                      <input type="text" class="form-control form-control-sm"  readonly="" id="area"  placeholder="">
                                  </div>
                                  <div class="form-group w-75">
                                      <label class="col-form-label col-form-label-sm" for="responsable">Responsable </label>
                                      <input type="text" class="form-control form-control-sm"  readonly="" id="responsable"  placeholder="">
                                  </div>
                                  <div class="form-group fechaRe w-75" id="fechaRe">
                                      <label class="col-form-label col-form-label-sm" for="fecha1Segui">Fecha de Envío al Responsable</label>
                                      <input type="text" autocomplete="off" id="fecha1Segui"  readonly="" class="form-control form-control-sm" placeholder=""/> 
                                  </div>
                                  <div class="form-group w-75 fecha_acuseReci">
                                      <label class="col-form-label col-form-label-sm" for="fecha_acuse">Fecha Recibido Seguimiento</label>
                                      <input type="text" class="form-control form-control-sm" placeholder="" id="fecha_acuseReci">
                                  </div>
                                  <div class="form-group fechaOficio w-75 fechaOficioReci">
                                      <label class="col-form-label col-form-label-sm " for="fechaOficioReci">Fecha de Oficio Recibido</label>
                                  <input type="text" autocomplete="off" id="fechaOficioReci" class="form-control form-control-sm" placeholder=""/> 
                                  </div>

                                  <div class="form-group w-75 fecha_oficio_contes">
                                      <label class="col-form-label col-form-label-sm fecha_oficio_contes" for="fecha_oficio_contes">Fecha de Oficio de Contestación</label>
                                      <input type="text" class="form-control form-control-sm" id="fecha_oficio_contes"  placeholder="">
                                  </div>

                                  <div class="form-group w-75 no_oficio_contes">
                                      <label class="col-form-label col-form-label-sm" for="no_oficio_contes">No. Oficio Contestación</label>
                                      <input type="text" class="form-control form-control-sm" id="no_oficio_contes"  placeholder="">
                                  </div>
                                
                                  
                              
                              </div>
                              <div class="col-md-4">
                                  
                                  <div class="form-group  w-75 destinatario" >
                                      <label class="col-form-label col-form-label-sm" for="destinatario">Destinatario</label>
                                      <input type="text" autocomplete="off" id="destinatario" class="form-control form-control-sm" placeholder=""/> 
                                  </div>
                                  <div class="form-group w-75 contestacion">
                                      <label class="col-form-label col-form-label-sm" for="contestacion">Contestación</label>
                                      <textarea class="form-control" id="contestacion" rows="3"></textarea> 
                                  </div>
                                  <div class="form-group observaciones w-75">
                                      <label class="col-form-label col-form-label-sm " for="fechaOficio">Observaciones</label>
                                      <textarea class="form-control" id="observaciones" rows="3"></textarea>
                                  </div>

                                  <div class="form-group w-75">
                                      <label class="col-form-label col-form-label-sm" for="remitente">Porcentaje de Avance</label>
                                      <input type="text" autocomplete="off" id="porcentaje"readonly="" class="form-control form-control-sm" placeholder=""/> 
                                  </div>
                                  <div class="form-group w-75">
                                      <label class="col-form-label col-form-label-sm" for="estatus">Estatus</label>
                                      <input type="text" autocomplete="off" id="estatus" readonly="" class="form-control form-control-sm" placeholder=""/> 
                                  </div>

                                  <div class="form-group w-75">
                                      <label class="col-form-label col-form-label-sm" for="SNContes">SNContes</label>
                                      <input type="text" autocomplete="off" id="SNContes" readonly="" class="form-control form-control-sm" placeholder=""/> 
                                  </div>
                                  <div class="form-group ">
                                    <label class="col-form-label col-form-label-sm" >Indique si el turno tendrá contestación</label>
                                      <select class="form-control form-control-sm" id="SN">
                                          <option value="" selected disabled>Seleccione Con o Sin Contestación</option>
                                          <option value ="Si">Con Contestación</option>
                                          <option value ="No">Sin Contestación</option>
                                      </select>
                                  </div>
                                  
                              
                              </div>

                              
                            

                          
                          </div>

                              <div class="alert alert-success text-center" role="alert" id="correcto" style="display: none;">
                                  <svg width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-check-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                  </svg>
                                Turno Actualizado Exitosamente! 
                              </div>
                              <div class="alert alert-warning text-center" role="alert" id="campos_vacios" style="display: none;" >
                                  <svg width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-exclamation-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                                  </svg>
                                Los campos no pueden estar vacios!
                              </div>
                              <div class="alert alert-warning text-center" role="alert" id="no_existente" style="display: none;" >
                                  <svg width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-exclamation-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                                  </svg>
                                El No. de Oficio de Contestación ya existe.
                              </div>
                              <div class="alert alert-danger text-center" role="alert" id="error" style="display: none;">
                                  <svg width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-x-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                                  </svg>
                                oh no! Error al actualizar turno. Intentelo de Nuevo.
                              </div>

                              <button type="submit" class="btn btn-outline-primary btn-md py-3 px-4 float-right mr-2 mb-2">
                                <strong>Actualizar Turno</strong>
                              </button>
                              </form> 
                              <button type="submit" class=" cancelar btn btn-outline-danger btn-md py-3 px-4 float-right mr-2 mb-2"  id="cancelar" >
                                <strong>Cancelar</strong>
                              </button> 

                              
                          



                          
                      </div>
              </div>
          </div>
      </div>
  </div>


  <div class="conteiner-fluid h-auto " id="contenedorSubirContes" style="display: none; flex; height: 100%; padding-top: 110px;" >
    <div class="row col-lg pl-0 h-auto px-5" >
        <div class="col-md-1 px-2"></div>
            <div class="col-md-10 ">
                <div class="card border-primary mb-3">
                    <div class="card-body">
                        <div class="row ">
                         
                              <div class="col-md-12 ">
                                <form id="formSubirContes">
                                  <div class="form-group" style="margin: auto;">
                                    <label for="exampleInputFile"><h3>Subir Archivo de Contestación</h3></label>
                                    <input type="file" class="form-control-file " id="turnoFile" name="turnoFile" aria-describedby="fileHelp">
                                    <small id="fileHelp" class="form-text text-muted mt-2">Seleccione el archivo correspondiente al turno agregado anteriormente en formato PDF o RAR y renombrelo con el No. de Turno.</small>
                                  </div>
                                  <button class="btn btn-primary mt-2" type="submit" name="subir">Cargar Archivo</button>

                                  <div class="col-md-12 float-right">
                                    <div class="alert alert-success text-center mt-3" role="alert" id="archivo-correcto" style="display: none;">
                                        <svg width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-check-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                          <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                        </svg>
                                        Archivo Subido Exitosamente. 
                                    </div>
                                    <div class="alert alert-warning text-center mt-3" role="alert" id="archivo-existente" style="display: none;">
                                      <svg width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-exclamation-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                                      </svg>
                                      El archivo que intenta subir ya existe.
                                    </div>
                                    <div class="alert alert-warning text-center mt-3" role="alert" id="formato-no" style="display: none;">
                                      <svg width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-exclamation-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                                      </svg>
                                      El archivo tiene un formato no admitido, solo se permite PDF y RAR.
                                    </div>
                                    <div class="alert alert-warning text-center mt-3" role="alert" id="archivo-no" style="display: none;">
                                      <svg width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-exclamation-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                                      </svg>
                                      No se ha seleccionado ningun archivo a subir.
                                    </div>
                                    <div class="alert alert-danger text-center" role="alert" id="error-archivo" style="display: none;">
                                      <svg width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-x-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                                      </svg>
                                      oh no! Error al subir archivo, Intentelo de nuevo.
                                    </div>
                                </form>
                              </div>
                         
                           
                        </div>
                    </div>
                  </div>
              </div>
            </div>
  </div>






    


</main>


<footer>

</footer>






    <script src="../js/jquery-3.5.1.slim.min.js"></script>
    <script src="../js/popper.min.js" ></script>
    <script src="../js/bootstrap.min.js" ></script>
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src ="../app/mainSeguimiento2.js"></script>
    <script src ="../app/mainLogout.js"></script>
    <script src ="../js/moment.min.js"></script>
    <script type ="text/javascript" src ="../js/bootstrap-datepicker.js"></script>
  
  </body>
</html>