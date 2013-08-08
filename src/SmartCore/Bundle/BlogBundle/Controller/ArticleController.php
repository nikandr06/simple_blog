<?php

namespace SmartCore\Bundle\BlogBundle\Controller;

use Dmitxe\BlogBundle\Entity\Article;
use Pagerfanta\Exception\NotValidCurrentPageException;
use Pagerfanta\Pagerfanta;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use SmartCore\Bundle\BlogBundle\Form\Type\ArticleFormType;
use SmartCore\Bundle\BlogBundle\Pagerfanta\SimpleDoctrineORMAdapter;

class ArticleController extends Controller
{
    /**
     * @param string $slug
     * @return Response
     */
    public function showAction($slug)
    {
        return $this->render('SmartBlogBundle::article.html.twig', [
            'article' => $this->get('smart_blog')->getArticleBySlug($slug),
        ]);
    }

    /**
     * @param int $page
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function pageAction($page = 1)
    {
        $blog = $this->get('smart_blog');

        $pagerfanta = new Pagerfanta(new SimpleDoctrineORMAdapter($blog->getFindByCategoryQuery()));
        $pagerfanta->setMaxPerPage($blog->getArticlesPerPage());

        try {
            $pagerfanta->setCurrentPage($page);
        } catch (NotValidCurrentPageException $e) {
            return $this->redirect($this->generateUrl('smart_blog_index'));
        }

        return $this->render('SmartBlogBundle::articles.html.twig', [
            'pagerfanta' => $pagerfanta,
        ]);
    }

    /**
     * @param Request $request
     * @param integer $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function editAction(Request $request, $id)
    {
        $article = $this->get('smart_blog')->getArticle($id);

        $form = $this->createForm(new ArticleFormType(get_class($article)), $article);
        if ($request->isMethod('POST')) {
            $form->submit($request);

            if ($form->isValid()) {
                $article = $form->getData();

                /** @var \Doctrine\ORM\EntityManager $em */
                $em = $this->getDoctrine()->getManager();
                $em->persist($article);
                $em->flush();

                return $this->redirect($this->generateUrl('smart_blog_article', ['slug' => $article->getSlug()] ));
            }
        }

        return $this->render('SmartBlogBundle::article_edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    public function newAction(Request $request)
    {
        $article = new Article();
//        $form = $this->createForm(new ServiceType(), $service);
        $form = $this->createForm(new ArticleFormType(get_class($article)), $article);

 /*       if ($request->getMethod() == 'POST') {
            $form->bindRequest($request, false);

            if ($form->isValid()) {
                // выполняем прочие действие, например, сохраняем задачу в базе данных
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($service);
                $em->flush();
                $this->get('session')->getFlashBag()->add('success','Новая услуга создана!');

                return $this->redirect($this->generateUrl('monolith_cabinet_service'));
            }
        }*/
        if ($request->isMethod('POST')) {
            $form->submit($request);

            if ($form->isValid()) {
                $article = $form->getData();

                /** @var \Doctrine\ORM\EntityManager $em */
                $em = $this->getDoctrine()->getManager();
                $em->persist($article);
                $em->flush();

                return $this->redirect($this->generateUrl('smart_blog_article', ['slug' => $article->getSlug()] ));
            }
        }

/*        return $this->render('MonolithAdminBundle:Service:new.html.twig', array(
            'form' => $form->createView(),
        ));*/
        return $this->render('SmartBlogBundle::article_new.html.twig', [
            'form' => $form->createView(),
        ]);

    }

}
