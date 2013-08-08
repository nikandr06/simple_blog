<?php

namespace SmartCore\Bundle\BlogBundle\Model;

interface  ArticleInterface
{
    /**
     * @return integer
     */
    public function getId();

    /**
     * @param string $annotation
     * @return $this
     */
    public function setAnnotation($annotation);

    /**
     * @return string
     */
    public function getAnnotation();

    /**
     * @return \Datetime
     */
    public function getCreatedAt();

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription($description);

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @param string $keywords
     * @return $this
     */
    public function setKeywords($keywords);

    /**
     * @return string
     */
    public function getKeywords();

    /**
     * @param boolean $enabled
     * @return $this
     */
    public function setEnabled($enabled);

    /**
     * @return boolean
     */
    public function getEnabled();

    /**
     * @param string $text
     * @return $this
     */
    public function setText($text);

    /**
     * @return string
     */
    public function getText();

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle($title);

    /**
     * @return string
     */
    public function getTitle();

    /**
     * @return \DateTime|null
     */
    public function getUpdatedAt();

    /**
     * @param string $slug
     * @return $this
     */
    public function setSlug($slug);

    /**
     * @return string
     */
    public function getSlug();
}
