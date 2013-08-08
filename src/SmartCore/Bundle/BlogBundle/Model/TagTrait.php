<?php

namespace SmartCore\Bundle\BlogBundle\Model;

trait TagTrait
{
    /**
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="articles", cascade={"persist"})
     * @ORM\JoinTable(name="blog_articles_tags_relations",
     *      joinColumns={@ORM\JoinColumn(name="article_id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="tag_id")}
     * )
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    protected $tags;

    /**
     * @param Tag $tag
     * @return $this
     */
    public function addTag(Tag $tag)
    {
        if (!$this->tags->contains($tag)) {
            $this->tags->add($tag);
        }

        return $this;
    }

    /**
     * @param Tag $tag
     * @return $this
     */
    public function removeTag(Tag $tag)
    {
        if ($this->tags->contains($tag)) {
            $this->tags->removeElement($tag);
        }

        return $this;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $tags
     * @return $this
     */
    public function setTags($tags)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * @return Tag[]
     */
    public function getTags()
    {
        return $this->tags;
    }
}
