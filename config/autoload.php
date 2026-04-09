<?php

/**
 * Système d'autoload. 
 * scanne les dossiers "models", "controllers" et "core" pour inclure automatiquement les classes nécessaires.
 */
spl_autoload_register(function ($className) {
    $baseDir = __DIR__ . '\\..';
    if (file_exists($baseDir . '\\App\\models\\' . $className . '.php')) {
        require_once $baseDir . '\\App\\models\\' . $className . '.php';
    }

    if (file_exists($baseDir . '\\App\\controllers\\' . $className . '.php')) {
        require_once $baseDir . '\\App\\controllers\\' . $className . '.php';
    }

    if (file_exists($baseDir . '\\App\\core\\' . $className . '.php')) {
        require_once $baseDir . '\\App\\core\\' . $className . '.php';
    }
});
