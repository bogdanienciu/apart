<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Delight\Auth\Auth;
use App\DB\MySQLConnection;

$mysql = new MySQLConnection();
$auth = new Auth($mysql->getConnection());

if (!$auth->isLoggedIn()) {
    header('Location: login.php');
}