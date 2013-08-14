<?php

namespace SmartCore\Bundle\BlogBundle\Model;

interface TagInterface
{
    /**
     * @return $this
     */
    public function increment();

    /**
     * @return $this
     */
    public function decrement();

    /**
     * @return int
     */
    public function getId();

    /**
     * @return mixed
     */
    public function getSlug();

    /**
     * @param string $slug
     * @return $this
     */
    public function setSlug($slug);

    /**
     * @return string
     */
    public function getTitle();

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle($title);

    /**
     * @return \DateTime|null
     */
    public function getUpdatedAt();

    /**
     * @return $this
     */
    public function setUpdated();
}

