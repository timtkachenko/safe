<?php

namespace NXC\SafeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    var $skey = "yourSecretKey"; // you can change it
    public function indexAction($name=null)
    {
        return $this->render('NXCSafeBundle:Default:index.html.twig', array(
            'name' => $name,
            ));
    }
    public  function safe_b64encode($string) {
        $data = base64_encode($string);
        $data = str_replace(array('+','/','='),array('-','_',''),$data);
        return $data;
    }

    public function safe_b64decode($string) {
        $data = str_replace(array('-','_'),array('+','/'),$string);
        $mod4 = strlen($data) % 4;
        if ($mod4) {
            $data .= substr('====', $mod4);
        }
        return base64_decode($data);
    }

    public  function encode($value){
        if(!$value){return false;}
        $text = $value;
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $this->skey, $text, MCRYPT_MODE_ECB, $iv);
        return trim($this->safe_b64encode($crypttext));
    }

    public function decode($value){
        if(!$value){return false;}
        $crypttext = $this->safe_b64decode($value);
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $decrypttext = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $this->skey, $crypttext, MCRYPT_MODE_ECB, $iv);
        return trim($decrypttext);
    }
    public function securedAction($name=null)
    {
        $string = 'It works ? Or not it works ?';
        $public = '-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAq73ZrxVpEYiUN+BA4V6+
GLVwt1jQrLTR7KPrR0GkDzwAez//nqDzOmLnKkNCpEKSqUhAujSAeQFJPQA0Fe8M
Q4SN7BgwRBLEBTgwrO5H1QLvJJ5aGr8LG1xtUb3RP5NOaS7DHAXBCpXQp9kZUc+J
766eOAJY3iK7PqQR5YOg7yUPDcy7ded6mFvHHfgeO/LT8U9kN7YAxdRhdv9gF7OP
mvKoCfE1IBen5ynqiJCv/PDCKVmMtJzSsecHUFLuYAHY3fY5EKp4eGnaUUGHajM7
OuxPptc5F6WgtvnVuzuOptkZmx9l60Q99AqeVOY9R7G4yP+rNc7CayCrg7UaXGoH
GQIDAQAB
-----END PUBLIC KEY-----';
        $encrypted = '';
        echo (int)openssl_public_encrypt ($string, $encrypted, $public);
        $encrypted_base64_encode = base64_encode($encrypted);
        file_put_contents (__DIR__.'/../Resources/config/file.encrypted', $encrypted_base64_encode);
        $decrypted="";
        $private = "-----BEGIN RSA PRIVATE KEY-----
MIIEowIBAAKCAQEAq73ZrxVpEYiUN+BA4V6+GLVwt1jQrLTR7KPrR0GkDzwAez//nqDzOmLnKkNC
pEKSqUhAujSAeQFJPQA0Fe8MQ4SN7BgwRBLEBTgwrO5H1QLvJJ5aGr8LG1xtUb3RP5NOaS7DHAXB
CpXQp9kZUc+J766eOAJY3iK7PqQR5YOg7yUPDcy7ded6mFvHHfgeO/LT8U9kN7YAxdRhdv9gF7OP
mvKoCfE1IBen5ynqiJCv/PDCKVmMtJzSsecHUFLuYAHY3fY5EKp4eGnaUUGHajM7OuxPptc5F6Wg
tvnVuzuOptkZmx9l60Q99AqeVOY9R7G4yP+rNc7CayCrg7UaXGoHGQIDAQABAoIBACYViqFFyS/n
Lp8ZbqnLfbIzAhTWcCfsTSUB0JnTl5L9RkoOjhvaKzXGWubHVY7haG57pEbmf5rVyyzoz6QRh5Gt
Yl95mbJuyuMxa7HdgTZeWTOwneCSft8JZwCabD2B6ABxKzkamY1EXanq/a9jq33oJhPbiWNxJj6k
2Ycg4l5FZqeq4XCpK9A+VYJqQr+V1r3KDnEl+POz6U2lt+dWLW2JMaeF1/V6y0sbj3n41ftAU3HE
cOAo+HU6bA1nzOSIK7sfLvjelwjqog+i1ep8HfJarOB5GnkXQCMYbsSdZZyr7HlasluIFf4jIev6
M0/8VIXYFllWD4n10ww0Tj9xp4UCgYEA8L/20AflHxLUHFdOxiOhRwqmApkh2kfjtBA1IsgZg4RW
gATL5NfzxW5IdTAHXBkQYpQsBxnGzAbW0oniAcbrK0nEMmvcGNFXrrwN2vuBd+U4JFwBDckJ/UP6
fTASb7KCX8llg30NxllL8coc/WDHhvkAGNCvVMICV7Hx8U4zg/cCgYEAtp7WhEQpoXs9egodG4l8
MNVigwOYCqFv268if7yIMI58vsrmyggUFoJFqQlna2Ma01jvrn8YUX5bvBRj9Eo5iJ4GsPIJ04QF
1w+X4ESYAI53W5ccOa1z0woAYzeuClNzZpDCOLSGPJcLH1ZzFtIDE2Nfe4pxIRrnzwBLkEjI6W8C
gYBlVGbNqIUHTyV3yEefnd+DxzeYYFufRCLS5v92ZEJY2JqPx3UKHNq9fm2A5XYzjVkYJMVjN7Y0
qaxBcUdu+AqDbcjmb/9zcqk1InGyealEjXXT1+WZp8RMlRAZIOKhoMC/EEVp0ni5w1vzqN4Kx3Ez
nhosV6l0QzQ5NOxgZEnKgQKBgHmjKrdGv4PzlmsnOWQSG0pblxY02pyaEut8p7n1VbEh9y0N8NM4
tkiX1NZWkTAR/tgvMNZFiWkehPOtkTYyCkhZGZPaY3kjQtCQblTO23/jZNT4vbAdPDyhOMjdWWs/
UmpKmVMzywWohZwF9PqKP8o2Mm8TM28dgLF8PNiJ4mi5AoGBAJlVCn86fgfGycILjYY5pRupmiw6
IyiY87xsY/dq1rsF/AsbSqAwaNgRuFxDsCdxfrUp+ExzALUT3uDtI8cS2h8eSeN9waUUq43t+M3Z
26TTxX3/QvID/SZHLipeYoWf01dw6aMoVTrCFByPpJyYIBxBRTPQF/NRIBP78CBCPODM
-----END RSA PRIVATE KEY-----";
        echo (int)openssl_private_decrypt($encrypted,$decrypted,$private);
        file_put_contents (__DIR__.'/../Resources/config/file.decrypted', $decrypted);


        $encoded = $this->encode($string );
        $decoded = $this->decode($encoded);

        return $this->render('NXCSafeBundle:Default:index.html.twig', array(
            'name' => $name,
            'encrypted'=>$encrypted_base64_encode,
            'decrypted'=>$decrypted,
            'encoded'=>$encoded,
            'decoded'=>$decoded,
            ));
    }

}
