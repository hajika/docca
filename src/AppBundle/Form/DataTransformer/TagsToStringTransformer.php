<?php

namespace AppBundle\Form\DataTransformer;

use AppBundle\Entity\Issue;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class TagsToStringTransformer implements DataTransformerInterface
{
    private $manager;

    public function __construct(ObjectManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * Transforms an ArrayCollection (tags) to a string (tagString).
     *
     * @param  Tag|null $tags
     * @return string
     */
    public function transform($tags) {
        
        if (null === $tags) {
            
            return new \Doctrine\Common\Collections\ArrayCollection();
        }
        
        $labels = [];
        foreach ($tags as $tag) {
            
            $labels[] = $tag->getLabel();
        }

        return implode(', ', $labels);
    }

    /**
     * Transforms a string (tagString) to an ArrayCollection (tags).
     *
     * @param  string $tagString
     * @return ArrayCollection (tags)|null
     * @throws TransformationFailedException if ArrayCollection (tags) is not found.
     */
    public function reverseTransform($tagString)
    {
        $labels = array_map('trim', explode(',', $tagString));
        $tags = new \Doctrine\Common\Collections\ArrayCollection();

        foreach ($labels as $label) {
            
            if (!$label) {
                
                continue;
            }
            
            $tag = $this->manager
                ->getRepository('AppBundle:Tag')            
                ->findOneByLabel($label);
            
            //set new Tag
            if ($tag === null) {
            
                $tag = new \AppBundle\Entity\Tag();
                $tag->setLabel($label);
                $this->manager->persist($tag);
            }
            
            $tags[] = $tag;
        }
        
        return $tags;
    }
}