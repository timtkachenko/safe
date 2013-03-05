<?php

namespace NXC\SafeBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use NXC\SafeBundle\Entity\User;
use NXC\SafeBundle\Entity\Whisper;
use NXC\SafeBundle\Entity\Handshake;
/**
 * @Route("/coworkers")
 */
class CoworkersGridController extends Controller
{
    /**
     * @Route("/")
     * @Route("/grid", name="_coworkers_grid")
     * @Template()
     */
    public function indexAction()
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
//        $em = $this->getDoctrine()->getEntityManager();
//        $qb = $em->createQueryBuilder()->from('NXCSafeBundle:User', 'p')
//                ->select('p.id, p.username')
//                ->where("p.id != {$user->getId()}");
        $qb = $this->getDoctrine()->getEntityManager()->createQueryBuilder();
        $qb->select('p')
            ->from('NXCSafeBundle:User', 'p')
            ->leftJoin('p.friendsWithMe', 'a')
            ->leftJoin('p.handshakes', 'f')
            ->where('a.user=:userid')
            ->orWhere('f.friend=:userid')
            ->setParameter('userid', $user->getId());
        $users = $qb->getQuery()->getResult();
        $fids = array();
        if(!empty($users))
        foreach($users as $friend){
            $fids[] = $friend->getId();
        }
        $fids[] = $user->getId();
        $qb->resetDQLParts();
        $qb->select('p.id, p.username')
            ->from('NXCSafeBundle:User', 'p')
            ->where($qb->expr()->notIn('p.id', ':userid'))
            //->leftJoin('p.accessories', 'a')
            ->setParameter('userid', $fids)
            ->getDQL();

        $gridFactory = $this->get('ypt_jq_grid');
//        $gridFactory->setParameter();
        $grid = $gridFactory->createGrid();
        //OPTIONAL
        $grid->setName('grid');
        $grid->setUrl('');
        $grid->setCaption('list of posts');
        $grid->setGridOptions(array('height' => '333', 'width' => '910',

            ));
//        $grid->setNavigationOptions(array("edit"=>false,"add"=>false));
        //$grid->setRouteForced($this->get('router')->generate('viewgrid'));
        //$grid->setHideIfEmpty(false);

        //MANDATORY
        $grid->setSource($qb);

        //COLUMNS DEFINITION
        $grid->addColumn('Action', array('twig' => 'NXCSafeBundle:Grid:_testgridaction.html.twig', 'name' => 'action', 'resize' => false, 'sortable' => false, 'search' => false, 'width' => '50'));
        $grid->addColumn('ID', array('name' => 'id', 'index' => 'p.id', 'hidden' => true,'key'=>true, 'sortable' => false, 'search' => false,'editable'=>true));
        $grid->addColumn('username', array('name' => 'username', 'index' => 'username', 'search' => true));

