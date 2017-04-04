<?php
$servername = "localhost";
$username = "php";
$password = "php";

try {
    $conn = new PDO("mysql:host=$servername;dbname=article", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";

    $sql = 'select * from article';
    //$conn = $this->getConnection();
    $stmt = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
//    $stmt->execute($args);

    $stmt->execute($args);
    $red = $stmt->fetchAll();

    //print ($stmt);
    //print_r ($stmt);
    //var_dump($stmt);
    print ('<br><br> <h3>print_r:</h3> <br>');
    print_r($red);
    print ('<br><br> <h3>var_dump:</h3> <br>');
    var_dump($red);
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}



// close connect to database
// $conn = null;

?> 