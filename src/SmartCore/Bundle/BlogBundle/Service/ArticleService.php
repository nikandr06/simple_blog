<?php

namespace SmartCore\Bundle\BlogBundle\Service;

use Doctrine\ORM\EntityRepository;
use SmartCore\Bundle\BlogBundle\Model\ArticleInterface;
use SmartCore\Bundle\BlogBundle\Model\CategoryInterface;
use SmartCore\Bundle\BlogBundle\Model\TagInterface;

class ArticleService
{
    /**
     * @var \SmartCore\Bundle\BlogBundle\Repository\ArticleRepository
     */
    protected $articlesRepo;

    /**
     * @var integer
     */
    protected $itemsPerPage;

    /**
     * Constructor.
     *
     * @param EntityRepository $articlesRepo
     * @param int $itemsPerPage
     */
    public function __construct(EntityRepository $articlesRepo, $itemsPerPage = 10)
    {
        $this->articlesRepo = $articlesRepo;
        $this->itemsPerPage = $itemsPerPage;
    }

    /**
     * @return ArticleInterface
     */
    public function create()
    {
        return new $this->articlesRepo->getClassName();
    }
    
    /**
     * @param integer $id
     * @return ArticleInterface|null
     */
    public function get($id)
    {
        return $this->articlesRepo->find($id);
    }

    /**
     * @return integer
     */
    public function getItemsPerPage()
    {
        return $this->itemsPerPage;
    }

    /**
     * @param CategoryInterface $category
     * @param integer|null $limit
     * @param integer|null $offset
     * @return ArticleInterface[]|null
     */
    public function getByCategory(CategoryInterface $category = null, $limit = null, $offset = null)
    {
        return $this->articlesRepo->findByCategory($category, $limit, $offset);
    }

    /**
     * @param CategoryInterface|null $category
     * @return \Doctrine\ORM\Query
     */
    public function getFindByCategoryQuery(CategoryInterface $category = null)
    {
        return $this->articlesRepo->getFindByCategoryQuery($category);
    }

    /**
     * @param TagInterface $tag
     * @param integer|null $limit
     * @param integer|null $offset
     * @return ArticleInterface[]|null
     *
     * @todo постраничность.
     */
    public function getByTag(TagInterface $tag, $limit  = null, $offset = null)
    {
        return $this->articlesRepo->findByTag($tag);
    }

    /**
     * @param integer|null $year
     * @param integer|null $month
     * @param integer|null $day
     * @return ArticleInterface[]|null
     */
    public function getByDate($year = null, $month = null, $day = null)
    {
        // @todo
    }

    /**
     * @param string $slug
     * @return ArticleInterface|null
     */
    public function getBySlug($slug)
    {
        return $this->articlesRepo->findOneBy(['slug' => $slug]);
    }

    /**
     * @param CategoryInterface $category
     * @return integer
     */
    public function getCountByCategory(CategoryInterface $category = null)
    {
        return $this->articlesRepo->getCountByCategory($category);
    }

    /**
     * @param integer|null $limit
     * @return ArticleInterface[]|null
     */
    public function getLast($limit = 10)
    {
        if (!$limit) {
            $limit = $this->itemsPerPage;
        }

        return $this->articlesRepo->findLast($limit);
    }
}
