<?php

namespace SmartCore\Bundle\MediaBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="media_categories",
 *      indexes={
 *          @ORM\Index(name="slug", columns={"slug"})
 *      }
 * )
 */
class Category
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
     * @var string
     *
     * @ORM\Column(type="string", length=32)
     */
    protected $slug;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    protected $title;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    protected $createdAt;

    /**
     * @var ArrayCollection|File[]
     *
     * @ORM\OneToMany(targetEntity="File", mappedBy="category")
     */
    protected $files;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->files     = new ArrayCollection();
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $slug
     * @return $this
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    
        return $this;
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
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
}
