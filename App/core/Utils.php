<?php

class Utils
{
    /**
     * Récupère une variable de la requête HTTP (GET, POST, etc.) ou retourne une valeur par défaut si elle n'est pas définie.
     * @param string $variableName : le nom de la variable à récupérer
     * @param mixed $defaultValue : la valeur par défaut à retourner si la variable n'est pas définie
     * @return mixed : la valeur de la variable ou la valeur par défaut
     */
    public static function request(string $variableName, mixed $defaultValue = null): mixed
    {
        return $_REQUEST[$variableName] ?? $defaultValue;
    }

    /**
     * Récupère une variable des uploads de la requête POST, etc ou retourne une valeur par défaut si elle n'est pas définie.
     * @param string $variableName : le nom de la variable à récupérer
     * @param mixed $defaultValue : la valeur par défaut à retourner si la variable n'est pas définie
     * @return mixed : la valeur de la variable ou la valeur par défaut
     */
    public static function requestFile(string $variableName, mixed $defaultValue = null): mixed
    {
        return $_FILES[$variableName] ?? $defaultValue;
    }

    /**
     * Vérifie si l'utilisateur est connecté.
     * @return bool : true si l'utilisateur est connecté, false sinon
     */
    public static function isConnected(): bool
    {
        return isset($_SESSION['user']);
    }

    /**
     * Redirige vers une URL.
     * @param string $url : l'url de destination
     * @param array $params : Facultatif, les paramètres à passer en GET
     * @return void
     */
    public static function redirect(string $url, array $params = []): void
    {
        if (isset($params)) {
            $url .= "?";
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


    /** Vérifie si la rubrique est active en comparant l'URI actuelle avec la rubrique donnée.
     * @param string $rubrique : la rubrique à vérifier
     * @return bool : true si la rubrique est active, false sinon
     */
    public static function isNavActive(string $rubrique): bool
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        return str_starts_with($uri, "/" . $rubrique);
    }
}
