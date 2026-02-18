<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;



if (!function_exists('encryption')) {
    function encryption($data)
    {
        $cipher = "AES-256-CBC";
        $secret = hash('sha256', "ABCDEFGHIJKLMNOPQRSTUVWXZ0123456789", true);

        $iv = openssl_random_pseudo_bytes(16);

        // Encrypt + store IV together (safe practice)
        $encrypted = openssl_encrypt($data, $cipher, $secret, 0, $iv);

        return base64_encode($iv . $encrypted);
    }
}

if (!function_exists('decryption')) {
    function decryption($data)
    {
        $cipher = "AES-256-CBC";
        $secret = hash('sha256', "ABCDEFGHIJKLMNOPQRSTUVWXZ0123456789", true);

        $raw = base64_decode($data);

        $iv = substr($raw, 0, 16);          // extract IV
        $encrypted = substr($raw, 16);      // extract data

        return openssl_decrypt($encrypted, $cipher, $secret, 0, $iv);
    }
}

if (!function_exists('getClientIpAddress')) {
    function getClientIpAddress()
    {
        return Request::ip();
    }
}



if (!function_exists('encrypt_url')) {
    function encrypt_url($string)
    {
        $encryptMethod = "AES-256-CBC";
        $secretKey = "1111111111111111";
        $secretIv = "2456378494765434";

        $key = hash('sha256', $secretKey);
        $iv = substr(hash('sha256', $secretIv), 0, 16);

        return openssl_encrypt($string, $encryptMethod, $key, 0, $iv);
    }
}



if (!function_exists('decrypt_url')) {
    function decrypt_url($string)
    {
        $encryptMethod = "AES-256-CBC";
        $secretKey = "1111111111111111";
        $secretIv = "2456378494765434";

        $key = hash('sha256', $secretKey);
        $iv = substr(hash('sha256', $secretIv), 0, 16);

        return openssl_decrypt($string, $encryptMethod, $key, 0, $iv);
    }
}



if (!function_exists('formatDate')) {
    function formatDate($date)
    {
        return date('Y-m-d', strtotime($date));
    }
}


if (!function_exists('capitalize')) {
    function capitalize($str)
    {
        return ucfirst($str);
    }
}

if(!function_exists('prints')){
    function prints($p){
        echo "<pre>";
        print_r($p);
        echo "</pre>";
        exit;
    }
}

if(!function_exists('current_route')){
    function current_route($string){
        $route = Route::currentRouteName();
        if($route == $string){
            return "active";
        }
    }
}


if (!function_exists('verify_password')) { 
    
    function verify_password($plainPassword, $encryptedPassword)
    {
        // Decrypt the stored password
        $decrypted = decryption($encryptedPassword);

        // Compare with the plain password
        return $plainPassword === $decrypted;
    }
}
