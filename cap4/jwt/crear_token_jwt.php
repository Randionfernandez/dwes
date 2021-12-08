<!DOCTYPE html>
<html>
    <body>

        hola mundo
<?php
echo "iniciando<p/>";
error_reporting(E_ALL);
ini_set('display_errors', 1);

$str = 'This is an encoded string';
echo "texto; " . base64_encode($str) .'Fin';

// Create token header as a JSON string
$header = json_encode(['typ' => 'JWT', 'alg' => 'HS256']);
echo $header;
// Create token payload as a JSON string
$payload = json_encode(['user_id' => 123]);

// Encode Header to Base64Url String
$base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));

// Encode Payload to Base64Url String
$base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));

// Create Signature Hash
$signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, 'abC123!', true);

// Encode Signature to Base64Url String
$base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));

// Create JWT
$jwt = $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;

echo $jwt;
?>

</body>
</html> 