<?php
$host = 'localhost';
$db = 'articles';
$user = 'root';
$pass='';
$charset = 'utf8';

$dsn = "mysql:host=$host; dbname=$db; charset=$charset";

$opt= [
    PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

$pdo = new PDO($dsn, $user, $pass, $opt);

function get_table(): array{ 
    global $pdo;
    $res = $pdo -> query("SELECT * FROM articles_table");
    return $res -> fetchAll();
}
?>