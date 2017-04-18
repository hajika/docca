<?php

namespace AppBundle\Entity;

/**
 * File
 */
class File
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $label;

    /**
     * @var string
     */
    private $name;

    /**
     * @var integer
     */
    private $size;

    /**
     * @var string
     */
    private $mimeType;

    /**
     * @var string
     */
    private $originalName;

    /**
     * @var integer
     */
    private $numberPages;

    /**
     * @var \AppBundle\Entity\Document
     */
    private $document;


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
     * Set label
     *
     * @param string $label
     *
     * @return File
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get label
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return File
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set size
     *
     * @param integer $size
     *
     * @return File
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return integer
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set mimeType
     *
     * @param string $mimeType
     *
     * @return File
     */
    public function setMimeType($mimeType)
    {
        $this->mimeType = $mimeType;

        return $this;
    }

    /**
     * Get mimeType
     *
     * @return string
     */
    public function getMimeType()
    {
        return $this->mimeType;
    }

    /**
     * Set originalName
     *
     * @param string $originalName
     *
     * @return File
     */
    public function setOriginalName($originalName)
    {
        $this->originalName = $originalName;

        return $this;
    }

    /**
     * Get originalName
     *
     * @return string
     */
    public function getOriginalName()
    {
        return $this->originalName;
    }

    /**
     * Set numberPages
     *
     * @param integer $numberPages
     *
     * @return File
     */
    public function setNumberPages($numberPages)
    {
        $this->numberPages = $numberPages;

        return $this;
    }

    /**
     * Get numberPages
     *
     * @return integer
     */
    public function getNumberPages()
    {
        return $this->numberPages;
    }

    /**
     * Set document
     *
     * @param \AppBundle\Entity\Document $document
     *
     * @return File
     */
    public function setDocument(\AppBundle\Entity\Document $document = null)
    {
        $this->document = $document;

        return $this;
    }

    /**
     * Get document
     *
     * @return \AppBundle\Entity\Document
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * @var \Symfony\Component\HttpFoundation\File\File
     */
    private $filebits;
    
    /**
     * Set temporary file content, not for persisting
     * 
     * @param \Symfony\Component\HttpFoundation\File\File $filebits
     * @return \AppBundle\Entity\File
     */
    public function setFilebits(\Symfony\Component\HttpFoundation\File\File $filebits)
    {
        $this->filebits = $filebits;
        return $this;
    }
    
    /**
     * Get temporary file content
     * 
     * @return \Symfony\Component\HttpFoundation\File\File
     */
    public function getFilebits()
    {
        return $this->filebits;
    }
}

