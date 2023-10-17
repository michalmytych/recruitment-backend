<?php

if (! function_exists('shorten_auto')) {
    function shorten_auto(mixed $value, int $length = 20): string
    {
        $value = (string)$value;

        if (strlen($value) > $length) {
            $str = substr($value, 0, $length);
            return rtrim($str) . '...';
        }

        return $value;
    }
}
