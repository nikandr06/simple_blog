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
     * @return integer
     */
    public function getId();

    /**
     * @return mixed
     */
    public function getSlug();

    /**
     * @param mixed $slug
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
}
