<?php

namespace SmartCore\Bundle\MediaBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="media_collections")
 */
class Collection
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
     * @ORM\Column(type="string", length=64)
     */
    protected $title;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     */
    protected $description;

    /**
     * @var array
     *
     * @ORM\Column(type="array")
     */
    protected $params;

    /**
     * Относительный путь можно менять, только если нету файлов в коллекции
     * либо предусмотреть как-то переименовывание пути в провайдере.
     *
     * @var string
     *
     * @ORM\Column(name="relative_path", type="string", length=255)
     */
    protected $relativePath;

    /**
     * Маска имени файла. Если пустая строка, то использовать оригинальное имя файла,
     * совместимое с вебформатом т.е. без пробелов и русских букв.
     *
     * @var string
     *
     * @ORM\Column(name="filename_pattern", type="string", length=64)
     */
    protected $filenamePattern;

    /**
     * @var string
     *
     * @ORM\Column(name="file_relative_path_pattern", type="string", length=255)
     */
    protected $fileRelativePathPattern;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    protected $createdAt;

    /**
     * @var ArrayCollection|File[]
     *
     * @ORM\OneToMany(targetEntity="File", mappedBy="collection")
     */
    protected $files;

    /**
     * Constructor.
     *
     * @param string $relativePath
     */
    public function __construct($relativePath = '')
    {
        $this->createdAt        = new \DateTime();
        $this->files            = new ArrayCollection();
        $this->relativePath     = $relativePath;

        $this->filenamePattern          = '%H_%i_%RAND(10)';
        $this->fileRelativePathPattern  = '%Y/%m/%d/';
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param string $filenamePattern
     * @return $this
     */
    public function setFilenamePattern($filenamePattern)
    {
        $this->filenamePattern = $filenamePattern;

        return $this;
    }

    /**
     * @return string
     */
    public function getFilenamePattern()
    {
        return $this->filenamePattern;
    }

    /**
     * @param string $fileRelativePathPattern
     * @return $this
     */
    public function setFileRelativePathPattern($fileRelativePathPattern)
    {
        $this->fileRelativePathPattern = $fileRelativePathPattern;

        return $this;
    }

    /**
     * @return string
     */
    public function getFileRelativePathPattern()
    {
        return $this->fileRelativePathPattern;
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

    /**
     * @param array $params
     * @return $this
     */
    public function setParams($params)
    {
        $this->params = $params;
    
        return $this;
    }

    /**
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param string $relativePath
     * @return $this
     */
    public function setRelativePath($relativePath)
    {
        $this->relativePath = $relativePath;

        return $this;
    }

    /**
     * @return string
     */
    public function getRelativePath()
    {
        return $this->relativePath;
    }
}
