<?php

namespace NXC\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
class DefaultController extends Controller
{
    public function indexAction($name)
    {
        $form = $this->container->get('fos_user.registration.form');
        $csrfToken = $this->container->get('form.csrf_provider')->generateCsrfToken('authenticate');

        $data = array(
            'name' => $name,
            'form' => $form->createView(),
            'last_username' => "",
            'error'         => "",
            'csrf_token' => $csrfToken,
        );
        return $this->render('NXCUserBundle:Default:index.html.twig', $data);
    }
}
