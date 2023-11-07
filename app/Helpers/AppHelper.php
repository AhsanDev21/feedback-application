<?php

namespace App\Helpers;

use Exception;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class AppHelper
{
    public static $myOwnEncryptVariable = [
        "ciphering" =>  "AES-128-CTR",
        "encryption_iv" => "1234567891011121",
        "decryption_iv" => "1234567891011121",
        "options" => 0,
        "encryption_key" => "careerdaysmuy",
        "decryption_key" => "careerdaysmuy",
    ];
    
    public static function ajaxResponse(String $msg = '', String $status = '', $data = [], $errors = [], int $httpCode = 200)
    {
        $response = [
            "msg" => $msg,
            "status" => strtolower($status),
            "data" => $data,
            "errors" => $errors,
            "httpCode" => $httpCode,
        ];
        return response()->json($response, $httpCode);
    }
    public static function validateJobEventPrefixSlug($encryptedSlug)
    {
        $decrypted_slug = "";
        try {
            $decrypted_slug = Crypt::decryptString($encryptedSlug);
        } catch (DecryptException $e) {
            throw new Exception($e->getMessage());
        }
        return $decrypted_slug;
    }
    public static function apiResponse(String $msg = '', String $status = '', array | Object $data = [], array | Object $errors = [], int $httpCode = 200)
    {
        $response = [
            "msg" => $msg,
            "status" => strtolower($status),
            "data" => $data,
            "errors" => $errors,
            "httpCode" => $httpCode,
        ];
        return response()->json($response, $httpCode);
    }
    public static function calculateNetCpc($original_cpc, $cpc_type = "none", $margin_percentage = 0)
    {
        /**CPC Types
         * mark_up, mark_down, none
         */
        try {
            $calculated_cpc = 0;
            if ($cpc_type == 'mark_up') {
                $calculated_cpc = $original_cpc + (($margin_percentage / 100) * $original_cpc);
            } elseif ($cpc_type == 'mark_down') {
                $calculated_cpc = $original_cpc - (($margin_percentage / 100) * $original_cpc);
            } else {
                $calculated_cpc = $original_cpc;
            }
            return $calculated_cpc < 0 ? 0 : $calculated_cpc;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public static function myOwnEncrypt($string)
    {
        try {
            // Use openssl_encrypt() function to encrypt the data
            $encryption = openssl_encrypt(
                $string,
                self::$myOwnEncryptVariable['ciphering'],
                self::$myOwnEncryptVariable['encryption_key'],
                self::$myOwnEncryptVariable['options'],
                self::$myOwnEncryptVariable['encryption_iv']
            );

            // Display the encrypted string
            return $encryption;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public static function myOwnDecrypt($encrypt_string)
    {
        try {
            // Use openssl_decrypt() function to decrypt the data
            $decryption = openssl_decrypt(
                $encrypt_string,
                self::$myOwnEncryptVariable['ciphering'],
                self::$myOwnEncryptVariable['decryption_key'],
                self::$myOwnEncryptVariable['options'],
                self::$myOwnEncryptVariable['decryption_iv']
            );

            // Display the decrypted string
            return $decryption;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
