<?php
    try {
$pdo = new PDO('sqlite:Assigment1.db');
$result = $pdo->query('SELECT * FROM siteData');

$rows = $result->fetchAll(PDO::FETCH_ASSOC);
echo "<pre>";
    var_dump($rows);
    echo "</pre>";
} catch (PDOException $e){
echo 'ERROR UPDATING CONTENT: ' . $e->getMessage();
}