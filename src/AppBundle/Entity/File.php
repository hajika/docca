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
    
    //
    public function getThumbAssets() {
        
        for ($i=0; $i<$this->getNumberPages(); $i++) {
            
            $assets[] = 'images/thumbs/' . $this->getName() . '_' . $i . '.png';
        }
        
        return $assets;
    }
    
    //
    public function getPreviewAssets() {
        
        for ($i=0; $i<$this->getNumberPages(); $i++) {
            
            $asset[] = 'images/previews/' . $this->getName() . '_' . $i . '.png';
        }
        
        return $asset;
    }
}

