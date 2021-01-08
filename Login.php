<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <title>Login Correspondencia Estadía Profesional</title>
</head >
<body style="background-image: url(Imagenes/fondoPinos.jpg); background-size: cover; background-repeat: no-repeat;">

<header>

</header>

<main>

  <div class="container " style="display: flex; align-items: center; justify-content: center; padding-top: 100px;" >
    <div class="row col-md ">
      <div class="col-md-4"></div>
      <div class="col-md-4 float" style="width: 350px;" >
        <div  class="card border-primary mb-3 b-0 "  >
          <div class="card-body ">
       
            <form id="login"> 
        
                <div class="form-group text-center" >
                    <img src="Imagenes/LogoH.png" style="width:120px;height:120px;" >
                    

                    
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1" id="lbCorreo">Correo Institucional</label>
                  <input type="email" class="form-control rounded-0" id="correo" aria-describedby="emailHelp" placeholder="Ingresa tu correo">
                  
                </div>
                <div class="input-group mb-1">
                  <label for="exampleInputPassword1" id="lbCorreo" aria-disabled="false" aria-describedby="basic-addon2">Contraseña</label>
                 
                  
                 
                </div>

                <div class="input-group mb-0">
                <input type="password" class="form-control rounded-0 w-50 " id="contraseña" placeholder="Contraseña">
                  <div class="input-group-append ">
                      <span id="show-hide"action="hide" class=" bg-white input-group-text glyphicon glyphicon-eye-open" id="hide-show" role="button">
                        <svg  id="show-eye" width="1.3em" height="1.5em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                          <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                        </svg>

                        <svg  id="hide-eye" style="display: none"width="1.3em" height="1.5em" viewBox="0 0 16 16" class="bi bi-eye-slash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path d="M10.79 12.912l-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
                          <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708l-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829z"/>
                          <path fill-rule="evenodd" d="M13.646 14.354l-12-12 .708-.708 12 12-.708.708z"/>
                        </svg>
                      </span>
                  </div>
                  </div>

                

                <div class="alert alert-danger w-100 p-1 text-center " role="alert"  style="display: none" id="advertencia-incorrectos">
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-octagon" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353L4.54.146zM5.1 1L1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1H5.1z"/>
                    <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z"/>
                    <path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z"/>
                  </svg>
                 
                  Correo y/o Contraseña Incorrectos.
                </div>
                <div class="alert alert-warning w-100 p-1 text-center " role="alert" style="display: none" id="advertencia-campos" >
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-exclamation-octagon" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353L4.54.146zM5.1 1L1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1H5.1z"/>
                    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                  </svg>
                  Campos Correo y/o Contraseña Vacios.
                </div>
               
              
                <div class="form-group text-center mt-4">
                <button type="submit" class="btn btn-primary"  id="btnin" >
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-box-arrow-in-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8.146 11.354a.5.5 0 0 1 0-.708L10.793 8 8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0z"/>
                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 1 8z"/>
                    <path fill-rule="evenodd" d="M13.5 14.5A1.5 1.5 0 0 0 15 13V3a1.5 1.5 0 0 0-1.5-1.5h-8A1.5 1.5 0 0 0 4 3v1.5a.5.5 0 0 0 1 0V3a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v10a.5.5 0 0 1-.5.5h-8A.5.5 0 0 1 5 13v-1.5a.5.5 0 0 0-1 0V13a1.5 1.5 0 0 0 1.5 1.5h8z"/>
                  </svg>
                  Ingresar</button>
                  
                </div>
                <p class="text-primary text-center" style="display: none" id="lbbien">Bienvenido!</p>
                <div class="progress" id="barra" style="display: none">
                  <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                </div>

               
            </form>
            </div>
            </div>
            </div>
            <div class="col-md-4"></div>

        
        </div>
       
        




    </div>
  




</main>

<script src="js/jquery-3.5.1.slim.min.js"></script>
<script src="js/popper.min.js" ></script>
<script src="js/bootstrap.min.js" ></script>
<script src="js/jquery-3.5.1.min.js"></script>

<script src ="app/mainLogin.js"></script>
<script src ="app/mostrar-ocultar-password.js"></script>
    
</body>
</html>