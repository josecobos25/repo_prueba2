<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    


  
    <link rel="stylesheet" href="../css/bootstrap.min.css">
   
    
    <title>Correspondencia Reportes</title>
  </head>
  
<body style="background-image: url(../Imagenes/fondoPinos.jpg); background-size: cover; background-repeat: no-repeat;">

<header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary pl-5 fixed-top" >
      
      
      
      <a class="navbar-brand pl-1 p-1" style="margin-left: 25px;" href="ReportesTurnos.php"><h4>Generar Reporte de Turnos</h4> </a> 

        <button class="navbar-toggler mr-5 " type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" 
          aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
     
      
          <div class="collapse navbar-collapse px-2" id="navbarTogglerDemo01"  >
              <div class="navbar-nav w-75 justify-content-center " >

              
                      <a class="nav-item nav-link " href="Seguimiento.php"  style="margin-right: 0;"><h5>Seguimiento</h5></a>
                      <a class="nav-item nav-link  " href="RecepciónTurnos.php" style="margin-right: 0;"><h5>Recepción de Turnos</h5></a>
                      <a class="nav-item nav-link  active" href="ReportesTurnos.php"  style="margin-right: 0;"><h5>Reportes</h5></a>
              
                        
    
              
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
 

  <div class="conteiner-fluid"  style="padding-top: 120px;" >
    
    <div class="row justify-content-center"  >
      <div class="col-md-3">
        <div class="card border-primary ml-3 mb-3 " >           
              <div class="row mt-3">
                <div class="mx-auto"><p>Buscar Reporte</p>
                </div>
             </div>
            <form class="FormbuscarReporte" id="buscarR">
            
                <div class="form-group mx-3 h-50" id="reporteBuscar" >
                <select class="form-control form-control-sm" id="SelectBuscarReporte">
                
                </select>
                    
                </div>

                <input type="text" name = "reporte_id" id="reporte_id" class="form-control" style="display: none;" />
                <div class="alert alert-warning mx-3" role="alert" style="display: none;" id="alertReporte">
                <svg width="1.3em" height="1.3em" viewBox="0 0 17 17" class="bi bi-exclamation-octagon" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353L4.54.146zM5.1 1L1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1H5.1z"/>
                    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                  </svg>
                  Debe de seleccionar el periodo!
                </div>
                


                <div class="form-group text-center  col-sm p-0 ">
                    <button type="submit" class="btn btn-info  btn-sm p-2 btnReporte"  id="btnReporte">
                      <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                        <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                      </svg>
                      Buscar Reporte
                    </button> 
              </div>
            </form>
        </div>
      
      </div>
      <div class="col-md-9 px-5 ">
<form target="_blank" action="../ReportesPDF/crearReporte.php" method="POST">
      <input type="text" name = "idR" id="idR" class="form-control" style="display: none;"/>

  <table class="table table-secondary table-sm text-center">
    <thead>
      <tr class="navbar-dark bg-primary text-light">
        <th scope="col">No. de Reporte</th>
        <th scope="col">Periodo </th>
        <th scope="col">Imprimir Reporte</th>
      </tr>
    </thead>
    <tbody id="reportes">

   
    
    </tbody>
  </table> 


</form>




        
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
    <script src ="../app/mainReportes.js"></script>
    <script src ="../app/mainLogout.js"></script>
    <script src ="../js/moment.min.js"></script>
  
  </body>
</html>