<?php

namespace SmartCore\Bundle\MediaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="media_files")
 */
class File
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Collection", inversedBy="files")
     * @ORM\JoinColumn(name="collection_id")
     */
    protected $collection;

    /**
     * @ORM\ManyToOne(targetEntity="category", inversedBy="files")
     * @ORM\JoinColumn(name="category_id")
     */
    protected $category;

    /**
     * @ORM\ManyToOne(targetEntity="Storage", inversedBy="files")
     * @ORM\JoinColumn(name="storage_id")
     */
    protected $storage;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100)
     */
    protected $filename;

    /**
     * @var string
     *
     * @ORM\Column(name="original_filename", type="string", length=255)
     */
    protected $originalFilename;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    protected $createdAt;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=16)
     */
    protected $type;

    /**
     * @var string
     *
     * @ORM\Column(name="mime_type", type="string", length=32)
     */
    protected $mimeType;

    /**
     * @var integer
     *
     * @ORM\Column(type="bigint")
     */
    protected $size;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }
    
    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $filename
     * @return $this
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;
    
        return $this;
    }

    /**
     * @return string
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * @param string $originalFilename
     * @return $this
     */
    public function setOriginalFilename($originalFilename)
    {
        $this->originalFilename = $originalFilename;
    
        return $this;
    }

    /**
     * @return string
     */
    public function getOriginalFilename()
    {
        return $this->originalFilename;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param string $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $mimeType
     * @return $this
     */
    public function setMimeType($mimeType)
    {
        $this->mimeType = $mimeType;
    
        return $this;
    }

    /**
     * @return string
     */
    public function getMimeType()
    {
        return $this->mimeType;
    }

    /**
     * @param integer $size
     * @return $this
     */
    public function setSize($size)
    {
        $this->size = $size;
    
        return $this;
    }

    /**
     * @return integer
     */
    public function getSize()
    {
        return $this->size;
    }
}
