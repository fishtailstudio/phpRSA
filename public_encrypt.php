<?php
if(!isset($_POST['public_key'])||!isset($_POST['text'])){
    echo json_encode([
        'status'=>1
    ]);
}
$public_key=$_POST['public_key'];
$text=$_POST['text'];

//公钥加密
openssl_public_encrypt($text, $encrypted, $public_key);
$encrypted = base64_encode($encrypted);  
echo json_encode([
    'status'=>0,
    'data'=>$encrypted
]);;