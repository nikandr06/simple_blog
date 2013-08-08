<?php

namespace SmartCore\Bundle\BlogBundle\Repository;

use Doctrine\ORM\EntityRepository;
use SmartCore\Bundle\BlogBundle\Model\TagInterface;

class TagRepository extends EntityRepository
{
    /**
     * @param TagInterface $tag
     * @return integer
     *
     * @todo возможность выбора по нескольким тэгам.
     */
    public function getArticlesCountByTag(TagInterface $tag)
    {
        $query = $this->_em->createQuery("
            SELECT COUNT(a.id)
            FROM {$this->_entityName} AS t
            JOIN t.articles AS a
            WHERE t = :tag
        ")->setParameter('tag', $tag);

        return $query->getSingleScalarResult();
    }
}
