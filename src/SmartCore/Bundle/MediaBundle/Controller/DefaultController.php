<?php

namespace SmartCore\Bundle\MediaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SmartMediaBundle:Default:index.html.twig', array('name' => $name));
    }
}
