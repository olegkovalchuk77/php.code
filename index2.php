<?php
/**
 * Created by PhpStorm.
 * User: okovalchuk
 * Date: 01.04.17
 * Time: 15:57
 */
//print_r(PDO::getAvailableDrivers());

if (isset($_POST['submit']) and isset($_POST['name']) and isset($_POST['description']) and isset($_POST['created_at'])){
    //true

    print ('<h1> OK, data processing! </h1>');
    print ($_POST['name']);
    print ('<br>');
    print ($_POST['description']);
    print ('<br>');
    print ($_POST['created_at']);
    print ('<br>');

    // mysql actions

    $host = '127.0.0.1';
    $db   = 'article';
    $user = 'php';
    $pass = 'php';
    $charset = 'utf8';

// test 1
    # подключаемся к базе данных
    try {
        $DBH = new PDO("mysql:host=$host; dbname=$db", $user, $pass);
        $DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        $sql = 'select * from article';
        $DBH->prepare('SELECT * FROM article')->execute();

    }
    catch(PDOException $e) {
        echo "Хьюстон, у нас проблемы.";
        file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);
    }

    // end test 1

    var_dump($pdo);
    var_dump($result);

}

// processing menu
$i = $_SERVER['PATH_INFO'];
switch ($i) {
    case '/addinfo':
        echo "i равно /addinfo";
        break;
    case '/editinfo':
        echo "i равно /editinfo";
        break;
    case '/deleteinfo':
        echo "i равно /deleteinfo";
        break;
    case '/showinfo':
        echo "i равно /showinfo";
        break;
    default:
        echo "i - default";
        break;
}






print <<<END

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP School - lesson 1</title>
</head>
<body>
<form method="post" action="index.php" name="formarticle">
    <table border="1" align="center" width="550">
        <tr>
            <td colspan="2" align="center"><b>phpschol :: Lesson 1 :: {$_SERVER['PATH_INFO']}</b></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><b> <a href="/index.php/addinfo"> :: add info :: </a> <a href="/index.php/editinfo"> :: edit info :: </a> <a href="/index.php/deleteinfo"> :: delete info :: </a> <a href="/index.php/showinfo"> :: show info :: </a> </b></td>
        </tr>
        <tr>
            <td width="180">Please input <b>Name</b>:</td>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <td>Please input <b>Description</b>:</td>
            <td><input type="text" name="description"></td>
        </tr>
        <tr>
            <td>Please input <b>Create Date</b>:</td>
            <td><input type="date" name="created_at"></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" name="submit" value="Send data"> <input type="reset" value="Reset form data"></td>
        </tr>
    </table>
</form>
<br> <br>
</body>
</html>

END;

phpinfo();

?>