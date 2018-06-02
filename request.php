<?php
require_once('function.php');
    // tengo que generar un array que convertir a json para enviar como respuesta a js
  $response = getValue();
  // para ajax, el echo es la respuesta
  echo $response;
