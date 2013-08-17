<?php

namespace SmartCore\Bundle\BlogBundle\Service;

use Doctrine\ORM\EntityManager;
use SmartCore\Bundle\BlogBundle\Event\FilterArticleEvent;
use SmartCore\Bundle\BlogBundle\Model\ArticleInterface;
use SmartCore\Bundle\BlogBundle\Model\CategoryInterface;
use SmartCore\Bundle\BlogBundle\Model\TagInterface;
use SmartCore\Bundle\BlogBundle\Repository\ArticleRepositoryInterface;
use SmartCore\Bundle\BlogBundle\Repository\CategoryRepository;
use SmartCore\Bundle\BlogBundle\SmartBlogEvents;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class AdminCategoryService extends AbstractBlogService
{
    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * Constructor.
     *
     * @param \SmartCore\Bundle\BlogBundle\Repository\CategoryRepository $categorysRepo
     * @param int $itemsPerPage
     */
    public function __construct(EntityManager $em,CategoryRepository $categorysRepo, EventDispatcherInterface $eventDispatcher, $itemsPerPage = 10)
    {
        $this->articlesRepo     = $categorysRepo;
        $this->em               = $em;
        $this->eventDispatcher  = $eventDispatcher;
        $this->setItemsCountPerPage($itemsPerPage);
    }

    /**
     * @return ArticleInterface
     */
}
