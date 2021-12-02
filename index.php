<?php


$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$nameErr = $emailErr = $messageErr = "";
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
}
$siteData = array(
        'name' => $name,
        'email' => $email,
        'message' => $message,
);
$json = json_encode($siteData,JSON_PRETTY_PRINT);
file_put_contents('data/siteData', $json);
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
            <textarea name="message" rows="5" cols="40"></textarea>
            <span class="error">* <?php echo $messageErr;?></span>
            <br><br>
        </div>
            <button type="submit" class="btn btn-primary">
                <span class="glyphicon glyphicon-heart"></span>
                ADD
            </button>
        </form>
    </div>
</div>
<hr>
Json file content:
<?php var_dump($json);?>
<hr>

<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <h2>11</h2>

            <p>1 </p>

        </div>
        <div class="col-lg-4">
            <h2>22</h2>

            <p>2 </p>

        </div>
        <div class="col-lg-4">
            <h2>33</h2>

            <p>3</p>

        </div>
    </div>

    <hr>

    <footer>
        <p>Done by Suciu Andrei Cornel</p>
    </footer>
</div>

</body>

</html>
