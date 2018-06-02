<?php
function changeValue()
{
  $host ='127.0.0.1';
  $dbname ='test';
  $user = 'root';
  $password = '';
  // dbname es el nombre del SCHEMA en la DB mysql
  try {
    $DB = new PDO("mysql:host={$host};dbname={$dbname}",$user,$password);
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $value = rand( 1, 5);
    $query = $DB->prepare('UPDATE test_table SET var_field = '.$value . ' WHERE id = 1');
    $query->execute();
    return $value;
  }  catch(PDOException $e)
  {
    echo "Connection failed: " . $e->getMessage();exit;
  }
}

$response = changeValue();
echo $response;



 ?>
