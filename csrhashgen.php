<html>
    <body>
    <h5>Create CSR Hash:</h5>
    <form action="generate.php" method="post">
        <textarea name="csr" rows="5" cols="40"></textarea><br><br>
        <input type="submit" name="submit" value="Genereren">
    </form>
    </body>
</html>

<?php
    function getBinaryCSR($csr)
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

    if (!empty($_POST)) {
        $CSR = getBinaryCSR($_POST["csr"]);
        echo '<h5>Binary CSR:</h5>' . $CSR ;

        $MD5 = hash('md5', $CSR);
        echo '<h5>MD5 Hash CSR:</h3>' . $MD5;

        $SHA256 = hash('sha256', $CSR);
        echo '<h5>SHA256 Hash CSR:</h3>' . $SHA256;

        $MD5_Formatted = strtoupper($MD5);
        echo '<h5>MD5 Formatted:</h3>' . $MD5_Formatted;

        $SHA256_Formatted = substr_replace($SHA256, '.', 32, 0);
        echo '<h5>SHA256 Formatted:</h3>' . $SHA256_Formatted;

    }
?>
