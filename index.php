<?php
/**
 * Created by PhpStorm.
 * User: okovalchuk
 * Date: 01.04.17
 * Time: 15:57
 */

function headerhtml(){
print <<<END
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>PHP School - lesson 1</title>
<style type="text/css">
body {background-color: #fff; color: #222; font-family: sans-serif;}
pre {margin: 0; font-family: monospace;}
a:link {color: #009; text-decoration: none; background-color: #fff;}
a:hover {text-decoration: underline;}
table {border-collapse: collapse; border: 0; width: 934px; box-shadow: 1px 2px 3px #ccc;}
.center {text-align: center;}
.center table {margin: 1em auto; text-align: left;}
.center th {text-align: center !important;}
td, th {border: 1px solid #666; font-size: 75%; vertical-align: baseline; padding: 4px 5px;}
h1 {font-size: 150%;}
h2 {font-size: 125%;}
.p {text-align: left;}
.e {background-color: #ccf; width: 300px; font-weight: bold;}
.h {background-color: #99c; font-weight: bold;}
.v {background-color: #ddd; max-width: 300px; overflow-x: auto; word-wrap: break-word;}
.v i {color: #999;}
img {float: right; border: 0;}
hr {width: 934px; background-color: #ccc; border: 0; height: 1px;}
</style>
</head>
<body>
END;
}


function footerhtml(){
print <<<END
</body>
</html>
END;
}


function menuhtml(){
print <<<END
<table border="1" align="center" width="650">
<tr>
<td colspan="2" align="center"><b>phpschol :: Lesson 1 :: CRUD Application {$_SERVER['PATH_INFO']}</b></td>
</tr>
<tr>
<td colspan="2" align="center"><b>
<a href="/index.php"> :: main info :: </a> &nbsp; &nbsp; &nbsp;
<a href="/index.php/addinfo"> :: add info :: </a> &nbsp; &nbsp; &nbsp;
<a href="/index.php/editinfo"> :: edit info :: </a> &nbsp; &nbsp; &nbsp;
<a href="/index.php/deleteinfo"> :: delete info :: </a> &nbsp; &nbsp; &nbsp;
<a href="/index.php/showinfo"> :: show info :: </a> &nbsp; &nbsp; &nbsp;
</b>
</td>
</tr>
</table>
END;
}





if ($_SERVER['PATH_INFO'] == '/addinfo' OR $_SERVER['PATH_INFO'] == '/index.php/addinfo'){
// start section add info
    print ('index.php/addinfo  <br>');
    print ('server_path: '.$_SERVER['PATH_INFO']);
    headerhtml();
    menuhtml();
    //footerhtml();

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


print <<<END

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP School - lesson 1</title>
</head>
<body>
<form method="post" action="index.php/addinfo" name="formarticle">
    <table border="1" align="center" width="550">
        
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

// end section add info
}elseif ($_SERVER['PATH_INFO'] == '/editinfo'){
    print ('index.php/editinfo  <br>');
    print ('iserver_path: '.$_SERVER['PATH_INFO']);
    phpinfo();

}elseif ($_SERVER['PATH_INFO'] == '/deleteinfo'){
    print ('index.php/deleteinfo  <br>');
    print ('iserver_path: '.$_SERVER['PATH_INFO']);
    phpinfo();

}elseif ($_SERVER['PATH_INFO'] == '/showinfo'){
    print ('index.php/showinfo  <br>');
    print ('iserver_path: '.$_SERVER['PATH_INFO']);
    phpinfo();

}else{

    print ('default <br>');
    print ('server_path: '.$_SERVER['PATH_INFO']);
    headerhtml();
    menuhtml();
    footerhtml();
    phpinfo();
}








?>