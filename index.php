<?php

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];


$jsonData = array(
    'name' => $name,
    'email' => $email,
    'message' => $message,
);
$pdo = new PDO("sqlite:".__DIR__."/Assigment1.db");
$result = $pdo->query('SELECT * FROM siteData');
$siteData = $result->fetchAll();
//var_dump($siteData);//die();

$nameErr = $emailErr = $messageErr = $generalErr = "";
date_default_timezone_set('Europe/Helsinki');
$date = date('m/d/Y h:i:s a', time());
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        $nameErr = "";
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        $emailErr = "";
    }

    if (empty($_POST["message"])) {
        $messageErr = "Message is required and should not be longer than 200 characters";
    } else {
        $message = test_input($_POST["message"]);
        $messageErr = "";
    }
    if (empty($_POST["name"])||empty($_POST["email"])||empty($_POST["message"])) {
        $generalErr = "One or more requirements are still needed!";
    } else {
        $pdo->exec("INSERT INTO siteData (name, email, message ) VALUES ('$name', '$email', '$message');");
    }

    //$pdo = new PDO("sqlite:".__DIR__."/Assigment1.db");
    // $result = $pdo->query('SELECT * FROM siteData');
    // $siteData = $result->fetchAll();
    //var_dump($siteData);//die();
}
$json = json_encode($jsonData,JSON_PRETTY_PRINT);
file_put_contents('data/jsonData', $json);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Assigment1 =D </title>

</head>

<hr>

<body>

<div class="jumbotron">
    <div class="container">
        <h1>Hello, world! It is now: <?php echo $date; ?> </h1>
        <hr>
        <p><span class="error">* required field</span></p>
        <form action="/index.php" method="POST">
            <div class="form-group">
                <label for="name" class="control-label">Name:</label>
                <input type="text" name="name" id="name" class="form-control" />
                <span class="error">* <?php echo $nameErr;?></span>
                <br><br>
            </div>
            <div class="form-group">
                <label for="email" class="control-label">Email:</label>
                <input type="text" name="email" id="email" class="form-control" />
                <span class="error">* <?php echo $emailErr;?></span>
                <br><br>
            </div>
            <div class="form-group">
                <label for="message" class="control-label" >Message:</label>
                <label>
                    <textarea name="message" rows="5" cols="40"></textarea>
                </label>
                <span class="error">* <?php echo $messageErr;?></span>
                <br><br>
            </div>
            <button type="submit" class="btn btn-primary">
                <span class="glyphicon glyphicon-heart"></span>
                ADD
            </button>
            <?php echo $generalErr;?>
        </form>
    </div>
</div>
<hr>
Json file content:
<?php var_dump($json);?>
<hr>

<hr>
Data bases content:

<?php var_dump($siteData);?>
<hr>

<footer>
    <p>Done by Suciu Andrei Cornel</p>
</footer>

</body>

</html>

