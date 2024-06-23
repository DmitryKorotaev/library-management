<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once "vendor/autoload.php";

// Настройка конфигурации Doctrine
$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration([__DIR__ . "/src"], $isDevMode);

// Настройка параметров подключения к базе данных
$conn = [
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => '',
    'dbname'   => 'my_database',
];

// Создание EntityManager
$entityManager = EntityManager::create($conn, $config);

return $entityManager;
?>
