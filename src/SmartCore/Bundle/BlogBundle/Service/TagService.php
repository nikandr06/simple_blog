<?php

namespace SmartCore\Bundle\BlogBundle\Service;

use Doctrine\ORM\EntityRepository;
use SmartCore\Bundle\BlogBundle\Model\TagInterface;

class TagService
{
    /**
     * @var \SmartCore\Bundle\BlogBundle\Repository\ArticleRepository
     */
    protected $articlesRepo;

    /**
     * @var \SmartCore\Bundle\BlogBundle\Repository\TagRepository
     */
    protected $tagsRepo;

    /**
     * @param EntityRepository $articlesRepo
     * @param EntityRepository $tagsRepo
     * @param int $itemsPerPage
     */
    public function __construct(EntityRepository $articlesRepo, EntityRepository $tagsRepo, $itemsPerPage = 10)
    {
        $this->articlesRepo = $articlesRepo;
        $this->tagsRepo     = $tagsRepo;
        $this->itemsPerPage = $itemsPerPage;
    }

    /**
     * @param TagInterface $tag
     * @return \Doctrine\ORM\Query
     */
    public function getFindByTagQuery(TagInterface $tag)
    {
        return $this->articlesRepo->getFindByTagQuery($tag);
    }

    /**
     * @param TagInterface $tag
     * @return integer
     *
     * @todo возможность выбора по нескольким тэгам.
     */
    public function getArticlesCountByTag(TagInterface $tag = null)
    {
        return $this->tagsRepo->getCountByTag($tag);
    }

    /**
     * @param string $slug
     * @return TagInterface
     * @throws \Exception
     *
     * @todo нормальный выброс исключения.
     */
    public function getBySlug($slug)
    {
        if (null === $this->tagsRepo) {
            throw new \Exception('Необходимо сконфигурировать тэги.');
        }

        return $this->tagsRepo->findOneBy(['slug' => $slug]);
    }

    /**
     * @return @return Tag[]|null
     * @throws \Exception
     *
     * @todo нормальный выброс исключения.
     */
    public function getCloud()
    {
        if (null === $this->tagsRepo) {
            throw new \Exception('Необходимо сконфигурировать тэги.');
        }

        return $this->tagsRepo->findAll();
    }

    /**
     * @return int
     */
    public function getItemsPerPage()
    {
        return $this->itemsPerPage;
    }
}
