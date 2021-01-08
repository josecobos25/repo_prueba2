<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    


  
    <link rel="stylesheet" href="../css/bootstrap.min.css">
   
    
    <title>Correspondencia</title>
  </head>
  
<body class="img-fluid" style=" background: url(../Imagenes/fondo1.jpg)">

<header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary pl-5 fixed-top" >
      
      
      
      <a class="navbar-brand pl-1 p-1" style="margin-left: 25px;" href="IndexAdministrador.html"><h4>Correspondencia</h4> </a> 

        <button class="navbar-toggler mr-5 " type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" 
          aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
     
      
          <div class="collapse navbar-collapse px-2" id="navbarTogglerDemo01"  >
              <div class="navbar-nav w-75 justify-content-center " >

              
                      <a class="nav-item nav-link active " href="index.php"  style="margin-right: 0;"><h5>Seguimiento</h5></a>
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
 

  <div class="conteiner-fluid"  style="padding-top: 120px;" >
    
    <div class="row justify-content-center"  >
    
      <div class="col-md-12 px-4">

      <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">No. Turno</th>
      <th scope="col">No. Oficio</th>
      <th scope="col">Remitente</th>
      <th scope="col">Asunto</th>
      <th scope="col">Área</th>
      <th scope="col">Responsable</th>
      <th scope="col">Fecha_Seguimiento</th>
      <th scope="col">Operaciones</th>
      
      
    </tr>
  </thead>
  <tbody>
    <tr class="table-active">
      <th scope="row">Active</th>
      <td>Column content</td>
      <td>Column content</td>
      <td>Column content</td>
    </tr>
    
  </tbody>
</table> 







        
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
    <script src ="../app/mainAdminMob.js"></script>
    <script src ="../app/mainLogout.js"></script>
  
  </body>
</html>