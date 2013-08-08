<?php

namespace SmartCore\Bundle\BlogBundle\Model;

trait CategoryTrait
{
    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="articles")
     * @ORM\JoinColumn(name="category_id")
     */
    protected $category;

    /**
     * @return Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param Category $category
     * @return $this
     */
    public function setCategory(Category $category)
    {
        $this->category = $category;

        return $this;
    }
}
