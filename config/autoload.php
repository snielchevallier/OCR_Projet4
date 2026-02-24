<?php

/**
 * Système d'autoload. 
 * scanne les dossiers "models", "controllers" et "core" pour inclure automatiquement les classes nécessaires.
 */
spl_autoload_register(function($className) {
    if (file_exists('App/models/' . $className . '.php')) {
        require_once 'App/models/' . $className . '.php';
    }

    if (file_exists('App/controllers/' . $className . '.php')) {
        require_once 'App/controllers/' . $className . '.php';
    }

    if (file_exists('App/core/' . $className . '.php')) {
        require_once 'App/core/' . $className . '.php';
    }
    
});