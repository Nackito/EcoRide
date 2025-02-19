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
      'db_name' => 'bemuciesvvzsdz4n',
      'db_user' => 'vjovxv1moy1yvoh8',
      'db_password' => 'gkdfoteqh3qevwnr',
      'db_host' => 'zwgaqwfn759tj79r.chr7pe7iynqr.eu-west-1.rds.amazonaws.com',
      'db_port' => '3306',
    ],
  ],
];

return $config[$env];
