<?php

function dbo() {
try{

  $dsn ='mysql:host=172.31.22.43;dbname=Mullin100104425'; //
  $username ='Mullin100104425'; 
  $password ='UQabtxmMN5'; 

  $db = new PDO($dsn, $username, $password);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  return $db;
  } catch (PDOException $error) {
    var_dump("Issue connection : {$error->getMessage()}");
    exit;
  }
}

?>