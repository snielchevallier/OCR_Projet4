<?php

class Utils {
    public static function request(string $variableName, mixed $defaultValue = null) : mixed
    {
        return $_REQUEST[$variableName] ?? $defaultValue;
    }

    public static function requestFile(string $variableName, mixed $defaultValue = null) : mixed
    {
        return $_FILES[$variableName] ?? $defaultValue;
    }
    
    public static function isConnected() : bool
    {
        return isset($_SESSION['user']);
    }

    /**
     * Redirige vers une URL.
     * @param string $url : l'url de destination
     * @param array $params : Facultatif, les paramètres à passer en GET
     * @return void
     */
    public static function redirect(string $url, array $params = []) : void
    {
        if(isset($params)){
            $url .="?";
        }
        foreach ($params as $paramName => $paramValue) {
            $url .= "$paramName=$paramValue&";
        }
        header("Location: $url");
        exit();
    }

    /**
     * Renvoie une chaine représentant le temps écoulé d'une date jusqu'à aujourd'hui
     * @param DateTime $date 
     * @return string : le temps écoulé au format string (x ans et x mois).
     */
    public static function timeElapsed(DateTime $date): string
    {
        $now = new DateTime();
        $diff = $date->diff($now);

        $years = $diff->y;
        $months = $diff->m;

        $result = [];

        if ($years > 0) {
            $result[] = $years . ' an' . ($years > 1 ? 's' : '');
        }

        if ($months > 0) {
            $result[] = $months . ' mois';
        }

        return $result ? implode(' ', $result) : 'moins d’un mois';
    }

}