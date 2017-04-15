<?php

namespace AppBundle\Entity;

/**
 * AttributeKey
 */
class AttributeKey
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
     * @var integer
     */
    private $sort;

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
     * @return AttributeKey
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
     * Set sort
     *
     * @param integer $sort
     *
     * @return AttributeKey
     */
    public function setSort($sort)
    {
        $this->sort = $sort;

        return $this;
    }

    /**
     * Get sort
     *
     * @return integer
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * Add keyValue
     *
     * @param \AppBundle\Entity\AttributeKeyValue $keyValue
     *
     * @return AttributeKey
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
