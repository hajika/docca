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
    
    /**
     * Return path of original file
     * 
     * @return string
     */
    public function getPath() {
     
        return \AppBundle\Config::FILE_UPLOAD_PATH . $this->getName();
    }
    
    /**
     * Return Array of Thumb Assets
     * 
     * @return array
     */
    public function getThumbAssets() {
        
        for ($i=0; $i<$this->getNumberPages(); $i++) {
            
            $assets[] = 'images/thumbs/' . $this->getName() . '_' . $i . '.png';
        }
        
        return $assets;
    }
    
    /**
     * Return Array of Preview Assets
     * 
     * @return array
     */
    public function getPreviewAssets() {
        
        for ($i=0; $i<$this->getNumberPages(); $i++) {
            
            $asset[] = 'images/previews/' . $this->getName() . '_' . $i . '.png';
        }
        
        return $asset;
    }
    
    /**
     * Return Array of Thumb Paths
     * 
     * @return array
     */
    public function getThumbPaths() {
        
        for ($i=0; $i<$this->getNumberPages(); $i++) {
            
            $paths[] = \AppBundle\Config::FILE_THUMB_PATH . $this->getName() . '_' . $i . '.png';
        }
        
        return $paths;
    }
    
    /**
     * Return Array of Preview Paths
     * 
     * @return array
     */
    public function getPreviewPaths() {
        
        for ($i=0; $i<$this->getNumberPages(); $i++) {
            
            $path[] = \AppBundle\Config::FILE_PREVIEW_PATH . $this->getName() . '_' . $i . '.png';
        }
        
        return $path;
    }
}

