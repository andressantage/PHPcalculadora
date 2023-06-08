<?php
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
<style>
        *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    body{
        /* background-color: yellow; */
        background: linear-gradient(45deg, red, orange, yellow, green, blue, indigo, violet);
        background-size: 400% 400%;
        animation: arcoiris 12s ease infinite;
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    @keyframes arcoiris {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }
    .rojo{
        color: red;
        text-align: center;
    }
    </style>
</head>
<body>
    
    <form action="validar.php" method="POST"> 
        <div class="container d-flex justify-content-center align-items-center">
            <div class="card border-primary mb-3" style="max-width: 18rem;">
                <div class="card-header text-dark"><h5 class="card-title">Iniciar sesión</h5></div>
                <div class="card-body text-primary">
                    <!-- <p class="card-text"> -->
                        <?php  if(isset($_GET['error'])){?>
                            <p class="rojo"><?php echo "Correo o contraseña incorrectos!" ?> </p>
                        <?php }?>
                        <div class="form-group">
                            <label for="correo">Correo:</label>
                            <input type="email" class="form-control" name="correo" id="correo" placeholder="Ingresa tu correo">
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña:</label>
                            <input type="password" class="form-control" name="password" id="contra" placeholder="Ingresa tu contraseña">
                        </div>
                        <div class="d-flex justify-content-center align-items-center flex-column">
                            <a class="mb-2" href="cuenta.php">¿No tienes cuenta?</a>
                            <input type="submit" class="btn btn-primary" value="Ingresar">
                        </div>
                   <!--  </p> -->
                </div>
            </div>
        </div>
    </form>

</body>
</html>
