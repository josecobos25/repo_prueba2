<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    

  
    
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-datepicker.css">
 
    <title>Reportes Equipos de Cómputo</title>
  </head>
  
<body style=" background: url(../Imagenes/fondo3.jpg) no-repeat center center fixed; background-size: cover;">

<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-0 fixed-top" >
      
      
    <a href="IndexAdministrador.html" ></ahref><img src="../Imagenes/LogoH.png" width="60" height="65" class="d-inline-block align-top navbar-brand ml-4 mr-2 py-1" alt="" loading="lazy"></a> 
        <a class="navbar-brand p-2" style="margin-right: 30px;" href="IndexAdministrador.html" >
          
          Inventario</a> 


          <button class="navbar-toggler mr-5 " type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" 
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
       
        
            <div class="collapse navbar-collapse h-50" id="navbarTogglerDemo01"  >
                <div class="navbar-nav p-2" >
                        <a class="nav-item nav-link  " href="../Administrador/IndexAdministrador.php"  style="margin-right: 0;">Principal</a>
                        <a class="nav-item nav-link  " href="../Administrador/AdminMobiliario.php" style="margin-right: 0;">Mobiliario</a>
                        <a class="nav-item nav-link" href="../Administrador/AdminEquiposdeCómputo.php"  style="margin-right: 0;">Equipos de Computo</a>
                        <a class="nav-item nav-link " href="../Administrador/AdminUsuarios.php" style="margin-right: 0;">Administrar Usuarios</a>
                        <li class="nav-item dropdown" style="margin-right: 0;">
                          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Reportes</a>
                            <div class="dropdown-menu">
                            <a class="dropdown-item" href="ReportesMob.php">Mobiliario</a>
                                <a class="dropdown-item active" href="ReportesEquipo.php">Equipos de Cómputo</a>
                                <a class="dropdown-item" href="ReportesUsuarios.php">Usuarios</a>
                                <a class="dropdown-item" href="ConsultarReportes.php">Consultar Reportes</a>
                            </div>
                       </li>

                       
                 
      
      
                          <div class="navbar-nav dropdown mx-3" >
                              <a class="nav-item nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" 
                              aria-haspopup="true" aria-expanded="false"  style="margin:  0;">
                              <svg width="1em" height="1em" viewBox="0 2 15 15" class="bi bi-person-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                </svg>
                                <?php
                                  include ('../php/Sesion-Activa.php');

                                ?>
                              </a>
                              <div class="dropdown-menu" aria-labelledby="navbarDropdown" >
                               
                                <!--<div class="dropdown-divider"></div>-->
                                <form id="cerrar-sesion">
                                  <button   class="btn btn-secondary btn-lg p-2 ml-2 h-50" type="submit">
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
  <div class="container-fluid h-auto" style="display: flex; height: 100%; padding-top: 65px;" >
    <div class="row col-lg pl-0 h-auto ">
      <div class="col-md-3 pl-3 pt-5 pr-0" >
      <div  class="card text-white bg-dark mb-3 "  >
          <div class="card-body ">
            <div class="text-center"><p>Datos de Reporte Equipos de Cómputo<p></div>
          
            <form id="reporteMob"> 


            <div class="row  justify-content-center h-100">
             
             
              <div class="col-md" id="div1">
                <div class="form-group">
                      <label for="tipoReporte" id="lbTipoReporte">Tipo de Reporte</label>
                        <select class="form-control" id="tipoReporte">
                        <option value="" selected disabled>Selecciona el Tipo de Reporte</option>
                           
                          <option value="altas">Altas</option>
                          <option value="bajas">Bajas</option>
                         
                        </select>
                    </div>

                    <div class="form-group" id="periodoReporte" >
                      <label for="periodoReporte" id="lbTipoReporte">Periodo</label>
                        <select class="form-control" id="periodoReporte">
                        <option value="" selected disabled>Seleccione el periodo del Reporte</option>
                          <option value ="Anual">Anual</option>
                          <option value ="Mensual">Mensual</option>
                      
                        </select>
                    </div>
               
                    <div class="form-group mesCal" id="mesCal" style="display:none" >
                      <label for="añoReporte" id="lbTipoReporte" >Año y Mes</label>
                        <input type="text" autocomplete="off" id="mes" class="form-control" placeholder="Seleccione Año y Mes"/>    
                    </div>

                    <div class="form-group añoCal" id="añoCal" style="display:none" >
                      <label for="añoReporte" id="lbTipoReporte" >Año</label>
                        <input type="text" autocomplete="off" id="año" class="form-control" placeholder="Seleccione Año"/>
                         
                        
                    </div>
                    
              </div>
              
          
              </div>

              <div class="alert alert-warning" role="alert" id="SinRegistros" style="display: none;">
              <svg width="1.3em" height="1.3em" viewBox="0 0 17 17" class="bi bi-exclamation-octagon" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353L4.54.146zM5.1 1L1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1H5.1z"/>
                    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                  </svg>
                No se encontraron Registros
            </div> 
               
              <div class="row m-0" style="display:felx;">   
                <div class="form-group text-center col-sm-6 pl-0 pr-1 w-100">
                  <button type="submit" class="btn btn-success btn-sm py-3 px-2"  id="btnBuscarRe" >
                  
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                      <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                    </svg>
                    Buscar Registros
                 </button> 
                </div>
               
          
               
               
            </form>

            <form  target="_blank" action="crearPdfEquipos.php" method="POST"> 
              <div class="form-group text-center  col-sm p-0 ">
                    <button type="submit" class="btn btn-info  btn-sm p-3 "  id="btnReporte" >
                      <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-card-list" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                        <path fill-rule="evenodd" d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5z"/>
                        <circle cx="3.5" cy="5.5" r=".5"/>
                        <circle cx="3.5" cy="8" r=".5"/>
                        <circle cx="3.5" cy="10.5" r=".5"/>
                      </svg>
                      Generar Reporte
                    </button> 
              </div>
          
            </div>
                <input type="text" name = "tipoR" id="tipoR" class="form-control" style="display: none;"/>
                <input type="text" name = "periodoR" id="periodoR" class="form-control" style="display: none;"/>
                <input type="text" name = "añomesR" id="añomesR" class="form-control" style="display: none;"/>
                <input type="text" name = "añoR" id="añoR" class="form-control" style="display: none;"/>
                <input type="text" name = "tablaR" id="tablaR" class="form-control" style="display: none;"/>

            </form> 

            

          
          </div>
        </div>


      </div>
      <div class="col-md-9 pt-2" >

        <div class="card-body  text-center text-dark p-0 " >
            <div class="row m-2" style="display:felx;">
              <div class="col-md" id="titulo" style="display:none;">
                <h3 id="tituloRe"></h3>
              </div>

            
        
        
        <table class="table-active table table-sm table-hover " id="TableMob">
         

       
          <thead class="bg-dark w-100 " id="thead" style="color: white; display:none;">
            <tr class=" text-center"  >
              <th scope="row" > Id</th>
              <th scope="row" > Numero de Inventario</th>
              <th scope="row"> Descripcion</th>
              <th scope="row"> Responsable</th>
              <th scope="row"> Fecha </th>
              
            

            </tr>
          </thead>
          <tbody id="Equipos" ></tbody>
        </table>

        </div>
        
      </div>
       


</main>








<footer>

</footer>






    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src ="../app/mainReportes.js"></script>
    <script src ="../app/mainLogout.js"></script>
    <script type ="text/javascript" src ="../js/bootstrap-datepicker.js"></script>
  
  
  </body>
</html>