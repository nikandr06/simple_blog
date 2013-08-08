<?php

namespace SimpleBlog\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use SmartCore\Bundle\BlogBundle\Model\Category as SmartCategory;

/**
 * @ORM\Entity
 * @ORM\Table(name="blog_categories")
 */
class Category extends SmartCategory
{

}
