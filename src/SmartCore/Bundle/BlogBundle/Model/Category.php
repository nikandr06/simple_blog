<?php

namespace SmartCore\Bundle\BlogBundle\Model;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @UniqueEntity(fields={"uri_part"}, message="Категория с таким сегментом URI уже существует.")
 */
abstract class Category implements CategoryInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToOne(targetEntity="Category")
     * @ORM\JoinColumn(name="pid")
     *
     * @var Category
     **/
    protected $parent;

    /**
     * @ORM\Column(type="string", length=32, unique=true)
     */
    protected $slug;

    /**
     * @ORM\Column(type="string")
     */
    protected $title;

    /**
     * @ORM\OneToMany(targetEntity="Article", mappedBy="category")
     */
    protected $articles;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $created_at;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->articles   = new ArrayCollection();
        $this->created_at = new \DateTime();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getTitle();
    }

    /**
     * @return \Datetime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @return Article[]
     */
    public function getArticles()
    {
        return $this->articles;
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param CategoryInterface $parent
     * @return $this
     */
    public function setParent(CategoryInterface $parent)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * @return Category
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $slug
     * @return $this
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSlug()
    {
        return $this->slug;
    }
}
