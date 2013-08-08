<?php

namespace SmartCore\Bundle\BlogBundle\Controller;

use Pagerfanta\Exception\NotValidCurrentPageException;
use Pagerfanta\Pagerfanta;
use SmartCore\Bundle\BlogBundle\Pagerfanta\SimpleDoctrineORMAdapter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TagController extends Controller
{
    public function indexAction()
    {
        $blog = $this->get('smart_blog');

        $cloud = [];
        $tags = $blog->getTagsCloud();

        foreach ($tags as $tag) {
            $cloud[] = [
                'count' => $blog->getArticlesCountByTag($tag),
                'tag'   => $tag,
            ];
        }

        return $this->render('SmartBlogBundle::tags.html.twig', [
            'cloud' => $cloud,
        ]);
    }

    /**
     * @param Request $requst
     * @param $slug
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function showArticlesAction(Request $requst, $slug)
    {
        $blog = $this->get('smart_blog');

        $tag = $blog->getTagBySlug($slug);

        $pagerfanta = new Pagerfanta(new SimpleDoctrineORMAdapter($blog->getFindByTagQuery($tag)));
        $pagerfanta->setMaxPerPage($blog->getArticlesPerPage());

        try {
            $pagerfanta->setCurrentPage($requst->query->get('page', 1));
        } catch (NotValidCurrentPageException $e) {
            return $this->redirect($this->generateUrl('smart_blog_tag_index'));
        }
        return $this->render('SmartBlogBundle::articles_by_tag.html.twig', [
            'tag'        => $tag,
            'pagerfanta' => $pagerfanta,
        ]);
    }
}
