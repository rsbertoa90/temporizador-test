<!-- EL EJEMPLO USA UN ESQUEMA EN LA DB QUE SE LLAMA TEST
DENTRO DE ESE ESQUEMA HAY UNA TABLA QUE SE LLAMA TEST_TABLE
Y ESTA TABLA TIENE DOS CAMPOS, UN ID, Y UN VAR_FIELD, ESTE ULTIMO
CONTIENE EL VALOR QUE SE ESTA RECUPERANDO EN EL TEMPORIZADOR -->
<?php
  require_once('function.php');
  $var = getValue();

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Tester</title>
    <style media="screen">
          span {font-size: 5rem}
    </style>
  </head>
  <body>
    <span id="var-field"><?=$var?></span>
    <!-- CDN de JQUERY. Libreria necesaria. Para mejor performance hay que descargar la librera y llamarla localmente. -->
    <script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>

    <script type="text/javascript">
      //
    </script>
    <script type="text/javascript">
      // Script ajax para recuperar el valor de la base de datos y actualizar el campo var_field
      function getValue()
      {
        $.ajax({
          url:'request.php',
          success: function(response)
          {
            // tiro el log de la respuesta en consola a fines de debugeo.
            console.log('Valor actual: '+response);
            // asigno el valor de la respuesta en el campo var-var_field
            $('#var-field').text(response);
          }
        })
      }
    </script>

    <script type="text/javascript">
    // defino el temporizador, cada 5 segundos obtiene el valor y cambia el valor en el html
          setInterval(
            function(){ getValue(); }
            ,5000
          );
    </script>

    <!-- A modo de prueba voy a definir una function que cambia el valor en la DB cada 10 segundos -->
    <script type="text/javascript">
    function changeValue()
    {
      $.ajax({
        url:'valueChange.php',
        success: function(response)
        {
          // tiro el log de la respuesta en consola a fines de debugeo.
          console.log('Cambio de valor: '+response);
          // la funcion getvalue se encarga de obtener el nuevo valor y ponerlo en el html. aqui solo lo cambio
        }
      })
    }
      // defino que cada intervalo de 5 segundos se cambie el vaor
        setInterval(
          function(){ changeValue(); }
          ,5000
        );

    </script>
  </body>

</html>
