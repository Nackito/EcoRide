<?php
$env = getenv('APP_ENV') ?: 'local';

$config = [
  'local' => [
    'db' => [
      'db_name' => 'ecoride',
      'db_user' => 'frank',
      'db_password' => 'oLOtiajvMvGD',
      'db_host' => 'localhost',
      'db_port' => '3306',
    ],
  ],
  'heroku' => [
    'db' => [
      'db_name' => getenv('DB_NAME'),
      'db_user' => getenv('DB_USER'),
      'db_password' => getenv('DB_PASSWORD'),
      'db_host' => getenv('DB_HOST'),
      'db_port' => getenv('DB_PORT'),
    ],
  ],
];

return $config[$env];
