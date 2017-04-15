<?php

namespace AppBundle\Entity;

/**
 * AttributeKeyValue
 */
class AttributeKeyValue
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \AppBundle\Entity\AttributeKey
     */
    private $key;

    /**
     * @var \AppBundle\Entity\AttributeValue
     */
    private $value;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $documents;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->documents = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set key
     *
     * @param \AppBundle\Entity\AttributeKey $key
     *
     * @return AttributeKeyValue
     */
    public function setKey(\AppBundle\Entity\AttributeKey $key = null)
    {
        $this->key = $key;

        return $this;
    }

    /**
     * Get key
     *
     * @return \AppBundle\Entity\AttributeKey
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Set value
     *
     * @param \AppBundle\Entity\AttributeValue $value
     *
     * @return AttributeKeyValue
     */
    public function setValue(\AppBundle\Entity\AttributeValue $value = null)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return \AppBundle\Entity\AttributeValue
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Add document
     *
     * @param \AppBundle\Entity\Document $document
     *
     * @return AttributeKeyValue
     */
    public function addDocument(\AppBundle\Entity\Document $document)
    {
        $this->documents[] = $document;

        return $this;
    }

    /**
     * Remove document
     *
     * @param \AppBundle\Entity\Document $document
     */
    public function removeDocument(\AppBundle\Entity\Document $document)
    {
        $this->documents->removeElement($document);
    }

    /**
     * Get documents
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDocuments()
    {
        return $this->documents;
    }
}
