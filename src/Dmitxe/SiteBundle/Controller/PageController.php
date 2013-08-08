<?php

namespace Dmitxe\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller
{
    public function indexAction()
    {
        return $this->render('DmitxeSiteBundle:Page:index.html.twig');
    }
}
