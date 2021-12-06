<form action="/index.php" method="POST">
    <button type="submit" class="btn btn-primary">
        <span class="glyphicon glyphicon-heart"></span>
        Delete database
        <?php $pdo->exec("DELETE FROM siteData;"); ?>
    </button>
</form>

var_dump($siteData); die;

print "<table border=1>";
    print "<tr><td>name</td><td>email</td><td>message</td></tr>";
    $result = $pdo->query('SELECT * FROM siteData');
    foreach($result as $row)
    {
    print "<tr><td>".$row['name']."</td>";
        print "<td>".$row['email']."</td>";
        print "<td>".$row['message']."</td>";
        }
        print "</table>";

$pdo = NULL;

$pdo = new PDO("sqlite:".__DIR__."/Assigment1.db");
$result = $pdo->prepare ('SELECT * FROM siteData');
$result->execute();
$siteDataa = $result->fetchAll();
var_dump($siteDataa);die();

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
</div>