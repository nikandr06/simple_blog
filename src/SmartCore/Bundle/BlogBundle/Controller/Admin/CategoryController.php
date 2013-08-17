<?php

namespace SmartCore\Bundle\BlogBundle\Controller\Admin;

use Pagerfanta\Exception\NotValidCurrentPageException;
use Pagerfanta\Pagerfanta;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use SmartCore\Bundle\BlogBundle\Form\Type\categoryCreateFormType;
use SmartCore\Bundle\BlogBundle\Form\Type\categoryEditFormType;
use SmartCore\Bundle\BlogBundle\Pagerfanta\SimpleDoctrineORMAdapter;

class CategoryController extends Controller
{
    /**
     * Имя сервиса по работе со статьями.
     *
     * @var string
     */
    protected $categoryAdminServiceName;

    /**
     * Маршрут на список статей.
     *
     * @var string
     */
    protected $routeAdmincategory;

    /**
     * Маршрут редактирования статьи.
     *
     * @var string
     */
    protected $routeAdmincategoryEdit;

    /**
     * Имя бандла. Для перегрузки шаблонов.
     *
     * @var string
     */
    protected $bundleName;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->categoryAdminServiceName    = 'smart_blog.categoryAdmin';
        $this->routeAdmincategory     = 'smart_blog_admin_category';
        $this->routeAdmincategoryEdit = 'smart_blog_admin_category_edit';
        $this->bundleName            = 'SmartBlogBundle';
    }

    public function indexAction(Request $requst)
    {
        /** @var \SmartCore\Bundle\BlogBundle\Service\ArticleService $articleService */
       ld($this->categoryAdminServiceName);
        ld('123555');
        $categoryService = $this->get('smart_blog.category.repository');

        ld($categoryService);
//        $categoryService = $this->get($this->categoryAdminServiceName);
        $categoryService = $this->get('smart_blog.categoryAdmin');

    /*    $pagerfanta = new Pagerfanta(new SimpleDoctrineORMAdapter($categoryService->getFindByCategoryQuery()));
        $pagerfanta->setMaxPerPage($articleService->getItemsCountPerPage());

        try {
            $pagerfanta->setCurrentPage($requst->query->get('page', 1));
        } catch (NotValidCurrentPageException $e) {
            return $this->redirect($this->generateUrl($this->routeIndex));
        }

        return $this->render($this->bundleName . ':Admin/Article:list.html.twig', [
            'pagerfanta' => $pagerfanta,
        ]);
    */
    }


}
