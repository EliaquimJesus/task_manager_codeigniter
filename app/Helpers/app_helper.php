<?php

function check_status($item, $status)
{
    if (key_exists($status, STATUS_LIST)) {
        if ($item === $status) {
            return 'selected';
        } else {
            return '';
        }
    } else {
        return '';
    }
}


// Function to encrypt
function encrypt($value)
{
    $enc = \Config\Services::encrypter();
    return bin2hex($enc->encrypt($value));
}

// Function to decrypt
function decrypt($value)
{
    $enc = \Config\Services::encrypter();
    return $enc->decrypt(hex2bin($value));
}
