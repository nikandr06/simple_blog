<?php

namespace SmartCore\Bundle\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @todo удалить
 */
class DefaultController extends Controller
{
    public function indexAction()
    {
        $blog = $this->get('smart_blog');

        $articles = $blog->getLastArticles();

        return $this->render('SmartBlogBundle::articles.html.twig', [
            'articles' => $articles
        ]);
    }
}
