<?php
if(!isset($_POST['private_key'])||!isset($_POST['text_encode'])){
    echo json_encode([
        'status'=>1
    ]);
}
$private_key=$_POST['private_key'];
$text_encode=$_POST['text_encode'];

//私钥解密
openssl_private_decrypt(base64_decode($text_encode), $decrypted, $private_key);
echo json_encode([
    'status'=>0,
    'data'=>$decrypted
]);;