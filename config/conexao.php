<?php

try {
  $conn = new PDO('mysql:host=localhost;dbname=cadastro','root',"");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}



// $dados = $conn->query("SELECT * FROM usuarios");

// foreach($dados as $dado) {
// 	print_r($dado);
// } 
?>


