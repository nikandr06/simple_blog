<?php

namespace SimpleBlog\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller
{
    public function indexAction()
    {
        return $this->render('SimpleBlogSiteBundle:Page:index.html.twig');
    }
}
