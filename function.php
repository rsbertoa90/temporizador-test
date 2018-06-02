<?php
//  retorna el valor actual del campo var_field en la tabla.
  function getValue()
  {
    $host ='127.0.0.1';
    $dbname ='test';
    $user = 'root';
    $password = '';
    // dbname es el nombre del SCHEMA en la DB mysql
    try {
      $DB = new PDO("mysql:host={$host};dbname={$dbname}",$user,$password);
      // esta es una configuracion extra para muestra de errores.
      $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $query = $DB->prepare('SELECT var_field FROM test_table WHERE id=1');
      $query->execute();
      $result = $query->fetch(PDO::FETCH_ASSOC);
      // retorno el valor devuelto en la posicion "var_field"
      return $result['var_field'];
    }  catch(PDOException $e)
    {
      //en caso de error:
      echo "Connection failed: " . $e->getMessage();exit;
    }
  }



 ?>