        $data = $grid->render();
        if(!$grid->isOnlyData()){
            $manager = $this->container->get('nxc.safe.secured');
            $manager->getKeys();
            $pubkey = preg_replace("@\n+@", "", $manager->getPubkey());
            $data = array_merge($data,
                    array(
                "gridBlocks"=>'NXCSafeBundle:CoworkersGrid:blocks.html.twig',
                "userPublickey"=> $pubkey ,
                'userAESKey'=>$manager->getSkey(),)
                );
        }
        return $data;
    }

    /**
     * @Route("/edit", name="_coworkers_edit")
     * @Template()
     */
    public function gridAction()
    {
        $error = $em = null;
        $request = $this->getRequest();
        $user = $this->container->get('security.context')->getToken()->getUser();
        if(!$request->request->has("oper")){
            $error="no oper defined";
        }else{
            $oper = $request->request->get("oper");
            $id = $request->request->get('id');
            $em = $this->getDoctrine()->getEntityManager();
            $friend = $em->getRepository('NXCSafeBundle:User')->find($id);

            $em = $this->getDoctrine()->getEntityManager();
            if($oper ==="add"){
                $handshake = new Handshake();
                $handshake->setUser($user);
                $handshake->setFriend($friend);
                $handshake->setPower(md5($oper . microtime()));

                $em->persist($handshake);
                $em->flush();

                $user->setFriendsWithMe($handshake);
                $em->persist($user);
            }elseif($oper === "edit"){
                if (!$friend) {
                    throw $this->createNotFoundException(
                        'No user found for id '.$id
                    );
                }
                $handshake = new Handshake();
                $handshake->setUser($user);
                $handshake->setFriend($friend);
                $handshake->setPower(md5($oper . microtime()));

                $em->persist($handshake);
                $em->flush();

                $user->setFriendsWithMe($handshake);
                $em->persist($user);
            }
            $em->flush();
        }
        $result = array("error"=>$error,"result"=>array($handshake->getId()));
        $response = new Response();
        $response->setContent(json_encode($result));
        return $response;
    }
    /**
     * @Route("/messages", name="_messages")
     * @Template()
     */
    public function messagesAction()
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        $em = $this->getDoctrine()->getEntityManager();
        $qb = $em->createQueryBuilder()->from('NXCSafeBundle:Whisper', 'p')
                ->leftJoin('p.user', 'c')
                ->select('p.id, p.whisper, p.created, c.username')
                ->where("c.id = {$user->getId()}");

        $gridFactory = $this->get('ypt_jq_grid');
        $grid = $gridFactory->createGrid();
        //OPTIONAL
        $grid->setName('grid');
        $grid->setUrl('');
        $grid->setCaption('list of posts');
        $grid->setGridOptions(array('height' => '333', 'width' => '910',
            "editurl"=>"viewgrid/edit",
            "edit" =>array(
                    "height"        =>400,
                    "addCaption"    => "Add Record",
                    "editCaption"   => "Edit Record",
                    "bSubmit"       => "Submit",
                    "bCancel"       => "Cancel",
                    "bClose"        => "Close",
                    "saveData"      => "Data has been changed! Save changes?",
                    "bYes"          => "Yes",
                    "bNo"           => "No",
                    "bExit"         => "Cancel"
                    )
            ));
        $grid->setNavigationOptions(array("edit"=>true,"add"=>true));
        //$grid->setRouteForced($this->get('router')->generate('viewgrid'));
        //$grid->setHideIfEmpty(false);

        //MANDATORY
        $grid->setSource($qb);

        //COLUMNS DEFINITION
        $grid->addColumn('Action', array('twig' => 'NXCSafeBundle:Grid:_testgridaction.html.twig', 'name' => 'action', 'resize' => false, 'sortable' => false, 'search' => false, 'width' => '50'));
        $grid->addColumn('ID', array('name' => 'id', 'index' => 'p.id', 'hidden' => true,'key'=>true, 'sortable' => false, 'search' => false,'editable'=>true));
//        $grid->addColumn('Author', array('name' => 'name', 'index' => 'a.name', 'width' => '150', 'stype' => 'select', 'searchoptions' => array('value' => $lstauthor)));
        $grid->addColumn('whisper', array('name' => 'whisper', 'index' => 'p.whisper', 'autocomplete' => 'ajax_whisper', 'width' => '150','formatter'=>'encodeWhisper','unformat'=>'decodeWhisper', 'edittype'=>"textarea",'editable'=>true,"editoptions"=>array("size"=>10, "maxlength"=>15)));
        $grid->addColumn('Date created', array('name' => 'created', 'index' => 'p.created', 'formatter' => 'date', 'datepicker' => true));
//        $grid->addColumn('username', array('name' => 'username', 'index' => 'username', 'search' => true));
//        $grid->addColumn('slug', array('name' => 'slug', 'index' => 'slug', 'search' => true));

        $data = $grid->render();
        if(!$grid->isOnlyData()){
            $manager = $this->container->get('nxc.safe.secured');
            $manager->getKeys();
            $pubkey = preg_replace("@\n+@", "", $manager->getPubkey());
            $data = array_merge($data,
                    array(
                "userPublickey"=> $pubkey ,
                'userAESKey'=>$manager->getSkey(),)
                );
        }
        return $data;
    }

}
