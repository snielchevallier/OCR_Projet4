<?php

Class Utils {
    public static function request(string $variableName, mixed $defaultValue = null) : mixed
    {
        return $_REQUEST[$variableName] ?? $defaultValue;
    }

    public function isConnected() : bool
    {
        return !isset($_SESSION['user']);
    }
}