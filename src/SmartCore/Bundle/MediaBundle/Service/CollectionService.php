<?php

namespace SmartCore\Bundle\MediaBundle\Service;

use SmartCore\Bundle\MediaBundle\Entity\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class CollectionService
{
    public function __construct()
    {
        // @todo
    }

    /**
     * @param UploadedFile $file
     * @return integer - ID файла в коллекции.
     */
    public function createFile(UploadedFile $file)
    {
        // @todo
    }

    /**
     * @param integer $id
     * @return bool
     */
    public function deleteFile($id)
    {
        // @todo
    }

    /**
     * @param integer|null $categoryId
     * @param array|null $orderBy
     * @param integer|null $limit
     * @param integer|null $offset
     * @return File[]|null
     */
    public function getFilesList($categoryId = null, array $orderBy = null, $limit = null, $offset = null)
    {
        // @todo
    }

    /**
     * @param integer $id
     * @return string
     */
    public function getUriByFileId($id)
    {
        // @todo
    }

    /**
     * @param integer|null $categoryId
     */
    public function getCategories($categoryId = null)
    {
        // @todo подумать как лучше получать список категорий.
    }
}
