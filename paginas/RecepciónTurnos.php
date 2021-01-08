<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    


  
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-datepicker.css">
   
    
    <title>Correspondencia Turnos</title>
  </head>
  
<body style="background-image: url(../Imagenes/fondoPinos.jpg); background-size: cover; background-repeat: no-repeat;">

<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary pl-5 fixed-top" >
      
      
      
        <a class="navbar-brand pl-1 p-1" style="margin-left: 25px;" href="RecepciónTurnos.php"><h4 id="titulo">Recepción de Turnos</h4> </a> 

          <button class="navbar-toggler mr-5 " type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" 
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
       
        
            <div class="collapse navbar-collapse px-2" id="navbarTogglerDemo01"  >
                <div class="navbar-nav w-75 justify-content-center " >

                
                        <a class="nav-item nav-link  " href="Seguimiento.php"  style="margin-right: 0;"><h5>Seguimiento</h5></a>
                        <a class="nav-item nav-link active " href="RecepciónTurnos.php" style="margin-right: 0;"><h5>Recepción de Turnos</h5></a>
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

   
<main>
<div class="conteiner-fluid h-auto " id="contenedorRecepcion" style="display: flex; height: 100%; padding-top: 110px;" >
    <div class="row col-lg pl-0 h-auto px-5" >
        <div class="col-md-1 px-2"></div>
            <div class="col-md-10 ">
                <div class="card border-primary mb-3 " >
                    <div class="card-body   ">
                        <div class="row">
                           
                        </div>
                        <form id="formTurno">
                          <div class="row"> 
                              <div class="col-md-6">
                                    <div class="form-group w-50">
                                        <label class="col-form-label col-form-label-sm" for="no_turno">No. de Turno</label>
                                        <input type="text" class="form-control form-control-sm" id="no_turno"  placeholder="Ingresa el No. de Turno">
                                    </div>
                                    <div class="form-group fechaRe w-50" id="fechaRe">
                                        <label class="col-form-label col-form-label-sm" for="fechaRecibido">Fecha Recibido</label>
                                        <input type="text" autocomplete="off" id="fechaRecibido" class="form-control form-control-sm" placeholder="Seleccione la Fecha"/> 
                                  </div>
                                  <div class="form-group w-50">
                                        <label class="col-form-label col-form-label-sm" for="no._Oficio">No. Oficio</label>
                                        <input type="text" class="form-control form-control-sm" placeholder="Ingrese el No. de Oficio" id="no_oficio">
                                    </div>
                                  <div class="form-group fechaOficio w-50">
                                        <label class="col-form-label col-form-label-sm " for="fechaOficio">Fecha de Oficio</label>
                                        <input type="text" autocomplete="off" id="fechaOficio" class="form-control form-control-sm" placeholder="Seleccione la Fecha del Oficio"/> 
                                  </div>
                                  <div class="form-group w-75">
                                      <label class="col-form-label col-form-label-sm" for="remitente">Remitente</label>
                                      <input type="text" autocomplete="off" id="remitente" class="form-control form-control-sm" placeholder="Ingrese el Remitente"  /> 
                                    </div>
                              </div>
                              <div class="col-md-6 ">
                                  <div class="form-group w-100">
                                      <label class="col-form-label col-form-label-sm" for="asunto">Asunto</label>                            
                                      <textarea class="form-control" id="asunto" rows="3"></textarea> 
                                  </div>

                                  <div class="form-group" id="área" >
                                      <label class="col-form-label col-form-label-sm" >Área</label>
                                        <select class="form-control form-control-sm" id="area">
                                            <option value="" selected disabled>Seleccione el Área</option>
                                            <option value ="1">DESPACHO COORDINADOR</option>
                                            <option value ="2">DIRECCION GENERAL DE CONSULTA  Y NORMATIVIDAD</option>
                                            <option value ="3">DIRECCION GENERAL DE CONTROL Y SEGUIMIENTO A ENTIDADES PARAESTATALES</option>
                                            <option value ="4">LICITACIONES</option>
                                            <option value ="5">SECRETARIA PARTICULAR</option>
                                            <option value ="6">SECRETARIA TECNICA</option>
                                            <option value ="7">TRANSPARENCIA Y ARCHIVO</option>
                                        </select>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-form-label col-form-label-sm" for="no._Oficio">Responsable de Área</label>
                                      <input type="text" autocomplete="off" id="responsable" class="form-control form-control-sm" placeholder="Responsable"/> 
                                  </div>
                                  <div class="form-group  fechaSegui">
                                      <label class="col-form-label col-form-label-sm " for="fecha_segui">Fecha de Envío al Responsable </label>
                                      <input type="text" autocomplete="off" id="fechaSegui" class="form-control form-control-sm"  placeholder="Selecciones la Fecha">
                                  </div>
                                  <div class="form-group ">
                                    <label class="col-form-label col-form-label-sm" >Indique si el turno tendrá contestación</label>
                                      <select class="form-control form-control-sm" id="SNContes">
                                          <option value="" selected disabled>Seleccione Con o Sin Contestación</option>
                                          <option value ="Si">Con Contestación</option>
                                          <option value ="No">Sin Contestación</option>
                                      </select>
                                  </div>
                              </div>
                          </div>

                    <div class="row">  
                      <div class="col-md-12 float-right">
                        <div class="alert alert-success text-center" role="alert" id="correcto"style="display: none;">
                            <svg width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-check-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                            </svg>
                            Turno Agregado Exitosamente! 
                        </div>
                        <div class="alert alert-warning text-center" role="alert" id="campos_vacios" style="display: none;">
                            <svg width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-exclamation-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                            </svg>
                            Los campos no pueden estar vacios!
                        </div>
                        <div class="alert alert-warning text-center" role="alert" id="no_existente" style="display: none;">
                            <svg width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-exclamation-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                            </svg>
                            El No. de turno y/o No. de Oficio ya existe.
                        </div>
                        <div class="alert alert-danger text-center" role="alert" id="error" style="display: none;">
                            <svg width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-x-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                            </svg>
                            oh no! Error al agregar turno. Intentelo de Nuevo.
                        </div>
                        <button type="submit" class="btn btn-outline-primary btn-sm py-3 px-4 float-right"  id="GuardarTurno" >  
                          <strong>Guardar Turno</strong>
                        </button> 
                      </div> 
                    </div>
                  </div>
                </div> 
              </form>      
            </div>
          <div class="col-md-1 px-2"></div>
        </div>
    </div>


  <div class="conteiner-fluid h-auto " id="contenedorSubir" style="display: none; flex; height: 100%; padding-top: 110px;" >
    <div class="row col-lg pl-0 h-auto px-5" >
        <div class="col-md-1 px-2"></div>
            <div class="col-md-10 ">
                <div class="card border-primary mb-3">
                    <div class="card-body">
                        <div class="row ">
                         
                              <div class="col-md-12 ">
                                <form id="formSubir">
                                  <div class="form-group" style="margin: auto;">
                                    <label for="exampleInputFile"><h3>Subir Archivo de Turno</h3></label>
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
    <script src ="../app/mainRecepción.js"></script>
    <script src ="../app/mainLogout.js"></script>
    <script type ="text/javascript" src ="../js/bootstrap-datepicker.js"></script>

  </body>
</html>