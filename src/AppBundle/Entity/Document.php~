<?php

namespace AppBundle\Entity;

/**
 * Document
 */
class Document
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $uploaderName;

    /**
     * @var \DateTime
     */
    private $uploadTime;

    /**
     * @var \DateTime
     */
    private $sourceTime;

    /**
     * @var string
     */
    private $comment;

    /**
     * @var boolean
     */
    private $active;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $files;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $tags;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $attributes;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->files = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tags = new \Doctrine\Common\Collections\ArrayCollection();
        $this->attributes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Document
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set uploaderName
     *
     * @param string $uploaderName
     *
     * @return Document
     */
    public function setUploaderName($uploaderName)
    {
        $this->uploaderName = $uploaderName;

        return $this;
    }

    /**
     * Get uploaderName
     *
     * @return string
     */
    public function getUploaderName()
    {
        return $this->uploaderName;
    }

    /**
     * Set uploadTime
     *
     * @param \DateTime $uploadTime
     *
     * @return Document
     */
    public function setUploadTime($uploadTime)
    {
        $this->uploadTime = $uploadTime;

        return $this;
    }

    /**
     * Get uploadTime
     *
     * @return \DateTime
     */
    public function getUploadTime()
    {
        return $this->uploadTime;
    }

    /**
     * Set sourceTime
     *
     * @param \DateTime $sourceTime
     *
     * @return Document
     */
    public function setSourceTime($sourceTime)
    {
        $this->sourceTime = $sourceTime;

        return $this;
    }

    /**
     * Get sourceTime
     *
     * @return \DateTime
     */
    public function getSourceTime()
    {
        return $this->sourceTime;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return Document
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Document
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Add file
     *
     * @param \AppBundle\Entity\File $file
     *
     * @return Document
     */
    public function addFile(\AppBundle\Entity\File $file)
    {
        $this->files[] = $file;

        return $this;
    }

    /**
     * Add files
     *
     * @param \Doctrine\Common\Collections\ArrayCollection $files
     *
     * @return Document
     */
    public function addFiles(\Doctrine\Common\Collections\ArrayCollection $files)
    {
        foreach ($files as $file) {
            
            $this->addFile($file);
        }

        return $this;
    }

    /**
     * Remove file
     *
     * @param \AppBundle\Entity\File $file
     */
    public function removeFile(\AppBundle\Entity\File $file)
    {
        $this->files->removeElement($file);
    }

    /**
     * Get files
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFiles()
    {
        return $this->files;
    }

    /**
     * Add tag
     *
     * @param \AppBundle\Entity\Tag $tag
     *
     * @return Document
     */
    public function addTag(\AppBundle\Entity\Tag $tag)
    {
        $this->tags[] = $tag;

        return $this;
    }

    /**
     * Remove tag
     *
     * @param \AppBundle\Entity\Tag $tag
     */
    public function removeTag(\AppBundle\Entity\Tag $tag)
    {
        $this->tags->removeElement($tag);
    }

    /**
     * Get tags
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Add attribute
     *
     * @param \AppBundle\Entity\AttributeKeyValue $attribute
     *
     * @return Document
     */
    public function addAttribute(\AppBundle\Entity\AttributeKeyValue $attribute)
    {
        $this->attributes[] = $attribute;

        return $this;
    }

    /**
     * Remove attribute
     *
     * @param \AppBundle\Entity\AttributeKeyValue $attribute
     */
    public function removeAttribute(\AppBundle\Entity\AttributeKeyValue $attribute)
    {
        $this->attributes->removeElement($attribute);
    }

    /**
     * Get attributes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAttributes()
    {
        return $this->attributes;
    }
}
