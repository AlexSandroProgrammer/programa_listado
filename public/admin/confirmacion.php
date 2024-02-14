<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>CONFIRMACION CAMBIO CONTRASENA</title>
    <link rel="shortcut icon" href="../../controller/image/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../../controller/CSS/confirmacion.css">
    <link rel="shortcut icon" href="controller/image/SENA.png" type="image/x-icon">
</head>

<body>


    <video autoplay loop muted poster="../../controller/image/motos_img.png">
        <source src="../../controller/image/video_motos.mp4" type="video/mp4">
    </video>

    <!-- FORM CONTAINER -->

    <main>
        <div class="container_title">
            <header>ESTIMADO USUARIO <br>EL CAMBIO DE CONTRASEÑA <br> ¡SE HA REALIZADO CON EXITO! </header>
        </div>



            <div class="formulario__grupo formulario__grupo-btn-enviar">

                <a href="index.php" class="return">Aceptar</a>
            </div>
        </form>
    </main>

    <script>
        function maxlengthNumber(obj){

            if(obj.value.length > obj.maxLength){
                obj.value = obj.value.slice(0, obj.maxLength);
                alert("Debe ingresar solo el numeros de digitos requeridos");              
            }
        }
    </script>

    <script>
        function maxcelNumber(obj){

            if(obj.value.length > obj.maxLength){
                obj.value = obj.value.slice(0, obj.maxLength);
                alert("Debe ingresar solo 10 numeros.");              
            }
        }
    </script>
    <!-- FUNCION DE JAVASCRIPT QUE PERMITE INGRESAR SOLO LETRAS -->

    <script>
        function multipletext(e) {
            key=e.keyCode || e.which;

            teclado=String.fromCharCode(key).toLowerCase();

            letras="q wertyuiopasdfghjklñzxcvbnm";

            especiales="8-37-38-46-164-46";

            teclado_especial=false;

            for(var i in especiales){
                if(key==especiales[i]){
                    teclado_especial=true;
                    alert ("Debe ingresar solo letras y espacios en el campo"); 

                    break;
                }
            }

            if(letras.indexOf(teclado)==-1 && !teclado_especial){
                return false;
                alert ("Debe ingresar solo letras y espacios en el campo"); 
            }
        }
    </script>

    <script src="../../controller/JS/crear.js"></script>
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>

</body>

</html>