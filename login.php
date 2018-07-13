<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Delight\Auth\Auth;
use App\DB\MySQLConnection;

$mysql = new MySQLConnection();
$auth = new Auth($mysql->getConnection());

// $userId = $auth->register('bogdan@email.com', 'parola', 'bogdan');

// $auth->login('bogdan@email.com', 'parola');

try {
    $auth->login($_REQUEST['email'], $_REQUEST['password']);

    header('Location: apartments.php');
} catch (\Exception $e) {
	header('Location: admin.php');
}
