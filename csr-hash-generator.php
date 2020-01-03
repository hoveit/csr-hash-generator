<?php

    $CSR = 'Paste CSR here';

    function decodeCSR($csr)
     {
       $data = base64_decode(
           str_replace(
               [
                   '-----BEGIN CERTIFICATE REQUEST-----',
                   '-----END CERTIFICATE REQUEST-----',
                   '-----BEGIN NEW CERTIFICATE REQUEST-----',
                   '-----END NEW CERTIFICATE REQUEST-----'
                ], '', $csr));
       return $data;
     }


    $CSR = decodeCSR($CSR);

    $MD5 = hash('md5', $CSR);
    echo 'MD5 Hash CSR: ' . $MD5 . PHP_EOL;

    $SHA256 = hash('sha256', $CSR);
    echo 'SHA256 Hash CSR: ' . $SHA256 . PHP_EOL;

    $MD5_Formatted = strtoupper($MD5);
    echo 'MD5 Formatted: ' . $MD5_Formatted . PHP_EOL;

    $SHA256_Formatted = substr_replace($SHA256, '.', 32, 0);
    echo 'SHA256 Formatted: ' . $SHA256_Formatted . PHP_EOL;

?>
