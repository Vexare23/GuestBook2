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