<?php

namespace NXC\SafeBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use NXC\SafeBundle\Entity\User;
use NXC\SafeBundle\Entity\Whisper;

class GridController extends Controller
{
    /**
     * @Route("/viewgrid", name="viewgrid")
     * @Template()
     */
    public function indexAction()
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        $em = $this->getDoctrine()->getEntityManager();
        $qb = $em->createQueryBuilder()->from('NXCSafeBundle:Whisper', 'p')->leftJoin('p.user', 'c')
                ->select('p.id, p.whisper, p.created, c.username')
                ->where("c.id = {$user->getId()}")
                ->groupBy('p.id');
//        $qb = $em->createQueryBuilder()->from('EPSDemoBundle:Post', 'p')->leftJoin('p.author', 'a')->leftJoin('p.comments', 'c')
//                 ->select('a.name, p.id, p.datepost, p.title, count(c.id) as nbcomments')->groupBy('p.id');
//
//        $authors = $em->getRepository('EPSDemoBundle:Author')->findAll();
//
//        $lstauthor = array();
//        $lstauthor[''] = 'All';
//        foreach ($authors as $a) {
//            $lstauthor[$a->getName()] = $a->getName();
//        }

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
        $grid->addColumn('ID', array('name' => 'id', 'index' => 'p.id', 'hidden' => true, 'sortable' => false, 'search' => false,'editable'=>true));
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
    /**
     * @Route("/usergrid", name="usergrid")
     * @Template()
     */
    public function usergridAction()
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        $em = $this->getDoctrine()->getEntityManager();
        $qb = $em->createQueryBuilder()->from('NXCSafeBundle:User', 'p')
                ->select('p.id, p.username, p.salt')
                ->where("p.id != {$user->getId()}");
        $gridFactory = $this->get('ypt_jq_grid');
        $grid = $gridFactory->createGrid();
        //OPTIONAL
        $grid->setName('grid');
        $grid->setCaption('list of posts');
        $grid->setGridOptions(array('height' => '333', 'width' => '910',
            "editurl"=>"usergrid/edit",
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
        //MANDATORY
        $grid->setSource($qb);

        //COLUMNS DEFINITION
        $grid->addColumn('Action', array('twig' => 'NXCSafeBundle:Grid:_testgridaction.html.twig', 'name' => 'action', 'resize' => false, 'sortable' => false, 'search' => false, 'width' => '50'));
        $grid->addColumn('ID', array('name' => 'id', 'index' => 'p.id', 'hidden' => true, 'sortable' => false, 'search' => false,'editable'=>true));
//        $grid->addColumn('Author', array('name' => 'name', 'index' => 'a.name', 'width' => '150', 'stype' => 'select', 'searchoptions' => array('value' => $lstauthor)));
//        $grid->addColumn('whisper', array('name' => 'whisper', 'index' => 'p.whisper', 'autocomplete' => 'ajax_whisper', 'width' => '150','edittype'=>"textarea",'editable'=>true,"editoptions"=>array("size"=>10, "maxlength"=>15)));
//        $grid->addColumn('Date created', array('name' => 'created', 'index' => 'p.created', 'formatter' => 'date', 'datepicker' => true));
        $grid->addColumn('username', array('name' => 'username', 'index' => 'username', 'search' => true));
        $grid->addColumn('salt', array('name' => 'salt', 'index' => 'salt', 'search' => true));

        $data = $grid->render();
        return $data;
    }
    /**
     * @Route("/viewgrid/edit", name="grid_edit")
     * @Template()
     */
    public function gridAction()
    {
        $error = $em = null;
        $request = $this->getRequest();
        if(!$request->request->has("oper")){
            $error="no oper defined";
        }else{
            $oper = $request->request->get("oper");
            $id = $request->request->get('id');
            $grid_whisper = $request->request->get('grid_whisper');
            $user = $this->container->get('security.context')->getToken()->getUser();
            $em = $this->getDoctrine()->getEntityManager();
            if($oper ==="add"){
                $whisper  = new Whisper();
                $whisper->setUser($user);
                $whisper->setWhisper($grid_whisper);
                $em->persist($whisper);
            }elseif($oper === "edit" && $id){
                $whisper = $em->getRepository('NXCSafeBundle:Whisper')->find($id);
                if (!$whisper) {
                    throw $this->createNotFoundException(
                        'No product found for id '.$id
                    );
                }
                $whisper->setWhisper($grid_whisper);
            }
            $em->flush();
        }
        $result = array("error"=>$error,"result"=>array($whisper->getId()));
        $response = new Response();
        $response->setContent(json_encode($result));
        return $response;
    }

    /**
     * @Route("/ajax_title", name="ajax_title")
     */
    public function ajaxTitleAction()
    {

        $request = $this->getRequest();

        if ($request->isXmlHttpRequest()) {

            $value = $request->get('term');

            $em = $this->getDoctrine()->getEntityManager();
            $posts = $em->getRepository('EPSDemoBundle:Post')->findAjaxValue($value);

            $json = array();

            foreach ($posts as $post) {
                $json[] = array(
                    'label' => $post->getTitle(), 'value' => $post->getTitle()
                );
            }

            $response = new Response();

            $response->setContent(json_encode($json));

            return $response;
        } else {
            return new Response('Forbidden', 403);

        }

    }

}
