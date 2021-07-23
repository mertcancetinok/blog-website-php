<?php 
try {
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=blog', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (Exception $e) {
    if($e!=null){
        header("Location:/404.php");
    }
    
}

?>