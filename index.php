<?php
    session_start();
    if(!isset($_SESSION['num1'])){
        $_SESSION['num1']='';
        $_SESSION['num2']='';
        $_SESSION['opera']='';
    }

    if (!isset($_POST['opera']) && !isset($_SESSION['revisar'])) {
        if (isset($_POST['numero'])) {
            if (isset($_SESSION['num1'])) {
                $_SESSION['num1'] .= $_POST['numero'];
            } else {
                $_SESSION['num1'] =  $_POST['numero'];
            }
            $_SESSION['ver'] = $_SESSION['num1'];
            /* var_dump($_SESSION['ver']); */
        }
    }else{
        $_SESSION['revisar']=1;
    }

    if (isset($_SESSION['revisar'])) {
        if (isset($_POST['opera'])) {
            $_SESSION['opera']=$_POST['opera'];
            $_SESSION['ver'] .=$_POST['opera'];
        }
        if (isset($_POST['numero'])) {
            if (isset($_SESSION['num2'])) {
                $_SESSION['num2'].= $_POST['numero'];
            } else {
                $_SESSION['num2'] =  $_POST['numero'];
            }
            $_SESSION['ver'] .= $_POST['numero'];
           /*  var_dump($_SESSION['num2']);
            var_dump($_SESSION['ver']); */
        }
    }

    if (isset($_POST['calcular'])) {
        $_SESSION['ver'] ='';
        $num1=$_SESSION['num1'];
        $num2=$_SESSION['num2'];
        //var_dump($_SESSION['num2']);
        $opera=$_SESSION['opera'];
        switch ($opera) {
            case '+':
                $p=$num1+$num2;
                $resultado=$p;
                $_SESSION['ver']=$resultado;
                break;
            case '-':
                $p=$num1-$num2;
                $resultado=$p;
                $_SESSION['ver']=$resultado;
                break;
            case '÷':
                if($num2==0){
                    $error=1;
                    $_SESSION['ver'] = 0;
                    unset($_SESSION['num1']);
                    unset($_SESSION['num2']);
                    unset($_SESSION['opera']);
                    unset($_SESSION['revisar']);
                    break;
                }else{
                    $p=$num1/$num2;
                    $resultado=$p;
                    $_SESSION['ver']=$resultado;
                    break;
                }             
            case 'x':
                $p=$num1*$num2;
                $resultado=$p;
                $_SESSION['ver']=$resultado;
                break;
        }
        unset($_SESSION['num1']);
        unset($_SESSION['num2']);
        unset($_SESSION['opera']);
        unset($_SESSION['revisar']);
    } 

    if (isset($_POST['todo'])) {
        $_SESSION['ver'] = 0;
        unset($_SESSION['num1']);
        unset($_SESSION['num2']);
        unset($_SESSION['opera']);
        unset($_SESSION['revisar']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta type="button" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
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
    input{
        height: 5rem;
        width: 5rem;
        margin: 0.2rem;
        font-size: 2.2rem !important;
        /* background: aqua !important; */
        background: peachpuff !important;
        color: blue !important;
        font-weight: bold !important;
    /*  border: 1px solid yellow !important; */
    } 
    button{
        width: 5rem;
        margin: 0.2rem  !important;
    }
    .tablero{
        width: 98%;
        margin: 0.2rem;
    }
    .letra{
        color: black !important;
        font-weight: bold;
        font-size: 22px  !important;
        padding: 0;
        text-align: center;
    }
    .espacioBoton{
        margin: 1px !important;
    }
    .caja{
        padding: 1rem;
        padding-bottom: 1rem;
        padding-top: 1rem;
        background-color: #D433FF;
        border-radius: 2rem;
    }
    .nombre{
        color: black;
        margin: 0.3rem;
        font-weight: bold;
        font-size: 18px  !important;
    }
    .letraBoton1{
        color: white ;
        font-weight: bold;
        font-size: 22px  !important;
    }
    .letraBoton{
        color: black;
        font-weight: bold;
    }
    </style>
</head>
<body>
<?php  if(isset($error)){?>
    <script><?php echo  "alert('Carajito ya la embarraste. Recuerda que no se puede dividir por cero :(')"; ?> </script>
 <?php }?>
<div class="caja">
    <div class="container d-flex justify-content-center align-items-center flex-column">
        <div class="container d-flex justify-content-center align-items-center flex-colun">
            <?php  if(isset($_SESSION['correo'])){?>
                <p class="nombre"><?php echo  "Hola ".$_SESSION['nombre']." buen día :)"; ?> </p>
            <?php }?>
            <a href="salir.php"><button class="btn btn-warning tablero letraBoton" name="uno">Cerrar sesión</button></a>
        </div>
        
    <form method="POST"> 
        <table>
            <tr> 
                <td  colspan="4"><input class="btn btn-light letra tablero" type="text" name="resultado" value="<?php  if(isset($_SESSION['ver'])){?> <?php echo $_SESSION['ver'] ?> <?php } ?>"></td>
            </tr>
            <tr>
                <td><input class="btn btn-light" type="submit" name="numero" value="7"></td>
                <td><input class="btn btn-light" type="submit" name="numero" value="8"></td>
                <td><input class="btn btn-light" type="submit" name="numero" value="9"></td>
                <td><input class="btn btn-light" type="submit" name="opera" value="÷"></td>
            </tr>
            <tr>
                <td><input class="btn btn-light" type="submit" name="numero" value="4"></td>
                <td><input class="btn btn-light" type="submit" name="numero" value="5"></td>
                <td><input class="btn btn-light" type="submit" name="numero" value="6"></td>
                <td><input class="btn btn-light" type="submit" name="opera" value="x"></td>
            </tr>
            <tr>
                <td><input class="btn btn-light" type="submit" name="numero" value="1"></td>
                <td><input class="btn btn-light" type="submit" name="numero" value="2"></td>
                <td><input class="btn btn-light" type="submit" name="numero" value="3"></td>
                <td><input class="btn btn-light" type="submit" name="opera" value="-"></td>
            </tr>
            <tr>
                <td><input class="btn btn-light" type="submit" name="numero" value="."></td>
                <td><input class="btn btn-light" type="submit" name="numero" value="0"></td>
                <td><input class="btn btn-light" type="submit" name="calcular" value="="></td>
                <td><input class="btn btn-light" type="submit" name="opera" value="+"></td>
            </tr>
            <tr>
                <td class="espacioBoton" colspan="4"><button type="submit" class="btn btn-primary tablero letraBoton1" name="todo">C</button></td>
            </tr>
        </table>   
    </form>  
    </div>
</div>

<script>

</script>
</body>
</html>