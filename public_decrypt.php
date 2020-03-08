<?php
if(!isset($_POST['public_key'])||!isset($_POST['text_encode'])){
    echo json_encode([
        'status'=>1
    ]);
}
$public_key=$_POST['public_key'];
$text_encode=$_POST['text_encode'];

//公钥解密  
openssl_public_decrypt(base64_decode($text_encode), $decrypted, $public_key);
echo json_encode([
    'status'=>0,
    'data'=>$decrypted
]);;