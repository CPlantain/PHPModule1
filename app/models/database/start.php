<?php
$config = require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/QueryBuilder.php';
require_once __DIR__ . '/Connection.php';

return new QueryBuilder(
	Connection::make($config['database'])
);