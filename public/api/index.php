<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$dbopts = parse_url(getenv('DATABASE_URL'));
$host = $dbopts["host"];
$dbname = ltrim($dbopts["path"],'/');
$user = $dbopts["user"];
$port = $dbopts["port"];
$password = $dbopts["pass"];

$dsn = "pgsql:host=$host;dbname=$dbname;user=$user;port=$port;password=$password";
$db = new PDO($dsn);

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode( '/', $uri );

print_r($uri);

if($db){
  echo "Connected <br />".$db;
}else {
  echo "Not connected";
}