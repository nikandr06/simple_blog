<?php

namespace SmartCore\Bundle\MediaBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="media_storages")
 */
class Storage
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=32)
     */
    protected $provider;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    protected $title;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    protected $path;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    protected $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    protected $createdAt;

    /**
     * @var ArrayCollection|File[]
     *
     * @ORM\OneToMany(targetEntity="File", mappedBy="storage")
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
     * @param string $path
     * @return $this
     */
    public function setPath($path)
    {
        $this->path = $path;
    
        return $this;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param string $provider
     * @return $this
     */
    public function setProvider($provider)
    {
        $this->provider = $provider;

        return $this;
    }

    /**
     * @return string
     */
    public function getProvider()
    {
        return $this->provider;
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
     * @param string $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}
