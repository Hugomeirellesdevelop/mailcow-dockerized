<?php
$senha = 'wpUjGv9HZvczmLzs';
$hash = '{SSHA256}rfB0ASRsmSlJ9RMnVhRj7OYliAo1Pb7ShuM5qSHp0RwQs+3h';

function verify_ssha256($password, $hash) {
    if (strpos($hash, '{SSHA256}') !== 0) return false;
    $data = base64_decode(substr($hash, 9));
    $digest = substr($data, 0, 32);
    $salt = substr($data, 32);
    return hash('sha256', $password . $salt, true) === $digest;
}

var_dump(verify_ssha256($senha, $hash));
