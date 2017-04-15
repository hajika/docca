<?php

namespace AppBundle\Entity;

/**
 * AttributeValue
 */
class AttributeValue
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $keyValue;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->keyValue = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set label
     *
     * @param string $label
     *
     * @return AttributeValue
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
     * Add keyValue
     *
     * @param \AppBundle\Entity\AttributeKeyValue $keyValue
     *
     * @return AttributeValue
     */
    public function addKeyValue(\AppBundle\Entity\AttributeKeyValue $keyValue)
    {
        $this->keyValue[] = $keyValue;

        return $this;
    }

    /**
     * Remove keyValue
     *
     * @param \AppBundle\Entity\AttributeKeyValue $keyValue
     */
    public function removeKeyValue(\AppBundle\Entity\AttributeKeyValue $keyValue)
    {
        $this->keyValue->removeElement($keyValue);
    }

    /**
     * Get keyValue
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getKeyValue()
    {
        return $this->keyValue;
    }
}
