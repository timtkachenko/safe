<?php

namespace NXC\SafeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Component\HttpFoundation\JsonResponse;
/**
 * @Route("/secured")
 */
class SecuredController extends Controller
{
    protected $skey = "yourSecretKey"; // you can change it
    protected $pubkey = "";
    protected $privkey = "";
    protected $salt = "";

    public function init() {
        $user = $this->container->get('security.context')->getToken()->getUser();
        $this->salt = $user->getSalt();
    }
    /**
     * @Route("/guestsave", name="_secured_guestsave")
     */
    public function guestSaveAction() {
//        define("KEY_PASSPHRASE", "testkey");
//        define("TEST_PASSWORD", "test");
        $error = $em = null;
        $request = $this->getRequest();
        $isVaild = true;
        /**
         * decode msg
         */
        $encrypted = $request->request->get("encrypted");
        $filename = __DIR__.'/../Resources/config/msg.txt';
        file_put_contents($filename, $encrypted);
        $password = $request->request->get("password");

//        $decoded = null;
//        openssl_private_decrypt($encrypted, $decoded, openssl_pkey_get_private(KEY_PRIVATE, KEY_PASSPHRASE));
//        echo $decoded;
        /**
         *  end decode msg
         */
        return new JsonResponse($encrypted) ;
    }
    /**
     * @Route("/getmsg", name="_secured_getmsg")
     */
    public function getmsgAction() {
        $filename = __DIR__.'/../Resources/config/msg.txt';
        $encrypted = file_get_contents($filename);
        return new JsonResponse($encrypted) ;
    }
    /**
     * @Route("/test", name="secured_test")
     */
    public function rsaAction() {
        $user = $this->container->get('security.context')->getToken()->getUser();
//        var_dump($user);
        $userSalt = $user->getSalt();
        $skey = "yourSecretKey";
        $this->getKeys();
        $request = $this->getRequest();
        $passwordRSA = base64_decode($request->request->get("password"));//"yourSecretKey";// $request->request->get("password");
        // $passphrase is required if your key is encoded (suggested)
        $res = openssl_get_privatekey($this->privkey,$skey);
        /*
         * NOTE:  Here you use the returned resource value
         */
        $encryptedAES = $request->request->get("encrypted");
        $password = '';
        openssl_private_decrypt($passwordRSA, $password,  $res);
        $this->skey = $password;
        $decrypted = $this->decode($encryptedAES);




        $this->getKeys("test");
        $guestAESKey = $password;

        return new JsonResponse(array($password, $encryptedAES)) ;
    }
    public function getKeys($name = '') {
        $privsrc = __DIR__.'/../Resources/config/private'.$name.'.key';
        $pubsrc = __DIR__.'/../Resources/config/public'.$name.'.key';
        if(is_readable($privsrc) && is_readable($pubsrc)){
            $privkey =  file_get_contents($privsrc);
            $this->privkey = $privkey;
            $pubkey =  file_get_contents($pubsrc);
            $this->pubkey = $pubkey;
        }else{
            $this->genKeys($name);
        }
    }
    public function genKeys($name = '') {
        $privsrc = __DIR__.'/../Resources/config/private'.$name.'.key';
        $pubsrc = __DIR__.'/../Resources/config/public'.$name.'.key';
        if(!is_readable($privsrc) && !is_readable($pubsrc)){
//            $config = array (
//                'digest_alg'       => 'sha256',
//                'private_key_type' => OPENSSL_KEYTYPE_RSA,
//                'private_key_bits' => 2048,
//                'encrypt_key'      => true,
//            );
            $config = array(
            "private_key_bits"=>512
            );
            // Create the keypair
            $keypair = openssl_pkey_new( $config );
            // Get private key
            openssl_pkey_export( $keypair, $privkey, $this->skey, $config );
            $this->privkey = $privkey;
            file_put_contents ($privsrc, $privkey);
            // Get public key
            $pubkey = openssl_pkey_get_details($keypair);
            $this->pubkey = $pubkey["key"];
            file_put_contents ($pubsrc, $pubkey["key"]);
        }
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
        $this->getKeys();
        $string = 'It works ? Or not it works ?';
        $encrypted = '';
        echo (int)openssl_public_encrypt ($string, $encrypted, $this->pubkey);
        $encrypted_base64_encode = base64_encode($encrypted);
        file_put_contents (__DIR__.'/../Resources/config/file.encrypted', $encrypted_base64_encode);
        $decrypted="";

        $res = openssl_get_privatekey($this->privkey,  $this->skey);
        echo (int)openssl_private_decrypt($encrypted, $decrypted,  $res);
        file_put_contents (__DIR__.'/../Resources/config/file.decrypted', $decrypted);


        $encoded = $this->encode($string );
        $decoded = $this->decode($encoded);

        return $this->render('NXCSafeBundle:Default:index.html.twig', array(
            'name' => $name,
//            'encrypted'=>$encrypted_base64_encode,
            'decrypted'=>$decrypted,
//            'encoded'=>$encoded,
            'decoded'=>$decoded,
            ));
    }
    /**
     * @Route("/login", name="_demo_login")
     * @Template()
     */
    public function loginAction()
    {
define("KEY_PUBLIC", "-----BEGIN PUBLIC KEY-----
MFwwDQYJKoZIhvcNAQEBBQADSwAwSAJBAMYQWDqtLgDKlQvWzacGeBMQpbicd/uo
XAvgLNpFZLM7zuYFDhrYncRsl8LIHK0K3f7e1aFmUVgM4LrKU2WFIw0CAwEAAQ==
-----END PUBLIC KEY-----
");

define("KEY_PRIVATE", "-----BEGIN RSA PRIVATE KEY-----
Proc-Type: 4,ENCRYPTED
DEK-Info: DES-EDE3-CBC,2BE9EB9BD7712C2B

FQ9nRtev8hFY+FXkbnH2qBdg7+cD4x759C5c+5PhwWAVccOA4nvtBnE4AUT1bC+H
r/viTPzL5M0vFbAfpOPeUVfuCYXmAxFwcW+pn++UtlNezMtWqZdGPSPc86OqtChE
PjZ5rNBhjTAY7xXX2n+jbZSq8M2LSWyM4gy3Oj8QMnKwdGNWeM/E/4uYyMr5V3Eb
7KveReWJnZ3r3mF7uWJYCjABRzVF8k5sn86FpRn6pLWRHigkpiyNGF7acJMRqaSY
RUIrVf5xclLloUoSuEAe8HSdTH7oxl3vqf8byedqzuWyAxCFWRNr2e+TJ79f1XPJ
m9vLhWhm1BWM3OiB8iw2MkaTx/RCEf31O3cgNG3bcW/uIZrvdV0xRhHsjk0HNFNI
QOEcS73avo2o4ncPJpxLGqg+a0ERtRhFRp0JdgwCxl8=
-----END RSA PRIVATE KEY-----
");

        define("KEY_PASSPHRASE", "testkey");
        define("TEST_PASSWORD", "test");

        ob_start();

        $error = $em = null;
        $request = $this->getRequest();
        $isVaild = true;

        /**
         * decode msg
         */
        $encoded = base64_decode($request->request->get("encoded"));
        $decoded = null;
        openssl_private_decrypt($encoded, $decoded, openssl_pkey_get_private(KEY_PRIVATE, KEY_PASSPHRASE));
        echo $decoded;
        /**
         *  end decode msg
         */

        /**
         * decode login
         */
        if(!$request->request->has("login")){
            $error = "no login";
            $isVaild = false;
        }
        $email = $request->request->get("email");
        $login = $request->request->get("login");
        $login = base64_decode($login);
    // decrypt argument function login($email, $login) {
        if (!openssl_private_decrypt($login, $login, openssl_pkey_get_private(KEY_PRIVATE, KEY_PASSPHRASE))) {
            echo "Failed to decrypt message.\n";
            $isVaild = false;
        }
        // expecting sha1password+timestamp
        if (strlen($login) < 44)
            $isVaild = false;
        // extract password
        $password = substr($login, 0, 40);
        // extract stamp, stamp has milliseconds and is bigger than int
        $stamp = substr($login, 40);
        // extract timestamp, timestamp is in seconds, and is an int
        $timestamp = substr($stamp, 0, strlen($stamp) - 3);
        if (!is_numeric($timestamp))
            $isVaild = false;
        // check timestamp
        if (abs(time() - (int) $timestamp) > 300) {
            echo "Timestamp expired. Client and server times may be out of sync.\n";
            $isVaild = false;
        }
        // construct stamp
        //$stamp = "user.login.".sha1($email).".".$stamp;
        // take a note of the stamp, each unique stamp can only be used once
        //if($memcache->get($stamp) != NULL) return false;
        //$memcache->set($stamp,1,USER_LOGIN_TIMESTAMP_TTL);
        // connect to db and check password
        // check password
        if (pack("H*", $password) != pack("H*", sha1(TEST_PASSWORD))) {
            echo "Password incorrect.\n";
            $isVaild = false;
        }

        /**
         * end decode login
         */
        $contents = ob_get_contents();
        ob_end_clean();

//        $email = $_REQUEST["email"];
//        $login = base64_decode($_REQUEST["login"]);
//        if(login($email, $login))
//            echo "login succeeded!";
//        else
//            echo "login failed!";
        return $this->render('NXCSafeBundle:Default:index.html.twig', array(
            'name' => $contents,
            'encrypted'=>'$encrypted_base64_encode',
            'decrypted'=>'$decrypted',
            'encoded'=>'$encoded',
            'decoded'=>'$decoded',
            ));
    }

    /**
     * @Route("/login_check", name="_security_check")
     */
    public function securityCheckAction()
    {
        // The security layer will intercept this request
    }

    /**
     * @Route("/logout", name="_demo_logout")
     */
    public function logoutAction()
    {
        // The security layer will intercept this request
    }
    /**
     * @Route("/getlink", name="_secured_getlink")
     * @Template()
     */
    public function getLinkAction() {
        $this->init();
        $request = $this->getRequest();
        $guestname = $request->request->get("username");
        $em = $this->getDoctrine()->getEntityManager();
        $guest = $em->getRepository('NXCSafeBundle:User')->findBy(array('username' => $guestname));
        if(isset($guest[0]))$guest = $guest[0];
        if($guestname=='test')
            $guestSalt = md5($this->salt.$guest->getSalt());
        elseif($guestname=='ateamdev')
            $guestSalt = md5($guest->getSalt().$this->salt);
        return new JsonResponse($guestSalt) ;
    }

    /**
     * @Route("/", defaults={"name"="World"}),
     * @Route("/index/{name}", name="_demo_secured_hello")
     * @Template()
     */
    public function helloAction($name)
    {
//        var_dump($user);
//        $dn = array("countryName" => 'XX',
//            "stateOrProvinceName" => 'State',
//            "localityName" => 'SomewhereCity',
//            "organizationName" => 'MySelf',
//            "organizationalUnitName" => 'Whatever',
//            "commonName" => 'mySelf',
//            "emailAddress" => 'user@domain.com');
//        $privkeypass = '1234';
//        $numberofdays = 365;
//        $csr = openssl_csr_new($dn, $privkey);
//        $sscert = openssl_csr_sign($csr, null, $privkey, $numberofdays);
//        openssl_x509_export($sscert, $publickey);
//        openssl_pkey_export($privkey, $privatekey, $privkeypass);
//        openssl_csr_export($csr, $csrStr);
//        echo $privatekey; // Will hold the exported PriKey
//        echo $publickey;  // Will hold the exported PubKey
//        echo $csrStr;     // Will hold the exported Certificate
        $this->getKeys();
        $pubkey = preg_replace("@\n+@", "", $this->pubkey);
        return $this->render('NXCSafeBundle:Secured:index.html.twig', array(
            "userPublickey"=> $pubkey ,
            'userAESKey'=>$this->skey,
            ));
    }

    /**
     * @Route("/hello/admin/{name}", name="_demo_secured_hello_admin")
     * @Secure(roles="ROLE_ADMIN")
     * @Template()
     */
    public function helloadminAction($name)
    {
        return array('name' => $name);
    }
}
