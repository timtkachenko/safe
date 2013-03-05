<?php

namespace NXC\SafeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use NXC\SafeBundle\Entity\Handshake;
/**
 * @Route("/", name="default")
 */
class DefaultController extends Controller
{
    const CYPHER = MCRYPT_RIJNDAEL_256;
    const MODE   = MCRYPT_MODE_CBC;
//    const KEY    = MD5('somesecretphrase');

    public function encrypt($plaintext)
    {
        $td = mcrypt_module_open(self::CYPHER, '', self::MODE, '');
        $iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
        mcrypt_generic_init($td, self::KEY, $iv);
        $crypttext = mcrypt_generic($td, $plaintext);
        mcrypt_generic_deinit($td);
        return base64_encode($iv.$crypttext);
    }

    public function decrypt($crypttext)
    {
        $crypttext = base64_decode($crypttext);
        $plaintext = '';
        $td        = mcrypt_module_open(self::CYPHER, '', self::MODE, '');
        $ivsize    = mcrypt_enc_get_iv_size($td);
        $iv        = substr($crypttext, 0, $ivsize);
        $crypttext = substr($crypttext, $ivsize);
        if ($iv)
        {
            mcrypt_generic_init($td, self::KEY, $iv);
            $plaintext = mdecrypt_generic($td, $crypttext);
        }
        return trim($plaintext);
    }
    public function indexAction($name=null)
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        $contents = $user->getUsernameCanonical();
        return $this->render('NXCSafeBundle:Default:index.html.twig', array(
            "user"=>"{$user->getEmail()}",
            "name"=> $contents,
            ));
    }
    /**
     * @Route("/dbtest", name="dbtest")
     */
    public function dbTestAction() {
        $user = $this->container->get('security.context')->getToken()->getUser();
        $qb = $this->getDoctrine()->getEntityManager()->createQueryBuilder();
//        $qb->select('p')
//            ->from('NXCSafeBundle:User', 'p')
//            //->where($qb->expr()->in('a.id', ':userid'))
//            ->where('a.id=:userid')
//            ->leftJoin('p.friendsWithMe', 'a')
//            ->setParameter('userid', $user->getId());

/*
SELECT `h`.power,
    case when (`h`.`user_id`=`fu`.`id`) then `h`.`friend_user_id`
    when (`h`.`friend_user_id`=`fu`.`id`) then `h`.`user_id` end as `friend`
FROM `handshake` as h,
fos_user_user as fu
where (fu.id=1 and fu.id =h.user_id)  or (fu.id=1 and fu.id =h.friend_user_id)
 */
        $qb->select('h.id,h.power','case when (u.id=:userid) then f.id
            when (h.friend=:userid) then u.id else 0 end fid')
                ->from('NXCSafeBundle:Handshake', 'h')
                ->join('h.user', 'u')
                ->join('h.friend', 'f')
                ->where('h.id!=0')
                ->setParameter('userid', $user->getId());

//        $qb->from('NXCSafeBundle:Handshake', 'h')
//            ->leftJoin('h.user', 'u')
//            ->leftJoin('h.myFriends', 'f')
//            ->select('h.id, h.power, u.username u1, f.username u2')
//            ->where('u.id=:userid')
//            ->orWhere('f.id=:userid')
//            ->setParameter('userid', $user->getId());
        $dump = $qb->getQuery()->getResult();
        $msg = "igogo".  var_export($dump, true);
        return $this->render('NXCSafeBundle:Default:index.html.twig', array(
            "user"=>"{$user->getEmail()}",
            "name"=> $msg,
            ));
    }

    /**
     * @Route("/cowork", name="cowork")
     */
    public function coworkAction()
    {
        $error = $em = null;
        $oper = "add";
        $request = $this->getRequest();
        $user = $this->container->get('security.context')->getToken()->getUser();

        $em = $this->getDoctrine()->getEntityManager();
        $friend = $em->getRepository('NXCSafeBundle:User')->findOneBy(array('username'=>'ateamdev'));

//        $em = $this->getDoctrine()->getEntityManager();
        if($oper ==="add"){
            $handshake = new Handshake();
//            $handshake = $em->getRepository('NXCSafeBundle:Handshake');
            $handshake->setUser($user);
            $handshake->setFriend($friend);
            $handshake->setPower(md5($oper . microtime()));

//            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($handshake);
            $em->flush();

            $user->setFriendsWithMe($handshake);
            $em->persist($user);
        }elseif($oper === "edit"){
            if (!$whisper) {
                throw $this->createNotFoundException(
                    'No product found for id '.$id
                );
            }
            $whisper->setWhisper($grid_whisper);
        }
        $em->flush();
        $result = array("error"=>$error,"result"=>array($handshake->getId()));
        $response = new Response();
        $response->setContent(json_encode($result));
        return $response;
    }
}
