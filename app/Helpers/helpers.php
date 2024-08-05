<?php

if (!function_exists('user')) {
    function user()
    {
        return \Illuminate\Support\Facades\Auth::user();
    }
}

if (!function_exists('id')) {
    function id()
    {
        return \Illuminate\Support\Facades\Auth::id();
    }
}

if (!function_exists('array_to_string')) {
    function array_to_string(array $a)
    {
        return implode(" ", $a);
    }
}
