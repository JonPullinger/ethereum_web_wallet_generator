<?php
// Database connection
$config = [
	'host' => '127.0.0.1',
	'port' => 3728,
	'database' => 'test',
	'user' => 'test',
	'password' => 'test',
	'charset' => 'utf8mb4',
];
$db = new PDO(
	'mysql:host='.$config['host'].';port='.$config['port'].';dbname='.$config['database'],
	$config['user'],
	$config['password']
);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->exec('SET NAMES "'.$config['charset'].'"');

// Posted data
$data = file_get_contents('php://input');
$data = json_decode($data, true);

// Check data
if (empty($data['publicKey'])) {
	die('Empty public key');
}

// Insert public key
try {
	$stmt = $db->prepare('INSERT INTO `public_keys` (`value`) VALUES (?)');
	$stmt->execute([$data['publicKey']]);
} catch (Exception $ex) {
	die('Failed to save');
}
exit('1');